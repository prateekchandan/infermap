<?php
use Illuminate\Support\MessageBag;
class BlogController extends BaseController {

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
	public function all($page=1)
	{
		$page=$page-1;
		$all=DB::table('blog_list')->get();
		$size=sizeof($all);
		$all=DB::table('blog_list')
				->orderBy('blog_list.created_at', 'desc')
				->join('users', 'users.id', '=', 'blog_list.user_id')
				->select('user_id','name','blog_id','user_id','Title','link','content','img','blog_list.created_at','blog_list.updated_at')
				->skip($page*5)->take(5)->get();
		foreach ($all as $key => $value) {
			$value->date=date('j M Y',strtotime($value->created_at));
			if($value->img!=NULL)
			{
				$value->img=URL::asset('assets/img/blog/'.$value->img);
			}
			$value->content=substr($value->content, 0,340).'...';
			$value->link=URL::Route('blog.post').'/'.$value->link;
			$all[$key]=$value;
		}
		View::share('post',$all);
		View::share('page',$size/5 + 1);
		View::share('pageno',$page + 1);
		return View::make('blog.all');
	}

	public function show_post($link)
	{
		$all=DB::table('blog_list')->get();
		$size=sizeof($all);
		$value=DB::table('blog_list')
				->join('users', 'users.id', '=', 'blog_list.user_id')
				->where('blog_list.link','=',$link)
				->select('user_id','name','blog_id','user_id','Title','link','content','img','blog_list.created_at','blog_list.updated_at')
				->first();
	
		$value->date=date('j M Y',strtotime($value->created_at));
		if($value->img!=NULL)
		{
			$value->img=URL::asset('assets/img/blog/'.$value->img);
		}
		$value->link=URL::Route('blog.post').'/'.$value->link;
		
		View::share('p',$value);
		return View::make('blog.post');
	}

	public function add()
	{
		return View::make('blog.add');
	}

	public function save(){
		$messageBag = new MessageBag;
		$messageBag->add('title', Input::get('title'));
		$messageBag->add('content', Input::get('content'));
		$file=Input::file('img');
		
	  	if ($file!=NULL)
		{
			if(!$file->isValid()){
				$messageBag->add('error','Error Uploading! Not a valid file');
				return Redirect::back()->with('messages', $messageBag);
			}
			$MIME = array('image/gif', 'image/jpeg', 'image/png');
			if (!in_array($file->getMimeType(), $MIME)) {
				$messageBag->add('error','File must be a jpg or png or a gif image');
				return Redirect::back()->with('messages', $messageBag);
			}
			if($file->getSize()>2000000){
				$messageBag->add('error','File exceeds 2MB');
				return Redirect::back()->with('messages', $messageBag);
			}
			$dst=public_path().'/assets/img/blog';
			$filename=$file->getClientOriginalExtension();
			$img=str_shuffle(md5($file->getClientOriginalName())).'.'.$file->getClientOriginalExtension();
			$file->move($dst, $img);
		}
		else
		{
			$img=NULL;
		}
		$link=$this->clean(Input::get('title'));
		//$link='asdasd';
		Input::merge(array('link'=>$link,'img-name'=>$img));
		$post=new BlogPost;
		$post->saveFromInput(Input::all());
		$post->save();
		return Redirect::to('blog');
	}

}
