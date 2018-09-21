
<?php
include('connect.php');


if(isset($_POST["btnsave"])){
	$qty  = $_POST["stocks"];
	$type = $_POST["product_cat"];
	
	$name = $_POST["product_title"];
	$price = $_POST["product_price"];
	$desc = $_POST["product_desc"];
	$image = $_POST["product_image"];
	$keyword = $_POST["product_keywords"];

		$sql ="INSERT INTO `products` (`product_id`, `stocks`, `product_cat`,  `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES (NULL, '$qty', '$type',  '$name', '$price', '$desc', '$image', '$keyword')";
		$run_query = mysqli_query($con,$sql);


		$sql1 ="INSERT INTO `inventory` (`inventory_id`, `product_cat`, `product_keywords`, `qty`) VALUES (NULL, '$type', '$keyword',  '$qty');";
		$run_query = mysqli_query($con,$sql1);

}

?>

<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>ADD STOCK</title>
	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="animate.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="main.js"></script>
</head>
<body style="text-transform: capitalize;">	
<div class="navbar navbar-fixed-top" style="background-color:  #00b3b3;color: white;">
		<div class="container-fluid">
			<div class="navbar-header">
				
				<ul class="navbar-brand" style="padding-top: 20px"></ul>
			</div>
					<button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
					<span><img src="images/menu.png"></span>
				</button>

				<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav">
					<li><a href="admin_homepage.php" style="padding-top: 25px;color: white;" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="admin_profile.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products / Services</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right ">

				 	<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-user"></span>Hi Admin</a>
				 		<ul class="dropdown-menu">

				 				<li><a href="add_stock.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-shopping-cart"></span> Add Stocks</a></li>

				 						<li class="divider"></li>
