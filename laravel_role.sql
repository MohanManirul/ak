-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2021 at 11:37 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_role`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'fiforeg@gmail.com', 'superadmin', NULL, '$2y$10$XTW6Ipf53MXnJzqiaGzwBe/HHFk7OrziYXbATOqB2dIuJf4AmGdA6', NULL, '2020-10-08 11:14:41', '2020-10-10 03:53:09'),
(2, 'sobuj', 'sobuj@gmail.com', 'abc', NULL, '$2y$10$Q6VoO6cxBQgLAVW0zXZ4EOPYdEwN0tdf4EeqFqtGiV2MGhUl6L7AK', NULL, '2020-10-10 03:22:05', '2020-10-10 04:08:08'),
(4, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$JvlMVBcJTAESx2PJY2pBHunLuOGGA6I6C1YKeiAyBXou3yANVp3Zq', NULL, '2020-10-10 05:04:09', '2020-10-10 05:04:09'),
(5, 'Ariful Islam', 'ariful@gmail.com', 'Ariful', NULL, '$2y$10$ONr/mqt7vHIuKqzd/QKMqO9awX1nEPwoUTdXVZR7vnwzSEUlV5BCK', NULL, '2020-10-24 02:37:49', '2020-10-24 02:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `assaign_subjects`
--

CREATE TABLE `assaign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` double NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT '0=Inactive|1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assaign_subjects`
--

