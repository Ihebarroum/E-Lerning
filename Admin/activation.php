<?php
include('../Traitement/connex_bdd.php');
if(isset($_POST['filtre'])){
	$filtre = $_POST['filtre'];
}else{
	$filtre = "";
}
if(isset($_POST['codetudiant'])){
		
		$codetudiant=$_POST['codetudiant'];
		$resultat=$bdd->query("SELECT activation FROM etudiant WHERE id=$codetudiant");
		$ligne=$resultat->fetch();
		if($ligne['activation']==1) $bdd->query("UPDATE etudiant SET  activation=0 WHERE id=$codetudiant");
		else $bdd->query("UPDATE etudiant SET  activation=1 WHERE id=$codetudiant");
		$resultat->closecursor();
		header('Location: listes.php?type=Listes+des+Etudiants&filtre='.$filtre);
}
if(isset($_POST['codprof'])){	
		$codprof=$_POST['codprof'];
		$resultat=$bdd->query("SELECT activation FROM professeur WHERE id=$codprof");
		$ligne=$resultat->fetch();
		if($ligne['activation']==1) $bdd->query("UPDATE professeur SET  activation=0 WHERE id=$codprof");
		else $bdd->query("UPDATE professeur SET  activation=1 WHERE id=$codprof");
		$resultat->closecursor();
		header('Location: listes.php?type=Listes+des+Professeurs&filtre='.$filtre);
}
if(isset($_POST['codquestionnaire'])){
		$codquestionnaire=$_POST['codquestionnaire'];
		$resultat=$bdd->query("SELECT activation FROM questionnaire WHERE id=$codquestionnaire");
		$ligne=$resultat->fetch();
		if($ligne['activation']==1) $bdd->query("UPDATE questionnaire SET  activation=0 WHERE id=$codquestionnaire");
		else $bdd->query("UPDATE questionnaire SET  activation=1 WHERE id=$codquestionnaire ");
		$resultat->closecursor();
		header('Location: listes.php?type=Listes+des+Questionnaires&filtre='.$filtre);
}
if(isset($_POST['codesession'])){
		
		$codesession=$_POST['codesession'];
		$resultat=$bdd->query("SELECT activation FROM session WHERE id_session=$codesession");
		$ligne=$resultat->fetch();
		if($ligne['activation']==1) $bdd->query("UPDATE session SET  activation=0 WHERE id_session=$codesession");
		else $bdd->query("UPDATE session SET  activation=1 WHERE id_session=$codesession");
		$resultat->closecursor();
		header('Location: listes.php?type=Listes+des+Session&filtre='.$filtre);
}



?>