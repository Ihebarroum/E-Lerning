<?php 
include('Traitement/connex_bdd.php');
if(!empty($_POST) && $_SESSION['mode'] == "professeur"){
	$id_matiere=$_SESSION['id_matiere'];
	$id=$_SESSION['id'];
	$nom_q=$_POST['nom_q'];
	$libelle=$_POST['nom_q'];
	$nombre=$_POST['nombre'];
	$dif= $_POST['difficulte'];
	$id_n = $_SESSION['id_niveau'] ;
	$duree = $_POST['duree'];
?>
<!DOCTYPE html>
<html>
<?php include 'Traitement/header.php'; ?>

<body style="background-image:url('images/theme.png')">
	<div class="wrapper">
	<?php include('Traitement/bonjour.php');?>
	<form method="POST" action="Traitement/traitement_ajout.php">
	<input type="hidden" value="<?php echo $nombre?>" name="nombre" />
	<h3>Titre de votre test : <?php echo $nom_q?> </h3>
	<input type="hidden" name="nombre" value="<?= $nombre?>" >
	<input type="hidden" name="difficulte" value="<?=$dif ?>">
	<input type="hidden" name="duree" value="<?=$duree ?>">
	<input type="hidden" name="nom_q" value="<?php echo $nom_q?>" /><br/><br/>
	
		<?php 
		$j=0;
		for($i=1; $i<=$nombre; $i++){
			echo " Question $i :"; ?>
			
			<input type="text" name="<?php echo 'Q'.$i?>" placeholder="Tapez votre question :" required/><br/>
			<ul>
				<input style="float:left" type="radio" id="<?php $j++ ; echo 'R'.$j;?>"  value="<?= $j?>"name="<?php echo 'RJ'.$i ?>" required/>
					<input style="width: 30%"type="text" name="<?php echo 'R'.$j ?>" required placeholder="la 1ère réponse " /><br/>
				<input style="float:left" type="radio" id="<?php $j++ ; echo 'R'.$j;?>"  value="<?= $j?>" name="<?php echo 'RJ'.$i ?>"required/>
					<input style="width: 30%"type="text" name="<?php echo 'R'.$j ?>" placeholder="la 2ème réponse " required /><br/>
				<input style="float:left" type="radio" id="<?php $j++ ; echo 'R'.$j;?>" value="<?= $j?>" name="<?php echo 'RJ'.$i ?>"required/>
					<input style="width: 30%"type="text" name="<?php echo 'R'.$j ?>" placeholder="la 3ème réponse "required /><br/>
				<input style="float:left" type="radio" id="<?php $j++ ; echo 'R'.$j;?>" value="<?= $j?>" name="<?php echo 'RJ'.$i ?>"required/>
					<input style="width: 30%"type="text" name="<?php echo 'R'.$j ?>" placeholder="la 4ème réponse "required /><br/>
			</ul ><hr>
			
		<?php } ?>
		
		<input type="submit" class="radius button" value="Valider" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" class="radius button" value="Vider" />
		
	</form>
	
	<form action="professeur.php">
		<center><input type="submit" class="alert radius button" value="Retour "></center>
	</form>
</div>
<?php include "Traitement/footer.php"; ?>
</body>
<?php } else {
	header('location: professeur.php');
}?>
</html>
