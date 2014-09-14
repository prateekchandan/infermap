<div id="fb-root" style="position:absolute;top:-10000px"></div>
<meta name="google-signin-clientid" content="235925819824-h4s0il6tu6pq4rlnonjiit4dt1ucjt6u.apps.googleusercontent.com" />
<meta name="google-signin-scope" content="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile" />
<meta name="google-signin-requestvisibleactions" content="http://schema.org/AddAction" />
<meta name="google-signin-cookiepolicy" content="single_host_origin" />
<meta name="google-signin-callback" content="signinCallback" />
<script type="text/javascript">


 function google_login() {
    (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = false;
       po.src = 'https://apis.google.com/js/client:plusone.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();

	  // Additional params
	  var additionalParams = {
		 'callback': signinCallback
	   };

	  gapi.auth.signIn(additionalParams);
}
function signinCallback(authResult) {
	  if (authResult['status']['signed_in']) {
		gapi.client.load('plus','v1', function(){
		 var request = gapi.client.plus.people.get({
		   'userId': 'me'
		 });
		 var info;
		 request.execute(function(resp) {
			info = resp;
			var name = info['displayName'];
			var email = info['emails'][0]['value'];
			var gplusid = info['id'];
			var img_url = info['image']['url'];
			console.log(name, email, gplusid, img_url);
			var url = '{{ URL::route("user.gpluslogin") }}';
			var form = $('<form action="' + url + '" method="post">' +
				'<input type="hidden" name="img_url" value="' + img_url + '" />' +
				'<input type="hidden" name="gplusid" value="' + gplusid + '" />' +
				'<input type="hidden" name="name" value="' + name + '" />' +
                '<input type="hidden" name="email" value="' + email + '" />' +
				'<input type="hidden" name="url" value="{{Input::get('url')}}" />' +
				'</form>');
			$(form).submit();
		 });
		});
	  } else {
		// Update the app to reflect a signed out user
		// Possible error values:
		//   "user_signed_out" - User is signed-out
		//   "access_denied" - User denied access to your app
		//   "immediate_failed" - Could not automatically log in the user
		console.log('Sign-in state: ' + authResult['error']);
	  }
	}

</script>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '495182610616528',
            cookie: true,
            xfbml: true,
            oauth: true
        });
    };


    (function() {
        var e = document.createElement('script');
        e.async = true;
        e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
    }());
    var info;

    function fblogin() {
        FB.login(function(response) {
            //console.log(response);
            if(response.authResponse) {
                FB.api('/me', function(response) {
                    info = response;
                    var url = '{{ URL::route("user.fblogin") }}';
                    var form = $('<form action="' + url + '" method="post">' +
                        '<input type="hidden" name="fbid" value="' + info.id + '" />' +
                        '<input type="hidden" name="name" value="' + info.name + '" />' +
                        '<input type="hidden" name="email" value="' + info.email + '" />' +
                        '<input type="hidden" name="url" value="{{Input::get('url')}}" />' +
                        '</form>');
                    $(form).submit();
                });
            } else {
                alert('Authorization Failed');
            }
        }, {
            scope: 'publish_stream, email'
        });
    }
</script>

<!--start: Row-->
<div class="row-fluid">



    <!--start: Register Box-->
    <div id="register-box" style="overflow:auto; box-shadow:0 0px 0px">

        <!-- start: Row -->
        <div class="row-fluid">

            <div id="login-form" class="">



                <div style="cursor:pointer" class="facebook_connect" onClick="fblogin();">
                    <div class="img"><i class="fa fa-facebook"></i>
                    </div>
                    <div class="text">Connect with Facebook</div>
                </div>
	            <div id="google-plus-button" style="cursor:pointer" class="gplus_connect" onclick="google_login()">
	                <div class="img"><i class="fa fa-google-plus"></i>
	                </div>
	                <div class="text">Signin with Google Plus</div>
	            </div>
              

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
