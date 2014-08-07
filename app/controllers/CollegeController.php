<?php

class CollegeController extends BaseController {

	
	public function clean($string) {
	   $string = str_replace(' ', '-', trim($string)); // Replaces all spaces with hyphens.
	   $string = str_replace('--', '-', $string); // Replaces all spaces with hyphens.
	   $string = str_replace('nbsp', '', $string); // Replaces all spaces with hyphens.
	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}

	public function home($link,$page)
	{
		$all =  DB::connection('infermap')->select('select * from college_id');
		
	}

	public function college($link)
	{
		$all = DB::connection('infermap')->select('select * from college_id where link = ?',array($link));
		if(sizeof($all)==0)
			return View::make('college.error');

		else
		{
			$data=(array)$all[0];
			View::share('data',$data);
			 return View::make('college.layout');
		}
	}

	public function show_all()
	{
		$all =  DB::connection('infermap')->select('select * from college_id');
		foreach ($all as $key => $value) {
			$value = (array) $value;
			echo '<a href="';
			echo URL::to('college').'/'.$value['link'].'">';
			echo $value['name'];
			echo '<a><br>';
			
		}
	}	

}
