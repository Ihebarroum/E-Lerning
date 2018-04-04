<?php
include('Traitement/connex_bdd.php');



?>

<!DOCTYPE html>
<html>
<?php include 'Traitement/header.php'; ?>
<body>
<div class="wrapper">
	<?php include('Traitement/bonjour.php') ?>
	<?php
	$code=$_GET["id_module"];
	$rez=$bdd->query("select id_module from module where id_module='$code'");
	$dez =$rez->fetch();
	?>
			   
            
       
              
			  
		<center>
			 
					<form method='POST' action="list_cour.php?id_module=<?php print $dez[0]; ?>">
					 <input type="SUBMIT" style='width:500px'  class="radius button" name="session" value="Cour" /> </br>
					 </form>
					 <form method='POST' action="list_test_tut.php ?id_module=<?php print $dez[0]; ?>">
					 <input type="SUBMIT" style='width:500px'  class="radius button" name="etudiant" value="Test" /> </br>
					 </form>
		</center>
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







