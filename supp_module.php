<?php
include('Traitement/connex_bdd.php');
$code=$_GET["id_module"];
$ok = $bdd->query("delete from module where id_module='$code'");
if($ok==false)
  {
echo"ereur";
  }
  else
	   {
     header('location:list_module.php');
  }
?>