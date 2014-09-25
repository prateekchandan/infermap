@extends ('home.layout')

@section ('content')
<style type="text/css">
	.sidebar-wrapper{
		padding: 20px;
		padding-top: 40px;
		box-shadow: inset 0px 0px 10px #f9f9f9;
		margin-top: 50px;
		margin-bottom: 50px;

	}
	.side-filter{
		border-bottom: 1px double #eee;
	}
	.side-filter::before{
		background-color:#999;
		width: 20px;	
		height: 110%;
		content: 'I';
		color: #999;
	}
	.side-active::before{
		background-color: orange;
		width: 20px;	
		height: 110%;
		content: 'I';
		color: orange;
	}

	.side-option{
		display: none;
		padding: 20px;
		background-color: #fafafa;
	}
</style>
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/chosen.min.css')}}">
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
			<div class="col-md-3 sidebar-wrapper">
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
				          <span class="visible-xs navbar-brand">Apply Filters</span>
				        </div>
				        <div class="navbar-collapse collapse sidebar-navbar-collapse">
				          <ul class="nav navbar-nav">

				            <li>
				            	<a href="#" class="side-filter side-active" id="location-search" data-search="location">
				            		Location Search
				            		<span class="pull-right">
				            			<i class="fa fa-caret-right"></i>
				            		</span>
				            	</a>
				            	<div class="side-option" id="location-box">
				            		<div class="form-group">
				            			<label>Select State</label>
				            			<select class="form-control" id="location-state" name="state">
				            				<option value=''>Select State</option>
				            				@foreach(DB::select('select distinct state from college_id where state!=""') as $state )
				            					<option>{{$state->state}}</option>
				            				@endforeach
				            			</select>
				            		</div>

				            		<div class="form-group">
				            			<label>Select City</label>
				            			<select class="form-control" id="location-city" name="city" >
				            				<option value=''>Select City</option>
				            			</select>
				            		</div>
				            	</div>
				            </li>
				            <li>
				            	<a href="#" class="side-filter" data-search="exam">
				            		Exam Search
				            		<span class="pull-right">
				            			<i class="fa fa-caret-right"></i>
				            		</span>
				            	</a>
				            	<div class="side-option" id="exam-box">
				            		<div class="form-group">
				            			<label>Select State</label>
				            			<select class="form-control" id="exam-name" name="exam-name">
				            				<option value=''>Select Exam</option>
				            				@foreach(DB::select('select distinct fullform from exam where eid!=0') as $exam )
				            					<option>{{$exam->fullform}}</option>
				            				@endforeach
				            			</select>
				            		</div>

				            		<div class="form-group">
				            			<label>Select City</label>
				            			<select class="form-control" id="location-city" name="city" >
				            				<option value=''> Select City </option>
				            			</select>
				            		</div>
				            	</div>
				            </li>
				            <li>
				            	<a href="#" class="side-filter" data-search="department">
				            		Department Search
				            		<span class="pull-right">
				            			<i class="fa fa-caret-right"></i>
				            		</span>
				            	</a>
				            </li>
				          </ul>
				        </div><!--/.nav-collapse -->
				      </div>
				    </div>

				</div>
				<!-- end: Sidebar -->
			</div>
			<div class="col-md-9" id="search_result_box">
			@include('home.search_grid')
      		</div>
		</div>
		<!--end: Container-->
				
	</div>
<script src="{{URL::asset('assets/js/chosen.jquery.min.js')}}"></script>
<script type="text/javascript">
	$('.side-filter').click(function(e) {
		e.preventDefault();	
		var id=$(this).data('search');
		$('#'+id+'-box').slideToggle();
		var attrtoggle=$('#'+id+'-search>span>i').attr('class');
		if(attrtoggle=="fa fa-caret-right")
			$('#'+id+'-search>span>i').attr('class',"fa fa-caret-down");
		else
			$('#'+id+'-search>span>i').attr('class',"fa fa-caret-right");
	})
	
	$('.chosen-select').chosen({width: "100%"});

	var states={{$cities}};
	$('#location-state').change(function(e){
		var val=$(this).val();
		if(val=='')
		{
			$('#location-city').html('<option>Select City</option>');
			$('#location-city').attr('disabled','disabled');
		}
		else
		{
			var str='<option>Select City</option>';
			for (var i = 0; i < states[val].length; i++) {
				str+='<option>'+states[val][i]+'</option>';
			};
			$('#location-city').html(str);
			$('#location-city').removeAttr('disabled');
		}
	})
</script>
@endsection