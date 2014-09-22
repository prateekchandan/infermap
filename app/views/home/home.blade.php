@extends ('home.layout')

@section ('content')

	<link href="{{URL::asset('assets/css/immybox.css')}}" rel="stylesheet">
	<link href="{{URL::asset('assets/css/bootstrap-select.min.css')}}" rel="stylesheet">

<style type="text/css">
.main{
	height: 100%;
	min-height: 450px;
	padding: 50px;
	padding-top: 10%;
	background: #123;
	background: url(http://subtlepatterns.com/patterns/photography.png);
}
.immybox,.immybox:focus{
    box-shadow: 0px 0px 0px #000;
    border-color: #CCC;
    border-radius: 0px;
    height: 40px;
}
.temp_active{
	background: #eee;
}
.main-search{
	height: 40px;
}

#search-btn{
	height: 40px;
	min-width: 50px;
	background-color: white;
	border: 1px solid #ccc;
	border-left: 0px;
	margin-left: -2px;
	 box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	-webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
#dropdownMenu1,.chosen-container,.chosen-choices,.chosen-choices li{
	height: 40px;
	border-radius: 0px !important;
}


.bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
width:100%;
border-radius: 0px;
}
.bootstrap-select>.btn:first-child {
	height:40px;
	border-radius:5px 0px 0px 5px;
}
.selectpicker{
    border-radius: 0px !important;
    width:100%;
    background-color: #fff !important;
    background-image: none !important;
    border: 1px solid #ccc !important;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075) !important;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075) !important;
    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s !important;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s !important;
}
#location_search_chosen, #exam_search_chosen, #dept_search_chosen{
	display:none;
}
</style>
<!-- start: Flexslider -->
        <div class="main">
            <div class="col-md-8 col-md-offset-2">
				<div  style="float:left;width:20%;margin-right:-2px">
					
					  <select  class="selectpicker" id="dropdownMenu1" >
                        <option value="keyword_search">Keyword search</option>
                        <option value="keyword_search">College</option>
                        <option value="location_search">Location</option>
                        <option value="exam_search">Exam</option>
						<option value="dept_search">Department</option>
					   </select>
					  
				</div>
                <div style="float:left;width:70%">
                    
                    <input class="autocomplete form-control main-search" id="keyword_search" >
                    
                    <input class="form-control main-search" id="exam_search" style="display:none">
                    
                    <input class="form-control main-search" id="location_search" style="display:none">
                    <input class="form-control main-search" id="dept_search" style="display:none">

                </div>
                <div style="float:left;width:10%">
                    <button class="button form-" id="search-btn"><i class="fa fa-search"></i></button>
                </div>
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
            <p><a href="{{URL::route('home.about')}}" class="btn btn-primary btn-lg">About Us &raquo;</a></p>
        </div><!--/.jumbotron-->
        <!-- start: Row -->
        <div class="title">
            <h3>Our Products</h3>
        </div>
        <hr>
        <div class="row">

            <!-- start: Icon Box Start -->
            <div class="col-sm-6 col-md-4">
                
                <div class="icons-box vertical">
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <i class="fa fa-check circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>College Search</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
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
                            <h3>Review</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
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
                            <h3>Ask a Question</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>
                        
                    </div>      

                </div>
                
            </div>
            <!-- end: Icon Box-->
        </div>
        <!-- end: Row -->   

        <div class="row">
            <!-- start: Icon Box Start -->
            <div class="col-sm-6 col-md-4">
                
                <div class="icons-box vertical">
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <i class="fa  fa-bullseye circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>Counselling</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
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
                            <i class="fa   fa-caret-square-o-up circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>Preparation meter</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
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
                            <i class="fa   fa-caret-square-o-up circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>My College Plan</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>
                        
                    </div>      

                </div>
                
            </div>
            <!-- end: Icon Box-->
        </div>

         <div class="row">
            <!-- start: Icon Box Start -->
            <div class="col-sm-6 col-md-4">
                
                <div class="icons-box vertical">
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <i class="fa  fa-bullseye circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>My College Plan</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
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
                            <i class="fa   fa-caret-square-o-up circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>Blog</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>
                        
                    </div>      

                </div>
                
            </div>
            <!-- end: Icon Box-->

        </div>
        <hr>
        
        <!-- start: Row -->
        <div class="row">

            <div class="col-sm-12">
                
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

           

        </div>
        <!-- end: Row -->
        
        <hr>
        
    </div>
<script src="{{URL::asset('assets/js/jquery.immybox.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap-select.min.js')}}"></script>

<script>


var currentsearch = 'keyword_search';

var exams=[
@foreach(DB::select('select distinct name,fullform from exam where eid!=0') as $key=> $exam)
    {{($key>0?',':'')}}{text:'{{{$exam->fullform}}} ({{$exam->name}})',value:'{{{$exam->name}}}'}
@endforeach
];

$('#exam_search').immybox({
    choices : exams
});
var locations=[
@foreach($places as $state=>$cities)
    {{($state!='Others'?',':'')}} {text:'{{$state}}',value:'{{$state}}'}
    @foreach($cities as $city)
      , {text:'{{$city->city}} , {{$city->state}}',value:'{{$city->city}}'}
    @endforeach
@endforeach
];

var departments=[
@foreach(DB::select('select * from departments') as $key => $dept)
    {{($key>0?',':'')}}{text:'{{{$dept->value}}}',value:'{{{$dept->value}}}'}
@endforeach
];

$('#location_search').immybox({
    choices : locations
});

$('#dept_search').immybox({
    choices : departments
});
$('#dropdownMenu1').change(function(){
    $('.main-search').val('');
    temp_autobox_remove();
	var past = currentsearch;
	currentsearch = ($(this).val());
	$('#'+past).css('display', 'none');
	$('#'+currentsearch).css('display', 'block');
});

$('.main-search').keydown(function(e){
      var code=e.keyCode;
      if(code==13){
        $('#search-btn').click();
      }
})
$('#search-btn').click(function(){
    temp_autobox_remove();
	var searchtype = currentsearch, searchvalue;
	if(currentsearch == 'keyword_search'){
		searchvalue = $('#keyword_search').val();
	}
	else if(currentsearch == 'location_search'){
		searchtype = 'location_search';
		searchvalue = $('#location_search').val();
	}
	else if(currentsearch == 'exam_search'){
		searchtype = 'exam_search';
		searchvalue = $('#exam_search').val();
	}
	else if(currentsearch == 'dept_search'){
		searchtype = 'dept_search';
		searchvalue = $('#dept_search').val();
	}
	window.location = 'search?searchtype='+searchtype+'&searchvalue='+searchvalue;
});

</script>



<script type="text/javascript">
//$(".chosen-select").chosen({width:$('.main-search').outerWidth()+'px'});
</script>
@stop
