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
			$pre=DB::table('intern_application')
			->where('user_id','=', Auth::user()->id)
			->where('position_id','=', $post->id)
			->first();
			if($pre!=NULL){
				if($pre->accept==0)
					View::Share('applied','true');
				else
					View::Share('accept','true');
			}
		}
		View::Share('post',$post);
		return View::make('career.post');
	}

	public function intern_apply()
	{
		$messageBag = new MessageBag;

		$pre=DB::table('intern_application')
			->where('user_id','=', Auth::user()->id)
			->where('position_id','=', Input::get('id'))
			->first();

		if($pre!=NULL){
			$messageBag->add('error','You have already applied for this position');
			return Redirect::back()->with('messages', $messageBag);
		}

		$file=Input::file('resume');
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
		else{
			$messageBag->add('error','Error Uploading File. Please upload files less than 2MB');
			return Redirect::back()->with('messages', $messageBag);
		}
		$applicant=array();
		$applicant['name']=Auth::user()->name;
		$applicant['email']=Auth::user()->email;
		$applicant['phone']=Input::get('phone');
		$post=DB::table('intern_positions')->where('id','=',Input::get('id'))->first();
		$applicant['post']=$post->position;
		$applicant['resume']=URL::asset('assets/resume/'.$resumename);
		$resume=public_path().'/assets/resume/'.$resumename;

		
		DB::table('intern_application')->insert(
		    array('user_id' => Auth::user()->id, 'position_id' => Input::get('id')
		    		,'resume_link'=>URL::asset('assets/resume/'.$resumename)
		    		,'resume_path'=>'assets/resume/'.$resumename)
		);
		if(Request::server('SERVER_NAME')!='localhost'){
			Mail::send('email.intern', $applicant, function($message)
			{
				$message->from('noreply@infermap.com', 'Infermap');
			    $message->to('infermap@gmail.com')->subject('New Applicant');
			});
		}
		$messageBag->add('success','You have successfully applied for this');
		return Redirect::back()->with('messages', $messageBag);
	}

	public function all()
	{
		$posts=DB::table('intern_application')
			->join('users','users.id','=','intern_application.user_id')
			->join('intern_positions','intern_positions.id','=','intern_application.position_id')
			->get();
		View::Share('app',$posts);
		return View::make('career.all');
	}

	public function acceptapp()
	{
		DB::table('intern_application')
		->where('user_id','=',Input::get('user'))
		->where('position_id','=',Input::get('pos'))
		->update(array('accept' => 1));

		if(Request::server('SERVER_NAME')!='localhost'){
			Mail::send('email.accept_intern',array(), function($message)
			{
				$user=DB::table('users')->where('id','=',Input::get('user'))->first();
				$message->from('noreply@infermap.com', 'Infermap');
			    $message->to($user->email)->subject('Selected for Intern at Infermap');
			});
		}

		return Redirect::back();
	}
	public function deleteapp()
	{
		$app=DB::table('intern_application')
		->where('user_id','=',Input::get('user'))
		->where('position_id','=',Input::get('pos'))->first();
		if($app!=NULL){
			$path = public_path().'/'.$app->resume_path;
			unlink($path);
		}
		DB::table('intern_application')
		->where('user_id','=',Input::get('user'))
		->where('position_id','=',Input::get('pos'))->delete();

		return Redirect::back();

	}

	private function is_an_intern($id='',$pos=''){
		if($id==''||$pos=='')
		{
			return false;
		}
		$position=DB::table('intern_application')
			->where('user_id','=',$id)
			->where('position_id','=',$pos)
			->where('accept','=','1')
			->get();
		if(sizeof($position)==0){
			return false;
		}
		if(!Auth::check()){
			return false;
		}
		if(!(Auth::user()->id==$id || DB::table('admin')->where('id','=',Auth::user()->id==$id)->first()==NULL)){
			return false;
		}
		return true;
	}
	public function intern_monitor($id='',$pos='')
	{
		if(!$this->is_an_intern($id,$pos)){
			return View::make('error.403');
		}

		$alltasks=DB::table('intern_tasks')
			->where('user_id','=',$id)
			->where('position_id','=',$pos)
			->get();
		
		if(DB::table('admin')->where('id','=',Auth::user()->id)->first()!=NULL)
			View::share('admin','=','1');

		$comments_all=DB::table('intern_tasks_comment')
			->join('intern_tasks','intern_tasks.id','=','intern_tasks_comment.task_id')
			->join('users','users.id','=','intern_tasks_comment.user_id')
			->where('intern_tasks.user_id','=',$id)
			->where('intern_tasks.position_id','=',$pos)
			->get();
		$comments=array();
		for($i=1;$i<=8;$i++) $comments[$i]=array();

		foreach ($comments_all as $key => $comment) {
			array_push($comments[$comment->week],$comment);
		}

		$tasks=array();

		foreach ($alltasks as $key => $task) {
			$tasks[$task->week]=$task;
		}

		View::share('id',$id);
		View::share('pos',$pos);
		View::share('tasks',$tasks);
		View::share('commentlist',$comments);
		View::share('weeks',array(1,2,3,4,5,6,7,8));
		return View::make('career.work_profile');
	}

	public function intern_save_task()
	{
		$id=Input::get('user_id');
		$pos=Input::get('position_id');
		$week=Input::get('week');
		$ps=Input::get('ps');
		$work=Input::get('work_status');

		if(!$this->is_an_intern($id,$pos)){
			return View::make('error.403');
		}

		$alltasks=DB::table('intern_tasks')
			->where('user_id','=',$id)
			->where('position_id','=',$pos)
			->where('week','=',$week)
			->get();

		if(	sizeof($alltasks)==0){
			$alltasks=DB::table('intern_tasks')
			->insert(array('user_id'=>$id,'position_id'=>$pos,'week'=>$week,'ps'=>$ps,'work_status'=>$work));
		}
		else{
			$alltasks=DB::table('intern_tasks')
			->where('user_id','=',$id)
			->where('position_id','=',$pos)
			->where('week','=',$week)
			->update(array('ps'=>$ps,'work_status'=>$work));
		}

		return Redirect::back();
	}

	public function intern_comment_task()
	{
		if(!Auth::check()){
			return View::make('error.403');
		}

		$task_id=Input::get('task_id');
		$message=Input::get('message');
		$user_id=Auth::user()->id;

		$task=DB::table('intern_tasks')
			->where('id','=',$task_id)->first();
		if($task==NULL){
			return View::make('error.403');
		}

		DB::table('intern_tasks_comment')->insert(array('user_id'=>$user_id,'task_id'=>$task_id,'message'=>$message));
		return Redirect::back();

	}
	public function intern_comment_delete()
	{
		if(!Auth::check()){
			return View::make('error.403');
		}

		$id=Input::get('id');
		$cmnt=DB::table('intern_tasks_comment')->where('comment_id','=',$id)->first();
		//print_r($cmnt);
		if($cmnt!=NULL&&Auth::user()->id==$cmnt->user_id)
			DB::table('intern_tasks_comment')->where('comment_id','=',$id)->delete();
		return Redirect::back();
	}
	
}
