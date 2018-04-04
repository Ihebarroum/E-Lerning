<?php
include('Traitement/connex_bdd.php');

$id=$_SESSION['id'];
$class="";
$msg="";
if($_SESSION['mode'] == "professeur"){

?>

<!DOCTYPE html>
<html>
<?php include 'Traitement/header.php'; ?>
<body>
<div class="wrapper">
	<?php include('Traitement/bonjour.php') ?>
	<?php if(isset($_GET['notif'])){
			$x = $_GET['notif'];
			switch ($x) {
				case '1':
					$class="success";
					$msg="Votre test s'est ajouté et en attente l'activation";
					$disp="block";
					break;
				case '2': 
					$class="alert";
					$msg = "Erreur lors de l'ajout du test veuillez ressayer";
					$disp="block";
					break;
				case '3':
					$class="success";
					$msg="Les modifications ont été effectuer correctement";
					$disp = "block";
					break;
				default:
					$class="";
					$msg="";
					$disp="none";
					break;
			}?><script type="text/javascript">
			function hiden(){
			document.getElementById("notif").style.display = "none";}
			</script>
			<div id="notif" style="display:<?= $disp ?>">
		<a href="#" style="cursor: context-menu;"class="small <?= $class ?> button"><?= $msg ?></a>
		<a href="#" id="closen" onclick="hiden()" style="margin-left:-10px;" class="small <?=$class ?> button">X</a></div>
	<?php } ?>
	<div class="left">
		<br>
		<br>
		<br>
		<br>
		<center>
			 <form method='POST' action='prof-list.php'>
				 
					 <input type="SUBMIT" style='width:500px' name="Q_M" class="radius button"value="Afficher les test de votre section" /> </br>
					 <input type="SUBMIT" style='width:500px' name="Q_P" class="radius button"value="Afficher vos test" /> </br>
					 <input type="SUBMIT" style='width:500px'  class="radius button" name="Q_A" value=" (+1) Ajouter test" /> </br>
					
			 </form> 
					<form method='POST' action="list_session_tut.php">
					 <input type="SUBMIT" style='width:500px'  class="radius button" name="session" value="Listes des sessions" /> </br>
					 </form>
					 <form method='POST' action="list_etudiant.php">
					 <input type="SUBMIT" style='width:500px'  class="radius button" name="etudiant" value=" Listes des apprenants" /> </br>
					 </form>
		</center>	 	
				<form method="GET" action="Forum.php">
	<center>
	<input style='width:500px'  class="radius button" type="submit" value="Forum" name="type" />
	</center>
	</form>
	<form method="GET" action="inc/home.php">
	<center>
	<input style='width:500px'  class="radius button" type="submit" value="Message instantané" name="type" />
	</center>
	</form>
	<form method="GET" action="Formulaire.php">
	<center>
	<input style='width:500px'  class="radius button" type="submit" value="E-mail" name="type" />
	</center>
	</form>
	</div>
	<div class="right" style="left: -10px;">
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
				<td>Section :</td>
				<td><?= $_SESSION['matiere']?></td>
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
	</div>
</div>
<?php include"Traitement/footer.php" ?>	
</body>
</html>
<?php }else{
	header("location: index.php");
}?>






