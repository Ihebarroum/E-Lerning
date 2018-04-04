<?php
include('connex_bdd.php');
if(!empty($_POST)){
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$password_1=$_POST['password_1'];
$password_2=$_POST['password_2'];
$pseudo=$_POST['pseudo'];
$table=$_POST['table'];
$mail=$_POST['mail'];
if(isset($_POST['matiere']) && $table=='professeur' or $table=='etudiant' ){
	$id_matiere= $_POST['matiere'];
}
$id_niveau= $_POST['niveau'];
$x=0;
/** traitement de l'image de proffesseur */ 
if($_FILES["file"]["size"] > 0){
	if (($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")  || ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")|| ($_FILES["file"]["type"] == "image/png")) {
	  if($_FILES["file"]["error"] > 0){
	    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	    }else{
	    if(file_exists("../images/profs/" . $_FILES["file"]["name"])){
	    	$i=0;
	    	$split=explode(".", $_FILES['file']['name']);
	    	$fname=$_FILES["file"]["name"].$i.".".end($split);
	      	while(file_exists("../images/profs/" . $fname)){
	      	$fname=$_FILES["file"]["name"].$i.".".end($split);
	      	$i++;
	      	}
	      }else{
	      	$fname=$_FILES["file"]["name"];
	      }
	      move_uploaded_file($_FILES["file"]["tmp_name"], "../images/profs/".$fname);
	    }
 	}else{
  
  }
}else{
	$fname="default.png";
}
  /** fin de traitement d'image **/ 

/** vérifier si les données sont justes **/ 

if( $password_1==$password_2){
	$resultat=$bdd->query("SELECT * FROM $table");
		while($ligne=$resultat->fetch()){ 
		if($ligne['pseudo']==$pseudo OR $ligne['email']==$mail ){$x=1 ; break;}
		}
		$resultat->closecursor();
}
if( $password_1!=$password_2){
	$x=3; 
	header("Location: ../inscription.php?pseudo=$pseudo&nom=$nom&prenom=$prenom&table=$table&mail=$mail&cas=$x");
}
		
if($x==0){
	if($table=='etudiant'){
	$req = $bdd->prepare("INSERT INTO etudiant (nom, prenom, pseudo, password, activation, email,id_niveau,id_matiere) VALUES(:nom, :prenom, :pseudo, :password, :activation, :email,:idn,:id_matiere)");
	$req->execute(array(
		'nom' => $nom, 
		'prenom' => $prenom, 
		'pseudo' => $pseudo, 
		'password' => md5($password_1), 
		'activation' => 0, 
		'email' => $mail, 
		'idn' => $id_niveau,
		':id_matiere' => $id_matiere));
	}
	if($table=='professeur'){
		$req = $bdd->prepare("INSERT INTO professeur (nom, prenom, pseudo, password, activation, email, id_matiere, id_niveau,image) VALUES(:nom, :prenom, :pseudo, :password, :activation, :email, :id_matiere, :id_niveau , :image)");
		$req->execute(array(
			'nom' => $nom, 
			'prenom' => $prenom, 
			'pseudo' => $pseudo, 
			'password' => md5($password_1),
			'activation' => 0, 
			'email' => $mail,
			':id_matiere' => $id_matiere, 
			':id_niveau' => $id_niveau,
			':image' => $fname));
	}
	$x=2;
}
header("Location: ../inscription.php?cas=$x");
}else{
	header("location: ../inscription?cas=4");
}
?>
	
	