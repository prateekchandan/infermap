<?php
Route::filter('login',function(){
	if(!Auth::check())
	{
		return View::make('user.login');
	}
});

Route::filter('admin',function(){
	if(!Auth::check())
	{
		return View::make('user.login');
	}
	else{
		$admin=DB::table('admin')->where('id','=',Auth::user()->id)->first();
		if($admin==NULL)
		return View::make('error.403');
	}
});

// URL for general pages over site
Route::get('/',array('as'=>'home','uses'=>'HomeController@home'));
Route::get('/search',array('as'=>'search','uses'=>'SearchController@search'));
Route::get('about-us',array('as'=>'home.about','uses'=>'HomeController@about'));
Route::get('frequently-asked-questions',array('as'=>'home.faq','uses'=>'HomeController@faq'));
Route::get('compare-colleges',array('as'=>'home.compare','uses'=>'HomeController@compare'));

//URL for admin jobs
Route::get('/admin',array('before'=>'admin','as'=>'admin.home','uses'=>'HomeController@admin'));

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
Route::post('/exam/',array('before'=>'login','as'=>'exam.savefile','uses'=>'ExamsController@savefile'));
Route::post('/exam/addevent',array('before'=>'login','as'=>'exam.addevent','uses'=>'ExamsController@addevent'));
Route::post('/exam/deleteevent',array('before'=>'login','as'=>'exam.deleteevent','uses'=>'ExamsController@deleteevent'));

// URLS for department pages
Route::get('/department',array('as'=>'department','uses'=>'DepartmentController@all'));
Route::get('/department/{link}',array('as'=>'department.link','uses'=>'DepartmentController@view'));
Route::get('/department/{link}/{page}',array('as'=>'department.page','uses'=>'DepartmentController@view'));
Route::post('/department/',array('before'=>'login','as'=>'department.savefile','uses'=>'DepartmentController@savefile'));

// URLS's for register and login
Route::get('/register', array('as'=>'user.create', 'uses'=>'UsersController@showlogin'));
Route::post('/register', array('as'=>'user.store', 'uses'=>'UsersController@showlogin'));
Route::get('/edit-profile', array('before'=>'login','as'=>'user.edit', 'uses'=>'UsersController@edit'));
Route::post('/edit-profile', array('before'=>'login','as'=>'user.update', 'uses'=>'UsersController@update'));
Route::get('/fblogin', array('as'=>'user.fblogin', 'uses'=>'UsersController@fblogin'));
//Route::post('/gpluslogin', array('as'=>'user.gpluslogin', 'uses'=>'UsersController@gpluslogin'));
Route::get('/login', array('as'=>'user.login.show', 'uses'=>'UsersController@showlogin'));
Route::post('/login', array('as'=>'user.login', 'uses'=>'UsersController@login'));
Route::get('/logout', array('as'=>'user.logout', 'uses'=>'UsersController@logout'));
Route::get('/user-profile', array('before'=>'login','as'=>'user.profile', 'uses'=>'UsersController@profile'));


// URL for blog operations
Route::get('/blog',array('as'=> 'blog' , 'uses' => 'BlogController@all'));
Route::get('/blog/page/{page}',array('as'=> 'blog.pages' , 'uses' => 'BlogController@all'));
Route::get('/blog/post',array('as'=> 'blog.post' , 'uses' => 'BlogController@all'));
Route::get('/blog/post/{link}',array('as'=> 'blog.post.link' , 'uses' => 'BlogController@show_post'));
Route::get('/blog/add-new',array('before'=>'login','as'=> 'blog.add' , 'uses' => 'BlogController@add'));
Route::post('/blog/add-new',array('before'=>'login','as'=> 'blog.add' , 'uses' => 'BlogController@save'));

// URL for autocomplete
Route::get('/autocomplete/{string}',array('as' => 'autocomplete' , 'uses' => 'SearchController@autocomplete'));
Route::post('/autocomplete',array('as' => 'autocomplete_get' , 'uses' => 'SearchController@autocomplete_get'));
Route::post('/review_autocomplete',array('as' => 'review_autocomplete' , 'uses' => 'SearchController@review_autocomplete'));
Route::get('/review_autocomplete',array('as' => 'review_autocomplete_get' , 'uses' => 'SearchController@review_autocomplete'));

//URL for interns and careers
Route::get('/career',array('as'=>'career','uses' => 'CareerController@home'));
Route::get('/career/add-position',array('before'=>'admin','as'=>'career.add','uses' => 'CareerController@view_add'));
Route::post('/career/add-position',array('before'=>'admin','as'=>'career.add','uses' => 'CareerController@save_add'));
Route::get('/career/all-application',array('before'=>'admin','as'=>'career.all','uses' => 'CareerController@all'));
Route::get('/career/position',array('as'=>'career.position','uses' => 'CareerController@home'));
Route::get('/career/position/{link}',array('as'=>'career.positon.link','uses' => 'CareerController@view_post'));
Route::post('/career/position/{link}',array('as'=>'career.positon.link','uses' => 'CareerController@intern_apply'));
Route::get('/career/accept-application',array('before'=>'admin','as'=>'intern.accept','uses' => 'CareerController@acceptapp'));
Route::get('/career/decline-application',array('before'=>'admin','as'=>'intern.delete','uses' => 'CareerController@deleteapp'));
Route::get('/intern/profile',array('as'=>'career.page','uses' => 'CareerController@intern_monitor'));
Route::get('/intern/profile/{id}/{posid}',array('as'=>'career.page.intern','uses' => 'CareerController@intern_monitor'));
Route::get('/intern/profile/{id}',array('as'=>'career.page.intern','uses' => 'CareerController@intern_monitor'));
Route::post('/intern/save_tasks',array('as'=>'intern.save_task','uses' => 'CareerController@intern_save_task'));
Route::post('/intern/tasks_comment',array('as'=>'intern.task_comment','uses' => 'CareerController@intern_comment_task'));
Route::get('/intern/tasks_comment_delete',array('as'=>'intern.task_comment_delete','uses' => 'CareerController@intern_comment_delete'));

Route::get('/user',function(){
	return Auth::user();
});

// Keep this line at last
Route::get('/place/{state}/{city}',array('as'=>'place.state.city','uses'=>'CollegeController@collegebyplace'));
Route::get('/place/{state}',array('as'=>'place.state','uses'=>'CollegeController@collegebyplace'));


