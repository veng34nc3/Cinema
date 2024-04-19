-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 02:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinemadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `filmy`
--

CREATE TABLE `filmy` (
  `id` int(2) NOT NULL,
  `nazwa` varchar(60) NOT NULL,
  `dlugosc` int(3) NOT NULL,
  `kategoria` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filmy`
--

INSERT INTO `filmy` (`id`, `nazwa`, `dlugosc`, `kategoria`) VALUES
(1, 'Anatomia Upadku', 150, 'Dramat'),
(2, 'Civil War', 109, 'Akcja'),
(3, 'Czerwone Maki', 122, 'Wojenny'),
(4, 'Diuna: Część Druga', 165, 'Sci-fi');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(2) NOT NULL,
  `numer` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `numer`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `seanse`
--

CREATE TABLE `seanse` (
  `id` int(2) NOT NULL,
  `godzina` varchar(5) NOT NULL,
  `id_filmu` int(2) NOT NULL,
  `id_sali` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seanse`
--

INSERT INTO `seanse` (`id`, `godzina`, `id_filmu`, `id_sali`) VALUES
(1, '15:30', 1, 1),
(2, '11:00', 2, 1),
(3, '20:30', 3, 2),
(4, '16:00', 4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seanse`
--
ALTER TABLE `seanse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seanse_filmy_fk` (`id_filmu`),
  ADD KEY `seanse_sale_fk` (`id_sali`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `seanse`
--
ALTER TABLE `seanse`
  ADD CONSTRAINT `seanse_filmy_fk` FOREIGN KEY (`id_filmu`) REFERENCES `filmy` (`id`),
  ADD CONSTRAINT `seanse_sale_fk` FOREIGN KEY (`id_sali`) REFERENCES `sale` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
