@extends('layouts.exam')
@section('sub_content')
@parent
<div class="container offset-1">
	@if($errors->any())
	 @foreach($errors->all() as $error)
	  <div class="alert alert-warning bg-warning">{{$error}}</div>
	 @endforeach
	@endif
    @if(Session::has('question_added_successfully'))
     <div class="alert alert-success bg-success">{{Session::get('question_added_successfully')}}</div>
    @endif
	@isset($question_number)
	 <small>question number {{$question_number}}</small>
	 @endisset
	<form method="post" action="{{route('Organization.Add_Question')}}">
		@csrf
		<div class="form-group">
			<label for="main_question">Main Question</label>
			<textarea id="main_question" class="form-control" style="width: 30em;height:15em;" placeholder="your main question" autofocus name="main_question" required="required" value="{{old('main_question')}}"></textarea>
		</div>

		<div class="form-group " >
			<label for="choice_a">Choice A</label>
			<textarea id="choice_a" name="choice_a"  class="form-control" style="width: 30em;height:15em;" placeholder="write choice A" autofocus required="required" value="{{old('choice_a')}}"></textarea>
		</div>

		<div class="form-group " >
			<label for="choice_b">Choice B</label>
			<textarea id="choice_b" name="choice_b" class="form-control" style="width: 30em;height:15em;" placeholder="write choice B" autofocus  required="required"></textarea>
		</div>

		<div class="form-group " >
			<label for="choice_c">Choice C</label>
			<textarea id="choice_c" name="choice_c" class="form-control" style="width: 30em;height:15em;" placeholder="write choice C" autofocus  required="required"></textarea>
		</div>

		<div class="form-group " >
			<label for="choice_d">Choice D</label>
			<textarea id="choice_d" name="choice_d" class="form-control" style="width: 30em;height:15em;" placeholder="write choice D" autofocus  required="required"></textarea>
		</div>

		<div class="form-group " >
			<label for="choice_e">Choice E(optional)</label>
			<textarea id="choice_e" name="choice_e" class="form-control" style="width: 30em;height:15em;" placeholder="write choice E " autofocus  required="required"></textarea>
		</div>

		<div class="form-group">
			<label for="answer"></label>
			<input type="text" name="answer" class="form-control" id="answer" placeholder="correct answer " style="width: 20em;">
		</div>
       
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Save</button>
		</div>

	</form>
</div>
@endsection