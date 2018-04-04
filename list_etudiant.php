<?php
include('Traitement/connex_bdd.php');

	$id_matiere = $_SESSION['id_matiere'];
?>

<!DOCTYPE html>
<html>
<?php include 'Traitement/header.php'; ?>
<body>
	<div class="wrapper">
	<?php include('Traitement/bonjour.php') ?>
	
	<center>
	<h1>Liste des apprenants</h1>
	<table class="list">		
			<thead >
				
				<td style="text-align: center;">Nom
				<td style="text-align: center;">Prénom
				<td style="text-align: center;">E-mail
								


			</thead>
			
			<?php
			
				$resultat=$bdd->query("SELECT * FROM etudiant WHERE id_matiere=$id_matiere and activation='1'");
				while($ligne=$resultat->fetch()){ ?>
					<tr>
						
						<td><?php echo $ligne['nom']?>
						<td><?php echo $ligne['prenom']?>
												<td><?php echo $ligne['email']?>

				<?php } ?>
					</tr>
				</table>

<form action="professeur.php">
		<input type="submit" value="Retour" class=" small alert button radius">
	</form>
	</center>
	
</div>
<?php include"Traitement/footer.php"; ?>

</body>
</html>