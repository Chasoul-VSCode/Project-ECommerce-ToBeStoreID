-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2024 at 08:22 AM
-- Server version: 11.3.2-MariaDB-log
-- PHP Version: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_new_tobe`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kd_barang` varchar(50) DEFAULT NULL,
  `nama_b` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok_b` int(11) DEFAULT NULL,
  `harga_b` decimal(10,2) NOT NULL,
  `gambar_product` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kd_barang`, `nama_b`, `deskripsi`, `stok_b`, `harga_b`, `gambar_product`) VALUES
(60, 'BRG12010424204344', 'Iphone 15 Pro Maxxxx', 'Gold - 12/1TB GOLF', 40, 21499000.00, '1720538098_iphone15.jpg'),
(61, 'BRG12010424210141', 'IPhone XRRRR', 'Black - 4/256GB HITA', 218, 7999000.00, '1720538171_iphone xr.jpg'),
(64, 'BRG12010424302432', 'IPhone 13', 'Black - 4/256GB SAPIPIPIPI', 100, 13499000.00, '1720540992_iphone13black.jpg'),
(69, 'BRG12010433201203', 'IPhone xs max', '4/256GB AAA', 29, 4999000.00, '1720600178_iphonexs.jpg'),
(70, 'BRG12010433202431', 'IPhone 14 PRO MAX', '8/512GB', 10, 25299000.00, '1720600366_IPHONE14PM.jpg'),
(71, 'sss000', 'bac', 'a', 40, 10000.00, '100000'),
(72, 'BRG12011032004041', 'SHA', 'SHAAAA', 50, 50.00, '1720969271_Screenshot 2023-10-15 190405.png'),
(73, 'BRG12011032031211', 'AA', '555', 555, 5555.00, '1720970806_Screenshot 2023-11-02 135503.png');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `kd_user` varchar(50) NOT NULL,
  `kd_seller` varchar(20) NOT NULL,
  `kd_chat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `text_chat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `kd_user`, `kd_seller`, `kd_chat`, `tanggal`, `jam`, `text_chat`) VALUES
(2, 'S01646', '0', '1', '2024-07-02', '15:04:06', 'Hello kak apa produk masih ready?'),
(3, '0', 'S01020', '2', '2024-07-02', '15:04:06', 'Ready kak'),
(4, 'U12345', 'S01020', 'CHT20240714152411', '2024-07-14', '15:24:11', 'Ini adalah pesan chat'),
(5, '0', 'S01020', 'CHT20240714154317', '2024-07-14', '15:43:17', 'Hello, how can I help you?');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_06_17_040102_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `kd_pengiriman` varchar(50) NOT NULL,
  `nama_kurir` varchar(100) DEFAULT NULL,
  `alamat_tujuan` text DEFAULT NULL,
  `kd_transaksi` varchar(13) NOT NULL,
  `status_pengiriman` enum('Sampai','Perjalanan','Proses','') NOT NULL,
  `ongkir` int(20) NOT NULL DEFAULT 9000
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `kd_pengiriman`, `nama_kurir`, `alamat_tujuan`, `kd_transaksi`, `status_pengiriman`, `ongkir`) VALUES
(7, 'PAI', 'PAI', 'PAI', 'TRX2407151213', 'Perjalanan', 9000),
(8, 'JNE966', 'JNE Express', 'Jalan Merdeka No.1, Jakarta', 'TRX2407151213', 'Perjalanan', 9000),
(9, 'JNE978', 'JNE SAPI', 'Jalan Jakarta', 'TRX2407151213', 'Perjalanan', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `kd_seller` varchar(50) NOT NULL,
  `nama_seller` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `no_wa` int(11) NOT NULL,
  `alamat` text DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `foto_profile` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `kd_seller`, `nama_seller`, `email`, `username`, `pass`, `no_wa`, `alamat`, `nik`, `tgl_lahir`, `foto_profile`) VALUES
(7, 'S01020', 'ToBe Store ID', 'tobestore@gmail.com', 'tobe', '123', 62851729, 'Kota Bogor', 183214, '2001-01-01', 'my.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NUtSOgdVxGErUKeL1EKJNNC8XXE9BWuXBWz4anMf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZDVhSEJFbDdPWVZSaTh4UzJJeDdabzJESGVQOGVBQTVOREVnV0hYOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGF0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721009291);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kd_user` varchar(11) NOT NULL,
  `kd_seller` varchar(50) NOT NULL,
  `kd_transaksi` varchar(13) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `status_pembayaran` enum('Sukses','Cancel','Pending','') NOT NULL,
  `metode_pembayaran` enum('COD','Alfamart') NOT NULL,
  `batas_pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kd_user`, `kd_seller`, `kd_transaksi`, `kd_barang`, `jumlah_barang`, `total_harga`, `tgl_transaksi`, `status_pembayaran`, `metode_pembayaran`, `batas_pembayaran`) VALUES
