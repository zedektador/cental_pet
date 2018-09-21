<?php
include("connect.php");

$tis = $_GET['id'];

if(isset($_GET["titi"])){

	$sql = "SELECT * from staff_comments where id='{$_GET['id']}' ";
	$run_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_object($run_query);
	$id = $row->id;
	$firstname = $row->firstname;
	$lastname = $row->lastname;
	
	$mobile = $row->mobile;
	$request = $row->request;
	$a_name = $row->a_name;
	$pet_color = $row->pet_color;
	$pet_breed = $row->pet_breed;
	$complaint = $row->complaint;
	$start = $row->start;
	$start1 = $row->start1;
	$payment = $row->payment;

}

?>

<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>Service Payment</title>
	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script><
	<script src="main.js"></script>
</head>
<style>
.row{
	margin-bottom: 15px;
}
</style>
<body>	
	<div class="navbar navbar navbar-fixed-top" style="background-color: #00b3b3;color: white;">
		<div class="container-fluid">
			<div class="navbar-header">
				
				<ul class="navbar-brand" style="padding-top: 20px"></ul>
			</div>
				<ul class="nav navbar-nav">
					<li><a href="admin_homepage.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="admin_profile.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products / Services</a></li>
				</ul>

			</div>
		</div>

<p><br></p>
<p><br></p>


			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-7">
						<div class="panel panel-primary">
							<div class="panel-heading" align="center" style="font-weight: bold; background: #00b3b3;">Customer Information</div>
							<div class="panel-body">
								
<?php

	if(isset($_POST['sub'])){
		$start1 = $_POST['start1'];
		$payment = $_POST['payment'];
		$sql ="UPDATE `staff_comments` SET `start1` = '$start1', `payment` ='$payment' WHERE `staff_comments`.`id` = '$tis'";
		$run = mysqli_query($con,$sql);

		$message="Success";
          echo "<script type='text/javascript'>alert('$message');</script>";
          echo "<script>window.location='services.php';</script>";
          echo"<script>close()</script>";
	}

?>


								<form method="POST">
								<div class="row">
									<div class="col-md-6">
										<label>Firstname :  </label>
										<input type="text" name="firstname" class="form-control" value="<?php echo$firstname ; ?>" readonly>
										
									</div>
									<div class="col-md-6">
										<label>Lastname : </label>
										 <input type="text" name="lastname" class="form-control" value="<?php echo$lastname ; ?>" readonly>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<label>Mobile Number :</label>
										<input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>" readonly>
										
									</div>

									


									<div class="col-md-6">
										<label>Pet Name :</label>
										<input type="text" name="a_name" class="form-control" value="<?php echo $a_name; ?>" readonly>
										
									</div>



									<div class="col-md-6">
										<label>Pet Color :</label>
										<input type="text" name="pet_color" class="form-control" value="<?php echo $pet_color; ?>" readonly>
										
									</div>




									<div class="col-md-6">
										<label>Pet Breed :</label>
										<input type="text" name="pet_breed" class="form-control" value="<?php echo $pet_breed; ?>" readonly>
										
									</div>


									<div class="col-md-6">
										<label>Request :</label>
										<input type="text" name="request" class="form-control" value="<?php echo $request; ?>" readonly>
									
									</div>

									<div class="col-md-12">
										<label>Date of Service :</label>
										<input type="date" name="start1" class="form-control" value="<?php echo $start1 ?>" >
										<br>
									</div>

									<div class="col-md-12">
										<label>Customer Payment :</label>
										<input type="number" name="payment" class="form-control" placeholder="Payment" value="<?php echo $payment ?>">
										<br>
									</div>

									<div class="col-md-12">
										
										<input style="float: right; background-color: #e6f9ff; color: black; font-weight: bold;" type="submit" name="sub" class="btn btn-info btn-md" value="Submit" readonly>
									</div>
								</div>
								<div class="panel-footer">
								<a href="services.php">Back</a>
								</div>
								</div>


								</form>
							</div>
						</div>
					</div>
				</div>
			</div><br>
			<footer style="text-align: center;">
	<div class="panel-footer">
        <p>Copyright &copy Pet Central</p> 
        </div>
</footer>		

</body>
</html>