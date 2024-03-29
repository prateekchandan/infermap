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
		if(Input::has('referer'))
			View::share('id',Input::get('referer'));
		return View::make('review.main');
	}

	public function add_new(){
		if(!Input::has('college'))
			App::abort(404);
		
		if(Auth::check()){
			$user=Auth::user();
			$review_pre=DB::table('college_reviews')->where('user_id','=',Auth::user()->id)->get();
			if(sizeof($review_pre)>0){
				if($review_pre[0]->college_id==0)
				{
					$review_pre=DB::table('college_reviews')
					->join('temp_colleges','temp_colleges.temp_id','=','college_reviews.temp_college_id')
					->where('user_id','=',$user->id)->first();
					if($review_pre->name!=Input::get('college'))
						View::share('temp_college',$review_pre);
					else
						View::share('prev_msg','1');
				}
				else{
					$review_pre=DB::table('college_reviews')
					->join('college_id','college_id.cid','=','college_reviews.college_id')
					->where('user_id','=',$user->id)->first();
					View::share('other_college',$review_pre);
					
				}
			}
		}

		if(sizeof(DB::table('college_reviews')->where('user_id','=',Auth::user()->id)->get())>0)
			View::share('prev_msg','1');

		if(Input::has('referer'))
			View::share('id',Input::get('referer'));

		$data['name']=str_replace('"',"'",Input::get('college'));
		$search=new SearchController;
		$data['suggestions']=$search->autocomplete($data['name']);

		View::share('data',$data);
		return View::make('review.add_new');
	}
	private function savereferer($referer)
	{
			$id=Auth::user()->id;
			$ref=DB::table('users')->where('id','=',$referer)->get();

			$flag=true;
			if(sizeof($ref)==0)
				$flag=false;
			$ref=DB::table('review_publi')
					->where('user_refered','=',$id)
					->get();
			if(sizeof($ref)>0)
				$flag=false;
			if($flag && $referer != $id)
			{
				DB::table('review_publi')->insert(
				    array('user_admin' => $referer, 'user_refered' => $id)
				);
			}	
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
		if(Input::has('referer'))
		{
			$referer=Input::get('referer');
			$this->savereferer($referer);
		}

		if(sizeof(DB::table('college_reviews')->where('user_id','=',Auth::user()->id)->get())>0)
		{
			DB::table('college_reviews')->where('user_id','=',Auth::user()->id)->delete();
		}

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

	public function save_college_review(){
		if(Input::has('referer'))
		{
			$referer=Input::get('referer');
			$this->savereferer($referer);

		}

		if(sizeof(DB::table('college_reviews')->where('user_id','=',Auth::user()->id)->get())>0)
		{
			DB::table('college_reviews')->where('user_id','=',Auth::user()->id)->delete();
		}

		$review = new CollegeReview;
		$review->saveFromInput(Input::all());
		$review->save();
		$messageBag = new MessageBag;
		$messageBag->add('feedback', 'Successfully Added the review');
		$link=URL::Route('review_main');
		$link.='?referer=';
		$link.=Auth::user()->id;
		$messageBag->add('link',$link);
		return Redirect::back()->withErrors($messageBag);
	}

	public function feedback(){
		if(Auth::check()){
			$link=URL::Route('review_main');
			$link.='?referer=';
			$link.=Auth::user()->id;
			View::share('link',$link);
			return View::make('review.feedback');
		}
		else
			return View::make('review.main');
	}

	public function feedback_save(){
		
		if(Input::has('comment'))
		if(Input::get('comment')!='')
		{
			$comment=Input::get('comment');
			$message="<h2>Feedback on college review by ".Auth::user()->name."</h2>";
			$message.=$comment;
			if(Request::server('SERVER_NAME')!='localhost'){
				Mail::send('email.default',array('message'=>$message), function($message)
				{
					$message->from('noreply@infermap.com', 'Infermap');
				    $message->to('infermap@gmail.com')->subject('Feedback about college review');
				});
			}
		}

		return Redirect::back();
	}

	public function report()
	{
		if(!Auth::check())
			App::abort(403, 'Unauthorized action.');
		if(Auth::user()->admin!=1)
			App::abort(403, 'Unauthorized action.');
		$allreview=DB::table('college_reviews')->get();
		View::share('data',$allreview);
		foreach ($allreview as $key => $value) {
			$allreview[$key]->user=DB::table('users')->where('id','=' ,$value->user_id)->first();
			if($value->college_id==0)
				$allreview[$key]->college=DB::table('temp_colleges')->where('temp_id','=' ,$value->temp_college_id)->first();
			else
				$allreview[$key]->college=DB::table('college_id')->where('cid','=' ,$value->college_id)->first();
		}
		return View::make('review.report');
		return $allreview;
	}

}
