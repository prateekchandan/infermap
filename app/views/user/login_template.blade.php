<?php
    use Facebook\FacebookSession;
    use Facebook\FacebookRequest;
    use Facebook\GraphUser;
    use Facebook\FacebookRequestException;
    use Facebook\FacebookRedirectLoginHelper;
    session_start(); 
        $url= Input::get('url');
        if($url!='' && $url !=null)
            Session::put('redirect_url',$url);
        else
            Session::put('redirect_url',URL::to('/'));

        $redirect_url=URL::to('/').'/fblogin';
        
        FacebookSession::setDefaultApplication('495182610616528', 'bdf48bb2f3782cf7e81a40aaa067fc62');
        $helper = new FacebookRedirectLoginHelper($redirect_url);
        if(!isset($nourl))
            Session::put('redirect_url',Request::url());

?>

<!--start: Row-->
<div class="row-fluid">



    <!--start: Register Box-->
    <div id="register-box" style="overflow:auto; box-shadow:0 0px 0px">

        <!-- start: Row -->
        <div class="row-fluid">

            <div id="login-form" class="">



                <a style="cursor:pointer" class="facebook_connect" href="{{$helper->getLoginUrl()}}">
                    <div class="img"><i class="fa fa-facebook"></i>
                    </div>
                    <div class="text">Login with Facebook</div>
                </a>
                {{--
	            <div id="google-plus-button" style="cursor:pointer" class="gplus_connect">
	                <div class="img"><i class="fa fa-google-plus"></i>
	                </div>
	                <div class="text">Signin with Google Plus</div>
	            </div>
                --}}

                <div class="page-title-small">
                    <hr class="thin-hr">
                    <h3>Login if you are already registered</h3>
                    <hr class="thin-hr">
                </div>

                <form method="post" action="{{ URL::route('user.login') }}">
                    <input type="hidden" name="url" value="{{Input::get('url')}}" />
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" style="width:100%" value="{{ Input::old('email') }}" placeholder="email address" required>
                    </div>
                    @if ($errors->has('email.wrong'))
                    <div class="alert alert-error alert-dismissable" style="" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        {{ $errors->first('email.wrong') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="password" style="font-size:14px; height:34px;width:100%" id="password" name="password" class="form-control" value="" placeholder="password" required>
                    </div>
                    @if ($errors->has('password.mismatch'))
                    <div class="alert alert-error alert-dismissable" style="" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        {{ $errors->first('password.mismatch') }}
                    </div>
                    @endif

                    <div class="actions">

                        <button type="submit" class="btn btn-primary col-sm-12">Login!</button>

                    </div>

                </form>

            </div>

        </div>
        <!-- end: Row -->



    </div>

</div>
<!--end: Row -->
