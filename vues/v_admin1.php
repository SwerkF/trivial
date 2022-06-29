<html>
  <body>
  <?php 
    if(!isset($_SESSION['connecter'])) {
        header('Location:index.php?uc=auth');

    } else {
      
      ?>
    <div class="container">
      
     
      <div id="box1Admin">
        <br>
        <br>
        
        <h1>Ajout patient</h1> <br>
        <div id="patientAjt">
          <form method="post" action="index?uc=gestion&action=ajoutPatient">
            <p><strong>NOM</strong></p>
            <input type="text" name="nom"></input> <br><br>
            <p><strong>PRENOM</strong></p>
            <input type="text" name="prenom"></input> <br><br>
            <p><strong>MAIL</strong></p><div id="optionnel"><p>(optionnel)</p></div>
            <input type="text" name="mail"></input> <br><br>
            <div id="boutton">
              <input type="submit" value="Ajouter" name="ajouter"></input>
            </div>
            <?php 
            if(isset($_SESSION["ajout?"])) {
              if($_SESSION["ajout?"] == true) {
                echo "<div id='AjoutOk'><p>Ajout du patient réussi.</p></div>";
                unset($_SESSION["ajout?"]);
              } else {
                echo "<div id='AjoutNoOk'><p>Ajout impossible. <br>Vérifiez la saisie</p></div>";
                unset($_SESSION["ajout?"]);
              }
            }
              ?>
          </form>
        </div>
      </div>
      <div id="box2Admin">
      <br>
      <br>
      <h1>Suppression patient</h1> <br>
      <div id="patientSuppr">
        <p><strong>PATIENT</strong></p>
        <form method="post" action="index?uc=gestion&action=supprPatient">
          <select name="idPatientSuppr">
            <option value="0">--- CHOISIR UN PATIENT ---</option>
            <?php 
            foreach($lesPatients as $unPatient) {
                echo '<option value="'.$unPatient['idPatient'].'">'.$unPatient['nomPatient'].' '.$unPatient['prenomPatient'] . '</option>';
            }
            ?>
          </select> <br>
          <div id="boutton">
            <input type="submit" value="Supprimer" name="valide"></input>
          </div>
        </div>
        <?php 
            if(isset($_SESSION["supprPatient"])) {
              if($_SESSION["supprPatient"] == true) {
                echo "<div id='AjoutOk'><p>Suppression du patient reussi.</p></div>";
                unset($_SESSION["supprPatient"]);
              } else {
                echo "<div id='AjoutNoOk'><p>Une erreur est survenue.</p></div>";
                unset($_SESSION["supprPatient"]);
              }
            }
              ?>
        </form>
      </div>
      <div id="box3Admin">
      <br>
      <br>
      <h1>Ajout question</h1> <br>
      <div id="patientSuppr">
      <form method="post" action="index?uc=gestion&action=ajoutQuestion" enctype="multipart/form-data">
          <p><strong>QUESTION</strong></p>
            <input type="text" name="question"></input> <br><br>
            <p><strong>REPONSE 1</strong></p> <div id="optionnel"><p>(Si qu'une seule réponse, remplir seulement la premiere case.)</div></p>
            <input type="text" name="reponse1"><input type="radio" name="verif" value="1"></input></input> <br><br>
            <p><strong>REPONSE 2</strong></p>
            <input type="text" name="reponse2"><input type="radio" name="verif" value="2"></input></input> <br><br>
            <p><strong>REPONSE 3</strong></p>
            <input type="text" name="reponse3"></input><input type="radio" name="verif" value="3"></input> <br><br> 
            <p><strong>REPONSE 4</strong></p>
            <input type="text" name="reponse4"><input type="radio" name="verif" value="4"></input></input> <br><br>
            <p><strong>FICHIER REPONSE</strong><br><div id="optionnel"><p>(optionnel)</div></p><br>
            <div id="pushFile">

            <label for="filer" class="label-file"><i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp;&nbsp;&nbsp;Choisir un fichier</label>
            <input name="filer" id="filer" class="input-file" type="file"></input>

            </div><br>
            <p><strong>QUESTION LIEE A</strong></p>
            <select name="idPatientQuestion">
              <option value="0">Aucun patient</option>
              <?php 
              foreach($lesPatients as $unPatient) {
                echo '<option value="'.$unPatient['idPatient'].'">'.$unPatient['nomPatient'].' '.$unPatient['prenomPatient'] . '</option>';
              }
              ?>
            </select> <br>
            <p><strong>CATEGORIE</strong></p>
            <select name="lierCategorie">
              <option value="0">--- CHOIX CATEGORIE ---</option>
              <?php foreach($lesCategories as $uneCategorie) { echo '<option value="'.$uneCategorie['idCategorie'].'">'.$uneCategorie['libelleCategorie'].'</option>'; } ?>
            </select> <br><br>
            <p><strong>FICHIER QUESTION</strong><br><div id="optionnel"><p>(optionnel)</div></p><br>
            <div id="pushFile">
            <label for="fileq" class="label-file"><i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp;&nbsp;&nbsp;Choisir un fichier</label>
            <input name="fileq" id="fileq" class="input-file" type="file"></input>
            </div>
          <div id="boutton">
            <input type="submit" value="Ajouter" name="submit"></input>
          </div>
        </div>
        <?php 
            if(isset($_SESSION["ajtQ"])) {
              if($_SESSION["ajtQ"] == true) {
                echo "<div id='AjoutOk'><p>Ajout de la question réussi.</p></div>";
                unset($_SESSION["ajtQ"]);
              } else {
                echo "<div id='AjoutNoOk'><p>Ajout impossible. <br>Vérifiez la saisie</p></div>";
                unset($_SESSION["ajtQ"]);
              }
            }
        ?>
      </form>
      </div>
      
      <?php
        if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN'] == true) {
?> 
          <form method="post" action="index.php?uc=gestion&action=enregistrer" enctype="multipart/form-data"> 
          <div id="box4Admin">
            <br>
            <br>
            <h1>PERSONNALISATION DU SITE</h1>
            <br>
            <div id="patientAjt"><p><strong>Couleur du site</strong></p></div>
            <div id="selectmenu"><select name="selectcouleur" id="selectcouleur">  
            <option value="0">---Choix couleur---</option>
            <option style="color:#ff3300" value="#ff3300">Rouge</option>
            <option style="color:#ff9900" value="#ff9900">Orange</option>
            <option style="color:#ffff00" value="#ffff00">Jaune</option>
            <option style="color:#66ff33" value="#66ff33">Vert clair</option>
            <option style="color:#009933" value="#009933">Vert foncé</option>
            <option style="color:#33ccff" value="#33ccff">Bleu clair</option>
            <option style="color:#3366ff" value="#3366ff">Bleu</option>
            <option style="color:#6600ff" value="#6600ff">Violet</option>
            <option style="color:#ff00ff" value="#ff00ff">Rose</option>
            <option value="#f2f2f2">Blanc</option>
            </select>

            </div><br><br>
            <div id="patientAjt"><p><strong>Nom du site</strong></p></div>
            <input type="text" name="nom"></input>
            <br>
            <br>
            <h1><strong>LOGO</strong></h1><br>
            <div id="pushFile">
            <label for="filelogo" class="label-file"><i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp;&nbsp;&nbsp;Choisir un fichier</label>
            <input name="filelogo" id="filelogo" class="input-file" type="file"></input>
            </div>
            <div id="boutton">
            <input type="submit" name="submit" value="Enregistrer">
            </div>
        </form>
       <?php if(isset($_SESSION['err'])) {
         echo "<div id='AjoutNoOk'><p>Mise à jour impossible. <br>Vérifiez la saisie</p></div>";
         unset($_SESSION["err"]);
       }
       } ?>
      
    </div>

    <?php } ?>
    
    
    
  </body>
</html>