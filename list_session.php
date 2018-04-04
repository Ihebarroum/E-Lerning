<?php
include('Traitement/connex_bdd.php');
$id=$_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<?php include 'Traitement/header.php'; ?>

<body>
	<div class="wrapper">
	<?php include('Traitement/bonjour.php') ?>
	
	<?php 
		if(isset($_GET['cas'])){
			$x=$_GET['cas'];
			if($x==2){?>
				<div  id="notif" ><span class="success button">L'ajout effectué ! Veuillez attendre la validation de votre session !</span><span class="success button" onClick="document.getElementById('notif').style.display= 'none'"><b>X</b></span></div>
			<?php }
		}
?>
	<?php
	if(!empty($_POST) && $_SESSION['mode']=="professeur"){
$id_matiere=$_SESSION['id_matiere'];
$id_n = $_SESSION['id_niveau'] ;
$id=$_SESSION['id'];

	$req = $bdd->query("select * from session WHERE  id_prof='$id' AND activation=1 ");
	
$nb=$req->rowCount();
$i=0;

?>
 <form action="" method="post" name="form1" id="form1">
    	 <table class="table table-list-search" class="list">
		 
    <tr>
 <td width="20" class="entete_tableau"></td>                 
<td width="80" class="entete_tableau">ID</td>
<td width="140" class="entete_tableau">Nom</td>
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
	<td class="corps_tableau"><div align="center">
<input name="chk<?php print $i; ?>"type="checkbox" value="checkbox" />
</td>
    	<td ><?php echo $dnn['id_session']; ?></td>
		<td ><a href="moduleAdmin.php?id_session=<?php print $dnn[0]; ?>"><?php echo htmlentities($dnn['nom'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td ><?php echo htmlentities($dnn['date_deb'], ENT_QUOTES, 'UTF-8'); ?></td>
		<td ><?php echo $dnn['date_fin']; ?></td>
		<td width="20" class="corps_tableau">
         <a href="modifs.php?id_session=<?php print $dnn[0]; ?>"><img src="images/b_edit.png" alt="editer" width="20" height="20" border="0" title="Editer"/></a>
        </td>
        <td width="20" class="corps_tableau">
        <a href="supp_session.php?id_session=<?php print $dnn[0]; ?>" ><img src="images/b_drop.JPG" alt="editer" width="20" height="20" border="0" title="supprimer"/></a>
</td>
	
    </tr>
	
	<?php
}
	
?>
</table>
<?php
}
	
?>
</form>
	
<center>
<table>
<tr>
<td>
   <form action="ajout_session.php" method="post">
		<input type="submit" class="radius button" value="Ajouter Session">
	</form>
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
