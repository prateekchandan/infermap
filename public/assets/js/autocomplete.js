var request_autocomplete=jQuery.ajax({});
    var forgiveness_autocomplete;
    window.temp_autobox_size=0;
    window.temp_autobox_cur=0;
    window.autocomplete_temp=0
    var myServiceCall = function() {
    	var inp=window.autocomplete_temp;
		var val=$.trim(inp.val());
        if(val.length<1)
            return;
		var h=inp.offset().top+inp.height()-inp.parent().offset().top , w=inp.offset().left;
		var box=document.createElement('div');
		box.className="temp_autobox";
		box.id="temp_autobox";
		/*box.style.top=(h)+"px";
		box.style.left=w+"px";*/
		box.style.width=(inp.width()+25)+"px";
		box.style.background="white";
		
        request_autocomplete.abort();
        request_autocomplete=jQuery.ajax({
			url:window.autocomplete_url,
			type:'post',
			data:{str:val},
			dataType:'JSON',
			success:function(data){
                
				$('.temp_autobox').remove();
				box.innerHTML=box.innerHTML+'<div class="col-md-12"><button type="button" class="close close_autocomplete" onclick="temp_autobox_remove()">×</button></div>';
				str="<ul class='temp_ul'>";
				for (var i = 0; i < data.length && i <6; i++) {
					str+="<li><a href='"+window.autocomplete_college_url+"/"+data[i].link+"'>"+data[i].name+"<span class=\"pill-right\"></span></a></li>";
				};
				str+="</ul>";
				window.temp_autobox_size=Math.min(data.length,6)+1;
    			window.temp_autobox_cur=0;
				box.innerHTML=box.innerHTML+str;
				box.innerHTML=box.innerHTML+'';
				inp.parent().append(box);
			},
			error:function(){
				$('.temp_autobox').html("Loading.. <img src=\"{{URL::asset('assets/img/fancybox_loading.gif')}}\">");
			}
		})
    }
	 // keyup 
    $('.autocomplete').keyup(function(e) {
        window.autocomplete_temp=$(this);
        var code=e.keyCode;	
        
        if(window.temp_autobox_size==0&&(code==38||code==40))
        	return;

       	var remove=window.temp_autobox_cur-1;
        if(code==38)
        {
        	window.temp_autobox_cur--;
        }
        else if(code==40)
        {
        	window.temp_autobox_cur++;
        }
        window.temp_autobox_cur+=window.temp_autobox_size;
        window.temp_autobox_cur%=window.temp_autobox_size;
        if(window.temp_autobox_cur==0 && code==40)
        	window.temp_autobox_cur++;
        else if(window.temp_autobox_cur==0)
        	window.temp_autobox_cur=window.temp_autobox_size-1;
        var all=$('.temp_ul li');

        if(code==38 || code==40)
        {
        	all[window.temp_autobox_cur-1].setAttribute("class", "temp_active");
        	if(remove!=-1)
        		all[remove].removeAttribute("class", "temp_active");
        }
        else if(code==13 && window.temp_autobox_cur!=0)
        {
        	var href=all[window.temp_autobox_cur-1].getElementsByTagName('a')[0].click();
        }
        else
        {
        	forgiveness_autocomplete = window.setTimeout(myServiceCall, 700);
        }

     });
    $('.autocomplete').submit(function(e){return false;});

    // key down
    $('.autocomplete').keydown(function(e) {
        window.autocomplete_temp=$(this);
        var code=e.keyCode;    
        if(code==38||code==40||code==13)
            return;
        window.clearTimeout(forgiveness_autocomplete);
    });

     $('.autocomplete').focus();

	function temp_autobox_remove(){
		$('.temp_autobox').remove();	
		window.temp_autobox_size=0;
    	window.temp_autobox_cur=0;
	}