<?php
require_once('bdd.php');


$sql = "SELECT id, name ,lastname, mobile, address, p_name, qty, price,payment, title, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
	<title>Pet Central</title>
	 <link rel="shortcut icon" type="image/png" href="../images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   	<title>Pet Central</title>
	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


<style>
			#shipinfo{
				display: none;
			}
		</style>
		    <script>
    		function showHideShipInfo(){

    			var chk = document.getElementById('ship');
    			var hide = document.getElementById('shipinfo');

    		if(chk.checked){
    			hide.style.display='block';
    		}else {
    			hide.style.display='none';
    		}

    	}
    </script>

</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
       
      </div>
      <ul class="nav navbar-nav">
					<li><a href="../staff_homepage.php" style="padding-top: 20px" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="../staff_profile.php" style="padding-top: 20px"><span class="glyphicon glyphicon-modal-window"></span> Products & Services</a></li>
				</ul>
        <ul class="nav navbar-nav navbar-right">

           <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 20px"><span class="glyphicon glyphicon-user"></span>Hi Staff</a>
            <ul class="dropdown-menu">

                <li><a href="../order_history.php" style="text-decoration:none; color:#00b3b3;"><span class="glyphicon glyphicon-send"></span> Order History</a></li>

                    <li class="divider"></li>

                <li><a href="../customer_logout.php" style="text-decoration:none; color:#74ACB3;">Log-Out</a></li>

                    <li class="divider"></li>

            </ul>
          </li>

          </li>
        </ul>
        </ul>

    </div>
  </div>
      </ul>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Customers Orders</h1>
                <p class="lead"></p>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel" style="text-align: center;">Add Customer Orders</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-5">
					  <input type="text" name="name" class="form-control" id="name" placeholder="First Name">
					</div>
					<div class="col-sm-5">
					  <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name">
					</div>
					</div>

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Contact Number</label>
					<div class="col-sm-10">
					  <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Contact Number">
					</div>
					</div>

					<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Address</label>
					<div class="col-sm-10">
					  <input type="text" name="address" class="form-control" id="address" placeholder="Delivery Address">
					</div>
					</div>


					<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Product Name</label>
					<div class="col-sm-5">
					  <input type="text" name="p_name" class="form-control" id="p_name" placeholder="Product Name">
					</div>
					<div class="col-sm-5">
					  <input type="text" name="qty" class="form-control" id="qty" placeholder="Quantity">
					</div>
					</div>

					<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Total Amount</label>
					<div class="col-sm-10">
					  <input type="text" name="price" class="form-control" id="price" placeholder="Total Price">
					</div>
					</div><br>

		<div class="form-group">
		<div class="col-sm-10">

		<input  type="checkbox" name="ship" id="ship" value="yes" onclick="showHideShipInfo()">
		<label for="ship">Reservation Payment </label>

		</div>
		</div>
		
		<fieldset id="shipinfo">
						<h3 style="text-align: center;">Customer Payment</h3>

						
					<div class="form-group">
						<div class="row">
										

					<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Customer Payment</label>
					<div class="col-sm-10">
					  <input type="text" name="payment" class="form-control" id="payment" placeholder="Payment">
					</div>
					</div>

					</fieldset>



				<div class="form-group"><br>
						<label for="title" class="col-sm-2 control-label">Option</label>
					<div class="col-sm-10">
						<select name="title"  id="title"  class="form-control" required="required">
							<option value="">Choose Order Option</option>
							<option value="Reserve">Reserve</option>
							<option value="Cash on Delivery">Cash on Delivery</option>
							<option value="Maintenance">Maintenance</option>
						</select>
					</div>

				  </div>

				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color" required="required" >
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#2b2828;" value="#2b2828">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"  style="text-align: center;">Customer Profile</h4>
			  </div>
			  <div class="modal-body">
				
			  	 <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-5">
					  <input type="text" name="name" class="form-control" id="name" placeholder="First Name">
					</div>
					<div class="col-sm-5">
					  <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name">
					</div>
					</div>

					<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Contact Number</label>
					<div class="col-sm-10">
					  <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Contact Number">
					</div>
					</div>

					<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Address</label>
					<div class="col-sm-10">
					  <input type="text" name="address" class="form-control" id="address" placeholder="Address">
					</div>
					</div>


					<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Product Name</label>
					<div class="col-sm-3">
					  <input type="text" name="p_name" class="form-control" id="p_name" placeholder="Product Name">
					</div>
					<div class="col-sm-3">
					  <input type="text" name="qty" class="form-control" id="qty" placeholder="Quantity">
					</div>
					</div>

					<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Total Amount</label>
					<div class="col-sm-10">
					  <input type="text" name="price" class="form-control" id="price" placeholder="Total Price">
					</div>
					</div><br>

					<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Customer Payment</label>
					<div class="col-sm-10">
					  <input type="text" name="payment" class="form-control" id="payment" placeholder="Payment">
					</div>
					</div>

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Option</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title" required="required">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color" required="required">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>	
						  <option style="color:#2b2828;" value="#2b2828">&#9724; Black</option>					  
						</select>
					</div>
				  </div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>
	
	<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
			},
			defaultDate: $('#calendar').fullCalendar('today'),﻿
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #name').val(event.name);
					$('#ModalEdit #lastname').val(event.lastname);
					$('#ModalEdit #mobile').val(event.mobile);
					$('#ModalEdit #address').val(event.address);
					$('#ModalEdit #p_name').val(event.p_name);
					$('#ModalEdit #qty').val(event.qty);
					$('#ModalEdit #price').val(event.price);
					$('#ModalEdit #payment').val(event.payment);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					name: '<?php echo $event['name']; ?>',
					lastname: '<?php echo $event['lastname']; ?>',
					mobile: '<?php echo $event['mobile']; ?>',
					address: '<?php echo $event['address']; ?>',
					p_name: "<?php echo $event['p_name']; ?>",
					qty: '<?php echo $event['qty']; ?>',
					price: '<?php echo $event['price']; ?>',
					payment: '<?php echo $event['payment']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Saved');
					}else{
						alert('Could not be saved. try again.'); 
					}
				}
			});
		}
		
	});

</script>

</body>

</html>
