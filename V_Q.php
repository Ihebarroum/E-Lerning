<?php 
include('Traitement/connex_bdd.php');
?>


<!DOCTYPE html>
<html>

<?php include 'Traitement/header.php'; ?>
<body>
	<?php if(!empty($_POST)){?>
	<div class="wrapper">
	<?php include('Traitement/bonjour.php') ?>
	<?php
	$codquestionnaire=$_POST['codquestionnaire'];
	$question = $bdd->query("SELECT * FROM question WHERE id_questionnaire=$codquestionnaire");
	$i=1;
	while( $ligne = $question->fetch()){
		echo "<br /> Question $i :"; $i++;
		echo $ligne['contenu']; echo "<br /><br />";
		
		$codquestion=$ligne['id']; ?>
		<form />
		
			<?php
			$reponse= $bdd->query("SELECT * FROM reponse WHERE id_question=$codquestion");
			while($ligne_r=$reponse->fetch()){ 
				?>
				<li><input type="radio" value="<?php echo $ligne_r['etat']?>" name="<?php echo $ligne_r['id_question']?>" id="<?php echo $ligne_r['id']?>"
				 <?php if($ligne_r['etat']==1){ echo "checked";} ?>/><?php echo $ligne_r['contenu']?></li>
				<?php
			}
			?></form><?php
			}?>
	<form action="professeur.php">
		<input type="submit" class="alert button" value="Retour">
	</form>
			</div>
			<?php include"Traitement/footer.php"; ?>
			<?php }else{
				header("location: professeur.php");
			}?>
</body>
</html>