(22, 'S01646', 'S01020', 'JNT131122', 'BRG12010424210141', 2, 15998000.00, '2024-07-10 04:23:40', 'Sukses', 'COD', '0000-00-00'),
(23, 'S01646', 'S01020', 'JNT781371', 'BRG12010433201203', 1, 4999000.00, '2024-07-10 08:33:53', 'Sukses', 'COD', '0000-00-00'),
(26, 'S01646', 'S01020', 'TRX001', 'BRG12010424210141', 2, 15998000.00, '2024-07-12 09:41:55', 'Pending', 'COD', '0000-00-00'),
(27, 'S01646', 'S01020', 'JN2', 'BRG12010424210141', 3, 23997000.00, '2024-07-13 15:15:18', 'Pending', 'COD', '2024-07-14'),
(29, 'S01646', 'S01020', 'TRX2407140751', 'BRG12010424210141', 3, 23997000.00, '2024-07-14 00:51:05', 'Pending', 'COD', '2024-07-15'),
(30, 'S01646', 'S01020', 'TRX2407151111', 'BRG12010424210141', 2, 15998000.00, '2024-07-15 04:11:26', 'Pending', 'COD', '2024-07-16'),
(31, 'S01646', 'S01020', 'TRX2407151128', 'BRG12010424210141', 2, 15998000.00, '2024-07-15 04:28:35', 'Pending', 'COD', '2024-07-16'),
(32, 'S01646', 'S01020', 'TRX2407151134', 'BRG12010424210141', 10, 79990000.00, '2024-07-15 04:34:58', 'Pending', 'COD', '2024-07-16'),
(33, 'S01646', 'S01020', 'TRX2407151138', 'BRG12010424210141', 3, 23997000.00, '2024-07-15 04:38:21', 'Pending', 'COD', '2024-07-16'),
(34, 'S01646', 'S01020', 'TRX2407151142', 'BRG12010424210141', 1, 7999000.00, '2024-07-15 04:42:52', 'Pending', 'COD', '2024-07-16'),
(35, 'S01646', 'S01020', 'TRX2407151213', 'BRG12010424210141', 4, 31996000.00, '2024-07-15 05:13:02', 'Pending', 'COD', '2024-07-16');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `reduce_stock_after_insert` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
    UPDATE barang
    SET stok_b = stok_b - NEW.jumlah_barang
    WHERE kd_barang = NEW.kd_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_status_pembayaran` BEFORE UPDATE ON `transaksi` FOR EACH ROW BEGIN
    IF NEW.tgl_transaksi > NEW.batas_pembayaran THEN
        SET NEW.status_pembayaran = 'Cancel';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_status_pembayaran_before_insert` BEFORE INSERT ON `transaksi` FOR EACH ROW BEGIN
    IF NEW.tgl_transaksi > NEW.batas_pembayaran THEN
        SET NEW.status_pembayaran = 'Cancel';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_total_harga` BEFORE INSERT ON `transaksi` FOR EACH ROW BEGIN
    DECLARE harga DECIMAL(10,2);
    SELECT harga_b INTO harga FROM barang WHERE kd_barang = NEW.kd_barang;
    SET NEW.total_harga = NEW.jumlah_barang * harga;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `troli`
--

CREATE TABLE `troli` (
  `id` int(11) NOT NULL,
  `kd_user` varchar(11) NOT NULL,
  `kd_seller` varchar(50) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `gambar_p` varchar(100) NOT NULL,
  `harga_b` float(10,2) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `troli`
--

INSERT INTO `troli` (`id`, `kd_user`, `kd_seller`, `kd_barang`, `gambar_p`, `harga_b`, `jumlah_barang`) VALUES
(2, 'S01646', 'S01020', 'BRG12010424204344', 'lai.png', 21499000.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `kd_user` varchar(11) NOT NULL,
  `nama_users` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `no_wa` int(11) NOT NULL,
  `alamat` text DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `foto_profile` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kd_user`, `nama_users`, `email`, `username`, `pass`, `no_wa`, `alamat`, `nik`, `tgl_lahir`, `foto_profile`) VALUES
(35, 'S01646', 'Alifa Sulaeman', 'alifasulaeman56@gmail.com', 'root', '555', 555, 'Ciampea', 0, '2024-07-03', ''),
(36, 'S01650', 'Ahmad Rifai', 'rifai@gmail.com', 'fai', '111', 111, 'bogor', 0, '2024-07-03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kd_transaksi` (`kd_transaksi`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_seller` (`kd_seller`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users` (`kd_user`),
  ADD KEY `fk_seller_T` (`kd_seller`),
  ADD KEY `fk_kd_barang` (`kd_barang`),
  ADD KEY `idx_kd_transaksi` (`kd_transaksi`);

--
-- Indexes for table `troli`
--
ALTER TABLE `troli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barang_kd_barang` (`kd_barang`),
  ADD KEY `troli_ibfk_1` (`kd_user`),
  ADD KEY `fk_seller_new` (`kd_seller`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_kd_user` (`kd_user`),
  ADD KEY `idx_kd_user_nama_lengkap` (`kd_user`,`nama_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `troli`
--
ALTER TABLE `troli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `fk_kd_transaksi` FOREIGN KEY (`kd_transaksi`) REFERENCES `transaksi` (`kd_transaksi`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_kd_barang` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_seller_T` FOREIGN KEY (`kd_seller`) REFERENCES `seller` (`kd_seller`),
  ADD CONSTRAINT `fk_users_kd_user` FOREIGN KEY (`kd_user`) REFERENCES `users` (`kd_user`);

--
-- Constraints for table `troli`
--
ALTER TABLE `troli`
  ADD CONSTRAINT `fk_barang_kd_barang` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`),
  ADD CONSTRAINT `fk_seller_new` FOREIGN KEY (`kd_seller`) REFERENCES `seller` (`kd_seller`),
  ADD CONSTRAINT `troli_ibfk_1` FOREIGN KEY (`kd_user`) REFERENCES `users` (`kd_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
