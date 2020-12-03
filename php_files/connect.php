<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$db_name = "ITL";
	//CHANGE THIS DBNAME IF YOU ARE USING ANOTHER DB AND DONT FORGET TO IMPORT IN PHPMYADMIN, THE CREATE.SQL FILE! 

	$con = mysqli_connect($host, $user, $password, $db_name);
	if(!$con){
		echo "unable to connect to database" . mysqli_connect_error();
		exit();
	}
?>