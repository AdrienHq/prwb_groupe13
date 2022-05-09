-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 26 Mai 2016 à 16:14
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `prwb_groupe13`
--
CREATE DATABASE IF NOT EXISTS `prwb_groupe13` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `prwb_groupe13`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `titre` varchar(50) NOT NULL,
  `idc` int(11) NOT NULL AUTO_INCREMENT,
  `suppr` tinyint(1) NOT NULL,
  PRIMARY KEY (`idc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`titre`, `idc`, `suppr`) VALUES
('musique', 1, 0),
('vetement', 2, 0),
('electronique', 3, 0),
('enfant', 4, 0),
('test', 5, 0),
('test', 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `idu` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  UNIQUE KEY `idp` (`idp`),
  UNIQUE KEY `idu_2` (`idu`,`idp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`idu`, `idp`, `quantite`) VALUES
(29, 3, 2),
(29, 9, 2),
(29, 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `idp` int(11) NOT NULL,
  `photo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `suppr` tinyint(1) NOT NULL,
  `productkey` int(11) NOT NULL,
  KEY `IDP` (`idp`),
  KEY `productKey` (`productkey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`idp`, `photo`, `suppr`, `productkey`) VALUES
(1, 'img/cm88-neonsunset.jpg', 0, 1),
(2, 'img/dynatron-escapevelocity.jpg', 0, 2),
(3, 'img/lazerhawk-visitors.jpg', 0, 3),
(4, 'img/lueurverte-crystalica.jpg', 0, 4),
(5, 'img/mitchmurder-glasscities.jpg', 0, 5),
(6, 'img/ogre-caliconoir.jpg', 0, 6),
(7, 'img/perturbator-iamthenight.jpg', 0, 7),
(8, 'img/navigateur-surface.jpg', 0, 8),
(9, 'img/sweat-digitalhand.jpg', 0, 9),
(10, 'img/tshirt-cyberdog.jpg', 0, 10),
(11, 'img/tshirt-robotinside.jpg', 0, 11),
(12, 'img/vest_completecircuitry.jpg', 0, 12);

-- --------------------------------------------------------

--
-- Structure de la table `prodcat`
--

CREATE TABLE IF NOT EXISTS `prodcat` (
  `idc` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `suppr` tinyint(1) NOT NULL,
  KEY `IDC` (`idc`),
  KEY `IDC_2` (`idc`),
  KEY `IDP` (`idp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `prodcat`
--

INSERT INTO `prodcat` (`idc`, `idp`, `suppr`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(1, 4, 0),
(1, 5, 0),
(1, 6, 0),
(1, 7, 0),
(1, 8, 0),
(2, 9, 0),
(2, 10, 0),
(2, 11, 0),
(2, 12, 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `label` varchar(50) NOT NULL,
  `descr` varchar(150) DEFAULT NULL,
  `prix` double NOT NULL,
  `stock` int(11) NOT NULL,
  `idp` int(1) NOT NULL AUTO_INCREMENT,
  `suppr` tinyint(1) NOT NULL,
  PRIMARY KEY (`idp`),
  KEY `IdP` (`idp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`label`, `descr`, `prix`, `stock`, `idp`, `suppr`) VALUES
('Cm88 - Neon sunset', '80`s synthwave', 5, 20, 1, 0),
('Dynatron - Escape velocity', '80`s synthwave', 7, 20, 2, 0),
('Lazerhawk - Visitors', '80`s synthwave', 10, 20, 3, 0),
('Lueur Verte - Crystalica', '80`s synthwave', 6, 20, 4, 0),
('Mitch Murder - Glass cities', '80`s synthwave', 5, 20, 5, 0),
('Ogre - Calico noir', '80`s synthwave', 10, 20, 6, 0),
('Perturbator - I am the night', '80`s synthwave', 8, 20, 7, 0),
('Navigateur - Surface', '80`s synthwave', 5, 20, 8, 0),
('Digital hand', 'sweat', 25, 5, 9, 0),
('Cyberdog', 't-shirt', 20, 15, 10, 0),
('Robotinside', 't-shirt', 16, 3, 11, 0),
('Complete circuitry', 'vest', 15, 9, 12, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `ddn` date NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) DEFAULT '0',
  `suppr` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `prenom`, `ddn`, `pseudo`, `mdp`, `mail`, `tel`, `admin`, `suppr`) VALUES
('brocoli', 'charly', '1986-04-26', 'cocobro', 'a19eefeba647cf47ee5f0c4e76e46301', 'bro@co', '54', 0, 0),
('charles', 'michel', '1986-04-26', 'mimich', 'a19eefeba647cf47ee5f0c4e76e46301', 'm', 'm', 0, 0),
('a', 'mad', '1986-04-26', 'mad', 'a19eefeba647cf47ee5f0c4e76e46301', 'mad@epfc.eu', '025458497', 1, 0),
('lavoine', 'marc', '1986-04-26', 'markiki', 'a19eefeba647cf47ee5f0c4e76e46301', 'marc@m', '8', 0, 0),
('hq', 'adrien', '1986-04-26', 'adri', 'a19eefeba647cf47ee5f0c4e76e46301', '', '', 1, 0),
('attack', 'louise', '1986-04-26', 'loulou', 'a19eefeba647cf47ee5f0c4e76e46301', 'lou@lou', '41484', 0, 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`idu`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`idp`) REFERENCES `produit` (`idp`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`productkey`) REFERENCES `produit` (`idp`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `photo_ibfk_2` FOREIGN KEY (`idp`) REFERENCES `produit` (`idp`) ON DELETE CASCADE;

--
-- Contraintes pour la table `prodcat`
--
ALTER TABLE `prodcat`
  ADD CONSTRAINT `prodcat_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `produit` (`idp`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `prodcat_ibfk_2` FOREIGN KEY (`idc`) REFERENCES `categorie` (`idc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prodcat_ibfk_3` FOREIGN KEY (`idp`) REFERENCES `produit` (`idp`) ON DELETE CASCADE,
  ADD CONSTRAINT `prodcat_ibfk_4` FOREIGN KEY (`idc`) REFERENCES `categorie` (`idc`) ON DELETE CASCADE;
