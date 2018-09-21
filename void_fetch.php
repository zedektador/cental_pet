<?php
//fetch.php;
if(isset($_POST["notify"]))
{
 include("connect.php");
 if($_POST["notify"] != '')
 {
  $update_query = "UPDATE reserve SET void=1 WHERE void=0";
  mysqli_query($con, $update_query);
 }
 $query = "SELECT * FROM reserve ORDER BY id DESC LIMIT 5";
 $result = mysqli_query($con, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="payment.php">
     <strong>'.$row["name"].'</strong>
     <strong>'.$row["lastname"].'</strong> <strong><b style="float:right;"> '.$row["title"].'</b></strong> <br /></br>
      <small><b>'.$row["p_name"].' </b>  '.$row["void_msg"].' <b>('.$row["price"].') Delete the order </b></small><br />
 


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
 
 $query_1 = "SELECT * FROM reserve WHERE void=0";
 $result_1 = mysqli_query($con, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
