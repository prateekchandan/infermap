<?php

class CollegeController extends BaseController {

	#public $path_to_data=asset('data');

	public function clean($string) {
	   $string = str_replace(' ', '-', trim($string)); // Replaces all spaces with hyphens.
	   $string = str_replace('--', '-', $string); // Replaces all spaces with hyphens.
	   $string = str_replace('nbsp', '', $string); // Replaces all spaces with hyphens.
	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}


	public function college($link,$page='about')
	{
		$all = DB::connection('infermap')->select('select * from college_id where link = ?',array($link));
		if(sizeof($all)==0)
			return View::make('college.error');

		else
		{
			$data=(array)$all[0];
			$data['location_bar']="";
			$data['images']=array();
			// getting image logo
			if(File::exists(public_path().'/data'.'/logo200/'.$data['cid'].'.png'))
				$data['logo-img']=asset('/data'.'/logo200/'.$data['cid'].'.png');

			else if(File::exists(public_path().'/data'.'/'.$data['cid'].'/logo.png'))
				$data['logo-img']=asset('/data'.'/'.$data['cid'].'/logo.png');
			else
				$data['logo-img']='0';

			// getting list of all images in directory
			try{
				$img_dir = public_path().'/data'.'/'.$data['cid'].'/images';
				$images = scandir($img_dir);
				foreach($images as $img)     { 
					if($img=='.'||$img=='..'||$img=='logo.png'||$img=='thumbnail')
						continue;
					array_push($data['images'], asset('/data'.'/'.$data['cid'].'/images/'.$img));
				}
			}
			catch(Exception $e){}

			$data['related-colleges']=$this->get_related_colleges($data['cid'],4);
			$data['links']=$this->get_links_social($data['cid']);			
			$data['fee_category']=$this->get_fee_category($data['cid']);	
			$data['fee_type'] = DB::connection('college_data')->select('select distinct course as type from fee_t'.$data['cid']);

			
			if(sizeof($data['images'])==0) $data['images']=0;								
			$check=0;
			if($data['area']!=''){
				$data['location_bar']=$data['area'];
				$check=1;
			}
			if($data['city']!='')
			{
				if($check==1)
				$data['location_bar'].=' , ';
				$data['location_bar'].=$data['city'];
				$check=1;
			}
			if($data['state']!=''){
				if($check==1)
				$data['location_bar'].=' , ';
				$data['location_bar'].=$data['state'];
			}
			$allexams=DB::connection('infermap')->select('select distinct name,type from college_entrance_test where cid =? && name!=0',array($data['cid']));
			$data['allexams']=array();
			foreach ($allexams as $key => $value) {
				$exam=DB::table('exam')->where('eid', $value->name)->first();
				$exam->type=DB::table('allcourses')->where('name','=',$exam->type)->first()->value;
				foreach ($data['allexams'] as $pre_ex) {
					if($pre_ex->link==$exam->link)
						$value=0;
				}
				if($value)
				array_push($data['allexams'], $exam);
			}
		
			$data['page_name']=$page;		
			View::share('data',$data);
			switch ($page) {
				case 'about':
					return View::make('college.about');
					break;
				case 'admission':
					View::share('admission_table',$this->get_admission_table($data['cid']));
					return View::make('college.admission');
					break;
				case 'fees':
					View::share('fees_table',$this->get_fees_table($data['cid']));
					return View::make('college.fees');
					break;
				case 'placements':
					View::share('placement_table',$this->get_placement_table($data['cid']));
					return View::make('college.placements');
					break;
				case 'facilities':
					return View::make('college.facilities');
					break;
				case 'review':
					if(Input::has('referer'))
						View::share('id',Input::get('referer'));
					if(Auth::check()){
						$user=Auth::user();
						$review_pre=DB::table('college_reviews')->where('user_id','=',Auth::user()->id)->get();
						if(sizeof($review_pre)>0){
							if($review_pre[0]->college_id==0)
							{
								$review_pre=DB::table('college_reviews')
								->join('temp_colleges','temp_colleges.temp_id','=','college_reviews.temp_college_id')
								->where('user_id','=',$user->id)->first();
								View::share('temp_college',$review_pre);
							}
							else{
								$review_pre=DB::table('college_reviews')
								->join('college_id','college_id.cid','=','college_reviews.college_id')
								->where('user_id','=',$user->id)->first();

								if($review_pre->college_id!=$data['cid'])
									View::share('other_college',$review_pre);
								else
									View::share('prev_msg','1');
							}
						}
					}
					View::share('review_depts',$this->get_review_depts($data['cid']));
					return View::make('college.review');
					break;
				default:
					return View::make('college.about');
					break;
			}
			
		}
	}

