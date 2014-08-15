@extends('college.layout')

@section('college-content')
<?php  $check=0; ?>

@if($placement_table!=0)
<?php  $check=1;?>
@foreach($placement_table as $course => $table)
<div class="row col-md-12" style="overflow-x:auto">
<div class="title"><h3>Placements data for {{{$course}}} </h3></div>

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
@endif

@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/placements/placement_info.txt'))
@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/placements/placement_info.txt'))!='')
<div class="row">
	<?php  $check=1;?>
	<div class="col-sm-12">	
		<div class="title"><h3>Placement  Information</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/placements/placement_info.txt'); ?>
	</div>
</div>
@endif
@endif

@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/placements/contacts.txt'))
@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/placements/contacts.txt'))!='')
<div class="row">
	<?php  $check=1;?>
	<div class="col-sm-12">	
		<div class="title"><h3>Contact for Placements</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/placements/contacts.txt'); ?>
	</div>
</div>
@endif
@endif




	

@endsection