<?php 
include('Traitement/connex_bdd.php');

$id=$_SESSION['id'];

?>


<html>
<?php include 'Traitement/header.php'; ?>
<body>
	<div class="wrapper">
<?php include('Traitement/bonjour.php') ?>

	Voici l'ensemble de vos notes : <br /><br /><br />
<table class="list_q">
	<thead>
		<td> NOM DU QUESTIONNAIRE
		<td> NOTE
		<td style="width: 200px;"> Appréciations
		<td>
	</thead>
<?php
$resultat=$bdd->query("SELECT * FROM passer WHERE id_etudiant=$id");
while($ligne=$resultat->fetch()){
	$codquestionnaire=$ligne['id_questionnaire'];
	$note=$ligne['note'];
	$total = $bdd->query("SELECT * FROM question WHERE id_questionnaire = $codquestionnaire");
	$nbr = $total->rowCount();
	$result=$bdd->query("SELECT libelle FROM questionnaire WHERE id=$codquestionnaire");
	$li=$result->fetch();
	?>
		<tr>
			<td><?php echo $li['libelle'] ?> :
			<td><?php echo $ligne['note']."/$nbr"; 
			$prc = $ligne['note']/$nbr;
				if( $prc == 1){?>
			<td style="color: #1ed400">Bravo ! Vous avez un score parfait
				<?php }else if( $prc>=0.75 && $prc<1 ){ ?>
			<td style="color: #a0d400">Bien ! Vous maitrisez ce sujet 
				<?php }else if( $prc>=0.5 && $prc<0.75 ){ ?>
			<td style="color: #fdc605">Pas mal ! Mais vous devez revoire cette partie pour faire mieux 
				<?php }else if( $prc<0.5 ) {?>
			<td style="color: #e00000">Attention ! Vous n'avez pas eu la moyenne pour ce questionnaire vous devez absolument revoir cette partie 
<?php } ?>	<td><img style="cursor: pointer;" Onclick="refaire(<?=$codquestionnaire?>)" src="images/restart.png"></a>
		</tr>

	<?php

}
echo "</table>";
?>
<form action="etudiant.php">
	<input type="submit" class="success button" value="Retour">
</form>
</div>
<?php include"Traitement/footer.php"; ?>
</body>
</html>