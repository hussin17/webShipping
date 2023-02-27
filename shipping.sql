-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 12:48 AM
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
  `code` varchar(50) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `instructions` text DEFAULT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `nPieces` int(11) DEFAULT NULL,
  `vShipment` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `dimensions` varchar(10) DEFAULT NULL,
  `notes1` text DEFAULT NULL,
  `notes2` text DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `date_updated` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `code`, `state_id`, `supplier_id`, `instructions`, `phone1`, `phone2`, `address`, `nPieces`, `vShipment`, `weight`, `total`, `dimensions`, `notes1`, `notes2`, `date_added`, `date_updated`) VALUES
(1, 'محمد محسن', 'A10', 3, 11, 'hfghfghfgh', '0504356672', '0504356672', 'sada', 10, 65, 250, NULL, '253', 'gfhfghfgh', 'fghfghfgh', '2023-02-27', '2023-02-27'),
(2, 'عبدالرحمن محمد ابراهيم', 'A10', 3, 10, 'vvbnvbnvb', '0504356672', '0504356672', 'ghjghjgh', 6, 108, 250, NULL, '253', 'vbnvbnvbnvb', 'vbnvbn', '2023-02-27', '2023-02-27');

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
  `nAddress` text DEFAULT NULL,
  `adjective` varchar(255) DEFAULT NULL,
  `notes1` text NOT NULL,
  `notes2` text NOT NULL,
  `fileNumber` int(11) NOT NULL,
  `tradeName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delegates`
--

