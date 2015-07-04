-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 02 Juillet 2015 à 20:48
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
  `or` bigint(20) NOT NULL DEFAULT '0'
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `rpg_hero`
--
ALTER TABLE `rpg_hero`
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
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `rpg_user`
--
ALTER TABLE `rpg_user`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;