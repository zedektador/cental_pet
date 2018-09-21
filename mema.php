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
	  <th width="15%">First Name</th>
      <th width="15%">Last Name</th>
      <th width="20%">Aircon Name</th>
      <th width="10%">Price</th>
      <th width="8%">Quantity</th>
      <th width="15%">Option</th>
      <th width="15%">Staff Name</th>
      <th width="5%"></th> </tr>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["name"].'</td>
  <td>'.$row["lastname"].'</td>
  <td>'.$row["p_name"].'</td>
  <td>'.$row["price"].'</td>
  <td>'.$row["qty"].'</td>
  <td>'.$row["title"].'</td>
  <td>'.$row["staff_name"].'</td>
  
    <td><a href="delete_update.php?edited=1&id='.$row["id"].'" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a></td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>
