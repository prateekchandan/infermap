<?php
use Illuminate\Support\MessageBag;

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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$messageBag = new MessageBag;
		$messageBag->add('password', Lang::get('validation.password.restrict'));
		if(strlen(Input::get('password'))< 6) return Redirect::back()->withInput()->withErrors($messageBag);
		$user = new User;
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->name = Input::get('name');
		$user->save();
		Auth::login($user);
		return Redirect::route('user.edit');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function infostore()
	{
		$user = Auth::user();
		$user->name = Input::get('name');
		$user->city = Input::get('city');
		$user->gender = Input::get('gender');
		$user->school_college = Input::get('school_college');
		$user->school_college_name = Input::get('school_college_name');
		$user->std_passingout = Input::get('std_passingout');
		$user->phone = Input::get('phone');
		$user->save();
		return Redirect::to('/');
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
	public function edit()
	{
		if(!Auth::check()) return Redirect::to('/');
		
		$user = Auth::user();
		return View::make('user.edit')
			->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$user = Auth::user();
		$user->name = Input::get('name');
		$user->password = (Input::get('password') != null ? Hash::make(Input::get('password')) : $user->password);
		$user->city = Input::get('city');
		$user->gender = Input::get('gender');
		$user->school_college = Input::get('school_college');
		$user->school_college_name = Input::get('school_college_name');
		$user->std_passingout = Input::get('std_passingout');
		$user->phone = Input::get('phone');
		$user->save();
		$messageBag = new MessageBag;
		$messageBag->add('home_message', Lang::get('user.profile.saved'));
		return Redirect::back()
			->with('messages', $messageBag);
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

	public function gpluslogin(){
		$url= Input::get('url');
		$email = Input::get('email');
		$users = User::where('email','=', $email)->get();
		if(sizeof($users) == 0){
			$user = new User;
			$user->email = $email;
			$user->gplusid = Input::get('gplusid');
			$user->name = Input::get('name');
			$user->img_url = Input::get('img_url');
			$user->save();
			Auth::login($user);
			return Redirect::route('user.edit');
		}
		$user = $users[0];
		Auth::login($user);
		if($url!='' && $url !=null)
			return Redirect::away($url);
		else
		return Redirect::back();
	}

	public function fblogin(){
		$url= Input::get('url');
		$email = Input::get('email');
		$users = User::where('email','=', $email)->get();
		if(sizeof($users) == 0){
			$user = new User;
			$user->email = $email;
			$user->name = Input::get('name');
			$user->fbid = Input::get('fbid');
			$user->save();
			Auth::login($user);
			return Redirect::route('user.edit');
		}
		$user = $users[0];
		Auth::login($user);
		if($url!='' && $url !=null)
			return Redirect::away($url);
		else
		return Redirect::back();
	}

	public function showlogin(){
		$url=Session::get('url');
		if(Auth::check()){ 
			if($url!='' && $url != null)
				return Redirect::away($url);
			else
				return Redirect::to('/');
		}
		return View::make('user.login');
	}

	public function login(){
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
		{
			return Redirect::back()->with('url',Input::get('url'));
		}
		$user = User::where('email', '=', Input::get('email'))->first();
		if ($user == null) {
			$messageBag = new MessageBag;
			$messageBag->add('email.wrong', Lang::get('user.email.wrong'));
			return Redirect::back()
				->withInput()
				->withErrors($messageBag);
		}
		if ($user->password != Hash::make(Input::get('password'))){
			$messageBag = new MessageBag;
			$messageBag->add('password.mismatch', Lang::get('user.password.mismatch'));
			return Redirect::back()
				->withInput()
				->withErrors($messageBag);
		}
	}

	public function logout(){
		if(Auth::check()) Auth::logout();
		$url=Input::get('url');
		if($url!='' && $url !=null)
			return Redirect::away($url);
		else
		return Redirect::back();
	}
}