INSERT INTO `delegates` (`id`, `name`, `nationalID`, `age`, `address`, `personalPhoto`, `cardImage`, `phone1`, `phone2`, `phone3`, `nAddress`, `adjective`, `notes1`, `notes2`, `fileNumber`, `tradeName`) VALUES
(14, 'محمد محسن', '30109300118453', 20, 'dsfsdf', '107765613_1143108772732803_7695175023168170994_n.jpg', '259868820_261583082698635_1423932095418435168_n.jpg', '1592356', '0504356672', '1592356', 'الدقهلية - المنصورة - طنامل', 'اخوه', 'sdfsdfsdf', 'sdfsdfsdf', 50, 'sdfsdf');

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
,`phone1` varchar(15)
,`phone2` varchar(15)
,`code` varchar(50)
,`instructions` text
,`address` text
,`nPieces` int(11)
,`vShipment` int(11)
,`weight` int(11)
,`total` int(11)
,`dimensions` varchar(10)
,`notes1` text
,`notes2` text
,`date_added` date
,`date_updated` date
,`clientState` varchar(50)
,`clientStateId` int(11)
,`supplierName` varchar(255)
,`supplierPersonalAddress` int(11)
,`supplierState` varchar(50)
,`shippingValue` float
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_08_225856_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 7);

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'اضافة مستخدم', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(4, 'عرض المستخدمين', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(5, 'حذف المستخدمين', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(6, 'تعديل المستخدمين', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(7, 'اضافة صلاحية', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(8, 'عرض الصلاحيات', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(9, 'حذف الصلاحيات', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(10, 'تعديل الصلاحيات', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(11, 'اضافة مدينة', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(12, 'عرض المدن', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(13, 'حذف المدن', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(14, 'تعديل المدن', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(15, 'اضافة محافظة', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(16, 'عرض المحافظات', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(17, 'حذف المحافظات', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(18, 'تعديل المحافظات', 'web', '2023-02-19 18:44:20', '2023-02-19 18:44:20'),
(19, 'اضافة عميل', 'web', '2023-02-19 18:44:21', '2023-02-19 18:44:21'),
(20, 'عرض العملاء', 'web', '2023-02-19 18:44:21', '2023-02-19 18:44:21'),
(21, 'حذف العملاء', 'web', '2023-02-19 18:44:21', '2023-02-19 18:44:21'),
(22, 'تعديل العملاء', 'web', '2023-02-19 18:44:21', '2023-02-19 18:44:21'),
(23, 'اضافة مورد', 'web', '2023-02-19 18:44:21', '2023-02-19 18:44:21'),
(24, 'عرض الموردين', 'web', '2023-02-19 18:44:21', '2023-02-19 18:44:21'),
(25, 'حذف الموردين', 'web', '2023-02-19 18:44:21', '2023-02-19 18:44:21'),
(26, 'تعديل الموردين', 'web', '2023-02-19 18:44:21', '2023-02-19 18:44:21'),
(27, 'اضافة مندوب', 'web', '2023-02-19 18:44:21', '2023-02-19 18:44:21'),
(28, 'عرض المناديب', 'web', '2023-02-19 18:44:21', '2023-02-19 18:44:21'),
(29, 'حذف المناديب', 'web', '2023-02-19 18:44:21', '2023-02-19 18:44:21'),
(30, 'تعديل المناديب', 'web', '2023-02-19 18:44:21', '2023-02-19 18:44:21');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'ادمن', 'web', '2023-02-19 18:21:11', '2023-02-19 19:17:14'),
(4, 'مستخدم', 'web', '2023-02-19 19:25:09', '2023-02-19 19:25:09');

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
(3, 3),
(4, 3),
(4, 4),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(8, 4),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(12, 4),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(16, 4),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(20, 4),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(24, 4),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(28, 4),
(29, 3),
(30, 3);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `logo` text DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `personalPhone1` varchar(15) NOT NULL,
  `personalPhone2` varchar(15) NOT NULL,
  `tradePhone1` varchar(15) NOT NULL,
  `tradePhone2` varchar(15) NOT NULL,
  `personalAddress` int(11) NOT NULL,
  `tradeAddress` int(11) NOT NULL,
  `recordNumber` text DEFAULT NULL,
  `tradeName` varchar(255) NOT NULL,
  `location` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `logo`, `name`, `personalPhone1`, `personalPhone2`, `tradePhone1`, `tradePhone2`, `personalAddress`, `tradeAddress`, `recordNumber`, `tradeName`, `location`) VALUES
(10, '1677192013.jpg', 'حسين محمد', '01061093957', '01061093957', '01061093957', '01061093957', 3, 5, '6', 'code', NULL),
(11, '1677193383.jpg', 'dfgdfg', 'gdfgdfg', 'gfhfgh', '1592356', 'fghfghfgh', 1, 3, 'fghfgh', 'gdfgdf', 'https://goo.gl/maps/ZmzQfwkgaqFLzMqR8'),
(12, '1677193324.jpg', 'dfgdfg', 'gdfgdfg', 'gfhfgh', '1592356', 'fghfghfgh', 1, 3, 'fghfgh', 'gdfgdf', 'https://goo.gl/maps/ZmzQfwkgaqFLzMqR8'),
(13, '1677193160.jpg', 'حسين محمد', '01061093957', '01061093957', '01061093957', '01061093957', 3, 3, '250', 'كود', 'https://goo.gl/maps/ZmzQfwkgaqFLzMqR8'),
(14, '1677193500.jpg', 'محمد محسن', '0504356672', '0504356672', '0504356672', '0504356672', 3, 1, '20', 'Code', 'https://goo.gl/maps/ZmzQfwkgaqFLzMqR8');

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
(6, 'Admin', 'admin@gmail.com', NULL, '$2y$10$k0GMsz3FMDnqDyUyz8wi1.ir9kgayMS/co2VWVdwOQvQ1cUgc63e.', NULL, '2023-02-19 18:21:11', '2023-02-19 18:21:11'),
(7, 'حسين', 'hussien@gmail.com', NULL, '$2y$10$pPYdS897J95kT.Ws8gL67O4JonL5b4.xDYnZsRBh6jXyCLxAVPV2q', NULL, '2023-02-19 19:26:53', '2023-02-19 19:26:53');

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getclients`  AS SELECT `clients`.`id` AS `id`, `clients`.`name` AS `name`, `clients`.`phone1` AS `phone1`, `clients`.`phone2` AS `phone2`, `clients`.`code` AS `code`, `clients`.`instructions` AS `instructions`, `clients`.`address` AS `address`, `clients`.`nPieces` AS `nPieces`, `clients`.`vShipment` AS `vShipment`, `clients`.`weight` AS `weight`, `clients`.`total` AS `total`, `clients`.`dimensions` AS `dimensions`, `clients`.`notes1` AS `notes1`, `clients`.`notes2` AS `notes2`, `clients`.`date_added` AS `date_added`, `clients`.`date_updated` AS `date_updated`, `clientstate`.`name` AS `clientState`, `clientstate`.`id` AS `clientStateId`, `suppliers`.`name` AS `supplierName`, `suppliers`.`personalAddress` AS `supplierPersonalAddress`, `supplierstate`.`name` AS `supplierState`, `clientstate`.`shippingValue` AS `shippingValue` FROM (((`clients` left join `lk_state` `clientstate` on(`clients`.`state_id` = `clientstate`.`id`)) left join `suppliers` on(`clients`.`supplier_id` = `suppliers`.`id`)) left join `lk_state` `supplierstate` on(`supplierstate`.`id` = `suppliers`.`personalAddress`))  ;

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delegates`
--
ALTER TABLE `delegates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
