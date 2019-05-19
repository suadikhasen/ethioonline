@extends('layouts.organization')
@section('tittle') Exam Creating Form @endsection
@section('content')
 <div class=" container py-5">
 	@if($errors->any())
 	  @foreach($errors->all() as $error)
        <div class="alert alert-danger bg-warning">{{$error}}</div>
 	  @endforeach
 	@endif
 	@if(Session::has('checkerror'))
 	  <div class="alert alert-warning bg-warning">{{Session::get('checkerror')}}</div>
 	@endif

 	@if(Session::has('exam_success'))
 	 <div class="alert alert-success bg-success">{{Session::get('exam_success')}}</div>
 	@endif
 	<div class="card card-primary card-block" style="width: 35rem;">
 		<div class="card-header">Creating Exam Form</div>
 		<div class="card-body ml-2">
 			<form method="POST" action="{{route('Organization.Create_Exam')}}">
 				@csrf
 				<div class="form-group row">
 					<label for="exam_name">Exam Name</label>
 					<input type="text" name="exam_name" class="form-control" id="exam_name" required="required" placeholder="exam name" autofocus>
 					<span></span>
 				</div>

 				<div class="form-group row">
 					<label for="no_days"> Duration in day</label>
 					<input type="number" name="no_days" class="form-control" id="no_days" placeholder="number of days">
 					<span></span>
 				</div>

 				<div class="form-group row">
 					<button class="btn btn-primary" type="submit">Submit</button>
 				</div>
 			</form>
 		</div>
 	</div>
 </div>
@endsection