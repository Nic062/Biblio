-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 12 Mars 2015 à 14:16
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE IF NOT EXISTS `auteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `naissance` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=74 ;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`, `naissance`) VALUES
(63, 'de Maupassant', 'Guy', '1850-08-05'),
(64, 'Zola', 'Emile', '1840-04-02'),
(65, 'Camus', 'Albert', '1913-11-07'),
(66, 'Hugo', 'Victor', '1802-02-26'),
(67, 'Christie', 'Agatha', '1890-09-15'),
(68, 'hugues', 'wattez', '2010-01-01'),
(69, 'Dengreville', 'Quentin', '2020-01-01'),
(70, 'hugues', 'wattez', '2010-01-01'),
(71, 'hugues', 'wattez', '2010-01-01'),
(72, 'hugues', 'wattez', '2010-01-01'),
(73, 'Antoine', 'Mendelouse', '2010-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `auteur_livre`
--

CREATE TABLE IF NOT EXISTS `auteur_livre` (
  `auteur_id` int(11) NOT NULL,
  `livre_id` int(11) NOT NULL,
  PRIMARY KEY (`auteur_id`,`livre_id`),
  KEY `IDX_A6DFA5E060BB6FE6` (`auteur_id`),
  KEY `IDX_A6DFA5E037D925CB` (`livre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `edition`
--

CREATE TABLE IF NOT EXISTS `edition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `edition`
--

INSERT INTO `edition` (`id`, `nom`) VALUES
(1, 'Hachette'),
(2, 'Atlas'),
(3, 'Belin'),
(4, 'Gallimard'),
(5, 'Editis');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE IF NOT EXISTS `emprunt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inscrit_id` int(11) NOT NULL,
  `exemplaire_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `delais` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F9FD484B6DCD4FEE` (`inscrit_id`),
  KEY `IDX_F9FD484B5843AA21` (`exemplaire_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `emprunt`
--

INSERT INTO `emprunt` (`id`, `inscrit_id`, `exemplaire_id`, `date`, `delais`) VALUES
(1, 128, 1, '2015-03-05', 30);

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

CREATE TABLE IF NOT EXISTS `exemplaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `edition_id` int(11) NOT NULL,
  `livre_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_11A53F4274281A5E` (`edition_id`),
  KEY `IDX_11A53F4237D925CB` (`livre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `exemplaire`
--

INSERT INTO `exemplaire` (`id`, `edition_id`, `livre_id`) VALUES
(1, 1, 9),
(2, 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

CREATE TABLE IF NOT EXISTS `inscrit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `naissance` date NOT NULL,
  `rue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=131 ;

--
-- Contenu de la table `inscrit`
--

INSERT INTO `inscrit` (`id`, `nom`, `prenom`, `naissance`, `rue`, `ville`, `cp`, `email`, `tel`) VALUES
(126, 'Varlet', 'Nicolas', '2010-01-01', '3 rue inconnue', 'Beaurains', '62217', 'toto@tata.tt', '01020304506'),
(128, 'Dengreville', 'Quentin', '2010-01-01', '3 rue inconnue', 'Lens', '62000', 'toto@tata.tt', '01020304506'),
(129, 'Mendel', 'Antoine', '1995-01-01', '3 rue inconnue', 'Lens', '62000', 'toto@tata.tt', '01020304506'),
(130, 'Wattez', 'Hugues', '1995-01-31', '2 rue Notre Dame', 'Guemappe', '62128', 'hugues.wattez@outlook.fr', '0609795224');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typelivre_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `annee` smallint(6) NOT NULL,
  `resume` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6DA2609D6BB0AB43` (`typelivre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`id`, `typelivre_id`, `titre`, `annee`, `resume`) VALUES
(9, 171, 'Germinal', 1885, 'Germinal est un roman d''Émile Zola publié en 1885. Il s''agit du treizième roman de la série des Rougon-Macquart. Écrit d''avril 1884 à janvier 1885, le roman paraît d''abord en feuilleton entre novembre 1884 et février 1885 dans le Gil Blas.'),
(10, 171, 'Germinal', 1885, 'Germinal est un roman d''Émile Zola publié en 1885. Il s''agit du treizième roman de la série des Rougon-Macquart. Écrit d''avril 1884 à janvier 1885, le roman paraît d''abord en feuilleton entre novembre 1884 et février 1885 dans le Gil Blas.'),
(11, 171, 'Germinal', 1885, 'Germinal est un roman d''Émile Zola publié en 1885. Il s''agit du treizième roman de la série des Rougon-Macquart. Écrit d''avril 1884 à janvier 1885, le roman paraît d''abord en feuilleton entre novembre 1884 et février 1885 dans le Gil Blas.'),
(12, 171, 'Germinal', 1885, 'Germinal est un roman d''Émile Zola publié en 1885. Il s''agit du treizième roman de la série des Rougon-Macquart. Écrit d''avril 1884 à janvier 1885, le roman paraît d''abord en feuilleton entre novembre 1884 et février 1885 dans le Gil Blas.');

-- --------------------------------------------------------

--
-- Structure de la table `livre_auteur`
--

CREATE TABLE IF NOT EXISTS `livre_auteur` (
  `livre_id` int(11) NOT NULL,
  `auteur_id` int(11) NOT NULL,
  PRIMARY KEY (`livre_id`,`auteur_id`),
  KEY `IDX_A11876B537D925CB` (`livre_id`),
  KEY `IDX_A11876B560BB6FE6` (`auteur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `livre_auteur`
--

INSERT INTO `livre_auteur` (`livre_id`, `auteur_id`) VALUES
(9, 64),
(10, 64),
(11, 64),
(12, 64);

-- --------------------------------------------------------

--
-- Structure de la table `typelivre`
--

CREATE TABLE IF NOT EXISTS `typelivre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=185 ;

--
-- Contenu de la table `typelivre`
--

INSERT INTO `typelivre` (`id`, `libelle`) VALUES
(171, 'Romans & Fictions'),
(172, 'Bande Dessinée, Comics & Manga'),
(173, 'Arts & Culture'),
(174, 'Documents & Médias'),
(175, 'Erotisme'),
(176, 'Esotérisme'),
(177, 'Guides & Santé'),
(178, 'Histoire & Géographie'),
(179, 'Jeunesse'),
(180, 'Langues'),
(181, 'Lettres'),
(182, 'Loisirs, Vie pratique & Société'),
(183, 'Religions & Spiritualité'),
(184, 'Sciences');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_1483A5E9A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `auteur_livre`
--
ALTER TABLE `auteur_livre`
  ADD CONSTRAINT `FK_A6DFA5E037D925CB` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A6DFA5E060BB6FE6` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `FK_F9FD484B5843AA21` FOREIGN KEY (`exemplaire_id`) REFERENCES `exemplaire` (`id`),
  ADD CONSTRAINT `FK_F9FD484B6DCD4FEE` FOREIGN KEY (`inscrit_id`) REFERENCES `inscrit` (`id`);

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `FK_11A53F4237D925CB` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`),
  ADD CONSTRAINT `FK_11A53F4274281A5E` FOREIGN KEY (`edition_id`) REFERENCES `edition` (`id`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `FK_6DA2609D6BB0AB43` FOREIGN KEY (`typelivre_id`) REFERENCES `typelivre` (`id`);

--
-- Contraintes pour la table `livre_auteur`
--
ALTER TABLE `livre_auteur`
  ADD CONSTRAINT `FK_A11876B537D925CB` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A11876B560BB6FE6` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
