-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2016 at 04:40 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.30

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mst_customer`
--

INSERT INTO `mst_customer` (`id`, `name`, `address`, `phone`) VALUES
(4, 'fdgd', 'dfg', 'dg'),
(5, 'adadd', '', ''),
(6, 'hendra m', 'rancaekek', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `mst_disc`
--

CREATE TABLE IF NOT EXISTS `mst_disc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `disc1` tinyint(2) NOT NULL,
  `disc2` tinyint(2) NOT NULL,
  `disc3` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mst_item`
--

CREATE TABLE IF NOT EXISTS `mst_item` (
  `code` varchar(10) NOT NULL,
  `name` varchar(130) NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `crt_capacity` int(11) NOT NULL,
  `stock` int(11) NOT NULL COMMENT 'per crt',
  `buy_price` double NOT NULL,
  `store_price` double NOT NULL,
  `to_price` double NOT NULL,
  `motoris_price` double NOT NULL,
  `active` tinyint(1) NOT NULL,
  `create_by` varchar(20) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(20) DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_item`
--

INSERT INTO `mst_item` (`code`, `name`, `item_type_id`, `crt_capacity`, `stock`, `buy_price`, `store_price`, `to_price`, `motoris_price`, `active`, `create_by`, `create_at`, `update_by`, `update_at`) VALUES
('adad', 'tesnya', 1, 4, 0, 0, 4, 4, 4, 1, 'admin', '2016-01-18 17:00:00', 'admin', '2016-01-18 17:00:00'),
('brg1', 'name3', 1, 10, 35, 3000, 3500, 4000, 4500, 1, 'admin', '2016-01-16 17:00:00', NULL, NULL),
('coba', 'cobaname2', 1, 12, 39, 9900, 9900, 8000, 9000, 1, 'admin', '2016-01-16 17:00:00', 'admin', '2016-01-16 17:00:00'),
('OKY125', 'Okky Jelly 125gr', 1, 5, 5, 50000, 49000, 48000, 47000, 1, 'admin', '2016-01-16 12:18:52', '', '0000-00-00 00:00:00'),
('tes', 'tango 50gr', 1, 20, 40, 40000, 59000, 1212, 1414, 0, 'admin', '2016-01-15 17:00:00', 'admin', '2016-01-15 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_item_type`
--

CREATE TABLE IF NOT EXISTS `mst_item_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mst_item_type`
--

INSERT INTO `mst_item_type` (`id`, `name`) VALUES
(1, 'Snack'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `mst_payment`
--

CREATE TABLE IF NOT EXISTS `mst_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mst_payment`
--

INSERT INTO `mst_payment` (`id`, `name`) VALUES
(1, 'Cash'),
(2, 'Credit');

-- --------------------------------------------------------

--
-- Table structure for table `mst_salesman`
--

CREATE TABLE IF NOT EXISTS `mst_salesman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mst_supplier`
--

CREATE TABLE IF NOT EXISTS `mst_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mst_supplier`
--

INSERT INTO `mst_supplier` (`id`, `name`, `address`, `phone`) VALUES
(1, 'test sup', 'jl bima 23', '08997811112'),
(2, 'sup2', 'jl gatsu', '08978998999');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE IF NOT EXISTS `mst_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `trn_receiving`
--

CREATE TABLE IF NOT EXISTS `trn_receiving` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_no` varchar(14) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `due_date` date NOT NULL,
  `payment_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `create_by` varchar(20) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(20) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trn_receiving_detail`
--

CREATE TABLE IF NOT EXISTS `trn_receiving_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `head_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trn_sales`
--

CREATE TABLE IF NOT EXISTS `trn_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_no` varchar(14) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `due_date` date NOT NULL,
  `payment_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `create_by` varchar(20) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(20) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trn_sales_detail`
--

CREATE TABLE IF NOT EXISTS `trn_sales_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `head_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
