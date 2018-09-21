<?php

  if(isset( $_GET['id']) )
  {
   
    $_SESSION['id']=$_GET['id'];
  
  }




include("connect.php");

	$product_id = "";
	
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con , $sql);

if(isset($_POST["btnupdate"])){
	

	$stocks=$_POST["qty"];
	$product_keywords =$_POST["product_keywords"];
	$product_id = $_SESSION['id'];


		$sql = "INSERT INTO `inventory` (`inventory_id`, `product_id`, `product_keywords`, `qty`) VALUES (NULL, '$product_id', '$product_keywords', '$stocks');";
	   	$run_query = mysqli_query($con,$sql);


	$sql="UPDATE `products` SET `stocks` = `stocks` + '$stocks' WHERE `products`.`product_id` = '{$_POST['txtid']}' ";
	$run_query = mysqli_query($con,$sql);
	if ($run_query) {
		header('Refresh:0; update_stocks.php');
	} 
}
if(isset($_GET["edited"])){

	$sql = "SELECT * from products where product_id='{$_GET['id']}' ";
	$run_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_object($run_query);
	$product_id = $row->product_id;
	$product_keywords =$row->product_keywords;


}

?>

<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>Update Stock</title>
	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script><
	<script src="main.js"></script>
</head>
<body>	
	<div class="navbar navbar navbar-fixed-top" style="background-color: #00b3b3;color: white;">
		<div class="container-fluid">
			<div class="navbar-header">
		
			</div>
			<button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
				<span><img src="images/menu.png"></span>
			</button>

			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav">
					<li><a href="#" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="admin_profile.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products / Services</a></li>
				</ul>
			</div>
		</div>
		</div>
<p><br></p>
<p><br></p>


			<div class="container-fluid">
						<div class="row">
						<div class="col-md-2"></div>
									<div class="col-md-8" id="signup_msg">
										<!--Alert from signup form-->
									</div>
										<div class="col-md-2"></div>
								</div>
						<div class="row">
					<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="panel panel-primary">
								<div class="panel-heading" align="center" style="font-weight: bold; background: #00b3b3;">Update Customer Information</div>
								<div class="panel-body">
								<form method="POST">
									<div class="row">

									<div class="col-md-12">
											<label for="stocks">Product Name</label>
											<input type="text" id="product_keywords" name="product_keywords" class="form-control" value="<?php echo $product_keywords; ?>" autofocus  readonly> 
										</div>	

										<div class="col-md-12">
											<label for="stocks">Stocks</label>
											<input type="number" id="qty" name="qty" class="form-control" autofocus > 
											<input type="hidden" name="txtid" value="<?php echo $product_id; ?>">
										</div>	
									</div>

									<p><br></p>
									<div class="row">
										<div class="col-md-12">
											<input style="float:right; background-color: #e6f9ff; color: black; font-weight: bold;" type="submit" value="Update" name="btnupdate" class="btn btn-success btn-lg">
											<br>
										<div class="col-md-4"><a href="update_stocks.php">Back</a></div>
										</div>
									</div>

								</div>
								</form>
								<div class="panel-footer">&copy; 2018</div>
							</div>

					</div>
				</div>
				
			</div><br><br><br><br><br><br><br><br><br><br><br><br>
			<footer style="text-align: center;">
	<div class="panel-footer">
        <p>Copyright &copy Pet Central</p> 
        </div>
</footer>	

</body>
</html>