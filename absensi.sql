-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for absensi
CREATE DATABASE IF NOT EXISTS `absensi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `absensi`;

-- Dumping structure for table absensi.attendances
CREATE TABLE IF NOT EXISTS `attendances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint NOT NULL,
  `entry_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exit_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exit_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi.attendances: ~11 rows (approximately)
REPLACE INTO `attendances` (`id`, `employee_id`, `entry_ip`, `entry_location`, `exit_ip`, `exit_location`, `registered`, `time`, `created_at`, `updated_at`) VALUES
	(2, 4, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-18 03:00:23', '2021-08-18 10:00:23'),
	(3, 5, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-19 03:00:23', '2021-08-19 10:00:23'),
	(4, 6, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-20 03:00:23', '2021-08-20 10:00:23'),
	(5, 7, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-21 03:00:23', '2021-08-21 10:00:23'),
	(6, 8, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-22 03:00:23', '2021-08-22 10:00:23'),
	(7, 9, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-23 03:00:23', '2021-08-23 10:00:23'),
	(8, 10, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-24 03:00:23', '2021-08-24 10:00:23'),
	(9, 11, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-25 03:00:23', '2021-08-25 10:00:23'),
	(10, 7, '127.0.0.1', 'Gang Tebet Barat Raya, RW 01, Tebet Barat, Tebet, Jakarta Selatan, Daerah Khusus ibukota Jakarta, Jawa, 12860, Indonesia', '127.0.0.1', 'Gang Tebet Barat Raya, RW 01, Tebet Barat, Tebet, Jakarta Selatan, Daerah Khusus ibukota Jakarta, Jawa, 12860, Indonesia', 'yes', '12', '2024-10-19 05:08:16', '2024-10-19 06:14:20'),
	(11, 3, '127.0.0.1', 'Gang Tebet Barat Raya, RW 01, Tebet Barat, Tebet, Jakarta Selatan, Daerah Khusus ibukota Jakarta, Jawa, 12860, Indonesia', '127.0.0.1', 'Gang Tebet Barat Raya, RW 01, Tebet Barat, Tebet, Jakarta Selatan, Daerah Khusus ibukota Jakarta, Jawa, 12860, Indonesia', 'ya', '02', '2024-11-27 07:13:15', '2024-11-27 14:11:12'),
	(12, 3, '127.0.0.1', 'Geo Tag Expired', NULL, NULL, NULL, '03', '2025-03-16 08:44:30', '2025-03-16 08:44:30');

-- Dumping structure for table absensi.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `overtime_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overtime_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overtime_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi.departments: ~9 rows (approximately)
REPLACE INTO `departments` (`id`, `name`, `created_at`, `updated_at`, `overtime_cost`, `overtime_start`, `overtime_end`) VALUES
	(1, 'Manajemen', '2024-10-19 04:52:20', '2024-11-27 02:34:37', '10000', '17:00', '21:00'),
	(2, 'Perawat', '2024-10-19 04:52:20', '2024-11-27 11:53:52', '7000', '17:00', '21:00'),
	(3, 'Bidan', '2024-10-19 04:52:20', '2024-11-27 11:54:12', '6500', '17:00', '21:00'),
	(4, 'Dokter', '2024-10-19 04:52:20', '2024-11-27 11:54:38', '12000', '17:00', '21:00'),
	(5, 'Kasir', '2024-10-19 04:52:20', '2024-11-27 11:55:14', '6000', '17:00', '21:00'),
	(6, 'Farmasi', '2024-10-19 04:52:20', '2024-11-27 11:55:30', '9500', '17:00', '21:00'),
	(7, 'Front Office', '2024-10-19 04:52:20', '2024-11-27 11:56:37', '7000', '17:00', '21:00'),
	(8, 'Petugas Kebersihan', '2024-10-19 04:52:20', '2024-11-27 11:57:13', '5500', '17:00', '21:00'),
	(9, 'Backend Developer', '2024-10-19 04:52:20', '2024-11-27 02:36:09', '10000', '17:00', '21:00');

