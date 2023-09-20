-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Sep 2023 pada 04.32
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

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
-- Struktur dari tabel `article`
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
-- Struktur dari tabel `jawaban`
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
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`nis`, `nama`, `kelas`, `kodemapel`, `jumlahsoal`, `kodesoal`, `aktif`, `waktu`, `jawabansiswa`, `benar`, `salah`, `nilai`, `kuncisoal`, `mulaiujian`, `lamaujian`, `waktuselesai`, `sisawaktu`) VALUES
('11236', 'Cakra', '7A', 'BIND-11IPA-SIM1', 8, '001', 'Aktif', '30', NULL, NULL, NULL, NULL, NULL, '13:54:25', '00:30:00', '14:24:25', '1860');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaburaian`
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
-- Dumping data untuk tabel `jawaburaian`
--

INSERT INTO `jawaburaian` (`id`, `nis`, `nama`, `kodesoal`, `nomersoal`, `soal`, `soal_gbr`, `soal_audio`, `jawaban`, `nilai`) VALUES
('001-1-0012346', '0012346', 'Andi', '001', '1', '', '', '', 'Berita', ''),
('001-2-0012346', '0012346', 'Andi', '001', '2', '', '', '', 'Untuk mengetahui langkah - langkah menggunakan sesuatu', ''),
('001-3-0012346', '0012346', 'Andi', '001', '3', '', '', '', 'Sebab - akibat', ''),
('005-MTK-7-054321', '054321', 'Aqil', '005-MTK', '7', '', '', '', 'trgdf', '0'),
('1234-1-0001222333', '0001222333', 'Jaemin', '1234', '1', '', '', '', 'jababesad', '0'),
('SOS-8-SIM-2-054321', '054321', 'Aqil', 'SOS-8-SIM', '2', '', '', '', 'sasas', '0'),
('SOS-8-SIM-2-11235', '11235', 'Sakti', 'SOS-8-SIM', '2', '', '', '', 'ssas', '0'),
('SOS-8-SIM-3-054321', '054321', 'Aqil', 'SOS-8-SIM', '3', '', '', '', 'sa', '0'),
('SOS-8-SIM-3-11235', '11235', 'Sakti', 'SOS-8-SIM', '3', '', '', '', 'ssS', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaihasil`
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
-- Dumping data untuk tabel `nilaihasil`
--

INSERT INTO `nilaihasil` (`id`, `nis`, `nama`, `kelas`, `kodemapel`, `jumlahsoal`, `kodesoal`, `aktif`, `jawabansiswa`, `benar`, `salah`, `nilai`, `nilaiurai`, `kuncisoal`, `statuskoreksi`) VALUES
(45, '0012346001', 'Andi', '11dua', 'BIND-11IPA-SIM1', 8, '001', '1', 'BAABC', '09:53:08am', '08-06-2022', '62.5', '0', 'BA', 2),
(47, '00012223331234', 'Jaemin', '7A', 'BAHASA INDONESIA', 4, '1234', '1', 'AC', '03:43:05pm', '09-06-2022', '5', '', 'B', 0),
(70, '11235SOS-8-SIM', 'Sakti', '7F', 'SOSIOLOGI', 7, 'SOS-8-SIM', '1', 'CTBFT', '01:02:51pm', '30-08-2023', '71.42', '', 'BTDFT', 0),
(71, '054321005-MTK', 'Aqil', '11IPA', 'Matematika', 23, '005-MTK', '1', 'CCABCBXCXFXXXX', '03:15:47pm', '01-09-2023', '26.08', '', 'CBABBAFTBtCAACAATFTF', 0),
(51, '11236005-MTK', 'Cakra', '11A', 'Matematika', 6, '005-MTK', '1', 'XBBXXC', '01:44:29pm', '25-11-2022', '16.66', '', 'CBABCA', 0),
(72, '054321SOS-8-SIM', 'Aqil', '11IPA', 'SOSIOLOGI', 10, 'SOS-8-SIM', '1', 'BTBFTTFF', '03:23:09pm', '01-09-2023', '80', '', 'BTDFTTFT', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
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
  `web` varchar(50) NOT NULL,
  `bg_login` varchar(30) NOT NULL,
  `kepsek` varchar(100) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `n_sekolah`, `sub_n_sekolah`, `kode_sekolah`, `logo`, `logo_ujian`, `jenis_ujian`, `kota`, `tanggal`, `th_ajaran`, `logo_kota`, `web`, `bg_login`, `kepsek`, `nip`) VALUES
