-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 09:22 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `mail` varchar(60) COLLATE utf8_bin NOT NULL,
  `password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `mail`, `password`) VALUES
(1, 'admin', 'varshneyhardik98@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `pid` int(11) NOT NULL,
  `pname` varchar(60) COLLATE utf8_bin NOT NULL,
  `pdop` date NOT NULL,
  `pavl` int(11) NOT NULL,
  `ptotal` int(11) NOT NULL,
  `porignalprice` int(11) NOT NULL,
  `psellingprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`pid`, `pname`, `pdop`, `pavl`, `ptotal`, `porignalprice`, `psellingprice`) VALUES
(2, 'Ram', '2020-07-21', 86, 100, 1200, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `assigned_work`
--

CREATE TABLE `assigned_work` (
  `r_no` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `request_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_add1` text COLLATE utf8_bin NOT NULL,
  `request_add2` text COLLATE utf8_bin NOT NULL,
  `request_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_pin` int(11) NOT NULL,
  `request_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_mobile` text COLLATE utf8_bin NOT NULL,
  `assign_tech` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assigned_work`
--

INSERT INTO `assigned_work` (`r_no`, `request_id`, `request_info`, `request_desc`, `request_name`, `request_add1`, `request_add2`, `request_city`, `request_state`, `request_pin`, `request_email`, `request_mobile`, `assign_tech`, `request_date`) VALUES
(3, 10, 'hello', 'Basis of JavaScript', 'Hardik', 'H.NO.254', 'Purani Basti', 'ETAH', 'UTTAR PRADESH', 207001, 'varshneyhardik98@gmail.com', '9458804481', 'hardik', '2020-07-15'),
(5, 11, 'hello', 'Basis of JavaScript', 'Hardik', 'H.NO.254', 'Purani Basti', 'ETAH', 'UTTAR PRADESH', 207001, 'varshneyhardik98@gmail.com', '9458804481', 'yashi', '2020-07-19'),
(6, 12, 'Keyboard Not Working', 'Water got spill on it', 'YASHI VARSHNEY', 'H.NO.254', 'Purani Basti', 'ETAH', 'UTTAR PRADESH', 207001, 'varshneyhardik98@gmail.com', '9458804481', 'hardik', '2020-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custid` int(11) NOT NULL,
  `custname` varchar(60) COLLATE utf8_bin NOT NULL,
  `custadd` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpname` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpquantaty` int(11) NOT NULL,
  `cpeach` int(11) NOT NULL,
  `cptotal` int(11) NOT NULL,
  `cpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custid`, `custname`, `custadd`, `cpname`, `cpquantaty`, `cpeach`, `cptotal`, `cpdate`) VALUES
(3, 'YASHI VARSHNEY', 'H.NO.254', 'Ram', 2, 1000, 52, '2020-07-24'),
(4, 'YASHI VARSHNEY', 'H.NO.254', 'Ram', 2, 1000, 52, '2020-07-24'),
(5, 'YASHI VARSHNEY', 'H.NO.254', 'Ram', 2, 1000, 52, '2020-07-24'),
(6, 'YASHI VARSHNEY', 'H.NO.254', 'Ram', 2, 1000, 52, '2020-07-24'),
(7, 'YASHI VARSHNEY', 'H.NO.254', 'Ram', 2, 1000, 52, '2020-07-24'),
(8, 'YASHI VARSHNEY', 'H.NO.254', 'Ram', 2, 1000, 52, '2020-07-24'),
(9, 'YASHI VARSHNEY', 'H.NO.254', 'Ram', 2, 1000, 52, '2020-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `requestor_login`
--

CREATE TABLE `requestor_login` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `mail` varchar(60) COLLATE utf8_bin NOT NULL,
  `password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requestor_login`
--

INSERT INTO `requestor_login` (`id`, `name`, `mail`, `password`) VALUES
(3, 'Hardik ', 'varshneyhardik98@gmail.com', '123456'),
(10, 'YASHI VARSHNEY', 'varshneyyashi98@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `submit_request`
--

CREATE TABLE `submit_request` (
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `request_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_add1` text COLLATE utf8_bin NOT NULL,
  `request_add2` text COLLATE utf8_bin NOT NULL,
  `request_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_pin` int(11) NOT NULL,
  `request_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_mobile` bigint(20) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `technician_login`
--

CREATE TABLE `technician_login` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `city` varchar(60) COLLATE utf8_bin NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `mail` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `technician_login`
--

INSERT INTO `technician_login` (`id`, `name`, `city`, `mobile`, `mail`) VALUES
(1, 'Hardik Varshney', 'ETAH', 9458804481, 'varshneyhardik98@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `assigned_work`
--
ALTER TABLE `assigned_work`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `requestor_login`
--
ALTER TABLE `requestor_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submit_request`
--
ALTER TABLE `submit_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `technician_login`
--
ALTER TABLE `technician_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assigned_work`
--
ALTER TABLE `assigned_work`
  MODIFY `r_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `requestor_login`
--
ALTER TABLE `requestor_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `submit_request`
--
ALTER TABLE `submit_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `technician_login`
--
ALTER TABLE `technician_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
