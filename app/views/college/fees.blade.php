@extends('college.layout')

@section('college-content')
<?php  $check=0; ?>

@if($fees_table!=0)
<?php  $check=1;?>
<div class="row col-md-12" style="overflow-x:auto">
<div class="title">
	<h3>
		Fee Structure Per
		@if($data['fee_type']==0)
		Semester
		@else
		Annum
		@endif
	</h3>
</div>
<div>
	Following table contains Fee structure for 
	@foreach($data['fee_type'] as $key => $value)
		{{($key > 0)?',':''}}
		{{$value->type}}
	@endforeach
	in <a href="{{URL::to('college')}}/{{$data['link']}}">{{$data['name']}}</a>
	for
	@foreach($data['fee_category'] as $key => $value)
		{{($key > 0)?',':''}}
		{{$value->category}}
	@endforeach
</div>
<br>

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

@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/fees/scholarships.txt'))
@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/fees/scholarships.txt'))!='')
<div class="row">
	<?php  $check=1;?>
	<div class="col-sm-12">	
		<div class="title"><h3>Scholarships</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/fees/scholarships.txt'); ?>
	</div>
</div>
@endif
@endif

@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/fees/benefits.txt'))
@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/fees/benefits.txt'))!='')
<div class="row">
	<?php  $check=1;?>
	<div class="col-sm-12">	
		<div class="title"><h3>Benefits</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/fees/benefits.txt'); ?>
	</div>
</div>
@endif
@endif

@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/fees/caution.txt'))
@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/fees/caution.txt'))!='')
<div class="row">
	<?php  $check=1;?>
	<div class="col-sm-12">	
		<div class="title"><h3>Caution Deposits</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/fees/caution.txt'); ?>
	</div>
</div>
@endif
@endif

@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/fees/misc.txt'))
@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/fees/misc.txt'))!='')
<div class="row">
	<?php  $check=1;?>
	<div class="col-sm-12">	
		<div class="title"><h3>Miscellanous info</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/fees/misc.txt'); ?>
	</div>
</div>
@endif
@endif

@if($check==0)
@include('college.nodata')
@endif
	

@endsection