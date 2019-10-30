-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 07:36 AM
-- Server version: 10.1.39-MariaDB
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
-- Database: `online`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(6) UNSIGNED NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(5, 'camera'),
(1, 'laptop'),
(4, 'mobile'),
(3, 'tablet');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(6) UNSIGNED NOT NULL,
  `country_name` varchar(30) DEFAULT NULL,
  `country_code` varchar(30) NOT NULL,
  `country_currency` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`, `country_code`, `country_currency`) VALUES
(1, 'USA', 'USA', 'USD'),
(2, 'India', 'IN', 'INR'),
(3, 'China', 'CH', 'CNY'),
(4, 'England', 'EN', 'GBP'),
(5, 'Australia', 'AUS', 'AUD');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(6) UNSIGNED NOT NULL,
  `customer_email` varchar(30) DEFAULT NULL,
  `customer_pass` varchar(30) DEFAULT NULL,
  `customer_first_name` varchar(30) NOT NULL,
  `customer_last_name` varchar(30) DEFAULT NULL,
  `customer_address1` varchar(30) DEFAULT NULL,
  `customer_address2` varchar(30) DEFAULT NULL,
  `country_code` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_email`, `customer_pass`, `customer_first_name`, `customer_last_name`, `customer_address1`, `customer_address2`, `country_code`) VALUES
(1, 'johnw@gmail.com', 'johnw123', 'John', 'Wick', '21 street, north cross road', 'Mumbai', 'USA'),
(2, 'davidm@gmail.com', 'davidm123', 'David', 'Micheal', '21 street, north cross road', 'Sydney', 'AUS'),
(3, 'ramk@gmail.com', 'ramk123', 'Ram', 'Krishna', '21 street, north cross road', 'Mumbai', 'IN');

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `dealer_id` int(6) NOT NULL,
  `dealer_login` varchar(30) DEFAULT NULL,
  `dealer_pass` varchar(30) DEFAULT NULL,
  `dealer_name` varchar(30) NOT NULL,
  `dealer_address1` varchar(30) DEFAULT NULL,
  `dealer_address2` varchar(30) DEFAULT NULL,
  `dealer_country` varchar(30) DEFAULT NULL,
  `dealer_offer` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`dealer_id`, `dealer_login`, `dealer_pass`, `dealer_name`, `dealer_address1`, `dealer_address2`, `dealer_country`, `dealer_offer`) VALUES
(1, 'dealer1', 'dealer1pass', 'Dealer One', 'NEW ADDRESS 1-4-789', 'ROSTER STREET', 'USA', 10),
(2, 'dealer2', 'dealer2pass', 'Dealer Two', 'Dealer2address1', 'Dealer2address2', 'India', 15),
(3, 'dealer3', 'dealer3pass', 'Dealer Three', 'Dealer3address1', 'Dealer3address2', 'China', 8),
(4, 'dealer4', 'dealer4pass', 'Dealer Four', 'Dealer4address1', 'Dealer4address2', 'England', 5),
(5, 'dealer5', 'dealer5pass', 'Dealer Five', 'Dealer5address1', 'Dealer5address2', 'Australia', 12);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(6) UNSIGNED NOT NULL,
  `product_name` varchar(30) DEFAULT NULL,
  `product_category` varchar(30) DEFAULT NULL,
  `product_company` varchar(30) NOT NULL,
  `product_price` varchar(30) DEFAULT NULL,
  `product_country` varchar(30) DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `product_rating` varchar(5) DEFAULT NULL,
  `product_create_date` varchar(15) DEFAULT NULL,
  `product_sell_count` int(10) DEFAULT NULL,
  `product_status` varchar(25) DEFAULT NULL,
  `dealer_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_category`, `product_company`, `product_price`, `product_country`, `product_image`, `product_rating`, `product_create_date`, `product_sell_count`, `product_status`, `dealer_id`) VALUES
(1, 'ThinkPad g3750', 'laptop', 'lenevo', '500', 'USA', 'product01.png', '5', '1558528883', 100, 'in stock', 1),
(3, 'Del Vostro 535 ', 'laptop', 'dell', '750', 'USA', 'product03.png', '4', '1558528944', 250, 'out of stock', 1),
(4, 'Samsung Tablet J5', 'tablet', 'samsumg', '150', 'USA', 'product04.png', '5', '1558529029', 10, 'in stock', 1),
(6, 'HP lap 4326', 'laptop', 'HP', '650', 'USA', 'product06.png', '5', '1558529059', 55, 'out of stock', 3),
(7, 'HTC P 585', 'mobile', 'HTC', '300', 'USA', 'product07.png', '4', '1558529118', 55, 'out of stock', 4),
(8, 'Dell Precision m4400', 'laptop', 'dell', '600', 'USA', 'product08.png', '5', '1558528994', 7, 'in stock', 1),
(124, 'HP gaming', 'laptop', 'HP', '1800', 'USA', 'LAPTOP.png', NULL, '1558629080', NULL, 'in stock', 1),
(131, 'msi1200', 'laptop', 'msi', '3000', 'USA', 'LAPTOP.png', NULL, '1558666088', NULL, 'in stock', 1),
(132, 'MASTER15', 'laptop', 'master', '5000', 'USA', 'LAPTOP.png', NULL, '1558666182', NULL, 'in stock', 1),
(133, 'nokia 1100', 'mobile', 'nokia', '1500', 'USA', 'honor-8x.jpg', NULL, '1558675230', NULL, 'in stock', 1);

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `trigg2` AFTER DELETE ON `product` FOR EACH ROW INSERT into trig2 VALUES(OLD.product_name,'product deleted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `triggs` AFTER INSERT ON `product` FOR EACH ROW INSERT INTO trig VALUES(NEW.product_name,'Product Uploaded',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `trig`
--

CREATE TABLE `trig` (
  `product_name` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trig`
--

INSERT INTO `trig` (`product_name`, `action`, `cdate`) VALUES
('sony vaio', 'Product Uploaded', '2019-05-24'),
('msi1200', 'Product Uploaded', '2019-05-24'),
('MASTER15', 'Product Uploaded', '2019-05-24'),
('nokia 1100', 'Product Uploaded', '2019-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `trig2`
--

CREATE TABLE `trig2` (
  `product_name` varchar(100) NOT NULL,
  `deleted_action` varchar(100) NOT NULL,
  `deleted_cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trig2`
--

INSERT INTO `trig2` (`product_name`, `deleted_action`, `deleted_cdate`) VALUES
('sony vaio', 'product deleted', '2019-05-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_code` (`country_code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_code` (`country_code`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`dealer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dealer_id` (`dealer_id`),
  ADD KEY `product_category` (`product_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`country_code`) REFERENCES `country` (`country_code`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`dealer_id`) REFERENCES `dealer` (`dealer_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`product_category`) REFERENCES `category` (`category_name`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
