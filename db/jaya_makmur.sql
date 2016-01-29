-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2016 at 04:09 PM
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
('adad', 'tesnya', 1, 4, 3, 96000, 4, 4, 4, 1, 'admin', '2016-01-18 17:00:00', 'admin', '2016-01-18 17:00:00'),
('brg1', 'name3', 1, 10, 35, 3000, 3500, 4000, 4500, 1, 'admin', '2016-01-16 17:00:00', NULL, NULL),
('coba', 'cobaname2', 1, 12, 39, 9900, 9900, 8000, 9000, 1, 'admin', '2016-01-16 17:00:00', 'admin', '2016-01-16 17:00:00'),
('OKY125', 'Okky Jelly 125gr', 1, 5, 6, 50000, 49000, 48000, 47000, 1, 'admin', '2016-01-16 12:18:52', '', '0000-00-00 00:00:00'),
('tes', 'tango 50gr', 1, 20, 42, 40000, 59000, 1212, 1414, 0, 'admin', '2016-01-15 17:00:00', 'admin', '2016-01-15 17:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mst_salesman`
--

INSERT INTO `mst_salesman` (`id`, `name`, `address`, `phone`) VALUES
(1, 'ujang', 'pagarsih22', '90909');

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
  `due_date` date DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `create_by` varchar(20) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(20) DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `trn_receiving`
--

INSERT INTO `trn_receiving` (`id`, `rec_no`, `supplier_id`, `date`, `due_date`, `payment_id`, `total`, `create_by`, `create_at`, `update_by`, `update_at`, `status`, `active`) VALUES
(2, 'xx', 1, '2016-01-25', '2016-01-19', 0, 190000, 'admin', '2016-01-24 17:00:00', NULL, NULL, 0, 1),
(3, '123', 1, '2016-01-25', '2016-01-26', 0, 192000, 'admin', '2016-01-24 17:00:00', NULL, NULL, 0, 1),
(4, '3333', 1, '2016-01-25', '2016-01-20', 0, 96000, 'admin', '2016-01-24 17:00:00', 'admin', '2016-01-28 17:00:00', 0, 1),
(5, '345', 2, '2016-01-13', '2016-02-13', 0, 600000, 'admin', '2016-01-24 17:00:00', 'admin', '2016-01-25 17:00:00', 0, 1),
(6, '434', 1, '2016-01-25', '1970-01-01', 0, 100000, 'admin', '2016-01-24 17:00:00', NULL, NULL, 0, 1),
(7, 'ttt', 1, '2016-01-25', '1970-01-01', 0, 150000, 'admin', '2016-01-24 17:00:00', NULL, NULL, 0, 1),
(8, '7777', 2, '2016-01-29', '2016-01-29', 0, 368000, 'admin', '2016-01-28 17:00:00', NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trn_receiving_detail`
--

CREATE TABLE IF NOT EXISTS `trn_receiving_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `head_id` int(11) NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=778 ;

--
-- Dumping data for table `trn_receiving_detail`
--

INSERT INTO `trn_receiving_detail` (`id`, `head_id`, `item_id`, `price`, `qty`, `subtotal`) VALUES
(760, 2, 'adad', 95000, 2, 190000),
(761, 3, 'adad', 96000, 2, 192000),
(765, 6, 'OKY125', 50000, 2, 100000),
(766, 7, 'OKY125', 50000, 3, 150000),
(769, 5, '', 50000, 12, 600000),
(770, 5, '', 50000, 2, 100000),
(771, 5, '', 50000, 3, 150000),
(772, 5, '', 50000, 2, 100000),
(773, 5, 'OKY125', 50000, 1, 50000),
(775, 4, 'adad', 96000, 1, 96000),
(776, 8, 'tes', 40000, 2, 80000),
(777, 8, 'adad', 96000, 3, 288000);

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
  `update_by` varchar(20) DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `trn_sales`
--

INSERT INTO `trn_sales` (`id`, `sales_no`, `customer_id`, `date`, `due_date`, `payment_id`, `total`, `create_by`, `create_at`, `update_by`, `update_at`, `status`) VALUES
(3, '777', 4, '2016-01-29', '2016-01-29', 0, 118000, 'admin', '2016-01-28 17:00:00', NULL, NULL, 0),
(4, '888', 5, '2016-01-29', '2016-01-30', 0, 609200, 'admin', '2016-01-28 17:00:00', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trn_sales_detail`
--

CREATE TABLE IF NOT EXISTS `trn_sales_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `head_id` int(11) NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `trn_sales_detail`
--

INSERT INTO `trn_sales_detail` (`id`, `head_id`, `item_id`, `price`, `qty`, `subtotal`) VALUES
(1, 3, 'tes', 59000, 2, 118000),
(2, 4, 'tes', 59000, 10, 590000),
(3, 4, 'OKY125', 9600, 2, 19200);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
