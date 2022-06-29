<?php

use function PHPSTORM_META\sql_injection_subst;

/**
 * Vérifie les identifiants de connexion et instancie les variables de session

 * @param $loginSaisi
 * @param $mdpSaisi
 * @return un boolÃ©en true si utilisateur connu, false sinon
*/

function verifConnexion($loginSaisi, $mdpSaisi) {
    require "includes/modeles/connexion_bdd.php";
    $req = $bdd->prepare("SELECT * FROM personnel WHERE loginPersonnel = '$loginSaisi' && passPersonnel = '$mdpSaisi'");
    $req->execute();
    $curseur = $req->fetch();
  return $curseur;
}

function getIdPersonnelEtab($id) {
    require "includes/modeles/connexion_bdd.php";
    $req = $bdd->prepare("SELECT idEtablissementPersonnel FROM personnel WHERE idPersonnel = '$id'");
    $req->execute();
    $curseur = $req->fetch();
  return $curseur;
}

function getPatientEtab($id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idPatient, nomPatient, prenomPatient FROM patient WHERE idEtablissementPatient = '$id'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute() ;
    $curseur=$exec->fetchAll();
    return $curseur;
}

function getPatientById($id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idPatient, nomPatient, prenomPatient, agePatient, infoPatient FROM patient WHERE idPatient = '$id'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute() ;
    $curseur=$exec->fetch();
    return $curseur;
}

function updatePatient($id,$nom,$prenom,$age,$info) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "UPDATE patient SET nomPatient = '$nom', prenomPatient = '$prenom', agePatient = '$age', infoPatient = '$info' WHERE idPatient = '$id'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute() ;
    $curseur=$exec->fetch();
    return $curseur;
}

function ajoutPatient($nom,$prenom,$age,$info,$id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "INSERT INTO patient(nomPatient,prenomPatient,agePatient,infoPatient,idEtablissementPatient) VALUES ('$nom','$prenom','$age','$info','$id')";
    $exec=$bdd->prepare($sql);
    $exec->execute();

}

function supprPatient($id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "DELETE FROM patient where idPatient = '$id'";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function getLesAdmins($id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idPersonnel, prenomPersonnel, nomPersonnel FROM personnel WHERE idEtablissementPersonnel = '$id'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute() ;
    $curseur=$exec->fetchAll();
    return $curseur;
}

function getAdminById($id, $id2) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idPersonnel, prenomPersonnel, nomPersonnel, mailPersonnel, loginPersonnel FROM personnel WHERE idEtablissementPersonnel = '$id' AND idPersonnel = '$id2'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute() ;
    $curseur=$exec->fetch();
    return $curseur;
}

function ajoutAdmin ($nom, $prenom, $mail, $login, $mdp, $id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "INSERT INTO personnel(nomPersonnel, prenomPersonnel, mailPersonnel, loginPersonnel, passPersonnel,idEtablissementPersonnel) VALUES ('$nom','$prenom','$mail','$login','$mdp','$id')";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function deleteAdmin($id,$id2) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "DELETE FROM personnel where idPersonnel = '$id' AND idEtablissementPersonnel = '$id2'";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function getQuestions($id){
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idQuestion, libelleQuestion, questionPatient, idCategorieQuestion, fichierQuestion FROM question WHERE idEtablissementQuestion = '$id'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute() ;
    $curseur=$exec->fetchAll();
    return $curseur;
} 

function updateAdmin ($nom, $prenom, $mail, $login, $mdp, $id, $id2) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "UPDATE personnel SET nomPersonnel = '$nom', prenomPersonnel = '$prenom', mailPersonnel = '$mail', passPersonnel = '$mdp' WHERE idEtablissementPersonnel = '$id' AND idPersonnel = '$id2';";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}


function getCategories() {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idCategorie, libelleCategorie FROM categorie";
    $exec=$bdd->prepare($sql) ;
    $exec->execute() ;
    $curseur=$exec->fetchAll();
    return $curseur;
}

function ajoutQuestion($question, $lier, $multi, $idEtab, $idCat, $file) {
    require "includes/modeles/connexion_bdd.php";
    $sql1 = "INSERT INTO question(libelleQuestion,questionPatient,repMultiQuestion,idEtablissementQuestion,idCategorieQuestion,fichierQuestion) VALUES ('$question','$lier','$multi','$idEtab','$idCat','$file')";
    $exec=$bdd->prepare($sql1);
    $exec->execute();
    
}

function ajoutQuestionWId($id,$question, $lier, $multi, $idEtab, $idCat, $file) {
    require "includes/modeles/connexion_bdd.php";
    $sql1 = "INSERT INTO question(idQuestion,libelleQuestion,questionPatient,repMultiQuestion,idEtablissementQuestion,idCategorieQuestion,fichierQuestion) VALUES ($id,'$question','$lier','$multi','$idEtab','$idCat','$file')";
    $exec=$bdd->prepare($sql1);
    $exec->execute();
    
}

