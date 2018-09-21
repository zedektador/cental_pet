<?php
if(isset($_POST['price_range'])){
    
    //Include database configuration file
    include('dbConfig.php');
    
    //set conditions for filter by price range
    $whereSQL = $orderSQL = '';
    $priceRange = $_POST['price_range'];
    if(!empty($priceRange)){
        $priceRangeArr = explode(',', $priceRange);
        $whereSQL = "WHERE price BETWEEN '".$priceRangeArr[0]."' AND '".$priceRangeArr[1]."'";
        $orderSQL = " ORDER BY price DESC ";
    }else{
        $orderSQL = " ORDER BY created ASC ";
    }
    
    //get product rows
    $query = $dbcon->query("SELECT * FROM product $whereSQL $orderSQL");
    
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
    ?>


            <div class="list-item">

                
                <h2><?php echo  $row["name"]; ?></h2>
                <h2> <?php echo ' <img src="../adminpanel/product_images/' . $row["img"]. '"style=width:200px; height:80px;"/>';
                     ?> </h2>
                <h4>Price: <?php echo $row["price"]; ?></h4>
                <input type="button">ADD
            </div>
    <?php }
    }else{
        echo 'Product(s) not found';
    }
}
?><s></s>