<?php  
session_start();
error_reporting();
 $connect = mysqli_connect("localhost", "root", "", "pet_central");  
 $query = "SELECT * FROM staff_comments ORDER BY id desc";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
      </head>  
      <body>  

           <br /><br />  
           <div class="container">

 <div class="jumbotron" style="background: white;">

  <script> 
    function printpage() {

    //Get the print button and put it into a variable
    var printButton = document.getElementById("printpagebutton");
    var searchButton = document.getElementById("search");
    // var submitButton = document.getElementById("submit");
    var displayButton = document.getElementById("display");
     var form1 = document.getElementById("form1");
      var form2 = document.getElementById("form2");
      var filter = document.getElementById("filter");
      var from_date = document.getElementById("from_date");
      var to_date = document.getElementById("to_date");
      
    //Set the button visibility to 'hidden' 

    printButton.style.visibility = 'hidden';
    searchButton.style.visibility = 'hidden';
    // submitButton.style.visibility = 'hidden';
    displayButton.style.visibility = 'hidden';
    form1.style.visibility = 'hidden';
    form2.style.visibility = 'hidden';
    filter.style.visibility = 'hidden';
    from_date.style.visibility = 'hidden';
    to_date.style.visibility = 'hidden';
    
    //Print the page content
    window.print()

    //Restore button visibility
    printButton.style.visibility = 'visible';
    searchButton.style.visibility = 'hidden';
    // submitButton.style.visibility = 'visible';
    displayButton.style.visibility = 'visible';
    form1.style.visibility = 'visible';
    form2.style.visibility = 'visible';
    filter.style.visibility = 'visible';
    from_date.style.visibility = 'visible';
    to_date.style.visibility = 'visible';
    
  

}
  </script>
</head>




</style>


    <body>
   



   <br />
   <br />
               
    <div class="container">

      <form method="post" id="form1" class="form-inline">
                   <div class="form-group pull-right">
                    <input type="hidden" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Search" name="search" id="search"   required onkeyup="showResult(this.value)"> 
                
       </div>
         </form>
     <div class="form-group">
       <form method="POST" id="form2">
                                <input type="hidden" id="display" name= "display" class="btn btn-default" value="Display All Record"></button> 

                         <center>
                               <input id="printpagebutton" type="button" class="btn btn-default" value="View/Print Page" onclick="printpage()"/>
                         </center>     <br>
                    <center>   <a href="../../report.php" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-like">Back</a></span></a></center>
                   
        </form>


</div>
 </div>  


<br />

    <center>

  
  
     

      <tbody>
           <div class="container" style="width:10000px;">  
                <h2 align="center"></h2>  
                <h3 align="center"> </h3><br />  
                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-primary btn-sm "  />  
                </div>  
                <div style="clear:both"></div>                 
                <br />  
                <div>  
                     <table class="table table-bordered" > 
                     <thead> 
                          <tr>  
                               <th width="11%">Customer I.D.</th>
                               <th width="10%">First Name</th>  
                               <th width="10%">Last Name</th> 
                               <th width="10%">Mobile</th>                               
                               <th width="10%">Request</th>
                               <th width="10%">Pet Name</th>
                               <th width="10%">Pet Color</th>
                               <th width="10%">Pet Breed</th>
                               <th width="10%">Gender</th>
                               <th width="10%">Date Of Reservation</th>
                                <th width="10%">Date Of Service</th>
                               <th width="10%">Payment</th>
                                
                          </tr> 
                          </thead> 
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                     <tbody id="staff_comments">
                         
                     <?php  
                     }  
                     ?>  
                   </tbody>
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy/mm/dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter_services.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          
                          success:function(data)  
                          {  
                               $('#staff_comments').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>
