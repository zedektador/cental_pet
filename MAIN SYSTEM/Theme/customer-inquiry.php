<?php 
	session_start();
	include '../INCLUDES/database-connection.php';
	include '../INCLUDES/login-function.php';
	error_reporting(0);

	if (empty($_SESSION['username'])) {
		header('Location: login.php?not_login');
	}
		if (isset($_POST['save_package_offered'])) {;
		$customer_id = mysqli_real_escape_string($conn, $_POST['id']);
		$customer_type = mysqli_real_escape_string($conn, $_POST['type_customer']);
		$event_name =  mysqli_real_escape_string($conn, $_POST["event_name"]);
		$package_name = mysqli_real_escape_string($conn, $_POST["package_name"]);
		$package_price = mysqli_real_escape_string($conn, $_POST["package_price"]);
		$guest = mysqli_real_escape_string($conn, $_POST["guest"]);
		$venue = mysqli_real_escape_string($conn, $_POST["venue"]);
		

		$qry = "INSERT INTO tbl_customer_event (customer_event_id, customer_type, customer_event_type, customer_package, customer_package_price, customer_guest, customer_venue) VALUES ('$customer_id', '$customer_type', '$event_name', '$package_name', '$package_price', '$guest', '$venue')"; // inserting the data into the database
		mysqli_query($conn, $qry);
	}

	$pid = "";
	$pname= "";
	$pprice= "";
	$ppicture = "";


	if (isset($_GET['select'])) {
		$qry = mysqli_query($conn, "SELECT * FROM tbl_admin_offered_packages WHERE id='".$_GET['select']."'");

		while ($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {

			$pid = $row['id'];
			$pname = $row['package_name'];
			$pprice = $row['package_price'];
			$picture = $row['package_picture'];

		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Robin Joy's House of Flowers</title>
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,400italic,600,300italic,300|Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">


		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.css" rel="stylesheet">
		<link href="css/owl.transitions.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">


	</head>
	<body data-spy="scroll" data-target=".main-nav">
<!--navbar start-->
		<header class="st-navbar">
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sept-main-nav">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="customer-inquiry.php"><img src="photos/LOGONIDODOY.png" alt="" class="img-responsive"></a>
					</div>
					
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse main-nav" id="sept-main-nav">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#terms">Terms and Policies</a></li>
							<li><a href="#inquiry">Inquire</a></li>
							<li><a href="#contact">Contact us for Reservation</a></li>
							<li>	<?php 

										// remember user

										if (isset($_SESSION['username'])) {
											echo "You are logged in!";
										}
									if (isset($_SESSION['username'])) {
										echo ' <form action="../INCLUDES/logout-function.php" method="POST">
									 	<button class="btn btn-primary" type="submit" name="logout">Logout</button>
									 </form>';
									}

									 ?>
									 	
								</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		</header>

		

		<!-- eto yung may background -->
		
		<!--end-->		

		<section class="terms" id="terms">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title st-center">
							<h3>Terms and Policies</h3>
							<p>READ TERMS AND POLICIES BEFORE INQUIRE</p>
								  <div class="panel panel-default">
								    <div class="panel-heading" role="tab" id="headingThree">
								      <h4 class="panel-title">
								        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								          VIEW TERMS AND POLICIES
								        </a>
								      </h4>
								    </div>
								    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
								      <div class="panel-body">
									      <p>
										      <div class="checkbox">
										      	<label>
										      		<input type="checkbox" name="">If you prefer this menu please select
										      	</label>
										      </div> 
									      </p>
								       ayusin pa to fre
								      </div>
								    </div>
								  </div>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

							<section class="inquiry" id="inquiry">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div class="section-title st-center">
												<h3>Organizing an event</h3>
												<p>Choose Package | Customize your own event</p>
												


										<form action="customer-inquiry.php" method="POST">
											<input type="text" name="id" value="<?php echo $_SESSION['id'] ?>" readonly> <br>
											<input type="radio" name="type_customer" value="Choose from Offered Packages/Customer">Choose from Offered Packages
											<input type="radio" name="type_customer" value="Customize Package/Customer">Customize own Event
											<input type="radio" name="type_customer" value="Budgetary Customer">Budgetary Customer <br>
											

											Type of Event: <select name="event_name">
											<?php 
												$qry = mysqli_query($conn, "SELECT * FROM tbl_admin_offered_event"); // query the data inside database
												while ($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)) : ?>

												<option name="event_name" value="<?php echo $row['event_name'] ?>">
												<?php echo $row['event_name'] ; ?>													
												</option>
											<?php endwhile; ?>
											</select><br>
										   
										       Package Name:<input type="text"  name="package_name" placeholder="Select from Packages"  value="<?php echo $pname; ?>" readonly> <br>
										       Package Price: <input type="text" name="package_price" placeholder="Select from Packages"   value="<?php echo $pprice; ?>" readonly><br>
										       Number of invited Guest: <input type="number" name="guest" placeholder="Invited Guests"> <br>

										      Select Venue:<select  name="venue">
											<?php 
												$qry = mysqli_query($conn, "SELECT * FROM tbl_admin_offered_venues"); // query the data inside database
												while ($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)) : ?>
												<option name="venue" value="<?php echo $row['venue_name'] ?>">
												<?php echo $row['venue_name'] ; ?>
												</option>
											<?php endwhile; ?>
											</select><br>
			
											<input type="submit" name="save_package_offered"><br>
										</form>

									<div class="row">
										<div class="col-md-12"><br>
												<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
													<div class="panel panel-default">
											    <div class="panel-heading" role="tab" id="headingOne">
											      <h4 class="panel-title">
											        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
											          VIEW PACKAGE
											        </a>
											      </h4>
											    </div>
											    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
											      <div class="panel-body">
											      </div> 
											      </p>
									       		<section>
															
													<div class="row">
															</div>
															<div class="row">
																<table id="tables">
															
															  <tr>
															    <th>Package Name</th>
															    <th>Package Price</th>
															    <th>Package Inclusion</th>
															    <th>Select Packages</th>
															  </tr>
															  <tr>
																   <?php 
																   		$qry = mysqli_query($conn, "SELECT * FROM tbl_admin_offered_packages"); // query the data inside database

																            while ($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)) {

																              echo '<tr><td>'.$row["package_name"].'</td>';

																              echo '<td>'.$row["package_price"].'</td>';


																              echo '<td> <img src="../adminpanel/image/' . $row["package_picture"]. '"style=width:200px; height:200px;"/></td>';

																              echo '<td><a href="?select='.$row['id'].'&package_picture='.$row["package_picture"].'"> Select Package</a>';
																          }
																    ?>
															  </tr>
															</table>
																</div>
															</div>
														</div>
													</div>
											      </div>
												</section>
												</div>
											</div>
														</div>
													</div>
												</div>
									      </div>
									 
									  </div>
									  <div class="row">
									  	<div class="col-md-12"><br>
									  		<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingTwo">
									      <h4 class="panel-title">
									        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									          VIEW VENUE
									        </a>
									      </h4>
									    </div>
									    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									      <div class="panel-body">
									      </div> 
									      </p>
									       	<section class="service" id="offeredvenue">
															<div class="container">
													<div class="row">
															</div>
															<div class="row">
																<table id="tables">
																  <tr>
																    <th>Venue Name</th>
																    <th>Venue Description</th>
																    <th>Venue Photo</th>
																  </tr>
																  <tr>
																    <?php 
																    		$qry = mysqli_query($conn, "SELECT * FROM tbl_admin_offered_venues"); // query the data inside database
																		while ($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)) {
																			echo '<tr><td>'.$row["venue_name"].'</td>';
																			echo '<td>'.$row["venue_address"].'</td>';

																			echo '<td> <img src="../adminpanel/ven-image/' . $row["venue_photo"]. '"style=width:200px; height:200px;"/> </td>';
																		}
																     ?>
																  </tr>
																</table>
																</div>
															</div>
														</div>
													</div>
											      </div>
												</section>
												</div>
											</div>
									  	</div>
									  </div>
									  

		<!--CONTACT US START-->
		<section class="contact" id="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title st-center">
							<h3>Contact Us</h3>
							<p>Get in Touch with Us</p>
						</div>
						</div>
						<address>
							<strong><?php $qry = mysqli_query($conn, "SELECT * FROM tbl_admin_user"); // query the data inside database
									while ($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)) {
										echo $row["admin_company_name"]; }?></strong> <br>
										<?php $qry = mysqli_query($conn, "SELECT * FROM tbl_admin_user"); // query the data inside database
									while ($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)) {
										echo $row["admin_address"]; }?> <br>

							<?php $qry = mysqli_query($conn, "SELECT * FROM tbl_admin_user"); // query the data inside database
									while ($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)) {
										echo $row["admin_email"]; }?> <br>

							<?php $qry = mysqli_query($conn, "SELECT * FROM tbl_admin_user"); // query the data inside database
									while ($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)) {
										echo $row["admin_contact_number"]; }?> <br>

							<strong><?php $qry = mysqli_query($conn, "SELECT * FROM tbl_admin_user"); // query the data inside database
									while ($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)) {
										echo $row["admin_full_name"]; }?></strong>
						</address>
					</div>
				</div>
			</div>
		</section>
		<!--CONTANCT END -->
		<!--FOOTER-->
		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						&copy; <a href="https://www.cantothemes.com">RobinJoy's House of Flowers</a> 2017.
					</div>
				</div>
			</div>
		</footer>
		<!--END -->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.easing.min.js"></script>
		<script src="js/jquery.stellar.js"></script>
		<script src="js/jquery.appear.js"></script>
		<script src="js/jquery.nicescroll.min.js"></script>
		<script src="js/jquery.countTo.js"></script>
		<script src="js/jquery.shuffle.modernizr.js"></script>
		<script src="js/jquery.shuffle.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/script.js"></script>
	</body>
</html>