@extends('layout.main')

@section('meta')
<title>List of All Undergraduate courses</title>
@endsection

@section('body')
<style type="text/css">
	a{
		color: #5F647C;;
		text-decoration: none;
	}
	a:hover{
		color: #5F647C;;
	}
</style>
<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<div class="pull-left" style="max-width:80%">
					<h2>
LList of All Undergraduate Engineering courses</h2>
				</div>
			</div>
			<!-- end: Container  -->

		</div>	

</div>
<div class="container">

		<!--start: Row -->
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
    		<div class="title"><h3>List of departments</h3></div>
    		
    		<div class="col-md-6">
	    		<ul class="arrow_list">
	    			@foreach($department as $key => $value)
	    				@if($key <= sizeof($department)/2)
	    				<li><a href="{{URL::route('department')}}/{{$value->link}}">{{$value->value}}</a></li>
	    				@endif
	    			@endforeach
	    		</ul>
	    	</div>

	    	<div class="col-md-6">
	    		<ul class="arrow_list">
	    			@foreach($department as $key => $value)
	    				@if($key > sizeof($department)/2)
	    				<li><a href="{{URL::route('department')}}/{{$value->link}}">{{$value->value}}</a></li>
	    				@endif
	    			@endforeach
	    		</ul>
	    	</div>
    		
    	</div>
   	</div>
  </div>
@endsection