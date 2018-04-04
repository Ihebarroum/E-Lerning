<?php
include('Traitement/connex_bdd.php');
if($_SESSION['mode']=="etudiant"){
?>

<!DOCTYPE html>
<html>
<?php include 'Traitement/header.php'; ?>
<body>
	<div class="wrapper">
	<?php include('Traitement/bonjour.php') ?>
	<div class="left">
		<center><h3>Veuillez choisir Votre Section</h3></center>
			<?php $resultat= $bdd->query('SELECT * FROM section');
				while($ligne = $resultat->fetch()){ ?>
					<form action="list_questionnaire.php" method="POST"/>
						<input type="hidden" value="<?php echo $ligne['id'] ?>" name="codmatiere" />
						<input type="submit" class="math" style="white-space:normal;
						background-image:url('images/matiere/<?=$ligne['image']?>');
						background-repeat:no-repeat;background-position:50px 7px;"
						value="<?php echo $ligne['libelle'] ?>"  id="<?php echo $ligne['id']?>"/>
					</form>
					
					<?php } ?>
					
	
	<form method="GET" action="Forum.php">
	<center>

		<input style='width:400px'  class="radius button" type="submit" value="Forum" name="type" />

	</center>
	</form>
	<form method="GET" action="inc/home.php">
	<center>
	<input style='width:400px'  class="radius button" type="submit" value="Message instantané" name="type" />
	</center>
		</form>

	</div>
	<div class="right">
		<table class="profil">
			<thead><td style="text-align: center" colspan="2">Votre Profile</thead>
			<tr>
				<td><img style="width:80px;height:80px;"src="images/profs/<?php if(isset($_SESSION['image'])){ echo ($_SESSION['image']); }else{ echo"default.png"; }?>"/>
				<td><table style="width:100%;height:100%"><tr>
				<td>Nom :</td>
				<td><?= ucfirst($_SESSION['nom'])?></td>
			</tr>
			<tr>
				<td>Prénom :</td>
				<td><?= ucfirst($_SESSION['prenom'])?></td>
			</tr>
				</table></td>
			</tr>
			

			<tr>
				<td>E-mail :</td>
				<td><?= $_SESSION['email']?></td>
			</tr>
			<tr>
				<td>Niveau :</td>
				<td><?= $_SESSION['niveau']?></td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
						<input type="submit" class="small success button lightbox" value="Modifier les informations">
					</center>
			</tr>
		</table>
		<div class="backdrop"></div>
		<div style="top:10%"class="box">
			<div class="close">
				<img src="images/close.jpg"/>
			</div><center><h4>Vos nouvelles informations</h4>
			<form action="Traitement/traitement-edit.php" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td>Nom : </td>
						<td><input type="text" name="nom" Value="<?=$_SESSION['nom']?>"></td>
					</tr>
					<tr>
						<td>Prénom : </td>
						<td><input type="text" name="prenom" Value="<?=$_SESSION['prenom']?>"></td>
					</tr>
					<tr>
						<td>E-mail: </td>
						<td><input type="email" name="email" Value="<?=$_SESSION['email']?>"></td>
					</tr>
					<tr>
						<td>Mot de pass : </td>
						<td><input type="password" name="pass1" placeholder="Votre nouveau mot de pass"></td>
					</tr>
					<tr>
						<td>Confirmer le mot de pass : </td>
						<td><input type="password" name="pass2" placeholder=""></td>
					</tr>
					<tr>
						<td>Image de profil : </td>
						<td><input type="file" name="file" id="file"></td>
					</tr>
				</table>
				<input type="submit" class="secondary button" value="Enregistrer">
			</form></center>
	</div>
	<br>
	<br>
</div>
<?php include"Traitement/footer.php" ?>
</body>
</html>
<?php }else{
	header("location: index.php");
}?>

