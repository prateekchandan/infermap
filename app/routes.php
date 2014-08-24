<?php


Route::get('/', function()
{
	return View::make('home.home');
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


Route::get('/exam/{link}',array('as'=>'exam','uses'=>'ExamsController@view'));
Route::get('/exam/',array('as'=>'all_exam','uses'=>'ExamsController@all'));


Route::get('/register', array('as'=>'user.create', 'uses'=>'UsersController@create'));
Route::post('/register', array('as'=>'user.store', 'uses'=>'UsersController@store'));
Route::get('/edit-profile', array('as'=>'user.edit', 'uses'=>'UsersController@edit'));
Route::post('/edit-profile', array('as'=>'user.update', 'uses'=>'UsersController@update'));
Route::post('/fblogin', array('as'=>'user.fblogin', 'uses'=>'UsersController@fblogin'));

Route::get('/autocomplete/{string}',array('as' => 'autocomplete' , 'uses' => 'SearchController@autocomplete'));

Route::post('/storefb', array('as'=>'user.storefb', 'uses'=>'UsersController@storefb'));
Route::get('/login', array('as'=>'user.login.show', 'uses'=>'UsersController@showlogin'));
Route::post('/login', array('as'=>'user.login', 'uses'=>'UsersController@login'));
Route::get('/logout', array('as'=>'user.logout', 'uses'=>'UsersController@logout'));


// Keep this line at last
Route::get('/{state}/{city}','CollegeController@collegebyplace');


