-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 04 Avril 2018 à 15:40
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `questionnaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `id_cour` int(11) NOT NULL AUTO_INCREMENT,
  `titre_cour` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `document` longblob NOT NULL,
  `lien` varchar(50) NOT NULL,
  `id_module` int(20) NOT NULL,
  PRIMARY KEY (`id_cour`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id_cour`, `titre_cour`, `description`, `document`, `lien`, `id_module`) VALUES
(9, ' php', '', 0x74656c65322e706466, 'http://localhost/phpmyadmin/#PMAURL-3:tbl_structur', 25),
(12, 'html', '', 0x74656c65322e706466, 'http//www.html.com', 27),
(13, 'Cours1', '', 0x74656c65322e706466, '', 30),
(14, 'test 1', '', 0x74656c65332e706466, '', 25);

-- --------------------------------------------------------

--
-- Structure de la table `difficulte`
--

CREATE TABLE IF NOT EXISTS `difficulte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `difficulte`
--

INSERT INTO `difficulte` (`id`, `libelle`) VALUES
(1, 'Facile'),
(2, 'Moyen'),
(3, 'Difficile');

-- --------------------------------------------------------

--
-- Structure de la table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id_mail` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sujet` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL,
  `id_prof` int(11) NOT NULL,
  PRIMARY KEY (`id_mail`),
  KEY `message` (`message`),
  KEY `id_prof` (`id_prof`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `email`
--

INSERT INTO `email` (`id_mail`, `nom`, `prenom`, `mail`, `email`, `sujet`, `message`, `id_prof`) VALUES
(1, 'saiidi', 'salem', 'zs@gmail.com', 'salem@gmail.com', 'test oral', 'test de mail', 0),
(2, 'saiidi', 'salem', 'salem@gmail.com', 'oussema@gmail.com', 'test oral', 'rerfrfrfrfrffrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 0),
(3, 'saiidi', 'salem', 'salem@gmail.com', 'oussema@gmail.com', 'ssssssssssss', 'ssssssssssssss', 0);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation` tinyint(1) NOT NULL,
  `id_niveau` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_niveau` (`id_niveau`),
  KEY `id_matiere` (`id_matiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `pseudo`, `password`, `email`, `activation`, `id_niveau`, `id_matiere`) VALUES
(22, 'ghassen ', 'saad', 'ghassen', '91ef49421799838591e48238db6b2447', 'ghassen@gmail.com', 1, 5, 1),
(23, 'rhila', 'sami', 'sami', '4f8de24d6093ac5d25c7cfafc474d49f', 'rhilasami@gmail.com', 1, 5, 3),
(24, 'mabrouki ', 'oussema', 'oussema', 'df665f47d83807952c7481c31c835ce3', 'oussema@gmail.com', 1, 5, 2),
(25, 'eze', 'zs', 'zs', '25ed1bcb423b0b7200f485fc5ff71c8e', 'zs@gmail.com', 0, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_derniere_reponse` datetime NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Contenu de la table `forum`
--

INSERT INTO `forum` (`id`, `message`, `date_derniere_reponse`, `pseudo`) VALUES
(47, 'gkgkgkk', '0000-00-00 00:00:00', 'Hammami'),
(48, 'efzfezfzee', '0000-00-00 00:00:00', 'Saiidi'),
(49, ',,,,,,,,,,,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkk', '2017-06-16 07:53:28', 'Saiidi'),
(50, '', '2017-06-23 05:00:06', 'Saiidi');

-- --------------------------------------------------------

--
-- Structure de la table `master`
--

CREATE TABLE IF NOT EXISTS `master` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `master`
--

INSERT INTO `master` (`id`, `nom`, `prenom`, `pseudo`, `password`) VALUES
(1, 'toufik', 'jadli', 'monta', 'monta');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id_module` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `date_deb` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_session` int(20) NOT NULL,
  PRIMARY KEY (`id_module`),
  KEY `id_session` (`id_session`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`id_module`, `nom`, `date_deb`, `date_fin`, `id_session`) VALUES
(25, 'module1 ', '2017-05-12', '2017-05-20', 18),
(27, 'module2', '2017-05-17', '2017-05-19', 18),
(29, 'module 3', '2017-05-06', '2017-05-20', 18),
(30, 'Module1', '2017-05-23', '2017-05-31', 19);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE IF NOT EXISTS `niveau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`id`, `libelle`) VALUES
(3, '1Ã¨re AnnÃ©e'),
(4, '2Ã¨me AnnÃ©e'),
(5, '3Ã¨me AnnÃ©e');

