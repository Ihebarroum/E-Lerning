<?php
include('../Traitement/connex_bdd.php');
if(isset($_GET['type'])){
	$typel = $_GET['type'];
}
if(isset($_GET['filtre'])){
	$filtre = $_GET['filtre'];
}else{
	$filtre="";
}
?>

<!DOCTYPE html>
<html>
<?php include '../Traitement/header.php'; ?>

<body>
	<div class="wrapper">
	
	<?php include('../Traitement/bonjour.php') ?>
	<div class="left">
	<table class="list">
		<?php if($typel== 'Liste des apprenants' OR $typel == 'Liste des tuteurs'){
			?>
			<thead >
				<td style="text-align: center;">Pseudo
				<td style="text-align: center;">Nom
				<td style="text-align: center;">Prénom
				<td style="text-align: center;">état actuel<br><span style="font-size:8px;">Cliquez pour changer d'état</span>
			</thead>
			
			<?php
			if($typel == 'Liste des apprenants' && $filtre == ""){ 
				$resultat=$bdd->query("SELECT * FROM etudiant ORDER BY id DESC");
				while($ligne=$resultat->fetch()){ ?>
					<tr>
						<td><?php echo $ligne['pseudo']?>
						<td><?php echo $ligne['nom']?>
						<td><?php echo $ligne['prenom']?>
						<td><?php if($ligne['activation']==1){
							$x='activé'; $class="tiny success";
							}else{ $x='desactivé'; $class="tiny alert"; }?>
					<form method="post" action="activation.php">
						<input type="hidden" value="<?= $ligne['id']?>" name="codetudiant" />
						<input type="hidden" value="<?=$filtre?>" name="filtre">
						<input type="submit" class="<?=$class ?> button" value="<?= $x ?>" />
					</form>
					</tr>
				<?php
				}
				$resultat->closecursor();
			}else if($typel == 'Liste des apprenants' && $filtre == 1){
				$resultat=$bdd->query("SELECT * FROM etudiant WHERE activation = 1 ORDER BY id DESC");
				while($ligne=$resultat->fetch()){ ?>
					<tr>
						<td><?php echo $ligne['pseudo']?>
						<td><?php echo $ligne['nom']?>
						<td><?php echo $ligne['prenom']?>
						<td><?php $x='activé'; $class="tiny success";?>
					<form method="post" action="activation.php">
						<input type="hidden" value="<?= $ligne['id']?>" name="codetudiant" />
						<input type="hidden" value="<?=$filtre?>" name="filtre">
						<input type="submit" class="<?=$class ?> button" value="<?= $x ?>" />
					</form>
					</tr>
				<?php
				}
				$resultat->closecursor();
			}else if($typel == 'Liste des apprenants' && $filtre == 0){
				$resultat=$bdd->query("SELECT * FROM etudiant WHERE activation = 0 ORDER BY id DESC");
				while($ligne=$resultat->fetch()){ ?>
					<tr>
						<td><?php echo $ligne['pseudo']?>
						<td><?php echo $ligne['nom']?>
						<td><?php echo $ligne['prenom']?>
						<td><?php $x='desactivé'; $class="tiny alert";?>
					<form method="post" action="activation.php">
						<input type="hidden" value="<?= $ligne['id']?>" name="codetudiant" />
						<input type="hidden" value="<?=$filtre?>" name="filtre">
						<input type="submit" class="<?=$class ?> button" value="<?= $x ?>" />
					</form>
					</tr>
				<?php
				}
				$resultat->closecursor();
			}
			?>
				<?php
			if($typel == "Liste des tuteurs" && $filtre == ""){
				$resultat=$bdd->query("SELECT * FROM professeur ORDER BY id DESC");
				while($ligne=$resultat->fetch()){ ?>
					<tr>
						<td><?php echo $ligne['pseudo']?>
						<td><?php echo $ligne['nom']?>
						<td><?php echo $ligne['prenom']?>
						<td><?php if($ligne['activation']==1){
							$x='activé'; $class="tiny success";
							}else{ $x='desactivé'; $class="tiny alert"; }?>
					<form method="post" action="activation.php">
						<input type="hidden" value="<?php echo $ligne['id']?>" name="codprof" />
						<input type="hidden" value="<?=$filtre?>" name="filtre">
						<input type="submit" class="<?=$class ?> button" value="<?php echo $x ?>" />
					</form>
					</tr>
				<?php
				}
				$resultat->closecursor();
			}else if($typel == 'Liste des tuteurs' && $filtre == 1){
				$resultat=$bdd->query("SELECT * FROM professeur WHERE activation = 1 ORDER BY id DESC");
				while($ligne=$resultat->fetch()){ ?>
					<tr>
						<td><?php echo $ligne['pseudo']?>
						<td><?php echo $ligne['nom']?>
						<td><?php echo $ligne['prenom']?>
						<td><?php $x='activé'; $class="tiny success";?>
					<form method="post" action="activation.php">
						<input type="hidden" value="<?= $ligne['id']?>" name="codprof" />
						<input type="hidden" value="<?=$filtre?>" name="filtre">
						<input type="submit" class="<?=$class ?> button" value="<?= $x ?>" />
					</form>
					</tr>
				<?php
				}
				$resultat->closecursor();
			}else if($typel == 'Liste des tuteurs' && $filtre == 0){
				$resultat=$bdd->query("SELECT * FROM professeur WHERE activation = 0 ORDER BY id DESC");
				while($ligne=$resultat->fetch()){ ?>
					<tr>
						<td><?php echo $ligne['pseudo']?>
						<td><?php echo $ligne['nom']?>
						<td><?php echo $ligne['prenom']?>
						<td><?php $x='desactivé'; $class="tiny alert";?>
					<form method="post" action="activation.php">
						<input type="hidden" value="<?= $ligne['id']?>" name="codprof" />
						<input type="hidden" value="<?=$filtre?>" name="filtre">
						<input type="submit" class="<?=$class ?> button" value="<?= $x ?>" />
					</form>
					</tr>
				<?php
				}
				$resultat->closecursor();
			}
		}
			?>
	</table>
	<table class="list_q">
		<?php
		if($typel == "Liste des tests" && $filtre == ""){?>
			<thead> 
				<td>Nom Test
				<td>Matiere
				<td>Niveau
				<td>etat actuel
				<td>Supprimer
			</thead>

		
		<?php $resultat=$bdd->query("SELECT * FROM questionnaire ORDER BY id DESC");
			while($ligne=$resultat->fetch()){ ?>
				<tr><td><?php echo $ligne['libelle']?>
					<td><?php echo matiere($ligne['id_matiere'],$bdd); ?><br><span style="font-size:10pt;">(<?php echo difficulte($ligne['id_difficulte'],$bdd); ?>)</span>
					<td><?php echo niveau($ligne['id_niveau'],$bdd); ?>
					<td><?php if($ligne['activation']==1){
							$x='activé'; $class="tiny success";
							}else{ $x='desactivé'; $class="tiny alert"; }?>
					<form method="post" action="activation.php">
						<input type="hidden" value="<?php echo $ligne['id']?>" name="codquestionnaire" />
						<input type="hidden" value="<?=$filtre?>" name="filtre">
						<input type="submit" class="<?=$class ?> button" value="<?php echo $x ?>" />
					</form></td>
					<td><a href="#" onclick="supprimer(<?= $ligne['id']?>)"><img src="images/delete.png"></a>
				</tr>
			<?php }
			$resultat->closecursor();
		}else if($typel == "Liste des tests" && $filtre == 1){?>
			<thead> 
				<td>Nom Test
				<td>Matiere
				<td>Niveau
				<td>etat actuel
				<td>Supprimer
			</thead>

		
		<?php $resultat=$bdd->query("SELECT * FROM questionnaire WHERE activation = 1 ORDER BY id DESC");
			while($ligne=$resultat->fetch()){ ?>
				<tr><td><?php echo $ligne['libelle']?>
					<td><?php echo matiere($ligne['id_matiere'],$bdd); ?><br><span style="font-size:10pt;">(<?php echo difficulte($ligne['id_difficulte'],$bdd); ?>)</span>
					<td><?php echo niveau($ligne['id_niveau'],$bdd); ?>
					<td><?php if($ligne['activation']==1){
							$x='activé'; $class="tiny success";
							}else{ $x='desactivé'; $class="tiny alert"; }?>
					<form method="post" action="activation.php">
						<input type="hidden" value="<?php echo $ligne['id']?>" name="codquestionnaire" />
						<input type="hidden" value="<?=$filtre?>" name="filtre">
						<input type="submit" class="<?=$class ?> button" value="<?php echo $x ?>" />
					</form></td>
					<td><a href="#" onclick="supprimer(<?= $ligne['id']?>)"><img src="images/delete.png"></a>
				</tr>
			<?php }
			$resultat->closecursor();
		}else if($typel == "Liste des tests" && $filtre == 0){?>
			<thead> 
				<td>Nom Test
				<td>Matiere
				<td>Niveau
				<td>etat actuel
				<td>Supprimer
			</thead>

		
		<?php $resultat=$bdd->query("SELECT * FROM questionnaire WHERE activation = 0 ORDER BY id DESC");
			while($ligne=$resultat->fetch()){ ?>
				<tr><td><?php echo $ligne['libelle']?>
					<td><?php echo matiere($ligne['id_matiere'],$bdd); ?><br><span style="font-size:10pt;">(<?php echo difficulte($ligne['id_difficulte'],$bdd); ?>)</span>
					<td><?php echo niveau($ligne['id_niveau'],$bdd); ?>
					<td><?php if($ligne['activation']==1){
							$x='activé'; $class="tiny success";
							}else{ $x='desactivé'; $class="tiny alert"; }?>
					<form method="post" action="activation.php">
						<input type="hidden" value="<?php echo $ligne['id']?>" name="codquestionnaire" />
						<input type="hidden" value="<?=$filtre?>" name="filtre">
						<input type="submit" class="<?=$class ?> button" value="<?php echo $x ?>" />
					</form></td>
					<td><a href="#" onclick="supprimer(<?= $ligne['id']?>)"><img src="images/delete.png"></a>
				</tr>
			<?php }
			$resultat->closecursor();
		}
		?>
	</table>
	<table class="list_s">
		<?php if($typel== 'Liste des sessions'){
			?>
			<thead >
				<td style="text-align: center;">Nom session
				<td style="text-align: center;">date debut
				<td style="text-align: center;">date fin
				<td style="text-align: center;">Tuteur
				<td style="text-align: center;">état actuel<br><span style="font-size:8px;">Cliquez pour changer d'état</span>
					<td style="text-align: center;">Supprimer
				
			</thead>
			
			<?php
			if($typel == 'Liste des sessions' && $filtre == ""){ 
				$resultat=$bdd->query("SELECT * FROM session ORDER BY id_session DESC");
				while($ligne=$resultat->fetch()){ ?>
					<tr>
					
						<td><?php echo $ligne['nom']?>
						<td><?php echo $ligne['date_deb']?>
						<td><?php echo $ligne['date_fin']?>
						<td><?php echo $ligne['id_prof']?>
						<td><?php if($ligne['activation']==1){
							$x='activé'; $class="tiny success";
							}else{ $x='desactivé'; $class="tiny alert"; }?>
					<form method="post" action="activation.php">
					
						<input type="hidden" value="<?= $ligne['id_session']?>" name="codesession" />
						<input type="hidden" value="<?=$filtre?>" name="filtre">
						<input type="submit" class="<?=$class ?> button" value="<?= $x ?>" />
					</form></td>
                   <td><a href="#"><img src="images/delete.png"></a>
					</tr>
				<?php
				}
				$resultat->closecursor();
			}else if($typel == 'Liste des sessions' && $filtre == 1){
				$resultat=$bdd->query("SELECT * FROM session WHERE activation = 1 ORDER BY id_session DESC");
				while($ligne=$resultat->fetch()){ ?>
					<tr>
						<td><?php echo $ligne['nom']?>
						<td><?php echo $ligne['date_deb']?>
						<td><?php echo $ligne['date_fin']?>
												<td><?php echo $ligne['id_prof']?>

						<td><?php $x='activé'; $class="tiny success";?>
					<form method="post" action="activation.php">
						<input type="hidden" value="<?= $ligne['id_session']?>" name="codesession" />
						<input type="hidden" value="<?=$filtre?>" name="filtre">
						<input type="submit" class="<?=$class ?> button" value="<?= $x ?>" />
					</form>
					</tr>
				<?php
				}
				$resultat->closecursor();
			}else if($typel == 'Liste des sessions' && $filtre == 0){
				$resultat=$bdd->query("SELECT * FROM session WHERE activation = 0 ORDER BY id_session DESC");
				while($ligne=$resultat->fetch()){ ?>
					<tr>
						<td><?php echo $ligne['nom']?>
						<td><?php echo $ligne['date_deb']?>
						<td><?php echo $ligne['date_fin']?>
												<td><?php echo $ligne['id_prof']?>

						<td><?php $x='desactivé'; $class="tiny alert";?>
					<form method="post" action="activation.php">
						<input type="hidden" value="<?= $ligne['id_session']?>" name="codesession" />
						<input type="hidden" value="<?=$filtre?>" name="filtre">
						<input type="submit" class="<?=$class ?> button" value="<?= $x ?>" />
					</form>
					</tr>
				<?php
				}
				$resultat->closecursor();
			}
			}
			?>
			
	</table>
	
		</table>
	<center>
	<td>
   <form action="ajout_session.php" method="post">
		<input type="submit" class="radius button" value="Ajouter Session">
	</form>
	</center>
		
		
<center>


	<td>
	<form action="master.php">
		<input type="submit" value="Retour" class="alert button radius">
	</form>
	
	</center>
	
	</div>
	<div class="right" style="margin-right:20px;"><table><thead><td style="text-aligne:center;">Les filtres</thead>
		<tr><td><a class="small button" style="width:300px;"href="listes.php?type=<?=$typel?>">Tout les éléments</a></tr>
		<tr><td><a class="small success button"style="width:300px;" href="listes.php?type=<?=$typel?>&filtre=1">Activé seulement</a></tr>
		<tr><td><a class="small alert button"style="width:300px;" href="listes.php?type=<?=$typel?>&filtre=0">Désactivé seulement</a></tr>
	</div>
	
</div>
</div>
<?php include"../Traitement/footer.php"; ?>
<script type="text/javascript">
	function supprimer(id){
		var c = confirm('êtes vous sur de vouloir supprimer Test ? ');
		if(c){
		window.location = "supprimer-quest.php?id="+id }
	}
</script>
</body>
</html>