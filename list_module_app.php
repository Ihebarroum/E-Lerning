<?php
include('Traitement/connex_bdd.php');

?>

<!DOCTYPE html>
<html>
<?php include 'Traitement/header.php'; ?>

<body>
	<div class="wrapper">
	<?php include('Traitement/bonjour.php') ?>
	

	<?php
$id_session = $_GET['id_session'];
	if(!empty($_POST) && $_SESSION['mode']=="etudiant"){

	$id_niveau = $_SESSION['id_niveau'];
   
	$req = $bdd->query("select * from module WHERE id_session='$id_session' ");
	
$nb=$req->rowCount();
$i=0;

?>
<center>
<?php
$code=$_GET["id_session"];
$res1=$bdd->query("select nom from session where id_session='$code'");
while($dn1 =$res1->fetch())
            {
				?>
<h1> Liste module de la session:<?php echo $dn1['nom']; ?> </h1>
<?php
			}
			?>
 <form action="" method="post" name="form1" id="form1">
    	 <table class="table table-list-search" class="list">		 
    <tr>
                 
<td width="140" class="entete_tableau">Nom</td>
<td width="140" class="entete_tableau">Date de début </td>
<td width="200" class="entete_tableau">Date fe fin</td>
</tr>
	<?php
	while($dnn =$req->fetch())
		
      {
	     $i++;
    ?>
	<tr>
				<td ><a href="list_cour_app.php?id_module=<?php print $dnn[0]; ?>"><?php echo htmlentities($dnn['nom'], ENT_QUOTES, 'UTF-8'); ?></a>
				<div class="form-group" >
          
            <div class="col-sm-8">
           
              <input type="text" class="hideme"  style='display:none;' name="id_module" id="date_deb" readonly="true" value="<?php echo $dnn['id_module'];?>" >
              </div>
               </div>
				</td>

     
    	<td ><?php echo htmlentities($dnn['date_deb'], ENT_QUOTES, 'UTF-8'); ?></td>
		<td ><?php echo $dnn['date_fin'];?></td>
		
	
    </tr>
	<?php
   }	
    ?>
</table>
<?php
}	
?>
</form>
</center>
<center>
<form action="etudiant.php">
	<input type="submit" value="Retour " class="success button radius" />
</form>
</center>
</div>
<?php include "Traitement/footer.php" ?>	
</body>
</html>
