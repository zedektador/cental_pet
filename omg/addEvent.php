<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['mobile']) && isset($_POST['address']) && isset($_POST['p_name']) && isset($_POST['qty'])  && isset($_POST['price']) && isset($_POST['payment']) && isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$name =$_POST['name'];
	$lastname =$_POST['lastname'];
	$mobile =$_POST['mobile'];
	$address =$_POST['address'];
	$p_name =$_POST['p_name'];
	$qty =$_POST['qty'];
	$price =$_POST['price'];
	$start = $_POST["start"];
	$payment = $_POST["payment"];
	$title = $_POST['title'];
	$color =$_POST['color'];

$sql = "INSERT INTO `events` (`id`, `name`, `lastname`, `mobile`, `address`, `p_name`, `qty`, `price`, `payment`, `title`, `color`, `start`, `end`) VALUES (NULL, '$name', '$lastname', '$mobile', '$address', '$p_name', '$qty', '$price', '$payment', '$title', '$color', '$start', '$end');";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
