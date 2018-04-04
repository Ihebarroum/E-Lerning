<?php
include('Traitement/connex_bdd.php');

?>

<!DOCTYPE html>
<html>
<?php include 'Traitement/header.php'; ?>

<body>
	<div class="wrapper">
	<?php include('Traitement/bonjour.php') ?>
	

	<?php

	if(!empty($_POST) && $_SESSION['mode']=="etudiant"){

	$id_niveau = $_SESSION['id_niveau'];
   
	$req = $bdd->query("select * from session WHERE( activation=1 AND id_niveau = $id_niveau  )");
	
$nb=$req->rowCount();
$i=0;

?>
 <form action="" method="post" name="form1" id="form1">
    	 <table class="table table-list-search" class="list">		 
    <tr>
                 
<td width="140" class="entete_tableau">Nom</td>
<td width="140" class="entete_tableau">Date de début </td>
<td width="200" class="entete_tableau">Date fe fin</td>
</tr>
	<?php
	while($dnn =$req->fetch())
		
      {
	     $i++;
    ?>
	<tr>
		
        <td><?php echo htmlentities($dnn['nom'], ENT_QUOTES, 'UTF-8'); ?></td>
    	<td ><?php echo htmlentities($dnn['date_deb'], ENT_QUOTES, 'UTF-8'); ?></td>
		<td ><?php echo $dnn['date_fin'];?></td>
		
	
    </tr>
	<?php
   }	
    ?>
</table>
<?php
}	
?>
</form>
<form action="etudiant.php">
	<input type="submit" value="Retour " class="success button radius" />
</form>
</div>
<?php include "Traitement/footer.php" ?>	
</body>
</html>
