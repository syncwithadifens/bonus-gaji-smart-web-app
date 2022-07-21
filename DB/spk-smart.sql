-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 09:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `no_kk` bigint(16) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `hasil_alternatif` double NOT NULL,
  `ket_alternatif` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `no_kk`, `nama_alternatif`, `hasil_alternatif`, `ket_alternatif`) VALUES
(22, 1050241708992581, 'Abdul Gofar', 100, 'Layak'),
(23, 1245245708909011, 'Yadi Supriyadi', 12.5, 'Tidak Layak'),
(24, 2050247908900001, 'Rohilah', 30, 'Tidak Layak'),
(25, 9050241708902409, 'Pawit Prayitno', 75, 'Layak'),
(26, 2970253702928892, 'Toyo Utoyo', 87.5, 'Layak');

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
(203, 22, 9, 100, 30),
(204, 22, 17, 100, 25),
(205, 22, 40, 100, 30),
(206, 22, 118, 100, 15),
(207, 25, 9, 100, 30),
(208, 25, 17, 0, 0),
(209, 25, 40, 100, 30),
(210, 25, 118, 100, 15),
(211, 24, 9, 0, 0),
(212, 24, 17, 0, 0),
(213, 24, 40, 100, 30),
(214, 24, 118, 0, 0),
(215, 26, 9, 100, 30),
(216, 26, 17, 50, 12.5),
(217, 26, 40, 100, 30),
(218, 26, 118, 100, 15),
(219, 23, 9, 0, 0),
(220, 23, 17, 50, 12.5),
(221, 23, 40, 0, 0),
(222, 23, 118, 0, 0);

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
(9, 'Status Pekerjaan', 30, 0.3),
(17, 'Tanggungan Anak', 25, 0.25),
(40, 'Jumlah Penghasilan', 30, 0.3),
(118, 'Jenis Tempat Tinggal', 15, 0.15);

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
(2, 'Kontrak', 50, 9),
(4, 'Tidak Menentu', 100, 9),
(6, '> 3 juta', 50, 1),
(9, '< 2 juta', 100, 1),
(11, '> 4 juta', 0, 1),
(12, 'Tetap', 0, 9),
(13, 'Roda dua', 100, 11),
(14, 'Roda empat', 0, 11),
(19, 'Anjay', 25, 16),
(20, 'Lebih dari 4', 100, 17),
(21, '2 sampai 4', 50, 17),
(22, '0 sampai 1', 0, 17),
(25, '2 juta sampai 4 juta', 50, 40),
(26, 'Kurang dari 2 juta', 100, 40),
(34, 'Lebih dari 4 juta', 0, 40),
(35, 'Tanah 1 hektar', 0, 106),
(36, 'Tidak ada', 100, 106),
(38, 'Pribadi', 0, 118),
(39, 'Kontrak', 100, 118);

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
(24, 'Panji Bangun Pangestu', 'panji', 'default.png', '$2y$10$fyqiPXV2IgMarnA5Hqt1JeVtVN7taoD6MslrIXL7ZWK7/nbd9ewW6', 1607590045);

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
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `alternatif_kriteria`
--
ALTER TABLE `alternatif_kriteria`
  MODIFY `id_alternatif_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
