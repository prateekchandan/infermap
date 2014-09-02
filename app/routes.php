<?php


Route::get('/', function()
{
	return View::make('home.home');
});


Route::filter('admin',function(){
	if(!Auth::check())
	{
		return Redirect::route('user.login');
	}
});

// URL for page for review and storing a review
Route::get('/review',array('as'=>'review_main','uses'=>'ReviewController@get_college'));
Route::get('/review/add',array('as'=>'review_new','uses'=>'ReviewController@add_new'));
Route::post('/review/add',array('as'=>'review_new_save','uses'=>'ReviewController@save_new'));
Route::get('/review/feedback',array('as'=>'review_feedback','uses'=>'ReviewController@feedback'));
Route::post('/review/feedback',array('as'=>'review.feedback.save','uses'=>'ReviewController@feedback_save'));
Route::get('/review/report',array('as'=>'review.report','uses'=>'ReviewController@report'));
Route::post('/review', array('as'=>'review.college.save','uses'=>'ReviewController@save_college_review'));


//Analysis pages
Route::get('/analysis/departments', array('before'=>'admin','as'=>'analysis.dept','uses'=>'AnalysisController@department'));
// Some mains URLS's 

// URL's for college
Route::get('/college','CollegeController@show_all');
Route::get('/college/{link}/{page}','CollegeController@college');
Route::get('/college/{link}','CollegeController@college');

// URLS for exam pages
Route::get('/exam/{link}',array('as'=>'exam','uses'=>'ExamsController@view'));
Route::get('/exam/',array('as'=>'all_exam','uses'=>'ExamsController@all'));

// URLS's for register and login
Route::get('/register', array('as'=>'user.create', 'uses'=>'UsersController@create'));
Route::post('/register', array('as'=>'user.store', 'uses'=>'UsersController@store'));
Route::get('/edit-profile', array('as'=>'user.edit', 'uses'=>'UsersController@edit'));
Route::post('/edit-profile', array('as'=>'user.update', 'uses'=>'UsersController@update'));
Route::post('/fblogin', array('as'=>'user.fblogin', 'uses'=>'UsersController@fblogin'));
Route::post('/storefb', array('as'=>'user.storefb', 'uses'=>'UsersController@storefb'));
Route::get('/login', array('as'=>'user.login.show', 'uses'=>'UsersController@showlogin'));
Route::post('/login', array('as'=>'user.login', 'uses'=>'UsersController@login'));
Route::get('/logout', array('as'=>'user.logout', 'uses'=>'UsersController@logout'));


// URL for autocomplete
Route::get('/autocomplete/{string}',array('as' => 'autocomplete' , 'uses' => 'SearchController@autocomplete'));
Route::post('/review_autocomplete',array('as' => 'review_autocomplete' , 'uses' => 'SearchController@review_autocomplete'));
Route::get('/review_autocomplete',array('as' => 'review_autocomplete_get' , 'uses' => 'SearchController@review_autocomplete'));

Route::get('/user',function(){
	return Auth::user();
});

// Keep this line at last
Route::get('/{state}/{city}','CollegeController@collegebyplace');


