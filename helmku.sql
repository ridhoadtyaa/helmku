-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 09:07 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28
CREATE database helmku;
use helmku;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helmku`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id`, `nama`, `username`, `email`, `password`) VALUES
(1, 'SuperAdmin', 'admin', 'admin@gmail.com', '$2y$10$GwcFaZlD28AT6Bqe6gjrPuZoG10zzxmA/brfnSJC3kmtcscB46lWe');

-- --------------------------------------------------------

--
-- Table structure for table `data_bank`
--

CREATE TABLE `data_bank` (
  `id` int(11) NOT NULL,
  `nama_bank` int(11) NOT NULL,
  `no_rek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_flashsale`
--

CREATE TABLE `data_flashsale` (
  `id_produk` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `harga_sale` int(20) NOT NULL,
  `start_sale` varchar(100) NOT NULL,
  `end_sale` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_kategori`
--

CREATE TABLE `data_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kategori`
--

INSERT INTO `data_kategori` (`id_kategori`, `nama`) VALUES
(3, 'Sport'),
(4, 'Bogo');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengguna`
--

CREATE TABLE `data_pengguna` (
  `users_id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat_jalan` text DEFAULT NULL,
  `kecamatan` varchar(180) DEFAULT NULL,
  `kelurahan` varchar(180) DEFAULT NULL,
  `kota` varchar(170) NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pengguna`
--

INSERT INTO `data_pengguna` (`users_id`, `nama`, `email`, `no_hp`, `alamat_jalan`, `kecamatan`, `kelurahan`, `kota`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Danang Kusuma', 'danang@gmail.com', '0923912838', 'ijsaisja', 'jaisjais', 'aisjaisj', 'saksjasj', '$2y$10$Rt2BnqdX3eVJqMCtGB7vJu/wrhQbY9oFC8PcwToM.KlAxbC3teP1a', '2021-11-20 04:21:52', '2021-11-23 03:47:46'),
(2, 'asas', 'asas@gmail.com', NULL, NULL, NULL, NULL, '', '$2y$10$9JhjjUgYR8W0SngzbfMJJuWVJMPzHLHPdq6fvgFVLBIbwUwzYqxWW', '2021-11-20 17:37:43', '2021-11-20 17:37:43'),
(3, 'sla', 'sla@gmail.com', NULL, NULL, NULL, NULL, '', '$2y$10$Imn1h3oZZ4MJXS7JTc5fQuE96l.AIRtl/9eUtyiJqncCtexWnaIU6', '2021-11-20 17:42:22', '2021-11-20 17:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `data_produk`
--

CREATE TABLE `data_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `kategori` int(100) NOT NULL,
  `url_slug` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_produk`
--

INSERT INTO `data_produk` (`id`, `nama`, `deskripsi`, `gambar`, `kategori`, `url_slug`, `created_at`, `updated_at`) VALUES
(8, 'KYT', 'KYT Sport ', '1637072078_3534ee7278fc29178664.png', 3, 'KYT-6193bcce85c6c', '2021-11-16 21:14:38', '2021-11-22 07:34:45'),
(9, 'Cargloss', '<p><u>Huahwhewhewhsh putangina </u></p>', '1637072539_09cc38022c04104e48a8.jpg', 4, 'Cargloss-6193be9b79259', '2021-11-16 21:22:19', '2021-11-22 04:18:48'),
(10, 'Helm Bogo Classic Dewasa Kaca Datar SNI', 'ok', '1637093563_80d8a40e7ec8bbd5ca42.jfif', 4, 'Helm-Bogo-Classic-Dewasa-Kaca-Datar-SNI-619410bb172bf', '2021-11-17 03:12:43', '2021-11-17 03:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `data_stok_produk`
--

CREATE TABLE `data_stok_produk` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `ukuran` varchar(5) NOT NULL,
  `stok` int(10) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_stok_produk`
--

INSERT INTO `data_stok_produk` (`id`, `id_produk`, `ukuran`, `stok`, `harga`) VALUES
(12, 8, 'XL', 0, 800000),
(13, 8, 'L', 0, 499999),
(14, 9, 'XL', 59, 800000),
(15, 9, 'L', 0, 800000),
(16, 10, 'XL', 10, 400000),
(17, 8, 'M', 1, 900000);

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id` int(11) NOT NULL,
  `kode_trx` varchar(100) NOT NULL,
  `id_buyer` int(11) NOT NULL,
  `nama_produk` text DEFAULT NULL,
  `nama_bank` text DEFAULT NULL,
  `no_rek_bank` varchar(50) DEFAULT NULL,
  `variasi` text NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `no_resi` varchar(50) DEFAULT NULL,
  `harga` int(20) NOT NULL,
  `alamat_jalan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_transaksi`
--

INSERT INTO `data_transaksi` (`id`, `kode_trx`, `id_buyer`, `nama_produk`, `nama_bank`, `no_rek_bank`, `variasi`, `kuantitas`, `status`, `bukti_bayar`, `no_resi`, `harga`, `alamat_jalan`, `created_at`, `updated_at`) VALUES
(2, 'HLM619C0B223DB14', 1, 'Cargloss', NULL, NULL, 'XL', 1, 'Dibatalkan', NULL, NULL, 800000, 'ijsaisja', '2021-11-23 04:26:58', '2021-11-23 05:26:04'),
(3, 'HLM619C0CEEB7152', 1, 'Helm Bogo Classic Dewasa Kaca Datar SNI', NULL, NULL, 'XL', 1, 'Dibatalkan', NULL, NULL, 400000, 'ijsaisja', '2021-11-23 04:34:38', '2021-11-23 05:20:04'),
(4, 'HLM619C0CEEB7152', 1, 'Cargloss', NULL, NULL, 'XL', 1, 'Dibatalkan', NULL, NULL, 800000, 'ijsaisja', '2021-11-23 04:34:38', '2021-11-23 05:20:04'),
(5, 'HLM619C0CEEB7152', 1, 'KYT', NULL, NULL, 'M', 1, 'Dibatalkan', NULL, NULL, 900000, 'ijsaisja', '2021-11-23 04:34:38', '2021-11-23 05:20:04'),
(6, 'HLM619C0E1561321', 1, 'Cargloss', NULL, NULL, 'XL', 1, 'Dibatalkan', NULL, NULL, 800000, 'ijsaisja', '2021-11-23 04:39:33', '2021-11-23 05:25:38'),
(7, 'HLM619C190EED9F6', 1, 'Helm Bogo Classic Dewasa Kaca Datar SNI', NULL, NULL, 'XL', 1, 'Dibatalkan', NULL, NULL, 400000, 'ijsaisja', '2021-11-23 05:26:22', '2021-11-23 05:26:32'),
(8, 'HLM619C19311D5A5', 1, 'KYT', NULL, NULL, 'M', 1, 'Menunggu Pembayaran', NULL, NULL, 900000, 'ijsaisja', '2021-11-23 05:26:57', '2021-11-23 05:26:57'),
(9, 'HLM619C55A91AF02', 1, 'Cargloss', NULL, NULL, 'XL', 1, 'Dibatalkan', NULL, NULL, 800000, 'ijsaisja', '2021-11-23 09:44:57', '2021-11-23 09:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_bank`
--
ALTER TABLE `data_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_flashsale`
--
ALTER TABLE `data_flashsale`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `id_produk` (`id_produk`);

--
-- Indexes for table `data_kategori`
--
ALTER TABLE `data_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`kategori`);

--
-- Indexes for table `data_stok_produk`
--
ALTER TABLE `data_stok_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`) USING BTREE;

--
-- Indexes for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_bank`
--
ALTER TABLE `data_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_kategori`
--
ALTER TABLE `data_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_stok_produk`
--
ALTER TABLE `data_stok_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_flashsale`
--
ALTER TABLE `data_flashsale`
  ADD CONSTRAINT `data_flashsale_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `data_produk` (`id`);

--
-- Constraints for table `data_produk`
--
ALTER TABLE `data_produk`
  ADD CONSTRAINT `data_produk_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `data_kategori` (`id_kategori`);

--
-- Constraints for table `data_stok_produk`
--
ALTER TABLE `data_stok_produk`
  ADD CONSTRAINT `data_stok_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `data_produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
