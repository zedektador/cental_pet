<?php

session_start();
if(isset($_SESSION["uid"])){
	header("location: customer_profile.php");
} 


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
					<li><a href="index.php" style="padding-top: 23px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>
          <li><a href="index.php" style="padding-top: 23px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Services</a></li>
					<li style="width:300px; left:10px; top: 10px; padding-top: 4px;"><input type="text" class="form-control" id="search"></li>
					<li style="top: 10px; left: 20px; padding-top: 4px;"><button type="submit" class="btn btn-primary" name="Search" id="search_btn" style="background-color: #e6f9ff; color: black; font-weight: bold;"> Search</button></li>
				</ul>
				<button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
				<span><img src="images/menu.png"></span>
			</button>

			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav navbar-right ">

				<li><a href="admin_login.php" style="padding-top: 23px;color: white;" ><span class="glyphicon glyphicon-user" style="color: white;"></span> Admin</a></li>

				 	<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 20px;color: white;"><span class="glyphicon glyphicon-user" style="padding-top: 4px;color: white;"></span> Log-In</a>
				 		<ul class="dropdown-menu">
				 			<div style="width:300px;">
				 				<div class="panel panel-primary">
				 					<div class="panel-heading"><b>Login</b></div>
				 						<div class="panel-heading">
				 							<label for="email">Email</label>
				 							<input type="email" class="form-control" id="email" required="required" >
				 							<label for="email">Password</label>
				 							<input type="password" class="form-control" id="password" required="required" >
				 					<p><br></p>
				 							<a href="#" style="color:white; list-style:none;">Forgotten Password</a>
				 							<input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login" >
				 						</div>
				 							<div class="panel-footer" id="e_msg"></div>
				 				</div>
				 			</div>
				 		</ul>
				 	</li>

				 		<li><a href="customer_registratioin.php" style="padding-top: 23px;color: white;" ><span class="glyphicon glyphicon-user"></span> SignUp</a></li>
				 	
				</ul>
		</div>
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
			<li class="active"><a href="#"><h4>Aircons</h4></a></li>
			<li><a href="#">Aircon Types</a></li>
			<li><a href="#">Aircon Types</a></li>
			<li><a href="#">Aircon Types</a></li>
			<li><a href="#">Aircon Types</a></li>
			<li><a href="#">Aircon Types</a></li>
		</div>-->

		<br>
		<br>
			<!--<div id="get_brand">
				</div>
		<!--<div class="nav nav-pills nav-stacked">
			<li class="active"><a href="#"><h4>Services</h4></a></li>
				<li><a href="#">Aircon Types</a></li>
				<li><a href="#">Aircon Types</a></li>
				<li><a href="#">Aircon Types</a></li>
		</div> -->
	</div>
		<div class="col-md-8">
				<div class="panel panel-info">
					<div class="panel-heading" style="background-color: #00b3b3; color:white;">Products</div>
					<div class="panel-body">
					<div id="get_product"></div>
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
					<div class="col-md-4">
					</div>
				
				</div>
			<div class="col-md-1"></div>
		</div>
	</div>
	 <div class="container">

        <div class="home_mainContent">
            
                <div class="col-md-4 col-sm-4 product-listings-item">
                    <div class="prodheader">
                        <a href="index.php" target="_blank" title="New Arrivals">
                            <img src="images/ad_1.jpg" /> </a>
                    </div>
                    <div class="product_holder">
                        <div class="homebadge_section">
                          <img src="images/available.png" height="50">
                             </div>
                         <a href="index.php" title="TAC-O6CWM/I">
                          <img src="images/catfood.jpg" width="313px;" />
                              </a>
                                </div>

                    <p>
                            <span class="produnit">Friskies</span><br>
                                    Purina Cat Food<br /> <span class="price retail-price">
                                        P500 only</span><br>
                            </p>
                        </div>
                        <div class="clear"></div>
                    </a>
                </div>

                 
                 <div class="col-md-4 col-sm-4 product-listings-item">
                    <div class="prodheader">
                        <a href="index.php" target="_blank" title="New Arrivals">
                            <img src="images/ad_2.jpg" />                        </a>
                    </div>
                    <div class="product_holder">
                        <div class="homebadge_section">
                           <img src="images/hot.png" height="65">
                              </div>
                           <a href="index.php" title="HSN/U09IST">
                              <img alt="" src="images/groom1.png" width="300px"; height="230px;" />
                                 </a>
                              
                            <p> <p> <br> <br>
                               <span class="produnit">Grooming Promo</span><br>
                                   Inclusions: Grooming , Nail Cut , Ear Cleaning , Shower<br /> <span class="price retail-price">
                                        P400 only </span><br>
                             </p>
                        </div>
                        <div class="clear"></div>
                    </a>
                </div>


                 <div class="col-md-4 col-sm-4 product-listings-item">
                    <div class="prodheader">
                        <a href="index.php" target="_blank" title="New Arrivals">
                            <img src="images/ad_3.jpg" />                        </a>
                    </div>
                    <div class="product_holder">
                        <div class="homebadge_section">
                           <img src="images/hot.png" height="65">
                               </div>
                           <a href="index.php" title="HSN/U09IST">
                        <img alt="index.php" src="images/soap2.jpg" width="300px"; height="230px;" />
                             </a>

                           <p> <p> <br> <br>
                              <span class="produnit">Neem Oil</span><br>
                                   Prevent Dog Ticks and Cure Scabies<br /> <span class="price retail-price">
                                        P250 only </span><br>
                              </p>
                        </div>
                        <div class="clear"></div>
                    </a>
                </div>

    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="my-slider" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#my-slider" data-slide-to="0" class="active"></li>
            <li data-target="#my-slider" data-slide-to="1"></li> 
            <li data-target="#my-slider" data-slide-to="2"></li> 
            <li data-target="#my-slider" data-slide-to="3"></li> 
          </ol>
            <div class="carousel-inner" role="listbox">
            <div class="item active">
            <img src="images/ad2.jpg" alt="ad">
            <div class="carousel-caption">                       
                </div>  
              </div>
                   <div class="item">
            <img src="images/ad.png" alt="ad">
            <div class="carousel-caption">           
                </div>  
              </div>
                   <div class="item">
            <img src="images/ad1.jpg" alt="ad">
            <div class="carousel-caption">           
                </div>  
              </div>
                   
            </div>
            <a class="left carousel-control" href="#my-slider" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
               <a class="right carousel-control" href="#my-slider" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div><br><br><br><br>     
     
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="parallax.min.js"></script>
    <script>
      $('.parallax-window').parallax();  
    </script>

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
