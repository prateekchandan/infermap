<?php

class InternPosts extends Eloquent{
	protected $table = 'intern_positions';

	
	public function saveFromInput(){
		$this->position = Input::get('position');
		$this->type= Input::get('type');
		$this->desc = Input::get('desc');
		$this->requirement = Input::get('requirement');
		$this->term = Input::get('term');
		$this->link = Input::get('link');
	}
}
