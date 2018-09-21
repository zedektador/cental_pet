<?php 
session_start();
  if(isset( $_GET['id']) )
  {
   
    $_SESSION['id']=$_GET['id'];
  
  }


include("../connect.php");

  $product_id = "";
  
  $sql = "SELECT * FROM item";
  $run_query = mysqli_query($con , $sql);
  

  if(isset($_POST['approve'])){
    $services = $_POST['services'];

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
        $id = $_POST['txtid'];
    $payment = $_POST['payment'];
    $staff_name = $_POST['staff_name'];

    $sql = "UPDATE `item` SET `payment`='$payment', `title` = 'Cash on delivery', `staff_name` = '$staff_name' WHERE `item`.`item_id` ='{$_POST['txtids']}' ";
    $run = mysqli_query($con,$sql);

        foreach ($_POST['p_names'] as $key => $value) {

    $p_name = $_POST['p_names'][$key];
    $price = $_POST['prices'][$key];
    $qty = $_POST['qtys'][$key];



$sq1 = "INSERT INTO `history_order` (`id`, `name`, `lastname`, `address`, `p_name`, `price`, `qty`, `payment`, `title`, `staff_name`) VALUES (NULL, '$name', '$lastname', '$address', '$p_name', '$price', '$qty', '$payment', 'Cash On Delivery', '$staff_name');";
    $run = mysqli_query($con,$sq1);
}

        $sql = "DELETE FROM cart where user_id ='{$_POST['txtid']}' ";
        $query = mysqli_query($con ,$sql);

        $sql = "DELETE FROM `events` WHERE `events`.`user_id` = '{$_POST['txtid']}' ";
              $run_query = mysqli_query($con,$sql);

         $sql = "DELETE FROM `services_info` WHERE `services_info`.`order_id` = '$services' ";
              $run_query = mysqli_query($con,$sql);

           $user_id = $_SESSION["uid"];
$sql = "SELECT * FROM cart where user_id ='$user_id' ";
$query = mysqli_query($con ,$sql);


foreach($query as $row) {
$p_id = $row['p_id'];
$q = mysqli_query($con,"SELECT * FROM products WHERE product_id =  '$p_id' ");
$r = mysqli_fetch_object($q);
$stocks = $r->stocks;
$qty = $row['qty'];

$final_query = mysqli_query($con,"UPDATE products SET stocks = $stocks - $qty WHERE product_id = $p_id");
           

}
   $message="Success";
              echo "<script type='text/javascript'>alert('$message');</script>";
              echo "<script>window.location='../order_history.php';</script>";
              echo"<script>close()</script>";
  }

$titi = $_GET['id'];


if(isset($_GET["titi"])){

  $sql = "SELECT * from item where item_id='{$_GET['id']}' ";
  $run_query = mysqli_query($con,$sql);
  $row = mysqli_fetch_object($run_query);
  $product_id = $row->item_id;
  $user_id = $row->user_id;
  $name = $row->name;
  $lastname = $row->lastname;
  $address = $row->address;
  $p_name = $row->p_name;
  $payment = $row->payment;
  $price = $row->price;
  $qty = $row->qty;
  $title = $row->title;
  $staff_name = $row->staff_name;
  $start = $row->start;
}

?>
<!DOCTYPE html>
<html>
 <head>

  <title>Edit Customer Payment</title> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

      <script src="js/bootstrap.min.js"></script>     
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
            <link rel="shortcut icon" type="image/png" href="../images/logo.png"/>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <div class="navbar navbar navbar-fixed-top" style="background-color:#00b3b3;color: white;">
        <div class="container-fluid">
            <div class="navbar-header">
                
                <ul class="navbar-brand" style="padding-top: 20px"></ul>
            </div>
                <ul class="nav navbar-nav">
                    <li><a href="../admin_homepage.php" style="padding-top: 25px;color: white;" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="../admin_profile.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products / Services</a></li>
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
                <div class="panel-heading" align="center">Customers Order</div>
                <div class="panel-body">
