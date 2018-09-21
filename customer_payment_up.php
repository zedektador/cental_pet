<?php

  
  $date_today = date('Y-M-d',strtotime('+ 7 days'));

  $exp = strtotime($start);
  $dt=strtotime($date_today);

  if($dt>$exp){ 

    $sql = "UPDATE `reserve` SET  `title` = 'Pending' ,`void_msg` = 'Will Expire SOON!!', `void` = '1' WHERE `reserve`.`user_id` = '$user_id';  ";
  $run = mysqli_query($con ,$sql);

    $diff=$dt-$exp;
    $days =abs(floor($diff / (60 * 60 * 24)));
      echo "<p style='font-size: 20px;' align='center'><b>Your Ordered Product will expire at $days days</b></p>";

    }else{
      
      $sql = "UPDATE `reserve` SET  `title` = 'Void' ,`void_msg` = 'is Expired', `void` = '0' WHERE `reserve`.`user_id` = '$user_id';  ";
    $run = mysqli_query($con,$sql);


      $diff=$dt-$exp;
    $days =abs(floor($diff / (60 * 60 * 24)));

      echo "<p style='font-size: 20px;' align='center'><b>Your Ordered Product expire $days days ago and admin will remind and delete your order</b></p>";
    }
  

?>