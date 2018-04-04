
<!DOCTYPE html>
<html>
<?php
include('../Traitement/connex_bdd.php');?>




<?php include '../Traitement/header.php'; ?>

	<head>
		<meta charset="UTF-8" />
		<title>créer une session</title>
		
	</head>
	<body>

	<div class="wrapper">
       	 		<?php include('../Traitement/bonjour.php');?>
				

			<div class="left">
			
  
         
          <form class="form-horizontal" role="form" name="form2" action="ajout_sess.php" method="post">
        
       
            <div class="form-group" >
         
          
            <label for="titre" class="col-sm-2 control-label">Nom session :</label>
            <div class="col-sm-8">
			            
              <input type="" class="form-control" name="nom" id="titre">
            
          </div>
		  </div>
		       
         
       
           
		    <div class="form-group" >
          <label for="titre" class="col-sm-2 control-label">Date début :</label>
		  
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
			             <label for="titre" class="col-sm-2 control-label">Nom du Tuteur :</label>

			   <div class="form-group" >
			   
			  <select name="id_prof"><?php $pro = $bdd->query("SELECT * FROM professeur where activation='1' ");
				while($ligne = $pro->fetch()){?>
  					<option value="<?= $ligne['id']?>"><?= $ligne['nom']?></option>
  					<?php } ?>
  				</select>
			      </div>
         
          
           <br>
          <div class="form-group" >
          <center>
            <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
            <button type="reset" class="btn btn-primary">Annuler</button>
			</form>
			<br><form action="master.php">
	<input type="submit" value="Retour " class="alert button radius" />
</form>
            </center>
          </div>
       
      

	  


  </div>
  
  </div>
		  <?php include"../Traitement/footer.php" ?>

	</body>
</html>
