 <?php  
include('connect.php');

 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
    <title>Service History</title> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
      <script src="js/bootstrap.min.js"></script>     
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
            <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
      </head>  
      <body>  
      <div class="navbar navbar navbar-fixed-top" style="background-color:#00b3b3;color: white;">
        <div class="container-fluid">
            <div class="navbar-header">
                
                <ul class="navbar-brand" style="padding-top: 20px"></ul>
            </div>
            <button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
        <span><img src="images/menu.png"></span>
      </button>

      <div class="collapse navbar-collapse navHeaderCollapse">
                <ul class="nav navbar-nav">
                    <li><a href="admin_homepage.php" style="padding-top: 25px;color: white" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="admin_profile.php" style="padding-top: 25px;color: white"><span class="glyphicon glyphicon-modal-window"></span> Products / Services</a></li>
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

                <li><a href="#" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-user"></span> Customer List</a></li>

                    <li class="divider"></li>

                
                <li><a href="order_history.php" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-send"></span> Customers Order</a></li>

                    <li class="divider"></li>

                <li><a href="#" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-wrench"></span>  Service History</a></li>

                                        <li class="divider"></li>

                                <li><a href="resched.php" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-calendar"></span>  Reschedule</a></li>

                                        <li class="divider"></li>

                                <li><a href="payment.php" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-qrcode"></span>  Payment</a></li>

                                        <li class="divider"></li>

                                <li><a href="report.php" style="text-decoration:none; color:#74ACB3;"><span class="   glyphicon glyphicon-list-alt"></span>  Reports</a></li>

                                        <li class="divider"></li>

                                <li><a href="void_history.php" style="text-decoration:none; color:#74ACB3;"><span class="   glyphicon glyphicon-time"></span>  Void History</a></li>

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
            
           <br /><br />  
           <div class="container">  
               <h1 align="center" style="font-weight: bold;">Service History</h1> 

                                    <!-- MODAL MAINTENANCE -->

                 <div class="row">
              <div class="col-md-12"></div>
              <div class="col-md-6">
                <div class="container">
                  <div class="row">
                  <div class="col-md-1"></div>
                    <div class="col-xs-14"><br>
                      <button class="btn btn-warning btn-md"  data-target="#addModal" data-toggle="modal" style="background-color: #e6f9ff; color: black; font-weight: bold;">Add New</button>
                      <div class="modal" id="addModal" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content animated bounceIn">
                            <div class="modal-header">
                              <button class="close" data-dismiss="modal" >&times;</button>
                              

                            </div>
                            <div class="modal-body">
<?php 
if(isset($_POST["btnn"])){

  $name = $_POST["name"];
  $lastname = $_POST["lastname"];
  $mobile = $_POST["mobile"];
  $request = $_POST["request"];
  $a_name = $_POST["a_name"];
  $pet_color = $_POST["pet_color"];
  $pet_breed = $_POST["pet_breed"];
  $complaint = $_POST["complaint"];
  $start1 = $_POST["start1"];
  $payment = $_POST["payment"];
  

  $sql = "INSERT INTO `staff_comments` (`id`, `firstname`, `lastname`, `mobile`, `request`, `a_name`, `pet_color`, `pet_breed`, `complaint`,  `start1`, `payment`, `staff_status`) VALUES (NULL, '$name', '$lastname', '$mobile', '$request', '$a_name', '$pet_color', '$pet_breed', '$complaint',  '$start1', '$payment', '1');";
  $run_query = mysqli_query($con,$sql);
  if($run_query){
    header('Refresh:0; services.php');
    
    $message="Successfully Added";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo"<script>close()</script>"; 
  }

}

