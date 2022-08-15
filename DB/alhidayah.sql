-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 07:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alhidayah`
--

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
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(6, '2021_12_15_120411_create_sessions_table', 2),
(7, '2021_12_17_090358_create_posts_table', 3);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(1024) NOT NULL,
  `kode` varchar(1024) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `max_stok` int(11) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama_produk`, `kode`, `harga`, `stok`, `max_stok`, `updated_at`, `created_at`) VALUES
(1, 'Amplop 110x230', '1', 1500, 83, 100, '2022-05-25 02:58:01', ''),
(2, 'Buku Tulis Big Boss 42 Lembar', '2', 4000, 87, 100, '', ''),
(3, 'BANGO KECAP MEJA', '3', 12000, 82, 100, '', ''),
(4, 'BUMBU RACIK AYAM GORENG', '4', 2000, 87, 100, '', ''),
(5, 'Fortune m goreng 1ltr', '5', 23500, 76, 100, '', ''),
(6, 'MASAKO AYAM', '6', 1000, 85, 100, '', ''),
(7, 'ROSEBRAND TEPUNG BERAS 500gr', '7', 9000, 76, 100, '', ''),
(8, 'GOOD DAY FREEZE', '8', 2000, 87, 100, '', ''),
(9, 'TOP KOPI SUSU', '9', 1000, 78, 100, '', ''),
(10, 'WHITE KOFFIE', '10', 1500, 82, 100, '', ''),
(11, 'Indomie goreng', '11', 3000, 85, 100, '', ''),
(12, 'Sedap Soto', '12', 3000, 86, 100, '', ''),
(13, 'Gudang Garam Surya Pro 16', '13', 22000, 86, 100, '', ''),
(14, 'Class Mild 12', '14', 18000, 87, 100, '', ''),
(15, 'Surya Pro Mild', '15', 23500, 84, 100, '', ''),
(16, 'Shampoo Lifeboy Botol 70 ml', '16', 10200, 84, 100, '', ''),
(17, 'Aqua 350mL', '17', 3500, 81, 100, '', ''),
(18, 'SALTCHEESE COMBO', '18', 2000, 90, 100, '', ''),
(19, 'Bodrex Extra', '19', 2000, 88, 100, '', ''),
(20, 'Mixagrip Flu & Batuk', '20', 3000, 86, 100, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id_rekomendasi` int(11) NOT NULL,
  `produk_rekomendasi` varchar(255) NOT NULL,
  `bulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`id_rekomendasi`, `produk_rekomendasi`, `bulan`) VALUES
(3, 'Surya Pro Mild_Shampoo Lifeboy Botol 70 ml', 2),
(4, 'ROSEBRAND TEPUNG BERAS 500gr_TOP KOPI SUSU', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gU81z0GLnCP1YyfPjqrW8h54edDtDwcGFkLw2Ia6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.115 Safari/537.36 OPR/88.0.4412.85', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibnMyUHZ5bmx6aUtFTG5kbW9uMlNVUkJYUFVJd2dIRUJPd2dmaFlDYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaG93ZWNsYXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658380564);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `kode_transaksi` int(11) NOT NULL,
  `pelanggan` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`kode_transaksi`, `pelanggan`, `total_harga`, `tgl_transaksi`) VALUES
