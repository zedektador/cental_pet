<?php 
	include '../INCLUDES/function-signup.php';
	// gagawa ng isa pang page para sa register at ito ay para sa session or para matandaan kung ano yung mga inserted information kahit na may error or mali sa inputs
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Robin Joy's House of Flowers</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,400italic,600,300italic,300|Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">


		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.css" rel="stylesheet">
		<link href="css/owl.transitions.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<!-- Navabar Start -->
<nav class="navbar navbar-inverse">	
  <div class="container-fluid">
  <a class="navbar-brand" href="#"><img src="photos/LOGONIDODOY.png" alt="" class="img-responsive"></a>
    <div class="navbar-header navbar-right">
      <a class="navbar-brand" href="index.php">
        <button type="button" class="btn btn-primary">HOME</button>
      </a>
    </div>
  </div>
</nav>
<!-- End of NavBar-->

	<!-- Login Start -->
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login animated zoomIn">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Register</a>
							</div>
							<div class="col-xs-6">
								
							</div>
						</div>
						<hr>
					</div>
					<!-- START OF LOG IN TEXTBOXES -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="../INCLUDES/function-signup.php" method="post" role="form" style="display: block;">
									<form id="register-form" action="../INCLUDES/function-signup.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="customer_fname" id="FirstName" tabindex="1" class="form-control" placeholder="Enter Firstname"  ">
									</div>
									<div class="form-group">
										<input type="text" name="customer_lname" id="LastName" tabindex="1" class="form-control" placeholder="Enter Lastname" ">
									</div>
									<div class="form-group">
										<input type="text" name="customer_contact_number" id="Contactnumber" tabindex="1" class="form-control" placeholder="Enter Contact Number" ">
									</div>
									<div class="form-group">
										<input type="text" name="customer_username" id="username" tabindex="1" class="form-control" placeholder="Enter Username" ">
									</div>
									<div class="form-group">
										<input type="email" name="customer_email" id="email" tabindex="1" class="form-control" placeholder="Enter Email Address" ">
									</div>
									<div class="form-group">
										<input type="password" name="customer_password" id="password" tabindex="2" class="form-control" placeholder="Enter Password" >
									</div>
									<div class="form-group">
										<input type="password" name="customer_confirm_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" >
									</div>
									<div class="form-group">
										<input type="text" name="customer_address" id="Address" tabindex="1" class="form-control" placeholder="Enter Address" ">
									</div>
									<div class="form-group">
											<link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui.min.css">
											
											<input type="date" name="customer_age" id="date" placeholder="     Enter Date of Birth." required><br>

											<!-- jquery -->
											<script type="text/javascript" src="jquery-ui/external/jquery/jquery.js"></script>
											<!-- jquery ui -->
											<script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>

											<script type="text/javascript">
												$("#date").datepicker({ dateFormat: 'yy/mm/dd'});
											</script>
											</script>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form> <!-- END RGISTER TEXT BOXESS-->
							</div>
						</div>
					</div>
				</div>
			</div>
								</form>
								<!-- END LOG IN TEXT BOXESS-->



								<!-- START OF REGISTER TEXTBOXES -->
								

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
		<script type="text/javascript" src="js/login.js"></script>
</body>
</html>