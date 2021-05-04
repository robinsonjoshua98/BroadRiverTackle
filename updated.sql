-- sql-updated.sql


-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 03, 2021 at 03:58 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `broadRiverFinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'unknown'),
(2, 'Freshwater'),
(3, 'Saltwater'),
(4, 'Freshwater/Saltwater'),
(5, 'Brackish\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `descriptions` varchar(150) NOT NULL,
  `list_price` decimal(10,0) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `images` int(11) DEFAULT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `descriptions`, `list_price`, `date_added`, `images`, `userId`) VALUES
(2, 1, 'Rapala', 'This is a special lure design by lure master in 2006. It is awesome', '23', '2021-05-03 00:10:24', 123, 12),
(7, 2, 'Abu Garcia Fishing Rod', 'This is a brand new rod, I have had it for two years and I have never used it. Just cleaning stuff out ', '135', '2021-05-01 00:35:46', NULL, 26),
(26, 1, 'dog', 'dog', '35', '2021-05-03 00:21:07', NULL, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `passwords` char(60) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `userLevel` varchar(1) NOT NULL DEFAULT 'u',
  `phone` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `email`, `passwords`, `firstName`, `lastName`, `userLevel`, `phone`) VALUES
(1, 'johnsmith@smith.com', 'johnsmithrocks', 'Johnathan', 'Smith', 'a', '847-554-7571'),
(9, 'joshua17!@google.com', '$2y$10$QSDGEj4peRVECj12R4qKh.AgZh4/hPUinjpN1OV0PbClF2pVcBFLi', 'josh', 'rob', 'u', '847-554-7571'),
(10, 'Charlie@wallin.com', '$2y$10$rqu.cbEgjnNTe9ydt0w1ZexcYQAxXyGQX9x//7NxUtKlyfMImtKna', 'Charlie ', 'Wallin', 'u', '847-554-7571'),
(11, 'alecfehl@fehl.com', '$2y$10$xe4x5fV8eXbEZd.dQRefu.XLxq471Hc0K.wCBWnGrxkWiDYmGffGe', 'Alec', 'Fehl', 'u', '847-554-7571'),
(12, '123@mail.com', '$2y$10$E.RcJqC2ARkVro8UBAcRPeXysuhg3/7xrvvwR2EOV.PkQM7FypMgu', 'brian', '321', 'u', '847-554-7571'),
(13, 'joshua17@mail.com', '$2y$10$NeMwWQvzw4ZMVm0PxM8jyu58CINxM7ic6b7pM3.Rh8R5MwVvElTIS', 'josh', 'robinson', 'u', '847-554-7571'),
(14, '12345@mail.com', '$2y$10$SwSq3gj9JP9moYAn1JQz2.uu870PgQsmRJFDudbOx4e9xi1CaK0/u', 'mail', 'wow', 'u', '847-554-7571'),
(15, 'robinsonjoshua98@gmail.com', '$2y$10$7n7V5dxfOrxvwfA8CVAAZuaBHyfdGNZdRXqhnXayl.U1rUXIpj/Uu', 'Joshua ', 'Robinson', 'a', '847-554-7571'),
(16, 'joesmith@email.com', '$2y$10$qQ4OaxirSFAqcQarkruwPO6QSndnGcawpEq2zdYEXiUKp5WeNLHJG', 'joe ', 'smith', 'u', '847-554-7571'),
(21, 'robinsonjoshua98ewrq@gmail.com', '$2y$10$kLKboQ7mbXxqKnkk6GVYX.nhp9fCtOYXLrJawHNDv2sr2qsvi4b..', 'Joshua', 'Robinson', 'u', '8287029133'),
(24, 'robinsonjoshua981111@gmail.com', '$2y$10$5U7pZCR/Bof1N2tqCX5fEu6rizYgxdBzecCcue6BGmdrwshZYLZWi', 'Joshua', 'Robinson', 'u', '8287029133'),
(25, '1robinsonjoshua98@gmail.com', '$2y$10$w2inSJWeAhejN0cmSg7F6Ow1ZUI1KqjM4JSc4f88UPjn5pCWDPFni', 'Joshua', 'Robinson', 'u', '8287029133'),
(26, 'allihackett23@gmail.com', '$2y$10$W9MjbQx3x5VeVfRgkCY0QuG4rDMwOVi0NQUfEijgzExy8vM9v.v3e', 'Alli', 'Hackett', 'u', '828-808-6644');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
