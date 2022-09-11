-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 07, 2022 at 02:12 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'real state', '2022-07-21 15:29:46', '2022-07-21 15:29:46'),
(3, 'training', '2022-07-21 15:29:56', '2022-07-21 15:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nemployees` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at_str` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `country`, `email`, `activity`, `nemployees`, `status`, `created_at_str`, `created_at`, `updated_at`) VALUES
(1, 'client4', '65566556', 'egypt', 'client3@gmail.com', '3', 244, 1, '1658410044', '2022-07-21 11:27:24', '2022-07-21 15:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature` json DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `title`, `description`, `image`, `feature`, `type`, `created_at`, `updated_at`) VALUES
(2, 'title 11', 'des 11', 'qNaTo9JVVEZaJHfdBWGPFAffENh8JpBsDoN9owNI.png', '\"YToyOntpOjA7YToyOntzOjQ6Imljb24iO3M6NDoidXNlciI7czo1OiJ0aXRsZSI7czoxOToi2LnZhtmI2KfZhiDYsdmC2YUgMSI7fWk6MTthOjI6e3M6NDoiaWNvbiI7czo1OiJhZG1pbiI7czo1OiJ0aXRsZSI7czoxOToi2LnZhtmI2KfZhiDYsdmC2YUgMiI7fX0=\"', '1', '2022-07-24 15:26:26', '2022-07-24 15:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_06_07_165740_create_roles_table', 1),
(5, '2022_06_07_165808_create_permissions_table', 1),
(6, '2022_06_07_165835_create_role_permissions_table', 1),
(7, '2022_06_11_054130_create_settings_table', 1),
(8, '2022_07_01_171153_create_notifications_table', 1),
(9, '2022_07_03_143438_create_clients_table', 1),
(10, '2022_07_20_103843_create_activities_table', 1),
(11, '2022_07_20_113223_create_services_table', 1),
(12, '2022_07_20_143210_create_features_table', 1),
(13, '2022_07_21_101741_create_applications_table', 1),
(14, '2022_07_24_120706_create_parteners_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('f3642da2-c07c-4e71-980b-63d7cb5215b0', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":1,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-07-21\",\"time\":\"13:27\"}', '2022-07-24 09:10:22', '2022-07-21 11:27:24', '2022-07-24 09:10:22'),
('01e8ec3c-4283-42f0-8199-db18557be451', 'App\\Notifications\\AdminNotifications', 'App\\User', 1, '{\"type\":\"newClient\",\"linked_id\":2,\"text\":\"\\u0644\\u0642\\u062f \\u0642\\u0627\\u0645 client4 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0646\\u0635\\u0629 \\u0648\\u0628\\u062d\\u0627\\u062c\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0648\\u0627\\u0635\\u0644 \\u0648\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.\",\"date\":\"2022-07-21\",\"time\":\"13:28\"}', '2022-07-24 09:10:22', '2022-07-21 11:28:06', '2022-07-24 09:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `parteners`
--

DROP TABLE IF EXISTS `parteners`;
CREATE TABLE IF NOT EXISTS `parteners` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parteners`
--

INSERT INTO `parteners` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Amr Shams', 'xwIDnYsD9WECgIIH41gETBjfrPKbgSFhNYofFnLE.png', '2022-07-24 14:33:45', '2022-07-24 14:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middleware` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quard` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name_ar`, `name_en`, `name_fr`, `quard`, `created_at`, `updated_at`) VALUES
(1, 'admins', 'admins', 'admins', 'admin', NULL, NULL),
(2, 'users', 'users', 'users', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
CREATE TABLE IF NOT EXISTS `role_permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `roles_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `linked_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `linked_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'hometitle', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, ad doloremque. Labore culpa molestiae dolorum veritatis quod', NULL, NULL, '2022-07-21 15:27:36', '2022-08-25 15:21:07'),
(2, 'homedes', 'ddddddddddd', NULL, NULL, '2022-07-21 15:27:36', '2022-08-25 15:21:07'),
(3, 'subscriptiontitle', '', NULL, NULL, '2022-07-21 15:27:36', '2022-07-24 14:47:39'),
(4, 'subscriptiondes', '', NULL, NULL, '2022-07-21 15:27:36', '2022-07-24 14:47:39'),
(5, 'servicetitle', '', NULL, NULL, '2022-07-21 15:27:36', '2022-07-24 14:47:29'),
(6, 'servicedes', '', NULL, NULL, '2022-07-21 15:27:36', '2022-07-24 14:47:29'),
(7, 'applicationtitle', '', NULL, NULL, '2022-07-21 15:27:36', '2022-07-24 14:47:29'),
(8, 'applicationdes', '', NULL, NULL, '2022-07-21 15:27:36', '2022-07-24 14:47:29'),
(9, 'client1name', 'Ali', NULL, 'clientName', '2022-07-21 15:27:36', '2022-07-21 15:45:19'),
(10, 'client2name', 'Nora', NULL, 'clientName', '2022-07-21 15:27:36', '2022-07-21 15:45:19'),
(11, 'client3name', 'Ahmed', NULL, 'clientName', '2022-07-21 15:27:36', '2022-07-21 15:45:19'),
(12, 'client4name', 'Amira', NULL, 'clientName', '2022-07-21 15:27:36', '2022-07-21 15:45:19'),
(13, 'demoLink', 'link', NULL, NULL, '2022-07-21 15:27:36', '2022-07-21 15:27:36'),
(14, 'demoUserName', 'user', NULL, NULL, '2022-07-21 15:27:36', '2022-07-21 15:27:36'),
(15, 'demoPassword', 'password', NULL, NULL, '2022-07-21 15:27:36', '2022-07-21 15:27:36'),
(16, 'closeSite', '0', NULL, NULL, '2022-07-21 15:27:36', '2022-07-21 15:27:36'),
(161, 'logoimg', 't6VIWHs4rYoXxAwCH9gaZqvjozbMipiU8boI9c28.png', NULL, NULL, '2022-07-27 10:49:18', '2022-07-27 10:49:18'),
(162, 'dashboardimg', 'bCwMKbODBuy5Fe21xhdPxaReiAdEBs94OsSixcna.png', NULL, NULL, '2022-07-27 10:49:27', '2022-07-27 10:49:27'),
(163, 'homemsg', 'welcome', NULL, NULL, '2022-08-25 15:21:07', '2022-08-25 15:21:07'),
(164, 'homeimg', 'FoCKaulrQSKnc8d2w8WH88iID9cnP529BXutX30v.png', NULL, NULL, '2022-08-25 15:21:07', '2022-08-25 15:21:07'),
(165, 'aboutustitle', 'title 1', NULL, NULL, '2022-08-25 16:14:23', '2022-08-25 16:14:23'),
(166, 'aboutusdes', 'description 1', NULL, NULL, '2022-08-25 16:14:23', '2022-08-25 16:14:23'),
(167, 'aboutusimg', 'ti6M3p1KPLljObbiXWEvYQrLr8Zl4VVLxAdoex1y.png', NULL, NULL, '2022-08-25 16:14:23', '2022-08-25 16:14:23'),
(160, 'clients', 'YToyOntpOjA7YToyOntzOjQ6Im5hbWUiO3M6MTA6Iti52YXZitmEIDEiO3M6NDoiZmlsZSI7czo0NDoiOGgyTDBEZ1J5bTVDakFmMDI2M0lGZUxvTkZqN25XMWJoajhiUUNTVC5wbmciO31pOjE7YToyOntzOjQ6Im5hbWUiO3M6MTA6Iti52YXZitmEIDIiO3M6NDoiZmlsZSI7czowOiIiO319', NULL, NULL, '2022-07-24 13:02:00', '2022-07-24 14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `language`, `block`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hend Ahmed', 'malakmamdouh443@gmail.com', '1', NULL, '$2y$10$qhuFKXgjIOb5ZaELHybE4O.KnpbLQqVwTAy7Z1Eg8e5I.b9PXQcde', 'en', NULL, NULL, '2022-07-21 15:26:53', '2022-07-25 15:38:31'),
(8, 'Amr Shams', 'test1@technomasr.com', '1', NULL, '$2y$10$BHUFS1XOPAq40nS.kKOYG.SMsbPl0V3AB2/1Bo.dyV5cy4XP/Snl.', NULL, NULL, NULL, '2022-08-01 14:12:18', '2022-08-01 14:12:18'),
(7, 'Hend Ahmed', 'test@technomasr.com', '1', NULL, '$2y$10$DmhVkv.akrefL4BtwqOb6OItFRjbeNgtvE7yiV7lceZhrtlzqqjH2', NULL, NULL, NULL, '2022-07-25 10:06:41', '2022-07-25 10:06:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
