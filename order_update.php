<?php
include("connect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pet Central</title>
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
<div class="navbar navbar navbar-fixed-top" style="background-color: #00b3b3;color: white;>
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="customer_homepage.php" class="navbar-brand"><img src="images/logo.png" width="125" height="35" ></a>
				<ul class="navbar-brand" style="padding-top: 20px"></ul>
			</div>
				<button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
				<span><img src="images/menu.png"></span>
			</button>

			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav">
					<li><a href="customer_homepage.php" style="padding-top: 20px;color: white;" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="customer_profile.php" style="padding-top: 20px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products & Services</a></li>
				</ul>
			</div>
		</div>
		</div>
		<p><br></p>
		<p><br></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-info">
					<div class="panel-heading" align="center" style="text-align: center;font-weight: bold; background: #00b3b3;">Cash On Delivery</div>
					<div class="panel-body">



<?php 

session_start();
	

if(isset($_POST["post"])){

	$id = $_POST['txtid'];
	$name =$_POST['name'];
	$lastname =$_POST['lastname'];
	$mobile =$_POST['mobile'];
	$address1 =$_POST['address1'];
	$address =$_POST['address'];
	$p_name =$_POST['p_name'];
	$qty =$_POST['qty'];
	$price =$_POST['price'];
	$start = $_POST["start"];

//// VERIFICATION

$user_id = $_SESSION["uid"];
$sql = "SELECT * FROM cart WHERE user_id = '$user_id' ";
$query = mysqli_query($con , $sql);

foreach($query as $row){
	$p_id = $row['p_id'];
	$q = mysqli_query($con,"SELECT * FROM products where product_id = $p_id ");
	$r = mysqli_fetch_object($q);
	$stocks = $r->stocks;
	$qty = $row['qty'];

	if($stocks < $qty) {
echo

 "<div class='alert alert-danger'>
						<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Current stock for this item is only $stocks. Please try again!</b>
				</div>";


}else{
	$sql = "INSERT INTO `events` (`id`, `user_id`, `name`, `lastname`, `mobile`, `address1`, `address`, `p_name`, `qty`, `price`, `title`, `color`, `start`, `status`, `void`, `msg`, `void_msg`, `customer_order`, `msg_stats`, `deny_status`) VALUES (NULL, '$id', '$name', '$lastname', '$mobile', '$address1', '$address', '$p_name', '$qty', '$price', 'Cash On Delivery', '#FF0000', '$start', '0', '1', 'msg', 'void_msg', '1', '1', '1');";

$run = mysqli_query($con,$sql);


$sql2 = "INSERT INTO `item` (`item_id`, `user_id`, `name`,`address`,`p_name`,`qty`,`price`, `lastname`, `title`,`start`,`stats`) VALUES (NULL, '$id', '$name','$address','$p_name','$qty','$price', '$lastname', 'C.O.D Pending','$start','1');";
$run = mysqli_query($con,$sql2);

$order = mysqli_insert_id($con);

		foreach ($_POST['p_names'] as $key => $value) {

		$p_name = $_POST['p_names'][$key];
		$price = $_POST['prices'][$key];
		$qty = $_POST['qtys'][$key];
		$total = $_POST['totals'][$key];



		$sql12 = "INSERT INTO `order_tbl` (`id`, `order_id`, `p_name`, `qty`, `price`) VALUES (NULL, '$order', '$p_name', '$qty', '$price');";
		$run = mysqli_query($con,$sql12);
}



$sq = "INSERT INTO `services_info` (`id`, `user_id`,`order_id`, `name`, `lastname`, `mobile`, `address`, `start`, `p_name`, `qty`, `title`, `status`,`resched`) VALUES (NULL, '$id','$order', '$name', '$lastname', '$mobile', '$address', '$start', '$p_name', '$qty', 'C.O.D Pending', '1','1');";

$run = mysqli_query($con,$sq);

$orders = mysqli_insert_id($con);


		foreach ($_POST['p_names'] as $key => $value) {

		$p_name = $_POST['p_names'][$key];
		$price = $_POST['prices'][$key];
		$qty = $_POST['qtys'][$key];
		$total = $_POST['totals'][$key];


$sq1 = "INSERT INTO `services` (`id`, `resched_id`, `p_name`, `qty`, `price`) VALUES (NULL, '$orders', '$p_name', '$qty', '$price');";
		$run = mysqli_query($con,$sq1);
}

//////

$user_id = $_SESSION["uid"];
$sql1 = "UPDATE `user_info` SET `start` = '$start', `p_name` = '$p_name', `qty` = '$qty' WHERE `user_info`.`user_id` = '$user_id';";
$run = mysqli_query($con,$sql1);

	header('Refresh:0;customer_profile.php');

	 $message="Success";
          echo "<script type='text/javascript'>alert('$message');</script>";
          echo "<script>window.location='customer_profile.php';</script>";
          echo"<script>close()</script>";

}

}








		
	
}


?>
	<h3 style="text-align: center;"><b>Customer Information</b></h3>
<?php

								
								$user_id = $_SESSION["uid"];
								$sql = "SELECT * From user_info where user_id = $user_id ";
									$run_query = mysqli_query($con,$sql);
										if(mysqli_num_rows($run_query)>0){

									$i=1;
							
								while($row = mysqli_fetch_object($run_query)){
									$user_id = $row->user_id;
						?>
							
						<form method="POST">
										<div class="row">
										<div class="col-md-6">
											<label for="firstname">Firstname</label> 
											<input type="text" id="name" name="name" class="form-control" value="<?php echo $row->firstname; ?>" readonly>
											<input type="hidden" name="txtid" value="<?php echo $user_id; ?>">
										</div>
									
									
										<div class="col-md-6">
											<label for="lastname">Lastname</label>
											<input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $row->lastname; ?>" readonly>
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
											<input type="text" id="address1" name="address1" class="form-control" value="<?php echo $row->address; ?>" readonly>
										</div>
									</div>
									<div class="row">
									<div class="col-md-12">
											<label for="address">Delivery Address :</label>
											<input type="text" name="address" id="address" required="required" placeholder="Delivery Address" class="form-control" >
											
										</div>
									</div>
									<div class="row">
									
										<div class="col-md-12">
											<label for="Order Detail">Delivery Date :</label>
											<input type="date" name="start" class="form-control" required="required" class="form-control">

											<p><br></p>
										</div>
										</div>





<?php
}
}
?>	
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
						 		
									?>

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
	<div class="col-md-3" ><br>
		<input type="text" name="p_name" class="form-control" value="<?php echo $row->product_title; ?>" readonly="readonly" style="text-align: center;">


<input type="hidden" name="p_names[]" class="form-control" value="<?php echo $row->product_title; ?>" readonly="readonly" style="text-align: center;">


		</div>	

		<div class="col-md-3"><br>
<input type="text" name="price" class="form-control" value="<?php echo $price=$row->price; ?>" readonly="readonly" style="text-align: center;">

<input type="hidden" name="prices[]" class="form-control" value="<?php echo $price=$row->price; ?>" readonly="readonly" style="text-align: center;">
			
		</div>	

		<div class="col-md-2"><br>
<input type="text" name="qty" class="form-control" value="<?php echo $row->qty; ?>" readonly="readonly" style="text-align: center;">
			
<input type="hidden" name="qtys[]" class="form-control" value="<?php echo $row->qty; ?>" readonly="readonly" style="text-align: center;">
			
		</div>
		

		<div class="col-md-3"><br>
<input type="text" name="total" class="form-control" value="<?php echo $total=$row ->total_amount; ?>" readonly="readonly" style="text-align: center;">

<input type="hidden" name="totals[]" class="form-control" value="<?php echo $total=$row ->total_amount; ?>" readonly="readonly" style="text-align: center;">
			<p><br></p>
		</div>	

		
</div>





<?php

}
}
?>								

				
			<div class="row">
				<div class="col-md-8"></div>
				<div class="col-md-3"><br>
					<label for="total">Total Amount</label>
<input type="text" name="qty" class="form-control" value="<?php  echo $total_amount;  ?>" readonly="readonly" style="text-align: center;">
			
			
		</div>
										<div class="col-md-12"><br>

			<a href="order.php" style="margin-left: 30px;"><b>Back</b></a>

											
			
											<input style="margin-left: 580px;" type="submit" value="Submit Orders" name="post" id="post" class="btn btn-success btn-md">
											<br>
											
											</div>
												</div>
</body>
					</div>
					<div class="panel-footer">
									
					</div>
				</div>
			</div>
		</div>
	</div><br><br>
	<footer>
		<div class="panel-footer" style="text-align: center;">
			<p>Copyright &copy Pet Central</p>
		</div>
	</footer>



</html>