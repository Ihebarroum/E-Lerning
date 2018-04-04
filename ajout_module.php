
<!DOCTYPE html>
<html>
<?php
include('Traitement/connex_bdd.php');



?>

<?php include 'Traitement/header.php'; ?>

	<head>
		<meta charset="UTF-8" />
		<title>Ajouter Module</title>
		
	</head>
	<body>

	<div class="wrapper">
       	 		<?php include('Traitement/bonjour.php');
				if(isset($_GET['cas'])){
			$x=$_GET['cas'];
			if($x==1){
				echo "Module déja existant, Veuillez changez vos coordonnées !";
			}
			if($x==2){
				echo "Module effectué !";
				header("Location: list_session_tut.php?cas=$x");
			}
			if($x==3){
				echo " error lors de l'ajout Veuillez ressayer.";
			}
		}?>

			<div class="left">
			
  
         
          <form class="form-horizontal" role="form" name="form2" action="ajout_mod.php" method="post">
        
       
            <div class="form-group" >
         
          
            <label for="titre" class="col-sm-2 control-label">Nom Module :</label>
            <div class="col-sm-8">
			            
              <input type="" class="form-control" name="nom" id="titre">
            
          </div>
		  </div>
		       
         
       
           
		    <div class="form-group" >
          <label for="titre" class="col-sm-2 control-label">Date debut :</label>
		  
            <div class="col-sm-8">
            
              <input type="date" class="form-control" name="date_deb" id="date_deb">
              </div>
               </div>
			    <div class="form-group" >
          <label for="titre" class="col-sm-2 control-label">Date fin :</label>
            <div class="col-sm-8">
            
              <input type="date" class="form-control" name="date_fin" id="date_deb">
              </div>
               </div>
			   <?php
			    $code=$_GET["id_session"];
	$rez=$bdd->query("select id_session from session where id_session='$code'");
	$dez =$rez->fetch();
	?>
			   <div class="form-group" >
            <div class="col-sm-8">
            
              <input type="hidden"  class="form-control" name="id_session" id="date_deb" readonly="true" value="<?php echo $dez['id_session'];?>" >
              </div>
               </div>
          <div class="form-group" >
          <center>
            <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
            <button type="reset" class="btn btn-primary">Annuler</button>
            </center>
          </div>
       
      <form action="list_module.php">
	<input type="submit" value="Retour " class="success button radius" />
</form>
      </form>
	  


  </div>
  
  </div>
		  <?php include"Traitement/footer.php" ?>

	</body>
</html>
