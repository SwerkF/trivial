<?php
if (!isset($_REQUEST['action']))
	$action = "afficher" ;
else
	$action = $_REQUEST['action'] ;


switch ($action)
{

	case "afficher":
		require "vues/v_connexion.php";
		break;
	
	case "verifconnexion":
		$login = $_POST['login'];
		$password = $_POST['pass'];
		if(!$login || !$password) {
			$_SESSION['error'] = "error";
			require "vues/v_connexion.php";
			break;
		} else {
			$blackList = "(/[]~{}|<>;)";

			if(strpbrk($password,$blackList) && strpbrk($login,$blackList) && strlen($password) > 32 && strlen($login) > 32) {
				$_SESSION['error'] = "error";
				require "vues/v_connexion.php";
				break;
			} else {
				$user = verifConnexion($login,md5($password));
				if(!$user) { 
				$_SESSION['error'] = "error";
					require "vues/v_connexion.php";
					break;
				} else {
					$_SESSION['etabPerso'] = $user['idEtablissementPersonnel'];
					$_SESSION['nomPerso'] = $user['nomPersonnel'];
					$_SESSION['prenomPerso'] = $user['prenomPersonnel'];
					$_SESSION['idPerso'] = $user['idPersonnel'];
					$_SESSION['connecter'] = true;
					setcookie('connect', "connexion", time()+3600*48, '/', '', false, false);
					if($login == 'admin') {
						$_SESSION['ADMIN'] = true;
					} else {
						$_SESSION['ADMIN'] = false;
					}
					echo "<script>window.location.href='index.php?uc=accueil&action=afficher'</script>";

					unset($_SESSION['error']);
					break;
				}
				
			}

		}
		
	case "mdpoublie":
		$_SESSION['statusmdp'] = "envoyer";
		require "vues/v_passeoubli.php";
		break;
	
	case "demandemdp":
		$mail = $_POST['mail'];
		if($mail != "" && strpbrk($mail, '@')) {
			$_SESSION['statusmdp'] = "demande";
			$idPersonnel = getIdByMail($mail);
			$token = bin2hex(random_bytes(16));
			$date  = date("Y-m-d H:i:s", strtotime('+30 minutes'));
			codeOubliInsert($token,$date,$idPersonnel['idPersonnel']);
	
			/*$to      = $mail;
			$subject = 'Réinitialisation de mot de passe';
			$message = "Bonjour, voici le lien de reinitialisation de mot de passe : localhost/trivial/index.php?uc=auth&action=saisiemdp&code='.$token.'";
			$headers = 'From: webmaster@example.com'       . "\r\n" .
						 'Reply-To: webmaster@example.com' . "\r\n" .
						 'X-Mailer: PHP/' . phpversion();
			mail($to, $subject, $message, $headers);*/
	
			echo "<a href=index.php?uc=auth&action=saisiemdp&code=$token>localhost/trivial/index.php?uc=auth&action=saisiemdp&code=$token</a>";
			require "vues/v_passeoubli.php";
			break;
		} else {
			$_SESSION['err'] = true;
			header("Location:index.php?uc=auth&action=mdpoublie");
			break;
		}
		
	
	case "saisiemdp":
		$_SESSION['err'] = "";
		$_SESSION['code'] = $_GET['code'];
		$codeVerif = getCodeRecup($_SESSION['code']);
		$date  = date("Y-m-d H:i:s");
		if($codeVerif['expirationRecupcode'] < $date ) {
			deleteRecupCode($_SESSION['code']);
			$_SESSION['statusmdp'] = "expired";
			require "vues/v_passeoubli.php";
			break;
		} else { 
			$_SESSION['statusmdp'] = "saisie";
			require "vues/v_passeoubli.php";
			break;
		}
		

	case "deconnexion":
		require "includes/modeles/deconnexion.php";
		break;

	case "changement":
		$code = $_SESSION['code'];
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		if($pass1 == $pass2 && $pass1 != "" && $pass2 != "") {
			if(strlen($pass1) > 8) {
				$blackList = "(/[]'~{}|<>;)";
				if(strpbrk($pass1,$blackList)) {
					$_SESSION['statusmdp'] == "erreursaisie";
					header("Location:index.php?uc=auth&action=saisiemdp&code=$token>localhost/trivial/index.php?uc=auth&action=saisiemdp&code=$code");
					break;
				} else {
					$_SESSION['statusmdp'] = "reussi";
					$pass = md5($pass1);
					$mail = getMailByToken($_SESSION['code']);
					setNewPassword($pass,$mail['mailPersonnel']);
					deleteRecupCode($_SESSION['code']);
					unset($_SESSION['code']);
					require "vues/v_passeoubli.php";
					break;
				}
			} else {
				$_SESSION['err'] == "erreursaisie";
				header("Location:index.php?uc=auth&action=saisiemdp&code=$token>localhost/trivial/index.php?uc=auth&action=saisiemdp&code=$code");
				break;
			}
		} else {
			$_SESSION['err'] == "erreursaisie";
			header("Location:index.php?uc=auth&action=saisiemdp&code=$token>localhost/trivial/index.php?uc=auth&action=saisiemdp&code=$code");
			break;
		}

	case "choixetab":
		require "vues/v_connexion.php";
		break;
}
?>
