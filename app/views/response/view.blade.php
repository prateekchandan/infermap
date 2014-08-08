@extends ('layout.main')

@section ('body')
<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">

            
         

          <div class="entry-content">
            <div class="main-body">
      <h2 class="headings">
        Response
      </h2>
      <div class="media">
        <div class="media-body">

		<form action="review" method="post" accept-charset="utf-8">
			<label for="college-name">Enter college name</label>
			<input class="form-control" id="college-name" name="college-name" required>
			<hr>

          <h3 class="media-heading">
            Academics
          </h3>
          <br>
			<div class="form-group">
				<label>Faculty Qualification</label><br>
				<input id="btech" name="facqual[]" value="btech" type="checkbox"><label for="btech">B.Tech</label><br>
				<input id="mtech" name="facqual[]" value="mtech" type="checkbox"><label for="mtech">M.Tech</label><br>
				<input id="phd" name="facqual[]" value="phd" type="checkbox"><label for="phd">Ph.D</label><br>
			</div>
			<div class="form-group">
				<label for="clshrs">Avg. no. of class hrs/week</label>
				<select name="clshrs" class="form-control" id="clshrs">
					<option value="select">Select</option>
					<option value="10-15">10-15</option>
					<option value="15-20">15-20</option>
					<option value="20-25">20-25</option>
					<option value="25-30">25-30</option>
					<option value="30-40">30-40</option>
					<option value="40-50">40-50</option>
				</select>
			</div>
			<div class="form-group">
				<label for="att">% Attendance required</label>
				<select name="att" class="form-control" id="att">
					<option value="select">Select</option>
					<option value="50-60">50-60</option>
					<option value="60-70">60-70</option>
					<option value="70-80">70-80</option>
					<option value="80-100">80-100</option>
				</select>
			</div>
			<hr>

          <h3 class="media-heading">
            Placements
          </h3>
          <br>
			<div class="form-group">
				<label for="plac">% Placed</label>
				<select name="plac" class="form-control" id="pack">
					<option value="select">Select</option>
					<option value="below 20">below 20</option>
					<option value="20-30">20-30</option>
					<option value="30-40">30-40</option>
					<option value="40-50">40-50</option>
					<option value="50-60">50-60</option>
					<option value="60-70">60-70</option>
					<option value="70-80">70-80</option>
					<option value="80-90">80-90</option>
					<option value="above 90">above 90</option>
				</select>
			</div>
			<div class="form-group">
				<label for="pack">Avg. Package lpa</label>
				<select name="pack" class="form-control" id="pack">
					<option value="select">Select</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10+">10+</option>
				</select>
			</div>
			<hr>
			
          <h3 class="media-heading">
            Facilities
          </h3>
          <br>
			<div class="form-group">
				<label>Hostel and Mess facilities</label><br>
				<input type="checkbox" name="no-mshs" id="no-mshs"><label for="no-mshs">No Hostel/Mess</label><br>
				<label for="hostel">Hostel</label><br>
				<div class="rating container" data-id="hostel"  data-max="5"></div>
				<strong>1</strong> for shared cramped rooms<br> <strong>5</strong> for single spacious rooms with AC and internet facility<br><br>
				<label for="mess">Mess</label>
				<div class="rating container" data-id="mess", data-max="5"></div>
			</div>
			<div class="form-group">
				<label for="sports">Sports</label><br>
				<div class="rating container" data-id="sports" data-max="5"></div>
				<strong>1</strong> for no sports facilities<br> <strong>5</strong> for sports teams participation in competitions with sports equipments available	
			</div>
			<hr>

          <h3 class="media-heading">
            Campus Life
          </h3>
          <br>
			<div class="form-group">
				<label>Tick facilities available</label><br>
				<input id="canteen" name="facilities[]" value="canteen" type="checkbox"><label for="canteen">Canteen</label><br>
				<input id="fests" name="facilities[]" value="fests" type="checkbox"><label for="fests">Fests</label><br>
				<input id="clubs" name="facilities[]" value="clubs" type="checkbox"><label for="clubs">Clubs</label><br>
				<input id="gne" name="facilities[]" value="gne" type="checkbox"><label for="gne">Groups and events held</label><br>
				<input id="inout" name="facilities[]" value="inout" type="checkbox"><label for="inout">In Out restrictions</label><br>
				<input id="concity" name="facilities[]" value="concity" type="checkbox"><label for="concity">Connectivity to the City</label><br>
			</div>
			<div class="form-group">
				<label for="reco">Would you recommend college to friends over similar colleges</label>
				<div class="rating container" data-id="reco" data-max="10"></div>
			</div>
			<div class="form-group">
				<label for="whycho">Why should someone choose your college? (50 words)</label>
				<textarea name="whychoose" id="whychooose" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label for="improve">Areas in which college can improve (50 words)</label>
				<textarea name="improve" id="improve" class="form-control"></textarea>
			</div>
			<hr>

          <h3 class="media-heading">
            Personal Information
          </h3>
          <br>
		<div class="form-group">
			<label for="personal-dept">What is your department?</label>
			<input type="text" id="personal-dept" name="personal-dept" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="personal-year">Year of passing out</label>
			<input type="text" id="personal-year" name="personal-year" class="form-control" required>
		</div>
		  
			<button class="btn btn-primary">Submit</button>
		</form></div></div></div></div></div></div>
