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
		<div class="row">
			<div class="slider">
			
				<div id="flex1" class="flexslider">
					<ul class="slides">

						<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; display: list-item;">
							<img src="{{URL::asset('assets/img/career/careers1.png')}}" alt="">
							<div class="slide-caption n hidden-phone">
								<h3>Work with us at Infermap</h3>
								<p>
									“ Go confidently in the direction of your dreams. Live the life you have imagined. ”
								</p>
							</div>
						</li>

						
					</ul>
				<!--ul class="flex-direction-nav"><li><a class="flex-prev" href="#">Previous</a></li><li><a class="flex-next" href="#">Next</a></li></ul-->
				</div>
			
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<br>
				<div class="jumbotron">
					<h3>Note : We are currently open only for short term interns</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<br>
				@foreach($post as $key=>$value)
				<div class="title"><h3>{{$key}}</h3></div>
					<ul>
					@foreach($value as $position)
						<li>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-10">
										<h3><a href="{{URL::Route('career.position')}}/{{$position->link}}">{{$position->position}}</a></h3>
									</div>
									<div class="col-md-2">
										<a href="{{URL::Route('career.position')}}/{{$position->link}}#apply" class="btn btn-success">Apply</a>
									</div>
								</div>
								<p>{{$position->desc}}</p>
								<hr class="thin-hr">
							</div>
						</li>
					
					@endforeach
					</ul>
				@endforeach
			</div>
		</div>
	</div>
@endsection