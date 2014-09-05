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
	private function fetch_data($path_to_file)
	{
	  $str="";
	    if(file_exists($path_to_file))
	    {
	      //$file = fopen($path_to_file, "r");
	         $str.=file_get_contents($path_to_file);
	          $str = iconv("UTF-8", "ASCII//TRANSLIT", $str);
	      //fclose($file);
	      $str=trim($str);
	      return $str;
	      }
	    else
	      return $str;
	}
	public function all(){
		$exam=DB::select('select distinct link,name from exam where eid!=0');
		
		View::share('exam',$exam);
		return View::make('exams.all');
	}

	public function savefile(){
		$filename=Input::get('filename');
		$data=Input::get('data');
		$eid=Input::get('eid');
		$path=public_path().'/other-data/exam/'.$eid;
		if(!is_dir($path))
		{
			mkdir($path,0777);
		}
		$file=$path.'/'.$filename.'.txt';
		$file = fopen($file,"w");
		fwrite($file,$data);
		fclose($file);
		return $path;
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
		$files=['about','eligibility'];
		foreach ($files as $key => $value) {
			$path=public_path().'/other-data'.'/exam/'.$exam->eid.'/'.$value.'.txt';
			$dat=trim($this->fetch_data($path));
			$exam->$value=$dat;
		}

		View::share('exam',$exam);
		$data['page_name']=$page;
		$data['link']=$link;
		View::share('data',$data);
		if($exam->admin==1)
		{
			switch ($page) {
				case 'about':
					return View::make('exams.about_edit');
					break;		
				default:
					return View::make('exams.about');
					break;
			}
		}
		else
		{
			switch ($page) {
				case 'about':
					return View::make('exams.about');
					break;		
				default:
					return View::make('exams.about');
					break;
			}
		}
	}

}
