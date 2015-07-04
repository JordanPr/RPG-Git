-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 04 Juillet 2015 à 17:17
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `rpg`
--
CREATE DATABASE IF NOT EXISTS `rpg` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rpg`;

-- --------------------------------------------------------

--
-- Structure de la table `rpg_hero`
--

CREATE TABLE `rpg_hero` (
`ID` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `sexe` int(11) NOT NULL,
  `strength` mediumint(9) NOT NULL,
  `agility` mediumint(9) NOT NULL,
  `chance` mediumint(9) NOT NULL,
  `vitality` mediumint(9) NOT NULL DEFAULT '100',
  `xp` bigint(20) NOT NULL DEFAULT '0',
  `pdv` mediumint(9) NOT NULL DEFAULT '100',
  `level` int(11) NOT NULL DEFAULT '1',
  `gold` bigint(20) NOT NULL DEFAULT '0',
  `energy` mediumint(9) NOT NULL DEFAULT '1000'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rpg_hero`
--

INSERT INTO `rpg_hero` (`ID`, `pseudo`, `sexe`, `strength`, `agility`, `chance`, `vitality`, `xp`, `pdv`, `level`, `gold`, `energy`) VALUES
(1, 'r3myx', 0, 4, 3, 3, 100, 0, 100, 1, 0, 1000),
(2, 'Remy', 0, 4, 3, 3, 100, 0, 100, 1, 0, 1000);

-- --------------------------------------------------------

--
-- Structure de la table `rpg_object`
--

CREATE TABLE `rpg_object` (
`ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(50) NOT NULL,
  `ratio` float NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rpg_tool`
--

CREATE TABLE `rpg_tool` (
`ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `degat` int(11) NOT NULL DEFAULT '0',
  `strength` int(11) NOT NULL DEFAULT '0',
  `agility` int(11) NOT NULL DEFAULT '0',
  `vitality` int(11) NOT NULL DEFAULT '0',
  `chance` int(11) NOT NULL DEFAULT '0',
  `picture` varchar(50) NOT NULL,
  `ratio` float NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rpg_user`
--

CREATE TABLE `rpg_user` (
`ID` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rpg_user`
--

INSERT INTO `rpg_user` (`ID`, `pseudo`, `mdp`, `email`, `type`) VALUES
(1, '', '', '', 0),
(2, 'Remy', 'test', 'remypenet@hotmail.fr', 2),
(3, 'r3myx', 'yolo', 'tes@gmail.com', 0),
(4, 'trotro', 'trotro', 'trotro@gmail.com', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `rpg_hero`
--
ALTER TABLE `rpg_hero`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `rpg_object`
--
ALTER TABLE `rpg_object`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `rpg_tool`
--
ALTER TABLE `rpg_tool`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `rpg_user`
--
ALTER TABLE `rpg_user`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `rpg_hero`
--
ALTER TABLE `rpg_hero`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `rpg_object`
--
ALTER TABLE `rpg_object`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `rpg_tool`
--
ALTER TABLE `rpg_tool`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `rpg_user`
--
ALTER TABLE `rpg_user`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;