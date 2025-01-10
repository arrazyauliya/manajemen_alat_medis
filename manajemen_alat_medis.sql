-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 08:53 AM
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
-- Database: `manajemen_alat_medis`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat_medis`
--

CREATE TABLE `alat_medis` (
  `id` int(11) NOT NULL,
  `nama_alat` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'aktif',
  `tanggal_pengadaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat_medis`
--

INSERT INTO `alat_medis` (`id`, `nama_alat`, `jenis`, `lokasi`, `status`, `tanggal_pengadaan`) VALUES
(2, 'Tensimeter Digital', 'Diagnostik', 'IGD', 'aktif', '2025-01-03'),
(3, 'Bed Side Monitor', 'Monitoring', 'ICU', 'aktif', '2025-01-02'),
(4, 'Ventilator', 'Life Support', 'ICU', 'aktif', '2025-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(1, 'Arrazy Auliya', '$2y$10$Hy7m9GOBpOqArt6WN.MwmeDEXdCHVkpsLEfHxKh2OmBqaJpTRNv22', 'arrazypratama@gmail.com', 'user', '2025-01-03 02:14:28'),
(2, 'Arzuna Mutria', '$2y$10$dNkcB1kuXzVcIBX7pknm3uplSOHAUJolNQAfusXZjgMRIlu1KtnTC', 'arzunamr@gmail.com', 'user', '2025-01-07 03:25:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_medis`
--
ALTER TABLE `alat_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_medis`
--
ALTER TABLE `alat_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
