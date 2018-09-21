<?php
include('connect.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Welcome To Pet Central</title>
   <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/jquery2.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="main.js"></script>
</head>
<body style="text-transform: capitalize;">
<div class="navbar navbar navbar-fixed-top" style="background-color: #00b3b3;color: white;">
    <div class="container-fluid">
      <div class="navbar-header">
        
        <ul class="navbar-brand" style="padding-top: 25px"></ul>
      </div>
        <ul class="nav navbar-nav">
          <li><a href="homepage.php" style="padding-top: 23px;color: white;" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <li><a href="index.php" style="padding-top: 23px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products / Services</a></li>
        </ul>
  </div>
  </div>
  <p><br></p>
  <p><br></p>
  <p><br></p>


    
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="panel panel-info">
            <div class="panel-heading" style="text-align: center;  background-color: #00b3b3; color: white;"><h4>Account Numbers & Payment Courier</h4></div>
            <div class="panel-body">
              
               
             <form>
              <label for="email"><h5>Smart Padala</h5></label>
                      <input style="text-align: center;" type="text" class="form-control" value="1234-1234-1234-1234" disabled="disabled">
                      <label for="email"><h5>BPI</h5></label>
                      <input style="text-align: center;" type="text" class="form-control" value="1234-1234-1234-1234" disabled="disabled">
                      <label for="email"><h5>BDO</h5></label>
                      <input style="text-align: center;" type="text" class="form-control" value="1234-1234-1234-1234" disabled="disabled">
                      <label for="email"><h5>Globe Gcash</h5></label>
                      <input style="text-align: center;" type="text" class="form-control" value="1234-1234-1234-1234" disabled="disabled">
<input type="button" value="Continue" onclick="window.location.href='customer_pending.php'" style="text-align: center;  background-color: #00b3b3; color: white;" />
</form>
             <form>
<input type="button" value="Back" onclick="window.location.href='Customer_profile.php'" style="text-align: center;  background-color: #00b3b3; color: white;" />

</form>



            </div>
            <div class="panel-footer"></div>
          </div>
        </div>
      </div>
    </div>


</body>
</html>
