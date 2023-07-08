-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2023 at 09:12 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handyhero`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

DROP TABLE IF EXISTS `admin_detail`;
CREATE TABLE IF NOT EXISTS `admin_detail` (
  `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_detail_admin_name_unique` (`admin_name`),
  UNIQUE KEY `admin_detail_admin_password_unique` (`admin_password`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`admin_id`, `admin_name`, `admin_password`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$AJFIz8cKeNF0O8s8bPNJseOQKlKyBJ/gdSfFZKZNUyPr9jxt1Kdm2', 'admin', '2023-07-05 11:58:48', '2023-07-05 11:58:48'),
(2, 'lysa', '$2y$10$3.mpAVjn3L6FYzzZZFMVpuG5Dt3hp8.8jtwohE20sXJS9wsCsZDZy', 'admin', '2023-07-05 21:40:23', '2023-07-05 21:40:23'),
(3, 'lysreng', '$2y$10$Lh7TU7wiH.SetEOw8VV/E.blB3V/gljky8q3f7MjUl50ihg36300S', 'admin', '2023-07-06 00:40:04', '2023-07-06 00:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `booking_detail`
--

DROP TABLE IF EXISTS `booking_detail`;
CREATE TABLE IF NOT EXISTS `booking_detail` (
  `book_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `book_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`book_id`),
  KEY `booking_detail_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_detail`
--

INSERT INTO `booking_detail` (`book_id`, `f_name`, `l_name`, `address`, `number`, `email`, `book_date`, `status`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'Socheata', 'sdgh', 'sdfghjkl', '9987878', 'my1name@example.com', '2023-07-14', 1, 1, '2023-07-05 12:01:18', '2023-07-06 00:39:40'),
(2, 'lysa', 'sorkeo', 'nov jit camko ey ng', '011526723', 'lysa@gmail.com', '2023-07-28', 1, 7, '2023-07-05 21:37:18', '2023-07-05 21:53:21'),
(3, 'mak', 'cheata', 'nov jit camko ey ng', '9987878', 'myname@example.com', '2023-07-08', 2, 4, '2023-07-05 23:22:40', '2023-07-06 00:39:46'),
(4, 'sir rothana', 'sot', 'sdfghjkl', '9987878', 'myname@example.com', '2023-07-27', 0, 11, '2023-07-05 23:39:14', '2023-07-05 23:39:14'),
(5, 'mak', 'cheata', 'nov jit camko ey ng', '09987878', 'chhaycheata@gmail.com', '2023-07-13', 0, 12, '2023-07-06 00:28:09', '2023-07-06 00:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `company_detail`
--

DROP TABLE IF EXISTS `company_detail`;
CREATE TABLE IF NOT EXISTS `company_detail` (
  `company_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `company_number` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_password` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `company_detail_company_email_unique` (`company_email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_detail`
--

INSERT INTO `company_detail` (`company_id`, `company_name`, `company_number`, `company_email`, `company_password`, `description`, `company_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Handyhe', '09986738', 'fixmhome@gmail.com', '$2y$10$9Rhoq2UYQao/pgqrNzbbWuhqqNcvbE6JUGjg/BEfhDF6PHtBna.ea', 'sdsafjlsdfglhjsdfgdsfjsdlfjhsdgfadsssssssssssssssssssssssssssfdsfsdfsaf', 'No. 8, St. 315, Boeng Kak 1, Tuol Kork, Phnom Penh, Cambodia, 12151', 'kSnbfRvcCIAUr9a17tzca3qUuGBNgefWRbJni7eO7qWefMarvgLo9c7d4iRA1ZPJXtm9OOCNDvySBfBb', '2023-07-05 12:00:21', '2023-07-06 00:38:30'),
(2, 'cleaning window', '09876543', 'clean@gmail.com', '12345678', 'book now hehe', 'ttp,pp', NULL, NULL, NULL),
(4, 'helloworld', '023 880 880', 'helloworld@gmail.com', '$2y$10$4S7Ltj8EfXXEZeJBdPhBjei8/E/.UMMxgv8AVn6jWSZl.es.7NxOe', 'If your bathroom is tired and outdated, call on Mr. Handyman for a complete bathroom remodel and renovation. Your local home improvement professional can help install tile flooring, knock out walls and install the perfect vanity. From cabinet installation to painting, Mr. Handyman is the one-call solution to your bathroom and remodel project.', 'No. 8, St. 315, Boeng Kak 1, Tuol Kork, Phnom Penh, Cambodia, 12151', 'YfStuWsZgxFs7MnG1sdrBRFr5qCpiei3VZeU7kXcM8nsUlBHo07nyYNYvKfxui83QHmKNvjwy7J0zwBT', '2023-07-05 23:30:01', '2023-07-06 00:51:14'),
(5, 'home paragon', '012 315 303', 'homeparagon@gmail.com', '$2y$10$4FiMNV9kjHaRWkr8ym.lOOFqkf6t72t2Om7N3F.ay3KIunjdNtVsG', 'fix everything u want', 'No. 8, St. 315, Boeng Kak 1, Tuol Kork, Phnom Penh, Cambodia, 12151', '1w0gAYgK6j3IoNhbsx8FxUBz0wPqJ6eEpkYfVj6uUx32xfTptNVh1WHGgscL1cizyAFngMy6ftceRYVU', '2023-07-06 00:29:52', '2023-07-06 00:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_06_28_155300_create_user_detail_table', 1),
(3, '2023_06_28_155550_create_company_detail_table', 1),
(4, '2023_06_28_160728_create_admin_detail_table', 1),
(5, '2023_06_28_161947_create_service_cate_table', 1),
(6, '2023_06_28_165821_create_service_detail_table', 1),
(7, '2023_06_28_173327_create_booking_detail_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_cate`
--

DROP TABLE IF EXISTS `service_cate`;
CREATE TABLE IF NOT EXISTS `service_cate` (
  `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_cate`
--

INSERT INTO `service_cate` (`cate_id`, `category`) VALUES
(1, 'Handyman'),
(2, 'Plumbing'),
(3, 'Cleaning'),
(4, 'Electrician'),
(5, 'Roof Repair'),
(6, 'Cracked Concrete'),
(7, 'Land Scaping'),
(8, 'Pain and Drywall Repairs'),
(9, 'Pest Control');

-- --------------------------------------------------------

--
-- Table structure for table `service_detail`
--

DROP TABLE IF EXISTS `service_detail`;
CREATE TABLE IF NOT EXISTS `service_detail` (
  `service_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) NOT NULL,
  `service_description` longtext NOT NULL,
  `service_price` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_detail`
--

INSERT INTO `service_detail` (`service_id`, `service_name`, `service_description`, `service_price`, `cate_id`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 'Fence and Gate Repair', 'dsadasd\r\n+sdjhsdkasd\r\n+sdjhasldsad', '20000', 4, 1, '2023-07-05 12:00:45', '2023-07-06 00:39:15'),
(2, 'window cleaning', 'aba', '13000', 1, 1, '2023-07-05 21:24:02', '2023-07-05 21:24:02'),
(3, 'hgfgfhgfh', 'jhsadgsjahdgjasd\r\n+jsdhasdhjg\r\n+jsadhashjd', '2132352', 3, 1, '2023-07-05 21:24:48', '2023-07-05 21:24:48'),
(4, 'Fix Computer', 'Fix laptop\r\n+broken monitor\r\n+broken keyboard\'\r\n+cannot open\r\n+forgot password', '60000', 4, 1, '2023-07-05 21:29:51', '2023-07-05 21:29:51'),
(5, 'Phearun Clean house', 'I clean your entire house\r\n+dont leave a dust behind\r\n+just make sure u have cleaning soap', '400000', 3, 3, '2023-07-05 21:32:06', '2023-07-05 21:32:06'),
(6, 'Phearun cut grass', 'use will cut your grass evenly. use big scissors, grass will have clean shave', '2000000', 7, 3, '2023-07-05 21:33:06', '2023-07-05 21:33:06'),
(7, 'Phearun and Visal clean bathroom', 'I bring my friend to clean all your bathrooms. Bathrubs, shower, toilet, etc. \r\n+book us now, we dont bite', '300000000', 3, 3, '2023-07-05 21:34:42', '2023-07-05 21:34:42'),
(8, 'bathroom repair', 'If your bathroom is tired and outdated, call on Mr. Handyman for a complete bathroom remodel and renovation. Your local home improvement professional can help install tile flooring, knock out walls and install the perfect vanity. From cabinet installation to painting, Mr. Handyman is the one-call solution to your bathroom and remodel project.', '30000', 1, 1, '2023-07-05 23:25:29', '2023-07-05 23:25:29'),
(9, 'crazy plumbing', 'If your bathroom is tired and outdated, call on Mr. Handyman for a complete bathroom remodel and renovation. Your local home improvement professional can help install tile flooring, knock out walls and install the perfect vanity. From cabinet installation to painting, Mr. Handyman is the one-call solution to your bathroom and remodel project.', '2000', 2, 1, '2023-07-05 23:33:57', '2023-07-05 23:33:57'),
(10, 'AC cleaning', '- Running constantly / Not keeping up with cooling needs: Every AC system will work a little harder on hotter, more humid days. But if your system seems to run constantly with less than adequate cooling, you may have a problem lurking. \r\n- An undersized unit will struggle when demand is high. Low refrigerant levels can cause longer and less effective cooling cycles. A dirty air filter, dirty inside evaporator coil or dirty outdoor condensing coil can reduce efficiency and effectiveness as well. Try cleaning or replacing the air filter or before contacting a professional for air conditioner repair service.\r\n- Repeatedly starting then stopping (short cycling): If your system seems to start and then shut off over and over or won’t turn on all together, you may have a system that was oversized during HVAC installation. Low refrigerant levels or a refrigerant leak can also be hard on AC systems, causing them to run erratically. A clogged or excessively dirty air filter and a frozen or dirty evaporator coil can have the same effect.\r\n- Cleaning or replacing the air filter may help, but cleaning an evaporator coil requires an air conditioner service call.', '50000', 3, 4, '2023-07-05 23:37:13', '2023-07-05 23:37:13'),
(11, 'Fence and Gate Repair', 'Running constantly / Not keeping up with cooling needs: Every AC system will work a little harder on hotter, more humid days. But if your system seems to run constantly with less than adequate cooling, you may have a problem lurking. An undersized unit will struggle when demand is high. Low refrigerant levels can cause longer and less effective cooling cycles. A dirty air filter, dirty inside evaporator coil or dirty outdoor condensing coil can reduce efficiency and effectiveness as well. Try cleaning or replacing the air filter or before contacting a professional for air conditioner repair service.\r\nRepeatedly starting then stopping (short cycling): If your system seems to start and then shut off over and over or won’t turn on all together, you may have a system that was oversized during HVAC installation. Low refrigerant levels or a refrigerant leak can also be hard on AC systems, causing them to run erratically. A clogged or excessively dirty air filter and a frozen or dirty evaporator coil can have the same effect. Cleaning or replacing the air filter may help, but cleaning an evaporator coil requires an air conditioner service call.', '2000000', 1, 4, '2023-07-05 23:37:50', '2023-07-05 23:37:50'),
(12, 'fan fixing', 'we fix your fan, and fix your heart too', '2000', 4, 4, '2023-07-05 23:40:38', '2023-07-05 23:40:38'),
(13, 'window cleaning', 'aba', '13000', 1, 4, '2023-07-06 00:44:29', '2023-07-06 00:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE IF NOT EXISTS `user_detail` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_lname` varchar(255) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_number` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_detail_user_email_unique` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`user_id`, `user_lname`, `user_fname`, `user_email`, `user_password`, `user_gender`, `user_number`, `user_address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Thai', 'Lysreng', 'lysreng@gmail.com', '$2y$10$qaswDtSNgpNu5gQU6yU47u5YrwsXrgrKIFikekePNR/3BxuhD3jWe', 'Male', '09999999', 'No. 8, St. 315, Boeng Kak 1, Tuol Kork, Phnom Penh, Cambodia, 12151', 0, 'gKIvVqmnQ02giBU8FJ4iG4R46HUxKrhFSsmUXJpONLgYbfF0vKKMzbY2GxP44uIZLr4TMzqeEnGYJLMr', '2023-07-05 11:59:34', '2023-07-06 00:45:40'),
(4, 'Sorkeo', 'Lysa', 'lysa@gmail.com', '$2y$10$FTTiLAfTMDqsxR89mcCmL.ZxeOBeIIyjTC1vjIwZpm.aEnlreJtPK', 'Female', '012571613', 'nov mdom camko villa', 0, 'KQogTDwVmrISJBTbi2hQ2ASUSr6YbfHb69ekGttNEirYd87YsldUcVrUkmfl4r8onwgNSTbhCGYg4hcF', '2023-07-05 21:35:28', '2023-07-05 21:35:44'),
(5, 'sokhachan', 'socheata', 'chhaycheata@gmail.com', '$2y$10$1bZyrpshJNGrSh0ZxMkyFuhe14M7wkLYZ2kl5VU8uNlDhF64Q/poa', 'Female', '09999999', 'No. 8, St. 315, Boeng Kak 1, Tuol Kork, Phnom Penh, Cambodia, 12151', 0, 'TVSfQ00dL3iWnl7ieGPxK7zvyNK3UTfYbGARVFUKoUBEn9W1AMLzIclrTNSLnRgX8EJHvcLwKn7vOn1q', '2023-07-05 23:18:26', '2023-07-05 23:35:07'),
(6, 'cheam', 'heghsd', 'hsdghe@gmail.com', '$2y$10$y2lBqQjkpwufsxb8hxIq9O.7k.zINPEaKQ5sxGuypZUD0t7bMgiV2', 'Male', '237862323', 'nov jit sala paragon', 0, NULL, NULL, NULL),
(7, 'cheata', 'cheata', 'cheata@gmail.com', '$2y$10$cmspdXBqIQYOJzbypE6KB.54w1WsLzoCDBskosfw929gMHVbRT3Ja', 'Female', '237862323', 'nov jit sala paragon', 0, NULL, NULL, NULL),
(8, 'Soth', 'Rothana', 'rothanasot@gmail.com', '$2y$10$bBKUg332bN8/zsatxyefSuIRw6.Xqn8HAaisMfFx.tPwUpJ0nfpj.', 'Male', '012345678', 'No. 8, St. 315, Boeng Kak 1, Tuol Kork, Phnom Penh, Cambodia, 12151', 0, 'Xd0LaA3lqh18J9ABSQn8LRkCT9VVBBHt1ii0q2N0garYoo4gWUmYAaZnWMKjqpMlMwzxPW5yw9yFPvHi', '2023-07-06 00:25:56', '2023-07-06 00:26:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
