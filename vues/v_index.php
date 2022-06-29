<html>
  <body>
    <?php 
        if(!isset($_SESSION['connecter'])) {
          header('Location:index.php?uc=auth');
  
      } else {
        ?>
    <div id="container">
      <div id="boxaccueil">
        <img height="280px" src="includes/imgs/logojeu.png">
        
        <h1>AU JARDIN DES SOUVENIRS</h1>
        <h2>Jeu de mémoire et de questions</h2>
      
        <form method="post" action="index.php?uc=partie&action=newgame">
        <input type="submit" value="Nouvelle partie"></input>
        </form>
      </div>
    </div>
    <?php } ?>
  </body>
</html>