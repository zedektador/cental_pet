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
		$name =$_POST['name'];
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



$sq1 = "INSERT INTO `history_order` (`id`, `name`, `lastname`, `address`, `p_name`, `price`, `qty`, `payment`, `title`) VALUES (NULL, '$name', '$lastname', '$address', '$p_name', '$price', '$qty', '$payment', 'Reserve');";
    $run = mysqli_query($con,$sq1);
}
              
        $sql = "DELETE FROM `reserve` WHERE `reserve`.`user_id` = '{$_POST['txtid']}' ";
        			$run_query = mysqli_query($con,$sql);



      //  $sql = "DELETE FROM `events` WHERE `events`.`user_id` = '{$_POST['txtid']}' ";
              //$run_query = mysqli_query($con,$sql);

        $sql2 = "INSERT INTO `item` (`item_id`, `user_id`, `name`,`address`, `lastname`, `title`,`start`,`payment`, `p_name`, `qty`, `price`,`stats`) VALUES (NULL, '$id', '$name','$address', '$lastname', 'Reserve','$start','$payment', '$p_name', '$qty', '$price','1');";
$run = mysqli_query($con,$sql2);

$order = mysqli_insert_id($con);

              		foreach ($_POST['p_names'] as $key => $value) {

		$p_name = $_POST['p_names'][$key];
		$price = $_POST['prices'][$key];
		$qty = $_POST['qtys'][$key];


$sql12 = "INSERT INTO `order_tbl` (`id`, `order_id`, `p_name`, `qty`, `price`) VALUES (NULL, '$order', '$p_name', '$qty', '$price');";
		$run = mysqli_query($con,$sql12);

}

     $user_id = $_SESSION["uid"];
$sql = "SELECT * FROM cart where user_id ='$user_id' ";
$query = mysqli_query($con ,$sql);

foreach($query as $row) {
$p_id = $row['p_id'];
$q = mysqli_query($con,"SELECT * FROM products WHERE product_id =  '$p_id' ");
$r = mysqli_fetch_object($q);
$stocks = $r->stocks;
$qty = $row['qty'];

$final_query = mysqli_query($con,"UPDATE products SET stocks = $stocks - $qty WHERE product_id = $p_id");


          $message="Approved!";
          echo "<script type='text/javascript'>alert('$message');</script>";
          echo "<script>window.location='payment.php';</script>";
          echo"<script>close()</script>";
	}
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
								<div class="panel-heading" align="center" style="font-weight: bold; background: #ccf2ff">Customer Information</div>
								<div class="panel-body">
<form method="POST">
									<div class="row">
										<div class="col-md-6" style="margin-bottom: 20px;">
											<label for="firstname">Firstname</label>
											<input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" readonly>

											
										</div>
										
									
										<div class="col-md-6">
											<label for="lastname">Lastname</label>
											<input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $lastname; ?>" readonly>
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
    <div class="col-md-12" style="margin-bottom: 20px;">
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
<input type="text" name="price" class="form-control" value="<?php echo $row->price; ?>" readonly="readonly" style="text-align: center;">

<input type="hidden" name="prices[]" class="form-control" value="<?php echo $row->price; ?>" readonly="readonly" style="text-align: center;">
            
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
  <?php
          
                  $uid = $_SESSION["uid"];
									$sql = "SELECT * From cart WHERE user_id = '$uid'";
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

                  <div class="row">
                    <div class="col-md-12" style="margin-bottom: 20px;">
                <label>Total Price of Orders</label>
                <input type="number" name="half" value="<?php echo $total_amount ?>" class="form-control" readonly>
              </div>
                  </div>
						

							<input type="hidden" name="id" value="<?php echo $_SESSION["uid"]; ?>">

							<input type="hidden" name="txtid" value="<?php echo $user_id; ?>">

							<input type="hidden" name="addid" value="<?php echo $user_id; ?>">

									<div class="row">				
										<div class="col-md-4">
											<label for="Order Detail">Order Date :</label>
											<input type="date" name="start" class="form-control" value="<?php echo date('Y-m-d',strtotime('+ 0 days'))?>" readonly><p><br></p>
										</div>
									</div>



                <div class="row">
                    <div class="col-md-12">
                      <label>Customer Balance</label>
                      <input type="text" class="form-control" value="<?php echo $total_amount-$payment ?>" readonly>
                    </div>
                  </div>
										<br>

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
										<div class="col-md-4"><a href="payment.php">Back</a></div>
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