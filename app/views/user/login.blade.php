@extends ('layout.main')

@section ('body')


<div class="container">
	<div class="col-md-6 col-md-offset-3">
	<div class="title"><h3>Login in to your Account</h3></div>
	@include('user.login_template')
	</div>
</div>
@stop
