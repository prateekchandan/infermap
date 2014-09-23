@extends ('home.layout')

@section ('content')
<style type="text/css">
	.sidebar{
		min-height: 500px;
	}
</style>
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2>{{$text}}</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<div id="wrapper">
		
		
		<div class="container" style="width:95%">
			<div class="col-md-3 sidebar">
			dw
			</div>
			<div class="col-md-9" id="search_result_box">
			@include('home.search_grid')
      		</div>
		</div>
		<!--end: Container-->
				
	</div>


@endsection