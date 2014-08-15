<?php

class CollegeController extends BaseController {

	#public $path_to_data=asset('data');

	public function clean($string) {
	   $string = str_replace(' ', '-', trim($string)); // Replaces all spaces with hyphens.
	   $string = str_replace('--', '-', $string); // Replaces all spaces with hyphens.
	   $string = str_replace('nbsp', '', $string); // Replaces all spaces with hyphens.
	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}

	public function home($link,$page)
	{
		$all =  DB::connection('infermap')->select('select * from college_id where ');
		
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
			$data['logo-img']=asset('/data'.'/'.$data['cid'].'/logo.png');
			if(!File::exists(public_path().'/data'.'/'.$data['cid'].'/logo.png'))
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
				default:
					return View::make('college.about');
					break;
			}
			
		}
	}

	private function get_admission_table($cid){
		$return=array();
		$types = DB::connection('infermap')->select('select distinct type from college_entrance_test where cid = ?',array($cid));
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
					$t1[$rc]=[$rc,$row->department,$row->intake];
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
					$name="Not Specified";

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
				if($row->$key!=0||$key=='course')
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
		$all =  DB::connection('infermap')->select('select * from college_id where disabled = 1');
		foreach ($all as $key => $value) {
			$value = (array) $value;
			echo '<a href="';
			echo URL::to('college').'/'.$value['link'].'">';
			echo $value['name'];
			echo '<a><br>';
			
		}
	}	

}
