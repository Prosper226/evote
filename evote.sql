-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 13 déc. 2021 à 23:46
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `evote`
--

-- --------------------------------------------------------

--
-- Structure de la table `electeur`
--

CREATE TABLE `electeur` (
  `matricule` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `electeur`
--

INSERT INTO `electeur` (`matricule`, `nom`, `prenom`, `password`, `email`, `numero`) VALUES
(17059, 'SEDGO', 'Prosper', '1234', '', ''),
(17060, 'TAPSOBA', 'Awal', 'azer', '', ''),
(17061, 'OUEDRAOGO', 'Fadilatou', '1234', '', ''),
(17063, 'YONI', 'Jacques', '1234', '', ''),
(17065, 'KIRAKOUE', 'Fidel', '1234', '', ''),
(17066, 'CAMARA', 'Fatim', '2020', '', ''),
(17070, 'MAIGA', 'Ismael', '1234', '', ''),
(17071, 'OUEDRAOGO', 'Francois', '1234', '', ''),
(18059, 'COULIBALY', 'SIAKA', '1234', '', ''),
(19036, 'Bance', 'Moustapha', '1234', 'sidwelbeck@gmail.com', '56611539'),
(19059, 'OUEDRAOGO', 'Dieudonne', '1234', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `codeFiliere` varchar(255) NOT NULL,
  `libelleFiliere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`codeFiliere`, `libelleFiliere`) VALUES
('ELM', 'Electromecanique'),
('FC', 'Finances comptabilite'),
('GBM', 'Genie bio-medical'),
('GEII', 'Genie electronique et informatique industruelle'),
('RIT', 'Reseaux Informatiques et Telecommunications'),
('SIR', 'Systeme d\'Informations et Reseaux');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `idMembre` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `filiere` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `parti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`idMembre`, `nom`, `prenom`, `filiere`, `niveau`, `poste`, `parti`) VALUES
(23, 'SANON', 'Djelil Abdel', 'EBM', 'L3', 'President', 'UPDE');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `codeNiveau` varchar(255) NOT NULL,
  `libelleNiveau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`codeNiveau`, `libelleNiveau`) VALUES
('L1', 'Licence 1'),
('L2', 'Licence 2'),
('L3', 'Licence 3');

-- --------------------------------------------------------

--
-- Structure de la table `parti`
--

CREATE TABLE `parti` (
  `nom_abrege` varchar(255) NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `proprietaire` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `parti`
--

INSERT INTO `parti` (`nom_abrege`, `nom_complet`, `proprietaire`, `logo`) VALUES
('UPDE ', 'UPDE', 19036, 'upde.jpeg'),
('Visionnaire', 'Visionnaire', 17059, 'mpp.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `matricule` int(11) NOT NULL,
  `parti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`matricule`, `parti`) VALUES
(17059, 'UPDE ');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `electeur`
--
ALTER TABLE `electeur`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`codeFiliere`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idMembre`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`codeNiveau`);

--
-- Index pour la table `parti`
--
ALTER TABLE `parti`
  ADD PRIMARY KEY (`nom_abrege`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`matricule`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `electeur`
--
ALTER TABLE `electeur`
  MODIFY `matricule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19060;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
