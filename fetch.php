
<?php
//fetch.php;
if(isset($_POST["views"]))
{
 include("connect.php");

 if($_POST["views"] != '')
 {
  $update_query = "UPDATE reserve SET status=0 WHERE status=1";
  mysqli_query($con, $update_query);
 }


 $query = "SELECT * FROM reserve ORDER BY user_id DESC LIMIT 3";
 $result = mysqli_query($con, $query);
 $output = '';
 $see = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="omg/index.php">
     <strong>'.$row["title"].'</strong><br /></b></br>
    Name :<b><small><em>'.$row["name"].'</em></small></b>
             <b><small><em>'.$row["lastname"].'</em></small><br /></b>
     Product Name : <b><small><em>'.$row["p_name"].'</em></small></b></br>
    Quantity : <b><small><em>'.$row["qty"].'</em></small><br /></b>
    Price : <b><small><em>'.$row["price"].'</em></small></b></br>
    Date : <b><small><em>'.$row["start"].'</em></small></b></br>
       Mobile Number : <b><small><em>'.$row["mobile"].'</em></small></b></br>
   Address  : <b><small><em>'.$row["address"].'</em></small></b></br>
    
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

 $query_1 = "SELECT * FROM reserve WHERE status=1";
 $result_1 = mysqli_query($con, $query_1);
 $counts = mysqli_num_rows($result_1);
 $data = array(
  'notifications'   => $output,
  'unseen_notifications' => $counts
 );
 echo json_encode($data);
}
?>

