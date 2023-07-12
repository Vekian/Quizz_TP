-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jul 11, 2023 at 10:09 AM
-- Server version: 10.6.12-MariaDB-1:10.6.12+maria~ubu2004-log
-- PHP Version: 8.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Quizz`
--
CREATE DATABASE IF NOT EXISTS `Quizz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Quizz`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `content` varchar(50) NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `content`, `correct`, `id_question`) VALUES
(1, 'Le fromage de chèvre est fait avec amour', 1, 1),
(2, 'Le fromage de chèvre est fait avec les pieds', 0, 1),
(3, 'Le fromage de chèvre est fait avec des chèvres', 0, 1),
(4, 'Le fromage de chèvre est fait avec rien', 0, 1),
(5, 'Du coca', 0, 2),
(6, 'Du fromage', 1, 2),
(7, 'De l\'herbe', 0, 2),
(8, 'Des pieds', 0, 2),
(9, 'De chèvre', 0, 3),
(10, 'De taureau', 0, 3),
(11, 'De vache', 1, 3),
(12, 'De chat', 0, 3),
(13, 'Le mois de septembre', 0, 4),
(14, 'Le mois d\'Octobre', 0, 4),
(15, 'Le mois de Décembre', 0, 4),
(16, 'Le mois de Novembre', 1, 4),
(17, 'De pommes', 0, 5),
(18, 'De vin', 1, 5),
(19, 'De fraise', 0, 5),
(20, 'De chèvre', 0, 5),
(84, 'God of War', 0, 26),
(85, 'Dragon Quest', 0, 26),
(86, 'Final Fantasy', 0, 26),
(87, 'Gran Theft Auto', 1, 26),
(88, '620 €', 0, 27),
(89, '560 €', 0, 27),
(90, '740 €', 0, 27),
(91, '450 €', 1, 27),
(92, 'Android', 0, 28),
(93, 'Mac OS', 0, 28),
(94, 'Windows', 0, 28),
(95, 'Linux', 1, 28),
(96, 'FIFA 07', 0, 29),
(97, 'FIFA 08', 0, 29),
(98, 'FIFA 09', 0, 29),
(99, 'FIFA 06 ', 1, 29),
(100, 'Peach', 0, 30),
(101, 'Wario', 0, 30),
(102, 'Luigi ', 0, 30),
(103, 'Mylord', 1, 30),
(104, 'Pocket ', 0, 31),
(105, 'Color', 0, 31),
(106, 'Advance', 0, 31),
(107, 'Printer', 1, 31),
(108, 'Marteau', 0, 32),
(109, 'Lance-flammes', 0, 32),
(110, 'Raquette', 0, 32),
(111, 'Aspirateur', 1, 32),
(112, '3', 0, 33),
(113, '2', 0, 33),
(114, '4', 0, 33),
(115, '5', 1, 33),
(116, 'Pizzaïolo', 0, 34),
(117, 'Boulanger', 0, 34),
(118, 'Magicien', 0, 34),
(119, 'Charpentier', 1, 34),
(120, 'Din', 0, 35),
(121, 'Eikichi', 0, 35),
(122, 'Nayru', 0, 35),
(123, 'Farore', 1, 35),
(124, 'BONUS', 0, 36),
(125, 'SMILE', 0, 36),
(126, 'PUSH', 0, 36),
(127, 'HELP !', 1, 36),
(128, 'Top Chief', 0, 37),
(129, 'Master K ', 0, 37),
(130, 'Lieutenant Ford', 0, 37),
(131, 'Master Chief ', 1, 37),
(132, 'Il paralyse ses ennemis avec ses yeux', 0, 38),
(133, 'Il empale ses ennemis avec son nez', 0, 38),
(134, ' Il gèle ses ennemis avec ses oreilles ', 0, 38),
(135, 'Il aspire ses ennemis avec sa bouche', 1, 38),
(136, 'Delta Force Prime', 0, 39),
(137, 'Avalanche ', 0, 39),
(138, 'Policenauts', 0, 39),
(139, 'FoxHound', 1, 39),
(140, 'Mediteranée ', 0, 40),
(141, 'Auvergna', 0, 40),
(142, 'Arcadia', 0, 40),
(143, 'Normandy', 1, 40);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `id_quizz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `id_quizz`) VALUES
(1, 'Comment est fait le fromage de chèvre ?', 1),
(2, 'Qu\'est-ce qu\'il y a dans le fromage ?', 1),
(3, 'Le beaufort est un fromage de', 1),
(4, 'Le beaujolais nouveau est fabriqué durant', 2),
(5, 'Le vin est fait à partir de ', 2),
(26, 'Quelle saga fut la plus vendue parmi les jeux vidéos disponibles sur la PS2 ?', 13),
(27, 'Quel était le prix de lancement de la PlayStation 2 en France ?', 13),
(28, 'Quel système d\'exploitation pouvait être installé sur la PS2 ?', 13),
(29, 'Quel fut le premier titre de FIFA à ne pas sortir sur PlayStation ?', 13),
(30, 'Lequel de ces personnages de jeu ne fait pas partie de l\'univers de Mario ?', 13),
(31, 'Parmi ces catégories de Game Boy, laquelle ne pourrez-vous jamais trouver en magasin ?', 13),
(32, 'Quelle arme est utilisée par Luigi dans Luigi\'s Mansion sous le nom Ectoblast 3000 ?', 13),
(33, 'Dans Super Mario Kart, chaque course compte chacune combien de tours ?', 13),
(34, 'Quel était le tout premier métier de Mario avant de devenir plombier dans Mario Bros. ?', 13),
(35, 'Quelle déesse a créé la vie dans le jeu vidéo phare Zelda : Ocarina of time ?', 13),
(36, 'Quel message apparaît fréquemment derrière l\'héroïne du jeu Donkey Kong ?', 13),
(37, 'Sous quel nom est connu le héros de la licence Halo ?', 13),
(38, 'Quelle est la particularité de Kirby, la petite boule rose ? ', 13),
(39, 'A quelle unité appartenait Solid Snake, héros de la saga Metal Gear Solid ? ', 13),
(40, 'Dans Mass Effect, comment s\'appelle le vaisseau sur lequel Shepard voyage à travers la galaxie ?', 13);

