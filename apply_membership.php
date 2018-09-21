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


    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="panel panel-info">
            <div class="panel-heading" style="text-align: center;">Membership Form</div>
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

                  if(isset($_POST['tite'])){
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $email = $_POST['email'];
                    $mobile = $_POST['mobile'];
                    $address = $_POST['address'];
                    $pet1 = $_POST['pet1'];
                    $pet2 = $_POST['pet2'];
                    $pet3 = $_POST['pet3'];


                    $sql = " INSERT INTO `pet_central`.`membership_tbl` (`member_id`, `firstname`, `lastname`, `email`, `mobile`, `address`, `pet1`, `pet2`, `pet3`) VALUES (NULL, '$firstname', '$lastname', '$email', '$mobile', '$address', '$pet1', '$pet2', '$pet3'); ";
                    $run = mysqli_query($con,$sql);

                    if ($run) {
                      $message="Successfully Sent";
                      echo "<script type='text/javascript'>alert('$message');</script>";
                      echo"<script>close()</script>"; 
                    }
                  }


              ?>

              <form method="POST">
              
              <div class="row">
                <div class="col-md-6">
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $row->firstname ?>" readonly>
                </div>
                <div class="col-md-6">
                  <label>Last Name</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $row->lastname ?> " readonly>
                
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $row->email ?>" readonly>
                <label>Mobile</label>
                <input type="number" name="mobile" class="form-control" value="<?php echo $row->mobile ?>" readonly>
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $row->address ?>" readonly>
                <label>Pet1</label>
                <input type="text" name="pet1" class="form-control" value="<?php echo $row->pet1 ?>" readonly>
                <label>Pet2</label>
                <input type="text" name="pet2" class="form-control" value="<?php echo $row->pet2?>" readonly>
                <label>Pet3</label>
                <input type="text" name="pet3" class="form-control" value="<?php echo $row->pet3 ?>" readonly>
  
                <br><br>

                <input style="float: right;" type="submit" name="tite" class="btn btn-success btn-lg">
                <div class="col-md-4"><a href="customer_homepage.php">Back</a></div>


                </div>
              </div>
                
              </form>


            </div>
            <div class="panel-footer"></div>
          </div>
        </div>
      </div>
    </div>


</body>
</html>
