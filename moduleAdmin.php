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
	$code=$_GET["id_session"];
	$res=$bdd->query("select nom from session where id_session='$code'");
	$req = $bdd->query("select  id_module, nom, date_deb,date_fin from module  where id_session='$code'");
	
$nb=$req->rowCount();
$i=0;
?>
<?php
$res1=$bdd->query("select nom from session where id_session='$code'");
while($dn1 =$res->fetch())
            {
				?>
				<center>
<h1> Liste module:<?php echo $dn1['nom']; ?> </h1></center>
<?php
			}
			?>
 <form action="" method="post" name="form1" id="form1">
   <center>
    	 <table class="table table-list-search" class="list">
		 
    <tr>

<td width="140" class="entete_tableau">Nom module</td>
<td width="140" class="entete_tableau">Date de début </td>
<td width="200" class="entete_tableau">Date fe fin</td>

<td width="70" colspan="2" class="entete_tableau">Actions</td>
</tr>
	<?php
	
	while($dnn =$req->fetch())
		
{
	$i++;
?>
	<tr>
	
    	
    	
		
	
				
		<td ><a href="list_cour.php?id_module=<?php print $dnn[0]; ?>"><?php echo htmlentities($dnn['nom'], ENT_QUOTES, 'UTF-8'); ?></a></td>
		<td ><?php echo $dnn['date_deb']; ?></td>
		<td ><?php echo $dnn['date_fin']; ?></td>
    	
		<td width="20" class="corps_tableau">
         <a href="modif_mod.php ?id_module=<?php print $dnn[0]; ?>"><img src="images/b_edit.png" alt="editer" width="20" height="20" border="0" title="Editer"/></a>
        </td>
		<td width="20" class="corps_tableau">
<a href="supp_module.php?id_module=<?php print $dnn[0]; ?>" ><img src="images/b_drop.JPG" alt="supprimer" width="20" height="20" border="0" title="supprimer"/></a>
</td>

        

  
    </tr>
	
	<?php
}
			
?>
</table>
</center>
</form>
<center>
<table>
<tr>
<td>
<?php
	$code=$_GET["id_session"];
	$rez=$bdd->query("select id_session from session where id_session='$code'");
	$dez =$rez->fetch();
	?>
   <form action="ajout_module.php?id_session=<?php echo $dez['id_session'];?>" method="post">
		<input type="submit" class="radius button" value="Ajoute Module">
	</form>
	</td>
	
	<td>
	<form action="list_session_tut.php">
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
