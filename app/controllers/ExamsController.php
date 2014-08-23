<?php

class ExamsController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function view($link)
	{
		$exam=DB::table('exam')->where('link', $link)->first();
		if(sizeof($exam)==0)
			return View::make('exams.error');;
		View::share('exam',$exam);
		//return View::make('exams.view');
		print_r($exam);
	}

}
