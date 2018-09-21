<?php
//insert.php
if(isset($_POST["name"]))
{
 include("connect.php");
  $name = mysqli_real_escape_string($con, $_POST["name"]);
 $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
  $mobile = mysqli_real_escape_string($con, $_POST["mobile"]);
   $a_delivery = mysqli_real_escape_string($con, $_POST["a_delivery"]);
    $title = mysqli_real_escape_string($con, $_POST["title"]);
    $p_name = mysqli_real_escape_string($con, $_POST["p_name"]);
     $qty = mysqli_real_escape_string($con, $_POST["qty"]);
      $price = mysqli_real_escape_string($con, $_POST["price"]);
       $payment = mysqli_real_escape_string($con, $_POST["payment"]);

 $query = "
INSERT INTO `comments` (`comment_id`, `title`, `name`, `lastname`, `mobile`, `a_delivery`, `p_name`, `qty`, `price`, `payment`) VALUES (NULL, '$title', '$name', '$lastname', '$mobile', '$a_delivery', '$p_name', '$qty', '$price', '$payment');
";
 mysqli_query($con, $query);
}
?>