(1, 'Sekolah Demo Smartschool', 'Jl. Raya Krangan - Pringsurat, Kenteng, Kebumen,', 'sekolah', 'mysch.png', 'myschid.png', 'Ujian Tengah Semester', 'Temanggung', '26 Juni 2020', '2023/2024', 'sma.png', 'https://mysch.web.id/', 'Tanda_Tangan.png', 'Dadang S. Pd', '19755551997031005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
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
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `jurusan`, `kelas`, `rombel`, `pass`, `Id_User`, `Id_Usergroup_User`, `foto`, `sesi`, `ruang`, `statuslogin`, `online`) VALUES
(1, '0012345', 'Dian', '', '10IPA', 'IPS', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', '1'),
(2, '0012346', 'Andi', '', '11IPA', 'BAHASA', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', '2'),
(12, '11234', 'Bima', '', '9H', '', '12345', 1, 1, NULL, 1, 'Ruang-5', '0', NULL),
(13, '11235', 'Sakti', '', '7F', '', '12345', 1, 1, NULL, 1, 'Ruang-3', '0', '2'),
(15, '1', 'Nanda', '', '10IPA', 'A', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', NULL),
(17, '334', 'arga', '', '10IPA', '', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', NULL),
(18, '054321', 'Aqil', '', '11IPA', 'IPA', '12345', 1, 1, NULL, 1, 'Ruang-2', '0', '1'),
(20, '12321', 'Bayu', '', '10IPS', '', '12345', 1, 1, NULL, 1, 'Ruang-1', '0', NULL),
(22, '9583678', 'Madun .dksl.', '', '9H', '', '12345', 1, 1, NULL, 1, 'Ruang-4', '0', NULL),
(23, '9658647', 'Sari', '', '9H', '', '12345', 1, 1, NULL, 1, 'Ruang-4', '0', NULL),
(24, '121211', 'Citra', '', '10IPA-A', '', '12345', 1, 1, NULL, 2, 'Ruang-1', '0', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
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
  `kunci` varchar(1) NOT NULL,
  `audio` varchar(300) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `soal`
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
(31, 'UH', 'Matematika', '005-MTK', 5, '160 + 550?', '', '770', '670', '710', '610', 'opsi E', '', '', '', '', '', 'B', '', 1),
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
(93, 'UH', 'Matematika', '005-MTK', 7, 'jsjjsjs', '', '', '', '', '', '', '', '', '', '', '', 'F', '', 2),
(95, 'UH', 'Matematika', '005-MTK', 8, 'djskjsjkls', '', '', '', '', '', '', '', '', '', '', '', 'T', '', 3),
(96, 'UH', 'Matematika', '005-MTK', 9, 'ssaaa', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(97, 'UH', 'Matematika', '005-MTK', 10, 'dsds', '', 'a', 'b', 'c', 'd', '', '', '', '', '', '', 'B', '', 1),
(98, 'UH', 'Matematika', '005-MTK', 11, 'dds', '', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(99, 'UH', 'Matematika', '005-MTK', 12, 'saaaasa', '', '', '', '', '', '', '', '', '', '', '', 't', '', 3),
(102, 'UH', 'Matematika', '005-MTK', 20, 'hahah', '', 'coba1', 'coba2', 'coba3', 'coba4', '', '', '', '', '', '', '', '', 5),
(101, 'SIMULASI', 'BIND-11IPA-SIM1', '001', 10, 'contoh multiple answer', '', 'coba1', 'coba2', 'coba3', 'coba4', '', '', '', '', '', '', 'D', '', 5),
(103, 'UH', 'Matematika', '005-MTK', 21, 'multiple answer contoh', '', 'Ajaja', 'bajajja', 'caccaca', 'dadada', '', '', '', '', '', '', 'C', '', 5),
(104, 'UH', 'Matematika', '005-MTK', 22, 'cobaaja', '', 'coba aja1', 'coba aja2', 'coba aja3', 'coba aja4', '', '', '', '', '', '', 'A', '', 5),
(105, 'UH', 'Matematika', '005-MTK', 23, '', '', '', '', '', '', '', '', '', '', '', '', 'A', '', 5),
(106, 'UH', 'Matematika', '005-MTK', 24, 'dssdsd', '', 'dwdw', 'dwdw', 'dw', 'dwdw', '', '', '', '', '', '', 'C', '', 5),
(107, 'UH', 'Matematika', '005-MTK', 25, 'sdsds', '', 'ds', 'fs', 'fds', 'ds', '', '', '', '', '', '', 'A', '', 5),
(108, 'UH', 'Matematika', '005-MTK', 26, 'ddd', '', 'ee', 'fef', 'fe', 'fe', '', '', '', '', '', '', 'A', '', 5),
(109, 'UH', 'Matematika', '005-MTK', 27, 'coba benar salah', '', '', '', '', '', '', '', '', '', '', '', 'T', '', 3),
(110, 'UH', 'Matematika', '005-MTK', 28, 'coba salah benar', '', '', '', '', '', '', '', '', '', '', '', 'F', '', 3),
(111, 'UH', 'Matematika', '005-MTK', 29, 'bismillah benar salah', '', '', '', '', '', '', '', '', '', '', '', 'T', '', 3),
(112, 'UH', 'Matematika', '005-MTK', 30, 'bismillah benar salah', '', '', '', '', '', '', '', '', '', '', '', 'F', '', 3),
(119, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 5, 'dasas', 'E-KELULUSAN.png', 'ssa', 'qwqw', 'sasas', 'sas', '', '', '', '', '', '', 'D', '', 1),
(114, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 1, 'sdsaad', '', 'dadsas', 'daa', 'assd', 'aa', '', '', '', '', '', '', 'B', '', 1),
(115, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 2, 'dsdasd', 'Ucpan.png', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(118, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 3, 'sasasa', 'E-RAPORT.png', '', '', '', '', '', '', '', '', '', '', '', '', 2),
(117, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 4, 'sdas', 'Ucpan.png', '', '', '', '', '', '', '', '', '', '', 'T', '', 3),
(120, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 6, 'benar slaah', '', '', '', '', '', '', '', '', '', '', '', 'F', '', 3),
(121, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 7, 'salah benar', '', '', '', '', '', '', '', '', '', '', '', 'T', '', 3),
(122, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 8, 'mana yang benaar?', '', '', '', '', '', '', '', '', '', '', '', 'T', '', 3),
(123, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 9, 'mana yang salah?', '', '', '', '', '', '', '', '', '', '', '', 'F', '', 3),
(124, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 10, 'coba aja pilih benar ato salah?', '', '', '', '', '', '', '', '', '', '', '', 'T', '', 3),
(125, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 8, 'coba multiple answer', '', 'oabaA', 'oab', 'k', 'kak', '', '', '', '', '', '', 'D', '', 5),
(126, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 11, 'Multiple Answer', '', 'OpsiA', 'OpsiB', 'OpsiC', 'OpsiD', '', '', '', '', '', '', 'A', '', 5),
(127, 'SIMULASI', 'BIND-11IPA-SIM1', '001', 20, 'asaS', '', '', '', '', '', '', '', '', '', '', '', 'F', '', 3),
(128, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', 12, '', '', 'jawaban 2', 'pernyataan 2', 'pernyataan 3', '', '', '', '', '', '', '', '', '', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `theme`
--

INSERT INTO `theme` (`id`, `warna`) VALUES
(2, 'blue'),
(1, 'blue'),
(3, 'show'),
(4, '0'),
(5, 'show');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
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
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`Urut`, `jenis`, `mapel`, `kodesoal`, `waktu`, `lamaujian`, `kunci`, `aktif`, `acak`, `opsi`, `kelas`, `nilai`) VALUES
(1, 'SIMULASI', 'BIND-11IPA-SIM1', '001', '30', '00:30:00', 'BAD', 0, '1', 'hidden', '7', '100'),
(3, 'UH', 'Matematika', '005-MTK', '30', '00:30:00', 'CBABBAFTBtCAACAATFTF', 1, '1', 'hidden', '11', '100'),
(4, 'TRYOUT', 'SOSIOLOGI', 'SOS-8-SIM', '15', '00:15:00', 'BTDFTDFTA', 0, '2', 'hidden', '11', '100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
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
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `jawaburaian`
--
ALTER TABLE `jawaburaian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilaihasil`
--
ALTER TABLE `nilaihasil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nis`),
  ADD UNIQUE KEY `username_2` (`nis`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`Urut`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nip`),
  ADD UNIQUE KEY `username_2` (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilaihasil`
--
ALTER TABLE `nilaihasil`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
