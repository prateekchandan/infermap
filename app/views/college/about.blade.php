@extends('college.layout')


@section('college-content')
<?php $check=0; ?>

<div class="row">
	@if(File::exists(public_path().'/data'.'/'.$data['cid'].'/about/about_college.txt'))
	@if(trim(file_get_contents(public_path().'/data'.'/'.$data['cid'].'/about/about_college.txt'))!='')
	<?php  $check=1;?>
	<div class="col-sm-12">	
		<div class="title"><h3>About Us</h3></div>
		<?php echo file_get_contents(public_path().'/data'.'/'.$data['cid'].'/about/about_college.txt'); ?>
	</div>
	@endif
	@endif
	<?php /*
	<div class="col-sm-3">	
		<div class="title"><h3>Ratings</h3></div>
		<ul class="skills">
			<li>
				<h5>Web Design ( 40% )</h5>
				<div class="meter"><span style="width: 40%"></span></div><!-- Edite width here -->
			</li>
			<li>
				<h5>Wordpress ( 80% )</h5>
				<div class="meter"><span style="width: 80%"></span></div><!-- Edite width here -->
			</li>
			<li>
				<h5>Branding ( 100% )</h5>
				<div class="meter"><span style="width: 100%"></span></div><!-- Edite width here -->
			</li>
			<li>
				<h5>SEO Optmization ( 60% )</h5>
				<div class="meter"><span style="width: 60%"></span></div><!-- Edite width here -->
			</li>
		</ul>
	</div>
	*/?>
</div>

@if($data['images']!='0')
<?php  $check=1;?>
<div class="row">
	<div class="col-md-12">
		<div class="title"><h3>IMAGE GALLERY</h3></div>
		<div class="slider">
			
				<div id="flex1" class="flexslider">
					<ul class="slides">
						<li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; display: list-item;">
							<img src="{{{$data['images'][0]}}}" alt="" style="max-height:400px">
						</li>
						@for($i=1;$i < sizeof($data['images']) ;$i++))
						<li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; display: none;">
							<img src="{{{$data['images'][$i]}}}" alt="" style="max-height:400px">
						</li>
						@endfor

					</ul>
					@if(sizeof($data['images'])>1)
					<ul class="flex-direction-nav">
						<li><a class="flex-prev" href="#">Previous</a></li>
						<li><a class="flex-next" href="#">Next</a></li>
					</ul>
					@endif
				</div>
			
		</div>
	</div>
</div>		
@endif		



@if($check==0)
@include('college.nodata')
@endif

@endsection