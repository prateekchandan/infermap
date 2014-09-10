@extends('departments.layout')
@section('department-content')
<link rel="stylesheet" href="{{URL::asset('assets/css/redit.min.css')}}">

<?php  $check=0; ?>

<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>Research Opportunities</h3>
		</div>
		<div class="col-md-12 row">
			<a class="halflings edit  edit-btn" href="#" data-filename="research">
				edit
			</a>
		</div>
		<div class="row col-md-12">
			<div class="editable-content" id="research" data-filename="research">
			{{$department->research}}
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>Higher Studies</h3>
		</div>
		<div class="col-md-12 row">
			<a class="halflings edit  edit-btn" href="#" data-filename="higher_studies">
				edit
			</a>
		</div>
		<div class="row col-md-12">
			<div class="editable-content" id="higher_studies" data-filename="higher_studies">
			{{$department->higher_studies}}
			</div>
		</div>
	</div>
</div>


<script type="text/javascript" src="{{URL::asset('assets/js/redit.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/table-editor.js')}}"></script>
<script type="text/javascript">
	window.filesaveurl="{{URL::route('department.savefile')}}";
	window.eid="{{$department->key}}";
</script>
<script type="text/javascript" src="{{URL::asset('assets/js/editable/paragraph.js')}}"></script>
@endsection