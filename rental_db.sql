-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Sep 2021 pada 22.15
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_23_131639_create_table_product', 1),
(5, '2021_08_23_132441_create_order', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `namaMobil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `order_id`, `customer_id`, `namaMobil`, `plat`, `harga`, `img`, `status`, `created_at`, `updated_at`) VALUES
(1, 24, 'TRX-3N7Dfw6y3VpYtd2021-09-07', 9, 'Avanza/Xenia', '-', 300000, NULL, 3, '2021-09-06 18:10:06', '2021-09-07 21:44:54'),
(2, 13, 'TRX-1DbfMdtD0hmjXx2021-09-08', 9, 'Avanza (AT)', '-', 330000, NULL, 3, '2021-09-07 21:19:17', '2021-09-09 19:00:42'),
(3, 1, 'TRX-ou6VxlmyqTF1GB2021-09-10', 9, 'Avanza (AT)', '-', 250000, 'IzTGNUlmcTAWpczF1631213300.jpg', 3, '2021-09-09 19:13:48', '2021-09-09 22:43:21'),
(4, 1, 'TRX-iHGuhtnEqBcdpo2021-09-10', 9, 'Avanza (AT)', '-', 250000, 'IzTGNUlmcTAWpczF1631213300.jpg', 3, '2021-09-09 22:42:41', '2021-09-10 19:54:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) DEFAULT NULL,
  `namaMobil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `idUser`, `namaMobil`, `plat`, `harga`, `img`, `created_at`, `updated_at`) VALUES
