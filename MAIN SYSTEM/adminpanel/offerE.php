<?php 
session_start();
	error_reporting(0);
	include '../INCLUDES/database-connection.php';

	$eid = "";
  $ename= "";
  $edesc = "";
  $epicture = "";

  $ename = mysqli_real_escape_string($conn, $_POST["event_name"]);
   $edesc = mysqli_real_escape_string($conn, $_POST["event_description"]);
        $epicture = $_FILES['event_picture']['name'];

        if (isset($_POST['add_event'])) {
          $qry = "INSERT INTO tbl_admin_offered_event (event_name,event_description,event_picture) VALUES ('$ename','$edesc', '$epicture')";
          mysqli_query($conn, $qry);

          $file = $_FILES['event_picture']['name'];
          $tmp_name = $_FILES['event_picture']['tmp_name'];
          $path = "event-images/".$file;
          move_uploaded_file($tmp_name, $path);

        }
              elseif (isset($_POST['edit_event_btn'])) {
            $qry = mysqli_query($conn, "UPDATE tbl_admin_offered_event SET event_name='".$_POST['event_name']."', event_description='".$_POST['event_description']."', event_picture='".$_FILES['event_picture']['name']."' WHERE id='".$_POST['id']."'"); // update data from database when 'edit button' is clicked

              $file = $_FILES['event_picture']['name'];
          $tmp_name = $_FILES['event_picture']['tmp_name'];
          $path = "event-images/".$file;
          move_uploaded_file($tmp_name, $path);
          }

        if (isset($_GET['delete'])) { 
          $qry = mysqli_query($conn, "DELETE FROM tbl_admin_offered_event WHERE id='".$_GET['delete']."'"); // delete data from database when 'delete' is clicked
          if ($qry) {
            unlink("event-images/".$_GET['event_picture']); //delete picture
          }


        }
        elseif (isset($_GET['edit'])) {
          $qry = mysqli_query($conn, "SELECT * FROM tbl_admin_offered_event WHERE id='".$_GET['edit']."'");

          while ($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {

            $eid = $row['id'];
            $ename = $row['event_name'];
            $edesc = $row['event_description'];
            $epicture = $row['event_picture'];

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
	<link rel="stylesheet" type="text/css" href="offeredE.css">
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
				            <li><a href="venue.php">Venue Setting</a></li>
				            <li><a href="package.php">Package Settings</a></li>
				  
				          </ul>
				        </li>
						<li><a href="login.php"><i class="icon-lock"></i><span class="hidden-tablet"> Login Out</span></a></li>
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
			
			<h1>Event Details</h1>
			<form class="form-horizontal" action="offerE.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
			    <label for="inputtext3" class="col-sm-2 control-label"><strong>Enter Event Type:</strong></label>
			    <div class="col-sm-11">
			      <input type="text" name="event_name" value="<?php echo $ename; ?>" class="form-control" id="inputtext3" placeholder="Event Type" required>
			    </div>
			    <label for="inputtext3" class="col-sm-2 control-label"><strong>Enter Event Description:</strong></label>
			    <div class="col-sm-11">
			      <textarea type="text" name="event_description"  class="form-control" id="inputtext3" placeholder="Event Description" required><?php echo $edesc; ?></textarea>
			    </div>
			     <div class="form-group">
			     <label for="inputtext3" class="col-sm-2 control-label"><strong>Input Files</strong></label>
			     <input type="hidden" name="id" value="<?php echo $eid; ?>" >
				    <input type="file" name="event_picture" accept="image/*" value="<?php echo $epicture; ?>" id="exampleInputFile">
				  </div>
				  <input type="submit" name="add_event" class="btn btn-primary" value="Add">
				   <input type="submit" name="edit_event_btn" class="btn btn-primary" value="Save">
					
			  </div>
			</form>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-align-justify"></i><span class="break"></span>Offered events Settings</h2>
						<div class="box-icon">
				
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
						  <fieldset>
							<div class="container">       
							 <table class="table table-hover">
							    <thead>
							      <tr>
							        <th>Event Type</th>
							        <th>Event Description</th>
							        <th>Event Photo</th>
							        <th>Action</th>
							      </tr>
							    </thead>
							    <tbody>
							      <tr>
							        <?php 
							            $qry = mysqli_query($conn, "SELECT * FROM tbl_admin_offered_event"); // query the data inside database
							            while ($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)) {
							              echo '<tr><td>'.$row["event_name"].'</td>';

							              echo '<td>'.$row["event_description"].'</td>';


							              echo '<td> <img src="event-images/' . $row["event_picture"]. '"style=width:200px; height:200px;"/> </td>';

							              echo '<td><a href="?edit='.$row['id'].'&event_picture='.$row["event_picture"].'"> Edit</a> | <a href="?eview='.$row['id'].'"></a> <a href="?delete='.$row['id'].'&event_picture='.$row["event_picture"].'"> Delete</td></tr>';
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
