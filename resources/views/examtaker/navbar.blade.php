<nav class="navbar navbar-expand-lg bg-primary fixed-top justify-content-between">
	  <a class="navbar-brand text-white" href="{{route('Exam_Taker.Exam_Home')}}">Home</a>
	  <div class="justify-content-end">
	  	<div class="dropdown">
			  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Account
			  </button>
			  <div class="dropdown-menu my-2" aria-labelledby="dropdownMenuButton ">
			    <a class="dropdown-item" href="{{route('Exam_Taker.Profile')}}">Profile</a>
			    <a class="dropdown-item" href="{{route('Exam_Taker.Logout')}}">LogOut</a>
			  </div>
		</div>
	  </div>
</nav>