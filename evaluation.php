<?php
include('Traitement/connex_bdd.php');
include('Traitement/bonjour.php');
$codetudiant=$_SESSION['id'];
$codquestionnaire=$_SESSION['codquestionnaire'];

$note=0;
foreach($_POST as $element){
	$note+=$element;
}
$bdd->query("INSERT INTO passer (id_etudiant, id_questionnaire, note) VALUES ($codetudiant, $codquestionnaire, $note)");
?><body>
<div class="wrapper">
<center>
<h3 style="font-size:12pt">Votre QCM a bien ete effectue ! <br />Votre note est : <?=$note?></h3>
<?php include 'Traitement/header.php'; ?>
<form action="etudiant.php">
		<input type="submit" class="success button" value="Revenir a l espace etudiant">
</form></center>
</div>
<?php include"Traitement/footer.php"; ?>
</body>