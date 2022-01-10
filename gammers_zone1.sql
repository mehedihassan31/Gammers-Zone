-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 01:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gammers_zone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gamesubscribe`
--

CREATE TABLE `gamesubscribe` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gamename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_id` int(11) NOT NULL,
  `range` int(11) DEFAULT NULL,
  `price_money` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `killbyuser` int(11) NOT NULL DEFAULT 0,
  `rank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gamesubscribe`
--

INSERT INTO `gamesubscribe` (`id`, `user_id`, `gamename`, `match_id`, `range`, `price_money`, `killbyuser`, `rank`) VALUES
(1, 1, 'hello4', 1, NULL, '0', 20, '1'),
(2, 1, '6j', 1, NULL, '0', 0, '3'),
(3, 1, 'hello4', 1, NULL, '0', 0, '2'),
(4, 1, '6j', 1, NULL, '0', 0, '2'),
(5, 1, 'hello4', 1, NULL, '0', 0, '0'),
(6, 1, '6j', 1, NULL, '0', 0, '0'),
(7, 1, 'hello4', 1, NULL, '0', 0, '0'),
(8, 1, '6j', 1, NULL, '0', 0, '0'),
(9, 1, 'hello4', 1, NULL, '0', 0, '0'),
(10, 1, '6j', 1, NULL, '0', 0, '0'),
(11, 1, 'hello4', 1, NULL, '0', 0, '0'),
(12, 1, '6j', 1, NULL, '0', 0, '0'),
(13, 1, 'hello4', 1, NULL, '0', 0, '0'),
(14, 1, '6j', 1, NULL, '0', 0, '0'),
(15, 1, 'jj', 2, 45, '022', 22, '022');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `addmoneyvlink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collectroomvlink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joinmatchvlink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `termspolicy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bkash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '01xxxxxxxxx',
  `nagad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '01xxxxxxxxx',
  `roket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '01xxxxxxxxx'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `addmoneyvlink`, `collectroomvlink`, `joinmatchvlink`, `termspolicy`, `bkash`, `nagad`, `roket`) VALUES
