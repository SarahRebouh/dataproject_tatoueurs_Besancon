<?php

$db=new Database;
$req = $db->prepare("select * from d_tatoueurs WHERE id_tatoueur = :tatoueur", ["tatoueur" => 1]);

  foreach ($req as $row){
    echo $row["id_tatoueur"] ;
     }
?>

<?php

$db=new Database;
$req_com = $db->prepare("select * from d_commentaires WHERE id_tatoueur=".$_GET["id"]);

  foreach ($req_com as $row){
    echo $row["pseudo"] ;
    echo $row["avis"] ;
     }
?>
<p id="avis">Les avis de <?php
$req_avis = $db->prepare("select tatoueur from d_tatoueurs where id_tatoueur=".$_GET["id"]);
foreach ($req_avis as $row){
  echo $row["tatoueur"] ;
   } ?></p>
   
<div class="col-xs-3 col-md-2">

  <?php
  $req_url = $db->prepare("select url_logo from d_tatoueurs where id_tatoueur=".$_GET["id"]);

    foreach ($req_url as $row){
      echo "<img id='avatar' src='view/img/logo/".$row["url_logo"]."'><br><br>" ;
       } ?>

</div>
