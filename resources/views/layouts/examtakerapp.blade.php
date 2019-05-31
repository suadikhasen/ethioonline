<!DOCTYPE html>
<html>
<head>
	<title> Exam_Taker </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('/bootstrap/dist/css/bootstrap.css')}}">
	<style type="text/css">
		body{
			word-wrap: break-word;
		},
	</style>
</head>
<body>

 @yield('content')
 
 <script type="text/javascript" src="{{asset('/jquery/dist/jquery.js')}}"></script>
 <script type="text/javascript" src="{{asset('/bootstrap/dist/js/bootstrap.js')}}">
 </script>
</body>
</html>