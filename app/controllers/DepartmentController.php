<?php

class DepartmentController extends BaseController {

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
		function clean($string) {
			$string=strtolower($string);
	   $string = str_replace('/', '-', trim($string)); // Replaces all spaces with hyphens.
	   $string = str_replace(' ', '-', trim($string)); // Replaces all spaces with hyphens.
	   $string = str_replace('--', '-', $string); // Replaces all spaces with hyphens.
	   $string = str_replace('--', '-', $string); // Replaces all spaces with hyphens.
	   $string = str_replace('nbsp', '', $string); // Replaces all spaces with hyphens.
	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
		$dept=DB::select('select * from departments');
		foreach ($dept as $key => $value) {
			$link=clean($value->value);
			DB::table('departments')
            ->where('key', $value->key)
            ->update(array('link' => $link));
		}
		//View::share('exam',$exam);
		//return View::make('exams.all');
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
		$files=['about','eligibility','exam_pattern','syllabus'];
		foreach ($files as $key => $value) {
			$path=public_path().'/other-data'.'/exam/'.$exam->eid.'/'.$value.'.txt';
			$dat=trim($this->fetch_data($path));
			$exam->$value=$dat;
		}

		View::share('exam',$exam);
		$data['page_name']=$page;
		$data['link']=$link;
		$exam->related_colleges=$this->get_related_colleges($exam->eid);
		$exam->events=$this->get_events($exam->eid);
		View::share('data',$data);
		if($exam->admin==1)
		{
			switch ($page) {
				case 'about':
					return View::make('exams.about_edit');
					break;		
				case 'related_colleges':
					return View::make('exams.related_colleges');
					break;	
				case 'updates':
					return View::make('exams.updates_edit');
					break;	
				case 'exam_pattern':
					return View::make('exams.exam_pattern_edit');
					break;
				case 'syllabus':
					return View::make('exams.syllabus_edit');
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
				case 'related_colleges':
					return View::make('exams.related_colleges');
					break;	
				case 'updates':
					return View::make('exams.updates');
					break;
				case 'exam_pattern':
					return View::make('exams.exam_pattern');
					break;	
				case 'syllabus':
					return View::make('exams.syllabus');
					break;	
				default:
					return View::make('exams.about');
					break;
			}
		}
	}
	public function addevent()
	{
		$event=new Examevents;
		$event->saveFromInput(Input::all());
		$event->save();
		return Redirect::back();
	}
	public function deleteevent()
	{
		DB::table('exam_dates')->where('id', '=', Input::get('id'))->delete();
		return Redirect::back();
	}
	private function get_related_colleges($eid)
	{
		$r= DB::table('college_id')
            ->join('college_entrance_test', 'college_id.cid', '=', 'college_entrance_test.cid')
            ->where('college_entrance_test.name', '=', $eid)
            ->where('college_id.disabled','=','1')
            ->select('college_id.link','college_id.name')
            ->get();
        shuffle($r);
        $r=array_splice($r, 0,20);
        return $r;
	}

	private function get_events($eid)
	{
		$r= DB::table('exam_dates')
            ->where('eid', '=', $eid)
            ->get();
        return $r;
	}

}
