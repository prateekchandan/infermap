<?php
use Illuminate\Support\MessageBag;
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
	public function save_new(){
		if(!Auth::check())
		{
			$messageBag = new MessageBag;
			$messageBag->add('auth.mismatch', 'Please login to continue');
			return Redirect::back()
				->withInput()
				->withErrors($messageBag);
		}
		//dd(Input::all());
		$temp_college=Tempcolleges::where('name', '=', Input::get('name'))->take(1)->get();
		if(sizeof($temp_college)>0)
			$temp_id=$temp_college[0]->temp_id;
		else{
			$temp_college = new Tempcolleges;
			$temp_college->saveFromInput(Input::all());
			$temp_college->save();
			$temp_college=Tempcolleges::where('name', '=', Input::get('name'))->take(1)->get();
			$temp_id=$temp_college[0]->temp_id;
		}
		Input::merge(array('temp_college_id'=>$temp_id));
		$review = new CollegeReview;
		$review->saveFromInput(Input::all());
		$review->save();
		$messageBag = new MessageBag;
		$messageBag->add('feedback', 'Successfully Added the review');
		return Redirect::route('review_feedback')->withErrors($messageBag);
	}

	public function feedback(){
		return View::make('review.feedback');
	}

	private function refer_friend($email)
	{
		if(!Auth::check()){return;}
		$sender=Auth::user()->email;

	}

	public function feedback_save(){
		if(Input::has('email1'))
			if(Input::get('email1')!='')
				$this->refer_friend(Input::get('email1'));

		if(Input::has('email2'))
			if(Input::get('email2')!='')
				$this->refer_friend(Input::get('email2'));

		if(Input::has('email3'))
			if(Input::get('email3')!='')
				$this->refer_friend(Input::get('email3'));

		if(Input::has('comment'))
			if(Input::get('comment')!='')
			{
				$comment=Input::get('comment');
			}

		return Redirect::to('/');
	}

}
