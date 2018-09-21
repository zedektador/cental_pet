<?php
// Database configuration
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "maindb";




//create database connection
$dbcon = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);


// check connection
if ($dbcon->connect_error) {
	die("Connection failed:" . $dbcon->connect_error);
}
?>