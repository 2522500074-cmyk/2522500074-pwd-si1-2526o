-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2026 at 11:09 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd2025`
--
CREATE DATABASE IF NOT EXISTS `db_pwd2025` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_pwd2025`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biodata_daftar_pengunjung`
--

CREATE TABLE `tbl_biodata_daftar_pengunjung` (
  `cid` int(11) NOT NULL,
  `mkode_pengunjung` varchar(100) DEFAULT NULL,
  `mnama_pengunjung` varchar(100) DEFAULT NULL,
  `malamat_rumah` varchar(100) DEFAULT NULL,
  `mtanggal_kunjungan` varchar(100) DEFAULT NULL,
  `mhobi` varchar(100) DEFAULT NULL,
  `masal_SLTA` varchar(100) DEFAULT NULL,
  `mpekerjaan` varchar(100) DEFAULT NULL,
  `mnama_orang_tua` varchar(100) DEFAULT NULL,
  `mnama_pacar` varchar(100) DEFAULT NULL,
  `mnama_mantan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_biodata_daftar_pengunjung`
--

INSERT INTO `tbl_biodata_daftar_pengunjung` (`cid`, `mkode_pengunjung`, `mnama_pengunjung`, `malamat_rumah`, `mtanggal_kunjungan`, `mhobi`, `masal_SLTA`, `mpekerjaan`, `mnama_orang_tua`, `mnama_pacar`, `mnama_mantan`) VALUES
(2, 'REF123ABC', 'Meciww', 'Jl.Tarumanegara', '24/03/2026', 'nyanyi, dengerin lagu, jalan jalan, banyakkkla', 'SMK Negeri 1 Sungailiat', 'Masih menjadi Mahasiswa', 'Edi Ridwan/Linda Kartini', 'Iyannn\'-\'', 'Gak ada kayaknya wkwk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biodata_mahasiswa_sederhana`
--

CREATE TABLE `tbl_biodata_mahasiswa_sederhana` (
  `cid` int(11) NOT NULL,
  `cnim` varchar(100) DEFAULT NULL,
  `cnama_lengkap` varchar(100) DEFAULT NULL,
  `ctempat_lahir` varchar(100) DEFAULT NULL,
  `ctanggal_lahir` varchar(100) DEFAULT NULL,
  `chobi` varchar(100) DEFAULT NULL,
  `cpasangan` varchar(100) DEFAULT NULL,
  `cpekerjaan` varchar(100) DEFAULT NULL,
  `cnama_orang_tua` varchar(100) DEFAULT NULL,
  `cnama_kakak` varchar(100) DEFAULT NULL,
  `cnama_adik` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_biodata_mahasiswa_sederhana`
--

INSERT INTO `tbl_biodata_mahasiswa_sederhana` (`cid`, `cnim`, `cnama_lengkap`, `ctempat_lahir`, `ctanggal_lahir`, `chobi`, `cpasangan`, `cpekerjaan`, `cnama_orang_tua`, `cnama_kakak`, `cnama_adik`) VALUES
(2, '2522500074', 'Engrasia Masyithah', 'Sungailiat', '24 Maret 2007', 'makan, main, ngetik', 'adaa dung', 'no no', 'Bapak Edi Ridwan, Ibu Linda Kartini', 'saya kakaknya', 'Jihan dan Alesha'),
(3, '2522500074', 'Engrasia Masyithah', 'Sungailiat', '24 Maret 2007', 'makan, main, ngetik', 'adaa dung', 'no no', 'Bapak Edi Ridwan, Ibu Linda Kartini', 'saya kakaknya', 'Jihan dan Alesha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `cid` int(11) NOT NULL,
  `cnama` varchar(100) DEFAULT NULL,
  `cemail` varchar(100) DEFAULT NULL,
  `cpesan` text,
  `dcreated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`cid`, `cnama`, `cemail`, `cpesan`, `dcreated_at`) VALUES
(1, 'Yohanes Setiawan Japriadi', 'ysetiawanj@atmaluhur.ac.id', 'Ayo yang teliti belajar pemrograman web dasarnya, jangan membiasakan typo', '2025-12-16 11:00:25'),
(2, 'Gracella Edrea Japriadi', 'cellajapriadi@gmail.com', 'ayo kakak-kakak yang semangat belajarnya', '2025-12-16 11:00:25'),
(3, 'Wulan Dari Belinyu', 'wulanbly@gmail.com', 'aku pasti menang', '2025-12-16 11:00:25'),
(4, 'Melvyn Hadi Santo M.Kom.', 'hadi.melvyn@gmail.com', 'Maju tak gentar membela yang benar, pendaftaran selalu di awal, tetapi penyesalan selalu di akhir', '2025-12-16 11:00:25'),
(5, 'Nabila Saskia Gotik', 'nabila@gotik.com', 'Adit rambut bagus banget, dikuncir lagi', '2025-12-16 11:00:25'),
(6, 'Redia Cakep', 'redia@cakep.com', 'walau hujan aku tetap semangat', '2025-12-16 11:00:25'),
(7, 'Junaidi Hadiwijaya', 'juned@gmail.com', 'Saya mau jadi dosen di atma luhur', '2025-12-16 11:00:25'),
(8, 'Nurfadilah', 'nur@cantil.ocm', 'Nur kadang-kadang berdansa', '2025-12-16 11:00:25'),
(9, 'Adit Ganteng Banget', 'adit@goku.com', 'Adit mirip son goku sebelum gunting rambut', '2025-12-16 11:00:25'),
(10, 'aidil ganteng', 'aidil@dr.semabgun', ' kayak bule dari eropa', '2025-12-16 11:00:25'),
(11, 'Cat diony', 'catdiony@gmail.com', 'diony hari ini tampak bersinar teramg', '2025-12-16 11:00:25'),
(16, 'mesi', '2522500074@mahasiswa.atmaluhur.ac.id', 'yayayayayya', '2026-01-29 17:44:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_biodata_daftar_pengunjung`
--
ALTER TABLE `tbl_biodata_daftar_pengunjung`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_biodata_mahasiswa_sederhana`
--
ALTER TABLE `tbl_biodata_mahasiswa_sederhana`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_biodata_daftar_pengunjung`
--
ALTER TABLE `tbl_biodata_daftar_pengunjung`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_biodata_mahasiswa_sederhana`
--
ALTER TABLE `tbl_biodata_mahasiswa_sederhana`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
