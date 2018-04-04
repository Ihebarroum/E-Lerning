<style>
p{
border-top: 1px solid #EEEEEE;
margin-top: 0px; margin-bottom: 5px; padding-top: 5px;
}
</style>
<?php
session_start();
require_once 'connection.php';
$nom = $_SESSION['nom'];

$sql = "SELECT * FROM user_chat_messages where nom='$nom' ";
$qry = $con->prepare($sql);
$qry->execute();
$fetch = $qry->fetchAll();
foreach ($fetch as $row):

	$time = date("Y-m-d",strtotime($row['message_time']));
	$now = date("Y-m-d");
	if (($row['nom'] == $nom) && ($time == $now)) {
		$nom = '<strong style="color:green;">'.$row['nom'].'</strong>'.'-->'.$row['recipient']; 
	}else{
		$nom = '<strong style="color:blue;">'.$row['nom'].'</strong>'; 			
	}	
	if ($time == $now) {
		$hourAndMinutes = date("h:i A", strtotime($row['message_time']));
	}else{
		$hourAndMinutes = date("Y-m-d", strtotime($row['message_time']));
	}
	echo '<p>'.$nom.':<em>('.$hourAndMinutes.')</em>'.'<br/>'.' '.'<img src="images/msg.png" width="10" height="10">'.' '. $row['message_content']. '</p>';

endforeach; 

?>