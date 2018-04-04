<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname=questionnaire', 'root', '');
	//PDO::ATTR_ERRMODE: This attribute is used for error reporting.
	//ERRMODE_EXCEPTION: This value throws exceptions
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
		die('Erreur : '.$e->getMessage());
}
//quelque fonction utilisé 
//informatique,math ect
function matiere($idm,$bdd){
	$req = $bdd->query("SELECT libelle FROM section WHERE id = '$idm'");
	$ligne = $req->fetch();
	return ucfirst($ligne['libelle']);
}
// 1.2.3.4
function niveau($idn,$bdd){
	$req = $bdd->query("SELECT libelle FROM niveau WHERE id = '$idn'");
	$ligne = $req->fetch();
	return ucfirst($ligne['libelle']); 
}
function difficulte($idd, $bdd){
	$req = $bdd->query("SELECT libelle FROM difficulte WHERE id = '$idd'");
	$ligne = $req->fetch();
	return ucfirst($ligne['libelle']);
}
session_start();
?>