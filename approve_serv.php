<?php
session_start();
include("connect.php");

  if(isset( $_GET['serv_id']) )
  {
   
    $_SESSION['serv_id']=$_GET['serv_id'];
  
  }
	
  if (isset($_POST["app"])) {
  	$service_id = $_POST["service_id"];
  	$service_status = $_POST["service_status"];
  	print_r($service_status);
  	$sql_service = "UPDATE pet_services SET service_status ='$service_status' WHERE serv_id = $service_id";
  	print_r($sql_service);

  	$excute_query = mysqli_query($con, $sql_service);
  	print_r($excute_query);

  	if($excute_query)
  	{
  		$message = "<div class='alert alert-success'><a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Successfully Updaetd to $service_status</b></div>";
  	}
  }


if(isset($_GET["edited"])){

	$sql = "SELECT * from pet_services where serv_id ='{$_GET['id']}' ";
	$run_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_object($run_query);
	$serv_id = $row->serv_id;
	$serv_name = $row->serv_name;
	$serv_desc = $row->serv_desc;
	$serv_price = $row->serv_price;
	$serv_status = $row->service_status;

	$sql = "UPDATE `pet_services` SET `serv_name`='$serv_name', `serv_desc` = '$serv_desc', `serv_price` = '$serv_price', `service_status` = '$serv_status' WHERE `pet_services`.`serv_id`= '$serv_id' ";
    $run = mysqli_query($con,$sql);

}


?>

<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>Service Update</title>
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
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?php
				if(isset($message))
				{
					echo $message;
				}
				?>
				<!--Cart Message-->
			</div>
			<div class="col-md-4"></div>
		</div>

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
											<label for="serv_name">Service Name</label>
											<input type="text" id="serv_name" name="serv_name" class="form-control" value="<?php echo $serv_name; ?>" readonly>
											<input type="hidden" name="service_id" value="<?php echo $_GET["id"];?>">
											
										</div>
										
									
										<div class="col-md-6">
											<label for="serv_price">Service Price</label>
											<input type="text" id="serv_price" name="serv_price" class="form-control" value="<?php echo $serv_price; ?>" readonly>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12" style="margin-bottom: 20px;">
											<label for="serv_desc">Service Description</label>
											<input type="text" id="serv_desc" name="serv_desc" class="form-control" value="<?php echo $serv_desc; ?>" readonly>
										</div>
									</div>

						



                <div class="row">
                    <ol>
											<label for="service_status">Service Status</label>
											</ol>
												<div class="col-md-12">
											<ol>
											<?php
											$sql = "SELECT * From serv_status";
											$run_query = mysqli_query($con,$sql);
											if(mysqli_num_rows($run_query)>0){
												$i=1;
											}
											?>
											<select id="service_status" name="service_status" class="form-control">
												<option>Status</option>
										
											<?php while ($row = mysqli_fetch_object($run_query)): ; ?>

											<option><?php echo $row->stat_name; ?></option>

											<?php endwhile; ?>

											</select>

											</ol>
                  </div>
				<br>




									<p><br></p>
									<div class="row">
										<div class="col-md-12">
											<input style="float:right; background-color: #e6f9ff; color: black; font-weight: bold;" type="submit" value="Approve" name="app" class="btn btn-success btn-md">
											<br>
										<div class="col-md-4"><a href="serv_update.php">Back</a></div>
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