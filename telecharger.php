<?php 
header("Content-type:C:/wamp/www/sansadmintest/pdf"); 
header("Content-Disposition: attachment; filename=$_GET[pdf]"); 
 
// On teste l'extension souhaitée pour plus de sécurité (ici c'est un PDF) 
if(strtolower(substr(strrchr($_GET['pdf'],'.'),1)) != 'pdf') { 
  header("location:lis_cour.php"); 
  exit; 
} 
 
// sinon on lance le téléchargement 
else  
  readfile($_GET['pdf']); 
?>
	