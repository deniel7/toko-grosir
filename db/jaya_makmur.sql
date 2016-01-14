-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2016 at 08:44 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jaya_makmur`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_customer`
--

CREATE TABLE IF NOT EXISTS `mst_customer` (
`id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mst_item`
--

CREATE TABLE IF NOT EXISTS `mst_item` (
  `code` varchar(10) NOT NULL,
  `name` varchar(130) NOT NULL,
  `unit` tinyint(1) NOT NULL,
  `unit_qty` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `buy_price` double NOT NULL,
  `store_price` double NOT NULL,
  `canvas_price` double NOT NULL,
  `motoris_price` double NOT NULL,
  `create_by` varchar(20) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(20) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_supplier`
--

CREATE TABLE IF NOT EXISTS `mst_supplier` (
`id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE IF NOT EXISTS `mst_user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`username`, `password`, `role`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_customer`
--
ALTER TABLE `mst_customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_item`
--
ALTER TABLE `mst_item`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `mst_supplier`
--
ALTER TABLE `mst_supplier`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_customer`
--
ALTER TABLE `mst_customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_supplier`
--
ALTER TABLE `mst_supplier`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
