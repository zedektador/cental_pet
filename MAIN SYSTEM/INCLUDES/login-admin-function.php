<?php 

session_start();


	if (isset($_POST['login-admin-submit'])) {
		include 'database-connection.php';

		$username = mysqli_real_escape_string($conn, $_POST['admin_username']);
		$password = mysqli_real_escape_string($conn, $_POST['admin_password']);

		//error handlers
		//check if inputs are empty

		if (empty($username) || empty($password)) {
				header("Location: ../Theme/login-admin.php?information_required");
				exit();
		} 
		else {
			$check = "SELECT * FROM tbl_admin_user WHERE admin_username = '$username'";
			 $result = mysqli_query($conn, $check);
			$resultcheck = mysqli_num_rows($result);
			if ($resultcheck < 1) {
				header("Location: ../Theme/login-admin.php?login=wrongusername");
				exit();
			} else {
				if ($row = mysqli_fetch_assoc($result)) {
					//dehashing the password
					$hashedPwdCheck = $row['admin_password'];
					if ($hashedPwdCheck == false) {
						header("Location: ../Theme/login-admin.php?login=wrongpassword");
						exit();
					} elseif ($hashedPwdCheck == true) {
						//log in the user here
						$_SESSION['admin_username'] = $row['admin_username'];
						$_SESSION['admin_email'] = $row['admin_email'];
						$_SESSION['admin_password'] = $row['admin_password'];
						$_SESSION['admin_number'] = $row['admin_contact_number'];
						$_SESSION['admin_fname'] = $row['admin_full_name'];
						$_SESSION['admin_address'] = $row['admin_address'];
						$_SESSION['admin_company_name'] = $row['admin_company_name'];
						$_SESSION['admin_picture'] = $row['admin_picture'];


						header("Location: ../Theme/admin-details.php?login=success");
						exit();
		
				}
			}
		}
	}
}
	
