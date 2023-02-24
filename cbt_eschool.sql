-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 08:36 AM
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

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`nis`, `nama`, `kelas`, `kodemapel`, `jumlahsoal`, `kodesoal`, `aktif`, `waktu`, `jawabansiswa`, `benar`, `salah`, `nilai`, `kuncisoal`, `mulaiujian`, `lamaujian`, `waktuselesai`, `sisawaktu`) VALUES
('0012346', 'Andi', '11dua', 'Matematika', 6, '005-MTK', 'Aktif', '30', NULL, NULL, NULL, NULL, NULL, '11:11:12', '00:30:00', '11:42:12', '1860'),
('11236', 'Cakra', '7A', 'BIND-11IPA-SIM1', 8, '001', 'Aktif', '30', NULL, NULL, NULL, NULL, NULL, '13:54:25', '00:30:00', '14:24:25', '1860');

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
(49, '123005-MTK', 'Eunwo', '7A', 'Matematika', 16, '005-MTK', '1', 'XCCXBXCXCXXXCXCC', '02:06:53pm', '21-06-2022', '31.25', '', 'CBABCACBCABCCCCC', 0),
(50, '0012345005-MTK', 'Dian', '11dua', 'Matematika', 6, '005-MTK', '1', 'XXXXXX', '09:52:37am', '25-11-2022', '0', '', 'CBABCA', 0),
(51, '11236005-MTK', 'Cakra', '11A', 'Matematika', 6, '005-MTK', '1', 'XBBXXC', '01:44:29pm', '25-11-2022', '16.66', '', 'CBABCA', 0),
(66, '124001', 'Jinyoung', '7B', 'BIND-11IPA-SIM1', 8, '001', '1', 'ADBCB', '10:35:44am', '27-11-2022', '37.5', '', 'BA', 0);

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
  `jenis_ujian` text NOT NULL,
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

