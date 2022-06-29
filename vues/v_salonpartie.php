<html>
  <body>
  <div id="container">
  <div id="title">
        <img height="110px" width="150px" src="includes/imgs/logojeu.png">
        <div id="title2">
          <h2>AU JARDIN DES SOUVENIRS</h2>
          <p>Jeu de mémoire et de questions</p>
        </div>
  </div>
    <div id="salonjeu">
    <?php
  if(!isset($_SESSION['connecter'])) {
          header('Location:index.php?uc=auth');
      } else {
      
        if(!isset($_SESSION['joueursInGame'])) {
            $_SESSION['joueursInGame'] = array();
            $_SESSION['joueursPotentiel'] = array();
            $cpt=0;
            foreach($lesPatients as $unPatient) {
              $_SESSION['joueursPotentiel'][$cpt] = $unPatient['idPatient'] . '-' . $unPatient['nomPatient'] . ' ' . $unPatient['prenomPatient'];
              $cpt++;
            }
            

        } ?>
        
        <h1>NOUVELLE PARTIE</h1> <br> <br>

        <form method="post" action="index.php?uc=partie&action=ajoutJoueur">
          <p>LISTE JOUEURS </p><select name="ajoutPatient" >
            <option value="0"> Choisir un patient </option>
          <?php  
            $cpt = 0;
              foreach($_SESSION['joueursPotentiel'] as $unJoueur) {
                echo '<option value="'.$unJoueur.'">'.$unJoueur. '</option>';   $cpt++;
              }
          ?>
          <input id="buttonAdd" type="submit" name="submit" value="+" />
          
        </form>
        <div id="listJoueur">
          <?php  
            $cpt = count($_SESSION['joueursInGame']);
              
            if($cpt == 0) {
              echo "La liste est vide...";
              } else {
                $i = 0; 
                while($i < $cpt) { 
                  echo ''.$_SESSION['joueursInGame'][$i][1].'<br>'; $i = $i + 1; 
                } 
              }
          ?>
        </div>
              
        <form method="post" action="index.php?uc=partie&action=resetliste">
          <div id="clearList">
            <input type="submit" name="submit" value="Vider la liste" />
          </div>
        </form>
        </select><br>
        <form method="post" action="index.php?uc=partie&action=debut">
          <p> NOMBRE DE QUESTIONS</p>
          <select name="nbrquestions">
            <option value="1"> 1 </option>
            <option value="2"> 2 </option>
            <option value="3"> 3 </option>
            <option value="4"> 4 </option>
            <option value="5"> 5 </option>
            <option value="6"> 6 </option>
            <option value="7"> 7 </option>
            <option value="8"> 8 </option>
            <option value="9"> 9 </option>
            <option value="10"> 10 </option>
          </select><br>
          <div id="buttonStart">
            <input type="submit" name="submit" value="DEBUTER LA PARTIE"></input>
          </div>
        </form>
        <?php 
          if(isset($_SESSION['err'])) {
            echo "<div id='AjoutNoOk'><p>Vérifiez que avez choisi au moins 1 joueur.</p></div>";
            unset($_SESSION['err']);
          }
        ?>

    </div>
  </div>
<?php } ?>
  </body>
</html>