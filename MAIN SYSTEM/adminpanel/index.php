<?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event Calendar</title>
<link type="text/css" rel="stylesheet" href="calendarjscript/style.css"/>
<link type="text/css" rel="stylesheet" href="calendarjscript/bootstrap/css/bootstrap.css"/>
<link type="text/css" rel="stylesheet" href="calendarjscript/bootstrap/css/bootstrap.min.css"/>
<script src="calendarjscript/jquery.min.js"></script>
</head>
<body>
<div id="calendar_div" class="container">
<h1 align="center">EVENT CALENDAR</h1>
	<?php echo getCalender(); ?>
</div>
</body>
</html>
