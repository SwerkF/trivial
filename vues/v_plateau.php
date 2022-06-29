<html>
    <head>
        <script type="text/javascript">
            $(document).ready(function () {
                players = JSON.parse(localStorage.getItem("players"))

                for(var i = 0; i < players.length; i++) {
                $('#p'+players[i][1]).append(players[i][0])
                }
            });
        </script>
    </head>
<body>
<br><br><br>
<div class="container2">



<div class="jeu">

   <div class="left">

   
    <div class="de">
        
    <div id="title2">
        <img height="110px" width="150px" src="includes/imgs/logojeu.png">
          <h2>AU JARDIN DES SOUVENIRS</h2>
          <p>Jeu de mémoire et de questions</p>
          <br>
          <br>
       
    </div>
        <div id="dice">
        </div>
        <button onclick="rollDie()" id="roll" class="popup1_open">Lancer le dé</button>
    
    </div>
    </div>
    <div class="plateau">
        <div class="containerHaut">
            <div id="0" class="first"><p id="p0"></p></div>
            <?php
                for($i=1;$i<10;$i++) {
                    if($i == 5) {
                ?>
                        <div id="5" class="third"><p id="p5"></p></div>
                
                <?php
                    } else {
                ?>
                        <div id="<?php echo($i); ?>" class="second"><p id="p<?php echo($i); ?>"></p></div>
                 <?php
            }
        }
        ?>
        <div id="10" style="padding-bottom:30px;" class="first"><p id="p10"></p></div>
    </div>
    
    <div class="containerCote">
        <?php
            for($i=1;$i<10;$i++) {
                if($i == 5) {
                    ?>
                    <div class="cote">
                        <div id="35" class="thirdCote"><p id="p35"></p></div>
                        <div class="carreBlanco">
                             
                        </div>
                        <div id="15" class="thirdCote"><p id="p15"></p></div>
                    </div>
                    <?php
                }
                else if($i == 2) { ?>
                <div class="cote">
                    <div id="<?php echo(($i-40)*-1); ?>" class="secondCote"><p id="p<?php echo(($i-40)*-1); ?>"></p>
                    </div>
                        <div class="carreBlanco">
                        </div>
                            <div id="<?php echo($i+10); ?>" class="secondCote"><p id="p<?php echo($i+10); ?>"></p>
                            </div>
                </div> 
                    <div class="joueur">
                                <div class="pion">
                                    <?php echo "<p>".$_SESSION["joueursInGame"][$_SESSION['numJoueur']][4]."</p>"; ?>
                                    <?php echo "<h2>JOUEUR ACTIF</h2>"; ?>
                                    <?php echo "<h1>".$_SESSION["joueursInGame"][$_SESSION['numJoueur']][1]."</h1>"; ?>
                                    <br>
                                    <?php echo "<h3>Score actuel: ".$_SESSION["joueursInGame"][$_SESSION['numJoueur']][2]."</h3>"; ?>
                                </div>
                            </div> 
                <?php }
                else if($i == 1) {
                    ?>
                <div class="cote">
                    <div id="<?php echo(($i-40)*-1); ?>" class="secondCoteFirst"><p id="p<?php echo(($i-40)*-1); ?>"></p>
                    </div>
                        <div class="carreBlanco">
                        </div>
                            <div id="<?php echo($i+10); ?>" class="secondCoteFirst"><p id="p<?php echo($i+10); ?>"></p>
                            </div>
                </div> 
                
                <?php 
                } else if($i == 9) {
                    ?>
                    <div class="cote">
                        <div id="<?php echo(($i-40)*-1); ?>" class="secondCoteSecond"><p id="p<?php echo(($i-40)*-1); ?>"></p>
                        </div>
                            <div class="carreBlanco">
                            </div>
                                <div id="<?php echo($i+10); ?>" class="secondCoteSecond"><p id="p<?php echo($i+10); ?>"></p>
                                </div>
                    </div> 
                    
                    <?php 
                } else {
                ?>
                
                <div class="cote">
                        <div id="<?php echo(($i-40)*-1); ?>" class="secondCote"><p id="p<?php echo(($i-40)*-1); ?>"></p></div>
                        <div class="carreBlanco"></div>
                        <div id="<?php echo($i+10); ?>" class="secondCote"><p id="p<?php echo($i+10); ?>"></p></div>
                </div>  
                <?php
                }
            }
        ?>
    </div>
    <div class="containerBas">
        <div id="30" class="first"><p id="p30"></p></div>
            <?php
                for($i=21;$i<30;$i++) {
                    if($i == 25) {
                        ?>
                        <div id="25" class="third"><p id="p25"></p></div>
                        <?php
                    }
                    else {
                    ?>
                    <div id="<?php echo(30-$i+20); ?>" class="second"><p id="p<?php echo(30-$i+20); ?>"></p></div>
                    <?php
                    }
                }
            ?>
        <div id="20" class="first"><p id="p20"></p></div>
    </div>
</div>

</div>
</div>
  </body>
</html>