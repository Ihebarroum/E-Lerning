<?php
include('Traitement/connex_bdd.php');
$code=$_GET["id_session"];
$requet= $bdd->query ("select  id_session,nom, date_deb, date_fin from session where id_session='$code'");
$nb=$requet->rowCount();
$ligne=$requet->fetch()

?>

<!DOCTYPE html>
<html>
<?php include 'Traitement/header.php'; ?>

<body>
	<div class="wrapper">
	
	<?php include('Traitement/bonjour.php') ?>
	<form method="POST" action="modifier_sesion_action.php">
	<div class="left">
	 <div class="form-group">
            <label for="titre" class="col-sm-2 control-label">ID</label>
            <div class="col-sm-8">
              <input name="id_session" type="text" id="nom" value="<?php echo $_GET["id_session"]; ?>"/>
            </div>
			</div>
            <div class="form-group">
            <label for="titre" class="col-sm-2 control-label">nom session</label>
            <div class="col-sm-8">
              <input name="nom" type="text" id="nom" value="<?php echo $ligne['nom']; ?>"/>
            </div>
			</div>
			<div class="form-group">
            <label for="titre" class="col-sm-2 control-label">date_deb</label>
            <div class="col-sm-8">
              <input name="date_deb" type="date" id="prenom" value="<?php echo $ligne['date_deb']; ?>"/>
            </div>
			</div>
			<div class="form-group">
            <label for="titre" class="col-sm-2 control-label">date_fin</label>
            <div class="col-sm-8">
              <input name="date_fin" type="date" id="adresse" value="<?php echo $ligne['date_fin']; ?>"/>
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