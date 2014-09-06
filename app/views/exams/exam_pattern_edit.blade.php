@extends('exams.layout')
@section('exam-content')
<link rel="stylesheet" href="{{URL::asset('assets/css/redit.min.css')}}">

<?php  $check=0; ?>

<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>Exam Patten</h3>
		</div>
		<div class="col-md-12 row">
			<a class="halflings edit  edit-btn" href="#" data-filename="exam_pattern">
				edit
			</a>
		</div>
		<div class="row col-md-12">
			<div class="editable-content" id="exam_pattern" data-filename="exam_pattern">
			{{$exam->exam_pattern}}
			</div>
		</div>
	</div>
</div>


<script type="text/javascript" src="{{URL::asset('assets/js/redit.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/table-editor.js')}}"></script>
<script type="text/javascript">
	window.filesaveurl="{{URL::route('exam.savefile')}}";
	window.eid="{{$exam->eid}}";
</script>
<script type="text/javascript" src="{{URL::asset('assets/js/editable/paragraph.js')}}"></script>
@endsection