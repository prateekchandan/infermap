<?php

class ReviewController extends BaseController {

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

	public function get_college()
	{
		return View::make('review.main');
	}

	public function add_new(){
		if(!Input::has('college'))
			App::abort(404);
		
		$data['name']=str_replace('"',"'",Input::get('college'));
		$search=new SearchController;
		$data['suggestions']=$search->autocomplete($data['name']);

		View::share('data',$data);
		return View::make('review.add_new');
		

	}

}
