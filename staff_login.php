
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
<body>
<p><br></p>
<p><br></p>
<h1 align="center" style="font-weight: bold;">Welcome Staff</h1>
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
					<li><a href="homepage.php" style="padding-top: 25px;color: white;" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="index.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products & Services</a></li>
					
				</ul>

				<ul class="nav navbar-nav navbar-right ">

				 	<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-user" style="padding-top: 4px"></span> Log-In</a>
				 		<ul class="dropdown-menu">
				 			<div style="width:300px;">
				 				<div class="panel panel-primary">
				 					<div class="panel-heading"><b>Login</b></div>
				 						<div class="panel-heading">
				 							<label for="email">Email</label>
				 							<input type="email" class="form-control" id="email" required="required" >
				 							<label for="email">Password</label>
				 							<input type="password" class="form-control" id="password" required="required" >
				 					<p><br></p>
				 							<a href="#" style="color:white; list-style:none;">Forgotten Password</a>
				 							<input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login" >
				 						</div>
				 							<div class="panel-footer" id="e_msg"></div>
				 				</div>
				 			</div>
				 		</ul>
				 	</li>
				 	

				<li><a href="customer_registratioin.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-user" style="padding-top: 4px"></span> SignUp</a></li>		
				</ul>
		</div>
	</div>
	</div>
	<p><br></p>
	<p><br></p>
<form method="POST" action="staff_login.php?attempts">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="panel panel-primary">
							<div class="panel-heading" align="center">Staff Login</div>
							<div class="panel-body">


<?php

session_start();


include("connect.php");
if(isset($_REQUEST['attempts'])){
$email = $_POST["email"];
$password = $_POST["password"];

	$sql = "SELECT * from staff WHERE email ='$email' and password ='$password' ";
	$run_query = mysqli_query($con,$sql);
	if(!$row = $run_query->fetch_assoc()){
			echo "
			<div class='alert alert-warning'>
			<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Your Email or Password is incorrect!</b>
			</div>

			";
	} else {
		echo header("location: staff_homepage.php");
	}

	
}
?>

								<div class="row">
									<div class="col-md-12">
										<label for="email">Email</label>
										<input type="email" id="password" name="email" class="form-control">
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<label for="password">Password</label>
										<input type="password" id="password" name="password" class="form-control">
									</div>

								</div>
					<p><br></p>
								<div class="row">
									<div class="col-md-12">
										<input style="float:right;" type="submit" value="Login" name="btnsave" class="btn btn-success btn-s">
									</div>
										<div class="col-md-12">
										<a href="homepage.php">Back to the Page</a>
									</div>
								</div>

							</div>
							<div class="panel-footer">&copy; 2018</div>
						</div>
					</div>
				</div>
			</div><br><br><br><br><br><br>
			<footer style="text-align: center;">
	<div class="panel-footer">
        <p>Copyright &copy Pet Central</p> 
        </div>
</footer>
</form>
</body>
</html> 