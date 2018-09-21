<?php

require_once('bdd.php');
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM events WHERE id = $id";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
}elseif (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['mobile']) && isset($_POST['address']) && isset($_POST['p_name']) && isset($_POST['qty']) && isset($_POST['price']) && isset($_POST['payment']) && isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$name =$_POST['name'];
	$lastname =$_POST['lastname'];
	$mobile =$_POST['mobile'];
	$address =$_POST['address'];
	$p_name =$_POST['p_name'];
	$qty =$_POST['qty'];
	$price =$_POST['price'];
	$payment =$_POST['payment'];
	$title = $_POST['title'];
	$color = $_POST['color'];

	$sql = "UPDATE `events` SET `name` = '$name', `lastname` = '$lastname', `mobile` = '$mobile', `address` = '$address', `p_name` = '$p_name', `qty` = '$qty', `price` = '$price', `payment` = '$payment', `title` = '$title', `color` = '$color' WHERE `events`.`id` = '$id';";
	
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
header('Location: index.php');

	
?>