	private function get_review_depts($cid){
		$correct_courses=DB::table('allcourses')->where('active','=','1')->get();
		$str='';
		foreach ($correct_courses as $key => $value) {
			if($str!='')
				$str.=' || ';
			$str.='program="'.$value->name.'"';
			

		}
		$query='select did,department,program from t'.$cid.' where '.$str;
		$depts=DB::connection('college_data')->select($query);
		return $depts;
	}

	private function get_links_social($cid){
		$links=['weblink','fblink','twitterlink','pluslink','linkedlink'];
		$return=array();
		foreach ($links as $key => $link) {
			if(File::exists(public_path().'/data'.'/'.$cid.'/contact/'.$link.'.txt')){
				if(trim(file_get_contents(public_path().'/data'.'/'.$cid.'/contact/'.$link.'.txt'))!=''){
					$return[$link]=file_get_contents(public_path().'/data'.'/'.$cid.'/contact/'.$link.'.txt');
				}
			}
		}
		
		return $return;
	}
	private function get_related_colleges($cid,$no=10){
		$allcollege=DB::connection('infermap')->select('select * from college_id where disabled="1" order by -rank desc');

		$college=DB::table('college_id')->where('cid','=',$cid)->first();

		$return = array();
		foreach ($allcollege as $key => $value) {

			$allcollege[$key]->score=0;

			if($college->cid==$value->cid)
				continue;

			if($value->state==$college->state)
				$allcollege[$key]->score+=2;
			if($value->city==$college->city)
				$allcollege[$key]->score+=2;
			if($value->type==$college->type)
				$allcollege[$key]->score+=2;

			if($value->rank != null && $college->rank!=null)
			{
				$allcollege[$key]->score+=15-min(abs($college->rank-$value->rank),15);
			}
		}
		function cmp($a1,$a2)
		{
			return $a1->score<$a2->score;
		}
		usort($allcollege, 'cmp');

		$temp=array();
		for ($i=0; $i < 2 * $no ; $i++) { 
			array_push($temp, $allcollege[$i]);
		}
		shuffle($temp);

		for ($i=0; $i <  $no ; $i++) { 
			array_push($return, $temp[$i]);
		}

		return $return;
	}

	private function get_admission_table($cid){
		$return=array();
		$types = DB::connection('infermap')->select('select distinct type from college_entrance_test where cid = ? && (type="barch" || type="bpharm" || type="be" || type="bscit" || type="btech" || type="dd" ) ',array($cid));
		$category = DB::table('category')->get();
		foreach ($types as $types_key => $type) {
			$type=$type->type;
			$table=array();

			$names = DB::connection('infermap')->select('select name from college_entrance_test where cid = ? && type =?',array($cid,$type));

			foreach ($names as $name_key => $name) {
				$name=$name->name;
				$t1=array();
				$college_exams = DB::connection('infermap')->select('select * from college_entrance_test where cid = ? && type =? && name = ?',array($cid,$type,$name));

				$cat_id=array();
                $iter=0;
                $exampr=array();
                $cat_name=array();
                foreach ($category as $key) {
                    $cat_id[$iter]=$key->id;
                    $exampr[$iter]=0;
                    $cat_name[$iter]=$key->name;
                    $iter+=1;
                }

                $t1[0]=array('SL No','Department','Intake');
                $query="select department,program,intake";
                foreach ($college_exams as $college_exam_key => $row) 
                {
                    for ($i=0; $i < sizeof($cat_id); $i++) { 
	                    if($row->$cat_id[$i]!=0)
	                    {
	                        $exampr[$i]=$row->$cat_id[$i];
	                        $query.=",".$cat_id[$i];
	                        array_push($t1[0],ucfirst($cat_name[$i]));
	                    }
	                    else
	                       $cat_name[$i]="";
                	}
                }
                $query.=" from t".$cid." where program = ? && name= ?";

				$closing_ranks = DB::connection('college_data')->select($query,array($type,$name));

				$rc=1;

				foreach ($closing_ranks as $closing_rank_key => $row) {
					$t1[$rc]=[$rc,$row->department,($row->intake!='0'?$row->intake:'-')];
					for ($i=0; $i <sizeof($cat_id) ; $i++) {
                       	if($cat_name[$i]!="")
                        {
                        	if($row->$cat_id[$i]!=0)
	                        	array_push($t1[$rc],$row->$cat_id[$i]);
                            else
	                        	array_push($t1[$rc],'-');
                        }
                    }
                     
                    $rc+=1;
				}

				$name=DB::table('exam')->where('eid', $name)->first();
				$name=$name->name;
				if($name=='-No Exam Selected-')
					$name="N/A";

				if(sizeof($t1)>1)
                $table[$name]=$t1;

				
			}

			$type=DB::table('allcourses')->where('name', $type)->first();
			$type=$type->value;

			if(sizeof($table)>0)
			$return[$type]=$table;
		}
		
		if(sizeof($return)==0)
			$return=0;

		return $return;

	}

