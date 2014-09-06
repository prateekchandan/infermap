@extends('exams.layout')
@section('exam-content')

<?php  $check=0; ?>
@if($exam->syllabus!='')
<?php  $check=1; ?>
<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>Exam Patten</h3>
		</div>
		<div class="row col-md-12">
			<div class="editable-content" id="exam_pattern" data-filename="exam_pattern">
			{{$exam->exam_pattern}}
			</div>
		</div>
	</div>
</div>
@endif

@if($check==0)
	@include('college.nodata')
@endif
@endsection