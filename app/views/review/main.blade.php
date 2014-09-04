@extends('layout.main')
@section('body')

<div id="page-title">
	<div id="page-title-inner">
	<!-- start: Container -->
		<div class="container">
			<div class="pull-left">
				<h2><i class="fa fa-bookmark"></i> College Review</h2>
				<div class="head-locations">
				</div>
			</div>
		</div>
		<!-- end: Container  -->
	</div>	
</div>
<!-- end: Page Title -->

<div class="container">
	<div class="jumbotron" style="margin:10px">
		<div>
			Give back to the community by sharing your college experience, guide the high school students by shedding some light on the details of your college. / letting them know more about your college.
		</div>
	</div>
	<div class="row">		
		<div class="col-sm-6 col-sm-offset-3">
			<div class="title"><h3>Type your college name to write review</h3></div>
			<div class="form-group">							
			    <input type="text" class="form-control review_autocomplete">
			    <div>Tip: Start by typing college Name</div>
			</div>
		</div>
	</div>
	
</div>
<script type="text/javascript">		
	var request_autocomplete=jQuery.ajax({});
    var forgiveness;
    
    function submit_review(){
    	var inp=$('.review_autocomplete');
    	@if(Auth::check())
    	window.location='{{URL::Route("review_new")}}?college='+inp.val();
    	@else
    	$('#error-area').html('<div class="alert alert-error alert-dismissable" style="" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Please login to continue</div>');
    	return false;
    	@endif
    }
    var myServiceCall = function() {
    	var inp=$('.review_autocomplete');
		var val=inp.val();
		var h=inp.offset().top+inp.height() , w=inp.offset().left;
		var box=document.createElement('div');
		box.className="temp_review_autobox";
		box.id="temp_review_autobox";
		/*box.style.top=(h+18)+"px";
		box.style.left=w+"px";*/
		box.style.width=(inp.width()+30)+"px";
		box.style.background="white";
		
        request_autocomplete.abort();
        request_autocomplete=jQuery.ajax({
			url:"{{URL::route('review_autocomplete')}}",
			type:'post',
			data:{str:val},
			dataType:'JSON',
			success:function(data){
				$('.temp_review_autobox').remove();
				box.innerHTML=box.innerHTML+'<div class="col-md-12"><button type="button" class="close close_review_autocomplete" onclick="temp_review_autobox_remove()">×</button></div>';
				str="<ul>";
				for (var i = 0; i < data.length && i <6; i++) {
					str+="<li><a href='{{URL::to('/')}}/"+data[i].link+"/review'>"+data[i].name+"<span class=\"pill-right\"></span></a></li>";
				};
				str+="</ul>";
				box.innerHTML=box.innerHTML+str;
				box.innerHTML=box.innerHTML+'<div clas="col-md-12" style="padding:4px"><a href="#" onclick="submit_review()">If your college doesn\'t appear above click here</a></div>';
				inp.parent().append(box);
			},
			error:function(){
				$('.temp_review_autobox').html("Loading.. <img src=\"{{URL::asset('assets/img/fancybox_loading.gif')}}\">");
			}
		})
    }
	 // keyup 
    $('.review_autocomplete').keyup(function() {
        forgiveness = window.setTimeout(myServiceCall, 700);
     });

    // key down
    $('.review_autocomplete').keydown(function() {
        window.clearTimeout(forgiveness);
    });


	function temp_review_autobox_remove(){
		$('.temp_review_autobox').remove();	
	}

	$('.review_autocomplete').focusin(function(){
		$(this).keyup();
	})
</script>
@endsection