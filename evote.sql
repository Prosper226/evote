-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 02 Décembre 2020 à 17:35
-- Version du serveur :  10.1.34-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `evote`
--

-- --------------------------------------------------------

--
-- Structure de la table `electeur`
--

CREATE TABLE `electeur` (
  `matricule` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `electeur`
--

INSERT INTO `electeur` (`matricule`, `nom`, `prenom`, `password`) VALUES
(17059, 'SEDGO', 'Prosper', '1234'),
(17060, 'TAPSOBA', 'Awal', 'azer'),
(17061, 'OUEDRAOGO', 'Fadilatou', '1234'),
(17063, 'YONI', 'Jacques', '1234'),
(17065, 'KIRAKOUE', 'Fidel', '1234'),
(17066, 'CAMARA', 'Fatim', '2020'),
(17070, 'MAIGA', 'Ismael', '1234'),
(17071, 'OUEDRAOGO', 'Francois', '1234'),
(18059, 'COULIBALY', 'SIAKA', '1234'),
(19059, 'OUEDRAOGO', 'Dieudonne', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `codeFiliere` varchar(255) NOT NULL,
  `libelleFiliere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `filiere`
--

INSERT INTO `filiere` (`codeFiliere`, `libelleFiliere`) VALUES
('ELM', 'Electromecanique'),
('FC', 'Finances comptabilite'),
('GBM', 'Genie bio-medical'),
('GEII', 'Genie electronique et informatique industruelle'),
('RIT', 'Reseaux Informatiques et Telecommunications'),
('SIR', 'Systeme d''Informations et Reseaux');

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
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`idMembre`, `nom`, `prenom`, `filiere`, `niveau`, `poste`, `parti`) VALUES
(1, 'SEDGO', 'Prosper', 'GBM', 'L2', 'prÃ©sident', 'PART 1'),
(3, 'SEDGO', 'Prosper', 'GBM', 'L2', 'vice-prÃ©sident', 'PART 1'),
(4, 'SEDGO', 'Prosper', 'RIT', 'L3', 'sÃ©cretaire gÃ©nÃ©ral', 'PART 1'),
(5, 'SEDGO', 'Prosper', 'FC', 'L1', 'sÃ©cretaire gÃ©nÃ©ral adjoint', 'PART 1'),
(6, 'SEDGO', 'Prosper', 'FC', 'L2', 'dÃ©lÃ©guÃ© communication', 'PART 1'),
(7, 'SEDGO', 'Prosper', 'SIR', 'L3', 'dÃ©lÃ©guÃ© adjoint communication', 'PART 1'),
(8, 'SEDGO', 'Prosper', 'SIR', 'L3', 'dÃ©lÃ©guÃ© sociaux culturels', 'PART 1'),
(10, 'SEDGO', 'Prosper', 'SIR', 'L2', 'dÃ©lÃ©guÃ© adjoint sociaux culturel', 'PART 1'),
(11, 'SEDGO', 'Prosper', 'SIR', 'L3', 'commissaire aux compte', 'PART 1'),
(12, 'SEDGO', 'Prosper', 'GBM', 'L2', 'commissaire aux compte adjoint', 'PART 1'),
(13, 'SEDGO', 'Prosper', 'GBM', 'L2', 'trÃ©sorier', 'PART 1'),
(14, 'SEDGO', 'Prosper', 'GEII', 'L2', 'trÃ©sorier adjoint', 'PART 1'),
(15, 'SEDGO', 'Prosper', 'GBM', 'L3', 'dÃ©lÃ©guÃ© sport', 'PART 1'),
(16, 'SEDGO', 'Prosper', 'FC', 'L1', 'dÃ©lÃ©guÃ© sport adjoint', 'PART 1'),
(17, 'SEDGO', 'Prosper', 'GBM', 'L2', 'dÃ©lÃ©guÃ© chargÃ© des clubs', 'PART 1'),
(18, 'SEDGO', 'Prosper', 'FC', 'L2', 'dÃ©lÃ©guÃ© adjoint chargÃ© des clubs', 'PART 1'),
(19, 'SEDGO', 'Prosper', 'FC', 'L2', 'prÃ©sident', 'PARTI 2'),
(20, 'SEDGO', 'Prosper', 'GBM', 'L3', 'prÃ©sident', 'UPC'),
(21, 'TAPSOBA ', 'Awal ', 'SIR', 'L3', 'vice-prÃ©sident', 'UPC'),
(22, 'OUÃ©DRAOGO ', 'Fadila ', 'GBM', 'L2', 'prÃ©sident', 'UPDE');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `codeNiveau` varchar(255) NOT NULL,
  `libelleNiveau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `niveau`
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
-- Contenu de la table `parti`
--

INSERT INTO `parti` (`nom_abrege`, `nom_complet`, `proprietaire`, `logo`) VALUES
('PART 1', 'Prosper SEDGO', 17059, 'parti1.png'),
('PARTI 2', 'Parti 2', 17059, 'mpp.jpg'),
('UPC ', 'Union pour le congrÃ¨s ', 17059, 'upc.jpg'),
('UPDE ', 'Vdjsvsjssvsjvsj', 18059, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `matricule` int(11) NOT NULL,
  `parti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vote`
--

INSERT INTO `vote` (`matricule`, `parti`) VALUES
(17059, 'PART 1'),
(17060, 'UPC '),
(17061, 'PARTI 2'),
(17063, 'UPC '),
(17065, 'PARTI 2'),
(17066, 'PART 1'),
(17070, 'UPC '),
(17071, 'UPC '),
(18059, 'PART 1'),
(19059, 'PARTI 2');

--
-- Index pour les tables exportées
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
-- AUTO_INCREMENT pour les tables exportées
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
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
