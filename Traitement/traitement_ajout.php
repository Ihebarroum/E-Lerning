<?php
session_start();
include('connex_bdd.php');
if(!empty($_POST) && $_SESSION['mode']=="professeur"){
$id_matiere=$_SESSION['id_matiere'];
$id=$_SESSION['id'];
$libelle=$_POST['nom_q'];
$nombre_question=$_POST['nombre']; 
$dif = $_POST['difficulte'];
$id_n = $_SESSION['id_niveau'] ;
$duree = $_POST['duree'];

try{
	$bdd->beginTransaction();
//ajout d'un questionnaire !!
$req = $bdd->prepare("INSERT INTO questionnaire (id_matiere, id_niveau, id_difficulte, id_prof, libelle, activation, duree)
			 VALUES (:id_matiere, :id_niveau, :id_difficulte, :id_prof, :libelle, :activation,:duree)");
$req->execute(array(
	'id_matiere' => $id_matiere,
	 'id_niveau' => $id_n, 
	 'id_difficulte' => $dif, 
	 'id_prof' => $id,
	 'libelle' => $libelle,
	 'activation' => 0,
	 'duree' => $duree));
$req->closecursor();

// recupere l'id de ce questionnaire :
$req = $bdd->query("SELECT MAX(id) as max FROM questionnaire WHERE libelle='$libelle' ");
$ligne = $req->fetch();
$id_questionnaire1=$ligne['max'];
$req->closecursor();

/* ça marche mais 7iyedtha pour l'instant ;) 
// ajout des questions !!*/
$ids=array();
for($i=1; $i<=$nombre_question; $i++){
	$contenu=$_POST["Q$i"];
	$req1= $bdd->prepare("INSERT INTO question (contenu, id_questionnaire) VALUES (:contenu, :id_questionnaire)");
	$req1->execute(array('contenu' => $contenu, 'id_questionnaire' => $id_questionnaire1));
	$query = $bdd->query("SELECT MAX(id) AS idqu FROM question ");
	$row = $query->fetch();	
	array_push($ids,$row['idqu']);
}
$req1->closecursor();

// ajout des reponses : 
// enregistrer toutes les reponses 
$nombre_reponse=4*$nombre_question;
$k=0;

for($j=0 ; $j<$nombre_question ;$j++){

	for($i=$k+1; $i<=$k+4 ; $i++){		
		$contenu=$_POST["R$i"];
		$req1= $bdd->prepare("INSERT INTO reponse (contenu, id_question,etat) VALUES (:cont , :idq , :etat) ");
		$req1->bindValue(':cont', $contenu);
		$req1->bindValue(':idq',$ids[$j] );
		$m = $j+1;
		$ind = "RJ".$m;
		if($i == $_POST[$ind]){
			$req1->bindValue(':etat', 1 );
		}else{
			$req1->bindValue(':etat', 0 );
		}
		$req1->execute();	
	}
	$k+=4;
}

$bdd->commit();
$x=1;
header("location: ../professeur.php?notif=$x");
}catch(PDOexception $e){
	$bdd->rollback();
	$x=2;
	header("location: ../professeur.php?notif=$x");
}
}else{
	header("location: ../professeur.php");
}
?>