(1, 4, 'Avanza (AT)', '-', 250000, 'IzTGNUlmcTAWpczF1631213300.jpg', '2021-09-06 16:59:13', '2021-09-09 18:48:19'),
(2, 4, 'Xenia (AT)', '-', 250000, '8gOHzvrexNTATcV31631213335.jpg', '2021-09-06 16:59:43', '2021-09-09 18:48:54'),
(3, 4, 'Fortuner VRZ (AT)', '-', 1200000, 'oLFQ5BMonSX65cQC1631213388.jpg', '2021-09-06 17:00:17', '2021-09-09 18:49:47'),
(4, 4, 'Fortuner TRD (AT)', '-', 600000, 'HEXE6E90MWMQEuwG1631213421.jpg', '2021-09-06 17:02:00', '2021-09-09 18:50:20'),
(5, 4, 'Innova Reborn (AT)', '-', 450000, 'e6oBZP5KF2s8I6RX1631213449.jpg', '2021-09-06 17:02:51', '2021-09-09 18:50:49'),
(6, 4, 'Innova (AT)', '-', 350000, '9BAItf3paJn6NXqv1631213472.jpg', '2021-09-06 17:03:20', '2021-09-09 18:51:12'),
(7, 5, 'Avanza', '-', 275000, NULL, '2021-09-06 17:07:59', '2021-09-06 17:07:59'),
(8, 5, 'Ertiga', '-', 300000, NULL, '2021-09-06 17:08:26', '2021-09-06 17:08:26'),
(9, 5, 'Agya/Ayla', '-', 250000, NULL, '2021-09-06 17:08:43', '2021-09-06 17:08:43'),
(10, 5, 'Pick Up', '-', 200000, NULL, '2021-09-06 17:09:02', '2021-09-06 17:09:02'),
(11, 5, 'Inova', '-', 350000, NULL, '2021-09-06 17:09:15', '2021-09-06 17:09:15'),
(12, 5, 'Sedan Pengantin', '-', 2500000, NULL, '2021-09-06 17:09:35', '2021-09-06 17:09:35'),
(13, 6, 'Avanza (AT)', '-', 330000, 'VhPWabaaqUctphLf1631215665.jpg', '2021-09-06 17:12:13', '2021-09-09 19:27:45'),
(14, 6, 'Xenia (AT)', '-', 300000, 'wQQpX6XEsh9ndUeI1631215699.jpg', '2021-09-06 17:12:34', '2021-09-09 19:28:18'),
(15, 6, 'Terios', '-', 350000, 'tyArQ4IkNyYRo2fd1631215924.jpg', '2021-09-06 17:12:56', '2021-09-09 19:32:04'),
(16, 6, 'Mobilio', '-', 300000, '714Y9NSQzOfeQfHs1631216025.jpg', '2021-09-06 17:13:08', '2021-09-09 19:33:44'),
(17, 6, 'Innova', '-', 400000, 'dw2A7nfo39yKzROs1631217265.jpg', '2021-09-06 17:13:24', '2021-09-09 19:54:25'),
(18, 6, 'Innova Reborn', '-', 450000, '6C9QCvIKv7HOLpmg1631217298.jpg', '2021-09-06 17:13:40', '2021-09-09 19:54:57'),
(19, 6, 'Fortuner VRZ (AT)', '-', 1000000, 'cA0sZ0ckbmX2zMPS1631217338.jpg', '2021-09-06 17:13:59', '2021-09-09 19:55:38'),
(20, 7, 'Avanza (AT)', '-', 450000, 'V91ZjBBPFJOoDXIU1631216283.jpg', '2021-09-06 17:16:07', '2021-09-09 19:38:03'),
(21, 7, 'Innova Reborn', '-', 650000, '0V3UUyFgfZP27fZq1631216314.jpg', '2021-09-06 17:16:26', '2021-09-09 19:38:34'),
(22, 7, 'Hiace', '-', 1500000, 'IC0M8skf5N0pKAZB1631216486.jpg', '2021-09-06 17:16:50', '2021-09-09 19:41:26'),
(23, 7, 'Hilux (AT)', '-', 1500000, NULL, '2021-09-06 17:17:16', '2021-09-06 17:17:16'),
(24, 8, 'Avanza/Xenia', '-', 300000, 'J6hULk89GdOwuGVS1631217442.jpg', '2021-09-06 17:20:07', '2021-09-09 19:57:21'),
(25, 8, 'Innova Reborn (AT)', '-', 650000, '7vSrX5i319iN22PC1631217470.jpg', '2021-09-06 17:20:42', '2021-09-09 19:57:49'),
(26, 8, 'Pick Up', '-', 250000, '2IZdti4ArS4sTxRo1631217499.jpg', '2021-09-06 17:21:04', '2021-09-09 19:58:18'),
(27, 8, 'Calya', '-', 300000, '5kzFRIc0agWy2Nd21631217528.jpg', '2021-09-06 17:21:21', '2021-09-09 19:58:47'),
(28, 8, 'Premium Cars For Wedding', '-', 2500000, 'gGpbWlLCJZcPrD8G1631217678.jpg', '2021-09-06 17:21:54', '2021-09-09 20:01:17'),
(29, 15, 'Hiace (BBM + Driver) ', '-', 1750000, 'inj8f3j0NqmCSLO41631220933.jpg', '2021-09-09 20:54:57', '2021-09-09 20:57:42'),
(30, 15, 'DC Triton 4x4 (BBM+Driver) ', '-', 1500000, 'IGbqMHo6ahc0qdCT1631221025.jpg', '2021-09-09 20:55:58', '2021-09-09 20:57:58'),
(31, 15, 'innova reborn (BBM + Driver) ', '-', 500000, 'vDezJvMVMV2yrXlD1631221146.jpg', '2021-09-09 20:58:39', '2021-09-09 20:59:06'),
(32, 16, 'innova reborn 2020', '-', 700000, 'TeqvbddxEwzRR93g1631222018.jpg', '2021-09-09 21:10:51', '2021-09-09 21:13:37'),
(33, 17, 'Toyota Avanza (BBM + Driver) ', '-', 450000, 'nJVFLvgkmO33wCCz1631222422.jpg', '2021-09-09 21:19:50', '2021-09-09 21:20:21'),
(34, 17, 'Toyota Innova', '-', 650000, 'GjvUfVLdf2bEDL8L1631222481.jpg', '2021-09-09 21:21:21', '2021-09-09 21:21:21'),
(35, 18, 'Innova ', '-', 450000, 'qAEURpBm8WBvRaxU1631222649.jpg', '2021-09-09 21:24:08', '2021-09-09 21:24:08'),
(36, 18, 'Avanza ', '-', 300000, '8VE2RKscPGHhQoqj1631222705.jpg', '2021-09-09 21:24:24', '2021-09-09 21:25:05'),
(37, 19, 'Avanza (BBM + Driver) ', '-', 450000, 'Cb5NAwG9C7tmgljO1631222987.jpg', '2021-09-09 21:29:46', '2021-09-09 21:29:46'),
(38, 19, 'Innova Reborn (BBM + Driver) ', '-', 700000, '8OmDTVxBQSWjEsyp1631223035.jpg', '2021-09-09 21:30:35', '2021-09-09 21:31:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profilephoto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(1) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `lati` double DEFAULT NULL,
  `longi` double DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `email_verified_at`, `password`, `phone`, `address`, `profilephoto`, `role`, `status`, `lati`, `longi`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Way Mili Rent Cars', 'waymili', 'waymili@mail.com', NULL, '$2y$10$VcTaiNc/kLeUQr.GiZ.GE.7rqQBNt0iBE8ZBy.5BkOb3.8MC29zQO', '082176416660', 'Perum Wijaya 3 blok C, jl. P. tritayasa no. 1 Sukabumi Indah kec. Sukabumi. Bandar Lampung', 'WmTCWnRv2xAl14E71631213222.jpg', 2, 'on', -5.393666, 105.2930765, NULL, '2021-09-06 16:53:23', '2021-09-09 18:47:02'),
(5, 'CV Tsamania Rent Cars', 'tsamania', 'tsamaniarc@yahoo.co.id', NULL, '$2y$10$FREM/XQFkSk5GYxDrjaEZuBIurSJs1eMKQ8PHrRXbB71mXdV65.w.', '082181154555', 'jl. Tulang bawang no 21 Enggal Tanjung karang', 'OUO6KjRhPYO07A0k1631213696.jpg', 2, 'on', -5.4174289, 105.2604833, NULL, '2021-09-06 17:06:48', '2021-09-10 16:19:03'),
(6, 'Naldi Rental', 'naldi', 'naldi@mail.com', NULL, '$2y$10$0BMSLAZMyMApSCn7stw.EOj5/epK3sDCmWgGTh9ohEauetGH7M4XW', '082180020111', 'Jl. Pajajaran kelurahan No.32, Jaga Baya I, Way Halim,\n\nBandar Lampung', 'pccLbz4sm2BNwMrW1631213073.jpg', 2, 'on', -5.4013764, 105.2631863, NULL, '2021-09-06 17:11:05', '2021-09-09 18:44:33'),
(7, 'SABAI 2 Rental', 'sabai', 'sabai@gmail.com', NULL, '$2y$10$lpYtNY2IRBylio9xJYTxvOkIYhGANsN0NroEzdVZPzdp.4A/3fY4m', '085353500500', 'Perum Sejahtera no 46,sidosari, kec. Natar. ', 'x3maGAtnvu7iVA7y1631213784.jpg', 2, 'on', -5.3962337, 105.297957, NULL, '2021-09-06 17:15:41', '2021-09-09 18:56:24'),
(8, 'Satria Rent Car', 'satria', 'satria@mail.com', NULL, '$2y$10$zM7v5fupDCK4F9EcwXP7Lu6.Tjdnrbl6Mh0YcsRH/yGLcPUAcnYSu', '082186182842', 'Gedong Meneng, kec. Rajabasa, Kota Bandar Lampung', 'P3JdiIlQZGiGcR351631213621.jpg', 2, 'on', -5.370106, 105.2450813, NULL, '2021-09-06 17:18:40', '2021-09-09 18:53:40'),
(9, 'Indrawan Franseda', 'indrawan', 'indrawanfranseda90@gmail.com', NULL, '$2y$10$fFs.KL64PxCQ2s7aOnYbu.mLLmNQybjMMxUNReO.O7HeBmyl9k3vq', '0895602315794', 'jl hj. zubaidah Blok B2 no34. (perum bakung) ', '2KhJ3zolP027Pshe1631213920.jpg', 1, 'off', NULL, NULL, NULL, '2021-09-06 17:52:16', '2021-09-10 18:19:12'),
(14, 'admin', NULL, 'admin@mail.com', NULL, '$2y$10$CisPP174JNuCX07iI4TKOebmfB7umguVOjhY.lkQ/R6MwmtNEVg92', NULL, NULL, NULL, 0, 'off', NULL, NULL, NULL, '2021-09-09 13:25:08', '2021-09-09 13:25:08'),
(15, 'GLG Rent Cars', 'glg', 'gilangperkasa@gmail.com', NULL, '$2y$10$wr3mMY41wB/Cxf3K59ygwuzPzdsx9HLU9Ws0xeqiLizMc8Im.t5b2', '08117902566', 'Gg. Permata No.08, Campang Raya, Sukabumi', 'uxmyV8PLQyEMqGLh1631221501.jpg', 2, 'on', -5.4019242, 105.3086284, NULL, '2021-09-09 20:52:49', '2021-09-09 22:02:46'),
(16, 'Gatsu Rental', 'gatsu', 'admin@gatsu90rentcar.com', NULL, '$2y$10$BrNFfFCeT5GJ2Cw.7A/w5eBVruef0W4XY.qGeMxpLc5.0Ad.BJOSO', '082380727263', 'Perum. Griya Abdi Negara, jl. P. trirtayasa no.10', 'fV0vMd2Gj5Z43SSL1631222049.jpg', 2, 'on', -5.4004983, 105.3231933, NULL, '2021-09-09 21:07:38', '2021-09-10 18:26:47'),
(17, 'Rafiq Rent', 'rafiq', 'rafiqrent@gmail.com', NULL, '$2y$10$hRAfekCtSer5GU9sPbD9xuezYPg6kY7uGpHIMRoUSuMbsKgfaiMBW', '081316296307', 'jl. tulung ametung no.24, kedaton, Bandarlampung', 'VMlOlIBbJXQZPoMc1631222346.jpg', 2, 'on', -5.3836633, 105.2628, NULL, '2021-09-09 21:16:02', '2021-09-10 18:27:52'),
(18, 'Rona Rent A Car', 'rona', 'ronarentacar@gmail.com', NULL, '$2y$10$h.LifrM4iiI66XMuXEOeOu/65q0.vjau06gDsLVFEelOwY5z1.QT2', '081272269067', 'campang Raya, kec. tj. karang, Bandar Lampung', 'fvangZtidSdjqECe1631222775.jpg', 2, 'on', -5.405868, 105.311812, NULL, '2021-09-09 21:23:12', '2021-09-10 18:33:43'),
(19, 'Ryan Rental', 'ryan', 'ryanrental@gmail.com', NULL, '$2y$10$YV60WNUc9F3/Z3ZEOMXs1e1hLmmWjLLOr2sQxGKgWwZbULfmYNSx6', '082280016060', 'jl. Pahlawan no17 kec. kedaton, bandarlampung', 'bv60ozL06InieVGj1631222929.jpg', 2, 'on', -5.3966485, 105.2636099, NULL, '2021-09-09 21:27:44', '2021-09-10 18:30:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
