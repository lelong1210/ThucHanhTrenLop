-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2021 at 05:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `STUDENT`
--

-- --------------------------------------------------------

--
-- Table structure for table `GRADES`
--

CREATE TABLE `GRADES` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `MIDTERM1` int(11) NOT NULL,
  `MIDTERM2` int(11) NOT NULL,
  `FINAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `GRADES`
--

INSERT INTO `GRADES` (`ID`, `NAME`, `MIDTERM1`, `MIDTERM2`, `FINAL`) VALUES
(1, 'le quang long tranh', 100, 100, 200),
(2, 'le van tan ho dau', 80, 90, 170),
(3, 'nguyen thi hang ngoa ho', 87, 78, 182),
(4, 'le van phuoc tang long', 77, 98, 196),
(5, 'nguyen thi ngoc linh nhi', 55, 60, 180);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ID`, `NAME`, `PRICE`, `QUANTITY`) VALUES
(2, 'banh trang nuong', 300, 50),
(3, 'banh trang tron', 23300, 350),
(4, 'hu tieu', 24300, 50),
(5, 'pho bo', 98300, 50),
(6, 'banh canh', 3700, 530),
(7, 'banh xeo', 3800, 509),
(8, 'banh trang tron me', 23300, 350),
(9, 'banh trang tron 1 dong me', 23300, 350);

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `SCORE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`ID`, `NAME`, `SCORE`) VALUES
(1, 'le quang long', 7),
(2, 'le van tan', 8),
(3, 'nguyen thi hang', 9),
(4, 'le van phuoc', 10),
(5, 'nguyen thi ngoc linh', 11),
(6, 'le quang long tranh', 5),
(7, 'le van tan ho dau', 12),
(8, 'nguyen thi hang ngoa ho', 9),
(9, 'le van phuoc tang long', 2),
(10, 'nguyen thi ngoc linh nhi', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `GRADES`
--
ALTER TABLE `GRADES`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `GRADES`
--
ALTER TABLE `GRADES`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
