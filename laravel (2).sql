-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2025 at 08:58 AM
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
-- Table structure for table `laravel_properties`
--

CREATE TABLE `laravel_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `beds` tinyint(3) UNSIGNED NOT NULL,
  `baths` tinyint(3) UNSIGNED NOT NULL,
  `sqft` int(10) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `details` longtext NOT NULL,
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery`)),
  `lat` decimal(10,8) NOT NULL,
  `lon` decimal(11,8) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laravel_properties`
--

INSERT INTO `laravel_properties` (`id`, `price`, `address`, `beds`, `baths`, `sqft`, `year`, `details`, `gallery`, `lat`, `lon`, `slug`, `created_at`, `updated_at`) VALUES
(1, 350000.00, '123 Maple Street, Springfield, IL', 4, 3, 2200, '2015', 'Beautiful single-family home with spacious backyard, modern kitchen, and finished basement.', '[\"https://example.com/images/property1/img1.jpg\", \"https://example.com/images/property1/img2.jpg\", \"https://example.com/images/property1/img3.jpg\"]', 39.78172100, -89.65014800, '123-maple-street-springfield-il', '2025-05-03 05:24:46', '2025-05-03 05:24:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laravel_properties`
--
ALTER TABLE `laravel_properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `address` (`address`),
  ADD UNIQUE KEY `lat` (`lat`),
  ADD UNIQUE KEY `lon` (`lon`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laravel_properties`
--
ALTER TABLE `laravel_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
