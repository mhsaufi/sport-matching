<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function activateAccount(Request $request){

    	$role = $request->input('role');

    	if($role == 'manager'){

    		$role = '2';

    		DB::table('users')->where('id',Auth::id())->update(['role'=>$role,'status'=>3]);

    	}else{

    		$role = '3';

    		DB::table('users')->where('id',Auth::id())->update(['role'=>$role,'status'=>1]);
    		DB::table('players')->insert(['user_id'=>Auth::id(),'team_id'=>0,'player_status'=>1]);

    	}

    }
}
