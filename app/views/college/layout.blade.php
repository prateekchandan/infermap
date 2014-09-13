@extends('layout.main')

@section('meta')
<title>{{{$data['name']}}}</title>
@endsection

@section('body')
<style type="text/css">
	
</style>
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<div class="col-md-10">
					<h2>{{$data['name']}}</h2>
					<div class="head-locations">
						{{{$data['location_bar']}}}
					</div>
				</div>`
				@if($data['logo-img']!='0')
				<div class="col-md-2">
					<img class="logo-img" src="{{$data['logo-img']}}">
				</div>
				@endif

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Container -->
	<div class="container">

		<!--start: Row -->
    	<div class="row">

    		<div class="col-sm-2">
				
				<!-- start: Sidebar -->
				<div id="sidebar">

					<div class="sidebar-nav">
				      <div class="navbar navbar-default" role="navigation">
				        <div class="navbar-header">
				          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
				            <span class="sr-only">Toggle navigation</span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				          </button>
				          <span class="visible-xs navbar-brand">Pages</span>
				        </div>
				        <div class="navbar-collapse collapse sidebar-navbar-collapse">
				          <ul class="nav navbar-nav">
				            <li class="{{($data['page_name']=='about')?'active':''}}">
				            	<a href="{{URL::to('college')}}/{{$data['link']}}">About</a>
				            </li>
				            <li class="{{($data['page_name']=='admission')?'active':''}}">
				            	<a href="{{URL::to('college')}}/{{$data['link']}}/admission">Admission</a>
				            </li>
				            <li class="{{($data['page_name']=='fees')?'active':''}}">
				            	<a href="{{URL::to('college')}}/{{$data['link']}}/fees">Fees</a>
				            </li>
				            <li class="{{($data['page_name']=='placements')?'active':''}}">
				            	<a href="{{URL::to('college')}}/{{$data['link']}}/placements">Placement</a>
				            </li>
				            <li class="{{($data['page_name']=='facilities')?'active':''}}">
				            	<a href="{{URL::to('college')}}/{{$data['link']}}/facilities">Facilities</a>
				            </li>
				             <li class="{{($data['page_name']=='review')?'active':''}}">
				            	<a href="{{URL::to('college')}}/{{$data['link']}}/review">Review</a>
				            </li>
				          </ul>
				        </div><!--/.nav-collapse -->
				      </div>
				    </div>

				</div>
				<!-- end: Sidebar -->
				
			</div>
	
			<div class="col-sm-7   main-college-content">
				@yield('college-content')
			</div>	
			
			<div class="col-sm-3">
				
				<!-- start: Sidebar -->
				<div id="sidebar">

					<!-- start: Skills -->
			       	<div class="title"><h3>Related</h3></div>
			
			       	<ul class="links-list-alt">
			       		@if($data['state']!='')
				       		@if($data['city']!='')
								<li><a href="{{URL::to('/place').'/'.$data['state'].'/'.$data['city']}}">Colleges in {{{$data['city']}}}</a></li>
							@endif
								<li><a href="{{URL::to('/place').'/'.$data['state']}}">Colleges in {{{$data['state']}}}</a></li>
								<hr class="thin-hr">
						@endif

						@foreach($data['allexams'] as $exam)
							<li><a href="{{URL::to('exam').'/'.$exam->link}}">About {{$exam->name}}</a></li>
						@endforeach

						@if(sizeof($data['allexams'])>0)
							<hr class="thin-hr">
						@endif

						@foreach($data['related-colleges'] as $college)
							<li><a href="{{URL::to('college').'/'.$college->link}}">{{$college->name}}</a></li>
						@endforeach
					</ul>
			      	<!-- end: Skills -->

					<!-- start: Testimonials-->

					<div class="testimonial-container">

						<div class="title"><h3>About Infermap</h3></div>

							<div class="testimonials-carousel" data-autorotate="3000">
								<ul class="carousel">

									<li class="testimonial">
										<div class="testimonials">Infermap is a free comprehensive platform that improves the college selecting process, based on individual resources and requirements. 
Inspired by a belief that all students deserve access to good guidance, infermap aims to create the interactive tools and media that guide students as they find, afford and enroll in a college that’s a good fit for them.</div>
										<div class="testimonials-bg"></div>
										<div class="testimonials-author"></div>
									</li>
								</ul>
							</div>

						</div>

					<!-- end: Testimonials-->

				</div>
				<!-- end: Sidebar -->
				
			</div>
		</div>
		<!--end: Row-->

	</div>
	<!--end: Container-->

	<div id="footer-menu" class="hidden-sm hidden-xs">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="col-sm-2">
					<div id="footer-menu-logo">
						<a class="brand" href="{{URL::to('/')}}"><span>Infermap</span></a>
					</div>
				</div>
				<!-- end: Footer Menu Logo -->

				@include('home.footer_links')

				<!-- start: Footer Menu Back To Top -->
				<div class="col-sm-1">
						
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

	</div>
	<div id="footer">
		
		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">
				@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/contact/contacts.txt'))
				@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/contact/contacts.txt'))!='')
					<div class="col-sm-6">	
						<h3>Contacts</h3>
						<p>
							<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/contact/contacts.txt'); ?>
						</p>	
					</div>
				@endif
				@endif
		

				<div class="col-sm-3">
				
					<!-- start: Follow Us -->
					<h3>Links</h3>
					<div class="row">
					<ul class="social-bookmarks">

						@if(isset($data['links']['fblink']))
						<li class="facebook">
							<a href="{{{$data['links']['fblink']}}}">Facebook</a>
						</li>
						@endif
						@if(isset($data['links']['twitterlink']))
						<li class="twitter">
							<a href="{{{$data['links']['twitterlink']}}}">Twitter</a>
						</li>
						@endif
						@if(isset($data['links']['pluslink']))
						<li class="googleplus">
							<a href="{{{$data['links']['pluslink']}}}">google plus</a>
						</li>
						@endif
						@if(isset($data['links']['linkedlink']))
						<li class="linkedin">
							<a href="{{{$data['links']['linkedlink']}}}">linked in</a>
						</li>
						@endif						
					</ul>
					</div>
					<!-- end: Follow Us -->
					<br>
					@if($data['latitude']!=0 && $data['longitude']!=0)
					<div class="row">
						<a target=_blank href="https://www.google.com/maps/preview/{{'@'}}{{$data['latitude']}},{{$data['longitude']}},14z">View this college on map</a>
					</div>
					@endif
					@if(isset($data['links']['weblink']))
						<div class="row">
							<a href="{{{$data['links']['weblink']}}}">Visit college Website</a>
						</div>
						@endif
			
				
				</div>

				<div class="col-sm-3">
					<h3>Related</h3>
					<ul class="arrow_list">
						<li><a href="./review">Write review for this college</a></li>
					</ul>
				</div>
				
			</div>
			<!-- end: Row -->	
			
		</div>
		<!-- end: Container  -->

	</div>
@endsection