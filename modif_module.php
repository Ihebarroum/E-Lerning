<?php   
include('Traitement/connex_bdd.php');

	$id_module=$_POST['id_module'];
	$nom=$_POST['nom'];
	$date_deb=$_POST['date_deb'];
	$date_fin=$_POST['date_fin'];
  $res= "update module set nom= '$nom' , date_deb= '$date_deb' , date_fin= '$date_fin'  where id_module = '$id_module'";
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
