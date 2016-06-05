@extends ('home.layout')

@section ('content')
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="fa fa-ban"></i>Error {{$code}} Occured</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	<div class="container">

		<!--start: Row -->
    	<div class="row">
	
			<div class="col-sm-8 col-md-offset-2">
				
				<!-- start: Row -->
				<div class="row">
					
					<div class="col-sm-12">
						
						
						<blockquote class="jumbotron">
							<p>Its a {{$code}} error</p>
							<p>
								Please send us a mail at infermap@gmail.com for queries
							</p>
						</blockquote>
						
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						
					</div>	
					
				</div>
				<!-- end: Row -->	

				
			</div>	
			
		</div>
		<!--end: Row-->

	</div>

@endsection