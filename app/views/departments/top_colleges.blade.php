@extends('departments.layout')
@section('department-content')


<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>
				Colleges with {{$department->value}} by state
			</h3>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>Sl no.</th>
					<th>College name</th>
					<th>City</th>
				</tr>
				@foreach($department->related_colleges as $key => $state)
					<tr>
						<th colspan=3 style="text-align:center">
							{{$key}}
						</th>
					</tr>
					@foreach($state as $key => $college)
					<tr>
						<td>{{$key+1}}</td>
						<td><a href="{{URL::route('college')}}/{{$college->link}}">{{$college->name}}</a></td>
						<td>{{$college->city}}</td>
					</tr>
					@endforeach
				@endforeach
			</thead>
		</table>
	</div>
</div>

@endsection