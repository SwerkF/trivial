-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 juin 2022 à 13:42
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `trivial`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int NOT NULL AUTO_INCREMENT,
  `libelleCategorie` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libelleCategorie`) VALUES
(1, 'Histoire-Géo'),
(2, 'Science'),
(3, 'Loisirs');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
CREATE TABLE IF NOT EXISTS `etablissement` (
  `idEtablissement` int NOT NULL AUTO_INCREMENT,
  `nomEtablissement` varchar(45) NOT NULL,
  `adresseEtablissement` varchar(45) NOT NULL,
  `villeEtablissement` varchar(45) NOT NULL,
  `cpEtablissement` varchar(45) NOT NULL,
  `couleurSite` text NOT NULL,
  `nomSite` text NOT NULL,
  PRIMARY KEY (`idEtablissement`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `etablissement`
--

INSERT INTO `etablissement` (`idEtablissement`, `nomEtablissement`, `adresseEtablissement`, `villeEtablissement`, `cpEtablissement`, `couleurSite`, `nomSite`) VALUES
(1, 'EHPAD SAINT-MICHEL', '5 Rue du Docteur', 'EVREUX', '27023', '#33ccff', 'EPHAD SAINT MICHEL'),
(2, 'UHC PARIS', '4 Rue du loup garou', 'PARIS', '75015', '#33ccff', 'CHU PARIS');

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

DROP TABLE IF EXISTS `partie`;
CREATE TABLE IF NOT EXISTS `partie` (
  `idPartie` int NOT NULL AUTO_INCREMENT,
  `scorePartie` int NOT NULL,
  `statutPartie` int NOT NULL,
  `nbQuestionPartie` int NOT NULL,
  `idPatientPartie` int NOT NULL,
  `idPersonnelPartie` int NOT NULL,
  PRIMARY KEY (`idPartie`,`idPatientPartie`) USING BTREE,
  KEY `fk_partie_patient1_idx` (`idPatientPartie`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `partie`
--

INSERT INTO `partie` (`idPartie`, `scorePartie`, `statutPartie`, `nbQuestionPartie`, `idPatientPartie`, `idPersonnelPartie`) VALUES
(1, 1, 0, 2, 1, 1),
(2, 1, 0, 2, 1, 1),
(3, 1, 0, 2, 29, 1),
(4, 1, 0, 4, 1, 1),
(4, 1, 0, 4, 29, 1),
(5, 1, 1, 1, 1, 1),
(6, 1, 1, 1, 1, 1),
(7, 0, 1, 2, 1, 1),
(7, 1, 1, 2, 29, 1),
(8, 1, 1, 2, 30, 1),
(9, 1, 0, 3, 1, 1),
(10, 1, 1, 2, 29, 1),
(11, 1, 0, 2, 1, 1),
(12, 1, 0, 3, 29, 1),
(13, 3, 1, 3, 30, 1),
(14, 1, 1, 3, 29, 1),
(15, 1, 0, 3, 1, 1),
(16, 0, 0, 3, 30, 1),
(17, 1, 0, 4, 1, 1),
(17, 1, 0, 4, 29, 1),
(18, 1, 0, 2, 29, 1),
(19, 1, 1, 2, 1, 1),
(20, 1, 1, 1, 1, 1),
(21, 0, 1, 1, 1, 1),
(22, 1, 1, 1, 1, 1),
(23, 0, 1, 1, 29, 1),
(24, 1, 1, 1, 1, 1),
(25, 2, 1, 5, 1, 1),
(26, 1, 1, 1, 29, 1),
(27, 2, 1, 2, 1, 1),
(28, 0, 1, 2, 29, 1),
(29, 0, 1, 2, 1, 1),
(30, 1, 1, 1, 1, 1),
(31, 0, 1, 1, 29, 1),
(32, 0, 1, 1, 1, 1),
(33, 0, 1, 1, 29, 1),
(34, 0, 1, 1, 29, 1),
(35, 0, 0, 1, 29, 1),
(36, 1, 1, 1, 1, 1),
(37, 0, 0, 2, 29, 1),
(38, 0, 1, 1, 1, 1),
(39, 0, 0, 2, 1, 1),
(40, 0, 0, 2, 29, 1),
(41, 1, 1, 2, 1, 1),
(42, 1, 1, 2, 29, 1),
(43, 0, 1, 2, 1, 1),
(44, 0, 1, 2, 1, 1),
(45, 0, 0, 2, 1, 1),
(46, 0, 0, 2, 1, 1),
(47, 1, 1, 2, 1, 1),
(48, 0, 0, 2, 29, 1),
(49, 0, 0, 2, 1, 1),
(50, 0, 0, 2, 29, 1),
(51, 0, 0, 4, 29, 1),
(52, 0, 0, 3, 29, 1),
(53, 0, 0, 2, 29, 1),
(54, 0, 0, 3, 1, 1),
(55, 0, 0, 2, 30, 1),
(56, 0, 0, 1, 30, 1),
(57, 0, 0, 3, 29, 1),
(58, 0, 0, 2, 29, 1),
(59, 0, 0, 2, 29, 1),
(60, 2, 1, 2, 29, 1);

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `idPatient` int NOT NULL AUTO_INCREMENT,
  `nomPatient` varchar(45) NOT NULL,
  `prenomPatient` varchar(45) NOT NULL,
  `mailPatient` varchar(45) DEFAULT NULL,
  `idEtablissementPatient` int NOT NULL,
  PRIMARY KEY (`idPatient`),
  KEY `fk_patient_etablissement1_idx` (`idEtablissementPatient`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`idPatient`, `nomPatient`, `prenomPatient`, `mailPatient`, `idEtablissementPatient`) VALUES
(1, 'X', 'Oliwer', NULL, 1),
(29, 'X', 'Yanis', 'Test', 1),
(30, 'BADACHE', 'MOHAMMED', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `idPersonnel` int NOT NULL AUTO_INCREMENT,
  `nomPersonnel` varchar(45) NOT NULL,
  `prenomPersonnel` varchar(45) NOT NULL,
  `mailPersonnel` varchar(45) DEFAULT NULL,
  `loginPersonnel` varchar(45) DEFAULT NULL,
  `passPersonnel` varchar(45) DEFAULT NULL,
  `idEtablissementPersonnel` int NOT NULL,
  PRIMARY KEY (`idPersonnel`,`idEtablissementPersonnel`),
  KEY `fk_personnel_etablissement1_idx` (`idEtablissementPersonnel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`idPersonnel`, `nomPersonnel`, `prenomPersonnel`, `mailPersonnel`, `loginPersonnel`, `passPersonnel`, `idEtablissementPersonnel`) VALUES
