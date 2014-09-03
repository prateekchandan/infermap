<?php

class AnalysisController extends BaseController {

	public function tag($str)
	{
		
		$dept=strtolower($str);
		$dept=str_replace('.', ' ', $dept);
		$dept=preg_replace('/[^A-Za-z0-9]/', ' ', $dept);
		$dept=array_filter(explode(' ', $dept));
		$res=array();
		$tags=DB::table('departments')->get();
		foreach ($tags as $key => $row) {
			$value=json_decode($row->tags);
			foreach ($dept as $word) {
				foreach ($value as $check) {
					$dist=levenshtein($word,$check);
					$chk=false;
					if($dist<1 || ($dist==1 && strlen($check)>4)|| ($dist==2 && strlen($check)>8))
					{
						array_push($res,$row->key);
						$chk=true;
						break;
					}
					if($chk)
						break;
				}
			}
		}
		return array_unique($res);
	}

	public function department()
	{
		$allcollege=DB::table('college_id')->get();
		foreach ($allcollege as $key => $college) {
			$depts=DB::connection('college_data')->select('select * from t'.$college->cid.' where placed=0 && min_package=0 && avg_package=0 && program != "mtech" && program != "me" ');
			
			
			$alltag=array();
			foreach ($depts as $key => $value) {
				$tag=$this->tag($value->department);
				$alltag=array_merge($alltag,$tag);
			}
			$alltag=array_unique($alltag);
			$str1='('.$college->cid;
			$str2='(`cid`';
			foreach ($alltag as $value) {
				$str1.=',1';
				$str2.=',`'.$value.'`';
			}
			$query = 'insert into college_department '.$str2.') values '.$str1.')';
			//echo $query.'<br>';
			if(sizeof($alltag)==0)
				echo $college->name.'<br>';
			DB::connection('infermap')->insert($query);
	//		echo '<br>';	
		}
		
	}
}
