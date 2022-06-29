<html>
  <body>
    <?php
  if(!isset($_SESSION['connecter'])) {
          header('Location:index.php?uc=auth');
  
      } else {
        ?>
  <div id="container">
    <div id="descriptionJeu">
        <h1>TRIVIAL</h1>
        <form method="post" action="index.php?uc=partie&action=newgame">
        <div id="boutton2"><input type="submit" value="Nouvelle partie"></input></div>
        </form>
        <form method="post" action="index.php?uc=partie&action=historique">
          <div id="boutton2"><input type="submit" value="Historique"></input></div>
        </form>
        <br>
        <h2>But du jeu</h2>
          <p>Le but du jeu est de répondre au question afin d'aider les personnes atteintes de maladie d'Alzheimer.</p>
        <h2>Règles</h2>
          <p>Chaque patient devra répondre à la question qui lui est posée. Chaque bonne réponse lui vaudra un point. Les questions sont divisé en plusieurs catégoires (Histoire-Géo, Sciences, Loisirs) et des questions "personnelles" existent aussi. Ces questions personnelles sont déstiné à un seul patient en particulier."
          <p>Si vous rencontrez un bug, vous pouvez cliquer sur le bouton "Contact" afin de nous le signaler</p>
        <br>
        <br>
    </div>
        <div id="reprendre">
        <?php 
          if(count($lesGames) > 0) {
            
            echo "<h2>Vous n'avez pas terminé certaines parties :<h2>";
            $cpt = 0;
  
            while($cpt < count($lesGames)) {
              $unserGame[$cpt] = unserialize($lesGames[$cpt][4]);
              $x = 0;
              $players = "";
              while($x < count($unserGame[$cpt])) {
                $players .= $unserGame[$cpt][$x][1];
                $players .= ', ';
                $x++;
              }
              echo '<p>Partie numero '.$lesGames[$cpt][0].' avec le(s) joueur(s) : '. $players .'<a href="index.php?uc=partie&action=reprendre&partieId='.$lesGames[$cpt][0].'">cliquez ici pour continuer.<a><br><p>';
              $cpt++;
            }

          }
          ?>
        
        </div>
  </div>

    <?php } ?>
  </body>
</html>