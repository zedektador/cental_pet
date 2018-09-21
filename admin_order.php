<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("connect.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE products SET stats=1 WHERE stats=0";
  mysqli_query($con, $update_query);
 }
 $query = "SELECT * FROM products ORDER BY `products`.`stocks` ASC LIMIT 4";
 $result = mysqli_query($con, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   if($row["stocks"]<1){
    
$output .= '
     <li>
    <a href="update_stocks.php">
     <strong>STOCKS</strong><br /></b></br>
    <b>'.$row["product_keywords"].'</b> is out of stock please check your inventory</br>
    Stocks :  <b>'.$row["stocks"].'</b> 


    </a>
   </li>
   <li class="divider"></li>
       <a href="update_stocks.php" style="padding-left: 250px;">See All</a>
   ';  
   }
  }
 }
 else 
 {
  if($row["stocks"]<=0)
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM products WHERE stats=0";
 $result_1 = mysqli_query($con, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
