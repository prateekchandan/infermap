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
			<th>Action</th>
		</tr>
		</thead>
		<tr>
			<form method="post" action="{{URL::route('exam.addevent')}}">
				<td>0<input type="hidden" name="eid" value="{{$exam->eid}}"></td>
				<td><input type="date" class="form-control" name="date" required></td>
				<td><textarea class="form-control" name="event" required></textarea></td>
				<td><button class="btn btn-success">add</button></td>
			</form>
		</tr>
	@foreach($exam->events as $key => $row)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$row->date}}</td>
			<td>{{$row->event}}</td>
			<td>
				<form method="post" action="{{URL::route('exam.deleteevent')}}">
					<input type="hidden" value="{{$row->id}}" name="id">
					<button class="btn btn-danger">delete</button>
				</form>
			</td>
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