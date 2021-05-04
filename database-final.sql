-- Test User
-- 
-- testuser@mail.com
-- user123
--
-- Test Admin
-- 
-- testadmin@mail.com
-- admin123
--
--
--
--
--
--phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 04, 2021 at 01:19 PM
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

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `descriptions` varchar(150) NOT NULL,
  `list_price` decimal(10,0) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `descriptions`, `list_price`, `date_added`, `userId`) VALUES
(2, 3, 'Rapala', 'This is a special lure design by lure master in 2006. It is awesome', '24', '2021-05-04 07:26:57', 12),
(45, 2, 'Whopper Plopper', 'I have a brand new white whopper plopper. Still in box. I will sell and ship for 20 bucks. ', '20', '2021-05-04 10:34:37', 15),
(47, 1, 'test', 'testssss', '23', '2021-05-04 12:16:11', 15),
(50, 4, 'Fishing  Rod and Reel', 'This is a new rod and reel. very nice. 200 dollars', '125', '2021-05-04 12:50:52', 34),
(52, 4, 'Jon Boat', 'Used, but in very good condition. Only took on the river a handful of times', '350', '2021-05-04 12:49:40', 35);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

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
(9, 'joshua17!@google.com', '$2y$10$QSDGEj4peRVECj12R4qKh.AgZh4/hPUinjpN1OV0PbClF2pVcBFLi', 'josh', 'rob', 'u', '847-554-7571'),
(10, 'Charlie@wallin.com', '$2y$10$rqu.cbEgjnNTe9ydt0w1ZexcYQAxXyGQX9x//7NxUtKlyfMImtKna', 'Charlie ', 'Wallin', 'u', '847-554-7571'),
(11, 'alecfehl@fehl.com', '$2y$10$xe4x5fV8eXbEZd.dQRefu.XLxq471Hc0K.wCBWnGrxkWiDYmGffGe', 'Alec', 'Fehl', 'u', '847-554-7571'),
(12, '123@mail.com', '$2y$10$E.RcJqC2ARkVro8UBAcRPeXysuhg3/7xrvvwR2EOV.PkQM7FypMgu', 'Brian', 'Simms', 'a', '847-554-7571'),
(13, 'joshua17@mail.com', '$2y$10$NeMwWQvzw4ZMVm0PxM8jyu58CINxM7ic6b7pM3.Rh8R5MwVvElTIS', 'josh', 'robinson', 'u', '847-554-7571'),
(14, '12345@mail.com', '$2y$10$SwSq3gj9JP9moYAn1JQz2.uu870PgQsmRJFDudbOx4e9xi1CaK0/u', 'mail', 'wow', 'u', '847-554-7571'),
(15, 'robinsonjoshua98@gmail.com', '$2y$10$7n7V5dxfOrxvwfA8CVAAZuaBHyfdGNZdRXqhnXayl.U1rUXIpj/Uu', 'Joshua ', 'Robinson', 'a', '828-702-9133'),
(16, 'joesmith@email.com', '$2y$10$qQ4OaxirSFAqcQarkruwPO6QSndnGcawpEq2zdYEXiUKp5WeNLHJG', 'joe ', 'smith', 'u', '847-554-7571'),
(21, 'robinsonjoshua98ewrq@gmail.com', '$2y$10$kLKboQ7mbXxqKnkk6GVYX.nhp9fCtOYXLrJawHNDv2sr2qsvi4b..', 'Joshua', 'Robinson', 'u', '8287029133'),
(24, 'robinsonjoshua981111@gmail.com', '$2y$10$5U7pZCR/Bof1N2tqCX5fEu6rizYgxdBzecCcue6BGmdrwshZYLZWi', 'Joshua', 'Robinson', 'u', '8287029133'),
(26, 'allihackett23@gmail.com', '$2y$10$W9MjbQx3x5VeVfRgkCY0QuG4rDMwOVi0NQUfEijgzExy8vM9v.v3e', 'Alli', 'Hackett', 'u', '828-808-6644'),
(27, 'robinsonjoshuffffa98@gmail.com', '$2y$10$iQdFCh8CRW/nvU2PxsFvU.MeKkEbkDoSVSIy/s5O.2asE0TZwS3oq', 'Joshua', 'Robinson', 'u', '8287029133'),
(30, 'robinson9750@bellsouth.net', '$2y$10$MBwGKBzKBiTn3Kohvpmh9eJ9Y.IvQjlCYg.8H8p9ZHbyekIouTwqa', 'Laura', 'Robinson', 'u', '8286068033'),
(34, 'testuser@mail.com', '$2y$10$Adfo6vtItkQ6/Dun7hq7KO5AGkTgAHQX0VPXuaNP7k/1fnKvU2eli', 'test', 'user', 'u', '8287029133'),
(35, 'testadmin@mail.com', '$2y$10$HBRzHkTn6jcbLsQcxa7c/Oru.MMp16GwndT2TosmpHvr1eCLXZ/KO', 'Test', 'admin', 'a', '828-703-3636');

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
