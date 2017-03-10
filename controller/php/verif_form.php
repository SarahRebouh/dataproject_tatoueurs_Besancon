<?php
session_start();
require_once('model/PDO.php');

if (isset($_REQUEST['button']))
{

  $err_pseudo = true;
  $err_select_salon = true;
  $err_noteDuSalon = true;
  $err_avis = true;
  $err_fichier = true;

  if ($_POST['pseudo'] == "")
  {
      $_SESSION['err_pseudo'] = "Merci de donner votre pseudo";
      $err_pseudo = false;

  }

  if (($_POST['avis'] == "")||(strlen($_POST['avis'])>500)||(strlen($_POST['avis'])<140))
  {
      $_SESSION['err_avis'] = "Merci de donner votre avis ou de respecter la limite";
      $err_avis = false;

  }

  if($_POST["select_salon"] == "")
  {
      $_SESSION["err_select_salon"] = "Merci de choisir votre salon" ;
      $err_select_salon = false;

  }

  if($_POST["noteDuSalon"] == "")
  {
      $_SESSION["err_noteDuSalon"] = "Merci de donner une note" ;
      $err_noteDuSalon = false;
  }


  if($err_pseudo == true && $err_select_salon == true && $err_noteDuSalon == true && $err_avis == true && $err_fichier = true)
  {

    $nomOrigine = $_FILES['Photo']['name'];
		$elementsChemin = pathinfo($nomOrigine);
		$extensionsAutorisees = array("jpeg", "jpg", "gif", "png");
    $extensionFichier = $elementsChemin['extension'];
		$repertoireResize = "data/";
		$repertoireDestination = "data/";
		$nomDestination = "fichier_du_".date("YmdHis").".".$extensionFichier;

				move_uploaded_file($_FILES["Photo"]["tmp_name"], $repertoireDestination.$nomDestination);
					include("controller/object/test_recize.php");
					$resize = new ResizeImage($repertoireDestination."fichier_du_".date("YmdHis").".".$extensionFichier);
					$resize->resizeTo(480);
					$resize->saveImage($repertoireResize."fichier_du_".date("YmdHis").".".$extensionFichier, "100");
					$nomImage = 'fichier_du_'.date("YmdHis").".".$extensionFichier;


      $query = $pdo->prepare("SELECT * FROM  d_tatoueurs WHERE  id_tatoueur = ".$_POST["select_salon"]);
      $query->execute();
      $res = $query->fetch();
      $tattoo =$res["tatoueur"];

        $query = $pdo->prepare("INSERT INTO d_commentaires (avis , url_image , pseudo , note , tatoueur , id_tatoueur) VALUES (:avis , :url_images , :pseudo , :note , :tatoueur , :id_tatoueur)");
          $query->execute(array(
            "avis"=>$_POST["avis"],
            "url_images"=>$nomImage,
            "pseudo"=>$_POST["pseudo"],
            "note"=>$_POST["noteDuSalon"],
            "tatoueur"=>$tattoo,
            "id_tatoueur"=>$_POST["select_salon"]
          ));
        header("location: index.php?param_url=galerie.php");
  }
}

 ?>
