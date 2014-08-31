<?php

class CollegeReview extends Eloquent{
	protected $table = 'college_reviews';


	public function saveFromInput(){
		$this->college_id = Input::get('cid');
		$this->temp_college_id = Input::get('temp_college_id');
		$this->user_id = Auth::user()->id;
		$this->facqual = Input::get('facqual');
		$this->class_hrs = Input::get('clshrs');
		$this->attendance = Input::get('att');
		$this->acad_quality = Input::get('acad-qual');
		$this->acad_reputation = Input::get('acad-repo');
		$this->placement = Input::get('plac');
		$this->intern_help = Input::get('intern-help');
		$this->scholarship = Input::get('scholarship');
		$this->gross_fees = Input::get('gross-fees');
		$this->intern = Input::get('intern');
		$this->package = Input::get('pack');
		$this->no_mess_hostel = Input::get('nomshs');
		$this->hostel_rating = Input::get('hostel');
		$this->mess_rating = Input::get('mess');
		$this->sports_rating = Input::get('sports');
		$this->co_currics_rating = Input::get('co-currics');
		$this->facilities = (Input::get('facilities') == null ? null : implode(',',Input::get('facilities')));
		$this->whychoose = Input::get('whychoose');
		$this->improve = Input::get('improve');
		$this->recommend = (Input::get('reco') == 'yes' ? 1 : (Input::get('reco') == 'no' ? 0 : null));
		$this->personal_dept = Input::get('personal-dept');
		$this->personal_year = Input::get('personal-year');
		$this->anonymous = Input::get('anonymous');
		$this->stay_con = (Input::get('stay-con') == null ? null : implode(',',Input::get('stay-con')));
	}
}
