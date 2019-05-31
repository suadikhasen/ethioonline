@extends('layouts.examtakerapp')
@inject('exam','App\Service\ExamStatus')
@section('content')
@include('examtaker.navbar')
<div class="container-fluid" style="margin-top: 5em;">
	<div class="list-group list-unstyled">
		<div class="list-group-item">
			<b>Full Name:</b> {{Auth::guard('exam_taker')->user()->first_name.'  ' . Auth::guard('exam_taker')->user()->last_name.'  '.Auth::guard('exam_taker')->user()->grand_name}}
		</div>

		<div class="list-group-item">
			<b>Status:</b>
			@if(Auth::guard('exam_taker')->user()->attendance)
			  @if(Auth::guard('exam_taker')->user()->taken)
			     taken
			  @else
			    @if($exam->online())
			     taking

			     @else
			      waiting for the exam
			    @endif

			  @endif
			@else
			  @if($exam->progress())
			    @if($exam->online())
			      you are not attend the exam
			    @else
			      to be taken
			    @endif
			  @else
			    exam complated you didnt take this exam
			  @endif
			@endif	
		</div>

		<div class="list-group-item">
			 <span>

			 	<b>Rank For This Exam:</b>
			 	@if(!$exam->progress())
			 	
			 	@else
			 	  wait  untiil exam completed
			 	@endif
			 	<a href="#" class="ml-3">Detail</a>
			 </span>
		</div>
	</div>
</div>
@endsection