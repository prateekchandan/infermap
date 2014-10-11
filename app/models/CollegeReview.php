<?php

class CollegeReview extends Eloquent{
	protected $table = 'college_reviews';


	public function saveFromInput(){
		$this->college_id = Input::get('college_id');
		$this->temp_college_id = Input::get('temp_college_id');
		$this->user_id = Auth::user()->id;
		$this->college_depts = Input::get('college_depts');
		$this->fac_teaching = Input::get('fac_teaching');
		$this->research_work = Input::get('research_work');
		$this->placement = Input::get('plac');
		$this->package = Input::get('pack');
		$this->intern = Input::get('intern');
		$this->scholarship_amount = Input::get('scholarship_amount');
		$this->scholarship = Input::get('scholarship');
		$this->mess_hostel = Input::get('mshs');
		$this->hostel_rating = Input::get('hostel');
		$this->mess_rating = Input::get('mess');
		$this->sports_rating = Input::get('sports');
		$this->co_currics_rating = Input::get('co-currics');
		$this->ragging = Input::get('ragging');
		$this->about_college = Input::get('about_college');
		$this->review_title = Input::get('review_title');
		$this->recommend = (Input::get('reco') == 'yes' ? 1 : (Input::get('reco') == 'no' ? 0 : null));
		$this->review_type = Input::get('label');
		$this->personal_dept = Input::get('personal-dept');
		$this->personal_year = Input::get('personal-year');
		$this->anonymous = Input::get('anonymous');
		$this->stay_con = (Input::get('stay-con') == null ? null : implode(',',Input::get('stay-con')));
	}
}
