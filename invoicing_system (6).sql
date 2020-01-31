-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2020 at 10:28 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoicing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `ctn_airline_name`
--

DROP TABLE IF EXISTS `ctn_airline_name`;
CREATE TABLE IF NOT EXISTS `ctn_airline_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_airline_name`
--

INSERT INTO `ctn_airline_name` (`id`, `user_id`, `name`, `code`, `status`) VALUES
(1, 2, 'sML', '03018029023', 1),
(2, 2, 'SL', '039040130', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ctn_company_address`
--

DROP TABLE IF EXISTS `ctn_company_address`;
CREATE TABLE IF NOT EXISTS `ctn_company_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `house_number` varchar(255) DEFAULT NULL,
  `street_number` varchar(255) DEFAULT NULL,
  `commune` varchar(255) DEFAULT NULL,
  `districk` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `lang` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_profile_id` (`company_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_company_address`
--

INSERT INTO `ctn_company_address` (`id`, `user_id`, `company_id`, `house_number`, `street_number`, `commune`, `districk`, `province`, `lang`) VALUES
(1, 2, 1, '១១', '២២', 'តយុ', 'ដថងហ្ក', 'ថងហ្', 'kh'),
(2, 2, 1, '11', 'wertyui', 'ertyui', 'fghj', 'fghj', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `ctn_company_email`
--

DROP TABLE IF EXISTS `ctn_company_email`;
CREATE TABLE IF NOT EXISTS `ctn_company_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_company_email`
--

INSERT INTO `ctn_company_email` (`id`, `company_id`, `email`, `status`) VALUES
(1, 1, 'seyha21@gmail.com', '1'),
(3, 1, 'testing@mail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ctn_company_phone`
--

DROP TABLE IF EXISTS `ctn_company_phone`;
CREATE TABLE IF NOT EXISTS `ctn_company_phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_company_phone`
--

INSERT INTO `ctn_company_phone` (`id`, `company_id`, `phone`, `status`) VALUES
(1, 1, '12345789', '1'),
(4, 1, '2345678', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ctn_company_profile`
--

DROP TABLE IF EXISTS `ctn_company_profile`;
CREATE TABLE IF NOT EXISTS `ctn_company_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `register_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `en_name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `register_number` varchar(255) DEFAULT NULL,
  `vat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `description` text,
  `exchange_kh` double NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `register_id` (`register_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_company_profile`
--

INSERT INTO `ctn_company_profile` (`id`, `register_id`, `name`, `en_name`, `logo`, `register_number`, `vat`, `email`, `phone`, `description`, `exchange_kh`, `created_at`) VALUES
(1, '2', 'សាកល្បង', 'TESTING', 'Logo.jpg', '923244', '10', 'testing@dev.com', '0313941', NULL, 4050, '2019-12-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ctn_customer`
--

DROP TABLE IF EXISTS `ctn_customer`;
CREATE TABLE IF NOT EXISTS `ctn_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name_kh` varchar(255) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `register_number` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_customer`
--

INSERT INTO `ctn_customer` (`id`, `user_id`, `name_kh`, `name_en`, `register_number`, `website`, `address`, `status`) VALUES
(1, 2, 'ធនាគារ ABA កម្ពុជា', 'ABA Bank of Cambodia', 'N/A', 'N/A', 'N/Aas', 1),
(2, 2, 'ធនាគារ Wing កម្ពុជា', 'Abld', NULL, NULL, 'Phnom Penh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ctn_customer_contact`
--

DROP TABLE IF EXISTS `ctn_customer_contact`;
CREATE TABLE IF NOT EXISTS `ctn_customer_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_customer_contact`
--

INSERT INTO `ctn_customer_contact` (`id`, `customer_id`, `full_name`, `email`, `phone`) VALUES
(3, 1, 'Mr Jonh', 'B', '012 44 55 66'),
(6, 2, 'wing', 'sdf', '012 4949 44'),
(7, 1, 'Mr Bora', 'c', '098 249 209');

-- --------------------------------------------------------

--
-- Table structure for table `ctn_invoice`
--

DROP TABLE IF EXISTS `ctn_invoice`;
CREATE TABLE IF NOT EXISTS `ctn_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `contact_person_id` int(11) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `service_fee_price` double NOT NULL,
  `vat_percent` double NOT NULL,
  `exchange_riel` double NOT NULL,
  `routing` varchar(255) NOT NULL,
  `groupping` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cancel_description` varchar(255) NOT NULL,
  `issue_date` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `status_payment` varchar(50) DEFAULT NULL,
  `status_invoice` varchar(255) NOT NULL,
  `status_vat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice_number` (`invoice_number`),
  KEY `user_id` (`user_id`),
  KEY `customer_id` (`customer_id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `service_id` (`service_id`),
  KEY `issue_date` (`issue_date`),
  KEY `status_invoice` (`status_invoice`),
  KEY `status_vat` (`status_vat`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_invoice`
--

INSERT INTO `ctn_invoice` (`id`, `user_id`, `customer_id`, `contact_person_id`, `contact_phone`, `supplier_id`, `service_id`, `invoice_number`, `total_amount`, `service_fee_price`, `vat_percent`, `exchange_riel`, `routing`, `groupping`, `description`, `cancel_description`, `issue_date`, `created_at`, `status_payment`, `status_invoice`, `status_vat`) VALUES
(1, 2, 1, 3, '012 44 55 66', 9, 6, '2020-000001', 300, 2, 10, 4050, '', '0', '', '', '2020-01-25 03:09:44', '2020-01-25 03:09:44', 'unpaid', 'active', 'vat'),
(2, 2, 1, 3, '012 44 55 66', 9, 6, '2020-V000001', 114, 3, 10, 4050, '', '0', '', '', '2020-01-25 03:10:44', '2020-01-25 03:10:44', 'unpaid', 'active', 'no_vat'),
(3, 1, 1, 3, '012 44 55 66', 6, 2, '2020-000002', 120, 10, 10, 4050, '', '0', '', 'Testing Cancel', '2020-01-25 03:30:44', '2020-01-25 03:30:19', 'unpaid', 'active', 'vat'),
(4, 1, 2, 6, '012 4949 44', 10, 1, '2020-000003', 270, 10, 10, 4050, 'PP-BKK', '0', '', '', '2020-01-25 03:40:25', '2020-01-25 03:38:25', 'unpaid', 'active', 'vat'),
(5, 2, 1, 3, '012 44 55 66', 10, 7, '2020-000005', 60, 2, 10, 4050, '', '0', '', '', '2020-01-27 02:21:29', '2020-01-27 02:21:29', 'unpaid', 'active', 'vat'),
(6, 2, 1, 3, '012 44 55 66', 10, 7, '2020-000006', 60, 2, 10, 4050, '', '0', '', '', '2020-01-27 02:33:36', '2020-01-27 02:21:29', 'unpaid', 'active', 'vat'),
(7, 2, 2, 6, '012 4949 44', 11, 2, '2020-000007', 120, 10, 10, 4050, '', '0', '', '', '2020-01-27 02:39:37', '2020-01-27 02:39:37', 'unpaid', 'active', 'vat'),
(8, 2, 2, 6, '012 4949 44', 1, 5, '2020-000008', 330, 0, 10, 4050, '', '0', '', '', '2020-01-27 02:48:14', '2020-01-27 02:48:14', 'unpaid', 'active', 'vat'),
(9, 2, 2, 6, '012 4949 44', 1, 5, '2020-000009', 330, 0, 10, 4050, '', '0', '', '', '2020-01-27 02:57:23', '2020-01-27 02:57:23', 'unpaid', 'active', 'vat'),
(10, 2, 2, 6, '012 4949 44', 1, 5, '2020-000010', 630, 10, 10, 4050, '', '0', '', '', '2020-01-27 03:04:21', '2020-01-27 03:02:25', 'unpaid', 'active', 'vat'),
(11, 2, 2, 6, '012 4949 44', 7, 4, '2020-000011', 100, 5, 10, 4050, '', '0', '', '', '2020-01-27 03:06:51', '2020-01-27 03:06:51', 'unpaid', 'active', 'vat'),
(12, 2, 2, 6, '012 4949 44', 7, 4, '2020-000012', 100, 5, 10, 4050, '', '0', '', '', '2020-01-27 03:09:01', '2020-01-27 03:09:01', 'unpaid', 'active', 'vat'),
(13, 2, 2, 6, '012 4949 44', 8, 3, '2020-000013', 330, 5, 10, 4050, '', '0', '', '', '2020-01-27 03:14:01', '2020-01-27 03:14:01', 'unpaid', 'active', 'vat');

-- --------------------------------------------------------

--
-- Table structure for table `ctn_invoice_expense`
--

DROP TABLE IF EXISTS `ctn_invoice_expense`;
CREATE TABLE IF NOT EXISTS `ctn_invoice_expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `invoice_expense_id` varchar(255) NOT NULL,
  `expense_price` double NOT NULL,
  `payment_method` int(11) NOT NULL,
  `issue_date` datetime NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice_id` (`invoice_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_invoice_expense`
--

INSERT INTO `ctn_invoice_expense` (`id`, `user_id`, `invoice_id`, `invoice_expense_id`, `expense_price`, `payment_method`, `issue_date`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 1, '#042GA-23', 300, 1, '2020-01-31 03:01:38', 'hgfdwqw4t daf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 3, '#929023', 120, 2, '2020-01-31 03:24:58', 'jhgfdsa', '2020-01-31 03:24:58', '2020-01-31 03:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `ctn_invoice_income`
--

DROP TABLE IF EXISTS `ctn_invoice_income`;
CREATE TABLE IF NOT EXISTS `ctn_invoice_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `new_payment` double NOT NULL,
  `description` text NOT NULL,
  `issue_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'N/A',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `issue_date` (`issue_date`),
  KEY `payment_method` (`payment_method_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_invoice_income`
--

INSERT INTO `ctn_invoice_income` (`id`, `user_id`, `invoice_id`, `payment_method_id`, `new_payment`, `description`, `issue_date`, `created_at`, `status`) VALUES
(1, 1, 3, 1, 60, '', '2020-01-25 03:31:17', '2020-01-25 03:31:17', 'pay off'),
(2, 1, 3, 1, 60, '', '2020-01-25 03:31:52', '2020-01-25 03:31:52', 'pay off'),
(3, 1, 4, 1, 150, '', '2020-01-25 03:38:45', '2020-01-25 03:38:45', 'pay off'),
(4, 2, 2, 1, 100, '', '2020-01-27 10:27:38', '2020-01-27 10:27:38', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `ctn_payment_method`
--

DROP TABLE IF EXISTS `ctn_payment_method`;
CREATE TABLE IF NOT EXISTS `ctn_payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_payment_method`
--

INSERT INTO `ctn_payment_method` (`id`, `user_id`, `name`, `description`, `status`) VALUES
(1, 2, 'Wing', 'Wing Company', 1),
(2, 1, 'ABA', NULL, 1),
(3, 1, 'True Money', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ctn_register`
--

DROP TABLE IF EXISTS `ctn_register`;
CREATE TABLE IF NOT EXISTS `ctn_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `userpass` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `token_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ctn_sales_airticket_list`
--

DROP TABLE IF EXISTS `ctn_sales_airticket_list`;
CREATE TABLE IF NOT EXISTS `ctn_sales_airticket_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `net_price` double DEFAULT NULL,
  `airline_id` int(11) NOT NULL,
  `ticket_number` varchar(255) DEFAULT NULL,
  `passanger_name` varchar(255) DEFAULT NULL,
  `passanger_type` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_airticket_id` (`invoice_id`),
  KEY `airline_id` (`airline_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_sales_airticket_list`
--

INSERT INTO `ctn_sales_airticket_list` (`id`, `invoice_id`, `net_price`, `airline_id`, `ticket_number`, `passanger_name`, `passanger_type`, `quantity`, `price`) VALUES
(1, 4, 120, 1, '03034567890', 'Seyha', 'Child', 1, 150),
(2, 4, 0, 2, '09876543', 'heng', 'Adult', 1, 120);

-- --------------------------------------------------------

--
-- Table structure for table `ctn_sales_hotel`
--

DROP TABLE IF EXISTS `ctn_sales_hotel`;
CREATE TABLE IF NOT EXISTS `ctn_sales_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `checking_date` datetime NOT NULL,
  `checkout_date` datetime NOT NULL,
  `total_room` int(11) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_sales_hotel`
--

INSERT INTO `ctn_sales_hotel` (`id`, `invoice_id`, `checking_date`, `checkout_date`, `total_room`, `room_type`) VALUES
(1, 10, '2020-01-27 00:00:00', '2020-01-30 00:00:00', 8, 'duoble-4,single-4,triple-0,four-0');

-- --------------------------------------------------------

--
-- Table structure for table `ctn_sales_hotel_list`
--

DROP TABLE IF EXISTS `ctn_sales_hotel_list`;
CREATE TABLE IF NOT EXISTS `ctn_sales_hotel_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `net_price` double DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_hotel_id` (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_sales_hotel_list`
--

INSERT INTO `ctn_sales_hotel_list` (`id`, `invoice_id`, `net_price`, `full_name`, `quantity`, `price`) VALUES
(1, 10, NULL, 'Mr. Said Dona', 1, 330),
(2, 10, 0, 'Heng seyha', 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `ctn_sales_insurance`
--

DROP TABLE IF EXISTS `ctn_sales_insurance`;
CREATE TABLE IF NOT EXISTS `ctn_sales_insurance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `from_date` timestamp NULL DEFAULT NULL,
  `to_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_sales_insurance`
--

INSERT INTO `ctn_sales_insurance` (`id`, `invoice_id`, `from_date`, `to_date`) VALUES
(1, 13, '2020-01-26 17:00:00', '2020-01-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ctn_sales_insurance_list`
--

DROP TABLE IF EXISTS `ctn_sales_insurance_list`;
CREATE TABLE IF NOT EXISTS `ctn_sales_insurance_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `net_price` double NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_visa_id` (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_sales_insurance_list`
--

INSERT INTO `ctn_sales_insurance_list` (`id`, `invoice_id`, `net_price`, `full_name`, `quantity`, `price`) VALUES
(1, 13, 0, 'Mr. Long Cheav Peng', 1, 330);

-- --------------------------------------------------------

--
-- Table structure for table `ctn_sales_other_list`
--

DROP TABLE IF EXISTS `ctn_sales_other_list`;
CREATE TABLE IF NOT EXISTS `ctn_sales_other_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `service_for` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `net_price` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_other_id` (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_sales_other_list`
--

INSERT INTO `ctn_sales_other_list` (`id`, `invoice_id`, `full_name`, `service_for`, `quantity`, `price`, `net_price`) VALUES
(1, 5, 'a', 'aa', 1, 10, NULL),
(2, 5, 'b', 'bb', 1, 20, NULL),
(3, 5, 'c', 'cc', 1, 30, NULL),
(4, 6, 'ajhgfd', 'aa', 1, 10, NULL),
(5, 6, 'btrywre', 'bb', 1, 20, NULL),
(6, 6, 'cghfhdfs', 'cc', 1, 30, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ctn_sales_tours`
--

DROP TABLE IF EXISTS `ctn_sales_tours`;
CREATE TABLE IF NOT EXISTS `ctn_sales_tours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `from_date` datetime DEFAULT NULL,
  `to_date` datetime DEFAULT NULL,
  `tour_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_sales_tours`
--

INSERT INTO `ctn_sales_tours` (`id`, `invoice_id`, `from_date`, `to_date`, `tour_code`) VALUES
(1, 1, '2020-01-25 00:00:00', '2020-01-31 00:00:00', 'ADER-0875'),
(2, 2, '2020-01-25 00:00:00', '2020-01-31 00:00:00', 'DER-45');

-- --------------------------------------------------------

--
-- Table structure for table `ctn_sales_tours_list`
--

DROP TABLE IF EXISTS `ctn_sales_tours_list`;
CREATE TABLE IF NOT EXISTS `ctn_sales_tours_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `net_price` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_tour_id` (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_sales_tours_list`
--

INSERT INTO `ctn_sales_tours_list` (`id`, `invoice_id`, `full_name`, `type`, `quantity`, `price`, `net_price`) VALUES
(1, 1, 'a', 'Child', 1, 100, 10),
(2, 1, 'b', 'Adult', 1, 200, 20),
(3, 2, 'c', 'Child', 1, 56, 12),
(4, 2, 'c', 'Child', 1, 58, 14);

-- --------------------------------------------------------

--
-- Table structure for table `ctn_sales_transportation`
--

DROP TABLE IF EXISTS `ctn_sales_transportation`;
CREATE TABLE IF NOT EXISTS `ctn_sales_transportation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `from_date` datetime DEFAULT NULL,
  `to_date` datetime DEFAULT NULL,
  `total_car` int(11) DEFAULT NULL,
  `car_type` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`invoice_id`),
  KEY `total_car` (`total_car`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_sales_transportation`
--

INSERT INTO `ctn_sales_transportation` (`id`, `invoice_id`, `from_date`, `to_date`, `total_car`, `car_type`) VALUES
(1, 11, '2020-01-27 00:00:00', '2020-01-29 00:00:00', 6, 'BMW-1,MOTOROLA-5'),
(2, 12, '2020-01-27 00:00:00', '2020-01-29 00:00:00', 6, 'BMW-1,MOTOROLA-5');

-- --------------------------------------------------------

--
-- Table structure for table `ctn_sales_transportation_list`
--

DROP TABLE IF EXISTS `ctn_sales_transportation_list`;
CREATE TABLE IF NOT EXISTS `ctn_sales_transportation_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `net_price` double NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_visa_id` (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_sales_transportation_list`
--

INSERT INTO `ctn_sales_transportation_list` (`id`, `invoice_id`, `net_price`, `full_name`, `quantity`, `price`) VALUES
(1, 12, 0, 'Ms. Solida', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `ctn_sales_visa`
--

DROP TABLE IF EXISTS `ctn_sales_visa`;
CREATE TABLE IF NOT EXISTS `ctn_sales_visa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `application_date` datetime DEFAULT NULL,
  `pickup_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_sales_visa`
--

INSERT INTO `ctn_sales_visa` (`id`, `invoice_id`, `application_date`, `pickup_date`) VALUES
(1, 3, '2020-01-25 00:00:00', '2020-01-31 00:00:00'),
(2, 7, '2020-01-27 00:00:00', '2020-02-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ctn_sales_visa_list`
--

DROP TABLE IF EXISTS `ctn_sales_visa_list`;
CREATE TABLE IF NOT EXISTS `ctn_sales_visa_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `net_price` double NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_visa_id` (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_sales_visa_list`
--

INSERT INTO `ctn_sales_visa_list` (`id`, `invoice_id`, `net_price`, `full_name`, `nationality`, `passport_number`, `quantity`, `price`) VALUES
(1, 3, 110, 'Heng Seyha', 'Cambodia', '1234567890-', 1, 120),
(2, 7, 0, 'Dona', 'Korean', '123456789', 1, 120);

-- --------------------------------------------------------

--
-- Table structure for table `ctn_services`
--

DROP TABLE IF EXISTS `ctn_services`;
CREATE TABLE IF NOT EXISTS `ctn_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `icon` varchar(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_services`
--

INSERT INTO `ctn_services` (`id`, `user_id`, `icon`, `name`, `status`) VALUES
(1, 1, '', 'Air Ticket', 1),
(2, 1, '', 'Visa', 1),
(3, 1, '', 'Insurance', 1),
(4, 1, '', 'Transportation', 1),
(5, 1, '', 'Hotel', 1),
(6, 1, '', 'Tour', 1),
(7, 1, '', 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ctn_supplier`
--

DROP TABLE IF EXISTS `ctn_supplier`;
CREATE TABLE IF NOT EXISTS `ctn_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `service_id` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_kh` varchar(255) NOT NULL,
  `register_number` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_supplier`
--

INSERT INTO `ctn_supplier` (`id`, `user_id`, `service_id`, `name_en`, `name_kh`, `register_number`, `website`, `address`, `status`) VALUES
(1, 2, '[4,5,7]', 'ABA Bank', '', '#01930', 'aba.com', 'Phnom Penh', 1),
(2, 2, '[]', 'Wing', '', NULL, NULL, 'Phnom Penh', 2),
(5, 2, '[]', 'TESTING', '', NULL, NULL, 'Phnom Penh', 2),
(6, 2, '[2,6]', 'TESTING', '', NULL, NULL, 'Phnom Penh', 1),
(7, 2, '[4]', 'Mr Cambodia', '', NULL, NULL, 'Phnom Penh', 1),
(8, 2, '[3]', 'Mr God', 'លោកព្រះ', NULL, NULL, 'Phnom Penh', 1),
(9, 2, '[6]', 'Kob Fly', 'កប់ Fly', NULL, NULL, 'Address', 1),
(10, 2, '[1,7]', 'Mecro', 'មីក្រូ', NULL, NULL, 'Phnom Penh', 1),
(11, 2, '[2]', 'Visa comapny', 'វីសាក្រុមហ៊ុន', '12349567890', 'adfjsflksjdfasjdf', '.234567890-dfghjkl;cvbnm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ctn_supplier_contact`
--

DROP TABLE IF EXISTS `ctn_supplier_contact`;
CREATE TABLE IF NOT EXISTS `ctn_supplier_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_supplier_contact`
--

INSERT INTO `ctn_supplier_contact` (`id`, `supplier_id`, `full_name`, `email`, `phone`) VALUES
(1, 1, 'Mr ABA', 'aba@gmail.com', '10129 4920'),
(2, 2, 'falkf', 'lfdj', 'sadsflka'),
(3, 3, 'falkf', 'lfdj', 'sadsflka'),
(4, 4, 'rsdf', 'sdf', 'sdfs'),
(5, 5, 'SD', 'SDSF', 'DDF'),
(6, 6, 'DDDdsgs', 'sdfs', 'sdfds'),
(7, 7, 'sdfghjk', 'ertyuio', '23456789'),
(8, 8, 'Mr Cambodia', 'kh@gmail.com', '012 44 999 3'),
(9, 9, 'Mr Kob', 'kob@k.com', '012 333 44 55'),
(10, 10, 'Mr Mecro', 'mecro@cro.me', '023 111 222'),
(11, 11, 'Heng Seyha', 'seyha@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `ctn_supplier_hotel`
--

DROP TABLE IF EXISTS `ctn_supplier_hotel`;
CREATE TABLE IF NOT EXISTS `ctn_supplier_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) DEFAULT NULL,
  `description` text,
  `star_rate` varchar(255) DEFAULT NULL,
  `room_type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplier_id_2` (`supplier_id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_supplier_hotel`
--

INSERT INTO `ctn_supplier_hotel` (`id`, `supplier_id`, `description`, `star_rate`, `room_type`, `status`) VALUES
(1, 1, NULL, '0', '[{\"tag\":\"duoble\"},{\"tag\":\"single\"},{\"tag\":\"triple\"},{\"tag\":\"four\"}]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ctn_supplier_transportation`
--

DROP TABLE IF EXISTS `ctn_supplier_transportation`;
CREATE TABLE IF NOT EXISTS `ctn_supplier_transportation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) DEFAULT NULL,
  `description` text,
  `star_rate` varchar(255) DEFAULT NULL,
  `car_type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplier_id_2` (`supplier_id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctn_supplier_transportation`
--

INSERT INTO `ctn_supplier_transportation` (`id`, `supplier_id`, `description`, `star_rate`, `car_type`, `status`) VALUES
(1, 1, NULL, '4', '[]', 1),
(2, 7, NULL, '0', '[{\"tag\":\"BMW\"},{\"tag\":\"MOTOROLA\"}]', 1),
(3, 8, NULL, '0', '[{\"tag\":\"TOYOTA\"},{\"tag\":\"CAMERY\"},{\"tag\":\"HONDA\"}]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ctn_users`
--

DROP TABLE IF EXISTS `ctn_users`;
CREATE TABLE IF NOT EXISTS `ctn_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `register_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userpass` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `register_id` (`register_id`),
  KEY `company_id` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Heng Seyha', 'seyha21@gmail.com', '', NULL, '$2y$10$qqLzTjFPW/c8V/Q/xs80Fub1P8JL5isTfiP3ojZRWqzPmACPKz.7S', NULL, '2019-10-24 23:06:33', '2019-10-24 23:06:33', 'vat'),
(2, 'admin', 'admin@gmail.com', '', NULL, '$2y$10$OfNapm2GvveGI8G6WVxaC.sJaBH9THVG2U4MZEJdSG0fZASnhQDq2', NULL, '2019-10-26 21:47:46', '2019-10-26 21:47:46', 'vat');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
