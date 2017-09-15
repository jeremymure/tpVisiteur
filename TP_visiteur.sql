-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 15 Septembre 2017 à 10:33
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `TP visiteur`
--

-- --------------------------------------------------------

--
-- Structure de la table `Absences`
--

CREATE TABLE `Absences` (
  `refVisiteur` int(11) NOT NULL,
  `DateDebut` date NOT NULL,
  `nbjour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Absences`
--

INSERT INTO `Absences` (`refVisiteur`, `DateDebut`, `nbjour`) VALUES
(1, '2017-09-14', 1),
(2, '2017-09-02', 3);

-- --------------------------------------------------------

--
-- Structure de la table `Visiteur`
--

CREATE TABLE `Visiteur` (
  `idVisiteur` int(11) NOT NULL,
  `NomVisiteur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Visiteur`
--

INSERT INTO `Visiteur` (`idVisiteur`, `NomVisiteur`) VALUES
(1, 'Durand'),
(2, 'Mure');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Absences`
--
ALTER TABLE `Absences`
  ADD PRIMARY KEY (`refVisiteur`,`DateDebut`);

--
-- Index pour la table `Visiteur`
--
ALTER TABLE `Visiteur`
  ADD PRIMARY KEY (`idVisiteur`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Absences`
--
ALTER TABLE `Absences`
  ADD CONSTRAINT `FK` FOREIGN KEY (`refVisiteur`) REFERENCES `Visiteur` (`idVisiteur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