(1, 'ADMIN', 'ADMIN', 'oliwer721@gmail.com', 'admin', 'b6edd10559b20cb0a3ddaeb15e5267cc', 1),
(2, 'ADMIN', 'ADMIN', 'test@gmail.com', 'admin1', 'b6edd10559b20cb0a3ddaeb15e5267cc', 2),
(3, 'TEST', 'TEST', 'test1@gmail.com', 'test1', 'b6edd10559b20cb0a3ddaeb15e5267cc', 1);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `idQuestion` int NOT NULL AUTO_INCREMENT,
  `libelleQuestion` varchar(45) NOT NULL,
  `questionPatient` int DEFAULT NULL,
  `repMultiQuestion` tinyint(1) NOT NULL,
  `idEtablissementQuestion` int NOT NULL,
  `idCategorieQuestion` int NOT NULL,
  `fichierQuestion` text,
  PRIMARY KEY (`idQuestion`),
  KEY `fk_question_etablissement1_idx` (`idEtablissementQuestion`),
  KEY `fk_question_categorie1_idx` (`idCategorieQuestion`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`idQuestion`, `libelleQuestion`, `questionPatient`, `repMultiQuestion`, `idEtablissementQuestion`, `idCategorieQuestion`, `fichierQuestion`) VALUES
