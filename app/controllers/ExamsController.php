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
	public function all(){
		$exam=DB::table('exam')->get();
		foreach ($exam as $key => $row) {
			echo '<a href="exam/'.$row->link.'">'.$row->name.'</a><br>';
		}
	}

	public function view($link,$page="about")
	{
		$exam=DB::table('exam')->where('link', $link)->first();
		if(sizeof($exam)==0)
			return View::make('exams.error');

		$exam->admin=0;
		if(Auth::check())
		{
			$user=Auth::user();
			if($user->admin >= 1)
				$exam->admin=1;
		}
		View::share('exam',$exam);
		$data['page_name']=$page;
		$data['link']=$link;
		View::share('data',$data);
		switch ($page) {
				case 'about':
					return View::make('exams.about');
					break;
				
					break;
				default:
					return View::make('exams.about');
					break;
			}
	}

}
