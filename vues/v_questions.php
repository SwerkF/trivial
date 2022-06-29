<html>
    <head>  
        <?php include("includes/side.php"); ?> 
    </head>
    <body>
        <div class="page">
        <h1> LES QUESTIONS </h1>
            <div class="table">
                <div class="listejoueur">
                    <?php 
                        for($i=0; $i < count($lesQuestions); $i++) { 
                            $num = $i + 1;
                            echo '
                            <div class="unjoueur">
                                <p> Question n°' . $num .'</p>
                                <form method="POST" action="index.php?uc=gestion&action=modifierQuestion&num='.$lesQuestions[$i][0].'">
                                <div class="addremove">
                                    <div class="add">
                                        <input type="submit" name="modifier" value="Modifier"> 
                                    </div>
                                </form>
                                <form method="POST" action="index.php?uc=gestion&action=supprQuestion&num='.$lesQuestions[$i][0].'">
                                    <div class="remove">
                                        <input type="submit" name="supprimer" value="Supprimer">
                                    </div>
                                </div>
                                </form>
                            </div>';
                                                    
                        }
                    ?>
                </div>
                <div class="separator2"><p>  </p></div>
                <?php if(!isset($_SESSION['modification'])) { ?>
                <div class="form">
                    <form method="POST" enctype="multipart/form-data" action="index.php?uc=gestion&action=ajoutQuestion">
                    <h1> Ajouter une question </h1>
                    <div class="inputs">
                        <input type="text" name="question" placeholder="Question"></input> <br>
                        <p><strong>Réponses: </strong>Si qu'une seule réponse possible, veuillez ne <br>remplir qu'un choix de réponse et cocher <br> la réponse.</p>
                        <div class="reponses">
                            <div class="radio">
                                <input type="radio" name="verif" value="1">
                            </div>
                            <div class="text">
                                <input type="text" name="reponse1" placeholder="Réponse 1">
                            </div>
                        </div>
                        <div class="reponses">
                            <div class="radio">
                                <input type="radio" name="verif" value="2">
                            </div>
                            <div class="text">
                                <input type="text" name="reponse2" placeholder="Réponse 2">
                            </div>
                        </div>
                        <div class="reponses">
                            <div class="radio">
                                <input type="radio" name="verif" value="3">
                            </div>
                            <div class="text">
                                <input type="text" name="reponse3" placeholder="Réponse 3">
                            </div>
                        </div>
                        <div class="reponses">
                            <div class="radio">
                                <input type="radio" name="verif" value="4">
                            </div>
                            <div class="text">
                                <input type="text" name="reponse4" placeholder="Réponse 4">
                            </div>
                        </div>
                        <div class="select">
                            <select name="lierCategorie">
                            <option value="0">Catégorie liée</option>
                            <?php foreach($lesCategories as $uneCategorie) { echo '<option value="'.$uneCategorie['idCategorie'].'">'.$uneCategorie['libelleCategorie'].'</option>'; } ?>
                            </select> 
                        </div><br>
                        <p><strong>Si Memory Box, lier la question à un joueur</strong></p>
                        <div class="select2">
                            <select name="idPatientQuestion">
                            <option value="0">Aucun patient</option>
                            <?php 
                                foreach($lesPatients as $unPatient) {
                                echo '<option value="'.$unPatient['idPatient'].'">'.$unPatient['nomPatient'].' '.$unPatient['prenomPatient'] . '</option>';
                                }
                            ?>
                            </select> 
                        </div>
                        <br>
                        <div class="files">
                            <div class="bottom_input">
                                <div class="question">
                                    <div id="pushFile">
                                        <label for="fileq" class="label-file">&nbsp;&nbsp;&nbsp;</label>
                                        <input name="fileq" id="fileq" class="input-file" type="file"></input>
                                    </div>
                                    <p><strong>Média question</strong></p>
                                </div>
                                <div class="reponse">
                                    <div id="pushFile">
                                        <label for="filer" class="label-file">&nbsp;&nbsp;&nbsp;</label>
                                        <input name="filer" id="filer" class="input-file" type="file"></input>
                                    </div>
                                    <p><strong>Média réponse</strong></p><br>
                                </div>
                                
                            </div>
                            <div class="addQuestion">
                                    <input type="submit" value="Ajouter" name="submit"></input>
                            </div>
                            
                            
                        </div>
                    </div>
                    </form>
                </div>
               <?php } else { 
                echo "<div class='form'>";
                echo "<form method='POST' enctype='multipart/form-data' action='index.php?uc=gestion&action=saveQuestion&num=".$laQuestion[0]."' >";   ?>
                     <h1> Ajouter une question </h1>
                    <div class="inputs">
                    <?php
                        echo'<input type="text" name="question" placeholder="Question" value="'.$laQuestion[1].'"></input> <br>
                        <p><strong>Réponses: </strong>Si qu\'une seule réponse possible, veuillez ne <br>remplir qu\'un choix de réponse et cocher <br> la réponse.</p>';
                       
                        echo '<div class="reponses">';
                        if(isset($lesReponses[0])) {
                            if($lesReponses[0][1] == 'VRAI') {
                            echo '<div class="radio">
                                <input type="radio" name="verif" value="1" checked="checked" />
                            </div>';
                            } else {
                                echo '<div class="radio">
                                <input type="radio" name="verif" value="1">
                            </div>';
                            }
                            echo '<div class="text">
                            <input type="text" name="reponse1" placeholder="Reponse 1" value="'.$lesReponses[0][0].'">
                            </div>
                        </div>';
                        } else {
                            echo '<div class="radio">
                                <input type="radio" name="verif" value="1" />
                            </div>
                            <div class="text">
                            <input type="text" name="reponse1" placeholder="Reponse 1" value="'.$lesReponses[0][0].'">
                            </div>
                        </div>';
                        } 
                        echo '<div class="reponses">';
                        if(isset($lesReponses[1])) {
                            if($lesReponses[1][1] == 'VRAI') {
                            echo '<div class="radio">
                                <input type="radio" name="verif" value="2" checked="checked" />
                            </div>';
                            } else {
                                echo '<div class="radio">
                                <input type="radio" name="verif" value="2">
                            </div>';
                            }
                            echo '<div class="text">
                            <input type="text" name="reponse2" placeholder="Reponse 2" value="'.$lesReponses[1][0].'">
                            </div>
                        </div>';
                        } else {
                            echo '<div class="radio">
                                <input type="radio" name="verif" value="2"/>
                            </div>
                            <div class="text">
                            <input type="text" name="reponse2" placeholder="Reponse 2">
                            </div>
                        </div>';
                        } 
                        echo '<div class="reponses">';
                        if(isset($lesReponses[2])) {
                            if($lesReponses[2][1] == 'VRAI') {
                            echo '<div class="radio">
                                <input type="radio" name="verif" value="3" checked="checked" />
                            </div>';
                            } else {
                                echo '<div class="radio">
                                <input type="radio" name="verif" value="3">
                            </div>';
                            }
                            echo '<div class="text">
                            <input type="text" name="reponse3" placeholder="Reponse 3" value="'.$lesReponses[2][0].'">
                            </div>
                        </div>';
                        } else {
                            echo '<div class="radio">
                                <input type="radio" name="verif" value="3" />
                            </div>
                            <div class="text">
                            <input type="text" name="reponse3" placeholder="Reponse 3">
                            </div>
                        </div>';
                        } echo '<div class="reponses">';
                        if(isset($lesReponses[3])) {
                            if($lesReponses[3][1] == 'VRAI') {
                            echo '<div class="radio">
                                <input type="radio" name="verif" value="4" checked="checked" />
                            </div>';
                            } else {
                                echo '<div class="radio">
                                <input type="radio" name="verif" value="4">
                            </div>';
                            }
                            echo '<div class="text">
                            <input type="text" name="reponse4" placeholder="Reponse 4" value="'.$lesReponses[3][0].'">
                            </div>
                        </div>';
                        } else {
                            echo '<div class="radio">
                                <input type="radio" name="verif" value="4" />
                            </div>
                            <div class="text">
                            <input type="text" name="reponse4" placeholder="Reponse 4">
                            </div>
                        </div>';
                        } 
                        echo '<div class="select">
                            <select name="lierCategorie">
                            <option value="'.$laQuestion[3].'">'.$laQuestion[2].'</option>';
                            foreach($lesCategories as $uneCategorie) { echo '<option value="'.$uneCategorie['idCategorie'].'">'.$uneCategorie['libelleCategorie'].'</option>'; }
                            echo '</select> 
                        </div><br>
                        <p><strong>Si Memory Box, lier la question à un joueur</strong></p>
                        <div class="select2">
                            <select name="idPatientQuestion">
                            <option value="'.$laQuestion[6].'">'.$laQuestion[5].' '.$laQuestion[4].'</option>';
                            
                                foreach($lesPatients as $unPatient) {
                                echo '<option value="'.$unPatient['idPatient'].'">'.$unPatient['nomPatient'].' '.$unPatient['prenomPatient'] . '</option>';
                                }
                            echo '</select> 
                        </div>
                        <br>
                        <div class="files">
                            <div class="bottom_input">
                                <div class="question">
                                    <div id="pushFile">
                                        <label for="fileq" class="label-file">&nbsp;</label>
                                        <input name="fileq" id="fileq" class="input-file" type="file"></input>
                                    </div>
                                    <p><strong>Média question</strong></p>
                                </div>
                                <div class="reponse">
                                    <div id="pushFile">
                                        <label for="filer" class="label-file">&nbsp;</label>
                                        <input name="filer" id="filer" class="input-file" type="file"></input>
                                    </div>
                                    <p><strong>Média réponse</strong></p><br>
                                </div>
                                
                            </div>
                            <div class="addQuestion">
                                    <input type="submit" value="Ajouter" name="submit"></input>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                    </form>';
               } ?>
                
            </div>
           



        </div>
        
    </body>
</html>