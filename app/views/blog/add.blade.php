@extends('home.layout')
@section('content')
<style type="text/css">
	.redactor_editor{
		min-height: 300px;
	}
</style>
<link rel="stylesheet" href="{{URL::asset('assets/css/redit.min.css')}}">

	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="fa fa-pencil"></i>Add New Blog Post</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	<div class="container">
			
		@if (Session::get('messages') != null && Session::get('messages')->has('error'))
			<div class="col-md-8 col-md-offset-2">
				<div class="alert alert-error alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				{{ Session::get('messages')->first('error') }}
				</div>
			</div>
			@endif
		<div class="col-md-8 col-md-offset-2">
		    {{ Form::open(array('files'=>true)) }}
		        <div class="form-group row">
		            <div class="col-md-3">
		                <label for="title">Title</label>
		            </div>
		            <div class="col-md-9">
		                <input id="title" name="title" class="form-control" placeholder="title" value="{{(Session::get('messages') != null && Session::get('messages')->has('title'))?Session::get('messages')->first('title'):''}}" required>
		            </div>
		        </div>
		        <div class="form-group row">
		            <div class="col-md-3">
		                <label for="">Blog Image (Max 2M)</label>
		            </div>
		            <div class="col-md-9">
		                {{ Form::file('img','',array('id'=>'','class'=>'form-control')) }}
		            </div>
		        </div>
		        <div class="form-group row">
		            <div class="col-md-12">
		                <label for="">Type your Post:<br></label>
		            </div>
		            <div class="col-md-12">
		                <div name="content" id="content">{{(Session::get('messages') != null && Session::get('messages')->has('content'))?Session::get('messages')->first('content'):''}}</div>
		            </div>
		        </div>
		       
		        <div class="actions">

		            <button type="submit" class="btn btn-primary col-sm-12">Save</button>

		        </div>

		    {{ Form::close() }}
		</div>
	
	
	</div>
<script type="text/javascript" src="{{URL::asset('assets/js/redit.js')}}"></script>
<script type="text/javascript">
	$('#content').redactor({
	        focus: true,
	        convertDivs: true,
	        deniedTags: ['h1', 'h2'],
	        //  allowedTags: ['p', 'h1', 'h2', 'pre','li','u','i','ul','ol','b']
	    });
</script>
@endsection