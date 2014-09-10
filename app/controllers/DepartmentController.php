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
		$dept=DB::select('select * from departments');
		
		View::share('department',$dept);
		return View::make('departments.all');
	}

	public function savefile(){
		$filename=Input::get('filename');
		$data=Input::get('data');
		$key=Input::get('eid');
		$path=public_path().'/other-data/department/'.$key;
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
		$department=DB::table('departments')->where('link', $link)->first();
		if(sizeof($department)==0)
			return View::make('departments.error');

		
		$department->admin=0;
		if(Auth::check())
		{
			$user=Auth::user();
			if($user->admin >= 1)
				$department->admin=1;
		}
		$files=['intro','field','top_companies','salary_package'];
		foreach ($files as $key => $value) {
			$path=public_path().'/other-data'.'/department/'.$department->key.'/'.$value.'.txt';
			$dat=trim($this->fetch_data($path));
			$department->$value=$dat;
		}

		View::share('department',$department);
		$data['page_name']=$page;
		$data['link']=$link;
		$department->related_colleges=$this->get_related_colleges($department->key);
		View::share('data',$data);
		if($department->admin==1)
		{
			switch ($page) {
				case 'about':
					return View::make('departments.about_edit');
					break;		
				case 'top_colleges':
					return View::make('departments.top_colleges');
					break;
				case 'placement_opportunities':
					return View::make('departments.placement_opportunities_edit');
					break;
				case 'academic_info':
					return View::make('departments.academic_info_edit');
					break;						
				default:
					return View::make('departments.about');
					break;
			}
		}
		else
		{
			switch ($page) {
				case 'about':
					return View::make('departments.about');
					break;	
				case 'top_colleges':
					return View::make('departments.top_colleges');
					break;
				case 'academic_info':
					return View::make('departments.academic_info');
					break;
				case 'placement_opportunities':
					return View::make('departments.placement_opportunities');
					break;		
				default:
					return View::make('departments.about');
					break;
			}
		}
	}
	private function get_related_colleges($key)
	{
		$r= DB::table('college_id')
            ->join('college_department', 'college_id.cid', '=', 'college_department.cid')
            ->where('college_department.'.$key, '=','1')
            ->where('college_id.disabled','=','1')
            ->select('college_id.link','college_id.name','college_id.state','college_id.city')
            ->orderby('college_id.state')
            ->orderby('college_id.city')
            ->get();
         $ret=array();
         $pre=0;
         foreach ($r as $key => $value) {
         	if($value->state=='--Select State--')
         		$value->state="-N/A-";
         	if($pre===$value->state)
         		array_push($ret[$value->state], $value);
         	else
         	{
         		$ret[$value->state]=array($value);
         		$pre=$value->state;
         	}
         }
        return $ret;
	}

	private function get_events($eid)
	{
		$r= DB::table('exam_dates')
            ->where('eid', '=', $eid)
            ->get();
        return $r;
	}

}
