@extends('home.layout')
@section('content')
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="fa fa-graduation-cap"></i>All Intern Applications</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->

	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
			<br>
				<table class="table">
					<thead>
						<tr>
							<th>Sl No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Positon</th>
							<th>Resume</th>
							<th>Action</th>
						</tr>
						<thead>
							@foreach($app as $key => $pos)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$pos->name}}</td>
								<td>{{$pos->email}}</td>
								<td>{{$pos->position}}</td>
								<td><a href="{{$pos->resume_link}}">Click here</a></td>
								<td>
									@if($pos->accept!=1)
									<a class="btn btn-success" href="{{URL::Route('intern.accept')}}?user={{$pos->user_id}}&pos={{$pos->position_id}}">Accept</a>
									@else
									<span class="alert-success alert">Already accepted</span>
									@endif
									<a class="btn btn-danger" href="{{URL::Route('intern.delete')}}?user={{$pos->user_id}}&pos={{$pos->position_id}}">Delete</a>
								</td>
							</tr>
							@endforeach
						</thead>
					</thead>
				</table>
			</div>
		</div>
	</div>
@endsection