<?php
include("connect.php");


<?php

$user_id = $_SESSION["uid"];
$query = "SELECT * From reserve where user_id = $user_id";
 $result = mysqli_query($con, $query);  

 while($row = mysqli_fetch_array($result)){
  $id = $row['user_id'];
  $start = $row['start'];
  $date_today = date('Y-M-d',strtotime('+ 7 days'));

  $exp = strtotime($start);
  $dt=strtotime($date_today);

  $id =$_POST['id'];
          $name =$_POST['name'];
          $lastname =$_POST['lastname'];
          $mobile =$_POST['mobile'];
          $address =$_POST['address'];
          $p_name =$_POST['p_name'];
          $qty =$_POST['qty'];
          $price =$_POST['price'];
          $start = $_POST["start"];

  if($dt>$exp){ 

    $sql = "UPDATE `reserve` SET  `title` = 'Pending' ,`void_msg` = 'Will Expire SOON!!', `void` = '1' WHERE `reserve`.`user_id` = '$id';  ";
  $run = mysqli_query($con ,$sql);

    $diff=$dt-$exp;
    $days =abs(floor($diff / (60 * 60 * 24)));
      echo "<p style='font-size: 20px;' align='center'><b>Your Ordered Aircon will expire at $days days</b></p>";

    }else{
      
      $sql = "UPDATE `reserve` SET  `title` = 'Void' ,`void_msg` = 'is Expired', `void` = '0' WHERE `reserve`.`user_id` = '$id';  ";
    $run = mysqli_query($con,$sql);

    $sql2 = "INSERT INTO `void` (`id`, `user_id`, `name`, `lastname`, `mobile`, `address`, `p_name`, `qty`, `price`, `title`, `start`) VALUES (NULL, '$id', '$name', '$lastname', '$mobile', '$address', '$p_name', '$qty', '$price', 'Void', '$start');";

      $diff=$dt-$exp;
    $days =abs(floor($diff / (60 * 60 * 24)));

      echo "<p style='font-size: 20px;' align='center'><b>Your Ordered Aircon expire $days days ago and admin will remind and delete your order</b></p>";
    }
  
 }
?>


<?php




if(isset($_POST["btns"])){
  $id = $_POST['id'];


  foreach ($_POST['payment'] as $key => $value) {

    $p_name = $_POST['p_names'][$key];
    $price = $_POST['prices'][$key];
    $qty = $_POST['qtys'][$key];
    $payment = $_POST["payment"][$key];

    $sql = "UPDATE events SET  payment = '$payment', title ='Pending' , msg_stats ='0' WHERE user_id ='$id'";
  $run = mysqli_query($con,$sql);

    $sql = "UPDATE `reserve` SET `payment` = '$payment' , msg_stats ='0' WHERE `reserve`.`user_id` = '$id' ";
  $run = mysqli_query($con,$sql);

}

  

  header('Refresh:0;customer_profile.php');

            $message="ANG POGI NI CARLO VELARDE";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        echo"<script>close()</script>"; 

}
?>




?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>sa</title>
   <link rel="shortcut icon" type="image/png" href="images/weblogo.png"/>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/jquery2.js"></script>
  <script src="js/bootstrap.min.js"></script><
  <script src="main.js"></script>

  <script type="text/javascript">

      window.onload = function(){
        document.getElementByID("trCanada").style.display = "none";
      }

          function onCountrySelected(){
            var country = document.getElementByID("ddlCountry").value;
            if (country == "USA") {
              document.getElementByID("trCanada").style.display ='none';
              document.getElementByID("trUSA").style.display ='';
            } else{
              document.getElementByID("trUSA").style.display ='none';
              document.getElementByID("trCanada").style.display ='';
            }
          }
  </script>


</head>
</head>
<body>


  <table>
    <tr>
        <td><b>Country</b></td>
              <td>
                <asp:DropDownList id="ddlCountry" runat="server" onchange="onCountrySelected()" >
                <asp:ListItem>USA</asp:ListItem>
                <asp:ListItem>Canda</asp:ListItem>
              </asp:DropDownList>
              </td>
    </tr>

      <tr id="trUSA"></tr>
          <td><b>State</b></td>
          <td>
            <asp:TextBox id="txtState" runat="server"></asp:TextBox>
          </td>
          <td><b>City</b></td>
          <td>
              <asp:TextBox id="txtUSCity" runat="server"></asp:TextBox>
          </td>
          <td><b>ZipCodes</b></td>
          <td>
            <asp:TextBox id="txtZipCodes" runat="server"></asp:TextBox>
          </td>
      <tr id="trCanada">
          <td><b>Province</b></td>
          <td>
            <asp:TextBox id="txtProvince" runat="server"></asp:TextBox>
          </td>
          <td><b>City</b></td>
          <td>
              <asp:TextBox id="txtCity" runat="server"></asp:TextBox>
          </td>
          <td><b>PostalCodes</b></td>
          <td>
            <asp:TextBox id="txtPostalCodes" runat="server"></asp:TextBox>
          </td>
      </tr>
  </table>

</body>
</html>




if($payment<$total_amount){
                      $message="HIGHERRR!!!";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        echo"<script>close()</script>"; 
                    }
                    
                  }
                }






                               <div class="row">
              <div class="col-md-12"></div>
              <div class="col-md-6">
                <div class="container">
                  <div class="row">
                  <div class="col-md-1"></div>
                    <div class="col-xs-14"><br>
                      <button class="btn btn-info btn-md"  data-target="#addModal" data-toggle="modal">Add Services</button>
                      <div class="modal" id="addModal" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content animated bounceIn">
                            <div class="modal-header">
                              <button class="close" data-dismiss="modal" >&times;</button>
                              <h4 class="modal-title" style="text-align: center;">Services</h4>

                            </div>
                            <div class="modal-body">
<?php 
if(isset($_POST["btnn"])){

  $name = $_POST["name"];


  $sql = "INSERT INTO `cleaning` (`id`, `Name`) VALUES (NULL, '$name');";
  $run_query = mysqli_query($con,$sql);
  if($run_query){
    header('Refresh:0; services.php');
    
    $message="ANG POGI NI CARLO VELARDE";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo"<script>close()</script>"; 
  }

}

?>
                        <form method="POST">

                          <div class="form-group">
                          <label>Services Name</label>
                  <input type="text" name="name" class="form-control">

                          </div>
      
                            </div>

                            <div class="modal-footer">
                          <input type="submit" name="btnn" value="Submit" class="btn btn-primary">
                              <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
  </form>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>  
          </div>