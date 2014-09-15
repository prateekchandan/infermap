@extends('home.layout')
@section('content')
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="fa fa-graduation-cap"></i>{{$post->position}} @ Infermap</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->

	<div class="container">
		<div class="row">
			<div class="slider">
			
				<div id="flex1" class="flexslider">
					<ul class="slides">

						<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; display: list-item;">
							<img src="{{URL::asset('assets/img/career/career2.png')}}" alt="">
						</li>

						
					</ul>
				<!--ul class="flex-direction-nav"><li><a class="flex-prev" href="#">Previous</a></li><li><a class="flex-next" href="#">Next</a></li></ul-->
				</div>
			
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<br>
				<div class="title"><h1>{{$post->position}}</h1></div>
				<div class="col-md-12"><br><b> Type</b> : {{$post->type}}</div>

				<div class="col-md-12">
					<br>
					<h3><b>Description</b></h3>
					<div>
						{{$post->desc}}
					</div>
				</div>

				<div class="col-md-12">
					<br>
					<h3><b>Requirements</b></h3>
					<div>
						{{$post->requirement}}
					</div>
				</div>

				<div class="col-md-12">
					<br>
					<h3><b>Terms and Condition</b></h3>
					<div>
						{{$post->term}}
					</div>
				</div>

			</div>
		</div>

		<div class="row" id="apply">
			<div class="title"><h3>Apply Now</h3></div>
			<div class="col-md-12">
			@if(!Auth::check())
				Please login to apply
			@else
				<div class="col-md-6">
				{{ Form::open(array('files'=>true)) }}
		        <div class="form-group row">
		            <div class="col-md-3">
		                <label for="name">Name : </label>
		            </div>
		            <div class="col-md-9">
		                <input id="name" name="name" class="form-control" placeholder="name" value="{{$user->name}}" required readonly>
		            </div>
		        </div>
		        <div class="form-group row">
		            <div class="col-md-3">
		                <label for="email">Email : </label>
		            </div>
		            <div class="col-md-9">
		                <input type="email" id="email" name="email" class="form-control" placeholder="email" value="{{$user->email}}" required readonly>
		            </div>
		        </div>
		        <div class="form-group row">
		            <div class="col-md-3">
		                <label for="phone">Phone : </label>
		            </div>
		            <div class="col-md-9">
		            	<input type="hidden" name="id" value="{{$post->id}}">
		                <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone no" value="{{$user->phone}}" required {{($user->phone=="")?"":"readonly"}}>
		            </div>
		        </div>
		        <div class="form-group row">
		            <div class="col-md-6">
		                <label for="">Upload Resume (Max 2M)</label>
		            </div>
		            <div class="col-md-6">
		                {{ Form::file('resume',array('id'=>'', 'required'=>'required' ,'accept'=>"application/pdf")) }}
		            </div>
		        </div>
		       
		       
		        <div class="actions">

		            <button type="submit" class="btn btn-primary col-sm-6">Apply Now</button>

		        </div>

		    {{ Form::close() }}
		    </div>	
			@endif
			</div>
		</div>
		
	</div>
@endsection