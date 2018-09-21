<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "aircon_services");
$output = '';
$query = "SELECT * FROM item ORDER BY item_id DESC";
$result = mysqli_query($connect, $query);
$output = '
<br />
<h3 align="center">Customer Orders</h3>
<table class="table table-bordered table-striped">
 <tr>
	  <th width="13%">First Name</th>
      <th width="13%">Last Name</th>
      <th width="13%">Address</th>
      <th width="10%">Aircon Name</th>
      <th width="10%">Price</th>
      <th width="8%">Quantity</th>
      <th width="10%">Option</th>
      <th width="15%">Staff Name</th>
      <th width="20%">Date of Order</th>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["name"].'</td>
  <td>'.$row["lastname"].'</td>
  <td>'.$row["address"].'</td>
  <td>'.$row["p_name"].'</td>
  <td>'.$row["price"].'</td>
  <td>'.$row["qty"].'</td>
  <td>'.$row["title"].'</td>
  <td>'.$row["staff_name"].'</td>
   <td>'.$row["start"].'</td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>