<li><a href="add_services.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-shopping-cart"></span> Add Services</a></li>

				 						<li class="divider"></li>
				 				<li><a href="update_stocks.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-bookmark"></span> Update Stocks</a></li>

				 						<li class="divider"></li>

				 				<li><a href="omg/index.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-calendar"></span> Date of Order </a></li>

                    					<li class="divider"></li>

				 				<li><a href="stock_history.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-pencil"></span> Stock History</a></li>

				 						<li class="divider"></li>

				 				<li><a href="customer_list.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-user"></span> Customer List</a></li>

				 						<li class="divider"></li>

				 				
				 				<li><a href="order_history.php" style="text-decoration:none; color:#74ACB3;"><span class="	glyphicon glyphicon-send"></span> Customers Order</a></li>

				 						<li class="divider"></li>

				 				<li><a href="services.php" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-wrench"></span>  Service History</a></li>

                                        <li class="divider"></li>

                                <li><a href="resched.php" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-calendar"></span>  Reschedule</a></li>

                                        <li class="divider"></li>

                                <li><a href="payment.php" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-qrcode"></span>  Payment</a></li>

                                        <li class="divider"></li>

                                <li><a href="report.php" style="text-decoration:none; color:#74ACB3;"><span class="  	glyphicon glyphicon-list-alt"></span>  Reports</a></li>

                                        <li class="divider"></li>

                                <li><a href="void_history.php" style="text-decoration:none; color:#74ACB3;"><span class="  	glyphicon glyphicon-time"></span>  Void History</a></li>

                                        <li class="divider"></li>

				 				<li><a href="customer_logout.php" style="text-decoration:none; color:#74ACB3;">Log-Out</a></li>

				 						<li class="divider"></li>
				 		</ul>
				 	</li>
				</ul>
		</div>
	</div>
	</div>
	<p><br></p>
	<p><br></p>
	<p><br></p>

	<div class="container-fluid">
						<div class="row">
					<div class="col-md-3"></div>
						<div class="col-md-7">
							<div class="panel panel-primary">
								<div class="panel-heading" align="center" style="font-size: 20px;font-weight: bold; background: #00b3b3;">ADD PRODUCT</div>

								<div class="panel-body">

						<div class="row">
							<div class="col-md-12"></div>
							<div class="col-md-6">
								<div class="container">
									<div class="row">
									<div class="col-md-1"></div>
										<div class="col-xs-14">
											<div class="modal" id="addModal" tabindex="-1">
												<div class="modal-dialog">
													<div class="modal-content animated bounceIn">
														<div class="modal-header">
															<button class="close" data-dismiss="modal" >&times;</button>
															<h4 class="modal-title" style="text-align: center;">Add New</h4>

														</div>
														<div class="modal-body">
										<?php 
										if(isset($_POST["cat"])){

											$cat_title = $_POST["cat_title"];
											

											$sql = "INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES (NULL, '$cat_title')";
											$run = mysqli_query($con,$sql);

											//$sql = "INSERT INTO `brand` (`brand_id`, `brand_title`) VALUES (NULL, '$brand_title')";
											$run = mysqli_query($con,$sql);
										}
										?>
										
					<?php
					if(isset($_POST['btncat'])){

						$cat_title = $_POST["cat_title"];
						$sql = "INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES (NULL, '$cat_title')";
							$run = mysqli_query($con,$sql);
					}
					?>					
								<form method="POST">
					<div class="form-group">
					<label for="Cat_title">Product Type :</label>
					<input type="text" name="cat_title" id="cat_title" >
					<input type="submit" name="btncat" class="btn btn-info" value="Add Product Type">
													</div>

					
											
													

												
														</div>

														<div class="modal-footer">
													
															<button class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
	</form>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>	
					</div>

						<br>
								<form method="POST">
									<div class="row">

										<div class="col-md-4">


										<ol>
											<label for="product_cat">Product Type</label>
											</ol>
												<div class="col-md-12">
											<ol>
											<?php
											$sql = "SELECT * From categories";
											$run_query = mysqli_query($con,$sql);
											if(mysqli_num_rows($run_query)>0){
												$i=1;
											}
											?>
											<select id="product_cat" name="product_cat" class="form-control">
												<option>CATEGORIES</option>
										
											<?php while ($row = mysqli_fetch_object($run_query)): ; ?>

											<option><?php echo $row->cat_id; ?>.<?php echo $row->cat_title; ?></option>

											<?php endwhile; ?>

											</select>

											</ol>
										</div>	
										</div>	
									

										<div class="col-md-4">
										<ol>
											
										</ol>
										<div class="col-md-12">
										<ol>
									
									

									 	
											</ol>
										</div>	
										</div>	
										<div class="col-md-4">
										<label for="qty" style="margin-bottom: 14px;">Quantity</label>
										<input type="number" name="stocks" id="stocks" class="form-control" required="required">
									</div>
									</div>


									<div class="row">
										<div class="col-md-12">
											<label for="product_title">Product Name</label>
											<input type="text" id="product_title" name="product_title" class="form-control" required="required" placeholder="Product Name" required="required" style="margin-bottom: 15px;">
										</div>	
										</div>


									<div class="row">
										<div class="col-md-12">
											<label for="product_price">Product Price</label>
											<input type="number" id="product_price" name="product_price" class="form-control" required="required" placeholder="Product Price" required="required" style="margin-bottom: 15px;">
										</div>	
										</div>


									<div class="row">
										<div class="col-md-12">
											<label for="product_desc">Product Description</label>
											<input type="text" id="product_desc" name="product_desc" class="form-control" required="required" placeholder="Product Description" required="required" style="margin-bottom: 15px;">
										</div>	
										</div>
									<div class="row">
										<div class="col-md-12">
											<label for="product_image">Product Image</label>
											<ol>
											<div class="control-group">
											  <div class="controls">
												<input class="input-picture uniform_on" id="product_image" name="product_image" type="file" accept="image/*" required="required" style="margin-bottom: 15px;">
											  </div>
											</div>
											</ol> 
										</div>	
										</div>


									<div class="row">
										<div class="col-md-12">
											<label for="product_keywords">Product Keywords</label>
											<input type="text" id="product_keywords" name="product_keywords" class="form-control" required="required" placeholder="Product Keyword" required="required">
										</div>		
										</div>
									</div>
							<p><br></p>
									<div class="row">
										<div class="col-md-12">
											<input style="float:right;margin: 13px; background-color: #e6f9ff; color: black; font-weight: bold;" type="submit" value="Add Product" name="btnsave" class="btn btn-success btn-lg">
											<button class="btn btn-warning btn-md"  data-target="#addModal" data-toggle="modal" style="float: right;margin: 13px;padding: 12px;background-color: #e6f9ff; color: black; font-weight: bold;">Add New</button>
										</div>
									</div>

								
								</form>


								<div class="panel-footer">&copy; 2018 
								<div class="col-md-5"><a href="admin_profile.php">Check My Site</a></div>

								</div>
							</div>
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