@extends ('home.layout')

@section ('content')
<style>

.main-body{
	font-size:14px;
	width:800px;
	margin-right:auto;
	margin-left:auto;
}
#hostel, #mess, #sports, #reco{
	width:200px;
}




.media{
  background-color: white;
  padding: 3%;
  box-shadow: 1px 1px 2px rgba(0,0,0,.08);
}

.media-heading{
	text-align:center;
	color:white;
	line-height:50px;
}

#our-story{
    text-align: center;
}
.right{
    text-align: right;
}

.media img{
    margin-right: 20px;
}

.right img{
    margin-right: 0px;
    margin-left: 20px;
}
.headings{
    color: #3F94C5;
}

.team-member{
    position: relative;
}


.member_profile{
    width: 85%;
    position: absolute;
}
hr { display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc;
    margin: 1em 0; padding: 0;
}



#infermap-team{
    text-align: right;
    color: #FE7F29;
}


.answer{
  display: none;
}

.question:hover{
  color: #333;
  cursor: pointer;
}

#content{
  background-color: #f5f5f5;
}

input[type='range'] {
	-webkit-appearance: none;
	border-radius: 5px;
	box-shadow: inset 0 0 5px #333;
	background-color: #999;
	height: 10px;
	vertical-align: middle;
}
input[type='range']::-moz-range-track {
	-moz-appearance: none;
	border-radius: 5px;
	box-shadow: inset 0 0 5px #333;
	background-color: #999;
	height: 10px;
}
input[type='range']::-webkit-slider-thumb {
	-webkit-appearance: none !important;
	border-radius: 20px;
	background-color: #FFF;
	box-shadow:inset 0 0 10px rgba(000,000,000,0.5);
	border: 1px solid #999;
	height: 20px;
	width: 20px;
}
input[type='range']::-moz-range-thumb {
	-moz-appearance: none;
	border-radius: 20px;
	background-color: #FFF;
	box-shadow:inset 0 0 10px rgba(000,000,000,0.5);
	border: 1px solid #999;
	height: 20px;
	width: 20px;
}


.rating-sq{
	width:25px;
	height:25px;
	background-color: #bbb;
	border-radius:3px;
	margin:0.5px;
}

.rating-sq:hover{
	cursor:pointer;
}

.rating-descript{
	line-height:25px;
	margin-left:10px;
}

</style>
@if(isset($temp_college))
<div class="container">
<div class="jumbotron">
    <h3>You have already submitted review for {{$temp_college->name}}</h3>
</div>
</div>
@elseif(isset($other_college))
<div class="container">
<div class="jumbotron">
    <h3>You have already submitted review for <a href="{{URL::Route('college')}}/$other_college->link">{{$other_college->name}}</a></h3>
