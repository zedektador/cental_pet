<?php
include('connect.php');
?>
 <!DOCTYPE html>
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome to Pet Central</title>
  <link href="css/jquery.bxslider.css" rel="stylesheet" />
  <link href="style.css" rel="stylesheet">
  <link href="css/nav.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
   <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
<div class="navbar navbar navbar-fixed-top" style="background-color: #00b3b3;color: white;">
    <div class="container-fluid">
      <div class="navbar-header">
       <a href="staff_homepage.php" class="navbar-brand"><img src="images/logo.png" width="125" height="35" ></a>
       <ul class="navbar-brand" style="padding-top: 25px"></ul>
      </div>
        <ul class="nav navbar-nav">
          <li><a href="staff_homepage.php" style="padding-top: 25px;color: white;" ><span class="glyphicon glyphicon-home"></span> Home</a></li>

          <li><a href="staff_profile.php" style="padding-top: 25px;color: white;" ><span class="glyphicon glyphicon-modal-window"></span> Products & Services</a></li>
          
          
          </ul>
<ul class="nav navbar-nav navbar-right">

           <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px;color: white;" id="toggle"><span class="label label-pill label-danger count" id="counts" style="border-radius:10px;"></span><span class="glyphicon glyphicon-envelope"> Order</span></a>
       <ul class="dropdown-menu" id="menu"></ul>
       </li>

        <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px;color: white;" id="down"><span class="label label-pill label-danger count" id="bilang" style="border-radius:10px;"></span><span class="glyphicon glyphicon-envelope"> Services</span></a>
       <ul class="dropdown-menu" id="drop">
       </ul>
       </li>

       </div>

          </li>
        </ul>
        </ul>

    </div>
  </div>
      </ul>


   <div class="parallax-window" data-parallax="scroll" data-image-src="images/try.png">
      <div style="padding-top: 200px"class="text-center">
      <br> <br> <br>  <br> <br>  <br>   <br>   <br>   <br>   <br>   <br>   <br>
     <h1 style="color: white;font-weight: bolder;font-size: 30px;font-family: Lucida Calligraphy;">WELCOME TO</h1>
     <h1 style="color: white;font-weight: bolder;font-size: 50px;font-family: Lucida Calligraphy;">Pet Central</h1>
      </div>
    </div>
    <p><br></p>
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
                                              <!-- ORDER  -->
<script>
  $(document).ready(function(){
     function load(views = '')
 {
  $.ajax({
   url:"fetch.php",
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
                                              <!-- REQUEST  -->
<script>
  $(document).ready(function(){
     function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"staff_fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('#drop').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('#bilang').html(data.unseen_notification);
    }
   }
  });
 }
  load_unseen_notification();

 $(document).on('click', '#down', function(){
  $('#bilang').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);

  });
</script>
