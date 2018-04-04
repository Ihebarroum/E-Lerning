<?php include "../Traitement/connex_bdd.php";

if(isset($_POST['niveau'])){
	$mat = $bdd->prepare("SELECT * FROM niveau where libelle = :mat ");
	$mat->bindValue(":mat", $_POST['niveau']);
	$mat->execute();
	$row = $mat->fetch();
	if(empty($row)){
		$mat = $bdd->prepare("INSERT INTO niveau(libelle) VALUES (:mat)");
		$mat->bindValue(":mat", $_POST['niveau']);
	
		$mat->execute();
		header("location: master.php?notif=4");
	}
	else{
	 header("location: master.php?notif=3");
	}
}else{
	header("location: master.php?notif=3");
}