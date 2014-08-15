@extends('layout.main')

@section('meta')
<title>{{{$data['name']}}}</title>
@endsection

@section('body')
<style type="text/css">
	/* make sidebar nav vertical */ 
	@media (min-width: 768px) {
	  .sidebar-nav .navbar .navbar-collapse {
	    padding: 0;
	    max-height: none;
	  }
	  .sidebar-nav .navbar ul {
	    float: none;
	  }
	  .sidebar-nav .navbar ul:not {
	    display: block;
	  }
	  .sidebar-nav .navbar li {
	    float: none;
	    display: block;
	  }
	  .sidebar-nav .navbar li a {
	    padding-top: 12px;
	    padding-bottom: 12px;
	  }
	}
</style>
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<div class="pull-left" style="max-width:80%">
					<h2>{{{$data['name']}}}</h2>
					<div class="head-locations">
						{{{$data['location_bar']}}}
					</div>
				</div>`
				@if($data['logo-img']!='0')
				<div class="pull-right" style="max-width:20%">
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
				          <span class="visible-xs navbar-brand">Navigate this college</span>
				        </div>
				        <div class="navbar-collapse collapse sidebar-navbar-collapse">
				          <ul class="nav navbar-nav">
				            <li><a href="{{URL::to('college')}}/{{$data['link']}}">About</a></li>
				            <li><a href="{{URL::to('college')}}/{{$data['link']}}/admission">Admission</a></li>
				            <li><a href="{{URL::to('college')}}/{{$data['link']}}/fees">Fees</a></li>
				            <li><a href="{{URL::to('college')}}/{{$data['link']}}/placements">Placement</a></li>
				            <li><a href="{{URL::to('college')}}/{{$data['link']}}/facilities">Facilities</a></li>
				            
				          </ul>
				        </div><!--/.nav-collapse -->
				      </div>
				    </div>

				</div>
				<!-- end: Sidebar -->
				
			</div>
	
			<div class="col-sm-8   main-college-content">
				<?php  $check=0; ?>
				@yield('college-content')
				<?php
					if($check==0){
						?>
				No data

						<?
					}
				?>
				@endif
			</div>	
			
			<div class="col-sm-2">
				
				<!-- start: Sidebar -->
				<div id="sidebar">

					<!-- start: Skills -->
			       	<div class="title"><h3>Related</h3></div>
			
			       	<ul class="links-list-alt">
						<li><a href="http://localhost:8888/bootstrap/smart2/full_width.html">Full Width</a></li>
						<li><a href="http://localhost:8888/bootstrap/smart2/sidebar.html">Sidebar</a></li>
						<li><a href="post.html">Single Post</a></li>
						<li><a href="about.html">About Us</a></li>
						<li><a href="http://localhost:8888/bootstrap/smart2/pricing_tables.html">Pricing Tables</a></li>
					</ul>
			      	<!-- end: Skills -->

					<!-- start: Testimonials-->

					<div class="testimonial-container">

						<div class="title"><h3>Testimonials</h3></div>

							<div class="testimonials-carousel" data-autorotate="3000">
								<ul class="carousel">

									<li class="testimonial">
										<div class="testimonials">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
										<div class="testimonials-bg"></div>
										<div class="testimonials-author">Shivam, <span>CEO</span></div>
									</li>

									<li class="testimonial">
										<div class="testimonials">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
										<div class="testimonials-bg"></div>
										<div class="testimonials-author">Yogesh, <span>CEO</span></div>
									</li>
									<li class="testimonial">
										<div class="testimonials">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
										<div class="testimonials-bg"></div>
										<div class="testimonials-author">Prateek, <span>CTO</span></div>
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
@endsection