<?php
include("../connect.php");
session_start();
?>
<!DOCTYPE html>
<html>
 <head>

  <title>G.C.P Aircon Services</title> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

      <script src="js/bootstrap.min.js"></script>     
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
            <link rel="shortcut icon" type="image/png" href="../images/weblogo.png"/>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="../admin_homepage.php" class="navbar-brand"><img src="../advertisment/gcp.png" width="75" height="30" ></a>
                <ul class="navbar-brand" style="padding-top: 20px">G.C.P Aircon Services</ul>
            </div>
                <ul class="nav navbar-nav">
                    <li><a href="../admin_homepage.php" style="padding-top: 20px" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="../admin_profile.php" style="padding-top: 20px"><span class="glyphicon glyphicon-modal-window"></span> Aircons</a></li>
            </ul>
          </div>
        </div>
      <p><br></p>
  <br /><br />
  <div class="container">
   <br />
   <h2 align="center">Orders</h2>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered" id="crud_table">
     <tr>
      <th width="15%">First Name</th>
      <th width="15%">Last Name</th>
      <th width="15%">Address</th>
      <th width="15%">Aircon Name</th>
      <th width="10%">Price</th>
      <th width="8%">Quantity</th>
      <th width="10%">Option</th>
      <th width="15%">Staff Name</th>
      <th width="5%"></th>
     </tr>
     <tr>
      <td contenteditable="true" class="name"></td>
      <td contenteditable="true" class="lastname"></td>
      <td contenteditable="true" class="address"></td>
      <td contenteditable="true" class="p_name"></td>
      <td contenteditable="true" class="price"></td>
      <td contenteditable="true" class="qty"></td>
      <td contenteditable="true" class="title"></td>
      <td contenteditable="true" class="staff_name"></td>
      
      <td></td>
     </tr>
    </table>
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
    </div>
    <div align="center">
     <button type="button" name="save" id="save" class="btn btn-info">Save</button>
    </div>
    <br />
    <div id="inserted_item_data"></div>
   </div>
   
  </div>

 </body>
</html>

<script>
$(document).ready(function(){
 var count = 1;
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td contenteditable='true' class='name'></td>";
   html_code += "<td contenteditable='true' class='lastname'></td>";
   html_code += "<td contenteditable='true' class='address' ></td>";
   html_code += "<td contenteditable='true' class='p_name'></td>";
   html_code += "<td contenteditable='true' class='price' ></td>";
   html_code += "<td contenteditable='true' class='qty' ></td>";
   html_code += "<td contenteditable='true' class='title' ></td>";
   html_code += "<td contenteditable='true' class='staff_name' ></td>";
   
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#save').click(function(){
  var name = [];
  var lastname = [];
  var address = [];
  var p_name = [];
  var price = [];
  var qty = [];
  var staff_name = [];
  var title = [];
  $('.name').each(function(){
   name.push($(this).text());
  });
  $('.lastname').each(function(){
   lastname.push($(this).text());
  });
  $('.address').each(function(){
   address.push($(this).text());
  });
  $('.p_name').each(function(){
   p_name.push($(this).text());
  });
  $('.price').each(function(){
   price.push($(this).text());
  });
  $('.qty').each(function(){
   qty.push($(this).text());
  });
  $('.staff_name').each(function(){
   staff_name.push($(this).text());
  });
  $('.title').each(function(){
   title.push($(this).text());
  });
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:{name:name, lastname:lastname,address:address, p_name:p_name, price:price, qty:qty, staff_name:staff_name, title:title},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    fetch_item_data();
   }
  });
 });
 
 function fetch_item_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#inserted_item_data').html(data);
   }
  })
 }
 fetch_item_data();
 
});
</script>
