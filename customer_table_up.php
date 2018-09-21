<?php
include("connect.php");
session_start();
  if(isset( $_GET['id']) )
  {
   
    $_SESSION['id']=$_GET['id'];
  
  }
	$product_id = "";


if(isset($_POST["btns"])){
  $id = $_POST['id'];
  $order_id = $_POST['order_id'];
  	$name = $_POST["name"];
  	$lastname = $_POST["lastname"];
	$mobile = $_POST["mobile"];
	$address = $_POST["address"];
	$sched = $_POST["sched"];
	$p_name = $_POST["p_name"];
	$qty = $_POST["qty"];
	$start = $_POST["start"];


	
  $sql1 = "INSERT INTO `resched` (`id`, `user_id`,`order_id`, `name`, `lastname`, `mobile`, `address`, `sched`, `p_name`, `qty`, `status`,`start`) VALUES (NULL, '$id','$order_id', '$name', '$lastname', '$mobile', '$address', '$sched', '$p_name', '$qty', '0','$start');";
	$run_query1 = mysqli_query($con,$sql1);	

	$order = mysqli_insert_id($con);

  	              		foreach ($_POST['p_names'] as $key => $value) {

		$p_name = $_POST['p_names'][$key];
		$qty = $_POST['qtys'][$key];

	
$sql12 = "INSERT INTO `resched_order` (`id`, `res_id`, `p_name`, `qty`) VALUES (NULL, '$order', '$p_name', '$qty');";

		$run = mysqli_query($con,$sql12);
}

  		$message="Successful";
          echo "<script type='text/javascript'>alert('$message');</script>";
          echo "<script>window.location='customer_table.php';</script>";
          echo"<script>close()</script>";


}

$titi = $_GET['id'];

if(isset($_GET["titi"])){

	$sql = "SELECT * from services_info where id='{$_GET['id']}' ";
	$run_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_object($run_query);
	$product_id = $row->id;
	$user_id = $row->user_id;
	$order_id = $row->order_id;
	$name = $row->name;
	$lastname = $row->lastname;
	$mobile = $row->mobile;
	$address = $row->address;
	$p_name = $row->p_name;
	$qty = $row->qty;
	$title = $row->title;
	$start = $row->start;

}

?>
<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>Customer Reschedule</title>
	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</head>
<style>
.row{
	padding-bottom: 10px;
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
					<li><a href="customer_homepage.php" style="padding-top: 25px;color: white;" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="index.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products / Services</a></li>	
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
							<div class="panel panel-primary">
								<div class="panel-heading" align="center"  style="background-color: #00b3b3";>Customer Information</div>
								<div class="panel-body">

				<form method="POST">
									<div class="row">
										<div class="col-md-6">
											<label for="firstname">Fistname</label>
											<input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" readonly>

											<input type="hidden" name="order_id" value="<?php echo $order_id ?>">
											
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
											<label for="address">Date of Order</label>
											<input type="text" id="start" name="start" class="form-control" value="<?php echo $start; ?>" readonly>
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


$sql = "SELECT * From services where resched_id = '$titi' ";
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

							<input type="hidden" name="txtid" value="<?php echo $user_id; ?>">


                <div class="row">
                    <div class="col-md-12">
                      <label for="payment" style="margin-left: 340px">Reason for Rescheduling</label>
                      <input style="text-align: center;" type="text" id="sched" name="sched" class="form-control" placeholder="Reason for Rescheduling" required="required">

                    </div>
                  </div><br>





									<p><br></p>
									<div class="row">
										<div class="col-md-12">
											<input style="float:right; background-color: #e6f9ff; color: black; font-weight: bold;" type="submit" name="btns" class="btn btn-success btn-md">
											<br>
										<div class="col-md-4"><a href="customer_pending.php">Back</a></div>
										</div>
									</div>
							</form>
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

</body>
</html>
