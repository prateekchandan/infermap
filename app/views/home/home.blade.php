@extends ('layout.main')

@section ('body')

<style type="text/css">
    .main{
        height: 100%;
        min-height: 450px;
        padding: 50px;
        padding-top: 10%;
        background: #123;
        background: url(http://subtlepatterns.com/patterns/photography.png);
    }
    .temp_active{
        background: #eee;
    }
</style>
<!-- start: Flexslider -->
        <div class="main">
                <div class="from-group col-md-6 col-md-offset-3">
                    <input class="autocomplete form-control">
                </div>

                <label class="col-md-6 col-md-offset-3"> Tip: Start searching by college name</label>
        </div>
        <!-- end: Flexslider -->

<div class="container">
        
        
        
        <hr>

        <div class="jumbotron">
            <h3>
                Infermap is a free comprehensive platform that improves the college selecting process, based on individual resources and requirements. 
                Inspired by a belief that all students deserve access to good guidance, infermap aims to create the interactive tools and media that guide students as they find, afford and enroll in a college that’s a good fit for them.
            </h3>
            <p><a class="btn btn-primary btn-lg">About Us &raquo;</a></p>
        </div><!--/.jumbotron-->
        
        <!-- start: Row -->
        <div class="row">

            <!-- start: Icon Box Start -->
            <div class="col-sm-6 col-md-4">
                
                <div class="icons-box vertical">
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <i class="fa fa-check circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>Rank Search</h3>
                            <p>Recently gave an exam got no idea which colleges it can fetch you?<br>
                                Or confused with the options at hand<br>
                                Just enter your expected rank and leave the rest to our advanced search engine.</p>
                        </div>
                        
                    </div>      

                </div>
                
            </div>
            <!-- end: Icon Box-->

            <!-- start: Icon Box Start -->
            <div class="col-sm-6 col-md-4">
                
                <div class="icons-box vertical">
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <i class="fa fa-location-arrow circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>Location</h3>
                            <p>If you dreamt college life to be your gate to freedom Or are homesick. Our search engine gets you the best colleges depending on location. Just choose how far away or close to home you desire it</p>
                        </div>
                        
                    </div>      

                </div>
                
            </div>
            <!-- end: Icon Box-->

            <!-- start: Icon Box Start -->
            <div class="col-sm-6 col-md-4">
                
                <div class="icons-box vertical">
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <i class="fa fa-tablet circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>Step by step</h3>
                            <p>No Idea? Grab our hand.
Use our interactive guide to plan your college search. A series of simple questions to help you decide what you want.</p>
                        </div>
                        
                    </div>      

                </div>
                
            </div>
            <!-- end: Icon Box-->
        
        </div>
        <!-- end: Row -->   

        <hr>
        
        <!-- start: Row -->
        <div class="row">

            <div class="col-sm-9">
                
                <div class="title"><h3>Related Blogs</h3></div>
                
                <!-- start: Row -->
                <div class="row">
        
                    <div class="col-sm-4">
                        <div class="item-description">
                            <h4><a href="http://www.infermap.com/blog/related-topics/">The Insight Story Of Premier Engineering Institutes Of India : "The" IITs</a></h4>
                            <p>Indian Institutes Of Technology are undoubtedly the most prestigious colleges of engineering in India , giving admissions to the best brains of India . Getting into an IIT for an engineering aspirant is like a roaring milestone ...</p>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="item-description">
                            <h4><a href="http://www.infermap.com/blog/engineering-career/">Engineering as a career</a></h4>
                            <p>The American Engineers' Council for Professional Development has defined "Engineering " as: " The creative application of scientific principles to design or develop structures, machines, apparatus, or manufacturing processes, or works utilizing...</p>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="item-description">
                            <h4><a href="http://www.infermap.com/blog/need-infermap/">Why we need Infermap?</a></h4>
                            <p>Well, looking for the right college can be a menace! With the growing number of students pting for engineering and decreasing no of off shore opportunities students finally end up in a wrong college or with a wrong stream...</p>
                        </div>
                    </div>
                
                
                </div>
                <!-- end: Row -->

            </div>

            <div class="col-sm-3">
                
                <!-- start: Testimonials-->

                <div class="testimonial-container">

                    <div class="title"><h3>What People Say</h3></div>

                        <div class="testimonials-carousel" data-autorotate="3000">

                            <ul class="carousel">

                                <li class="testimonial">
                                    <div class="testimonials">Infermap.com is changing the education scene by cutting through the traditional norms and practices.</div>
                                    <div class="testimonials-bg"></div>
                                    <div class="testimonials-author">Saurav Suman, <span>Co-Founder timemytask.com</span></div>
                                </li>

                                <li class="testimonial">
                                    <div class="testimonials">Infermap.com is aimed at transforming college hunting through it’s modern and unique user interface which empowers students with the ability to judge view a college based on hard core data.</div>
                                    <div class="testimonials-bg"></div>
                                    <div class="testimonials-author">Kritagya Tripathi ,<span>COO shoesonloose.com</span></div>
                                </li>

                                <li class="testimonial">
                                    <div class="testimonials">Infermap.com is a revolutionized way to help students tame the ‘chaotic’ education scenario in India. Providing such an extensive information to students who are fresh out of their high school, will definitely help them to mold their career.</div>
                                    <div class="testimonials-bg"></div>
                                    <div class="testimonials-author">Kshitij thavre, <span>CTO Humming Whale Product Innovations</span></div>
                                </li>

                            </ul>

                        </div>

                    </div>

                <!-- end: Testimonials-->
                
            </div>

        </div>
        <!-- end: Row -->
        
        <hr>
        
    </div>

<script type="text/javascript">
	var request_autocomplete=jQuery.ajax({});
    var forgiveness_autocomplete;
    
    window.temp_autobox_size=0;
    window.temp_autobox_cur=0;
    var myServiceCall = function() {
    	var inp=$('.autocomplete');
		var val=$.trim(inp.val());
        inp.val(val);
        if(val.length<1)
            return;
		var h=inp.offset().top+inp.height()-inp.parent().offset().top , w=inp.offset().left;
		var box=document.createElement('div');
		box.className="temp_autobox";
		box.id="temp_autobox";
		/*box.style.top=(h)+"px";
		box.style.left=w+"px";*/
		box.style.width=(inp.width()+26)+"px";
		box.style.background="white";
		
        request_autocomplete.abort();
        request_autocomplete=jQuery.ajax({
			url:"{{URL::route('autocomplete_get')}}",
			type:'post',
			data:{str:val},
			dataType:'JSON',
			success:function(data){
                
				$('.temp_autobox').remove();
				box.innerHTML=box.innerHTML+'<div class="col-md-12"><button type="button" class="close close_autocomplete" onclick="temp_autobox_remove()">×</button></div>';
				str="<ul class='temp_ul'>";
				for (var i = 0; i < data.length && i <6; i++) {
					str+="<li><a href='{{URL::to('college')}}/"+data[i].link+"'>"+data[i].name+"<span class=\"pill-right\"></span></a></li>";
				};
				str+="</ul>";
				window.temp_autobox_size=Math.min(data.length,6)+2;
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
        	window.temp_autobox_size++;
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
</script>
@stop
