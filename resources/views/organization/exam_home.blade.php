@extends('layouts.exam')
@section('sub_content')
@parent
<div class="container-fluid offset-1">
	@if(Session::has('exam_started'))
	 <div class="alert alert-danger bg-danger">{{Session::get('exam_started')}}</div>
	@endif
	<a href="{{route('Organization.Show_Create_Question_Form')}}">Add Question</a>
	@isset($questions)
	 @foreach($questions as $question)
	 
	  <div class="row">
	  	<div class="col-md-8">
            <span>{{$question->question_number}}</span> <span><a href="{{route('Organization.Show_Edit_Form',['exam_code'=>$question->exam_code,'question_number'=>$question->question_number])}}">Edit</a></span> <span><a href="{{route('Organization.Delete_Question',['exam_code'=>$question->exam_code,'question_number'=>$question->question_number])}}">Delete</a></span>
	  		<div class="text-info">
	  			{{$question->main_question}}
	  		</div>
            
            <b>A</b>
	  		<div class="ml-2">
	  			{{$question->choice_a}}
	  		</div>
            <b>B</b>
	  		<div class="ml-2">
	  			{{$question->choice_b}}
	  		</div>
            <b>C</b>
	  		<div class="ml-2">
	  			{{$question->choice_c}}
	  		</div>
            <b>D</b>
	  		<div class="ml-2">
	  			{{$question->choice_d}}
	  		</div>

	  		@if(!empty($question->choice_e))
	  		  <b>E</b>
	  		  <div class="ml-2">
	  			{{$question->choice_e}}
	  		</div>
	  		@endif

	  		<p class="text-secondary mt-2">answer {{$question->correct_answer}}</p>

	  	</div>

	  </div>
	 @endforeach
	 {{$questions->links()}}
	@endisset
</div>
@endsection