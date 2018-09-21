 <?php  
include('connect.php');
$query = "SELECT * From membership_tbl";
 $result = mysqli_query($con, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
    <title>Pet Central</title> 
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



                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-user" style="color: white;"></span>Hi Admin</a>
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

                <li><a href="services.php" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-wrench"></span>  Service History</a></li>

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

                    </div>
                        </ul>
                    </li>
                </ul>
        </div>
    </div>


    
<p><br></p>
<p><br></p>
            
           <br /><br />  
           <div class="container">  
               <h1 align="center">Pending Membership</h1> 
                

                          

               <!--<div class="row">
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
                              <h4 class="modal-title" style="text-align: center;">Maintenance</h4>

                            </div>
                            <div class="modal-body"> 
<?php 
if(isset($_POST["btnn1"])){

  $name = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $mobile = $_POST["mobile"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $pet1 = $_POST["pet1"];
  $pet2 = $_POST["pet2"];
  $pet3 = $_POST["pet3"];

  $sql = "INSERT INTO `membership_tbl` (`member_id`, `firstname`, `lastname`, `mobile`, `address`, `email`, `pet1`, `pet2`,`pet3`) VALUES (NULL, '$name', '$lastname', '$mobile', '$address', '$email', '$pet1', '$pet2', '$pet3');";
  $run_query = mysqli_query($con,$sql);
  if($run_query){
    header('Refresh:0; membership_list.php');
    
    $message="Successfully Added";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo"<script>close()</script>"; 
  }

}

?>

 <form method="POST">

                          <div class="form-group">
                          <label>First Name</label>
                  <input type="text" name="firstname" class="form-control">

                          </div>

                          <div class="form-group">
                          <label>Last Name</label>
                  <input type="text" name="lastname" class="form-control">

                          </div>

                          <div class="form-group">
                          <label>Email</label>
                  <input type="text" name="email" class="form-control">

                          </div>

                          <div class="form-group">
                          <label>Contact Number</label>
                  <input type="text" name="mobile" class="form-control">

                          </div>

                          <div class="form-group">
                          <label>Address</label>
                  <input type="text" name="address" class="form-control">

                          </div>

                          <div class="form-group">
                          <label>Pet 1</label>
                  <input type="text" name="pet1" class="form-control" placeholder="Pet Name">

                          </div>

                          <div class="form-group">
                          <label>Pet 2</label>
                  <input type="text" name="pet2" class="form-control" placeholder="Pet Name">

                          </div>

                          <div class="form-group">
                          <label>Pet 3</label>
                  <input type="text" name="pet3" class="form-control" placeholder="Pet Name">

                          </div>



                          <div class="form-group">
                          <label>Date Of Application</label>
                  <input type="date" name="start" class="form-control" value="<?php echo date('Y-m-d',strtotime('+ 0 days'))?>" readonly>

                          </div>





                            <div class="modal-footer">
                          <input type="submit" name="btnn1" value="Submit" class="btn btn-primary">
                              <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
  </form>


                        </div>
                     
                   
                  </div>
                </div>
              </div>  
          </div>-->


 </br>
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">
                          <thead>  
                               <tr>  
                                  <td>#</td>
                                    <td>First Name</td>  
                                    <td>Last Name</td>  
                                    <td>Email</td> 
                                    <td>Account Number</td> 
                                    
                                    <td>Date Of Application</td>
                                    <td>Payment</td>
                                    <td>Action</td>  
                                    <td></td> 
 
                               </tr>  </tr>
                          </thead>  
                          <?php  
                          if(mysqli_num_rows($result)>0){
                            $i=1;

                          while($row = mysqli_fetch_array($result))  
                          {  



                               echo '  
                               <tr>  
                                  <td>'.$i++.'</td>  
                                    <td>'.$row["firstname"].'</td>  
                                    <td>'.$row["lastname"].'</td>
                                    <td>'.$row["email"].'</td>
                                    <td>'.$row["acct_num"].'</td>
                                    
                                    <td>'.$row["start"].'</td>
                                    <td>'.$row["payment"].'</td>  
                                    
                        <td>

      <a href="member_delete_update.php?edited1=1&id='.$row["member_id"].'" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
      <a href="member_delete_update.php?delete1=1&id='.$row["member_id"].'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>

              </td>   
                               </tr>  


                               ';  
                          } 
                          }
                          ?>  

                     </table>  
                </div>  
           </div> <br><br><br><br><br><br><br><br><br><br>
           <footer>
             <div class="panel-footer" style="text-align: center;">
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