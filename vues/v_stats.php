<html>
    <head>  
        <?php include("includes/side.php"); ?> 
    </head>
    <body>
        <div class="page">
        <h1> STATISTIQUES </h1>
            <div class="table">
                
                <div class="listejoueur">
                    <?php 
                        for($i=0; $i < count($partiesfini); $i++) {
                            echo '
                            <div class="unjoueur">
                                <p> Partie du ' . $partiesfini[$i][5].'</p>
                                <form method="POST" action="index.php?uc=partie&action=voirpartie&partie='.$partiesfini[$i][0].'">
                                <div class="addremove">
                                    <div class="add">
                                        <input type="submit" name="modifier" value="Voir"> 
                                    </div>
                                </form>
                                </div>
                                </form>
                            </div>';
                                                    
                        }
                    ?>
                </div> 
                <?php if(isset($_SESSION['voir'])) { 
                echo '<div class="boxstats">
                        <h1>Partie du '.$parties[0][3].'</h1>
                        <h1>Participants:</h1>
                            <div class="listeScore">';
                    
                            $x = 1; 
                            $y = 0;
                            while($y < count($parties[0][1])) { 
                                echo '<div class="scoreJoueur"> <div class="nomJoueur"><p>'. $parties[0][1][$y][1] . '</p></div> <div class="score"><p>&nbsp; '. $parties[0][1][$y][0].'/'.$parties[0][2].'</p></div></div>';
                            $y++;
                            $x++;
                            }
                    
                    echo'</div>
                    </div>';
                } ?>
                
            </div>
        </div>
        
    </body>
</html>