<?php

class BlogPost extends Eloquent{
	protected $table = 'blog_list';


	public function saveFromInput(){
		$user=Auth::user()->id;
		$this->user_id = $user;
		$this->Title = Input::get('title');
		$this->link = Input::get('link');
		$this->content = Input::get('content');
		$this->img=Input::get('img-name');
	}
}
