@extends ('layout.main')

@section ('body')

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

function fblogin(){
	FB.login(function(response){
		if (response.authResponse) {
			window.location='validatefb.php';
			console.log(Fb.api());
		}
	},{scope: 'publish_stream'});
}
</script>

<div class="container">

	<!--start: Row-->
	<div class="row-fluid">

		<div class="lr-page span4 offset4">

		<!--start: Register Box-->
		<div id="register-box" style="overflow:auto; box-shadow:0 0px 0px">

			<!-- start: Row -->
			<div class="row-fluid">

			<div id="login-form" class="col-sm-6 col-sm-offset-3">



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

				<form method="post" action="register">

				<div class="form-group">
					<input type="email" id="email" name="email" class="form-control" value="" placeholder="email address" required>
				</div>

				<div class="form-group">
					<input type="password" style="font-size:14px; height:34px;" id="password" name="password" class="form-control" value="" placeholder="password" required>
				</div>

				<div class="actions">

					<button type="submit" class="btn btn-primary col-sm-12">Create Account!</button>

				</div>

				</form>

			</div>

			</div>
			<!-- end: Row -->

		</div>
		<!--end: Register Box-->

		</div>

      	</div>
	<!--end: Row -->

	</div>

@stop
