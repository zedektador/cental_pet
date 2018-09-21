<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "aircon_services");
if(isset($_POST["name"]))
{
 $name = $_POST["name"];
 $lastname = $_POST["lastname"];
 $p_name = $_POST["p_name"];
 $price = $_POST["price"];
 $qty = $_POST["qty"];
 $staff_name = $_POST["staff_name"];
 $title = $_POST["title"];
 $address = $_POST["address"];
 $query = '';
 for($count = 0; $count<count($name); $count++)
 {
  $name_clean = mysqli_real_escape_string($connect, $name[$count]);
  $lastname_clean = mysqli_real_escape_string($connect, $lastname[$count]);
  $p_name_clean = mysqli_real_escape_string($connect, $p_name[$count]);
  $price_clean = mysqli_real_escape_string($connect, $price[$count]);
  $qty_clean = mysqli_real_escape_string($connect, $qty[$count]);
  $staff_name_clean = mysqli_real_escape_string($connect, $staff_name[$count]);
  $title_clean = mysqli_real_escape_string($connect, $title[$count]);
   $address_clean = mysqli_real_escape_string($connect, $address[$count]);
  if($name_clean != '' && $lastname_clean != '' && $p_name_clean != '' && $price_clean != ''&& $qty_clean != ''&& $staff_name_clean != ''&& $title_clean != ''&& $address_clean != '')
  {
   $query .= '
   INSERT INTO item(name, lastname, p_name, price, qty, staff_name,title,address) 
   VALUES("'.$name_clean.'", "'.$lastname_clean.'", "'.$p_name_clean.'", "'.$price_clean.'", "'.$qty_clean.'", "'.$staff_name_clean.'", "'.$title_clean.'", "'.$address_clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($connect, $query))
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>