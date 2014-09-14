@extends('home.layout')
@section('content')
<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="fa fa-user"></i> Welcome , {{{$user->name}}}</h2>

			</div>
			<!-- end: Container  -->

		</div>	

</div>
<!-- end: Page Title -->
	<div class="container">

		<!--start: Row -->
    	<div class="row">
	
			<div class="col-sm-10 col-md-offset-1">
				
				<!-- start: Row -->
				<div class="row">
					
					<div class="col-sm-12">
						<div>
							<div class="title"><h3>Priviledges</h3></div>
							@if($user->admin>=1)
							<blockquote>
								Welcome to be a priviledge administrator in various applications of Infermap.
							</blockquote>
							@else
							<blockquote>
								Welcome to be be a part of Infermap. Here we provide you the blah blah
							</blockquote>
							@endif							
						</div>	

						<div>
							<div class="title"><h3>Review submitted by you </h3></div>
							@if($review==NULL)
							<blockquote>
								OOps.. This Place seems to be empty<br>
								<div>
									Give back to the community by sharing your college experience, guide the high school students by shedding some light on the details of your college. / letting them know more about your college.
								</div>
								<a href="{{URL::Route('review_main')}}" class="btn btn-primary">Submit a review</a>
							</blockquote>
							@else
							<blockquote>
								@if($review->college_id==0)
									Review submitted for : <br>
									{{$review->name}} , {{$review->city}}
									<h5>Note: You can submit a new review for any college. The previous will be automatically deleted</h5>
								@else
									Review submitted for : <br>
									<a href="{{URL::route('college')}}/{{$review->link}}">{{$review->name}}</a>
									<h5>Note: You can submit a new review for any college. The previous will be automatically deleted</h5>
								@endif
							</blockquote>
							@endif							
						</div>	
					</div>	
					
				</div>
				<!-- end: Row -->	

				
			</div>	
			
		</div>
		<!--end: Row-->

	</div>
@endsection