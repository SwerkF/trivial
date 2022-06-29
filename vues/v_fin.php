<html>
  <body>
  <div id="container">
    <div id="salonJeu">
      
    <?php 

if(!isset($_SESSION['connecter'])) {
  header('Location:index.php?uc=auth');

} else {

    $LesJoueurs = $_SESSION['joueursInGame'];
    $j = count($_SESSION["joueursInGame"]);
    $i = 0;

    echo '<h1>Fin de jeu!</h1>

    <tr>
        <th><strong>Joueur</strong></th>
        <th><strong>Score</strong></th>
    </tr>
    <br>
    <tr>';
        while($i < count($_SESSION["joueursInGame"])) {
            echo '<td>'.$_SESSION['joueursInGame'][$i][1].'</td>
            <td>'.$_SESSION['joueursInGame'][$i][2].'</td><br>';
            $i++;
        
        }
    echo '</tr>';
    ?>
    <form method="post" action="index.php?uc=partie&action=afficher">
    <input type="submit" value="Retour">
    </form>
      </div>
  </div>
<?php } ?>
  </body>
</html>