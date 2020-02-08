-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2020 at 01:49 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aakrut`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_Id` int(20) NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Product_Img` longblob NOT NULL,
  `Region` varchar(100) NOT NULL,
  `College_Name` varchar(200) NOT NULL,
  `Branch` varchar(50) NOT NULL,
  `Semester` int(10) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Price` int(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Date_Added` timestamp NOT NULL DEFAULT current_timestamp(),
  `Is_Sell` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_Id`, `Product_Name`, `Product_Img`, `Region`, `College_Name`, `Branch`, `Semester`, `Subject`, `Price`, `Type`, `Description`, `Date_Added`, `Is_Sell`) VALUES
(1, 'Techmax Information Technology', '', 'Central', 'KJ Somaiya', 'Information Technology', 3, 'Fundamental Computing', 0, 'Reference Books', 'abcdefghijklmna', '2020-01-29 05:41:22', 0),
(2, 'RRB Mechanical Engineering', '', 'Harbour', 'Viva', 'Mechanical', 6, 'Discrete Mathematics', 0, 'Reference Books', 'abcjfdfhdsjfdnf', '2020-01-29 05:41:22', 0),
(3, 'Painting and Drawing Tools Set', '', 'Central', 'Kelkar', 'Automobile', 1, 'Auto Cad', 0, 'Stationary', 'abcdfklehfoibg', '2020-01-29 05:41:22', 0),
(4, 'Flow error and Congestion Control', '', 'Western', 'Rizvi', 'Computer Science', 3, 'Python 3', 0, 'Study Material', 'qwerejfdkml;dmgl;f', '2020-01-29 05:41:22', 0),
(5, 'Data Structure', '', 'Western', 'Thakur', 'Information Technology', 4, 'Data Structure', 0, 'Reference Books', 'abjksdfsdkflsdkjfhsfdlksfldmvldnvkjdsbgfdkjdbgfjsgdkjgkfdjgkjgiuweyrterhjgfdg', '2020-01-29 08:47:41', 0),
(6, 'Strength of Materials', '', 'Harbour', 'Pillai', 'Mechanical ', 8, 'Strength of Materials', 0, 'Reference Books', 'klafdjdfdsmfd', '2020-01-29 08:47:41', 0),
(7, 'Material Technology', '', 'Trans-Harbour', 'Rodrigues', 'Mechanical ', 7, 'Material Technology', 0, 'Reference Books', 'abcdefghijklmipaftyvwxya', '2020-01-29 08:47:41', 0),
(8, 'Computational Fluid Dynamics', '', 'Central', 'Vishwamatak', 'Automobile ', 5, 'Computational Fluid Dynamics', 0, 'Reference Books', 'abjkxhfuhflds', '2020-01-29 08:47:42', 0),
(13, 'Stapler', '', 'Western', 'Atharva', 'Electrical', 1, 'Electrical vehical  Technology', 0, 'Stationary', 'aklkflkdnf', '2020-01-29 08:53:00', 0),
(14, 'Eraser\'s', '', 'Harbour', 'Amity', 'Electronics and Tele', 2, 'Electromagnetic Engineering', 0, 'Stationary', 'sdf;lsdflds;,;/', '2020-01-29 08:53:00', 0),
(15, 'Highlighter', '', 'Trans-Harbour', 'Datta', 'Instrumentation Engg', 7, 'Analytical Instrumentation', 0, 'Stationary', 'fgfgdf', '2020-01-29 08:53:00', 0),
(16, 'Paper Clip', '', 'Central', 'Bharat', 'Electrical', 5, 'Microwave Engineering', 0, 'Stationary', 'gfhgfhgf', '2020-01-29 08:53:00', 0),
(25, 'a', '', 'a', 'a', 'a', 0, '4', 0, 'Reference Books', 'a', '2020-02-01 09:09:27', 0),
(26, 'a', '', 'a', 'a', 'a', 0, '4', 0, 'Reference Books', 'a', '2020-02-01 09:09:32', 0),
(27, 'g', '', 'g', 'g', 'g', 0, 'g', 0, 'Study Material', 'g', '2020-02-01 09:10:12', 0),
(28, 'z', '', 'z', 'z', 'z', 0, 'z', 0, 'Stationary', 'z', '2020-02-01 09:10:37', 0),
(65, 'fd', '', 'fff', 's', 'a', 0, 'd', 4444, 'Stationary', 'a', '2020-02-01 10:22:10', 0),
(66, '', '', '', '', '', 0, '', 0, 'Stationary', '', '2020-02-01 10:22:10', 0),
(67, '', '', '', '', '', 0, '', 0, 'Study Material', '', '2020-02-01 10:22:10', 0),
(68, '', '', '', '', '', 0, '', 0, 'Study Material', '', '2020-02-01 10:22:10', 0),
(69, 'fd', '', 'fff', 's', 'a', 0, 'd', 4444, 'Stationary', 'a', '2020-02-01 10:22:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Service_Id` int(20) NOT NULL,
  `Service_Type` varchar(50) NOT NULL,
  `Region` varchar(50) NOT NULL,
  `College` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Date_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `User_Id` int(20) NOT NULL,
  `User_Name` varchar(50) NOT NULL,
  `Email_Id` varchar(100) NOT NULL,
  `Mobile_No` int(10) NOT NULL,
  `Verified` tinyint(1) NOT NULL DEFAULT 0,
  `Date_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_product`
--

CREATE TABLE `user_product` (
  `User_Id` int(20) NOT NULL,
  `Product_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_service`
--

CREATE TABLE `user_service` (
  `User_Id` int(20) NOT NULL,
  `Service_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_Id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Service_Id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `Email_Id` (`Email_Id`),
  ADD UNIQUE KEY `Mobile_No` (`Mobile_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `User_Id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