INSERT INTO `profil` (`id`, `n_sekolah`, `sub_n_sekolah`, `kode_sekolah`, `logo`, `logo_ujian`, `jenis_ujian`, `kota`, `tanggal`, `logo_kota`, `web`, `bg_login`, `kepsek`, `nip`) VALUES
(1, 'Sekolah Demo sssss', 'Jl. Raya Krangan - Pringsurat, Kenteng, Kebumen,', 'sekolah', 'mysch.png', 'myschid.png', 'Ujian Akhir Semester', 'Temanggung', '26 Juni 2020', 'sma.png', 'https://mysch.web.id/', 'Tanda_Tangan.png', 'Dadang S. Pd', '19755551997031005');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jurusan` text NOT NULL,
  `kelas` text NOT NULL,
  `rombel` text NOT NULL,
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

INSERT INTO `siswa` (`id`, `nis`, `nama`, `jurusan`, `kelas`, `rombel`, `pass`, `Id_User`, `Id_Usergroup_User`, `foto`, `sesi`, `ruang`, `statuslogin`, `online`) VALUES
(1, '0012345', 'Dian', '', '10IPA', 'IPS', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', '2'),
(2, '0012346', 'Andi', '', '11IPA', 'BAHASA', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', '1'),
(5, '123', 'Eunwo', '', '10IPA', 'A', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', '1'),
(6, '124', 'Jinyoung', '', '7B', '', '12345', 1, 1, NULL, 2, 'Ruang-4', '0', '1'),
(7, '125', 'Haechan', '', '9C', '', '12345', 1, 1, NULL, 3, 'Ruang-5', '0', NULL),
(12, '11234', 'Bima', '', '9H', '', '12345', 1, 1, NULL, 1, 'Ruang-5', '0', NULL),
(13, '11235', 'Sakti', '', '7F', '', '12345', 1, 1, NULL, 1, 'Ruang-3', '0', '1'),
(14, '11236', 'Cakra', '', '7A', '', '12345', 1, 1, NULL, 1, 'Ruang-2', '0', '1'),
(15, '1', 'Nanda', '', '10IPA', 'A', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', NULL),
(17, '334', 'arga', '', '10IPA', '', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', NULL),
(18, '054321', 'Aqil', '', '10IPA', 'IPA', '12345', 1, 1, NULL, 1, 'Ruang-2', '0', NULL),
(20, '12321', 'Bayu', '', '10IPS', '', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', NULL);

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

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `jenissoal`, `kodemapel`, `kodesoal`, `nomersoal`, `soal`, `gambarsoal`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `pilihan5`, `gambar_a`, `gambar_b`, `gambar_c`, `gambar_d`, `gambar_e`, `kunci`, `audio`, `status`) VALUES
(4, 'SIMULASI', 'BIND-11IPA-SIM1', '001', 3, 'Ceramah bertujuan untuk memberikan &hellip;.', '', 'nasihat baik', 'kebencian', 'keburukan', 'kejahatan', '', '', '', '', '', '', 'A', '', 1),
(2, 'SIMULASI', 'BIND-11IPA-SIM1', '001', 2, 'Kata &ldquo;atau&rdquo; merupakan konjungsi &hellip;.', '', 'syarat', 'kesimpulan', 'pilihan', 'tujuan', '', '', '', '', '', '', 'C', '', 1),
(3, 'SIMULASI', 'BIND-11IPA-SIM1', '001', 1, 'Dibawah ini yang bukan merupakan kata-kata persuasif pada teks ceramah adalah...', '', 'Hendaklah', 'Sebaiknya', 'Diharapkan', 'Baiklah', '', '', '', '', '', '', 'D', '', 1),
(5, 'SIMULASI', 'BIND-11IPA-SIM1', '001', 4, 'Nilai yang menjelaskan baik dan buruk seseorang dalam cerita adalah nilai &hellip;.', '', 'agama', 'moral', 'budaya', 'sosial', '', '', '', '', '', '', 'B', '', 1),
(6, 'SIMULASI', 'BIND-11IPA-SIM1', '001', 5, 'Salah satu jenis karya sastra yang memaparkan kisah atau cerita mengenai manusia beserta seluk-beluknya lewat tulisan pendek dan singkat disebut &hellip;.', '', 'cerita pendek', 'prosedur', 'deskripsi', 'eksplanasi', '', '', '', '', '', '', 'A', '', 1),
(7, 'SIMULASI', 'BIND-11IPA-SIM1', '001', 1, 'Sekumpulan data atau fakta yang diorganisasi atau diolah dengan cara tertentu, sehingga mempunyai arti bagi penerima disebut &hellip;.', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(8, 'SIMULASI', 'BIND-11IPA-SIM1', '001', 2, 'Tujuan teks prosedur adalah &hellip;.', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(9, 'SIMULASI', 'BIND-11IPA-SIM1', '001', 3, 'Semua fenomena tersebut memiliki hubungan &hellip;.', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(55, 'Mapel samak', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(14, 'PAS', 'INDO', 'INDO-1', 1, 'Pertanyaan 1', '', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', '', '', '', '', '', 'A', NULL, 1),
(15, 'PAS', 'INDO', 'INDO-1', 2, 'Pertanyaan 2', '', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', '', '', '', '', '', 'B', NULL, 1),
(16, 'PAS', 'INDO', 'INDO-1', 3, 'Pertanyaan uraian', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 2),
(18, 'UH', 'MTK', 'MTK-1', 1, 'Apa yang di maksud dengan integral ?', '', 'suatu', 'qaaa', 'aa', 'aa', 'aaa', '', '', '', '', '', 'A', NULL, 1),
(19, 'UH', 'MTK', 'MTK-1', 2, '15999 + 390291 = ', '', '406,290', '406,293', '406,299', '406,280', '406,299', '', '', '', '', '', 'A', NULL, 1),
(20, 'UH', 'MTK', 'MTK1', 3, 'Apa yang di maksud dengan bilangan ?', '', 'aka', 'dd', 'angka', 'ddee', 'cc', '', '', '', '', '', 'C', NULL, 2),
(21, 'UH', 'MTK', 'MTK-1', 1, 'Apa yang di maksud dengan integral ?', '', 'suatu', 'qaaa', 'aa', 'aa', 'aaa', '', '', '', '', '', 'A', NULL, 1),
(22, 'UH', 'MTK', 'MTK-1', 2, '15999 + 390291 = ', '', '406,290', '406,293', '406,299', '406,280', '406,299', '', '', '', '', '', 'A', NULL, 1),
(23, 'UH', 'MTK', 'MTK1', 3, 'Apa yang di maksud dengan bilangan ?', '', 'aka', 'dd', 'angka', 'ddee', 'cc', '', '', '', '', '', 'C', NULL, 2),
(24, 'UH', 'MTK', 'MTK-1', 1, 'Apa yang di maksud dengan integral ?', '', 'suatu', 'qaaa', 'aa', 'aa', 'aaa', '', '', '', '', '', 'A', NULL, 1),
(25, 'UH', 'MTK', 'MTK-1', 2, '15999 + 390291 = ', '', '406290', '406293', '406299', '406280', '406299', '', '', '', '', '', 'A', NULL, 1),
(26, 'UH', 'MTK', 'MTK1', 3, 'Apa yang di maksud dengan bilangan ?', '', 'aka', 'dd', 'angka', 'ddee', 'cc', '', '', '', '', '', 'C', NULL, 2),
(27, 'UH', 'Matematika', '005-MTK', 1, 'Apa yang dimaksud dengan bilangan?', '', 'berisi angka angkaaaa', 'angka', 'huruf', 'kuadrat', 'opsi E', '', '', '', '', '', 'C', '', 1),
(28, 'UH', 'Matematika', '005-MTK', 2, 'Apa yang dimaksud dengan Integral?', '', 'pecahan', 'kuadrat', 'angka', 'pangkat', 'opsi E', '', '', '', '', '', 'B', NULL, 1),
(29, 'UH', 'Matematika', '005-MTK', 3, '3999+4999', '', '8998', '8989', '9898', '9678', '', '', '', '', '', '', 'A', NULL, 1),
(30, 'UH', 'Matematika', '005-MTK', 4, '4 + 5?', '', '10', '9', '7', '8', 'opsi E', '', '', '', '', '', 'B', NULL, 1),
(31, 'UH', 'Matematika', '005-MTK', 5, '160 + 550?', '', '770', '670', '710', '610', 'opsi E', '', '', '', '', '', 'C', NULL, 1),
(32, 'UH', 'Matematika', '005-MTK', 6, '3999+4999', '', '8998', '8989', '9898', '9678', '', '', '', '', '', '', 'A', '', 1),
(33, 'Mapel samak', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(34, 'Kode Soal s', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(35, 'Gambar Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(36, 'Gambar Opsi', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(37, 'Kunci Pasti', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(38, 'Status Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(39, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(40, 'jenis ujian', 'mapel', 'kode soal', 0, 'Soal / Pertanyaan', 'gambar soal', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', 'gbr opsi A', 'gbr opsi B', 'gbr opsi C', 'gbr opsi D', 'gbr opsi E', 'K', NULL, 0),
(81, 'Gambar Opsi', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(82, 'Kunci Pasti', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(79, 'Kode Soal H', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(80, 'Gambar Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(77, 'Jenis Ujian', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(78, 'Mapel HARUS', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(44, 'Mapel samak', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(45, 'Kode Soal s', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(46, 'Gambar Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(47, 'Gambar Opsi', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(48, 'Kunci Pasti', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(49, 'Status Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(50, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(51, 'Jenis Ujian', 'Mapel', 'Kode Soal', 0, 'Soal / Pertanyaan', 'Gambar Soal', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', 'gbr opsi A', 'gbr opsi B', 'gbr opsi C', 'gbr opsi D', 'gbr opsi E', 'K', NULL, 0),
(52, 'SIMULASI', 'bahasa indonesia', '12345', 1, 'Apa yang di maksud Cerpen', '', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', '', '', '', '', '', 'A', NULL, 1),
(53, 'SIMULASI', 'BAHASA INDONESIA', '12345', 2, 'Apa yang dimaksud Pargraf?', '', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', '', '', '', '', '', 'B', NULL, 1),
(54, 'SIMULASI', 'BAHASA INDONESIA', '12345', 3, 'Apa yah?', '', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', '', '', '', '', '', 'C', NULL, 1),
(56, 'Kode Soal s', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(57, 'Gambar Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(58, 'Gambar Opsi', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(59, 'Kunci Pasti', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(60, 'Status Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(61, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(62, 'Jenis Ujian', 'Mapel', 'Kode Soal', 0, 'Soal / Pertanyaan', 'Gambar Soal', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', 'gbr opsi A', 'gbr opsi B', 'gbr opsi C', 'gbr opsi D', 'gbr opsi E', 'K', NULL, 0),
(66, 'Mapel HARUS', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(67, 'Kode Soal H', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(68, 'Gambar Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(69, 'Gambar Opsi', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(70, 'Kunci Pasti', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(71, 'Status Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(72, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(73, 'Jenis Ujian', 'Mapel', 'Kode Soal', 0, 'Soal / Pertanyaan', 'Gambar Soal', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', 'gbr opsi A', 'gbr opsi B', 'gbr opsi C', 'gbr opsi D', 'gbr opsi E', 'K', NULL, 0),
(83, 'Status Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(84, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(85, 'Jenis Ujian', 'Mapel', 'Kode Soal', 0, 'Soal / Pertanyaan', 'Gambar Soal', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', 'gbr opsi A', 'gbr opsi B', 'gbr opsi C', 'gbr opsi D', 'gbr opsi E', 'K', NULL, 0),
(93, 'UH', 'Matematika', '005-MTK', 7, 'jsjjsjs', '', '', '', '', '', '', '', '', '', '', '', '', '', 2);

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
(1, 'SIMULASI', 'BIND-11IPA-SIM1', '001', '30', '00:30:00', 'BA', 0, '1', 'hidden', '7', '100'),
(3, 'UH', 'Matematika', '005-MTK', '30', '00:30:00', 'CBABCA', 0, '1', 'hidden', '11', '100');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

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
