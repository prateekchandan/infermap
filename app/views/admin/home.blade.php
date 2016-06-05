@extends('home.layout')
@section('content')
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="fa fa-pencil"></i>Welcome , {{Auth::user()->name}}</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="title"><h3>For Interns and carrers</h3></div>
			<ul class="arrow_list">
				<li><a href="{{URL::Route('career.add')}}">Add a new postion for intern</a></li>
				<li><a href="{{URL::Route('career.all')}}">See all intern applications</a></li>
			</ul>
		</div>
	</div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

@endsection