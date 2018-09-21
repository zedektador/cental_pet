<?php 
	include '../INCLUDES/database-connection.php';

	if (isset($_POST['save_package_offered'])) {
		$event_type =  mysqli_real_escape_string($conn, $_POST["event_name"]);
		$package_name = mysqli_real_escape_string($conn, $_POST["package_name"]);
		$package_price = mysqli_real_escape_string($conn, $_POST["package_price"]);
		$venue = mysqli_real_escape_string($conn, $_POST["venue"]);

		$qry = "INSERT INTO tbl_customer_event (customer_event_type, customer_offered_package, customer_offered_venue, customer_offered_package_price) VALUES ('$event_type' , '$package_name' , '$venue', $package_price')"; // inserting the data into the database
		mysqli_query($conn, $qry);

		header("Location: ../Theme/customer-inquiry.php?success_organizing");
		exit();
	}
	
 ?>