<?php 
include('Traitement/connex_bdd.php');
$id=$_SESSION['id'];
	
	$req = $bdd->query("SELECT * FROM questionnaire WHERE activation = '1' ");
	$ligne = $req->fetch();
	$duree = $ligne['duree'];

if(isset($_POST['codquestionnaire']) )
$_SESSION['codquestionnaire']=$_POST['codquestionnaire'];
?>
<html>
<?php include 'Traitement/header.php'; ?>
<?php $milli = $duree*60*1000; ?>
<body onLoad="chrono(<?=$duree?>);submit(<?= $milli ?>);">

<div class="wrapper">
		<?php include('Traitement/bonjour.php'); if(!isset($_GET['id'])){
		$codquestionnaire=$_POST['codquestionnaire'];

		$question = $bdd->query("SELECT * FROM question WHERE id_questionnaire=$codquestionnaire");
		$i=1;
		while( $ligne = $question->fetch()){
			echo "<br /> Question $i :"; $i++;
			echo $ligne['contenu']; echo "<br /><br />";
			
				$codquestion=$ligne['id']; ?>
				<form action="evaluation.php" method="POST"/>
				<?php
				$reponse= $bdd->query("SELECT * FROM reponse WHERE id_question=$codquestion");
				while($ligne_r=$reponse->fetch()){ 
					?>
					<li><input type="radio" value="<?php echo $ligne_r['etat']?>" name="<?php echo $ligne_r['id_question']?>" id="<?php echo $ligne_r['id']?>" required/><?php echo $ligne_r['contenu']?> </li>
					<?php
				}
				?><?php 
			}?>
				<br/><br/><br/>
				<input style="width: 150px" type="submit" class="success button" value="Valider" name="validation">
				&nbsp;&nbsp;&nbsp;&nbsp;<input style="width: 150px"type="reset" class="alert button" value="Vider" name="vider">
				</form> 
				<form action="etudiant.php" ><input style="width: 150px" class=" button"  type="submit" value="Retour"></form>
		<?php } else{ 
			$_SESSION['codquestionnaire']=$_GET['id'];
			$codquestionnaire=$_GET['id'];

		$question = $bdd->query("SELECT * FROM question WHERE id_questionnaire=$codquestionnaire");
		$i=1;
		while( $ligne = $question->fetch()){
			echo "<br /> Question $i :"; $i++;
			echo $ligne['contenu']; echo "<br /><br />";
			
				$codquestion=$ligne['id']; ?>
				<form id="formulaire" action="refaire.php" method="POST">
				<?php
				$reponse= $bdd->query("SELECT * FROM reponse WHERE id_question=$codquestion");
				while($ligne_r=$reponse->fetch()){ 
					?>
					<li><input type="radio" value="<?php echo $ligne_r['etat']?>" name="<?php echo $ligne_r['id_question']?>" id="<?php echo $ligne_r['id']?>" required/><?php echo $ligne_r['contenu']?> </li>
					<?php } ?>
					<li><input style="display:none" type="radio" value="faux" name="<?php echo $codquestion ?>" checked></li>
					<?php } ?>
				<br/><br/><br/>
				<input style="width: 150px" type="submit" class="success button" value="Valider" name="validation">
				&nbsp;&nbsp;&nbsp;&nbsp;<input style="width: 150px"type="reset" class="alert button" value="Vider" name="vider">
				</form> 
				<form action="etudiant.php" ><input style="width: 150px" class=" button"  type="submit" value="Retour"></form><?php } ?>
	</div>
	<?php include "Traitement/footer.php"; ?>
		<div id="chrono">
			<p class="tiny alert button">Vous avez <?= $duree ?> minutes</p>
			<div id="chrono-min">30</div>
			<div id="chrono-sec">15</div>
		</div>
		<script type="text/javascript">
		var centi=0 
		var secon=0 
		var minu=0
			function submit(dur){
				setTimeout('valider()', dur);
			}
			function valider(){
				document.getElementById("formulaire").submit();
			}
			function chrono(max){
				var maxi = max;
				var alert = max*0.75;
				centi++; 
				if (centi>9){centi=0;secon++}
				if (secon>59){secon=0;minu++} 
				document.getElementById("chrono-sec").innerHTML=" "+secon ;
				document.getElementById("chrono-min").innerHTML=" "+minu ;
				compte=setTimeout('chrono()',100) ;
			}
			
		</script>
</body>

</html>
