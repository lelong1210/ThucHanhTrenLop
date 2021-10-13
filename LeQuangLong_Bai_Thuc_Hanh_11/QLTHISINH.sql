-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 13, 2021 at 05:48 AM
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
-- Database: `QLTHISINH`
--

-- --------------------------------------------------------

--
-- Table structure for table `thisinh`
--

CREATE TABLE `thisinh` (
  `mathisinh` int(11) NOT NULL,
  `tenthisinh` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `quequan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tongdiem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thisinh`
--

INSERT INTO `thisinh` (`mathisinh`, `tenthisinh`, `ngaysinh`, `quequan`, `tongdiem`) VALUES
(1, 'le quang long', '2002-10-12', 'quang binh', 30),
(2, 'le quang linh', '2002-10-12', 'quang binh', 29),
(3, 'le viet huong', '2002-10-12', 'quang binh', 20),
(4, 'pham quang thanh', '2002-10-12', 'quang binh', 29),
(5, 'le quang son', '2002-10-12', 'quang binh', 29),
(6, 'nguyen van long', '2002-10-12', 'quang binh', 30),
(7, 'le quang thanh cong ', '2002-12-10', 'quang binh', 27),
(8, 'le quang linh linh nhi', '2002-12-10', 'quang binh', 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thisinh`
--
ALTER TABLE `thisinh`
  ADD PRIMARY KEY (`mathisinh`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thisinh`
--
ALTER TABLE `thisinh`
  MODIFY `mathisinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
