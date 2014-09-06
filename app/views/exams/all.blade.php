@extends('layout.main')

@section('meta')
<title>List of Exams for Engineering</title>
@endsection

@section('body')
<style type="text/css">
	a{
		color: #5F647C;;
		text-decoration: none;
	}
	a:hover{
		color: #5F647C;;
	}
</style>
<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<div class="pull-left" style="max-width:80%">
					<h2>List of All Exams</h2>
				</div>
			</div>
			<!-- end: Container  -->

		</div>	

</div>
<div class="container">

		<!--start: Row -->
    <div class="row">
    	<div class="col-md-6 col-md-offset-2">
    		<div class="title"><h3>List of all Exams</h3></div>
    		<table class="table">
    			<thead>
    				<tr>
    					<th>Sl no</th>
    					<th>Exam Name</th>
    					<th>Full Form</th>
    				</tr>
    			</thead>
    			@foreach ($exam as $key => $row) 
    			<tr>
    				<td>{{$key+1}}</td>
					<td><a href='{{URL::route('exam')}}/{{$row->link}}'>{{$row->name}}</a></td>
					<td><a href='{{URL::route('exam')}}/{{$row->link}}'>{{$row->fullform}}</a></td>
				</tr>
				@endforeach
    		</table>
    		
    	</div>
   	</div>
  </div>
@endsection