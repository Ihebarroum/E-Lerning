<?php 
include('../Traitement/connex_bdd.php');
?>
<?php

if(!empty($_POST)){

$nom=$_POST['nom'];
$date_deb=$_POST['date_deb']; 
$date_fin = $_POST['date_fin'];
$id_prof= $_POST['id_prof'];
$id_matiere=$_SESSION['id_matiere'];
$id_niveau=$_SESSION['id_niveau'];
	
//ajout d'un session !!
if(isset($_POST['id_prof'])){
	$pro = $bdd->prepare("SELECT * FROM professeur where id = 'id_prof' ");
	$pro->bindValue(":nom", $_POST['id_prof']);
	$pro->execute();
	$row = $pro->fetch();
	$prof = $bdd->prepare("SELECT * FROM professeur where id = 'id_prof' ");
	$prof->bindValue(":id_matiere", $_POST['id_matiere']);
	$prof->execute();
	$row = $prof->fetch();
	$profs = $bdd->prepare("SELECT * FROM professeur where id = 'id_prof' ");
	$profs->bindValue(":id_niveau", $_POST['id_niveau']);
	$profs->execute();
	$row = $profs->fetch();
	}
$req = $bdd->prepare("INSERT INTO session (nom, date_deb,date_fin,id_prof,id_matiere,id_niveau) 
			 VALUES (:nom, :date_deb, :date_fin,:id_prof, :id_matiere,:id_niveau)");
$req->execute(array(
	 'nom' => $nom,
	 'date_deb' => $date_deb, 
	 'date_fin' => $date_fin,  
	 'id_prof' => $id_prof,
	 'id_matiere' => $id_matiere,
	 'id_niveau' => $id_niveau

	 ));
  
	if($req==false){
		$x=3;
	header("location: ajout_sess.php?cas=$x");}
	else {$x=2;
		header("location:listes.php?type=Création+des+Sessions?cas=$x");
		
	}
}
?>
