 <?php  
include('connect.php');
session_start();
$query = "SELECT * From services_info";
 $result = mysqli_query($con, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
    <title>Reschedule</title> 
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
                    <li><a href="customer_homepage.php" style="padding-top: 25px;color: white;" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="index.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>
                     <li><a href="service_list.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Services</a></li>
            </ul>
        </div>
    </div>
    </div>
<p><br></p>
            
           <br /><br />  
           <div class="container">  
               <h1 align="center" style="font-weight: bold;">Customer Reschedule<br> <br> 
               </h1> 
                
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                          <td>#</td>
                          <td>First Name</td>
                          <td>Lastname</td>
                          <td>Address</td>
                          <td>Order Option</td>
                          <td>Date of Order</td>
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
                                    <td>'.$row["address"].'</td>  
                                     <td>'.$row["title"].'</td>
                                     <td>'.$row["start"].'</td>
                                     <td>

                                     <a href="customer_table_up.php?titi=1&id='.$row["id"].' " class="btn btn-info"><span class="glyphicon glyphicon-ok-sign"></span> My Orders</a>
                                     </td>
                             

                               </tr>  


                               ';                 
                          } 
                          }
                          ?>  

                     </table>  
                </div>  
           </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 
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

