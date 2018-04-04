<?php
session_start();
require_once 'connection.php';

$nom = $_POST['nom'];
$message = $_POST['message'];
$recipient = $_POST['recipient'];

$sql = "INSERT INTO user_chat_messages
	(
	message_content,
	nom,
	message_time,
	recipient)
	VALUES
	(:a,:b,:c,:d)";
$qry = $con->prepare($sql);
$qry->execute(array(':a'=>$message,':b'=>$nom,':c'=>'now()',':d'=>$recipient));
?>