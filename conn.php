<?php
$host = "localhost";
$user = "root";
$password = "root";
$database = "daisukedb";
$conn = new mysqli($host, $user, $password, $database);
 
	if(!$conn){
		die("Error: Cannot connect to the database");
		echo "Failed";
	}