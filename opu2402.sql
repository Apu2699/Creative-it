-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2024 at 01:26 PM
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
-- Database: `opu2402`
--

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `division` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`id`, `name`, `email`, `password`, `division`, `gender`, `photo`) VALUES
(1, 'Daria Lowery', 'dihyry@mailinator.com', '$2y$10$UelkW6vzeZVNKfVKY1wxtuGNJRooWbSO/9YpD7.bhShuZYNjN/dQO', 'Dhaka', 'female', NULL),
(2, 'Helen Robinson', 'rufumydiwe@mailinator.com', '$2y$10$wz2BAEVYRph1JufcL7W90.IsY8KdLsRVBfFj/kF0gpI8p0p9LGYt.', 'Barishal', 'female', NULL),
(4, 'Brett Gordon', 'pufaqugiw@mailinator.com', '$2y$10$oxmubAoABuyBsqvQMq4mNehik9MObIwICWf9dhI/EAPlWiADJE4CS', 'Khulna', 'female', NULL),
(5, 'Alfreda Lang', 'fefoc@mailinator.com', '$2y$10$DEQvN5clNHuR2X8th0cqqeSSbzgEKOQ4a3bjv3aiovuHt54u5bhIG', 'Barishal', 'female', NULL),
(7, 'Jelani Mirand', 'difaruz@mailinator.com', '$2y$10$GIVGhIcXeJ.P1UIbT7b1AeJZQS8vRbodNaEMYWNgpGy3wqIcaF.l2', 'Barishal', 'male', NULL),
(10, 'Monjurul hasan apu', 'monjurulhasanapu7@gmail.com', '$2y$10$uJOSexk8/uMGCTjriZDJauZ3nONqQeKvg7Y6.ov2PSQsALmxWtfWq', 'Barishal', 'male', '66c6e30f7dfee.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
