<?php
include('Traitement/connex_bdd.php');

?>
<html>
<?php include 'Traitement/header.php';
if(!isset($_SESSION['mode'])) {?>

<body>
	<div class="wrapper">
	<?php include('Traitement/bonjour.php') ;
	if(isset($_GET['cas'])){
			$x=$_GET['cas'];
			if($x==1){
				echo "Compte déja existant, Veuillez changez vos coordonnées !";
			}
			if($x==2){
				echo "Inscription effectué ! Veuillez attendre la validation de votre compte !";
				header("Location: auth.php?cas=$x");
			}
			if($x==3){
				echo " Ces mots de passe ne correspondent pas.";
			}
			if($x==4){
				echo " error lors de l'Inscription Veuillez ressayer";
			}
			
		}
	?>
			<script type="text/javascript">
			function showe(){
				document.getElementById('prof').style.display="none";
				
			}
			function showp(){
				document.getElementById('prof').style.display="block";
				
			}
		</script>

<form method="POST" action='Traitement/traitement_inscription.php' enctype="multipart/form-data">
	<table style="width: 100%" >
			<tr>
				<td>Nom :
				<td><input type="text" name="nom" value="<?php if(isset($_GET['nom'])){ echo $_GET['nom'] ;}?>" required/> 
			</tr>
			<tr>
				<td>Prenom :
				<td><input type="text" name="prenom" value="<?php if(isset($_GET['prenom'])){ echo $_GET['prenom'] ;}?>" required/> 
			</tr>
			<tr>
				<td>E-mail :
				<td><input type="email" name="mail" value="<?php if(isset($_GET['mail'])){ echo $_GET['mail'] ;}?>" required/> 
			</tr>
			<tr>
				<td>Pseudo :<td>
				<input type="text" name="pseudo" value="<?php if(isset($_GET['pseudo'])){ echo $_GET['pseudo'] ;}?>" required/> 
			</tr>
			<tr>
				<td>Mot de passe :
				<td><input type="password" name="password_1" required /> 
			</tr>
			<tr>
				<td>Confirmez votre Mot de passe :
				<td> <input type="password" name="password_2"  required /> 
			
			</tr>
			<tr>
				<td></td>
				<td><div class="small-4 columns"><input style="float:left" type="radio"  name="table"  id="etudiant" onclick="showe();" value="etudiant" required/><label for="etudiant"> Etudiant </label></div>
					<div class="small-4 columns"><input style="float:right" type="radio"  name="table"  id="professeur" onclick="showp();" value="professeur" required /><label for="professeur">Professeur</label></div></td>				
			</tr>
			
			<tr style="display:none;width:100%" id="prof">
				<td> Image : </td>
				<td><input type="file" name="file" id="file"></td>
			</tr>

			<tr>
				<td> Niveau : </td>
				<td><select name="niveau"><?php $niveau = $bdd->query("SELECT * FROM niveau");
				while($ligne = $niveau->fetch()){?>
  					<option value="<?= $ligne['id']?>"><?= $ligne['libelle']?></option>
  					<?php } ?>
  				</select></td>
			</tr>
			<tr>
				<td>Section : </td>
				<td>
					
				<select name="matiere"><?php $matiere = $bdd->query("SELECT * FROM section");
				while($ligne = $matiere->fetch()){?>
  					<option value="<?= $ligne['id']?>"><?= $ligne['libelle']?></option>
  					<?php } ?>
  				</select></td>
			</tr>
			<tr>
				<td><center><input type='SUBMIT' style="width:70%" class="radius button" value="valider" /> </center></td>
				<td><center><input type='RESET' style="width:70%" class="radius button" value="vider" /> </center></td>
			</tr>
			
	</table>		
</form>
<form action='auth.php'>
	<input class="success radius button" type="submit" value="Retour" />
</form>
</div>
<?php include"Traitement/footer.php"; ?>
</body>
</html>
<?php }else{
	header("location: auth.php");
}?>