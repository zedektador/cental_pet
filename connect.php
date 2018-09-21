<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "pet_central";


// create connections
$con = mysqli_connect($servername, $username ,$password,$db);

// check connection
if(!$con){
	die("connection failed: ".mysqli_error());
}
if(!isset($_SESSION)) 
{ 
session_start(); 
}?>


