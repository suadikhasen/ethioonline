@extends('layouts.examtakerapp')
@section('content')
<div class="container my-5">
	<div class="row">
		<div class="col-md-6">
			@if(Session::has('exam_code_error'))
			 <div class="alert alert-danger bg-danger">{{Session::get('exam_code_error')}}</div>
			@endif
			<div class="card">
				<div class="card-header">Exam Code</div>
				<div class="card-body">
					<form method="POST" action="{{route('Exam_Taker.Authentication')}}">
						@csrf
						<div class="form-group">
							<label for="exam_code">Exam Code</label>
							<input type="text" name="exam_code" id="exam_code" class="form-control" autofocus placeholder="exam code" required>
						</div>

						<div class="form-group">
							<button class="btn btn-primary" type="submit">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection