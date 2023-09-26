-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 26, 2023 at 06:46 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mywebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `profile` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `profile`, `image`, `email`, `phone`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Kiran C', 'Software developer', '20230703112710.jpg', 'contact@example.com', '9207610962', 'Passionate and self-taught Flutter developer capable of learning and adopting the latest technologies. A solid mind to commit to tasks and responsibility to track and review progress until the committed job is completed. Possess a solid commitment to the team environment and enjoy working as a team member and independently.\r\n\r\nA strong commitment to tasks and the accountability to monitor and evaluate progress until the assignment is finished. Possess a strong dedication to the team atmosphere and take pleasure in working both independently and as a team member. does work with a lot of enthusiasm and tenacity.', '2023-07-03', '2023-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `address` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `facebook_link` varchar(100) NOT NULL DEFAULT '',
  `instagram_link` varchar(100) NOT NULL DEFAULT '',
  `twitter_link` varchar(100) NOT NULL DEFAULT '',
  `linkedin_link` varchar(100) NOT NULL DEFAULT '',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `address`, `phone`, `email`, `facebook_link`, `instagram_link`, `twitter_link`, `linkedin_link`, `created_at`, `updated_at`) VALUES
(1, 'Palakkad, Kerala, India', '9207610962', 'contact@example.com', 'https://www.linkedin.com/in/kiran-c-5921b9197/', 'https://www.linkedin.com/in/kiran-c-5921b9197/', 'https://www.linkedin.com/in/kiran-c-5921b9197/', 'https://www.linkedin.com/in/kiran-c-5921b9197/', '2023-07-05', '2023-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

DROP TABLE IF EXISTS `home`;
CREATE TABLE IF NOT EXISTS `home` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `subtitle` varchar(100) NOT NULL DEFAULT '',
  `background_image` varchar(100) NOT NULL DEFAULT '',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `title`, `subtitle`, `background_image`, `created_at`, `updated_at`) VALUES
(1, 'I am Kiran C', 'Developer, Freelancer, Designer', '20230702120700.jpg', '2023-07-02', '2023-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Kiran', 'kiran@cookee.io', 'sdsdsd', 'fhfhhhh fsffhdfh', '2023-07-05'),
(13, 'john', 'john@cookee.io', 'eererew', 'werewew egegeg', '2023-07-05'),
(39, 'Mia', 'mia@gmail.com', 'nothing', 'hii...Kiran', '2023-07-15'),
(42, 'stella', 'mia@gmail.com', 'nothing', 'hiiiiiiii', '2023-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_07_11_064454_create_permission_tables', 2),
(5, '2023_07_15_114739_create_notifications_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 8),
(4, 'App\\Models\\User', 14);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('24296ae9-750c-42c4-b945-9843069925df', 'App\\Notifications\\MessageNotification', 'App\\Models\\User', 8, '{\"message\":\"New Message Received\"}', '2023-07-15 08:55:56', '2023-07-15 08:41:24', '2023-07-15 08:55:56'),
('86623dc0-e0f6-4cc6-95e8-d07a2aea4f93', 'App\\Notifications\\MessageNotification', 'App\\Models\\User', 8, '{\"message\":\"New Message Received\"}', NULL, '2023-07-16 01:04:41', '2023-07-16 01:04:41'),
('9a4b6213-7049-4164-994b-edaa7f4c7ea4', 'App\\Notifications\\MessageNotification', 'App\\Models\\User', 14, '{\"message\":\"New Message Received\"}', NULL, '2023-07-16 01:04:41', '2023-07-16 01:04:41'),
('a91cebfa-81e1-4da8-ae5f-912b0fddb11a', 'App\\Notifications\\MessageNotification', 'App\\Models\\User', 2, '{\"message\":\"New Message Received\"}', '2023-07-16 01:05:48', '2023-07-16 01:04:41', '2023-07-16 01:05:48'),
('c1a34e57-b80d-4e35-bd10-475ab5ce5c10', 'App\\Notifications\\MessageNotification', 'App\\Models\\User', 2, '{\"message\":\"New Message Received\"}', '2023-07-15 08:54:03', '2023-07-15 08:41:24', '2023-07-15 08:54:03'),
('e6383ca1-6747-43a9-93dc-2ce3eeefb896', 'App\\Notifications\\MessageNotification', 'App\\Models\\User', 14, '{\"message\":\"New Message Received\"}', NULL, '2023-07-15 08:41:24', '2023-07-15 08:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@app.com', '$2y$10$V.hWlPbQnqQpEJfnGbEYt.xc/X6CGqlTkml8i3Zb0gU03tXEv7FNe', '2023-07-16 06:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'home.menu', 'web', 'home', '2023-07-11 06:29:42', '2023-07-11 07:34:00'),
(2, 'about.menu', 'web', 'about', '2023-07-11 06:30:18', '2023-07-11 06:30:18'),
(3, 'skills.menu', 'web', 'skills', '2023-07-11 06:31:34', '2023-07-11 06:31:34'),
(4, 'skills.list', 'web', 'skills', '2023-07-11 06:31:55', '2023-07-11 06:31:55'),
(5, 'skills.add', 'web', 'skills', '2023-07-11 06:32:10', '2023-07-11 06:32:10'),
(6, 'skills.edit', 'web', 'skills', '2023-07-11 06:32:36', '2023-07-11 06:32:36'),
(7, 'skills.delete', 'web', 'skills', '2023-07-11 06:33:11', '2023-07-11 06:33:11'),
(8, 'service.menu', 'web', 'services', '2023-07-11 06:35:03', '2023-07-11 06:35:03'),
(9, 'service.list', 'web', 'skills', '2023-07-11 06:36:08', '2023-07-11 06:36:08'),
(10, 'service.add', 'web', 'services', '2023-07-11 06:36:19', '2023-07-11 06:36:19'),
(11, 'service.delete', 'web', 'services', '2023-07-11 06:36:31', '2023-07-11 06:36:31'),
(12, 'testimonial.menu', 'web', 'testimonials', '2023-07-11 06:36:58', '2023-07-11 06:36:58'),
(13, 'testimonial.add', 'web', 'testimonials', '2023-07-11 06:37:09', '2023-07-11 06:37:09'),
(14, 'testimonial.list', 'web', 'testimonials', '2023-07-11 06:37:37', '2023-07-11 06:37:37'),
(15, 'testimonial.delete', 'web', 'testimonials', '2023-07-11 06:37:53', '2023-07-11 06:37:53'),
(16, 'contact.menu', 'web', 'contacts', '2023-07-11 06:38:44', '2023-07-11 06:38:44'),
(17, 'message.menu', 'web', 'messages', '2023-07-11 06:38:59', '2023-07-11 06:38:59'),
(18, 'message.list', 'web', 'messages', '2023-07-11 06:39:55', '2023-07-11 06:39:55'),
(19, 'message.add', 'web', 'messages', '2023-07-11 06:40:08', '2023-07-11 06:40:08'),
(20, 'message.delete', 'web', 'messages', '2023-07-11 06:40:21', '2023-07-11 06:40:21'),
(21, 'settings.menu', 'web', 'settings', '2023-07-11 06:40:46', '2023-07-11 06:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-07-11 23:51:39', '2023-07-11 23:56:05'),
(2, 'SuperAdmin', 'web', '2023-07-11 23:51:54', '2023-07-11 23:51:54'),
(4, 'Assistant', 'web', '2023-07-12 23:53:53', '2023-07-12 23:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(8, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `icon` varchar(100) NOT NULL DEFAULT '',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `icon`, `created_at`, `updated_at`) VALUES
(2, 'WEB DESIGN', '<i class=\"bi bi-code-slash\"></i>', '2023-07-04', '2023-07-04'),
(3, 'MOBILE APP DEVELOPMENT', '<i class=\"bi bi-phone\"></i>', '2023-07-04', NULL),
(4, 'WEB DEVELOPMENT', '<i class=\"bi bi-pencil-square\"></i>', '2023-07-04', '2023-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int NOT NULL AUTO_INCREMENT,
  `skill` varchar(50) NOT NULL DEFAULT '',
  `percentage` varchar(20) NOT NULL DEFAULT '',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 'HTML', '85', '2023-07-04', '2023-07-04'),
(15, 'CSS', '60', '2023-07-05', NULL),
(3, 'JAVASCRIPT', '60', '2023-07-04', NULL),
(4, 'LARAVEL', '65', '2023-07-04', NULL),
(5, 'MYSQL', '70', '2023-07-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `testimonial` text NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT '',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `testimonial`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bill Gates', 'Don\'t compare yourself with anyone in this world ... if you do so, you are insulting yourself.', '20230705112800.jpg', '2023-07-04', '2023-07-05'),
(15, 'Thomas A. Edison', 'I have not failed. I\'ve just found 10,000 ways that won\'t work.', '20230705053317.jpg', '2023-07-05', NULL),
(16, 'Steve Jobs', 'Your time is limited, so don\'t waste it living someone else\'s life.', '20230705053349.jpg', '2023-07-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `image`, `phone`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, 'user@gmail.com', NULL, '$2y$10$Ze2wZBtwLalkwf.WX7SThe4Edf9XtAvoZEphupvh3H/DRf/RSwiaG', NULL, NULL, 'user', 'active', NULL, '2023-06-28 00:38:49', '2023-06-28 00:38:49'),
(2, 'admin', 'Kiran C', 'admin@app.com', NULL, '$2y$10$SX3PSSRku1pq8bpiR0/xZOZuaiF5cYS3YlF.cx.0gNmCbFbnk2SVm', '20230630121650.jpg', '9999454334', 'admin', 'active', 'AZwNq5M9HBglijtRfTjnpiQcIKNDL09BM7Cwu609qiRxQulSiZ6IwdNXzW4W', '2023-06-28 04:55:41', '2023-07-10 06:40:05'),
(8, 'mia', 'Mia John', 'mia@gmail.com', NULL, '$2y$10$dbQe2T0G8e6R5GaXBhlg9ebBMf53TWpDv8R6cdkFBzYu6vvU7DNiS', '20230709120338.jpg', '9207610933', 'admin', 'active', 'd2A56CN7qeVx6oRp7h3pJYcxIQh60I9LuvZ5rkf1Ps2Yso3Pg74s8M8PPZYj', '2023-07-09 06:30:49', '2023-07-16 06:40:52'),
(14, 'john', 'john H', 'john@gmail.com', NULL, '$2y$10$mxrGEvFx4yaaoaBXJwno8OpqJzBK0IwpYLAOMGdI7F0MPKuX.imlG', '20230713110003.jpg', '9999454344', 'admin', 'inactive', NULL, '2023-07-09 18:30:00', '2023-07-13 05:30:03');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
