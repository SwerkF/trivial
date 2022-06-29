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
			$_SESSION['etabPerso'] = $idPersonnelEtab['idEtablissementPersonnel'];
			$lesPatients = getPatientEtab($_SESSION['etabPerso']);
			$leSite = getInfoSite($_SESSION['etabPerso']);
			$lesCategories = getCategories();
			require "vues/v_admin.php";
			break;
		}
		
	case "joueurs":
		unset($_SESSION['modification']);
		$lesPatients = getPatientEtab($_SESSION['etabPerso']);
		require "vues/v_joueurs.php";
		break;

	case "ajoutPatient":
		$nomPatient = $_POST['nom'];
		$prenomPatient= $_POST['prenom'];
		$agePatient = $_POST['age'];
		$infoPatient = $_POST['infos'];
		$idPersonnel = $_SESSION['idPerso'];

		if($nomPatient!="" && $prenomPatient!="") {
			
			ajoutPatient($nomPatient,$prenomPatient,$agePatient,$infoPatient,$_SESSION['etabPerso']);
			unset($nomPatient,$prenomPatient,$agePatient,$infoPatient);
			echo "<script>window.location.href='index.php?uc=gestion&action=joueurs'</script>";
			break;

		} else {

			$_SESSION['ajout?'] = false;
			echo "<script>window.location.href='index.php?uc=gestion&action=joueurs'</script>";
			break;
		}
			
	case "supprPatient":
		try {
			$idPatient = $_GET['patient'];
			supprPatient($idPatient);

			echo "<script>window.location.href='index.php?uc=gestion&action=joueurs'</script>";
			break;
		} catch (Exception $e) {
			echo "<script>window.location.href='index.php?uc=gestion&action=joueurs'</script>";
			break;
		}
		
	case "modifierPatient":
		$lesPatients = getPatientEtab($_SESSION['etabPerso']);
		$lePatient = getPatientById($_GET['patient']);
		$_SESSION['modification'] = true;
		require "vues/v_joueurs.php";
		break;

	case "savePatient":
		unset($_SESSION['modification']);
		$id = $_GET['joueur'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$age = $_POST['age'];
		$info = $_POST['infos'];
		if($nom != "" && $prenom != "" && $age != "") {
			updatePatient($id,$nom,$prenom,$age,$info);
		}
		echo "<script>window.location.href='index.php?uc=gestion&action=joueurs'</script>";
		break;

	case "questions":
		unset($_SESSION['modification']);
		$lesQuestions = getQuestions($_SESSION['etabPerso']);
		$lesCategories = getCategories();
		$lesPatients = getPatientEtab($_SESSION['etabPerso']);
		require "vues/v_questions.php";
		break;
		
	case "ajoutQuestion":
		if(isset($_POST['reponse1']) && isset($_POST['question']) && isset($_POST['lierCategorie'])) {
			$multi = 0;
			if($_POST['reponse2'] != "" || $_POST['reponse3'] != "" || $_POST['reponse4'] != "")  { $multi = 1; }
			$idPersonnel = $_SESSION['idPerso'];
			$idPersonnelEtab = getIdPersonnelEtab($idPersonnel);
			$question = $_POST['question'];
			$reponse = $_POST['reponse1'];
			$lier = $_POST['idPatientQuestion'];
			$idEtab = $idPersonnelEtab['idEtablissementPersonnel'];
			$idCat = $_POST['lierCategorie'];
			$file = null;

			ajoutQuestion($question, $lier, $multi, $idEtab, $idCat, $file);
			$questionId1 = getIdQuestion($question);
			$questionId = $questionId1['idQuestion'];
			if(is_uploaded_file($_FILES['fileq']['tmp_name'])) {
				
				$file_name = $_FILES['fileq']['name'];
				$dest=__DIR__."/../res/questions/question".$questionId.'.'.substr($_FILES['fileq']['name'],-3,3);
				$file = 'question'.$questionId.'.'.substr($_FILES['fileq']['name'],-3,3);
				move_uploaded_file($_FILES['fileq']['tmp_name'], $dest);
			
			updateName($questionId,$file);
			}
			
			if($_POST['reponse1'] != "") {
				if($_POST['verif']  == 1) {
					ajoutReponse($_POST['reponse1'],$questionId,'VRAI');
				} else {
					ajoutReponse($_POST['reponse1'],$questionId,"FAUX");
				}
			}
			if($_POST['reponse2'] != "") {
				if($_POST['verif']  == 2) {
					ajoutReponse($_POST['reponse2'],$questionId,"VRAI");
				} else {
					ajoutReponse($_POST['reponse2'],$questionId,"FAUX");
				}
			}
			if($_POST['reponse3'] != "") {
				if($_POST['verif'] == 3) {
					ajoutReponse($_POST['reponse3'],$questionId,"VRAI");
				} else {
					ajoutReponse($_POST['reponse3'],$questionId,"FAUX");
				}
			}
			if($_POST['reponse4'] != "") {
				if($_POST['verif'] == 4) {
					ajoutReponse($_POST['reponse4'],$questionId,"VRAI");
				} else {
					ajoutReponse($_POST['reponse4'],$questionId,"FAUX");
				}
			}
			
			if(is_uploaded_file($_FILES['filer']['tmp_name'])) {
				$file_name = $_FILES['filer']['name'];
				$dest=__DIR__."/../res/reponses/reponse".$questionId.'.'.substr($_FILES['filer']['name'],-3,3);
				$file = 'reponse'.$questionId.'.'.substr($_FILES['filer']['name'],-3,3);
				move_uploaded_file($_FILES['filer']['tmp_name'], $dest);
				updateReponse($questionId,$file);
			}
			
			$_SESSION['ajtQ'] = True;
			
			
			
			echo "<script>window.location.href='index.php?uc=gestion&action=questions'</script>";
			break;
		} else {
			$_SESSION['ajtQ'] = False;
			echo "<script>window.location.href='index.php?uc=gestion&action=questions'</script>";
			break;

		}
		case "modifierQuestion":
		
			$numQuestion = $_GET['num'];
			$lesCategories = getCategories();
			$lesPatients = getPatientEtab($_SESSION['etabPerso']);
			$lesQuestions = getQuestions($_SESSION['etabPerso']);
			if(getQuestionPatient($numQuestion,$_SESSION['etabPerso'])[0]== "1") {
				$laQuestion = getQuestionById($numQuestion,$_SESSION['etabPerso']);
			} else {
				$laQuestion = getQuestionById2($numQuestion,$_SESSION['etabPerso']);
			}
			$lesReponses = getReponses($numQuestion);
			$_SESSION['modification'] = true;
			require "vues/v_questions.php";
			break;
	case "saveQuestion":
		unset($_SESSION['modification']);
		$id = $_GET['num'];
		deleteReponse($id);
		deleteQuestion($id);
		if(isset($_POST['reponse1']) && isset($_POST['question']) && isset($_POST['lierCategorie'])) {
			$multi = 0;
			if($_POST['reponse2'] != "" || $_POST['reponse3'] != "" || $_POST['reponse4'] != "")  { $multi = 1; }
			$idPersonnel = $_SESSION['idPerso'];
			$idPersonnelEtab = getIdPersonnelEtab($idPersonnel);
			$question = $_POST['question'];
			$reponse = $_POST['reponse1'];
			$lier = $_POST['idPatientQuestion'];
			$idEtab = $idPersonnelEtab['idEtablissementPersonnel'];
			$idCat = $_POST['lierCategorie'];
			$file = null;

			ajoutQuestion($question, $lier, $multi, $idEtab, $idCat, $file);
			$questionId1 = getIdQuestion($question);
			$questionId = $questionId1['idQuestion'];
			if(is_uploaded_file($_FILES['fileq']['tmp_name'])) {
				
				$file_name = $_FILES['fileq']['name'];
				$dest=__DIR__."/../res/questions/question".$questionId.'.'.substr($_FILES['fileq']['name'],-3,3);
				$file = 'question'.$questionId.'.'.substr($_FILES['fileq']['name'],-3,3);
				move_uploaded_file($_FILES['fileq']['tmp_name'], $dest);
			
			updateName($questionId,$file);
			}
			
			if($_POST['reponse1'] != "") {
				if($_POST['verif']  == 1) {
					ajoutReponse($_POST['reponse1'],$questionId,'VRAI');
				} else {
					ajoutReponse($_POST['reponse1'],$questionId,"FAUX");
				}
			}
			if($_POST['reponse2'] != "") {
				if($_POST['verif']  == 2) {
					ajoutReponse($_POST['reponse2'],$questionId,"VRAI");
				} else {
					ajoutReponse($_POST['reponse2'],$questionId,"FAUX");
				}
			}
			if($_POST['reponse3'] != "") {
				if($_POST['verif'] == 3) {
					ajoutReponse($_POST['reponse3'],$questionId,"VRAI");
				} else {
					ajoutReponse($_POST['reponse3'],$questionId,"FAUX");
				}
			}
			if($_POST['reponse4'] != "") {
				if($_POST['verif'] == 4) {
					ajoutReponse($_POST['reponse4'],$questionId,"VRAI");
				} else {
					ajoutReponse($_POST['reponse4'],$questionId,"FAUX");
				}
			}
			
			if(is_uploaded_file($_FILES['filer']['tmp_name'])) {
				$file_name = $_FILES['filer']['name'];
				$dest=__DIR__."/../res/reponses/reponse".$questionId.'.'.substr($_FILES['filer']['name'],-3,3);
				$file = 'reponse'.$questionId.'.'.substr($_FILES['filer']['name'],-3,3);
				move_uploaded_file($_FILES['filer']['tmp_name'], $dest);
				updateReponse($questionId,$file);
			}
			
			$_SESSION['ajtQ'] = True;
			
			
			
			echo "<script>window.location.href='index.php?uc=gestion&action=questions'</script>";
			break;
		} else {
			$_SESSION['ajtQ'] = False;
			echo "<script>window.location.href='index.php?uc=gestion&action=questions'</script>";
			break;

		}
	
	case "supprQuestion":
		$id = $_GET['num'];
		deleteReponse($id);
		deleteQuestion($id);
		echo "<script>window.location.href='index.php?uc=gestion&action=questions'</script>";
			break;
	case "admin":
		unset($_SESSION['modification']);
		$lesAdmins = getLesAdmins($_SESSION['etabPerso']);
		require "vues/v_admin.php";
		break;

	case "ajoutAdmin":
		$lesAdmins = getLesAdmins($_SESSION['etabPerso']);
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$mail = $_POST['mail'];
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];

		if(isset($nom) && isset($prenom) && isset($mail) && isset($login) && isset($mdp)) {
			if(strlen($nom) <= 16 && strlen($mdp) >= 8) {
				
			
					$mdp = md5($mdp);
					ajoutAdmin($nom,$prenom,$mail,$login,$mdp,$_SESSION['etabPerso']);

			}
		}
		echo "<script>window.location.href='index.php?uc=gestion&action=admin'</script>";
		break;

	case "modifierAdmin":

		$admin = $_GET['admin'];
		$lesAdmins = getLesAdmins($_SESSION['etabPerso']);
		$unAdmin = getAdminById($_SESSION['etabPerso'], $admin);
		$_SESSION['modification'] = true;
		require "vues/v_admin.php";
		break;

	case "saveAdmin":
		unset($_SESSION['modification']);

		$id = $_GET['admin'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$mail = $_POST['mail'];
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];

		if(isset($nom) && isset($prenom) && isset($mail) && isset($login) && isset($mdp)) {
			if(strlen($nom) <= 16 && strlen($mdp) >= 8) {
				
			
					$mdp = md5($mdp);
					updateAdmin($nom,$prenom,$mail,$login,$mdp,$_SESSION['etabPerso'],$id);
					
					

			}
		}

		echo "<script>window.location.href='index.php?uc=gestion&action=admin'</script>";
		break;

	case "supprAdmin":
		deleteAdmin($_GET['admin'],$_SESSION['etabPerso']);
		echo "<script>window.location.href='index.php?uc=gestion&action=admin'</script>";
		echo "hehe";
		break;

	case "modifierSite":
		if($_POST['selectcouleur'] != "0") {
			$color = $_POST["selectcouleur"];
			saveColorSite($color,$_SESSION['etabPerso']);
		}
		
		if($_POST['nom'] != "" && $_POST['mail'] != "" && $_POST['adresse'] != "" && $_POST['cp'] != "" && $_POST['ville'] != "" && $_POST['tel'] != "") {
			$nom = $_POST["nom"];
			$mail = $_POST["mail"];
			$adresse = $_POST['adresse'];
			$cp = $_POST['cp'];
			$ville = $_POST['ville'];
			$tel = $_POST['tel'];
			saveSite($nom,$adresse,$cp,$ville,$tel,$mail,$_SESSION['etabPerso']);
		}
		$file = null;
		if(is_uploaded_file($_FILES['filelogo']['tmp_name'])) {
			$idEtab = $_SESSION['etabPerso'];
			$file_name = $_FILES['filelogo']['name'];
			$dest=__DIR__."/../includes/imgs/logo".$idEtab.".png";
			$file = "logo".$idEtab.".png";
			move_uploaded_file($_FILES['filelogo']['tmp_name'], $dest);
			saveLogoSite($file,$_SESSION['etabPerso']);
		}

		echo "<script>window.location.href='index.php?uc=gestion&action=custom'</script>";
		break;
	
	case "custom":
		require "vues/v_custom.php";
		break;
			
	
}
?>

