@extends ('layout.main')

@section ('body')


    <div id="page-title">

        <div id="page-title-inner">

            <!-- start: Container -->
            <div class="container">

                <h2>Welcome {{ $user->name }}!</h2>

            </div>
            <!-- end: Container  -->

        </div>

    </div>
<div class="container">

@if (Session::get('messages') != null && Session::get('messages')->has('home_message'))
<div class="col-md-12 row">
	<div class="alert alert-success alert-dismissible" role="alert" style="position:absolute;top:50px; width:50%; left:25%;opacity:0.6">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	{{ Session::get('messages')->first('home_message') }}
	</div>
</div>
@endif
<div class="col-md-8 col-md-offset-2">
    <form method="post" action="{{ URL::route('user.update') }}">
        <div class="form-group row">
            <div class="col-md-3">
                <label for "name">Name</label>
            </div>
            <div class="col-md-9">
                <input id="name" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for "password">Password</label>
            </div>
            <div class="col-md-9">
                <input type="password" id="password" password="password" placeholder="New Password" class="form-control" {{ ($user->password == null ? 'required':'') }} >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for "city">Current City</label>
            </div>
            <div class="col-md-9">
                <input id="city" name="city" class="form-control" placeholder="City" value="{{ $user->city }}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label>School/College</label>
            </div>
            <div class="col-md-9">
                <input id="sc_col_sc" type="radio" name="school_college" value="0" {{ (!$user->school_college && $user->school_college != null ? 'checked="checked"' : '') }} >
                <label for="sc_col_sc">Attending School</label>
                <br>
                <input id="sc_col_col" type="radio" name="school_college" value="1" {{ ($user->school_college ? 'checked="checked"' : '') }} >
                <label for="sc_col_col">Attending or is an alumnus of a college</label>
                <br>
                <input placeholder="Name of school or College" value="{{ $user->school_college_name }}" class="form-control" name="school_college_name">
                <br>
                <input placeholder="Standard currently in or year of passing out" value="{{ $user->std_passingout }}" class="form-control" name="std_passingout">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label>Gender</label>
            </div>
            <div class="col-md-9">
                <input id="male" type="radio" name="gender" value="1" {{ ($user->gender ? 'checked="checked"' : '') }} >
                <label for="male">Male</label>
                <br>
                <input id="female" type="radio" name="gender" value="0" {{ (!$user->gender && $user->gender != null ? 'checked="checked" ' : '') }} required>
                <label for="female">Female</label>
                <br>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for "phone">Phone</label>
            </div>
            <div class="col-md-9">
                <input id="phone" name="phone" class="form-control" value="{{ $user->phone }}" placeholder="Phone">
            </div>
        </div>

        <div class="actions">

            <button type="submit" class="btn btn-primary col-sm-12">Save</button>

        </div>

    </form>
</div>
</div>
@stop
