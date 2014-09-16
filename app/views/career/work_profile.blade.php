@extends('home.layout')
@section('content')
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="fa fa-graduation-cap"></i>Carrers @ Infermap</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->

	<div class="container">
		@foreach ($weeks as $week)
		<div class="row">
			<div class="title"><h3>Week-{{$week}} Tasks</h3></div>
			<hr>
		</div>
		@endforeach
	</div>
@endsection