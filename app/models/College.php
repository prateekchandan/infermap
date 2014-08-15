<?php

class College extends Eloquent{
	protected $table = 'college_id';


	public function saveFromInput(){
		$this->college_name = Input::get('college-name');
		$this->facqual = (Input::get('facqual') == null ? null : implode(',',Input::get('facqual')));
		$this->class_hrs = Input::get('clshrs');
		$this->attendance = Input::get('att');
		$this->placement = Input::get('plac');
		$this->nomshstl = Input::get('nomshs');
		$this->hostel_rating = Input::get('hostel');
		$this->mess_rating = Input::get('mess');
		$this->sports_rating = Input::get('sports');
		$this->facilities = (Input::get('facilities') == null ? null : implode(',',Input::get('facilities')));
		$this->reco_rating = Input::get('reco');
		$this->whychoose = Input::get('whychoose');
		$this->improve = Input::get('improve');
		$this->personal_dept = Input::get('personal-dept');
		$this->personal_year = Input::get('personal-year');
	}
}
