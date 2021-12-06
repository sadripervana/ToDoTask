-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2021 at 04:50 PM
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
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int NOT NULL,
  `title` varchar(250) NOT NULL,
  `text` longtext NOT NULL,
  `position` int DEFAULT NULL,
  `priority` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'low',
  `user_data` tinyint NOT NULL,
  `deadline` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `title`, `text`, `position`, `priority`, `user_data`, `deadline`) VALUES
(3, 'Task 1', 'hey hey haw you doing? hello there???', 2, 'hight', 8, '10-12-2021'),
(4, 'Task 2', 'Hello There this is a task 2', 4, 'low', 8, '9-12-2021'),
(5, 'Task 4', 'This is a task 4...', 2, 'medium', 10, '10-12-2021'),
(6, 'Task 5', 'Hello there how are you?', 3, 'low', 10, '10-12-2021'),
(8, 'Task 7', 'This is a new task 7', 5, 'medium', 10, '10-12-2021'),
(10, 'Task 3', 'Task 3 is here', 2, 'hight', 11, '10-12-2021'),
(11, 'Task 4 ', 'Hello there', 3, 'low', 11, '8-12-2021'),
(12, 'Task 4', 'HEllo there this is a task 4', 1, 'medium', 11, '9-11-2021'),
(13, 'Task New', 'This is a new Task', 1, 'medium', 8, '9-12-2021'),
(14, 'Food Remainder', 'This is a food remainder. Order lunch', 3, 'medium', 8, '10-12-2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
