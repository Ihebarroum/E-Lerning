<?php include "connex_bdd.php"; 
  $id=$_SESSION['id'];
if(!empty($_POST) && $_SESSION['mode']=="professeur"){
	if(!empty($_POST['nom'])){
		$req = $bdd->prepare("UPDATE professeur SET nom = :nom WHERE id = :id");
		$req->execute(array(
			':nom' => $_POST['nom'],
			':id'  => $id
			));
		$_SESSION['nom'] = $_POST['nom'];
	}
	if(!empty($_POST['prenom'])){
		$req = $bdd->prepare("UPDATE professeur SET prenom = :prenom WHERE id = :id");
		$req->execute(array(
			':prenom' => $_POST['prenom'],
			':id'  => $id
			));
		$_SESSION['prenom'] = $_POST['prenom'];
	}
	if(!empty($_POST['pass1']) && !empty($_POST['pass2']) && $_POST['pass1'] == $_POST['pass2']){
		$req = $bdd->prepare("UPDATE professeur SET password = :pass WHERE id = :id");
		$req->execute(array(
			':pass' => md5($_POST['pass1']),
			':id'  => $id
			));
	}
	if(!empty($_POST['email'])){
		$req = $bdd->prepare("UPDATE professeur SET email = :email WHERE id = :id");
		$req->execute(array(
			':email' => $_POST['email'],
			':id'  => $id
			));
		$_SESSION['email'] = $_POST['email'];
	}
	if($_FILES['file']['size']>0) {
		
		if ( ($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg")
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
			    $req = $bdd->query("SELECT image FROM professeur WHERE id = $id");
			    $ftch = $req->fetch();
			    $img = $ftch['image'];
			    if($img != "default.png"){
				    unlink('../images/profs/'.$img);   
				}
		    }
	 	}
	 	$req = $bdd->prepare("UPDATE professeur SET image = :img WHERE id = :id");
	 	$req->execute(array(
	 		':img' => $fname,
	 		':id'  => $id
	 		));
 	$_SESSION['image'] = $fname;
 }

} $x=3; 
fin:
header("location: ../professeur.php?notif=$x");