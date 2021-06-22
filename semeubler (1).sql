-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 22 juin 2021 à 21:59
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `semeubler`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210620174241', '2021-06-20 17:43:08', 148),
('DoctrineMigrations\\Version20210620181129', '2021-06-20 18:11:39', 386);

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`id`, `libelle`) VALUES
(1, 'Meuble'),
(2, 'Electroménager'),
(3, 'Multimédia'),
(4, 'Equipement');

-- --------------------------------------------------------

--
-- Structure de la table `sous_famille`
--

DROP TABLE IF EXISTS `sous_famille`;
CREATE TABLE IF NOT EXISTS `sous_famille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_famille_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_77A8A5E322DFB53` (`id_famille_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sous_famille`
--

INSERT INTO `sous_famille` (`id`, `libelle`, `id_famille_id`) VALUES
(1, 'Chambre/ Literie', 1),
(2, 'Cuisine - salle à manger', 1),
(3, 'Salon', 1),
(4, 'Gros électroménager', 2),
(5, 'Petit électroménager', 2),
(6, 'Image et son', 3),
(7, 'Informatique', 3),
(8, 'Jeux vidéo', 3),
(9, 'Entretien', 4),
(10, 'Loisirs', 4),
(11, 'Matériel de jardin', 4),
(12, 'Matériel de sport', 4),
(13, 'Puériculture', 4);

-- --------------------------------------------------------

--
-- Structure de la table `sous_sous`
--

DROP TABLE IF EXISTS `sous_sous`;
CREATE TABLE IF NOT EXISTS `sous_sous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_sous_famille_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E0CAF0A9881EDE6` (`id_sous_famille_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sous_sous`
--

INSERT INTO `sous_sous` (`id`, `libelle`, `id_sous_famille_id`) VALUES
(1, 'Armoire', 1),
(2, 'Commode', 1),
(3, 'Lit', 1),
(4, 'Lit conviviale', 2),
(5, 'Vaisselle', 2),
(6, 'Linge de table', 2),
(7, 'Canapé', 3),
(8, 'Fauteuil', 3),
(9, 'Pouf / repose-pieds', 3),
(10, 'Cuisinière', 4),
(11, 'Four', 4),
(12, 'Réfrigérateur', 4),
(13, 'Four-Micro ondes', 5),
(14, 'Plaque électrique', 5),
(15, 'Robot culinaire', 5),
(16, 'Télévision', 6),
(17, 'Support TV', 6),
(18, 'Décodeur TNT', 6),
(19, 'Imprimante', 7),
(20, 'Tablette', 7),
(21, 'Console de jeux', 8),
(22, 'Manette', 8),
(23, 'Accessoire de ménage', 9),
(24, 'Planche à repasser', 9),
(25, 'Baby Foot', 10),
(26, 'Tondeuse', 11),
(27, 'Banc de musculation', 12),
(28, 'Haltères', 12),
(29, 'Tapis de sport', 12),
(30, 'Poussette', 13),
(31, 'Chaise haute bébé', 13),
(32, 'Siège auto', 13);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sous_famille`
--
ALTER TABLE `sous_famille`
  ADD CONSTRAINT `FK_77A8A5E322DFB53` FOREIGN KEY (`id_famille_id`) REFERENCES `famille` (`id`);

--
-- Contraintes pour la table `sous_sous`
--
ALTER TABLE `sous_sous`
  ADD CONSTRAINT `FK_E0CAF0A9881EDE6` FOREIGN KEY (`id_sous_famille_id`) REFERENCES `sous_famille` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
