<?php
include('Traitement/connex_bdd.php');
$code=$_GET["id_module"];
$requet= $bdd->query ("select  id_module,nom, date_deb, date_fin from module where id_module='$code'");
$nb=$requet->rowCount();
$ligne=$requet->fetch()

?>

<!DOCTYPE html>
<html>
<?php include 'Traitement/header.php'; ?>

<body>
	<div class="wrapper">
	
	<?php include('Traitement/bonjour.php') ?>
	<h1>Modification Module</h1>
	<form method="POST" action="modif_module.php">
	<div class="left">
	 <div class="form-group">
           
            <div class="col-sm-8">
              <input type="hidden" name="id_module" type="text" id="nom" value="<?php echo $_GET["id_module"]; ?>"/>
            </div>
			</div>
            <div class="form-group">
            <label for="titre" class="col-sm-2 control-label">Nom module</label>
            <div class="col-sm-8">
              <input name="nom" type="text" id="nom" value="<?php echo $ligne['nom']; ?>"/>
            </div>
			</div>
			<div class="form-group">
            <label for="titre" class="col-sm-2 control-label">date_deb</label>
            <div class="col-sm-8">
              <input name="date_deb" type="text" id="prenom" value="<?php echo $ligne['date_deb']; ?>"/>
            </div>
			</div>
			<div class="form-group">
            <label for="titre" class="col-sm-2 control-label">date_fin</label>
            <div class="col-sm-8">
              <input name="date_fin" type="text" id="adresse" value="<?php echo $ligne['date_fin']; ?>"/>
            </div>
	</div>
	<div class="form-group" >
	
          <center>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <button type="reset" class="btn btn-primary">Annuler</button>
            </center>
			<form action="list_session_tut.php">
	<input type="submit" value="Retour " class="success button radius" />
</form>
          </div>
		  </div>
		  </form>
		  
		  </div>
	<?php include"Traitement/footer.php"; ?>
</body>
</html>