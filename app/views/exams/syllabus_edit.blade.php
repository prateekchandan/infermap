@extends('exams.layout')
@section('exam-content')
<link rel="stylesheet" href="{{URL::asset('assets/css/redit.min.css')}}">

<?php  $check=0; ?>

<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>Syllabus</h3>
		</div>
		<div class="col-md-12 row">
			<a class="halflings edit  edit-btn" href="#" data-filename="syllabus">
				edit
			</a>
		</div>
		<div class="row col-md-12">
			<div class="editable-content" id="syllabus" data-filename="syllabus">
			{{$exam->syllabus}}
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