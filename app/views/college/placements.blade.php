@extends('college.layout')

@section('college-content')
<?php  $check=0; ?>
<div class="row">
@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/placements/placement_info.txt'))
@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/placements/placement_info.txt'))!='')
	<?php  $check=1;?>
	<div class="col-sm-9">	
		<div class="title"><h3>Placement  Information</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/placements/placement_info.txt'); ?>
	</div>
@endif
@endif
	<div class="col-md-3">
		<div class="title"><h3>Ratings</h3></div>
		<ul class="skills">
			<li>
				<h5>Difficulty in admission ( 40% )</h5>
				<div class="meter"><span style="width: 40%"></span></div><!-- Edite width here -->
			</li>
			<li>
				<h5>Wordpress ( 80% )</h5>
				<div class="meter"><span style="width: 80%"></span></div><!-- Edite width here -->
			</li>
		</ul>
	</div>
</div>

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


@if($check==0)
@include('college.nodata')
@endif

	

@endsection