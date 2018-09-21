<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>Generate Report</title>
	 <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script><
	<script src="admin_main.js"></script>
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
					<li><a href="admin_homepage.php" style="padding-top: 25px;color: white;" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="admin_profile.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products / Services</a></li>
				</ul>


					<ul class="nav navbar-nav navbar-right ">



				 	<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-user"></span>Hi Admin</a>
				 		<ul class="dropdown-menu">
				 				<li><a href="add_stock.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-shopping-cart"></span> Add Stocks</a></li>

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

                                <li><a href="#" style="text-decoration:none; color:#74ACB3;"><span class="  	glyphicon glyphicon-list-alt"></span>  Reports</a></li>

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
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-info">
					<div class="panel-heading" style="text-align: center;font-weight: bold; background: #00b3b3; color: white;">Generate Reports</div>
					<div class="panel-body">
							<table  class="table">

		<tr>
			
			<th>List</th>
			<th>Buttons</th>

		</tr>


  <tr>
    <td>Customer List</td>
<td><a href="reps/reports/customer_list.php" class="btn btn-info">View Print</a></td>
  </tr>

  <tr>
  	<td>Customer Order/Payment</td>
  	<td><a href="reps/reports/index.php" class="btn btn-info">View Print</a></td>
  </tr>

<tr>
  	<td>Payment History</td>
  	<td><a href="reps/reports/payment_history.php" class="btn btn-info">View Print</a></td>
  </tr>


  <tr>
  	<td>Services</td>
  	<td><a href="reps/reports/index_services.php" class="btn btn-info">View Print</a></td>
  </tr>

  <tr>
  	<td>Stock Orders</td>
  	<td><a href="reps/reports/index_stock.php" class="btn btn-info">View Print</a></td>
  </tr>




</table>
						
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
		</div>
	</div><br><br><br><br><br><br><br><br>
	<footer style="text-align: center;">
	<div class="panel-footer">
        <p>Copyright &copy Pet Central</p> 
        </div>
</footer>					
</body>
</html>