(1, '#W', '#@', '###', 'Policy hello1', '01xxxxxxxx1', '01xxxxxxxx1', '01xxxxxxxx1');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Device` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totall_p` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Entry_Fee` int(11) DEFAULT NULL,
  `match_time` datetime DEFAULT NULL,
  `winning_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `runnerup_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `runnerup_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_kill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered_p` int(11) NOT NULL DEFAULT 0,
  `game_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resultstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'open',
  `game_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `game_type_by_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_coin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cskill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limited_ammo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `round` int(255) DEFAULT NULL,
  `reg_status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `name`, `Device`, `Type`, `version`, `map`, `match_type`, `room_id`, `room_password`, `totall_p`, `Entry_Fee`, `match_time`, `winning_price`, `runnerup_one`, `runnerup_two`, `per_kill`, `total_price`, `registered_p`, `game_link`, `resultstatus`, `game_name`, `game_type_by_date`, `default_coin`, `cskill`, `limited_ammo`, `round`, `reg_status`) VALUES
(1, 'test1', 'mobile1', 'solo1', 'tpp1', 'bermuda1', 'Paid', '60121', '1234561', '45', 100, '2021-12-31 19:09:00', '10001', '111', '121', '131', '141', 12, '141', 'close', 'free fire1', '1', '11', '1', '12', 111, 'open'),
(2, 'test', 'mobile', 'solo', 'tpp', 'bermuda', 'Paid', '6', '123456', '45', 100, '2022-01-21 19:22:00', '10', '11', '12', '13', '2000', 0, '11', 'close', 'free fire', '1', '1', '1', '1', 11, 'open'),
(3, 'test', 'mobile', 'solo', 'tpp', 'bermuda', 'Paid', '6012', '123456', '45', 100, '2021-12-28 14:29:00', '10', '11', '12', '13', '14', 0, '#', 'close', 'free fire', '1', '1', '1', '1', 11, 'close'),
(4, 'test', 'mobile', 'solo', 'tpp', 'bermuda', 'Paid', '6012', '123456', '45', 100, '2021-12-28 14:36:00', '10', '11', '12', '13', '14', 0, '#', 'open', 'free fire', '1', '11', '11', '11', 11, 'close');

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
(5, '2021_12_01_072808_slider_table', 1),
(6, '2021_12_04_091537_products', 2),
(7, '2021_12_04_102239_matches', 3),
(8, '2021_12_07_130826_order', 4),
(10, '2021_12_08_174246_transection', 5),
(11, '2021_12_14_124354_gamesubscribe', 6),
(12, '2021_12_21_141334_withdraw', 7),
(13, '2021_12_23_125744_information', 8),
(14, '2021_12_23_162549_admin', 9);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `game_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mehedihassan0031@gmail.com', '$2y$10$4XWcFjmar/3/qc9JGhoEx.zTrY7WCFJxorPbkcPIWGMImcFkIcY7K', '2021-12-30 10:48:51');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(8, 'App\\Models\\User', 1, 'myToken', 'd422bdc01e33981559bf31b34a9c0f559b2973867c6bd7dcc269bc02bf5b0b2c', '[\"*\"]', NULL, '2021-12-04 02:59:44', '2021-12-04 02:59:44'),
(9, 'App\\Models\\User', 1, 'myToken', '87714250020d22043c8212772fafe9cff00d2f6024a0783a6acf2ca7222cc894', '[\"*\"]', NULL, '2021-12-04 03:01:28', '2021-12-04 03:01:28'),
(10, 'App\\Models\\User', 1, 'myToken', 'fd3ed3150e417c30c19428dd7db51d7ea70cc01ca57c772979b426d4667b8a7b', '[\"*\"]', NULL, '2021-12-04 03:38:51', '2021-12-04 03:38:51'),
(11, 'App\\Models\\User', 1, 'myToken', 'fb9de35948bec32dc18e409df9596b8f75ff512e97dca7a3b6286ba95fcf0175', '[\"*\"]', '2021-12-14 09:52:10', '2021-12-04 03:39:34', '2021-12-14 09:52:10'),
(12, 'App\\Models\\User', 1, 'myToken', '4fdaba8897b197487b029a04a1b882674711a11ac21d779a59e9dc5668a6e095', '[\"*\"]', NULL, '2021-12-06 06:34:22', '2021-12-06 06:34:22'),
(13, 'App\\Models\\User', 2, 'myToken', '137d46c5ff94bcbe68952c657dc6e52673088035244983cc61ab844586ebd3e2', '[\"*\"]', NULL, '2021-12-09 07:44:23', '2021-12-09 07:44:23'),
(14, 'App\\Models\\User', 3, 'myToken', '97a21669107845457e5fdc492f0a420855c901d7862733fca06f6a275d1435cd', '[\"*\"]', NULL, '2021-12-10 12:00:13', '2021-12-10 12:00:13'),
(15, 'App\\Models\\User', 1, 'myToken', '1d74882968e99147c9f8b8b6dc6f549a4d980cd25e329a447c1a8c6651709c4b', '[\"*\"]', NULL, '2021-12-10 13:06:12', '2021-12-10 13:06:12'),
(16, 'App\\Models\\User', 4, 'myToken', '02d320f07e5d539426735a5435c5b012d25da5a911cddbd7bf5eb0ad96fd7eca', '[\"*\"]', NULL, '2021-12-11 06:20:21', '2021-12-11 06:20:21'),
(17, 'App\\Models\\User', 5, 'myToken', '16e4a22aefd807d5f67407e8107cfb57abbfd392ebf1ca39a4ecf81e61901aee', '[\"*\"]', NULL, '2021-12-11 06:22:11', '2021-12-11 06:22:11'),
(18, 'App\\Models\\User', 6, 'myToken', '0fa5ccefedb7ce40198147b2297b7fad9effa45ac966329485e047079d8bf8ac', '[\"*\"]', NULL, '2021-12-11 06:24:21', '2021-12-11 06:24:21'),
(19, 'App\\Models\\User', 7, 'myToken', '29c23f883ff9644b64fb5a81750782167d3a2d0057a4b37224583ecc13d7e143', '[\"*\"]', NULL, '2021-12-11 06:26:23', '2021-12-11 06:26:23'),
(20, 'App\\Models\\User', 1, 'myToken', '8b499381754409d2af72344a42d08a517f9859bd2a1ac23f3fccb2e87ad86a34', '[\"*\"]', '2021-12-14 10:54:17', '2021-12-14 09:59:13', '2021-12-14 10:54:17'),
(21, 'App\\Models\\User', 1, 'myToken', 'e839b9116d49d6ba91a39024d5abae15fc0859a5459c2ec824a6c75904481f15', '[\"*\"]', '2021-12-15 07:31:08', '2021-12-14 11:29:20', '2021-12-15 07:31:08'),
(22, 'App\\Models\\User', 1, 'myToken', '1d5da803dda48e364145f608aaa2dd7eca36e639283d8bd756c37bc645aa5e31', '[\"*\"]', '2021-12-18 11:55:53', '2021-12-15 07:35:06', '2021-12-18 11:55:53'),
(23, 'App\\Models\\User', 1, 'myToken', 'c3c14df141c613fe47e973478d8273baf460750459c500e4d774844855037936', '[\"*\"]', '2022-01-03 07:42:20', '2021-12-18 12:07:52', '2022-01-03 07:42:20'),
(24, 'App\\Models\\User', 8, 'myToken', 'cff06d6acc0363d69f4247cd6eb46f2f9e99ac1f8ec5f7bc21c9b359066f589c', '[\"*\"]', NULL, '2021-12-22 08:38:43', '2021-12-22 08:38:43'),
(25, 'App\\Models\\User', 9, 'myToken', '09300a2066d0bdd11812dd29b29fb43d2bfa23d021a9ef5886435d2f9e7c3a6b', '[\"*\"]', NULL, '2021-12-22 08:39:17', '2021-12-22 08:39:17'),
(26, 'App\\Models\\User', 10, 'myToken', 'cc92868fa0b9feb1cdcb8f60affbbdc925a1a1f9c746328a0b9b8ba28b13534a', '[\"*\"]', NULL, '2021-12-22 09:05:14', '2021-12-22 09:05:14'),
(27, 'App\\Models\\User', 11, 'myToken', '95f171513ef30f4412efb4a6dea01e01f6c9936906f1abc3d23f68b31b774d50', '[\"*\"]', NULL, '2021-12-22 09:06:14', '2021-12-22 09:06:14'),
(28, 'App\\Models\\User', 12, 'myToken', '5a122c99cc55d6e3898c352ba56f59325807e59fdb9ddb8d2c306001c96d7e18', '[\"*\"]', NULL, '2021-12-22 09:07:17', '2021-12-22 09:07:17'),
(29, 'App\\Models\\User', 13, 'myToken', '8f4c0e93d26fa25952bdb348cebaa8f2a9b30f4294ec116d263ea5fa0e8fef5d', '[\"*\"]', NULL, '2021-12-22 09:10:09', '2021-12-22 09:10:09'),
(30, 'App\\Models\\User', 14, 'myToken', 'c83c1b6e909590c9b5907980b34e0f0bc221d7215d54c7a7455858a4ca3f5146', '[\"*\"]', NULL, '2021-12-22 09:14:17', '2021-12-22 09:14:17'),
(31, 'App\\Models\\User', 15, 'myToken', '03202f74c67bb6320e97207e1f567bab1a30f0409727abe9ba6da453bbb9ccdb', '[\"*\"]', NULL, '2021-12-22 09:15:59', '2021-12-22 09:15:59'),
(32, 'App\\Models\\User', 16, 'myToken', '8d4bfed0644ab32aea206ca67985c7fc4b829cd128b784d81d5f718b27ebc850', '[\"*\"]', NULL, '2021-12-22 09:28:18', '2021-12-22 09:28:18'),
(33, 'App\\Models\\User', 17, 'myToken', '6b1e8392160ae1f01e9ccc57d2269f5db842581593c34f26b1cf32294a3bd5f4', '[\"*\"]', NULL, '2021-12-22 09:31:30', '2021-12-22 09:31:30'),
(34, 'App\\Models\\User', 18, 'myToken', 'af47179d73bb26192a848ef7f18034c346aeb70a667c0a62c97d0857149ac869', '[\"*\"]', NULL, '2021-12-22 09:32:37', '2021-12-22 09:32:37'),
(35, 'App\\Models\\User', 19, 'myToken', 'eae6cadffc01d6e10d2744e7b5889702eddd81f1208803e5b741e638ba863b9d', '[\"*\"]', NULL, '2021-12-22 09:34:56', '2021-12-22 09:34:56'),
(36, 'App\\Models\\User', 20, 'myToken', '2cdd4cdf2fdf747b793434f57ce1eb17bf0ae7feed623285c35d2d4bc96aaa3b', '[\"*\"]', NULL, '2021-12-22 09:36:39', '2021-12-22 09:36:39'),
(37, 'App\\Models\\User', 21, 'myToken', '00fb86a8406ba0294a0b368525c558bf643448756b5a83deb4ac4ef47c0304ea', '[\"*\"]', NULL, '2021-12-22 09:37:26', '2021-12-22 09:37:26'),
(38, 'App\\Models\\User', 22, 'myToken', '298822c9e5c5fee5d70d645f7da642c51b2be7a85fd09a4ca4c7b41e3258aa95', '[\"*\"]', NULL, '2021-12-22 09:38:05', '2021-12-22 09:38:05'),
(39, 'App\\Models\\User', 1, 'myToken', 'a4db00c508f702a1d449ee757b23e525ae768aed51bf09ca5245f76064f4908e', '[\"*\"]', '2021-12-23 09:56:20', '2021-12-23 09:51:21', '2021-12-23 09:56:20'),
(40, 'App\\Models\\User', 1, 'myToken', 'ee95c224fc6d9d6adc7f9f29183d0670e09add0834aeb510d7e565819c2d9205', '[\"*\"]', '2021-12-30 08:21:00', '2021-12-28 05:47:11', '2021-12-30 08:21:00'),
(41, 'App\\Models\\User', 2, 'myToken', '2020821c9e1ca6a1087220b8e8719caf6f65dfe6e0f477b487d43dc1b17da1f4', '[\"*\"]', NULL, '2021-12-29 12:26:19', '2021-12-29 12:26:19'),
(42, 'App\\Models\\User', 1, 'myToken', 'd3cb593595950981522328e5fc2446781e928e4a613efcad46a5b3b502762b58', '[\"*\"]', '2021-12-30 08:24:53', '2021-12-30 07:31:22', '2021-12-30 08:24:53'),
(43, 'App\\Models\\User', 1, 'myToken', '55bb8b12ce456e0820f2ed5587e87d26ff33c009166220f751eab2061b5b855e', '[\"*\"]', NULL, '2021-12-30 08:29:51', '2021-12-30 08:29:51'),
(44, 'App\\Models\\User', 1, 'myToken', '82797de4271a99b56ecee0c05bf69d34176efbb2e5df9fc879feec2586c64d5f', '[\"*\"]', '2021-12-30 09:38:14', '2021-12-30 09:37:22', '2021-12-30 09:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `diamond` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `photo`, `link`, `title`) VALUES
(2, 'http://127.0.0.1:8000/images/8-nov-3 (2).png', NULL, NULL),
(3, 'http://127.0.0.1:8000/images/pubg.jpg', NULL, NULL),
(4, 'http://127.0.0.1:8000/images/Free-Fire.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transction`
--

CREATE TABLE `transction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ammount` int(11) DEFAULT 0,
  `pmethod` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int(255) DEFAULT 10000,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` int(11) DEFAULT 0,
  `role` tinyint(11) NOT NULL DEFAULT 0,
  `winbalance` int(11) DEFAULT 0,
  `total_kill` int(255) NOT NULL DEFAULT 0,
  `refer` tinyint(1) DEFAULT 0,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `phone`, `balance`, `role`, `winbalance`, `total_kill`, `refer`, `reference`, `banned`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mehedi1111', 'hassan1111', 'mehedi1111', 'mehedihassan0031@gmail.com', '0017883511', 300, 1, 300, 20, 0, NULL, 1, NULL, '$2y$10$B776unp2MS7rQYbKDI3XBefdholQDpxB4JGiZo/YCIJ/yOllaETxy', '10AO5ANgBBAep14IGH0AhgLTE3c7GUgKVnP07ZkL9KmddiOCy7v06f8PLgox', '2021-12-28 05:47:11', '2021-12-30 06:37:16'),
(2, 'admin', 'admin', 'admin', 'admin@admin.com', '017000000', 0, 1, 0, 0, 0, NULL, 0, NULL, '$2y$10$f/Ybq0YNc7KyGkwbQ/QHh.iVVrAGyWwXvOOqKWZ9ng.kLVQCwB4P2', NULL, '2021-12-29 12:26:19', '2021-12-29 12:26:19'),
(3, 'mehedi hassan', 'mehedi hassan', 'mehedi1', 'mehedihassan3112@gmail.com', NULL, 0, 0, 0, 0, 0, NULL, 0, NULL, '$2y$10$ixd73/GO4Yf2eDvQn.9JnOPqorek8WSmN/2ygtfWuwdNafjgTbQc2', NULL, '2021-12-31 10:30:15', '2021-12-31 10:30:15'),
(4, 'hassan', 'hassan', 'mehedihassan', 'mehedi1@gmail.com', '01222', 0, 0, 0, 0, 0, NULL, 0, NULL, '$2y$10$krLNoXYWdXlHNQWah5Q3/.ccS4GfkslxOonlVtqNI9ir8AUEj9CzK', NULL, '2021-12-31 10:42:17', '2021-12-31 10:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ammount` int(11) DEFAULT 0,
  `pmethod` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT 10000,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gamesubscribe`
--
ALTER TABLE `gamesubscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transction`
--
ALTER TABLE `transction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gamesubscribe`
--
ALTER TABLE `gamesubscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transction`
--
ALTER TABLE `transction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
