@extends('home.layout')
@section('meta')
<title>{{$title}}</title>
@endsection
@section('content')
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="fa fa-globe"></i> {{$title}}</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<div class="container">
		<div class="col-md-10 col-md-offset-1">
			<div class="title"><h3>List of all {{$title}}</h3></div>
			<div class="col-md-6">
				<ul class="star_list">
					@foreach($list as $key => $college)
						@if($key < sizeof($list)/2)
						<li>
							<a href="{{URL::Route('college')}}/{{$college->link}}">{{$college->name}}
						</li>
						@endif
					@endforeach
				</ul>
			</div>
			<div class="col-md-6">
				<ul class="star_list">
					@foreach($list as $key => $college)
						@if($key >= sizeof($list)/2)
						<li>
							<a href="{{URL::Route('college')}}/{{$college->link}}">{{$college->name}}
						</li>
						@endif
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endsection