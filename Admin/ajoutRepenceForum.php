<?php try
{
include('../Traitement/connex_bdd.php');

?>

<!DOCTYPE html>
<html>
<?php include '../Traitement/header.php'; ?>
<?php

$nom= admin;

    // on calcule la date actuelle
		$date = date("Y-m-d H:i:s");
  
    $req = $bdd->prepare('INSERT INTO reponceforum (pseudo, message, id_forum, date_derniere_reponse) VALUES(?, ?, ?, ?)');
    $req->execute(array($nom, $_POST['message'], $_POST['id_forum'], $date));
    header('Location:Forum.php');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
</html>
