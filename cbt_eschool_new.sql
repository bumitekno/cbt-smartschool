-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Oct 19, 2023 at 07:52 AM
-- Server version: 10.6.15-MariaDB-1:10.6.15+maria~ubu2004
-- PHP Version: 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `kodemapel` varchar(50) NOT NULL,
  `jumlahsoal` int(11) NOT NULL,
  `kodesoal` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jawaburaian`
--

CREATE TABLE `jawaburaian` (
  `id` varchar(100) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kodesoal` varchar(50) NOT NULL,
  `nomersoal` varchar(10) NOT NULL,
  `soal` longtext NOT NULL,
  `soal_gbr` varchar(50) NOT NULL,
  `soal_audio` varchar(50) NOT NULL,
  `jawaban` longtext NOT NULL,
  `nilai` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilaihasil`
--

CREATE TABLE `nilaihasil` (
  `id` int(10) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `kodemapel` varchar(50) NOT NULL,
  `jumlahsoal` int(11) NOT NULL,
  `kodesoal` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` varchar(20) NOT NULL,
  `jawabansiswa` varchar(100) NOT NULL,
  `benar` varchar(10) NOT NULL,
  `salah` varchar(10) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `nilaiurai` varchar(5) NOT NULL,
  `kuncisoal` varchar(100) NOT NULL,
  `statuskoreksi` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nilaihasil`
--

INSERT INTO `nilaihasil` (`id`, `nis`, `nama`, `kelas`, `kodemapel`, `jumlahsoal`, `kodesoal`, `aktif`, `jawabansiswa`, `benar`, `salah`, `nilai`, `nilaiurai`, `kuncisoal`, `statuskoreksi`) VALUES
(2, '0981823456IPA-12', 'Target 1', '11IPA', 'IPA', 3, 'IPA-12', '1', 'IyaOKSulit', '02:07:29pm', '19-10-2023', '100', '', 'IyaOKSulit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `n_sekolah` varchar(100) NOT NULL,
  `sub_n_sekolah` varchar(100) NOT NULL,
  `kode_sekolah` varchar(30) NOT NULL,
  `logo` varchar(30) NOT NULL,
  `logo_ujian` varchar(30) NOT NULL,
  `jenis_ujian` text NOT NULL,
  `kota` varchar(30) NOT NULL,
  `tanggal` text NOT NULL,
  `th_ajaran` varchar(15) NOT NULL,
  `logo_kota` varchar(30) NOT NULL,
  `web` varchar(30) NOT NULL,
  `bg_login` varchar(30) NOT NULL,
  `kepsek` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `n_sekolah`, `sub_n_sekolah`, `kode_sekolah`, `logo`, `logo_ujian`, `jenis_ujian`, `kota`, `tanggal`, `th_ajaran`, `logo_kota`, `web`, `bg_login`, `kepsek`, `nip`) VALUES
(1, 'Sekolah Demo Smartschool', 'Jl. Raya Krangan - Pringsurat, Kenteng, Kebumen,', 'sekolah', 'mysch.png', 'myschid.png', 'Ujian Tengah Semester', 'Temanggung', '26 Juni 2020', '2023/2024', 'sma.png', 'https://mysch.web.id/', 'Tanda_Tangan.png', 'Dadang S. Pd', '19755551997031005');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` text NOT NULL,
  `kelas` text NOT NULL,
  `rombel` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `Id_User` int(11) NOT NULL DEFAULT 1,
  `Id_Usergroup_User` int(11) NOT NULL DEFAULT 1,
  `foto` varchar(100) DEFAULT NULL,
  `sesi` int(11) NOT NULL,
  `ruang` varchar(30) NOT NULL,
  `statuslogin` varchar(20) NOT NULL DEFAULT '0',
  `online` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `jurusan`, `kelas`, `rombel`, `pass`, `Id_User`, `Id_Usergroup_User`, `foto`, `sesi`, `ruang`, `statuslogin`, `online`) VALUES
