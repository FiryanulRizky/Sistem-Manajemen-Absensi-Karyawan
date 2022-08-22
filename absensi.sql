-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 07:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `entry_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exit_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exit_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `entry_ip`, `entry_location`, `exit_ip`, `exit_location`, `registered`, `created_at`, `updated_at`, `time`) VALUES
(22, 4, '127.0.0.1', 'Ujung Hyang, Ujung, Bali, 80811, Indonesia', NULL, NULL, NULL, '2021-12-10 04:09:07', '2021-12-10 04:09:07', '23'),
(23, 3, '127.0.0.1', 'Ujung Hyang, Ujung, Bali, 80811, Indonesia', '127.0.0.1', 'Ujung Hyang, Ujung, Bali, 80811, Indonesia', 'yes', '2021-12-10 04:47:08', '2021-12-10 05:02:29', '12');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Backend Developer', '2021-12-09 03:49:38', '2021-12-09 03:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` datetime NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_date` datetime NOT NULL,
  `salary` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `first_name`, `last_name`, `dob`, `sex`, `desg`, `department_id`, `join_date`, `salary`, `created_at`, `updated_at`, `photo`) VALUES
(3, 9, 'Anul', 'Emp', '2000-12-09 00:00:00', 'Male', 'Manajer', '1', '2021-12-09 00:00:00', 220000.00, '2021-12-09 04:12:32', '2021-12-10 04:56:40', 'download_1639112200.png'),
(4, 10, 'Muhammad', 'Rizky', '2000-12-09 00:00:00', 'Male', 'Staff', '1', '2021-12-09 00:00:00', 200000.00, '2021-12-09 07:26:16', '2021-12-09 07:26:16', 'download.png');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `employee_id`, `reason`, `status`, `description`, `amount`, `receipt`, `created_at`, `updated_at`) VALUES
(1, 3, 'Isolasi Mandiri', 'approved', 'Isolasi Mandiri', 14.00, '13.20 Visualisasi - Pola Transaksi - seleksi item merah 2_1639033270.PNG', '2021-12-09 04:31:10', '2021-12-09 04:32:06'),
(2, 3, 'Cuti', 'pending', 'Cuti', 10.00, '13.26 Visualisasi - Persentase Line Riwayat Penghasilan_1639033446.PNG', '2021-12-09 04:34:06', '2021-12-09 04:34:06'),
(3, 3, 'bulan madu', 'pending', 'bulan madu', 14.00, '13.29 Visualisasi - Persentase Line Riwayat Penghasilan - Proses per bulan_1639033469.PNG', '2021-12-09 04:34:29', '2021-12-09 04:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `name`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Hari Raya Idul Adha', '2021-04-06 00:00:00', '2021-04-10 00:00:00', '2021-12-09 04:16:43', '2021-12-09 08:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `half_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employee_id`, `reason`, `description`, `half_day`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(23, 3, 'Sakit', 'asasas', 'no', '2021-12-11 00:00:00', '2022-01-13 00:00:00', 'pending', '2021-12-10 02:17:58', '2021-12-10 02:17:58'),
(24, 3, 'Sakit', 'Isolasi Mandiri', 'no', '2021-12-14 00:00:00', '2022-01-28 00:00:00', 'pending', '2021-12-10 02:18:10', '2021-12-10 03:36:40'),
(25, 3, 'Cuti', 'Bulan Madu', 'no', '2021-12-07 00:00:00', '2022-01-05 00:00:00', 'declined', '2021-12-10 02:18:38', '2021-12-10 03:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
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
(13, '2020_08_30_172041_add_photo_to_employees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-12-09 05:11:53', '2021-12-09 05:11:53'),
(2, 'employee', '2021-12-09 05:11:53', '2021-12-09 05:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-12-09 05:14:00', '2021-12-09 05:14:00'),
(2, 2, 3, NULL, NULL),
(4, 2, 8, NULL, NULL),
(5, 2, 9, NULL, NULL),
(6, 2, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Firyanul Rizky', 'firyan2903@gmail.com', NULL, '$2y$10$qb6E6a9bURf7LQNLXSHe5Oub0VRoQirzGsT7ty2TwwSL4.0LjDjpi', 'eLlLD3f4NqSywHlcpZ49bYAIqDpLNL3gEaIGgb6mcFmz8cFj1Jin2FDyhEF2', '2021-12-09 02:16:16', '2021-12-09 02:16:16'),
(3, 'Rizky Emp', 'anul@mail.com', NULL, '$2y$10$aI62xeoFxZQXVUAGzgziJOwD0ixVgjl4jhsvgkmwsm0.JWo4zJaku', 'fAgg5X2PiMa0rHCJljLeyi4XrgzLxB2Aif70oVsyHGFtGIIY8G62kWaM22cM', '2021-12-09 03:54:48', '2021-12-09 03:54:48'),
(8, 'Anul Emp', 'anul2@mail.com', NULL, '$2y$10$wN5O1WMlRdDwY/Xgqf1vC.YOxu9Cyz3AS1AFV..4fUTFeXkpkJbgq', NULL, '2021-12-09 04:12:02', '2021-12-09 04:12:02'),
(9, 'Anul Emp', 'anul29@mail.com', NULL, '$2y$10$m0gjjL9anL6IT.O2Es5yRuzmFxuGpWDvAXyxTtbOQGDuy9rIzcedW', 'qeLScd0NmaTXSQWcWVUV7Rp9EWASA48qLfNxh46gRSx5axgIcGNNAbOf10Nd', '2021-12-09 04:12:32', '2021-12-09 04:12:32'),
(10, 'Muhammad Rizky', 'firyanulrizky@outlook.com', NULL, '$2y$10$MQ0QU2vDjWlieXynE.Boq.3tHbawqmYsCBrCmfKPspTbr..hmVLay', 'v7pn696On5cdNPUSb33ZLBFqvASee2RPJ2QmfL2RnnsdJD6zom4wkliF54vE', '2021-12-09 07:26:16', '2021-12-09 07:26:16'),
(11, 'Udayana', 'udayana@mail.com', NULL, '$2y$10$jZ9zVJGRtH0ibYI3LPxVkedK8fsZNxXRp5V4OLkk6fdoaWl3VlOF.', NULL, '2021-12-09 23:26:18', '2021-12-09 23:26:18'),
(12, 'Shinta', 'shin@mail.com', NULL, '$2y$10$xR0ACjCi9RMncc.wiwg7GO8VC9CycS13AClLfJmih5ljggxpuSUBO', NULL, '2021-12-09 23:47:13', '2021-12-09 23:47:13'),
(13, 'test', 'test@mail.com', NULL, '$2y$10$aofq0ZvWSoDYiXJZKpBZDOZe0uXB0WkTlPpNBpwPycHNQ3LE/B9xi', NULL, '2021-12-09 23:58:03', '2021-12-09 23:58:03'),
(14, 'test2', 'test2@mail.com', NULL, '$2y$10$YcIRIDHkJ.U6x5UHgYYoteacnJvr6FnfJmgZA/IwaYPy6m3aO.Vn2', NULL, '2021-12-09 23:59:22', '2021-12-09 23:59:22'),
(15, 'test3', 'test3@mail.com', NULL, '$2y$10$mZqV9HWLavWS2CVcdHQjded..ZWQnyiRSJB.57VtZM2pfgmNaOnl6', NULL, '2021-12-10 00:00:11', '2021-12-10 00:00:11'),
(16, 'test4', 'test4@mail.com', NULL, '$2y$10$ONXsqIQFmIifgqv7gARzoOiHe4KhgPv8aMMp1ZiiOIsuxC/mPeUN6', NULL, '2021-12-10 00:04:39', '2021-12-10 00:04:39'),
(17, 'test5', 'test5@mail.com', NULL, '$2y$10$ub92c498yZ2gxOkKAxcqROGcDo2dX0rNk4kwUlXVvaSF9Qx0BjHUK', '7xLCs9d8Nd35cMYSx9YllfWlwBcZgJ6u900ObG2O1QHbw4a0BL4IGA1VVEwR', '2021-12-10 00:05:41', '2021-12-10 00:05:41'),
(18, 'test6', 'test6@mail.com', NULL, '$2y$10$MQB4e1Leoq.isVGpXFDJ.ehwNYLMHFitKHfWHl6QCm/L4nhEll87y', NULL, '2021-12-10 00:11:33', '2021-12-10 00:11:33'),
(19, 'test7', 'test7@mail.com', NULL, '$2y$10$h2rxb8dCDYa/UITbdYzLuOBpnhnU2Y5KzysBltrZ/hXs5MAr9zsiu', NULL, '2021-12-10 00:24:55', '2021-12-10 00:24:55'),
(20, 'firyanul', '$2y$10$gIXVXKpd7ztC1n2cHMsisulWybfLFqVE7HZ5zsjZw6yuSjuTIwGhq', NULL, '$2y$10$LCJAveTlBFIh/vBFWClrG.ur8YqkK3Z4YykLBbPJwXNimRom2KWWm', NULL, '2021-12-10 05:24:55', '2021-12-10 05:24:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD UNIQUE KEY `time` (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
