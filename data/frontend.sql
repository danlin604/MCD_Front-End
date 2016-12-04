SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

DROP TABLE IF EXISTS `supplies`;
CREATE TABLE `supplies` (
  `id` 					int(11) 		NOT NULL,
  `name` 				varchar(256) 	NOT NULL,
  `description` 		varchar(256) 	NOT NULL,
  `receiving_unit` 		varchar(256) 	NOT NULL,
  `receiving_cost` 		decimal(10,2) 	NOT NULL,
  `stock_unit` 			varchar(256) 	NOT NULL,
  `quantities_on_hand` 	int(11) 		NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `supplies` (`id`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stock_unit`, `quantities_on_hand`) VALUES
(1, 'pickels', 'Dairy Farms Pickels', 'Case of 10 jars', 50, 'Jars of 100 pickels', 120),
(2, 'ketchup', 'Dairy Farms Ketchup', 'Case of 15 boxes', 20, 'Boxes of 100 packets of ketchup', 180),
(3, 'tomato', 'Bens tomatos', 'Case of 10 boxes', 40, 'Boxes of 250 tomato slices', 50),
(4, 'Mustard', 'Franks Amazing Mustard', 'Case of 10 boxes', 45, 'Boxes of 150 packets of mustard', 40),
(5, 'Onions', 'Dairy Farms Onions', 'Bag of 80 Onions', 130, '80 Onions', 20),
(6, 'buns', 'Super secret special buns', 'Cases of 20 boxes', 120, 'Boxes of 100 buns', 250),
(7, 'meat patty', 'Bobs Farms Patties', 'Cases of 25 boxes', 450, 'boxes of 90 patties', 250),
(8, 'Mac Sauce', 'super top secret recipe', 'Cases of 10 boxes', 150, 'boxes of 30 packets', 4),
(9, 'fish patty', 'Bobs Farms Patties', 'Cases of 15 boxes', 400, 'boxes of 110 fish patties', 250),
(10, 'fries', 'Bobs Farms Patties', 'Cases of 30 boxes', 250, 'boxes of 500 fries', 300),
(11, 'soft drink', 'gulp gulp fun times', 'Cases of 40 boxes', 450, 'boxes of 110 bottles', 30);

-- --------------------------------------------------------

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `id` 				int(11) 	NOT NULL,
  `name` 			varchar(256) 	NOT NULL,
  `description` 		varchar(256) 	NOT NULL,
  `price` 			decimal(10,2) 	NOT NULL,
  `currAvail` 			int(11) 	NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `stock` (`id`, `name`, `description`, `price`, `currAvail`) VALUES
(1, 'Big Mac', 'One of a kind, legendary Big Mac, made with two 100% Canadian beef patties, special sauce, crisp lettuce, processed cheddar cheese, pickles and onions on a toasted sesame seed bun. Nothing compares to the taste.', 5.99, 3),
(2, 'Double Big Mac', 'One of a kind, Double Big Mac, made with four 100% Canadian beef patties, special sauce, crisp lettuce, processed cheddar cheese, pickles and onions on a toasted sesame seed bun. Nothing compares to the taste.', 8.99, 2),
(3, 'Cheeseburger', 'A slice of melted processed cheddar cheese on a juicy, 100% pure Canadian beef patty with tangy pickles and onions, ketchup and mustard on a freshly-toasted bun.', 3.99, 4),
(4, 'Filet-O-Fish', 'Fresh from the deep, cold waters of Alaska’s Bering Sea, this light filet of Alaska Pollock is all yours. Pure temptation on a lightly steamed bun, topped with processed cheddar cheese and tangy tartar sauce.', 4.99, 10),
(5, 'Fries', 'McDonald’s World Famous Fries are always a delicious choice. Served perfectly golden, our fries promise a one-of-a-kind taste because they’re made from the finest potatoes from Canadian farms. Mmmm… of course you want fries with that!', 4.60, 1),
(6, 'Soft Drink', 'A cold and refreshing companion to any meal on our menu.', 4.60, 1);

-- --------------------------------------------------------

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE `recipes` (
  `id` 					int(11) 		NOT NULL,
  `name` 				varchar(256) 	NOT NULL,
  `description` 		varchar(256) 	NOT NULL,
  `pickel` 				int(11) 		NOT NULL,
  `ketchup` 			int(11) 		NOT NULL,
  `tomato` 				int(11) 		NOT NULL,
  `mustard` 			int(11) 		NOT NULL,
  `onions` 				int(11) 		NOT NULL,
  `buns` 				int(11) 		NOT NULL,
  `meat_patty` 			int(11) 		NOT NULL,
  `mac_sauce` 			int(11) 		NOT NULL,
  `fish_patty` 			int(11) 		NOT NULL,
  `fries` 				int(11) 		NOT NULL,
  `soft_drink` 			int(11) 		NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `recipes` (`id`, `name`, `description`, `pickel`, `ketchup`, `tomato`, `mustard`, `onions`, `buns`, `meat_patty`, `mac_sauce`, `fish_patty`, `fries`, `soft_drink`) VALUES
(1, 'Big Mac', 'One of a kind, legendary Big Mac, made with two 100% Canadian beef patties, special sauce, crisp lettuce, processed cheddar cheese, pickles and onions on a toasted sesame seed bun. Nothing compares to the taste.', 2,0,0,0,3,1,2,1,0,0,0),
(2, 'Double Big Mac', 'One of a kind, Double Big Mac, made with four 100% Canadian beef patties, special sauce, crisp lettuce, processed cheddar cheese, pickles and onions on a toasted sesame seed bun. Nothing compares to the taste.', 4,0,0,0,4,1,4,2,0,0,0),
(3, 'Cheeseburger', 'A slice of melted processed cheddar cheese on a juicy, 100% pure Canadian beef patty with tangy pickles and onions, ketchup and mustard on a freshly-toasted bun.', 2,1,1,1,0,2,1,0,0,0,0),
(4, 'Filet-O-Fish', 'Fresh from the deep, cold waters of Alaska’s Bering Sea, this light filet of Alaska Pollock is all yours. Pure temptation on a lightly steamed bun, topped with processed cheddar cheese and tangy tartar sauce.', 1,0,0,0,0,1,0,0,1,0,0),
(5, 'Fries', 'McDonald’s World Famous Fries are always a delicious choice. Served perfectly golden, our fries promise a one-of-a-kind taste because they’re made from the finest potatoes from Canadian farms. Mmmm… of course you want fries with that!', 0,0,0,0,0,0,0,0,0,1,0),
(6, 'Soft Drink', 'A cold and refreshing companion to any meal on our menu.', 0,0,0,0,0,0,0,0,0,0,1);


-- --------------------------------------------------------
-- Transaction model....
-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Indexes for table `menu`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);  

