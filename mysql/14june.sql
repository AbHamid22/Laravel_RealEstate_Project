-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2025 at 08:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `laravel_agents`
--

CREATE TABLE `laravel_agents` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_agents`
--

INSERT INTO `laravel_agents` (`id`, `photo`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, '1.png', 'Abdul Hamid', 'mymensinghtanvirahmmed@gmail.com', '2456', '2025-05-04 06:22:12', '2025-05-04 06:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_cache`
--

CREATE TABLE `laravel_cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laravel_categories`
--

CREATE TABLE `laravel_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_categories`
--

INSERT INTO `laravel_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Commercial', '2025-05-04 06:16:06', '2025-05-04 06:16:06'),
(2, 'Residential', '2025-05-06 04:39:08', '2025-05-06 04:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_companies`
--

CREATE TABLE `laravel_companies` (
  `id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `bin` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `area` varchar(45) DEFAULT NULL,
  `street_address` varchar(45) DEFAULT NULL,
  `post_code` varchar(45) DEFAULT NULL,
  `inactive` tinyint(3) UNSIGNED DEFAULT NULL,
  `logo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_companies`
--

INSERT INTO `laravel_companies` (`id`, `name`, `mobile`, `bin`, `email`, `website`, `city`, `area`, `street_address`, `post_code`, `inactive`, `logo`) VALUES
(1, 'Real Estate', '432523432', '3423423432', 'realestate@gmail.com', 'www.realestate.com', 'Dhaka', 'Mirpur', 'Building: 21, Road: 12, Block: A', '1219', NULL, '1.png');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_contractors`
--

CREATE TABLE `laravel_contractors` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact_info` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_contractors`
--

INSERT INTO `laravel_contractors` (`id`, `photo`, `name`, `contact_info`, `created_at`) VALUES
(1, '1.jpg', 'Jahidul Islam', '4153434563', '2025-05-05 06:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_customers`
--

CREATE TABLE `laravel_customers` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `type` text NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_customers`
--

INSERT INTO `laravel_customers` (`id`, `photo`, `name`, `email`, `phone`, `type`, `created_at`, `updated_at`) VALUES
(1, '1.jpg', 'Abdul Hamid', 'hamidyahoo22@gmail.com', '24560200', 'buyer', '2025-05-27 06:24:27', '2025-05-27 12:24:27'),
(2, '2.jpg', 'SOHEL RANA', 'sohelrana121646@gmail.com', '655224000', 'individual', '2025-05-27 06:23:33', '2025-05-27 12:23:33'),
(3, '3.jpg', 'Jabbar Khan', 'jabbar@gmail.com', '01247585221', 'buyer', '2025-05-30 19:59:01', '2025-05-31 01:59:01'),
(4, '4.jpg', 'Lamia Akter', 'lamia@gmail.com', '02315648977', 'buyer', '2025-06-14 04:03:38', '2025-06-14 10:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_invoices`
--

CREATE TABLE `laravel_invoices` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_amount` decimal(12,2) DEFAULT NULL,
  `status` enum('Unpaid','Paid','Partial') DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_invoices`
--

INSERT INTO `laravel_invoices` (`id`, `customer_id`, `total_amount`, `status`, `issue_date`, `due_date`, `created_at`, `updated_at`, `remark`) VALUES
(2, 1, 123000000.00, 'Unpaid', '2025-05-12', '2025-05-11', '2025-05-30 11:44:59', '2025-05-30 17:44:59', NULL),
(3, 1, 23152.00, 'Unpaid', '2025-05-26', '2025-05-26', '2025-05-30 11:45:07', '2025-05-30 17:45:07', 'test'),
(4, 1, 23152.00, 'Unpaid', '2025-05-26', '2025-05-26', '2025-05-30 11:45:14', '2025-05-30 17:45:14', 'test'),
(5, 1, 23152.00, 'Unpaid', '2025-05-30', '2025-05-30', '2025-05-30 11:45:31', '2025-05-30 17:45:31', 'test'),
(6, 2, 20000.00, 'Unpaid', '2025-05-30', '2025-05-30', '2025-05-30 11:45:25', '2025-05-30 17:45:25', NULL),
(7, 2, 20000.00, NULL, '2025-05-30', '2025-05-30', '2025-05-30 00:16:01', '2025-05-30 06:16:01', NULL),
(8, 1, 2000.00, 'Partial', '2025-05-30', '2025-05-30', '2025-05-30 00:27:28', '2025-05-30 06:27:28', 'Test invoice'),
(9, 1, 50000.00, NULL, '2025-05-30', '2025-05-30', '2025-05-30 00:30:47', '2025-05-30 06:30:47', 'Yes'),
(10, 2, 4000000.00, NULL, '2025-05-30', '2025-05-30', '2025-05-30 00:33:09', '2025-05-30 06:33:09', 'Very Important'),
(11, 1, 20000000.00, 'Unpaid', '2025-05-30', '2025-05-30', '2025-05-30 05:13:38', '2025-05-30 11:13:38', 'v.v.i'),
(12, 2, 620.00, 'Unpaid', '2025-05-30', '2025-05-30', '2025-05-30 05:18:45', '2025-05-30 11:18:45', 'Y'),
(13, 1, 19999.00, 'Paid', '2025-05-30', '2025-05-30', '2025-05-30 05:24:50', '2025-05-30 11:24:50', NULL),
(14, 1, 50000.00, 'Unpaid', '2025-05-30', '2025-05-30', '2025-05-30 05:30:54', '2025-05-30 11:30:54', 'YES'),
(15, 2, 20000.00, 'Unpaid', '2025-05-30', '2025-05-30', '2025-05-30 05:32:30', '2025-05-30 11:32:30', 'df'),
(16, 2, 5000000000.00, 'Unpaid', '2025-05-30', '2025-05-30', '2025-05-30 05:35:54', '2025-05-30 11:35:54', 'sdffff'),
(17, 1, 100000100.00, 'Unpaid', '2025-05-30', '2025-06-10', '2025-05-30 05:36:38', '2025-05-30 11:36:38', 'sdss'),
(18, 1, 5000000.00, 'Paid', '2025-05-30', '2025-05-30', '2025-05-30 12:24:54', '2025-05-30 18:24:54', NULL),
(19, 2, 10000000.00, 'Paid', '2025-05-30', '2025-05-30', '2025-05-30 12:29:12', '2025-05-30 18:29:12', NULL),
(20, 1, 5000000.00, 'Paid', '2025-05-30', '2025-05-30', '2025-05-30 12:31:19', '2025-05-30 18:31:19', NULL),
(21, 2, 20010000.00, 'Unpaid', '2025-05-30', '2025-05-30', '2025-05-30 12:35:32', '2025-05-30 18:35:32', NULL),
(22, 1, 100000000.00, 'Unpaid', '2025-05-30', '2025-07-12', '2025-05-30 13:43:40', '2025-05-30 19:43:40', 'Important Invoice'),
(23, 1, 119972020.00, 'Unpaid', '2025-05-30', '2025-06-18', '2025-05-30 13:56:47', '2025-05-30 19:56:47', 'Yes'),
(24, 3, 3547800.00, 'Unpaid', '2025-05-31', '2025-06-27', '2025-05-30 23:39:07', '2025-05-31 05:39:07', 'yea'),
(25, 2, 354789.00, 'Unpaid', '2025-06-03', '2025-06-03', '2025-06-03 11:42:18', '2025-06-03 17:42:18', 'Test'),
(26, 4, 3447800.00, 'Unpaid', '2025-06-14', '2025-07-01', '2025-06-13 22:04:59', '2025-06-14 04:04:59', NULL),
(27, 4, 3447800.00, 'Unpaid', '2025-06-14', '2025-07-01', '2025-06-13 22:05:16', '2025-06-14 04:05:16', NULL),
(28, 4, 3447800.00, 'Unpaid', '2025-06-14', '2025-07-01', '2025-06-13 22:08:12', '2025-06-14 04:08:12', NULL),
(29, 4, 180000000.00, 'Paid', '2025-06-14', '2025-06-14', '2025-06-14 06:03:29', '2025-06-14 12:03:29', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_invoice_details`
--

CREATE TABLE `laravel_invoice_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `property_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `amount` float NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `project_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_invoice_details`
--

INSERT INTO `laravel_invoice_details` (`id`, `invoice_id`, `property_id`, `amount`, `created_at`, `updated_at`, `project_id`, `discount`) VALUES
(1, 4, 3, 1002000, '2025-05-26 06:39:43', '2025-05-26 06:39:43', 5, 0),
(2, 4, 4, 5202000, '2025-05-26 06:39:43', '2025-05-26 06:39:43', 5, 0),
(3, 5, 3, 1002000, '2025-05-30 05:57:41', '2025-05-30 05:57:41', 5, 0),
(4, 5, 4, 5202000, '2025-05-30 05:57:41', '2025-05-30 05:57:41', 5, 0),
(5, 8, 10, 1000, '2025-05-30 06:27:28', '2025-05-30 06:27:28', 0, 100),
(6, 8, 11, 1000, '2025-05-30 06:27:28', '2025-05-30 06:27:28', 0, 0),
(7, 9, 6, 50000, '2025-05-30 06:30:47', '2025-05-30 06:30:47', 5, 0),
(8, 10, 8, 4000000, '2025-05-30 06:33:09', '2025-05-30 06:33:09', 5, 0),
(9, 11, 5, 20000000, '2025-05-30 11:13:38', '2025-05-30 11:13:38', 5, 0),
(10, 12, 5, 620, '2025-05-30 11:18:45', '2025-05-30 11:18:45', 5, 0),
(11, 13, 5, 20000, '2025-05-30 11:24:51', '2025-05-30 11:24:51', 5, 1),
(12, 14, 3, 50000, '2025-05-30 11:30:54', '2025-05-30 11:30:54', 5, 0),
(13, 15, 3, 20000, '2025-05-30 11:32:30', '2025-05-30 11:32:30', 5, 0),
(14, 16, 5, 5000000000, '2025-05-30 11:35:54', '2025-05-30 11:35:54', 5, 0),
(15, 17, 5, 100000000, '2025-05-30 11:36:38', '2025-05-30 11:36:38', 5, 0),
(16, 20, 5, 5000000, '2025-05-30 18:31:19', '2025-05-30 18:31:19', 3, 0),
(17, 21, 10, 20010000, '2025-05-30 18:35:32', '2025-05-30 18:35:32', 3, 0),
(18, 22, 10, 100002000, '2025-05-30 19:43:40', '2025-05-30 19:43:40', 3, 2020),
(19, 23, 10, 100002000, '2025-05-30 19:56:47', '2025-05-30 19:56:47', 3, 10000),
(20, 23, 8, 20000000, '2025-05-30 19:56:47', '2025-05-30 19:56:47', 3, 20000),
(21, 24, 7, 3547800, '2025-05-31 05:39:07', '2025-05-31 05:39:07', 4, 0),
(22, 25, 6, 354789, '2025-06-03 17:42:18', '2025-06-03 17:42:18', 4, 0),
(23, 28, 7, 3547800, '2025-06-14 04:08:12', '2025-06-14 04:08:12', 4, 100000),
(24, 29, 5, 180000000, '2025-06-14 04:42:36', '2025-06-14 04:42:36', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_manufacturers`
--

CREATE TABLE `laravel_manufacturers` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_manufacturers`
--

INSERT INTO `laravel_manufacturers` (`id`, `name`) VALUES
(4, 'RFL'),
(5, 'APCL');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_modules`
--

CREATE TABLE `laravel_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_modules`
--

INSERT INTO `laravel_modules` (`id`, `name`) VALUES
(1, 'Project Mapping'),
(2, 'Soil Test');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_money_receipts`
--

CREATE TABLE `laravel_money_receipts` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `remark` text DEFAULT NULL,
  `total_amount` float NOT NULL DEFAULT 0,
  `discount` float DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `payment_method` text DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_money_receipts`
--

INSERT INTO `laravel_money_receipts` (`id`, `customer_id`, `remark`, `total_amount`, `discount`, `vat`, `payment_method`, `paid_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nice', 4800000, 10, 5, NULL, NULL, '2025-05-12 00:40:36', '2025-05-12 00:40:36'),
(2, 1, 'test', 23152, 0, 0, NULL, NULL, '2025-05-26 06:52:08', '2025-05-26 06:52:08'),
(3, 1, 'test', 23152, 0, 0, NULL, NULL, '2025-05-26 06:53:12', '2025-05-26 06:53:12'),
(4, 1, 'test', 23152100, 0, 0, 'Cash', 2000000, '2025-05-31 18:49:53', '2025-05-31 18:49:53'),
(5, 3, NULL, 0, NULL, NULL, 'Cash', 3000000, '2025-06-01 04:44:52', '2025-06-01 04:44:52'),
(6, 2, NULL, 20010000, NULL, NULL, NULL, 4000000, '2025-06-01 05:23:18', '2025-06-01 05:23:18'),
(7, 3, NULL, 4700000000, NULL, NULL, 'Check', 4700000000, '2025-06-01 05:36:09', '2025-06-01 05:36:09'),
(8, 1, NULL, 5000000, NULL, NULL, NULL, 4500000, '2025-06-01 06:53:16', '2025-06-01 06:53:16'),
(9, 2, NULL, 354789, NULL, NULL, NULL, 350000, '2025-06-03 17:43:39', '2025-06-03 17:43:39'),
(10, 3, NULL, 3547800, NULL, NULL, NULL, 1000, '2025-06-03 18:44:54', '2025-06-03 18:44:54'),
(11, 4, NULL, 3447800, NULL, NULL, NULL, 3400000, '2025-06-14 04:11:57', '2025-06-14 04:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_money_receipt_details`
--

CREATE TABLE `laravel_money_receipt_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `money_receipt_id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_money_receipt_details`
--

INSERT INTO `laravel_money_receipt_details` (`id`, `money_receipt_id`, `property_id`, `amount`, `project_id`, `discount`) VALUES
(1, 1, 5, 480000, 5, NULL),
(2, 3, 3, 1002000, 5, 0),
(3, 3, 4, 5202000, 5, 0),
(4, 4, 3, 1002000, 4, 0),
(5, 4, 4, 5202000, 3, 0),
(6, 5, 7, 3547800, 4, 0),
(7, 6, 10, 20010000, 3, 0),
(8, 7, 6, 4800000000, 5, 100000000),
(9, 8, 5, 5000000, 3, 0),
(10, 9, 6, 354789, 4, 0),
(11, 10, 7, 3547800, 4, 0),
(12, 11, 7, 3547800, 4, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_orders`
--

CREATE TABLE `laravel_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `handover_date` datetime DEFAULT NULL,
  `total_amount` double NOT NULL DEFAULT 0,
  `paid_amount` double DEFAULT NULL,
  `discount` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_orders`
--

INSERT INTO `laravel_orders` (`id`, `customer_id`, `order_date`, `handover_date`, `total_amount`, `paid_amount`, `discount`, `created_at`, `updated_at`, `remark`) VALUES
(1, 1, '2025-05-18 00:00:00', '2025-06-19 00:00:00', 12000050, 1200000, 0, '2025-05-17 17:59:20', '2025-05-17 17:59:20', NULL),
(2, 1, '2025-05-17 00:00:00', '2025-05-29 00:00:00', 123000000, 12000000, 0, '2025-05-17 17:58:20', '2025-05-17 17:58:20', NULL),
(3, 2, '2025-05-14 00:00:00', '2025-05-23 00:00:00', 12300000022, 120000000, 3, '2025-05-17 18:03:50', '2025-05-17 18:03:50', NULL),
(4, 1, '2025-05-25 00:00:00', '2025-05-25 00:00:00', 23152, 12345, 0, '2025-05-24 18:00:00', '2025-05-24 18:00:00', 'Test'),
(5, 1, '2025-05-25 00:00:00', '2025-05-25 00:00:00', 23152, 12345, 0, '2025-05-24 18:00:00', '2025-05-24 18:00:00', NULL),
(6, 1, '2025-05-26 00:00:00', '2025-05-26 00:00:00', 23152, 12345, 0, '2025-05-25 18:00:00', '2025-05-25 18:00:00', 'test'),
(7, 1, '2025-05-06 00:00:00', '2025-05-13 00:00:00', 23152, NULL, 0, '2025-05-29 05:39:26', '2025-05-29 05:39:26', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_order_details`
--

CREATE TABLE `laravel_order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `flat_no` varchar(10) DEFAULT NULL,
  `amount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_order_details`
--

INSERT INTO `laravel_order_details` (`id`, `order_id`, `property_id`, `flat_no`, `amount`, `created_at`, `updated_at`, `discount`) VALUES
(1, 3, 7, '5A', 12000000, '2025-05-20 04:42:58', '2025-05-20 04:42:58', NULL),
(2, 2, 5, '5A', 123000000, '2025-05-20 04:41:23', '2025-05-20 04:41:23', NULL),
(3, 4, 3, '5A', 1002000, '2025-05-25 13:14:47', '2025-05-25 13:14:47', 0),
(4, 4, 4, '5C', 5202000, '2025-05-25 13:14:47', '2025-05-25 13:14:47', 0),
(5, 5, 3, '5A', 1002000, '2025-05-25 13:16:27', '2025-05-25 13:16:27', 0),
(6, 5, 4, '5C', 5202000, '2025-05-25 13:16:27', '2025-05-25 13:16:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_password_reset_tokens`
--

CREATE TABLE `laravel_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laravel_permissions`
--

CREATE TABLE `laravel_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `guard_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laravel_persons`
--

CREATE TABLE `laravel_persons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT '',
  `positon` varchar(45) NOT NULL DEFAULT '',
  `photo` varchar(45) NOT NULL DEFAULT '',
  `address` varchar(45) NOT NULL DEFAULT '',
  `contact` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_persons`
--

INSERT INTO `laravel_persons` (`id`, `name`, `positon`, `photo`, `address`, `contact`) VALUES
(1, 'Abdul Hamid', 'M.D', '1.jpg', 'Mymensingh', 987654323),
(2, 'Nur islam', 'Manager', '2.jpg', 'Dhaka,', 187765543);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_products`
--

CREATE TABLE `laravel_products` (
  `id` int(10) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `price` double DEFAULT NULL,
  `discount` float DEFAULT 0,
  `product_category_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `product_type_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `uom_id` int(10) UNSIGNED NOT NULL,
  `qty` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `uom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_products`
--

INSERT INTO `laravel_products` (`id`, `photo`, `name`, `price`, `discount`, `product_category_id`, `product_type_id`, `uom_id`, `qty`, `created_at`, `updated_at`, `uom`) VALUES
(2, '2.jpg', 'Steel', 10000, 5, 15, 3, 11, 10, '2025-05-23 18:09:24', '2025-05-23 18:09:24', 'Ton'),
(3, '3.jpg', 'Blocks', 20, 5, 16, 3, 7, 100000, '2025-05-24 00:54:51', '2025-05-24 00:54:51', 'Piece'),
(4, '4.jpg', 'Cement', 620, 5, 16, 3, 7, 10, '2025-05-24 00:54:58', '2025-05-24 00:54:58', 'Piece'),
(5, '5.jpg', 'Stone', 50000, 5, 17, 3, 11, 100, '2025-05-24 12:30:19', '2025-05-24 12:30:19', 'Ton'),
(6, '6.jpg', 'Tiles', 120, 5, 14, 3, 7, 100, '2025-05-24 00:55:12', '2025-05-24 00:55:12', 'Piece'),
(7, '7.jpg', 'Commot', 17000, 5, 14, 3, 7, NULL, '2025-05-24 00:55:20', '2025-05-24 00:55:20', 'Piece'),
(8, '8.jpg', 'Sand', 20000, 5, 17, 3, 11, NULL, '2025-05-24 00:55:27', '2025-05-24 00:55:27', 'Ton'),
(9, '9.jpg', 'Bricks', 15, 5, 16, 3, 7, NULL, '2025-05-24 23:15:53', '2025-05-24 23:15:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_product_categories`
--

CREATE TABLE `laravel_product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_product_categories`
--

INSERT INTO `laravel_product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(14, 'Senitary', '2025-05-09 06:20:31', '2025-05-09 12:20:31'),
(15, 'Metals', '2025-05-16 04:09:16', '2025-05-16 10:09:16'),
(16, 'Bricks', '2025-05-16 04:09:31', '2025-05-16 10:09:31'),
(17, 'Stone', '2025-05-16 04:09:49', '2025-05-16 10:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_product_sections`
--

CREATE TABLE `laravel_product_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `unit_id` int(10) UNSIGNED DEFAULT NULL,
  `photo` varchar(145) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_product_sections`
--

INSERT INTO `laravel_product_sections` (`id`, `name`, `unit_id`, `photo`, `icon`) VALUES
(7, 'Etectronics', 1, '7.png', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_product_types`
--

CREATE TABLE `laravel_product_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_product_types`
--

INSERT INTO `laravel_product_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Finished Goods', NULL, NULL),
(2, 'Consumable Metarials', NULL, NULL),
(3, 'Raw Metarials', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_product_units`
--

CREATE TABLE `laravel_product_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_product_units`
--

INSERT INTO `laravel_product_units` (`id`, `name`) VALUES
(1, '100 tiles');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_progress`
--

CREATE TABLE `laravel_progress` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `project_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `percent` decimal(5,2) NOT NULL DEFAULT 0.00,
  `review` varchar(255) NOT NULL DEFAULT '',
  `status_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `expected_completion_date` date DEFAULT NULL,
  `actual_completion_date` date DEFAULT NULL,
  `remarks` varchar(255) NOT NULL DEFAULT '',
  `updated_by` text NOT NULL DEFAULT '0',
  `Created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_progress`
--

INSERT INTO `laravel_progress` (`id`, `module_id`, `project_id`, `percent`, `review`, `status_id`, `expected_completion_date`, `actual_completion_date`, `remarks`, `updated_by`, `Created_at`, `updated_at`) VALUES
(1, 2, 5, 50.00, 'Working', 1, '2025-01-10', '2025-02-06', 'Working', 'Hamid', '2025-05-22 00:04:58', '2025-05-28 05:44:53'),
(2, 1, 3, 100.00, 'Working', 2, '2025-05-14', '2025-05-20', 'nice', 'Hamid Khan', '2025-05-22 23:37:41', '2025-05-28 05:58:03'),
(3, 1, 3, 50.00, 'Working', 1, '2025-04-30', '2025-05-27', 'y', 'Hasan', '2025-05-22 18:05:53', '2025-05-28 06:51:11'),
(4, 2, 5, 25.00, 'Working', 1, '2025-06-05', '2027-06-28', 'ty', 'Hamid Khan55', '2025-05-28 05:59:47', '2025-05-28 06:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_projects`
--

CREATE TABLE `laravel_projects` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `contractor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_projects`
--

INSERT INTO `laravel_projects` (`id`, `photo`, `name`, `type_id`, `status_id`, `start_date`, `end_date`, `contractor_id`, `created_at`, `updated_at`) VALUES
(3, '3.jpg', 'StarTeck Tower', 1, 1, '2025-05-01', '2026-05-15', 1, '2025-05-28 05:20:55', '2025-05-28 05:20:55'),
(4, '4.jpg', 'Dwelling Khonik Tower', 1, 2, '2025-05-12', '2026-05-15', 1, '2025-05-28 05:10:05', '2025-05-28 05:10:05'),
(5, '5.jpg', 'Dwelling Air Golden', 1, 2, '2025-05-12', '2026-05-19', 1, '2025-05-28 05:11:11', '2025-05-28 05:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_project_costings`
--

CREATE TABLE `laravel_project_costings` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `module_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `budget` decimal(12,2) NOT NULL DEFAULT 0.00,
  `actual_cost` decimal(12,2) NOT NULL DEFAULT 0.00,
  `days` text NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `remarks` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `updated_by` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_project_costings`
--

INSERT INTO `laravel_project_costings` (`id`, `project_id`, `module_id`, `budget`, `actual_cost`, `days`, `status`, `remarks`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 4563453.00, 5463880.00, '2 years', 'Ongoing', 'Working', 'Hamid', 'N/A', '2025-05-23 10:21:54', '2025-05-23 10:21:54'),
(2, 4, 1, 4563453.00, 546382.00, '100', 'Completed', 'Important', 'Rabbi', 'Hamid Khan', '2025-05-23 11:31:01', '2025-05-23 11:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_project_modules`
--

CREATE TABLE `laravel_project_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `module_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `duration` varchar(45) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_project_modules`
--

INSERT INTO `laravel_project_modules` (`id`, `project_id`, `module_id`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1 year', '2025-05-16 15:16:29', '2025-05-16 09:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_project_persons`
--

CREATE TABLE `laravel_project_persons` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `person_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `assign_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_project_persons`
--

INSERT INTO `laravel_project_persons` (`id`, `project_id`, `person_id`, `assign_at`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2025-05-19 18:09:22', '2025-05-20 00:09:22', '2025-05-20 00:09:22'),
(2, 4, 1, '2025-05-19 18:09:30', '2025-05-20 00:09:30', '2025-05-20 00:09:30'),
(3, 5, 2, '2025-05-19 18:09:06', '2025-05-20 00:09:06', '2025-05-20 00:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_project_statuses`
--

CREATE TABLE `laravel_project_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_project_statuses`
--

INSERT INTO `laravel_project_statuses` (`id`, `name`) VALUES
(1, 'Ongoing'),
(2, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_project_types`
--

CREATE TABLE `laravel_project_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_project_types`
--

INSERT INTO `laravel_project_types` (`id`, `name`) VALUES
(1, 'Building Constraction');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_properties`
--

CREATE TABLE `laravel_properties` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sqft` int(10) UNSIGNED NOT NULL,
  `bed_room` tinyint(3) UNSIGNED NOT NULL,
  `bath_room` tinyint(3) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `status` enum('Available','For Sale','For Rent','Sold','Rented') DEFAULT 'Available',
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_properties`
--

INSERT INTO `laravel_properties` (`id`, `photo`, `title`, `description`, `sqft`, `bed_room`, `bath_room`, `category_id`, `project_id`, `price`, `status`, `location`, `created_at`, `updated_at`) VALUES
(3, '3.jpg', 'Flat 3A', 'Looking Nice', 1525, 4, 3, 2, 4, 12000000.00, 'For Sale', 'Gulshan,Dhaka', '2025-05-19 19:16:12', '2025-05-19 19:16:12'),
(5, '5.jpg', 'Apartment 4A', 'Nice and Attractive', 1650, 5, 4, 2, 5, 180000000.00, 'For Sale', 'Danmondi,dhaka', '2025-05-19 19:16:26', '2025-05-19 19:16:26'),
(6, '6.jpg', 'Flat 2A', 'Nice', 703, 4, 3, 1, 4, 354789.00, 'For Sale', 'Danmondi,dhaka', '2025-05-19 19:17:01', '2025-05-19 19:17:01'),
(7, '7.jpg', 'Apartment 10-A', 'Good Looking', 2100, 5, 4, 2, 4, 3547800.00, 'For Sale', 'Bashundhara', '2025-06-03 05:52:26', '2025-06-03 05:52:26'),
(8, '8.jpg', 'Apartment 5C', 'Good Looking', 2100, 5, 4, 1, 3, 20000000.00, 'For Rent', 'Badda,Dhaka', '2025-05-19 19:16:43', '2025-05-19 19:16:43'),
(10, '10.jpg', 'Flat 10 C', 'Nice', 1550, 5, 4, 2, 3, 100002020.00, 'For Sale', 'Badda', '2025-05-19 19:15:25', '2025-05-19 19:15:25'),
(11, '11.jpg', 'Apartment 10-B', 'Very Attractive', 1515, 4, 4, 2, 3, 12000000.00, 'For Sale', 'Gulshan,Dhaka', '2025-06-03 05:55:15', '2025-06-03 05:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_property_statuses`
--

CREATE TABLE `laravel_property_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_property_statuses`
--

INSERT INTO `laravel_property_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2025-05-08 18:03:15', '2025-05-09 00:03:15'),
(2, 'Ongoing', '2025-05-08 18:29:46', '2025-05-09 00:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_purchases`
--

CREATE TABLE `laravel_purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `warehouse_id` int(11) DEFAULT 0,
  `purchase_date` datetime DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `purchase_total` double NOT NULL DEFAULT 0,
  `paid_amount` double DEFAULT NULL,
  `status_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `discount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_purchases`
--

INSERT INTO `laravel_purchases` (`id`, `vendor_id`, `warehouse_id`, `purchase_date`, `delivery_date`, `purchase_total`, `paid_amount`, `status_id`, `discount`, `vat`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2025-05-15 00:00:00', '2025-05-16 00:00:00', 120000, 100000, 5, 0, 0, '2025-05-17 16:28:48', '2025-05-17 16:28:48'),
(2, 1, 3, '2025-05-10 00:00:00', '2025-05-06 00:00:00', 330000, 300000, 5, 0, 0, '2025-05-17 16:27:41', '2025-05-17 16:27:41'),
(3, 2, 2, '2025-05-15 00:00:00', '2025-05-08 00:00:00', 52000, 50000, 6, 10, 5, '2025-05-17 16:42:32', '2025-05-17 16:42:32'),
(4, 3, 2, '2025-05-12 00:00:00', '2025-05-20 00:00:00', 52000, 40000, 5, 0, 0, '2025-05-17 16:52:08', '2025-05-17 16:52:08'),
(5, 1, 2, '2025-05-21 00:00:00', '2025-05-21 00:00:00', 25522, 25210, 5, 0, 0, '2025-05-20 22:35:01', '2025-05-20 22:35:01'),
(6, 1, 2, '2025-05-21 00:00:00', '2025-05-21 00:00:00', 25522, 25210, 5, 0, 0, '2025-05-20 22:55:00', '2025-05-20 22:55:00'),
(7, 1, 2, '2025-05-21 00:00:00', '2025-05-21 00:00:00', 25522, 25210, 5, 0, 0, '2025-05-20 22:59:53', '2025-05-20 22:59:53'),
(8, 1, 2, '2025-05-21 00:00:00', '2025-05-21 00:00:00', 23152, 12345, 5, 0, 0, '2025-05-20 23:30:05', '2025-05-20 23:30:05'),
(9, 1, 2, '2025-05-21 00:00:00', '2025-05-21 00:00:00', 23152, 12345, 5, 0, 0, '2025-05-20 23:36:04', '2025-05-20 23:36:04'),
(10, 1, 1, '2025-05-21 00:00:00', '2025-05-21 00:00:00', 23152, 12345, 5, 0, 0, '2025-05-21 00:10:59', '2025-05-21 00:10:59'),
(11, 2, 2, '2025-05-23 00:00:00', '2025-05-23 00:00:00', 5000, 2000, 5, 5, 0, '2025-05-23 12:02:14', '2025-05-23 12:02:14'),
(12, 2, 1, '2025-05-23 00:00:00', '2025-05-23 00:00:00', 5000, 200, 5, 5, 0, '2025-05-23 12:05:18', '2025-05-23 12:05:18'),
(13, 2, 2, '2025-05-23 00:00:00', '2025-05-23 00:00:00', 5000, 100, 5, 5, 0, '2025-05-23 12:06:46', '2025-05-23 12:06:46'),
(14, 2, 2, '2025-05-23 00:00:00', '2025-05-23 00:00:00', 5000, 10, 5, 5, 0, '2025-05-23 12:07:43', '2025-05-23 12:07:43'),
(15, 2, 2, '2025-05-23 00:00:00', '2025-05-23 00:00:00', 5000, 5000, 5, 5, 0, '2025-05-23 12:10:06', '2025-05-23 12:10:06'),
(16, 3, 2, '2025-05-23 00:00:00', '2025-05-23 00:00:00', 5000, 41000, 5, 5, 0, '2025-05-23 12:15:45', '2025-05-23 12:15:45'),
(17, 2, 2, '2025-05-23 00:00:00', '2025-05-23 00:00:00', 5000, 400, 5, 5, 0, '2025-05-23 12:18:48', '2025-05-23 12:18:48'),
(18, 3, 1, '2025-05-23 18:22:15', '2025-05-23 18:22:15', 5000, 100, 5, 5, 0, '2025-05-23 12:22:15', '2025-05-23 12:22:15'),
(19, 3, 4, '2025-05-23 18:26:29', '2025-05-23 18:26:29', 5000, 2000, 5, 5, 0, '2025-05-23 12:26:29', '2025-05-23 12:26:29'),
(20, 3, 5, '2025-05-23 18:36:45', '2025-05-23 18:36:45', 5000, 202010, 5, 5, 0, '2025-05-23 12:36:45', '2025-05-23 12:36:45'),
(21, 2, 5, '2025-05-23 18:42:05', '2025-05-23 18:42:05', 577339.2, 577339, 5, 5, 0, '2025-05-23 12:42:05', '2025-05-23 12:42:05'),
(22, 1, 2, '2025-05-23 18:51:11', '2025-05-23 18:51:11', 19800, 19700, 5, 1, 5, '2025-05-23 12:51:11', '2025-05-23 12:51:11'),
(23, 3, 2, '2025-05-23 19:03:07', '2025-05-23 19:03:07', 9500, 9000, 5, 5, 5, '2025-05-23 13:03:07', '2025-05-23 13:03:07'),
(24, 3, 1, '2025-05-24 04:41:49', '2025-05-24 04:41:49', 5890, 5000, 5, 5, 5, '2025-05-23 22:41:49', '2025-05-23 22:41:49'),
(25, 3, 4, '2025-05-24 04:44:48', '2025-05-24 04:44:48', 475000, 0, 5, 5, 5, '2025-05-23 22:44:48', '2025-05-23 22:44:48'),
(26, 2, 4, '2025-05-24 04:56:13', '2025-05-24 04:56:13', 47500, 0, 5, 5, 5, '2025-05-23 22:56:13', '2025-05-23 22:56:13'),
(27, 1, 2, '2025-05-24 04:56:54', '2025-05-24 04:56:54', 19, 0, 5, 5, 5, '2025-05-23 22:56:54', '2025-05-23 22:56:54'),
(28, 1, 1, '2025-05-24 05:03:46', '2025-05-24 05:03:46', 589, 0, 5, 5, 5, '2025-05-23 23:03:46', '2025-05-23 23:03:46'),
(29, 2, 3, '2025-05-24 05:17:26', '2025-05-24 05:17:26', 16150, 0, 5, 5, 5, '2025-05-23 23:17:26', '2025-05-23 23:17:26'),
(30, 1, 3, '2025-05-24 05:17:47', '2025-05-24 05:17:47', 47500, 0, 5, 5, 5, '2025-05-23 23:17:47', '2025-05-23 23:17:47'),
(31, 1, 2, '2025-05-24 05:25:39', '2025-05-24 05:25:39', 114, 0, 5, 5, 5, '2025-05-23 23:25:39', '2025-05-23 23:25:39'),
(32, 3, 2, '2025-05-24 06:27:29', '2025-05-24 06:27:29', 66500, 66000, 5, 5, 5, '2025-05-24 00:27:29', '2025-05-24 00:27:29'),
(33, 2, 5, '2025-05-24 16:22:17', '2025-05-24 16:22:17', 72580, 72000, 5, 5, 5, '2025-05-24 10:22:17', '2025-05-24 10:22:17'),
(34, 1, 2, '2025-05-24 16:45:22', '2025-05-24 16:45:22', 19, 20, 5, 5, 5, '2025-05-24 10:45:22', '2025-05-24 10:45:22'),
(35, 1, 2, '2025-05-25 04:21:33', '2025-05-25 04:21:33', 475000, 470000, 5, 5, 5, '2025-05-24 22:21:33', '2025-05-24 22:21:33'),
(36, 3, 2, '2025-05-25 04:27:36', '2025-05-25 04:27:36', 1140, 0, 5, 5, 5, '2025-05-24 22:27:36', '2025-05-24 22:27:36'),
(37, 1, 1, '2025-05-25 04:29:14', '2025-05-25 04:29:14', 47500, 0, 5, 5, 5, '2025-05-24 22:29:14', '2025-05-24 22:29:14'),
(38, 1, 1, '2025-05-25 06:46:51', '2025-05-25 06:46:51', 96140, 20000, 5, 5, 5, '2025-05-25 00:46:51', '2025-05-25 00:46:51'),
(39, 3, 4, '2025-05-25 06:47:39', '2025-05-25 06:47:39', 237500, 200000, 5, 5, 5, '2025-05-25 00:47:39', '2025-05-25 00:47:39'),
(40, 1, 2, '2025-05-25 06:48:50', '2025-05-25 06:48:50', 114, 0, 5, 5, 5, '2025-05-25 00:48:50', '2025-05-25 00:48:50'),
(41, 2, 2, '2025-05-25 06:49:45', '2025-05-25 06:49:45', 47500, 0, 5, 5, 5, '2025-05-25 00:49:45', '2025-05-25 00:49:45'),
(42, 2, 3, '2025-05-25 18:25:26', '2025-05-25 18:25:26', 16150, 16000, 5, 5, 5, '2025-05-25 12:25:26', '2025-05-25 12:25:26'),
(43, 3, 2, '2025-05-30 04:51:08', '2025-05-30 04:51:08', 190000, 190000, 5, 5, 5, '2025-05-29 22:51:08', '2025-05-29 22:51:08'),
(44, 2, 2, '2025-05-30 16:45:06', '2025-05-30 16:45:06', 9519, 9000, 5, 5, 5, '2025-05-30 10:45:06', '2025-05-30 10:45:06'),
(45, 2, 2, '2025-05-30 16:46:34', '2025-05-30 16:46:34', 47642.5, 40000, 5, 5, 5, '2025-05-30 10:46:34', '2025-05-30 10:46:34'),
(46, 2, 2, '2025-05-30 16:46:47', '2025-05-30 16:46:47', 47642.5, 40000, 5, 5, 5, '2025-05-30 10:46:47', '2025-05-30 10:46:47'),
(47, 2, 2, '2025-05-30 00:00:00', '2025-05-30 00:00:00', 47642.5, 40000, 5, 5, 5, '2025-05-30 11:15:30', '2025-05-30 11:15:30'),
(48, 2, 3, '2025-05-30 00:00:00', '2025-05-30 00:00:00', 19000, 0, 5, 5, 5, '2025-05-30 11:53:30', '2025-05-30 11:53:30'),
(49, 1, 2, '2025-05-30 17:59:31', '2025-05-30 17:59:31', 95000, 95000, 5, 5, 5, '2025-05-30 11:59:31', '2025-05-30 11:59:31'),
(50, 2, 2, '2025-06-01 04:25:04', '2025-06-01 04:25:04', 1615000, 160000, 5, 5, 5, '2025-05-31 22:25:04', '2025-05-31 22:25:04'),
(51, 2, 5, '2025-06-03 17:46:52', '2025-06-03 17:46:52', 4992250, 4892250, 5, 5, 5, '2025-06-03 11:46:52', '2025-06-03 11:46:52'),
(52, 2, 5, '2025-06-03 17:47:45', '2025-06-03 17:47:45', 161500, 160000, 5, 5, 5, '2025-06-03 11:47:45', '2025-06-03 11:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_purchase_details`
--

CREATE TABLE `laravel_purchase_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `uom_id` text DEFAULT NULL,
  `price` float NOT NULL DEFAULT 0,
  `item_vat` float NOT NULL DEFAULT 0,
  `item_discount` float NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_purchase_details`
--

INSERT INTO `laravel_purchase_details` (`id`, `purchase_id`, `product_id`, `qty`, `uom_id`, `price`, `item_vat`, `item_discount`, `created_at`, `updated_at`) VALUES
(2, 4, 2, 100, '11', 10000, 0, 0, '2025-05-17 23:00:21', '2025-05-17 23:00:21'),
(3, 6, 3, 10, '7', 100, 1, 1, '2025-05-23 12:23:15', '2025-05-23 12:23:15'),
(4, 7, 4, 10, '7', 100, 1, 1, '2025-05-23 12:23:04', '2025-05-23 12:23:04'),
(5, 9, 3, 10, '11', 10020, 0, 0, '2025-05-21 05:36:04', '2025-05-21 05:36:04'),
(6, 9, 4, 1, '7', 20, 0, 0, '2025-05-21 05:36:04', '2025-05-21 05:36:04'),
(7, 9, 5, 100, '7', 600, 0, 0, '2025-05-21 05:36:04', '2025-05-21 05:36:04'),
(8, 10, 3, 10, '11', 10020, 0, 0, '2025-05-21 06:10:59', '2025-05-21 06:10:59'),
(9, 10, 4, 1, '7', 20, 0, 0, '2025-05-21 06:10:59', '2025-05-21 06:10:59'),
(10, 10, 5, 100, '7', 600, 0, 0, '2025-05-21 06:10:59', '2025-05-21 06:10:59'),
(11, 14, 3, 1, '1', 20, 0, 0, '2025-05-23 18:07:43', '2025-05-23 18:07:43'),
(12, 15, 5, 1, NULL, 50000, 0, 0, '2025-05-23 18:10:06', '2025-05-23 18:10:06'),
(13, 16, 5, 1, 'Ton', 50000, 0, 0, '2025-05-23 18:15:45', '2025-05-23 18:15:45'),
(14, 17, 4, 1, 'Piece', 620, 0, 0, '2025-05-23 18:18:48', '2025-05-23 18:18:48'),
(15, 18, 3, 10, 'Piece', 20, 0, 0, '2025-05-23 18:22:15', '2025-05-23 18:22:15'),
(16, 19, 6, 100, 'Piece', 120, 0, 0, '2025-05-23 18:26:29', '2025-05-23 18:26:29'),
(17, 20, 8, 10, 'Ton', 20000, 0, 0, '2025-05-23 18:36:45', '2025-05-23 18:36:45'),
(18, 20, 4, 10, 'Piece', 620, 0, 0, '2025-05-23 18:36:45', '2025-05-23 18:36:45'),
(19, 21, 5, 12, 'Ton', 50000, 0, 0, '2025-05-23 18:42:05', '2025-05-23 18:42:05'),
(20, 21, 6, 12, 'Piece', 120, 0, 0, '2025-05-23 18:42:05', '2025-05-23 18:42:05'),
(21, 22, 3, 1000, 'Piece', 20, 5, 5, '2025-05-23 18:51:11', '2025-05-23 18:51:11'),
(22, 26, 5, 1, 'Ton', 50000, 5, 5, '2025-05-24 04:56:13', '2025-05-24 04:56:13'),
(23, 27, 3, 1, 'Piece', 20, 5, 5, '2025-05-24 04:56:54', '2025-05-24 04:56:54'),
(24, 28, 4, 1, '11', 620, 5, 5, '2025-05-24 05:03:46', '2025-05-24 05:03:46'),
(25, 31, 6, 1, '7', 120, 5, 5, '2025-05-24 05:25:39', '2025-05-24 05:25:39'),
(26, 32, 5, 1, '12', 50000, 5, 5, '2025-05-24 06:27:29', '2025-05-24 06:27:29'),
(27, 32, 8, 1, '11', 20000, 5, 5, '2025-05-24 06:27:29', '2025-05-24 06:27:29'),
(28, 33, 4, 100, '7', 620, 5, 5, '2025-05-24 16:22:17', '2025-05-24 16:22:17'),
(29, 33, 6, 120, '7', 120, 5, 5, '2025-05-24 16:22:18', '2025-05-24 16:22:18'),
(30, 34, 3, 1, '7', 20, 5, 5, '2025-05-24 16:45:22', '2025-05-24 16:45:22'),
(31, 35, 5, 10, '11', 50000, 0, 5, '2025-05-25 04:21:33', '2025-05-25 04:21:33'),
(32, 36, 6, 10, '7', 120, 0, 5, '2025-05-25 04:27:36', '2025-05-25 04:27:36'),
(33, 37, 5, 1, '11', 50000, 0, 5, '2025-05-25 04:29:14', '2025-05-25 04:29:14'),
(34, 38, 2, 10, '11', 10000, 0, 5, '2025-05-25 06:46:51', '2025-05-25 06:46:51'),
(35, 38, 6, 10, '7', 120, 0, 5, '2025-05-25 06:46:51', '2025-05-25 06:46:51'),
(36, 39, 8, 10, '11', 20000, 0, 5, '2025-05-25 06:47:39', '2025-05-25 06:47:39'),
(37, 39, 5, 1, '11', 50000, 0, 5, '2025-05-25 06:47:39', '2025-05-25 06:47:39'),
(38, 40, 6, 1, '7', 120, 0, 5, '2025-05-25 06:48:50', '2025-05-25 06:48:50'),
(39, 41, 5, 1, '11', 50000, 0, 5, '2025-05-25 06:49:45', '2025-05-25 06:49:45'),
(40, 42, 7, 1, '7', 17000, 0, 5, '2025-05-25 18:25:26', '2025-05-25 18:25:26'),
(41, 43, 8, 10, '11', 20000, 0, 5, '2025-05-30 04:51:08', '2025-05-30 04:51:08'),
(42, 44, 3, 1, 'Piece', 20, 0, 5, '2025-05-30 16:45:06', '2025-05-30 16:45:06'),
(43, 45, 5, 1, 'Ton', 50000, 0, 5, '2025-05-30 16:46:34', '2025-05-30 16:46:34'),
(44, 46, 5, 1, 'Ton', 50000, 0, 5, '2025-05-30 16:46:47', '2025-05-30 16:46:47'),
(45, 47, 5, 1, 'Ton', 50000, 0, 5, '2025-05-30 17:15:30', '2025-05-30 17:15:30'),
(46, 48, 2, 1, 'Ton', 10000, 0, 5, '2025-05-30 17:53:30', '2025-05-30 17:53:30'),
(47, 49, 2, 10, '11', 10000, 0, 5, '2025-05-30 17:59:31', '2025-05-30 17:59:31'),
(48, 50, 7, 100, '7', 17000, 0, 5, '2025-06-01 04:25:04', '2025-06-01 04:25:04'),
(49, 51, 5, 100, '11', 50000, 0, 5, '2025-06-03 17:46:52', '2025-06-03 17:46:52'),
(50, 51, 7, 15, '7', 17000, 0, 5, '2025-06-03 17:46:52', '2025-06-03 17:46:52'),
(51, 52, 7, 10, '7', 17000, 0, 5, '2025-06-03 17:47:45', '2025-06-03 17:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_roles`
--

CREATE TABLE `laravel_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `guard_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laravel_role_has_permissions`
--

CREATE TABLE `laravel_role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laravel_sections`
--

CREATE TABLE `laravel_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laravel_sections`
--

INSERT INTO `laravel_sections` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Seramiccs', 'Best one', '2025-05-09 06:19:32', '2025-05-09 06:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_sessions`
--

CREATE TABLE `laravel_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laravel_settings`
--

CREATE TABLE `laravel_settings` (
  `id` int(11) NOT NULL,
  `key_name` varchar(100) DEFAULT NULL,
  `key_value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laravel_statuses`
--

CREATE TABLE `laravel_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_statuses`
--

INSERT INTO `laravel_statuses` (`id`, `name`) VALUES
(5, 'Processing'),
(6, 'Reached');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_stocks`
--

CREATE TABLE `laravel_stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `uom_id` int(11) NOT NULL DEFAULT 0,
  `qty` float NOT NULL,
  `transaction_type_id` int(10) UNSIGNED NOT NULL,
  `warehouse_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_stocks`
--

INSERT INTO `laravel_stocks` (`id`, `product_id`, `uom_id`, `qty`, `transaction_type_id`, `warehouse_id`, `remark`, `created_at`, `updated_at`) VALUES
(1, 3, 7, 100, 4, 2, 'Yes', '2025-05-19 18:16:20', '2025-05-20 00:16:20'),
(2, 2, 11, 100, 3, 3, 'Yes', '2025-05-18 03:07:19', '2025-05-18 09:07:19'),
(3, 5, 11, 10, 3, 3, 'yes', '2025-05-19 18:10:15', '2025-05-20 00:10:15'),
(4, 4, 7, 12, 4, 1, 'yes', '2025-05-19 18:19:45', '2025-05-20 00:19:45'),
(5, 2, 11, 50, 1, 3, 'yea', '2025-05-19 18:20:53', '2025-05-20 00:20:53'),
(6, 2, 11, 1, 1, 1, 'yes', '2025-05-28 17:57:41', '2025-05-28 23:57:41'),
(7, 3, 7, 10, 1, 1, 'yes', '2025-05-28 17:57:02', '2025-05-28 23:57:02'),
(8, 4, 7, 1, 1, 1, 'yes', '2025-05-21 00:10:59', '2025-05-21 06:10:59'),
(9, 5, 8, 100, 1, 2, 'yes', '2025-05-28 18:02:10', '2025-05-29 00:02:10'),
(10, 8, 11, 10, 1, 1, 'yes', '2025-05-28 17:58:03', '2025-05-28 23:58:03'),
(11, 4, 7, 10, 1, 1, 'yes', '2025-05-28 17:59:01', '2025-05-28 23:59:01'),
(12, 5, 11, 12, 3, 1, 'yes', '2025-05-28 17:58:53', '2025-05-28 23:58:53'),
(13, 6, 7, 12, 3, 1, 'yes', '2025-05-28 17:58:41', '2025-05-28 23:58:41'),
(14, 3, 7, 1000, 3, 1, 'yes', '2025-05-28 17:58:26', '2025-05-28 23:58:26'),
(15, 4, 7, 1, 3, 1, 'yes', '2025-05-28 18:01:10', '2025-05-29 00:01:10'),
(16, 6, 7, 1, 3, 1, 'yes', '2025-05-23 23:25:39', '2025-05-24 05:25:39'),
(17, 5, 11, 1, 3, 1, 'yes', '2025-05-28 17:59:19', '2025-05-28 23:59:19'),
(18, 8, 11, 1, 3, 1, 'yes', '2025-05-24 00:27:30', '2025-05-24 06:27:30'),
(19, 4, 7, 100, 3, 1, 'yes', '2025-05-24 10:22:17', '2025-05-24 16:22:17'),
(20, 6, 7, 120, 3, 1, 'yes', '2025-05-24 10:22:18', '2025-05-24 16:22:18'),
(21, 3, 7, 1, 3, 1, 'yes', '2025-05-24 10:45:22', '2025-05-24 16:45:22'),
(22, 5, 11, 10, 3, 1, 'yes', '2025-05-24 22:21:33', '2025-05-25 04:21:33'),
(23, 6, 7, 10, 3, 1, 'yes', '2025-05-24 22:27:36', '2025-05-25 04:27:36'),
(24, 5, 11, 1, 3, 1, 'yes', '2025-05-24 22:29:14', '2025-05-25 04:29:14'),
(25, 2, 11, 10, 3, 1, 'yes', '2025-05-25 00:46:51', '2025-05-25 06:46:51'),
(26, 6, 7, 10, 3, 1, 'yes', '2025-05-25 00:46:51', '2025-05-25 06:46:51'),
(27, 8, 11, 10, 3, 1, 'yes', '2025-05-25 00:47:39', '2025-05-25 06:47:39'),
(28, 5, 11, 1, 3, 1, 'yes', '2025-05-25 00:47:39', '2025-05-25 06:47:39'),
(29, 6, 7, 1, 3, 1, 'yes', '2025-05-25 00:48:50', '2025-05-25 06:48:50'),
(30, 5, 11, 1, 3, 1, 'yes', '2025-05-25 00:49:45', '2025-05-25 06:49:45'),
(31, 7, 7, 1, 3, 1, 'yes', '2025-05-25 12:25:26', '2025-05-25 18:25:26'),
(32, 8, 11, 10, 3, 1, 'yes', '2025-05-29 22:51:08', '2025-05-30 04:51:08'),
(33, 2, 11, 10, 3, 1, 'yes', '2025-05-30 11:59:31', '2025-05-30 17:59:31'),
(34, 7, 7, 100, 3, 1, 'yes', '2025-05-31 22:25:04', '2025-06-01 04:25:04'),
(35, 5, 11, 100, 3, 1, 'yes', '2025-06-03 11:46:52', '2025-06-03 17:46:52'),
(36, 7, 7, 15, 3, 1, 'yes', '2025-06-03 11:46:52', '2025-06-03 17:46:52'),
(37, 7, 7, 10, 3, 1, 'yes', '2025-06-03 11:47:45', '2025-06-03 17:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_stock_adjustments`
--

CREATE TABLE `laravel_stock_adjustments` (
  `id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `adjustment_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(10) UNSIGNED NOT NULL,
  `remark` text NOT NULL,
  `adjustment_type_id` int(10) UNSIGNED NOT NULL,
  `warehouse_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_stock_adjustments`
--

INSERT INTO `laravel_stock_adjustments` (`id`, `adjustment_at`, `user_id`, `remark`, `adjustment_type_id`, `warehouse_id`) VALUES
(1, '2021-12-27 18:00:00', 1, 'ddd', 2, 1),
(2, '2021-12-27 18:00:00', 1, 'ddd', 2, 1),
(3, '2021-12-27 18:00:00', 1, 'ddddfd', 6, 1),
(4, '2021-12-27 18:00:00', 1, 'NA', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_stock_adjustment_details`
--

CREATE TABLE `laravel_stock_adjustment_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `adjustment_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_stock_adjustment_details`
--

INSERT INTO `laravel_stock_adjustment_details` (`id`, `adjustment_id`, `product_id`, `qty`, `price`) VALUES
(1, 2, 4, 5, 400),
(2, 3, 20, 50, 400),
(3, 4, 28, 70, 6650),
(4, 4, 20, 30, 300);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_stock_adjustment_types`
--

CREATE TABLE `laravel_stock_adjustment_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `factor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_stock_adjustment_types`
--

INSERT INTO `laravel_stock_adjustment_types` (`id`, `name`, `factor`) VALUES
(1, 'Is Outdated', -1),
(2, 'Is Damaged', -1),
(3, 'Material Missing', -1),
(4, 'Product Is Obsolete', -1),
(5, 'Existing Inventory', 1),
(6, 'Fixed/Found Inventory', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_stock_transpers`
--

CREATE TABLE `laravel_stock_transpers` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `warehouse_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `transper_date` varchar(45) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_stock_transpers`
--

INSERT INTO `laravel_stock_transpers` (`id`, `project_id`, `warehouse_id`, `transper_date`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2025-05-14', '2025-05-18 09:06:39', '2025-05-18 09:06:39'),
(2, 3, 1, '2025-05-17', '2025-05-18 09:06:25', '2025-05-18 09:06:25'),
(3, 4, 3, '2025-05-21', '2025-05-18 09:05:57', '2025-05-18 09:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_stock_transper_details`
--

CREATE TABLE `laravel_stock_transper_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `transper_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `uom_id` int(11) DEFAULT NULL,
  `qty` text DEFAULT NULL,
  `price` float NOT NULL DEFAULT 0,
  `transaction_type_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laravel_stock_transper_details`
--

INSERT INTO `laravel_stock_transper_details` (`id`, `transper_id`, `product_id`, `uom_id`, `qty`, `price`, `transaction_type_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 7, '1', 620, 3, '2025-05-20 00:34:21', '2025-05-20 00:34:21'),
(2, 2, 3, 7, '52', 20, 3, '2025-05-20 00:33:36', '2025-05-20 00:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_transaction_types`
--

CREATE TABLE `laravel_transaction_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_transaction_types`
--

INSERT INTO `laravel_transaction_types` (`id`, `name`) VALUES
(1, 'Sales Order'),
(2, 'Sales Return'),
(3, 'Purchase Order'),
(4, 'Purchase Return'),
(5, 'Positive Stock Adjustment'),
(6, 'Negative Stock Adjustment');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_uoms`
--

CREATE TABLE `laravel_uoms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_uoms`
--

INSERT INTO `laravel_uoms` (`id`, `name`) VALUES
(7, 'Piece'),
(8, 'KG'),
(9, 'Meter'),
(10, 'Liter'),
(11, 'Ton'),
(12, 'Pound'),
(13, 'Foot'),
(14, 'Sq ft');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_users`
--

CREATE TABLE `laravel_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laravel_users`
--

INSERT INTO `laravel_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'manager', 'mdabdulhamid7191@gmail.com', NULL, '$2y$12$UNeoIXE7G.WkpWvwBDJIduK/gyxi6XU0Mp8mBxodG1p3CZCp6yb7K', 'aHxOyjMnONnMdBS9bWyWA0OwjtoC9LXqmW6zbAEt2aJJa4r12LGpRMUEz0on', '2025-05-09 18:42:14', '2025-05-09 18:42:14'),
(2, 'admin', 'hamidyahoo22@gmail.com', NULL, '$2y$12$EJ6T6Xn1dBu7ZSWRmd/lh.RqchCDKd9/0qIiEP0kF9.rnbOilJ4gi', 'aHxOyjMnONnMdBS9bWyWA0OwjtoC9LXqmW6zbAEt2aJJa4r12LGpRMUEz0on', '2025-05-09 18:42:27', '2025-05-09 18:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_vendors`
--

CREATE TABLE `laravel_vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(145) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_vendors`
--

INSERT INTO `laravel_vendors` (`id`, `photo`, `name`, `mobile`, `email`, `address`) VALUES
(1, '1.jpg', 'SOHEL RANA', '098765432456', 'sohelrana121646@gmail.com', 'Darikalinagar'),
(2, '2.jpg', 'Kalamuddin', '12654454', 'kalam@gmail.com', 'Dhaka'),
(3, '3.jpg', 'Jubayer', '78969542', 'jubaer@gmail.com', 'Gulshan');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_warehouses`
--

CREATE TABLE `laravel_warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL DEFAULT '',
  `contact` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laravel_warehouses`
--

INSERT INTO `laravel_warehouses` (`id`, `name`, `city`, `contact`) VALUES
(1, 'Dhanmondi', 'Dhaka', '4543534534'),
(2, 'Mymensingh', 'Mymensingh', '324242342'),
(3, 'Badda', 'Rampura', '3434334324'),
(4, 'Gulshan', 'Dhaka', '02365497741'),
(5, 'Bashundhora', 'Dhaka', '7896423211');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laravel_agents`
--
ALTER TABLE `laravel_agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_categories`
--
ALTER TABLE `laravel_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_contractors`
--
ALTER TABLE `laravel_contractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_customers`
--
ALTER TABLE `laravel_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_invoices`
--
ALTER TABLE `laravel_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laravel_invoices_ibfk_1` (`customer_id`);

--
-- Indexes for table `laravel_invoice_details`
--
ALTER TABLE `laravel_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_manufacturers`
--
ALTER TABLE `laravel_manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_modules`
--
ALTER TABLE `laravel_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_money_receipts`
--
ALTER TABLE `laravel_money_receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_money_receipt_details`
--
ALTER TABLE `laravel_money_receipt_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_orders`
--
ALTER TABLE `laravel_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_order_details`
--
ALTER TABLE `laravel_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_password_reset_tokens`
--
ALTER TABLE `laravel_password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `laravel_permissions`
--
ALTER TABLE `laravel_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_persons`
--
ALTER TABLE `laravel_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_products`
--
ALTER TABLE `laravel_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_product_categories`
--
ALTER TABLE `laravel_product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_product_sections`
--
ALTER TABLE `laravel_product_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_product_types`
--
ALTER TABLE `laravel_product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_product_units`
--
ALTER TABLE `laravel_product_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_progress`
--
ALTER TABLE `laravel_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_projects`
--
ALTER TABLE `laravel_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contractor_id` (`contractor_id`),
  ADD KEY `status_id` (`status_id`) USING BTREE;

--
-- Indexes for table `laravel_project_costings`
--
ALTER TABLE `laravel_project_costings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_project_modules`
--
ALTER TABLE `laravel_project_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_project_persons`
--
ALTER TABLE `laravel_project_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_project_statuses`
--
ALTER TABLE `laravel_project_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_project_types`
--
ALTER TABLE `laravel_project_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_properties`
--
ALTER TABLE `laravel_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `laravel_property_statuses`
--
ALTER TABLE `laravel_property_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_purchases`
--
ALTER TABLE `laravel_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_purchase_details`
--
ALTER TABLE `laravel_purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_roles`
--
ALTER TABLE `laravel_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_role_has_permissions`
--
ALTER TABLE `laravel_role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`);

--
-- Indexes for table `laravel_sections`
--
ALTER TABLE `laravel_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_sessions`
--
ALTER TABLE `laravel_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laravel_sessions_user_id_index` (`user_id`),
  ADD KEY `laravel_sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `laravel_settings`
--
ALTER TABLE `laravel_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_statuses`
--
ALTER TABLE `laravel_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_stocks`
--
ALTER TABLE `laravel_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_stock_transpers`
--
ALTER TABLE `laravel_stock_transpers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_stock_transper_details`
--
ALTER TABLE `laravel_stock_transper_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_uoms`
--
ALTER TABLE `laravel_uoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_users`
--
ALTER TABLE `laravel_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `core_users_email_unique` (`email`);

--
-- Indexes for table `laravel_vendors`
--
ALTER TABLE `laravel_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_warehouses`
--
ALTER TABLE `laravel_warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laravel_agents`
--
ALTER TABLE `laravel_agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laravel_categories`
--
ALTER TABLE `laravel_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laravel_contractors`
--
ALTER TABLE `laravel_contractors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laravel_customers`
--
ALTER TABLE `laravel_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laravel_invoices`
--
ALTER TABLE `laravel_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `laravel_invoice_details`
--
ALTER TABLE `laravel_invoice_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `laravel_manufacturers`
--
ALTER TABLE `laravel_manufacturers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laravel_modules`
--
ALTER TABLE `laravel_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laravel_money_receipts`
--
ALTER TABLE `laravel_money_receipts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `laravel_money_receipt_details`
--
ALTER TABLE `laravel_money_receipt_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `laravel_orders`
--
ALTER TABLE `laravel_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laravel_order_details`
--
ALTER TABLE `laravel_order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laravel_permissions`
--
ALTER TABLE `laravel_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravel_persons`
--
ALTER TABLE `laravel_persons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laravel_products`
--
ALTER TABLE `laravel_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laravel_product_categories`
--
ALTER TABLE `laravel_product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `laravel_product_sections`
--
ALTER TABLE `laravel_product_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laravel_product_types`
--
ALTER TABLE `laravel_product_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laravel_product_units`
--
ALTER TABLE `laravel_product_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laravel_progress`
--
ALTER TABLE `laravel_progress`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laravel_projects`
--
ALTER TABLE `laravel_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laravel_project_costings`
--
ALTER TABLE `laravel_project_costings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laravel_project_modules`
--
ALTER TABLE `laravel_project_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laravel_project_persons`
--
ALTER TABLE `laravel_project_persons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laravel_project_statuses`
--
ALTER TABLE `laravel_project_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laravel_project_types`
--
ALTER TABLE `laravel_project_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laravel_properties`
--
ALTER TABLE `laravel_properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `laravel_property_statuses`
--
ALTER TABLE `laravel_property_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laravel_purchases`
--
ALTER TABLE `laravel_purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `laravel_purchase_details`
--
ALTER TABLE `laravel_purchase_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `laravel_roles`
--
ALTER TABLE `laravel_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravel_sections`
--
ALTER TABLE `laravel_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laravel_settings`
--
ALTER TABLE `laravel_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravel_statuses`
--
ALTER TABLE `laravel_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laravel_stocks`
--
ALTER TABLE `laravel_stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `laravel_stock_transpers`
--
ALTER TABLE `laravel_stock_transpers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laravel_stock_transper_details`
--
ALTER TABLE `laravel_stock_transper_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laravel_uoms`
--
ALTER TABLE `laravel_uoms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `laravel_users`
--
ALTER TABLE `laravel_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laravel_vendors`
--
ALTER TABLE `laravel_vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laravel_warehouses`
--
ALTER TABLE `laravel_warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laravel_invoices`
--
ALTER TABLE `laravel_invoices`
  ADD CONSTRAINT `laravel_invoices_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `laravel_customers` (`id`);

--
-- Constraints for table `laravel_projects`
--
ALTER TABLE `laravel_projects`
  ADD CONSTRAINT `laravel_projects_ibfk_1` FOREIGN KEY (`contractor_id`) REFERENCES `laravel_contractors` (`id`);

--
-- Constraints for table `laravel_properties`
--
ALTER TABLE `laravel_properties`
  ADD CONSTRAINT `laravel_properties_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `laravel_categories` (`id`),
  ADD CONSTRAINT `laravel_properties_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `laravel_projects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
