@extends('home.layout')
@section('content')
<style type="text/css">
	.redactor_editor{
		min-height: 150px;
	}
</style>
<link rel="stylesheet" href="{{URL::asset('assets/css/redit.min.css')}}">

	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="fa fa-pencil"></i>Add New Position for Intern</h2>

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
		    <form method="post">
		        <div class="form-group row">
		            <div class="col-md-3">
		                <label for="position">Position Name</label>
		            </div>
		            <div class="col-md-9">
		                <input id="position" name="position" class="form-control" placeholder="position" value="{{(Session::get('messages') != null && Session::get('messages')->has('position'))?Session::get('messages')->first('position'):''}}" required>
		            </div>
		        </div>
		         <div class="form-group row">
		            <div class="col-md-3">
		                <label for="title">Category</label>
		            </div>
		            <div class="col-md-9">
		                <select name="type" class="form-control" required>
		                	<option>Design</option>
		                	<option>Product Management</option>
		                	<option>Technology</option>
		                	<option>Sales and Marketing</option>
		                </select>
		            </div>
		        </div>
		        <div class="form-group row">
		            <div class="col-md-12">
		                <label for="">Description : <br></label>
		            </div>
		            <div class="col-md-12">
		                <div class="textbox" id="desc" name="desc"></div>
		            </div>
		        </div>
		        <div class="form-group row">
		            <div class="col-md-12">
		                <label for="">Requirements from intern:<br></label>
		            </div>
		            <div class="col-md-12">
		                <div class="textbox" id="requirement" name="requirement"></div>
		            </div>
		        </div>
		       	<div class="form-group row">
		            <div class="col-md-12">
		                <label for="">Terms and Conditions :<br></label>
		            </div>
		            <div class="col-md-12">
		                <div class="textbox" id="term" name="term"></div>
		            </div>
		        </div>
		        <div class="actions">

		            <button type="submit" class="btn btn-primary col-sm-12">Save</button>

		        </div>
		     </form>
		</div>
	
	
	</div>
<script type="text/javascript" src="{{URL::asset('assets/js/redit.js')}}"></script>
<script type="text/javascript">
	$('.textbox').redactor({
	        focus: true,
	        convertDivs: true,
	        deniedTags: ['h1', 'h2'],
	        //  allowedTags: ['p', 'h1', 'h2', 'pre','li','u','i','ul','ol','b']
	    });
</script>
@endsection