function getIdQuestion($question) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idQuestion FROM question WHERE libelleQuestion = '$question'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetch();
    return $curseur;
}

function updateName($id,$name) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "UPDATE question SET fichierQuestion = '$name' WHERE idQuestion = '$id'";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}
function ajoutReponse($reponse,$idQuestion,$VouF) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "INSERT INTO reponse(libelleReponse,idQuestionReponse,verifReponse) VALUES ('$reponse','$idQuestion','$VouF')";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function getIdByMail($mail) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idPersonnel FROM personnel WHERE mailPersonnel = '$mail'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetch();
    return $curseur;

}
function codeOubliInsert($code, $date, $id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "INSERT INTO recupcode(code,expirationRecupcode,idPersonnelCode) VALUES ('$code','$date','$id')";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function getCodeRecup($code) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT code, expirationRecupcode FROM recupcode WHERE code = '$code'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetch();
    return $curseur;
}

function getMailByToken($token) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT mailPersonnel FROM personnel INNER JOIN recupcode ON idPersonnel = idPersonnelCode WHERE code = '$token'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetch();
    return $curseur;
}

function setNewPassword($password,$mail) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "UPDATE personnel SET passPersonnel = '$password' WHERE mailPersonnel = '$mail'";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function deleteRecupCode($code) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "DELETE FROM recupcode WHERE code = '$code'";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function randomQuestion($nombre) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idQuestion, libelleQuestion, questionPatient, repMultiQuestion, fichierQuestion, libelleCategorie FROM question INNER JOIN categorie ON idCategorie = idCategorieQuestion WHERE questionPatient = 0 order by RAND() LIMIT $nombre";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetchAll();
    return $curseur;
}

function getReponses($idQuestion) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT libelleReponse, verifReponse, fichierReponse FROM reponse WHERE idQuestionReponse = '$idQuestion'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetchAll();
    return $curseur;
}

function getInfoSite($id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT * FROM etablissement WHERE idEtablissement = '$id'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetch();
    return $curseur;
}

function insertScore($idPartie,$score,$statut,$nbQuestion,$idPatient,$idPersonnel,$datePartie) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "INSERT INTO partie(idPartie,scorePartie,statutPartie,nbQuestionPartie,idPatientPartie,idPersonnelPartie,datePartie) VALUES ('$idPartie','$score','$statut','$nbQuestion','$idPatient','$idPersonnel','$datePartie')";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}
function getNbPartie() {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT max(idPartie) as idPartie FROM partie";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetch();
    return $curseur;
}

function getPartiFini($personnelId) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idPartie, scorePartie, nbQuestionPartie, nomPatient, prenomPatient, datePartie FROM partie INNER JOIN patient ON idPatientPartie = idPatient WHERE statutPartie = 1 AND idPersonnelPartie = '$personnelId' GROUP BY idPartie";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetchAll();
    return $curseur;
}

function getPartieById($personnelId, $idPartie) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idPartie, scorePartie, nbQuestionPartie, nomPatient, prenomPatient, datePartie FROM partie INNER JOIN patient ON idPatientPartie = idPatient WHERE statutPartie = 1 AND idPersonnelPartie = '$personnelId' AND idPartie = '$idPartie'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetchAll();
    return $curseur;
}

function getPartiePatients($id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idPatient, idPartie, scorePartie, nbQuestionPartie, nomPatient, prenomPatient FROM partie INNER JOIN patient ON idPatient = idPatientPartie WHERE idPartie = '$id' AND statutPartie = 1";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetchAll();
    return $curseur;
}

function getNbJoueurParties($id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT count(idPatientPartie) FROM partie WHERE idPartie = '$id' AND statutPartie = 1";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetchAll();
    return $curseur;
}

function updateScore($score,$idJoueur,$idPartie) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "UPDATE partie SET scorePartie = $score WHERE idPartie = '$idPartie' AND idPatientPartie = '$idJoueur'";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function updateStatutPartie($idPartie) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "UPDATE partie SET statutPartie = 1 WHERE idPartie = '$idPartie'";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function insertSerialGame($serializedGame, $numJoueur, $numQuestion,$idPartie, $idPersonnel) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "INSERT INTO savegame (serializedGameSave, numJoueurSave, numQuestionSave, idPartieSave, idPersonnelSave) VALUES ('$serializedGame', '$numJoueur','$numQuestion','$idPartie','$idPersonnel')";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function getSerialGame($idPartie) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idSave, serializedGameSave, numJoueurSave, numQuestionSave FROM savegame WHERE idPartieSave = '$idPartie'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetchAll();
    return $curseur;
}