-- --------------------------------------------------------

--
-- Table structure for table `quizzs`
--

CREATE TABLE `quizzs` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzs`
--

INSERT INTO `quizzs` (`id`, `name`, `category`) VALUES
(1, 'Fromages', 'Alimentation'),
(2, 'Vins', 'Alimentation'),
(13, 'Jeux vidéos ', 'Loisirs');

-- --------------------------------------------------------

--
-- Table structure for table `rankings`
--

CREATE TABLE `rankings` (
  `id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_quizz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rankings`
--

INSERT INTO `rankings` (`id`, `score`, `id_user`, `id_quizz`) VALUES
(1, 500, 1, 1),
(2, 200, 8, 2),
(3, 800, 2, 1),
(4, 340, 2, 2),
(5, 20, 1, 1),
(8, 0, 1, 2),
(38, 50, 1, 1),
(61, 188, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `avatar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `avatar`) VALUES
(1, 'mathieu', 'images/photo.png'),
(2, 'lea', 'images/pikachu.png'),
(7, 'yvan', 'images/pikachu.png'),
(8, 'soslan', 'images/pikachu.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_question` (`id_question`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_quizz` (`id_quizz`);

--
-- Indexes for table `quizzs`
--
ALTER TABLE `quizzs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_quizz` (`id_quizz`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `quizzs`
--
ALTER TABLE `quizzs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rankings`
--
ALTER TABLE `rankings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answer_to_question` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `question_to_quizz` FOREIGN KEY (`id_quizz`) REFERENCES `quizzs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rankings`
--
ALTER TABLE `rankings`
  ADD CONSTRAINT `ranking_to_quizz` FOREIGN KEY (`id_quizz`) REFERENCES `quizzs` (`id`),
  ADD CONSTRAINT `ranking_to_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
