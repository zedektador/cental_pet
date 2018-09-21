<?php
include("connect.php");
session_start();
  if(isset( $_GET['id']) )
  {
   
    $_SESSION['id']=$_GET['id'];
  
  }
	$product_id = "";


if(isset($_POST["btns"])){

  $payment =$_POST['payment']; 
  $name =$_POST['name'];
  $lastname =$_POST['lastname'];
  $payment_date =$_POST['payment_date'];
  $payment_type =$_POST ['payment_type'];
  $acct_num =$_POST ['acct_num'];
  $payment_method =$_POST['payment_method'];

  	$sql1 = "INSERT INTO `payment_history` (`id`, `name`, `lastname`, `payment`, `payment_date`, `payment_type`) VALUES (NULL, '$name', '$lastname', '$payment', '$payment_date', 'Services');";
  $r = mysqli_query($con,$sql1);

  	$sql1s = "UPDATE `reserve` SET `acct_num` = '$acct_num', `payment` = '100', `payment_method` = '$payment_method' ,`msg_stats` = '0' ,`customer_order` = '1' WHERE user_id ='{$_POST['idss']}' ;";

  	$rw = mysqli_query($con,$sql1s);



 header('Refresh:0;customer_profile.php');

            $message="Success";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        echo"<script>close()</script>"; 

}

$titi = $_GET['id'];

if(isset($_GET["titi"])){

	$sql = "SELECT * from staff_comments where id='{$_GET['id']}' ";
	$run_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_object($run_query);
	$id = $row->id;
	
	$firstname = $row->firstname;
	$lastname = $row->lastname;
	
	
	$payment = $row->payment;
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

					<input type="hidden" name="idss" value="<?php echo $_SESSION["uid"]; ?>">

									<div class="row">
										<div class="col-md-6">
											<label for="name">Firstname</label>
											<input type="text" id="name" name="name" class="form-control" value="<?php echo $firstname; ?>" readonly>

											
										</div>
										
									
										<div class="col-md-6">
											<label for="lastname">Lastname</label>
											<input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $lastname; ?>" readonly>
										</div>
									</div>
									<div class="col-md-6">
											
											<input type="hidden" id="payment_type" name="payment_type" class="form-control">
										</div>
									


									<div class="row">
										<div class="col-md-12">
											<label for="acct_num">Reference Number</label>
											<input type="number" id="acct_num" name="acct_num" class="form-control">
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
										<div class="col-md-4">
											<label for="payment_date">Payment Date :</label>
											<input type="date" name="payment_date" class="form-control" value="<?php echo date('Y-m-d',strtotime('+ 0 days'))?>" readonly><p><br></p>
										</div>
										</div>

        		<div class="row">			
    
<?php


$sql = "SELECT * From staff_comments where id = '$titi' ";
$run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query)>0){


    $i=1;
    while($row = mysqli_fetch_object($run_query)){


    ?>

    <form method="POST">


        

        
        

        
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
						 				$total_amount = $total_amount + $total_sum;

						 				
						 			}
						 		}
						 		
									?>

						

                <div class="row">
                    <div class="col-md-12">
                      <label for="payment" style="margin-left: 370px">Downpayment</label>
                      <input style="text-align: center;" value="100" type="number" id="payment" name="payment" class="form-control" required="required" readonly="">

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
