<?php 
    // Requiring connect.php file for DB access.
    require_once('connect.php');
		// CHecking if cookie is set?
    if(isset($_COOKIE["login"])){
      header('Location: home.php');
    }
    // USER AUTHENTICATION in DB.
    if(!empty($_POST["usr"]))
    {
	    $username = $_POST['usr'];  
			$password = sha1($_POST['pwd']);
		//Starting session for ADMIN.	
			session_start();
			$_SESSION['username'] = $_POST['usr'];
			$_SESSION['password'] = $_POST['pwd'];
			
			$admin = 'admin';
			$admin_password = sha1('password123');

			if( $admin == $username && $admin_password == $password)
			{
			//Checking if remember me is ticked, if yes then redirected to ADMIN PAGE, else redirected to LOGIN PAGE.
				if(!empty($_POST['remember']))
					{
						setcookie("login","true",time() + 86400);
						echo "<script>alert('Login Successful!')</script>";
        		echo '<script>window.location.replace("admin.php")</script>';
					}
					else{
						echo "<script>alert('Login Successful! But click on REMEMBER ME!')</script>";
        	echo '<script>window.location.replace("login.php")</script>';
					}
			}
			else
			{
			//Checking if USER entered CORRECT CREDENTIALS.
				$sql = "select * from user_log where username = '$username' and password = '$password'";  
	    	$result = mysqli_query($con, $sql);  
	    	$row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
	    	$count = mysqli_num_rows($result);  
			
	  	  if($count){ 
				//Checking if REMEMBER is ticked. 
					if(!empty($_POST['remember']))
					{
						setcookie("login","true",time() + 86400);
						echo "<script>alert('Login Successful!')</script>";
        		echo '<script>window.location.replace("home.php")</script>';
					}
					else{
						echo "<script>alert('Login Successful! But click on REMEMBER ME!')</script>";
        	echo '<script>window.location.replace("login.php")</script>';
					}
    		}  
    		else{  
        	echo '<script>alert("Login failed. Invalid username or password.")</script>';
        	echo '<script>window.location.replace("login.php")</script>';
				}
    	}
    }  
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Log In</title>
	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--JS FILE FOR FUNCTIONS-->
	<script src="../js_files/login.js"></script>
<!--BOOTSTRAP-->
 	<link rel="stylesheet" href="../bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
 	<link rel="stylesheet" href="../bootstrap-4.2.1-dist/js/bootstrap.min.js"/>
 	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
</head>

<body><br><br><br><center>
 	<h1><i>LOG IN HERE</i></h1>
 <!-- FORM tag -->
  <form name="F1" action="login.php" onsubmit="return validate()" method="POST">
   	<table>
   		<tr>
     		<td>
     			<br>Username:
     		</td>
     		<td>
     			<br><input type="text" name="usr"><br>
     		</td>
     	</tr>
   		<tr>
   			<td>
   				<br>Password: 
   			</td>
   			<td>
   				<br><input type="password" id = "pwd" name="pwd"><br>
   			</td>
   		</tr>
			<tr>
				<td colspan="2"><br><center><input type="checkbox" onclick="pw_vis()"> Show Password</center></td>
			</tr>
       <tr>
	     	<td colspan="2">
        	<br><center><input type="checkbox" id="remember" name="remember"> Remember me</center>
        </td>
      </tr>
     	<tr>
   			<td colspan="2">
   				<br><center><input type="submit" value="Login" name='login'></center>
   			</td>
   		</tr>
   	</table>
    <!-- links for change, reset and register forms 
      <br><a href="reset.php">Forgot Password</a>
      <a href="change.php">Change Password</a>-->
    <br><p>Not a user?<a href="registration.php"> Register Here.</a></p>
  </form>
	</center>
</body>
</html>