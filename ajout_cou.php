<?php 
include('Traitement/connex_bdd.php');
?>
<?php



$id_module=$_POST['id_module'];
$titre_cour=$_POST['titre_cour'];
$document = $_POST['document'];
$lien = $_POST['lien'];


//ajout d'un session !!
$req = $bdd->prepare("INSERT INTO cours (titre_cour,document,lien,id_module) 
			 VALUES (:titre_cour, :document,:lien,:id_module)");
$req->execute(array(
	 'titre_cour' => $titre_cour,
	 
	 'document' => $document,
	 'lien' => $lien,
	   'id_module' => $id_module
 ));
	if($req==false){
		
	header("location: ajout_cours.php");}
	else {
		header("location: list_session_tut.php");
		
	}

?>
