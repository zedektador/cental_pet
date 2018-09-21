<?php  
 $connect = mysqli_connect("localhost", "root", "", "pet_central");  
 $query = "SELECT * FROM payment_history ORDER BY id desc";  
 $result = mysqli_query($connect, $query);

 $d1 = $_POST['from_date'];
 $d2 = $_POST['to_date'];

 $query1 = "SELECT * FROM payment_history WHERE payment_date BETWEEN  '".$d1."' AND '".$d2."' ";
 $result1 =mysqli_query($connect, $query1);
 while($date = mysqli_fetch_assoc($result1)){

 ?>

    <tr>
    <td> <?php echo $date["id"];?></td>
    <td> <?php echo $date["name"];?></td>
    <td> <?php echo $date["lastname"];?></td>
    <td> <?php echo $date["payment"];?></td>
    <td> <?php echo $date["payment_date"];?></td>
    <td> <?php echo $date["payment_type"];?></td>
    

    </tr>
                



 


  <?php
}
  $query2 = "SELECT SUM(payment) as sum FROM payment_history WHERE payment_date BETWEEN '".$d1."' AND '".$d2."' ";
 $result2 =mysqli_query($connect, $query2);
 while($sum = mysqli_fetch_array($result2)){
  ?>
  <td>Total Cost: </td>
  <td></td>
  <td></td><td></td><td></td>
  <td><?php echo $sum[0]; ?></td>

<?php

}
 ?>  
 <!--!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Ajax PHP MySQL Date Range Search using jQuery DatePicker</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center">Ajax PHP MySQL Date Range Search using jQuery DatePicker</h2>  
                <h3 align="center">Order Data</h3><br />  
                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="submit" name="filter" on click="function(data)" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>- -!>
