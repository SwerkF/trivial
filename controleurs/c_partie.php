<html>
<body>
<?php
if (!isset($_REQUEST['action']))
	$action = "afficher" ;
else
	$action = $_REQUEST['action'] ;


switch ($action)
{
	case "afficher":
		if(!isset($_SESSION['connecter'])) {
			header('Location:index.php?uc=auth');
	
		} else {
		$idPersonnel = $_SESSION['idPerso'];
		$idPersonnelEtab = getIdPersonnelEtab($idPersonnel);
		$lesPatients = getPatientEtab($idPersonnelEtab['idEtablissementPersonnel']);
		$lesGames = getSavedGames($idPersonnel);
		require "vues/v_nouvellepartie.php";
        break;
		}

	case "newgame":
		unset($_SESSION['question']);
		unset($_SESSION['joueursInGame']);
		unset($_SESSION['joueursPotentiel']);
		$_SESSION['nbPartie'] = getNbPartie();
		$_SESSION['numPartie'] = $_SESSION['nbPartie'][0] + 1;
		$idPersonnel = $_SESSION['idPerso'];
		$idPersonnelEtab = getIdPersonnelEtab($idPersonnel);
		$lesPatients = getPatientEtab($idPersonnelEtab['idEtablissementPersonnel']);
		require "vues/v_salonpartie.php";
		break;
	
	case"ajoutJoueur" :
		$pions = ["🔴","🟠","🟡","🟢","🔵","🟣"];
		if(count($_SESSION["joueursInGame"]) == 0) {
			$cpt = 0;
		} else {
			$cpt = count($_SESSION["joueursInGame"]);
		}
		$pos = strpos($_POST["ajoutPatient"],"-");

		
		$_SESSION['joueursInGame'][$cpt][0] = $cpt; // Numero
		$_SESSION['joueursInGame'][$cpt][1] = substr($_POST['ajoutPatient'],$pos+1,strlen($_POST['ajoutPatient'])); // Nom + Prenom
		$_SESSION['joueursInGame'][$cpt][2] = 0; // Score
		$_SESSION['joueursInGame'][$cpt][3] = substr($_POST['ajoutPatient'],0,$pos); // idPatient
		$_SESSION['joueursInGame'][$cpt][4] = $pions[$cpt]; // Couleur pion joueur
		$_SESSION['joueursInGame'][$cpt][5] = 0; // Position pion joueur
		unset($_SESSION['joueursPotentiel'][$_POST['ajoutPatient']]);
		require "vues/v_salonpartie.php";
		break;

	case"resetliste":
		unset($_SESSION['joueursInGame']);
		echo "<script>window.location.href='index.php?uc=partie&action=newgame'</script>";
		break;
	
	case"debut":
		unset($_SESSION['repvalid']);
		if($_POST['nbrquestions'] != "" && !empty($_SESSION['joueursInGame'])) {
			$_SESSION['nbQuestion'] = $_POST['nbrquestions'] * count($_SESSION['joueursInGame']);
			$lesQuestions = randomQuestion($_SESSION['nbQuestion']);
			$_SESSION['question'] = array();
			$_SESSION['reponses'] = array();
			$cpt=0;
			$nbQuestion = count($lesQuestions);
			while($cpt < count($lesQuestions)) {
				$i=0;
				$_SESSION['question'][$cpt][0] = $lesQuestions[$cpt]['idQuestion']; // Id Question
				$_SESSION['question'][$cpt][1] = $lesQuestions[$cpt]['libelleQuestion']; // Libelle de la question
				$_SESSION['question'][$cpt][2] = $lesQuestions[$cpt]['questionPatient']; // Question patient ?
				$_SESSION['question'][$cpt][3] = $lesQuestions[$cpt]['repMultiQuestion']; // Question choix multiple ?
				$_SESSION['question'][$cpt][5] = $lesQuestions[$cpt]['fichierQuestion'];
				$_SESSION['question'][$cpt][6] = $lesQuestions[$cpt]['libelleCategorie'];
				$lesReponses = getReponses($lesQuestions[$cpt]['idQuestion']);
				$_SESSION['reponses'][$cpt] = count($lesReponses);
				while($i < count($lesReponses)) {
					$_SESSION['question'][$cpt][4][$i][0] = $lesReponses[$i]['libelleReponse']; // Libelle reponse
					$_SESSION['question'][$cpt][4][$i][1] = $lesReponses[$i]['verifReponse']; // Libelle vrai ou faux
					$_SESSION['question'][$cpt][4][$i][2] = $lesReponses[$i]['fichierReponse']; // Libelle vrai ou faux
					$i++;
				}
				$cpt++;
				
			}
			?> <script type="text/javascript"> startGame(<?php echo count($_SESSION['joueursInGame'])?>) </script> <?php
			
			$_SESSION['decompte'] = 0;
			$_SESSION['numJoueur'] = 0;
			
			$x = 0;
			while ($x < count($_SESSION["joueursInGame"])) {
				$date = date("d/m/Y");
				insertScore($_SESSION['numPartie'], $_SESSION['joueursInGame'][$x][2], 0, $_SESSION['nbQuestion'], $_SESSION['joueursInGame'][$x][3], $_SESSION['idPerso'],$date);
				$x++;
			}

			insertSerialGame(serialize($_SESSION['question']),$_SESSION['numJoueur'],$_SESSION['decompte'],$_SESSION['numPartie'],$_SESSION['idPerso']);
			
			$idSerialSave = getSerialGame($_SESSION['numPartie']);
			$_SESSION['savedGame'] = $idSerialSave[0][0];
			insertSerialPlayer(serialize($_SESSION['joueursInGame']),$idSerialSave[0][0]);
			require "vues/v_plateau.php";
			break;
		} else {
			$_SESSION['err'] = true;
			require "vues/v_salonpartie.php";
			break;
		}

	case "save" : 
		$_SESSION['pion'] = $_GET['array'];
		$_SESSION['jsQuestion'] = $_GET['jsquestion'];
		$pion = $_SESSION['pion'];
		echo "<script>window.location.href='index.php?uc=partie&action=jeu'</script>";
		break;

	case "jeu":
		if($_SESSION['jsQuestion'] == 0) {
			require "vues/v_jeu.php";
			break;
		
		} else if($_SESSION['jsQuestion'] == 1) {
			$numJoueur = $_SESSION['numJoueur'];
			$lesQuestions2 = getQuestionPerso($_SESSION['joueursInGame'][$numJoueur][3]);
			$_SESSION['question2'] = array();
			$_SESSION['reponses2'] = array();
			$cpt=0;
			
			$nbQuestion = count($lesQuestions2);
			while($cpt < count($lesQuestions2)) {
				$i=0;
				$_SESSION['question2'][$cpt][0] = $lesQuestions2[$cpt]['idQuestion']; // Id Question
				$_SESSION['question2'][$cpt][1] = $lesQuestions2[$cpt]['libelleQuestion']; // Libelle de la question
				$_SESSION['question2'][$cpt][2] = $lesQuestions2[$cpt]['questionPatient']; // Question patient ?
				$_SESSION['question2'][$cpt][3] = $lesQuestions2[$cpt]['repMultiQuestion']; // Question choix multiple ?
				$_SESSION['question2'][$cpt][5] = $lesQuestions2[$cpt]['fichierQuestion'];
				$_SESSION['question2'][$cpt][6] = $lesQuestions2[$cpt]['libelleCategorie'];
				$lesReponses2 = getReponses($lesQuestions2[0][0]);
				$_SESSION['reponses2']= count($lesReponses2);
				while($i < count($lesReponses2)) {
					$_SESSION['question2'][$cpt][4][$i][0] = $lesReponses2[$i]['libelleReponse']; // Libelle reponse
					$_SESSION['question2'][$cpt][4][$i][1] = $lesReponses2[$i]['verifReponse']; // Libelle vrai ou faux
					$_SESSION['question2'][$cpt][4][$i][2] = $lesReponses2[$i]['fichierReponse']; // Libelle vrai ou faux
					$i++;
				}
				$cpt++;
				
			}
			require "vues/v_questionperso.php";
			break;

		}

	case "verifreponse":
		$decompte = $_SESSION['decompte'];
		$numJoueur = $_SESSION['numJoueur'];
		$pion = $_SESSION['pion'];
		$pionsave = json_encode(mb_substr($pion,1,1));
		$pionsave = substr($pionsave,2,5).''.substr($pionsave,8,10);
		$pionsave = substr($pionsave,0,strlen($pionsave)-1);

		$_SESSION['joueursInGame'][$numJoueur][4] = $pionsave;
		$_SESSION['joueursInGame'][$numJoueur][5] = mb_substr($_SESSION['pion'],4,strlen($_SESSION['pion']));
		
		if($_SESSION['jsQuestion'] == 0) {
		if($_SESSION['question'][$decompte][3] == 0) {
			$i = 0;
			while($i < $_SESSION['reponses'][$decompte]) {
				if($_POST['reponse'] == $_SESSION['question'][$decompte][4][$i][0]) {
					$_SESSION['joueursInGame'][$numJoueur][2] = $_SESSION['joueursInGame'][$numJoueur][2] + 1;
					updateScore($_SESSION['joueursInGame'][$numJoueur][2],$_SESSION['joueursInGame'][$numJoueur][3],$_SESSION['numPartie']);
					$_SESSION['verifRep'] = true;
					$i++;
				} else {
					$i++;
				}
			}
		} else if($_POST['reponse'] == "VRAI") {

				$_SESSION['joueursInGame'][$numJoueur][2] = $_SESSION['joueursInGame'][$numJoueur][2] + 1;
				updateScore($_SESSION['joueursInGame'][$numJoueur][2],$_SESSION['joueursInGame'][$numJoueur][3],$_SESSION['numPartie']);
				$_SESSION['verifRep'] = true;
			
		} else {
			$_SESSION['verifRep'] = false;
		}
		$_SESSION['repvalid'] = true;
		updateSerialPlayer(serialize($_SESSION['joueursInGame']),$_SESSION['savedGame']);
		$bonneRep = getBonneReponse($_SESSION['question'][$decompte][0]);
		require "vues/v_jeu.php";
		break;
	} else {
		if($_SESSION['question2'][0][3] == 0) {
			
			$i = 0;
			var_dump($_SESSION['reponses2']);
			while($i < $_SESSION['reponses2']) {
				if($_POST['reponse'] == $_SESSION['question2'][0][4][$i][0]) {
					$_SESSION['joueursInGame'][$numJoueur][2] = $_SESSION['joueursInGame'][$numJoueur][2] + 1;
					updateScore($_SESSION['joueursInGame'][$numJoueur][2],$_SESSION['joueursInGame'][$numJoueur][3],$_SESSION['numPartie']);
					$_SESSION['verifRep'] = true;
					$i++;
				} else {
					$i++;
				}
			}
		} else if($_POST['reponse'] == "VRAI") {

				$_SESSION['joueursInGame'][$numJoueur][2] = $_SESSION['joueursInGame'][$numJoueur][2] + 1;
				updateScore($_SESSION['joueursInGame'][$numJoueur][2],$_SESSION['joueursInGame'][$numJoueur][3],$_SESSION['numPartie']);
				$_SESSION['verifRep'] = true;
			
		} else {
			$_SESSION['verifRep'] = false;
		}

		$_SESSION['repvalid'] = true;
		updateSerialPlayer(serialize($_SESSION['joueursInGame']),$_SESSION['savedGame']);
		$bonneRep = getBonneReponse($_SESSION['question2'][0][0]);
		require "vues/v_questionperso.php";
		break;
	}


	case "suite":
		$_SESSION['numJoueur']++;
		$_SESSION['decompte']++;
		
		$cpt = count($_SESSION["joueursInGame"]) - 1;

		if($_SESSION['numJoueur'] > $cpt) {
			$_SESSION['numJoueur'] = 0;
		}
		updateSerialGame($_SESSION['decompte'],$_SESSION['numJoueur'],$_SESSION['savedGame']);
		if($_SESSION['decompte'] >= $_SESSION['nbQuestion']) {
			
			echo "<script>window.location.href='index.php?uc=partie&action=fin'</script>";
			break;
		} else {
			include "vues/v_plateau.php";
			break;
		}

	case "fin" :

		$i = 0;
		$nbQuestions = $_SESSION['nbQuestion'] / count($_SESSION['joueursInGame'],$_SESSION['savedGame']);
		updateStatutPartie($_SESSION['numPartie']);
		
		require "vues/v_fin.php";
		break;
	
	case "statistiques":
		unset($_SESSION['voir']); 
		$partiesfini = getPartiFini($_SESSION['idPerso']); // Récupérer le nombre de partie
		require "vues/v_stats.php";
		break;
	
	case "voirpartie":
		$_SESSION['voir'] = true;
		$partiesfini = getPartiFini($_SESSION['idPerso']);

		$laPartie = getPartieById($_SESSION['idPerso'],$_GET['partie']);

		$parties = array(); // Tableau partie
		$joueurs = array(); // Tableau joueurs
		$i = 0;
		$y = 1;

		while($i < count($laPartie)) {
			$numPartie = $laPartie[$i][0];
			$lesParties = getPartiePatients($numPartie);
			$nbJoueurs = getNbJoueurParties($numPartie);
			$parties[$i][0] = $i + 1;
			$parties[$i][1] = $joueurs;
			$parties[$i][2] = $lesParties[0][3]; // Ajout de l'array joueurs dans la parties
			$parties[$i][3] = $laPartie[0][5]; // Ajout de l'array joueurs dans la parties
			$x = 0;

			while($x < $nbJoueurs[0][0]) {
				$parties[$i][1][$x][0] = $lesParties[$x][2];
				$parties[$i][1][$x][1] = $lesParties[$x][5];
				$x++;
			}
		$i++;
		$y++;

		}
		
		require "vues/v_stats.php";
		break;

	case "reprendre":
		$jeu = getSaveById($_SESSION['idPerso'], $_GET['partieId']);

		$_SESSION['joueursInGame'] = unserialize($jeu[4]);
		$_SESSION['decompte'] = $jeu[3];
		$_SESSION['numJoueur'] = $jeu[2];
		$_SESSION['question'] = unserialize($jeu[1]);
		$rep = unserialize($jeu[1]);
		$_SESSION['reponses'][$_SESSION['decompte']] = count($rep[$_SESSION['decompte']][4]);
		$lesJoueurs = $_SESSION['joueursInGame'];

		$players = array();
		$cpt = 0;
		
		foreach($_SESSION['joueursInGame'] as $unJoueur) {
			$p = $unJoueur[4];
			$players[$cpt][0] = json_decode("\"\\".substr($p,0,5)."\\".substr($p,5,strlen($p))."\"");
			$players[$cpt][0] = $players[$cpt][0];
			$players[$cpt][1] = $unJoueur[5];
			$cpt++;
			
		}

		?> 
			<script type="text/javascript"> resumeGame(<?php echo $_SESSION['numJoueur'];?>,<?php echo json_encode($players);?>)</script>
		<?php
		require "vues/v_plateau.php";
		break;
}
?>
</body>
</html>