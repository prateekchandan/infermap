<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('layout.main');
});

Route::get('/review', function(){
	return View::make('response.view');
});

Route::post('/review', function(){
	$review = new CollegeReview;
	$review->saveFromInput(Input::all());
	$review->save();
	return Redirect::to('/');
});

Route::get('/college','CollegeController@show_all');
Route::get('/college/{link}/{page}','CollegeController@home');
Route::get('/college/{link}','CollegeController@college');
