<?php
include("connect.php");
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


    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="panel panel-info">
            <div class="panel-heading" style="text-align: center; background: #00b3b3;">Add Pet</div>
            <div class="panel-body">
<?php
              $uid = $_SESSION["uid"];
                  $sql = "SELECT * FROM user_info WHERE user_id = '$uid' ";
                  $run = mysqli_query($con,$sql);
                  $row = mysqli_fetch_object($run);
              ?>

<?php
;
?>

<?php

                    if(isset($_POST['mongi'])){
                    
                    $pet1 = $_POST['pet1'];
                    $pet2 = $_POST['pet2'];
                    $pet3 = $_POST['pet3'];



                    $sql = "INSERT INTO  'user_info'('pet1','pet2','pet3') VALUES (NULL,'$pet1', '$pet2', '$pet3'); ";
                    $run = mysqli_query($con,$sql);

                    if ($run) {
                      $message="Successfully Sent";
                      echo "<script type='text/javascript'>alert('$message');</script>";
                      echo"<script>close()</script>"; 
                    }
                  }

?>
              <form method="POST">

            	<label>Pet1</label>
                <input type="text" name="pet1" class="form-control">
                <label>Pet2</label>
                <input type="text" name="pet2" class="form-control">
                <label>Pet3</label>
                <input type="text" name="pet3" class="form-control">
                <br><br><br>

                <input style="float: right;" type="submit" name="mongi"  class="btn btn-success btn-lg">
                <br>
                <div class="col-md-4"><a href="customer_homepage.php">Back</a></div>

                </form>

</html>