@extends('layout.main')
@section('body')
<div class="container">
	<table class="table">
		<tr>
			<th>Sl No</th>
			<th>College of Name</th>
			<th>User name</th>
			<th>User Email</th>
		</tr>
		@foreach($data as $key=> $row)
			<tr>
				<td>
					{{$key+1}}
				</td>
				<td>
					{{$row->college->name}}
				</td>
				<td>
					{{$row->user->name}}
				</td>
				<td>
					{{$row->user->email}}
				</td>
			</tr>			
		@endforeach	
	</table>
</div>
@endsection