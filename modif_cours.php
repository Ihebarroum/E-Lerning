<?php   
include('Traitement/connex_bdd.php');

	$id_cour=$_POST['id_cour'];
	$nom=$_POST['nom'];
	$document=$_POST['document'];
	$lien=$_POST['lien'];
  $res= "update cours set titre_cour= '$nom' , document= '$document' , lien= '$lien'  where id_cour = '$id_cour'";
	$requete = $bdd->query($res);
		
  //affichage des résultats, pour savoir si la modification a marchée:
  if($requete==false)
  {
	  echo"ereur";
 
  }
  else
  {  
     
 header('location:list_session_tut.php');
  }
?>
