@extends('exams.layout')
@section('exam-content')
<link rel="stylesheet" href="{{URL::asset('assets/css/redit.min.css')}}">

<?php  $check=0; ?>

<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>About Exam</h3>
		</div>
		<div class="row col-md-12">
			<div class="editable-content" id="about" data-filename="about">
			{{$exam->about}}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>Eligibility</h3>
		</div>
		<div class="row col-md-12">
			<div class="editable-content" id="eligibility" data-filename="eligibility">
			{{$exam->eligibility}}
			</div>
		</div>
	</div>
</div>	
@endsection