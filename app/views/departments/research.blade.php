@extends('departments.layout')
@section('department-content')

<?php  $check=0; ?>

@if($department->research!='')
<?php  $check=1; ?>
<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>Research Opportunities</h3>
		</div>
		<div class="row col-md-12">
			<div>
			{{$department->research}}
			</div>
		</div>
	</div>
</div>	
@endif

@if($department->higher_studies!='')
<?php  $check=1; ?>
<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>Higher Studies</h3>
		</div>
		<div class="row col-md-12">
			<div>
			{{$department->higher_studies}}
			</div>
		</div>
	</div>
</div>	
@endif

@if($check==0)
	@include('college.nodata')
@endif
@endsection