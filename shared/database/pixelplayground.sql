-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2024 at 10:33 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pixelplayground`
--

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` int(10) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `badge_condition` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(10) NOT NULL,
  `game_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_name`) VALUES
(1, 'wordle'),
(2, 'connect 4'),
(3, 'galgje'),
(4, 'tictactoe');

-- --------------------------------------------------------

--
-- Table structure for table `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(10) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `gebruikersnaam`, `wachtwoord`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker_badge`
--

CREATE TABLE `gebruiker_badge` (
  `gebruiker_id` int(10) NOT NULL,
  `badge_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker_toernooien`
--

CREATE TABLE `gebruiker_toernooien` (
  `gebruiker_id` int(10) NOT NULL,
  `toernooi_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `highscores`
--

CREATE TABLE `highscores` (
  `game_id` int(10) NOT NULL,
  `gebruiker_id` int(10) NOT NULL,
  `highscore` int(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `highscores`
--

INSERT INTO `highscores` (`game_id`, `gebruiker_id`, `highscore`, `timestamp`) VALUES
(1, 1, 100, '2024-04-15 09:48:35'),
(1, 1, 100, '2024-04-15 09:48:35'),
(1, 1, 1050, '2024-04-15 09:48:35'),
(1, 1, 1750, '2024-04-15 09:48:35'),
(1, 1, 2250, '2024-04-15 09:48:35'),
(1, 1, 2000, '2024-04-15 09:48:35'),
(1, 1, 1450, '2024-04-15 09:48:35'),
(1, 1, 1250, '2024-04-15 09:48:35'),
(1, 1, 900, '2024-04-15 09:48:35'),
(1, 1, 600, '2024-04-15 09:48:35'),
(1, 1, -500, '2024-04-15 09:48:35'),
(1, 1, 2250, '2024-04-15 09:48:35'),
(1, 1, 1100, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 850, '2024-04-15 09:48:35'),
(1, 0, 2080, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2220, '2024-04-15 09:48:35'),
(1, 0, 2060, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2100, '2024-04-15 09:48:35'),
(1, 0, 1880, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 1, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(3, 1, 1000, '2024-04-15 09:48:35'),
(2, 1, 1000, '2024-04-15 09:48:35'),
(4, 1, 1000, '2024-04-15 09:48:35'),
(3, 1, 1000, '2024-04-15 09:48:35'),
(3, 1, 1000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:51:22'),
(2, 0, 1000, '2024-04-15 09:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `toernooien`
--

CREATE TABLE `toernooien` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vrienden`
--

CREATE TABLE `vrienden` (
  `gebruiker_id` int(10) NOT NULL,
  `vriend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gebruikersnaam` (`gebruikersnaam`);

--
-- Indexes for table `toernooien`
--
ALTER TABLE `toernooien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `toernooien`
--
ALTER TABLE `toernooien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
