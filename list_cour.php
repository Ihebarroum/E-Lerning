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
	$req = $bdd->query("select  id_cour, titre_cour,document,lien from cours  where id_module='$code'");
	
$nb=$req->rowCount();
$i=0;
?>
	<?php
	while($dn =$res->fetch())
            {
				?>
				<center>
				<h1> liste cours:<?php echo $dn['nom']; ?></h1></center>
				<?php
			}
				?>
 <form action="" method="post" name="form1" id="form1">
    	 <table class="table table-list-search" class="list">
		 
    <tr>
              


<td width="140" class="entete_tableau">Titre Cours</td>
<td width="200" class="entete_tableau">Document</td>
<td width="200" class="entete_tableau">lien</td>
<td width="70" colspan="2" class="entete_tableau">Actions</td>
</tr>
	<?php
	
	while($dnn =$req->fetch())
		
{
	$i++;
?>
	<tr>
	
    	
    	
		
		<td ><?php echo $dnn['titre_cour']; ?></td>
		<td ><a href="document/<?php echo $dnn['document']; ?>"><?php echo $dnn['document']; ?></a></td>
		<td ><a href="<?php echo $dnn['lien']; ?>" > <?php echo $dnn['lien']; ?> </a></td>
		<td width="20" class="corps_tableau">
         <a href="modif_cou.php ?id_cour=<?php print $dnn[0]; ?>"><img src="images/b_edit.png" alt="editer" width="20" height="20" border="0" title="Editer"/></a>
        </td>
		<td width="20" class="corps_tableau">
<a href="supp_cour.php?id_cour=<?php print $dnn[0]; ?>" ><img src="images/b_drop.JPG" alt="supprimer" width="20" height="20" border="0" title="supprimer"/></a>
</td>

        

  
    </tr>
	
	<?php
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
		<input type="submit" class="radius button" value="Ajoute Cour">
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
