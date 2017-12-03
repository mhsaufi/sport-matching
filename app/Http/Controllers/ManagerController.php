<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    public function activity(){

    	$t_query = DB::table('teams')->where('teams.team_manager',Auth::id());

    	$t_count = $t_query->count();

    	if($t_count <> 0){

            // Team Info

    		$team = $t_query
                    ->join('users','teams.team_manager','=','users.id')
                    ->join('tstatus','teams.tstatus','=','tstatus.tstatus_id')
                    ->first();

            $t_date = Carbon::parse($team->created_at);
            $team->created_at = $t_date->toFormattedDateString();

    		$data['team'] = $team;

            // List of players for current team

            $p_query = DB::table('players')->where('players.team_id',$team->team_id);

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

            // All available players

            $users = DB::table('players')
                    ->join('users','players.user_id','=','users.id')
                    ->where('players.team_id',0)->get();

            $data['users'] = $users;


    	}

    	$data['t_count'] = $t_count;

    	return view('manager.activity',$data);
    }

    public function addTeam(Request $request){

    	return view('manager.addteamform');
    }
}
