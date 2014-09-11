@extends ('layout.main')

@section ('body')


<div style="width:100px; margin-right:auto; margin-left:auto">
	<div class="pull-left">something</div>
	<input class="form-control autocomplete pull-left"type="text">
</div>

<script type="text/javascript">
	var request_autocomplete=jQuery.ajax({});
    var forgiveness_autocomplete;
    
    window.temp_autobox_size=0;
    window.temp_autobox_size=0;
    var myServiceCall = function() {
    	var inp=$('.autocomplete');
		var val=inp.val();
		var h=inp.offset().top+inp.height() , w=inp.offset().left;
		var box=document.createElement('div');
		box.className="temp_autobox";
		box.id="temp_autobox";
		/*box.style.top=(h+18)+"px";
		box.style.left=w+"px";*/
		box.style.width=(inp.width()+26)+"px";
		box.style.background="white";
		
        request_autocomplete.abort();
        request_autocomplete=jQuery.ajax({
			url:"{{URL::route('autocomplete')}}",
			type:'post',
			data:{str:val},
			dataType:'JSON',
			success:function(data){
				$('.temp_autobox').remove();
				box.innerHTML=box.innerHTML+'<div class="col-md-12"><button type="button" class="close close_review_autocomplete" onclick="temp_review_autobox_remove()">×</button></div>';
				str="<ul class='temp_ul'>";
				for (var i = 0; i < data.length && i <6; i++) {
					str+="<li><a href='{{URL::to('/')}}/"+data[i].link+"'>"+data[i].name+"<span class=\"pill-right\"></span></a></li>";
				};
				str+="</ul>";
				window.temp_autobox_size=Math.min(data.length,6)+2;
    			window.temp_autobox_size=0;
				box.innerHTML=box.innerHTML+str;
				box.innerHTML=box.innerHTML+'';
				inp.parent().append(box);
			},
			error:function(){
				$('.temp_review_autobox').html("Loading.. <img src=\"{{URL::asset('assets/img/fancybox_loading.gif')}}\">");
			}
		})
    }
	 // keyup 
    $('.autocomplete').keyup(function(e) {
        var code=e.keyCode;	
        
        if(window.temp_autobox_size==0&&(code==38||code==40))
        	return;

       	var remove=window.temp_autobox_size-1;
        if(code==38)
        {
        	window.temp_autobox_size--;
        }
        else if(code==40)
        {
        	window.temp_autobox_size++;
        }
        window.temp_autobox_size+=window.temp_autobox_size;
        window.temp_autobox_size%=window.temp_autobox_size;
        if(window.temp_autobox_size==0 && code==40)
        	window.temp_autobox_size++;
        else if(window.temp_autobox_size==0)
        	window.temp_autobox_size=window.temp_autobox_size-1;
        var all=$('.temp_review_ul li');

        if(code==38 || code==40)
        {
        	all[window.temp_autobox_size-1].setAttribute("class", "temp_active");
        	if(remove!=-1)
        		all[remove].removeAttribute("class", "temp_active");
        }
        if(code==13&&window.temp_autobox_size!=0)
        {
        	var href=all[window.temp_autobox_size-1].getElementsByTagName('a')[0].click();
        }
        else
        {
        	forgiveness_autocomplete = window.setTimeout(myServiceCall, 700);
        }
     });

    // key down
    $('.review_autocomplete').keydown(function() {
        window.clearTimeout(forgiveness_autocomplete);
    });

     $('.review_autocomplete').focus();

	function temp_review_autobox_remove(){
		$('.temp_review_autobox').remove();	
		window.temp_autobox_size=0;
    	window.temp_autobox_size=0;
	}
</script>
@stop
