-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2020 at 11:22 PM
-- Server version: 10.3.23-MariaDB-1
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Jeux`
--
CREATE DATABASE IF NOT EXISTS `Jeux` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Jeux`;

-- --------------------------------------------------------

--
-- Table structure for table `groupes`
--

DROP TABLE IF EXISTS `groupes`;
CREATE TABLE `groupes` (
  `id` int(10) UNSIGNED NOT NULL,
  `groupe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupes`
--

INSERT INTO `groupes` (`id`, `groupe`) VALUES
(1, '1-groupe'),
(2, '2-groupe'),
(3, '3-groupe');

-- --------------------------------------------------------

--
-- Table structure for table `niveaux`
--

DROP TABLE IF EXISTS `niveaux`;
CREATE TABLE `niveaux` (
  `id` int(11) NOT NULL,
  `niveau_1` int(11) NOT NULL DEFAULT 0,
  `niveau_2` int(11) NOT NULL DEFAULT 0,
  `niveau_3` int(11) NOT NULL DEFAULT 0,
  `essai` int(11) NOT NULL DEFAULT 3,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `niveaux`
--

INSERT INTO `niveaux` (`id`, `niveau_1`, `niveau_2`, `niveau_3`, `essai`, `id_user`) VALUES
(1, 0, 0, 0, 3, 1),
(2, 0, 0, 0, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'florent', 'florentyedji61@gmail.com', '$2y$10$5b0Hu7RyOFhEpi.yuDNs/OxIjyjD9w7Zx.ks4l.oTDOyjwwsiCAVm', '2020-11-13 13:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `verbes`
--

DROP TABLE IF EXISTS `verbes`;
CREATE TABLE `verbes` (
  `id` int(10) UNSIGNED NOT NULL,
  `verbe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `verbes`
--

INSERT INTO `verbes` (`id`, `verbe`) VALUES
(61, 'absoudre'),
(62, 'accroître'),
(1, 'acheter'),
(38, 'acquérir'),
(37, 'agir'),
(2, 'aimer'),
(63, 'aller'),
(64, 'apercevoir'),
(18, 'appeler'),
(6, 'apprécier'),
(65, 'apprendre'),
(3, 'appuyer'),
(40, 'assaillir'),
(66, 'asseoir'),
(4, 'assiéger'),
(5, 'avancer'),
(39, 'avertir'),
(67, 'battre'),
(68, 'boire'),
(41, 'bouillir'),
(7, 'broyer'),
(8, 'céder'),
(9, 'changer'),
(10, 'chanter'),
(69, 'clore'),
(11, 'commencer'),
(70, 'comprendre'),
(71, 'conclure'),
(72, 'conduire'),
(73, 'confire'),
(74, 'connaître'),
(75, 'coudre'),
(42, 'courir'),
(43, 'couvrir'),
(76, 'craindre'),
(12, 'créer'),
(14, 'crier'),
(77, 'croire'),
(78, 'croître'),
(44, 'cueillir'),
(79, 'cuire'),
(80, 'déchoir'),
(81, 'descendre'),
(82, 'devoir'),
(83, 'dire'),
(84, 'diriger'),
(85, 'distraire'),
(45, 'dormir'),
(86, 'écrire'),
(15, 'élever'),
(16, 'employer'),
(17, 'enseigner'),
(87, 'entendre'),
(19, 'envoyer'),
(20, 'espérer'),
(21, 'essayer'),
(22, 'essuyer'),
(13, 'faillir'),
(88, 'faire'),
(89, 'falloir'),
(46, 'finir'),
(47, 'fuir'),
(48, 'gésir'),
(90, 'haïr'),
(23, 'jeter'),
(91, 'joindre'),
(24, 'lancer'),
(25, 'lever'),
(92, 'lire'),
(26, 'manger'),
(49, 'maudire'),
(27, 'mener'),
(93, 'mettre'),
(28, 'modeler'),
(94, 'mordre'),
(95, 'moudre'),
(50, 'mourir'),
(96, 'mouvoir'),
(97, 'naître'),
(29, 'naviguer'),
(51, 'offrir'),
(30, 'oublier'),
(98, 'ouïr'),
(52, 'ouvrir'),
(99, 'paraître'),
(53, 'partir'),
(31, 'payer'),
(100, 'peindre'),
(32, 'peler'),
(101, 'perdre'),
(33, 'peser'),
(34, 'placer'),
(102, 'plaire'),
(103, 'pleuvoir'),
(104, 'pourvoir'),
(105, 'pouvoir'),
(106, 'prendre'),
(35, 'protéger'),
(107, 'recevoir'),
(108, 'Rendre'),
(109, 'répandre'),
(110, 'répondre'),
(111, 'reprendre'),
(112, 'résoudre'),
(54, 'réussir'),
(113, 'rire'),
(114, 'rompre'),
(115, 'savoir'),
(55, 'sentir'),
(56, 'servir'),
(57, 'sortir'),
(58, 'souffrir'),
(116, 'suffire'),
(117, 'suivre'),
(59, 'tenir'),
(118, 'tordre'),
(119, 'traire'),
(36, 'travailler'),
(120, 'vaincre'),
(121, 'valoir'),
(122, 'vendre'),
(123, 'venir'),
(60, 'vêtir'),
(124, 'vivre'),
(125, 'voir'),
(126, 'vouloir');

-- --------------------------------------------------------

--
-- Table structure for table `verbe_groups`
--

DROP TABLE IF EXISTS `verbe_groups`;
CREATE TABLE `verbe_groups` (
  `id_verbes` int(10) UNSIGNED NOT NULL,
  `id_groupes` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `verbe_groups`
--

INSERT INTO `verbe_groups` (`id_verbes`, `id_groupes`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 2),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(70, 3),
(71, 3),
(72, 3),
(73, 3),
(74, 3),
(75, 3),
(76, 3),
(77, 3),
(78, 3),
(79, 3),
(80, 3),
(81, 3),
(82, 3),
(83, 3),
(84, 3),
(85, 3),
(86, 3),
(87, 3),
(88, 3),
(89, 3),
(90, 3),
(91, 3),
(92, 3),
(93, 3),
(94, 3),
(95, 3),
(96, 3),
(97, 3),
(98, 3),
(99, 3),
(100, 3),
(101, 3),
(102, 3),
(103, 3),
(104, 3),
(105, 3),
(106, 3),
(107, 3),
(108, 3),
(109, 3),
(110, 3),
(111, 3),
(112, 3),
(113, 3),
(114, 3),
(115, 3),
(116, 3),
(117, 3),
(118, 3),
(119, 3),
(120, 3),
(121, 3),
(122, 3),
(123, 3),
(124, 3),
(125, 3),
(126, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groupe` (`groupe`);

--
-- Indexes for table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`email`);

--
-- Indexes for table `verbes`
--
ALTER TABLE `verbes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `verbe` (`verbe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verbes`
--
ALTER TABLE `verbes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
