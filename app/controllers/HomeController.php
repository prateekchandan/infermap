<?php

class HomeController extends BaseController {

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

	public function home()
	{
		$location_query=DB::select('select distinct state,city from college_id where disabled=1 order by state ,city');
		$location=array();
		foreach ($location_query as $key => $place) {
			if($place->state==''||$place->state=='--Select State--')
				$place->state='Others';

			if(!isset($location[$place->state]))
				$location[$place->state]=array();

			array_push($location[$place->state],$place);
		}
		View::share('places',$location);
		return View::make('home.home');
	}
	public function about()
	{
		return View::make('home.about');
	}
	public function faq()
	{
		return View::make('home.faq');
	}
	public function compare()
	{
		return View::make('home.home');
	}
	public function admin()
	{
		return View::make('admin.home');
	}

}
