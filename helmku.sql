-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 10:41 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

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
  `password` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pengguna`
--

INSERT INTO `data_pengguna` (`users_id`, `nama`, `email`, `no_hp`, `alamat_jalan`, `kecamatan`, `kelurahan`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Danang Kusuma', 'danang@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$Rt2BnqdX3eVJqMCtGB7vJu/wrhQbY9oFC8PcwToM.KlAxbC3teP1a', '2021-11-20 04:21:52', '2021-11-20 04:21:52');

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
(8, 'KYT', 'KYT Sport ', '1637072078_3534ee7278fc29178664.png', 3, 'KYT-6193bcce85c6c', '2021-11-16 21:14:38', '2021-11-19 02:59:14'),
(9, 'Cargloss', '<p><u>Huahwhewhewhsh putangina&nbsp;</u></p>', '1637072539_09cc38022c04104e48a8.jpg', 4, 'Cargloss-6193be9b79259', '2021-11-16 21:22:19', '2021-11-20 02:29:25'),
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
(12, 8, 'XL', 1, 800000),
(13, 8, 'L', 1, 499999),
(14, 9, 'XL', 59, 800000),
(15, 9, 'L', 10, 800000),
(16, 10, 'XL', 10, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id` int(11) NOT NULL,
  `kode_trx` varchar(100) NOT NULL,
  `id_buyer` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kd_bank` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `no_resi` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `total_bayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_trx` (`kode_trx`),
  ADD KEY `id_buyer` (`id_buyer`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `kd_bank` (`kd_bank`);

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
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_stok_produk`
--
ALTER TABLE `data_stok_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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

--
-- Constraints for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD CONSTRAINT `data_transaksi_ibfk_1` FOREIGN KEY (`id_buyer`) REFERENCES `data_pengguna` (`users_id`),
  ADD CONSTRAINT `data_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `data_produk` (`id`),
  ADD CONSTRAINT `data_transaksi_ibfk_3` FOREIGN KEY (`kd_bank`) REFERENCES `data_bank` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
