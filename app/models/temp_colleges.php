<?php

class temp_colleges extends Eloquent{
	protected $table = 'temp_colleges';


	public function saveFromInput(){
		$this->name = Input::get('name');
		$this->city = Input::get('city');
	}
}
