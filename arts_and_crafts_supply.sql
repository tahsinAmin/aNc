-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 04, 2020 at 05:26 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arts_and_crafts_supply`
--

-- --------------------------------------------------------

--
-- Table structure for table `added_to_cart`
--

CREATE TABLE `added_to_cart` (
  `buyer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `frequency` int(11) NOT NULL,
  `amount_to_pay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `added_to_cart`
--

INSERT INTO `added_to_cart` (`buyer_id`, `item_id`, `frequency`, `amount_to_pay`) VALUES
(1, 1, 2, 150),
(1, 3, 2, 160),
(1, 5, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `buyer_profile`
--

CREATE TABLE `buyer_profile` (
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `location` varchar(70) NOT NULL,
  `age` varchar(11) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `visa_masterCard` varchar(6) NOT NULL,
  `password` varchar(5) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_profile`
--

INSERT INTO `buyer_profile` (`first_name`, `last_name`, `buyer_id`, `location`, `age`, `occupation`, `visa_masterCard`, `password`, `email`) VALUES
('Tahsin', 'Amin', 1, '36/3 parker street.', '24', 'Student', '101718', '1b389', 'tahsin.amin@gmail.com'),
('Ahmad', 'Nayem', 2, '34/7 parker street', '34', 'Banker', '174098', '1c84r', 'ahmad@gmail.com'),
('Hasan', 'Zamil', 3, '33/8 long road', '29', 'Banker', '124657', '34567', 'zamil@gmail.com'),
('Sayyed', 'Hasan', 4, '34/8 north tower', '30', 'Business', '126789', '34678', 'Sayyed@gmail.com'),
('Ahmad', 'Sharif', 5, 'long road', '56', 'Retired', '123456', '56780', 'ahmad@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `item_info`
--

CREATE TABLE `item_info` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `in_stock` int(11) NOT NULL,
  `item_description` varchar(1000) NOT NULL,
  `profit_per_piece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_info`
--

INSERT INTO `item_info` (`item_id`, `item_name`, `sell_price`, `in_stock`, `item_description`, `profit_per_piece`) VALUES
(1, 'Three Shelve Floor Lamp Shade', 75, 130, 'Code: D 60\r\nQuality: (A) Grade\r\nSize: Stand = 48”\r\nShade 10”x12”\r\nColor: Black\r\nMaterial: Pine Wood', 25),
(2, 'Triangle Three Leg Floor BlackColor Lamp', 75, 120, 'Code: D 67\r\nQuality: (A) Grade\r\nSize: 48”x8”x16”\r\nColor: Black\r\nMaterial: Canadian Process Pine Wood See Less', 30),
(3, 'Traditional Hariken Lamp with 4 Shelve', 80, 100, '*** Traditional Item ***\r\nTraditional Hariken Lamp with 4 Shelve\r\nCode: FLW 05\r\nSize: 60”x12”\r\nColor: Walnut\r\nLight: Bulb\r\nMaterial: Wood, Coconut Shell, 4 Shelve, 3 Lamp with bulb and Shade\r\nQuality: A grade', 35),
(4, 'Vintage kitchen Wall Large Shelve', 120, 70, '*** Vintage Item ***\r\nVintage kitchen Wall Large Shelve\r\nCode: Np 52\r\nQuality: (A) Grade\r\nSize: 30x”18”x6”\r\nColor: Burn\r\nMaterial: Pine Wood', 25),
(5, 'Z Shape Coffee Table', 200, 150, '*** New Arrival ***\r\nZ Shape Coffee Table\r\nCode: NP116\r\nQuality: (A) Grade\r\nSize: 22”x16”x12”\r\nColor: Walnut\r\nMaterial: Wood', 50);

-- --------------------------------------------------------

--
-- Table structure for table `sold_info`
--

CREATE TABLE `sold_info` (
  `buyer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `frequency` int(11) NOT NULL,
  `profit_gain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sold_info`
--

INSERT INTO `sold_info` (`buyer_id`, `item_id`, `date`, `frequency`, `profit_gain`) VALUES
(1, 1, '2020-08-12', 2, 50),
(1, 3, '2020-08-12', 2, 70),
(1, 5, '2020-08-12', 1, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `added_to_cart`
--
ALTER TABLE `added_to_cart`
  ADD PRIMARY KEY (`buyer_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `buyer_profile`
--
ALTER TABLE `buyer_profile`
  ADD PRIMARY KEY (`buyer_id`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `item_info`
--
ALTER TABLE `item_info`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `sold_info`
--
ALTER TABLE `sold_info`
  ADD PRIMARY KEY (`buyer_id`,`item_id`,`date`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer_profile`
--
ALTER TABLE `buyer_profile`
  MODIFY `buyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_info`
--
ALTER TABLE `item_info`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `added_to_cart`
--
ALTER TABLE `added_to_cart`
  ADD CONSTRAINT `added_to_cart_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `buyer_profile` (`buyer_id`),
  ADD CONSTRAINT `added_to_cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item_info` (`item_id`);

--
-- Constraints for table `sold_info`
--
ALTER TABLE `sold_info`
  ADD CONSTRAINT `sold_info_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `buyer_profile` (`buyer_id`),
  ADD CONSTRAINT `sold_info_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item_info` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
