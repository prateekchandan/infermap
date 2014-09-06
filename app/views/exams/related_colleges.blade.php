@extends('exams.layout')
@section('exam-content')
<link rel="stylesheet" href="{{URL::asset('assets/css/redit.min.css')}}">

<?php  $check=0; ?>
<div class="col-md-12">
	<div class="title">
		<h3>Related Colleges</h3>
	</div>
	<ul class="arrow_list">
	@foreach($exam->related_colleges as $college)
		<li>
			<a href="{{URL::to('college')}}/{{$college->link}}">{{$college->name}}
		</li>

	@endforeach
	</ul>
</div>
@endsection