(168, 'Qui est ce personnage ?', 0, 1, 1, 1, 'question168.png'),
(169, 'La dernière carte graphique ?', 0, 0, 1, 1, ''),
(170, 'Quel est ce batiment ?', 0, 1, 1, 3, 'question170.png'),
(171, 'Mon processeur ?', 0, 1, 1, 3, 'question171.png'),
(172, 'Quel est ce language', 0, 1, 1, 3, 'question172.png');

-- --------------------------------------------------------

--
-- Structure de la table `recupcode`
--

DROP TABLE IF EXISTS `recupcode`;
CREATE TABLE IF NOT EXISTS `recupcode` (
  `idRecupcode` int NOT NULL AUTO_INCREMENT,
  `code` text,
  `expirationRecupcode` text NOT NULL,
  `idPersonnelCode` int NOT NULL,
  PRIMARY KEY (`idRecupcode`),
  KEY `fk_recupcode_personnel1_idx` (`idPersonnelCode`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `idReponse` int NOT NULL AUTO_INCREMENT,
  `libelleReponse` varchar(45) NOT NULL,
  `verifReponse` text NOT NULL,
  `idQuestionReponse` int NOT NULL,
  PRIMARY KEY (`idReponse`,`idQuestionReponse`),
  KEY `fk_reponse_question1_idx` (`idQuestionReponse`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`idReponse`, `libelleReponse`, `verifReponse`, `idQuestionReponse`) VALUES
(153, 'Yasuo', 'FAUX', 168),
(154, 'Qiyana', 'FAUX', 168),
(155, 'Yone', 'VRAI', 168),
(156, 'Moi', 'FAUX', 168),
(157, '3080', 'VRAI', 169),
(158, 'Eclipse Tower', 'VRAI', 170),
(159, 'Fatigué Tower', 'FAUX', 170),
(160, 'Oui', 'FAUX', 170),
(161, 'I4', 'VRAI', 171),
(162, 'I5', 'FAUX', 171),
(163, 'I2', 'FAUX', 171),
(164, 'I9', 'FAUX', 171),
(165, 'PHP', 'VRAI', 172),
(166, 'HTML', 'FAUX', 172),
(167, 'CSS', 'FAUX', 172);

-- --------------------------------------------------------

--
-- Structure de la table `savegame`
--

DROP TABLE IF EXISTS `savegame`;
CREATE TABLE IF NOT EXISTS `savegame` (
  `idSave` int NOT NULL AUTO_INCREMENT,
  `serializedGameSave` longtext CHARACTER SET utf8 COLLATE utf8_general_ci,
  `numJoueurSave` int DEFAULT NULL,
  `numQuestionSave` int DEFAULT NULL,
  `idPartieSave` int NOT NULL,
  `idPersonnelSave` int NOT NULL,
  PRIMARY KEY (`idSave`) USING BTREE,
  KEY `fk_save_partie1_idx` (`idPartieSave`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `savegame`
--

INSERT INTO `savegame` (`idSave`, `serializedGameSave`, `numJoueurSave`, `numQuestionSave`, `idPartieSave`, `idPersonnelSave`) VALUES
(39, 'a:1:{i:0;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}}', 1, 1, 5, 1),
(40, 'a:1:{i:0;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}}', 1, 1, 6, 1),
(41, 'a:2:{i:0;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}i:1;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}}', 2, 2, 7, 1),
(42, 'a:2:{i:0;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}i:1;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}}', 2, 2, 8, 1),
(44, 'a:2:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}}', 2, 2, 10, 1),
(47, 'a:3:{i:0;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}i:2;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}}', 0, 3, 13, 1),
(48, 'a:3:{i:0;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}i:1;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:2;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}}', 0, 3, 14, 1),
(49, 'a:3:{i:0;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}i:2;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}}', 0, 1, 15, 1),
(50, 'a:3:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}i:2;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}}', 0, 1, 16, 1),
(51, 'a:4:{i:0;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}i:2;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:3;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}}', 0, 2, 17, 1),
(52, 'a:2:{i:0;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}}', 0, 1, 18, 1),
(53, 'a:2:{i:0;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}}', 0, 2, 19, 1),
(54, 'a:1:{i:0;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}}', 0, 1, 20, 1),
(55, 'a:1:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}}', 0, 1, 21, 1),
(56, 'a:1:{i:0;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}}', 0, 1, 22, 1),
(57, 'a:1:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}}', 0, 1, 23, 1),
(58, 'a:1:{i:0;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}}', 0, 1, 24, 1),
(59, 'a:5:{i:0;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:2;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}i:3;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}i:4;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}}', 0, 5, 25, 1),
(60, 'a:1:{i:0;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}}', 0, 1, 26, 1),
(61, 'a:2:{i:0;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}}', 0, 2, 27, 1),
(62, 'a:2:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}}', 0, 2, 28, 1),
(63, 'a:2:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}}', 0, 2, 29, 1),
(64, 'a:1:{i:0;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}}', 0, 1, 30, 1),
(65, 'a:1:{i:0;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}}', 0, 0, 31, 1),
(66, 'a:1:{i:0;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}}', 0, 1, 32, 1),
(67, 'a:1:{i:0;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}}', 0, 1, 33, 1),
(68, 'a:1:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 33, 1),
(69, 'a:1:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}}', 0, 1, 34, 1),
(70, 'a:1:{i:0;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 35, 1),
(71, 'a:1:{i:0;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}}', 0, 1, 36, 1),
(72, 'a:2:{i:0;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}}', 0, 1, 37, 1),
(73, 'a:1:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}}', 0, 1, 38, 1),
(74, 'a:2:{i:0;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}i:1;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}}', 0, 1, 39, 1),
(75, 'a:2:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}}', 0, 0, 40, 1),
(76, 'a:2:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}}', 0, 2, 41, 1),
(77, 'a:2:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}}', 0, 2, 42, 1),
(78, 'a:2:{i:0;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 43, 1),
(79, 'a:2:{i:0;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 44, 1),
(80, 'a:2:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 45, 1),
(81, 'a:2:{i:0;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 46, 1),
(82, 'a:2:{i:0;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}i:1;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 46, 1),
(83, 'a:2:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}}', 0, 2, 47, 1),
(84, 'a:2:{i:0;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 48, 1),
(85, 'a:2:{i:0;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}i:1;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 48, 1),
(86, 'a:2:{i:0;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}}', 0, 0, 48, 1),
(87, 'a:2:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 48, 1),
(88, 'a:2:{i:0;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 49, 1),
(89, 'a:2:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}}', 0, 0, 50, 1),
(90, 'a:4:{i:0;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}i:2;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}i:3;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 51, 1),
(91, 'a:3:{i:0;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}i:1;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}i:2;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 52, 1),
(92, 'a:2:{i:0;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 53, 1),
(93, 'a:3:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}i:2;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 54, 1),
(94, 'a:2:{i:0;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}i:1;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 55, 1),
(95, 'a:1:{i:0;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 56, 1),
(96, 'a:3:{i:0;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}i:2;a:6:{i:0;s:3:\"172\";i:1;s:20:\"Quel est ce language\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question172.png\";i:4;a:3:{i:0;a:2:{i:0;s:3:\"PHP\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:4:\"HTML\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"CSS\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 57, 1),
(97, 'a:2:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}}', 0, 1, 58, 1),
(98, 'a:2:{i:0;a:6:{i:0;s:3:\"171\";i:1;s:16:\"Mon processeur ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question171.png\";i:4;a:4:{i:0;a:2:{i:0;s:2:\"I4\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:2:\"I5\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:2:\"I2\";i:1;s:4:\"FAUX\";}i:3;a:2:{i:0;s:2:\"I9\";i:1;s:4:\"FAUX\";}}}i:1;a:6:{i:0;s:3:\"170\";i:1;s:22:\"Quel est ce batiment ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question170.png\";i:4;a:3:{i:0;a:2:{i:0;s:13:\"Eclipse Tower\";i:1;s:4:\"VRAI\";}i:1;a:2:{i:0;s:14:\"Fatigué Tower\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:3:\"Oui\";i:1;s:4:\"FAUX\";}}}}', 0, 0, 59, 1),
(99, 'a:2:{i:0;a:6:{i:0;s:3:\"169\";i:1;s:30:\"La dernière carte graphique ?\";i:2;s:1:\"0\";i:3;s:1:\"0\";i:5;s:0:\"\";i:4;a:1:{i:0;a:2:{i:0;s:4:\"3080\";i:1;s:4:\"VRAI\";}}}i:1;a:6:{i:0;s:3:\"168\";i:1;s:23:\"Qui est ce personnage ?\";i:2;s:1:\"0\";i:3;s:1:\"1\";i:5;s:15:\"question168.png\";i:4;a:4:{i:0;a:2:{i:0;s:5:\"Yasuo\";i:1;s:4:\"FAUX\";}i:1;a:2:{i:0;s:6:\"Qiyana\";i:1;s:4:\"FAUX\";}i:2;a:2:{i:0;s:4:\"Yone\";i:1;s:4:\"VRAI\";}i:3;a:2:{i:0;s:3:\"Moi\";i:1;s:4:\"FAUX\";}}}}', 0, 2, 60, 1);

-- --------------------------------------------------------

--
-- Structure de la table `saveplayer`
--

DROP TABLE IF EXISTS `saveplayer`;
CREATE TABLE IF NOT EXISTS `saveplayer` (
  `idPlayerSave` int NOT NULL AUTO_INCREMENT,
  `serializedPlayer` longtext CHARACTER SET utf8 COLLATE utf8_general_ci,
  `idSaveSaveGame` int NOT NULL,
  PRIMARY KEY (`idPlayerSave`),
  KEY `fk_savePlayer_saveGame1_idx` (`idSaveSaveGame`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `saveplayer`
--

INSERT INTO `saveplayer` (`idPlayerSave`, `serializedPlayer`, `idSaveSaveGame`) VALUES
(36, 'a:1:{i:0;a:4:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:1;i:3;s:1:\"1\";}}', 39),
(37, 'a:1:{i:0;a:4:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:1;i:3;s:1:\"1\";}}', 40),
(38, 'a:2:{i:0;a:4:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:0;i:3;s:1:\"1\";}i:1;a:4:{i:0;i:1;i:1;s:7:\"X Yanis\";i:2;i:1;i:3;s:2:\"29\";}}', 41),
(39, 'a:1:{i:0;a:4:{i:0;i:0;i:1;s:16:\"BADACHE MOHAMMED\";i:2;i:1;i:3;s:2:\"30\";}}', 42),
(41, 'a:1:{i:0;a:4:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:1;i:3;s:2:\"29\";}}', 44),
(44, 'a:1:{i:0;a:4:{i:0;i:0;i:1;s:16:\"BADACHE MOHAMMED\";i:2;i:3;i:3;s:2:\"30\";}}', 47),
(45, 'a:1:{i:0;a:4:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:1;i:3;s:2:\"29\";}}', 48),
(46, 'a:1:{i:0;a:4:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:1;i:3;s:1:\"1\";}}', 49),
(47, 'a:1:{i:0;a:4:{i:0;i:0;i:1;s:16:\"BADACHE MOHAMMED\";i:2;i:0;i:3;s:2:\"30\";}}', 50),
(48, 'a:2:{i:0;a:4:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:1;i:3;s:1:\"1\";}i:1;a:4:{i:0;i:1;i:1;s:7:\"X Yanis\";i:2;i:1;i:3;s:2:\"29\";}}', 51),
(49, 'a:1:{i:0;a:4:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:1;i:3;s:2:\"29\";}}', 52),
(50, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:1;i:3;s:1:\"1\";i:4;i:0;}}', 53),
(51, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:1;i:3;s:1:\"1\";i:4;i:0;}}', 54),
(52, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:0;i:3;s:1:\"1\";i:4;i:0;}}', 55),
(53, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:1;i:3;s:1:\"1\";i:4;i:0;}}', 56),
(54, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 57),
(55, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:1;i:3;s:1:\"1\";i:4;i:0;}}', 58),
(56, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:2;i:3;s:1:\"1\";i:4;i:0;}}', 59),
(57, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:1;i:3;s:2:\"29\";i:4;i:0;}}', 60),
(58, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:2;i:3;s:1:\"1\";i:4;i:0;}}', 61),
(59, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 62),
(60, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:0;i:3;s:1:\"1\";i:4;i:0;}}', 63),
(61, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:1;i:3;s:1:\"1\";i:4;i:0;}}', 64),
(62, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 65),
(63, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:0;i:3;s:1:\"1\";i:4;i:0;}}', 66),
(64, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 67),
(65, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 67),
(66, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 69),
(67, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 70),
(68, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:1;i:3;s:1:\"1\";i:4;i:0;}}', 71),
(69, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 72),
(70, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:0;i:3;s:1:\"1\";i:4;i:0;}}', 73),
(71, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:0;i:3;s:1:\"1\";i:4;i:0;}}', 74),
(72, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 75),
(73, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:1;i:3;s:1:\"1\";i:4;i:0;}}', 76),
(74, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:1;i:3;s:2:\"29\";i:4;i:0;}}', 77),
(75, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:0;i:3;s:1:\"1\";i:4;i:0;}}', 78),
(76, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:0;i:3;s:1:\"1\";i:4;i:0;}}', 79),
(77, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:0;i:3;s:1:\"1\";i:4;i:0;}}', 80),
(78, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:0;i:3;s:1:\"1\";i:4;i:0;}}', 81),
(79, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:0;i:3;s:1:\"1\";i:4;i:0;}}', 81),
(80, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:1;i:3;s:1:\"1\";i:4;i:0;}}', 83),
(81, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 84),
(82, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 84),
(83, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 84),
(84, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 84),
(85, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:0;i:3;s:1:\"1\";i:4;i:0;}}', 88),
(86, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 89),
(87, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 90),
(88, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 91),
(89, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 92),
(90, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:8:\"X Oliwer\";i:2;i:0;i:3;s:1:\"1\";i:4;i:0;}}', 93),
(91, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:16:\"BADACHE MOHAMMED\";i:2;i:0;i:3;s:2:\"30\";i:4;i:0;}}', 94),
(92, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:16:\"BADACHE MOHAMMED\";i:2;i:0;i:3;s:2:\"30\";i:4;i:0;}}', 95),
(93, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 96),
(94, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 97),
(95, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:0;i:3;s:2:\"29\";i:4;i:0;}}', 98),
(96, 'a:1:{i:0;a:5:{i:0;i:0;i:1;s:7:\"X Yanis\";i:2;i:2;i:3;s:2:\"29\";i:4;i:0;}}', 99);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `fk_partie_patient1` FOREIGN KEY (`idPatientPartie`) REFERENCES `patient` (`idPatient`);

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_patient_etablissement1` FOREIGN KEY (`idEtablissementPatient`) REFERENCES `etablissement` (`idEtablissement`);

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `fk_personnel_etablissement1` FOREIGN KEY (`idEtablissementPersonnel`) REFERENCES `etablissement` (`idEtablissement`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_categorie1` FOREIGN KEY (`idCategorieQuestion`) REFERENCES `categorie` (`idCategorie`),
  ADD CONSTRAINT `fk_question_etablissement1` FOREIGN KEY (`idEtablissementQuestion`) REFERENCES `etablissement` (`idEtablissement`);

--
-- Contraintes pour la table `recupcode`
--
ALTER TABLE `recupcode`
  ADD CONSTRAINT `fk_recupcode_personnel1` FOREIGN KEY (`idPersonnelCode`) REFERENCES `personnel` (`idPersonnel`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `fk_reponse_question1` FOREIGN KEY (`idQuestionReponse`) REFERENCES `question` (`idQuestion`);

--
-- Contraintes pour la table `savegame`
--
ALTER TABLE `savegame`
  ADD CONSTRAINT `fk_save_partie1` FOREIGN KEY (`idPartieSave`) REFERENCES `partie` (`idPartie`);

--
-- Contraintes pour la table `saveplayer`
--
ALTER TABLE `saveplayer`
  ADD CONSTRAINT `fk_savePlayer_saveGame1` FOREIGN KEY (`idSaveSaveGame`) REFERENCES `savegame` (`idSave`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
