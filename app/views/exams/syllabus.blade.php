@extends('exams.layout')
@section('exam-content')

<?php  $check=0; ?>

<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>Exam Patten</h3>
		</div>
		<div class="row col-md-12">
			<div class="editable-content">
			{{$exam->syllabus}}
			</div>
		</div>
	</div>
</div>

@endsection