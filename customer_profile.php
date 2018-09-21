<?php 
include("connect.php");


	if(!isset($_SESSION["uid"])){
		header("Location: index.php");
	}

	?>
<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>Products & Services</title>
	 <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script><
	<script src="customer_main.js"></script>
	<style type="text/css">
	.title_pro{
	  text-overflow: ellipsis;
	  cursor: pointer;
	  overflow:hidden;
	  white-space: nowrap;
	}
	.title_pro:hover{
	  overflow: visible; 
	  white-space: normal;
	  height:auto; /* just added this line */
	}
	</style>
</head>
<style>
	body, header{
		padding: 0;
		margin: 0;
	}
</style>
<body style="text-transform: capitalize; font-family: sans-serif; font-size: 150%;">	
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
					<li><a href="customer_profile.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>
					<li><a href="service_list.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Services</a></li>
					<li style="width:300px; left:10px; top: 10px; padding-top: 4px;"><input type="text" class="form-control" id="search"></li>
					<li style="top: 10px; left: 20px; padding-top: 4px;"><button type="submit" class="btn btn-primary" name="Search" id="search_btn" style="background-color: #e6f9ff; color: black; font-weight: bold;"> Search</button></li>

					
				</ul>


					<ul class="nav navbar-nav navbar-right ">

		  <!-- Notification -->

		  <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 28px;color: white;" id="toggles"><span class="label label-pill label-danger count" id="countss" style="border-radius:10px;"></span><span class="glyphicon glyphicon-envelope"> Status</span></a>
       <ul class="dropdown-menu" id="menus"></ul>
       </li>


       <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 28px;color: white;" id="toggle"><span class="label label-pill label-danger count" id="counts" style="border-radius:10px;"></span><span class="glyphicon glyphicon-envelope"> </span></a>
       <ul class="dropdown-menu" id="menu"></ul>
       </li>

       
       
          <!-- Notification -->

					<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-shopping-cart" style="padding-top: 4px"></span>Cart <span class="badge">0</span> </a>
							<div class="dropdown-menu" style="width:400px;">
							<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">No.</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price ₱</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">No.</div>
									<div class="col-md-3">Aircon Image</div>
									<div class="col-md-3">Aircon Name</div>
									<div class="col-md-3">Price ₱</div>
								</div> -->
								</div>
							</div>			
							<div class="panel-body"></div>

						</div>
						</div>
					</li>


				 	<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-user" style="padding-top: 4px"></span> Hi <?php echo $_SESSION["name"] ; ?></a>
				 		<ul class="dropdown-menu">
				 				<li><a href="cart.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</a></li>

				 						<li class="divider"></li>

				 				<li><a href="customer_maintenance.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-tasks"></span>  Services</a></li>

				 						<li class="divider"></li>


				 				

				 				<li><a href="payment_account.php" style="text-decoration:none; color:#74ACB3;"><span class="	glyphicon glyphicon-tasks"></span>  Payment</a></li>

				 						<li class="divider"></li>


				 				<li><a href="#" style="text-decoration:none; color:#74ACB3;">Change Password</a></li>

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
<p><br></p>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-body">
							<?php
date_default_timezone_get("Asia/Manila");
$user_id = $_SESSION["uid"];
$query = "SELECT * From reserve where user_id = $user_id";
 $result = mysqli_query($con, $query);  

 while($row = mysqli_fetch_array($result)){
  $id = $row['user_id'];
  $start = $row['start'];
  $date_today = date('Y-M-d',strtotime('- 3 days'));

  $exp = strtotime($start);
  $dt=strtotime($date_today);



  if($exp>$dt){ 

    $sql = "UPDATE `reserve` SET  `title` = 'Pending' ,`void_msg` = 'Will Expire SOON!!', `void` = '1' WHERE `reserve`.`user_id` = '$id' ";
  $run = mysqli_query($con ,$sql);

    $diff=$dt-$exp;
    $days =abs(floor($diff / (60 * 60 * 24)));
      echo "<p style='font-size: 20px;' align='center'><b>Your reservation will expire at $days days</b></p>";

    }else{
      
      $sql = "UPDATE `reserve` SET  `title` = 'Void' ,`void_msg` = 'is Expired', `void` = '0' WHERE `reserve`.`user_id` = '$id' ";
    $run = mysqli_query($con,$sql);

      $diff=$dt-$exp;
    $days =abs(floor($diff / (60 * 60 * 24)));

      echo "<p style='font-size: 20px;' align='center'><b>Your reservation expire $days days ago and admin will  delete your order</b></p>";
    }
  
 }