-- Dumping structure for table absensi.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` datetime NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_date` datetime NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi.employees: ~11 rows (approximately)
REPLACE INTO `employees` (`id`, `user_id`, `first_name`, `last_name`, `dob`, `sex`, `desg`, `department_id`, `join_date`, `salary`, `created_at`, `updated_at`, `photo`) VALUES
	(1, 1, 'Firyanul', 'Rizky', '1999-03-29 00:00:00', 'Male', 'Manager', '1', '2021-09-15 00:00:00', '6500000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'download.png'),
	(2, 2, 'Admin', '', '1999-03-29 00:00:00', 'Male', 'Manager', '1', '2021-09-15 00:00:00', '6500000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'admin.png'),
	(3, 3, 'Anul', 'Emp', '1999-03-29 00:00:00', 'Male', 'Staff', '9', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-11-27 12:01:23', '659e906e44ff639a60b904ec65b2fa6afc11ce0a_full_1732705283.jpg'),
	(4, 4, 'Manajemen', '', '1999-03-29 00:00:00', 'Male', 'Manager', '1', '2021-09-15 00:00:00', '6500000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'manajemen.png'),
	(5, 5, 'Perawat', '', '1999-03-29 00:00:00', 'Female', 'Staff', '2', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'perawat.png'),
	(6, 6, 'Bidan', '', '1999-03-29 00:00:00', 'Female', 'Staff', '3', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'bidan.png'),
	(7, 7, 'Dokter', '', '1999-03-29 00:00:00', 'Female', 'Staff', '4', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'dokter.png'),
	(8, 8, 'Kasir', '', '1999-03-29 00:00:00', 'Female', 'Staff', '5', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'kasir.png'),
	(9, 9, 'Farmasi', '', '1999-03-29 00:00:00', 'Female', 'Staff', '6', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'farmasi.png'),
	(10, 10, 'Front', 'Office', '1999-03-29 00:00:00', 'Male', 'Staff', '7', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'front_office.png'),
	(11, 11, 'Petugas', 'Kebersihan', '1999-03-29 00:00:00', 'Female', 'Staff', '8', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'petugas_kebersihan.png');

-- Dumping structure for table absensi.expenses
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi.expenses: ~2 rows (approximately)
REPLACE INTO `expenses` (`id`, `employee_id`, `reason`, `status`, `description`, `amount`, `receipt`, `created_at`, `updated_at`) VALUES
	(5, 3, 'Update ERP HRD', 'diterima', 'Memaksimalkan update menu terbaru dari sistem manajemen absensi', 40000.00, 'Screenshot 2024-11-27 180323_1732705491.png', '2024-11-27 12:04:51', '2024-11-27 12:37:58');

-- Dumping structure for table absensi.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table absensi.general_settings
CREATE TABLE IF NOT EXISTS `general_settings` (
  `id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table absensi.general_settings: ~0 rows (approximately)

-- Dumping structure for table absensi.holidays
CREATE TABLE IF NOT EXISTS `holidays` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi.holidays: ~0 rows (approximately)
REPLACE INTO `holidays` (`id`, `name`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
	(1, '1', '2024-11-29 00:00:00', '2024-11-30 00:00:00', '2024-11-26 18:02:15', '2024-11-26 18:02:15');

-- Dumping structure for table absensi.leaves
CREATE TABLE IF NOT EXISTS `leaves` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `half_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi.leaves: ~7 rows (approximately)
REPLACE INTO `leaves` (`id`, `employee_id`, `reason`, `description`, `half_day`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
	(2, 3, 'Sakit', 'Nikahan', 'tidak', '2024-11-11 00:00:00', '2024-11-13 00:00:00', 'pending', '2024-11-09 19:17:52', '2024-11-09 19:17:52'),
	(3, 3, 'Sakit', 's', 'tidak', '2024-11-17 00:00:00', '2024-11-21 00:00:00', 'pending', '2024-11-17 13:43:10', '2024-11-17 13:43:10'),
	(4, 3, 'Sakit', 'd', 'tidak', '2024-11-17 00:00:00', '2024-11-22 00:00:00', 'pending', '2024-11-17 13:43:32', '2024-11-17 13:43:32'),
	(5, 3, 'Sakit', 'd', 'tidak', '2024-11-17 00:00:00', '2024-11-19 00:00:00', 'pending', '2024-11-17 13:43:51', '2024-11-17 13:43:51'),
	(6, 3, 'Sakit', 'f', 'tidak', '2024-11-17 00:00:00', '2024-11-18 00:00:00', 'pending', '2024-11-17 13:44:06', '2024-11-17 13:44:06'),
	(7, 3, 'Cuti', '1', 'tidak', '2024-12-07 00:00:00', '2025-01-05 00:00:00', 'pending', '2024-11-26 17:32:29', '2024-11-26 17:32:29'),
	(8, 3, 'Cuti', '2', 'tidak', '2024-12-23 00:00:00', '2024-12-31 00:00:00', 'pending', '2024-11-26 17:33:07', '2024-11-26 17:33:07');

-- Dumping structure for table absensi.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi.migrations: ~0 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2020_08_25_125219_create_roles_table', 1),
	(6, '2020_08_25_125921_create_role_user_table', 1),
	(7, '2020_08_25_202641_create_employees_table', 1),
	(8, '2020_08_26_074103_create_attendances_table', 1),
	(9, '2020_08_26_123244_create_departments_table', 1),
	(10, '2020_08_27_204750_create_leaves_table', 1),
	(11, '2020_08_29_112051_create_holidays_table', 1),
	(12, '2020_08_29_145328_create_expenses_table', 1),
	(13, '2020_08_30_172041_add_photo_to_employees_table', 1),
	(14, '2024_11_27_172042_add_overtime_to_departments_table', 2);

-- Dumping structure for table absensi.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi.password_resets: ~0 rows (approximately)

-- Dumping structure for table absensi.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table absensi.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi.roles: ~2 rows (approximately)
REPLACE INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2024-10-19 04:52:20', '2024-10-19 04:52:20'),
	(2, 'employee', '2024-10-19 04:52:20', '2024-10-19 04:52:20');

-- Dumping structure for table absensi.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi.role_user: ~11 rows (approximately)
REPLACE INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, NULL),
	(2, 1, 2, NULL, NULL),
	(3, 2, 3, NULL, NULL),
	(4, 2, 4, NULL, NULL),
	(5, 2, 5, NULL, NULL),
	(6, 2, 6, NULL, NULL),
	(7, 2, 7, NULL, NULL),
	(8, 2, 8, NULL, NULL),
	(9, 2, 9, NULL, NULL),
	(10, 2, 10, NULL, NULL),
	(11, 2, 11, NULL, NULL);

-- Dumping structure for table absensi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi.users: ~11 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Firyanul Rizky', 'firyan2903@gmail.com', NULL, '$2y$10$vz9K6Wt9rvMSAn/mu/5laO4OI9saZUkdT./mhCvd.FsCDOum5SUMG', '2p4obUwndX26B40L2zeh78DySyTkYidi1veVlmYlufDJFJ0uzCexzHfUAdw8', '2024-10-19 04:52:20', '2024-10-19 04:52:20'),
	(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$qM1moJOauYns00CjeWbpDusdAhomP.MpR58/jwPIU3TrfoQPU8j6e', 'vOFXEykIHYcVx4zuQRdkjQm7pZ32PoqVxATpzXPAv0Wh7rM2EKlhyeasvdPw', '2024-10-19 04:52:20', '2024-10-19 04:52:20'),
	(3, 'Anul Emp', 'anul29@mail.com', NULL, '$2y$10$waxAKQ2We.cG/rX5dly3yOC/.lRhimYcruxw3R.hT.lSDj4kSGt5.', 'mk0szZ2XenmFwngf050dBOCCFC8ZkgxTR3ldXlwFfH4QogFpYogqINjnAqjT', '2024-10-19 04:52:20', '2024-10-19 04:52:20'),
	(4, 'Manajemen', 'manajemen@gmail.com', NULL, '$2y$10$dsWRYDda6sFuPDnVZUFmZORlLOHlYyZdzZgvSnYJ3KgNOdWt1gJD.', NULL, '2024-10-19 04:52:20', '2024-10-19 04:52:20'),
	(5, 'Perawat', 'perawat@gmail.com', NULL, '$2y$10$/AiusYC73eCYb5NV1tPh/.WNdk678UwRQchLETsIfiwYnjALaV7ne', NULL, '2024-10-19 04:52:20', '2024-10-19 04:52:20'),
	(6, 'Bidan', 'bidan@gmail.com', NULL, '$2y$10$NW0tM9bwlsVpVQZedh5J3eVTC50tt//rhJOnZe.h.SVKM/VolWRhi', NULL, '2024-10-19 04:52:20', '2024-10-19 04:52:20'),
	(7, 'Dokter', 'dokter@gmail.com', NULL, '$2y$10$xvwPS3rMIjZdUB6y7n9zQOeJ/e9OkZB.6XvZ0XfH1v/VIQ2y3yciS', NULL, '2024-10-19 04:52:20', '2024-10-19 04:52:20'),
	(8, 'Kasir', 'kasir@gmail.com', NULL, '$2y$10$FVOQQyz38QkPhOIgqsqW9OQOB1dIdUmwfKUGRjTthWj1.n459wNQ.', NULL, '2024-10-19 04:52:20', '2024-10-19 04:52:20'),
	(9, 'Farmasi', 'farmasi@gmail.com', NULL, '$2y$10$xv1y74NMtcWEw/CTDrPcYOLRKhMXQ4EgbYNSvHIf4rUti8SY0PYEK', NULL, '2024-10-19 04:52:20', '2024-10-19 04:52:20'),
	(10, 'Front Office', 'front_office@gmail.com', NULL, '$2y$10$3W2igTv2dhc8ZETzpLDXK.u5wc2okrqXEEyx5avqjDTpxz0wjZfzO', NULL, '2024-10-19 04:52:20', '2024-10-19 04:52:20'),
	(11, 'Petugas Kebersihan', 'petugas_kebersihan@gmail.com', NULL, '$2y$10$H8WsbAcmOnMtiXCJcA7EB.X/3L30r4B55iC.9Hjl8SUVRVWdRLAkG', NULL, '2024-10-19 04:52:20', '2024-10-19 04:52:20');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
