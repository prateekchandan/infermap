@extends('layout.main')
@section('meta')
<title>College not Found</title>
@endsection
@section('body')
<div id="wrapper">
	<div class="container" style="min-height:500px">
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="row">
        		<div class="col-sm-4 col-md-offset-4" >
          			<div class="icons-box text-center" style="background-color:rgba(230,230,230,0.1)">
						<i class="fa fa-warning bordered color circle big"></i>
						<div class="title"><h3>Course Not Found</h3></div>
						<p>
							The course you were looking for could not be found. An error occurred. Please try again shortly.
						</p>
						<p>
							<a href="http://www.infermap.com">Infermap home</a>
							or
							<a href="javascript:history.go(-1);">Previous page</a>
						</p>
						<div class="clear"></div>
					</div>
        		</div>

      		</div>
	</div>
</div>
@endsection