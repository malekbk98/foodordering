-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 07 déc. 2019 à 20:42
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
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`caid`),
  KEY `eid` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`caid`, `total`, `cid`) VALUES
(1, 100000, 1);

-- --------------------------------------------------------

--
-- Structure de la table `creditcart`
--

DROP TABLE IF EXISTS `creditcart`;
CREATE TABLE IF NOT EXISTS `creditcart` (
  `ccid` int(11) NOT NULL AUTO_INCREMENT,
  `num` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `ccv` int(11) NOT NULL,
  PRIMARY KEY (`ccid`)
) ENGINE=InnoDB AUTO_INCREMENT=1327 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `creditcart`
--

INSERT INTO `creditcart` (`ccid`, `num`, `date`, `ccv`) VALUES
(1325, '3215648975461231654', '2019-12-10', 132),
(1326, '741236985241852', '2019-12-21', 123);

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(40) NOT NULL,
  `last_name` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `ccid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `pic` int(50) NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `email` (`email`),
  KEY `ccid` (`ccid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`cid`, `first_name`, `last_name`, `email`, `pwd`, `phone`, `adress`, `ccid`, `status`, `pic`) VALUES
(1, 'moncef', 0, 'moncef@gmail.com', 'azerty', 7896321, 'bizerte', 1325, 0, 0),
(2, 'ahmed', 0, 'ahmed@gmail.com', 'poiuy', 478965, 'bizerte', 1326, 1, 0);

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
  `vid` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `pic` varchar(50) NOT NULL,
  PRIMARY KEY (`eid`),
  UNIQUE KEY `email` (`email`),
  KEY `vid` (`vid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`eid`, `name`, `phone`, `email`, `pwd`, `position`, `vid`, `status`, `pic`) VALUES
(1, 'Malek Ben Khalifa', 55329217, 'malekbk98@gmail.com', 'azerty', 'Admin', NULL, 0, '2.jpg'),
(2, 'Amine Ben Slema', 24156478, 'aminebenslama10@gmail.com', 'azerty', 'Dilevery', 3, 1, '3.jpg'),
(3, 'Semir', 78945612, 'Semir@gmail.com', '7789', 'Employee', NULL, 2, '3'),
(19, 'achraf ben khalifa', 55329217, 'infomaxbk@gmail.com', 'aze', 'Dilevery', 1, 0, '4'),
(20, 'ma5 aze98', 55329217, 'malekbkd98@gmail.com', 'aze', 'Employee', NULL, 0, '4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `qunt` int(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `caid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`oid`),
  KEY `pid` (`pid`),
  KEY `caid` (`caid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`oid`, `qunt`, `status`, `date`, `caid`, `pid`) VALUES
(1, 15, 0, '2019-12-06 18:34:29', 1, 2),
(2, 3, 3, '2019-12-06 18:34:29', 1, 8),
(3, 32, 0, '2019-12-06 18:46:28', 1, 8),
(4, 645, 3, '2019-12-06 18:46:28', 1, 9);

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

--
-- Déchargement des données de la table `processing`
--

INSERT INTO `processing` (`caid`, `eid`, `veid`, `status`) VALUES
(1, 19, 2, '1'),
(1, 2, 2, '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`pid`, `name`, `description`, `price`, `valid`, `qunt`, `file`) VALUES
(2, 'hargma', 'behya', 3000, 'availbel', 0, 'portfolio-10.jpg'),
(8, 'ma9loub ', 'chwarmlaa', 65983, 'availbel', 798, 'pizza.jpg'),
(9, 'ma9rouna', '7ara', 6532, 'pending', 356, 'portfolio-4.jpg'),
(10, 'lablebi', 'azmleazr', 6598, 'availbel', 645, '');

-- --------------------------------------------------------

--
-- Structure de la table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `vnum` int(10) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Free',
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicle`
--

INSERT INTO `vehicle` (`vid`, `vnum`, `brand`, `model`, `status`) VALUES
(1, 3165235, 'Renault', 'Clio', 'Free'),
(2, 65898, 'Ford', 'Fiesta', 'Free'),
(3, 789465, 'BMW', 'I3', 'Free');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `employe_cart_fk` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`ccid`) REFERENCES `creditcart` (`ccid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`vid`) REFERENCES `vehicle` (`vid`) ON DELETE CASCADE ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
