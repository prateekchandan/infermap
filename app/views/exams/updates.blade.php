@extends('exams.layout')
@section('exam-content')
<link rel="stylesheet" href="{{URL::asset('assets/css/redit.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('assets/css/dataTables.min.css')}}">

<?php  $check=0; ?>
<div class="col-md-12">
	<div class="title">
		<h3>Important Dates</h3>
	</div>
	<table class="table table-bordered">
	<thead>
		<tr>
			<th>
				Sl No
			</th>
			<th>Date</th>
			<th>Description</th>
		</tr>
		</thead>
	@foreach($exam->events as $key => $row)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$row->date}}</td>
			<td>{{$row->event}}</td>
		</tr>
	@endforeach
	</table>
</div>
<script type="text/javascript" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	    $('table').dataTable();
	});
</script>
@endsection