<?php
include('connect.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>G.C.P Aircon Services</title>
  <link rel="shortcut icon" type="image/png" href="images/weblogo.png"/>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/jquery2.js"></script>
  <script src="js/bootstrap.min.js"></script><
  <script src="main.js"></script>
 </head>
 <style>
 .row{
  margin-bottom: 10px;
 }
 </style>
 <body>
 <div class="navbar navbar navbar-fixed-top" style="background-color: #505e67;color: white;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="customer_homepage.php" class="navbar-brand"><img src="images/andrei.png" width="125" height="35" ></a>
        <ul class="navbar-brand" style="padding-top: 20px"></ul>
      </div>
      <button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
        <span><img src="images/menu.png"></span>
      </button>

      <div class="collapse navbar-collapse navHeaderCollapse">
        <ul class="nav navbar-nav">
          <li><a href="customer_homepage.php" style="padding-top: 20px;color: white;" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <li><a href="customer_profile.php" style="padding-top: 20px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Aircons</a></li>
       <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;color: white;padding-top: 5px;"></span></a>
       <ul class="dropdown-menu"></ul>
       </li>
  <br /><br />
    </ul>
      </div>
    </div>
    </div>
    <p><br></p>
    <p><br></p>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4"></div>
            <div class="col-md-5">
              <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center;font-weight: bold;" >Reserve Order</div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-12">
                      <form method="post" id="comment_form">
<?php 

session_start();
  

if(isset($_POST["post"])){

  $name =$_POST['name'];
  $lastname =$_POST['lastname'];
  $mobile =$_POST['mobile'];
  $address =$_POST['a_delivery'];
  $p_name =$_POST['p_name'];
  $qty =$_POST['qty'];
  $price =$_POST['price'];
  $start = $_POST["start"];
  $payment = $_POST["payment"];
  $title = $_POST['title'];
  $color =$_POST['color'];

$sql = "INSERT INTO `events` (`id`, `name`, `lastname`, `mobile`, `address`, `p_name`, `qty`, `price`, `payment`, `title`, `color`, `start`, `end`) VALUES (NULL, '$name', '$lastname', '$mobile', '$address', '$p_name', '$qty', '$price', '$payment', '$title', '$color', '$start', '$end');";
$run = mysqli_query($con,$sql);


$user_id = $_SESSION["uid"];
$sql = "SELECT * FROM cart where user_id ='$user_id' ";
$query = mysqli_query($con ,$sql);


foreach($query as $row) {
$p_id = $row['p_id'];
$q = mysqli_query($con,"SELECT * FROM products WHERE product_id = $p_id");
$r = mysqli_fetch_object($q);
$stocks = $r->stocks;
$qty = $row['qty'];

$final_query = mysqli_query($con,"UPDATE products SET stocks = $stocks - $qty WHERE product_id = $p_id");

  header('Refresh:0;customer_profile.php');
    
  }
}


?>
  <h3 style="text-align: center;"><b>Customer Information</b></h3>
<?php

                
                $user_id = $_SESSION["uid"];
                $sql = "SELECT * From user_info where user_id = $user_id ";
                  $run_query = mysqli_query($con,$sql);
                    if(mysqli_num_rows($run_query)>0){

                  $i=1;
              
                while($row = mysqli_fetch_object($run_query)){

            ?>
              
            <form method="post" id="comment_form">
                    <div class="row">
                    <div class="col-md-6">
                      <label for="firstname">Fistname</label>
                      <input type="text" id="name" name="name" class="form-control" value="<?php echo $row->firstname; ?>" readonly>
                    </div>
                  
                  
                    <div class="col-md-6">
                      <label for="lastname">Lastname</label>
                      <input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $row->lastname; ?>" readonly>
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="col-md-12">
                      <label for="mobile">Mobile Number</label>
                      <input type="text" id="mobile" name="mobile" class="form-control" value="<?php echo $row->mobile; ?>" readonly>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <label for="address">Address</label>
                      <input type="text" id="address" name="address" class="form-control" value="<?php echo $row->address; ?>" readonly>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                      <label for="address">Delivery Address :</label>
                      <input type="text" name="a_delivery" id="a_delivery" required="required" placeholder="Delivery Address" class="form-control" >
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="Order Detail">Order Option :</label>
                      <input type="text" name="title" id="title" value="<?php echo $row->order_option; ?>" class="form-control" readonly>
                    </div>
                  

                    
                  <div class="col-md-4">
                    <label for="color">Color : </label>
                     <select name="color" id="color" class="form-control" readonly>

                  <option  style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
              
                  </select>
                    
                    </div>
                  

                    
                    <div class="col-md-4">
                      <label for="Order Detail">Order Date :</label>
                      <input type="date" name="start" class="form-control" value="<?= date('Y-m-d',strtotime('+ 8 days'))?>" ><p><br></p>
                    </div>
                    </div>





<?php
}
}
?>  
                <?php
                $user_id = $_SESSION["uid"];
                $sql ="SELECT * FROM cart where user_id = '$user_id' ";
                $run = mysqli_query($con,$sql);
                $row = mysqli_fetch_object($run);
                ?>

                <div class="row">
                    <div class="col-md-6">
                      <label for="name">Aircon Name</label>
                      <input type="text" id="p_name" name="p_name" class="form-control" value="<?php echo $row->product_title; ?>" readonly>
                    </div>
                  
                  
                    <div class="col-md-6">
                      <label for="qty">Quantity</label>
                      <input type="text" id="qty" name="qty" class="form-control" value="<?php echo $row->qty; ?>" readonly>
                    </div>
                  </div>


                  <?php
                  $uid = $_SESSION["uid"];
                  $sql = "SELECT * From cart WHERE user_id = '$uid' ";
                  $run_query = mysqli_query($con,$sql);
                  $count = mysqli_num_rows($run_query);
                  if($count > 0){
                  $no = 1;
                  $total_amount =0;
                  while($row=mysqli_fetch_array($run_query)){
                    $pro_price = $row["price"];
                    $total =$row["total_amount"];
                    $total =$row["total_amount"];
                    $price_array = array($total);

                    $total_sum = array_sum($price_array);
                    $total_amount = $total_amount + $total_sum;

                    
                  }
                }
                
                  ?>

                <div class="row">
                    <div class="col-md-12">
                      <label for="price">Total Ammount</label>
                      <input type="text" id="price" name="price" class="form-control" value="<?php echo $total_amount; ?>" readonly>
                    </div>
                  </div>

                      <p><br></p>

                <h3 style="text-align: center;"><b>Customers Payment</b></h3>
                  <h5>______________________Half Price of the Product______________________</h5>
                  <p><br></p>
                      
                  <div class="row">
                    <div class="col-md-12">
                      <label for="email" style="margin-left: 110px">Credit Card Number of GCP Aircon Services </label>
                      <input style="text-align: center;" type="text" class="form-control" value="5210-6902-8630-3626" disabled="disabled">
                    </div>
                  </div>

                <div class="row">
                    <div class="col-md-12">
                      <label for="payment" style="margin-left: 185px">Customer Payment</label>
                      <input style="text-align: center;" type="text" id="payment" name="payment" class="form-control" placeholder="Payment">
                    </div>
                  </div><br>

                    <div class="row">
                    <div class="col-md-12">

      <a href="order.php"><b>Back</b></a>

                      
      
                      <input style="float:right;" type="submit" value="Submit Orders" name="post" id="post" class="btn btn-success btn-lg">
                      <br>
                      
                      </div>
                        </div>
                      </form>

                   </div>
                
                </div>
             </div>
          </div>
        </div>
     </div>
   </div>


<footer>
  <div class="panel-footer" style="text-align: center;">
  <p>Copyright &copy GCP Aircon Services</p>
  </div>
</footer>
 </body>
</html>
<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#title').val() != '' && $('#name').val() != '' && $('#lastname').val() != '' && $('#mobile').val() != '' && $('#a_delivery').val() != '' && $('#p_name').val() != '' && $('#qty').val() != '' && $('#price').val() != '' && $('#payment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