(1, 'Budi', 0, '2021-02-12'),
(2, 'Supadi', 0, '2021-02-08'),
(3, 'Sinta', 0, '2021-02-04'),
(4, 'Budi', 0, '2021-02-16'),
(5, 'Prayogi', 0, '2021-02-28'),
(6, 'Taufik', 0, '2021-02-01'),
(7, 'Imam', 0, '2021-02-10'),
(8, 'Wiwik', 0, '2021-02-12'),
(9, 'Adi', 0, '2021-02-18'),
(10, 'Heri', 0, '2021-02-18'),
(11, 'Afif', 0, '2021-02-15'),
(12, 'Ilham', 0, '2021-02-21'),
(13, 'Ari', 0, '2021-02-08'),
(14, 'Uswatun', 0, '2021-02-20'),
(15, 'Irma', 0, '2021-02-23'),
(16, 'Ana', 0, '2021-02-22'),
(17, 'Fahmi', 0, '2021-02-10'),
(18, 'Gunawan', 0, '2021-02-25'),
(19, 'Ali', 0, '2021-02-25'),
(20, 'Yuli', 0, '2021-02-25'),
(21, 'Ida', 0, '2021-02-23'),
(22, 'Hermawan', 0, '2021-02-28'),
(23, 'Evendi', 0, '2021-02-21'),
(24, 'Ali', 0, '2021-02-05'),
(25, 'Nima', 0, '2021-02-21'),
(26, 'Gunadir', 0, '2021-02-14'),
(27, 'Gunawan', 0, '2021-02-22'),
(28, 'Haris', 0, '2021-02-12'),
(29, 'Hani', 0, '2021-02-28'),
(30, 'Kinanti', 0, '2021-02-01'),
(31, 'Hana', 0, '2021-02-20'),
(32, 'Rahayu', 0, '2021-02-11'),
(33, 'Isna', 0, '2021-02-18'),
(34, 'Fahmi', 0, '2021-02-22'),
(35, 'Luthfiyah', 0, '2021-02-05'),
(36, 'Bambang', 0, '2021-02-14'),
(37, 'Ari', 0, '2021-02-08'),
(38, 'Lukman', 0, '2021-02-20'),
(39, 'Dian', 0, '2021-02-22'),
(40, 'Dewi', 0, '2021-02-16'),
(41, 'Wulan', 0, '2021-02-01'),
(42, 'Ratu', 0, '2021-02-18'),
(43, 'Bambang', 0, '2021-02-25'),
(44, 'Budi', 0, '2021-02-26'),
(45, 'Hanif', 0, '2021-02-08'),
(46, 'Susanti', 0, '2021-02-09'),
(47, 'Mega', 0, '2021-02-12'),
(48, 'Intan', 0, '2021-02-20'),
(49, 'Rahayu', 0, '2021-02-12'),
(50, 'Adi', 0, '2021-02-24'),
(51, 'Joko', 0, '2021-02-19'),
(52, 'Melati', 0, '2021-02-12'),
(53, 'Slamet', 0, '2021-02-16'),
(54, 'Fahrur', 0, '2021-02-11'),
(55, 'Farid', 0, '2021-02-09'),
(56, 'Hasan', 0, '2021-02-11'),
(57, 'Haris', 0, '2021-02-09'),
(58, 'Kinanti', 0, '2021-02-23'),
(59, 'Laura', 0, '2021-02-16'),
(60, 'Sinta', 0, '2021-02-05'),
(61, 'Kharis', 0, '2021-02-08'),
(62, 'Jumain', 0, '2021-02-23'),
(63, 'Joko', 0, '2021-02-28'),
(64, 'Uswatun', 0, '2021-02-23'),
(65, 'Heru', 0, '2021-02-11'),
(66, 'Sri ', 0, '2021-02-12'),
(67, 'Shafaa', 0, '2021-02-14'),
(68, 'Purnama', 0, '2021-02-25'),
(69, 'Sanjaya', 0, '2021-02-11'),
(70, 'Tono', 0, '2021-02-17'),
(71, 'Slamet', 0, '2021-02-05'),
(72, 'Intan', 0, '2021-02-08'),
(73, 'Hasan', 0, '2021-02-02'),
(74, 'Heru', 0, '2021-02-20'),
(75, 'Sinta', 0, '2021-02-27'),
(76, 'Evendi', 0, '2021-02-08'),
(77, 'Ganjar', 0, '2021-02-13'),
(78, 'Isna', 0, '2021-02-23'),
(79, 'Jumain', 0, '2021-02-10'),
(80, 'Budi', 0, '2021-02-26'),
(81, 'Hariyono', 0, '2021-02-12'),
(82, 'Yuli', 0, '2021-02-19'),
(83, 'Ida', 0, '2021-02-08'),
(84, 'Nasir', 0, '2021-02-05'),
(85, 'Hana', 0, '2021-02-04'),
(86, 'Mega', 0, '2021-02-04'),
(87, 'Sunawan', 0, '2021-02-06'),
(88, 'Gunawan', 0, '2021-02-27'),
(89, 'Tono', 0, '2021-02-26'),
(90, 'Mistari', 0, '2021-02-18'),
(91, 'Munir', 0, '2021-02-14'),
(92, 'Nia', 0, '2021-02-14'),
(93, 'Ilham', 0, '2021-02-27'),
(94, 'Lukman', 0, '2021-02-02'),
(95, 'Indah', 0, '2021-02-15'),
(96, 'Lestari', 0, '2021-02-27'),
(97, 'Taufik', 0, '2021-02-18'),
(98, 'Tari', 0, '2021-02-24'),
(99, 'Sandi', 0, '2021-02-14'),
(100, 'Sanjaya', 0, '2021-02-20'),
(126, 'Budi', 0, '2022-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `transaction_id` int(11) NOT NULL,
  `kode_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`transaction_id`, `kode_produk`) VALUES
(0, 0),
(1, 8),
(1, 9),
(1, 14),
(1, 17),
(2, 1),
(2, 2),
(2, 4),
(2, 5),
(3, 3),
(3, 4),
(3, 5),
(3, 7),
(4, 4),
(4, 5),
(4, 6),
(4, 8),
(5, 5),
(5, 12),
(5, 18),
(5, 20),
(6, 3),
(6, 4),
(6, 13),
(6, 16),
(7, 2),
(7, 3),
(8, 5),
(8, 8),
(8, 14),
(9, 1),
(9, 3),
(9, 15),
(10, 3),
(10, 5),
(10, 7),
(10, 11),
(11, 1),
(11, 5),
(11, 6),
(11, 7),
(12, 3),
(12, 7),
(12, 8),
(12, 19),
(13, 11),
(13, 14),
(13, 15),
(13, 17),
(14, 12),
(14, 16),
(14, 17),
(14, 20),
(15, 1),
(15, 4),
(15, 5),
(16, 15),
(16, 17),
(17, 3),
(17, 5),
(17, 19),
(18, 2),
(18, 7),
(19, 14),
(19, 17),
(19, 18),
(19, 20),
(20, 2),
(20, 10),
(20, 12),
(21, 4),
(21, 6),
(21, 16),
(22, 5),
(22, 6),
(22, 7),
(22, 9),
(23, 7),
(23, 8),
(24, 4),
(24, 14),
(24, 17),
(24, 19),
(25, 16),
(25, 17),
(25, 18),
(25, 20),
(26, 3),
(26, 10),
(27, 7),
(27, 9),
(27, 10),
(28, 3),
(28, 7),
(28, 12),
(29, 3),
(29, 4),
(29, 17),
(29, 18),
(30, 10),
(30, 15),
(30, 16),
(30, 19),
(31, 13),
(31, 15),
(31, 17),
(31, 20),
(32, 5),
(32, 10),
(33, 7),
(33, 20),
(34, 1),
(34, 4),
(34, 7),
(34, 9),
(35, 9),
(35, 16),
(35, 17),
(36, 2),
(36, 5),
(36, 8),
(36, 10),
(37, 1),
(37, 9),
(37, 10),
(37, 11),
(38, 6),
(38, 9),
(38, 10),
(39, 8),
(39, 9),
(40, 3),
(40, 7),
(40, 13),
(41, 1),
(41, 5),
(42, 6),
(42, 8),
(42, 9),
(43, 7),
(43, 15),
(43, 16),
(44, 8),
(44, 9),
(44, 10),
(45, 17),
(45, 18),
(45, 19),
(45, 20),
(46, 18),
(46, 20),
(47, 5),
(47, 6),
(48, 5),
(48, 12),
(49, 17),
(49, 19),
(50, 1),
(50, 15),
(50, 16),
(50, 17),
(51, 4),
(51, 5),
(52, 10),
(52, 19),
(52, 20),
(53, 16),
(53, 19),
(54, 6),
(54, 14),
(54, 15),
(55, 11),
(55, 12),
(56, 9),
(56, 10),
(56, 17),
(56, 18),
(57, 8),
(57, 14),
(57, 16),
(58, 7),
(58, 11),
(58, 13),
(58, 14),
(59, 1),
(59, 3),
(59, 6),
(59, 9),
(60, 9),
(60, 12),
(60, 13),
(60, 14),
(61, 2),
(61, 15),
(61, 16),
(62, 11),
(62, 15),
(63, 19),
(63, 20),
(64, 3),
(64, 10),
(65, 14),
(65, 17),
(65, 18),
(66, 1),
(66, 13),
(66, 14),
(67, 9),
(67, 11),
(67, 13),
(67, 19),
(68, 11),
(68, 20),
(69, 4),
(69, 13),
(70, 2),
(70, 7),
(70, 12),
(71, 1),
(71, 9),
(71, 15),
(71, 16),
(72, 7),
(72, 10),
(72, 15),
(73, 1),
(73, 2),
(73, 3),
(73, 5),
(74, 1),
(74, 5),
(74, 6),
(74, 10),
(75, 7),
(75, 9),
(75, 11),
(75, 12),
(76, 2),
(76, 3),
(76, 4),
(76, 5),
(77, 4),
(77, 5),
(77, 6),
(77, 7),
(78, 2),
(78, 11),
(78, 12),
(78, 13),
(79, 2),
(79, 20),
(80, 5),
(80, 12),
(80, 14),
(81, 7),
(81, 9),
(81, 11),
(81, 13),
(82, 1),
(82, 2),
(82, 3),
(82, 13),
(83, 1),
(83, 6),
(83, 15),
(84, 2),
(84, 7),
(84, 9),
(85, 7),
(85, 9),
(85, 11),
(85, 17),
(86, 8),
(86, 9),
(86, 10),
(86, 20),
(87, 3),
(87, 6),
(87, 7),
(88, 1),
(88, 52),
(89, 5),
(89, 17),
(90, 5),
(90, 6),
(90, 7),
(90, 19),
(91, 14),
(91, 15),
(91, 16),
(91, 19),
(92, 13),
(92, 15),
(92, 16),
(93, 11),
(93, 12),
(93, 13),
(94, 11),
(94, 13),
(94, 15),
(94, 16),
(95, 6),
(95, 7),
(95, 9),
(95, 10),
(96, 8),
(96, 10),
(97, 8),
(97, 10),
(97, 11),
(97, 12),
(98, 9),
(98, 17),
(98, 18),
(99, 16),
(99, 17),
(99, 20),
(100, 12),
(100, 18),
(126, 1),
(126, 3),
(126, 5);

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
  `role` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@live.com', NULL, '$2y$10$TNG7pZjmcPRBfocj8CecM.7.zqHztlWhyMul.4v.ScHkhFkCc3VWi', 'admin', NULL, NULL, 'EzlKlsbU2ka5xjQ9jEEhvFOrUaRw94iNIJHS7fNS1Oyg6JVQBlMIutZ3AvKP', '2021-12-15 05:12:34', '2021-12-29 22:48:58'),
(2, 'user1', 'user1@live.com', NULL, '$2y$10$TNG7pZjmcPRBfocj8CecM.7.zqHztlWhyMul.4v.ScHkhFkCc3VWi', 'user', NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id_rekomendasi`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`kode_transaksi`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id_rekomendasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
