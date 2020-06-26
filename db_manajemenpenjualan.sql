-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 01:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_manajemenpenjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id_brands` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id_brands`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mixagrip', NULL, NULL, NULL),
(2, 'bodrex', NULL, '2020-06-05 19:39:56', '2020-06-05 19:39:56'),
(3, 'Bodrex', '2020-06-05 07:56:28', '2020-06-11 05:37:34', NULL),
(4, 'paramex', '2020-06-05 07:56:28', '2020-06-06 02:47:31', NULL),
(5, 'Oskadon', '2020-06-05 17:47:37', '2020-06-05 17:47:37', NULL),
(6, 'Kimia', '2020-06-05 17:47:38', '2020-06-05 17:47:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'muzani', 'jl super raya no 166, depok, sleman', '081511455255', 'azizmuzani@gmail.com', '2020-06-04 09:43:56', '2020-06-07 08:51:31', NULL),
(2, 'marcheilla trecya', 'jl alpukat 1 kos kiyara', '08112752722', 'marcheilla.01@students.amikom.ac.id', '2020-06-04 09:44:30', '2020-06-04 10:19:46', NULL),
(3, 'sandi', 'jl nusa indah', '0897863733', NULL, '2020-06-04 10:40:03', '2020-06-04 10:41:37', '2020-06-04 10:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `detail_purchases`
--

CREATE TABLE `detail_purchases` (
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `price_per_seed` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transactions`
--

CREATE TABLE `detail_transactions` (
  `unit_price` int(11) NOT NULL,
  `disc_item` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transactions`
--

INSERT INTO `detail_transactions` (`unit_price`, `disc_item`, `amount`, `subTotal`, `product_id`, `transaction_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15000, 5, 2, 28500, 4, 5, '2020-06-07 08:43:51', '2020-06-07 08:43:51', NULL),
(3500, 0, 3, 10500, 3, 5, '2020-06-07 08:43:51', '2020-06-07 08:43:51', NULL),
(2000, 0, 5, 10000, 1, 6, '2020-06-07 08:50:49', '2020-06-07 08:50:49', NULL);

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2020_06_02_223536_add_file_to_users', 3),
(5, '2020_06_02_224020_add_field_to_users', 4),
(6, '2020_06_03_072342_add_field_aganis_to_users', 5),
(7, '2020_06_04_024401_add_to_users', 6),
(8, '2020_06_04_083230_create_suppliers_table', 7),
(9, '2020_06_04_103310_drop_field_suppliers', 8),
(10, '2020_06_04_160618_create_customers_table', 9),
(11, '2020_06_05_005427_create_brands_table', 10),
(12, '2020_06_05_010734_create_units_table', 11),
(13, '2020_06_05_011005_create_products_table', 12),
(14, '2020_06_06_201242_create_transactions_table', 13),
(15, '2020_06_06_210447_create_detail_transactions_table', 14),
(16, '2020_06_07_103402_add_field_to_detail_transactions', 15),
(17, '2020_06_07_144502_add_to_detail_transactions', 16),
(18, '2020_06_07_172458_add_field_to_transactions', 17),
(19, '2020_06_21_131320_create_purchases_table', 18),
(20, '2020_06_21_154552_drop_field_purchases', 19),
(21, '2020_06_21_154856_add_field_to_purchases', 20),
(22, '2020_06_21_155013_create_detail_purchases_table', 21);

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
('azizmuzani@gmail.com', '$2y$10$x.lymAi2SZpYjkfZ3kMlsO.4KCABiYX7sVew0vPbjfu7gEamf7wom', '2020-06-02 23:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `price`, `unit_id`, `stock`, `brand_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mixagrip flu batuk', 2000, 4, 20, 1, '2020-06-06 00:36:56', '2020-06-21 04:52:35', NULL),
(2, 'oskadon pusing', 3500, 4, 50, 5, '2020-06-06 00:36:56', '2020-06-07 08:27:10', NULL),
(3, 'mixagrip flu', 3500, 6, 47, 1, '2020-06-06 01:10:22', '2020-06-07 08:43:51', NULL),
(4, 'Air Raksa', 15000, 8, 18, 6, '2020-06-06 10:40:24', '2020-06-07 08:43:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_cost` int(11) NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PT. Kimia Farma', 'kimiafarma@gmail.com', '0351778287', '2020-06-04 03:43:50', '2020-06-04 10:41:12', NULL),
(2, 'PT bionic', NULL, '0227167281', '2020-06-04 03:52:37', '2020-06-04 10:22:14', NULL),
(3, 'PT. Sido Muncul', NULL, '097753643672', '2020-06-04 10:40:58', '2020-06-04 10:41:45', '2020-06-04 10:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_cost` int(11) NOT NULL,
  `disc` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `status` enum('sukses','dibatalkan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sukses',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `total_cost`, `disc`, `tax`, `status`, `user_id`, `customer_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 37050, 5, 3705, 'sukses', 1, 2, '2020-06-07 08:43:51', '2020-06-07 08:43:51', NULL),
(6, 10000, 0, 1000, 'dibatalkan', 1, 1, '2020-06-07 08:50:49', '2020-06-21 04:52:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id_unit` bigint(20) UNSIGNED NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id_unit`, `unit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'kapsul', '2020-06-05 18:04:22', '2020-06-06 02:50:02', NULL),
(5, 'pack', '2020-06-05 18:04:22', '2020-06-05 19:42:54', '2020-06-05 19:42:54'),
(6, 'tablet', '2020-06-06 00:39:22', '2020-06-06 00:39:22', NULL),
(7, 'sirup', '2020-06-06 00:39:22', '2020-06-06 00:39:22', NULL),
(8, 'botol', '2020-06-06 10:39:02', '2020-06-06 10:39:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','pimpinan','sales') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `description`, `phone`, `address`, `images`, `first_name`, `remember_token`, `created_at`, `updated_at`, `last_name`, `deleted_at`) VALUES
(1, 'Ma\'ruf Aziz', 'admin', 'azizmuzani@gmail.com', NULL, '$2y$10$ZzMB3ebmS.64IWPrvB0S/Ocorm1ihwTtz.gTztju7ZR21xV2/xvam', 'Software Development in GITSOLUTION PT', '081332739326', 'jl super raya no 166, depok, sleman, yogyakarta', '1591349704_21.jpg', 'maruf', NULL, '2020-06-02 15:42:10', '2020-06-05 02:35:04', 'aziz', NULL),
(2, 'arif setyo', 'sales', 'arif@students.amikom.ac.id', NULL, '$2y$10$8PRusj6G8dVFb1hXujWOX.xTXK5I9rmk9fEwrKgfoy0ep1XaQdjem', NULL, '374637463743', 'jl alpukat 1 kos kiyara', 'default.png', NULL, NULL, '2020-06-03 21:51:48', '2020-06-05 02:36:51', NULL, NULL),
(3, 'kartika', 'sales', 'kartika@gmail.com', NULL, '$2y$10$9dmpcfpdSSR.aT2lH2vf4e0NEwxKovn7Xg4jlC/YvMJw/3E5RRQ3e', ':)', '081332739326', 'ds tebon , barat , magetan , jawa timur', '1591349676_1591249242_lina.JPG', NULL, NULL, '2020-06-03 21:55:38', '2020-06-07 10:36:24', NULL, '2020-06-07 10:36:24'),
(4, 'aziz', 'admin', 'azizmuzani99@gmail.com', NULL, '$2y$10$l09V90a6jvyuKNS6RFB3jukJ1R6C/qHw3vW2cFYv7kZEpaFlxLyBS', NULL, '34343434', 'jl super raya no 166, depok, sleman', 'default.png', NULL, NULL, '2020-06-03 22:00:48', '2020-06-03 23:17:45', NULL, NULL),
(5, 'dwi', 'sales', 'dwi@gmail.com', NULL, '$2y$10$YDY0GLb3mNjSyFGiO8EyEOm52.iKKgA1SiRNqOGAqYxy/fpp6.piK', NULL, '081151126362', NULL, '1591246947_donn.jpg', NULL, NULL, '2020-06-03 22:02:27', '2020-06-11 05:38:24', NULL, NULL),
(6, 'arif', 'sales', 'azizmuzani9@gmail.com', NULL, '$2y$10$BzMMMFiT.i7lA.tlP9baz.V5bpLVAgaMzJqL1BEtHAT4eEtTgy6aa', NULL, '0723897423', NULL, 'default.png', NULL, NULL, '2020-06-04 01:30:57', '2020-06-04 03:49:40', NULL, '2020-06-04 03:49:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brands`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `detail_purchases`
--
ALTER TABLE `detail_purchases`
  ADD KEY `detail_purchases_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD KEY `detail_transactions_product_id_foreign` (`product_id`),
  ADD KEY `detail_transactions_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `products_unit_id_foreign` (`unit_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id_unit`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brands` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id_unit` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_purchases`
--
ALTER TABLE `detail_purchases`
  ADD CONSTRAINT `detail_purchases_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`);

--
-- Constraints for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD CONSTRAINT `detail_transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transactions_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id_brands`),
  ADD CONSTRAINT `products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id_unit`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
