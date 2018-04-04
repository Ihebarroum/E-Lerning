<?php
session_start();
include('connex_bdd.php');
if(isset($_POST['pseudo']) && isset($_POST['password'])){
	$pseudo = $_POST['pseudo'];
	$pass = $_POST['password'];
}else{
	header("location: auth.php");
}
$x=0;

	$etudiant = $bdd->prepare("SELECT * FROM etudiant WHERE pseudo=:pseudo AND password=:pass limit 1");
	$etudiant->bindValue(':pseudo', $pseudo);
	$etudiant->bindValue(':pass', md5($pass));
	$etudiant->execute();
	$ligne = $etudiant->fetch();

	if(!empty($ligne)){
		$x=1;
		$_SESSION['id']=$ligne['id'];
		$_SESSION['nom']=$ligne['nom'];
		$_SESSION['prenom']=$ligne['prenom'];
		$_SESSION['id_niveau'] = $ligne['id_niveau'];
		$niv = $bdd->prepare("SELECT * FROM niveau where id = :idm");
		$niv->bindValue(':idm', $ligne['id_niveau']);
		$niv->execute();
		$lign = $niv->fetch();
		$_SESSION['niveau'] = $lign['libelle'];
		$_SESSION['email'] = $ligne['email'];
		$_SESSION['mode']="etudiant";
	}
	$etudiant->closecursor();



	$professeur = $bdd->prepare("SELECT * FROM professeur WHERE pseudo=:pseudo AND password=:pass limit 1");
	$professeur->bindValue(':pseudo', $pseudo);
	$professeur->bindValue(':pass', md5($pass));
	$professeur->execute();
	$ligne = $professeur->fetch();

	if(!empty($ligne)){
		$x=2;
		$_SESSION['id']=$ligne['id'];
		$_SESSION['nom']=$ligne['nom'];
		$_SESSION['prenom']=$ligne['prenom'];
		$_SESSION['id_matiere']=$ligne['id_matiere'];
		$_SESSION['email'] = $ligne['email'];
		$mat = $bdd->prepare("SELECT * FROM section where id = :idm");
		$mat->bindValue(':idm', $ligne['id_matiere']);
		$mat->execute();
		$lign = $mat->fetch();
		$_SESSION['matiere'] = $lign['libelle'];
		$_SESSION['id_niveau'] = $ligne['id_niveau'];
		$niv = $bdd->prepare("SELECT * FROM niveau where id = :idm");
		$niv->bindValue(':idm', $ligne['id_niveau']);
		$niv->execute();
		$lign = $niv->fetch();
		$_SESSION['niveau'] = $lign['libelle'];
		$_SESSION['image'] = $ligne['image'];
		$_SESSION['mode']="professeur";	
	}
	$professeur->closecursor();
	

if($x==0){header('Location: ../visiteur.php');}
if($x==1){header('Location: ../etudiant.php');}
if($x==2){header('Location: ../professeur.php');}


?>