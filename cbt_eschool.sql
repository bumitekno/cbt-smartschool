-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 10:39 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbt_eschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(12) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `kodemapel` varchar(20) NOT NULL,
  `jumlahsoal` int(11) NOT NULL,
  `kodesoal` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` varchar(20) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `jawabansiswa` varchar(100) DEFAULT NULL,
  `benar` varchar(10) DEFAULT NULL,
  `salah` varchar(10) DEFAULT NULL,
  `nilai` varchar(10) DEFAULT NULL,
  `kuncisoal` varchar(100) DEFAULT NULL,
  `mulaiujian` varchar(12) NOT NULL,
  `lamaujian` varchar(12) NOT NULL,
  `waktuselesai` varchar(12) NOT NULL,
  `sisawaktu` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaburaian`
--

CREATE TABLE `jawaburaian` (
  `id` varchar(100) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kodesoal` varchar(100) NOT NULL,
  `nomersoal` varchar(10) NOT NULL,
  `soal` longtext NOT NULL,
  `soal_gbr` varchar(50) NOT NULL,
  `soal_audio` varchar(50) NOT NULL,
  `jawaban` longtext NOT NULL,
  `nilai` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaburaian`
--

INSERT INTO `jawaburaian` (`id`, `nis`, `nama`, `kodesoal`, `nomersoal`, `soal`, `soal_gbr`, `soal_audio`, `jawaban`, `nilai`) VALUES
('001-1-0012345', '0012345', 'Dian', '001', '1', '', '', '', 'Informasi', ''),
('001-1-0012346', '0012346', 'Andi', '001', '1', '', '', '', 'Berita', ''),
('001-1-123', '123', 'Eunwo', '001', '1', '', '', '', 'AAAA', '0'),
('001-2-0012345', '0012345', 'Dian', '001', '2', '', '', '', 'Untuk menunjukan dan menjelaskan bagaimana penggunaan mengerjakan sesuatu dan langkah-langkahnya', ''),
('001-2-0012346', '0012346', 'Andi', '001', '2', '', '', '', 'Untuk mengetahui langkah - langkah menggunakan sesuatu', ''),
('001-2-123', '123', 'Eunwo', '001', '2', '', '', '', 'AAAA', '0'),
('001-3-0012345', '0012345', 'Dian', '001', '3', '', '', '', 'Sebab - akibat dan proses', ''),
('001-3-0012346', '0012346', 'Andi', '001', '3', '', '', '', 'Sebab - akibat', ''),
('1234-1-0001222333', '0001222333', 'Jaemin', '1234', '1', '', '', '', 'jababesad', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nilaihasil`
--

CREATE TABLE `nilaihasil` (
  `id` int(10) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `kodemapel` varchar(20) NOT NULL,
  `jumlahsoal` int(11) NOT NULL,
  `kodesoal` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` varchar(20) NOT NULL,
  `jawabansiswa` varchar(100) NOT NULL,
  `benar` varchar(10) NOT NULL,
  `salah` varchar(10) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `nilaiurai` varchar(5) NOT NULL,
  `kuncisoal` varchar(100) NOT NULL,
  `statuskoreksi` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilaihasil`
--

INSERT INTO `nilaihasil` (`id`, `nis`, `nama`, `kelas`, `kodemapel`, `jumlahsoal`, `kodesoal`, `aktif`, `jawabansiswa`, `benar`, `salah`, `nilai`, `nilaiurai`, `kuncisoal`, `statuskoreksi`) VALUES
(45, '0012346001', 'Andi', '11dua', 'BIND-11IPA-SIM1', 8, '001', '1', 'BAABC', '09:53:08am', '08-06-2022', '62.5', '0', 'BA', 2),
(46, '0012345001', 'Dian', '11dua', 'BIND-11IPA-SIM1', 8, '001', '1', 'DCABA', '10:16:23am', '08-06-2022', '37.5', '0', 'BA', 2),
(47, '00012223331234', 'Jaemin', '7A', 'BAHASA INDONESIA', 4, '1234', '1', 'AC', '03:43:05pm', '09-06-2022', '5', '', 'B', 0),
(48, '123001', 'Eunwo', '7A', 'BIND-11IPA-SIM1', 8, '001', '1', 'BBDXA', '01:26:55pm', '21-06-2022', '50', '', 'BA', 0),
(49, '123005-MTK', 'Eunwo', '7A', 'Matematika', 16, '005-MTK', '1', 'XCCXBXCXCXXXCXCC', '02:06:53pm', '21-06-2022', '31.25', '', 'CBABCACBCABCCCCC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `n_sekolah` varchar(30) NOT NULL,
  `sub_n_sekolah` varchar(100) NOT NULL,
  `kode_sekolah` varchar(30) NOT NULL,
  `logo` varchar(30) NOT NULL,
  `logo_ujian` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `tanggal` text NOT NULL,
  `logo_kota` varchar(30) NOT NULL,
  `web` varchar(30) NOT NULL,
  `bg_login` varchar(30) NOT NULL,
  `kepsek` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `n_sekolah`, `sub_n_sekolah`, `kode_sekolah`, `logo`, `logo_ujian`, `kota`, `tanggal`, `logo_kota`, `web`, `bg_login`, `kepsek`, `nip`) VALUES
(1, 'Sekolah Demo Smartschool', 'Jl. Raya Krangan - Pringsurat, Kenteng, Kebumen,', 'sekolah', 'logo kecil.png', 'myschid.png', 'Temanggung', '26 Juni 2020', 'sma.png', 'https://mysch.web.id/', 'Tanda_Tangan.png', 'Dadang S. Pd', '19755551997031005');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelas` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `Id_User` int(11) NOT NULL DEFAULT '1',
  `Id_Usergroup_User` int(11) NOT NULL DEFAULT '1',
  `foto` varchar(100) DEFAULT NULL,
  `sesi` int(11) NOT NULL,
  `ruang` varchar(30) NOT NULL,
  `statuslogin` varchar(20) NOT NULL DEFAULT '0',
  `online` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `kelas`, `pass`, `Id_User`, `Id_Usergroup_User`, `foto`, `sesi`, `ruang`, `statuslogin`, `online`) VALUES
(1, '0012345', 'Dian', '11dua', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', '2'),
(2, '0012346', 'Andi', '11dua', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', '1'),
(5, '123', 'Eunwo', '7A', '12345', 1, 1, NULL, 1, 'Ruang-4', '0', '1'),
(6, '124', 'Jinyoung', '9B', '12345', 1, 1, NULL, 2, 'Ruang-4', '0', NULL),
(7, '125', 'Haechan', '9C', '12345', 1, 1, NULL, 3, 'Ruang-5', '0', NULL),
(12, '11234', 'Bima', '9H', '12345', 1, 1, NULL, 1, 'Ruang-5', '0', NULL),
(13, '11235', 'Sakti', '7F', '12345', 1, 1, NULL, 1, 'Ruang-3', '0', '2'),
(14, '11236', 'Cakra', '12A', '12345', 1, 1, NULL, 1, 'Ruang-2', '0', NULL),
(15, '1', 'Nanda', '2A', '12345', 1, 1, NULL, 0, 'Ruang-1', '0', NULL),
(16, '321', 'ade', '3B', '12345', 1, 1, NULL, 1, 'Ruang-16', '0', NULL),
(17, '334', 'arga', 'A', '12345', 1, 1, NULL, 0, '', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `jenissoal` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodemapel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodesoal` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nomersoal` int(11) NOT NULL,
  `soal` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambarsoal` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan5` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_a` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_b` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_c` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_d` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_e` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunci` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audio` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `warna`) VALUES
(2, 'blue'),
(1, 'blue'),
(3, 'show'),
(4, '0'),
(5, 'show');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `Urut` int(11) NOT NULL,
  `jenis` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `mapel` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kodesoal` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `waktu` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `lamaujian` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `kunci` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '0',
  `acak` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `opsi` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `kelas` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nilai` varchar(3) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`Urut`, `jenis`, `mapel`, `kodesoal`, `waktu`, `lamaujian`, `kunci`, `aktif`, `acak`, `opsi`, `kelas`, `nilai`) VALUES
(1, 'SIMULASI', 'BIND-11IPA-SIM1', '001', '30', '00:30:00', 'BA', 1, '1', 'hidden', '7', '100'),
(3, 'UH', 'Matematika', '005-MTK', '30', '00:30:00', 'CBABCACBCABCCCCC', 1, '1', 'hidden', '7', '100');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jabatan` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `Id_User` int(11) NOT NULL DEFAULT '1',
  `Id_Usergroup_User` int(11) NOT NULL DEFAULT '1',
  `foto` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `admin_su` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `nama`, `jabatan`, `pass`, `Id_User`, `Id_Usergroup_User`, `foto`, `instagram`, `youtube`, `phone`, `admin_su`) VALUES
(3, 'admin', 'Administrator', 'admin utama', 'admin12345', 1, 1, NULL, 'https://www.instagram.com/websitesekolah/', '', '085742169383', '1'),
(296, 'agus', 'agus', '', 'admin12345', 1, 1, NULL, '', '', '', '0'),
(297, 'nailil', 'nailil', '', '12345', 1, 1, NULL, '', '', '', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `jawaburaian`
--
ALTER TABLE `jawaburaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilaihasil`
--
ALTER TABLE `nilaihasil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nis`),
  ADD UNIQUE KEY `username_2` (`nis`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nip`),
  ADD UNIQUE KEY `username_2` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilaihasil`
--
ALTER TABLE `nilaihasil`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
