<?php   
include('Traitement/connex_bdd.php');

	$id_session=$_POST['id_session'];
	$nom=$_POST['nom'];
	$date_deb=$_POST['date_deb'];
	$date_fin=$_POST['date_fin'];
  $req = "update session set nom= '$nom' , date_deb= '$date_deb' , date_fin= '$date_fin'  where id_session = '$id_session'";
	$requete = $bdd->query($req);
		
  //affichage des résultats, pour savoir si la modification a marchée:
  if($requete==false)
  {
	  echo"ereur";
 
  }
  else
  {  
     
 header('location:list_session.php');
  }
?>
