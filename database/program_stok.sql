-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 12:18 PM
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
-- Database: `program_stok`
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nm_barang` varchar(100) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nm_barang`, `id_satuan`, `id_jenis`, `harga`, `created_at`, `updated_at`) VALUES
(6, 'Gunting', 2, 1, 2000, '2022-06-13 07:39:08', '2022-07-01 12:15:50'),
(7, 'Blender', 2, 1, 10000, '2022-06-23 12:46:32', '2022-06-23 12:46:32'),
(8, 'Botol', 2, 1, 10000, '2022-06-26 06:27:38', '2022-06-26 06:27:38'),
(9, 'tes', 2, 1, 1, '2022-07-29 12:36:43', '2022-07-29 12:36:43'),
(10, 'sad', 2, 1, 1, '2022-07-29 12:42:38', '2022-07-29 12:42:38'),
(11, 'asd3532', 2, 1, 2, '2022-07-29 12:43:15', '2022-07-29 12:46:26'),
(12, 'asd', 2, 1, 2, '2022-07-29 12:43:32', '2022-07-29 12:43:32'),
(13, 'asd', 2, 1, 10000, '2022-07-29 12:44:50', '2022-07-29 12:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cabang`
--

CREATE TABLE `tb_cabang` (
  `id_cabang` int(11) NOT NULL,
  `nm_cabang` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_cabang`
--

INSERT INTO `tb_cabang` (`id_cabang`, `nm_cabang`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(2, 'Kayutangi 2', 'Jl. kayutangi 2 no.156', '0896232323', '2022-07-03 12:09:36', '2022-07-03 12:24:41'),
(3, 'Adiyaksa', 'Jl. adiyaksa 2', '0892323232', '2022-07-09 11:01:20', '2022-07-09 11:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `ket` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `jenis`, `ket`, `created_at`, `updated_at`) VALUES
(1, 'Alat', 'Barang Peralatan', '2022-06-13 04:12:52', '2022-06-13 04:51:51'),
(2, 'Bahan', 'Bahan Bumbu', '2022-06-13 04:13:15', '2022-06-26 07:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nm_pegawai` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nm_pegawai`, `posisi`, `tgl_masuk`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(4, 'Aldi', 'Manager', '2022-07-09', 'jl. alalak selatan', '0896232323', '2022-07-09 10:23:18', '2022-07-09 10:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemeliharaan`
--

CREATE TABLE `tb_pemeliharaan` (
  `id_pemeliharaan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pemeliharaan`
--

INSERT INTO `tb_pemeliharaan` (`id_pemeliharaan`, `id_barang`, `tgl`, `jumlah`, `ket`, `status`, `created_at`, `updated_at`) VALUES
(3, 8, '2022-06-26', 2, 'botol rusak', 'BELUM SELESAI', '2022-06-26 06:31:25', '2022-07-09 10:50:46'),
(4, 7, '2022-06-27', 2, 'rusak', 'SELESAI', '2022-06-26 06:37:19', '2022-07-09 10:50:46'),
(5, 6, '2022-09-20', 2, 'rusak guntingnya', 'SELESAI', '2022-09-20 12:08:16', '2022-09-20 12:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `ket` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `satuan`, `ket`, `created_at`, `updated_at`) VALUES
(2, 'Pcs', NULL, '2022-06-13 04:59:23', '2022-06-13 04:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_selesai_service`
--

CREATE TABLE `tb_selesai_service` (
  `id_service` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `biaya` int(11) NOT NULL,
  `ket` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_selesai_service`
--

INSERT INTO `tb_selesai_service` (`id_service`, `id_barang`, `tgl`, `biaya`, `ket`, `created_at`, `updated_at`) VALUES
(3, 7, '2022-07-09', 30000, 'mesin rusak', '2022-07-09 10:47:25', '2022-07-09 10:50:46'),
(4, 6, '2022-09-20', 100000, 'asd', '2022-09-20 12:08:42', '2022-09-20 12:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `admin` varchar(100) NOT NULL,
  `no_nota` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_stok`
--

INSERT INTO `tb_stok` (`id_stok_barang`, `id_barang`, `masuk`, `keluar`, `lokasi`, `status`, `tgl`, `id_jenis`, `admin`, `no_nota`, `created_at`, `updated_at`) VALUES
(5, 6, 2, 0, NULL, 'AWAL', '2022-06-13', 1, 'Aldi', '', '2022-06-13 07:39:08', '2022-06-13 07:39:08'),
(9, 6, 6, 0, NULL, 'MASUK', '2022-06-13', NULL, 'Aldi', '', '2022-06-13 08:25:14', '2022-06-13 08:35:39'),
(10, 7, 5, 0, NULL, 'AWAL', '2022-06-23', 1, 'Aldi', '', '2022-06-23 12:46:32', '2022-06-23 12:46:32'),
(11, 8, 1, 0, NULL, 'AWAL', '2022-06-26', 1, 'Aldi', '', '2022-06-26 06:27:38', '2022-06-26 06:27:38'),
(17, 6, 0, 2, 'Kayutangi 2', 'KELUAR', '2022-07-09', NULL, 'Aldi', '', '2022-07-09 11:09:13', '2022-07-09 11:09:13'),
(18, 6, 0, 3, 'Adiyaksa', 'KELUAR', '2022-07-08', NULL, 'Aldi', '', '2022-07-09 11:09:21', '2022-07-09 11:09:21'),
(19, 7, 0, 2, 'Kayutangi 2', 'KELUAR', '2022-07-09', NULL, 'Aldi', '', '2022-07-09 11:09:32', '2022-07-09 11:09:32'),
(20, 9, 1, 0, NULL, 'AWAL', '2022-07-29', 1, 'Aldi', '', '2022-07-29 12:36:44', '2022-07-29 12:36:44'),
(21, 10, 1, 0, NULL, 'AWAL', '2022-07-29', 1, 'Aldi', '', '2022-07-29 12:42:38', '2022-07-29 12:42:38'),
(22, 11, 1, 0, NULL, 'AWAL', '2022-07-29', 1, 'Aldi', '', '2022-07-29 12:43:15', '2022-07-29 12:43:15'),
(23, 12, 2, 0, NULL, 'AWAL', '2022-07-29', 1, 'Aldi', '', '2022-07-29 12:43:32', '2022-07-29 12:43:32'),
(24, 13, 1, 0, NULL, 'AWAL', '2022-07-29', 1, 'Aldi', '', '2022-07-29 12:44:50', '2022-07-29 12:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suplier`
--

CREATE TABLE `tb_suplier` (
  `id_suplier` int(11) NOT NULL,
  `nm_suplier` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_suplier`
--

INSERT INTO `tb_suplier` (`id_suplier`, `nm_suplier`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'PT. Prindavan', 'Jl. Belitung Darat', '081546462323', '2022-07-09 11:33:07', '2022-07-09 11:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Aldi', 'aldi', NULL, '$2y$10$d9pHLOnEafL6BsvcZnr9bOcn0SeZipecYfJvBCj6dcsMmMrtzAdmu', NULL, '2022-06-23 12:19:53', '2022-06-23 12:19:53'),
(4, 'Sidiq', 'admin', NULL, '$2y$10$Gi4M1FxuwvzR.rgTCvnV5ennN8kdp3CduQfSSZEf82p0oBoFcL74a', NULL, '2022-07-01 12:32:23', '2022-07-01 12:32:23');

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
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_pemeliharaan`
--
ALTER TABLE `tb_pemeliharaan`
  ADD PRIMARY KEY (`id_pemeliharaan`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_selesai_service`
--
ALTER TABLE `tb_selesai_service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok_barang`);

--
-- Indexes for table `tb_suplier`
--
ALTER TABLE `tb_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pemeliharaan`
--
ALTER TABLE `tb_pemeliharaan`
  MODIFY `id_pemeliharaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_selesai_service`
--
ALTER TABLE `tb_selesai_service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_suplier`
--
ALTER TABLE `tb_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
