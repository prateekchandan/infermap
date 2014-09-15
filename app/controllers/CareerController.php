<?php
use Illuminate\Support\MessageBag;

class CareerController extends BaseController {

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
	public function clean($string) {
	   $string = str_replace(' ', '-', trim($string)); 			// Replaces all spaces with hyphens.
	   $string = str_replace('--', '-', $string); 				// Replaces all spaces with hyphens.
	   $string = str_replace('nbsp', '', $string); 				// Replaces all spaces with hyphens.
	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 	// Removes special chars.
	}
	public function home()
	{
		$posts=DB::table('intern_positions')->get();
		$ret=array();
		foreach ($posts as $key => $post) {
			if(!isset($ret[$post->type]))
				$ret[$post->type]=array();
			array_push($ret[$post->type],$post);
		}
		View::Share('post',$ret);
		return View::make('career.home');
	}
	public function view_add($value='')
	{
		return View::make('career.addnew');
	}
	public function save_add($value='')
	{
		Input::merge(array('link' => $this->clean(Input::get('position')) ));
		$post=new InternPosts;
		$post->saveFromInput(Input::all());
		$post->save();
		return Redirect::route('career');
	}
	public function view_post($link)
	{
		$post=DB::table('intern_positions')->where('link','=',$link)->first();
		if($post==NULL)
		{
			return Redirect::route('career');
		}
		if(Auth::check()){
			View::Share('user',Auth::user());
		}
		View::Share('post',$post);
		return View::make('career.post');
	}

	public function intern_apply()
	{
		$file=Input::file('resume');
		$messageBag = new MessageBag;
		$messageBag->add('title', Input::get('title'));
		$messageBag->add('content', Input::get('content'));
		if ($file!=NULL)
		{
			if(!$file->isValid()){
				$messageBag->add('error','Error Uploading! Not a valid file');
				return Redirect::back()->with('messages', $messageBag);
			}
			if($file->getSize()>2000000){
				$messageBag->add('error','File exceeds 2MB');
				return Redirect::back()->with('messages', $messageBag);
			}
			$dst=public_path().'/assets/resume';
			$filename=$file->getClientOriginalExtension();
			$resumename=str_shuffle(md5($file->getClientOriginalName())).'.'.$file->getClientOriginalExtension();
			$file->move($dst, $resumename);
		}
		$applicant=array();
		$applicant['name']=Auth::user()->name;
		$applicant['email']=Auth::user()->email;
		$applicant['phone']=Input::get('phone');
		$post=DB::table('intern_positions')->where('id','=',Input::get('id'))->first();
		$applicant['post']=$post->position;
		$applicant['resume']=URL::asset('assets/resume/'.$resumename);
		$resume=public_path().'/assets/resume/'.$resumename;
		Mail::send('email.intern', $applicant, function($message)
		{
			$message->from('noreply@infermap.com', 'Infermap');
		    $message->to('infermap@gmail.com')->subject('New Applicant');
		});
		return Redirect::back();
	}
	
}
