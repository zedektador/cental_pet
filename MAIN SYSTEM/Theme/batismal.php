<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Robin Joy's House of Flowers</title>
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,400italic,600,300italic,300|Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">


		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.css" rel="stylesheet">
		<link href="css/owl.transitions.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link href="css/baptismal.css" rel="stylesheet">

	</head>
	<body data-spy="scroll" data-target=".main-nav">
<!--navbar start-->
		<header class="st-navbar">
			<nav class="navbar navbar-default navbar-fixed-top clearfix" role="navigation">
				<div class="container"><!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sept-main-nav">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><img src="photos/LOGONIDODOY.png" alt="" class="img-responsive"></a>
					</div>
					
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse main-nav" id="sept-main-nav">
						<ul class="nav navbar-nav navbar-right">
							<li class="active"><a href="webpage.php">Home</a></li>
							<li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
					          <ul class="dropdown-menu">
					            <li><a href="wedding.php">Wedding</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="Debut.php">Debut</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="batismal.php">Baptismal</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="birthday.php">Birthday</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="party.php">Party</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="prom.php">Promaned</a></li>
					          </ul>
					        </li>
							<li><a href="#gallery">Gallery</a></li>
							<li><a href="offeredpackages.php">Offered Packages</a></li>
							<li><a href="offeredvenue.php">Offered Venues</a></li>
							<li><a href="#contact">Contact Us</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		</header>
		<!-- eto yung may background -->
		<section class="home" id="home" data-stellar-background-ratio="0.4">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="st-home-unit">
							<div class="hero-txt">
								<p class="hero-work">Robin Joy's House of Flowers</p>
								<h2 class="hero-title animated flipInX">Baptismal</h2>
								<a href="login.php" class="btn btn-main btn-lg">Inquiry</a>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="mouse-icon"><div class="wheel"></div></div>
		</section>
		<!-- end of may background -->
	<!-- Start of Gallery -->
<section class="gallery-box" id="gallery">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title st-center">
							<h3>Gallery</h3>
							<p>Baptismal</p>
						</div>
						<div class="row">
						  <div class="column">
						    <img src="images/10.jpg" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
						  </div>
						  <div class="column">
						    <img src="images/10.jpg" style="width:100%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
						  </div>
						  <div class="column">
						    <img src="images/10.jpg" style="width:100%" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
						  </div>
						  <div class="column">
						    <img src="images/10.jpg" style="width:100%" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
						  </div>
						</div>

						<div id="myModal" class="modal">
						  <span class="close cursor" onclick="closeModal()">&times;</span>
						  <div class="modal-content">

						    <div class="mySlides">
						      <div class="numbertext">1 / 4</div>
						      <img src="images/10.jpg" style="width:100%">
						    </div>

						    <div class="mySlides">
						      <div class="numbertext">2 / 4</div>
						      <img src="images/10.jpg" style="width:100%">
						    </div>

						    <div class="mySlides">
						      <div class="numbertext">3 / 4</div>
						      <img src="images/10.jpg" style="width:100%">
						    </div>
						    
						    <div class="mySlides">
						      <div class="numbertext">4 / 4</div>
						      <img src="images/10.jpg" style="width:100%">
						    </div>
						    
						    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
						    <a class="next" onclick="plusSlides(1)">&#10095;</a>

						    <div class="caption-container">
						      <p id="caption"></p>
						    </div>


						    <div class="column">
						      <img class="demo cursor" src="images/10.jpg" style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise">
						    </div>
						    <div class="column">
						      <img class="demo cursor" src="images/10.jpg" style="width:100%" onclick="currentSlide(2)" alt="Trolltunga, Norway">
						    </div>
						    <div class="column">
						      <img class="demo cursor" src="images/10.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
						    </div>
						    <div class="column">
						      <img class="demo cursor" src="images/10.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
						    </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</section>
<!-- end of gallery -->
<!-- CONTACT -->
		<section class="contact" id="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title st-center">
							<h3>Contact Us</h3>
							<p>Get in Touch with Us</p>
						</div>
						<div class="map">
							<div class="google-maps">
								<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.994010666236!2d120.96520891471118!3d14.599416981019981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ca1300e7afb3%3A0x8a5d3fd3cd12401f!2s205+Penarubia+St%2C+San+Nicolas%2C+Manila%2C+Metro+Manila!5e0!3m2!1sen!2sph!4v1504969378375" width="1150" height="600" frameborder="0" style="border:0" allowfullscreen></iframe></p>
							</div>
						</div>
						<address>
							<strong>Robin Joy's House of Flowers</strong><br>
							205 penarubia st. Binondo<br>
							Manila, Philippines<br>
							<abbr title="Phone">Call:</abbr> 0926 893 2361
						</address>
					</div>
				</div>
			</div>
		</section>
<!-- END OF CONTACT-->

		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						&copy; <a href="https://www.cantothemes.com">RobinJoy's House of Flowers</a> 2017.
					</div>
				</div>
			</div>
		</footer>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.easing.min.js"></script>
		<script src="js/jquery.stellar.js"></script>
		<script src="js/jquery.appear.js"></script>
		<script src="js/jquery.nicescroll.min.js"></script>
		<script src="js/jquery.countTo.js"></script>
		<script src="js/jquery.shuffle.modernizr.js"></script>
		<script src="js/jquery.shuffle.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/script.js"></script>
		<script type="text/javascript" src="js/wedding.js"></script>
	</body>
</html>