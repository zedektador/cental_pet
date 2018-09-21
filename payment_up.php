<?php
include("connect.php");

if(isset($_GET["send"])){

	$sql = "UPDATE `reserve` SET `msg` = 'The total amount ', `customer_order` = '0' WHERE `reserve`.`id` = '{$_GET['id']}'";
	$run_query = mysqli_query($con,$sql);
	if ($run_query) {
		header("Refresh:0; payment.php");

          $message="Successfully Send to Customer";
          echo "<script type='text/javascript'>alert('$message');</script>";
          echo "<script>window.location='payment.php';</script>";
          echo"<script>close()</script>";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

				<?php
								session_start();
								$user_id = $_SESSION["uid"];
								$sql = "SELECT * From events where user_id = $user_id ";
									$run_query = mysqli_query($con,$sql);
										if(mysqli_num_rows($run_query)>0){

									$i=1;
							
								while($row = mysqli_fetch_object($run_query)){

						?>


						<form method="POST">

		<input type="hidden" id="p_name" name="p_name" class="form-control" value="<?php echo $row->p_name; ?>" readonly>


		<input type="hidden" id="qty" name="qty" class="form-control" value="<?php echo $row->qty; ?>" readonly>


		<input type="hidden" id="price" name="price" class="form-control" value="<?php echo $row->price; ?>" readonly>


		<input type="hidden" name="half" class="form-control" value="<?php echo $row->price/2; ?>" readonly>

		</form>

<?php
}
}
?>

</body>
</html>