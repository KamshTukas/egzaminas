-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2022 m. Vas 24 d. 12:33
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egzaminas`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `like_num` bigint(10) NOT NULL,
  `dislike_num` bigint(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `like_num`, `dislike_num`, `created`, `modified`, `status`) VALUES
(3, 'Petras Petraitis (Visureigių modifikuotojas)', 'Servisas - FORESTER-TUNING\r\nMiestas - Kaunas\r\n', '', 3, 0, '0000-00-00 00:00:00', '2022-02-24 12:18:43', '1'),
(4, 'Jonas Jonaitis (Visureigių restauruotojas)', 'Servisas - FORESTER-TUNING | Miestas - Kaunas', '', 2, 0, '0000-00-00 00:00:00', '2022-02-24 12:18:44', '1'),
(5, 'Tomas Tomauskas (Variklio remontininkas)', 'Servisas - Animus Mobilis | Miestas - Kaunas\r\n', '', 4, 0, '0000-00-00 00:00:00', '2022-02-24 12:18:46', '1'),
(6, 'Darius Darauskas (Automobilio diagnostika)', 'Servisas - Animus Mobilis | Miestas - Kaunas\r\n', '', 3, 0, '0000-00-00 00:00:00', '2022-02-24 12:18:48', '1'),
(8, 'Devividas Deividauskas (Elektros remontinikas)', 'Servisas - Refix | Miestas - Vilnius', '', 4, 0, '0000-00-00 00:00:00', '2022-02-24 12:18:50', '1'),
(9, 'Henrikas Henrikauskas (Automobilių remontininkas', 'Servisas - Refix | Miestas - Vilnius', '', 3, 0, '0000-00-00 00:00:00', '2022-02-24 12:18:52', '1'),
(10, 'Lukas Lukauskas (Dujų diagnostika)', 'Servisas - Autorealybė | Miestas - Vilnius', '', 6, 0, '0000-00-00 00:00:00', '2022-02-24 12:18:54', '1'),
(11, 'Kęstas Kestauskas (Ratų geometrija)', 'Servisas - Autorealybė | Miestas - Vilnius', '', 4, 0, '0000-00-00 00:00:00', '2022-02-24 12:18:56', '1'),
(12, 'Martynas Martinauskas (Turbinų remontininkas)', 'Servisas - Kz servisas | Miestas - Vilnius', '', 4, 0, '0000-00-00 00:00:00', '2022-02-24 12:18:57', '1'),
(13, 'Martynas Martinauskas (Signalizacijų remontininkas)', 'Servisas - Kz servisas | Miestas - Vilnius', '', 5, 0, '0000-00-00 00:00:00', '2022-02-24 12:18:59', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
