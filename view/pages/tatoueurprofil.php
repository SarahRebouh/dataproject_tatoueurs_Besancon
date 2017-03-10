<main>

  <div id="banniere">
    <?php $db=new Database;
    $req_couv = $db->prepare("select url_couv from d_tatoueurs where id_tatoueur=".$_GET["id"]);

      foreach ($req_couv as $row){
        echo "<img style='max-width:100%' id='url_avatar' src='view/img/couv/".$row["url_couv"]."'><br><br>" ;
         } ?>
  </div>

  <div class="container">

<!-- INFO SUR LES TATOUEURS -->
    <section class="info">

      <h2><?php
      $req = $db->prepare("select tatoueur from d_tatoueurs where id_tatoueur=".$_GET["id"]);

      foreach ($req as $row){
        echo "<p style='color:#ba2713; font-size:110%; font-weight:bolder;'>".$row["tatoueur"]."</p>" ;
      } ?></h2>

        <div class="row">

          <div class="col-xs-12 col-md-4">

            <?php
            $req_url = $db->prepare("select url_logo from d_tatoueurs where id_tatoueur=".$_GET["id"]);

              foreach ($req_url as $row){
                echo "<img id='url_avatar' src='view/img/logo/".$row["url_logo"]."'><br><br>" ;
                 } ?>

              <p id="tatoueurs">Tatoueurs <?php
              $req1 = $db->prepare("select Equipe from d_tatoueurs where id_tatoueur=".$_GET["id"]);

                foreach ($req1 as $row){
                  echo "<p style='color:; font-size:110%;'>".$row["Equipe"]."</p>" ;
                   } ?></p>

              <p id="description">Style <?php
              $req2 = $db->prepare("select style from d_tatoueurs where id_tatoueur=".$_GET["id"]);

                foreach ($req2 as $row){
                  echo "<p style='color:; font-size:110%;'>".$row["style"]."</p>" ;
                   } ?></p>

          </div>
<!--- CONTACT -->
          <div class="col-xs-12 col-md-4">

              <p id="informations">Infos pratiques </p><br>

              <p id="num"><img id="icontel" src="view/img/phone_2.png">&nbsp;&nbsp;<?php
              $req3 = $db->prepare("select tel from d_tatoueurs where id_tatoueur=".$_GET["id"]);

                foreach ($req3 as $row){
                  echo $row["tel"] ;
                   } ?></p>

               <p id="adresse"><img id="icontel" src="view/img/adresse.png">&nbsp;&nbsp;<?php
               $req5 = $db->prepare("select adresse from d_tatoueurs where id_tatoueur=".$_GET["id"]);

                 foreach ($req5 as $row){
                   echo $row["adresse"] ;
                    } ?></p>

                <p id="mail"><img id="iconmail" src="view/img/mail_2.png">&nbsp;&nbsp;<?php
                $req4 = $db->prepare("select email from d_tatoueurs where id_tatoueur=".$_GET["id"]);

                foreach ($req4 as $row){
                  echo $row["email"] ;
                   } ?></p><br>

              <a id="fblien" href="<?php $req_mail = $db->prepare("select lien_web from d_tatoueurs where id_tatoueur=".$_GET["id"]);
              foreach ($req_mail as $row){echo $row["lien_web"] ;} ?>" target="_blank"><p id="fb"><img src="view/img/facebook.png">&nbsp;&nbsp; Facebook de <?php
              $req5 = $db->prepare("select tatoueur from d_tatoueurs where id_tatoueur=".$_GET["id"]);

              foreach ($req5 as $row){
                echo $row["tatoueur"] ;
                 } ?></p></a><br>

              <p id="horaires">Horaires d'ouverture : <br><?php
              $req5 = $db->prepare("select horaires from d_tatoueurs where id_tatoueur=".$_GET["id"]);

                foreach ($req5 as $row){
                  echo $row["horaires"] ;
                   } ?></p>

          </div>

          <div class="col-xs-12 col-md-4">

                <p id="informations" >Note <br>
                <div class="note">
                  <?php
                  $req_note = $db->prepare("select AVG(note) from d_commentaires where id_tatoueur = ".$_GET["id"]);

                    foreach ($req_note as $row){
                      echo $row["AVG(note)"]."&nbsp;/&nbsp;5" ;
                       } ?>
                </div>
          </div>
          <div class="col-xs-12 col-md-4">

                <p id="informations" class="map">Map <br><?php
                $req_map = $db->prepare("select * from d_tatoueurs where id_tatoueur=".$_GET["id"]);

                  foreach ($req_map as $row){
                    echo "<br>".$row["map"] ;
                     } ?>
          </div>
        </div>

      </section>
    </div>

  <!-- AVIS -->
  <section class="avis">
     <div class="container">

       <p id="avis">Les avis de <?php
       $req_avis = $db->prepare("select tatoueur from d_tatoueurs where id_tatoueur=".$_GET["id"]);
       foreach ($req_avis as $row){
         echo $row["tatoueur"] ;
          } ?></p>

       <hr id="hr3">

       <?php $req_com = $db->prepare("select * from d_commentaires where id_tatoueur=".$_GET["id"]);
       foreach ($req_com as $row){?>

         <div class="row" style="margin-bottom: 5%;">

             <div class="col-xs-3 col-md-2">
                <img id="avatar" src="data/<?= $row['url_image'] ?>"><br>
               <p id="pseudo"><?= $row["pseudo"];?></p>
             </div>

             <div class="col-xs-12 col-md-4">
               <div class="editavis">
                 <p id="editavis"><?= $row["avis"];?></p>
               </div>
             </div>

             <div class="col-xs-12 col-md-3" style="width: 180px";>
               <div class="rectanglenote2"><p>Note &nbsp;<?= $row['note']; ?>/5</p></div>
             </div>


           </div><?php } ?>

           <hr id="hr2">

               <a href="index.php?param_url=form.php" id="pageeditcom">Partager son avis</a>

     </div>

   </section>
