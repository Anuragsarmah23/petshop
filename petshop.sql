-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2019 at 09:04 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
('admin123', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` mediumint(9) NOT NULL,
  `customerID` varchar(20) NOT NULL,
  `petID` smallint(6) DEFAULT NULL,
  `supplyID` smallint(6) DEFAULT NULL,
  `cartQty` tinyint(4) NOT NULL,
  `baseAmount` smallint(6) NOT NULL,
  `totalAmount` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(20) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `mname` varchar(15) DEFAULT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(191) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pin` int(11) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `mname`, `lname`, `email`, `address`, `contact`, `city`, `state`, `pin`, `password`) VALUES
('dummhy7390', 'dummy', 'do', 'sey', 'dummy@sey.me', 'huwaeuii', 8988123456, 'dummy@sey.me', 'assam', 907891, 'saurav123');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` smallint(6) NOT NULL,
  `type` varchar(50) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `price` mediumint(9) NOT NULL,
  `qty` tinyint(4) NOT NULL,
  `discount` smallint(6) NOT NULL,
  `pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `type`, `breed`, `price`, `qty`, `discount`, `pic`) VALUES
(1, 'dog', 'doberman', 1200, 0, 0, 'doberman.jpg'),
(2, 'dog', 'doberman', 1800, 0, 0, 'dobermanPuppy.jpg'),
(3, 'dog', 'german shepherd', 2800, 4, 0, 'gs.jpg'),
(4, 'dog', 'german shepherd', 2300, 0, 0, 'gspup.jpg'),
(5, 'cat', 'siamese cat', 2100, 1, 0, 'siameseCat.jpg'),
(6, 'cat', 'persian cat', 2100, 0, 0, 'persianCat.jpg'),
(7, 'cat', 'himalayan cat', 2100, 0, 0, 'HimalayanCat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` smallint(6) NOT NULL,
  `type` varchar(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `price` mediumint(9) NOT NULL,
  `qty` tinyint(4) NOT NULL,
  `discount` mediumint(9) NOT NULL,
  `pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `type`, `item`, `price`, `qty`, `discount`, `pic`) VALUES
(1, 'dogfood', 'pedigree(1kg)', 1000, 0, 0, 'pAdult.jpg'),
(2, 'dogfood', 'pedigree(puppies)', 800, 3, 200, 'pSmall.jpg'),
(3, 'dogfood', 'pedigree(meat jerkey)', 1500, 1, 0, 'p.jpg'),
(4, 'aquarium', 'Aquarium1', 4500, 0, 0, 'a1.jpg'),
(5, 'aquarium', 'Aquarium2', 5500, 0, 0, 'a2.jpg'),
(6, 'aquarium', 'Aquarium3', 5000, 1, 0, 'a3.jpg'),
(7, 'aquarium', 'Aquarium4', 7000, 1, 0, 'a4.jpg'),
(8, 'belts', 'Belts1', 300, 0, 0, 'm1.jpg'),
(9, 'belts', 'Belts2', 200, 0, 30, 'm2.jpg'),
(10, 'belts', 'Belts3', 500, 1, 0, 'm3.jpg'),
(12, 'belts', 'Belts5', 600, 2, 50, 'Belts55576.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` smallint(6) NOT NULL,
  `id` varchar(30) NOT NULL,
  `customerID` varchar(20) NOT NULL,
  `petID` smallint(6) DEFAULT NULL,
  `supplyID` smallint(6) DEFAULT NULL,
  `totalAmount` mediumint(9) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `id`, `customerID`, `petID`, `supplyID`, `totalAmount`, `status`) VALUES
(3, 'dummhy73901619', 'dummhy7390', NULL, 9, 170, 'completed'),
(4, 'dummhy73901973', 'dummhy7390', 3, NULL, 2800, 'pending'),
(5, 'dummhy73902105', 'dummhy7390', 4, NULL, 2300, 'pending'),
(6, 'dummhy73902481', 'dummhy7390', NULL, 4, 4500, 'pending'),
(7, 'dummhy73902837', 'dummhy7390', NULL, 1, 1000, 'pending'),
(9, 'dummhy73904546', 'dummhy7390', 1, NULL, 1200, 'pending'),
(10, 'dummhy73904649', 'dummhy7390', 2, NULL, 1800, 'pending'),
(11, 'dummhy73906700', 'dummhy7390', NULL, 9, 170, 'pending'),
(12, 'dummhy73906996', 'dummhy7390', 1, NULL, 1200, 'pending'),
(13, 'dummhy73908218', 'dummhy7390', 6, NULL, 2100, 'pending'),
(14, 'dummhy73908352', 'dummhy7390', 5, NULL, 2100, 'pending'),
(15, 'dummhy73909017', 'dummhy7390', NULL, 1, 1000, 'pending'),
(16, 'dummhy73908266', 'dummhy7390', 2, NULL, 3600, 'pending'),
(17, 'dummhy73908266', 'dummhy7390', NULL, 1, 2000, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petID` (`petID`),
  ADD KEY `supplyID` (`supplyID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `petID` (`petID`),
  ADD KEY `supplyID` (`supplyID`),
  ADD KEY `customerID` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`petID`) REFERENCES `pets` (`id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`supplyID`) REFERENCES `supplies` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`petID`) REFERENCES `pets` (`id`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`supplyID`) REFERENCES `supplies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
