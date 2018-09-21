<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Customer Registration</title>
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
	<body style="background-color: #e6f9ff">
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
					<li><a href="index.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products / Services</a></li>
					
				</ul>

				<ul class="nav navbar-nav navbar-right ">

				 	<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white;"><span class="glyphicon glyphicon-user" style="padding-top: 4px;color: white;"></span> Log-In</a>
				 		<ul class="dropdown-menu">
				 			<div style="width:300px; background-color: #00b3b3; color: white">
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

				<li><a href="admin_login.php" style="color: white;"><span class="glyphicon glyphicon-user" style="padding-top: 4px"></span> Admin</a></li>		
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
									<div class="col-md-8" id="signup_msg">
										<!--Alert from signup form-->
									</div>
										<div class="col-md-2"></div>
								</div>
						<div class="row">
					<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="panel panel-primary">
								<div class="panel-heading" style="text-align: center;font-weight: bold; background: #00b3b3;">Customer Registration Form</div>
								<div class="panel-body">
								<form method="POST">
									<div class="row">
										<div class="col-md-6">
											<label for="firstname">Firstname</label>
											<input type="text" id="firstname" name="firstname" class="form-control" autofocus>
										</div>	

										<div class="col-md-6">
											<label for="lastname">Lastname</label>
											<input type="text" id="lastname" name="lastname" class="form-control">
										</div>	
									</div>

									<div class="row">
										<div class="col-md-12">
											<label for="email">Email</label>
											<input type="text" id="email" name="email" class="form-control">
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<label for="password">Password</label>
											<input type="password" id="password" name="password" class="form-control">
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<label for="repassword">Re-enter Password</label>
											<input type="password" id="repassword" name="repassword" class="form-control">
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<label for="mobile">Mobile Number</label>
											<input type="number" id="mobile" name="mobile" class="form-control" maxlength="11">
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<label for="address">Address</label>
											<input type="text" id="address" name="address" class="form-control">
										</div>
									</div>
									<p><br></p>
									<div class="row">
										<div class="col-md-12">
											<input style="float:right ; background-color: #e6f9ff; color: black; font-weight: bold;" value="Submit" type="button" id="signup_button" name="signup_button" class="btn btn-success btn-lg">
											<br>
										<div class="col-md-4"><a href="index.php">Continue Shoping</a></div>
										</div>
									</div>

								</div>
								</form>
								<div class="panel-footer">&copy; 2018</div>
							</div>

					</div>
				</div>
				
			</div>
	<footer>
	<div class="panel-footer" style="text-align: center;">
		<p>Copyright &copy Pet Central</p>
	</div>
	</footer>
</body>
</html>