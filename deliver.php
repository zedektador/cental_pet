
<?php
//fetch.php;
if(isset($_POST["views"]))
{
 include("connect.php");

 if($_POST["views"] != '')
 {
  $update_query = "UPDATE item SET stats=1 WHERE stats=0";
  mysqli_query($con, $update_query);
 }


 $query = "SELECT * FROM item ORDER BY item_id DESC LIMIT 1";
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
     <b><small>We have received your payment . please wait within 2 days for your order to be delivered Thank You!</small></b>

    </a>
   </li>
   <li class="divider"></li>
 
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No New Notification Found</a></li>';
 }

 $query_1 = "SELECT * FROM item WHERE stats=0";
 $result_1 = mysqli_query($con, $query_1);
 $counts = mysqli_num_rows($result_1);
 $data = array(
  'notifications'   => $output,
  'unseen_notifications' => $counts
 );
 echo json_encode($data);
}
?>

