<?php 
	
	// end all access inside the website 

	if (isset($_POST['logout'])) {
		session_start();
		session_unset();
		session_destroy();
		header("Location: ../Theme/index.php");
		exit();
	}
 ?>