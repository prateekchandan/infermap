<?php

class SearchController extends BaseController {

	protected $pattern = '/[:,.-_ ()]/';

	public $filter_query_inputs=array('state'=>'state','city'=>'city','exam'=>'exam-name','rank'=>'exam-rank','category'=>'exam-category','dept'=>'department','dept-search'=>"false",'location-search'=>"false",'exam-search'=>'false');

	private function cleanStr($str)
	{
		$str=strtolower($str);
		$prep=array("amp","of","the","and","to","in","");
		$str=trim($str);
		$str=preg_replace('/[^A-Za-z0-9 \-]/', '', $str);
		$arr=explode(' ', $str);
		$ret=array();
		foreach ($arr as $value) {
			if(!in_array($value, $prep))
				array_push($ret, $value);
		}
		//print_r($ret);
		return $ret;
	}

	private function modified_levenshtein($str1,$str2){
		//if ($str1 == $str2) return 0;
	    if (strlen($str1) == 0) return strlen($str2);
	    if (strlen($str2) == 0) return strlen($str1);

	    $l1=strlen($str1);
	    $l2=strlen($str2);

	    $v0=array();
	    $v1=array_fill(0, $l2+1, 0);

	    for ($i=0; $i <= $l2; $i++) { 
	    	$v0[$i]=$i;
	    }

	    for ($i=0; $i < $l1; $i++) { 
	    	$v1[0]=$i+1;

	    	for ($j=0; $j < $l2; $j++) { 
	    		$fac=max(1-(0.1*$j)-(0.1*$i),0);
	    		$cost = ($str1[$i] == $str2[$j])? 0 : $fac;
	    		$v1[$j+1]= min($v1[$j] + $fac, $v0[$j + 1] + $fac, $v0[$j] + $cost);
	    		//echo ($v1[$j] + 1).':'.($v0[$j + 1] + 1).':'.( $v0[$j] + $cost).':'.($v1[$j+1]).'<br>';
	    	}

	    	for ($j=0; $j <= $l2; $j++) { 
		    	$v0[$j]=$v1[$j];
		    	//echo $v0[$j].' ';
			}
			//echo $v1[$l2].'<br>';
	    }
	    return $v0[$l2];
	}

	public function mylev($array1, $str){
		$array2 = $this->cleanStr($str);
		$sum = 0;
		for($i = 0; $i < sizeof($array1); $i++){
			$min = 1000;
			for($j = 0; $j < sizeof($array2); $j++){
				if($array1[$i] == '');
				else{
					$temp = $this->modified_levenshtein($array1[$i], $array2[$j]) + (0.5*abs($j-$i));
					//$temp = levenshtein($array1[$i], $array2[$j]);
					if($temp < $min) $min = $temp;
				}
			}
			$sum = $sum + $min;
		}
		return $sum;
	}


