<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("connect.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE resched SET status=1 WHERE status=0";
  mysqli_query($con, $update_query);
 }
 $query = "SELECT * FROM resched ORDER BY id DESC LIMIT 3";
 $result = mysqli_query($con, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
     <li>
    <a href="resched.php">
     <strong>'.$row["name"].'</strong> <strong>'.$row["lastname"].'</strong><br /></b></br>
     Address :<b><small>'.$row["address"].'</small></b></br>
     Contact Number :<b><small>'.$row["mobile"].'</small></b></br>
    Date of Order :<b><small>'.$row["start"].'</small></b></br>
    Aircon Name :<b><small>'.$row["p_name"].'</small></b></br>
    Quantity :<b><small>'.$row["qty"].'</small></b></br></br>
    Reason of Reschedulling :<b><small>'.$row["sched"].'</small></b></br>
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
 
 $query_1 = "SELECT * FROM resched WHERE status=0";
 $result_1 = mysqli_query($con, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
