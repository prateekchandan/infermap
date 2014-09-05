@extends('layout.main')

@section('meta')
<title></title>
@endsection

@section('body')
<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<div class="pull-left" style="max-width:80%">
					<h2>List of All Exams</h2>
				</div>
			</div>
			<!-- end: Container  -->

		</div>	

</div>
<div class="container">

		<!--start: Row -->
    <div class="row">
    	<div class="col-md-6 col-md-offset-2">
    		<div class="title"><h3>List of all Exams</h3></div>
    		<ul class="arrow_list">
    			@foreach ($exam as $key => $row) 
				<li><a href='{{URL::route('exam')}}/{{$row->link}}'>{{$row->name}}</a></li>
				@endforeach
    		</ul>
    		
    	</div>
   	</div>
  </div>
@endsection