?>

                        <form method="POST">

                          <div class="form-group">
                          <label>First Name</label>
                  <input type="text" name="name" class="form-control">

                          </div>

                          <div class="form-group">
                          <label>Last Name</label>
                  <input type="text" name="lastname" class="form-control">

                          </div>

                          <div class="form-group">
                          <label>Contact Number</label>
                  <input type="number" name="mobile" class="form-control">

                          </div>

                          
                          <div class="form-group">
                          <label>Pet Name</label>
                  <input type="text" name="a_name" class="form-control" placeholder="Pet Name">

                          </div>
                          <div class="form-group">
                          <label>Pet Color</label>
                  <input type="text" name="pet_color" class="form-control" placeholder="Pet Color">

                          </div>

                          <div class="form-group">
                          <label>Pet Breed</label>
                  <input type="text" name="pet_breed" class="form-control" placeholder="Pet Breed">

                          </div>

                          <?php
                      $sql = "SELECT * From gender";
                      $run_query = mysqli_query($con,$sql);
                      
                      ?>

              

              <div class="row">
                <div class="col-md-6">
                  <label>Gender</label>
                  <select id="complaint" name="complaint" class="form-control">
                        <option>Select Gender</option>
                    
                      <?php while ($row = mysqli_fetch_object($run_query)): ; ?>

                      <option><?php echo $row->gender; ?></option>

                      <?php endwhile; ?>

                      </select>
                      </div>
              </div>

                          <div class="form-group">
                          <label>Date of Service</label>
                  <input type="date" name="start1" class="form-control" value="<?php echo date('Y-m-d',strtotime('+ 0 days'))?>" readonly>

                          </div>

                          <div class="form-group">
                          <label>Payment</label>
                  <input type="number" name="payment" class="form-control">

                          </div>

                          <!--<div class="form-group">
                          <label>Complaints</label>
                  <input type="text" name="complaint" class="form-control" placeholder="Complaints">

                          </div>-->

                     <?php
                      $sql = "SELECT * From pet_services";
                      $run_query = mysqli_query($con,$sql);
                      
                      ?>

                          <div class="row">
                           <div class="col-md-6">
                              <label>Services</label>
                              <select id="request" name="request" class="form-control">
                                    <option>Select Services</option>
                                
                                  <?php while ($row = mysqli_fetch_object($run_query)): ; ?>

                                  <option><?php echo $row->serv_name; ?></option>

                                  <?php endwhile; ?>

                                  </select>
                        </div>
                      </div><br>

                          <br><br>
        


                          <div class="form-group">
                          
                 

                          </div>

                            </div>

                            <div class="modal-footer">
                          <input type="submit" name="btnn" value="Submit" class="btn btn-primary">
                              <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
  </form>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>  
          </div>
                                  <!-- END of MODAL MAINTENANCE -->

                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                  <td>#</td>
                                    <td>First Name</td>  
                                    <td>Last Name</td>
                                    <td>Mobile Number</td> 
                                    <td>Pet Name</td>
                                    <td>Pet Color</td>
                                    <td>Pet Breed</td>
                                    <td>Pet Gender</td>
                                    <td>Date Of Reservation</td>
                                    <td>Date Of Service</td>
                                    <td>Payment</td>
                                    <td>Request</td> 
                                    <td></td>

 
                               </tr>  
                          </thead>  
                          <?php  
                          $query = "SELECT * From staff_comments";
                          $result = mysqli_query($con, $query);  
                          if(mysqli_num_rows($result)>0){
                            $i=1;

                          while($row = mysqli_fetch_array($result))  
                          {  



                               echo '  
                               <tr>  
                                  <td>'.$i++.'</td>  
                                    <td>'.$row["firstname"].'</td>  
                                    <td>'.$row["lastname"].'</td>
                                    <td>'.$row["mobile"].'</td>
                                    <td>'.$row["a_name"].'</td>
                                    <td>'.$row["pet_color"].'</td>
                                    <td>'.$row["pet_breed"].'</td>
                                    <td>'.$row["complaint"].'</td>
                                    <td>'.$row["start"].'</td>
                                    <td>'.$row["start1"].'</td>
                                    <td>'.$row["payment"].'</td>
                                    <td>'.$row["request"].'</td>


                                    <td> 

                                    <a href="services_up.php?titi=1&id='.$row["id"].' " class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span> View</a>
                                     </td>
                             

                                    </td>
                               </tr>  


                               ';  
                          } 
                          }
                          ?>  

                     </table>  
                </div>  
           </div>  <br><br><br><br>
           <footer style="text-align: center;">
  <div class="panel-footer">
        <p>Copyright &copy Pet Central</p> 
        </div>
</footer>   
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  



