
<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>Pet Central</title>
	 <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script><
	<script src="admin_main.js"></script>
</head>
<body style="text-transform: capitalize;">	
<div class="navbar navbar navbar-fixed-top" style="background-color: #00b3b3;color: white;">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="staff_homepage.php" class="navbar-brand"><img src="images/logo.png" width="125" height="35" ></a>
				<ul class="navbar-brand" style="padding-top: 20px"></ul>
			</div>
				<ul class="nav navbar-nav">
					<li><a href="staff_homepage.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="staff_profile.php" style="padding-top: 23px;color: white;"<span class="glyphicon glyphicon-modal-window"></span> Products</a></li>
					
					<li><a href="service_list.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Services</a></li>
					<li style="width:300px; left:10px; top: 10px; padding-top: 4px;"><input type="text" class="form-control" id="search"></li>
					<li style="top: 10px; left: 20px; padding-top: 4px;"><button type="submit" class="btn btn-primary" name="Search" id="search_btn"> Search</button></li>
				</ul>


					<ul class="nav navbar-nav navbar-right ">



				 	<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-user"></span>Hi Staff</a>
				 		<ul class="dropdown-menu">



				 				<li><a href="omg/staff_order_date.php" style="text-decoration:none; color:#74ACB3;"><span class="glyphicon glyphicon-calendar"></span> Date of Order </a></li>

                    					<li class="divider"></li>

				 				
				 				<li><a href="staff_order_history.php" style="text-decoration:none; color:#74ACB3;"><span class="	glyphicon glyphicon-send"></span> Order History</a></li>

				 						<li class="divider"></li>

				 				<li><a href="staff_request.php" style="text-decoration:none; color:#74ACB3;"><span class="	glyphicon glyphicon-tasks"></span> Services</a></li>

				 						<li class="divider"></li>


				 				<li><a href="customer_logout.php" style="text-decoration:none; color:#74ACB3;">Log-Out</a></li>

				 						<li class="divider"></li>

				 		</ul>
				 	</li>
				</ul>

		</div>
	</div>
<p><br></p>
<p><br></p>
<p><br></p>

		<div class="container-fluid">
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
					<div class="panel-heading">Products</div>
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
					<div class="panel-footer">&copy; 2018</div>
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
        <p>Copyright &copy  Pet Central</p> 
        </div>
</footer>

</body>
</html>