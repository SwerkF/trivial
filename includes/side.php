
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
<link rel="stylesheet" href="style.css"/>
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

p, h1 {
    font-family: 'Raleway', sans-serif;
    color: <?php echo $darkColor ?>;
    
}

.sidebar {
    
    position: absolute;
    display: flex;
    flex-direction: column;
    justify-content: start;
    width: 220px;
    height: 89%;
    background-color: <?php echo $darkColor ?>;
}

.sidebar label {
    color: <?php echo $darkColor ?>;
}

body {
    background-image: url();
    background-color: <?php echo $brightColor ?>;
}

.separator {
    background-color: <?php echo $darkColor ?>;
    width: 3px;
    height: 600px;
    margin-left: 300px;
    
}

.separator2 {
    background-color: <?php echo $darkColor ?>;
    width: 3px;
    height: 660px;
    margin-left: 300px;
    
}

.addRemove input[type="submit"] {
    color: <?php echo $darkColor ?>;
    margin-left: 20px;
    border: none;
    background-color: transparent;
    cursor: pointer;
}

.inputs input[type="submit"] {
    border:none;
    margin-top: 20px;
    font-size: 30px;
    font-weight: 600;
    background-color: transparent;
    color:<?php echo $darkColor ?>;
    cursor: pointer;
}


.page {
    margin-top: 40px;
    margin-left: 250px;
}
.content a{

    font-family: 'Raleway', sans-serif;
    color: #fff;
    font-size: 24px;
    font-weight: 600;
    line-height: 50px;
    border-bottom: 4px solid transparent;
}

.position {
    display: flex;
    flex-direction: column;
    margin-left: 14px;
    margin-top: 40px;
}

.content a.active,
.content a:hover {
    border-bottom: 4px solid #fff;

}


</style>

<div class="sidebar">
    <div class="content">
        <div class="position">
            <a href="index.php?uc=gestion&action=joueurs">Joueurs</a>
            <a href="index.php?uc=gestion&action=questions">Questions</a>
            <a href="index.php?uc=partie&action=statistiques">Statistiques</a>
            <a href="index.php?uc=gestion&action=admin">Administrateurs</a>
            <a href="index.php?uc=gestion&action=custom">Personnalisation</a>
        </div>
    </div>
    
</div>

</head>
