
				<div id="filters">
					<ul class="option-set" data-option-key="filter">
						<li><a href="#" data-option-value="*">All</a></li>
						<li><a href="#" data-option-value=".Private">Private Colleges</a></li>
						<li><a href="#" data-option-value=".Government">Government Colleges</a></li>
					</ul>
				</div>

				<!-- start: Portfolio -->
				<div id="portfolio-wrapper" class="row">
					@foreach($college as $key => $col)
					@if($key%4==0)
					<!--div class="row"-->
					@endif
					<div class="col-sm-3 portfolio-item {{$col->type}}">
						<div class="picture"><a href="{{URL::Route('college')}}/{{$col->link}}" title="Title">
							<div class="row" style="height:120px;text-align:center">
								
									<img src="{{$col->logoimg}}" alt="" style="max-height:120px;width:auto" />
								
							</div>
							<hr class="thin-hr">
							<div class="image-overlay-link"></div></a>
							<div class="item-description alt" style="padding-left:10px;">
								<h3><a href="{{URL::Route('college')}}/{{$col->link}}">{{{$col->name}}}</a></h3>
								{{$col->location_bar}}
							</div>
							<!--div class="post-meta"><span><i class="fa fa-calendar"></i>1 June 2011</span> <span><i class="fa fa-user"></i> <a href="portfolio4.html#">lucas</a></span> <span><i class="fa fa-comments"></i><a href="portfolio4.html#">89 comments</a></span></div-->
						</div>	
					</div>
					@if($key%4==3 )
					<!--/div-->
					@endif
					@endforeach
				</div>
				@if(sizeof($college)%4!=0 )
				<!--/div-->
				
				@endif
				
				<!-- end: Portfolio -->
			