	public function autocomplete($input,$no=10)
	{

		$allcollege=DB::connection('infermap')->select('select city,state,cid,name,alias1,alias2,alias3,alias4,alias5,alias6,alias7,alias8,rank,link from college_id where disabled="1" order by -rank desc');

		$arryain = $this->cleanStr($input);

		$retarray=array();

		function cmp($c1,$c2){
			if($c1->score==$c2->score){
				if(($c1->rank == NULL || $c1->rank=='') && ($c2->rank == NULL && $c2->rank==''))
					return 0;
				else if($c1->rank == '' || $c1->rank == NULL)
					return 0;
				else if($c2->rank == '' || $c2->rank == NULL)
					return 1;
				else
					return $c1->rank > $c2 ->rank;
			}
			return $c1->score > $c2->score;
		}

		foreach ($allcollege as $key=> $college) {
			$college->score = $this->mylev($arryain, strtolower($college->name));
			for($i = 1; $i < 11; $i++){
			
				if($i<9){
					$alias = 'alias'.$i;
					$a=$college->$alias;
					if([$college->$alias]!=""){
						$temp = $this->mylev($arryain, strtolower($a));
						if($temp < $college->score) $college->score = $temp;
					}
				}
				else if($i==9)
				{
					$a=$college->city;
					if($a!="")
					{
						$temp = $this->mylev($arryain, strtolower($a));
						if($temp < $college->score) $college->score = $temp;
					}
				}
				else if($i == 10)
				{
					$a=$college->state;
					if($a!="")
					{
						$temp = $this->mylev($arryain, strtolower($a));
						if($temp < $college->score) $college->score = $temp;
					}
				}
				
			}
			$allcollege[$key]=$college;
			/*if($key<$no)
			{
				array_push($retarray, $college);
			}
			if($key==$no)
			{
				uasort($retarray, 'cmp');

			}
			if($key>=$no)
			{
				if(cmp($retarray[$no-1],$college))
				{	/*echo $retarray[$no-1]->score.' > '.$college->score;
					foreach ($retarray as $key => $ret) {

						echo $ret->name.$ret->score.' '.$ret->rank.'<br>';
					}

					echo '<br>-------------------<br>';

					for ($i=$no-1; $i > 0; $i--) { 
						if(cmp($retarray[$i-1],$college))
						{
							$retarray[$i]=$retarray[$i-1];
						}
						else
						{
			//				echo 'break at : '.$i.'<br>';
							break;
						}
					}
			//		echo ' '.$i.' ';
					$retarray[$i]=$college;
			//		echo '<br>--------------------<br>';
				}
			}*/
		}
		
		/*foreach ($retarray as $key => $ret) {

						echo $ret->name.$ret->score.' '.$ret->rank.'<br>';
		}
		echo '<br>--------------------<br>';*/
		uasort($allcollege, 'cmp');
		$allcollege=array_splice($allcollege, 0,$no);
		
		function getdata($college)
		{
			$name=$college->name.(($college->city!="" && App::make('SearchController')->mylev(array(strtolower($college->city)),strtolower($college->name)) > 0)?", ".$college->city:"");

			return array(
				'name' =>$name,
				'link' => $college->link,
				'score' => $college->score,
			);
		}
		$allcollege=array_map("getdata",$allcollege);
		return $allcollege;
	}

	public function review_autocomplete(){

		$str=Input::get('str','');
		$ret=$this->autocomplete($str,10);
		/*echo '<br>-------------------------<br>';
		foreach ($ret as $key => $value) {
			echo $value['name'].$value['score'].'<br>';
		}*/
		foreach ($ret as $key => $value) {
			$ret[$key]['link']='college/'.$ret[$key]['link'].'/review';
		}
		$allcollege=DB::connection('infermap')->select('select name from temp_colleges');
		$arryain = $this->cleanStr($str);
		foreach ($allcollege as $key=> $college) {
			$college->score = $this->mylev($arryain, strtolower($college->name));
			$college->link = 'review/add?college='.$college->name;
			$allcollege[$key]=(array)$college;
		}
		$allcollege=(array)$allcollege;
		function cmp1($c1,$c2){
			return $c1['score'] > $c2['score'];
		}
		$ret=array_merge($allcollege,$ret);
		usort($ret, 'cmp1');
		$ret= array_splice($ret,0,10);
		
		return $ret;

	}

	public function autocomplete_get($value='')
	{
		

		$str=Input::get('str','');
		$ret=$this->autocomplete($str,10);

		return $ret;
	}

	public function  keyword_search($input){
		if(!isset($input['searchvalue'])){
			return $this->nocollege();
		}
		$value=$input['searchvalue'];
		$college=$this->autocomplete($value,50);
		foreach ($college as $key => $val) {
			$college[$key]=DB::table('college_id')->where('link','=',$val['link'])->first();
		}
		$text='Showing best matches for "'.$value.'"';
		return  $this->show_colleges($college,$text);
	}

	public function  exam_search($input){
		if(!isset($input['searchvalue'])){
			return $this->nocollege();
		}
		$this->filter_query_inputs['exam-search']="true";
		$this->filter_query_inputs['exam']=$input['searchvalue'];

		$exam=$input['searchvalue'];
		
		$eid=DB::table('exam')->where(DB::raw("concat(fullform,' (',name,')')"),'=',$exam)->get();
		if(sizeof($eid)==0){
			return $this->nocollege('No college found with Exam "'.$exam.'"');
		}
		//print_r($eid);
		$college=DB::table('college_entrance_test')
			->join('college_id','college_id.cid','=','college_entrance_test.cid')
			->where('college_id.disabled','=','1');
		foreach ($eid as $key => $id) {
			if($key==0)
				$college=$college->where('college_entrance_test.name','=',$id->eid);
			else
				$college=$college->orWhere('college_entrance_test.name','=',$id->eid);
		}	
		$college=$college->groupby(array('college_id.cid','college_id.name'))
			->orderby('college_id.rank')
			->get();

		if(sizeof($college)==0){
			return $this->nocollege('No college found with Exam "'.$exam.'"');
		}
		$text=sizeof($college).' colleges found with exam "'.$exam.'"';
		return  $this->show_colleges($college,$text);
	}

