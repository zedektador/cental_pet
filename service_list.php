 <?php  
include('connect.php');



$query = "SELECT * From pet_services WHERE service_status = 'Available' ";
 $result = mysqli_query($con, $query);

if(isset($_POST["btndel"])){
  $services_name = $_POST["serv_name"];
  $service_desc = $_POST["serv_desc"];
  $services_price = $_POST["serv_price"];

    $sql = "DELETE FROM `pet_services` WHERE `pet_services`.`serv_id` = '{$_POST['txtid']}' ";
              $run_query = mysqli_query($con,$sql);
}

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
                    <li><a href="customer_profile.php" style="padding-top: 25px;color: white"><span class="glyphicon glyphicon-modal-window"></span> Products / Services</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right ">



                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-user" style="padding-top: 4px"></span> Hi <?php echo $_SESSION["name"] ; ?></a>
            <ul class="dropdown-menu">
                <li><a href="cart.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</a></li>

                    <li class="divider"></li>

                <li><a href="customer_maintenance.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-tasks"></span>  Services</a></li>

                    <li class="divider"></li>


                

                <li><a href="payment_account.php" style="text-decoration:none; color:#74ACB3;"><span class="  glyphicon glyphicon-tasks"></span>  Payment</a></li>

                    <li class="divider"></li>


                <li><a href="#" style="text-decoration:none; color:#74ACB3;">Change Password</a></li>

                    <li class="divider"></li>


                <li><a href="customer_logout.php" style="text-decoration:none; color:#74ACB3;">Log-Out</a></li>
                    <li class="divider"></li>
            </ul>
          </li>
        </div>
    </div>
    </div>

    
<p><br></p>
<p><br></p>
            
           <br /><br />  
           <div class="container">  
               <h1 align="center" style="font-weight: bold;">Service History</h1> 

                                    <!-- MODAL MAINTENANCE -->

              
                                  <!-- END of MODAL MAINTENANCE -->

                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                  <td>#</td>
                                    <td>Service Name</td>  
                                    <td>Service Description</td>
                                    <td>Service Price</td> 
                                    <td>Status</td>
                                    <td></td>

 
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
                                    <td>'.$row["serv_name"].'</td>  
                                    <td>'.$row["serv_desc"].'</td>
                                    <td>'.$row["serv_price"].'</td>
                                    <td>'.$row["service_status"].'</td>

                                    <td> 

                                    <a href="service_account.php? " class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span> Book Reservation</a>
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



