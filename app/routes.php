<?php


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
	return Redirect::to('http://www.infermap.com');
});

Route::get('/college','CollegeController@show_all');
Route::get('/college/{link}/{page}','CollegeController@college');
Route::get('/college/{link}','CollegeController@college');



Route::get('/register', array('as'=>'user.create', 'uses'=>'UsersController@create'));
Route::post('/register', array('as'=>'user.store', 'uses'=>'UsersController@store'));

Route::get('/test',function(){
	return View::make('user.test');
});

Route::post('/storefb', array('as'=>'user.storefb', 'uses'=>'UsersController@storefb'));

