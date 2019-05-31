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
        @if($exam_availability_checker==true)
          <ul class="navbar-nav ml-5">
           <li class="nav-item text-white" id="count_down_timer"></li>
        </ul>
        @endif
        
    </div>
</nav>

  @yield('content')
	  <script type="text/javascript" src="{{asset('/jquery/dist/jquery.js')}}"></script>
	  <script type="text/javascript" src="{{asset('/bootstrap/dist/js/bootstrap.js')}}"></script>
      
         @if($exam_availability_checker==true)
           <script type="text/javascript">
             var waitingtime  = {{$pre_begning}};
             var exam_time = {{$begning}};
             var dist;    
             var recursion =  setInterval(function()
               { 
                       

                    if (waitingtime >0) {
                        dist=waitingtime;
                        waitingtime--;
                    }

                    else {
                        dist = exam_time;
                        exam_time--;
                    }


                    var hour = Math.floor((dist%(60*60*24))/(60*60));
                    var minute = Math.floor((dist%(60*60))/(60));
                    var second =dist%60;

                    
                   

                    document.getElementById("count_down_timer").innerHTML=hour + " " + minute +" " + second ;
                  

                  if(dist <=0) {
                      clearInterval(recursion);
                    document.getElementById("count_down_timer").innerHTML="Exam Completed";
                  }

              },1000);

                

           </script>
          
         @endif
              
</body>
</html>