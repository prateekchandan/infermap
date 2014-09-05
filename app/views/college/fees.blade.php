@extends('college.layout')

@section('college-content')
<?php  $check=0; ?>
@if($fees_table!=0)
<div class="row">
<?php  $check=1;?>
<div class="col-md-12" style="overflow-x:auto">
	<div class="title">
		<h3>
			Fee Structure Per
			@if($data['fee_type']==0)
			Semester
			@else
			Annum
			@endif
			(in ₹)
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
	<ul>
	@for($i=1;$i < sizeof($fees_table);$i++)
		<li><div>
		<b>{{$fees_table[$i][0]}}</b>
			<ol class="arrow_list">
			@for( $j=1 ; $j < sizeof($fees_table[$i]);$j++)
				@if($fees_table[$i][$j]!='-')
					<li>
						{{$fees_table[0][$j]}} : {{$fees_table[$i][$j]}}
					</li>
				@endif
			@endfor
			</ol>
			</div>
		</li>
	@endfor
	</ul>
</div>
<?php /*
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
*/?>
</div>
@endif

@if($fees_table==0)
<div class="row">
	<div class="col-md-12">
		<div class="title">
			<h3>
				Fee Structure Per
				@if($data['fee_type']==0)
				Semester
				@else
				Annum
				@endif
				(in ₹)
			</h3>
		</div>

		<div>
			Following table contains Fee structure 
			in <a href="{{URL::to('college')}}/{{$data['link']}}">{{$data['name']}}</a>
		</div>
		<ul>
			<li><b>B.Tech/B.E.</b>
				<ul class="arrow_list">
					<li>Tution Fee : N/A</li>
					<li>Total : N/A</li>
					<li>Refundable fee : N/A</li>
				</ul>
			</li>
		</ul>
		
	</div>
<?php /*
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
	*/?>
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


	

@endsection