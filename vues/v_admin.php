<html>
    <head>  
        <?php include("includes/side.php"); ?> 
    </head>
    <body>
        <div class="page">
            
        <h1> TOUS LES ADMINISTRATEURS </h1>
            <div class="table">
                <div class="listejoueur">
                    <?php 
                        for($i=0; $i < count($lesAdmins); $i++) {
                            echo '
                            <div class="unjoueur">
                                <p>' . $lesAdmins[$i][1].' '.$lesAdmins[$i][2] . '</p>
                                <form method="POST" action="index.php?uc=gestion&action=modifierAdmin&admin='.$lesAdmins[$i][0].'">
                                <div class="addremove">
                                    <div class="add">
                                        <input type="submit" name="modifier" value="Modifier"> 
                                    </div>
                                </form>
                                <form method="POST" action="index.php?uc=gestion&action=supprAdmin&admin='.$lesAdmins[$i][0].'">
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
                    <form  method="POST" action="index.php?uc=gestion&action=ajoutAdmin">
                    <h1> Ajouter un admin </h1>
                    <div class="inputs">
                        <input type="text" name="prenom" placeholder="Prenom">
                        <input type="text" name="nom" placeholder="Nom">
                        <input type="text" name="mail" placeholder="Mail">
                        <input type="text" name="login" placeholder="Login">
                        <input type="password" name="mdp" placeholder="Mot de passe">
                        <input type="submit" name="submit" value="Envoyer">
                    </form>
                    </div>
                </div>
               <?php } else { 
                echo '<div class="form">';
                echo "<form method='POST' action='index.php?uc=gestion&action=saveAdmin&admin=".$unAdmin[0]."' >"; ?>
                    <h1> Modifier un admin </h1>
                    <div class="inputs">
                    <?php
                        echo '<input type="text" name="prenom" placeholder="Prenom" value="'.$unAdmin[2].'">
                        <input type="text" name="nom" placeholder="Nom" value="'.$unAdmin[1].'">
                        <input type="text" name="mail" placeholder="Mail" value="'.$unAdmin[3].'">
                        <input type="text" name="login" placeholder="Login" value="'.$unAdmin[4].'">
                        <input type="password" name="mdp" placeholder="Mot de passe">
                        <input type="submit" name="submit" value="Valider">
                        </form>
                        </div></div>';
               } ?>
                
            </div>
           



        </div>
        
    </body>
</html>