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
	
	<center>
    
    
<?php


    
    
    $reponse = $bdd->query('SELECT * FROM Forum ORDER BY date_derniere_reponse ');
    $repense = $bdd->prepare("SELECT reponceForum.message FROM reponceForum,forum where reponceForum.id_forum=forum.id");
	$repense->execute();
	$colcount = $repense->rowCount();
	
 ?>
<table >
		<TH>Auteur</TH>
 	    <TH>message</TH>
		<TH>date de dernier réponse</TH>
	   <TH>Réponses</TH>
	   
	   <TH></TH>
   <?php while ($donne= $reponse->fetch())
    {
		
		?>
	<tr >
	<td> <?php echo $donne['pseudo']?></td>
	<td> <?php echo $donne['message']?></td>
	<td> <?php echo $donne['date_derniere_reponse']?></td>

	<td> <?php  print($colcount); ?>  </td>
	<td> 
	<form method="POST" action="RepenceForum.php?id=<?php print $donne[0];?>">
	<input type="submit" class="small success button lightbox" value="Répondre" /> </td>
	</form>
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
<form action="ajoutForum.php" method="post">
        <p>
        
        
		<textarea name="message" id="message" cols="70" rows="6"></textarea><br/>
        <input type="submit" class="small success button lightbox" value="Envoyer" />
		        <input type="reset" class="small success button lightbox" value="Annuler" />

	</p>
    </form>
	<form action="master.php">
		<input type="submit" class="alert radius button" value="Retour">
	</form>
   </div>

	<?php include "../Traitement/footer.php" ?>
	
</body>
</html>
