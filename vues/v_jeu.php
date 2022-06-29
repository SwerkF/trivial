<html>
  <body>
    
  <div id="container">
    <div class="salonJeu">
      
    <?php 

       if(!isset($_SESSION['connecter'])) {
               header('Location:index.php?uc=auth');
       
           } else {
             

    $LesJoueurs = $_SESSION['joueursInGame'];
    $lesQuestions = $_SESSION['question'];
    $decompte = $_SESSION['decompte'];
    $j = $_SESSION['numJoueur'];
    $_SESSION['leJoueur'] = $LesJoueurs[$j];
    ?> 
    <div class="gauche"> 
      <div id="title2">
        <img height="110px" width="150px" src="includes/imgs/logojeu.png">
        <h2>AU JARDIN DES SOUVENIRS</h2>
        <p>Jeu de mémoire et de questions</p>
        <br>
        <br>
   
      </div>
<?php
      echo '
      <div class="qstPour">
        <h2>Question pour</h2>
        <h1>'. $LesJoueurs[$j][1] .'</h1>
      </div>
    </div>';

    ?> 
    <div class="droite"> 
      <?php
    echo '
    <div class="headerQ">
      <h2>Quesiton N°'. ($decompte + 1) .'</h2>
      <h3>Catégorie: '.$lesQuestions[$decompte][6].'<h3>
    </div>



    
    <h1>'. $lesQuestions[$decompte][1] .'</h1>';
    if(!isset($_SESSION['repvalid'])) {
      
      
      echo '<form method="post" action="index.php?uc=partie&action=verifreponse&type=0">';
      if($lesQuestions[$decompte][3] == 0) {

        if($lesQuestions[$decompte][5] != "") {
          if(substr($lesQuestions[$decompte][5],-3,3) == "mp4" || substr($lesQuestions[$decompte][5],-3,3) == "mov") {
            echo "<video width='430' controls autoplay> <source src='res/questions/".$lesQuestions[$decompte][5]."' type='video/".substr($lesQuestions[$decompte][5],-3,3)."'></video> <br>";
          } else {
            echo '<img heigth="400px" width="400px" src="res/questions/'.$lesQuestions[$decompte][5].'"><br>';
          }
        }
        echo '<input type="text" name="reponse"></input><br>
        <input type="submit" name="verifreponse" value="Valider"></input>
      </form>';
      
      } else {
        echo '
        <form method="post" action="index.php?uc=partie&action=verifreponse"><div class="radioRep">';
        
        if($lesQuestions[$decompte][5] != "") {
          if(substr($lesQuestions[$decompte][5],-3,3) == "mp4" || substr($lesQuestions[$decompte][5],-3,3) == "mov") {
            echo "<video width='430' controls autoplay> <source src='res/questions/".$lesQuestions[$decompte][5]."' type='video/".substr($lesQuestions[$decompte][5],-3,3)."'></video> <br>";
          } else {
            echo '<img heigth="400px" width="400px" src="res/questions/'.$lesQuestions[$decompte][5].'"><br>';
          }
         
        }
        
        $rep = 0;
        echo '<div class="radioButton">';

        while ($rep < $_SESSION['reponses'][$decompte]) {
           echo '<input type="radio" name="reponse" value="'.$lesQuestions[$decompte][4][$rep][1].'">'.$lesQuestions[$decompte][4][$rep][0].'</input><br>';
           $rep++;
        }
        if(!isset($_SESSION['repvalid'])) {
          echo '</div></div><input type="submit" name="verifreponse" value="Valider"></input>';
        
        }
        echo '</form>';
      }
    } else {
      if(isset($_SESSION['repvalid'])) {
        if($lesQuestions[$decompte][4][0][2] != "") {
          if(substr($lesQuestions[$decompte][4][0][2],-3,3) == "mp4" || substr($lesQuestions[$decompte][4][0][2],-3,3) == "mov" ) {
            echo "<video width='430' controls autoplay> <source src='res/reponses/".$lesQuestions[$decompte][4][0][2]."' type='video/mp4'></video> <br>";
          } else {
            echo '<img heigt="400px" width="400px" src="res/reponses/'.$lesQuestions[$decompte][4][0][2].'">';
            echo '<br>';
          }
          
        }
        $decompte++;
      ?>
      <form method="post" action="index.php?uc=partie&action=suite">
      <?php
      if(isset($_SESSION['verifRep'])) {
        if($_SESSION['verifRep'] == true) {
          
          echo "<p class='true'>BONNE REPONSE !</p><br>";
        } else {
          echo "<p class='false'>MAUVAISE REPONSE !</p>.<br>";
        }
        echo "<p class='awnser'>La bonne réponse était : ".$bonneRep[0][0]."</p><br>";
       }
       echo '<input type="submit" value="Question suivante"></input>
       </form>';
       unset($_SESSION['verifRep']);
       unset($_SESSION['repvalid']);
      }
    }
      
   

   
   
    ?>
  
  </div>
    </div>
  </div>
 <?php } ?>
 
  </body>
</html>