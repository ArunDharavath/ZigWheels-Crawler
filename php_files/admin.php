<?php
	//INCLUDING connect.php for database access.
  include_once('connect.php'); 
  //Checking if cookie is set.
    if(!isset($_COOKIE["login"]))
    {
      header('Location: login.php');
    }
  
//FOR ADMIN ADD USER.
	if(!empty($_POST["username"]) && !empty($_POST["password"]))
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
			echo "<script>alert('Username already exists!')</script>";
		}
  //If no error, then ADMIN can INSERT.
		else
		{
			$query = "INSERT INTO user_log VALUES ('$username','$password','$email')";
			mysqli_query($con, $query);
			echo "<script>alert('Succesful Insertion! Username: $username and Email ID: $email')</script>";
    }
  }
  if(!empty($_POST["usrnm"]))
  {
  //FOR ADMIN DELETING USER.
    $username=$_POST['usrnm'];

    $sql = "SELECT * FROM user_log WHERE username='$username'";
		$res = mysqli_query($con, $sql);
		$count = mysqli_num_rows($res);
  //CHECKS IF USER IS PRESENT IN DB.
    if($count)
		{
			$query = "DELETE FROM user_log WHERE username='$username'";
			mysqli_query($con, $query);
      echo "<script>alert('Succesful Deletion!')</script>";
    }
    else
    {
      echo "<script>alert('USER already deleted')</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!--Starting SESSION for getting login cred from login page to CHECK IF ADMIN OR NOT-->
  <?php
    session_start();
    $usr = $_SESSION['username'];
    $pwd = $_SESSION['password'];    
    
    if($usr != "admin" && $pwd != "password123")
    {
      header('Location: home.php');
    }
    else{
     
    }
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!--BOOTSTRAP--> 
  <link rel="stylesheet" href="../bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../bootstrap-4.2.1-dist/js/bootstrap.min.js"/>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../images/admin.png" type="image/icon"/>
 <!--JS FILE FOR FUNCTIONS--> 
  <script src="../js_files/admin.js"></script>
<!--CSS For necessary styling-->
  <link rel="stylesheet" href="../css_files/admin.css">
  <title>ADMIN PAGE</title>
  <style>
    button
    {
      position: relative;
      margin-top:30px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<h1 class="navbar-brand" >ZigWheels
    <medium class="text-muted">Crawler</medium></center></h1>
  <!--NAVBAR-->
		<a class="nav-link" href="home.php">Home</a>
		<a class="nav-link" href="about.php">About Me</a>
		<a class="nav-link" href="contact.php">Contact Us</a>
    <a class="logout" name="logout" href="logout.php">Logout</a>
	</nav>
  <center>
    <br><img src="../images/admin1.png" alt="admin_img">
    <h4>Click on any of the buttons to make changes in User Table</h4>
    <button type='submit'  class="btn btn-primary" onclick="display()">Show user_log</button>
    <button type='button' class="btn btn-primary" onclick="update()">Add User</button>
    <button type='button' class="btn btn-primary" onclick="del()">Delete User</button>
    <form name="F" method="POST">
      <div id="display" style="display:none;"><br>
        <table id="disp_table">
          <tr class="disp_tr">
            <th class="disp_th">Username</th>
            <th class="disp_th">Password</th>
            <th class=disp_th>Email-ID</th>
          </tr>
        <!-- PHP CODE TO QUERY DATA FROM DB AND TO DISPLAY--> 
          <?php     
            $sql = "SELECT * FROM user_log";
            $result = mysqli_query($con, $sql);
          // LOOP TILL END OF DATA
            while($rows=$result->fetch_assoc()) 
            { 
          ?> 
          <tr class="disp_tr"> 
        <!--FETCHING DATA FROM EACH ROW OF EVERY COLUMN--> 
            <td class="disp_td"><?php echo $rows['Username'];?></td> 
            <td class="disp_td"><?php echo $rows['Password'];?></td> 
            <td class="disp_td"><?php echo $rows['Email_ID'];?></td> 
          </tr> 
          <?php 
             } 
          ?>
        </table>
      </div>
    </form>
  <!--FORM FOR USER INSERTION FUNCTIONALITY-->
    <form name="F1" onsubmit="return validate()" method="POST">
      <div id="update" style="display:none;">
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
	    			  <br><input type="password" id="password" name="password"><br>
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
      		  <td colspan="2">
    	  		  <br><center><input type="submit" value="Add" name='add'></center>
    		    </td>
     		  </tr>
        </table>
      </div>
    </form>
  <!--FORM FOR USER DELETION FUNCTIONALITY-->
    <form name="F2" onsubmit="return validate_del()" method="POST">
    <div id="delete" style="display:none;">
    <table>
    		<tr>
    			<td>
    				<br><label for="username">Username: </label>
    			</td>
    			<td>
    				<br><input type="text" id="usrnm" name="usrnm" /><br>
    			</td>
    			</tr>
          <tr>
    			  <td colspan="2">
    				  <br><center><input type="submit" value="Delete" name='delete'></center>
    			  </td>
     		  </tr>
        </table>
    </div>
    </form>
  </center>
</body>
</html>