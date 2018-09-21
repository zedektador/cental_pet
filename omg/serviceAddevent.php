<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['mobile']) && isset($_POST['request']) && isset($_POST['a_name']) && isset($_POST['a_name1'])  && isset($_POST['a_name2']) && isset($_POST['start']) && isset($_POST['payment'])){
	
	$firstname =$_POST['firstname'];
	$lastname =$_POST['lastname'];
	$mobile =$_POST['mobile'];
	$request =$_POST['request'];
	$a_name =$_POST['a_name'];
	$a_name1 =$_POST['a_name1'];
	$a_name2 =$_POST['a_name2'];
	$start = $_POST["start"];
	$payment = $_POST["payment"];

$sql = "INSERT INTO `staff_comments` (`id`, `firstname`, `lastname`, `mobile`, `address`, `a_name`, `a_name1`, `a_name2`,`start`, 'payment' ) VALUES (NULL, '$firstname', '$lastname', '$mobile', '$address', '$a_name', '$a_name1', '$a_name2', '$start', '$payment');";
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
