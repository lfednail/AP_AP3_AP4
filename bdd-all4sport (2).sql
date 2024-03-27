-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 27 mars 2024 à 18:59
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd-all4sport`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` int NOT NULL,
  `nom` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `nbenfants` int NOT NULL,
  `code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C7440455E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `email`, `roles`, `nom`, `prenom`, `telephone`, `datenaissance`, `nbenfants`, `code`, `password`) VALUES
(1, 'jean@jalong.com', 0, 'jalong', 'jalong', NULL, NULL, 0, '38926', 'ebusfhjfv');

-- --------------------------------------------------------

--
-- Structure de la table `clientsports`
--

DROP TABLE IF EXISTS `clientsports`;
CREATE TABLE IF NOT EXISTS `clientsports` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `listesports_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5A9C893719EB6921` (`client_id`),
  KEY `IDX_5A9C893766A6A12D` (`listesports_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int DEFAULT NULL,
  `date` date NOT NULL,
  `prixtotal` double NOT NULL,
  `etat` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_35D4282C19EB6921` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240326161044', '2024-03-26 16:28:51', 1091),
('DoctrineMigrations\\Version20240327184121', '2024-03-27 18:41:38', 223);

-- --------------------------------------------------------

--
-- Structure de la table `enfants`
--

DROP TABLE IF EXISTS `enfants`;
CREATE TABLE IF NOT EXISTS `enfants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int DEFAULT NULL,
  `age` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23E2BAC319EB6921` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entrepot`
--

DROP TABLE IF EXISTS `entrepot`;
CREATE TABLE IF NOT EXISTS `entrepot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lieudisponibilite`
--

DROP TABLE IF EXISTS `lieudisponibilite`;
CREATE TABLE IF NOT EXISTS `lieudisponibilite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `magasin_id` int NOT NULL,
  `produit_id` int DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  `rayon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F793E35620096AE3` (`magasin_id`),
  KEY `IDX_F793E356F347EFB` (`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lieuentrepot`
--

DROP TABLE IF EXISTS `lieuentrepot`;
CREATE TABLE IF NOT EXISTS `lieuentrepot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `entrepot_id` int DEFAULT NULL,
  `produit_id` int DEFAULT NULL,
  `quantite` int NOT NULL,
  `etagere` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etage` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4DC9CEC672831E97` (`entrepot_id`),
  KEY `IDX_4DC9CEC6F347EFB` (`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `listesports`
--

DROP TABLE IF EXISTS `listesports`;
CREATE TABLE IF NOT EXISTS `listesports` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sport` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photos` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

DROP TABLE IF EXISTS `magasin`;
CREATE TABLE IF NOT EXISTS `magasin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produit_id` int NOT NULL,
  `commande_id` int DEFAULT NULL,
  `état` int NOT NULL,
  `quantite` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_24CC0DF2F347EFB` (`produit_id`),
  KEY `IDX_24CC0DF282EA2E54` (`commande_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `photosproduit`
--

DROP TABLE IF EXISTS `photosproduit`;
CREATE TABLE IF NOT EXISTS `photosproduit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produit_id` int DEFAULT NULL,
  `photos` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B29C8CB3F347EFB` (`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sport_id` int NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fournisseur` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29A5EC27AC78BCF8` (`sport_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sociallink`
--

DROP TABLE IF EXISTS `sociallink`;
CREATE TABLE IF NOT EXISTS `sociallink` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clientsports`
--
ALTER TABLE `clientsports`
  ADD CONSTRAINT `FK_5A9C893719EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_5A9C893766A6A12D` FOREIGN KEY (`listesports_id`) REFERENCES `listesports` (`id`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `FK_35D4282C19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `enfants`
--
ALTER TABLE `enfants`
  ADD CONSTRAINT `FK_23E2BAC319EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `lieudisponibilite`
--
ALTER TABLE `lieudisponibilite`
  ADD CONSTRAINT `FK_F793E35620096AE3` FOREIGN KEY (`magasin_id`) REFERENCES `magasin` (`id`),
  ADD CONSTRAINT `FK_F793E356F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `lieuentrepot`
--
ALTER TABLE `lieuentrepot`
  ADD CONSTRAINT `FK_4DC9CEC672831E97` FOREIGN KEY (`entrepot_id`) REFERENCES `entrepot` (`id`),
  ADD CONSTRAINT `FK_4DC9CEC6F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `FK_24CC0DF282EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`),
  ADD CONSTRAINT `FK_24CC0DF2F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `photosproduit`
--
ALTER TABLE `photosproduit`
  ADD CONSTRAINT `FK_B29C8CB3F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_29A5EC27AC78BCF8` FOREIGN KEY (`sport_id`) REFERENCES `listesports` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
