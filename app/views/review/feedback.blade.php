@extends('layout.main')
@section('body')
<div class="container">
<br>
<div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=495182610616528&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@if($errors->has('feedback'))
	<div class="alert alert-success alert-dismissable" style="" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<h3>THANK YOU</h3>
        <h3>The review is greatly appreciated. You will be recieving your coupon shortly on your email id "{{Auth::user()->email}}"</h3>
	</div>
@endif
<form  method="post" action="{{ URL::route('review.feedback.save') }}">
	<div class="col-md-6 col-md-offset-3">
	<div class="title"><h3>Like / Share  on Social Media</h3></div>
	</div>
	<div class="col-md-6 col-md-offset-3">
		<center>
        <b>We are Bringing Lots of Cool Stuffs! <br>Like us On Facebook to keep getting regular updates</b>
        <br>
        <br>
        <div class="fb-like-box" data-href="https://www.facebook.com/infermap" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
        <br>
        <b>Or share via social media</b>
    	</center>
		<div class="row">
			<a target='_blank' style="cursor:pointer" class="facebook_connect" href="http://www.facebook.com/sharer/sharer.php?u={{$link}}">
				<div class="img"><i class="fa fa-facebook"></i></div>
				<div class="text">Share on Facebook</div>
			</a>
			<a target='_blank' style="cursor:pointer" style="" class="gplus_connect" href="https://plus.google.com/share?url={{$link}}">
				<div class="img"><i class="fa fa-google-plus"></i></div>
				<div class="text">Share on Google Plus</div>
			</a>
		</div>
	</div>
	<div class="col-md-6 col-md-offset-3">
	<br>
	<div class="title"><h3>Refer to your friends</h3></div>
	 <blockquote>
        Share this link with your friends to earn review points and benefits
        <br>
        <a href="{{$link}}">{{$link}}</a>
    </blockquote>
	</div>
	

	<div class="col-md-6 col-md-offset-3">
	<br>
	<div class="title"><h3>Comment about feedback</h3></div>
	</div>
	<div class="col-md-6 col-md-offset-3">
		<br>
		<div class="row">
			<textarea class="form-control" name="comment" required></textarea>
		</div>
	</div>
	<div class="col-md-6 col-md-offset-3">
	<br>
		<button type="submit" class="btn btn-primary col-sm-12">All Done!</button>
	</div>
</form>
</div>
@endsection