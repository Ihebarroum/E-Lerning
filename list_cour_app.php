
<!DOCTYPE html>
<html>
<?php
include('Traitement/connex_bdd.php');

?>

<?php include 'Traitement/header.php'; ?>

	<head>
		<meta charset="UTF-8" />
		<title>Liste des cours</title>
		
	</head>
	<body>
   
	<div class="wrapper">
       	 		<?php include('Traitement/bonjour.php');?>

			<div class="left">
			<center>
		<?php
$id_module = $_GET['id_module'];
$code=$_GET["id_module"];
//On recupere les identifiants, les pseudos et les emails des utilisateurs
$res=$bdd->query("select nom from module where id_module='$code'");
$req = $bdd->query("select id_cour,titre_cour,document,lien from cours where id_module='$id_module'");
$nb=$req->rowCount();
$i=0;
?>
<?php
	while($dn =$res->fetch())
            {
				?>
				<h1> liste cours :<?php echo $dn['nom']; ?></h1>
				<?php
			}
				?>
 <table class="table table-list-search" class="list">		 
    <tr>
                 
<td width="140" class="entete_tableau">Titre cour</td>
<td width="140" class="entete_tableau">Document </td>
<td width="200" class="entete_tableau">Lien</td>
</tr>
    	
	<?php

	while($dnn = $req->fetch())
{
		$i++;	
?>
	<tr>
  
		<td ><?php echo $dnn['titre_cour']; ?></td>
			<td ><a href="document/<?php echo $dnn['document']; ?>"><?php echo $dnn['document']; ?></a></td>
    		<?php
		
		
	$fichier ="*.pdf";
$chemin = 'document/' . $fichier;
if (file_exists($chemin))
{
	header('Content-disposition: attachment; filename="' . $fichier . '"');
	header('Content-Type: application/force-download');
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: '. filesize($chemin));
	header('Pragma: no-cache');
	header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	header('Expires: 0');
	readfile($chemin);
}
else
{
	$erreurFichier = 'le fichier "' . $fichier . '" n\'existe pas. Veuillez-nous excusez pour le désagrément.';
}
?>
		
				<td ><a href="<?php echo $dnn['lien']; ?>" > <?php echo $dnn['lien']; ?> </a></td>

		
		
    	
		
        

    </tr>
	<?php

}
?>
</table>  
</center>
<center>
<form action="list_module_app.php" method="post" name="form1" id="form1">
<button type="submit" class="btn btn-primary">Retour</button>
<form>
</center>
		</div>
	</div>
</div>
          </td>
          </tr>
          </table>
          </div>
		  </center>
	</body>
</html>