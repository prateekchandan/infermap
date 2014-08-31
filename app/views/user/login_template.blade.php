<div id="fb-root" style="float:left; width:1px;"></div>

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
	var e = document.createElement('script'); e.async = true;
	e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
	document.getElementById('fb-root').appendChild(e);
}());
var info;
function fblogin(){
	FB.login(function(response){
		//console.log(response);
		if (response.authResponse) {
			FB.api('/me', function(response){
				info = response;
				var url = '{{ URL::route("user.fblogin") }}';
				var form = $('<form action="' + url + '" method="post">' +
					'<input type="hidden" name="fbid" value="' + info.id + '" />' +
					'<input type="hidden" name="name" value="' + info.name + '" />' +
					'<input type="hidden" name="email" value="' + info.email + '" />' +
					'</form>');
				$.ajax({
					url:url,
					type:'post',
					data:$(form).serialize(),
					success:function(){
						location.reload();
					}
				})
			});
		}
		else
		{
			alert('Authorization Failed');
		}
	},{scope: 'publish_stream, email'});
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
					<div class="img"><i class="fa fa-facebook"></i></div>
					<div class="text">Register with Facebook</div>
				</div>
				<a href="register.html" class="twitter_connect">
				<div class="img"><i class="fa fa-twitter"></i></div>
				<div class="text">Register with Twitter</div>
				</a>

				<div class="page-title-small">

				<h3>or</h3>

				</div>

				<form method="post" action="{{ URL::route('user.login') }}">
				<div class="form-group">
					<input type="email" id="email" name="email" class="form-control" style="width:100%" value="{{ Input::old('email') }}" placeholder="email address" required>
				</div>
				@if ($errors->has('email.wrong'))
					<div class="alert alert-error alert-dismissable" style="" role="alert">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					{{ $errors->first('email.wrong') }}
					</div>
				@endif
				<div class="form-group">
					<input type="password" style="font-size:14px; height:34px;width:100%" id="password" name="password" class="form-control" value="" placeholder="password" required>
				</div>
				@if ($errors->has('password.mismatch'))
					<div class="alert alert-error alert-dismissable" style="" role="alert">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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