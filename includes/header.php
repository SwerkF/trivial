
<head>

        <?php
        $leSite = getInfoSite($_SESSION['etabPerso']);
        $color = $leSite['couleurSite'];
        $nomSite = $leSite['nomSite'];
        $logoSite = $leSite['logoSite'];
        $ville = $leSite['villeEtablissement'];

 		if($color == "#ff3300") { $baseColor = "#ff3300"; $brightColor = "#ff6666"; $darkColor = "#800000"; } // ROUGE
        elseif($color == "#ff9900") { $baseColor = "#ff9900"; $brightColor = "#ffb84d"; $darkColor = "#b36b00"; } // ORGANGE
        elseif($color == "#ffff00") { $baseColor = "#ffff00"; $brightColor = "#ffff80"; $darkColor = "#cccc00"; } // JAUNE
        elseif($color == "#66ff33") { $baseColor = "#66ff33"; $brightColor = "#9fff80"; $darkColor = "#33cc00"; } // VERT CLAIR
        elseif($color == "#009933") { $baseColor = "#009933"; $brightColor = "#00e64d"; $darkColor = "#006622"; } // VERT FONCE
        elseif($color == "#33ccff") { $baseColor = "#33ccff"; $brightColor = "#80dfff"; $darkColor = "#0099cc"; } // BLEU CLAIR
        elseif($color == "#3366ff") { $baseColor = "#0D6CAC"; $brightColor = "#93B2D2"; $darkColor = "#1D4C7B"; } // BLEU
        elseif($color == "#6600ff") { $baseColor = "#6600ff"; $brightColor = "#a366ff"; $darkColor = "#4700b3"; }  // VIOLET
        elseif($color == "#ff00ff") { $baseColor = "#ff00ff"; $brightColor = "#ff80ff"; $darkColor = "#800080"; } // ROSE
        elseif($color == "#f2f2f2") { $baseColor = "#e6e6e6"; $brightColor = "#f2f2f2"; $darkColor = "#cccccc"; } // BLANC
        ?>


        <meta charset="utf-8"/>
        <script type="text/javascript" src="includes/js/jquery-3.6.0.min.js"></script>
        <title> <?=  $nomSite ?></title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="shortcut icon" href="./images/favicon.png">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Armata&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;600&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/vast-engineering/jquery-popup-overlay@2/jquery.popupoverlay.min.js"></script>
        <script src="https://kit.fontawesome.com/b20eb41686.js" crossorigin="anonymous"></script>
        <script src="includes/js/fonctions.js"></script>
        
        <style>
        #box1Admin {
            position: absolute;
            top: 20%;
            left: 8%;
            width: 500px;
            height: 570px;
            background: <?= $baseColor; ?>;
            box-shadow: 0em 0em 2em <?= $darkColor; ?>;
            border-radius:20px;
            border: 4px solid <?= $brightColor; ?>;
}
        #box2Admin {
            position: absolute;
            top: 20%;
            left: 37%;
            width: 500px;
            height: 340px;
            background:<?= $baseColor; ?>;
            box-shadow: 0em 0em 2em <?= $darkColor; ?>;
            border-radius:20px;
            border: 4px solid <?= $brightColor; ?>;
}
        #box3Admin {
            position: absolute;
            top: 20%;
            left: 66%;
            width: 500px;
            height: 1230px;
            background:<?= $baseColor; ?>;
            box-shadow: 0em 0em 2em <?= $darkColor; ?>;
            border-radius:20px;
            border: 4px solid <?= $brightColor; ?>;
}

        #box4Admin {
            position: absolute;
            top: 60%;
            left: 37%;
            width: 500px;
            height: 550px;
            background:<?= $baseColor; ?>;
            box-shadow: 0em 0em 2em <?= $darkColor; ?>;
            border-radius:20px;
            border: 4px solid <?= $brightColor; ?>;
}
        #pushFile {
            text-align:center;
            border: 1px solid <?= $darkColor; ?>;
            border-radius: 50%;
            width:20px;
            height:20px;
            font-size: 15px;
            line-height: 1.5;
            font-family: 'Raleway', sans-serif;
            color: #fff;
            background-color:<?= $darkColor; ?>;
            
}

        #pushFile2 {
            text-align:center;
            border: 1px solid <?= $darkColor; ?>;
            width:425px;
            height:40px;
            margin-left:2px;
            font-size: 15px;
            font-family: 'Raleway', sans-serif;
            color: #fff;
            background-color:<?= $darkColor; ?>;
            
}



        header {
            top: 0;
            background: <?= $baseColor; ?>;
            height: 107px;
            width: 100%;
}

        #nav1 a:hover {

        background: <?= $darkColor; ?>;
        transition: all 0.3s ease-in-out 0.1s;
}
        .label-file {
            cursor: pointer;
            color: #00b1ca;
            font-weight: bold;
           
}
        .label-file:hover {
            color: #25a5c4;
}
        .label-file2 {
            
            line-height:2.5em;
            cursor: pointer;
            color: #fff;
            font-weight: bold;
           
}
        .label-file2:hover {
            color: #25a5c4;
}
        #footer nav {
             padding-top: 10px;
                bottom: 0;
                position: fixed;
                background: <?= $baseColor; ?>;
                height: 40px;
                width: 100%;
}

        #footer ul li {
                display: inline;
                list-style: none;
}
        #footer p {
                text-align: right;
                display: inline;
                color: white;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-weight: 600;
}

        #droits p {
                text-align: left;
                padding-right: 69%;
                padding-left: 1%;
    
}

#titre #ville {
    font-size: 18px;
}
 
    

        </style>

        

    </head>

    <header>
      <div id="titre">
     
        <div id="nameheader">
            <?php
            if($leSite['logoSite'] != '0') {
                ?> <img style="position:relative; margin-top:1px; margin-left:4px;" height="100px" src="includes/imgs/<?=$logoSite ?>"> <?php
            } ?>
            
            <ul> 
                <li><a id="nomsite" href="index.php"><strong><?= $nomSite ?></strong></a></li>
                <li><a id="villesite" href="index.php"><strong><?= $ville ?></strong></a></li>
            </ul>
      
        </div>
                  

             
         <div id="labels">
         <ul>
            <div id="profilheader">
                
                            <div id="profilpic">
                                <?php echo substr($_SESSION['nomPerso'],0,1).''.substr($_SESSION['prenomPerso'],0,1) ?>
                            </div> 
                    
                        <div class="profilinfos">
                            <a href="index.php?uc=compte&id=user"><strong><?php echo $_SESSION['nomPerso'].' '. $_SESSION['prenomPerso'] ?></strong></a>
                            <a href="index.php?uc=compte&id=user">Accéder à mon espace</a>
                            <a href="index.php?uc=auth&action=deconnexion">Se déconnecter</a>
                       </div>
                  
                <br>
             </div>
        </ul>
        <ul>
            <div id="action"> 

            <?php $page = 0; if($page==1){ ?>class="active"<?php } ?>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?uc=partie">Partie</a></li>
                <li><a href="index.php?uc=gestion&action=joueurs">Administration</a></li>
            </div>
            
            
        </ul>
         </div>
         </div>
    </header>
