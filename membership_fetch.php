
<?php
//fetch.php;
if(isset($_POST["views"]))
{
 include("connect.php");

 if($_POST["views"] != '')
 {
  $update_query = "UPDATE membership_tbl SET msg_stats=1 WHERE msg_stats=0";
  mysqli_query($con, $update_query);
 }

 $query = "SELECT * FROM membership_tbl ORDER BY id DESC LIMIT 1";
 $result = mysqli_query($con, $query);
 $output = '';
 $see = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="apply_membership.php">
     <strong>'.$row["firstname"].' '.$row["lastname"].'</strong><br /></b></br>
    <b><small>Is Applying for Membership '.$row["payment"].' and the item is '.$row["p_name"].' check the Bank Account</small></b>

    </a>
   </li>
   <li class="divider"></li>
       <a href="apply_membership.php" style="padding-left: 80px;">See All</a>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }

 $query_1 = "SELECT * FROM membership_tbl WHERE msg_stats=0";
 $result_1 = mysqli_query($con, $query_1);
 $counts = mysqli_num_rows($result_1);
 $data = array(
  'notifications'   => $output,
  'unseen_notifications' => $counts
 );
 echo json1_encode($data);
}
?>

