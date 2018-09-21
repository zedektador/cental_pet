<?php
include("connect.php");
$user_id = "";
$firstname = "";
$lastname = "";
$email = "";
$mobile = "";
$address = "";
$pet1 ="";
$pet2 ="";
$pet3 ="";
if(isset($_POST["btnupdate1"])){
	$firstname=$_POST["firstname"];
	$lastname=$_POST["lastname"];
	$email=$_POST["email"];
	$mobile=$_POST["mobile"];
	$address=$_POST["address"];
	$pet1=$_POST["pet1"];
	$pet2=$_POST["pet2"];
	$pet3=$_POST["pet3"];
	$payment=$_POST["payment"];

	$sql="UPDATE `membership_tbl` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `mobile` = '$mobile', `address` = '$address' , '$pet1' = 'pet1' , '$pet2' = 'pet2' , '$pet3' = 'pet3' , $payment= 'payment'  WHERE `user_info`.`user_id` = '{$_POST['txtid']}' ";
	$run_query = mysqli_query($con,$sql);
	if ($run_query) {
		header('Refresh:0; membership_pending.php');
	} 
}
if(isset($_GET["edited1"])){

	$sql = "SELECT * from membership_tbl where member_id='{$_GET['id']}' ";
	$run_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_object($run_query);
	$member_id = $row->member_id;
	$firstname = $row->firstname;
	$lastname = $row->lastname;
	$email = $row->email;
	$mobile = $row->mobile;
	$address = $row->address;
	$pet1 = $row->pet1;
	$pet2 = $row->pet2;
	$pet3 = $row->pet3;
	$payment= $row->payment;
}

if(isset($_GET["delete1"])){

	$sql = "DELETE FROM `membership_tbl` WHERE `membership_tbl`.`member_id` = '{$_GET['id']}' ";
	$run_query = mysqli_query($con,$sql);
	if ($run_query) {
		header("Refresh:0; membership_list.php");

		$message="Successfully Deleted!";
          echo "<script type='text/javascript'>alert('$message');</script>";
          echo "<script>window.location='membership_list.php';</script>";
          echo"<script>close()</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>Edit Customer Information</title>
	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
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
	<div class="navbar navbar navbar-fixed-top" style="background-color:#00b3b3;color: white;">
		<div class="container-fluid">
			<div class="navbar-header">
				
				<ul class="navbar-brand" style="padding-top: 20px"></ul>
			</div>
			<button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
				<span><img src="images/menu.png"></span>
			</button>

			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav">
					<li><a href="#" style="color: white;padding-top: 25px;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="admin_profile.php" style="color: white;padding-top: 25px;"><span class="glyphicon glyphicon-modal-window"></span> Products / Services </a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right ">



				 	<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white;padding-top: 25px;"><span class="glyphicon glyphicon-user"></span>Hi Admin</a>
				 		<ul class="dropdown-menu">
				 				<li><a href="add_stock.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-shopping-cart"></span> Add Stocks</a></li>

				 						<li class="divider"></li>

				 				<li><a href="update_stocks.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-bookmark"></span> Update Stocks</a></li>

				 						<li class="divider"></li>

				 				<li><a href="omg/index.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-calendar"></span> Date of Order </a></li>

                    					<li class="divider"></li>

				 				<li><a href="stock_history.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-pencil"></span> Stock History</a></li>

				 						<li class="divider"></li>

				 				<li><a href="customer_list.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-user"></span> Customer List</a></li>

				 						<li class="divider"></li>

				 				
				 				<li><a href="order_history.php" style="text-decoration:none; color:#74ACB3;"><span class="	glyphicon glyphicon-send"></span> Customers Order</a></li>

				 						<li class="divider"></li>

				 				<li><a href="services.php" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-wrench"></span>  Maintenance</a></li>

                                        <li class="divider"></li>

                                <li><a href="resched.php" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-calendar"></span>  Reschedule</a></li>

                                        <li class="divider"></li>

                                <li><a href="payment.php" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-qrcode"></span>  Payment</a></li>

                                        <li class="divider"></li>

                                <li><a href="report.php" style="text-decoration:none; color:#74ACB3;"><span class="  	glyphicon glyphicon-list-alt"></span>  Reports</a></li>

                                        <li class="divider"></li>

                                <li><a href="void_history.php" style="text-decoration:none; color:#74ACB3;"><span class="  	glyphicon glyphicon-time"></span>  Void History</a></li>

                                        <li class="divider"></li>

				 				<li><a href="customer_logout.php" style="text-decoration:none; color:#74ACB3;">Log-Out</a></li>

				 						<li class="divider"></li>

				 		</ul>
				 	</li>
				</ul>
			</div>
		</div>
		</div>
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
								<div class="panel-heading" align="center" style="font-weight: bold; background: #00b3b3;">Update Customer Information</div>
								<div class="panel-body">
								<form method="POST">
									<div class="row">
										<div class="col-md-12">
											<label for="firstname">Firstname</label>
											<input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo $firstname; ?>" readonly>
											<input type="hidden" name="txtid" value="<?php echo $user_id; ?>">
										</div>	
									</div>

									<div class="row">
										<div class="col-md-12">
											<label for="lastname">Lastname</label>
											<input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" class="form-control" readonly>
										</div>	
									</div>


									<div class="row">
										<div class="col-md-12">
											<label for="email">Email</label>
											<input type="text" id="email" name="email" value="<?php echo $email; ?>" class="form-control" readonly>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<label for="mobile">Mobile Number</label>
											<input type="text" id="mobile" name="mobile" value="<?php echo $mobile; ?>" class="form-control" readonly>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<label for="address">Address</label>
											<input type="text" id="address" name="address" value="<?php echo $address; ?>" class="form-control" readonly>
										</div>
									</div>
	

									<div class="row">
										<div class="col-md-12">
											<label for="address">Pet #1</label>
											<input type="text" id="pet1" name="pet1" value="<?php echo $pet1; ?>" class="form-control" readonly>
										</div>
									</div>



									<div class="row">
										<div class="col-md-12">
											<label for="address">Pet #2</label>
											<input type="text" id="pet2" name="pet2" value="<?php echo $pet2; ?>" class="form-control" readonly>
										</div>
									</div>


									<div class="row">
										<div class="col-md-12">
											<label for="address">Pet #3</label>
											<input type="text" id="pet3" name="pet3" value="<?php echo $pet3; ?>" class="form-control" readonly>
										</div>
									</div>


									<div class="row">
										<div class="col-md-12">
											<label for="payment">Payment</label>
											<input type="number" id="payment" name="payment"  value="<?php echo $row->payment ?>" class="form-control">
										</div>
									</div>


									<p><br></p>
									<div class="row">
										<div class="col-md-12">
											<input style="float:right; background-color: #e6f9ff; color: black; font-weight: bold;" type="submit" value="Accept" name="btnupdate1" class="btn btn-success btn-lg">
											<br>
										<div class="col-md-4"><a href="membership_pending.php">Back</a></div>
										</div>
									</div>

								</div>
								</form>
								<div class="panel-footer">&copy; 2018</div>
							</div>

					</div>
				</div>
				
			</div>
			<footer>
				<div class="panel-footer" style="text-align: center;">
					<p>Copyright &copy Pet Central</p>
				</div>
			</footer>
</body>
</html>