function insertSerialPlayer($serializedPlayer, $idSaveGame) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "INSERT INTO saveplayer (serializedPlayer, idSaveSaveGame) VALUES ('$serializedPlayer', '$idSaveGame')";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function getSerialPlayer($idSave) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT * FROM saveplayer WHERE idSaveSaveGame = '$idSave'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetchAll();
    return $curseur;
}

function updateSerialPlayer($serial, $idSave) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "UPDATE saveplayer SET serializedPlayer = '$serial' WHERE idSaveSaveGame = '$idSave'";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function updateSerialGame($numQuestion, $numJoueur, $idSave) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "UPDATE savegame SET numJoueurSave = '$numJoueur', numQuestionSave = '$numQuestion' WHERE idSave = '$idSave'";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function getSavedGames($idPerso) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idSave, serializedGameSave, numJoueurSave, numQuestionSave, serializedPlayer from savegame INNER JOIN saveplayer on idSave = idSaveSaveGame INNER JOIN partie ON idPartieSave = idPartie AND idPersonnelSave = idPersonnelPartie WHERE statutPartie = 0 AND idPersonnelSave = '$idPerso' GROUP BY idSave";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetchAll();
    return $curseur;

}
function getSaveById($idPerso, $idGame) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idSave, serializedGameSave, numJoueurSave, numQuestionSave, serializedPlayer from savegame INNER JOIN saveplayer on idSave = idSaveSaveGame INNER JOIN partie ON idPartieSave = idPartie AND idPersonnelSave = idPersonnelPartie WHERE statutPartie = 0 AND idSave = '$idGame' AND idPersonnelSave = '$idPerso'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetch();
    return $curseur;

}

function getQuestionPatient($id,$id2) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT questionPatient FROM question WHERE idQuestion = '$id' AND idEtablissementQuestion = '$id2'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute() ;
    $curseur=$exec->fetch();
    return $curseur;
}

function getQuestionById($id,$id2) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idQuestion, libelleQuestion, libelleCategorie, idCategorieQuestion, nomPatient, prenomPatient, questionPatient FROM question INNER JOIN patient ON questionPatient = idPatient INNER JOIN categorie on idCategorie = idCategorieQuestion WHERE idQuestion = '$id' AND idEtablissementQuestion = '$id2'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute() ;
    $curseur=$exec->fetch();
    return $curseur;
}

function getQuestionById2($id,$id2) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idQuestion, libelleQuestion, libelleCategorie, idCategorieQuestion, 'Patient', 'Aucun', questionPatient FROM question INNER JOIN categorie on idCategorie = idCategorieQuestion WHERE idQuestion = '$id' AND idEtablissementQuestion = '$id2'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute() ;
    $curseur=$exec->fetch();
    return $curseur;
}

function getQuestionPerso($idPatient, $id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT idQuestion, libelleQuestion, questionPatient, repMultiQuestion, fichierQuestion, libelleCategorie FROM question INNER JOIN categorie ON idCategorie = idCategorieQuestion INNER JOIN reponse ON idQuestion = idQuestionReponse WHERE questionPatient = '$idPatient' AND idEtablissementQuestion = '$id' order by RAND() LIMIT 1";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetchAll();
    return $curseur;

}

function deleteReponse($id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "DELETE FROM reponse WHERE idQuestionReponse = '$id'";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function deleteQuestion($id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "DELETE FROM question WHERE idQuestion = '$id'";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function updateReponse($id, $file) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "UPDATE reponse SET fichierReponse = '$file' WHERE idQuestionReponse = '$id'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetchAll();
    return $curseur;

}

function getBonneReponse($id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "SELECT libelleReponse FROM reponse WHERE verifReponse = 'VRAI' AND idQuestionReponse = '$id'";
    $exec=$bdd->prepare($sql) ;
    $exec->execute();
    $curseur=$exec->fetchAll();
    return $curseur;

}

function saveColorSite($color,$id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "UPDATE etablissement SET couleurSite = '$color' WHERE idEtablissement = '$id' ";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function saveSite($nom,$adresse,$cp,$ville,$tel,$mail,$id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "UPDATE etablissement SET nomSite = '$nom', adresseEtablissement = '$adresse', cpEtablissement = $cp, villeEtablissement = '$ville', telEtablissement = '$tel', mailEtablissement = '$mail' WHERE idEtablissement = '$id' ";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}

function saveLogoSite($logo,$id) {
    require "includes/modeles/connexion_bdd.php";
    $sql = "UPDATE etablissement SET logoSite = '$logo' WHERE idEtablissement = '$id' ";
    $exec=$bdd->prepare($sql);
    $exec->execute();
}