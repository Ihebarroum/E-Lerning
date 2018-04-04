<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}
include('connection.php');
$pseudo = $_POST['pseudo'];

 if(!isset($_SESSION['pseudo'])) { 
$sql = "SELECT * FROM professeur where pseudo='$pseudo' ";
$qry = $con->query($sql);
 
if ($qry->fetchColumn() > 0) 
{
	$_SESSION['mode'] = $pseudo;
	header('location:home.php');
	exit();
}	
else
{
	$error = "Please check your username and password.";
	header('location:error.php?error='.$error.'');
	exit();
}
}
?>