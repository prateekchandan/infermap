@extends('layout.main')

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

				<h2>{{$data['name']}}</h2>
				<div>
					@if($data['area']!='')
						{{$data['area']}}
					@endif
					@if($data['city']!='')
						{{$data['city']}}
					@endif
				</div>

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
				            <li class="active"><a href="#">Menu Item 1</a></li>
				            <li><a href="#">Menu Item 2</a></li>
				            <li class="dropdown">
				              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
				              <ul class="dropdown-menu">
				                <li><a href="#">Action</a></li>
				                <li><a href="#">Another action</a></li>
				                <li><a href="#">Something else here</a></li>
				                <li class="divider"></li>
				                <li class="dropdown-header">Nav header</li>
				                <li><a href="#">Separated link</a></li>
				                <li><a href="#">One more separated link</a></li>
				              </ul>
				            </li>
				            <li><a href="#">Menu Item 4</a></li>
				            <li><a href="#">Reviews <span class="badge">1,118</span></a></li>
				          </ul>
				        </div><!--/.nav-collapse -->
				      </div>
				    </div>

				</div>
				<!-- end: Sidebar -->
				
			</div>
	
			<div class="col-sm-8">
				
				<!-- About us -->
				<div class="col-md-7">
					<!-- start: Row -->
					<div class="row">
						
						<div class="col-sm-12">
							
							<!-- start: About Us -->
							<div id="about">
								<div class="title"><h3>About Us</h3></div>
								{{print_r($data)}}
								
							</div>	
							<!-- end: About Us -->
							
						</div>	
						
					</div>
					<!-- end: Row -->
				</div>	

				<!-- Reviews -->
				<div class="col-md-5">
					<!-- start: Row -->
					<div class="row">
						
						<div class="col-sm-12">
							
							<!-- start: About Us -->
							<div id="about">
								<div class="title"><h3>Reviews</h3></div>
								<ul class="skills">
						        	<li>
						            	<h5>Web Design ( 40% )</h5>
						            	<div class="meter"><span style="width: 40%"></span></div><!-- Edite width here -->
						          	</li>
						          	<li>
						            	<h5>Wordpress ( 80% )</h5>
						            	<div class="meter"><span style="width: 80%"></span></div><!-- Edite width here -->
						          	</li>
						          	<li>
						            	<h5>Branding ( 100% )</h5>
						            	<div class="meter"><span style="width: 100%"></span></div><!-- Edite width here -->
						          	</li>
						          	<li>
						            	<h5>SEO Optmization ( 60% )</h5>
						            	<div class="meter"><span style="width: 60%"></span></div><!-- Edite width here -->
						          	</li>
						      	</ul>
								
							</div>	
							<!-- end: About Us -->

							
						</div>	
						
					</div>
					<!-- end: Row -->
				</div>	

			
				
			</div>	
			
			<div class="col-sm-2">
				
				<!-- start: Sidebar -->
				<div id="sidebar">

					<!-- start: Skills -->
			       	<div class="title"><h3>Our Skills</h3></div>
			
			       	<ul class="skills">
			        	<li>
			            	<h5>Web Design ( 40% )</h5>
			            	<div class="meter"><span style="width: 40%"></span></div><!-- Edite width here -->
			          	</li>
			          	<li>
			            	<h5>Wordpress ( 80% )</h5>
			            	<div class="meter"><span style="width: 80%"></span></div><!-- Edite width here -->
			          	</li>
			          	<li>
			            	<h5>Branding ( 100% )</h5>
			            	<div class="meter"><span style="width: 100%"></span></div><!-- Edite width here -->
			          	</li>
			          	<li>
			            	<h5>SEO Optmization ( 60% )</h5>
			            	<div class="meter"><span style="width: 60%"></span></div><!-- Edite width here -->
			          	</li>
			      	</ul>
			      	<!-- end: Skills -->
	

					<!-- start: Tabs -->
					<div class="title"><h3>Tabs</h3></div>

					<ul class="tabs-nav">
						<li class="active"><a href="about.html#tab1"><i class="mini-ico-glass"></i> Tab 1</a></li>
						<li><a href="about.html#tab2"><i class="mini-ico-list"></i> Tab 2</a></li>
						<li><a href="about.html#tab3"><i class="mini-ico-pencil"></i> Tab 3</a></li>
					</ul>

					<div class="tabs-container">
						<div class="tab-content" id="tab1">1. Lorem ipsum pharetra felis. Aliquam egestas consectetur elementum class aptent taciti sociosqu ad litora torquent perea conubia nostra lorem inceptos orem ipsum dolor sit amet, consectetur adipiscing elit.</div>
						<div class="tab-content" id="tab2">2. Lorem ipsum pharetra felis. Aliquam egestas consectetur elementum class aptent taciti sociosqu ad litora torquent perea conubia nostra lorem inceptos orem ipsum dolor sit amet, consectetur adipiscing elit.</div>
						<div class="tab-content" id="tab3">3. Lorem ipsum pharetra felis. Aliquam egestas consectetur elementum class aptent taciti sociosqu ad litora torquent perea conubia nostra lorem inceptos orem ipsum dolor sit amet, consectetur adipiscing elit.</div>
					</div>
					<!-- end: Tabs -->

					<!-- start: Testimonials-->

					<div class="testimonial-container">

						<div class="title"><h3>Testimonials</h3></div>

							<div class="testimonials-carousel" data-autorotate="3000">

								<ul class="carousel">

									<li class="testimonial">
										<div class="testimonials">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
										<div class="testimonials-bg"></div>
										<div class="testimonials-author">Lucas Luck, <span>CEO</span></div>
									</li>

									<li class="testimonial">
										<div class="testimonials">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
										<div class="testimonials-bg"></div>
										<div class="testimonials-author">Lucas Luck, <span>CTO</span></div>
									</li>

									<li class="testimonial">
										<div class="testimonials">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
										<div class="testimonials-bg"></div>
										<div class="testimonials-author">Lucas Luck, <span>COO</span></div>
									</li>

									<li class="testimonial">
										<div class="testimonials">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
										<div class="testimonials-bg"></div>
										<div class="testimonials-author">Lucas Luck, <span>CMO</span></div>
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