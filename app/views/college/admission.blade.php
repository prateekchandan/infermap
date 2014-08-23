@extends('college.layout')

@section('college-content')
<?php  $check=0; ?>

@if($admission_table!=0)
<?php  $check=1;?>
@foreach ($admission_table as $course => $tables)
<div class="row col-md-12">
<div class="title"><h3>Closing Ranks for {{{$course}}}</h3></div>
	
	@foreach($tables as $examname => $table)
	<div  style="overflow-x:auto">
		<div class="col-md-12" ><h3>Exam : {{{$examname}}}</h3></div>
		<table class="table table-bordered">
			<thead>
				<tr>
				@foreach($table[0] as $element)
					<th>{{{$element}}}</th>
				@endforeach
				</tr>
			</thead>
			@for($i=1;$i < sizeof($table);$i++)
			<tr>
			@foreach($table[$i] as $element)
				<td>{{{$element}}}</td>
			@endforeach
			</tr>
			@endfor
		</table>
	</div>
	@endforeach

</div>
@endforeach
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
	
@if($check==0)
@include('college.nodata')
@endif

@endsection