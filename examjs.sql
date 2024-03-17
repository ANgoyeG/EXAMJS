-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 17 mars 2024 à 22:22
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `examjs`
--

-- --------------------------------------------------------

--
-- Structure de la table `choices`
--

CREATE TABLE `choices` (
  `choice_id` int(11) NOT NULL,
  `ID` int(11) DEFAULT NULL,
  `choice_text` text DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONS POUR LA TABLE `choices`:
--   `ID`
--       `questions` -> `ID`
--   `question_id`
--       `questions` -> `ID`
--   `ID`
--       `questions` -> `ID`
--

--
-- Déchargement des données de la table `choices`
--

INSERT INTO `choices` (`choice_id`, `ID`, `choice_text`, `is_correct`, `question_id`) VALUES
(1, 5, 'Vincent van Gogh\r\nLéonard de Vinci\r\nPablo Picasso\r\n', 2, 5),
(2, 3, 'L’océan Atlantique\r\nL’océan Pacifique\r\nL’océan Arctique\r\n\r\n', 2, 3),
(3, 1, 'Abidjan\r\nMilan \r\nParis\r\n', 3, 1),
(4, 4, '“Unie dans la diversité”\r\n“In God We Trust”\r\n“Liberté, Égalité, Fraternité”\r\n\r\n\r\n', 1, 4),
(5, 2, 'William Shakespeare\r\nVictor Hugo\r\nMolière\r\n', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `ID` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `choice1` varchar(255) DEFAULT NULL,
  `choice2` varchar(255) DEFAULT NULL,
  `choice3` varchar(255) DEFAULT NULL,
  `correct_answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONS POUR LA TABLE `questions`:
--   `created_by`
--       `utilisateurs` -> `ID`
--

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`ID`, `question_text`, `created_by`, `choice1`, `choice2`, `choice3`, `correct_answer`) VALUES
(1, 'Quelle est la capitale de la France ?', 1, 'Abidjan', 'Milan', 'Paris', 'Paris'),
(2, 'Qui a écrit la pièce de théâtre “Roméo et Juliette” ?\r\n', NULL, 'William Shakespeare', 'Victor Hugo\r\n\r\n', 'Molière', 'William Shakespeare'),
(3, 'Quel est le plus grand océan du monde ?\r\n\r\n', NULL, 'L’océan Atlantique\r\n', 'L\'océan Pacifique\r\n', 'L’océan Arctique', 'L’océan Pacifique\r\n'),
(4, 'Quelle est la devise de l’Union européenne ?\r\n', NULL, '“Unie dans la diversité”\r\n', '\"In God We Trust”\r\n', '“Liberté, Égalité, Fraternité”\r\n', 'D) “Unie dans la diversité”\r\n'),
(5, 'Quel célèbre peintre a créé “La Joconde” ?\r\n\r\n', NULL, 'Vincent van Gogh\r\n', 'Léonard de Vinci', 'Pablo Picasso', 'Léonard de Vinci');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `role` enum('admin','joueur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONS POUR LA TABLE `utilisateurs`:
--

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `username`, `Password`, `role`) VALUES
(1, 'adja', 'juin2003', 'joueur'),
(2, 'paul', 'juin2003', 'admin'),
(3, 'marie', 'juin123', 'admin'),
(4, 'antoine', 'belle123', 'admin'),
(7, 'Mboup', 'juin123', 'joueur'),
(8, 'Khoudia', 'juin123', 'joueur'),
(9, 'Marr', 'juin123', 'admin'),
(10, 'Rabi', 'juin123', 'joueur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`choice_id`),
  ADD KEY `fk_questions_id` (`ID`),
  ADD KEY `question_id` (`question_id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `created_by` (`created_by`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `questions` (`ID`),
  ADD CONSTRAINT `choices_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`ID`),
  ADD CONSTRAINT `fk_questions_id` FOREIGN KEY (`ID`) REFERENCES `questions` (`ID`);

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `utilisateurs` (`ID`);


--
-- Métadonnées
--
USE `phpmyadmin`;

--
-- Métadonnées pour la table choices
--

--
-- Déchargement des données de la table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'examjs', 'choices', '{\"sorted_col\":\"`question_id` ASC\"}', '2024-03-16 22:07:41');

--
-- Métadonnées pour la table questions
--

--
-- Métadonnées pour la table utilisateurs
--

--
-- Métadonnées pour la base de données examjs
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
