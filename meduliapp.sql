-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2019 at 10:41 AM
-- Server version: 5.6.41
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meduliapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `super_user`
--

CREATE TABLE `super_user` (
  `id_super` int(11) NOT NULL,
  `fullName` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `status_nikah` int(2) DEFAULT '0',
  `status_kerja` int(2) DEFAULT '0',
  `asal_sekolah` varchar(256) DEFAULT NULL,
  `status_akun` int(2) NOT NULL,
  `tgl_sistem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_user`
--

INSERT INTO `super_user` (`id_super`, `fullName`, `email`, `username`, `password`, `tgl_lahir`, `status_nikah`, `status_kerja`, `asal_sekolah`, `status_akun`, `tgl_sistem`) VALUES
(1, 'Administrator', 'techinfo@gmail.com', 'admin', '$2y$10$LC68xlwoEmcE3DJZHavVA.44VEH1ECGOocEZ2rnTeN32p000BzNta', '2019-05-25', 0, 0, '0', 1, '2019-06-14 01:33:41'),
(2, 'John Wick', 'johnwick@gmail.com', 'john', '$2y$10$VgCNEJy/Hov5TNTOfuge6ObePsyNkDZyxluuY4Mbl8QLGLN5J6m4.', '2019-06-14', 0, 0, '0', 2, '2019-06-14 04:00:51'),
(4, 'joko', 'joko@gmail.com', 'joko', '$2y$10$EE82u9URqfrnWp631pmVLOGswkDbCXLCJUtYibnRBY3aCM7RkuWcG', '2001-11-10', 1, 2, '', 3, '2019-06-16 04:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `tm_kriteria`
--

CREATE TABLE `tm_kriteria` (
  `id_kriteria` int(5) NOT NULL,
  `jenis_kriteria` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_kriteria`
--

INSERT INTO `tm_kriteria` (`id_kriteria`, `jenis_kriteria`) VALUES
(1, 'Anak atau Balita Terlantar'),
(2, 'Anak Jalanan'),
(3, 'Korban Tindak Kekerasan '),
(4, 'Lanjut Usia Terlantar '),
(5, 'Penyandang Cacat '),
(6, 'Keluarga Fakir Miskin'),
(7, 'Keluarga Berumah Tidak Layak Huni'),
(8, 'Keluarga Bermasalah Sosial Psikologis, '),
(9, 'Korban Bencana Alam '),
(10, 'Korban Bencana Sosial atau Pengungsi '),
(11, 'Keluarga Rentan');

-- --------------------------------------------------------

--
-- Table structure for table `tm_pengaduan`
--

CREATE TABLE `tm_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_super` int(11) NOT NULL,
  `kode_campaign` varchar(8) DEFAULT NULL,
  `id_kriteria` int(5) DEFAULT NULL,
  `judul_campaign` varchar(128) DEFAULT NULL,
  `jumlah_keluarga` int(3) DEFAULT NULL,
  `lokasi_kejadian` text,
  `deskripsi` text,
  `fl_photo` text,
  `tgl_sistem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `super_user`
--
ALTER TABLE `super_user`
  ADD PRIMARY KEY (`id_super`);

--
-- Indexes for table `tm_kriteria`
--
ALTER TABLE `tm_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tm_pengaduan`
--
ALTER TABLE `tm_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `super_user`
--
ALTER TABLE `super_user`
  MODIFY `id_super` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tm_kriteria`
--
ALTER TABLE `tm_kriteria`
  MODIFY `id_kriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tm_pengaduan`
--
ALTER TABLE `tm_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
