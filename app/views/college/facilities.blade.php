@extends('college.layout')

@section('college-content')
<?php  $check=0; ?>

<div class="row">
<div class="col-md-9">

@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/academics/facilities.txt'))
@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/academics/facilities.txt'))!='')
<div class="row">
	<?php  $check=1;?>
	<div class="col-sm-12">	
		<div class="title"><h3>Academic Facilities</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/academics/facilities.txt'); ?>
	</div>
</div>
@endif
@endif	

@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/facilities/extra_cocurricular.txt'))
@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/facilities/extra_cocurricular.txt'))!='')
<div class="row">
	<?php  $check=1;?>
	<div class="col-sm-12">	
		<div class="title"><h3>Extra Cocurricular Facilities</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/facilities/extra_cocurricular.txt'); ?>
	</div>
</div>
@endif
@endif	

@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/facilities/mess_and_hostel_facilities.txt'))
@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/facilities/mess_and_hostel_facilities.txt'))!='')
<div class="row">
	<?php  $check=1;?>
	<div class="col-sm-12">	
		<div class="title"><h3>Hostel Facilities and Mess</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/facilities/mess_and_hostel_facilities.txt'); ?>
	</div>
</div>
@endif
@endif

@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/facilities/sports.txt'))
@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/facilities/sports.txt'))!='')
<div class="row">
	<?php  $check=1;?>
	<div class="col-sm-12">	
		<div class="title"><h3>Sports Facilities</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/facilities/sports.txt'); ?>
	</div>
</div>
@endif
@endif	

@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/facilities/misc_facilities.txt'))
@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/facilities/misc_facilities.txt'))!='')
<div class="row">
	<?php  $check=1;?>
	<div class="col-sm-12">	
		<div class="title"><h3>Other Facilities</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/facilities/misc_facilities.txt'); ?>
	</div>
</div>
@endif
@endif	
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
</div>
@if($check==0)
@include('college.nodata')
@endif
@endsection