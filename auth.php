<?php include"Traitement/connex_bdd.php"; ?>
<!DOCTYPE html>
<html>
	<?php include 'Traitement/header.php'; ?>
	
<body>
	
	<div class="wrapper">
		<?php include('Traitement/bonjour.php');?>
		<div class="logo" style="position:absolute; top:10px; right:300px;" ><a href="Admin/index.php"><img src="images/etudiants/cadna1.ico"/></a></div>
	<?php 
		if(isset($_GET['cas'])){
			$x=$_GET['cas'];
			if($x==2){?>
				<div  id="notif" ><span class="success button">Inscription effectué ! Veuillez attendre la validation de votre compte !</span><span class="success button" onClick="document.getElementById('notif').style.display= 'none'"><b>X</b></span></div>
			<?php }
		}
?>	<?php if(!isset($_SESSION['nom'])) { ?>	
	<form method="POST" action="Traitement/Traitement-auth.php">
		<table style="width:70%">
			<h3>Ouvrir votre compte</h3>
			<tr>
				<td>Nom d'utilisateur (Pseudo) : 
				<td><input type="text" name="pseudo" required>
			</tr>
			<tr>
				<td>Mot de passe :
				<td><input type="password" name="password" required>
			</tr>
			<tr>	
				<td><input class="success button"type="submit" value="Connexion">
				<td><input class="alert button"type="reset" value="Vider">
			</tr>
		</table>
	</form>
	<center><a href="inscription.php" > Vous n'avez pas de compte ?</a></center>
	<?php }else{
	 if($_SESSION['mode']== "etudiant") header("location: etudiant.php");
	 if($_SESSION['mode']== "professeur") header("location: professeur.php");
} ?></div>
<?php include"Traitement/footer.php" ?>
</body>
</html>