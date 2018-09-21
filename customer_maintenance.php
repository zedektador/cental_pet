<?php
include("connect.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>Service</title>
	 <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script><
	<script src="main.js"></script>
</head>
<body>	
<div class="navbar navbar navbar-fixed-top" style="background-color:#00b3b3;color: white;">
		<div class="container-fluid">
			<div class="navbar-header">
				
				<ul class="navbar-brand" style="padding-top: 25px"></ul>
			</div>
			 <button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
        <span><img src="images/menu.png"></span>
      </button>

      <div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav">
					<li><a href="customer_homepage.php" style="padding-top: 25px;color: white;" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="index.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>	
					<li><a href="service_list.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Services</a></li>	
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
				<div class="col-md-8">
					<div class="panel panel-info">
						<div class="panel-heading" align="center" style="font-weight: bold;  background-color: #00b3b3; color: white">Maintenance</div>
						<div class="panel-body">
							<?php 

if(isset($_POST["btns"])){
	$u_id = $_POST['id'];
	$name = $_POST["name"];
	$lastname = $_POST["lastname"];
	$mobile = $_POST["mobile"];
	$request = $_POST["request"];
	$a_name = $_POST["a_name"];
	$pet_color = $_POST["pet_color"];
	$pet_breed = $_POST["pet_breed"];
	$start = $_POST["start"];
	$acct_num = $_POST["acct_num"];
	$payment = $_POST["payment"];
	$payment_method = $_POST["payment_method"];
	$complaint = $_POST["complaint"];

	$sql = "INSERT INTO `staff_comments` (`id`, `firstname`, `lastname`, `mobile`,  `request`, `a_name`, `pet_color`, `pet_breed`, `start`,   `complaint`,`payment`, `payment_method`,`acct_num` ) VALUES (NULL, '$name', '$lastname', '$mobile',  '$request', '$a_name', '$pet_color', '$pet_breed', '$start', '$complaint','$payment', '$payment_method','$acct_num');";
	$run_query = mysqli_query($con,$sql);

$sql1 = "INSERT INTO `payment_history` (`id`, `name`, `lastname`, `payment`, `payment_date`, `payment_type`) VALUES (NULL, '$name', '$lastname', '$payment', '$start', 'Services');";
  $r = mysqli_query($con,$sql1);

	if($run_query){
		header('Refresh:0; service_list.php');
		$message="Success";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo"<script>close()</script>"; 
	}

}

?>

							<?php 
								$user_id = $_SESSION["uid"];
								$sql = "SELECT * FROM user_info where user_id = $user_id  ";
								$run = mysqli_query($con,$sql);
								$row = mysqli_fetch_object($run);

								?>

							<h3 align="center" style="font-weight: bold;">Services</h3><br>

							<form method="POST">


								<input type="hidden" name="id" value="<?php echo $_SESSION["uid"]; ?>">

							<div class="row">
								<div class="col-md-6" style="padding-bottom: 10px;">
									<label>First Name</label>
									<input type="text" name="name" class="form-control" value="<?php echo $row->firstname ?>" readonly>
								</div>
								<div class="col-md-6" style="padding-bottom: 10px;">
									<label>Last Name</label>
									<input type="text" name="lastname" class="form-control" value="<?php echo $row->lastname ?>" readonly>
								</div>
							</div>

							<div class="row" style="padding-bottom: 10px;">
								<div class="col-md-12">
									<label>Contact Number</label>
									<input type="text" name="mobile" class="form-control" value="<?php echo $row->mobile ?>" readonly>
								</div>
							</div>
							<?php	
									$sql = "SELECT * From payment";
                      $run_query = mysqli_query($con,$sql);
                      
                      ?>
									<div class="row">
										<div class="col-md-12">
											<label for="payment_method">Payment Courier</label>
											
										</div>
									</div>
									<select id="payment_method" name="payment_method" class="form-control">
                                    <option>Select Courier</option>
                                
                                  <?php while ($row = mysqli_fetch_object($run_query)): ; ?>

                                  <option><?php echo $row->name; ?></option>

                                  <?php endwhile; ?>

                                  </select>
							<div class="row">
										<div class="col-md-12">
											<label for="acct_num">Reference Number</label>
											<input type="number" id="acct_num" name="acct_num" class="form-control">
										</div>
								</div>	

							<div class="row">
								<div class="col-md-12" style="padding-bottom: 10px;">
									<label>Pet Name</label>
									<input type="text" name="a_name" class="form-control" placeholder="Pet Name">
								</div>
							</div>


							<div class="row">
								<div class="col-md-12" style="padding-bottom: 10px;">
									<label>Pet Color</label>
									<input type="text" name="pet_color" class="form-control" placeholder="Optional">
								</div>
							</div>



							<div class="row">
								<div class="col-md-12" style="padding-bottom: 10px;">
									<label>Pet Breed</label>
									<input type="text" name="pet_breed" class="form-control" placeholder="Optional">
								</div>
							</div>

							<?php
											$sql = "SELECT * From gender";
											$run_query = mysqli_query($con,$sql);
											
											?>

							

							<div class="row">
								<div class="col-md-6">
									<label>Gender</label>
									<select id="complaint" name="complaint" class="form-control">
												<option>Select Gender</option>
										
											<?php while ($row = mysqli_fetch_object($run_query)): ; ?>

											<option><?php echo $row->gender; ?></option>

											<?php endwhile; ?>

											</select>
											</div>
							</div>

							<div class="row">
								<div class="col-md-12" style="padding-bottom: 10px;">
									<label>Preferred Date of Service</label>
									<input type="date" name="start" class="form-control">
								</div>
							</div>
							<div class="row">
										<div class="col-md-12">
											<label for="payment">Required Downpayment</label>
											<input value="100" type="number" id="payment" name="payment" class="form-control" readonly="">
										</div>
								</div>	
							
							<!--<div class="row">
								<div class="col-md-12" style="padding-bottom: 10px;">
									<label>Complaints</label>
									<input type="text" name="complaint" class="form-control" placeholder="Complaints">
								</div>
							</div>-->
							<?php
											$sql = "SELECT * From pet_services WHERE service_status = 'Available'";
											$run_query = mysqli_query($con,$sql);
											
											?>

							

							<div class="row">
								<div class="col-md-6">
									<label>Service</label>
									<select id="request" name="request" class="form-control">
												<option>Select Service</option>
										
											<?php while ($row = mysqli_fetch_object($run_query)): ; ?>

											<option><?php echo $row->serv_name; ?></option>

											<?php endwhile; ?>

											</select>
								</div>
							</div><br>

							<input style="float: right; background-color: #e6f9ff; color: black; font-weight: bold;" type="submit" name="btns" class="btn btn-primary btn-md">
							<div class="col-md-4"><a href="service_list.php">Back</a></div>
							</form>
						</div>
						<div class="panel-footer"></div>
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