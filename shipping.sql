-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 12:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shipping`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `city_id`) VALUES
(2, 'اسامة محمد المهدي', '01061093957', 5);

-- --------------------------------------------------------

--
-- Table structure for table `delegates`
--

CREATE TABLE `delegates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nationalID` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `address` text NOT NULL,
  `personalPhoto` text NOT NULL,
  `cardImage` text NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `phone3` varchar(15) NOT NULL,
  `notes1` text NOT NULL,
  `notes2` text NOT NULL,
  `fileNumber` int(11) NOT NULL,
  `tradeName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delegates`
--

INSERT INTO `delegates` (`id`, `name`, `nationalID`, `age`, `address`, `personalPhoto`, `cardImage`, `phone1`, `phone2`, `phone3`, `notes1`, `notes2`, `fileNumber`, `tradeName`) VALUES
(9, 'اسامة محمد المهدي', '30109300118453', 21, 'asdf', 'c-d-x-PDX_a_82obo-unsplash.jpg', 'federico-di-dio-photography-QI6DitsEmsI-unsplash.jpg', '1592356', '1592356', '1592356', 'sfdasdfa', 'sadfasdfas', 21, 'Code2');

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
-- Stand-in structure for view `getcities`
-- (See below for the actual view)
--
CREATE TABLE `getcities` (
`id` int(11)
,`name` varchar(50)
,`StateName` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `getclients`
-- (See below for the actual view)
--
CREATE TABLE `getclients` (
`id` int(11)
,`name` varchar(255)
,`phone` varchar(15)
,`cityName` varchar(50)
,`stateName` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `lk_city`
--

CREATE TABLE `lk_city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_city`
--

INSERT INTO `lk_city` (`id`, `name`, `state_id`) VALUES
(1, 'ميت غمر', 3),
(3, 'المنصورة', 3),
(5, 'طنامل الشرقي', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lk_state`
--

CREATE TABLE `lk_state` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `shippingValue` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_state`
--

INSERT INTO `lk_state` (`id`, `name`, `shippingValue`) VALUES
(3, 'الدقهليه', 30),
(4, 'الشرقية', 0),
(5, 'المنوفيه', 0),
(7, 'بور سعيد', 250);

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `orderDate` date NOT NULL DEFAULT current_timestamp(),
  `details_address` text DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `notes1` text DEFAULT NULL,
  `notes2` text NOT NULL,
  `orderValue` int(11) NOT NULL,
  `shippingValue` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `supplier_id`, `orderDate`, `details_address`, `size`, `weight`, `notes1`, `notes2`, `orderValue`, `shippingValue`, `total`) VALUES
(2, 2, 3, '2023-01-28', NULL, 120, 250, NULL, '', 0, 0, 0),
(4, 2, 2, '2023-01-28', NULL, NULL, NULL, NULL, '', 0, 0, 0),
(5, 2, 2, '2023-01-28', NULL, NULL, NULL, 'Notes', '', 0, 0, 0),
(6, 2, 2, '2023-01-30', NULL, NULL, NULL, NULL, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `ordersdata`
-- (See below for the actual view)
--
CREATE TABLE `ordersdata` (
);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `personalPhone1` varchar(15) NOT NULL,
  `personalPhone2` varchar(15) NOT NULL,
  `tradePhone1` varchar(15) NOT NULL,
  `tradePhone2` varchar(15) NOT NULL,
  `personalAddress` int(11) NOT NULL,
  `tradeAddress` int(11) NOT NULL,
  `recordNumber` int(11) NOT NULL,
  `tradeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `personalPhone1`, `personalPhone2`, `tradePhone1`, `tradePhone2`, `personalAddress`, `tradeAddress`, `recordNumber`, `tradeName`) VALUES
(2, 'mohamed2', '0106109395710', '0106109395710', '0106109395710', '0106109395710', 1, 5, 5, 'Code2'),
(4, 'Admin', '1592356', '1592356', '1592356', '1592356', 1, 3, 250, 'Code');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$egymOTc3PN1k/PEOkwwDGuLfRRQ3VboTUH32GFkHX8kIjkrB.jZj2', NULL, '2023-01-15 18:46:54', '2023-01-15 18:46:54'),
(2, 'Code', 'code@code.com', NULL, '$2y$10$egymOTc3PN1k/PEOkwwDGuLfRRQ3VboTUH32GFkHX8kIjkrB.jZj2', NULL, '2023-01-26 16:07:21', '2023-01-26 16:07:21');

-- --------------------------------------------------------

--
-- Structure for view `getcities`
--
DROP TABLE IF EXISTS `getcities`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getcities`  AS   (select `lk_city`.`id` AS `id`,`lk_city`.`name` AS `name`,`lk_state`.`name` AS `StateName` from (`lk_city` join `lk_state` on(`lk_city`.`state_id` = `lk_state`.`id`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `getclients`
--
DROP TABLE IF EXISTS `getclients`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getclients`  AS   (select `clients`.`id` AS `id`,`clients`.`name` AS `name`,`clients`.`phone` AS `phone`,`lk_city`.`name` AS `cityName`,`lk_state`.`name` AS `stateName` from ((`clients` left join `lk_city` on(`lk_city`.`id` = `clients`.`city_id`)) left join `lk_state` on(`lk_state`.`id` = `lk_city`.`state_id`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `ordersdata`
--
DROP TABLE IF EXISTS `ordersdata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ordersdata`  AS SELECT `orders`.`id` AS `id`, `orders`.`size` AS `size`, `orders`.`weight` AS `weight`, `orders`.`notes` AS `notes`, `orders`.`orderDate` AS `orderDate`, `orders`.`details_address` AS `details_address`, `orders`.`mount` AS `mount`, `clients`.`name` AS `ClientName`, `clients`.`phone` AS `ClientPhone`, `suppliers`.`name` AS `SupplierName`, `suppliers`.`phone` AS `SupplierPhone`, `originplace`.`name` AS `originPlace`, `deliveryplace`.`name` AS `deliveryPlace` FROM ((((`orders` left join `clients` on(`clients`.`id` = `orders`.`client_id`)) left join `suppliers` on(`suppliers`.`id` = `orders`.`supplier_id`)) left join `lk_city` `originplace` on(`orders`.`origin_place` = `originplace`.`id`)) left join `lk_city` `deliveryplace` on(`orders`.`delivery_place` = `deliveryplace`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delegates`
--
ALTER TABLE `delegates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nationalID` (`nationalID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lk_city`
--
ALTER TABLE `lk_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_state`
--
ALTER TABLE `lk_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delegates`
--
ALTER TABLE `delegates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lk_city`
--
ALTER TABLE `lk_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lk_state`
--
ALTER TABLE `lk_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
