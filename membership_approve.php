<?php
session_start();
  if(isset( $_GET['id']) )
  {
   
    $_SESSION['id']=$_GET['id'];
  
  }
	$product_id = "";

include("connect.php");



	if(isset($_POST['app'])){
		$id = $_POST['addid'];
		$firstname =$_POST['firstname'];
		$lastname =$_POST['lastname'];
		$mobile =$_POST['mobile'];
		$address =$_POST['address'];
		$p_name =$_POST['p_name'];
		$qty =$_POST['qty'];
		$price =$_POST['price'];
		$start = $_POST["start"];	
		$payment = $_POST["payment"];

        foreach ($_POST['p_names'] as $key => $value) {

    $p_name = $_POST['p_names'][$key];
    $price = $_POST['prices'][$key];
    $qty = $_POST['qtys'][$key];



$sq1 = "INSERT INTO `membership_tbl` (`id`, `firstname`, `lastname`, `address`, `p_name`, `price`, `qty`, `payment`, `title`) VALUES (NULL, '$firstname', '$lastname', '$address', '$p_name', '$price', '$qty', '$payment', 'Reserve');";
    $run = mysqli_query($con,$sq1);
}
              
        $sql = "DELETE FROM `membership_tbl` WHERE `reserve`.`user_id` = '{$_POST['txtid']}' ";
        			$run_query = mysqli_query($con,$sql);



        $sql = "DELETE FROM `membership_tbl` WHERE `events`.`user_id` = '{$_POST['txtid']}' ";
              $run_query = mysqli_query($con,$sql);

        $sql2 = "INSERT INTO `membership_tbl` (`item_id`, `user_id`, `firstname`,`address`, `lastname`, `title`,`start`,`payment`, `p_name`, `qty`, `price`) VALUES (NULL, '$id', '$firstname','$address', '$lastname', 'Reserve','$start','$payment', '$p_name', '$qty', '$price');";
$run = mysqli_query($con,$sql2);

$order = mysqli_insert_id($con);

              		foreach ($_POST['p_names'] as $key => $value) {

		$p_name = $_POST['p_names'][$key];
		$price = $_POST['prices'][$key];
		$qty = $_POST['qtys'][$key];


$sql12 = "INSERT INTO `firstname` (`id`, `order_id`, `p_name`, `qty`, `price`) VALUES (NULL, '$order', '$p_name', '$qty', '$price');";
		$run = mysqli_query($con,$sql12);

}



       

          $message="Approved!";
          echo "<script type='text/javascript'>alert('$message');</script>";
          echo "<script>window.location='payment.php';</script>";
          echo"<script>close()</script>";
	}
	

$titi = $_GET['id'];

if(isset($_GET["edited"])){

	$sql = "SELECT * from membership_tbl where id='{$_GET['id']}' ";
	$run_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_object($run_query);
	$product_id = $row->id;
	$user_id = $row->user_id;
	$firstname = $row->firstname;
	$lastname = $row->lastname;
	$mobile = $row->mobile;
	$address = $row->address;
	$p_name = $row->p_name;
	$price = $row->price;
	$qty = $row->qty;
	$payment = $row->payment;
	$title = $row->title;
	$start = $row->start;

}


?>

<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>Customer Payment</title>
	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="animate.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="main.js"></script>
</head>
<body>	
	<div class="navbar navbar-fixed-top" style="background-color: #00b3b3;color: white;">
		<div class="container-fluid">
			<div class="navbar-header">
				
				<ul class="navbar-brand" style="padding-top: 25px"></ul>
			</div>
			<button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
				<span><img src="images/menu.png"></span>
			</button>

			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav">
					<li><a href="#" style="color: white;"><span class="glyphicon glyphicon-home" style="color: white;padding-top: 8px;"></span> Home</a></li>
					<li><a href="admin_profile.php" style="color: white;"><span class="glyphicon glyphicon-modal-window" style="color: white;padding-top: 8px;"></span> Products / Services</a></li>
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
								<div class="panel-heading" align="center" style="font-weight: bold; background: #00b3b3;">Customer Information</div>
								<div class="panel-body">
<form method="POST">
									<div class="row">
										<div class="col-md-6" style="margin-bottom: 20px;">
											<label for="firstname">Firstname</label>
											<input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo $firstname; ?>" readonly>

											
										</div>
										
									
										<div class="col-md-6">
											<label for="lastname">Lastname</label>
											<input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $lastname; ?>" readonly>
										</div>
									</div>



										<div class="col-md-6">
											<label for="lastname">Email</label>
											<input type="text" id="email" name="email" class="form-control" value="<?php echo $email; ?>" readonly>
										</div>
									</div>


									<div class="row">
										<div class="col-md-12" style="margin-bottom: 20px;">
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
											<label for="a_name">Pet #1</label>
											<input type="text" id="a_name" name="a_name" class="form-control" value="<?php echo $a_name; ?>" readonly>
										</div>
									</div>



									<div class="row">
										<div class="col-md-12">
											<label for="a_name1">Pet Name #4</label>
											<input type="text" id="a_name1" name="a_name1" class="form-control" value="<?php echo $a_name1; ?>" readonly>
										</div>
									</div>



									<div class="row">
										<div class="col-md-12">
											<label for="a_name2">Pet Name #3</label>
											<input type="text" id="a_name2" name="a_name2" class="form-control" value="<?php echo $a_name2; ?>" readonly>
										</div>
									</div>
            

            						<div class="row">
										<div class="col-md-12">
											<label for="start">Date of Application</label>
											<input type="date" id="start" name="start" class="form-control" value="<?php echo $start; ?>" readonly>
										</div>
									</div>
        
        
        
</div>            
</div>  
</div>


}
}


								<div class="row">
										<div class="col-md-12">
											<label for="payment" style="margin-left: 360px">Customer Payment</label>
											<input style="text-align: center;" type="number" id="payment" name="payment" class="form-control" placeholder="Payment" required="required" value="<?php echo $payment; ?>" >
										</div>
									</div>





									<p><br></p>
									<div class="row">
										<div class="col-md-12">
											<input style="float:right; background-color: #e6f9ff; color: black; font-weight: bold;" type="submit" value="Approve" name="app" class="btn btn-success btn-md">
											<br>
										<div class="col-md-4"><a href="membership_pending.php">Back</a></div>
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