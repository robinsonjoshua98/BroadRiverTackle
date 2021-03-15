-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 19, 2021 at 09:44 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `broad_river_tackle`
--
CREATE DATABASE IF NOT EXISTS `broad_river_tackle` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `broad_river_tackle`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `description` varchar(150) NOT NULL,
  `list_price` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`),
  KEY `category_id_2` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

DROP TABLE IF EXISTS `shipping_address`;
CREATE TABLE IF NOT EXISTS `shipping_address` (
  `shipping_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `house_number` char(5) NOT NULL,
  `street_name` varchar(35) NOT NULL,
  `state_abbrev` char(2) NOT NULL,
  `zip` char(5) NOT NULL,
  `phone` varchar(14) NOT NULL,
  PRIMARY KEY (`shipping_id`),
  KEY `user_id` (`user_id`),
  KEY `state_abbrev` (`state_abbrev`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `state_lookup`
--

DROP TABLE IF EXISTS `state_lookup`;
CREATE TABLE IF NOT EXISTS `state_lookup` (
  `state_name` varchar(32) NOT NULL,
  `state_abbrev` char(2) NOT NULL,
  PRIMARY KEY (`state_abbrev`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state_lookup`
--

INSERT INTO `state_lookup` (`state_name`, `state_abbrev`) VALUES
('Alaska', 'AK'),
('Alabama', 'AL'),
('Arkansas', 'AR'),
('Arizona', 'AZ'),
('California', 'CA'),
('Colorado', 'CO'),
('Connecticut', 'CT'),
('District of Columbia', 'DC'),
('Delaware', 'DE'),
('Florida', 'FL'),
('Georgia', 'GA'),
('Hawaii', 'HI'),
('Iowa', 'IA'),
('Idaho', 'ID'),
('Illinois', 'IL'),
('Indiana', 'IN'),
('Kansas', 'KS'),
('Kentucky', 'KY'),
('Louisiana', 'LA'),
('Massachusetts', 'MA'),
('Maryland', 'MD'),
('Maine', 'ME'),
('Michigan', 'MI'),
('Minnesota', 'MN'),
('Missouri', 'MO'),
('Mississippi', 'MS'),
('Montana', 'MT'),
('North Carolina', 'NC'),
('North Dakota', 'ND'),
('Nebraska', 'NE'),
('New Hampshire', 'NH'),
('New Jersey', 'NJ'),
('New Mexico', 'NM'),
('Nevada', 'NV'),
('New York', 'NY'),
('Ohio', 'OH'),
('Oklahoma', 'OK'),
('Oregon', 'OR'),
('Pennsylvania', 'PA'),
('Rhode Island', 'RI'),
('South Carolina', 'SC'),
('South Dakota', 'SD'),
('Tennessee', 'TN'),
('Texas', 'TX'),
('Utah', 'UT'),
('Virginia', 'VA'),
('Vermont', 'VT'),
('Washington', 'WA'),
('Wisconsin', 'WI'),
('West Virginia', 'WV'),
('Wyoming', 'WY');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(55) NOT NULL,
  `password` char(60) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `first_name`, `last_name`) VALUES
(1, 'johnsmith@smith.com', 'johnsmithrocks', 'Johnathan', 'Smith'),
(2, 'sallymae@aol.com', '1234IDeclareThumbWar', 'Sally', 'Kelly'),
(3, 'rockjoe@yahoo.com', 'rocksolid', 'Jamie', 'Rockinhimer');
