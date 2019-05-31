@if(!empty($questions))
	@foreach($questions as $question)
	  <div class="container">
	  	 <p class="text-success ">{{$question->question_number}}</p>
	  	 <p class="offset-1">{{$question->main_question}}</p>
	  	 <div class="offset-2 mt-2 mb-2">
	  	 	<p class="">
	  	 		<span class="mr-2">A 
	  	 			<input type="radio" name="answer" v-on:click="submit(
	  	 			'{{Auth('exam_taker')->user()->username}}',
	  	 			'{{$question->exam_code}}',
	  	 			{{$question->question_number}},
	  	 			'A'
	  	 			)">
	  	 		</span>{{$question->choice_a}}
	  	 	</p>

	  	 	<p class="">
	  	 		<span class="mr-2">B <input type="radio" name="answer" v-on:click="submit(
	  	 		'{{Auth('exam_taker')->user()->username}}',
	  	 		'{{$question->exam_code}}',
	  	 		{{$question->question_number}},
	  	 		'B'
	  	 		)">
	  	 	  </span>
	  	 	  {{$question->choice_b}}
	  	    </p>

	  	 	<p class="">
	  	 		<span class="mr-2">C <input type="radio" name="answer" v-on:click="submit(
	  	 			'{{Auth('exam_taker')->user()->username}}',
	  	 			'{{$question->exam_code}}',
	  	 			{{$question->question_number}},
	  	 			'C'
	  	 			)">
	  	 		</span>
	  	 		{{$question->choice_c}}
	  	 	</p>

	  	 	<p class="">
	  	 		<span class="mr-2">D 
	  	 			<input type="radio" name="answer" v-on:click="submit(
	  	 			'{{Auth('exam_taker')->user()->username}}',
	  	 			'{{$question->exam_code}}',
	  	 			{{$question->question_number}},
	  	 			'D'
	  	 			)">
	  	 		</span>
	  	 		{{$question->choice_d}}
	  	 	</p>

	  	 	<p class="">
	  	 		<span class="mr-2">E 
	  	 			<input type="radio" name="answer" v-on:click="submit(
	  	 			'{{Auth('exam_taker')->user()->username}}',
	  	 			'{{$question->exam_code}}',
	  	 			'{{$question->question_number}}',
	  	 			'E'
	  	 			)">
	  	 		</span>
	  	 		{{$question->choice_e}}
	  	 	</p>
	  	 </div>
	  </div>
	@endforeach
	{{$questions->links()}}
@endif