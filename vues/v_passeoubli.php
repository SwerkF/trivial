<html>
  <body>
    <div class="container">
    <div id="box2">
    <br>
    <br>
      <h1>Mot de passe oublié</h1> <br>
      <?php if($_SESSION['statusmdp'] == 'envoyer') {
        echo '<div id="login">
        <form method="post" action="index?uc=auth&action=demandemdp">
          <p><strong>VOTRE MAIL</strong></p>
          <input type="text" name="mail" id="mail"></>
          <br/><br/>
          <div class="bouttonmdp">
            <input type="submit" value="Valider" name="valide"></input>
          </div>
          </form><br>
          <form method="post" action="index.php?uc=auth&action=afficher">
          <div class="bouttonmdp">
            <input type="submit" value="Retour" name="valide"></input>
          </div>
          </form>';
          if(isset($_SESSION['err'])) {
            echo "<div id='AjoutNoOk'><p>Vérifiez la saisie du mail.</p></div>";
            unset($_SESSION['err']);
          }
          
      echo '</div>
        
        </div>';
      } ?>

      <?php if($_SESSION['statusmdp'] == 'demande') {
          echo '<div id="login">
          <form method="post" action="index?uc=auth&action=afficher">
            <p><strong>DEMANDE VALIDE</strong></p>
            <p>Vérifiez vos mails pour réinitialiser le mot de passe.</p>
            <br>
            <div id="boutton">
              <input type="submit" value="Retour" name="valide"></input>
            </div>
            
        </div>
          </form>
          </div>';
      } ?>
      <?php if($_SESSION['statusmdp'] == 'saisie') {

          echo '
          <div id="login">
          <form method="post" action="index?uc=auth&action=changement">
            <p><strong>VOTRE MOT DE PASSE</strong></p>
            <input type="password" name="pass1" id="pass1"></>
            <p><strong>REPETEZ LE MOT DE PASSE</strong></p>
            <input type="password" name="pass2" id="pass2"></>
            <div id="boutton">
              <input type="submit" value="Valider" name="valide"></input>
            </div>';
            if($_SESSION['err'] == 'erreursaisie') {
              echo "<div id='AjoutNoOk'><p>Vérifiez la saisie du mot de passe.</p></div>";
              unset($_SESSION['err']);
            } 
        echo '</div>
          </form>
          </div>';
          
      } ?>
      <?php if($_SESSION['statusmdp'] == 'expired') {
        
        echo '<div id="login">
          <form method="post" action="index?uc=auth&action=afficher">
            <p><strong>LIEN EXPIRE</strong></p>
            <p>Le lien pour réinitialiser le mot de passe à expiré.</p>
            <br>
            <div id="boutton">
              <input type="submit" value="Retour" name="valide"></input>
            </div>
            
        </div>
          </form>
          </div>';
    } ?>
    <?php if($_SESSION['statusmdp'] == 'reussi') {
      echo '<div id="login">
      <form method="post" action="index?uc=auth&action=afficher">
        <p><strong>MODIFICATION APPLIQUEE</strong></p>
        <p>Votre mot de passe a été changé.</p>
        <br>
        <div id="boutton">
          <input type="submit" value="Retour" name="valide"></input>
        </div>
        
    </div>
      </form>
      </div>';
        
        
    } ?>

    
    </div>
  </div>
    
    
  </body>
</html>