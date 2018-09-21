
<?php
//fetch.php;
if(isset($_POST["views"]))
{
 include("connect.php");

 if($_POST["views"] != '')
 {
  $update_query = "UPDATE reserve SET customer_order=1 WHERE customer_order=0";
  mysqli_query($con, $update_query);
 }


 $query = "SELECT * FROM reserve GROUP BY user_id DESC LIMIT 3";
 $result = mysqli_query($con, $query);
 $output = '';
 $see = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="payment_account.php">
     <strong>'.$row["name"].' '.$row["lastname"].'</strong><br /></b></br>
    <b><small>'.$row["msg"].' of the product you bought is ₱'.$row["total"]. ' you can settle </br> your payment now</small></b>

    </a>
   </li>
   <li class="divider"></li>
       <a href="order_history.php" style="padding-left: 80px;">See All</a>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No New Notification Found</a></li>';
 }

 $query_1 = "SELECT * FROM reserve WHERE customer_order=0";
 $result_1 = mysqli_query($con, $query_1);
 $counts = mysqli_num_rows($result_1);
 $data = array(
  'notifications'   => $output,
  'unseen_notifications' => $counts
 );
 echo json_encode($data);
}
?>

