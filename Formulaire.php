<?php
include('../Traitement/connex_bdd.php');
include ('../Traitement/header.php');





echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web_Quest</title>
</head>

<body>

<div class="wrapper">

<table border="0" cellspacing="0" cellpadding="0" style="width: 719px; border-collapse: collapse">
    <tr style="height: 35.25pt">
        <td>';

        $error_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin
		$error_code = false; // sert pour afficher éventuellement l'erreur de captcha
		
     
        

        // copie ? (envoie une copie au visiteur)
        $copie = isset($_POST['copie']) ? $_POST['copie'] : 'non'; //mettre le choix par défaut (oui = case cochée)

        // Action du formulaire (si votre page a des paramètres dans l'URL)
        // si cette page est index.php?page=contact alors mettez index.php?page=contact
        // sinon, laissez vide
        $form_action = '';

        /*
		*******************************************************************************************
                                   FIN DE LA CONFIGURATION (1ère partie)
		*******************************************************************************************
        */
        
        /* cette fonction sert à nettoyer et enregistrer un texte */
        function Rec($text) {
            $text = trim($text); // delete white spaces after & before text
            if (1 === get_magic_quotes_gpc()) {
                $stripslashes = create_function('$txt', 'return stripslashes($txt);');
            }
            else {
                $stripslashes = create_function('$txt', 'return $txt;');
            }

            // Citation magiques ?
            $text = $stripslashes($text);
            $text = htmlspecialchars($text, ENT_QUOTES); // convertion en chaîne avec " et ' aussi
            $text = nl2br($text);
            return $text;
        }

        /* Cette fonction sert à vérifier la syntaxe d'un email saisi */
        function IsEmail($email) {
            $pattern = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";
            return (preg_match($pattern,$email)) ? true : false;
        }
	
        // si formulaire envoyé, on récupère tous les champs. Sinon, on initialise les variables.
        $nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : "";
        $prenom  = (isset($_POST['prenom']))  ? Rec($_POST['prenom'])  : "";
        $email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : "";
        $sujet   = (isset($_POST['sujet']))   ? Rec($_POST['sujet'])   : "";
        $message = (isset($_POST['message'])) ? Rec($_POST['message']) : "";        
    
        // Vérification du statut du mail
        $email = (IsEmail($email)) ? $email : ""; // soit l'email est vidé si erroné, soit il vaut l'email entré
    
        // Vérification du destinataire et enregistrement du choix fait
        // Si des destinataires doivent être ajoutés, faites bien attention à la syntaxe else { if ($destinataire ...) {$choix ...}
		// Modifier également le bloc qui démarre à la ligne 256
        if ((isset($_POST['destinataire']))) {
            $destinataire = stripslashes(htmlentities($_POST['destinataire']));
            if ($destinataire == $destinaire1) {
                $choix = 1;
            }
            else {
                if ($destinataire == $destinaire2) {
                    $choix = 2;
                }
                else {
                    if ($destinataire == $destinaire3) {
                        $choix = 3;
                    }
                    else {
                        if ($destinataire == $destinaire4) {
                        $choix = 4;
                        }
                        else $choix = 0;
                    }
                }
            }
        }
        else {
            $destinataire = "";
            $choix = 0;
        }
    
        /*
		*******************************************************************************************
		                                CONFIGURATION (2nde partie)
		*******************************************************************************************
        */
        
        // Liste des messages d'erreur
        $error_msg = array(); // intialisation du tableau
		
        if ($nom == "") // Test si la chaïne de texte est vide
            $error_msg[] = "Entrez votre nom svp !"; // Ajout de l'erreur à la liste
        if ($prenom == "") // Test si la chaïne de texte est vide
            $error_msg[] = "Entrez votre pr&eacute;nom svp !"; // Ajout de l'erreur à la liste
        if ($email == "") // Test si la chaïne de texte est vide
            $error_msg[] = "Entrez votre email svp ! <b><i>S'il n'est pas valide, il sera effac&eacute;.</i></b>"; // Ajout de  l'erreur à la liste
	
        /* Vérifier le destinataire (permet la non-acceptation d'envoi avec le choix 'Faites votre choix...') */
        if (isset($_POST['envoi'])) {
			if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',str_replace('&amp;','&',$destinataire)))
				$error_formulaire = false;
			elseif ($choix != -1) {
				$error_msg[] = "Choisissez un destinataire svp!"; // Ajouter à la liste
				$choix = 0;
			}
		}
	
        if ($sujet == "") // Test si la chaïne de texte est vide
            $error_msg[] = "Entrez le sujet de votre message svp !"; // Ajout de l'erreur à la liste
        if ($message == "") // Test si la chaïne de texte est vide
            $error_msg[] = "N'oubliez pas d'&eacute;crire votre message !"; // Ajout de l'erreur à la liste
			
		/*
		*******************************************************************************************
		                                  FIN DE LA CONFIGURATION
		*******************************************************************************************
        */

        if (isset($_POST['envoi'])) {
			
			// Affichage des éventuels erreurs à cause de champs vide
			if ($error_msg) {
				echo "<ul style='color: red; margin-top:0px;'>\n"; // Ouvre la liste
				foreach ($error_msg as $err) { //Ecrit chaque erreur de la liste
					echo "               <li>".$err."</li>\n";
				}
				echo "            </ul>\n"."        ";    // Ferme la liste
				$error_formulaire = true;
			}
			
			if (!$error_formulaire) {
			

				if (($nom != '') && ($prenom != '') && ($email != '') && ($sujet != '') && ($message != '')) {
					// les 4 variables sont remplies, on génère puis envoie le mail

					$headers = 'From: '.$prenom.' '.$nom.' <'.$email.'>'."\nContent-Type: text/html; charset=utf-8\r\nMIME-Version: 1.0";
			
					// envoyer une copie au visiteur ?
					if ($copie == 'oui') {
						$cible = $destinataire.','.$email;
					}
					else {
						$cible = $destinataire;
					}
                
					// Envoi du mail
					if (mail($cible, $sujet, $message, $headers)) {
						$_SESSION['envoi'] = 1; // validation de la session - message envoyé
						$_SESSION['copie'] = $copie; // enregistrement du choix de copie pour la page de résultat
						echo '<script language="Javascript">
document.location.replace("Resultat.php")
</script>'."\n";
						exit();
					}
					else {
						$_SESSION['envoi'] = 2; // validation de la session - message non-envoyé
						echo '<script language= "Javascript">
document.location.replace("Resultat.php")
</script>'."\n";
						exit();
					}
					
				}
				
			} // fin du if(!$error_formulaire)
			
		} //fin du if (isset($_POST['envoi']))

        if ($error_formulaire || (!isset($_POST['envoi'])))	{

            // afficher le formulaire
			
            echo '<form id="contact" method="post" action="'.$form_action.'">
        <div class="left">
		<fieldset><legend>Vos coordonn&eacute;es</legend>
        <table border="0">
            <tr>
                <td align="right" valign="top" width="179">'.'<label for="nom">Nom :</label>'.'</td>
                <td>'.'<input type="text" id="nom" name="nom" size="69" value="'.stripslashes($nom).'" tabindex="1" />'.'<br />'.'<br />'.'</td>
            </tr>
            <tr>
                <td align="right" valign="top" width="179">'.'<label for="prenom">Pr&eacute;nom :</label>'.'</td>
                <td>'.'<input type="text" id="prenom" name="prenom" size="69" value="'.stripslashes($prenom).'" tabindex="1" />'.'<br />'.'<br />'.'</td>
            </tr>
            <tr>
                <td align="right" width="179">'.'<label for="email">Email :</label>'.'</td>
                <td>'.'<input type="text" id="email" name="email" size="69" value="'.stripslashes($email).'" tabindex="2" />'.'<br />'.'</td>
            </tr>
        </table>
        </fieldset>
        <br />'."\n";
			

            // Listage des différents destinataires possible
            // Possibilité de mettre autant de destinaire que souhaité mais attention à respecter la mise en forme.

            ?>

        <label for="destinataire"> Votre message est adresse:</label>
        <select id="destinataire" name="destinataire">
            <option>Faites votre choix...</option>
           
			
			<?php
				
						$resultat=$bdd->query("SELECT * FROM professeur ");
				while($choix=$resultat->fetch()){ ?>
					<tr>
						
						
				
					 <option <?php echo $choix['nom']?></option>
						
			<?php } ?>
					
            
        </select>
    
        <?php
        echo '<br />'.'<br />
        <fieldset><legend>Votre message :</legend>
        <table border="0">
            <tr>
                <td align="right" valign="top" width="179">'.'<label for="sujet">Sujet du message :</label>'.'</td>
                <td>'.'<input type="text" id="sujet" name="sujet" size="69" value="'.stripslashes($sujet).'" tabindex="3" />'.'<br />'.'<br />'.'</td>
            </tr>
            <tr>
                <td align="right" valign="top" width="179">'.'<label for="message">Message :</label>'.'</td>
                <td>'.'<textarea id="message" name="message" tabindex="4" cols="69" rows="9">'.stripslashes($message).'</textarea>'.'<br />'.'</td>
            </tr>
        </table>
        </fieldset>
        <br />
        <input type="checkbox" id="copie" name="copie" value="oui" '?><?php if ($copie == "oui") { echo "checked ";} echo '/>Recevoir une copie du message envoy&eacute;. <span style="font-size: small;">(Cochez pour accepter)</span>'; ?>
		<div style="text-align:center;"><input type="reset" name="" value="R&eacute;initialiser le formulaire !" />&nbsp; &nbsp; &nbsp; <input type="submit" name="envoi" value="Envoyer le formulaire !" /></div>
        </form>
		<br>
		<form action="professeur.php">
		<div style="text-align:center;"><input type="submit" value="Retour" class="alert button radius">
	</form>
        </td>
    </tr>
</table>
</div>
</body>
</html>
<?php }
?>