?>

						</div>
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-2">
					<div id="get_category"> 
					</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Aircon </h4></a></li>
					<li><a href="#">Aircon types</a></li>
					<li><a href="#">Aircon types</a></li>
					<li><a href="#">Aircon types</a></li>
					<li><a href="#">aircon types</a></li>
					<li><a href="#">aircon types</a></li>
				</div> -->
				<br><br>
				<!--<div id="get_brand">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brand</h4></a></li>
					<li><a href="#">Services</a></li>
					<li><a href="#">Services</a></li>
					<li><a href="#">Services</a></li>
				</div> --> 
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12" id="product_msg">
						
					</div>
					
				</div>
				<div class="panel panel-info">
					<div class="panel-heading" style="background-color: #00b3b3; color: white;">Products</div>
					<div class="panel-body">
					<div id="get_product">
							<!-- Here we get product jquery Ajax Request-->
						</div>
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Split Type</div>
								<div class="panel-body">
									<img src="image/panasonic_cs_1.5hp.jpg"/>
								</div>
								<div class="panel-heading">₱28,798.00
								<button style="float: right;" class="btn btn-danger btn-xs">Add to Cart</button>
								</div>
							</div> 
						</div> -->
					</div>
				</div>
			<div class="col-md-1"></div>
		</div>

<div class="container">
      <section>
        <div class="page-header" id="contact">
          <h2>Contact Us</h2>
        </div>

        <div class="row">
          <div class="col-md-4">
            <p>Send us a message, or contact us from the address below</p>
            </br>
            <address>
              <strong>Pet Central</strong></br>
            
             1720 B Piy Margal St. Corner Vicente Cruz St. Sampaloc
              Manila, <br>Philippines 1014</br>
              <br>
              09951363092 / 241-7770
            </address>
          </div>

          <div class="col-lg-8">
            <form action="" class="form horizontal">
              <div class="form-group">
                <label for="user-name" class="col-lg-2 control-label">Name</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="user-name" placeholder="Enter your name">
              </div>
              </div>
              &nbsp
              <div class="form-group">
                <label for="user-email" class="col-lg-2 control-label">Email</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="user-email" placeholder="Enter your email">
              </div>
              </div>
              &nbsp
              <div class="form-group">
                <label for="user-message" class="col-lg-2 control-label">Message</label>
              <div class="col-lg-10">
                <textarea name="user-message" id=user-message class="form-control" cols="20" rows="10" placeholder="Enter your Message"></textarea>
              </div>
              </div>
              &nbsp
              <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary">Send Message</button>
              </div>
              </div>  
            </form>
          </div>
        </div>
      </section>
    </div><br>

  
  <footer style="text-align: center;">
  <div class="panel-footer">
        <p>Copyright &copy Pet Central</p> 
        </div>
</footer>     
</body>
</html>

<script>
  $(document).ready(function(){
     function load(views = '')
 {
  $.ajax({
   url:"customer_fetch.php",
   method:"POST",
   data:{views:views},
   dataType:"json",
   success:function(data)
   {
    $('#menu').html(data.notifications);
    if(data.unseen_notifications > 0)
    {
     $('#counts').html(data.unseen_notifications);
    }
   }
  });
 }
  load();

 $(document).on('click', '#toggle', function(){
  $('#counts').html('');
  load('yes');
 });
 
 setInterval(function(){ 
  load();; 
 }, 5000);

  });
</script>

<script>
  $(document).ready(function(){
     function load(views = '')
 {
  $.ajax({
   url:"deliver.php",
   method:"POST",
   data:{views:views},
   dataType:"json",
   success:function(data)
   {
    $('#menus').html(data.notifications);
    if(data.unseen_notifications > 0)
    {
     $('#countss').html(data.unseen_notifications);
    }
   }
  });
 }
  load();

 $(document).on('click', '#toggles', function(){
  $('#countss').html('');
  load('yes');
 });
 
 setInterval(function(){ 
  load();; 
 }, 5000);

  });
</script>