<?php
use Illuminate\Support\MessageBag;
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function fblogin()
	{
		$app_id='495182610616528';
		
		$redirect_url=URL::to('/').'/fblogin';
		$app_secret='bdf48bb2f3782cf7e81a40aaa067fc62';
		$code=Input::get('code');
		$token_url = "https://graph.facebook.com/oauth/access_token?"
       . "client_id=" . $app_id . "&redirect_uri=" . urlencode($redirect_url)
       . "&client_secret=" . $app_secret . "&code=" . $code;
    	
    	try{
       	$response = file_get_contents($token_url);	
       }
       catch (Exception $e) {
       		return Redirect::to('/');
       }
       $params = null;
     	parse_str($response, $params);
     	$graph_url = "https://graph.facebook.com/me?access_token=" 
       . $params['access_token'];

     	$newUser = json_decode(file_get_contents($graph_url));
   			
     	
     	if(!isset($newUser->email)){
     		$messageBag = new MessageBag;
			$messageBag->add('email.absent', 'We are unable to fetch your email id. Go to <a href="https://www.facebook.com/settings?tab=applications"> Fb Setting </a> , search for app "Infermap" , remove the app and try login again ');
     		return Redirect::back()->withInput()
				->withErrors($messageBag);
     	}

     	$email = $newUser->email;
		$users = User::where('email','=', $email)->get();
		
		if($newUser->gender=="male")
			$gender=1;
		else
			$gender=0;


		if(sizeof($users) == 0){
			$user = new User;
			$user->email = $email;
			$user->name = $newUser->name;
			$user->fbid = $newUser->id;
			$user->gender = $gender;
			$user->save();
			Auth::login($user);
			return Redirect::away(Session::get('redirect_url'));
		}
		DB::table('users')
				->where('id','=',$users[0]->id)
				->update(array('fbid' => $newUser->id , 'gender' =>  $gender));
		
		$user = $users[0];
		Auth::login($user);

     	return Redirect::away(Session::get('redirect_url'));
     	
	}
	// Function to show user progile
	public function profile()
	{
		if(!Auth::check()){
			return View::make('user.login');
		}
		$user=Auth::user();
		$review=DB::table('college_reviews')
			->where('user_id','=',$user->id)->first();
		
		if($review==NULL){

		}
		else if($review->college_id==0)
		{
			$review=DB::table('college_reviews')
			->join('temp_colleges','temp_colleges.temp_id','=','college_reviews.temp_college_id')
			->where('user_id','=',$user->id)->first();
		}
		else{
			$review=DB::table('college_reviews')
			->join('college_id','college_id.cid','=','college_reviews.college_id')
			->where('user_id','=',$user->id)->first();
		}

		$referred=DB::table('review_publi')->where('user_admin','=',$user->id)->get();
		$referred_ppl=array();
		foreach ($referred as $key => $usr) {
			$us=DB::table('users')->where('id','=',$usr->user_refered)->first();
			array_push($referred_ppl, $us);
		}

		$interns=DB::table('intern_application')
			->join('intern_positions','intern_positions.id','=','intern_application.position_id')
			->where('intern_application.user_id','=',$user->id)
			->where('intern_application.accept','=','1')->get();

		View::share('intern',$interns);
		View::share('refer',$referred_ppl);
		View::share('user',$user);
		View::share('review',$review);
		return View::make('user.profile');
	}
	// Function to show edit profile page to user
	public function edit()
	{
		$user = Auth::user();
		return View::make('user.edit')
			->with('user', $user);
	}
	//Post page for profile edit
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
	// Show login page
	public function showlogin(){
		$url=Input::get('url');
		if(Auth::check()){ 
			if($url!='' && $url != null)
				return Redirect::away($url);
			else
				return Redirect::to('/');
		}
		if($url!="" && $url!=null){
			Session::put('redirect_url',$url);
			View::share('nourl',1);
		}
		return View::make('user.login');
	}

	// Login by password
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
	// Logout
	public function logout(){
		if(Auth::check()) Auth::logout();
		$url=Input::get('url');
		if($url!='' && $url !=NULL)
			return Redirect::away($url);
		else
		return Redirect::to('/');
	}
}
