<?php 
include('Traitement/connex_bdd.php');
?>
<?php

$id_session=$_POST['id_session'];
$nom=$_POST['nom'];
$date_deb=$_POST['date_deb']; 
$date_fin = $_POST['date_fin'];
//ajout d'un session !!
$req = $bdd->prepare("INSERT INTO module (nom, date_deb,date_fin,id_session) 
			 VALUES (:nom, :date_deb, :date_fin,:id_session)");
$req->execute(array(
	 'nom' => $nom,
	 'date_deb' => $date_deb, 
	 'date_fin' => $date_fin,
	 'id_session'=> $id_session
 ));

	if($req==false){
		
	header("location: ajout_module.php");}
	else {
		header("location: list_session_tut.php");
		
	}

?>