-- --------------------------------------------------------

--
-- Structure de la table `passer`
--

CREATE TABLE IF NOT EXISTS `passer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` int(11) NOT NULL,
  `id_questionnaire` int(11) NOT NULL,
  `note` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_etudiant` (`id_etudiant`),
  KEY `id_questionnaire` (`id_questionnaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `passer`
--

INSERT INTO `passer` (`id`, `id_etudiant`, `id_questionnaire`, `note`) VALUES
(1, 23, 36, 1),
(2, 23, 34, 0);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE IF NOT EXISTS `professeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `activation` tinyint(1) NOT NULL,
  `id_mail` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_niveau` (`id_niveau`),
  KEY `id_matiere` (`id_matiere`),
  KEY `id_niveau_2` (`id_niveau`),
  KEY `id_matiere_2` (`id_matiere`),
  KEY `id_mail` (`id_mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`id`, `nom`, `prenom`, `pseudo`, `password`, `id_matiere`, `id_niveau`, `email`, `image`, `activation`, `id_mail`) VALUES
(23, 'Jmil', 'Monjia', 'monjia', 'f050d337a2c68211129b5dbe56d5f69f', 1, 5, 'monjia@gmail.com', 'default.png', 0, 0),
(24, 'Saiidi', 'Salem', 'salem', 'fa0612a2a952fa001aca35e3f6fe7ef3', 2, 5, 'salemabidi@gmail.com', 'default.png', 1, 0),
(25, 'Hammami', 'Walid', 'walid', '992054a407ee4c3978ace4088908acf4', 3, 5, 'Walid@gmail.com', 'default.png', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) NOT NULL,
  `id_questionnaire` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_questionnaire` (`id_questionnaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id`, `contenu`, `id_questionnaire`) VALUES
(57, 'test1', 34),
(59, 'az', 36),
(60, 'qcqcc', 37),
(61, 'er', 38);

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

CREATE TABLE IF NOT EXISTS `questionnaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_matiere` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL,
  `id_difficulte` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `activation` tinyint(4) NOT NULL,
  `duree` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_matiere` (`id_matiere`),
  KEY `id_niveau` (`id_niveau`),
  KEY `id_difficulte` (`id_difficulte`),
  KEY `id_prof` (`id_prof`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `id_matiere`, `id_niveau`, `id_difficulte`, `id_prof`, `libelle`, `activation`, `duree`) VALUES
(34, 2, 5, 3, 24, 'test1', 1, 1),
(36, 2, 5, 1, 24, 'test', 1, 0),
(37, 3, 5, 1, 25, 'TestPHP', 1, 1),
(38, 2, 5, 1, 24, 'testPHP', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reponceforum`
--

CREATE TABLE IF NOT EXISTS `reponceforum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date_derniere_reponse` datetime NOT NULL,
  `id_forum` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_forum`),
  KEY `id_forum` (`id_forum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `reponceforum`
--

INSERT INTO `reponceforum` (`id`, `pseudo`, `message`, `date_derniere_reponse`, `id_forum`) VALUES
(1, 'Saiidi', 'azdzadadzadazd', '0000-00-00 00:00:00', 48),
(2, 'Saiidi', 'lkjjhnnnnnnnnnnnn', '2017-06-16 07:53:17', 47);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE IF NOT EXISTS `reponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0',
  `id_question` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_question` (`id_question`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=177 ;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`id`, `contenu`, `etat`, `id_question`) VALUES
(157, '1', 0, 57),
(158, '2', 0, 57),
(159, '3', 1, 57),
(160, '4', 0, 57),
(165, 'a', 0, 59),
(166, 's', 1, 59),
(167, 'e', 0, 59),
(168, 'e', 0, 59),
(169, 'scsc', 1, 60),
(170, 'fdFD', 0, 60),
(171, 'fd', 0, 60),
(172, 'fd', 0, 60),
(173, 'tr', 1, 61),
(174, 'tr', 0, 61),
(175, 'tr', 0, 61),
(176, 'tr', 0, 61);

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `section`
--

INSERT INTO `section` (`id`, `libelle`, `image`) VALUES
(1, 'RSI', 'math.png'),
(2, 'MDW', 'physique.png'),
(3, 'DSI', 'info.png');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id_session` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `date_deb` date NOT NULL,
  `date_fin` date NOT NULL,
  `activation` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  PRIMARY KEY (`id_session`),
  KEY `id_niveau` (`id_niveau`),
  KEY `id_prof` (`id_prof`),
  KEY `id_matiere` (`id_matiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `session`
--

INSERT INTO `session` (`id_session`, `nom`, `date_deb`, `date_fin`, `activation`, `id_niveau`, `id_prof`, `id_matiere`) VALUES
(18, 'session1', '2017-05-15', '2017-05-20', 1, 5, 24, 2),
(19, 'session1', '2017-05-23', '2017-06-04', 1, 5, 25, 3);

-- --------------------------------------------------------

--
-- Structure de la table `tbllogin`
--

CREATE TABLE IF NOT EXISTS `tbllogin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(150) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ujis AUTO_INCREMENT=4 ;

--
-- Contenu de la table `tbllogin`
--

INSERT INTO `tbllogin` (`id`, `nom`, `password`, `fullname`) VALUES
(1, 'jmmaguigad', 'espionage28', 'John Manuel Macatuggal Maguigad'),
(2, 'joe', 'joe123', 'joe joe joe jr.'),
(3, 'salem', 'salem', 'salem abidi');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id_test` int(11) NOT NULL AUTO_INCREMENT,
  `titre_test` varchar(50) NOT NULL,
  `date_deb` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_module` int(20) NOT NULL,
  PRIMARY KEY (`id_test`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`id_test`, `titre_test`, `date_deb`, `date_fin`, `id_module`) VALUES
(1, 'test1', '2017-05-10', '2017-05-18', 16);

-- --------------------------------------------------------

--
-- Structure de la table `user_chat_messages`
--

CREATE TABLE IF NOT EXISTS `user_chat_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_content` text NOT NULL,
  `nom` varchar(25) NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `recipient` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `user_chat_messages`
--

INSERT INTO `user_chat_messages` (`id`, `message_content`, `nom`, `message_time`, `recipient`) VALUES
(1, ':b', ':a', '0000-00-00 00:00:00', ':d'),
(2, 'easdasdadad', 'jmmaguigad', '2014-01-05 16:00:00', 'joe'),
(3, 'dasdad', 'jmmaguigad', '2014-01-05 16:00:00', 'joe'),
(4, 'dasdasd', 'jmmaguigad', '0000-00-00 00:00:00', 'joe'),
(5, 'dasdad', 'jmmaguigad', '0000-00-00 00:00:00', 'joe'),
(6, 'tessssssssssssssst', 'salem', '2017-06-08 06:17:23', 'walid'),
(10, 'szszsz', 'Hammami', '0000-00-00 00:00:00', 'Saiidi'),
(12, 'test finale', 'jmil', '2017-06-22 06:12:24', 'Hammami');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id`),
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`id_matiere`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `passer`
--
ALTER TABLE `passer`
  ADD CONSTRAINT `passer_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `passer_ibfk_2` FOREIGN KEY (`id_questionnaire`) REFERENCES `questionnaire` (`id`);

--
-- Contraintes pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD CONSTRAINT `professeur_ibfk_1` FOREIGN KEY (`id_matiere`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `professeur_ibfk_2` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`id_questionnaire`) REFERENCES `questionnaire` (`id`);

--
-- Contraintes pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `questionnaire_ibfk_3` FOREIGN KEY (`id_difficulte`) REFERENCES `difficulte` (`id`),
  ADD CONSTRAINT `questionnaire_ibfk_5` FOREIGN KEY (`id_matiere`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questionnaire_ibfk_6` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questionnaire_ibfk_7` FOREIGN KEY (`id_difficulte`) REFERENCES `difficulte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questionnaire_ibfk_8` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
