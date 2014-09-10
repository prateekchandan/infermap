@extends('departments.layout')
@section('department-content')

<?php  $check=0; ?>

@if($department->acad_info!='')
<?php  $check=1; ?>
<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>Academic Information</h3>
		</div>
		<div class="row col-md-12">
			<div>
			{{$department->acad_info}}
			</div>
		</div>
	</div>
</div>	
@endif

@if($check==0)
	@include('college.nodata')
@endif
@endsection