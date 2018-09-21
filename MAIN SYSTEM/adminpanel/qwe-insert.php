<?php 
	include '../INCLUDES/database-connection.php';

	if (isset($_POST['submit'])) {
		$firstname = mysqli_real_escape_string($conn, $_POST['fname']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$mobile = mysqli_real_escape_string($conn, $_POST['mobile_no']);
		$event = mysqli_real_escape_string($conn, $_POST['type_event']);
		$venueship = mysqli_real_escape_string($conn, $_POST['venue']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);
		$number_guest = mysqli_real_escape_string($conn, $_POST['guest']);
		$theme_event = mysqli_real_escape_string($conn, $_POST['theme']);
		$type_venue = mysqli_real_escape_string($conn, $_POST['venuetype']);
		$sched = mysqli_real_escape_string($conn, $_POST['time']);
		$package = mysqli_real_escape_string($conn, $_POST['package']);


		$insert = "INSERT INTO qwe (qwe_name, qwe_lname, qwe_email, qwe_mobile, qwe_event, qwe_venue, qwe_address, qwe_number_guests, qwe_theme_event, qwe_type_venue, qwe_sched_event, qwe_package) VALUES ('$firstname', '$lastname', '$email', '$mobile', '$event', '$venueship', '$address', '$number_guest', '$theme_event', '$type_venue', '$sched', '$package')";
		mysqli_query($conn, $insert);
	}
 ?>

