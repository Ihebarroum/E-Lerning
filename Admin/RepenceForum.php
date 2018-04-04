<?php try
{
include('../Traitement/connex_bdd.php');

?>

<!DOCTYPE html>
<html>
<?php include '../Traitement/header.php'; ?>

<body>
	<div class="wrapper">
	<?php include('../Traitement/bonjour.php') ?>
	<Center>

<?php
$code=$_GET["id"];
	$rez=$bdd->query("select id from forum where id='$code'");
	$dez =$rez->fetch();
    $reponse = $bdd->query("SELECT * FROM reponceforum where id_forum='$code' ORDER BY ID DESC LIMIT 0, 10");
    
 ?>
<table ><h1>Reponse de La Forum </h1>
		<TH>Auteur</TH>
 	    <TH>message</TH>
	    <TH>date de dernier réponse</TH>
	   <TH></TH>
   <?php while ($donne= $reponse->fetch())
    {
		
		?>
	<tr >
	<td> <?php echo $donne['pseudo']?></td>
	<td> <?php echo $donne['message']?></td>
	<td> <?php echo $donne['date_derniere_reponse']?></td>
	<td>  </td>
	</tr>
	
    <?php  
    }
    

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

?>
</table>
<form action="ajoutRepenceForum.php" method="post">
<?php
	
	?>
    <label for="message">Reprendre</label><br />
    
    <textarea name="message" id="message" cols="70" rows="6"></textarea><br />
	<div class="col-sm-8">
            
              <input  type="hidden"   class="form-control" name="id_forum" id="id_forum" readonly="true" value="<?php echo $dez['id'];?>" >
              </div>
    <input type="submit" class="small success button lightbox" value="Envoyer" />
	<a href="Forum.php"> <input type="button" class=" small  alert radius button" value="Retour"></a>
</form>
    </Center>
	
  </div>

	<?php include "../Traitement/footer.php" ?>
	
</body>
</html>
