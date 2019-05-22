@extends('layouts.exam')
@section('sub_content')
@parent
<div class="container py-5">
	<div class="row">
		<div class="col-md-6">	
			<div class="card card-primary card-block">
				<div class="card-header bg-primary">Start Exam Form</div>
				<div class="card-body">
					<form method="POST" action="{{route('Organization.Start_Exam')}}">
						@csrf
						<div class="form-group">
							<label for="waiting_time">Waiting Time</label>
							<input type="number" name="waiting_time" id="waiting_time" class="form-control" autofocus="autofocus" placeholder="waiting time in minute"  required="required">
						</div>
						<div class="form-group">
							<label for="exam_time_in_hour">Exam Time In Hour</label>
							<input type="number" name="exam_time_in_hour" id="exam_time_in_hour" class="form-control" autofocus="autofocus" placeholder="exam time in hour" required="required">
						</div>

						<div class="form-group">
							<label for="exam_time_in_minute">Exam Time In Minute</label>
							<input type="number" name="exam_time_in_minute" id="exam_time_in_minute" class="form-control" autofocus="autofocus" placeholder="exam time in minute" required="required">
						</div>

						<div class="form-group">
							<button class="btn btn-primary form-control" type="submit">Start</button>
						</div>
                    </form>
				</div>
			</div>
		</div>
	</div>
	
</div>
@endsection