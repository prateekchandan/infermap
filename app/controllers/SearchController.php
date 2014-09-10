<?php

class SearchController extends BaseController {

	protected $pattern = '/[:,.-_ ()]/';

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

	public function test()
	{
		function microtime_float()
		{
		    list($usec, $sec) = explode(" ", microtime());
		    return ((float)$usec + (float)$sec)*1000;
		}

		$a=microtime_float();
		$res=$this->review_autocomplete();
		$b=microtime_float()-$a;
		var_dump(time());
		echo '<br>';
		var_dump(microtime_float());
		echo '<br>';
		echo 'Time taken : '.$b.'<br>';
		print_r($res);
	}

}
