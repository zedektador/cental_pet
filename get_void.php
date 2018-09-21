<?php
session_start();
  if(isset( $_GET['id']) )
  {
   
    $_SESSION['id']=$_GET['id'];
  
  }
	$product_id = "";

include("connect.php");

$titi = $_GET['id'];

	if(isset($_POST['app'])){
		$product_id = $_SESSION['id'];
		$id = $_POST['txtid'];
		$name =$_POST['name'];
		$lastname =$_POST['lastname'];
		$mobile =$_POST['mobile'];
		$address =$_POST['address'];
		$p_name =$_POST['p_name'];
		$qty =$_POST['qty'];
		$price =$_POST['price'];
		$start = $_POST["start"];	

		
				$sql = "DELETE FROM `reserve` WHERE `reserve`.`user_id` = '{$_POST['txtid']}' ";
              $run_query = mysqli_query($con,$sql);
              $sql = "DELETE FROM `cart` WHERE `cart`.`user_id` = '{$_POST['txtid']}' ";
              $run_query = mysqli_query($con,$sql);

              $sql = "DELETE FROM `events` WHERE `events`.`user_id` = '{$_POST['txtid']}' ";
              $run_query = mysqli_query($con,$sql);

              $sql = "DELETE FROM `order_tbl` WHERE `order_tbl`.`order_id` = '$titi' ";
              $run_query = mysqli_query($con,$sql);
              
            foreach ($_POST['p_names'] as $key => $value) {

		$p_name = $_POST['p_names'][$key];
		$price = $_POST['prices'][$key];
		$qty = $_POST['qtys'][$key];


         $sql2 = "INSERT INTO `void` (`id`, `user_id`, `name`, `lastname`, `mobile`, `address`, `p_name`, `qty`, `price`, `title`, `start`) VALUES (NULL, '$id', '$name', '$lastname', '$mobile', '$address', '$p_name', '$qty', '$price', 'Void', '$start')";
		$run = mysqli_query($con,$sql2);

}



          $message="Order Denied";
          echo "<script type='text/javascript'>alert('$message');</script>";
          echo "<script>window.location='payment.php';</script>";
          echo"<script>close()</script>";
	}
	
$titi = $_GET['id'];

if(isset($_GET["edited"])){

	$sql = "SELECT * from reserve where id='{$_GET['id']}' ";
	$run_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_object($run_query);
	$product_id = $row->id;
	$user_id = $row->user_id;
	$name = $row->name;
	$lastname = $row->lastname;
	$mobile = $row->mobile;
	$address = $row->address;
	$p_name = $row->p_name;
	$price = $row->price;
	$qty = $row->qty;
	$title = $row->title;
	$start = $row->start;

}


?>
<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>Deny Orders</title>
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
					<li><a href="#" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="admin_profile.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products / Services </a></li>
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
								<div class="panel-heading" align="center" style="font-weight: bold; background: #00b3b3">Customer Information</div>
								<div class="panel-body">
<form method="POST">
									<div class="row">
										<div class="col-md-6">
											<label for="firstname">Fistname</label>
											<input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" readonly>

											
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
    <div class="col-md-4"><br>
        <label for="Product Name">Product Name</label><br>
            
        </div>  

        <div class="col-md-4"><br>
            <label for="price">Product Price</label><br>
        
        </div>  

        <div class="col-md-4"><br>
            <label for="qty">Quantity</label><br>
            
        
        
        
</div>            
</div>  
</div>
<?php


$sql = "SELECT * From reserve_tbl where order_id = '$titi' ";
$run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query)>0){


    $i=1;
    while($row = mysqli_fetch_object($run_query)){


    ?>

    <form method="POST">
<div class="col-md-12">
    <div class="col-md-4" ><br>
        <input type="text" name="p_name" class="form-control" value="<?php echo $row->p_name; ?>" readonly="readonly" style="text-align: center;">


<input type="hidden" name="p_names[]" class="form-control" value="<?php echo $row->p_name; ?>" readonly="readonly" style="text-align: center;">


        </div>  

        <div class="col-md-4"><br>
<input type="text" name="price" class="form-control" value="<?php echo $price=$row->price; ?>" readonly="readonly" style="text-align: center;">

<input type="hidden" name="prices[]" class="form-control" value="<?php echo $price=$row->price; ?>" readonly="readonly" style="text-align: center;">
            
        </div>  

        <div class="col-md-4"><br>
<input type="text" name="qty" class="form-control" value="<?php echo $row->qty; ?>" readonly="readonly" style="text-align: center;">
            
<input type="hidden" name="qtys[]" class="form-control" value="<?php echo $row->qty; ?>" readonly="readonly" style="text-align: center;">
            
        </div>
        

        
</div>





<?php

}
}
?> 

						

							<input type="hidden" name="id" value="<?php echo $_SESSION["uid"]+1; ?>">

							<input type="hidden" name="txtid" value="<?php echo $user_id; ?>">

									<div class="row">				
										<div class="col-md-4">
											<label for="Order Detail">Order Date :</label>
											<input type="date" name="start" class="form-control" value="<?php echo date('Y-m-d',strtotime('+ 0 days'))?>" readonly><p><br></p>
										</div>
									</div>

										<br>




									<p><br></p>
									<div class="row">
										<div class="col-md-12">
											<input style="float:right; background-color: #e6f9ff; color: black; font-weight: bold;" type="submit" value="Delete" name="app" class="btn btn-success btn-md">
											<br>
										<div class="col-md-4"><a href="payment.php">Go Back</a></div>
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