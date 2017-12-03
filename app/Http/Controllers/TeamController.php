<?php

namespace App\Http\Controllers;

use Carbon\carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function saveLogo(Request $request){

    	$files = $request->file('file');

        $file_name = $files->getClientOriginalName();

        $team_id = DB::table('teams')->insertGetId(['logo'=>$file_name,'team_manager'=>Auth::id()]); 

    	$file_store = $files->storeAs('logos/'.$team_id,$file_name); // Store File

        return $team_id;
    }

    public function saveTeam(Request $request){

    	$team_id = $request->input('id');
    	$team_name = $request->input('teamname');

    	DB::table('teams')->where('team_id',$team_id)->update(['team_name'=>$team_name]);
    }

    public function addPlayer(Request $request){
        
        $team_id = $request->input('team_id');
        $user_id = $request->input('name');

        DB::table('players')->where('user_id',$user_id)->update(['team_id'=>$team_id]);

        $users = DB::table('users')
                ->join('players','users.id','=','players.user_id')
                ->where('users.id',$user_id)->first();

        return json_encode($users);    
    }

    public function teamInfo(){

        if(Auth::user()->role == 3){

            $player = DB::table('players')->where('user_id',Auth::id())->first();

            $team_id = $player->team_id;

        }

        if(Auth::user()->role == 2){

            
            $which_team = DB::table('teams')->where('team_manager',Auth::id())->first();

            $team_id = $which_team->team_id;

        }

        if($team_id <> 0){

            $data['have_team'] = true;

            $team_info = DB::table('teams')
                        ->join('users','teams.team_manager','=','users.id')
                        ->join('tstatus','teams.tstatus','=','tstatus.tstatus_id')
                        ->where('team_id',$team_id)
                        ->first();

            $p_query = DB::table('players')->where('players.team_id',$team_info->team_id);

            $p_count = $p_query->count();

            $data['p_count'] = $p_count;

            if($p_count <> 0){

                $players = $p_query
                            ->join('users','players.user_id','=','users.id')
                            ->get();

                foreach($players as $player){
                    $p_date = Carbon::parse($player->created_at);
                    $player->created_at = $p_date->toFormattedDateString();
                }

                $data['players'] = $players;
            }

            $data['team_info'] = $team_info;

        }else{

            $data['have_team'] = false;
        }


        if(Auth::user()->role == 3){

            $o_view = 'player.teaminfo';

        }

        if(Auth::user()->role == 2){

            $o_view = 'manager.teaminfo';

        }

        return view($o_view,$data);
    }

    public function teamListing(Request $request){

        $t_query = DB::table('teams')->where('teams.tstatus',2);

        $t_count = $t_query->count();

        if($t_count <> 0){

            $teams = $t_query
                        ->join('tstatus','teams.tstatus','=','tstatus.tstatus_id')
                        ->join('users','teams.team_manager','=','users.id')
                        ->orderBy('teams.team_name')
                        ->get();

            $count = 0;

            foreach($teams as $team){

                $t_date = Carbon::parse($team->created_at);
                $team->created_at = $t_date->toFormattedDateString();

                $player_count[$count] = DB::table('players')->where('team_id',$team->team_id)->count();

                $count++;
            }

            $data['player_count'] = $player_count;

            $data['teams'] = $teams;
        }

        $data['t_count'] = $t_count;

        
        if(Auth::user()->role == 3){

            $o_view = 'player.teams';

        }

        if(Auth::user()->role == 2){

            $o_view = 'manager.teams';

        }

        return view($o_view,$data);
    }
}
