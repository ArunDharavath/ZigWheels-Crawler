<!DOCTYPE html>
<html lang="en">
	<head>
<!-- Checking if cookie is set or not. -->
	<?php
    if(!isset($_COOKIE["login"]))
    {
      header('Location: login.php');
    }
  ?>
		<meta charset="UTF-8">
		<title>About Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--JS file for ABOUT page functionalities-->
		<script src="../js_files/about.js"></script>
		<link rel="stylesheet" href="../bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
  	<link rel="stylesheet" href="../bootstrap-4.2.1-dist/js/bootstrap.min.js"/>
  	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<link rel="shortcut icon" href="zigwheels_favicon.png" type="image/icon"/>
	<!--CSS file for necesary styling-->	
		<link rel="stylesheet" type="text/css" href="../css_files/about.css">
		<style type="text/css">
			.body{
				background-color: lightgoldenrodyellow;
			}
			div {
				font-size: 22px;
			}
			.item3 {
				display: none;
			}
			a:hover{
    		color:purple;
  		}
  		a:active{
    		color:red;  
  		}
		</style>
	</head>
	<body class="body">
	<!--The top NAVBAR-->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<h1 class="navbar-brand" >ZigWheels
			<medium class="text-muted">Crawler</medium></center></h1>
			<a class="nav-link" href="home.php">Home</a>
			<a class="nav-link" href="about.php">About Me</a>
			<a class="nav-link" href="contact.php">Contact Us</a>
			<a class="logout" name="logout" href="logout.php">Logout</a>
		</nav>
		<div class="wrapper">
  		<div class="item1">Arun Kumar Dharvath<br>SUCCESS is always present, it is YOU, who should GIVE IT YOUR ALL to achieve it.</div>
		<!--Links to display each corresp feature in frame 3-->
			<div class="frame item2">
  			<a href="#" onclick="disp('obj'); this.style.color='green';">Objective</a><br><br>
  			<a href="#" onclick="disp('p_info'); this.style.color='green';">Personal Information</a><br><br>
  			<a href="#" onclick="disp('f_info'); this.style.color='green';">Family Information</a><br><br>
  			<a href="#" onclick="disp('ed_info'); this.style.color='green';">Education Information</a><br><br>
  			<a href="#" onclick="disp('exp'); this.style.color='green';">Experience</a><br><br>
  			<a href="#" onclick="disp('ach'); this.style.color='green';">Achievements</a><br><br>
  			<a href="#" onclick="disp('other'); this.style.color='green';">Other</a>
  		</div>
		<!--Frame 3 displays corresp info when the links in frame 1 re clicked-->
  		<div class="frame item3" id="obj"><br><br><br><br><br>Data Scientist</div> 
  		<div class="frame item3" id="p_info"><br><br><br><br>DOB: 30th Jan 2001<br>Place fo birth: LA, California, USA<br>Gender: Male<br>Age: 19 yrs old</div> 
  		<div class="frame item3" id="f_info"><br><br><br>Father's Name: Babu Rao Dharavath<br>Occupation: Professor<br>Mother's Name: Sada Laxmi Dharavath<br>Occupation: Woman Of The House<br>Sibling's Name: Harish Kumar Dharavath<br>Occupation:Engineering Student</div> 
 	 		<div class="frame item3" id="ed_info"><br><br><br><br>Primary Education: Kennedy High The Global School<br>Secondary Education: DAV Public School<br>Current Education:I-MTech<br>Institute name: University of Hyderabad(UoH/HCU)</div>
  		<div class="frame item3" id="exp"><br><br><br><br><br>Null, still in college.  ;)</div> 
  		<div class="frame item3" id="ach"><br><br><u>Academics:</u><br>3rd Topper of School in 12th<br>Topper of Physical Education Board Examination in 12th<br><br><u>Extra-curiccular:</u><br>Runner-up in Inter-House Skating Competition<br>Runner-up in Inter-House Cricket Competition<br>Winner in Inter-House Football Competition<br>Runner up in Inter-House Group Dance Competition</div> 
  		<div class="frame item3" id="other"><br><br><u>Hobbies:</u><br>Watching tv series<br>Playing sports<br>Reading novels<br>Surfing internet<br>Going for walks<br>Helping around in the household</div>

<!-- displaying image -->
  		<div class="frame item4"><img src="" alt="no image" id="image"></div>

	  	<div class="item5">Contact Details: arundharavath6@gmail.com</div>
		</div>
	</body>
</html>