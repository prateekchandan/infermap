@extends('college.layout')

@section('college-content')
<?php  $check=0; ?>

<div class="row">
@if($admission_table!=0)
<?php  $check=1;?>
<div class="col-md-9">
<div class="title"><h3>List of Courses</h3></div>
<ul class="star_list">
@foreach ($admission_table as $course => $tables)
@foreach($tables as $examname => $table)
	@for($i=1;$i < sizeof($table);$i++)
	<li>
		{{{$course}}} in {{{$table[$i][1]}}}
		{{ ($table[$i][2]!='-'?'('.$table[$i][2].'seats)':'')}}
	</li>
	@endfor
@endforeach
@endforeach
</ul>
</div>
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
@endif
</div>

@if(sizeof($data['allexams'])>0)
<div class="row col-md-12">
	<div class="title"><h3>Exam for admission</h3></div>
	<ul class="star_list">
@foreach($data['allexams'] as $exam)
		<li>Admission for {{$exam->type}}  is based on <a href="{{URL::to('exam').'/'.$exam->link}}"> {{$exam->name}}</a></li>
@endforeach
	</ul>
</div>
@endif

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