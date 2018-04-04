<?php
include('Traitement/connex_bdd.php');

$codetudiant=$_SESSION['id'];
$codquestionnaire=$_SESSION['codquestionnaire'];
$note=0;
foreach($_POST as $element){
	$note+=$element;
}
$bdd->query("UPDATE passer SET note = $note WHERE id_etudiant = $codetudiant AND id_questionnaire = $codquestionnaire ");
?>
<?php include 'Traitement/header.php'; ?>
<body>
<div class="wrapper">
	<?php  include('Traitement/bonjour.php');?>
<center>
<h3>Votre test a bien ete effectue ! <br />Votre nouvelle note est : <?=$note?></h3>

<form action="etudiant.php">
		<input type="submit" class="success button" value="Revenir a l'espace apprenant">
	</form></center>
</div>
<?php include"Traitement/footer.php";?>
</body>