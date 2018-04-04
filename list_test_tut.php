<?php
include('Traitement/connex_bdd.php');

?>

<!DOCTYPE html>
<html>
<?php include ('Traitement/header.php'); ?>

<body>
	<div class="wrapper">
	<?php include('Traitement/bonjour.php') ?>
	<?php
		$code=$_GET["id_module"];

	$res=$bdd->query("select nom from module where id_module='$code'");
	$req = $bdd->query("select  * from test  where id_module='$code'");
	
$nb=$req->rowCount();
$i=0;
?>
 <form action="" method="post" name="form1" id="form1">
    	 <table class="table table-list-search" class="list">
		 
    <tr>
 <td width="20" class="entete_tableau"></td>                 
<td width="80" class="entete_tableau">ID</td>
<td width="140" class="entete_tableau">Nom Test</td>
<td width="140" class="entete_tableau">Date de début </td>
<td width="200" class="entete_tableau">Date fe fin</td>

<td width="70" colspan="2" class="entete_tableau">Actions</td>
</tr>
	<?php
	while($dn =$res->fetch())
            {
	while($dnn =$req->fetch())
		
{
	$i++;
?>
	<tr>
	<td class="corps_tableau"><div align="center">
<input name="chk<?php print $i; ?>"type="checkbox" value="checkbox" />
</td>
    	
    	<td ><?php echo $dnn['id_test']; ?></td>
		<td ><?php echo $dnn['titre_test']; ?></td>
		<td ><?php echo $dnn['date_deb']; ?></td>
		<td ><?php echo $dnn['date_fin']; ?></td>
		<td width="20" class="corps_tableau">
         <a href="modif_cou.php ?id_cour=<?php print $dnn[0]; ?>"><img src="images/b_edit.png" alt="editer" width="20" height="20" border="0" title="Editer"/></a>
        </td>
		<td width="20" class="corps_tableau">
<a href="supp_cour.php?id_cour=<?php print $dnn[0]; ?>" ><img src="images/b_drop.JPG" alt="supprimer" width="20" height="20" border="0" title="supprimer"/></a>
</td>

        

  
    </tr>
	
	<?php
}
			}
?>
</table>
</form>
<center>
<table>
<tr>
<td>
<?php
	$code=$_GET["id_module"];
	$rez=$bdd->query("select id_module from module where id_module='$code'");
	$dez =$rez->fetch();
	?>
   <form action="ajout_cours.php?id_module=<?php echo $dez['id_module'];?>" method="post">
		<input type="submit" class="radius button" value="Ajoute Test">
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
	<?php include "Traitement/footer.php" 
	
	?>
	
</body>
</html>
