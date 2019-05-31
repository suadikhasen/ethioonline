@extends('layouts.exam')
@section('sub_content')
@parent
<div class="container">
	<a href="{{route('Organization.Show_Registration_Form')}}" class="btn btn-block btn-primary">Register New Exam Taker</a><br>
	@if(Session::has('mail_resend_success'))
	  <div class="alert alert-success bg-success text-white">{{Session::get('mail_resend_success')}}</div>
	@endif
	@if(!empty($registered_user))
	<br>
	<p class="text-info">Registered users for this exam</p>
	<table class="table table-hover table-striped  table-bordered">
		<thead>
			<tr>
				<th>Number</th>
				<th>Full Name</th>
				<th>Gender</th>
				<th>email</th>
				<th>resend email</th>
				<th>Attendance</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach($registered_user as $single_user)
                 <tr>
                 	<td>
                 		@if($registered_user->onFirstPage())
                 		{{($loop->iteration)}}
                 		@else
                 		 {{($registered_user->currentPage()-1)*$registered_user->perPage()+$loop->iteration}}
                 		@endif
                 	</td>
                 	<td>{{$single_user->first_name.' '.$single_user->last_name.' '.$single_user->grand_name}}</td>
                 	<td>{{$single_user->gender}}</td>
                 	<td>{{$single_user->email}}</td>
                 	<td><a href="{{route('Organization.Resend_Email',['username'=>$single_user->username])}}">Resend</a></td>
                 	<td>  
                 		@attendance_organization($single_user->username)
                 		  <a href="{{route('Organization.Make_Attended',['username'=>$single_user->username])}}" class="btn btn-info">Attend</a>
		                @else
		                   <span>attended</span>
		                 	<span class="text-success"><a href="{{route('Organization.Remove_Attendance',['username'=>$single_user->username])}}" 
		                 		>remove</a></span>
		                @endattendance_organization
		            </td>
                 </tr>
                 
	        @endforeach
		</tbody>
	</table>
	 <p>{{$registered_user->onEachSide(3)->links()}}</p>
	@endif
</div>
@endsection