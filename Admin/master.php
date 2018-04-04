<?php
include('../Traitement/connex_bdd.php');

?>
<!DOCTYPE html>
<html>
<?php include '../Traitement/header.php'; ?>
<style>
#box1{
		position: absolute;
		top: 20%;
		left:30%;
		width: 500px;
		display: block;
		background-color: white;
		z-index: 51;
		opacity: .0;
		padding: 10px;
		border-radius: 5px;
		box-shadow: 0px 0px 0px 5px #444444;
		-moz-box-shadow:0px 0px 0px 5px #444444;
		-webkit-box-shadow:0px 0px 0px 5px #444444;
		display: none;
		}
	#close1{
		float:right;
		margin-right: 6px;
		cursor: pointer;
		}
	#backgr1{
		position:absolute;
		top:0px;
		left:0px;
		width:100%;
		height:100%;
		background-color: black;
		opacity: .0;
		filter:alpha(opacity=0);
		z-index:50;
		display: none;
		}
	#box2{
		position: absolute;
		top: 20%;
		left:30%;
		width: 500px;
		height: 180px;
		display: block;
		background-color: white;
		z-index: 51;
		opacity: .0;
		padding: 10px;
		border-radius: 5px;
		box-shadow: 0px 0px 0px 5px #444444;
		-moz-box-shadow:0px 0px 0px 5px #444444;
		-webkit-box-shadow:0px 0px 0px 5px #444444;
		display: none;
		}
	#close2{
		float:right;
		margin-right: 6px;
		cursor: pointer;
		}
	#backgr2{
		position:absolute;
		top:0px;
		left:0px;
		width:100%;
		height:100%;
		background-color: black;
		opacity: .0;
		filter:alpha(opacity=0);
		z-index:50;
		display: none;
		}
</style>
<script type="text/javascript">
	$(document).ready(function(){
			
			$('#lightbox1').click(function(){
				$('#backgr1').animate({'opacity':'.50'},300,'linear');
				$('#box1').animate({'opacity':'1.00'},300,'linear');
				$('#backgr1, #box1').css('display','block');
			});
			$('#close1').click(function(){
				$('#backgr1').animate({'opacity':'.0'},300,'linear');
				$('#box1').animate({'opacity':'.0'},300,'linear');
				$('#backgr1, #box1').css('display','none');
			});
						/*--------------------*/
			$('#lightbox2').click(function(){
				$('#backgr2').animate({'opacity':'.50'},300,'linear');
				$('#box2').animate({'opacity':'1.00'},300,'linear');
				$('#backgr2, #box2').css('display','block');
			});
			$('#close2').click(function(){
				$('#backgr2').animate({'opacity':'.0'},300,'linear');
				$('#box2').animate({'opacity':'.0'},300,'linear');
				$('#backgr2, #box2').css('display','none');
			});
		});
</script>
<body>
	<div class="wrapper">
		<?php include('../Traitement/bonjour.php') ?><br>
	<?php if(isset($_GET['notif'])){
		switch ($_GET['notif']) {
			case '1':
				echo "<center><h4>Une Matière Ajouter</h4></center>";
				break;
			case '2':
				echo "<center><h4>Un Niveau Ajouter</h4></center>";
				break;
			case '3':
				echo "<center><h4>Erreur lors de l'ajout veuillez ressayer</h4></center>";
				break;
			case '4':
				echo "<center><h4>Le Niveau c'est ajouté</h4></center>";
				break;
			default:
				break;
		}
	} ?>
	<br>
	<br>
	
  	<div class="small-3 columns"><table><thead><td>Les Sections disponibles</thead>
  	<?php 
  	$mat = $bdd->query("SELECT * FROM section");
  	while($ligne = $mat->fetch()){?>
  		<tr><td><img style="width: 25px;float:left;"src="images/matiere/<?=$ligne['image'] ?>"/>&nbsp;&nbsp;&nbsp;<?=$ligne['libelle']?></tr>
  	<?php }?>
  	</table></div>

  <div class="small-7 columns" >

	<form method="GET" action="listes.php">
		<center>
		<input style='width:400px'  class="radius button" type="submit" value="Liste des apprenants" name="type" />
		<input style='width:400px'  class="radius button" type="submit" value="Liste des tuteurs" name="type" />
		<input style='width:400px'  class="radius button" type="submit" value="Liste des tests" name="type" />	
		<input style='width:400px'  class="radius button" type="submit" value="Liste des sessions" name="type" />
	    <ul style="width:400px;"class="button-group round even-2">
		<li><a href="#" id="lightbox1" class="button ">Ajouter Matière</a></li>
		<li><a href="#" id="lightbox2"class="button ">Ajouter Niveau</a></li>
	</ul>
		</center>
	</form>
	<form method="GET" action="Forum.php">
	<center>
	<input style='width:400px'  class="radius button" type="submit" value="Forum" name="type" />
	</center>
	</form>
	<form method="GET" action="../inc/home.php">
	<center>
	<input style='width:400px'  class="radius button" type="submit" value="Message instantané" name="type" />
	</center>
	</form>
	<form method="GET" action="Formulaire.php">
	<center>
	<input style='width:400px'  class="radius button" type="submit" value="E-mail" name="type" />
	</center>
	</form>
	</div>
  <div class="small-2 columns"><table>
  	<thead><td>Les Niveaux disponibles</thead>
  	<?php 
  	$mat = $bdd->query("SELECT * FROM niveau");
  	while($ligne = $mat->fetch()){
  		echo "<tr><td>".$ligne['libelle']."</tr>";
  	}?>
  	</table></div>
	<div id="backgr1"></div>
	<div id="box1"><div id="close1"><img src="images/close.jpg"></div><h3>Le libelle de la matière</h3>
	<form action="ajout_matiere.php" method="post" enctype="multipart/form-data"> <input type="text" name="matiere" placeholder="Exemple : Mathématique">
		<br><center><span style="font-size: 10pt; font-weight: italic;">Une image de la Matière</span>
		<input style="margin-left:150px;"type="file" name="file"></center>
	<center><input type="submit" value="Ajouter" class="button secondary"></center></form></div>

	<div id="backgr2"></div>
	<div id="box2"><div id="close2"><img src="images/close.jpg"></div><h3>Le libelle du Niveau</h3>
	<form action="ajout_niveau.php" method="post"> <input type="text" name="niveau" placeholder="Exemple : 3ème Année">
	<center><input type="submit" value="Ajouter" class="button secondary"></center></form></div>
</div>
	<?php include"../Traitement/footer.php" ?>
</body>
</html>