(1, '0981823456', 'Target 1', '', '11IPA', '', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `jenissoal` varchar(11) NOT NULL,
  `kodemapel` varchar(50) NOT NULL,
  `kodesoal` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nomersoal` int(11) NOT NULL,
  `soal` longtext NOT NULL,
  `gambarsoal` varchar(200) NOT NULL,
  `pilihan1` text NOT NULL,
  `pilihan2` text NOT NULL,
  `pilihan3` text NOT NULL,
  `pilihan4` text NOT NULL,
  `pilihan5` text NOT NULL,
  `gambar_a` varchar(200) NOT NULL,
  `gambar_b` varchar(200) NOT NULL,
  `gambar_c` varchar(200) NOT NULL,
  `gambar_d` varchar(200) NOT NULL,
  `gambar_e` varchar(200) NOT NULL,
  `kunci` varchar(255) NOT NULL,
  `jawaban` text NOT NULL,
  `audio` varchar(300) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `jenissoal`, `kodemapel`, `kodesoal`, `nomersoal`, `soal`, `gambarsoal`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `pilihan5`, `gambar_a`, `gambar_b`, `gambar_c`, `gambar_d`, `gambar_e`, `kunci`, `jawaban`, `audio`, `status`) VALUES
(1, 'SIMULASI', 'IPA', 'IPA-12', 1, 'Mantap', '', '', '', '', '', '', '', '', '', '', '', 'Iya', '', '', 5),
(2, 'SIMULASI', 'IPA', 'IPA-12', 2, 'Bagus', '', '', '', '', '', '', '', '', '', '', '', 'OK', '', '', 5),
(3, 'SIMULASI', 'IPA', 'IPA-12', 3, 'Susah', '', '', '', '', '', '', '', '', '', '', '', 'Sulit', '', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `jenis` varchar(50) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `kodesoal` varchar(50) NOT NULL,
  `waktu` varchar(8) NOT NULL,
  `lamaujian` varchar(12) NOT NULL,
  `kunci` varchar(100) NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT 0,
  `acak` varchar(2) NOT NULL,
  `opsi` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `nilai` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`Urut`, `jenis`, `mapel`, `kodesoal`, `waktu`, `lamaujian`, `kunci`, `aktif`, `acak`, `opsi`, `kelas`, `nilai`) VALUES
(1, 'SIMULASI', 'IPA', 'IPA-12', '60', '01:00:00', 'IyaOKSulit', 1, '2', 'hidden', '11', '100');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `Id_User` int(11) NOT NULL DEFAULT 1,
  `Id_Usergroup_User` int(11) NOT NULL DEFAULT 1,
  `foto` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `admin_su` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `nama`, `jabatan`, `pass`, `Id_User`, `Id_Usergroup_User`, `foto`, `instagram`, `youtube`, `phone`, `admin_su`) VALUES
(3, 'admin', 'Administrator', 'admin utama', 'admin12345', 1, 1, NULL, 'https://www.instagram.com/websitesekolah/', '', '085742169383', '1'),
(296, 'agus', 'agus', '', 'admin12345', 1, 1, NULL, '', '', '', '0'),
(297, 'nailil', 'nailil', '', '12345', 1, 1, NULL, '', '', '', '2'),
(298, 'nana', 'Nana Yanti', 'Guru', '12345', 1, 1, NULL, 'jaja', '', '087181919111', '0'),
(299, 'agung', 'Agung MPD.PAK', 'Guru', '12345', 1, 1, NULL, '', '', '', '0'),
(300, 'Sasa', 'Sasanaaa', 'Guru', '12345', 1, 1, NULL, '', '', '', '0'),
(301, '9583678', 'Madun', 'Pengawas', '12345', 1, 1, NULL, '', '', '', '2'),
(302, 'adam', 'Adam', 'Pengawas', '12345', 1, 1, NULL, '', '', '', '2');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
