<html>
    <head>  
        <?php include("includes/side.php"); ?> 
    </head>
    <body>
        <div class="page">
            
        <h1> LES JOUEURS </h1>
            <div class="table">
                <div class="listejoueur">
                    <?php 
                        for($i=0; $i < count($lesPatients); $i++) {
                            echo '
                            <div class="unjoueur">
                                <p>' . $lesPatients[$i][1].' '.$lesPatients[$i][2] . '</p>
                                <form method="POST" action="index.php?uc=gestion&action=modifierPatient&patient='.$lesPatients[$i][0].'">
                                <div class="addremove">
                                    <div class="add">
                                        <input type="submit" name="modifier" value="Modifier"> 
                                    </div>
                                </form>
                                <form method="POST" action="index.php?uc=gestion&action=supprPatient&patient='.$lesPatients[$i][0].'">
                                    <div class="remove">
                                        <input type="submit" name="supprimer" value="Supprimer">
                                    </div>
                                </div>
                                </form>
                            </div>';
                                                    
                        }
                    ?>
                </div>
                <div class="separator"><p>  </p></div>
                <?php if(!isset($_SESSION['modification'])) { ?>
                    <div class="form">
                    <form  method="POST" action="index.php?uc=gestion&action=ajoutPatient">
                    <h1> Ajouter un joueur </h1>
                    <div class="inputs">
                        <input type="text" name="prenom" placeholder="Prenom">
                        <input type="text" name="nom" placeholder="Nom">
                        <input type="text" name="age" placeholder="Age">
                        <input type="text" name="infos" placeholder="Infos complémentaire">
                        <input type="submit" name="submit" value="Envoyer">
                    </form>
                    </div>
                </div>
               <?php } else { 
                echo '<div class="form">';
                echo "<form method='POST' action='index.php?uc=gestion&action=savePatient&joueur=".$lePatient[0]."' >"; ?>
                    <h1> Modifier un joueur </h1>
                    <div class="inputs">
                    <?php
                        echo '<input type="text" name="prenom" placeholder="Prenom" value="'.$lePatient[2].'">
                        <input type="text" name="nom" placeholder="Nom" value="'.$lePatient[1].'">
                        <input type="text" name="age" placeholder="Age" value="'.$lePatient[3].'">
                        <input type="text" name="infos" placeholder="Infos complémentaire" value="'.$lePatient[4].'">
                        <input type="submit" name="submit" value="Valider">
                        </form>
                        </div></div>';
               } ?>
                
            </div>
           



        </div>
        
    </body>
</html>