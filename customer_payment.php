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
  $payment =$_POST['payment'];
  $acct_num =$_POST['acct_num'];
  $name =$_POST['name'];
  $lastname =$_POST['lastname'];
  $payment_date =$_POST['payment_date'];
  $payment_method =$_POST ['payment_method'];
  $payment_status =$_POST ['payment_status'];


    $sql = "UPDATE events SET  payment = '$payment', title ='Pending' , msg_stats ='0' WHERE user_id ='{$_POST['txtid']}' ";
  $run = mysqli_query($con,$sql);

    $sql = "UPDATE `reserve` SET `acct_num` = '$acct_num', `payment` = '$payment', `payment_method` = '$payment_method', `payment_status` = '$payment_status',  title ='Pending' , msg_stats ='0' WHERE `reserve`.`user_id` = '{$_POST['txtid']}' ";
  $run = mysqli_query($con,$sql);


$sql1 = "INSERT INTO `payment_history` (`id`, `name`, `lastname`, `payment`, `payment_date`, `payment_type`) VALUES (NULL, '$name', '$lastname', '$payment', '$payment_date', 'Order');";
  $r = mysqli_query($con,$sql1);

  header('Refresh:0;customer_profile.php');

            $message="Success";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        echo"<script>close()</script>"; 

}

$titi = $_GET['id'];

if(isset($_GET["titi"])){

	$sql = "SELECT * from reserve where id='{$_GET['id']}' ";
	$run_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_object($run_query);
	$product_id = $row->id;
	$user_id = $row->user_id;
	$name = $row->name;
	$lastname = $row->lastname;
	$acct_num = $row->acct_num;
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
	<title>Pet Central</title>
	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script><
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
				
				<ul class="navbar-brand" style="padding-top: 25px"></ul>
			</div>
				<ul class="nav navbar-nav">
					<li><a href="customer_homepage.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="customer_profile.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>
					<li><a href="service_list.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Services</a></li>
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
								<div class="panel-heading" align="center" style="font-weight: bold; background-color: #00b3b3;color: white;">Customer Information</div>
								<div class="panel-body">

				<form method="POST">
									<div class="row">
										<div class="col-md-6">
											<label for="firstname">Firstname</label>
											<input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" readonly>

											
										</div>
										
									
										<div class="col-md-6">
											<label for="lastname">Lastname</label>
											<input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $lastname; ?>" readonly>
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
											<input type="text" id="acct_num" name="acct_num" class="form-control" maxlength="19">
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label for="address">Address</label>
											<input type="text" id="address" name="address" class="form-control" value="<?php echo $address; ?>" readonly>
										</div>
									</div>
							<div class="row">				
										<div class="col-md-4">
											<label for="payment_date">Payment Date :</label>
											<input type="date" name="payment_date" class="form-control" value="<?php echo date('Y-m-d',strtotime('+ 0 days'))?>" readonly><p><br></p>
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

						<?php
									$uid = $_SESSION["uid"];
									$sql = "SELECT * From reserve_tbl WHERE order_id = '$titi' ";
							 		$run_query = mysqli_query($con,$sql);
							 		$count = mysqli_num_rows($run_query);
							 		if($count > 0){
						 			$no = 1;
						 			$total_amount =0;
						 			while($row=mysqli_fetch_array($run_query)){
						 				$qty = $row["qty"];
						 				$total =$row["total"];

						 				
						 				$price_array = array($total);

						 				$total_sum = array_sum($price_array);
						 				$total_amount = $total;

						 				
						 			}
						 		}
						 		
									?>

						<div class="row">
							<div class="col-md-6">
								<label>Total Price of Orders</label>
								<input type="number" name="half" value="<?php echo$total_amount ?>" class="form-control" readonly>
							</div>
							<div class="col-md-6">
								<label>Required Downpayment</label>
								<input type="number" name="half" value="<?php echo$total_amount/2 ?>" class="form-control" readonly>
							</div>
						</div>


							<input type="hidden" name="id" value="<?php echo $_SESSION["uid"]; ?>">

							<input type="hidden" name="txtid" value="<?php echo $user_id; ?>">

     		 <?php	
									$sql = "SELECT * From reserve_tbl WHERE order_id= $titi GROUP BY order_id;";
                      $run_query = mysqli_query($con,$sql);
                      
                      ?>
									<div class="row">
										<div class="col-md-12">
											<label for="payment_status" style="margin-left: 340px">Payment</label>
											
										</div>
									</div>
									<select id="payment_status" name="payment" class="form-control">
                                    <option>Choose Payment</option>
                                
                                  <?php while ($row = mysqli_fetch_object($run_query)): ; ?>

                                  <option><?php echo $row->total; ?> (Full Payment)</option>
                                   <option><?php echo$total_amount/2 ?> (Half Payment)</option>

                                  <?php endwhile; ?>

                                  </select>

                <div class="row">
                    <div class="col-md-12">
                      <label for="payment" style="margin-left: 360px"></label>

                     <!-- <input style="text-align: center;" type="number" id="payment" name="payment" class="form-control" placeholder="Payment" required="required" value="<?php echo $total_amount/2 ?>"> -->

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
               <p>Copyright &copy Pet Cenral</p>
             </div>
           </footer>

</body>
</html>

</body>
</html>
