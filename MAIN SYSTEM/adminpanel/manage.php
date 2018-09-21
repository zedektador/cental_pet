<?php 
session_start();
	include '../INCLUDES/database-connection.php';
	error_reporting(0);
	$tid ="";
	$tcustomization = "";
	$tbc = "";
	$tpayment = "";
	$tpayment1 = "";
	$tpayment2 = "";
	$tpayment3 = "";
	$trs = "";
	$tcancel = "";
	$tupdate = "";
	$tcon = "";
	$tpackagespa = "";
	$tqa = "";
// yung edit 
					$teps = mysqli_real_escape_string($conn, $_POST["terms_policies_customization"]);
					$tips = mysqli_real_escape_string($conn, $_POST["terms_policies_budgetary_customer"]);
					$tops = mysqli_real_escape_string($conn, $_POST["terms_policies_payment"]);
					$t1ps = mysqli_real_escape_string($conn, $_POST["terms_policies_payment1"]);
					$t2ps = mysqli_real_escape_string($conn, $_POST["terms_policies_payment2"]);
					$t3ps = mysqli_real_escape_string($conn, $_POST["terms_policies_payment3"]);
					$tups = mysqli_real_escape_string($conn, $_POST["terms_policies_reschedule"]);
					$txps = mysqli_real_escape_string($conn, $_POST["terms_policies_cancellation"]);
					$typs = mysqli_real_escape_string($conn, $_POST["terms_policies_update"]);
					$tcon = mysqli_real_escape_string($conn, $_POST["terms_policies_contract"]);
					$tppaa = mysqli_real_escape_string($conn, $_POST["terms_policies_p_a_packages"]);
					$tqqaa = mysqli_real_escape_string($conn, $_POST["terms_policies_q_a"]);

					// if add button is clicked do this
					if (isset($_POST['add_terms_policies_customer'])) {
						$qry = "INSERT INTO tbl_admin_terms_policies (terms_policies_customization, terms_policies_budgetary_customer, terms_policies_payment, terms_policies_payment1, terms_policies_payment2, terms_policies_payment3, terms_policies_reschedule, terms_policies_cancellation, terms_policies_update, terms_policies_contract, terms_policies_p_a_packages, terms_policies_q_a) VALUES ('$teps', '$tips', '$tops', '$t1ps', '$t2ps', '$t3ps', '$tups', '$txps', '$typs', '$tcon', '$tppaa', '$tqqaa')"; // inserting the data into the database
						mysqli_query($conn, $qry);

						}

						elseif (isset($_POST['edit_all'])) {
							$qry = mysqli_query($conn, "UPDATE tbl_admin_terms_policies SET terms_policies_customization='".$_POST['terms_policies_customization']."',  terms_policies_budgetary_customer='".$_POST['terms_policies_budgetary_customer']."', terms_policies_payment='".$_POST['terms_policies_payment']."', terms_policies_payment1='".$_POST['terms_policies_payment1']."', terms_policies_payment2='".$_POST['terms_policies_payment2']."', terms_policies_payment3='".$_POST['terms_policies_payment3']."', terms_policies_reschedule='".$_POST['terms_policies_reschedule']."',  terms_policies_cancellation='".$_POST['terms_policies_cancellation']."',  terms_policies_update='".$_POST['terms_policies_update']."', terms_policies_contract='".$_POST['terms_policies_contract']."', terms_policies_p_a_packages='".$_POST['terms_policies_p_a_packages']."', terms_policies_q_a='".$_POST['terms_policies_q_a']."' WHERE id='".$_POST['id']."'"); // update data from database when 'edit button' is clicked
						}

					if (isset($_GET['delete'])) { 
						$qry = mysqli_query($conn, "DELETE FROM tbl_admin_terms_policies WHERE id='".$_GET['delete']."'"); // delete data from database when 'delete' is clicked

					}
					elseif (isset($_GET['edit'])) {
						$qry = mysqli_query($conn, "SELECT * FROM tbl_admin_terms_policies WHERE id='".$_GET['edit']."'");

						while ($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
							// declaration for displaying the information again from the database to textarea
							$tid = $row['id'];
							$tp = $row['terms_policies_customer'];
							$tcustomization = $row['terms_policies_customization'];
							$tbc = $row['terms_policies_budgetary_customer'];
							$tpayment = $row['terms_policies_payment'];
							$tpayment1 = $row['terms_policies_payment1'];
							$tpayment2 = $row['terms_policies_payment2'];
							$tpayment3 = $row['terms_policies_payment3'];
							$trs = $row['terms_policies_reschedule'];
							$tcancel = $row['terms_policies_cancellation'];
							$tupdate = $row['terms_policies_update'];
							$tcon = $row['terms_policies_contract'];
							$tpackagespa = $row['terms_policies_p_a_packages'];
							$tqa = $row['terms_policies_q_a'];
												}
					}
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
	<link rel="stylesheet" type="text/css" href="manage.css">
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
				
			<!-- start: Main Menu yung edit may problema -->
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
			
			<h1>Enter New Term and Policies (255 Characters Only)</h1>
			<form class="form-horizontal" action="manage.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $tid; ?>" >
			    <label for="inputtext3" class="col-sm-2 control-label"><strong>Term and policies for Customization:</strong></label>
			    <div class="col-sm-11">
			    <textarea rows="4" cols="50" name="terms_policies_customization"  maxlength="255"> <?php echo $tcustomization; ?></textarea>
			    <div class="form-group">
			    <label for="inputtext3" class="col-sm-2 control-label"><strong>Term and policies for Budgetary Customer:</strong></label>
			    <div class="col-sm-11">
			    <textarea rows="4" cols="50" name="terms_policies_budgetary_customer" maxlength="255"> <?php echo $tbc; ?></textarea>
			    <div class="form-group">
			    <label for="inputtext3" class="col-sm-2 control-label"><strong>Term and policies for Payment:</strong></label>
			    <div class="col-sm-11">
			    <textarea rows="4" cols="50" name="terms_policies_payment" maxlength="255"> <?php echo $tpayment; ?></textarea>
			    <div class="form-group">
			    <label for="inputtext3" class="col-sm-2 control-label"><strong>Term and policies for Payment 1:</strong></label>
			    <div class="col-sm-11">
			    <textarea rows="4" cols="50" name="terms_policies_payment1" maxlength="255"> <?php echo $tpayment1; ?></textarea>
			    <div class="form-group">
			    <label for="inputtext3" class="col-sm-2 control-label"><strong>Term and policies for Payment 2:</strong></label>
			    <div class="col-sm-11">
			    <textarea rows="4" cols="50" name="terms_policies_payment2" maxlength="255"> <?php echo $tpayment2; ?></textarea>
			    <div class="form-group">
				<label for="inputtext3" class="col-sm-2 control-label"><strong>Term and policies for Payment 3:</strong></label>
			    <div class="col-sm-11">
			    <textarea rows="4" cols="50" name="terms_policies_payment3" maxlength="255"> <?php echo $tpayment3; ?></textarea>
			    <div class="form-group">

			    <input type="submit" name="add_terms_policies_customer" class="btn btn-primary" value="Add">

				<input type="submit" name="edit_all" class="btn btn-primary" value="Save">
			    </div>
			  </div>
			</form>
			
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-align-justify"></i><span class="break"></span>Terms and Policies Settings</h2>
						<div class="box-icon">
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
						  <fieldset>
							<div class="container">       
							  <table class="table table-hover">
							    <thead>
							      <tr>
							        <th>Term and policies for Customization</th>
							        <th>Term and policies for Budgetary Customer</th>
							        <th>Term and policies for Payment</th>
							        <th>Term and policies for Payment 1</th>
							        <th>Term and policies for Payment 2</th>
							        <th>Term and policies for Payment 3</th>
							        <th>Action</th>
							      </tr>
							    </thead>
							    <tbody>
							      <tr>
							        <?php 	

										$qryget = "SELECT * FROM tbl_admin_terms_policies";
										$qry = mysqli_query($conn, $qryget); // query the data inside database
										while ($row=mysqli_fetch_array($qry, MYSQLI_ASSOC)) {

											echo '<td>'.$row["terms_policies_customization"].'</td>';

											echo '<td>'.$row["terms_policies_budgetary_customer"].'</td>';

											echo '<td>'.$row["terms_policies_payment"].'</td>';

											echo '<td>'.$row["terms_policies_payment1"].'</td>';

											echo '<td>'.$row["terms_policies_payment2"].'</td>';

											echo '<td>'.$row["terms_policies_payment3"].'</td>';

											echo '<td><a href="?edit='.$row['id'].'"> Edit</a> | <a href="?delete='.$row['id'].'"> Delete</td></tr>';
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
			
				<h1>Enter New Term and Policies (255 Characters Only)</h1>
			
			    <label for="inputtext3" class="col-sm-2 control-label"><strong>Term and policies for Reschedule:</strong></label>
			    <div class="col-sm-11">
			    <textarea rows="4" cols="50" name="terms_policies_reschedule" maxlength="255"> <?php echo $trs; ?></textarea>
			    <div class="form-group">
			    <label for="inputtext3" class="col-sm-2 control-label"><strong>Term and policies for Cancellation:</strong></label>
			    <div class="col-sm-11">
			    <textarea rows="4" cols="50" name="terms_policies_cancellation" maxlength="255"> <?php echo $tcancel; ?></textarea>
			    <div class="form-group">
			    <label for="inputtext3" class="col-sm-2 control-label"><strong>Term and policies for Updating Plans:</strong></label>
			    <div class="col-sm-11">
			    <textarea rows="4" cols="50" name="terms_policies_update" maxlength="255"> <?php echo $tupdate; ?></textarea>
			   	<div class="form-group">
			   	<label for="inputtext3" class="col-sm-2 control-label"><strong>Term and policies for Contract:</strong></label>
			    <div class="col-sm-11">
			    <textarea rows="4" cols="50" name="terms_policies_contract" maxlength="255"> <?php echo $tcon; ?></textarea>
			    <div class="form-group">
			    <label for="inputtext3" class="col-sm-2 control-label"><strong>Term and policies for Pricing and Availability of Packages:</strong></label>
			    <div class="col-sm-11">
			    <textarea rows="4" cols="50" name="terms_policies_p_a_packages" maxlength="255"> <?php echo $tpackagespa; ?></textarea>
			    <div class="form-group">
			    <label for="inputtext3" class="col-sm-2 control-label"><strong>Term and policies for Questions and Other Inquiries:</strong></label>
			    <div class="col-sm-11">
			    <textarea rows="4" cols="50" name="terms_policies_q_a" maxlength="255"> <?php echo $tqa; ?></textarea>
			    <div class="form-group">
			    </div>
			  </div>
			</form>


	
	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>
	
	<div class="clearfix"></div>

	<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-align-justify"></i><span class="break"></span>Terms and Policies Settings</h2>
						<div class="box-icon">
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
						  <fieldset>
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
							        <th>Action</th>
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

											echo '<td><a href="?edit='.$row['id'].'"> Edit</a> | <a href="?delete='.$row['id'].'"> Delete</td></tr>';
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
