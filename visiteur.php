<?php
include('Traitement/connex_bdd.php');

?>

<html>
<?php include 'Traitement/header.php'; ?>
<body><div class="wrapper">
	<?php include('Traitement/bonjour.php'); ?>
	<h1>Se site est une platforme privée</h1>
	<p>Il se peut que  : </p>
	<ul><li> Le login et/ou Mot de pass saisie ne figure pas dans la base</li>
		<li> Votre compte est actullement suspendu et en-attente de modération</li>
	</ul>
	<i>Vous serez redériger vers la page d'acceuil dans 5 seconde</i>
	<meta http-equiv="refresh" content="5;URL=index.php">
</div>
<?php include"Traitement/footer.php"; ?>

</body>

</html>


