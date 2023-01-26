-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 12:01 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getClientById` (IN `id` INT)   SELECT 
	clients.id,
    clients.name,
    clients.phone,
    clients.city_id,
    dealing_type.id AS dealing_id,
    dealing_type.name AS dealingType,
    lk_country.name AS countryName,
    lk_state.name AS stateName,
    lk_city.name AS cityName
from 
	clients
    LEFT OUTER join dealing_type
    ON 
    clients.dealing_id = dealing_type.id
    LEFT OUTER JOIN lk_city
    ON
    clients.city_id = lk_city.id
    LEFT OUTER join lk_state
    ON
    lk_state.id = lk_city.state_id
    LEFT OUTER JOIN lk_country
    ON
    lk_state.country_id = lk_country.id
where clients.id = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getClients` ()   SELECT 
	clients.id,
    clients.name,
    clients.phone,
    dealing_type.name AS dealingType,
    lk_country.name AS countryName,
    lk_state.name AS stateName,
    lk_city.name AS cityName
from 
	clients
    LEFT OUTER JOIN dealing_type
    ON 
    clients.dealing_id = dealing_type.id
    LEFT OUTER JOIN lk_city
    ON
    clients.city_id = lk_city.id
    left outer join lk_state
    ON
    lk_state.id = lk_city.state_id
    LEFT OUTER JOIN lk_country
    ON
    lk_state.country_id = lk_country.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lk_states_countries` ()   select 
    lk_state.id,
    lk_state.name AS stateName,
    lk_country.name AS countryName
FROM
    lk_country
    INNER JOIN lk_state
    ON
    lk_country.id = lk_state.country_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EditCityByID` (IN `id` INT)   select 
	lk_city.id AS cityID,
    lk_city.name AS cityName,
    lk_state.id AS stateID,
    lk_state.name AS stateName,
    lk_country.id AS countryID,
    lk_country.name AS countryName
FROM
	lk_city
    INNER JOIN lk_state
    ON
    lk_state.id = lk_city.state_id
    inner join lk_country
    ON
    lk_country.id = lk_state.country_id
WHERE
	lk_city.id = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetCities` ()   select 
	lk_city.id,
    lk_city.name,
    lk_state.name AS StateName,
    lk_country.name AS CountryName
FROM
	lk_city
    inner JOIN lk_state
    ON
    lk_state.id = lk_city.state_id
    INNER JOIN lk_country
    ON
    lk_state.country_id = lk_country.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_getOrderData` ()   select 
	orders.id,
	orders.orderDate,
    clients.name AS clientName,
    clients.phone AS clientPhone,
    suppliers.name AS supplierName,
    suppliers.phone AS supplierPhone,
    lk_country.name AS countryName,
    lk_state.name AS stateName,
    lk_city.name AS cityName,
    orders.delivery_place,
    orders.origin_place,
    orders.mount
FROM
	orders
    inner JOIN clients
    ON
    orders.client_id = clients.id
    inner JOIN suppliers
    ON
    orders.supplier_id = suppliers.id
    inner join lk_city
    ON
    orders.delivery_place = lk_city.id
    OR
    orders.origin_place = lk_city.id
    inner join lk_state
    ON 
    lk_state.id = lk_city.state_id
    inner JOIN lk_country
    ON
    lk_state.country_id = lk_country.id
    
    WHERE lk_city.id = 3$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dealing_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `dealing_id`, `phone`, `city_id`) VALUES
(2, 'Osama', 3, '01061093957', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dealing_type`
--

CREATE TABLE `dealing_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dealing_type`
--

INSERT INTO `dealing_type` (`id`, `name`) VALUES
(1, 'نوع التعامل 1'),
(2, 'نوع التعامل 2'),
(3, 'نوع التعامل 3');

-- --------------------------------------------------------

--
-- Table structure for table `delegates`
--

CREATE TABLE `delegates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'ميت غمر', 2),
(3, 'المنصورة', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lk_country`
--

CREATE TABLE `lk_country` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_country`
--

INSERT INTO `lk_country` (`id`, `name`) VALUES
(2, 'مصر'),
(3, 'السعودية');

-- --------------------------------------------------------

--
-- Table structure for table `lk_state`
--

CREATE TABLE `lk_state` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_state`
--

INSERT INTO `lk_state` (`id`, `name`, `country_id`) VALUES
(2, 'الرياض', 3),
(3, 'الدقهليه', 2),
(4, 'الشرقية', 2),
(5, 'المنوفيه', 2);

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
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `origin_place` int(11) NOT NULL,
  `delivery_place` int(11) NOT NULL,
  `details_address` text NOT NULL,
  `mount` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `supplier_id`, `orderDate`, `origin_place`, `delivery_place`, `details_address`, `mount`, `size`, `weight`, `notes`) VALUES
(1, 1, 1, '2023-01-26 22:03:51', 2, 3, 'عنوان تفصيلي', 250, 10, 30, 'تفاصيل');

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
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`) VALUES
(2, 'mohamed', '01061093957'),
(3, 'حسين', '01061093957');

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
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$egymOTc3PN1k/PEOkwwDGuLfRRQ3VboTUH32GFkHX8kIjkrB.jZj2', NULL, '2023-01-15 20:46:54', '2023-01-15 20:46:54'),
(2, 'Code', 'code@code.com', NULL, '$2y$10$egymOTc3PN1k/PEOkwwDGuLfRRQ3VboTUH32GFkHX8kIjkrB.jZj2', NULL, '2023-01-26 18:07:21', '2023-01-26 18:07:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealing_type`
--
ALTER TABLE `dealing_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delegates`
--
ALTER TABLE `delegates`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `lk_country`
--
ALTER TABLE `lk_country`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dealing_type`
--
ALTER TABLE `dealing_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delegates`
--
ALTER TABLE `delegates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lk_city`
--
ALTER TABLE `lk_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lk_country`
--
ALTER TABLE `lk_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lk_state`
--
ALTER TABLE `lk_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
