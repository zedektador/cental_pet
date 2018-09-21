<?php 
	session_start();
	error_reporting(0);

	// insert data into database
 
	if (isset($_POST['register-submit'])) {

	include_once ('../INCLUDES/database-connection.php');
	$username = mysqli_real_escape_string($conn, $_POST['customer_username']);
	$email = mysqli_real_escape_string($conn, $_POST['customer_email']);
	$password = mysqli_real_escape_string($conn, $_POST['customer_password']);
	$cnumber = mysqli_real_escape_string($conn, $_POST['customer_contact_number']);
	$firstname = mysqli_real_escape_string($conn, $_POST['customer_fname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['customer_lname']);
	$bday = mysqli_real_escape_string($conn, $_POST['customer_age']);
	$address = mysqli_real_escape_string($conn, $_POST['customer_address']);
	$emailvalid = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[_a-z0-9-]+(\.[a-z]{2,4})$/";


	
	
	//error handlers
	//check for empt fields
	if ((empty($firstname) || empty($lastname) || empty($cnumber) || empty($username) || empty($email) || empty($password) || empty($address) || empty($bday))) {
		header("location: ../Theme/register.php?signup=missing_information");
		exit();
	}
	else {
		//check if input characters are valid
		if (!preg_match("/^[a-zA-Z ]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)) {
		header("location: ../Theme/register.php?signup=invalid");
		session_start();
		exit();

		}else 
		{
			//check if email is valid
			if (!preg_match($emailvalid, $email)) {
				header("location: ../Theme/register.php?signup=invalid_email");
				exit();
			}



			if ($_POST["customer_password"] != $_POST["customer_confirm_password"]) {
			   header("location: ../Theme/register.php?signup=password_not_match");
				exit();
			}

			if(strlen($cnumber) <11) {
				header("location: ../Theme/register.php?signup=invalid_contact_number");
				exit();
				}

			if (strlen($password) <6) {
				header("location: ../Theme/register.php?signup=password_to_weak");
				exit();
			}
			
			{
				$sql1 = "SELECT * FROM tbl_customer_account WHERE customer_username='$username'";
				$resultsql = mysqli_query($conn, $sql1);
				$resultsql1 = mysqli_num_rows($resultsql);

				if ($resultsql1 > 0) {
					header("location: ../Theme/register.php?signup=user_exist");
					exit();
				} else
				{
					//hashing the password
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					//insert user into the database
						$insert = "INSERT INTO tbl_customer_account (customer_username, customer_email, customer_password, customer_contact_number, customer_fname, customer_lname, customer_bday, customer_address) VALUES ('$username', '$email', '$hashedPwd', '$cnumber' , '$firstname', '$lastname', '$bday', '$address')";
							mysqli_query($conn, $insert);
							header("location: ../Theme/login.php?signup=success");
							exit();
					}
				}
			}
		}
	}

 ?>