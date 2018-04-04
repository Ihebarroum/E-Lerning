<?php include "../connex_bdd.php";
/**traitement im.....age de la matiere **/
if(!empty($_FILES)){
if (($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")  || ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")|| ($_FILES["file"]["type"] == "image/png")) {

  if ($_FILES["file"]["error"] > 0){
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }else{
    if(file_exists("images/matiere/" . $_FILES["file"]["name"])){
    	$i=0;
    	$split=explode(".", $_FILES['file']['name']);
    	$fname=$_FILES["file"]["name"].$i.".".end($split);
      	while(file_exists("images/matiere/" . $fname)){
      	$fname=$_FILES["file"]["name"].$i.".".end($split);
      	$i++;
      	}
      }else{
      	$fname=$_FILES["file"]["name"];
      }
      move_uploaded_file($_FILES["file"]["tmp_name"], "images/matiere/".$fname);
    }
  }else{
  	header("location: master.php?notif=3");
  }
}else{
	$fname="default.png";
}
if(isset($_POST['matiere'])){
	$mat = $bdd->prepare("SELECT * FROM matiere where libelle = :mat ");
	$mat->bindValue(":mat", $_POST['matiere']);
	$mat->execute();
	$row = $mat->fetch();
	if(empty($row)){
		$mat = $bdd->prepare("INSERT INTO matiere(libelle,image) VALUES (:mat,:image)");
		$mat->bindValue(":mat", $_POST['matiere']);
		$mat->bindValue(":image", $fname);
		$mat->execute();
		header("location: master.php?notif=1");
	}
	else{
	header("location: master.php");
	}
}else{
	header("location: master.php");
}