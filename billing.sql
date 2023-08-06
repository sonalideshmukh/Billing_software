-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 07:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `gstin` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `gstin`, `address`) VALUES
(1, 'sharvi Gavate', '123456434234', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `gst_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `gst_rate`) VALUES
(1, 'Mobile', '1234', 18),
(2, 'Mobile1', '12344', 12),
(3, 'Mobile14', 'fdfs', 12),
(4, 'laptop', '1331', 12);

-- --------------------------------------------------------

--
-- Table structure for table `purchasers`
--

CREATE TABLE `purchasers` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `gstin` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchasers`
--

INSERT INTO `purchasers` (`id`, `name`, `gstin`, `address`) VALUES
(1, 'Monali deshmukh', '123456', 'trimurti vihar pune');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_bills`
--

CREATE TABLE `purchase_bills` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `purchaser_id` int(11) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `gst` varchar(100) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_bills`
--

INSERT INTO `purchase_bills` (`id`, `date`, `product_id`, `seller_id`, `purchaser_id`, `rate`, `gst`, `total`, `qty`) VALUES
(1, '2023-08-05', 1, 1, 1, '12000', '25920.00', '169920', 12),
(3, '2023-08-04', 1, 1, 1, '13000', '28080.00', '184080', 12);

-- --------------------------------------------------------

--
-- Table structure for table `sale_bills`
--

CREATE TABLE `sale_bills` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchaser_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `gst` varchar(100) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_bills`
--

INSERT INTO `sale_bills` (`id`, `date`, `product_id`, `purchaser_id`, `customer_id`, `rate`, `gst`, `total`, `qty`) VALUES
(1, '2023-08-05', 1, 1, 1, '13000', '2340.00', '15340', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `gstin` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `gstin`, `address`) VALUES
(1, 'sonali deshmukh', '123456', 'trimurti vihar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasers`
--
ALTER TABLE `purchasers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_bills`
--
ALTER TABLE `purchase_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_bills`
--
ALTER TABLE `sale_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchasers`
--
ALTER TABLE `purchasers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_bills`
--
ALTER TABLE `purchase_bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sale_bills`
--
ALTER TABLE `sale_bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
