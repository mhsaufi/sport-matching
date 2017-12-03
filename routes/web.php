<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

//  FOR PLAYER AD MANAGER

Route::group(['middleware'=>'auth'],function(){

	Route::get('/home', 			'HomeController@index')->name('home');
	Route::post('/activateaccount',	'HomeController@activateAccount'); // account ctivation by choosing role

	//PHOTO LINKS
	Route::get('logos/{id}/{filename}', function ($id,$filename){
	    return Storage::get('logos/'.$id.'/'.$filename);
	});

	//==================================================MANAGER

	// ACTIVITY
	Route::get('/activity',		'ManagerController@activity');
	Route::get('/addteam',		'ManagerController@addTeam');
	Route::post('/uploadlogo',	'TeamController@saveLogo');
	Route::post('/saveteam',	'TeamController@saveTeam');
	Route::post('/addplayer',	'TeamController@addPlayer');

	Route::get('/requestmatch',	'MatchController@requestMatch');

	//==================================================PLAYER

	Route::get('/teams',		'TeamController@teamListing');

	Route::get('/teaminfo',		'TeamController@teamInfo');

});

// FOR ADMIN

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

	Route::get('/home', 'HomeController@index')->name('home');

});
