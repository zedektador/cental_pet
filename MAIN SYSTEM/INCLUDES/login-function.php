<?php 
	


	if (isset($_POST['login-submit'])) {
		include 'database-connection.php';

		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		//error handlers
		//check if inputs are empty

		if (empty($username) || empty($password)) {
				header("Location: ../Theme/login.php?information_required");
				exit();
		} 
		else {
			$check = "SELECT * FROM tbl_customer_account WHERE customer_username = '$username'";
			 $result = mysqli_query($conn, $check);
			$resultcheck = mysqli_num_rows($result);
			if ($resultcheck < 1) {
				header("Location: ../Theme/login.php?login=wrongusername");
				exit();
			} else {
				if ($row = mysqli_fetch_assoc($result)) {
					//dehashing the password
					$hashedPwdCheck = password_verify($password, $row['customer_password']);
					if ($hashedPwdCheck == false) {
						header("Location: ../Theme/login.php?login=wrongpassword");
						exit();
					} elseif ($hashedPwdCheck == true) {
						session_start();
						//log in the user here

						$_SESSION['id'] = $row['id'];
						$_SESSION['username'] = $row['customer_username'];
						$_SESSION['email'] = $row['customer_email'];
						$_SESSION['password'] = $row['customer_password'];
						$_SESSION['number'] = $row['customer_contact_number'];
						$_SESSION['fname'] = $row['customer_fname'];
						$_SESSION['lname'] = $row['customer_lname'];
						$_SESSION['bday'] = $row['customer_bday'];
						$_SESSION['address'] = $row['customer_address'];

						header("Location: ../Theme/customer-inquiry.php?login=success");
						exit();
		
				}
			}
		}
	}
	
}

