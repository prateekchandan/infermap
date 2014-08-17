<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create1()
	{
		$email = Input::get('email');
		$name = Input::get('name');
		$password = Input::get('password');
		return View::make('user.create1')
			->with('email', $email)
			->with('name', $name)
			->with('password');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User;
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->name = Input::get('name');
		$user->city = Input::get('city');
		$user->gender = Input::get('gender');
		$user->school_college = Input::get('school_college');
		$user->school_college_name = Input::get('school_college_name');
		$user->std_passingout = Input::get('std_passingout');
		$user->phone = Input::get('phone');
		$user->save();
		Auth::login($user);
		return Auth::user();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function storefb(){
		dd(Input::all());
	}


}
