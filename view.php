<?php
include("connect.php");
session_start(); 

	if(isset($_POST['resched'])){
$start = $_POST['start'];
$order_id = $_POST['order_id'];
	
		$sql1 = "UPDATE `item` SET `start` = '$start' WHERE `item`.`item_id` = '{$_POST['txtid']}' ";
		$run_query = mysqli_query($con,$sql1);

		$sql1 = "UPDATE `services_info` SET `start` = '$start' WHERE `services_info`.`order_id` = '{$_POST['txtid']}' ";
		$run_query = mysqli_query($con,$sql1);

		$sql1 = "UPDATE `services_info` SET `start` = '$start', `resched` = '0' WHERE `services_info`.`id` = '{$_POST['txtidss']}' ";
		$run_query = mysqli_query($con,$sql1);

		$sql = "UPDATE `resched` SET `start` = '$start' WHERE `resched`.`id` = '{$_POST['txtidss']}' ";
		$run_query = mysqli_query($con,$sql);

		$message="Reschedule Successful";
          echo "<script type='text/javascript'>alert('$message');</script>";
          echo "<script>window.location='resched.php';</script>";
          echo"<script>close()</script>";
			
	}
$tits = $_GET['id'];

if(isset($_GET["edited"])){

	$sql = "SELECT * from resched where id='{$_GET['id']}' ";
	$run_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_object($run_query);
	$product_id = $row->id;
	$user_id = $row->user_id;
	$order_id = $row->order_id;
	$name = $row->name;
	$lastname = $row->lastname;
	$mobile = $row->mobile;
	$address = $row->address;
	$start = $row->start;
}


?>
<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>Adjust Schedule</title>
	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script><
	<script src="main.js"></script>
</head>
<body>	
	<div class="navbar navbar navbar-fixed-top" style="background-color: #00b3b3;color: white;">
		<div class="container-fluid">
			<div class="navbar-header">
				
			</div>
				<ul class="nav navbar-nav">
					<li><a href="#" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="admin_profile.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products / Services</a></li>
				</ul>

			</div>
		</div>


<p><br></p>
<p><br></p>


			<div class="container-fluid">
						<div class="row">
					<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="panel panel-primary">
								<div class="panel-heading" align="center" style="background-color: #00b3b3;" >Customer Information</div>
								<div class="panel-body">
<form method="POST">
									<div class="row">
										<div class="col-md-6">
											<label for="firstname">Fistname</label>
											<input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" readonly>

											<input type="hidden" name="order_id" value="<?php echo$order_id ?>">
											
										</div>
										
									
										<div class="col-md-6">
											<label for="lastname">Lastname</label>
											<input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $lastname; ?>" readonly>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<label for="mobile">Mobile Number</label>
											<input type="text" id="mobile" name="mobile" class="form-control" value="<?php echo $row->mobile; ?>" readonly>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<label for="address">Address</label>
											<input type="text" id="address" name="address" class="form-control" value="<?php echo $address; ?>" readonly>
										</div>
									</div>

									


        		<div class="row">			
    <div class="col-md-12">
    <div class="col-md-6"><br>
        <label for="Product Name">Product Name</label><br>
            
        </div>  
 

        <div class="col-md-6"><br>
            <label for="qty">Quantity</label><br>
            
        
        
        
</div>            
</div>  
</div>
<?php


$sql = "SELECT * From resched_order where res_id = '$tits' ";
$run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query)>0){


    $i=1;
    while($row = mysqli_fetch_object($run_query)){


    ?>

    <form method="POST">
<div class="col-md-12">
    <div class="col-md-6" ><br>
        <input type="text" name="p_name" class="form-control" value="<?php echo $row->p_name; ?>" readonly="readonly" style="text-align: center;">


<input type="hidden" name="p_names[]" class="form-control" value="<?php echo $row->p_name; ?>" readonly="readonly" style="text-align: center;">


        </div>  

        <div class="col-md-6"><br>
<input type="text" name="qty" class="form-control" value="<?php echo $row->qty; ?>" readonly="readonly" style="text-align: center;">
            
<input type="hidden" name="qtys[]" class="form-control" value="<?php echo $row->qty; ?>" readonly="readonly" style="text-align: center;">
            
        </div>
        

        
</div>





<?php

}
}
?> 

						

							<input type="hidden" name="id" value="<?php echo $_SESSION["uid"]; ?>">

							<input type="hidden" name="txtid" value="<?php echo $order_id; ?>">
							<input type="hidden" name="txtidss" value="<?php echo $product_id; ?>">

							<div class="row">				
										<div class="col-md-12">
											<label for="Order Detail">Date of Order :</label>
											<input type="date" name="start" class="form-control" value="<?php echo $start ?>" >

											
										</div>

										<p><br></p>
									</div>
										<br>




									<p><br></p>
									<div class="row">
										<div class="col-md-12">
											<input style="float:right; background-color: #e6f9ff; color: black; font-weight: bold;" type="submit" name="resched" class="btn btn-success btn-md">
											<br>
										<div class="col-md-4"><a href="resched.php">Back</a></div>
										</div>
									</div>
							</form>
								</div>
								
							<div class="panel-footer">&copy; 2018</div>
							</div>

					</div>
				</div>
				
			</div>
			<footer style="text-align: center;">
	<div class="panel-footer">
        <p>Copyright &copy Pet Central</p> 
        </div>
</footer>		

</body>
</html>		