-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2022 at 05:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-smart`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_karyawan` varchar(16) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `hasil_alternatif` double NOT NULL,
  `ket_alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_karyawan`, `nama_alternatif`, `hasil_alternatif`, `ket_alternatif`) VALUES
(1, '1001', 'Afiv', 3.500000000000001, 'Tidak Mendapat Bonus'),
(2, '1002', 'Idam', 4.1000000000000005, 'Mendapat Bonus'),
(3, '1003', 'Mita', 3.7000000000000006, 'Tidak Mendapat Bonus'),
(4, '1004', 'Riangga', 4.2, 'Mendapat Bonus'),
(5, '1005', 'Sofi', 4.25, 'Mendapat Bonus');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_kriteria`
--

CREATE TABLE `alternatif_kriteria` (
  `id_alternatif_kriteria` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_alternatif_kriteria` double NOT NULL,
  `bobot_alternatif_kriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif_kriteria`
--

INSERT INTO `alternatif_kriteria` (`id_alternatif_kriteria`, `id_alternatif`, `id_kriteria`, `nilai_alternatif_kriteria`, `bobot_alternatif_kriteria`) VALUES
(1, 1, 1, 3, 0.75),
(2, 1, 2, 3, 0.45),
(3, 1, 3, 4, 0.4),
(4, 1, 4, 3, 0.3),
(5, 1, 5, 4, 0.4),
(6, 1, 6, 4, 0.2),
(7, 1, 7, 4, 0.6),
(8, 1, 8, 4, 0.2),
(9, 1, 9, 4, 0.2),
(10, 2, 1, 4, 1),
(11, 2, 2, 4, 0.6),
(12, 2, 3, 5, 0.5),
(13, 2, 4, 4, 0.4),
(14, 2, 5, 4, 0.4),
(15, 2, 6, 4, 0.2),
(16, 2, 7, 4, 0.6),
(17, 2, 8, 4, 0.2),
(18, 2, 9, 4, 0.2),
(19, 3, 1, 4, 1),
(20, 3, 2, 3, 0.45),
(21, 3, 3, 4, 0.4),
(22, 3, 4, 4, 0.4),
(23, 3, 5, 4, 0.4),
(24, 3, 6, 4, 0.2),
(25, 3, 7, 3, 0.45),
(26, 3, 8, 4, 0.2),
(27, 3, 9, 4, 0.2),
(28, 4, 1, 5, 1.25),
(29, 4, 2, 4, 0.6),
(30, 4, 3, 4, 0.4),
(31, 4, 4, 4, 0.4),
(32, 4, 5, 4, 0.4),
(33, 4, 6, 3, 0.15),
(34, 4, 7, 4, 0.6),
(35, 4, 8, 4, 0.2),
(36, 4, 9, 4, 0.2),
(37, 5, 1, 5, 1.25),
(38, 5, 2, 5, 0.75),
(39, 5, 3, 4, 0.4),
(40, 5, 4, 4, 0.4),
(41, 5, 5, 4, 0.4),
(42, 5, 6, 4, 0.2),
(43, 5, 7, 3, 0.45),
(44, 5, 8, 4, 0.2),
(45, 5, 9, 4, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `bobot_normalisasi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `bobot_normalisasi`) VALUES
(1, 'Disiplin Kerja', 25, 0.25),
(2, 'Tanggung Jawab', 15, 0.15),
(3, 'Inisiatif', 10, 0.1),
(4, 'Kreatifitas', 10, 0.1),
(5, 'Kemampuan mempertimbangkan dan mengambil keputusan', 10, 0.1),
(6, 'Kemampuan Adaptasi', 5, 0.05),
(7, 'Sikap terhadap atasan', 15, 0.15),
(8, 'Sikap terhadap teman kerja', 5, 0.05),
(9, 'Kesan dari tingkah laku', 5, 0.05);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `nama_sub_kriteria` varchar(50) NOT NULL,
  `nilai_sub_kriteria` double NOT NULL,
  `id_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `nama_sub_kriteria`, `nilai_sub_kriteria`, `id_kriteria`) VALUES
(1, 'Sangat Baik', 5, 1),
(2, 'Sangat Baik', 5, 3),
(3, 'Sangat Baik', 5, 6),
(4, 'Sangat Baik', 5, 5),
(5, 'Sangat Baik', 5, 9),
(6, 'Sangat Baik', 5, 4),
(8, 'Sangat Baik', 5, 7),
(9, 'Sangat Baik', 5, 8),
(10, 'Sangat Baik', 5, 2),
(11, 'Baik', 4, 1),
(12, 'Baik', 4, 3),
(13, 'Baik', 4, 6),
(14, 'Baik', 4, 5),
(15, 'Baik', 4, 9),
(16, 'Baik', 4, 4),
(17, 'Baik', 4, 7),
(18, 'Baik', 4, 8),
(19, 'Baik', 4, 2),
(20, 'Cukup', 3, 1),
(21, 'Cukup', 3, 3),
(22, 'Cukup', 3, 6),
(23, 'Cukup', 3, 9),
(24, 'Cukup', 3, 4),
(25, 'Cukup', 3, 5),
(26, 'Cukup', 3, 7),
(27, 'Cukup', 3, 8),
(28, 'Cukup', 3, 2),
(29, 'Sedang', 2, 1),
(30, 'Sedang', 2, 3),
(31, 'Sedang', 2, 6),
(32, 'Sedang', 2, 5),
(33, 'Sedang', 2, 9),
(34, 'Sedang', 2, 4),
(35, 'Sedang', 2, 7),
(36, 'Sedang', 2, 8),
(37, 'Sedang', 2, 2),
(38, 'Kurang', 1, 1),
(39, 'Kurang', 1, 3),
(40, 'Kurang', 1, 6),
(41, 'Kurang', 1, 5),
(42, 'Kurang', 1, 9),
(43, 'Kurang', 1, 4),
(44, 'Kurang', 1, 7),
(45, 'Kurang', 1, 8),
(46, 'Kurang', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `image`, `password`, `date_created`) VALUES
(25, 'Afiv Dicky Efendy', 'admin', 'killua2.jpg', '$2y$10$wyLstqg/.5FZKA8m0zIVneMIl7hnA8DMVml4iM8CRuIYDQhcEVhiC', 1658417006);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `alternatif_kriteria`
--
ALTER TABLE `alternatif_kriteria`
  ADD PRIMARY KEY (`id_alternatif_kriteria`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `alternatif_kriteria`
--
ALTER TABLE `alternatif_kriteria`
  MODIFY `id_alternatif_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
