<?php
include('Traitement/connex_bdd.php');
$code=$_SESSION['id'];
$id=$_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<?php include 'Traitement/header.php'; ?>

<body>
	<div class="wrapper">
	<?php include('Traitement/bonjour.php') ?>
	<?php

	

	$req = $bdd->query("select * from session where id_prof='$code' AND activation=1");
	
$nb=$req->rowCount();
$i=0;
?>

<center>
<h1> Liste session</h1>
 <form action="" method="post" name="form1" id="form1">
    	 <table class="table table-list-search" class="list">
		 
    <tr>                

<td width="80" class="entete_tableau">Nom session</td>
<td width="140" class="entete_tableau">Date de début </td>
<td width="200" class="entete_tableau">Date fe fin</td>


</tr>
	<?php
	
	while($dnn =$req->fetch())
		
{
	$i++;
?>
	<tr>
		
    			<td ><a href="moduleAdmin.php?id_session=<?php print $dnn[0]; ?>"><?php echo htmlentities($dnn['nom'], ENT_QUOTES, 'UTF-8'); ?></a></td>

		
		<td ><?php echo $dnn['date_deb']; ?></td>
		<td ><?php echo $dnn['date_fin']; ?></td>
    </tr>
	
	<?php
}
			
?>
</table>
</form>

<table>
<tr>
<td>

	</td>
	
	<td>
	<form action="professeur.php">
		<input type="submit" class="alert radius button" value="Retour">
	</form>
	</td>
	</tr>
	</table>
	</center>
</div>
	<?php include "Traitement/footer.php" ?>
</body>
</html>