	private function get_fees_table($cid){
		$fees = DB::connection('college_data')->table('fee_t'.$cid)->get();
		$return=array();
		$return[0]=array('Course','Category','Tution Fee','Miscellanous Fee','Mess and Hostel Fee','Total','Refundable Fee');
		foreach ($fees as $key => $row) {
			$r1=array();
			$fee_array=['course','category','tut_fee','misc_fee','mnh_fee','tot','refundable_fee'];
			foreach ($fee_array as $key) {
				if($row->$key!='0')
					array_push($r1,$row->$key);
				else
					array_push($r1, '-');
			}
			array_push($return, $r1);
		}
		if(sizeof($return)<2)
			$return=0;
		return $return;
	}

	private function get_fee_category($cid)
	{
		$category = DB::connection('college_data')->select('select distinct category from fee_t'.$cid);
		if(sizeof($category)==1 && $category[0]->category =='0')
			$category[0]->category='all categories';
		return $category;
	}

	private function get_placement_table($cid){
		$return=array();
		$types = DB::connection('infermap')->select('select distinct type from college_entrance_test where cid = ?',array($cid));
		$category = DB::table('category')->get();
		foreach ($types as $types_key => $type) {
			$type=$type->type;
			$table=array();

			$placements=DB::connection('college_data')->select("select department,total_intake,placed,min_package,max_package,avg_package from t".$cid." where (placed != 0 || min_package!=0 || max_package!=0 || avg_package!=0) && program=?",array($type));

			$table[0]=array('Sl. No.','Depatment','Total Intake','Placed','Min Package','Max Package','Average Package');
			$type=DB::table('allcourses')->where('name', $type)->first();
			$type=$type->value;
			$rc=1;
			foreach ($placements as $key => $row) {
				$array_row=array('department','total_intake','placed','min_package','max_package','avg_package');
				$table[$rc]=array($rc);
				foreach ($array_row as $key) {
				if($row->$key!='0')
					array_push($table[$rc],$row->$key);
				else
					array_push($table[$rc], '-');
				}
				$rc+=1;
			}
			
			if(sizeof($table)>1)
			$return[$type]=$table;
		}
		
		if(sizeof($return)==0)
			$return=0;

		return $return;
	}

	public function show_all()
	{
		$all =  DB::connection('infermap')->select('select * from college_id where disabled=1');
		foreach ($all as $key => $value) {
			$value = (array) $value;
			echo '<a href="';
			echo URL::to('college').'/'.$value['link'].'">';
			echo $value['name'];
			echo '<a><br>';
			
		}
	}	

	public function collegebyplace($state,$city="all")
	{
		if($state=="error"||$city=="error")
			return View::make('college.error');
		if($city=='all')
		{
			$all=DB::table('college_id')->where('state', "=",$state)->where('disabled','=','1')->orderby('rank')->get();
		}
		else
		{
			$all=DB::table('college_id')->where('state', "=",$state)->where('city','=',$city)->where('disabled','=','1')->orderby('rank')->get();
		}
		if($city=='all')
			$title="Colleges in ".$state;
		else
			$title="Colleges in ".$city." , ".$state;
		View::share('title',$title);
		View::share('list',$all);
		if(sizeof($all)==0)
			return View::make('college.error');
		else
			return View::make('college.listall');
	}

}
