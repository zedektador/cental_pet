<?php 

session_start();

if(!isset($_SESSION["uid"])){
	header("Location: index.php");
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
	<script src="customer_main.js"></script>



</head>
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
					<li><a href="customer_profile.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>
					<li><a href="service_list.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Services</a></li>
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
			
			<?php
			 
				if(isset($_POST["checkout_button"])){
					header("Refresh:0; order.php");
				}
			?>

					<form method="POST" action="">
						<input style="float:right; background-color: #e6f9ff; color: black; font-weight: bold;" value="Cart Check Out" type="submit" id="checkout_button" name="checkout_button" class="btn btn-warning btn-xs">
					</form>

			</div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Cart Message-->
			</div>
			<div class="col-md-4"></div>
		</div>

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-heading" style="text-align: center;font-weight: bold; background-color: #00b3b3; ">Order Details</div>
						<div class="panel-body">

							<div class="row">
								<div class="col-md-2"><b>Action</b></div>
								<div class="col-md-2"><b>Product Image</b></div>
								<div class="col-md-2"><b>Product Name</b></div>
							
								<div class="col-md-2"><b>Quantity</b></div>
								<div class="col-md-2"><b>Product Price</b></div>
								<div class="col-md-2"><b>Price in ₱(Pesos)</b></div>
							</div> <br><br>
							<div id="cart_checkout"></div>

							<!--<div class="row">
								<div class="col-md-2">
									<div class="btn-group">
										<a href ="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
										<a href ="#" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<div class="col-md-2"><img src="Image/lg_hsn_1hp.JPG" width="110" height="80"></div>
								<div class="col-md-2">Product Name</div>
								<div class="col-md-2"><input type="text" class="form-control" value="1"></div>
								<div class="col-md-2"><input type="text" class="form-control" value="28,798" disabled></div>
								<div class="col-md-2"><input type="text" class="form-control" value="28,798" disabled></div>
							</div>-->

							<!--<div class="row">
											<div class="col-md-2"></div>
											<div>
													<b>Total Amount : ₱.5000</b>
											</div>
										</div>  -->

										<br>
								<div class="col-md-4"><a href="customer_profile.php"><b>Continue Shopping</b></a></div><br>

								</div>

						</div>
						
						<div class="panel-footer">© 2018</div>
					</div>
				</div>
			
			</div>
				
		</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

		<footer style="text-align: center;">
	<div class="panel-footer">
        <p>Copyright &copy Pet Central</p> 
        </div>
</footer>		
</body>
</html>