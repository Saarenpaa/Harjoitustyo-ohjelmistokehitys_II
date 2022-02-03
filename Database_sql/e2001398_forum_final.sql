-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 03.02.2022 klo 21:00
-- Palvelimen versio: 10.1.48-MariaDB-0+deb9u2
-- PHP Version: 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e2001398_forum_final`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `Comments`
--

CREATE TABLE `Comments` (
  `comment_ID` int(11) NOT NULL,
  `comment_content` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_date` datetime NOT NULL,
  `user_id` int(100) NOT NULL,
  `thread_ID` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vedos taulusta `Comments`
--

INSERT INTO `Comments` (`comment_ID`, `comment_content`, `comment_date`, `user_id`, `thread_ID`) VALUES
(116, 'Aihe 1 kommentti 1', '2022-02-03 20:54:41', 20, 26),
(117, 'Aihe 1 kommentti 2', '2022-02-03 20:54:54', 20, 26),
(118, 'Laiska äijä', '2022-02-03 20:56:09', 20, 25),
(119, 'Aihe 1 kommentti 3', '2022-02-03 20:56:25', 20, 26);

-- --------------------------------------------------------

--
-- Rakenne taululle `Threads`
--

CREATE TABLE `Threads` (
  `thread_ID` int(100) NOT NULL,
  `thread_topic` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thread_summary` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thread_content` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thread_date` datetime NOT NULL,
  `thread_img` blob,
  `user_id` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vedos taulusta `Threads`
--

INSERT INTO `Threads` (`thread_ID`, `thread_topic`, `thread_summary`, `thread_content`, `thread_date`, `thread_img`, `user_id`) VALUES
(26, 'Aihe 1', 'Aihe 1 avaus.', 'Aihe 1 leipäteksti.', '2022-02-03 20:54:28', NULL, 20),
(25, 'Muokkaa tietoja', 'Pääset muokkaamaan omia tietojasi painamalla omasta nimestäsi', 'Vain osaa tiedoista voi muokata, esimerkiksi omaa salasanaasi et pysty vaihtamaan.', '2022-02-03 20:53:27', NULL, 20),
(24, 'Tervetuloa foorumille!', 'Tämä on harjoitustyöni ohjelmistokehitys II -kurssille.', 'Sivusto on ulkonäöllisesti erittäin yksinkertainen, koska halusin keskittyä enemmän toimintoihin, kuin käyttöliittymän suunnitteluun tässä projektissa.', '2022-02-03 20:50:38', NULL, 20);

-- --------------------------------------------------------

--
-- Rakenne taululle `Users`
--

CREATE TABLE `Users` (
  `user_id` int(100) NOT NULL,
  `user_firstname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_lastname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vedos taulusta `Users`
--

INSERT INTO `Users` (`user_id`, `user_firstname`, `user_lastname`, `password`, `user_email`) VALUES
(20, 'Joonas', 'Saarenpää', '$2y$10$QrKbisUiZizVfiAcd0QfvOV7RgkPDVRUNcG7IXyvkoTDB/tFR220e', 'joonas.saarenpaa@netikka.fi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `thread_ID` (`thread_ID`);

--
-- Indexes for table `Threads`
--
ALTER TABLE `Threads`
  ADD PRIMARY KEY (`thread_ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `Threads`
--
ALTER TABLE `Threads`
  MODIFY `thread_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
