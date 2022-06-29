<html>
  <body>
  <div id="container">
      <div id="historique">

      <?php 
      if(!isset($_SESSION['connecter'])) {
        header('Location:index.php?uc=auth');

    } else {

      
    
      $i = 0;
      ?>
<div id="historique">


      <tr>
      <th colspan="2"></th>
      </tr>
        <tr>

      <?php
      while($i < count($partiesfini)) { 
        echo '
        <table>
        <thead>
        <tr>
          <th colspan="3">Partie numéro: '.$parties[$i][0].' ('.$parties[$i][2].' questions par personne)</th>
        </tr>
          <th>Joueur n°</th>
          <th>Nom</th>
          <th>Score</th>
        </tr>
        </thead>
        <tbody>';
        $x = 1; 
        $y = 0;
        while($y < count($parties[$i][1])) { 
          echo '<tr> <td>'. $x .' </td> <td>'. $parties[$i][1][$y][1] . '</td> <td>'. $parties[$i][1][$y][0].'</td> ';
          $y++;
          $x++;
        }
        echo '
        </tbody>
        </table>
        <br>';
        $i++;
        }
        
        
      

      ?>
</div>
      </div>
  </div>
<?php } ?>
  </body>
</html>