
<?php
//fetch.php;
if(isset($_POST["views"]))
{
 include("connect.php");

 if($_POST["views"] != '')
 {
  $update_query = "UPDATE services_info SET resched=1 WHERE resched=0";
  mysqli_query($con, $update_query);
 }


 $query = "SELECT * FROM services_info ORDER BY id DESC LIMIT 3";
 $result = mysqli_query($con, $query);
 $output = '';
 $see = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="customer_table.php">
     <strong>'.$row["name"].' '.$row["lastname"].'</strong><br /></b></br>
    <b><small>Your order was rescheduled at '.$row["start"].'</small></b>

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

 $query_1 = "SELECT * FROM services_info WHERE resched=0";
 $result_1 = mysqli_query($con, $query_1);
 $counts = mysqli_num_rows($result_1);
 $data = array(
  'notifications'   => $output,
  'unseen_notifications' => $counts
 );
 echo json_encode($data);
}
?>

