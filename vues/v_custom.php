<html>
<head>  
    <?php include("includes/side.php"); ?> 
</head>
<body>
    <div class="page">
            
        <h1> Personnaliser votre application </h1>
        <div class="table">
            <div class="listePerso">
            <form enctype="multipart/form-data" method="POST" action="index.php?uc=gestion&action=modifierSite"> 
                <div class="top">
                    <div class="logo">
                    <?php if($leSite['logoSite'] == '0') {
                            echo '<img style="position:relative; margin-top:1px; margin-left:4px;" height="140px" src="includes/imgs/logotemp.png" />';
                        } else {
                    ?>     <img style="position:relative; margin-top:1px; margin-left:4px;" height="140px" src="includes/imgs/<?=$logoSite ?>">
                    <?php }?>
                    </div>
                    <div class="logoinput">
                        <p style="padding-bottom:20px"> Modifier logo </p>
                        <div id="pushFile2">
                            <label for="filelogo" class="label-file2"><i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp;&nbsp;&nbsp;Choisir un fichier</label>
                            <input name="filelogo" id="fileq" class="input-file" type="file"></input>
                         </div>
                    </div>
                </div>
                <br>
                
                <div class="bot">
                        <p>Modifier couleur</p>
                <div class="select2">
                    <select name="selectcouleur" id="selectcouleur">  
                        <option value="#3366ff">Choisir une couleur</option>
                        <option style="color:#ff3300" value="#ff3300">Rouge</option>
                        <option style="color:#ff9900" value="#ff9900">Orange</option>
                        <option style="color:#ffff00" value="#ffff00">Jaune</option>
                        <option style="color:#66ff33" value="#66ff33">Vert clair</option>
                        <option style="color:#009933" value="#009933">Vert foncé</option>
                        <option style="color:#33ccff" value="#33ccff">Bleu clair</option>
                        <option style="color:#3366ff" value="#3366ff">Bleu</option>
                        <option style="color:#6600ff" value="#6600ff">Violet</option>
                        <option style="color:#ff00ff" value="#ff00ff">Rose</option>
                        <option value="#f2f2f2">Blanc</option>
                    </select>  
                </div>
                </div>
            </div>

            <div class="separator">
                <p>  </p>
            </div>
                <div class="form">   
                    <h1> Informations Société </h1>
                    <div class="inputs">
                        <input type="text" name="nom" placeholder="Nom Société" value="<?php echo $leSite['nomEtablissement'] ?>">
                        <input type="text" name="adresse" placeholder="Adresse" value="<?php echo $leSite['adresseEtablissement'] ?>">
                        <input type="text" name="cp" placeholder="Code Postal" value="<?php echo $leSite['cpEtablissement'] ?>">
                        <input type="text" name="ville" placeholder="Ville" value="<?php echo $leSite['villeEtablissement'] ?>">
                        <input type="text" name="tel" placeholder="Téléphone" value="<?php echo $leSite['telEtablissement'] ?>">
                        <input type="text" name="mail" placeholder="Email" value="<?php echo $leSite['mailEtablissement'] ?>">
                        <input type="submit" name="submit" value="Modifier">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>