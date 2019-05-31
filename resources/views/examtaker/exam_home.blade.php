@inject('exam','App\Service\ExamStatus')
@extends('layouts.examtakerapp')
@section('content')
@include('examtaker.navbar')
<div class="my-5">
	<div style="margin-top:5em;" class="container">
		@if(Auth('exam_taker')->user()->attendance)
		  @if(Auth('exam_taker')->user()->taken)
		   <div class="alert alert-info bg-dark text-white">You Take This Exam check your Profile Inorder to know your status</div>
		  @else
		    @if($exam->progress())
			     @if($exam->online())
			       <div id="answer">@include('examtaker.question',['questions'=>$questions])</div>
			     @else
			       <div class="aler alert-info bg-dark text-white">Wait Exam Will Start Soon</div>
			     @endif
			@else
			  <div class="alert alert-danger bg-danger text-white">Some Thing Waint Wrong</div>
		    @endif
		  @endif
		@else
		   @if($exam->progress())
			     @if($exam->online())
			       <div class="alert alert-danger bg-danger">Please Attend The Exam</div>
			     @else
			       <div class="alert alert-info bg-dark text-white">
			       	  Exam Not Started Contact Your Exam Owner To Know When Exam Start
			       </div>
			     @endif
		   @else
		    <div class="alert alert-danger bg-danger text-white">You Did Not Take This Exam</div>
		   @endif
		@endif
	</div>
	
</div>

<script type="text/javascript" src="{{asset('/vue/dist/vue.js')}}"></script>
 <script type="text/javascript" src="{{asset('/axios/dist/axios.js')}}"></script>
 <script type="text/javascript" src="{{asset('/js/submitanswer.js')}}"></script>
@endsection