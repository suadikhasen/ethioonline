@extends('layouts.examtakerapp')
@section('content')
<div class="container my-5">
		<div class="row">
		  <div class="col-md-6">
		  	@if(Session::has('login_error'))
		  	 <div class="alert alert-danger bg-danger">{{Session::get('login_error')}}</div>
		  	@endif

		  	@if($errors->any())
		  	 <div>
		  	 @foreach($erros->all() as $error)
                {{$error}}
		  	 @endforeach
		  	 <div></div>
		  	@endif
				<div class="card card-primary card-block">
					<div class="card-header">
						Login
					</div>

					<div class="card-body">
						<form method="POST" action="{{route('Exam_Taker_Authentication')}}">
							@csrf
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" id="username" class="form-control" placeholder="username" autofocus="autofocus" required value="{{old('username')}}">
							</div>

							<div class="form-group">
								<label for="exam_code">Exam Code</label>
								<input type="text" name="exam_code" id="exam_code" class="form-control" placeholder="exam code" required value="{{old('exam_code')}}">
							</div>

							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" class="form-control" placeholder="password" autofocus="autofocus" required>
							</div>



							<div class="form-group">
								<button class="btn btn-primary" type="submit">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>
@endsection