-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2019 at 09:41 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_flip`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_flip` varchar(45) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `bank_code` varchar(45) DEFAULT NULL,
  `account_number` varchar(45) DEFAULT NULL,
  `beneficiary_name` varchar(45) DEFAULT NULL,
  `remark` varchar(45) DEFAULT NULL,
  `receipt` varchar(45) DEFAULT NULL,
  `time_served` datetime DEFAULT NULL,
  `fee` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_flip`, `amount`, `status`, `timestamp`, `bank_code`, `account_number`, `beneficiary_name`, `remark`, `receipt`, `time_served`, `fee`, `created_at`, `updated_at`) VALUES
(2, '8750859326', 10000, 'PENDING', '2019-10-03 13:28:23', 'BCA', '567567567', 'PT FLIP', 'Test', '', '0000-00-00 00:00:00', 4000, '2019-10-03 13:28:24', '2019-10-03 13:28:24'),
(3, '5942704676', 10000, 'PENDING', '2019-10-03 14:01:01', 'BCA', '567567567', 'PT FLIP', 'Test', '', '0000-00-00 00:00:00', 4000, '2019-10-03 14:01:02', '2019-10-03 14:01:02'),
(4, '9316615872', 10000, 'PENDING', '2019-10-03 14:01:51', 'BCA', '567567567', 'PT FLIP', 'Test', '', '0000-00-00 00:00:00', 4000, '2019-10-03 14:01:52', '2019-10-03 14:01:52'),
(5, '5760240303', 10000, 'PENDING', '2019-10-03 14:02:52', 'BCA', '567567567', 'PT FLIP', 'Test', '', '0000-00-00 00:00:00', 4000, '2019-10-03 14:02:53', '2019-10-03 14:02:53'),
(6, '2672869761', 10000, 'PENDING', '2019-10-03 14:03:19', 'BCA', '567567567', 'PT FLIP', 'Test', '', '0000-00-00 00:00:00', 4000, '2019-10-03 14:03:20', '2019-10-03 14:03:20'),
(7, '666625298', 10000, 'PENDING', '2019-10-03 14:03:40', 'BCA', '567567567', 'PT FLIP', 'Test', '', '0000-00-00 00:00:00', 4000, '2019-10-03 14:03:41', '2019-10-03 14:03:41'),
(8, '8482209112', 10000, 'PENDING', '2019-10-03 14:03:43', 'BCA', '567567567', 'PT FLIP', 'Test', '', '0000-00-00 00:00:00', 4000, '2019-10-03 14:03:44', '2019-10-03 14:03:44'),
(9, '2918503727', 10000, 'PENDING', '2019-10-03 14:03:59', 'BCA', '567567567', 'PT FLIP', 'Test', '', '0000-00-00 00:00:00', 4000, '2019-10-03 14:04:00', '2019-10-03 14:04:00'),
(10, '4235825675', 10000, 'PENDING', '2019-10-03 14:04:18', 'BCA', '567567567', 'PT FLIP', 'Test', '', '0000-00-00 00:00:00', 4000, '2019-10-03 14:04:19', '2019-10-03 14:04:19'),
(11, '6606645318', 10000, 'PENDING', '2019-10-03 14:04:38', 'BCA', '567567567', 'PT FLIP', 'Test', '', '0000-00-00 00:00:00', 4000, '2019-10-03 14:04:39', '2019-10-03 14:04:39'),
(12, '2951430555', 10000, 'SUCCESS', '2019-10-03 14:05:42', 'BCA', '567567567', 'PT FLIP', 'Test', 'https://flip-receipt.oss-ap-southeast-5.aliyu', '2019-10-03 14:07:51', 4000, '2019-10-03 14:05:43', '2019-10-03 14:08:52'),
(13, '3804153974', 10000, 'PENDING', '2019-10-03 14:12:36', 'BCA', '567567567', 'PT FLIP', 'Test', 'https://flip-receipt.oss-ap-southeast-5.aliyu', '2019-10-03 14:12:08', 4000, '2019-10-03 14:12:37', '2019-10-03 14:13:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
