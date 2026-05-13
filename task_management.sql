-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 13, 2026 at 06:03 AM
-- Server version: 8.4.7
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-user2@test.com|::1:timer', 'i:1778639015;', 1778639015),
('laravel-cache-user2@test.com|::1', 'i:2;', 1778639015),
('laravel-cache-ciuser@test.com|::1:timer', 'i:1778648872;', 1778648872),
('laravel-cache-ciuser@test.com|::1', 'i:1;', 1778648872);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_12_135215_create_tasks_table', 2),
(5, '2026_05_12_135228_create_uploads_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3zZMDEgUklG8A47t1Of167FscD2tLcQ4ML3jLqvy', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJTNm5QZFo3MXVSMGVid2Q2QkVQaWduVEhmQndUcjlXM3h5c1BacUpvIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbG9jYWxob3N0XC90YXNrLW1hbmFnZW1lbnRcL3B1YmxpY1wvdGFza3MiLCJyb3V0ZSI6InRhc2tzLmluZGV4In0sInVybCI6W10sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1778650118);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Pending','Completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `description`, `status`, `due_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Complete Laravel Project', 'Build a task management application with authentication, CRUD operations, and file uploads.', 'Pending', '2026-05-13', '2026-05-12 08:56:16', '2026-05-12 08:56:16'),
(2, 1, 'Database Setup', 'Create tables and run migrations.', 'Pending', '2026-05-13', '2026-05-12 08:56:58', '2026-05-12 08:56:58'),
(3, 1, 'Auth complete', 'Auth complete', 'Pending', '2026-05-13', '2026-05-12 09:21:01', '2026-05-12 10:24:14'),
(4, 1, 'task3', 'task3', 'Pending', '2026-05-13', '2026-05-12 09:21:45', '2026-05-12 09:21:57'),
(5, 1, 'task4', 'task4', 'Pending', '2026-05-13', '2026-05-12 09:22:13', '2026-05-12 09:22:13'),
(6, 1, 'task5', 'task5', 'Pending', '2026-05-13', '2026-05-12 09:22:29', '2026-05-12 09:22:29'),
(7, 1, 'task6', 'task6', 'Pending', '2026-05-13', '2026-05-12 09:22:43', '2026-05-12 09:22:43'),
(8, 1, 'task7', 'task7', 'Pending', '2026-05-13', '2026-05-12 09:26:21', '2026-05-12 09:26:21'),
(9, 2, 'task1123', 'task123', 'Pending', '2026-05-13', '2026-05-12 10:55:22', '2026-05-12 11:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
CREATE TABLE IF NOT EXISTS `uploads` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uploads_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `user_id`, `file_name`, `file_path`, `file_type`, `created_at`, `updated_at`) VALUES
(1, 2, 'CodeIgniter Machine Test.pdf', 'uploads/1778604948_CodeIgniter Machine Test.pdf', 'application/pdf', '2026-05-12 11:25:48', '2026-05-12 11:25:48'),
(2, 2, 'Laravel Machine Test (Only Laravel).pdf', 'uploads/1778604948_Laravel Machine Test (Only Laravel).pdf', 'application/pdf', '2026-05-12 11:25:48', '2026-05-12 11:25:48'),
(3, 2, 'Laravel Machine Test (Only Laravel).pdf', 'uploads/1778605266_Laravel Machine Test (Only Laravel).pdf', 'application/pdf', '2026-05-12 11:31:06', '2026-05-12 11:31:06'),
(4, 1, 'CodeIgniter Machine Test.pdf', 'uploads/1778639185_CodeIgniter Machine Test.pdf', 'application/pdf', '2026-05-12 20:56:25', '2026-05-12 20:56:25'),
(5, 1, 'Laravel Machine Test (Only Laravel).pdf', 'uploads/1778639185_Laravel Machine Test (Only Laravel).pdf', 'application/pdf', '2026-05-12 20:56:25', '2026-05-12 20:56:25'),
(6, 1, 'CodeIgniter Machine Test.pdf', 'uploads/1778640088_CodeIgniter Machine Test.pdf', 'application/pdf', '2026-05-12 21:11:28', '2026-05-12 21:11:28'),
(7, 1, 'Laravel Machine Test (Only Laravel).pdf', 'uploads/1778640088_Laravel Machine Test (Only Laravel).pdf', 'application/pdf', '2026-05-12 21:11:28', '2026-05-12 21:11:28'),
(8, 1, 'Laravel Machine Test (Only Laravel).pdf', 'uploads/1778640687_Laravel Machine Test (Only Laravel).pdf', 'application/pdf', '2026-05-12 21:21:27', '2026-05-12 21:21:27'),
(9, 1, 'CodeIgniter Machine Test.pdf', 'uploads/1778641075_CodeIgniter Machine Test.pdf', 'application/pdf', '2026-05-12 21:27:55', '2026-05-12 21:27:55'),
(10, 1, 'CodeIgniter Machine Test.pdf', 'uploads/1778641075_CodeIgniter Machine Test.pdf', 'application/pdf', '2026-05-12 21:27:55', '2026-05-12 21:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@test.com', NULL, '$2y$12$xurNVEpbKdR.jCTTbjoVcebWYOeObe5qzlTUgX1sW27aPbjNKxXMm', NULL, '2026-05-12 08:45:15', '2026-05-12 08:45:15'),
(2, 'user2', 'user2@jghmagic.com', NULL, '$2y$12$Ut5W98wvkFk8NoPSzDAYmu4YS9K3RlMta6EGIoF4nTPQp3bQcJG8a', NULL, '2026-05-12 10:39:57', '2026-05-12 10:39:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
