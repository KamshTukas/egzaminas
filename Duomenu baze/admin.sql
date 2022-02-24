-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2022 m. Vas 24 d. 07:24
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
-- Database: `bunkeris`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `admin_created`) VALUES
(2, 'adminas', '$2y$10$38W2EuzCb1hF8oT5lZyChOPNxD4neH0aW8QhAuCQBgY1qoTopnPsi', '2021-11-23'),
(3, 'petras', '$2y$10$QDfZXR8zvQ2Qj3M/pQBbLO8PoMZIKXQQKH9aiRcT07Pwlk9Zk9I4y', '2021-11-23'),
(4, 'KamshTukas', '$2y$10$ZGu6Aq69aIVsNWkXgenTSO/lg/dzirdeyWlSlc3wM62ZfkqVq7QjS', '2021-11-23'),
(5, 'jonas', '$2y$10$yMNZk7TdT51t.i4wnPzNI.w3Lmg.bGI4eWD2.BMXISaCEwEOzCKTC', '2021-12-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
