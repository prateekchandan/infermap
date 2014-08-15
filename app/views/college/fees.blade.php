@extends('college.layout')

@section('college-content')
<?php  $check=0; ?>

@if($fees_table!=0)
<?php  $check=1;?>
<div class="row col-md-12" style="overflow-x:auto">
<div class="title"><h3>FEE </h3></div>

	<table class="table table-bordered">
		<thead>
			<tr>
			@foreach($fees_table[0] as $element)
				<th>{{{$element}}}</th>
			@endforeach
			</tr>
		</thead>
		@for($i=1;$i < sizeof($fees_table);$i++)
		<tr>
		@foreach($fees_table[$i] as $element)
		<td>{{{$element}}}</td>
		@endforeach
		</tr>
		@endfor
	</table>
	
</div>
@endif

@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/admissions/eligibility.txt'))
@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/admissions/eligibility.txt'))!='')
<div class="row">
	<?php  $check=1;?>
	<div class="col-sm-12">	
		<div class="title"><h3>Eligibility Criteria</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/admissions/eligibility.txt'); ?>
	</div>
</div>
@endif
@endif

@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/admissions/admission_info.txt'))
@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/admissions/admission_info.txt'))!='')
<div class="row">
	<?php  $check=1;?>
	<div class="col-sm-12">	
		<div class="title"><h3>Admission Info</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/admissions/admission_info.txt'); ?>
	</div>
</div>
@endif
@endif
	

@endsection