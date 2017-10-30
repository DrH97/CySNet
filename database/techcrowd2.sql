-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 07:24 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techcrowd2`
--
CREATE DATABASE IF NOT EXISTS `techcrowd2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `techcrowd2`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Goda', 'techcrowd.ke@gmail.com', '$2y$10$3sC/eUjp02ID.zTvvdyiLONO92.ywHJTMgyJ8NzRVEzxCHBnaOpDe', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `productid` int(10) UNSIGNED NOT NULL,
  `sellerid` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'trials', '2017-10-24 12:00:00', NULL),
(2, 'Mouse', '2017-10-25 21:22:00', NULL),
(3, 'Hard disks', '2017-10-25 21:23:16', NULL),
(4, 'Headphones', '2017-10-25 21:23:24', NULL),
(5, 'Watches', '2017-10-25 21:23:28', NULL),
(6, 'Phone cases', '2017-10-25 21:23:39', NULL),
(7, 'Flash disk', '2017-10-25 21:24:20', NULL),
(8, 'Memory card', '2017-10-25 21:24:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hardware_products`
--

CREATE TABLE `hardware_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `productname` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `categoryid` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sellerid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hardware_products`
--

INSERT INTO `hardware_products` (`id`, `code`, `productname`, `description`, `categoryid`, `image`, `quantity`, `price`, `sellerid`, `created_at`, `updated_at`) VALUES
(9, '', 'Kaneki', 'jkk', 1, '1508876647Kaneki-wallpaper-10792862.jpg', 4, 890, 6, '2017-10-24 20:24:07', NULL),
(10, '', 'Wierd spoon', 'dmasdm', 3, '1508859764fire_background_dark_lines_47328_3840x2160.jpg', 9, 99, 3, '2017-10-24 21:18:28', NULL),
(13, '', 'iPhone charger', 'Data Cable\r\n\r\niPhone Charger\r\n\r\nFast Charging', 1, '1509099153download (1).jpg', 5, 500, 5, '2017-10-27 10:12:33', NULL),
(14, '', 'Wireless Mouse', 'Wireless Mouse\r\n\r\nRechargeable\r\n\r\nBluetooth Technology\r\n\r\nUp to 10m range', 1, '1509151027weyes.jpg', -6, 1800, 5, '2017-10-28 00:37:07', NULL),
(18, '', 'Joker', 'Joker Joker Joker for saleeee!\r\n\r\nHurry while puns last!!!', 1, '1509226086Joker_Happy-wallpaper-10151224.jpg', 1, 2147483647, 3, '2017-10-28 21:28:06', NULL),
(22, '', 'Fire in the Booth', 'Skraaaaaaa ra ta pa pa ta ta ta\r\n\r\nSkidi pum pa pa pa pa \r\n\r\nThe ting goes....', 1, '1509304169fire_background_dark_lines_47328_3840x2160.jpg', 78, 3456789, 14, '2017-10-29 19:09:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `sellerid` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `rating` decimal(10,0) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `repairers`
--

CREATE TABLE `repairers` (
  `id` int(11) NOT NULL,
  `repairerid` int(10) UNSIGNED NOT NULL,
  `repairername` text NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `categories` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) UNSIGNED NOT NULL,
  `sellerid` int(10) UNSIGNED NOT NULL,
  `sellername` text NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) DEFAULT NULL,
  `firstname` varchar(191) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `gender` varchar(191) NOT NULL,
  `institution` varchar(191) DEFAULT NULL,
  `course` varchar(191) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `admno` int(11) DEFAULT NULL,
  `repairer` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `image` text,
  `verified` tinyint(1) DEFAULT NULL,
  `rating` decimal(10,0) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `gender`, `institution`, `course`, `year`, `admno`, `repairer`, `active`, `mobile`, `email`, `password`, `image`, `verified`, `rating`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'j', 'j', 'female', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'josenabz1@gmail.com', '$2y$10$z6mMT1ojm9GXqqoLQnkwTeX0MQOMpWvujvU7WFVATMsov.cBhP7L2', NULL, 0, '0', NULL, '2017-09-20 07:52:29', NULL),
(3, '', 'j', 'j', 'male', 'Strathmore University', 'BICS', 2, 92879, NULL, NULL, 1, 'j@j.j', '$2y$10$cW77fXvrJbbPVGCzn7Jbhu8lvwj6Z7TXgCuMdQb61qL5CUbeoCtAm', '1508962422fire_background_dark_lines_47328_3840x2160.jpg', 0, '0', NULL, '2017-10-21 07:59:28', '2017-10-28 01:22:55'),
(4, '', 'a', 'a', 'Female', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'a@a.a', '$2y$10$jotZLGuWr4bnRpZetfHZguYaAwWGPbwNmwwdMSCsE/KIUY/NQTJDa', '1508598703Harley_Quinn-wallpaper-10932474.jpg', 0, '0', NULL, '2017-10-21 08:15:11', '2017-10-21 15:11:43'),
(5, '', 'Dr', 'H', 'Male', 'Self Employed', '', 0, NULL, NULL, NULL, 0, 'josenabz@gmail.com', '$2y$10$IMctpZQ6EviJqbcdJpTBOewLvkoK1SksjjW5IPX0dfcZdQt/SeyL2', NULL, 0, '0', NULL, '2017-10-22 22:39:15', '2017-10-27 10:33:34'),
(6, 'VSOL', 'Lynn', 'Sabwa', 'Female', NULL, NULL, NULL, NULL, NULL, NULL, 712849129, 'lynnsabwa@gmail.com', '$2y$10$Z4Egg8LhVMVJTq4nQC6LXe0AmMzQWmUkJQCdXZBLlW3wJWkWgfNmG', NULL, 0, '0', NULL, '2017-10-23 07:01:08', NULL),
(14, '', 'Bro', 'Jon', 'Female', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'bjon@gmail.com', '$2y$10$Hqq.Eg7h6wUEHLQu9O8.Uu0QfY6arCPWnDCKE0RItWXUt6nAdv6IW', NULL, NULL, NULL, NULL, '2017-10-29 16:03:36', NULL),
(15, '', 'bleh', 'blehish', 'Female', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'bleh@gmail.com', '$2y$10$DCdJmDEwuKvjcVQgfe7XF.FRJJ3SFBCJvAPvfSmv9UW.fcWXVFfQS', NULL, NULL, NULL, NULL, '2017-10-30 10:48:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `productid` (`productid`),
  ADD KEY `sellerid` (`sellerid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardware_products`
--
ALTER TABLE `hardware_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hardware_products_categoryid_foreign` (`categoryid`),
  ADD KEY `hardware_products_sellerid_foreign` (`sellerid`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`) USING BTREE,
  ADD KEY `sellerid` (`sellerid`) USING BTREE;

--
-- Indexes for table `repairers`
--
ALTER TABLE `repairers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repairerid` (`repairerid`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sellerid` (`sellerid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `admno` (`admno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `hardware_products`
--
ALTER TABLE `hardware_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `hardware_products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`sellerid`) REFERENCES `sellers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `hardware_products`
--
ALTER TABLE `hardware_products`
  ADD CONSTRAINT `hardware_products_categoryid_foreign` FOREIGN KEY (`categoryid`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `hardware_products_sellerid_foreign` FOREIGN KEY (`sellerid`) REFERENCES `users` (`id`);

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`sellerid`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_ibfk_1` FOREIGN KEY (`sellerid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
