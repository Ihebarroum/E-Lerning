<!DOCTYPE html>
<html>
	<?php include '../Traitement/header.php'; ?>
<body>
	
	<div class="wrapper">
		<?php include('../Traitement/bonjour.php');?>
	<?php
include('../Traitement/connex_bdd.php');
 define('pseudo','admin');
  define('password','admin');
  $errorMessage = '';
 
  // Test de l'envoi du formulaire
  if(!empty($_POST)) 
  {
    // Les identifiants sont transmis ?
    if(!empty($_POST['pseudo']) && !empty($_POST['password'])) 
    {
      // Sont-ils les mêmes que les constantes ?
      if($_POST['pseudo'] !== pseudo) 
      {
        $errorMessage = 'Mauvais login !';
      }
        elseif($_POST['password'] !== password) 
      {  
        $errorMessage = 'Mauvais password !';
      }
        else
      {
        // On ouvre la session
        session_start();
        // On enregistre le login en session
        $_SESSION['pseudo'] = pseudo;
        // On redirige vers le fichier admin.php
        header('Location: master.php');
        exit();
      }
    }
      else
    {
      $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
	 }
?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<table style="width:70%">
			<h3>Ouvrir votre session</h3>
			<tr>
				<td>Nom d'utilisateur (Pseudo) : 
				<td><input type="text" name="pseudo" required>
			</tr>
			<tr>
				<td>Mot de passe :
				<td><input type="password" name="password" required>
			</tr>
			<tr>	
				<td><input class="success button"type="submit" value="Connexion">
				<td><input class="alert button"type="reset" value="Vider">
			</tr>
		</table>
	</form>
	</div>
<?php include"../Traitement/footer.php" ?>
</body>
</html>