@extends('home.layout')

@section('meta')
<title>List of Exams for Engineering</title>
@endsection

@section('content')
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
List of Engineering Entrance Exam 2014 - 2015 | India</h2>
				</div>
			</div>
			<!-- end: Container  -->

		</div>	

</div>
<div class="container">

		<!--start: Row -->
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
    		<div class="title"><h3>List of all Exams</h3></div>
    		<div style="text-align: justify;">
				Engineering is the most hunted after specialized course after 12th in India. Students who are passionate about technology and machines can become an engineer by cracking one of the engineering entrance exams given below. These exams are conducted every year at both National and State ranks for choosing most skilled and competent candidates for admission into engineering institutes across the nation. Prominent engineering colleges in India include IITs, NITs, Birla Institute of Technology and few more. Most of the engineering colleges are AICTE permitted.
				 The most significant and respected <b>Engineering Entrance Exams in India</b> are AIEEE, BITSAT, IIT JEE, KCET,  MHTCET and few more.
			</div>
    		<table class="table">
    			<thead>
    				<tr>
    					<th>Sl no</th>
    					<th>Exam Name</th>
    					<th>Full Form</th>
    				</tr>
    			</thead>
    			@foreach ($exam as $key => $row) 
    			<tr>
    				<td>{{$key+1}}</td>
					<td><a href='{{URL::route('exam')}}/{{$row->link}}'>{{$row->name}}</a></td>
					<td><a href='{{URL::route('exam')}}/{{$row->link}}'>{{$row->fullform}}</a></td>
				</tr>
				@endforeach
    		</table>
    		
    	</div>
   	</div>
  </div>
@endsection