<html>
  <body>
    
  <div id="container">
    <div class="salonJeu">
      
    <?php 

       if(!isset($_SESSION['connecter'])) {
               header('Location:index.php?uc=auth');
       
           } else {
             

    $LesJoueurs = $_SESSION['joueursInGame'];
    $lesQuestions2[0] = $_SESSION['question2'];
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
      <h3>Catégorie: '.$lesQuestions2[0][0][6].'<h3>
    </div>';
    echo '<p>'. $lesQuestions2[0][0][1] .'</p><br><br>';
  
    if(!isset($_SESSION['repvalid'])) {
      
     
     
      echo '<form method="post" action="index.php?uc=partie&action=verifreponse&type=0">';
      if($lesQuestions2[0][0][3] == 0) {
        if($lesQuestions2[0][0][5] != "") {
          if(substr($lesQuestions2[0][0][5],-3,3) == "mp4" || substr($lesQuestions2[0][0][5],-3,3) == "mov") {
            echo "<video width='200px'controls autoplay> <source src='res/questions/".$lesQuestions2[0][0][5]."' type='video/mp4'></video> <br>";
          } else {
            echo '<img heigt="400px" width="400px" src="res/questions/'.$lesQuestions2[0][0][5].'">';
          }
          
        }
        echo '<input type="text" name="reponse"></input><br>
        <input type="submit" name="verifreponse" value="Valider"></input>
      </form>';
      
      } else {
        echo '<form method="post" action="index.php?uc=partie&action=verifreponse"><div class="radioRep">';
        if($lesQuestions2[0][0][5] != "") {
          if(substr($lesQuestions2[0][0][5],-3,3) == "mp4" || substr($lesQuestions2[0][0][5],-3,3) == "mov") {
            echo "<video width='430px' controls autoplay> controls autoplay> <source src='res/questions/".$lesQuestions2[0][0][5]."' type='video/mp4'></video> <br>";
          } else {
            echo '<img heigt="400px" width="400px" src="res/questions/'.$lesQuestions2[0][0][5].'">';
          }
          
        }
        $rep = 0;
        echo '<div class="radioButton">';
        while ($rep < $_SESSION['reponses2']) {
           echo '<input type="radio" name="reponse" value="'.$lesQuestions2[0][0][4][$rep][1].'">'.$lesQuestions2[0][0][4][$rep][0].'</input><br>';
           $rep++;
        }
        echo '</div></div><input type="submit" name="verifreponse" value="Valider"></input>
        </form>';
      }
   $decompte++;

    } elseif(isset($_SESSION['repvalid'])) {
    if($lesQuestions2[0][0][4][0][2] != "") {
      if(substr($lesQuestions2[0][0][4][0][2],-3,3) == "mp4" || substr($lesQuestions2[0][0][4][0][2],-3,3) == "mov") {
        echo "<video width='720' height='480' controls autoplay> <source src='res/reponses/".$lesQuestions2[0][0][4][0][2]."' type='video/mp4'></video> <br>";
      } else {
        echo '<img heigt="100%" width="400px" src="res/reponses/'.$lesQuestions2[0][0][4][0][2].'">';
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
    echo "La bonne réponse était : ".$bonneRep[0][0]."<br>";
   }
   echo '<input type="submit" value="Question suivante"></input>
   </form>';
   unset($_SESSION['verifRep']);
   unset($_SESSION['repvalid']);
  }
   
    ?>
    

    </div>
  </div>
 <?php } ?>
 
  </body>
</html>