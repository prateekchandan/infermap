@extends('departments.layout')
@section('department-content')

<?php  $check=0; ?>

@if($department->top_companies!='')
<?php  $check=1; ?>
<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>Top Companies</h3>
		</div>
		<div class="row col-md-12">
			<div>
			{{$department->top_companies}}
			</div>
		</div>
	</div>
</div>	
@endif

@if($department->salary_package!='')
<?php  $check=1; ?>
<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>Top Companies</h3>
		</div>
		<div class="row col-md-12">
			<div>
			{{$department->salary_package}}
			</div>
		</div>
	</div>
</div>	
@endif

@if($check==0)
	@include('college.nodata')
@endif
@endsection