@extends('home.layout')
@section('content')
<link rel="stylesheet" href="{{URL::asset('assets/css/redit.min.css')}}">
<style type="text/css">
	.redactor_editor,.redactor_editor:focus{
		min-height: 100px;
		background-color: white;
	}
</style>
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="fa fa-graduation-cap"></i>Your Intern Tasks</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->

	<div class="container">
	@if(!(sizeof($tasks)>0||isset($admin)))
		<hr>
		<div class="jumbotron">
			<h3>No Tasks alloted to you yet</h3>
		</div>
		<hr><hr><hr>
	@else
		@foreach ($weeks as $week)
			@if(isset($tasks[$week])&&!isset($admin))
			<div class="row">
				<div class="title"><h2>Week-{{$week}} Tasks</h2></div>
				<div class="row">
					<div class="col-md-8">
						<div class="col-md-12 jumbotron">
							<div class="col-md-12">
								<div><b>Problem Statement:</b></div><br>
					            <div name="ps" id="ps">{{$tasks[$week]->ps}}</div>
					        </div>
						</div>
						<div class="col-md-12 alert {{($tasks[$week]->work_status=='Completed')?'alert-success':'alert-info'}}">
							<div class="col-md-12">
					            <div name="ps" id="ps">Work Status : {{$tasks[$week]->work_status}}</div>
					        </div>
						</div>
					</div>
					<div class="col-md-4 well" style="margin-top:40px;border-radius:0px">
						<div><h3>Related Files:</h3></div>
					</div>
				</div>
			</div>
			@elseif(isset($admin))
			<div class="row">
				<div class="title"><h3>Week-{{$week}} Tasks</h3></div>
				<hr>
				<form class="col-md-8 well" method="post" action="{{URL::Route('intern.save_task')}}">
					<input type="hidden" name="week" value="{{$week}}">
					<input type="hidden" name="user_id" value="{{$id}}">
					<input type="hidden" name="position_id" value="{{$pos}}">
					<div class="form-group row">
			            <div class="col-md-12">
			                <label for="">Problem Statement:<br></label>
			            </div>
			            <div class="col-md-12">
			                <div name="ps" id="ps" class="redactor">{{(isset($tasks[$week]))?$tasks[$week]->ps:''}}</div>
			            </div>
		        	</div>
		        	<div class="form-group row">
			            <div class="col-md-3">
			                <label for="">Work Status</label>
			            </div>
			            <div class="col-md-9">
			            	<select class="form-control" name="work_status">
			            		<option {{(isset($tasks[$week]) && $tasks[$week]->work_status=='Un-Finished') ?'selected':''}}>Un-Finished</option>
			            		<option {{(isset($tasks[$week]) && $tasks[$week]->work_status=='Pending')?'selected':''}}>Pending</option>
			            		<option {{(isset($tasks[$week] )&& $tasks[$week]->work_status=='Completed')?'selected':''}}>Completed</option>
			            	</select>
			            </div>
			        </div>
		        	<button class="btn btn-success">Save</button>
				</form>
			</div>
			@endif
			@if(isset($tasks[$week]))
			<div class="row">
				<div class="col-md-8">
					<div class="comments-sec">
						<ol class="commentlist">
						@foreach($commentlist[$week] as $comment)
							<li  style="width:100%">
								<div class="comments">
									<div class="avatar"><img src="{{($comment->img_url!=NULL)?$comment->img_url:'http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=50'}}" alt="" border="0"> </div>
									<div class="comment-des">
									<div class="comment-by"><strong>{{$comment->name}}</strong><span class="reply">
									@if(Auth::user()->id==$comment->user_id)	
										<span style="color:#aaa">/ </span>
										<a href="{{URL::Route('intern.task_comment_delete')}}?id={{$comment->comment_id}}">Delete</a>
									@endif
									</span> <span class="date">June 1, 2012</span></div>
										<p>{{$comment->message}}</p>
									</div>
								</div>
							</li>
						@endforeach
							<li style="width:100%">
								<div class="comments">
									<div class="comment-des" style="width:100%">
										<div class="comment-by"><strong>Post Comment:</strong></div>
										<form method="post" action="{{URL::Route('intern.task_comment')}}">
											<input type="hidden" name="task_id" value="{{$tasks[$week]->id}}">
											<textarea class="form-control" name="message" placeholder="Write your message here"></textarea>		
										
											<div class="form-group" style="padding-top:10px">
												<input type="submit" class="btn btn-primary" value="Add Comment">
											</div>
										</form>
									</div>
								 </div>
							</li>
							
						</ol>
					</div>
				</div>
			</div>
			@endif
		@endforeach
	@endif
	</div>
<script type="text/javascript" src="{{URL::asset('assets/js/redit.js')}}"></script>
<script type="text/javascript">
	$('.redactor').redactor({
	        focus: true,
	        convertDivs: true,
	        deniedTags: ['h1', 'h2'],
	        //  allowedTags: ['p', 'h1', 'h2', 'pre','li','u','i','ul','ol','b']
	        
	    })

	
</script>
@endsection