	public function  dept_search($input){
		if(!isset($input['searchvalue'])){
			return $this->nocollege();
		}
		$dept_input=$input['searchvalue'];
		$dept=$input['searchvalue'];
		
		$dept=DB::table('departments')->where('value','=',$dept)->first();
		if(sizeof($dept)==NULL){
			return $this->nocollege('No college found with "'.$dept_input.'" Department');
		}
		
		$college=DB::table('college_department')
			->join('college_id','college_id.cid','=','college_department.cid')
			->where('college_department.'.$dept->key,'=','1')->orderby('college_id.rank')->get();
	
		if(sizeof($college)==0){
			return $this->nocollege('No college found with "'.$dept.'" Department');
		}
		$text=sizeof($college).' colleges found with "'.$dept->value.'" Department';
		return $this->show_colleges($college,$text);
	}

	public function main_search($input)
	{
		$col=DB::select('select *,0 as score from college_id where disabled=1 order by rank');
		$college=array();
		foreach ($col as $key => $colleges) {
			$college[$colleges->cid]=$colleges;
		}
		$filters=array('state'=>'state','city'=>'city','exam'=>'exam-name','rank'=>'exam-rank','category'=>'exam-category','dept'=>'department');
		foreach ($filters as $key => $value) {
			if(isset($input[$value]) && $input[$value]!="")
			{
				$filters[$key]=$input[$value];
			}
			else
			{
				$filters[$key]=NULL;
			}
		}
		
		echo '<br>';
		$location_weight=10;
		$department_weigth=10;
		$exam_weight=10;
		$maxscore=0;
		if($filters['state']!=NULL){
			$temp=DB::table('college_id')
				->where('state','=',$filters['state'])
				->where('disabled','=','1')->get();
			if($filters['city']==NULL)
				$weight=$location_weight;
			else
				$weight=$location_weight/2;
			foreach ($temp as $key => $value) {
				$college[$value->cid]->score+=$weight;
			}
			$maxscore+=$weight;
			if($filters['city']!=NULL){
				$maxscore+=$location_weight/2;
				$temp=DB::table('college_id')
				->where('state','=',$filters['state'])
				->where('city','=',$filters['city'])
				->where('disabled','=','1')->get();

				foreach ($temp as $key => $value) {
					$college[$value->cid]->score+=$location_weight/2;
				}
			}
		}

		if($filters['exam']!=NULL){
			$eid=DB::table('exam')->where('fullform','=',$filters['exam'])->get();
			if(sizeof($eid)>0){
				$this->filter_query_inputs['exam-search']="true";
				$this->filter_query_inputs['exam']=$filters['exam'];
				$maxscore+=$exam_weight;
				$college_search=DB::table('college_entrance_test')
					->join('college_id','college_id.cid','=','college_entrance_test.cid')
					->where('college_id.disabled','=','1');
				foreach ($eid as $key => $id) {
					if($key==0)
						$college_search=$college_search->where('college_entrance_test.name','=',$id->eid);
					else
						$college_search=$college_search->orWhere('college_entrance_test.name','=',$id->eid);
				}	
				$temp=$college_search->groupby(array('college_id.cid','college_id.name'))
					->orderby('college_id.rank')
					->get();
				foreach ($temp as $key => $value) {
					if(isset($college[$value->cid]))
						$college[$value->cid]->score+=$exam_weight;
					
				}
			}
		}

		if($filters['dept']!=NULL){
			$dept_name=DB::table('departments')->where('key','=',$filters['dept'])->first();
			if($dept_name!=NULL){
				$maxscore+=$department_weigth;
				$temp=DB::table('college_department')->where($filters['dept'],'=','1')->get();
				foreach ($temp as $key => $value) {
					if(isset($college[$value->cid]))
						$college[$value->cid]->score+=$department_weigth;
					
				}
			}
		}

		function cmp($a,$b)
		{
			return $a->score<$b->score;
		}
		uasort($college, 'cmp');
		$return_college=array();
		$maxcount=0;
		$cunt=0;
		foreach ($college as $key => $value) {
			//echo $value->name . ', '.$value->city.' , '.$value->state.' : '.$value->score.'<br>';
			if($value->score==$maxscore && $maxscore!=0)
				$maxcount++;
			if($value->score>0){
				array_push($return_college,$value);
				$cunt++;
			}
			else
				break;
		}
		//print_r($filters);
		$text=$maxcount.' Colleges with perfect match and '.sizeof($return_college).' colleges with some match';
		if($maxcount!=0)
			return $this->show_colleges($return_college,$text);
		else
			return $this->show_colleges();

	}
	public function  location_search($input){
		if(!isset($input['searchvalue'])){
			return $this->nocollege();
		}
		$place=$input['searchvalue'];
		
		$college=DB::table('college_id')
			->where('college_id.disabled','=','1')
			->where(DB::raw('concat(city ," , " ,state)'),'=',$place)
			->orderby('rank')
			->get();
		if(sizeof($college)==0){
			$college=DB::table('college_id')
			->where('college_id.disabled','=','1')
			->where('state','=',$place)
			->orderby('rank')
			->get();
		}
		if(sizeof($college)==0){
			return $this->nocollege('No college found in "'.$place.'"');
		}
		$text=sizeof($college).' colleges found in "'.$place.'"';
		return  $this->show_colleges($college,$text);
	}

