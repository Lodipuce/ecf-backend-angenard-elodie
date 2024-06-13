-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2024 at 12:52 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpecoresponsables`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id_article` int NOT NULL,
  `titre` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  `date_article` datetime DEFAULT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `description`, `date_article`, `id_user`) VALUES
(3, 'BP2', 'gdfqhgbdfbhdgbhqg', '2024-06-13 09:35:00', 1),
(5, 'BP4', 'vbn, xghjndwgbhhdwhbng', '2024-06-13 09:35:00', 1),
(7, 'BP6', 'dvsfbhdgwhnbfgnjfhnxgvnbx', '2024-06-13 09:36:00', 4),
(9, 'BP10', 'sdgvshfdxnjyhrfkj,yul;dteuk,fxh,kx', '2024-06-13 09:37:00', 2),
(10, 'BP11', 'sxfhbdgjngh;lù!nk; xc hjxf,jx', '2024-06-13 09:37:00', 2),
(11, 'BP12', 'wfgbgfj,nghj, f srtyu zj,k; l!klm', '2024-06-13 09:37:00', 2),
(12, 'BP15', 'v', '2024-06-13 11:21:00', 5),
(13, 'BP14 bis', '!!!!   kjkgqnv,kjvn,;xcwjfgiuzhjknvx,c;:jfkmq', '2024-06-13 13:48:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `nom_role` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(1, 'Administrateur'),
(2, 'Editeur');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `login`, `password`, `email`, `id_role`) VALUES
(1, 'tom', '$2y$10$gmJQlGlLzZtNN3wVEnyrbuKFmn/1rE1F3u4s2cuqq1EyYAQquitj.', 'tom@gmail.com', 1),
(2, 'bob', '$2y$10$rP0lLyJh3mKkqk1Ul4ccy.k9/Edmd0qF3xQZhau5BqxKdXDpWG9KC', 'bob@gmail.com', 2),
(4, 'sam', '$2y$10$UJFTBIkx/JfhvbWC5P1UyOuc/mWrB.2yvA1DkunwCkZLqpqPNsBje', 'sam@gmail.com', 2),
(5, 'lea', '$2y$10$5WmnQWkh/m1QWjPP.6k/yueR8Q7jrMFe6fMcqq23Iwo49JXtxn1iS', 'lea@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
