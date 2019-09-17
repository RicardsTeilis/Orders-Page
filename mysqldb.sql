-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2019 at 08:19 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysqldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `name`) VALUES
(1, 'Microsoft'),
(2, 'Apple'),
(3, 'Samsung'),
(4, 'Panasonic');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `customerId` int(11) NOT NULL,
  `priority` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `orderdate` date NOT NULL,
  `ordertype` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `salesman` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `orderlines` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `order_sum` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customerId`, `priority`, `orderdate`, `ordertype`, `salesman`, `orderlines`, `currency`, `order_sum`) VALUES
(1, 0, 'high', '2019-09-02', 'Regular', 'Sales Person', '2', 'Eur', '36.20'),
(2, 0, 'low', '2019-09-19', 'Seasonal', 'John Doe', '3', 'Usd', '88.40'),
(3, 0, 'mid', '2019-08-05', 'Regular', 'Luis Figo', '6', 'Eur', '353.52');

-- --------------------------------------------------------

--
-- Table structure for table `order_lines`
--

CREATE TABLE `order_lines` (
  `orderDetails_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qnty` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `amount_ordered` int(11) NOT NULL,
  `amountdel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_lines`
--

INSERT INTO `order_lines` (`orderDetails_id`, `order_id`, `item`, `qnty`, `price`, `amount_ordered`, `amountdel`) VALUES
(1, 1, 'Movie DVD', 20, '5.50', 6, 4),
(2, 1, 'Book', 20, '3.20', 1, 1),
(3, 2, 'Mousepad', 6, '6.10', 2, 2),
(5, 2, 'Keyboard', 10, '25.10', 2, 2),
(6, 2, 'Desk lamp', 5, '26.00', 1, 0),
(7, 3, 'Ball', 30, '24.15', 5, 3),
(8, 3, 'Headset', 15, '15.40', 2, 2),
(9, 3, 'T-shirt', 15, '5.30', 10, 10),
(10, 3, 'Baseball cap', 40, '6.25', 5, 3),
(11, 3, 'Christmas tree', 10, '45.51', 2, 0),
(12, 3, 'Picture frame', 60, '4.45', 6, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_lines`
--
ALTER TABLE `order_lines`
  ADD PRIMARY KEY (`orderDetails_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_lines`
--
ALTER TABLE `order_lines`
  MODIFY `orderDetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
