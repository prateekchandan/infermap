@extends('exams.layout')


@section('exam-content')
<div class="row">
@if(File::exists(public_path().'/data'.'/exam/'.$exam->eid.'/about.txt'))
@if(trim(file_get_contents(public_path().'/data/exam'.'/'.$exam->id.'/about.txt'))!='')
	
@endif
@elseif($exam->admin=1)
	fwefwe
@endif

</div>
@endsection