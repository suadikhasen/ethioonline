@extends('layouts.organization')
@section('tittle') Exam Home @endsection
@section('content')
<div class="container py-1  border-primary">
	@isset($exam_available)
	<nav class="navbar navbar-expand-lg   bg-light">
	<button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
    	<ul class="navbar-nav ">
    		<li class="nav-item">
                <a href="{{route('Organization.Exam_Home')}}" class="nav-link" @if(Route::currentRouteName()=='Organization.Exam_Home') disabled @endif>Questions</a>
    		</li>

    		<li class="nav-item">
    			<a href="#" class="nav-link">Start Exam</a>
    		</li>

    		<li class="nav-item">
    			<a href="{{route('Organization.Registration')}}" class="nav-link ">Registration</a>
    		</li>

    		<li class="nav-item">
    			<a href="#" class="nav-link">Setting</a>
    		</li>
    	</ul>
    </div>
 </nav>
@endisset
@isset($exam_unavailable)
<div class="alert alert-info">Currently No Exam Available Please Create Exam </div>
@endisset
@if(Session::has('exam_success'))
 <div class="alert alert-success bg-success">{{Session::get('exam_success')}}</div>
@endif
 @section('sub_content')
 @show
</div>

@endsection