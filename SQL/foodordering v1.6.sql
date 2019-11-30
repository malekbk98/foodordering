-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 nov. 2019 à 08:02
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `foodordering`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `caid` int(11) NOT NULL AUTO_INCREMENT,
  `total` float NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cid` int(11) NOT NULL,
  `adresseop` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`caid`),
  KEY `eid` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`caid`, `total`, `date`, `cid`, `adresseop`) VALUES
(1, 100000, '2019-11-07 17:31:14', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `pic` int(50) NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`cid`, `name`, `email`, `pwd`, `phone`, `adress`, `pic`) VALUES
(1, 'moncef', 'moncef@gmail.com', 'azerty', 7896321, 'bizerte', 0),
(2, 'ahmed', 'ahmed@gmail.com', 'poiuy', 478965, 'bizerte', 0),
(4, 'Iheb', 'Iheb@gmail.com', 'loco', 12345696, 'bizerte', 0);

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `position` varchar(15) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `pic` varchar(50) NOT NULL,
  PRIMARY KEY (`eid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`eid`, `name`, `phone`, `email`, `pwd`, `position`, `status`, `pic`) VALUES
(1, 'Amine Ben Slema', 24156478, 'aminebenslama10@gmail.com', 'azerty', 'Employee', 0, '2.jpg'),
(2, 'Malek Ben Khalifa', 55329217, 'malekbk98@gmail.com', 'azerty', 'Admin', 0, '2'),
(3, 'Semir', 78945612, 'Semir@gmail.com', '7789', 'Employee', 2, '3'),
(19, 'achraf ben khalifa', 55329217, 'infomaxbk@gmail.com', 'aze', 'Dilevery', 0, '4'),
(20, 'ma5 aze98', 55329217, 'malekbkd98@gmail.com', 'aze', 'Employee', 0, '4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `qunt` int(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `caid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`oid`),
  KEY `pid` (`pid`),
  KEY `caid` (`caid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `processing`
--

DROP TABLE IF EXISTS `processing`;
CREATE TABLE IF NOT EXISTS `processing` (
  `caid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `veid` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  KEY `caid` (`caid`),
  KEY `processing_ibfk_2` (`eid`),
  KEY `processing_ibfk_3` (`veid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `price` float NOT NULL,
  `valid` varchar(15) NOT NULL DEFAULT 'pending',
  `qunt` int(11) NOT NULL,
  `file` varchar(30) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`pid`, `name`, `description`, `price`, `valid`, `qunt`, `file`) VALUES
(2, 'hargma', 'behya', 3000, 'availbel', 0, 'portfolio-10.jpg'),
(3, 'chakchouka', '7ara aaa', 1500, 'availbel', 32, 'portfolio-4.jpg'),
(6, 'pizza', 'bnina', 5000, 'availbel', 789, 'pizza.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `vnum` int(10) NOT NULL,
  `eid` int(11) NOT NULL,
  PRIMARY KEY (`vid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicle`
--

INSERT INTO `vehicle` (`vid`, `vnum`, `eid`) VALUES
(1, 316523, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `employe_cart_fk` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`caid`) REFERENCES `cart` (`caid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_oders_fk` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `processing`
--
ALTER TABLE `processing`
  ADD CONSTRAINT `processing_ibfk_1` FOREIGN KEY (`caid`) REFERENCES `cart` (`caid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `processing_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `processing_ibfk_3` FOREIGN KEY (`veid`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `employe_vehicule_fk` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
