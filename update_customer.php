<?php
include("connect.php");
$user_id = "";
$firstname = "";
$lastname = "";
$email = "";
$password = "";
$mobile = "";
$address = "";
if(isset($_POST["btnupdate"])){
	$firstname=$_POST["firstname"];
	$lastname=$_POST["lastname"];
	$email=$_POST["email"];
	$mobile=$_POST["mobile"];
	$address=$_POST["address"];

	$sql="UPDATE `user_info` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `mobile` = '$mobile', `address` = '$address' WHERE `user_info`.`user_id` = '{$_POST['txtid']}' ";
	$run_query = mysqli_query($con,$sql);
	if ($run_query) {
		header('Refresh:0; order.php');
	} 
}
if(isset($_GET["edited"])){

	$sql = "SELECT * from user_info where user_id='{$_GET['id']}' ";
	$run_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_object($run_query);
	$user_id = $row->user_id;
	$firstname = $row->firstname;
	$lastname = $row->lastname;
	$email = $row->email;
	$mobile = $row->mobile;
	$address = $row->address;
}


?>

<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>G.C.P Aircon Services</title>
	<link rel="shortcut icon" type="image/png" href="images/weblogo.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script><
	<script src="main.js"></script>
</head>
<style>
.row{
	margin-bottom: 10px;
}
</style>
<body>	
<div class="navbar navbar navbar-fixed-top" style="background-color: #505e67;color: white;">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="customer_homepage.php" class="navbar-brand"><img src="images/andrei.png" width="125" height="35" ></a>
				<ul class="navbar-brand" style="padding-top: 20px"></ul>
			</div>
			<button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
				<span><img src="images/menu.png"></span>
			</button>

			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav">
					<li><a href="customer_homepage.php" style="padding-top: 25px;color: white;" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="customer_profile.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Aircons</a></li>
				</ul>
			</div>
		</div>
		</div>
		<p><br></p>
		<p><br></p>
		<p><br></p>


			<div class="container-fluid">
						<div class="row">
						<div class="col-md-2"></div>
									<div class="col-md-8" id="signup_msg">
										<!--Alert from signup form-->
									</div>
										<div class="col-md-2"></div>
								</div>
						<div class="row">
					<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="panel panel-primary">
								<div class="panel-heading" align="center" style="font-weight: bold;">Update Customer Information</div>
								<div class="panel-body">
								<form method="POST">
									<div class="row">
										<div class="col-md-12">
											<label for="firstname">Firstname</label>
											<input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo $firstname; ?>" autofocus>
											<input type="hidden" name="txtid" value="<?php echo $user_id; ?>">
										</div>	
									</div>

									<div class="row">
										<div class="col-md-12">
											<label for="lastname">Lastname</label>
											<input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" class="form-control">
										</div>	
									</div>


									<div class="row">
										<div class="col-md-12">
											<label for="email">Email</label>
											<input type="text" id="email" name="email" value="<?php echo $email; ?>" class="form-control">
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<label for="mobile">Mobile Number</label>
											<input type="text" id="mobile" name="mobile" value="<?php echo $mobile; ?>" class="form-control">
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<label for="address">Address</label>
											<input type="text" id="address" name="address" value="<?php echo $address; ?>" class="form-control" placeholder = "Complete Address">
										</div>
									</div>
									<p><br></p>
									<div class="row">
										<div class="col-md-12">
											<input style="float:right;" type="submit" value="Update" name="btnupdate" class="btn btn-success btn-lg">
											<br>
										<div class="col-md-4"><a href="order.php">Go Back </a></div>
										</div>
									</div>

								</div>
								</form>
								<div class="panel-footer">&copy; 2017</div>
							</div>

					</div>
				</div>
				
			</div>
<div class="panel-footer" style="text-align: center;">
        <p>Copyright &copy GCP Aircon Services</p> 
        </div>
</footer>	
</body>
</html>