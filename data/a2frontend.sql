-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2016 at 02:01 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a2combined`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `pickel` int(11) NOT NULL,
  `ketchup` int(11) NOT NULL,
  `tomato` int(11) NOT NULL,
  `mustard` int(11) NOT NULL,
  `onions` int(11) NOT NULL,
  `buns` int(11) NOT NULL,
  `meat_patty` int(11) NOT NULL,
  `mac_sauce` int(11) NOT NULL,
  `fish_patty` int(11) NOT NULL,
  `fries` int(11) NOT NULL,
  `soft_drink` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `description`, `pickel`, `ketchup`, `tomato`, `mustard`, `onions`, `buns`, `meat_patty`, `mac_sauce`, `fish_patty`, `fries`, `soft_drink`) VALUES
(1, 'Big Mac', 'One of a kind, legendary Big Mac, made with two 100% Canadian beef patties, special sauce, crisp lettuce, processed cheddar cheese, pickles and onions on a toasted sesame seed bun. Nothing compares to the taste.', 2, 0, 0, 0, 3, 1, 2, 1, 0, 0, 0),
(2, 'Double Big Mac', 'One of a kind, Double Big Mac, made with four 100% Canadian beef patties, special sauce, crisp lettuce, processed cheddar cheese, pickles and onions on a toasted sesame seed bun. Nothing compares to the taste.', 4, 0, 0, 0, 4, 1, 4, 2, 0, 0, 0),
(3, 'Cheeseburger', 'A slice of melted processed cheddar cheese on a juicy, 100% pure Canadian beef patty with tangy pickles and onions, ketchup and mustard on a freshly-toasted bun.', 2, 1, 1, 1, 0, 2, 1, 0, 0, 0, 0),
(4, 'Filet-O-Fish', 'Fresh from the deep, cold waters of Alaska’s Bering Sea, this light filet of Alaska Pollock is all yours. Pure temptation on a lightly steamed bun, topped with processed cheddar cheese and tangy tartar sauce.', 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0),
(5, 'Fries', 'McDonald’s World Famous Fries are always a delicious choice. Served perfectly golden, our fries promise a one-of-a-kind taste because they’re made from the finest potatoes from Canadian farms. Mmmm… of course you want fries with that!', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(6, 'Soft Drink', 'A cold and refreshing companion to any meal on our menu.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `currAvail` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `name`, `description`, `price`, `currAvail`) VALUES
(1, 'Big Mac', 'One of a kind, legendary Big Mac, made with two 100% Canadian beef patties, special sauce, crisp lettuce, processed cheddar cheese, pickles and onions on a toasted sesame seed bun. Nothing compares to the taste.', '5.99', 3),
(2, 'Double Big Mac', 'One of a kind, Double Big Mac, made with four 100% Canadian beef patties, special sauce, crisp lettuce, processed cheddar cheese, pickles and onions on a toasted sesame seed bun. Nothing compares to the taste.', '8.99', 2),
(3, 'Cheeseburger', 'A slice of melted processed cheddar cheese on a juicy, 100% pure Canadian beef patty with tangy pickles and onions, ketchup and mustard on a freshly-toasted bun.', '3.99', 4),
(4, 'Filet-O-Fish', 'Fresh from the deep, cold waters of Alaska’s Bering Sea, this light filet of Alaska Pollock is all yours. Pure temptation on a lightly steamed bun, topped with processed cheddar cheese and tangy tartar sauce.', '4.99', 10),
(5, 'Fries', 'McDonald’s World Famous Fries are always a delicious choice. Served perfectly golden, our fries promise a one-of-a-kind taste because they’re made from the finest potatoes from Canadian farms. Mmmm… of course you want fries with that!', '4.60', 1),
(6, 'Soft Drink', 'A cold and refreshing companion to any meal on our menu.', '4.60', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
