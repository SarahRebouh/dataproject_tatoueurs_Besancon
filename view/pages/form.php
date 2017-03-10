<?php include 'controller/php/verif_form.php' ?>
<main>
  <div class="form">
    <div class="container">

      <div class="row">
        <div class="col-md-12 col-xs-12">

          <h2>Envoyez votre <span class="photo">photo</span> dans notre galerie !</h2>

               <h2 class="hh2">Partagez votre <span class="photo">avis</span>!</h2>

             </div>
            </div>

           <form class="" action="index.php?param_url=form.php" method="post">
              <div class="row">
                <div class="col-md-4 col-xs-12">

                 <h3 class="seltat">Sélectionnez votre tattoo </h3>

               <div class="input-file-container">
                  <input name="Photo" class="input-file" id="maPhoto" type="file">
                  <label for="my-file" class="input-file-trigger" tabindex="0">Sélectionnez un fichier</label>
                </div><p class="err"><?php echo $_SESSION["err_fichier"];?></p>
                <p class="file-return"></p>

               <h3 class="seltend">Sélectionnez votre salon</h3>
                <select class="form_salon" name="select_salon">

                 <option value="">Nom du salon</option>
                  <option value="1">La Main Noire</option>
                  <option value="2">Lady Mil Tattoo</option>
                  <option value="3">Bruno tatouage</option>
                  <option value="4">Le Ghys TattooShop</option>
                  <option value="5">Dynam'ink tattoo</option>
                  <option value="6">KZN tattoo</option>
                  <option value="7">Skizopsycho Tattoo</option>
                  <option value="8">Mana Maori art tatau</option>
                  <option value="9">Liberty Tattoo</option>
                  <option value="10">Outlaw Tatoo</option>
                  <option value="11">Tony's Tattoo Ink</option>
                  <option value="12">Kevin Hinger - Steel Asylum</option>
                  <option value="13">Sinners Tattoo / Merlin Piercing </option>
                  <option value="14">La galerie des martyrs</option>
                  <option value="15">L'encrophile</option>

               </select><p class="err"><?php echo $_SESSION["err_select_salon"];?></p>

                   <h3 class="nottat">Notez votre tatoueur</h3>
                        <select class="notes" name="noteDuSalon">

                         <option value="">Note du tatoueur</option>
                          <option value="0">0/5</option>
                          <option value="1">1/5</option>
                          <option value="2">2/5</option>
                          <option value="3">3/5</option>
                          <option value="4">4/5</option>
                          <option value="5">5/5</option>

                       </select><p class="err"><?php echo $_SESSION["err_noteDuSalon"];?></p>

                       <h3 class="pseu" style="margin-left: 0px;">Choisissez un pseudo</h3>
                        <div class="pseudo" style="margin-left:30px;">
                          <input type="text" name="pseudo" placeholder="pseudo">
                          <p id="errpseu" class="err" style="margin-left: 0px;width: 175px;"><?php echo $_SESSION["err_pseudo"];?></p>
                        </div>
                </div>

               <div class="col-md-7 col-xs-12">
                  <h3 class="aviex">Donnez votre avis sur ce salon :</h3>
                  <div class="comm">
                    <input type="textarea" name="avis" placeholder="donnez votre avis">
                    <p id="errtext" class="err">Veuillez rédiger un texte entre 140 et 500 carractères. <?php echo $_SESSION["err_avis"];?></p>
                  </div>



               </div>
              </div>

               <button type="submit" name="button" value="submit">Envoyer</button>

           </form>

    </div>
  </div>
</main>
