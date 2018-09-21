<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("connect.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE staff_comments SET staff_status=1 WHERE staff_status=0";
  mysqli_query($con, $update_query);
 }
 $query = "SELECT * FROM staff_comments ORDER BY id DESC LIMIT 3";
 $result = mysqli_query($con, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
     <li>
    <a href="omg/customer_reserve.php">
     <strong>'.$row["request"].'</strong><br /></b></br>
    Name :<b><small><em>'.$row["firstname"].'</em></small></b>
             <b><small><em>'.$row["lastname"].'</em></small><br /></b>
       Mobile Number : <b><small><em>'.$row["mobile"].'</em></small></b></br>
       Request : <b><small><em>'.$row["request"].'</em></small></b></br>
   Date of Reservation  : <b><small><em>'.$row["start"].'</em></small></b></br>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM staff_comments WHERE staff_status=0";
 $result_1 = mysqli_query($con, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
