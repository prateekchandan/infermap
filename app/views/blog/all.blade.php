@extends('home.layout')
@section('content')
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="fa fa-pencil"></i> Blog</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	<div class="container">
			
			<!--start: Row -->
			<div class="row">
			
				<div class="col-sm-9">

					@foreach($post as $p)
					<!-- start: Post -->
					<div class="post">
						@if($p->img!=NULL)
						<div class="post-img picture"><a href="{{$p->link}}"><img src="{{$p->img}}" alt=""><div class="image-overlay-link" style="opacity: 1; display: block;"></div></a></div>
						@endif
						<span class="post-icon standard"><i class="fa fa-pencil"></i></span>
						<div class="post-content">
							<div class="post-title"><h2><a href="{{$p->link}}">{{$p->Title}}</a></h2></div>
							<div class="post-description">
								<p>
									{{$p->content}}
								</p>
							</div>
							<a class="post-entry" href="{{$p->link}}">Read More...</a>
							<div class="post-meta"><span><i class="fa fa-calendar"></i>{{$p->date}}</span> <span><i class="fa fa-user"></i>By <a href="">{{$p->name}}</a></span> <span><i class="fa fa-comments"></i>With <a href="">89 comments</a></span></div>
						</div>
					</div>
					<!-- end: Post -->
					@endforeach
			

				<ul class="pagination">
					@for($i=1;$i < $page;$i++)
						<a href="{{URL::Route('blog')}}/page/{{$i}}"><li>{{$i}}</li></a>
					@endfor
				</ul>

			</div>


			<!-- start: Sidebar -->

			<div class="col-sm-3 hidden-phone">

				<!-- start: Popular Photos -->
				<div class="widget-first">
					<div class="title"><h3>Popular Photos</h3></div>

					<div class="flickr-widget">
						<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=9&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=29609591@N08"></script><div class="flickr_badge_image" id="flickr_badge_image1"><a href="http://www.flickr.com/photos/29609591@N08/14597619532/"><img src="http://farm3.staticflickr.com/2903/14597619532_44ce6cdfca_s.jpg" alt="A photo on Flickr" title="FOG horn" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image2"><a href="http://www.flickr.com/photos/29609591@N08/14588412495/"><img src="http://farm4.staticflickr.com/3835/14588412495_71b651ca8f_s.jpg" alt="A photo on Flickr" title="Pennan" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image3"><a href="http://www.flickr.com/photos/29609591@N08/14466613846/"><img src="http://farm6.staticflickr.com/5570/14466613846_3e17384ffb_s.jpg" alt="A photo on Flickr" title="St Colm's Abbey Inchcolm Island" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image4"><a href="http://www.flickr.com/photos/29609591@N08/14381598632/"><img src="http://farm4.staticflickr.com/3909/14381598632_424293750f_s.jpg" alt="A photo on Flickr" title="Shipwrecked Selfie" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image5"><a href="http://www.flickr.com/photos/29609591@N08/13845179383/"><img src="http://farm8.staticflickr.com/7389/13845179383_b7355843bd_s.jpg" alt="A photo on Flickr" title="Stewart Sycamore" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image6"><a href="http://www.flickr.com/photos/29609591@N08/12344882985/"><img src="http://farm4.staticflickr.com/3785/12344882985_b1df3d961c_s.jpg" alt="A photo on Flickr" title="Rusty" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image7"><a href="http://www.flickr.com/photos/29609591@N08/12234243593/"><img src="http://farm4.staticflickr.com/3737/12234243593_7cd8c5312c_s.jpg" alt="A photo on Flickr" title="Boathouse Isle of Danna" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image8"><a href="http://www.flickr.com/photos/29609591@N08/12220237506/"><img src="http://farm8.staticflickr.com/7435/12220237506_0201bffebc_s.jpg" alt="A photo on Flickr" title="Vital Spark" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image9"><a href="http://www.flickr.com/photos/29609591@N08/12176303006/"><img src="http://farm3.staticflickr.com/2888/12176303006_2d8f6e7924_s.jpg" alt="A photo on Flickr" title="Dancin Dog" height="75" width="75"></a></div><span style="position:absolute;left:-999em;top:-999em;visibility:hidden" class="flickr_badge_beacon"><img src="http://geo.yahoo.com/p?s=792600102&amp;t=2f54df29181df0128c3ce2d69f8a5fc1&amp;r=http%3A%2F%2Flocalhost%3A8000%2Fblog.html&amp;fl_ev=0&amp;lang=en&amp;intl=in" width="0" height="0" alt=""></span>
						<div class="clear"></div>
					</div>

				</div>
				<!-- end: Popular Photos -->

				<!-- start: Sidebar Menu -->
				<div class="widget">
					<div class="title"><h3>Menu</h3></div>
					<ul class="links-list-alt">
						<li><a href="{{URL::route('blog.add')}}">Add New Blog</a></li>
						<li><a href="{{URL::route('blog')}}">See all Blogs</a></li>
					</ul>
				</div>
				<!-- end: Sidebar Menu -->

				<!-- start: Tags -->
				<div class="widget">
					<div class="title"><h3>Tags</h3></div>
					<div class="tags">
						<a href="">Tag1</a>
					</div>
				</div>
				<!-- end: Tags -->

			</div>
			<!-- end: Sidebar -->
			
		</div>
		<!--end: Container-->
	
	</div>
@endsection