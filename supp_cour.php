<?php
include('Traitement/connex_bdd.php');
$code=$_GET["id_cour"];
$ok = $bdd->query("delete from cours where id_cour='$code'");
if($ok==false)
  {
echo"ereur";
  }
  else
	   {
     header('location:list_session_tut.php');
  }
?>