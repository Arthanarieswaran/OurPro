-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 12:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ourpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `summary` text DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `summary`, `photo`, `is_parent`, `parent_id`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Fashion', 'mens-fashion', NULL, '/storage/photos/1/Category/mini-banner1.jpg', 1, NULL, NULL, 'active', '2020-08-14 04:26:15', '2020-08-14 04:26:15'),
(2, 'Women\'s Fashion', 'womens-fashion', NULL, '/storage/photos/1/Category/mini-banner2.jpg', 1, NULL, NULL, 'active', '2020-08-14 04:26:40', '2020-08-14 04:26:40'),
(3, 'Kid\'s', 'kids', NULL, '/storage/photos/1/Category/mini-banner3.jpg', 1, NULL, NULL, 'active', '2020-08-14 04:27:10', '2020-08-14 04:27:42'),
(4, 'T-shirt\'s', 't-shirts', NULL, NULL, 0, 1, NULL, 'active', '2020-08-14 04:32:14', '2020-08-14 04:32:14'),
(5, 'Jeans pants', 'jeans-pants', NULL, NULL, 0, 1, NULL, 'active', '2020-08-14 04:32:49', '2020-08-14 04:32:49'),
(6, 'Sweater & Jackets', 'sweater-jackets', NULL, NULL, 0, 1, NULL, 'active', '2020-08-14 04:33:37', '2020-08-14 04:33:37'),
(7, 'Rain Coats & Trenches', 'rain-coats-trenches', NULL, NULL, 0, 1, NULL, 'active', '2020-08-14 04:34:04', '2020-08-14 04:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ph_no` varchar(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `description`, `logo`, `email`, `ph_no`, `status`, `address`, `created_at`) VALUES
(1, 'testing', 'logo.png', 'abcd1234@gmail.com', '9876543210', 'active', '123 abcd efghijkl mnop qrstuvw xyz', '2023-12-11 11:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_content` varchar(255) DEFAULT NULL,
  `slug` varchar(20) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `status` varchar(11) DEFAULT 'active',
  `old_rate` int(11) DEFAULT NULL,
  `new_rate` int(11) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `saree_length` double DEFAULT NULL,
  `blous_length` double DEFAULT NULL,
  `work_type` varchar(255) DEFAULT NULL,
  `stich_type` varchar(255) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `product_work_type` varchar(255) DEFAULT NULL,
  `product_method_type` varchar(255) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `product_img_1` varchar(255) DEFAULT NULL,
  `product_img_2` varchar(255) DEFAULT NULL,
  `product_img_3` varchar(255) DEFAULT NULL,
  `product_details_1` varchar(255) DEFAULT NULL,
  `product_details_2` varchar(255) DEFAULT NULL,
  `product_details_3` varchar(255) DEFAULT NULL,
  `product_details_4` varchar(255) DEFAULT NULL,
  `product_details_5` varchar(255) DEFAULT NULL,
  `munthi_color` varchar(45) DEFAULT NULL,
  `body_color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` varchar(25) DEFAULT 'active',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `otp`, `email_verified_at`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'eswar', 'arthanarieswaran2002sn@gmail.com', NULL, NULL, 'active', '$2y$12$IJ3.3nknWLyGo4xk4QTwf.xA0HbwWQLpgI0wyyHb9wZ9UQjRbfRf.', NULL, '2023-12-11 00:55:52', '2023-12-11 00:55:52'),
(3, 'ganesh1', 'ganesh1234@gmail.com', NULL, NULL, 'active', '$2y$12$ZAvrReOCEfq8N7YLcj1y3uO4gi9sxSxyoYWrYG8fMa3KPPZdAxHi6', NULL, '2023-12-11 00:59:41', '2023-12-11 00:59:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`),
  ADD KEY `categories_added_by_foreign` (`added_by`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
