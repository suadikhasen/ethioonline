@extends('layouts.exam')
@section('sub_content')
@parent
@foreach($score as $result)
 <br>{{$result->first_name}}<br>
 @foreach($result->Answer as $answer) 
  {{$answer->answer}}
 @endforeach
@endforeach
@endsection