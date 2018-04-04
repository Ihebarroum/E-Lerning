<?php
include('Traitement/connex_bdd.php');
$id=$_SESSION['id'];
$id_matiere=$_SESSION['id_matiere'];
?>

<!DOCTYPE html>
<html>
<?php include 'Traitement/header.php'; ?>

<body>
	<div class="wrapper">
	<?php include('Traitement/bonjour.php') ?>
		
	<?php if(isset($_POST['Q_M'])){
		
		$tmp = $bdd->query("SELECT *  FROM questionnaire  WHERE (id_matiere=$id_matiere AND activation=1)");
		$rows = $tmp->fetchAll();
		if(!empty($rows)){
		?>
		<center>
		Les tests de votre section sont les suivants <br/><br/></br>
		<?php $tmp->closecursor();
			$questionnaire = $bdd->query("SELECT *  FROM questionnaire  WHERE (id_matiere=$id_matiere AND activation=1)");
			while($ligne = $questionnaire->fetch() ){ ?>
				<form action="V_Q.php" method="POST"/>
					<input type="hidden" value="<?php echo $ligne['id'] ?>" name="codquestionnaire" />
					<input type="submit" class="button" style="width:250px;white-space:normal;" value="<?php echo $ligne['libelle'] ?>"  id="<?php echo $ligne['id']?>"/>
				</form>
				<?php
				}?> </center><?php  
			$questionnaire->closecursor();
			}else{
				?><center>Il n'y a aucun test pour le moment veuillez <a href="professeur.php#Q_A" >rajouter</a> un ? </center><?php 
			}
		}  ?>

	<?php if(isset($_POST['Q_P'])){
		$tmp = $bdd->query("SELECT * FROM questionnaire  WHERE id_prof=$id ");
		$questionnaire = $bdd->query("SELECT * FROM questionnaire  WHERE id_prof=$id ");
		$row = $tmp->fetchAll();
		if(!empty($row) ){
		?>
		<center>
		Vos Test sont les suivants <br> <br/><br/></br>
		
			<table><thead>
				<td>Titre</td>
				<td>état actuel</td>
				<td>Difficulté</td>
			</thead>
			<?php 
			while($ligne = $questionnaire->fetch() ){ ?>
				<?php if($ligne['activation'] == 1 ) {$x= "activé";
				$class="success";}else{$x="desactivé"; $class="alert";} ?>
					<tr><form action="V_Q.php" method="POST"/>
						<input type="hidden" value="<?php echo $ligne['id'] ?>" name="codquestionnaire" />
						<td><input type="submit" class="button" style="width:250px; white-space:normal;" value="<?php echo $ligne['libelle'] ?>"  id="<?php echo $ligne['id']?>"/></td>
						<td><a href="#" style="width:120px;" class="small  <?= $class ?> button">état <?= $x ?></a>
						<td><a href="#" style="width:120px;"class="small  button"><?= difficulte($ligne['id_difficulte'],$bdd) ?></a>
						
					</form>
			<tr>
					<?php
			}?></center><?php 
	$questionnaire->closecursor();	}else{
		?><center>Vous n'avez ajouter aucun test !</center><?php
	}	
	?>
	</table>
	<?php }  ?>
		
	<?php
	if(isset($_POST['Q_A'])){ 
		?>
	<form action="Q_ajouter.php" method="POST" >
		<h2> Ajout d'un test : </h2>
		<table>
			<tr>
				<td> Donnez à votre test un nom : 
				<td> <input type="text" name="nom_q" required />
			</tr>
			<tr>
				<td> Le nombre de questions  : 
				<td> <input type="number" min="1" max="20" name="nombre" required />
			</tr>	
			<tr>
				<td>La difficulté </td>
				<td><select name="difficulte"><?php $matiere = $bdd->query("SELECT * FROM difficulte");
				while($ligne = $matiere->fetch()){?>
  					<option value="<?= $ligne['id']?>"><?= $ligne['libelle']?></option>
  					<?php } ?>
  				</select>
			</tr>
			<tr>
				<td>Durée</td>
				<td><input type="number" name="duree" placeholder="Nombre de Minutes" ></td>
			</tr>
			<tr>
				<td>
				<td><input type="submit" class="success radius button" value="Suivant" />
				<input type="reset" value="Vider" class="alert radius button" />
			</tr>				
		</table>
		
	</form>
		<?php

	}	?>
	<br/><br/>
	<form action="professeur.php">
		<center><input type="submit" class="alert radius button" value="Retour"></center>
	</form>
</div>
	<?php include "Traitement/footer.php" ?>
</body>
</html>
