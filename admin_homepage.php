<?php
include('connect.php');
?>
 <!DOCTYPE html>
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome Admin</title>
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
<div class="navbar navbar navbar-fixed-top" style="background-color: #00b3b3; font-family: sans-serif; color: white;">
    <div class="container-fluid">
      <div class="navbar-header">
      
       <ul class="navbar-brand" style="padding-top: 25px"></ul>
      </div>
        <button class="navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
        <span><img src="images/menu.png"></span>
      </button>
<a href="homepage.php" class="navbar-brand"><img src="images/logo.png" width="125" height="35" ></a>
      <div class="collapse navbar-collapse navHeaderCollapse">
        <ul class="nav navbar-nav">
          <li><a href="admin_homepage.php" style="padding-top: 25px;"><span class="glyphicon glyphicon-home"></span> Home</a></li>

          <li><a href="admin_profile.php" style="padding-top: 25px"><span class="glyphicon glyphicon-modal-window"></span> Products / Services</a></li>
          <!--<li><a href="service_list.php" style="padding-top: 25px;color: white;"><span class="glyphicon glyphicon-modal-window"></span> Services</a></li>-->
          </ul>

          <ul class="nav navbar-nav navbar-right">
          
       

        <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px; font-family: sans-serif;" id="downss"><span class="label label-pill label-danger count" id="bilangss" style="border-radius:10px;"></span><span class="glyphicon glyphicon-envelope">Stocks</span></a>
       <ul class="dropdown-menu" id="dropss">
       </ul>
       </li>

        <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px; font-family: sans-serif;" id="downs"><span class="label label-pill label-danger count" id="bilangs" style="border-radius:10px;"></span><span class="glyphicon glyphicon-envelope">Services</span></a>
       <ul class="dropdown-menu" id="drops">
       </ul>
       </li>

             

         <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px; font-family: sans-serif;" id="ress"><span class="label label-pill label-danger count" id="kedd" style="border-radius:10px;"></span><span class="glyphicon glyphicon-envelope">Void Orders</span></a>
       <ul class="dropdown-menu" id="ordss"></ul>
         </li>


                    <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px; font-family: sans-serif;" id="toggle"><span class="label label-pill label-danger count" id="counts" style="border-radius:10px;"></span><span class="glyphicon glyphicon-envelope">Order</span></a>
       <ul class="dropdown-menu" id="menu"></ul>
       </li>

              <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 25px; font-family: sans-serif;" id="toggles"><span class="label label-pill label-danger count" id="countss" style="border-radius:10px;"></span><span class="glyphicon glyphicon-envelope">Payment</span></a>
       <ul class="dropdown-menu" id="menus"></ul>


    </div>
  </div>
      </ul>
      </div>

   <div class="parallax-window" data-parallax="scroll" data-image-src="images/try.png">
      <div style="padding-top: 200px"class="text-center">
      <br> <br> <br>  <br> <br>  <br>   <br>   <br>   <br>   <br>   <br>   <br>
     <h1 style="color: black;font-weight: bolder;font-size: 30px;font-family: Lucida Calligraphy;">Welcome To</h1>
     <h1 style="color: black;font-weight: bolder;font-size: 50px;font-family: Lucida Calligraphy;">Pet Central</h1>
      </div>
    </div>
    <p><br></p>
      <div class="container">

        <div class="home_mainContent">
            
                

                    

                 


                 

    
            
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="parallax.min.js"></script>
    <script>
      $('.parallax-window').parallax();  
    </script>



    

  
  <footer>
      <div class="panel-footer" style="text-align: center;">
      <p>Copyright &copy; Pet Central</p>
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
                                              <!-- STOCKS  -->
<script>
  $(document).ready(function(){
     function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"admin_order.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('#dropss').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('#bilangss').html(data.unseen_notification);
    }
   }
  });
 }
  load_unseen_notification();

 $(document).on('click', '#downss', function(){
  $('#bilangss').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);

  });
</script>
                                              <!-- RESCHEDULE  -->

<script>
  $(document).ready(function(){
     function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"admin_resched.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('#ords').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('#ked').html(data.unseen_notification);
    }
   }
  });
 }
  load_unseen_notification();

 $(document).on('click', '#res', function(){
  $('#ked').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
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
    $('#drops').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('#bilangs').html(data.unseen_notification);
    }
   }
  });
 }
  load_unseen_notification();

 $(document).on('click', '#downs', function(){
  $('#bilangs').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);

  });
</script>

                                              <!-- Payment Order  -->
<script>
  $(document).ready(function(){
     function load(views = '')
 {
  $.ajax({
   url:"payment_fetch.php",
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
                                              <!-- VOID  -->
<script>
  $(document).ready(function(){
     function load_unseen_notificationss(notify = '')
 {
  $.ajax({
   url:"void_fetch.php",
   method:"POST",
   data:{notify:notify},
   dataType:"json",
   success:function(data)
   {
    $('#ordss').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('#kedd').html(data.unseen_notification);
    }
   }
  });
 }
  load_unseen_notificationss();

 $(document).on('click', '#ress', function(){
  $('#kedd').html('');
  load_unseen_notificationss('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notificationss();; 
 }, 5000);

  });
</script>
                                              <!-- Membership  -->

<script>
  $(document).ready(function(){
     function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"membership_fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json1",
   success:function(data)
   {
    $('#dropsss').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('#bilangsss').html(data.unseen_notification);
    }
   }
  });
 }
  load_unseen_notification();

 $(document).on('click', '#downsss', function(){
  $('#bilangsss').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);

  });
</script>