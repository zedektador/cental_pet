<?php
include ("connect.php");
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Customer Order</title>
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
<div class="navbar navbar navbar-fixed-top" style="background-color: #00b3b3;color: white;">
		<div class="container-fluid">
			<div class="navbar-header">
				
				<ul class="navbar-brand" style="padding-top: 20px"></ul>
			</div>
			<button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
				<span><img src="images/menu.png"></span>
			</button>

			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav">
					<li><a href="customer_homepage.php" style="padding-top: 20px;color: white;" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="customer_profile.php" style="padding-top: 20px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products / Services</a></li>
				</ul>
			</div>
		</div>
		</div>
		<p><br></p>
		<p><br></p>
		<p><br></p>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-5">
						
						<div class="panel panel-primary">
							<div class="panel-heading" style="text-align: center; background: #00b3b3;">Customer Order</div>
							<div class="panel-body">
								<?php
								if (session_status() == PHP_SESSION_NONE) {
								    session_start();
								}
								$user_id = $_SESSION["uid"];
								$sql = "SELECT * From user_info where user_id = $user_id ";
									$run_query = mysqli_query($con,$sql);
										if(mysqli_num_rows($run_query)>0){

									$i=1;
							
								while($row = mysqli_fetch_object($run_query)){

						?>
							
						
										<div class="col-md-12">
											<label for="firstname">Firstname : </label>
											<?php echo $row->firstname; ?>
										</div>
								

				
										<div class="col-md-12">
											<label for="lastname">Lastname :</label>
											<?php echo $row->lastname; ?>
										</div>
							

					
										<div class="col-md-12">
											<label for="email">Email :</label>
										<?php echo $row->email; ?>
										</div>
								

										<div class="col-md-12">
											<label for="mobile">Contact Number :</label>
											<?php echo $row->mobile; ?> 
										</div>
									

				
										<div class="col-md-12">
											<label for="address">Address :</label>
											<?php echo $row->address; ?>
										</div>



<?php
}
}
?>	
	
	
	<?php

	if(isset($_POST["order"]) && isset($_POST["order_option"])){
		$user_id = $_SESSION["uid"];
		$order = $_POST["order_option"];
		$sql = "UPDATE `user_info` SET `order_option` = '$order' WHERE `user_info`.`user_id` = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		if($run_query){
			header('location: order_update.php');
		}
	}elseif(isset($_POST["order"]) && isset($_POST["order_options"])){
		$order = $_POST["order_options"];
		$sql = "UPDATE `user_info` SET `order_option` = '$order' WHERE `user_info`.`user_id` = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		header('location: order_reserve.php');
	}
		
		
    ?>              
    					<form method="POST">
    					<div class="col-md-12" style="margin-bottom: 10px;">
    						<input type="radio" name="order_options" value="Reserve" >
										<label for="Reserve"> Reserve : </label>
											
											<input type="radio" name="order_option" value="Cash On Delivery" style="margin-bottom: 10px;">
										<label for="Cash On Delivery"> Cash On Delivery :  </label>
										
						</div>	

						<div class="col-md-12">
						
						<input style="float: right; background-color: #e6f9ff; color: black;" type="submit" name="order" id="order" class="btn btn-success btn-md">
										</div>

    					</form>


							</div>
							<div class="panel-footer"><a href="cart.php"><b>Back to Cart Summary</b></a></div>
						</div>
				</div>
						
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2"></div>
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading" style="text-align: center;" >Order Summary</div>
								<div class="panel-body">


<div class="col-md-12">
	<div class="col-md-3"><br>
		<label for="Product Name">Product Name</label><br>
			
		</div>	

		<div class="col-md-3"><br>
			<label for="price">Product Price</label><br>
		
		</div>	

		<div class="col-md-2"><br>
			<label for="qty">Quantity</label><br>
			
			
		</div>
		<div class="col-md-3"><br>
			<label for="total">Total Price</label><br>
	
		</div>	

		
		
</div>
<?php

$user_id = $_SESSION["uid"];
$sql = "SELECT * From cart where user_id = '$user_id' ";
$run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query)>0){


	$i=1;
	while($row = mysqli_fetch_object($run_query)){


	?>

	<form method="POST">
<div class="col-md-12">
	<div class="col-md-3"><br>

			<?php echo $row->product_title; ?>
		</div>	

		<div class="col-md-3"><br>

			<?php echo $price=$row->price; ?>
		</div>	

		<div class="col-md-2"><br>

			<?php echo $row->qty; ?>
			
		</div>
		<div class="col-md-3"><br>

			<?php echo $total=$row ->total_amount; ?><p><br></p>
		</div>	

		
</div>





<?php

}
}
?>								

								</div>
								<div class="panel-footer">
									<b>Total Amount ₱ </b>
									<?php
									$uid = $_SESSION["uid"];
									$sql = "SELECT * From cart WHERE user_id = '$uid' ";
							 		$run_query = mysqli_query($con,$sql);
							 		$count = mysqli_num_rows($run_query);
							 		if($count > 0){
						 			$no = 1;
						 			$total_amount =0;
						 			while($row=mysqli_fetch_array($run_query)){
						 				$qty = $row["qty"];
						 				$pro_price = $row["price"];
						 				$total =$row["total_amount"];

						 				
						 				$price_array = array($total);

						 				$total_sum = array_sum($price_array);
						 				$total_amount = $total_amount + $total_sum;

						 				
						 			}
						 		}
						 		echo $total_amount;
									?>

								</div>
							</div>
						</div>
				</div>
			</div><br><br><br><br><br><br><br><br><br><br>

<footer>
	<div class="panel-footer" style="text-align: center;">
		<p>Copyright &copy Pet Central</p>
	</div>
</footer>
</body>
</html>