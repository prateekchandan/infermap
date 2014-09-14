@extends('layout.main')
@section('body')
<div class="container">
<br>
@if ($errors->has('feedback'))
	<div class="alert alert-success alert-dismissable" style="" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<h3>THANK YOU</h3>
		<h4>The review is greatly appreciated</h4>
	</div>
@endif
<form  method="post" action="{{ URL::route('review.feedback.save') }}">
	<div class="col-md-6 col-md-offset-3">
	<div class="title"><h3>Share Review on Social Media</h3></div>
	</div>
	<div class="col-md-6 col-md-offset-3">
		
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
		<div class="row">
			<div class="form-group">
				<label>Friend 1</label>
				<input type="email" id="email1" name="email1" class="form-control" value="{{ Input::old('email') }}" placeholder="email address">
			</div>
			<div class="form-group">
				<label>Friend 2</label>
				<input type="email" id="email2" name="email2" class="form-control" value="{{ Input::old('email') }}" placeholder="email address">
			</div>
			<div class="form-group">
				<label>Friend 3</label>
				<input type="email" id="email3" name="email3" class="form-control" value="{{ Input::old('email') }}" placeholder="email address">
			</div>

		</div>
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