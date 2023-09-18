-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2022 at 11:23 AM
-- Server version: 8.0.31-0ubuntu0.20.04.1
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `divakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(300) NOT NULL,
  `buy` int NOT NULL,
  `sell` int NOT NULL,
  `role` varchar(200) NOT NULL,
  `status` enum('0','1','2','3','4') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '0=>inactive,1=>active,2=>sold,3=>exchanged,4=>returned',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `buy`, `sell`, `role`, `status`, `created`, `updated`) VALUES
(36, 'ash', 78, 100, 'Divakar', '2', '2022-10-29 15:18:23', '0000-00-00 00:00:00'),
(37, 'sadf', 50, 66, 'Divakar', '0', '2022-10-29 15:21:26', '0000-00-00 00:00:00'),
(38, 'sadf', 50, 66, 'Divakar', '3', '2022-10-29 15:22:29', '0000-00-00 00:00:00'),
(39, 'sadf', 50, 66, 'Divakar', '4', '2022-10-29 15:22:46', '2022-11-06 16:17:20'),
(40, 'asd', 12, 14, 'Divakar', '0', '2022-11-06 10:46:46', '2022-11-06 16:16:46'),
(41, 'Killer jeans 32 grey', 1500, 2000, 'Divakar', '0', '2022-11-07 16:27:01', '2022-11-07 21:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('admin','manager','root') NOT NULL DEFAULT 'admin',
  `status` enum('active','inactive') NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_id`, `password`, `role`, `status`, `created`) VALUES
(1, 'Divakar', '9899784414', 'a891af9b4934fe765b5778469d1f1f45', 'root', 'active', '2022-10-23 06:27:41'),
(2, 'David', '8368715809', 'a891af9b4934fe765b5778469d1f1f45', 'manager', 'active', '2022-10-23 06:27:41'),
(3, 'Nitin', '9955530003', 'a891af9b4934fe765b5778469d1f1f45', 'manager', 'active', '2022-10-23 06:27:41'),
(4, 'Shivam', '9939725272', 'a891af9b4934fe765b5778469d1f1f45', 'admin', 'active', '2022-10-23 06:27:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
