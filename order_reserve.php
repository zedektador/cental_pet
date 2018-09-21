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
							<div class="panel panel-primary">
								<div class="panel-heading" style="text-align: center;font-weight: bold; background: #00b3b3;" >Reserved Order</div>
								<div class="panel-body">
										<div class="row">
											<div class="col-md-12">
												<form method="POST">
<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST["post"])){

	$id = $_POST['txtid'];
	$name =$_POST['name'];
	$lastname =$_POST['lastname'];
	$mobile =$_POST['mobile'];
	$address =$_POST['address'];
	$p_name =$_POST['p_name'];
	$qty =$_POST['qty'];
	$price =$_POST['price'];
	$start = $_POST["start"];
	$total = $_POST["total"];
	$claim_type = $_POST["claim_type"];

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
						<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Error! Current stock for this item is only $stocks. Please try again!</b>
				</div>";


}else{

$sql1 = "INSERT INTO `reserve` (`id`, `user_id`, `name`, `lastname`, `mobile`, `address`,`total`, `title`, `void`,`msg_stats`,`customer_order`,`p_name`,`qty`,`price`,`start`,`msg`,`type`,`status` ,`claim_type`) VALUES (NULL, '$id', '$name', '$lastname', '$mobile', '$address','$total', 'Pending', '1','1','1','$p_name','$qty','$price','$start','The Price' ,'Ordered Product','1' ,'$claim_type');";
$run = mysqli_query($con,$sql1);

$order = mysqli_insert_id($con);

		foreach ($_POST['p_names'] as $key => $value) {

		$p_name = $_POST['p_names'][$key];
		$price = $_POST['prices'][$key];
		$qty = $_POST['qtys'][$key];

		$sql12 = "INSERT INTO `reserve_tbl` (`id`, `order_id`, `p_name`, `qty`, `price` , `total` ) VALUES (NULL, '$order', '$p_name', '$qty', '$price' , '$total');";
		$run = mysqli_query($con,$sql12);

}


$sq = "INSERT INTO `services_info` (`id`, `user_id`,`order_id`, `name`, `lastname`, `mobile`, `address`, `start`, `p_name`, `qty`, `title`, `status`,`resched`) VALUES (NULL, '$id','$order', '$name', '$lastname', '$mobile', '$address', '$start', '$p_name', '$qty', 'Reserve', '1','1');";

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

$sql="INSERT INTO `events` (`id`, `user_id`, `name`, `lastname`, `mobile`, `address`, `p_name`, `qty`, `price`, `title`, `pends`, `color`, `start`, `void`, `customer_order`, `msg_stats`,`deny_status` ,'total') VALUES (NULL, '$id', '$name', '$lastname', '$mobile', '$address', '$p_name', '$qty', '$price', 'Pending', 'Pending', '#0071c5', '$start', '1', '1', '1','1','$total');";
$run = mysqli_query($con,$sql);



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
							
						<form method="post">
										<div class="row">
										<div class="col-md-6">
											<label for="firstname">First Name</label>
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
									<?php
											$sql = "SELECT * From type";
											$run_query = mysqli_query($con,$sql);
											
											?>

							

							<div class="row">
								<div class="col-md-6">
									<label>Claiming Option</label>
									<select id="claim_type" name="claim_type" class="form-control">
												<option>Select Option</option>
										
											<?php while ($row = mysqli_fetch_object($run_query)): ; ?>

											<option><?php echo $row->name; ?></option>

											<?php endwhile; ?>

											</select>
											</div>
							</div>
									<div class="row">
									<div class="col-md-12">
											<label for="address">Delivery Address (Optional)  :</label>
											<input type="text" name="address" id="address" required="required" placeholder="Delivery Address" class="form-control" >
											
										</div>
									</div>
									
									<div class="row">				
										<div class="col-md-4">
											<label for="Order Detail">Order Date :</label>
											<input type="date" name="start" class="form-control" value="<?php echo date('Y-m-d',strtotime('+ 0 days'))?>" readonly><p><br></p>
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
										<div class="col-md-5">
											<label for="price">Total Amount</label>
											<input type="text" id="total" name="total" class="form-control" value="<?php echo $total_amount; ?>" readonly>
										</div>
									</div>

											<p><br></p>

								<br>

										<div class="row">
											<div class="col-md-12">

												<h3 style="text-align: center;"><b>Terms & Conditions</b></h3>
											</div>
											<div class="col-md-12">
												
												<h5 align="center">
													•	STRICTLY first come first serve for ordered products
												</h5>

												<h5 align="center">
													•	You can contact us in case of cancellation of orders
												</h5>

												<h5 align="center">
												•	For Pick-Up you can contact us when would you pick up your reserved item
												</h5>

												<h5 align="center">
												•	You only have 2 options for the downpayment either Full Payment or Half Payment
												</h5>

												<h5 align="center">
												•	There are NO returns for treats or foods. We always assure that our products is not expired or in bad condition
												</h5>

												<h5 align="center">
													•	If the reserved item is not paid within 3 days pet central will automatically void the ordered product
												</h5>

												<h5 align="center">
													•	In case of refund pet central will contact the customer on how you can claim your refund
												</h5>

												<h5 align="center">
													•	Ordered item will be delivered after 2 days of payment
												</h5>


												<div class="row">
											<div class="col-md-6">
												<input style="float: right;" type="checkbox" name="blag" required="required" > 

											</div>
											</div>
											<h5 align="center">
													I accept and read the terms and conditions of pet central

											<div class="col-md-12">

											</div>
											</div>
										<div class="col-md-12">

			<a href="order.php"><b>Back</b></a>

											
											
											<input style="float:right;" type="submit" value="Submit Orders" name="post" id="post" class="btn btn-success btn-lg">
											<br>
											
											</div>
												</div>
											</form>

											</div>
										</div>
									

								</div>
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

<script>
	$(document).ready(function(){
		 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
	})
</script>