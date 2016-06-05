@extends('departments.layout')
@section('department-content')
<link rel="stylesheet" href="{{URL::asset('assets/css/redit.min.css')}}">

<?php  $check=0; ?>

<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>Academic Information</h3>
		</div>
		<div class="col-md-12 row">
			<a class="halflings edit  edit-btn" href="#" data-filename="acad_info">
				edit
			</a>
		</div>
		<div class="row col-md-12">
			<div class="editable-content" id="acad_info" data-filename="acad_info">
			{{$department->acad_info}}
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