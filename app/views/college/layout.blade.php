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
				            
				          </ul>
				        </div><!--/.nav-collapse -->
				      </div>
				    </div>

				</div>
				<!-- end: Sidebar -->
				
			</div>
	
			<div class="col-sm-8   main-college-content">
				@yield('college-content')
			</div>	
			
			<div class="col-sm-2">
				
				<!-- start: Sidebar -->
				<div id="sidebar">

					<!-- start: Skills -->
			       	<div class="title"><h3>Related</h3></div>
			
			       	<ul class="links-list-alt">
			       		@if($data['state']!='')
			       		@if($data['city']!='')
							<li><a href="{{URl::to('/').'/'.$data['state'].'/'.$data['city']}}">Colleges in {{{$data['city']}}}</a></li>
						@endif
							<li><a href="{{URl::to('/').'/'.$data['state'].'/all'}}">Colleges in {{{$data['state']}}}</a></li>
						@endif

						@foreach($data['allexams'] as $exam)
							<li><a href="{{URl::to('exam').'/'.$exam->link}}">About {{$exam->name}}</a></li>
						@endforeach

						@foreach($data['related-colleges'] as $college)
							<li><a href="{{URl::to('college').'/'.$college->link}}">{{$college->name}}</a></li>
						@endforeach
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

	<div id="footer-menu" class="hidden-sm hidden-xs">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="col-sm-2">
					<div id="footer-menu-logo">
						<a class="brand" href="about.html#">Sma<span>rt</span>.</a>
					</div>
				</div>
				<!-- end: Footer Menu Logo -->

				<!-- start: Footer Menu Links-->
				<div class="col-sm-9">
					
					<div id="footer-menu-links">

						<ul id="footer-nav">

							<li><a href="index.html">Start</a></li>

							<li><a href="about.html">About</a></li>

							<li><a href="services.html">Services</a></li>

							<li><a href="pricing.html">Pricing</a></li>
							
							<li><a href="contact.html">Contact</a></li>

						</ul>

					</div>
					
				</div>
				<!-- end: Footer Menu Links-->

				<!-- start: Footer Menu Back To Top -->
				<div class="col-sm-1">
						
					<div id="footer-menu-back-to-top">
						<a href="about.html#"></a>
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

				<!-- start: About -->
				<div class="col-sm-3">
					
					<h3>About Us</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
					</p>
						
				</div>
				<!-- end: About -->

				<!-- start: Photo Stream -->
				<div class="col-sm-3">
					
					<h3>Photo Stream</h3>
					<div class="flickr-widget">
							<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=9&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=29609591@N08"></script><div class="flickr_badge_image" id="flickr_badge_image1"><a href="http://www.flickr.com/photos/29609591@N08/14597619532/"><img src="http://farm3.staticflickr.com/2903/14597619532_44ce6cdfca_s.jpg" alt="A photo on Flickr" title="FOG horn" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image2"><a href="http://www.flickr.com/photos/29609591@N08/14588412495/"><img src="http://farm4.staticflickr.com/3835/14588412495_71b651ca8f_s.jpg" alt="A photo on Flickr" title="Pennan" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image3"><a href="http://www.flickr.com/photos/29609591@N08/14466613846/"><img src="http://farm6.staticflickr.com/5570/14466613846_3e17384ffb_s.jpg" alt="A photo on Flickr" title="St Colm's Abbey Inchcolm Island" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image4"><a href="http://www.flickr.com/photos/29609591@N08/14381598632/"><img src="http://farm4.staticflickr.com/3909/14381598632_424293750f_s.jpg" alt="A photo on Flickr" title="Shipwrecked Selfie" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image5"><a href="http://www.flickr.com/photos/29609591@N08/13845179383/"><img src="http://farm8.staticflickr.com/7389/13845179383_b7355843bd_s.jpg" alt="A photo on Flickr" title="Stewart Sycamore" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image6"><a href="http://www.flickr.com/photos/29609591@N08/12344882985/"><img src="http://farm4.staticflickr.com/3785/12344882985_b1df3d961c_s.jpg" alt="A photo on Flickr" title="Rusty" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image7"><a href="http://www.flickr.com/photos/29609591@N08/12234243593/"><img src="http://farm4.staticflickr.com/3737/12234243593_7cd8c5312c_s.jpg" alt="A photo on Flickr" title="Boathouse Isle of Danna" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image8"><a href="http://www.flickr.com/photos/29609591@N08/12220237506/"><img src="http://farm8.staticflickr.com/7435/12220237506_0201bffebc_s.jpg" alt="A photo on Flickr" title="Vital Spark" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image9"><a href="http://www.flickr.com/photos/29609591@N08/12176303006/"><img src="http://farm3.staticflickr.com/2888/12176303006_2d8f6e7924_s.jpg" alt="A photo on Flickr" title="Dancin Dog" height="75" width="75"></a></div><span style="position:absolute;left:-999em;top:-999em;visibility:hidden" class="flickr_badge_beacon"><img src="http://geo.yahoo.com/p?s=792600102&amp;t=0987526b481816787dfb7dea98fe9919&amp;r=http%3A%2F%2Flocalhost%3A8000%2Fabout.html&amp;fl_ev=0&amp;lang=en&amp;intl=us" width="0" height="0" alt=""></span>
						<div class="clear"></div>
					</div>
					
				</div>
				<!-- end: Photo Stream -->

				<div class="col-sm-6">
				
					<!-- start: Follow Us -->
					<h3>Follow Us!</h3>
					<ul class="social-grid">
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-twitter">
											<a href="http://twitter.com/BootstrapMaster"><i class="fa fa-twitter"></i></a>
										</div>
										<div class="social-info-back social-twitter-hover">
											<a href="http://twitter.com/BootstrapMaster"><i class="fa fa-twitter"></i></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-facebook">
											<a href="http://facebook.com/BootstrapMaster"><i class="fa fa-facebook"></i></a>
										</div>
										<div class="social-info-back social-facebook-hover">
											<a href="http://facebook.com/BootstrapMaster"><i class="fa fa-facebook"></i></a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-dribbble">
											<a href="http://dribbble.com"><i class="fa fa-dribbble"></i></a>
										</div>
										<div class="social-info-back social-dribbble-hover">
											<a href="http://dribbble.com"><i class="fa fa-dribbble"></i></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-flickr">
											<a href="http://flickr.com"><i class="fa fa-flickr"></i></a>
										</div>
										<div class="social-info-back social-flickr-hover">
											<a href="http://flickr.com"><i class="fa fa-flickr"></i></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
					</ul>
					<!-- end: Follow Us -->
				
					<!-- start: Newsletter -->
					<h3>Newsletter</h3>
					<form id="newsletter">
						
						<p>Please leave us your email</p>
						<div class="row">
							<div class="col-lg-12">
								<label>@:</label>
						    	<div class="input-group">
						      		<input type="text" class="form-control">
						      		<span class="input-group-btn">
						        		<button class="btn btn-default" type="button">Submit!</button>
						      		</span>
						    	</div><!-- /input-group -->
						  	</div><!-- /.col-->
						</div>
					</form>
					<!-- end: Newsletter -->
				
				</div>
				
			</div>
			<!-- end: Row -->	
			
		</div>
		<!-- end: Container  -->

	</div>
@endsection