<style>

.main-body{
	width:800px;
	margin-right:auto;
	margin-left:auto;
}
.form-control{
	width:200px;
}

#hostel, #mess, #sports, #reco{
	width:200px;
}




.media{
  background-color: white;
  padding: 3%;
  box-shadow: 1px 1px 2px rgba(0,0,0,.08);
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

.media img{
    height: 200px;
    width: 200px;
}


#infermap-team{
    text-align: right;
    color: #FE7F29;
}

.media-heading{
    color : #CE6F19;
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

.rating{
	padding:0px;
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

</style>
<script src="{{ URL::asset('assets/js/jquery-1.9.1.min.js') }}"></script>
<script>


var colors = ['#9f1923','#CB202D', '#DE1D0F', '#FF7800', '#FFBA00', '#EDD614', '#9ACD32', '#5BA829', '#3F7E00', '#305D02']
$('.rating').each(function(index){
	var max = $(this).attr('data-max');
	$(this).attr('data-cur', -1);
	$(this).append('<input type="hidden" id="'+$(this).attr('data-id')+'" name="'+$(this).attr('data-id')+'" >')
	max = parseInt(max);
	for(var i = 0; i < max; i++){
		$(this).append('<div class="rating-sq pull-left" data-max="'+max+'" data-num="'+i+'" data-col="'+colors[Math.floor(i*9/(max-1))]+'"></div>')
	}
	$(this).append('<br>');
});

$('.rating-sq').mouseenter(function(){
	var index = parseInt($(this).attr('data-num'));
	var color = $(this).attr('data-col');
	$(this).css('background-color', color);
	$(this).siblings().each(function(){
		var newind = parseInt($(this).attr('data-num'));
		if(newind < index) $(this).css('background-color', $(this).attr('data-col'));
		else $(this).css('background-color', '#bbb');
	});
});

$('.rating-sq').mouseleave(function(){
	var index = parseInt($(this).attr('data-num'));
	if(index > parseInt($(this).parent().attr('data-cur'))) $(this).css('background-color', '#bbb');
	$(this).siblings().each(function(){
		var newind = parseInt($(this).attr('data-num'));
		if(newind > parseInt($(this).parent().attr('data-cur'))) $(this).css('background-color', '#bbb');
		else $(this).css('background-color', $(this).attr('data-col'));
	});

});

$('.rating-sq').click(function(){
	var index = parseInt($(this).attr('data-num'));
	$(this).parent().attr('data-cur', index);
	$(this).siblings('input').each(function(){
		$(this).val(index+1);
	});
});

</script>

@stop
