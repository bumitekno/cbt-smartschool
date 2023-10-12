-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 08:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`nis`, `nama`, `kelas`, `kodemapel`, `jumlahsoal`, `kodesoal`, `aktif`, `waktu`, `jawabansiswa`, `benar`, `salah`, `nilai`, `kuncisoal`, `mulaiujian`, `lamaujian`, `waktuselesai`, `sisawaktu`) VALUES
('11236', 'Cakra', '7A', 'BIND-11IPA-SIM1', 8, '001', 'Aktif', '30', NULL, NULL, NULL, NULL, NULL, '13:54:25', '00:30:00', '14:24:25', '1860');

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

--
-- Dumping data for table `jawaburaian`
--

INSERT INTO `jawaburaian` (`id`, `nis`, `nama`, `kodesoal`, `nomersoal`, `soal`, `soal_gbr`, `soal_audio`, `jawaban`, `nilai`) VALUES
('001-1-0012346', '0012346', 'Andi', '001', '1', '', '', '', 'Berita', ''),
('001-2-0012346', '0012346', 'Andi', '001', '2', '', '', '', 'Untuk mengetahui langkah - langkah menggunakan sesuatu', ''),
('001-3-0012346', '0012346', 'Andi', '001', '3', '', '', '', 'Sebab - akibat', ''),
('005-MTK-7-054321', '054321', 'Aqil', '005-MTK', '7', '', '', '', 'trgdf', '0'),
('1234-1-0001222333', '0001222333', 'Jaemin', '1234', '1', '', '', '', 'jababesad', '0'),
('B.ING-1-10-054321', '054321', 'Aqil', 'B.ING-1', '10', '', '', '', 'daada', '0'),
('B.ING-1-14-054321', '054321', 'Aqil', 'B.ING-1', '14', '', '', '', 'adaa', '0'),
('B.ING-1-14-12321', '12321', 'Bayu', 'B.ING-1', '14', '', '', '', 'ASASAw', '0'),
('B.ING-1-21-054321', '054321', 'Aqil', 'B.ING-1', '21', '', '', '', 'qdqq', '0'),
('B.ING-1-22-054321', '054321', 'Aqil', 'B.ING-1', '22', '', '', '', 'sasac', '0'),
('B.ING-1-4-054321', '054321', 'Aqil', 'B.ING-1', '4', '', '', '', 'ddsd', '0'),
('B.ING-1-4-12321', '12321', 'Bayu', 'B.ING-1', '4', '', '', '', 'XXAewdwq', '0'),
('INDO-11-2023-1-0012346', '0012346', 'Andi', 'INDO-11-2023', '1', '', '', '', 'xaasxaxa', '0'),
('INDO-11-2023-1-12321', '12321', 'Bayu', 'INDO-11-2023', '1', '', '', '', 'jjkjkjkk', '0'),
('INDO-11-2023-2-0012346', '0012346', 'Andi', 'INDO-11-2023', '2', '', '', '', 'aas', '0'),
('INDO-11-2023-2-12321', '12321', 'Bayu', 'INDO-11-2023', '2', '', '', '', 'sebutkan', '0'),
('INDO-11-2023-8-0012346', '0012346', 'Andi', 'INDO-11-2023', '8', '', '', '', 'ASA', '0'),
('INDO-11-2023-8-12321', '12321', 'Bayu', 'INDO-11-2023', '8', '', '', '', 'nature', '0'),
('SOS-8-SIM-2-0012346', '0012346', 'Andi', 'SOS-8-SIM', '2', '', '', '', 'saS', '0'),
('SOS-8-SIM-2-054321', '054321', 'Aqil', 'SOS-8-SIM', '2', '', '', '', 'sasas', '0'),
('SOS-8-SIM-2-11235', '11235', 'Sakti', 'SOS-8-SIM', '2', '', '', '', 'ssas', '0'),
('SOS-8-SIM-3-0012346', '0012346', 'Andi', 'SOS-8-SIM', '3', '', '', '', 'S', '0'),
('SOS-8-SIM-3-054321', '054321', 'Aqil', 'SOS-8-SIM', '3', '', '', '', 'sa', '0'),
('SOS-8-SIM-3-11235', '11235', 'Sakti', 'SOS-8-SIM', '3', '', '', '', 'ssS', '0');

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
(45, '0012346001', 'Andi', '11dua', 'BIND-11IPA-SIM1', 8, '001', '1', 'BAABC', '09:53:08am', '08-06-2022', '62.5', '0', 'BA', 2),
(47, '00012223331234', 'Jaemin', '7A', 'BAHASA INDONESIA', 4, '1234', '1', 'AC', '03:43:05pm', '09-06-2022', '5', '', 'B', 0),
(70, '11235SOS-8-SIM', 'Sakti', '7F', 'SOSIOLOGI', 7, 'SOS-8-SIM', '1', 'CTBFT', '01:02:51pm', '30-08-2023', '71.42', '', 'BTDFT', 0),
(71, '054321005-MTK', 'Aqil', '11IPA', 'Matematika', 23, '005-MTK', '1', 'CCABCBXCXFXXXX', '03:15:47pm', '01-09-2023', '26.08', '', 'CBABBAFTBtCAACAATFTF', 0),
(51, '11236005-MTK', 'Cakra', '11A', 'Matematika', 6, '005-MTK', '1', 'XBBXXC', '01:44:29pm', '25-11-2022', '16.66', '', 'CBABCA', 0),
(72, '054321SOS-8-SIM', 'Aqil', '11IPA', 'SOSIOLOGI', 10, 'SOS-8-SIM', '1', 'BTBFTTFF', '03:23:09pm', '01-09-2023', '80', '', 'BTDFTTFT', 0),
(76, '0012346SOS-8-SIM', 'Andi', '11IPA', 'SOSIOLOGI', 19, 'SOS-8-SIM', '1', 'AFAAAAAXAAAAAAAA', '03:34:25pm', '21-09-2023', '26.31', '', 'BTDFTDFTAA', 0),
(77, '0012346B.ING-1', 'Andi', '11IPA', 'B.INGGRIS', 3, 'B.ING-1', '1', 'AA', '10:03:36am', '22-09-2023', '33.33', '', '', 0),
(78, '12321B.ING-1', 'Bayu', '11IPS', 'B.INGGRIS', 17, 'B.ING-1', '1', 'TDCTTCTTDDCATF', '03:08:16pm', '29-09-2023', '35.29', '', 'AFDBBCDCBCDBTF', 0),
(81, '0012346INDO-11-2023', 'Andi', '11IPA', 'INDO', 12, 'INDO-11-2023', '1', 'DBBCATFDC', '02:00:20pm', '04-10-2023', '33.33', '', 'DACABTFACDABC', 0),
(82, '12321INDO-11-2023', 'Bayu', '11IPS', 'INDO', 12, 'INDO-11-2023', '1', 'BBACDTFDC', '10:02:19am', '09-10-2023', '25', '', 'DACABTFACDABC', 0),
(83, '054321B.ING-1', 'Aqil', '11IPA', 'B.INGGRIS', 22, 'B.ING-1', '1', 'XABTXXXBTF', '10:08:16am', '10-10-2023', '18.18', '', 'DDABCACDCBCDBAFBCD', 0);

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
(1, '0012345', 'Dian', '', '10IPA', 'IPS', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', '1'),
(2, '0012346', 'Andi', '', '11IPA', 'BAHASA', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', '1'),
(12, '11234', 'Bima', '', '9H', '', '12345', 1, 1, NULL, 1, 'Ruang-5', '0', NULL),
(13, '11235', 'Sakti', '', '7F', '', '12345', 1, 1, NULL, 1, 'Ruang-3', '0', '2'),
(15, '1', 'Nanda', '', '10IPA', 'A', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', NULL),
(17, '334', 'arga', '', '10IPA', '', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', NULL),
(18, '054321', 'Aqil', '', '11IPA', 'IPA', '12345', 1, 1, NULL, 1, 'Ruang-2', '0', '2'),
(20, '12321', 'Bayu', '', '11IPS', '', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', '1'),
(22, '9583678', 'Madun .dksl.', '', '9H', '', '12345', 1, 1, NULL, 1, 'Ruang-4', '0', NULL),
(23, '9658647', 'Sari', '', '9H', '', '12345', 1, 1, NULL, 1, 'Ruang-4', '0', NULL),
(24, '121211', 'Citra', '', '10IPA-A', '', '12345', 1, 1, NULL, 2, 'Ruang-1', '0', NULL);

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
  `kunci` varchar(5) NOT NULL,
  `jawaban` text NOT NULL,
  `audio` varchar(300) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `jenissoal`, `kodemapel`, `kodesoal`, `nomersoal`, `soal`, `gambarsoal`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `pilihan5`, `gambar_a`, `gambar_b`, `gambar_c`, `gambar_d`, `gambar_e`, `kunci`, `jawaban`, `audio`, `status`) VALUES
(170, 'SIMULASI', 'INDO', 'INDO-11-2023', 5, 'Berikut merupakan tujuan pembuatan proposal, kecuali...', '', 'Meminta izin pihak bersangkutan', 'Memohon bantuan dana', 'Memberikan masukan untuk keputusan', 'Untuk melakukan suatu kegiatan', '', '', '', '', '', '', 'C', '', NULL, 1),
(169, 'SIMULASI', 'INDO', 'INDO-11-2023', 4, 'Program proposal sebaiknya diajukan pada saat...', '', 'Sebelum kegiatan berlangsung', 'Saat kegiatan berlangsung', 'Setelah kegiatan berlangsung', 'Selesai kegiatan', '', '', '', '', '', '', 'A', '', NULL, 1),
(168, 'SIMULASI', 'INDO', 'INDO-11-2023', 3, 'Unsur-unsur dibawah ini ada dalam proposal penelitian ilmiah, kecuali...', '', 'Latar belakang masalah', 'Penutup', 'Pembatasan masalah', 'Panitia kegiatan', '', '', '', '', '', '', 'D', '', NULL, 1),
(166, 'SIMULASI', 'INDO', 'INDO-11-2023', 1, 'Apa yang di maksud dengan Proposal? Jelaskan!', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 2),
(167, 'SIMULASI', 'INDO', 'INDO-11-2023', 2, 'Sebutkan &amp; Jelaskan Format Proposal! (min 5)', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 2),
(163, 'Status Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(164, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(165, 'Jenis Ujian', 'Mapel', 'Kode Soal', 0, 'Soal / Pertanyaan', 'Gambar Soal', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', 'gbr opsi A', 'gbr opsi B', 'gbr opsi C', 'gbr opsi D', 'gbr opsi E', 'Kunci', '', NULL, 0),
(161, 'Gambar Opsi', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(162, 'Kunci Pasti', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(159, 'Kode Soal H', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(160, 'Gambar Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(55, 'Mapel samak', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(14, 'PAS', 'INDO', 'INDO-1', 1, 'Pertanyaan 1', '', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', '', '', '', '', '', 'A', '', NULL, 1),
(15, 'PAS', 'INDO', 'INDO-1', 2, 'Pertanyaan 2', '', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', '', '', '', '', '', 'B', '', NULL, 1),
(16, 'PAS', 'INDO', 'INDO-1', 3, 'Pertanyaan uraian', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 2),
(18, 'UH', 'MTK', 'MTK-1', 1, 'Apa yang di maksud dengan integral ?', '', 'suatu', 'qaaa', 'aa', 'aa', 'aaa', '', '', '', '', '', 'A', '', NULL, 1),
(19, 'UH', 'MTK', 'MTK-1', 2, '15999 + 390291 = ', '', '406,290', '406,293', '406,299', '406,280', '406,299', '', '', '', '', '', 'A', '', NULL, 1),
(20, 'UH', 'MTK', 'MTK1', 3, 'Apa yang di maksud dengan bilangan ?', '', 'aka', 'dd', 'angka', 'ddee', 'cc', '', '', '', '', '', 'C', '', NULL, 2),
(21, 'UH', 'MTK', 'MTK-1', 1, 'Apa yang di maksud dengan integral ?', '', 'suatu', 'qaaa', 'aa', 'aa', 'aaa', '', '', '', '', '', 'A', '', NULL, 1),
(22, 'UH', 'MTK', 'MTK-1', 2, '15999 + 390291 = ', '', '406,290', '406,293', '406,299', '406,280', '406,299', '', '', '', '', '', 'A', '', NULL, 1),
(23, 'UH', 'MTK', 'MTK1', 3, 'Apa yang di maksud dengan bilangan ?', '', 'aka', 'dd', 'angka', 'ddee', 'cc', '', '', '', '', '', 'C', '', NULL, 2),
(24, 'UH', 'MTK', 'MTK-1', 1, 'Apa yang di maksud dengan integral ?', '', 'suatu', 'qaaa', 'aa', 'aa', 'aaa', '', '', '', '', '', 'A', '', NULL, 1),
(25, 'UH', 'MTK', 'MTK-1', 2, '15999 + 390291 = ', '', '406290', '406293', '406299', '406280', '406299', '', '', '', '', '', 'A', '', NULL, 1),
(26, 'UH', 'MTK', 'MTK1', 3, 'Apa yang di maksud dengan bilangan ?', '', 'aka', 'dd', 'angka', 'ddee', 'cc', '', '', '', '', '', 'C', '', NULL, 2),
(27, 'UH', 'Matematika', '005-MTK', 1, 'Apa yang dimaksud dengan bilangan?', '', 'berisi angka angkaaaa', 'angka', 'huruf', 'kuadrat', 'opsi E', '', '', '', '', '', 'C', '', '', 1),
(28, 'UH', 'Matematika', '005-MTK', 2, 'Apa yang dimaksud dengan Integral?', '', 'pecahan', 'kuadrat', 'angka', 'pangkat', 'opsi E', '', '', '', '', '', 'B', '', NULL, 1),
(29, 'UH', 'Matematika', '005-MTK', 3, '3999+4999', '', '8998', '8989', '9898', '9678', '', '', '', '', '', '', 'A', '', NULL, 1),
(30, 'UH', 'Matematika', '005-MTK', 4, '4 + 5?', '', '10', '9', '7', '8', 'opsi E', '', '', '', '', '', 'B', '', NULL, 1),
(31, 'UH', 'Matematika', '005-MTK', 5, '160 + 550?', '', '770', '670', '710', '610', 'opsi E', '', '', '', '', '', 'B', '', '', 1),
(32, 'UH', 'Matematika', '005-MTK', 6, '3999+4999', '', '8998', '8989', '9898', '9678', '', '', '', '', '', '', 'A', '', '', 1),
(33, 'Mapel samak', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(34, 'Kode Soal s', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(35, 'Gambar Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(36, 'Gambar Opsi', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(37, 'Kunci Pasti', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(38, 'Status Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(39, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(40, 'jenis ujian', 'mapel', 'kode soal', 0, 'Soal / Pertanyaan', 'gambar soal', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', 'gbr opsi A', 'gbr opsi B', 'gbr opsi C', 'gbr opsi D', 'gbr opsi E', 'K', '', NULL, 0),
(81, 'Gambar Opsi', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(82, 'Kunci Pasti', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(79, 'Kode Soal H', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(80, 'Gambar Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(77, 'Jenis Ujian', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(78, 'Mapel HARUS', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(44, 'Mapel samak', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(45, 'Kode Soal s', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(46, 'Gambar Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(47, 'Gambar Opsi', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(48, 'Kunci Pasti', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(49, 'Status Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(50, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(51, 'Jenis Ujian', 'Mapel', 'Kode Soal', 0, 'Soal / Pertanyaan', 'Gambar Soal', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', 'gbr opsi A', 'gbr opsi B', 'gbr opsi C', 'gbr opsi D', 'gbr opsi E', 'K', '', NULL, 0),
(52, 'SIMULASI', 'bahasa indonesia', '12345', 1, 'Apa yang di maksud Cerpen', '', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', '', '', '', '', '', 'A', '', NULL, 1),
(53, 'SIMULASI', 'BAHASA INDONESIA', '12345', 2, 'Apa yang dimaksud Pargraf?', '', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', '', '', '', '', '', 'B', '', NULL, 1),
(54, 'SIMULASI', 'BAHASA INDONESIA', '12345', 3, 'Apa yah?', '', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', '', '', '', '', '', 'C', '', NULL, 1),
(56, 'Kode Soal s', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(57, 'Gambar Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(58, 'Gambar Opsi', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(59, 'Kunci Pasti', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(60, 'Status Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(61, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(62, 'Jenis Ujian', 'Mapel', 'Kode Soal', 0, 'Soal / Pertanyaan', 'Gambar Soal', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', 'gbr opsi A', 'gbr opsi B', 'gbr opsi C', 'gbr opsi D', 'gbr opsi E', 'K', '', NULL, 0),
(66, 'Mapel HARUS', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(67, 'Kode Soal H', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(68, 'Gambar Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(69, 'Gambar Opsi', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(70, 'Kunci Pasti', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(71, 'Status Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(72, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(73, 'Jenis Ujian', 'Mapel', 'Kode Soal', 0, 'Soal / Pertanyaan', 'Gambar Soal', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', 'gbr opsi A', 'gbr opsi B', 'gbr opsi C', 'gbr opsi D', 'gbr opsi E', 'K', '', NULL, 0),
(83, 'Status Soal', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(84, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(85, 'Jenis Ujian', 'Mapel', 'Kode Soal', 0, 'Soal / Pertanyaan', 'Gambar Soal', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', 'gbr opsi A', 'gbr opsi B', 'gbr opsi C', 'gbr opsi D', 'gbr opsi E', 'K', '', NULL, 0),
(93, 'UH', 'Matematika', '005-MTK', 7, 'jsjjsjs', '', '', '', '', '', '', '', '', '', '', '', 'F', '', '', 2),
(95, 'UH', 'Matematika', '005-MTK', 8, 'djskjsjkls', '', '', '', '', '', '', '', '', '', '', '', 'T', '', '', 3),
(96, 'UH', 'Matematika', '005-MTK', 9, 'ssaaa', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(97, 'UH', 'Matematika', '005-MTK', 10, 'dsds', '', 'a', 'b', 'c', 'd', '', '', '', '', '', '', 'B', '', '', 1),
(98, 'UH', 'Matematika', '005-MTK', 11, 'dds', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(99, 'UH', 'Matematika', '005-MTK', 12, 'saaaasa', '', '', '', '', '', '', '', '', '', '', '', 't', '', '', 3),
(102, 'UH', 'Matematika', '005-MTK', 20, 'hahah', '', 'coba1', 'coba2', 'coba3', 'coba4', '', '', '', '', '', '', '', '', '', 5),
(157, 'Jenis Ujian', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(158, 'Mapel HARUS', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0),
(103, 'UH', 'Matematika', '005-MTK', 21, 'multiple answer contoh', '', 'Ajaja', 'bajajja', 'caccaca', 'dadada', '', '', '', '', '', '', 'C', '', '', 5),
(104, 'UH', 'Matematika', '005-MTK', 22, 'cobaaja', '', 'coba aja1', 'coba aja2', 'coba aja3', 'coba aja4', '', '', '', '', '', '', 'A', '', '', 5),
(105, 'UH', 'Matematika', '005-MTK', 23, '', '', '', '', '', '', '', '', '', '', '', '', 'A', '', '', 5),
(106, 'UH', 'Matematika', '005-MTK', 24, 'dssdsd', '', 'dwdw', 'dwdw', 'dw', 'dwdw', '', '', '', '', '', '', 'C', '', '', 5),
(107, 'UH', 'Matematika', '005-MTK', 25, 'sdsds', '', 'ds', 'fs', 'fds', 'ds', '', '', '', '', '', '', 'A', '', '', 5),
(108, 'UH', 'Matematika', '005-MTK', 26, 'ddd', '', 'ee', 'fef', 'fe', 'fe', '', '', '', '', '', '', 'A', '', '', 5),
(109, 'UH', 'Matematika', '005-MTK', 27, 'coba benar salah', '', '', '', '', '', '', '', '', '', '', '', 'T', '', '', 3),
(110, 'UH', 'Matematika', '005-MTK', 28, 'coba salah benar', '', '', '', '', '', '', '', '', '', '', '', 'F', '', '', 3),
(111, 'UH', 'Matematika', '005-MTK', 29, 'bismillah benar salah', '', '', '', '', '', '', '', '', '', '', '', 'T', '', '', 3),
(112, 'UH', 'Matematika', '005-MTK', 30, 'bismillah benar salah', '', '', '', '', '', '', '', '', '', '', '', 'F', '', '', 3),
(119, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 5, 'dasas', 'E-KELULUSAN.png', 'ssa', 'qwqw', 'sasas', 'sas', '', '', '', '', '', '', 'D', '', '', 1),
(114, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 1, 'sdsaad', '', 'dadsas', 'daa', 'assd', 'aa', '', '', '', '', '', '', 'B', '', 'un-2014_sma-ma_listening-audio.mp3', 1),
(115, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 2, 'dsdasd', 'Ucpan.png', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(118, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 3, 'sasasa', 'E-RAPORT.png', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(117, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 4, 'sdas', 'Ucpan.png', '', '', '', '', '', '', '', '', '', '', 'T', '', '', 3),
(120, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 6, 'benar slaah', '', '', '', '', '', '', '', '', '', '', '', 'F', '', '', 3),
(121, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 7, 'salah benar', '', '', '', '', '', '', '', '', '', '', '', 'T', '', '', 3),
(122, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 8, 'mana yang benaar?', '', '', '', '', '', '', '', '', '', '', '', 'T', '', '', 3),
(123, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 9, 'mana yang salah?', '', '', '', '', '', '', '', '', '', '', '', 'F', '', '', 3),
(124, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 10, 'coba aja pilih benar ato salah?', '', '', '', '', '', '', '', '', '', '', '', 'T', '', '', 3),
(125, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 8, 'coba multiple answer', '', 'oabaA', 'oab', 'k', 'kak', '', '', '', '', '', '', 'D', '', '', 5),
(126, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 11, 'Multiple Answer', '', 'OpsiA', 'OpsiB', 'OpsiC', 'OpsiD', '', '', '', '', '', '', 'A', '', '', 5),
(178, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 10, 'listening', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Toefl Excercise 1 modul.mp3', 2),
(128, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 12, '', '', 'jawaban 2', 'pernyataan 2', 'pernyataan 3', '', '', '', '', '', '', '', '', '', '', 4),
(129, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 13, 'cwedwed', '', 'wdw', 'wq', 'wqq', 'wqw', '', '', '', '', '', '', 'A', '', '', 5),
(130, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 16, 'xsd', '', 'pilihan1', 'pilihan2', 'pilihan3', 'dasdas', '', '', '', '', '', '', '', '', '', 5),
(131, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 38, 'dfsfss', '', 'pilihan1', 'pilihan2', 'Nemo architecto sunt', 'pilihan4', '', '', '', '', '', '', '', '', '', 5),
(132, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 22, '', '', 'Vero ut elit amet ', 'Earum ab molestiae f', 'Culpa placeat numq', '', '', '', '', '', '', '', '', '', '', 4),
(133, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 35, '', '', 'Eligendi ut saepe do', 'Modi ut quidem cillu', 'Incididunt consectet', '', '', '', '', '', '', '', '', '', '', 4),
(134, 'UH', 'Matematika', '005-MTK', 90, '<a href=\"https://id.wikipedia.org/wiki/Berkas:Aksara_Jawa.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Aksara_Jawa.svg/230px-Aksara_Jawa.svg.png\" style=\"height:20px; width:230px\" /></a>', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(135, 'UH', 'Matematika', '005-MTK', 91, '<a href=\"https://id.wikipedia.org/wiki/Berkas:Aksara_Jawa.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Aksara_Jawa.svg/230px-Aksara_Jawa.svg.png\" style=\"height:20px; width:230px\" /></a>', '', '<a href=\"https://id.wikipedia.org/wiki/Berkas:Aksara_Jawa.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Aksara_Jawa.svg/230px-Aksara_Jawa.svg.png\" style=\"height:20px; width:230px\" /></a>', '<a href=\"https://id.wikipedia.org/wiki/Berkas:Aksara_Jawa.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Aksara_Jawa.svg/230px-Aksara_Jawa.svg.png\" style=\"height:20px; width:230px\" /></a>', '<a href=\"https://id.wikipedia.org/wiki/Berkas:Aksara_Jawa.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Aksara_Jawa.svg/230px-Aksara_Jawa.svg.png\" style=\"height:20px; width:230px\" /></a>', '<a href=\"https://id.wikipedia.org/wiki/Berkas:Aksara_Jawa.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Aksara_Jawa.svg/230px-Aksara_Jawa.svg.png\" style=\"height:20px; width:230px\" /></a>', '', '', '', '', '', '', 'B', '', '', 1),
(136, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 14, 'contoh jodohkan soal berikut ini', '', 'kamu', 'kamu', 'kita', '', '', '', '', '', '', '', '', '', '', 4),
(145, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 7, 'kompleks', '', 'satu', 'dua', 'tiga', 'empat', '', '', '', '', '', '', 'D', '', '', 5),
(138, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 1, 'contoh jodohkan soal', '', 'meong', '', 'mooo', '', '', '', '', '', '', '', '', '', '', 4),
(139, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 2, 'coba multiple answer', '', 'coba1', 'pilihan2', 'pilihan3', 'coba4', '', '', '', '', '', '', '', '', '', 5),
(140, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 3, 'multiple answer lagi', '', 'pilihan1', 'pilihan2', 'pilihan3', 'd', '', '', '', '', '', '', '', '', '', 5),
(141, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 3, 'cobaPG edit', '', 'aaa', 'bb', 'cc', 'ddd', '', '', '', '', '', '', 'D', '', '', 1),
(142, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 4, 'essayyy', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(143, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 6, 'contoh jodoh soal', '', 'jawaban1', 'jawaban2', 'jawaban3', '', '', '', '', '', '', '', '', '', '', 4),
(144, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 5, 'benar salah', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3),
(146, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 8, 'kompleks', '', 'kompleksA', 'kompleksB', 'kompleksC', 'kompleksD', '', '', '', '', '', '', 'ABC', '', '', 4),
(147, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 9, 'fssd', '', 'sdad', 'daa', 'dad', 'da', '', '', '', '', '', '', 'ACD', '', '', 4),
(148, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 10, 'asa', '', 'asassa', 'sxasa', 'sas', 'asa', '', '', '', '', '', '', 'C', '', '', 5),
(149, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 11, 'saas', '', 'Quia ad ut adipisici', 'Do aut non non sed', 'Do at fugit aut et ', 'Ex amet ut quos non', '', '', '', '', '', '', '', '', '', 5),
(150, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 12, 'sdaa', '', 'Aliqua Id quasi omn', 'Modi voluptatum eos ', 'Adipisicing amet it', 'Ex commodo est velit', '', '', '', '', '', '', 'BCD', '', '', 5),
(151, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 13, 'PG', '', 'ADDA', 'BDD', 'CDS', 'DDS', '', '', '', '', '', '', 'B', '', '', 1),
(152, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 14, 'ESSAUY', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(153, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 15, 'BENARRRR', '', '', '', '', '', '', '', '', '', '', '', 'T', '', '', 3),
(154, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 16, 'SALAH BENAR', '', '', '', '', '', '', '', '', '', '', '', 'F', '', '', 3),
(155, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 17, 'sadadada', '', 'Quidem cillum sint s', 'Velit pariatur Dolo', 'Est veniam quibusda', 'Voluptates nobis aut', '', '', '', '', '', '', 'BCD', '', '', 5),
(171, 'SIMULASI', 'INDO', 'INDO-11-2023', 6, 'Pertanyaan 1', '', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', '', '', 'user-sarpras.png', '', '', 'A', '', NULL, 1),
(172, 'SIMULASI', 'INDO', 'INDO-11-2023', 7, 'Pertanyaan 2', '', 'opsi A', 'opsi B', 'opsi C', 'opsi D', 'opsi E', 'user-sarpras.png', '', '', '247-2473491_open-book-icon-png-vector-icon-book-and.png', '', 'B', '', NULL, 1),
(173, 'SIMULASI', 'INDO', 'INDO-11-2023', 8, 'Pertanyaan uraian', 'user-sarpras.png', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 2),
(174, 'SIMULASI', 'INDO', 'INDO-11-2023', 9, 'Pertanyaan Benar Salah', '', '', '', '', '', '', '', '', '', '', '', 'T', '', NULL, 3),
(175, 'SIMULASI', 'INDO', 'INDO-11-2023', 10, 'Pertanyaan Salah Benar', '', '', '', '', '', '', '', '', '', '', '', 'F', '', NULL, 3),
(176, 'SIMULASI', 'INDO', 'INDO-11-2023', 11, 'Pertanyaan PG Kompleks', '', 'A', 'B', 'C', 'D', '', '', '', '', '', '', 'ACD', '', '', 4),
(177, 'SIMULASI', 'INDO', 'INDO-11-2023', 12, 'Pertanyaan PG Kompleks', '', 'opsi A', 'opsi B', 'opsi C', 'opsi D', '', '', '', '', '', '', 'ABC', '', '', 4),
(179, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 15, 'listening', '', 'a', 'b', 'c', 'd', '', '', '', '', '', '', 'A', '', 'Unit1.mp3', 1),
(180, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 21, '<hr />\r\n<hr />\r\n<hr />\r\n<hr />\r\n<hr />\r\n<hr />saadasada\r\n<hr />\r\n<hr />\r\n<hr />\r\n<hr />\r\n<hr />\r\n<hr />\r\n<hr />\r\n<hr />', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(181, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', 22, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><a href=\"https://www.youtube.com/watch?v=TDPDtrLxT-c\" target=\"coba\">https://www.youtube.com/watch?v=TDPDtrLxT-c</a></td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>https://youtube.com/watch?v=Icxn83A5xAw</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<a href=\"https://youtube.com/watch?v=X3ukamf5yow\" target=\"_self\">https://youtube.com/watch?v=X3ukamf5yow</a>', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2);

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
(6, 'SIMULASI', 'INDO', 'INDO-11-2023', '15', '00:15:00', 'DACABTFACDABC', 1, '2', 'hidden', '11', '100'),
(3, 'UH', 'Matematika', '005-MTK', '30', '00:30:00', 'CBABBAFTBtCAACAATFTFB', 0, '1', 'hidden', '11', '100'),
(4, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', '15', '00:15:00', 'BTDFTDFTAA', 0, '2', 'hidden', '11', '100'),
(5, 'SIMULASI', 'B.INGGRIS', 'B.ING-1', '10', '00:10:00', 'DDABCACDCBCDBAFBCD', 1, '2', 'hidden', '11', '100');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
