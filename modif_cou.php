<?php
include('Traitement/connex_bdd.php');
$code=$_GET["id_cour"];
$requet= $bdd->query ("select  id_cour,titre_cour, description, document,lien from cours where id_cour='$code'");
$nb=$requet->rowCount();
$ligne=$requet->fetch()

?>

<!DOCTYPE html>
<html>
<?php include 'Traitement/header.php'; ?>

<body>
	<div class="wrapper">
	
	<?php include('Traitement/bonjour.php') ?>
	<form method="POST" action="modif_cours.php">
	<div class="left">
	 <div class="form-group">
           
            <div class="col-sm-8">
              <input type="hidden" name="id_cour" type="text" id="nom" value="<?php echo $_GET["id_cour"]; ?>"/>
            </div>
			</div>
            <div class="form-group">
            <label for="titre" class="col-sm-2 control-label">Titre cour</label>
            <div class="col-sm-8">
              <input name="nom" type="text" id="nom" value="<?php echo $ligne['titre_cour']; ?>"/>
            </div>
			</div>
			
			<div class="form-group" >
              <label for="image" class="col-sm-2 control-label">Parcourir le document :</label>
              <input name="document" type="file" multiple id="dropzone" value="<?php echo $ligne['document']; ?>/>
            </div>
	        <div class="form-group">
            <label for="titre" class="col-sm-2 control-label">Lien</label>
            <div class="col-sm-8">
              <input name="lien" type="text" id="adresse" value="<?php echo $ligne['lien']; ?>"/>
            </div>
	</div>
	<div class="form-group" >
	
          <center>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <button type="reset" class="btn btn-primary">Annuler</button>
            </center>
			
          </div>
		  </div>
		  </form>
		  </div>
	<?php include"Traitement/footer.php"; ?>
</body>
</html>