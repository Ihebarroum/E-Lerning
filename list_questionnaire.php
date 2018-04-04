<?php 
include('Traitement/connex_bdd.php');
if(!isset($_POST['codmatiere'])){
	header("location: etudiant.php");
}
$id=$_SESSION['id'];
?>
<html>
<?php include 'Traitement/header.php'; ?>
<body>
	<div class="wrapper">
<?php
	include('Traitement/bonjour.php');
	$codmatiere= $_POST['codmatiere'];
	$id_niveau = $_SESSION['id_niveau'];
	// verification si un Test existe pour cette matiere et le niveau de l'etudiant
	$resultat= $bdd->query("SELECT * FROM questionnaire WHERE (id_matiere=$codmatiere AND activation=1 AND id_niveau = $id_niveau )");
	$ligne1=$resultat->fetch();
	if(empty($ligne1)){
		echo 'Aucun Test n existe pour cette matiere dans votre niveau ! ';
		goto fin;
	}
	$resultat->closecursor();

	// recuperation des id Test deja passe par l etudiant
	$existe=$bdd->query("SELECT id_questionnaire FROM passer WHERE id_etudiant=$id");
	$codpasse=array();
	while($ligne=$existe->fetch()){$codpasse[]=$ligne['id_questionnaire'];}
	$existe->closecursor();
	// verification si un session existe pour cette matiere et le niveau de l'etudiant
	$resultat= $bdd->query("SELECT * FROM session WHERE (id_matiere='$codmatiere' AND activation=1 AND id_niveau = '$id_niveau'  )");
	$ligne1=$resultat->fetch();
	if(empty($ligne1)){
		echo 'Aucun session n existe pour cette matiere dans votre niveau ! ';
		goto fin;
	}
	$resultat->closecursor();
?>
<section>

	<p>Voici la liste des sessions :</p>
	<?php
	$resultat= $bdd->query("SELECT * FROM session WHERE id_matiere=$codmatiere AND id_niveau = $id_niveau");
	while($ligne = $resultat->fetch() ){
		
?>
	<form action="list_module_app.php?id_session=<?php echo $ligne['id_session']?>" method="POST"/>
		<?php //selectionne tous les id qui existe	
				
					$a=$ligne['id_session'];
					if(!in_array("$a", $codpasse)){
						?>
						<input type="hidden" value="<?php echo $ligne['id_session'] ?>" name="codquestionnaire" />				
						<input type="submit" class="button" value="<?php echo $ligne['nom'] ?>" id="<?php echo $ligne['id_session']?>"/>
						 <div class="form-group" >
          
            <div class="col-sm-8">
           
              <input type="text" class="hideme"  style="display:none;" name="id_session" id="date_deb" readonly="true" value="<?php echo $ligne['id_session'];?>" >
              </div>
               </div>
						<?php
					}
					?>
					</form>
					<?php
				} 
			$resultat->closecursor();	
		?>
	
</section>
<section>
	<?php
	$resultat= $bdd->query("SELECT * FROM questionnaire WHERE id_matiere=$codmatiere AND id_niveau = $id_niveau");
?>
	<p>Voici la liste des tests que vous n'avez pas encore passé :</p>
	<form action="questionnaire.php" method="POST"/>
		<?php //selectionne tous les id qui existe	
				while($ligne = $resultat->fetch() ){
					$a=$ligne['id'];
					if(!in_array("$a", $codpasse)){
						?>
						<input type="hidden" value="<?php echo $ligne['id'] ?>" name="codquestionnaire" />				
						<input type="submit" class="button" value="<?php echo $ligne['libelle'] ?>" id="<?php echo $ligne['id']?>"/>
						
						<?php
					}	
				} 
			$resultat->closecursor();	
		?>
	</form>
</section>
<br /> <br /> <br /> 
<section>
	<?php $resultat= $bdd->query("SELECT * FROM questionnaire WHERE id_matiere=$codmatiere"); 
	$tmp = $bdd->query("SELECT * FROM questionnaire as q , passer as p WHERE q.id = p.id_questionnaire AND p.id_etudiant = $id"); 
	$var = $tmp->fetch();
	if(!empty($var)){?>
	<p>Voici la liste des tests que avez déja passé :</p>
	<form action="notes.php" method="POST"/>
		Vous pouvez voir vos résulats ou modifier votre score :  <br /><br />
		<?php // selectionne tous les codquestionnaire qui existe	
				while($ligne= $resultat->fetch() ){
					$a=$ligne['id'];
					if(in_array("$a", $codpasse)){			
						?>
						<input type="hidden" value="<?php echo $ligne['id'] ?>" name="codquestionnaire" />				
						<input type="submit" class="button" value="<?php echo $ligne['libelle'] ?>" id="<?php echo $ligne['id']?>"/>
						<a href="#" class="button" onClick="refaire(<?=$ligne['id']?>)"><img src="images/restart.png" style="position: relative; float:left;width:20px"/>Refaire</a>
					
						<?php
					}	
				} 
			$resultat->closecursor();
		?>
	</form>
<?php }else{?><p>Voici la liste des tests que avez déja passé :</p>
<p><li>Vous n'avez encore pas passé de test pour cette matière </li></p>
<?php }?>
</section>
<?php
	fin :	
?><form action="etudiant.php">
	<input type="submit" value="Retour " class="small success button radius" />
</form>
</div>
<?php include"Traitement/footer.php";?>
</body>
</html>
