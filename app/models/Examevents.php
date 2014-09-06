<?php

class Examevents extends Eloquent{
	protected $table = 'exam_dates';


	public function saveFromInput(){
		$this->eid = Input::get('eid');
		$this->date = Input::get('date');
		$this->event = Input::get('event');
		
	}
}
