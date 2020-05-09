-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2020 at 01:01 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ingaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `quantity` int(250) NOT NULL,
  `papersize` varchar(200) NOT NULL,
  `design` longblob NOT NULL,
  `printedsides` varchar(100) DEFAULT NULL,
  `paperweight` varchar(500) NOT NULL,
  `description` varchar(1200) DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `access` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `quantity`, `papersize`, `design`, `printedsides`, `paperweight`, `description`, `cost`, `access`) VALUES
(1, 100, 'A5 (210 x 148 mm', '', 'Single', '170 gsm', '', NULL, ''),
(2, 100, 'A2 (594 x 420 mm)', '', 'Single', '300 gsm', '', NULL, ''),
(3, 100, 'A2 (594 x 420 mm)', '', 'Single', '300 gsm', '', NULL, ''),
(4, 100, 'A4 (297 x 210 mm)', '', 'Single', '130 gsm', '', NULL, ''),
(5, 55, 'A5 (210 x 148 mm', 0x4453435f303938382e4a5047, 'Double', '130 gsm', 'asasasa', NULL, ''),
(6, 200, 'A3', 0x4453435f303938382e4a5047, 'Single', '200', 'newwww111', NULL, ''),
(7, 200, 'A3', 0x4453435f303938382e4a5047, 'Single', '200', 'newwww111', NULL, ''),
(8, 200, 'A3', 0x4453435f303938382e4a5047, 'Single', '200', 'newwww111', NULL, ''),
(9, 10, 'A3', 0x4453435f30303039202832292e4a5047, 'Single', '200', 'll', NULL, ''),
(10, 90, 'A4', 0x4453435f343435342e4a5047, 'Single', '200', 'NEW_TEST', NULL, ''),
(17, 1090, 'A3', 0x4453435f343435352e4a5047, 'Single', '200', 'ooo', NULL, ''),
(18, 100, 'A2', 0x4453435f343435352e4a5047, 'Double', '300', 'hello', NULL, ''),
(19, 100, 'A2', 0x4453435f343435352e4a5047, 'Double', '300', 'hello', NULL, 'admin'),
(20, 50, 'A4', 0x4453435f343435352e4a5047, 'Double', '200', 'testing', NULL, 'admin'),
(21, 9999, 'A4', 0x4453435f343435352e4a5047, 'Double', '200', 'ololo', NULL, 'admin'),
(22, 9999, 'A4', 0x4453435f343435352e4a5047, 'Double', '200', 'ololo', NULL, 'admin'),
(23, 0, 'A5', 0x494d475f373232372e4a5047, 'Double', '130', '', NULL, 'test'),
(24, 10, 'A3', 0x4453435f343435342e4a5047, 'Single', '170', 'when loged in', NULL, 'test'),
(25, 100, 'A4', 0x4453435f343435342e4a5047, 'Single', '250', 'neeeew', NULL, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Fname` char(100) NOT NULL,
  `Lname` char(100) NOT NULL,
  `bday` date NOT NULL,
  `gender` char(7) DEFAULT NULL,
  `access` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `Fname`, `Lname`, `bday`, `gender`, `access`) VALUES
(1, 'admin@mail.com', 'admin', '123', 'Admin', 'One', '2000-10-10', 'male', 'admin'),
(2, 'test@mail.com', 'test', '123', 'Test', 'One', '1999-07-25', 'male', 'user'),
(3, 'test2@mail.com', 'test2', '123', 'test', 'two', '1999-02-22', 'male', 'user'),
(4, 'internal1@mail.com', 'internal', '123', 'Internal', 'User_1', '1001-01-01', 'male', 'internal');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
