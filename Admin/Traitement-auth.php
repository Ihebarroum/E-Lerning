<?php
include('../Traitement/connex_bdd.php');
 define('pseudo','monta');
  define('password','monta');
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