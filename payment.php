 <?php  
include('connect.php');
session_start();
$query = "SELECT * From reserve GROUP BY start";
 $result = mysqli_query($con, $query);  

 $query2 = "SELECT * From products WHERE stocks";
 $result2 = mysqli_query($con, $query);
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
    <title>Payment</title> 
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
      <div class="navbar navbar navbar-fixed-top" style="background-color: #00b3b3;color: white;>
        <div class="container-fluid">
            <div class="navbar-header">
                
                <ul class="navbar-brand" style="padding-top: 20px"></ul>
            </div>
            <button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
        <span><img src="images/menu.png"></span>
      </button>

      <div class="collapse navbar-collapse navHeaderCollapse">
                <ul class="nav navbar-nav">
                    <li><a href="admin_homepage.php" style="padding-top: 20px;color: white;" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="admin_profile.php" style="padding-top: 20px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products / Services</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right ">



                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 20px;color: white;margin-right: 10px;"><span class="glyphicon glyphicon-user"></span>Hi Admin</a>
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

                
                <li><a href="order_history.php" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-send"></span> Customers Order</a></li>

                    <li class="divider"></li>

                <li><a href="services.php" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-wrench"></span>  Service History</a></li>

                                        <li class="divider"></li>

                                <li><a href="resched.php" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-calendar"></span>  Reschedule</a></li>

                                        <li class="divider"></li>

                                <li><a href="#" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-qrcode"></span>  Payment</a></li>

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
               <h1 align="center">Pending Order & Payment</h1> 
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                  <td>#</td>
                                    <td>First Name</td>  
                                    <td>Last Name</td>
                                    <td>Reference Number</td>
                                    <td>Payment Method</td>
                                    <td>Payment</td>
                                    <td>Claiming Option</td>
                                    <td>Date of Order</td>
                                    <td>Status</td>
                                    <td>Action</td>
 
                               </tr>  
                          </thead>  
                          <?php  
                          if(mysqli_num_rows($result)>0){
                            $i=1;

                          while($row = mysqli_fetch_array($result))  
                          {  



                               echo '  
                               <tr>  
                                  <td>'.$i++.'</td>  
                                    <td>'.$row["name"].'</td>  
                                    <td>'.$row["lastname"].'</td>
                                    <td>'.$row["acct_num"].'</td>
                                    <td>'.$row["payment_method"].'</td>
                                    <td>'.$row["payment"].'</td>
                                    <td>'.$row["claim_type"].'</td>
                                    <td>'.$row["start"].'</td>
                                    <td>'.$row["title"].' <br>

                                     <a href="approve.php?edited=1&id='.$row["id"].'" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-wrench"></span>View</a>

                                    <a href="get_void.php?edited=1&id='.$row["id"].'" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-wrench"></span>Deny</a>

                                    </td>

                            <td>
                      <a href="payment_up.php?send=1&id='.$row["id"].'" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-wrench"></span>Send message</a>

                      
                               </tr>  
                               ';  
                          } 
                          }
                          ?>  

                     </table>  
                </div>  
           </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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



                  

                              