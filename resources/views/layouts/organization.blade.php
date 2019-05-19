<!DOCTYPE html>
<html>
<head>
	<title>@yield('tittle')</title>

    <meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="{{asset('/bootstrap/dist/css/bootstrap.css')}}">
	<style type="text/css">
		body{
			word-wrap: break-word;
		},


	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg   bg-dark ">
	<button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse bg-dark" id="navbarSupportedContent">
    	<ul class="navbar-nav ">
    		<li class="nav-item">
    			<a href="#" class="nav-link">Home</a>
    		</li>

    		<li class="nav-item">
    			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Exams
               </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item" href="#">Old Exams</a>
				    <a class="dropdown-item" href="{{route('Organization.Exam_Home')}}">Current Exam</a>
				    
               </div>
    		</li>

    		<li class="nav-item">
    			<a href="{{route('Organization.Show_Create_Exam_Form')}}" class="nav-link">Create New Exam</a>
    		</li>

    		<li class="nav-item">
    			<a href="#" class="nav-link">Profile</a>
    		</li>
    	</ul>
    </div>
</nav>
  @yield('content')
	  <script type="text/javascript" src="{{asset('/jquery/dist/jquery.js')}}"></script>
	  <script type="text/javascript" src="{{asset('/bootstrap/dist/js/bootstrap.js')}}"></script>
</body>
</html>