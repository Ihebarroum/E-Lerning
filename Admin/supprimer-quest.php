<?php include "../traitement/connex_bdd.php";

if(isset($_GET['id']) && $_SESSION['mode'] == "master"){
	try{
		$bdd->beginTransaction();
		//vider la table passer 
		$idq = $_GET['id'];
		$bdd->query("DELETE FROM passer WHERE id_questionnaire = '$idq' ");
		//selectioné tableau des questions  
		$req = $bdd->query("SELECT * FROM question WHERE id_questionnaire = '$idq'");
		$tabid = array();
		while($ligne = $req->fetch()){
			array_push($tabid, $ligne['id']);
		}
		//supprimer les réponses de chaque question 
		foreach ($tabid as $value) {
			$bdd->query("DELETE FROM reponse WHERE id_question = '$value' ");
			//supprimer la question 
			$bdd->query("DELETE FROM question WHERE id = '$value' ");
		}
		//supprimer le questionnaire
		$bdd->query("DELETE FROM questionnaire WHERE id = '$idq' ");
		$bdd->commit();
		header("location: listes.php?type=Listes+des+Questionnaires");
	}catch(PDOexception $e){
		$bdd->rollbacl();
		die($e->getMessage());
	}

}else{
	header("location: index.php");
}