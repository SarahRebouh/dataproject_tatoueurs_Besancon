<main>

    <section class="redirectionenvoiavis">
      <div class="container">

            <div class="row">
              <div class="col-md-12 col-xs-12">

                    <a id="sharetattoo" href="index.php?param_url=form.php">Partagez votre tattoo !</a>

                </div>
            </div>
        </div>
            </section>

            <section class="selectphoto">
              <div class="container">
                <div class="row">

                  <div class="col-xs-12 col-md-12">
                  <p id="salon">Triez les photos par salon</p>
                    <FORM  id="salonlist" method="POST" action="index.php?param_url=galerie.php">
                      <SELECT name="nom" id="select1" size="1">


                          <option>...</option>
                          <?php $db=new Database;
                            $req_tri = $db->prepare("SELECT * FROM d_tatoueurs");

                              foreach ($req_tri as $row){
                                echo "<option value='".$row["id_tatoueur"]."'>".$row['tatoueur']."</option>";
                            } ?>

                      </SELECT>
                      <button type="submit">Sélectionner</button>
                      <a style="color:white;float:right;" href="index.php?param_url=galerie.php">Afficher toutes les photos</a>
                    </FORM>
                  </div>

                  </section>

                  <section class="listphoto">

                    <div class="container">

                      <div class="row">

                            <div id="" class="col-xs-12 col-md-12" style="font-family: 'Roboto Condensed', sans-serif;">

                                <?php

                                if (isset($_POST["nom"])){
                                $req_images = $db->prepare("select * from d_commentaires where id_tatoueur=".$_POST['nom']);
                                }
                                else {
                                $req_images = $db->prepare("select * from d_commentaires");
                                }

                                foreach ($req_images as $row){ ?>

                                    <div style="display:inline-block; margin-bottom:4%;">
                                        <?= "<p style='font-weight:bold; font-size:190%;margin-bottom: 0px; text-align:center;margin-top:4%;'>".$row["pseudo"]."<br></p>";?>
                                        <?= "<p style='color:#ba2713; font-weight: bold;text-align:center;'>".$row["tatoueur"]."<br></p>";?>
                                        <?= "<img style='width:367px;height:367px;' id='' src='data/".$row["url_image"]."'<br><br>" ;?>
                                    </div>

                                <?php } ?>

                            </div>
                        </div>
                      </div>

</main>
