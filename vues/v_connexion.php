<html>
  <body>
    <div class="container">
      <div id="box">
        <img height="200px" src="includes/imgs/logojeu.png">
        <h1>AU JARDIN DES SOUVENIRS</h1>
        <h2>Jeu de mémoire et de questions</h2>
          <div id="login">
            <form method="post" action="index?uc=auth&action=verifconnexion">
            <input type="text" placeholder="EMAIL" name="login"></input> <br>
            <input type="password" placeholder="MOT DE PASSE" name="pass"></input> <br><br>
            <a href="index.php?uc=auth&action=mdpoublie"><p>Mot de passe oublié<p></a><br>
          </div>
          <input type="submit" value="M'IDENTIFIER" name="valide"></input>
        <div id="errorlogin">
          <?php if(isset($_SESSION['error'])) {
          echo "<p><strong>Login ou mot de passe invalide. <br>Veuillez essayer à nouveau.</strong></p>";
          unset($_SESSION['error']);
          }
          ?>
        </div>
      </form>
      </div>
    </div>
  </body>
</html>

