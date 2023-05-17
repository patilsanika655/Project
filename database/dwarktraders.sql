-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 07:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dwarktraders`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `StoreName` varchar(50) NOT NULL,
  `Owner` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `StoreName`, `Owner`, `Address`, `email`, `password`) VALUES
(1, 'Pacific Digital', 'M.S.Patil', 'Rajarampuri , Kolhapur', 'pacific@digitalc.com', 'pacific123'),
(3, 'Orgon pc', 'A.S.Shinde', 'Kolhapur', 'orgon@pc.com', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Deperatment` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `Name`, `Deperatment`, `salary`, `email`, `password`) VALUES
(1, 'Admin', 'Admin', 50000, 'admin@dwarka.com', 'adminpass@123'),
(2, 'Sanika', 'Sales', 30000, 'sanika@dwarka.com', 'sanika@dwarka');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `orderPlaced` binary(1) NOT NULL,
  `PRICE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderID`, `productID`, `quantity`, `orderPlaced`, `PRICE`) VALUES
(1, 58, 2, 0x01, 6990),
(1, 65, 1, 0x00, 7890);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `orderDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `orderDate`) VALUES
(1, 1, '2023-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productType` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `costPrice` int(10) UNSIGNED NOT NULL,
  `sellingPrice` int(10) UNSIGNED NOT NULL,
  `availability` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productType`, `productName`, `costPrice`, `sellingPrice`, `availability`) VALUES
(2, 'Webcam', 'LOGITECH C310 WEBCAM?', 3040, 3800, 400),
(3, 'Webcam', 'LOGITECH C920 HD WEBCAM?', 6800, 8500, 500),
(4, 'Webcam', 'LOGITECH C370 WEBCAM?', 3600, 4500, 500),
(5, 'Webcam', 'LOGITECH C270 WEBCAM?', 2800, 3500, 500),
(6, 'RAM', '4GB DDR3 /KINGSTON 1600 ?', 1676, 2095, 500),
(7, 'RAM', '16GB /KINGSTON DDR4 ?', 6312, 7890, 50),
(8, 'RAM', 'SIMMTROINCS 4GB L/DT (1333) ?', 1592, 1990, 500),
(9, 'RAM', '4GB DDR4 /CRUCIAL ?', 1592, 1990, 500),
(10, 'RAM', '4GB DDR3 HP ?', 1516, 1895, 500),
(11, 'RAM', '4GB DDR3 CRUCIAL LAP LP ?', 1512, 1890, 450),
(12, 'Printer', 'HP 3635 (INKJET) ?', 4053, 5066, 500),
(13, 'Printer', 'HP 1112 INKJET ?', 1592, 1990, 500),
(14, 'Printer', 'SAMSUNG SCX-2071 W ?', 7836, 9795, 500),
(15, 'Printer', 'SAMSUNG SCX-2021 W ?', 5116, 6395, 500),
(16, 'MotherBoard', 'GIGABYTE 970A- DS3P ?', 4472, 5590, 500),
(17, 'MotherBoard', 'ASUS Z87PRO (1150) ?', 12712, 15890, 500),
(18, 'MotherBoard', 'GIGABYTE 990 FXA- UD3 R5 ?', 9592, 11990, 500),
(19, 'MotherBoard', 'GIGABYTE 970-GAMING ?', 5992, 7490, 500),
(20, 'MotherBoard', 'MSI Z270 GAMING M 3 ?', 11192, 13990, 500),
(21, 'MotherBoard', 'MSI Z270 GAMING PRO CARBO ?', 12792, 15990, 500),
(22, 'MotherBoard', 'MSI Z270 GAMING PRO ?', 11992, 14990, 500),
(23, 'MotherBoard', 'ASUS H97 PRO (1150) ?', 7904, 9880, 500),
(24, 'LED Monitor', 'PHILIPS 18.5 LED (193V5) ?', 3722, 4653, 500),
(25, 'LED Monitor', 'BENQ 20\" (DL 2020) ?', 3912, 4890, 500),
(26, 'LED Monitor', 'PHILIPS 15.6 LED (163VS) ?', 2952, 3690, 200),
(27, 'LED Monitor', 'ASUS 17\" SQUARE (VB178) ?', 4392, 5490, 500),
(28, 'LED Monitor', 'SAMSUNG LED 22\" ?', 5516, 6895, 500),
(29, 'LED Monitor', 'SAMSUNG LED 19\" (S19F350FN ?', 3886, 4857, 500),
(30, 'KeyBoard', 'QHMPL KIT MM ?', 266, 333, 500),
(31, 'KeyBoard', 'TVS CHAMP USB ?', 282, 352, 500),
(32, 'KeyBoard', 'TECH COM USB ?', 160, 200, 500),
(33, 'KeyBoard', 'QHMPL KIT ?', 228, 285, 500),
(34, 'Hard Disk', '1TB SATA WD ?', 2575, 3219, 500),
(35, 'Hard Disk', '1TB SATA TOSHIBA ( HP ) ?', 2476, 3095, 500),
(36, 'Hard Disk', '3TB SV 35 SEAGATE (7200) ?', 5790, 7238, 500),
(37, 'Hard Disk', '4TB AV WD SATA (3 YEAR) ?', 7752, 9690, 500),
(38, 'Hard Disk', '3TB SEAGATE/WD SATA (2 YE ?', 5554, 6942, 500),
(39, 'Hard Disk', '1TB HITACHI LAP/7200RPM ?', 3912, 4890, 500),
(40, 'Hard Disk', '1TB SATA SEAGATE ?', 2636, 3295, 500),
(41, 'Hard Disk', '4TB SEAGATE SATA (2 YEAR) ?', 7306, 9133, 500),
(42, 'DVD Writer', 'LG USB POWER ?', 1162, 1452, 500),
(43, 'DVD Writer', 'ASUS SATA BOX ?', 762, 952, 500),
(44, 'DVD Writer', 'HP SATA BOX ?', 792, 990, 500),
(45, 'DVD Writer', 'LG BLUE RAY SATA (16X) ?', 5592, 6990, 500),
(46, 'DVD Writer', 'LG SATA ?', 686, 857, 500),
(47, 'DVD Writer', 'HP SATA ?', 720, 900, 500),
(48, 'CPU', 'INTEL I-7 (3770) (1155) ?', 14072, 17590, 500),
(49, 'CPU', 'INTEL I-7 (7700K) 7th ?', 20952, 26190, 500),
(50, 'CPU', 'INTEL I-7 (7700) 7th ?', 18552, 23190, 500),
(51, 'CPU', 'INTEL E3 1246 V3 (SERVER) ?', 14392, 17990, 500),
(52, 'CPU', 'INTEL I-3 (3220) 3rd ?', 3592, 4490, 500),
(53, 'CPU', 'INTEL E3 1230 V3 (SERVER) ?', 12712, 15890, 500),
(54, 'CPU', 'INTEL DUAL CORE (G-3220)?', 2552, 3200, 450),
(55, 'CPU', 'INTEL I-3 (4160) 4th ?', 5912, 7390, 500),
(56, 'CPU', 'INTEL I-5 (4690K) (1150) ?', 11832, 14790, 500),
(57, 'CPU', 'INTEL I-3 (4150) 4th ?', 5832, 7290, 500),
(58, 'CPU', 'INTEL DUAL CORE (G-3240)?', 2796, 3495, 500),
(59, 'CPU', 'INTEL I-3 (7100) 7th ?', 6952, 8690, 500),
(60, 'Cabinet SMPS', 'GAMEMAX (9902-A) ?', 6312, 7890, 500),
(61, 'Cabinet SMPS', 'GAMEMAX (9901-B) ?', 5272, 6590, 500),
(62, 'Cabinet SMPS', 'COOLER MASTER 600 W ?', 3512, 4390, 500),
(63, 'Cabinet SMPS', 'COOLER MASTER 460 W ?', 1992, 2490, 500),
(64, 'Cabinet SMPS', 'COOLER MASTER 500 W ?', 2636, 3295, 500),
(65, 'Cabinet SMPS', 'GAMEMAX (9902-A) ?', 6312, 7890, 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
