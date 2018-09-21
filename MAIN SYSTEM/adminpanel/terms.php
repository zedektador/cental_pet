<?php 
	error_reporting(0);
	include '../INCLUDES/database-connection.php';

 ?>
	<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>ADMIN PANEL</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/managesettings.css">
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>Robin Joy's House Of Flowers</span></a>
								
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="admin-details.php"><i class="icon-align-justify"></i><span class="hidden-tablet">Admin Details</span></a></li>
						<li><a href="about.php"><i class="icon-align-justify"></i><span class="hidden-tablet">About</span></a></li>
						<li><a href="table.php"><i class="icon-align-justify"></i><span class="hidden-tablet">Users</span></a></li>
						<li><a href="view-event.php"><i class="icon-align-justify"></i><span class="hidden-tablet">Customer's Event</span></a></li>
						<li><a href="calendar.php"><i class="icon-calendar"></i><span class="hidden-tablet">Calendar</span></a></li>
						<li><a href="terms.php"><i class="icon-align-justify"></i><span class="hidden-tablet">View Settings</span></a></li>
						 <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-align-justify"></i>Manage Settings</a>
				          <ul class="dropdown-menu">
				          	<li><a href="manage.php">Terms and Policies</a></li>
				            <li><a href="offerE.php">Offered Events</a></li>
				            <li><a href="venue.php">Venue Settings</a></li>
				            <li><a href="package.php">Package Settings</a></li>
				          </ul>
				        </li>
						<li><a href="login.php"><i class="icon-lock"></i><span class="hidden-tablet"> Log Out</span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li><a href="terms.php">View Terms and policies </a></li>
				<i class="icon-angle-right"></i>
				<li><a href="offeredevents.php">View Offered Events</a></li>
				<i class="icon-angle-right"></i>
				<li><a href="Venuesettings.php">View Venue </a></li>
				<i class="icon-angle-right"></i>
				<li><a href="packagesettings.php">View Package </a></li>
			</ul>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-align-justify"></i><span class="break"></span>Terms and policies</h2>
						<div class="box-icon">
							
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
						  <fieldset>
							<div class="container">       
							  <table class="table table-hover">
							    <thead>
							      <tr>
							        <th>Term and policies for Customer</th>
							         <th>Term and policies for Customization</th>
							        <th>Term and policies for Budgetary Customer</th>
							        <th>Term and policies for Payment</th>
							        <th>Term and policies for Payment 1</th>
							        <th>Term and policies for Payment 2</th>
							        <th>Term and policies for Payment 3</th>

							        
							      </tr>
							    </thead>
							    <tbody>
							      <tr>
							        	<?php 	

											$qryget = "SELECT * FROM tbl_admin_terms_policies";
											$qry = mysqli_query($conn, $qryget); // query the data inside database
											while ($row=mysqli_fetch_array($qry, MYSQLI_ASSOC)) {

												echo '<td>'.$row["terms_policies_customer"].'</td>';

												echo '<td>'.$row["terms_policies_customization"].'</td>';

												echo '<td>'.$row["terms_policies_budgetary_customer"].'</td>';

												echo '<td>'.$row["terms_policies_payment"].'</td>';

												echo '<td>'.$row["terms_policies_payment1"].'</td>';

												echo '<td>'.$row["terms_policies_payment2"].'</td>';

												echo '<td>'.$row["terms_policies_payment3"].'</td>';


											}
										 ?>
							      </tr>
							      
							    </tbody>
							  </table>
							</div>
							<div class="container">       
							  <table class="table table-hover">
							    <thead>
							      <tr>
							        
							        <th>Term and policies for Reschedule</th>
							        <th>Term and policies for Cancellation</th>
							        <th>Term and policies for Updating of Plans</th>
							        <th>Term and policies for Contract</th>
							        <th>Term and policies for Pricing and Availabilities</th>
							        <th>Term and policies for Questions and other Inquiries</th>
							        
							      </tr>
							    </thead>
							    <tbody>
							      <tr>
							        	<?php 	

											$qryget = "SELECT * FROM tbl_admin_terms_policies";
											$qry = mysqli_query($conn, $qryget); // query the data inside database
											while ($row=mysqli_fetch_array($qry, MYSQLI_ASSOC)) {

												

												echo '<td>'.$row["terms_policies_reschedule"].'</td>';

												echo '<td>'.$row["terms_policies_cancellation"].'</td>';

												echo '<td>'.$row["terms_policies_update"].'</td>';

												echo '<td>'.$row["terms_policies_contract"].'</td>';

												echo '<td>'.$row["terms_policies_p_a_packages"].'</td>';

												echo '<td>'.$row["terms_policies_q_a"].'</td>';
												
											}
										 ?>
							      </tr>
							      
							    </tbody>
							  </table>
							</div>
						  </fieldset>
					</div>
				</div>
			</div>
			</div>



	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Enter New Term and Policies for Customers:</h3>
		</div>
		<div class="modal-body">
			<form class="form-horizontal">
				<div class="form-group">
			    <label for="inputtext3" class="col-sm-2 control-label"><strong>Term and policies:</strong></label>
			    <div class="col-sm-11">
			      <input type="text" class="form-control" id="inputtext3" placeholder="Enter Term and policies">
			    </div>
			  </div>
			</form>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>
	



	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Enter New Term and Policies for Customers:</h3>
		</div>
		<div class="modal-body">
			<form class="form-horizontal">
				<div class="form-group">
			    <label for="inputtext3" class="col-sm-2 control-label"><strong>Term and policies:</strong></label>
			    <div class="col-sm-11">
			      <input type="text" class="form-control" id="inputtext3" placeholder="Enter Term and policies">
			    </div>
			  </div>
			</form>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>
	
	<div class="clearfix"></div>

	
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
