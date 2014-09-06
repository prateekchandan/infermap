<!DOCTYPE html>
<html lang="en">
<head>

	@yield('meta')
    <!-- start: CSS -->
    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('assets/css/style.min.css')}}" rel="stylesheet">
		
	<link href="{{URL::asset('assets/css/parallax-slider.css')}}" rel="stylesheet">
	<link href="{{URL::asset('assets/css/custom-css.css')}}" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	
	<link rel="icon" href="{{URL::asset('assets/img/icons/icon.png')}}" type="image/x-icon">
	<script src="{{URL::asset('assets/js/jquery-1.9.1.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>

	<!-- end: CSS -->

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="assets/js/respond.min.js"></script>
		
	<![endif]-->

</head>
<body>
	
	<!--start: Navbar -->
	<nav class="navbar navbar-default" role="navigation">		
		<!--start: Container -->
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
	    	<div class="navbar-header">
	      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
	        		<span class="sr-only">Toggle navigation</span>
	        		<span class="icon-bar"></span>
	        		<span class="icon-bar"></span>
	        		<span class="icon-bar"></span>
	      		</button>
	      		<a class="navbar-brand" href="http://www.infermap.com"><img style="height:60px;margin-top:-5px;margin-right:4px" src="{{URL::asset('assets/img/icons/icon.png')}}"><span>INFERMAP</span></a>
	    	</div>

	    	<!-- Collect the nav links, forms, and other content for toggling -->
	    	<div class="collapse navbar-collapse" id="main-navigation">
	      		<ul class="nav navbar-right navbar-nav">
												
					<li ><a href="#">College Search</a></li>
					<li ><a href="#">My College Plan</a></li>
					<li ><a href="#">Compare Colleges</a></li>
					<li ><a href="{{URL::Route('exam')}}">Exams</a></li>
					<li ><a href="http://blog.infermap.com">Blog</a></li>
					@if(Auth::check())
					<li class="dropdown">
            			<a href="index.html#" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
            			<ul class="dropdown-menu">
							<li><a href="{{URL::Route('user.edit')}}">Edit Profile</a></li>
							<li><a href="{{URL::Route('user.logout')}}">Logout</a></li>
            			</ul>
          			</li>
					@else
						<li><a href="{{URL::Route('user.login')}}">Login/Register</a></li>
					@endif
        		</ul>
	    	</div><!-- /.navbar-collapse -->		
		</div>
		<!--/.container-->			
	</nav>
	<!--end: Navbar -->
	@yield('body')

	<!-- start: Copyright -->
	<div id="copyright">
	
		<!-- start: Container -->
		<div class="container">
		
			<div class="col-sm-12">
				
				<p>
					&copy; 2014, <a href="http://www.infermap.com" alt="Infermap">Infermap.com</a>
				</p>
				
			</div>
	
		</div>
		<!-- end: Container  -->
		
	</div>	
	<!-- end: Copyright -->

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{URL::asset('assets/js/jquery.isotope.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.imagesloaded.js')}}"></script>
<script src="{{URL::asset('assets/js/flexslider.js')}}"></script>
<script src="{{URL::asset('assets/js/carousel.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.cslider.js')}}"></script>
<script src="{{URL::asset('assets/js/slider.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.fancybox.js')}}"></script>

<script src="{{URL::asset('assets/js/excanvas.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.flot.pie.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.flot.stack.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.flot.resize.min.js')}}"></script>

<script src="{{URL::asset('assets/js/custom.js')}}"></script>
<!-- end: Java Script -->

</body>
</html>