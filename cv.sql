-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 18 Janvier 2017 à 16:23
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cv`
--

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `id_competence` int(5) NOT NULL,
  `titre_c` varchar(45) NOT NULL,
  `competence` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `competence`
--

INSERT INTO `competence` (`id_competence`, `titre_c`, `competence`, `id_utilisateur`) VALUES
(27, 'ggggg', 'ouais', 1),
(28, 'tttt', 'ouais', 1),
(29, 'titre', 'competence', 1);

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `id_experience` int(5) NOT NULL,
  `titre_e` text NOT NULL,
  `sous_titre_e` text NOT NULL,
  `date_e` text NOT NULL,
  `description_e` text NOT NULL,
  `id_competence` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `experience`
--

INSERT INTO `experience` (`id_experience`, `titre_e`, `sous_titre_e`, `date_e`, `description_e`, `id_competence`, `id_utilisateur`) VALUES
(8, 'yyyy', 'yyy', 'yyyy', 'yyyuuuu', 0, 1),
(12, 'sssttt', 'ssss	', 'sss', 'ssss', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_formation` int(11) NOT NULL,
  `titre_f` varchar(45) NOT NULL,
  `sous_titre_f` varchar(45) NOT NULL,
  `date_f` varchar(45) NOT NULL,
  `description_f` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `titre_f`, `sous_titre_f`, `date_f`, `description_f`, `id_utilisateur`) VALUES
(3, 'd', 'd	', 'd', 'd', 1),
(4, 'rrrrr', 'rrrrr	yyyyyy', 'rrrr', 'rrrrrr', 1),
(5, 'ddd', 'ddd	', 'ddd', 'dddd', 1);

-- --------------------------------------------------------

--
-- Structure de la table `loisir`
--

CREATE TABLE `loisir` (
  `id_loisir` int(11) NOT NULL,
  `titre_l` text NOT NULL,
  `description_l` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `loisir`
--

INSERT INTO `loisir` (`id_loisir`, `titre_l`, `description_l`, `id_utilisateur`) VALUES
(9, 'tttt', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `realisation`
--

CREATE TABLE `realisation` (
  `id_realisation` int(11) NOT NULL,
  `titre_r` varchar(45) NOT NULL,
  `sous_titre_r` varchar(45) NOT NULL,
  `date_r` varchar(45) NOT NULL,
  `description_r` varchar(45) NOT NULL,
  `competence_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `titre`
--

CREATE TABLE `titre` (
  `id_titre` int(11) NOT NULL,
  `titre_cv` varchar(50) NOT NULL,
  `accroche` varchar(250) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(6) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `age` smallint(5) NOT NULL,
  `sexe` enum('H','F') NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `etat_civil` enum('M','Mme','Mlle') NOT NULL,
  `avatar` varchar(20) NOT NULL,
  `notes` varchar(200) NOT NULL,
  `statut` varchar(20) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `civilite` enum('célibataire','Marié(e)') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `tel`, `mdp`, `pseudo`, `age`, `sexe`, `adresse`, `code_postal`, `ville`, `pays`, `etat_civil`, `avatar`, `notes`, `statut`, `date_de_naissance`, `civilite`) VALUES
(1, 'Coulibaly', 'Tibilé', 'tibile.coulibaly@lepoles.com', '0778215633', 'tibile92', 'tibile', 21, 'F', '5 allée saint exupéry', '92390', 'villeneuve la garenne', '92390', 'Mlle', 'mauritanie.jpg', 'Permis B', 'Célibataire', '1995-09-08', 'célibataire');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id_competence`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_experience`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_competence` (`id_competence`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`),
  ADD KEY `utilisateur_id` (`id_utilisateur`);

--
-- Index pour la table `loisir`
--
ALTER TABLE `loisir`
  ADD PRIMARY KEY (`id_loisir`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `realisation`
--
ALTER TABLE `realisation`
  ADD PRIMARY KEY (`id_realisation`),
  ADD KEY `competence_id` (`competence_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `titre`
--
ALTER TABLE `titre`
  ADD PRIMARY KEY (`id_titre`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id_competence` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_experience` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `loisir`
--
ALTER TABLE `loisir`
  MODIFY `id_loisir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `realisation`
--
ALTER TABLE `realisation`
  MODIFY `id_realisation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
