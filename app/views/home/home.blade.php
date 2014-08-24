@extends ('layout.main')

@section ('body')
@if (Session::get('messages') != null && Session::get('messages')->has('home_message'))
	<div class="alert alert-success alert-dismissible" role="alert" style="position:absolute;top:50px; width:50%; left:25%;opacity:0.6">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	{{ Session::get('messages')->first('home_message') }}
	</div>
@endif

<div style="width:100px; margin-right:auto; margin-left:auto">
	<input class="form-control"type="text">
</div>


@stop
