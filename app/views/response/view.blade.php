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

		<form action="response_submit" method="get" accept-charset="utf-8">
			<label for="college-name">Enter college name</label>
			<input class="form-control" id="college-name">
			<hr>

          <h3 class="media-heading">
            Academics
          </h3>
          <br>
			<div class="form-group">
				<label>Faculty Qualification</label><br>
				<input id="btech" name="facqual[]" type="checkbox"><label for="btech">B.Tech</label><br>
				<input id="mtech" name="facqual[]" type="checkbox"><label for="mtech">M.Tech</label><br>
				<input id="phd" name="facqual[]" type="checkbox"><label for="phd">Ph.D</label><br>
			</div>
			<div class="form-group">
				<label for="clshrs">Avg. no. of class hrs/week</label>
				<select name="clshrs" class="form-control" id="clshrs">
					<option value="op1">10-15</option>
					<option value="op2">15-20</option>
					<option value="op3">20-25</option>
					<option value="op4">25-30</option>
					<option value="op5">30-40</option>
					<option value="op6">40-50</option>
				</select>
			</div>
			<div class="form-group">
				<label for="att">% Attendance required</label>
				<select name="att" class="form-control" id="att">
					<option value="op1">50-60</option>
					<option value="op2">60-70</option>
					<option value="op3">70-80</option>
					<option value="op4">80-100</option>
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
					<option value="op1">Select</option>
					<option value="op2">below 20</option>
					<option value="op3">20-30</option>
					<option value="op4">30-40</option>
					<option value="op4">40-50</option>
					<option value="op4">50-60</option>
					<option value="op4">60-70</option>
					<option value="op4">70-80</option>
					<option value="op4">80-90</option>
					<option value="op4">above 90</option>
				</select>
			</div>
			<div class="form-group">
				<label for="pack">Avg. Package lpa</label>
				<select name="pack" class="form-control" id="pack">
					<option value="op1">Select</option>
					<option value="op2">2</option>
					<option value="op3">3</option>
					<option value="op4">4</option>
					<option value="op4">5</option>
					<option value="op4">6</option>
					<option value="op4">7</option>
					<option value="op4">8</option>
					<option value="op4">9</option>
					<option value="op4">10+</option>
				</select>
			</div>
			<hr>
			
          <h3 class="media-heading">
            Facilities
          </h3>
          <br>
			<div class="form-group">
				<label>Hostel and Mess facilities</label><br>
				<input type="CHECKBOX" id="no-mshs"><label for="no-mshs">No Hostel/Mess</label><br>
				<label for="hostel">Hostel</label>(1: shared cramped rooms, 5: single spacious rooms with AC and internet facility)
				<input type="range" name="hostel" min="1" max="5" id="hostel">
				<label for="mess">Mess</label>
				<input type="range" name="mess" min="1" max="5" id="mess">
			</div>
			<div class="form-group">
				<label for="sports">Sports</label>(1: no sports facilities, 5: sports teams participation in competitions with sports equipments available)
				<input class="myrange" type="range" name="sports" min="1" max="5" id="sports">
			</div>
			<hr>

          <h3 class="media-heading">
            Campus Life
          </h3>
          <br>
			<div class="form-group">
				<label>Tick facilities available</label><br>
				<input id="canteen" name="facilities[]" type="checkbox"><label for="canteen">Canteen</label><br>
				<input id="fests" name="facilities[]" type="checkbox"><label for="fests">Fests</label><br>
				<input id="clubs" name="facilities[]" type="checkbox"><label for="clubs">Clubs</label><br>
				<input id="gne" name="facilities[]" type="checkbox"><label for="gne">Groups and events held</label><br>
				<input id="inout" name="facilities[]" type="checkbox"><label for="inout">In Out restrictions</label><br>
				<input id="concity" name="facilities[]" type="checkbox"><label for="concity">Connectivity to the City</label><br>
			</div>
			<div class="form-group">
				<label for="reco">Would you recommend college to friends over similar colleges</label>
				<input class="myrange" type="range" name="reco" min="1" max="10" id="reco">
			</div>
			<div class="form-group">
				<label for="whycho">Why should someone choose your college? (50 words)</label>
				<textarea id="whycho" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label for="improve">Areas in which college can improve (50 words)</label>
				<textarea id="improve" class="form-control"></textarea>
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




</style>


@stop
