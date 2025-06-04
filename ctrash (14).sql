-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 03:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctrash`
--

-- --------------------------------------------------------

--
-- Table structure for table `histori_pengumpulan`
--

CREATE TABLE `histori_pengumpulan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `jenis_sampah` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `histori_pengumpulan`
--

INSERT INTO `histori_pengumpulan` (`id`, `user_id`, `tanggal`, `tempat`, `jenis_sampah`, `kategori`, `ukuran`, `harga`, `jumlah`, `total`) VALUES
(3, 9, '2024-06-29', 'Tempat Pengepul Sampah \'Ctrash\' di Jalan HayamWuruk, Denpasar timur, Bali', 'kaleng vinilex', '', '30ml', 30000.00, 1, 30000.00),
(5, 8, '2024-06-27', 'Tempat Pengepul Sampah \'Ctrash\' di Jalan HayamWuruk, Denpasar timur, Bali', 'botol floridina', '', '25', 10000.00, 2, 20000.00),
(6, 8, '2024-06-27', 'Tempat Pengepul Sampah \'Ctrash\' di Jalan HayamWuruk, Denpasar timur, Bali', 'botol floridina', '', '25', 10000.00, 2, 20000.00),
(7, 4, '2024-06-30', 'Tempat Pengepul Sampah \'Ctrash\' di Jalan HayamWuruk, Denpasar timur, Bali', 'botol floridina', 'plastik', '25ml', 10000.00, 2, 20000.00),
(8, 10, '2024-06-30', 'Tempat Pengepul Sampah \'Ctrash\' di Jalan HayamWuruk, Denpasar timur, Bali', 'botol aqua', 'plastik', '2 Liter', 50000.00, 3, 150000.00),
(9, 8, '2024-06-20', 'Tempat Pengepul Sampah \'Ctrash\' di Jalan HayamWuruk, Denpasar timur, Bali', 'kaleng vinilex', 'kaleng', '30ml', 30000.00, 3, 90000.00),
(10, 4, '2024-06-30', 'Tempat Pengepul Sampah \'Ctrash\' di Jalan HayamWuruk, Denpasar timur, Bali', 'kaleng vinilex', 'kaleng', '30ml', 30000.00, 3, 90000.00);

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

CREATE TABLE `penarikan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_penarik` varchar(50) NOT NULL,
  `jumlah_penarikan` int(11) NOT NULL,
  `tgl_penarikan` date NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `validasi` enum('iya','tidak','menunggu') NOT NULL DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penarikan`
--

INSERT INTO `penarikan` (`id`, `user_id`, `nama_penarik`, `jumlah_penarikan`, `tgl_penarikan`, `lokasi`, `validasi`) VALUES
(12, 8, 'Elaina', 1000, '2024-06-28', 'Tempat penyihir elaina', 'tidak'),
(13, 4, 'Chisato Nishikigi', 10000, '2024-06-28', 'kota tokyo', 'iya'),
(14, 8, 'Juli', 1000, '2024-06-30', 'celuk', 'tidak'),
(15, 8, 'juli ganteng', 30000, '2024-06-30', 'Br celuk', 'tidak'),
(16, 8, 'elaina', 1000, '2024-06-30', 'Br.celuk', 'iya');

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `kategori` enum('plastik','kaleng') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id`, `nama`, `ukuran`, `harga`, `kategori`) VALUES
(1, 'botol floridina', '25ml', 10000.00, 'plastik'),
(2, 'kaleng vinilex', '30ml', 30000.00, 'kaleng'),
(3, 'botol aqua', '2 Liter', 50000.00, 'plastik'),
(4, 'kaleng nippon paint', '30 Liter', 2000.00, 'kaleng');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `saldo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `is_level` enum('admin','user') NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `alamat`, `no_hp`, `jenis_kelamin`, `foto_profil`, `tgl_lahir`, `password`, `saldo`, `is_level`, `status`) VALUES
(1, 'user2', 'user@gmail.com', 'Kampus Instiki', '08973858136', 'Laki-Laki', NULL, '2004-07-05', '123', 1000.00, '', 'aktif'),
(2, 'juli', 'juli@gmail.com', 'jln raya celuk', '08973858139', 'Laki-Laki', NULL, '2024-06-11', '12345', -38000.00, 'user', 'Aktif'),
(4, 'chisato', 'chisato@gmail.com', 'isekai', '075897497', 'Perempuan', '˗ˏˋ🌼´ˎ˗ Chisato Nishikigi.jpeg', '2004-07-05', '123', 150000.00, 'user', 'aktif'),
(5, 'admin', 'admin@gmail.com', 'instiki', '08973858133', 'Laki-Laki', NULL, '2014-06-10', '123', 5000.00, 'admin', 'aktif'),
(8, 'Elaina', 'elaina@gmail.com', 'isekai', '0896845691', 'Perempuan', 'ab77c973-d21a-45be-9d68-00e58079e427.jpeg', '2004-07-31', '12345', 129000.00, 'user', 'Aktif'),
(9, 'shiroko', 'shiroko@gmail.com', 'isekai', '08789749749', 'Perempuan', NULL, '2004-07-05', '123', -117500.00, 'user', 'aktif'),
(10, 'bailu', 'bailu@gmail.com', 'isekai', '0748875835', 'Perempuan', '★.jpeg', '2022-07-23', '123', 150000.00, 'user', 'aktif'),
(11, 'huohuo', 'huohuo@gmail.com', 'isekai', '08579748683', 'Perempuan', NULL, '2022-06-08', '123', 0.00, 'admin', 'aktif'),
(14, 'Hutao', 'hutao@gmail.com', 'Liyue', '0865863865', 'Perempuan', NULL, '2022-06-07', '123', 0.00, 'user', 'aktif'),
(16, 'clara', 'Clara@gmail.com', 'honkai star rail', '0897497923', 'Perempuan', NULL, '2004-06-30', '123', 0.00, 'user', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `histori_pengumpulan`
--
ALTER TABLE `histori_pengumpulan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_penarik` (`nama_penarik`),
  ADD KEY `penarikan_ibfk_1` (`user_id`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `histori_pengumpulan`
--
ALTER TABLE `histori_pengumpulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penarikan`
--
ALTER TABLE `penarikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sampah`
--
ALTER TABLE `sampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `histori_pengumpulan`
--
ALTER TABLE `histori_pengumpulan`
  ADD CONSTRAINT `histori_pengumpulan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
