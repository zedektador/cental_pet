<?php
include("connect.php");

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["password"];
$repassword = $_POST["repassword"];
$mobile = $_POST["mobile"];
$address = $_POST["address"];
$emailvalidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";

	if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($repassword) || empty($mobile) || empty($address)){

		echo "
			<div class='alert alert-warning'>
			<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Fill all Fields</b>
			</div>

		";
		exit();
	} else {
		if(!preg_match($emailvalidation, $email)){
		echo "
			<div class='alert alert-warning'>
			<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>This $email is not Valid</b>
			</div>

		";
		exit();
	}
	if(strlen($password) < 9){
		echo "
			<div class='alert alert-warning'>
			<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Password is to weak</b>
			</div>

		";
		exit();
	}
	if(strlen($repassword) < 9){
		echo "
			<div class='alert alert-warning'>
			<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Password is to weak</b>
			</div>

		";
		exit();
	}
	if($password != $repassword){
		echo "
			<div class='alert alert-warning'>
			<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Password is not same</b>
			</div>

		";
	}

	if(!preg_match($number, $mobile)){
		echo "
			<div class='alert alert-warning'>
			<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Mobile Number $mobile is not valid</b>
			</div>

		";
		exit();
	}
	if(!(strlen($mobile) ==11)){
		echo "
			<div class='alert alert-warning'>
			<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Mobile Number must 11 digit</b>
			</div>

		";
		exit();
	}
	//exisiting email kung meron na sa db
	$sql = "SELECT user_id From user_info WHERE email = '$email' LIMIT 1 "; 
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0 ){
		echo "
			<div class='alert alert-danger'>
			<a href='#' classx = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Email Address is already available.  Try Another Email Address</b>
			</div>

		";
		exit();
	}else {
		$password = md5($password);
		$sql = "INSERT INTO `user_info` (`user_id`, `firstname`, `lastname`, `email`, `password`, `mobile`, `address`) VALUES (NULL, '$firstname', '$lastname', '$email', '$password', '$mobile', '$address')";
		$run_query = mysqli_query($con,$sql);
		if($run_query){			
			echo "
			<div class='alert alert-success'>
			<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>You are Registered successfully You may now Login to the Page</b>
			</div>

		";

			header('Refresh:0; customer_registratioin.php');
		}
	}
	} 


	
?>