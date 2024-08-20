-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 11:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: 'Opu2402'
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users2` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `country` varchar(100) NULL,
  `gender` varchar(20) NULL,
  `photo` varchar(100)  NULL,
  `role` int(11) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users2` (`id`, `name`, `email`, `password`, `country`, `gender`,`photo`,`role`) VALUES
(1, 'Omar Booker', 'jyvi@mailinator.com', '$2y$10$zgIIHyoJYbYOfMNkbcuxn.OWBHCrO74csuux.eWgx0b6tW5bPa6V6', 'UK', 'female'),
(2, 'Hedda Adams', 'modo@mailinator.com', '$2y$10$hX9B1cWbWmfY5x21MCQ40.bqhojnKLHRREpBFfSAojYCFpsLCap9a', 'UK', 'female'),
(3, 'Mona Bradley', 'kuwi@mailinator.com', '$2y$10$UrGctW2WaVokDKuI9Jrbku44kus3.lyF9ML9QisXpy2WArSEALc9.', 'USA', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
