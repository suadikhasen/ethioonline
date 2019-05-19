@extends('layouts.exam')
@section('tittle') Editing Question @endsection
@section('content')
<div class="container my-5">
	<div class="row">
		<div class="col-md-6 mt-2">
			@if(Session::has('Editing_Success'))
			 <div class="alert alert-success bg-success">{{Session::get('Editing_Success')}}</div>
			@endif
			@if(!empty($question))
	    <form method="POST" action="{{route('Organization.Edit_Question',['exam_code'=>$question->exam_code,'question_number'=>$question->question_number])}}">
	    	@csrf
	    	<div class="form-group">
	    		<label for="main_question">Main_Question</label>
	    		<textarea id="main_question" name="main_question" class="form-control" required="required" autofocus="autofocus"  rows="10">{{$question->main_question}}</textarea>
	    	</div>

	    	<div class="form-group">
	    		<label for="choice_a">A</label>
	    		<textarea id="choice_a" name="choice_a" class="form-control" required rows="10">{{$question->choice_a}}</textarea>
	    	</div>

	    	<div class="form-group">
	    		<label for="choice_b">B</label>
	    		<textarea id="choice_b" name="choice_b" class="form-control" required rows="10">{{$question->choice_b}}</textarea>
	    	</div>

	    	

	    	<div class="form-group">
	    		<label for="choice_c">C</label>
	    		<textarea id="choice_c" name="choice_c" class="form-control" required rows="10">{{$question->choice_c}}</textarea>
	    	</div>

	    	<div class="form-group">
	    		<label for="choicce_d">D</label>
	    		<textarea id="choicce_d" name="choice_d" class="form-control" required rows="10">{{$question->choice_d}}</textarea>
	    	</div>
	    	@if(!empty($question->choice_e))
	    	  <div class="form-group">
	    	  	 <label for="choice_e">E</label>
	    	  	 <textarea id="choice_e" name="choice_e" class="form-control" rows="10">{{$question->choice_e}}</textarea>
	    	  </div>
	    	@endif

	    	<div class="form-group">
	    		<label for="correct_answer">Correct Answer</label>
	    		<input type="text" name="correct_answer" id="correct_answer" class="form-control" value="{{$question->correct_answer}}" required>
	    	</div>

	    	<div class="form-group">
	    		<button class="btn btn-primary" type="submit">Save</button>
	    	</div>
	    </form>
	@endif
		</div>
	</div>
	
</div>
@endsection