<?php


Route::get('test', function()
{
	$college=DB::table('college_id')->get();
	$sum=0;
	foreach ($college as $key => $value) {
		//echo $value->name.'<br>';
		$depts=DB::connection('college_data')->select('select * from t'.$value->cid);
		//$sum+= sizeof($depts);
		if(sizeof($depts)==0)
		{
			echo '<a href="'.URL::route('college').'/'.$value->link.'">'.$value->name.' : '.$value->cid.'</a><br>';
		}
		//echo '<hr>';
	}
	echo $sum;
});


Route::filter('admin',function(){
	if(!Auth::check())
	{
		return View::make('user.login');
	}
});


// URL for general pages over site
Route::get('/',array('as'=>'home','uses'=>'HomeController@home'));
Route::get('about-us',array('as'=>'home.about','uses'=>'HomeController@about'));
Route::get('frequently-asked-questions',array('as'=>'home.faq','uses'=>'HomeController@faq'));
Route::get('compare-colleges',array('as'=>'home.compare','uses'=>'HomeController@compare'));

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
Route::get('/college',array('as'=>'college','uses' => 'CollegeController@show_all'));
Route::get('/college/{link}/{page}','CollegeController@college');
Route::get('/college/{link}','CollegeController@college');

// URLS for exam pages
Route::get('/exam/{link}',array('as'=>'exam.link','uses'=>'ExamsController@view'));
Route::get('/exam/{link}/{page}',array('as'=>'exam.page','uses'=>'ExamsController@view'));
Route::get('/exam/',array('as'=>'exam','uses'=>'ExamsController@all'));
Route::post('/exam/',array('before'=>'admin','as'=>'exam.savefile','uses'=>'ExamsController@savefile'));
Route::post('/exam/addevent',array('before'=>'admin','as'=>'exam.addevent','uses'=>'ExamsController@addevent'));
Route::post('/exam/deleteevent',array('before'=>'admin','as'=>'exam.deleteevent','uses'=>'ExamsController@deleteevent'));

// URLS for department pages
Route::get('/department',array('as'=>'department','uses'=>'DepartmentController@all'));
Route::get('/department/{link}',array('as'=>'department.link','uses'=>'DepartmentController@view'));
Route::get('/department/{link}/{page}',array('as'=>'department.page','uses'=>'DepartmentController@view'));
Route::post('/department/',array('before'=>'admin','as'=>'department.savefile','uses'=>'DepartmentController@savefile'));

// URLS's for register and login
Route::get('/register', array('as'=>'user.create', 'uses'=>'UsersController@create'));
Route::post('/register', array('as'=>'user.store', 'uses'=>'UsersController@store'));
Route::get('/edit-profile', array('as'=>'user.edit', 'uses'=>'UsersController@edit'));
Route::post('/edit-profile', array('as'=>'user.update', 'uses'=>'UsersController@update'));
Route::post('/fblogin', array('as'=>'user.fblogin', 'uses'=>'UsersController@fblogin'));
Route::post('/gpluslogin', array('as'=>'user.gpluslogin', 'uses'=>'UsersController@gpluslogin'));
Route::get('/login', array('as'=>'user.login.show', 'uses'=>'UsersController@showlogin'));
Route::post('/login', array('as'=>'user.login', 'uses'=>'UsersController@login'));
Route::get('/logout', array('as'=>'user.logout', 'uses'=>'UsersController@logout'));
Route::get('/user-profile', array('before'=>'admin','as'=>'user.profile', 'uses'=>'UsersController@profile'));


// URL for blog operations
Route::get('/blog',array('as'=> 'blog' , 'uses' => 'BlogController@all'));
Route::get('/blog/page/{page}',array('as'=> 'blog.pages' , 'uses' => 'BlogController@all'));
Route::get('/blog/post',array('as'=> 'blog.post' , 'uses' => 'BlogController@all'));
Route::get('/blog/post/{link}',array('as'=> 'blog.post.link' , 'uses' => 'BlogController@show_post'));
Route::get('/blog/add-new',array('before'=>'admin','as'=> 'blog.add' , 'uses' => 'BlogController@add'));
Route::post('/blog/add-new',array('before'=>'admin','as'=> 'blog.add' , 'uses' => 'BlogController@save'));

// URL for autocomplete
Route::get('/autocomplete/{string}',array('as' => 'autocomplete' , 'uses' => 'SearchController@autocomplete'));
Route::post('/autocomplete',array('as' => 'autocomplete_get' , 'uses' => 'SearchController@autocomplete_get'));
Route::post('/review_autocomplete',array('as' => 'review_autocomplete' , 'uses' => 'SearchController@review_autocomplete'));
Route::get('/review_autocomplete',array('as' => 'review_autocomplete_get' , 'uses' => 'SearchController@review_autocomplete'));

//URL for interns and careers
Route::get('/career',array('as'=>'career','uses' => 'CareerController@home'));

Route::get('/user',function(){
	return Auth::user();
});

// Keep this line at last
Route::get('/place/{state}/{city}',array('as'=>'place.state.city','uses'=>'CollegeController@collegebyplace'));
Route::get('/place/{state}',array('as'=>'place.state','uses'=>'CollegeController@collegebyplace'));


