
<?php
//fetch.php;
if(isset($_POST["views"]))
{
 include("connect.php");

 if($_POST["views"] != '')
 {
  $update_query = "UPDATE reserve SET msg_stats=1 WHERE msg_stats=0";
  mysqli_query($con, $update_query);
 }

 $query = "SELECT * FROM reserve ORDER BY id DESC LIMIT 3";
 $result = mysqli_query($con, $query);
 $output = '';
 $see = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="payment.php">
     <strong>'.$row["name"].' '.$row["lastname"].'</strong><br /></b></br>
    <b><small>You received '.$row["payment"].' for '.$row["type"].' check account for '.$row["acct_num"].' at '.$row["payment_method"].'</small></b>

    </a>
   </li>
   <li class="divider"></li>
       <a href="order_history.php" style="padding-left: 80px;">See All</a>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }

 $query_1 = "SELECT * FROM reserve WHERE msg_stats=0";
 $result_1 = mysqli_query($con, $query_1);
 $counts = mysqli_num_rows($result_1);
 $data = array(
  'notifications'   => $output,
  'unseen_notifications' => $counts
 );
 echo json_encode($data);
}
?>

