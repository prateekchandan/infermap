@extends('layout.main')

@section('meta')
<title>{{{$department->value}}}</title>
@endsection

@section('body')
<style type="text/css">
	.editable-content ul{
		padding-left:35px;
		list-style: inherit;
	}
</style>
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<div class="pull-left" style="max-width:80%">
					<h2>{{{$department->value}}}</h2>
				</div>`
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
				            <li class="{{($data['page_name']=='about')?'active':''}}">
				            	<a href="{{URL::route('department')}}/{{$data['link']}}/about">About</a>
				            </li>
				             <li class="{{($data['page_name']=='academic_info')?'active':''}}">
				            	<a href="{{URL::route('department')}}/{{$data['link']}}/academic_info">Acedemic Information</a>
				            </li>
				            <li class="{{($data['page_name']=='top_colleges')?'active':''}}">
				            	<a href="{{URL::route('department')}}/{{$data['link']}}/top_colleges">Top Colleges</a>
				            </li>
				            <li class="{{($data['page_name']=='placement_opportunities')?'active':''}}">
				            	<a href="{{URL::route('department')}}/{{$data['link']}}/placement_opportunities">Placement Opportunities</a>
				            </li>
				          </ul>
				        </div><!--/.nav-collapse -->
				      </div>
				    </div>

				</div>
				<!-- end: Sidebar -->
				
			</div>
	
			<div class="col-sm-7   main-college-content">
				@yield('department-content')
			</div>	
			
			<div class="col-sm-3">
				
				<!-- start: Sidebar -->
				<div id="sidebar">

					<!-- start: Skills -->
			       	<div class="title"><h3>Related</h3></div>
			
			       	<ul class="links-list-alt">
			       		
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
										<div class="testimonials-author">hjg</div>
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

				<!-- start: Footer Menu Links-->
				<div class="col-sm-9">
					
					
				</div>
				<!-- end: Footer Menu Links-->

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
			
			
			
		</div>
		<!-- end: Container  -->

	</div>
@endsection