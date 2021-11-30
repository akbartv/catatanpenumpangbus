-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 08:38 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipbus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE IF NOT EXISTS `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
(18, 'Pudak Payung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pencatatan`
--

CREATE TABLE IF NOT EXISTS `tb_pencatatan` (
  `id_pencatatan` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time(5) DEFAULT NULL,
  `no_polisi` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_kru` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jumlah_penumpang` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_pencatatan`
--

INSERT INTO `tb_pencatatan` (`id_pencatatan`, `tanggal`, `jam`, `no_polisi`, `nama_kru`, `jumlah_penumpang`, `id_user`, `id_lokasi`) VALUES
(45, '2015-06-22', '02:16:00.00000', 'H 0129 MM', 'Danang', 100, 18, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengontrol`
--

CREATE TABLE IF NOT EXISTS `tb_pengontrol` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `nama_pengontrol` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'pengontrol_lokasi / kepala_pengontrol'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_pengontrol`
--

INSERT INTO `tb_pengontrol` (`id_user`, `username`, `password`, `lokasi`, `nama_pengontrol`, `level`) VALUES
(3, 'admin', 'admin', NULL, 'Kepala Pengontrol', 'kepala_pengontrol'),
(18, 'payung', 'payung', 18, 'Pudak Payung', 'pengontrol_lokasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_pencatatan`
--
ALTER TABLE `tb_pencatatan`
  ADD PRIMARY KEY (`id_pencatatan`), ADD KEY `FK_Pencatatan_Lokasi` (`id_lokasi`), ADD KEY `FK_Pencatatan_Pengontrol` (`id_user`);

--
-- Indexes for table `tb_pengontrol`
--
ALTER TABLE `tb_pengontrol`
  ADD PRIMARY KEY (`id_user`), ADD KEY `FK_Pengontrol_Lokasi` (`lokasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_pencatatan`
--
ALTER TABLE `tb_pencatatan`
  MODIFY `id_pencatatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tb_pengontrol`
--
ALTER TABLE `tb_pengontrol`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pencatatan`
--
ALTER TABLE `tb_pencatatan`
ADD CONSTRAINT `FK_Pencatatan_Lokasi` FOREIGN KEY (`id_lokasi`) REFERENCES `tb_lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_Pencatatan_Pengontrol` FOREIGN KEY (`id_user`) REFERENCES `tb_pengontrol` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengontrol`
--
ALTER TABLE `tb_pengontrol`
ADD CONSTRAINT `FK_Pengontrol_Lokasi` FOREIGN KEY (`lokasi`) REFERENCES `tb_lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
