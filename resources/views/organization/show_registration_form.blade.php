@extends('layouts.exam')
@section('sub_content')
@parent
<div class="container my-5">
	<div class="row">
		<div class="col-md-6">
			@if($errors->any())
			  <div class="alert alert-danger bg-danger">
			  	@foreach($errors->all() as $error)
			  	 {{$error}}
			  	@endforeach
			  </div>
			@endif

			@if(Session::has('double_registration'))
			<div class="alert alert-warning">{{Session::get('double_registration')}}</div>
			@endif

			@if(Session::has('mail_success'))
			 <div class="alert alert-success bg-success text-white">{{Session::get('mail_success')}}</div>
			@endif
			<div></div>
			<form method="post" action="{{route('Organization.Register')}}">
				@csrf
				<div class="card card-primary card-block">
					<div class="card-header bg-primary">Registration Form</div>
					<div class="card-body">
						<div class="form-group">
							<label for="first_name">First Name</label>
							<input type="text" name="first_name" id="first_name" class="form-control" autofocus="autofocus" required="required">
						</div>

						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input type="text" name="last_name" id="last_name" class="form-control" required="required">
						</div>

						<div class="form-group">
							<label for="grand_name">Grand Name</label>
							<input type="text" name="grand_name" id="grand_name" class="form-control" required="required">
						</div>

						<div class="form-group">
							<label for="email">E-mail</label>
							<input type="email" name="email" id="email" class="form-control" required="required">
						</div>

						<div class="form-group">
							<label for="gender">Gender</label>
							<select class="form-control" name="gender">
								<option>Male</option>
								<option>female</option>
							</select>
						</div>

						<div class="form-group">
							<button class="btn btn-primary" type="submit">Register</button>
						</div>
					</div>
			</div>
			</form>
		</div>
	</div>
</div>
@endsection