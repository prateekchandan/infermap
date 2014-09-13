@extends ('layout.main')
@section ('body')

@yield('content')
<div id="footer-menu" class="hidden-sm hidden-xs">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="col-sm-2">
					<div id="footer-menu-logo">
						<a class="brand" href="{{URL::to('/')}}"><span>Infermap</span>.</a>
					</div>
				</div>
				<!-- end: Footer Menu Logo -->

				@include('home.footer_links')

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
						<a href="{{URL::to('/')}}">Infermap</a> is the hassle free approach to investigate your higher education needs. There is a huge set of factors that govern where one ends up studying, which eventually forge their career. Infermap’s set of tools and filtering options are designed keeping students in mind to help them find what they’re looking for. Our simplified interface and vast structured database makes sure you bag the best seat.
					</p>
						
				</div>
				<!-- end: About -->

				<!-- start: Photo Stream -->
				<div class="col-sm-3">
					
					<h3>Quick links</h3>
					<ul class="arrow_list">
						<li><a href="{{URL::route('exam')}}">Check all exams for admission in Btech</a></li>
						<li><a href="{{URL::route('department')}}">See all engineering colleges</a></li>
					</ul>
					
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
											<a href="https://twitter.com/Infermap"><i class="fa fa-twitter"></i></a>
										</div>
										<div class="social-info-back social-twitter-hover">
											<a href="https://twitter.com/Infermap"><i class="fa fa-twitter"></i></a>
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
											<a href="https://www.facebook.com/infermap"><i class="fa fa-facebook"></i></a>
										</div>
										<div class="social-info-back social-facebook-hover">
											<a href="https://www.facebook.com/infermap"><i class="fa fa-facebook"></i></a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-html5">
											<a href="https://plus.google.com/u/0/102559294513459206399/"><i class="fa fa-google-plus"></i></a>
										</div>
										<div class="social-info-back social-html5-hover">
											<a href="https://plus.google.com/u/0/102559294513459206399/"><i class="fa fa-google-plus"></i></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
					</ul>
				
				</div>
				
			</div>
			<!-- end: Row -->	
			
		</div>
		<!-- end: Container  -->

	</div>
@endsection