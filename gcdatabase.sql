-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 10:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gcdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gctypes`
--

CREATE TABLE `gctypes` (
  `uuid` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `gctype` varchar(10) NOT NULL,
  `gcdesc` varchar(100) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usercreated` varchar(50) DEFAULT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gctypes`
--

INSERT INTO `gctypes` (`uuid`, `id`, `gctype`, `gcdesc`, `datecreated`, `usercreated`, `code`) VALUES
('6aef8fc4-8bf3-11ed-931a-00ff7e6f71a7', 47, 'FREEGIFT', 'Test', '2023-01-04 05:48:30', NULL, 'FREEGIFT'),
('a7aafc84-985c-11ed-a139-00ff7e6f71a7', 50, 'test', 'wadad', '2023-01-20 00:52:03', NULL, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `gcvoucher`
--

CREATE TABLE `gcvoucher` (
  `id` int(11) NOT NULL,
  `uuid` varchar(70) NOT NULL,
  `expdatae` datetime NOT NULL,
  `gendate` datetime NOT NULL,
  `dateuse` datetime DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gcvoucher`
--

INSERT INTO `gcvoucher` (`id`, `uuid`, `expdatae`, `gendate`, `dateuse`, `amount`, `catid`) VALUES
(1, 'da0869a9-985d-11ed-a139-00ff7e6f71a7', '2023-01-12 08:58:00', '2023-01-20 09:00:37', NULL, 231, 47),
(2, '4dd0337d-985f-11ed-a139-00ff7e6f71a7', '2023-01-20 09:10:00', '2023-01-20 09:11:01', NULL, 12, 50),
(3, '4dd09a12-985f-11ed-a139-00ff7e6f71a7', '2023-01-20 09:10:00', '2023-01-20 09:11:01', NULL, 12, 50),
(4, '4dd0f360-985f-11ed-a139-00ff7e6f71a7', '2023-01-20 09:10:00', '2023-01-20 09:11:01', NULL, 12, 50),
(5, '4dd15be8-985f-11ed-a139-00ff7e6f71a7', '2023-01-20 09:10:00', '2023-01-20 09:11:01', NULL, 12, 50),
(6, '4dd1a58f-985f-11ed-a139-00ff7e6f71a7', '2023-01-20 09:10:00', '2023-01-20 09:11:01', NULL, 12, 50),
(7, '4dd1e609-985f-11ed-a139-00ff7e6f71a7', '2023-01-20 09:10:00', '2023-01-20 09:11:01', NULL, 12, 50),
(8, '4dd22850-985f-11ed-a139-00ff7e6f71a7', '2023-01-20 09:10:00', '2023-01-20 09:11:01', NULL, 12, 50),
(9, '4dd2800e-985f-11ed-a139-00ff7e6f71a7', '2023-01-20 09:10:00', '2023-01-20 09:11:01', NULL, 12, 50),
(10, '4dd2d05a-985f-11ed-a139-00ff7e6f71a7', '2023-01-20 09:10:00', '2023-01-20 09:11:01', NULL, 12, 50),
(11, '4dd31855-985f-11ed-a139-00ff7e6f71a7', '2023-01-20 09:10:00', '2023-01-20 09:11:01', NULL, 12, 50),
(12, '4dd3643a-985f-11ed-a139-00ff7e6f71a7', '2023-01-20 09:10:00', '2023-01-20 09:11:01', NULL, 12, 50),
(13, '4dd3a81b-985f-11ed-a139-00ff7e6f71a7', '2023-01-20 09:10:00', '2023-01-20 09:11:01', NULL, 12, 50),
(14, 'a9fae76e-985f-11ed-a139-00ff7e6f71a7', '2023-01-20 09:10:00', '2023-01-20 09:13:35', NULL, 12, 50),
(15, '6cca7837-9860-11ed-a139-00ff7e6f71a7', '2023-01-11 09:17:00', '2023-01-20 09:19:02', NULL, 312, 47),
(16, '877357d1-9860-11ed-a139-00ff7e6f71a7', '2023-01-11 09:17:00', '2023-01-20 09:19:47', NULL, 312, 47),
(17, '9264b213-9860-11ed-a139-00ff7e6f71a7', '2023-01-19 09:20:00', '2023-01-20 09:20:05', NULL, 1, 47),
(18, 'dd8d4c4e-9860-11ed-a139-00ff7e6f71a7', '2023-01-06 09:22:00', '2023-01-20 09:22:11', NULL, 1, 47),
(19, '266b6c19-9861-11ed-a139-00ff7e6f71a7', '2023-01-20 11:24:00', '2023-01-20 09:24:14', NULL, 1, 47),
(20, 'e29e82bd-9861-11ed-a139-00ff7e6f71a7', '2023-01-20 09:28:00', '2023-01-20 09:29:29', NULL, 1, 47),
(21, '4229c206-9864-11ed-a139-00ff7e6f71a7', '2023-01-22 09:46:00', '2023-01-20 09:46:29', NULL, 1, 47);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gctypes`
--
ALTER TABLE `gctypes`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `gcvoucher`
--
ALTER TABLE `gcvoucher`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gctypes`
--
ALTER TABLE `gctypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `gcvoucher`
--
ALTER TABLE `gcvoucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
