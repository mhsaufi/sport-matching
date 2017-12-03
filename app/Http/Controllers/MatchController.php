<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    public function requestMatch(Request $request){

    	$team_id = $request->input('team');

    	$match_date = Carbon::now();

    	$myteam = DB::table('teams')->where('team_manager',Auth::id())->first();

    	$match_team = $myteam->team_id."|".$team_id;

    	DB::table('matches')->insert(['team_id'=>$match_team,'match_date'=>$match_date,'match_status'=>1]);

    	return redirect('teams');

    }
}