<form method="POST">
                             <div class="row">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $name ?>" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" value="<?php echo $lastname ?>" readonly>

                                    <input type="hidden" name="lastname" class="form-control" value="<?php echo $start ?>" readonly>
                                </div>

                                <input type="hidden" name="address" value="<?php echo $address; ?>">

                            </div>




            <div class="row">     
    <div class="col-md-12">
    <div class="col-md-4"><br>
        <label for="Product Name">Product Name</label><br>
            
        </div>  

        <div class="col-md-4"><br>
            <label for="price">Product Price</label><br>
        
        </div>  

        <div class="col-md-4"><br>
            <label for="qty">Quantity</label><br>
            
        
        
        
</div>            
</div>  
</div>
<?php


$sql = "SELECT * From order_tbl where order_id = '$titi' ";
$run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query)>0){


    $i=1;
    while($row = mysqli_fetch_object($run_query)){


    ?>

    <form method="POST">
<div class="col-md-12">
    <div class="col-md-4" ><br>
        <input type="text" name="p_name" class="form-control" value="<?php echo $row->p_name; ?>" readonly="readonly" style="text-align: center;">


<input type="hidden" name="p_names[]" class="form-control" value="<?php echo $row->p_name; ?>" readonly="readonly" style="text-align: center;">


        </div>  

        <div class="col-md-4"><br>
<input type="text" name="price" class="form-control" value="<?php echo $row->price; ?>" readonly="readonly" style="text-align: center;">

<input type="hidden" name="prices[]" class="form-control" value="<?php echo $row->price; ?>" readonly="readonly" style="text-align: center;">
            
        </div>  

        <div class="col-md-4"><br>
<input type="text" name="qty" class="form-control" value="<?php echo $row->qty; ?>" readonly="readonly" style="text-align: center;">
            
<input type="hidden" name="qtys[]" class="form-control" value="<?php echo $row->qty; ?>" readonly="readonly" style="text-align: center;">
            
        </div>
        

        
</div>





<?php

}
}
?>  

<?php 
                $sql = "SELECT * FROM services_info WHERE order_id = '$titi'";
                $run = mysqli_query($con,$sql);
                $row = mysqli_fetch_object($run);

                ?>

                <input type="hidden" name="services" 

                <?php
          
                  $sql = "SELECT * From order_tbl WHERE order_id = '$titi' ";
                  $run_query = mysqli_query($con,$sql);
                  $count = mysqli_num_rows($run_query);
                  if($count > 0){
                  $no = 1;
                  $total_amount =0;
                  while($row=mysqli_fetch_array($run_query)){
                    $qty = $row["qty"];
                    $total =$row["price"];

                    $price_array = array($total);

                    $total_sum = array_sum($price_array);
                    $total_amount = ($total *$qty) +$total_amount;

                    
                  }
                }
                
                  ?>

                  <div class="row">

                    <div class="col-md-12">
                      <br> 
                <label>Total Price of Orders</label>
                <input type="number" name="half" value="<?php echo$total_amount ?>" class="form-control" readonly>
              </div>
                  </div>

                  
                                <input type="hidden" name="txtid" value="<?php echo $user_id; ?>">
                                <input type="hidden" name="txtids" value="<?php echo $product_id; ?>">
                             <div class="row">
                    <div class="col-md-12">
                      <label>Status</label>
                      <input type="text" name="title" class="form-control" value="<?php echo $title ?>" readonly>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <label>Customer Payment</label>
                      <input type="text" name="payment" class="form-control" value="<?php echo $payment ?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <label>Customer Balance</label>
                      <input type="text" class="form-control" value="<?php echo $total_amount-$payment ?>" readonly>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <label>Staff Name</label>
                      <input type="text" name="staff_name" class="form-control" placeholder = "Staff Name" value="<?php echo $staff_name ?>">
                    </div>
                  </div>


                  <p><br></p>

                  <div class="row">
                    <div class="col-md-12">
                                    <a href="../order_history.php">Back</a>
                      <input style="float: right; background-color: #e6f9ff; color: black; font-weight: bold; "  type="submit" name="approve" class="btn btn-success btn-md">
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
  <footer style="text-align: center;">
  <div class="panel-footer">
        <p>Copyright &copy Pet Central</p> 
        </div>
</footer>
</body>
</html>