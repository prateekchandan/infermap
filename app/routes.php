<?php


Route::get('/', function()
{
	return View::make('layout.main');
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
Route::post('/register1', array('as'=>'user.create1', 'uses'=>'UsersController@create1'));
Route::post('/register', array('as'=>'user.store', 'uses'=>'UsersController@store'));

Route::get('/test',function(){
	return Auth::user();
});

Route::post('/storefb', array('as'=>'user.storefb', 'uses'=>'UsersController@storefb'));