</div>
</div>
@elseif(Auth::check())
<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <div class="entry-content">
            <div class="main-body">
                <form action="{{ URL::to('/review/add')}}" method="post" id="review-form" accept-charset="utf-8">
                    <input type="hidden" name="college_id" value="0">

                    <div class="media">
                        <div class="media-body">

                            @if(isset($id))
                            <input type="hidden" name="referer" value="{{$id}}">
                            @endif
                            <div class="pull-left">
                                <h1>{{$data['name']}}</h1>
                                <input type="hidden" name="name" value="{{$data['name']}}">
                                <input type="hidden" name="cid" value="0">
                            </div>
                        </div>
                    </div>
                    @if(isset($prev_msg))
                    <div class="media"> 
                        <div class="media-body">
                            <blockquote>
                                <h3>
                                    Note: You have already submitted a review. Submitting this will over write your previous review
                                </h3>
                            </blockquote>
                        </div>
                    </div>
                    @endif
                     <!-- ACADEMICS -->
                    <div class="media"> 
                        <div class="media-body">
                            <h3 class="media-heading" style="background-color:#358EFB;">
                                Academics
                            </h3>
                            <br>
                            <div class="form-group row">
                                <label class="col-md-5" for="sports">How good are your faculty members ?</label>
                                <div class="rating col-md-7" data-id="fac_teaching" data-max="5" data-descript="Very Dissatisfied#Dissatisfied#Neutral#Satisfied#Very Satisfied"></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5" for="sports">How much your department focus on research and practical work?</label>
                                <div class="rating col-md-7" data-id="research_work" data-max="5" data-descript="Low#Neutral#Good#High#Very High"></div>
                            </div>
                        </div>
                    </div>

                    <!-- PLACEMENT -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="media-heading" style="background-color:#1ABC9C">
                                Placements
                              </h3>
                            <br>
                            <div class="form-group row">
                                <label class="col-md-5" for="plac">Approximate percentage (%) of students who get placed every year</label>
                                <div class="col-md-7">
                                    <select name="plac" class="form-control" id="pack">
                                        <option value="">Select</option>
                                        <option value="0-30">0-30</option>
                                        <option value="30-50">30-50</option>
                                        <option value="50-60">50-60</option>
                                        <option value="60-70">60-70</option>
                                        <option value="70-80">70-80</option>
                                        <option value="80-100">80-100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5" for="pack">Average Package offered (In Lacs per anum)</label>
                                <div class="col-md-7">
                                    <select name="pack" class="form-control" id="pack">
                                        <option value="">Select</option>
                                        <option value="0-3">0-3</option>
                                        <option value="3-4">3-4</option>
                                        <option value="4-5">4-5</option>
                                        <option value="5-7">5-7</option>
                                        <option value="7-9">7-9</option>
                                        <option value="9+">9+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5" for="intern">Avg. % of 3rd year students securing internship/training</label>
                                <div class="col-md-7">
                                    <select name="intern" class="form-control" id="intern">
                                        <option value="select">Select</option>
                                        <option value="0-30">0-30</option>
                                        <option value="30-50">30-50</option>
                                        <option value="50-60">50-60</option>
                                        <option value="60-70">60-70</option>
                                        <option value="70-80">70-80</option>
                                        <option value="80-100">80-100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FEES -->
                    <div class="media"> 
                        <div class="media-body">
                            <h3 class="media-heading" style="background-color:rgb(248,208,47)">
                                Fees
                              </h3>
                            <br>
                           
                            <div class="form-group row">
                                <label class="col-md-5">Scholarships provided by college?</label>
                                <div class="col-md-7">
                                    <div class="col-md-6">
                                        <input type="radio" name="scholarship" id="fee-help-yes" value="1" checked="checked" onchange="$('#scholarship-box').fadeToggle()">
                                        <label for="fee-help-yes">Yes</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" name="scholarship" id="fee-help-no" value="0" onchange="$('#scholarship-box').fadeToggle()">
                                        <label for="fee-help-no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" id="scholarship-box">
                                <label class="col-md-5" for="scholarship-amnt">How much scholarship per year? (in ₹)</label>
                                <div class="col-md-7">
                                    <input type="number" id="scholarship-amnt" name="scholarship-amount" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- FACILITIES AND CAMPUS LIFE -->
                    <div class="media">
                        <div class="media-body">

                            <h3 class="media-heading" style="background-color:#E74C3C">
                                Facilities &amp;  Campus Life
                              </h3>
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-5">Uncheck if your college doesn’t provide Hostel facilities?</label>
                                    <div class="col-md-7">
                                        <input type="checkbox" name="mshs" id="mshs" checked="checked" value="1">
                                        <label for="mshs">Hostel provided by the college</label>
                                        <br>
                                    </div>
                                </div>
                                <br>
                                <label>Rate the following based on your experience
                                    <br>5: means Awesome , 1: Not so good</label>

                                <div class="row hostel-row">
                                    <label class="col-md-5" for="hostel">Hostel facility</label>
                                    <div class="rating col-md-7" data-id="hostel" data-max="5" data-descript="Not so good#Okay#Good#Very Good#Awesome"></div>
                                </div>
                                <br>
                                <div class="row hostel-row">
                                    <label class="col-md-5" for="mess">Mess facility</label>
                                    <div class="rating col-md-7" data-id="mess" , data-max="5"  data-descript="Not so good#Okay#Good#Very Good#Awesome"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5" for="sports">Sports facility</label>
                                <div class="rating col-md-7" data-id="sports" data-max="5"  data-descript="Not so good#Okay#Good#Very Good#Awesome"></div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5" for="co-currics">Extra-curricular life</label>
                                <div class="rating col-md-7" data-id="co-currics" data-max="5"  data-descript="Not so good#Okay#Good#Very Good#Awesome"></div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5" for="ragging">Ragging Practiced in College?</label>
                                <div class="rating col-md-7" data-id="ragging" data-max="5"  data-descript="Unbearable Ragging#Acceptable tasks are given#Just for Introduction#Very few Cases#Not at all"></div>
                            </div>
                        </div>
                    </div>

                    <!-- REVIEW -->
                    <div class="media">
                        <div class="media-body">

                            <h3 class="media-heading" style="background-color:#9B59B6">
                                Overall College Review
                            </h3>
                            <br>

                           <div class="form-group row">
                                <label class="col-md-12" for="ragging">Title</label>
                                <div class="col-md-12">
                                    <input class="form-control" name="review_title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12" for="about_college"> Write your overall college experience (min 20 words)
                                </label>
                                <div class="col-md-12">
                                    <textarea name="about_college" id="about_college" class="form-control" style=" height:120px"></textarea>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-md-3" for="label">Type of review</label>
                                <div class="col-md-9">
                                    <div class="col-md-3">
                                        <input type="radio" name="label" value="Good" id="label-good">
                                        <label for="label-good">Good</label>
                                    </div>
                                     <div class="col-md-3">
                                        <input type="radio" name="label" value="Neutral" id="label-neutral">
                                        <label for="label-neutral">Neutral</label>
                                    </div>
                                     <div class="col-md-3">
                                        <input type="radio" name="label" value="Bad" id="label-bad">
                                        <label for="label-bad">Bad</label>
                                    </div>
                                     <div class="col-md-3">
                                        <input type="radio" name="label" value="Advice" id="label-advice">
                                        <label for="label-advice">Advice</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5" for="reco">Would you recommend college to friends over similar colleges</label>
                                <div class="col-md-7">
                                    <div classe="col-md-6">
                                        <input type="radio" name="reco" value="yes" id="reco-yes">
                                        <label for="reco-yes">Yes</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" name="reco" value="no" id="reco-no">
                                        <label for="reco-no">No</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="media">
                        <div class="media-body">

                            <h3 class="media-heading" style="background-color:#34495E">
                              Tell us about yourself
                            </h3>
                            <br>
                            <div class="form-group row">
                                <label class="col-md-5" for="college-name">College Name</label>
                                <div class="col-md-7">
                                    <input type="text" id="college-name" name="name" class="form-control" value="{{$data['name']}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5" for="college-name">City</label>
                                <div class="col-md-7">
                                    <input type="text" id="college-name" name="city" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5" for="personal-year">Year of Graduation</label>
                                <div class="col-md-7">
                                <select type="text" id="personal-year" name="personal-year" class="form-control" required>
                                        <option value="">Select year</option>
                                        <option>2020</option>
                                        <option>2019</option>
                                        <option>2018</option>
                                        <option>2017</option>
                                        <option>2016</option>
                                        <option>2015</option>
                                        <option>2014</option>
                                        <option>2013</option>
                                        <option>2012</option>
                                        <option>2011</option>
                                        <option>2010</option>
                                        <option>2009</option>
                                        <option>2008</option>
                                        <option>2007</option>
                                        <option>2006</option>
                                        <option>2005</option>
                                        <option>2004</option>
                                        <option>2003</option>
                                        <option>2002</option>
                                        <option>2001</option>
                                        <option>2000</option>
                                        <option>1999</option>
                                        <option>1998</option>
                                        <option>1997</option>
                                        <option>1996</option>
                                        <option>1995</option>
                                        <option>1994</option>
                                        <option>1993</option>
                                        <option>1992</option>
                                        <option>1991</option>
                                        <option>1990</option>
                                        <option>1989</option>
                                        <option>1988</option>
                                        <option>1987</option>
                                        <option>1986</option>
                                        <option>1985</option>
                                        <option>1984</option>
                                        <option>1983</option>
                                        <option>1982</option>
                                        <option>1981</option>
                                        <option>1980</option>
                                        <option>1979</option>
                                        <option>1978</option>
                                        <option>1977</option>
                                        <option>1976</option>
                                        <option>1975</option>
                                        <option>1974</option>
                                        <option>1973</option>
                                        <option>1972</option>
                                        <option>1971</option>
                                        <option>1970</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5" for="personal-dept">Department?</label>
                                <div class="col-md-7">
                                     <select id="personal-dept" name="personal-dept" class="form-control" required>
                                        <option value="">Chose department</option>
                                        <option value="aero">Aerospace</option>
                                        <option value="aeronautics">Aeronautics</option>
                                        <option value="agri">Agricultural</option>
                                        <option value="arch">Architecture</option>
                                        <option value="automation">Automation</option>
                                        <option value="automobile">Automobile</option>
                                        <option value="biotech">Bio Technology/Bio Medical</option>
                                        <option value="cham">Chemistry</option>
                                        <option value="chem">Chemical</option>
                                        <option value="civil">Civil</option>
                                        <option value="communication">Communication</option>
                                        <option value="Construction">Construction</option>
                                        <option value="control">Control</option>
                                        <option value="cse">Computer Science and Engineering</option>
                                        <option value="dairy">dairy</option>
                                        <option value="elec">Electrical</option>
                                        <option value="electronic">Electronics</option>
                                        <option value="energy">Energy</option>
                                        <option value="environment">Environment</option>
                                        <option value="fashion">Fashion</option>
                                        <option value="food">Food</option>
                                        <option value="industrial">Industrial</option>
                                        <option value="instrumentation">Instrumentation</option>
                                        <option value="it">Information Technology</option>
                                        <option value="manufacturing">Manufacturing</option>
                                        <option value="marine">Marine</option>
                                        <option value="material">Material</option>
                                        <option value="math">Mathematics</option>
                                        <option value="mech">Mechanical</option>
                                        <option value="meta">Metallurgy</option>
                                        <option value="mining">Mining</option>
                                        <option value="nano">Nano Technology</option>
                                        <option value="nuclear">Nuclear Scince</option>
                                        <option value="petroleum">Petroleum</option>
                                        <option value="pharm">Pharmacy</option>
                                        <option value="phy">Physics</option>
                                        <option value="plastic">Plastic</option>
                                        <option value="polymer">Polymer</option>
                                        <option value="production">Production</option>
                                        <option value="telecommunication">Tele Communication</option>
                                        <option value="textile">Textile</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <input id="anonymous" name="stay-con[]" value="newsletter" type="checkbox" checked>
                                <label for="anonymous">I am interested in receiving newsletters and articles related to engineering</label>
                                <br>
                            </div>
                            <div class="form-group">
                                <input id="anonymous" name="anonymous" value="1" type="checkbox" checked>
                                <label for="anonymous">Include my credentials with this review</label>
                                <br>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var colors = ['#9f1923', '#CB202D', '#DE1D0F', '#FF7800', '#FFBA00', '#EDD614', '#9ACD32', '#5BA829', '#3F7E00', '#305D02']
    $('.rating').each(function(index) {
        var attr = $(this).attr('data-descript');
        if(typeof attr == typeof undefined || attr == false) {
            $(this).attr('data-descript', '#####################');
        }
        var max = $(this).attr('data-max');
        $(this).attr('data-cur', -1);
        $(this).append('<input type="hidden" id="' + $(this).attr('data-id') + '" name="' + $(this).attr('data-id') + '" >')
        max = parseInt(max);
        for(var i = 0; i < max; i++) {
            $(this).append('<div class="rating-sq pull-left" data-max="' + max + '" data-num="' + i + '" data-col="' + colors[Math.floor(i * 9 / (max - 1))] + '"></div>')
        }
        $(this).append('<div class="rating-descript pull-left"></div>')
        $(this).append('<br>');
    });

    $('.rating-sq').mouseenter(function() {
        var index = parseInt($(this).attr('data-num'));
        var color = $(this).attr('data-col');
        $(this).css('background-color', color);
        $(this).siblings().each(function() {
            var newind = parseInt($(this).attr('data-num'));
            if(newind < index) $(this).css('background-color', $(this).attr('data-col'));
            else if($(this).attr('class') != 'rating-descript pull-left') $(this).css('background-color', '#bbb');
        });
        var arr = $(this).parent().attr('data-descript').split('#');
        $(this).parent().find('.rating-descript').html(arr[index]);
    });

    $('.rating-sq').mouseleave(function() {
        var index = parseInt($(this).attr('data-num'));
        if(index > parseInt($(this).parent().attr('data-cur'))) $(this).css('background-color', '#bbb');
        $(this).siblings().each(function() {
            var newind = parseInt($(this).attr('data-num'));
            if(newind > parseInt($(this).parent().attr('data-cur'))) $(this).css('background-color', '#bbb');
            else $(this).css('background-color', $(this).attr('data-col'));
        });
        $(this).parent().find('.rating-descript').html('');

    });

    $('.rating-sq').click(function() {
        var index = parseInt($(this).attr('data-num'));
        $(this).parent().attr('data-cur', index);
        $(this).siblings('input').each(function() {
            $(this).val(index + 1);
        });
    });

    $('#no-mshs').change(function(){
        $('.hostel-row').toggle();
        console.log('qdw');
    })
</script>
@else
<div class="col-md-6 col-md-offset-3">
<br>
<div class="title"><h3>Please login to continue</h3></div>
@include('user.login_template')
</div>
@endif

@stop