	public function show_colleges($college=array(),$text=""){
		foreach ($college as $key => $value) {
			if(File::exists(public_path().'/data'.'/logo200/'.$value->cid.'.png'))
				$value->logoimg=asset('/data'.'/logo200/'.$value->cid.'.png');

			else if(File::exists(public_path().'/data'.'/'.$value->cid.'/logo.png'))
				$value->logoimg=asset('/data'.'/'.$value->cid.'/logo.png');
			else
				$value->logoimg=asset('/assets/img/icons/icon.png');;

			$check=0;
			$value->location_bar="";
			if($value->area!=''){
				$value->location_bar=$value->area;
				$check=1;
			}
			if($value->city!='')
			{
				if($check==1)
				$value->location_bar.=' , ';
				$value->location_bar.=$value->city;
				$check=1;
			}
			if($value->state!=''){
				if($check==1)
				$value->location_bar.=' , ';
				$value->location_bar.=$value->state;
			}

			$college[$key]=$value;
		}
		$states=array();
		foreach(DB::select('select distinct state from college_id where state!=""') as $key => $state ) {
				foreach(DB::table('college_id')->select(DB::raw('distinct city'))->where('state','=',$state->state)->where('city','!=','')->get() as $key1 => $city )
				{
					if($key1==0)
						$states[$state->state]=array();

					array_push($states[$state->state],$city->city);
				}
		}

		$exam_categories=array();
		foreach(DB::select('select distinct fullform from exam where eid!=0') as $key => $exam ) {
				$exam_categories[$exam->fullform]=json_decode(DB::table('exam')->where('fullform','=',$exam->fullform)->first()->category);
		}
		$categories=array();
		foreach(DB::select('select * from category') as $key => $cat ) {
				$categories[$cat->id]=$cat->name;
		}
		View::share('filters',$this->filter_query_inputs);
		View::share('cities',json_encode($states));
		View::share('exam_categories',json_encode($exam_categories));
		View::share('categories',json_encode($categories));
		if($text!="")
			View::share('text',$text);

		if(sizeof($college)>0){
			View::share('college',$college);
		}
		return View::make('home.search');
	}
	public function nocollege($text="No College Found"){
		return $this->show_colleges(array(),$text);
	}
	// Function to get search inputs and find best college
	public function search()
	{
		$s_type=Input::get('searchtype');
		switch ($s_type) {
			case 'keyword_search':
				return $this->keyword_search(Input::all());
				break;
			case 'exam_search':
				return $this->exam_search(Input::all());
				break;
			case 'dept_search':
				return $this->dept_search(Input::all());
				break;
			case 'location_search':
				return $this->location_search(Input::all());
				break;
			case 'side-filter':
				return $this->main_search(Input::all());
				break;
			default:
				return $this->show_colleges();
				break;
		}
	}

}
