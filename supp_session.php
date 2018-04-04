<?php
include('Traitement/connex_bdd.php');
$code=$_GET["id_session"];
$ok = $bdd->query("delete from session where id_session='$code'");
if($ok==false)
  {
echo"ereur";
  }
  else
	   {
     header('location:list_session.php');
  }
?>