INSERT INTO `assaign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `status`, `created_at`, `updated_at`) VALUES
(27, '3', 2, 100, 33, 100, 1, '2020-10-23 02:02:36', '2020-10-23 02:02:36'),
(28, '3', 3, 100, 33, 100, 1, '2020-10-23 02:02:36', '2020-10-23 02:02:36'),
(29, '3', 4, 100, 33, 100, 1, '2020-10-23 02:02:36', '2020-10-23 02:02:36'),
(30, '3', 5, 100, 33, 100, 1, '2020-10-23 02:02:36', '2020-10-23 02:02:36'),
(31, '3', 2, 100, 33, 100, 1, '2020-10-23 02:02:36', '2020-10-23 02:02:36'),
(32, '3', 7, 100, 33, 100, 1, '2020-10-23 02:02:36', '2020-10-23 02:02:36'),
(45, '2', 2, 100, 33, 100, 1, '2020-10-23 04:21:37', '2020-10-23 04:21:37'),
(46, '2', 3, 100, 33, 100, 1, '2020-10-23 04:21:38', '2020-10-23 04:21:38'),
(47, '2', 4, 100, 33, 100, 1, '2020-10-23 04:21:38', '2020-10-23 04:21:38'),
(48, '2', 6, 200, 33, 100, 1, '2020-10-23 04:21:38', '2020-10-23 04:21:38'),
(65, '5', 2, 100, 33, 100, 1, '2020-10-23 04:53:30', '2020-10-23 04:53:30'),
(66, '5', 3, 100, 33, 100, 1, '2020-10-23 04:53:30', '2020-10-23 04:53:30'),
(67, '5', 4, 100, 33, 100, 1, '2020-10-23 04:53:30', '2020-10-23 04:53:30'),
(68, '5', 5, 100, 33, 100, 1, '2020-10-23 04:53:30', '2020-10-23 04:53:30'),
(72, '1', 2, 100, 33, 100, 1, '2020-10-23 05:10:07', '2020-10-23 05:10:07'),
(73, '1', 3, 100, 33, 100, 1, '2020-10-23 05:10:07', '2020-10-23 05:10:07'),
(74, '1', 4, 100, 33, 100, 1, '2020-10-23 05:10:07', '2020-10-23 05:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `session_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(12, 16, 1, 1, 6, 1, 1, '2020-10-24 15:48:44', '2020-11-02 14:31:53'),
(13, 17, 1, 4, 6, 2, 2, '2020-10-24 15:49:46', '2020-11-02 14:31:09'),
(14, 18, NULL, 2, 6, 1, 1, '2020-10-24 15:56:52', '2020-10-24 15:56:52'),
(15, 19, NULL, 3, 6, 2, 1, '2020-10-24 15:58:45', '2020-10-24 15:58:45'),
(16, 20, 2, 4, 6, 1, 1, '2020-10-24 16:01:45', '2020-11-02 14:31:09'),
(17, 21, 2, 1, 6, 2, 1, '2020-10-24 16:04:19', '2020-11-02 14:31:53'),
(18, 22, NULL, 2, 6, 2, 1, '2020-10-24 16:06:57', '2020-10-24 16:06:57'),
(19, 23, NULL, 2, 6, 1, 1, '2020-10-24 16:08:41', '2020-10-24 16:08:41'),
(20, 24, NULL, 2, 6, 1, 1, '2020-10-24 16:10:51', '2020-10-24 16:10:51'),
(21, 25, 4, 1, 6, 1, 1, '2020-10-24 16:13:37', '2020-11-02 14:31:53'),
(22, 26, 5, 1, 6, 1, 1, '2020-10-25 08:33:08', '2020-11-02 14:31:53'),
(23, 27, NULL, 2, 6, 1, 1, '2020-10-25 08:49:49', '2020-10-25 08:49:49'),
(24, 28, 10, 1, 11, NULL, 2, '2020-10-25 11:08:31', '2020-11-02 14:30:39'),
(25, 29, 2, 1, 11, NULL, 1, '2020-10-25 11:09:40', '2020-11-02 14:30:39'),
(28, 26, 33, 1, 11, 1, 1, '2020-10-28 11:03:34', '2020-11-02 14:30:39'),
(29, 26, 5, 1, 6, 1, 1, '2020-10-28 11:07:01', '2020-11-02 14:31:53'),
(30, 26, 33, 1, 11, 1, 1, '2020-10-28 11:09:47', '2020-11-02 14:30:39'),
(31, 26, NULL, 2, 6, 1, 1, '2020-10-28 11:10:12', '2020-10-28 11:10:12'),
(32, 26, 1, 2, 11, 1, 1, '2020-10-28 11:11:04', '2020-11-02 14:29:23'),
(33, 32, 2, 2, 11, NULL, NULL, '2020-11-02 04:32:46', '2020-11-02 14:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1=Active|0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Head Teacher', 1, '2020-10-23 07:01:30', '2020-10-23 07:01:30'),
(2, 'Assistant Teacher (Math)', 1, '2020-10-23 07:01:53', '2020-10-23 07:01:53'),
(3, 'Assistant Teacher (ICT)', 1, '2020-10-23 07:02:09', '2020-10-23 07:02:09'),
(4, 'Assistant Teacher (Science)', 1, '2020-10-23 07:02:24', '2020-10-23 07:02:24'),
(5, 'Assistant Teacher (Bangla)', 1, '2020-10-23 07:02:41', '2020-10-23 07:02:41'),
(6, 'Assistant Teacher (English)', 1, '2020-10-23 07:03:08', '2020-10-23 07:03:08'),
(7, 'Assistant Teacher (B.G.S)', 1, '2020-10-23 07:03:29', '2020-10-23 07:03:29'),
(8, 'Clerck', 1, '2020-10-23 07:03:45', '2020-10-23 07:03:59'),
(9, 'MLSS', 1, '2020-10-23 07:04:21', '2020-10-23 07:04:21'),
(10, 'Assistant Teacher (Islam)', 1, '2020-10-23 07:08:23', '2020-10-23 07:08:23'),
(11, 'Assistant Teacher (Hindu)', 1, '2020-10-23 07:08:39', '2020-10-23 07:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(11, 12, NULL, 50, '2020-10-24 15:48:44', '2020-10-24 15:48:44'),
(12, 13, NULL, 50, '2020-10-24 15:49:46', '2020-10-24 15:49:46'),
(13, 14, NULL, 50, '2020-10-24 15:56:52', '2020-10-24 15:56:52'),
(14, 15, NULL, 50, '2020-10-24 15:58:45', '2020-10-24 15:58:45'),
(15, 16, NULL, 50, '2020-10-24 16:01:45', '2020-10-24 16:01:45'),
(16, 17, NULL, 50, '2020-10-24 16:04:19', '2020-10-24 16:04:19'),
(17, 18, NULL, 50, '2020-10-24 16:06:57', '2020-10-24 16:06:57'),
(18, 19, NULL, 50, '2020-10-24 16:08:41', '2020-10-24 16:08:41'),
(19, 20, NULL, 50, '2020-10-24 16:10:51', '2020-10-24 16:10:51'),
(20, 21, NULL, 50, '2020-10-24 16:13:37', '2020-10-24 16:13:37'),
(21, 22, NULL, 50, '2020-10-25 08:33:08', '2020-10-25 08:33:08'),
(22, 23, NULL, 50, '2020-10-25 08:49:49', '2020-10-25 08:49:49'),
(23, 24, 1, 30, '2020-10-25 11:08:31', '2020-10-28 01:12:42'),
(24, 25, 1, 50, '2020-10-25 11:09:40', '2020-10-25 11:09:40'),
(25, 26, 1, 30, '2020-10-28 08:29:42', '2020-10-28 10:04:53'),
(26, 27, 1, 50, '2020-10-28 09:55:11', '2020-10-28 09:55:11'),
(27, 28, 1, 0, '2020-10-28 11:03:34', '2020-10-28 11:03:34'),
(28, 29, 1, 10, '2020-10-28 11:07:01', '2020-10-28 11:07:01'),
(29, 30, 1, 50, '2020-10-28 11:09:47', '2020-10-28 11:09:47'),
(30, 31, 1, 50, '2020-10-28 11:10:12', '2020-10-28 11:10:12'),
(31, 32, 1, 50, '2020-10-28 11:11:04', '2020-10-28 11:11:04'),
(32, 33, 1, NULL, '2020-11-02 04:32:46', '2020-11-02 04:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = user_id',
  `leave_purpose_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_purpose_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 33, 0, '2020-11-29', '2020-11-30', '2020-11-29 10:43:10', '2020-11-29 10:43:10'),
(2, 33, 0, '2020-11-29', '2020-11-30', '2020-11-29 10:53:59', '2020-11-29 10:53:59'),
(3, 34, 11, '2020-11-29', '2020-11-30', '2020-11-29 11:15:44', '2020-11-29 11:15:44'),
(4, 33, 12, '2020-11-29', '2020-11-30', '2020-11-29 11:16:09', '2020-11-29 11:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_logs`
--

CREATE TABLE `employee_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL COMMENT 'employee_id==User_id',
  `previous_salary` int(11) DEFAULT NULL,
  `present_salary` int(11) DEFAULT NULL,
  `increment_salary` int(11) DEFAULT NULL,
  `effected_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_logs`
--

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_date`, `created_at`, `updated_at`) VALUES
(1, 33, 3000, 3000, 0, '2020-11-16', '2020-11-15 12:34:29', '2020-11-15 12:34:29'),
(2, 34, 5000, 5000, 0, '2020-11-16', '2020-11-15 12:44:46', '2020-11-15 12:44:46'),
(3, 35, 5000, 5000, 0, '2020-11-12', '2020-11-20 09:30:36', '2020-11-20 09:30:36'),
(4, 36, NULL, NULL, 0, '1970-01-01', '2020-11-20 11:24:26', '2020-11-20 11:24:26'),
(5, 37, NULL, NULL, 0, '1970-01-01', '2020-11-20 11:27:04', '2020-11-20 11:27:04'),
(6, 38, NULL, NULL, 0, '1970-01-01', '2020-11-20 11:28:05', '2020-11-20 11:28:05'),
(7, 33, 3000, 3000, NULL, '2020-12-01', '2020-11-20 12:09:34', '2020-11-20 12:09:34'),
(8, 33, 3000, 3000, NULL, '2020-12-01', '2020-11-20 12:10:16', '2020-11-20 12:10:16'),
(9, 33, 3000, 3000, NULL, '2020-12-03', '2020-11-20 12:11:14', '2020-11-20 12:11:14'),
(10, 33, 3000, 8800, 5800, '2021-02-01', '2020-11-20 12:13:51', '2020-11-20 12:13:51'),
(11, 33, 8800, 9000, 200, '2021-02-01', '2020-11-20 12:14:20', '2020-11-20 12:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT '0=Inactive|1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '1st Terminal', 1, '2020-10-21 08:46:41', '2020-10-21 08:46:41'),
(2, '2nd Terminal', 1, '2020-10-21 08:52:56', '2020-10-21 08:52:56'),
(4, 'Final Examination', 1, '2020-10-21 08:55:46', '2020-10-21 08:55:46');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT '0=Inactive|1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Exam Fee', 1, '2020-10-18 11:09:38', '2020-10-18 11:10:26'),
(2, 'Monthly Fee', 1, '2020-10-18 11:10:17', '2020-10-18 11:10:17'),
(3, 'Registration Fee', 1, '2020-10-19 03:53:11', '2020-10-19 03:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT '0=Inactive|1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 200, 1, '2020-10-19 04:40:24', '2020-10-19 04:40:24'),
(2, 3, 2, 300, 1, '2020-10-19 04:40:24', '2020-10-19 04:40:24'),
(3, 3, 3, 400, 1, '2020-10-19 04:40:24', '2020-10-19 04:40:24'),
(4, 3, 4, 500, 1, '2020-10-19 04:40:24', '2020-10-19 04:40:24'),
(5, 3, 5, 600, 1, '2020-10-19 04:40:24', '2020-10-19 04:40:24'),
(19, 3, 2, 20, 1, '2020-10-19 10:57:32', '2020-10-19 10:57:32'),
(34, 2, 1, 30, 1, '2020-11-13 09:58:37', '2020-11-13 09:58:37'),
(35, 2, 2, 32, 1, '2020-11-13 09:58:37', '2020-11-13 09:58:37'),
(36, 2, 3, 400, 1, '2020-11-13 09:58:37', '2020-11-13 09:58:37'),
(37, 2, 4, 500, 1, '2020-11-13 09:58:37', '2020-11-13 09:58:37'),
(38, 2, 5, 600, 1, '2020-11-13 09:58:37', '2020-11-13 09:58:37'),
(39, 2, 6, 700, 1, '2020-11-13 09:58:37', '2020-11-13 09:58:37'),
(40, 1, 1, 15, 1, '2020-11-13 10:37:48', '2020-11-13 10:37:48'),
(41, 1, 2, 20, 1, '2020-11-13 10:37:48', '2020-11-13 10:37:48'),
(42, 1, 3, 30, 1, '2020-11-13 10:37:48', '2020-11-13 10:37:48'),
(43, 1, 4, 40, 1, '2020-11-13 10:37:48', '2020-11-13 10:37:48'),
(44, 1, 5, 50, 1, '2020-11-13 10:37:48', '2020-11-13 10:37:48'),
(45, 1, 6, 60, 1, '2020-11-13 10:37:49', '2020-11-13 10:37:49'),
(46, 1, 7, 70, 1, '2020-11-13 10:37:49', '2020-11-13 10:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `leave_purposes`
--

CREATE TABLE `leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(11, 'Sick', '2020-11-29 10:43:10', '2020-11-29 10:43:10'),
(12, 'Family Problem', '2020-11-29 10:53:59', '2020-11-29 10:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2020_09_20_101516_create_permission_tables', 1),
(14, '2020_10_08_171154_create_admins_table', 2),
(16, '2020_10_15_190037_create_student_classes_table', 3),
(17, '2020_10_18_080134_create_student_sessions_table', 4),
(18, '2020_10_18_134117_create_student_sections_table', 5),
(20, '2020_10_18_140300_create_student_groups_table', 6),
(25, '2020_10_18_143657_create_student_shifts_table', 7),
(26, '2020_10_18_164449_create_fee_categories_table', 7),
(27, '2020_10_18_164524_create_fee_category_amounts_table', 7),
(29, '2020_10_21_142313_create_exam_types_table', 8),
(30, '2020_10_21_160401_create_subjects_table', 9),
(31, '2020_10_22_165127_create_assaign_subjects_table', 10),
(32, '2020_10_23_125043_create_designations_table', 11),
(34, '2014_10_12_000000_create_users_table', 12),
(36, '2020_10_24_144300_create_discount_students_table', 13),
(37, '2020_10_24_143826_create_assign_students_table', 14),
(38, '2020_11_15_161849_create_employee_salary_logs_table', 15),
(39, '2020_11_29_100502_create_leave_purposes_table', 16),
(40, '2020_11_29_100558_create_employee_leaves_table', 16),
(41, '2021_02_01_172832_create_rahim_stores_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 2),
(1, 'App\\User', 2),
(1, 'App\\User', 3),
(1, 'App\\Models\\Admin', 4),
(2, 'App\\Models\\Admin', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(14, 'App\\Models\\Admin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'admin', 'dashboard', '2020-10-03 04:28:54', '2020-10-03 04:28:54'),
(2, 'dashboard.edit', 'admin', 'dashboard', '2020-10-03 04:28:54', '2020-10-03 04:28:54'),
(3, 'blog.create', 'admin', 'blog', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(4, 'blog.view', 'admin', 'blog', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(5, 'blog.edit', 'admin', 'blog', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(6, 'blog.delete', 'admin', 'blog', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(7, 'blog.approve', 'admin', 'blog', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(8, 'admin.create', 'admin', 'admin', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(9, 'admin.view', 'admin', 'admin', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(10, 'admin.edit', 'admin', 'admin', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(11, 'admin.delete', 'admin', 'admin', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(12, 'admin.approve', 'admin', 'admin', '2020-10-03 04:28:55', '2020-10-03 04:28:55'),
(13, 'role.create', 'admin', 'role', '2020-10-03 04:28:56', '2020-10-03 04:28:56'),
(14, 'role.view', 'admin', 'role', '2020-10-03 04:28:56', '2020-10-03 04:28:56'),
(15, 'role.edit', 'admin', 'role', '2020-10-03 04:28:56', '2020-10-03 04:28:56'),
(16, 'role.delete', 'admin', 'role', '2020-10-03 04:28:56', '2020-10-03 04:28:56'),
(17, 'role.approve', 'admin', 'role', '2020-10-03 04:28:56', '2020-10-03 04:28:56'),
(18, 'profile.view', 'admin', 'profile', '2020-10-03 04:28:56', '2020-10-03 04:28:56'),
(19, 'profile.edit', 'admin', 'profile', '2020-10-03 04:28:56', '2020-10-03 04:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `rahim_stores`
--

CREATE TABLE `rahim_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `expire_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rahim_stores`
--

INSERT INTO `rahim_stores` (`id`, `name`, `price`, `expire_date`, `created_at`, `updated_at`) VALUES
(2, 'Lux Soap7', 60, '2021-02-18', '2021-02-01 13:09:07', '2021-02-02 01:44:40'),
(3, 'Mangoo', 555, '2021-01-27', '2021-02-01 13:09:38', '2021-02-02 01:46:06'),
(5, 'dsdsfdfd', 30, '2021-02-26', '2021-02-02 00:35:30', '2021-02-02 01:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2020-10-03 04:28:54', '2020-10-03 04:28:54'),
(2, 'Super Admin', 'admin', '2020-10-03 04:28:54', '2020-10-04 10:01:58'),
(13, 'Client', 'admin', '2020-10-10 03:57:00', '2020-10-10 03:57:00'),
(14, 'Student', 'admin', '2020-10-24 02:36:06', '2020-10-24 02:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 13),
(2, 2),
(2, 13),
(3, 1),
(3, 2),
(3, 13),
(4, 1),
(4, 2),
(4, 13),
(5, 1),
(5, 2),
(5, 13),
(6, 1),
(6, 2),
(6, 13),
(7, 1),
(7, 2),
(7, 13),
(8, 2),
(9, 1),
(9, 2),
(9, 13),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 1),
(14, 2),
(14, 13),
(15, 2),
(16, 2),
(17, 2),
(18, 1),
(18, 2),
(18, 13),
(18, 14),
(19, 1),
(19, 2),
(19, 13),
(19, 14);

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Two', '2020-10-16 04:31:05', '2020-10-16 04:31:05'),
(3, 'Three', '2020-10-16 04:31:22', '2020-10-16 04:31:22'),
(4, 'Four', '2020-10-16 04:31:29', '2020-10-16 04:31:29'),
(5, 'Five', '2020-10-16 04:31:36', '2020-10-16 04:31:36'),
(6, 'Six', '2020-10-16 04:31:42', '2020-10-16 04:31:42'),
(7, 'Seven', '2020-10-16 04:31:50', '2020-10-16 04:31:50'),
(63, 'Twelve', '2020-10-18 03:44:56', '2020-10-18 03:44:56'),
(64, 'dfd', '2020-10-18 07:53:51', '2020-10-18 07:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Science', '2020-10-18 08:10:00', '2020-10-18 08:11:20'),
(2, 'Humanities', '2020-10-18 08:10:17', '2020-10-18 08:10:17'),
(4, 'Commerce', '2020-10-18 08:12:02', '2020-10-18 08:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `student_sections`
--

CREATE TABLE `student_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_sections`
--

INSERT INTO `student_sections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A', '2020-10-18 07:51:11', '2020-10-18 07:54:52'),
(2, 'B', '2020-10-18 07:52:31', '2020-10-18 07:52:31'),
(3, 'C', '2020-10-18 07:54:13', '2020-10-18 07:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `student_sessions`
--

CREATE TABLE `student_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_sessions`
--

INSERT INTO `student_sessions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, '2020', '2020-10-18 03:50:02', '2020-10-24 12:49:03'),
(9, '2021', '2020-10-18 03:54:33', '2020-10-24 12:49:30'),
(10, '2022', '2020-10-18 07:53:33', '2020-10-24 12:50:28'),
(11, '2023', '2020-10-18 08:21:59', '2020-10-24 12:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT '0=Inactive|1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Evening', 1, '2020-10-18 11:04:32', '2020-10-18 11:05:32'),
(2, 'Morning', 1, '2020-10-18 11:05:44', '2020-10-18 11:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT '0=Inactive|1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'English', 1, '2020-10-21 10:17:21', '2020-10-21 10:17:21'),
(3, 'Mathematics', 1, '2020-10-21 10:17:38', '2020-10-21 10:17:38'),
(4, 'Islamic Studies', 1, '2020-10-21 10:17:55', '2020-10-21 10:17:55'),
(5, 'General Science', 1, '2020-10-21 10:18:18', '2020-10-21 10:18:18'),
(6, 'Social Science', 1, '2020-10-21 10:18:35', '2020-10-21 10:18:35'),
(7, 'Bangla', 1, '2020-10-21 10:20:13', '2020-10-21 10:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'student,employee,admin',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'user=employe',
  `join_date` date DEFAULT NULL,
  `designation_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1=Active|0=Inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'student', 'Md. Manirul Islam', NULL, NULL, NULL, '01712339046', NULL, 'Male', NULL, 'Azizul Haque', 'Safura Khatun', 'Muslim', '20200001', '2020-10-26', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 15:48:44', '2020-10-24 15:48:44'),
(17, 'student', 'asas', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', NULL, 'asas', 'asas', 'Khristan', '20200017', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 15:49:46', '2020-10-24 15:49:46'),
(18, 'student', 'One', NULL, NULL, NULL, '+8801717514286', NULL, 'Female', NULL, 'Azizul Haque', 'Safura Khatun', 'Hindu', '20200018', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 15:56:52', '2020-10-24 15:56:52'),
(19, 'student', 'sasa', NULL, NULL, NULL, '+8801717514286', NULL, 'Female', NULL, 'Azizul Haque', 'Safura Khatun', 'Hindu', '20200019', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 15:58:45', '2020-10-24 15:58:45'),
(20, 'student', 'Vaggoraz', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', NULL, 'Azizul Haque', 'Safura Khatun', 'Muslim', '20200020', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 16:01:45', '2020-10-24 16:01:45'),
(21, 'student', 'Vaggoraz', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', NULL, 'Azizul Haque', 'Safura Khatun', 'Muslim', '20200021', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 16:04:19', '2020-10-24 16:04:19'),
(22, 'student', 'Vaggoraz', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', NULL, 'Azizul Haque', 'Safura Khatun', 'Hindu', '20200022', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 16:06:57', '2020-10-24 16:06:57'),
(23, 'student', 'Vaggoraz', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', NULL, 'Abdus Salam', 'Safura Khatun', 'Hindu', '20200023', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 16:08:41', '2020-10-24 16:08:41'),
(24, 'student', 'Md.Ataur Rahman', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', '202010280713i14.jpg', 'Abdus Salam', 'Safura Khatun', 'Muslim', '20200024', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 16:10:51', '2020-10-28 01:13:47'),
(25, 'student', 'Vaggoraz', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', NULL, 'Azizul Haque', 'Safura Khatun', 'Muslim', '20200025', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-24 16:13:37', '2020-10-24 16:13:37'),
(26, 'student', 'Vaggoraz', NULL, NULL, NULL, '+8801717514286', NULL, 'Male', '202010251433fest_2.jpg', 'Azizul Haque', 'Safura Khatun', 'Muslim', '20200026', '2020-10-25', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-10-25 08:33:07', '2020-10-25 08:33:07'),
(27, 'student', 'Vaggoraz', NULL, NULL, '$2y$10$QNxFuRbhYf3D/fwvYNZT.uIYrjcrmQkc3cPKGaoczqB1vzeJ0xNYm', '+8801717514286', NULL, 'Male', '202010251449fest_18.jpg', 'Azizul Haque', 'Safura Khatun', 'Hindu', '20200027', '2020-10-25', '9772', NULL, NULL, NULL, NULL, 1, NULL, '2020-10-25 08:49:49', '2020-10-25 08:49:49'),
(28, 'student', 'Md.Ataur Rahma', NULL, NULL, '$2y$10$sShnCNMX1gOcmn6DUmvS0e4prQgCXV5sIKK5B0Cm3C3qAeuJxUCkG', '+8801717514286', NULL, 'Male', '202010281607cosmos3.jpg', 'Abdus Salam', 'Safura Khatun', 'Muslim', '20230028', '2020-10-25', '6383', NULL, NULL, NULL, NULL, 1, NULL, '2020-10-25 11:08:31', '2020-11-01 12:00:42'),
(29, 'student', 'Md. Samuzzoha', NULL, NULL, '$2y$10$wieOUvFLnVI4t1TxeI456Ob5TqOkrSC3rszVKzGz/qelL.1EvXHCm', '+8801717514286', NULL, 'Male', '202010281607h9.jpg', 'Azizul Haque', 'Safura Khatun', 'Muslim', '20230029', '2020-10-25', '9530', NULL, NULL, NULL, NULL, 1, NULL, '2020-10-25 11:09:40', '2020-10-28 10:07:26'),
(30, 'student', 'Md. Sayem Khan', NULL, NULL, '$2y$10$KGv/eqoySqE1Q.1lCBj.gOTvAmJqjcskKPy3twXngM1uuZFdh0akC', '+8801717514286', NULL, 'Male', '202010281605cosmos1.jpg', 'Abdus Salam', 'Safura Khatun', 'Hindu', '20230030', '2020-10-28', '471', NULL, NULL, NULL, NULL, 1, NULL, '2020-10-28 08:29:42', '2020-10-28 10:05:20'),
(32, 'student', NULL, NULL, NULL, '$2y$10$NK8f6tnSnfxsXDAah1aw/.ndGJhNO9ndUTCYzXaBf/Lwk2iPJz7Py', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20230031', '1970-01-01', '6301', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-02 04:32:46', '2020-11-02 04:32:46'),
(33, 'employee', 'Md.Faizur Rahman', 'asdf@gmail.com', NULL, '$2y$10$kRnp99.22tVFhZaftgb.k.IUHPjKhVfMWHmMQy13OirILF2LrYoli', '+8801717514286', 'Dhaka', 'Male', '202011201429h4.jpg', 'Azizul Haque', 'Safura Khatun', 'Muslim', '2020110001', '1970-01-01', '3354', NULL, '2020-11-16', '1', 9000, 1, NULL, '2020-11-15 12:34:29', '2021-02-01 13:56:19'),
(34, 'employee', 'Manirul Islam', 'fiforeg@gmail.com', NULL, '$2y$10$688WjnzhjKVXcMWaWuAYxe9PhWOGbY5kHghms2JwZAVo4Hvfb7Ige', '+8801717514286', 'Dhaka', 'Male', '202011151844fest_6.jpg', 'Azizul Haque', 'Safura Khatun', 'Muslim', '2020110034', '2020-11-16', '3714', NULL, '2020-11-16', '1', 5000, 1, NULL, '2020-11-15 12:44:46', '2020-11-15 12:44:46'),
(35, 'employee', 'Md.Jamil Reza', 'asa@gmail.com', NULL, '$2y$10$Ms6vqD7sNhgaWA2orDEcnubciyBd2pjFbQZbow8.Edy984QA6qugy', '+8801717514286', 'Dhaka', 'Male', '202011201530fest_3.jpg', 'Meshbaul Haque', 'Mahfuza', 'Muslim', '2020110035', '2020-11-20', '8970', NULL, '2020-11-12', '3', 5000, 1, NULL, '2020-11-20 09:30:36', '2020-11-20 09:30:36'),
(36, 'employee', NULL, NULL, NULL, '$2y$10$YjvSfDD2KXtSZGWYWPBG5ebfvZhWPqhDmq9dNdTwK2B0uoRyDT10G', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970010036', '1970-01-01', '2177', NULL, '1970-01-01', NULL, NULL, 1, NULL, '2020-11-20 11:24:26', '2020-11-20 11:24:26'),
(37, 'employee', NULL, NULL, NULL, '$2y$10$ti208a/KSfZvhjiEKltM4OayZfc4P2fjNPTO66YiS7m6.YG4lk.8e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970010037', '1970-01-01', '2217', NULL, '1970-01-01', NULL, NULL, 1, NULL, '2020-11-20 11:27:04', '2020-11-20 11:27:04'),
(38, 'employee', NULL, NULL, NULL, '$2y$10$0I9eQsfGluWABxTBvLjwEOJgtJiJtZaWHs298kOooB6GpRo7pVS76', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970010038', '1970-01-01', '9574', NULL, '1970-01-01', NULL, NULL, 1, NULL, '2020-11-20 11:28:05', '2020-11-20 11:28:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `assaign_subjects`
--
ALTER TABLE `assaign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_categories_name_unique` (`name`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_purposes_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rahim_stores`
--
ALTER TABLE `rahim_stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rahim_stores_name_unique` (`name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_groups_name_unique` (`name`);

--
-- Indexes for table `student_sections`
--
ALTER TABLE `student_sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_sections_name_unique` (`name`);

--
-- Indexes for table `student_sessions`
--
ALTER TABLE `student_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_sessions_name_unique` (`name`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_name_unique` (`name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assaign_subjects`
--
ALTER TABLE `assaign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rahim_stores`
--
ALTER TABLE `rahim_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_sections`
--
ALTER TABLE `student_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_sessions`
--
ALTER TABLE `student_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
