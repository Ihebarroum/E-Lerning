
<!DOCTYPE html>
<html>
<?php
include('Traitement/connex_bdd.php');

$id_module=$_GET['id_module']
?>

<?php include 'Traitement/header.php'; ?>

	<head>
		<meta charset="UTF-8" />
		<title>Ajouter cours</title>
		<script type="text/javascript">
			function showe(){
				document.getElementById('prof').style.display="block";
				document.getElementById('prof1').style.display="none";
			}
			function showp(){
				document.getElementById('prof').style.display="none";
				document.getElementById('prof1').style.display="block";
				
			}
		</script>
		
	</head>
	<body>

	<div class="wrapper">
       	 		<?php include('Traitement/bonjour.php');
				if(isset($_GET['cas'])){
			$x=$_GET['cas'];
			if($x==1){
				echo "Session déja existant, Veuillez changez vos coordonnées !";
			}
			if($x==2){
				echo "Session effectué ! Veuillez attendre la validation de votre session !";
				header("Location: list_session.php?cas=$x");
			}
			if($x==3){
				echo " error lors de l'ajout Veuillez ressayer.";
			}
		}?>

			<div class="left">
			
  
         
          <form class="form-horizontal" role="form" name="form2" action="ajout_cou.php" method="post">
        
       
            <div class="form-group" >
         
          
            <label for="titre" class="col-sm-2 control-label">titre cour :</label>
            <div class="col-sm-8">
			            
              <input type="" class="form-control" name="titre_cour" id="titre">
            
          </div>
		  </div>

			   <div class="form-group" >
				<label for="image" class="col-sm-2 control-label">choisir les format de cours :</label>
				<input style="float:left" type="radio"  name="table"  id="etudiant" onclick="showe();" value="etudiant" required/><label for="etudiant"> document </label>
				<input style="float:left" type="radio"  name="table"  id="professeur" onclick="showp();" value="professeur" required /><label for="professeur">Lien</label>	
			
			</div>
			   <div class="form-group" style="display:none;width:100%" id="prof">
              <label>Parcourir le document :</label>
              <input name="document" type="file" />
            </div>
			   <div class="form-group"  style="display:none;width:100%" id="prof1">
          <label for="titre" class="col-sm-2 control-label">lien :</label>
            <div class="col-sm-8">
            
              <input type="text" class="form-control" name="lien" id="date_deb">
              </div>
               </div>
			   <?php
	$code=$_GET["id_module"];
	$rez=$bdd->query("select id_module from module where id_module='$code'");
	$dez =$rez->fetch();
	?>
			   <div class="form-group" >
            <div class="col-sm-8">
            
              <input type="hidden" class="form-control" name="id_module" id="date_deb" readonly="true" value="<?php echo $dez['id_module'];?>">
              </div>
               </div>
          <div class="form-group" >
          <center>
            <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
            <button type="reset" class="btn btn-primary">Annuler</button>
            </center>
          </div>
       </form>
	   <center>
      <form action="list_session_tut.php">
	<input type="submit" value="Retour " class="success button radius" />
</form>
      
	  	   </center>


  </div>
  
  </div>
		  <?php include"Traitement/footer.php" ?>

	</body>
</html>
