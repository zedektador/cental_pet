<?php 
    error_reporting(0);

        $vid = "";
    $vname= "";
    $vprice= "";
    $vpicture = "";

    if (isset($_GET['delete'])) { 
        $qry = mysqli_query($conn, "DELETE FROM product WHERE id='".$_GET['delete']."'"); // delete data from database when 'delete' is clicked
        if ($qry) {
            unlink("product_images/".$_GET['picture']); //delete picture
        }


    }
    elseif (isset($_GET['edit'])) {
        $qry = mysqli_query($conn, "SELECT * FROM product WHERE id='".$_GET['edit']."'");

        while ($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {

            $vid = $row['id'];
            $vname = $row['name'];
            $vprice = $row['price'];
            $vpicture = $row['picture'];
        }
    }

  

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Robin Joy's House of Flowers</title>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,400italic,600,300italic,300|Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="jquery.range.css">
        <link href="cssslider/bootstrap.min.css" rel="stylesheet">
        <link href="cssslider/font-awesome.min.css" rel="stylesheet">
        <link href="cssslider/owl.carousel.css" rel="stylesheet">
        <link href="cssslider/owl.theme.css" rel="stylesheet">
        <link href="cssslider/owl.transitions.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="cssslider/animate.css">
        <link rel="stylesheet" type="text/css" href="cssslider/style.css">
<style>
.container{padding: 20px;}
.filter-panel{width:100%;}
.filter-panel p{margin-right: 30px;float: left;}
#productContainer{float: left;width: 100%;}
.list-item{
    float: left;
    width: 200px;
    height: 50%;
    padding: 0px;
    border: 2px solid #cacaca;
    margin: 10px 10px 10px 0px;
    overflow: hidden;
    
}
.list-item h2{margin: 0;}
</style>
</head>
<body>
<!-- Navabar Start -->
<nav class="navbar navbar-inverse"> 
  <div class="container-fluid">
  <a class="navbar-brand" href="#"><img src="photos/LOGONIDODOY.png" alt="" class="img-responsive"></a>
    <div class="navbar-header navbar-right">
      <a class="navbar-brand" href="index.php">
        <button type="button" class="btn btn-primary">HOME</button>
      </a>
    </div>
  </div>
</nav>
<!-- End of NavBar-->
<div class="container">
  <h2>Price Range</h2>
  <br>


            <form class="form-horizontal" action="getProduct.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <div class="col-sm-11">
                <input type="text" name="id" value="<?php echo $vid;?>">
                  <input type="text"  name="name"  placeholder="Product Name" value="<?php echo $vname; ?>" required>
                </div>
                 
                <div class="col-sm-11">
                  <input type="text" name="price"  placeholder="Product Price" value="<?php echo $vprice; ?>" required>
                </div>
                    
              </div>
            </form> <br>


  <div class="filter-panel">
        <p><input type="hidden" class="price_range" value="0,9000" /></p>
        <input type="button"   onclick="filterProducts()" value="FILTER" />
    </div>
  <br>
  <div class="panel panel-default">
    <div class="panel-heading">Price Range</div>
    <div class="panel-body">
        <div class="container">
    <div id="productContainer">
        <?php
        //Include database configuration file
        include('dbConfig.php');
        
        //get product rows
        $query = $dbcon->query("SELECT * FROM product ORDER BY created ASC");
        
        if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
            ?>
                <div class="list-item">
                   
                    <h2>  <?php echo ' <img src="product_images/' . $row["img"]. '"style=width:120px; height:120px;"/>';
                     ?> </h2>
                
                    <h4>Price: <?php echo $row["price"]; ?></h4>
                </div>
        <?php }
        }else{
            echo 'Product(s) not found';
        } ?>
    </div>
</div>

    </div>
  </div>
</div>



















<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="jquery.range.js"></script>
<script>
function filterProducts() {
    var price_range = $('.price_range').val();
    $.ajax({
        type: 'POST',
        url: 'getProduct.php',
        data:'price_range='+price_range,
        beforeSend: function () {
            $('.container').css("opacity", ".5");
        },
        success: function (html) {
            $('#productContainer').html(html);
            $('.container').css("opacity", "");
        }
    });
}
</script>
 
<script>
$('.price_range').jRange({
    from: 0,
    to: 9000,
    step: 50,
    format: '%s Pesos',
    width: 1150,
    showLabels: true,
    isRange : true
});
</script>
</body>
</html>