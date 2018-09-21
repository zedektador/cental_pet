<?php 
	include '../INCLUDES/database-connection.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>qwe</title>
</head>
<body>
	<form action="qwe-insert.php" method="POST">
		Personal Information <br>
			Firstname: <input type="text" name="fname" placeholder="Enter Firstname"><br>
			Lastname: <input type="text" name="lname" placeholder="Enter Lastname"><br>
			Email Address: <input type="text" name="email" placeholder="Enter Email Address"><br>
			Mobile No.: <input type="text" name="mobile_no" placeholder="Enter Mobile No.">
			
			<br>
			<br>

			Event Information <br>
			Type of Event: 
			<select name="type_event">
			<?php 
			$res1 = mysqli_query($conn,"SELECT * FROM admin_offered_events ORDER BY event_name ASC");
			while ($row1 = mysqli_fetch_array($res1))
			{
			 ?>

				
				 <option > <?php echo $row1['event_name'];?> </option>
				 
			<?php 
				}
			 ?>
			</select>
			
			<br>
			Type of Venue Ownership: <br> <!-- kapag si offered venue ang na click di na pwede mag lagay sa sa field na own venue -->

			<input type="radio" name="venue" value="Offered Venue"> 
			Offered Venue: 
			
			<select name="address">
			<?php 
			$res2 = mysqli_query($conn,"SELECT * FROM admin_offered_venue ORDER BY venue_name ASC");
			while ($row2 = mysqli_fetch_array($res2))
			{
			 ?>

				
				 <option > <?php echo $row2['venue_name']; ?> </option>
				 
			<?php 
				}
			 ?>
			</select>
		<br>

			Number of Invited Guests: <input type="number" name="guest"> <br>
			Theme of Event: <input type="text" name="theme"> <br>

			Type of Venue: <input type="radio" name="venuetype" value="Indoor">Indoor

			<input type="radio" name="venuetype" value="Outdoor">Outdoor
			<br>
			Schedule of Event <input type="time" name="time"> <br>

			<select name="package">
			<?php 
			$res2 = mysqli_query($conn,"SELECT * FROM admin_offered_package ORDER BY package_name ASC");
			while ($row2 = mysqli_fetch_array($res2))
			{
			 ?>

				
				 <option > <?php echo $row2['package_name']; ?> </option>
				 
			<?php 
				}
			 ?>
			</select>
			<br>
		


			<input type="submit" name="submit" value="SUBMIT">
	</form>

</body>
</html>