@extends('departments.layout')
@section('department-content')

<?php  $check=0; ?>

@if($department->intro!='')
<?php  $check=1; ?>
<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>About Exam</h3>
		</div>
		<div class="row col-md-12">
			<div class="editable-content" id="intro" data-filename="intro">
			{{$department->intro}}
			</div>
		</div>
	</div>
</div>
@endif
@if($department->field!='')
<?php  $check=1; ?>
<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>Field of Work</h3>
		</div>
		<div class="row col-md-12">
			<div class="editable-content" id="field" data-filename="field">
			{{$department->field}}
			</div>
		</div>
	</div>
</div>	
@endif

@if($check==0)
	@include('college.nodata')
@endif
@endsection