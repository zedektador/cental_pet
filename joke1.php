    <meta charset="utf-8">
    <title>G.C.P Aircon Services</title>
     <link rel="shortcut icon" type="image/png" href="../images/weblogo.png"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>G.C.P Aircon Services</title>
    <link rel="shortcut icon" type="image/png" href="images/weblogo.png"/>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FullCalendar -->
    <link href='css/fullcalendar.css' rel='stylesheet' />

<script>
function garage_onchange(){
    var selGarageValue = document.getElementById("garage").value;
    var selFloor = document.getElementById("floor");

    for(var i=selFloor.options.length-1;i>=0;i--){
        selFloor.remove(i);
    }

    if(selGarageValue=="F"){
        var option = document.createElement('option');
        option.text = "Dark blue";
        option.value="#0071c5";
        selFloor.add(option);

    }
    else if(selGarageValue=="K"){
        var option = document.createElement('option');
        option.text = "A2";
        option.value="A2";
        selFloor.add(option);
        option = document.createElement('option');
        option.text = "B2";
        option.value="B2";
        selFloor.add(option);
    }
}
</script>

Garage: 
<select id="garage" name="garage" onchange="garage_onchange();">
<option value="S" selected="selected">-Choose Garage-</option>
<option value="F">F</option>
<option value="K">K</option>
</select>

<br />
Floor: 
<select name="floor" id="floor">
</select>
