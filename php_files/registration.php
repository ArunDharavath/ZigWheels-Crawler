<?php
	//INCLUDING connect.php for database access.
	include_once('connect.php');

	if(!empty($_POST["username"]))
	{
		// initialising variables.
		$username=$_POST['username'];
		$password=sha1($_POST['password']);
		$email=$_POST['email_id'];

//Check DB for existing user with same usrnm.

		$sql = "SELECT * FROM user_log WHERE username='$username'";
		$res = mysqli_query($con, $sql);
		$count = mysqli_num_rows($res);

		if($count)
		{
			echo "Username already exists!";
		}
//If no error, then register.
		else
		{
			$query = "INSERT INTO user_log VALUES ('$username','$password','$email')";
			mysqli_query($con, $query);
			echo "<script>alert('Succesful Registration! Username: $username and Email ID: $email')</script>";
			echo '<script>window.location.replace("login.php")</script>';
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Registration</title>
	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- VALIDATION FUNCTION using JAVASCRIPT.  -->
	<script src="../js_files/registration.js"></script>
 <!--BOOTSTRAP-->
	<link rel="stylesheet" href="../bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
 	<link rel="stylesheet" href="../bootstrap-4.2.1-dist/js/bootstrap.min.js"/>
 	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>		
</head>
	
<body>
	<br><br><br>
	<center>
		<h1><i>REGISTER HERE</i></h1>
 	<!-- FORM TAG -->
   	<form name="F1" action="registration.php" method="POST" onsubmit="return validate()">
   	<!-- TABLE tag to structure elements -->
   		<table>
   			<tr>
   				<td>
   					<br><label for="username">Username: </label>
   				</td>
   				<td>
   					<br><input type="text" id="username" name="username" /><br>
   				</td>
   			</tr>
    		<tr>
    			<td>
    				<br><label for="password">Password: </label>
    			</td>
    			<td>
    				<br><input type="password" id="pwd" name="password"><br>
    			</td>
				</tr>
				<tr>
					<td colspan="2"><br><center><input type="checkbox" onclick="pw_vis()"> Show Password</center></td>
				</tr>
				<tr>
					<td>
						<br><label for="email">Email ID: </label>
					</td>
					<td>
						<br><input type="email" id="email_id" name="email_id"><br>
					</td>
				</tr>
				<tr>
					<td colspan="2"><center><br><input type="submit" value="Register" name="register"></center></td>
				</tr>
			</table>
	<!-- LINK to go to LOGIN PAGE. -->
     	<p><br>Already a user?<a href="login.php"> Log in</a></p>
		</form>
	</center>
</body>
</html>