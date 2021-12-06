-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2021 at 04:55 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ToDo`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(175) NOT NULL,
  `password` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL,
  `permissions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `join_date`, `last_login`, `permissions`) VALUES
(8, 'sadri pervana', 'sadripervana1@gmail.com', '$2y$10$C3ajJRcHhfmS9PtAePrVuuK.BUg1MbxSETL7HnqFfmkkK6pNCEy4C', '2021-11-28 16:18:46', '2021-12-06 16:15:53', 'admin,editor'),
(10, 'Diu Diu', 'diudiu@gmail.com', '$2y$10$4//3814QVAkNMC1xcfwdSeDkCHVXLpsdDPP/.qV39eDfohvbYWUA6', '2021-12-06 15:24:32', '2021-12-06 15:45:36', 'editor'),
(11, 'test test', 'test1@gmail.com', '$2y$10$tANDCVDvcvfaCcPqNnND1e1nKkjHWCGQG9LgTnj3YqkjbizAFh/zK', '2021-12-06 15:48:57', '2021-12-06 15:49:06', 'editor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
