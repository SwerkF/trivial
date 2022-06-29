<?php
include "includes/modeles/connexion_bdd.php";
include "includes/modeles/gestion_bdd.php" ;
session_start();

if(isset($_COOKIE['connect'])) {
    
    setcookie('connect', "connexion", time()+3600*24, '/', '', false, false);
    if(isset($_SESSION["etabPerso"])) {
        include "includes/header.php" ;
        include "controleurs/c_principal.php";
        include "includes/footer.php" ;
    } else {
        include "includes/header2.php" ;
        include "controleurs/c_principal.php";
        include "includes/footer.php" ;
    }
} else {
    session_destroy();
    session_start();
    include "includes/header2.php" ;
    include "controleurs/c_principal.php";
    include "includes/footer.php" ;
    
}



?>
