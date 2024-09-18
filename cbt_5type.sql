-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 18, 2024 at 01:39 AM
-- Server version: 8.3.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbt_5soal`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `author` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

DROP TABLE IF EXISTS `jawaban`;
CREATE TABLE IF NOT EXISTS `jawaban` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kelas` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kodemapel` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlahsoal` int NOT NULL,
  `kodesoal` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `waktu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jawabansiswa` varchar(100) DEFAULT NULL,
  `benar` varchar(10) DEFAULT NULL,
  `salah` varchar(10) DEFAULT NULL,
  `nilai` varchar(10) DEFAULT NULL,
  `kuncisoal` varchar(100) DEFAULT NULL,
  `mulaiujian` varchar(12) NOT NULL,
  `lamaujian` varchar(12) NOT NULL,
  `waktuselesai` varchar(12) NOT NULL,
  `sisawaktu` varchar(8) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawabother`
--

DROP TABLE IF EXISTS `jawabother`;
CREATE TABLE IF NOT EXISTS `jawabother` (
  `id` varchar(100) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kodesoal` varchar(50) NOT NULL,
  `nomersoal` varchar(10) NOT NULL,
  `jawaban` longtext NOT NULL,
  `tipe` varchar(2) NOT NULL DEFAULT '0',
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `waktu` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaburaian`
--

DROP TABLE IF EXISTS `jawaburaian`;
CREATE TABLE IF NOT EXISTS `jawaburaian` (
  `id` varchar(100) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kodesoal` varchar(100) NOT NULL,
  `nomersoal` varchar(10) NOT NULL,
  `soal` longtext NOT NULL,
  `soal_gbr` varchar(50) NOT NULL,
  `soal_audio` varchar(50) NOT NULL,
  `jawaban` longtext NOT NULL,
  `nilai` varchar(2) NOT NULL DEFAULT '0',
  `file` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilaihasil`
--

DROP TABLE IF EXISTS `nilaihasil`;
CREATE TABLE IF NOT EXISTS `nilaihasil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nis` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kelas` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kodemapel` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlahsoal` int NOT NULL,
  `kodesoal` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` varchar(20) NOT NULL,
  `jawabansiswa` varchar(100) NOT NULL,
  `benar` varchar(10) NOT NULL,
  `salah` varchar(10) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `nilaiurai` varchar(5) NOT NULL,
  `kuncisoal` varchar(100) NOT NULL,
  `statuskoreksi` int NOT NULL,
  `waktuselesai` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `nis` (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id` int NOT NULL,
  `n_sekolah` varchar(30) NOT NULL,
  `sub_n_sekolah` varchar(50) NOT NULL,
  `kepsek` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jenis_ujian` varchar(30) NOT NULL,
  `kode_sekolah` varchar(30) NOT NULL,
  `logo` varchar(30) NOT NULL,
  `logo_ujian` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `tanggal` text NOT NULL,
  `th_ajaran` varchar(15) NOT NULL,
  `logo_kota` varchar(30) NOT NULL,
  `web` varchar(100) NOT NULL,
  `bg_login` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nis` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `kelas` text NOT NULL,
  `jurusan` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `Id_User` int NOT NULL DEFAULT '1',
  `Id_Usergroup_User` int NOT NULL DEFAULT '1',
  `foto` varchar(100) DEFAULT NULL,
  `sesi` int NOT NULL,
  `ruang` varchar(30) NOT NULL,
  `statuslogin` varchar(20) NOT NULL DEFAULT '0',
  `online` varchar(20) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`nis`),
  UNIQUE KEY `username_2` (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

DROP TABLE IF EXISTS `soal`;
CREATE TABLE IF NOT EXISTS `soal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenissoal` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodemapel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodesoal` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nomersoal` int NOT NULL,
  `soal` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambarsoal` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan5` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_a` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_b` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_c` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_d` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_e` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunci` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `audio` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id` int NOT NULL,
  `warna` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

DROP TABLE IF EXISTS `ujian`;
CREATE TABLE IF NOT EXISTS `ujian` (
  `Urut` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodesoal` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lamaujian` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunci` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` int DEFAULT NULL,
  `acak` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `opsi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Urut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jabatan` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `Id_User` int NOT NULL DEFAULT '1',
  `Id_Usergroup_User` int NOT NULL DEFAULT '1',
  `foto` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `admin_su` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`nip`),
  UNIQUE KEY `username_2` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
