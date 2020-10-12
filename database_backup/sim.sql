-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 05:46 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas_tbl`
--

CREATE TABLE `berkas_tbl` (
  `berkas_ID` int(11) NOT NULL,
  `berkas_jenis` varchar(15) DEFAULT NULL,
  `berkas_nama` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_proker` int(11) DEFAULT NULL,
  `berkas_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `berkas_lembaga` int(11) NOT NULL,
  `id_opmawa` int(11) NOT NULL,
  `berkas_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas_tbl`
--

INSERT INTO `berkas_tbl` (`berkas_ID`, `berkas_jenis`, `berkas_nama`, `id_user`, `id_proker`, `berkas_tanggal`, `berkas_lembaga`, `id_opmawa`, `berkas_status`) VALUES
(1, 'lpj', 'LPJ_BEM_FMIPA_TAHUN_2018.pdf', 121, 0, '2020-02-02 02:40:13', 1, 1, 0),
(2, 'lpj', 'BISMILLAH_LPJ_AKHIR_KABINET_PROAKTIF_2018.pdf', 121, 0, '2020-02-05 15:54:15', 1, 2, 2),
(3, 'lpj', 'DOKUMENTASI.docx', 121, 55, '2020-02-05 13:32:18', 1, 2, 0),
(4, 'umum', '17__LAMPIRAN_DOKUMENTASI.docx', 121, 59, '2020-02-07 06:45:44', 1, 2, 2),
(5, 'lpj', 'ABSTRAK_MaulanaRahmanNur.docx', 121, 59, '2020-02-05 15:55:03', 1, 2, 2),
(6, 'umum', 'DHS.pdf', 121, 0, '2020-02-05 15:55:51', 1, 2, 2),
(7, 'umum', 'DAFTAR_PUSTAKA.docx', 121, 59, '2020-02-07 06:04:27', 1, 2, 0),
(8, 'umum', 'Surat_Lamaran_Pekerjaan.docx', 69, 0, '2020-03-14 16:41:11', 2, 2, 0),
(9, 'umum', 'formulir-Hak-CiptaNEW.doc', 121, 56, '2020-03-14 16:43:29', 1, 2, 0),
(10, 'lpj', 'Surat_Lamaran_Pekerjaan.docx', 121, 56, '2020-03-14 16:43:36', 1, 2, 0),
(11, 'link', 'test.com', 121, 56, '2020-03-14 16:43:44', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departemen_tbl`
--

CREATE TABLE `departemen_tbl` (
  `departemen_ID` int(11) NOT NULL,
  `departemen_nama` varchar(50) NOT NULL,
  `id_opmawa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen_tbl`
--

INSERT INTO `departemen_tbl` (`departemen_ID`, `departemen_nama`, `id_opmawa`) VALUES
(1, 'Badan Pengurus Harian', 1),
(12, 'Advokasi', 1),
(13, 'Ekonomi kreatif', 1),
(14, 'Informasi, komunikasi, dan teknologi', 1),
(15, 'Kaderisasi', 1),
(16, 'Pendidikan dan penelitian', 1),
(17, 'Sosial dan politik', 1),
(18, 'Tank MIPA', 1),
(19, 'Science club', 1),
(20, 'Desa binaan', 1),
(21, 'Forum perempuan', 1),
(22, 'Badan Pengurus Harian', 2),
(25, 'Advokasi dan Keolahragaan', 2),
(26, 'Kaderisasi', 2),
(27, 'Informasi dan Teknologi Kreatif', 2),
(28, 'Computer Science Islamic Centre', 2),
(29, 'Badan Pengurus Harian', 3);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_tbl`
--

CREATE TABLE `dosen_tbl` (
  `dosen_ID` int(11) NOT NULL,
  `dosen_nik` int(20) NOT NULL,
  `dosen_nama` varchar(50) NOT NULL,
  `dosen_password` varchar(25) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_tbl`
--

INSERT INTO `dosen_tbl` (`dosen_ID`, `dosen_nik`, `dosen_nama`, `dosen_password`, `id_prodi`) VALUES
(89, 1, 'Bu far', '3', 6);

-- --------------------------------------------------------

--
-- Table structure for table `evaluasirapat_tbl`
--

CREATE TABLE `evaluasirapat_tbl` (
  `evaluasiRapat_ID` int(11) NOT NULL,
  `id_rapat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `evaluasiRapat_isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluasirapat_tbl`
--

INSERT INTO `evaluasirapat_tbl` (`evaluasiRapat_ID`, `id_rapat`, `id_user`, `evaluasiRapat_isi`) VALUES
(1, 5, 69, 'Terlalu banyak mengobrol');

-- --------------------------------------------------------

--
-- Table structure for table `opmawa_tbl`
--

CREATE TABLE `opmawa_tbl` (
  `opmawa_ID` int(11) NOT NULL,
  `opmawa_kabinet` varchar(25) NOT NULL,
  `id_user` int(11) NOT NULL,
  `opmawa_tahun` int(5) NOT NULL,
  `opmawa_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opmawa_tbl`
--

INSERT INTO `opmawa_tbl` (`opmawa_ID`, `opmawa_kabinet`, `id_user`, `opmawa_tahun`, `opmawa_level`) VALUES
(1, 'Air Kelapa', 124, 2018, 0),
(2, 'Proaktif', 92, 2018, 6),
(3, 'Koordinatif', 101, 2019, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_tbl`
--

CREATE TABLE `pemasukan_tbl` (
  `pemasukan_ID` int(11) NOT NULL,
  `pemasukan_nominal` varchar(15) NOT NULL,
  `pemasukan_deskripsi` varchar(100) NOT NULL,
  `pemasukan_tanggal` date NOT NULL,
  `pemasukan_file` varchar(40) DEFAULT NULL,
  `id_proker` int(5) NOT NULL,
  `pemasukan_lembaga` int(3) NOT NULL,
  `id_opmawa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan_tbl`
--

INSERT INTO `pemasukan_tbl` (`pemasukan_ID`, `pemasukan_nominal`, `pemasukan_deskripsi`, `pemasukan_tanggal`, `pemasukan_file`, `id_proker`, `pemasukan_lembaga`, `id_opmawa`) VALUES
(1, '3052800', 'Saldo kas BEM FMIPA bulan Januari 2018', '2018-01-01', NULL, 0, 1, 1),
(2, '26700', 'Infaq sekret', '2018-02-02', NULL, 0, 1, 1),
(3, '16000', 'Infaq BPH', '2018-02-09', NULL, 0, 1, 1),
(4, '20000', 'Infaq peminjaman inventaris', '2018-02-23', NULL, 0, 1, 1),
(5, '31500', 'Infaq BPH', '2018-03-20', NULL, 0, 1, 1),
(6, '1880000', 'Uang PKMF dari rektorat', '2018-05-10', NULL, 0, 1, 1),
(7, '350000', 'Uang DIVA dari dekanat', '2018-05-21', NULL, 0, 1, 1),
(10, '30000', 'Infaq BPH', '2018-06-01', NULL, 0, 1, 1),
(11, '350000', 'Uang DIVA dari dekanat tahap 2', '2018-06-21', NULL, 0, 1, 1),
(12, '2000000', 'Feskes (dekanat)', '2018-07-06', NULL, 0, 1, 1),
(13, '802000', 'Turunan uang KMB', '2018-08-10', NULL, 0, 1, 1),
(14, '1000000', 'Feskes (dekanat)', '2018-09-07', NULL, 0, 1, 1),
(15, '1050000', 'Feskes (dekanat)', '2018-10-18', NULL, 0, 1, 1),
(16, '150000', 'Kembalian rektor cup', '2018-10-22', NULL, 0, 1, 1),
(17, '1880000', 'Seminar (rektorat)', '2018-11-16', NULL, 0, 1, 1),
(18, '5000000', 'FEMI', '2018-11-23', NULL, 0, 1, 1),
(19, '4935000', 'LKTIN', '2018-11-23', NULL, 0, 1, 1),
(20, '2750000', 'M3D', '2018-11-23', NULL, 0, 1, 1),
(21, '2085000', 'PKKMB (surplus)', '2018-11-26', NULL, 0, 1, 1),
(22, '500500', 'Uang turunan dari BPM periode 2017-2018', '2018-02-23', NULL, 0, 2, 1),
(24, '155000', 'Kas bulan Februari', '2018-02-28', NULL, 0, 2, 1),
(25, '240000', 'Iuran ID card (16 orang)', '2018-02-28', NULL, 0, 2, 1),
(26, '70000', 'Kas bulan Maret', '2018-03-31', NULL, 0, 2, 1),
(27, '200000', 'Kas bulan April', '2018-04-30', NULL, 0, 2, 1),
(28, '140000', 'Kas bulan Mei', '2018-05-31', NULL, 0, 2, 1),
(29, '890000', 'Iuran PDL anggota BPM bulan Juni', '2018-06-28', NULL, 0, 2, 1),
(30, '400000', 'Iuran PDL anggota BPM bulan Juli', '2018-07-31', NULL, 0, 2, 1),
(31, '675000', 'Iuran PDL anggota BPM bulan Agustus', '2018-08-31', NULL, 0, 2, 1),
(32, '145000', 'Surplus PLMF diterima dari Bella', '2018-07-06', NULL, 0, 2, 1),
(33, '54500', 'Surplus kaleg diterima dari Bella', '2018-10-08', NULL, 0, 2, 1),
(34, '300000', 'Surplus PLMF diterima dari Bella', '2018-12-07', NULL, 0, 2, 1),
(35, '410000', 'Kas Juli - Desember', '2018-12-31', NULL, 0, 2, 1),
(40, '2800000', 'Turunan dari BEM Matematika periode 2017/2018', '2018-01-27', NULL, 0, 1, 2),
(41, '3200000', 'Turunan dari BEM Matematika periode 2017/2018', '2018-02-13', NULL, 0, 1, 2),
(43, '140000', 'Pengganti sebagian konsumsi panitia BINER 3.0', '2018-04-05', NULL, 0, 1, 2),
(44, '46000', 'Uang iuran kebersihan (fiksasi) + sapu + kabel roll (BEMP Ma', '2018-04-07', NULL, 0, 1, 2),
(45, '2000', 'Sekret BEM', '2018-04-10', NULL, 0, 1, 2),
(46, '900000', 'Turunan dari BEM Matematika periode 2017/2018', '2018-05-21', NULL, 0, 1, 2),
(47, '1500000', 'Dana fakultas computer science sport', '2018-07-09', NULL, 0, 1, 2),
(48, '25000', 'Tempat mukena dan pengki sekret', '2018-07-12', NULL, 0, 1, 2),
(49, '300000', 'Turunan dari BEM Matematika periode 2017/2018', '2018-07-13', NULL, 0, 1, 2),
(50, '1410000', 'Dana fakultas computer science sport', '2018-07-25', NULL, 0, 1, 2),
(65, '46000', 'Uang iuran kebersihan (fiksasi) + sapu + kabel roll (BEMP Ma', '2018-04-04', NULL, 0, 1, 2),
(66, '1000000', 'a', '0001-01-01', NULL, 55, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_tbl`
--

CREATE TABLE `pengeluaran_tbl` (
  `pengeluaran_ID` int(11) NOT NULL,
  `pengeluaran_nominal` varchar(15) NOT NULL,
  `pengeluaran_deskripsi` varchar(60) NOT NULL,
  `pengeluaran_tanggal` date NOT NULL,
  `pengeluaran_file` varchar(25) DEFAULT NULL,
  `id_proker` int(5) NOT NULL,
  `pengeluaran_lembaga` int(3) NOT NULL,
  `id_opmawa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran_tbl`
--

INSERT INTO `pengeluaran_tbl` (`pengeluaran_ID`, `pengeluaran_nominal`, `pengeluaran_deskripsi`, `pengeluaran_tanggal`, `pengeluaran_file`, `id_proker`, `pengeluaran_lembaga`, `id_opmawa`) VALUES
(1, '180000', 'Modal untuk Ekre', '2018-02-07', NULL, 0, 1, 1),
(2, '130000', 'Fiksasi', '2018-02-09', NULL, 0, 1, 1),
(3, '70000', 'Uang kebersihan pra-RKB', '2018-02-23', NULL, 0, 1, 1),
(4, '72000', 'Materai untuk RKB', '2018-02-27', NULL, 0, 1, 1),
(5, '85000', 'Konsumsi RKB', '2018-02-27', NULL, 0, 1, 1),
(6, '30000', 'Uang kebersihan RKB', '2018-02-27', NULL, 0, 1, 1),
(7, '27000', 'Print TOR', '2018-02-28', NULL, 0, 1, 1),
(8, '68000', 'Print TOR revisi', '2018-03-05', NULL, 0, 1, 1),
(9, '67500', 'Diklit zone', '2018-03-14', NULL, 0, 1, 1),
(10, '200000', 'KURUS I', '2018-03-23', NULL, 0, 1, 1),
(11, '100000', 'KPS', '2018-03-26', NULL, 0, 1, 1),
(12, '300100', 'Pembayaran web', '2018-03-19', NULL, 0, 1, 1),
(13, '90000', 'Banner penyambutan maba', '2018-04-01', NULL, 0, 1, 1),
(14, '67500', 'Banner diklit zone', '2018-04-19', NULL, 0, 1, 1),
(15, '200000', 'KURUS II', '2018-04-20', NULL, 0, 1, 1),
(16, '200000', 'Kajian pendidikan', '2018-04-23', NULL, 0, 1, 1),
(17, '1000000', 'PKMF 2018', '2018-05-11', NULL, 0, 1, 1),
(18, '38000', 'Outbond PKMF', '2018-05-12', NULL, 0, 1, 1),
(20, '372000', 'DIVA', '2018-04-23', NULL, 0, 1, 1),
(21, '1000000', 'Feskes', '2018-07-04', NULL, 0, 1, 1),
(22, '137000', 'DIVA (ganti bon)', '2018-07-06', NULL, 0, 1, 1),
(23, '225000', 'Beli cadridge', '2018-07-10', NULL, 0, 1, 1),
(24, '45000', 'Banner ', '2018-07-19', NULL, 0, 1, 1),
(25, '225000', 'Cadridge warna + tinta', '2018-07-19', NULL, 0, 1, 1),
(26, '160000', 'X banner', '2018-07-16', NULL, 0, 1, 1),
(27, '1500000', 'Feskes', '2018-07-06', NULL, 0, 1, 1),
(28, '96000', 'Jendela MIPA', '2018-07-20', NULL, 0, 1, 1),
(29, '90000', 'Banner penyambutan maba', '2018-07-18', NULL, 0, 1, 1),
(30, '100000', 'Uang kebersihan sidang pleno', '2018-08-11', NULL, 0, 1, 1),
(31, '115000', 'DIVA (ganti bon)', '2018-08-11', NULL, 0, 1, 1),
(32, '75000', 'Pembatas buku', '2018-08-16', NULL, 0, 1, 1),
(33, '200000', 'BUMI', '2018-09-06', NULL, 0, 1, 1),
(34, '1000000', 'Rektor cup', '2018-09-07', NULL, 0, 1, 1),
(35, '100000', 'KURUS', '2018-09-28', NULL, 0, 1, 1),
(36, '122000', 'Booklet PKKMB (untuk SPJ) ', '2018-10-19', NULL, 0, 1, 1),
(37, '260000', 'PKKMB (ganti bon)', '2018-10-19', NULL, 0, 1, 1),
(38, '45000', 'Beli HVS (1 rim)', '2018-10-27', NULL, 0, 1, 1),
(39, '1500000', 'FEMI', '2018-10-27', NULL, 0, 1, 1),
(40, '300000', 'M3D', '2018-11-21', NULL, 0, 1, 1),
(41, '2000000', 'Seminar entrepreneur', '2018-12-01', NULL, 0, 1, 1),
(42, '2500000', 'FEMI (ganti bon)', '2018-12-05', NULL, 0, 1, 1),
(43, '20000', 'Uang kebersihan RKB GDS Lt 10', '2018-02-27', NULL, 0, 2, 1),
(44, '22000', 'Konsumsi RKB', '2018-02-27', NULL, 0, 2, 1),
(45, '13500', 'Eco notes untuk pembuatan mading BPM (diberikan kepada Rosit', '2018-03-06', NULL, 0, 2, 1),
(46, '46500', 'ATK untuk pembuatan mading BPM (diberikan kepada Dikny)', '2018-03-07', NULL, 0, 2, 1),
(47, '250000', 'Pembayaran ID Card (diberikan kepada Dessy)', '2018-04-05', NULL, 0, 2, 1),
(48, '45000', 'Bingkisan sosialisasi PO (diberikan kepada Nur Devi Vani)', '2018-04-27', NULL, 0, 2, 1),
(49, '25000', 'Tambahan pembayaran ID Card (diberikan kepada Dessy)', '2018-05-30', NULL, 0, 2, 1),
(50, '1000000', 'Pembayaran uang muka PDL diberikan kepada Rahid', '2018-06-28', NULL, 0, 2, 1),
(51, '100000', 'Concord dan nametag TIPE diberikan kepada Dessy', '2018-06-28', NULL, 0, 2, 1),
(52, '100000', 'Merchant welcoming maba diberikan kepada Dessy', '2018-07-15', NULL, 0, 2, 1),
(53, '145000', 'Konsumsi pleno', '2018-08-31', NULL, 0, 2, 1),
(54, '195000', 'Pemakaian untuk kebersihan pleno', '2018-08-31', NULL, 0, 2, 1),
(55, '1033000', 'Pelunasan PDL', '2018-09-02', NULL, 0, 2, 1),
(56, '50000', 'Bendera BPM diberikan kepada Agung', '2018-07-06', NULL, 0, 2, 1),
(57, '20000', 'Proposal OH diberikan kepada Dessy', '2018-09-28', NULL, 0, 2, 1),
(58, '75000', 'Cap BPM (Dessy)', '2018-10-19', NULL, 0, 2, 1),
(59, '80000', 'Cap KPU (Agung)', '2018-10-21', NULL, 0, 2, 1),
(60, '100000', 'PKMF', '2018-11-11', NULL, 0, 2, 1),
(61, '150000', 'KPU', '2018-11-19', NULL, 0, 2, 1),
(62, '450000', 'Pembayaran ruangan sidang umum', '2018-12-31', NULL, 0, 2, 1),
(65, '100000', 'Uang kebersihan ruangan (fiksasi)', '2018-02-14', NULL, 0, 1, 2),
(66, '259000', 'Modal danus', '2018-03-04', NULL, 0, 1, 2),
(67, '400000', 'Konsumsi panitia BINER 3.0', '2018-03-10', NULL, 0, 1, 2),
(68, '150000', 'Apresiasi wisuda', '2018-03-13', NULL, 0, 1, 2),
(69, '150000', 'Snack RKB', '2018-03-16', NULL, 0, 1, 2),
(70, '100000', 'Famday', '2018-03-29', NULL, 0, 1, 2),
(71, '40000', 'Sapu + kabel roll sekret BEM', '2018-04-04', NULL, 0, 1, 2),
(72, '100000', 'Tinta printer sekret BEM', '2018-04-04', NULL, 0, 1, 2),
(73, '195500', 'Modal danus', '2018-04-05', NULL, 0, 1, 2),
(74, '6000', 'Kwitansi', '2018-05-03', NULL, 0, 1, 2),
(75, '24000', 'Materai 3000 (6)', '2018-05-03', NULL, 0, 1, 2),
(76, '400000', 'Buka bersama Ilmu Komputer', '2018-06-04', NULL, 0, 1, 2),
(77, '2000000', 'Gema ramadhan from mathematic', '2018-06-07', NULL, 0, 1, 2),
(78, '187500', 'Emblem BEM prodi ilmu komputer', '2018-06-21', NULL, 0, 1, 2),
(79, '7500', 'Dompet BEM', '2018-07-12', NULL, 0, 1, 2),
(80, '58000', 'Tempat mukena dan pengki sekret', '2018-07-12', NULL, 0, 1, 2),
(81, '150000', 'Dana LLM prodi ilmu komputer', '2018-07-16', NULL, 0, 1, 2),
(82, '17000', 'Stiker (Sosialisasi)', '2018-07-26', NULL, 0, 1, 2),
(83, '28000', 'Mogi-mogi (sosialisasi)', '2018-07-26', NULL, 0, 1, 2),
(84, '200000', 'Famday', '2018-08-06', NULL, 0, 1, 2),
(85, '165000', 'Service printer', '2018-08-07', NULL, 0, 1, 2),
(86, '160000', 'Print stiker pintu sekret', '2018-08-07', NULL, 0, 1, 2),
(87, '22000', 'TOP (sosialisasi)', '2018-08-13', NULL, 0, 1, 2),
(88, '35000', 'Stempel', '2018-08-14', NULL, 0, 1, 2),
(89, '20000', 'Jilid + fc', '2018-08-15', NULL, 0, 1, 2),
(90, '802111', '111', '0001-01-11', NULL, 55, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posisi_tbl`
--

CREATE TABLE `posisi_tbl` (
  `posisi_ID` int(11) NOT NULL,
  `posisi_nama` varchar(50) NOT NULL,
  `posisi_lembaga` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi_tbl`
--

INSERT INTO `posisi_tbl` (`posisi_ID`, `posisi_nama`, `posisi_lembaga`) VALUES
(1, 'Ketua umum', 1),
(2, 'Ketua umum', 2),
(3, 'Ketua departemen / biro', 1),
(4, 'Anggota departemen / biro', 1),
(5, 'Ketua underbow', 1),
(6, 'Ketua komisi', 2),
(7, 'Anggota komisi', 2),
(8, 'Ketua fraksi', 2),
(9, 'Kepala BURT', 2),
(10, 'Bendahara', 2),
(11, 'Sekretaris', 2),
(12, 'Humas', 2),
(13, 'BALEG', 2),
(14, 'BADAS', 2),
(15, 'BAKAR', 2),
(16, 'Sekretaris umum', 1),
(17, 'Bendahara umum', 1),
(18, 'Sekretaris departemen / biro', 1),
(19, 'Bendahara departemen / biro', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prodi_tbl`
--

CREATE TABLE `prodi_tbl` (
  `prodi_ID` int(11) NOT NULL,
  `prodi_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi_tbl`
--

INSERT INTO `prodi_tbl` (`prodi_ID`, `prodi_nama`) VALUES
(1, 'Pendidikan Matematika'),
(5, 'Matematika'),
(6, 'Ilmu Komputer'),
(7, 'Statistika'),
(8, 'Fisika'),
(9, 'Pendidikan Fisika'),
(10, 'Biologi'),
(11, 'Kimia'),
(12, 'Pendidikan Biologi'),
(13, 'Pendidikan Kimia');

-- --------------------------------------------------------

--
-- Table structure for table `prokeranggota_tbl`
--

CREATE TABLE `prokeranggota_tbl` (
  `prokerAnggota_ID` int(11) NOT NULL,
  `id_proker` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prokeranggota_tbl`
--

INSERT INTO `prokeranggota_tbl` (`prokerAnggota_ID`, `id_proker`, `id_posisi`, `id_user`) VALUES
(27, 13, 86, 40),
(29, 15, 88, 36),
(30, 16, 89, 34),
(33, 56, 93, 95),
(34, 56, 94, 97),
(35, 56, 95, 96),
(36, 56, 95, 98),
(37, 56, 95, 99),
(38, 74, 96, 110),
(39, 74, 97, 111),
(40, 74, 98, 112),
(41, 74, 98, 113),
(42, 64, 99, 100),
(43, 64, 100, 101),
(45, 64, 101, 103),
(46, 64, 101, 104),
(47, 64, 101, 102),
(48, 100, 102, 70),
(49, 92, 104, 116),
(50, 92, 105, 74),
(51, 92, 104, 69);

-- --------------------------------------------------------

--
-- Table structure for table `prokerevaluasi_tbl`
--

CREATE TABLE `prokerevaluasi_tbl` (
  `prokerEvaluasi_ID` int(11) NOT NULL,
  `id_proker` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `prokerEvaluasi_isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prokerevaluasi_tbl`
--

INSERT INTO `prokerevaluasi_tbl` (`prokerEvaluasi_ID`, `id_proker`, `id_user`, `prokerEvaluasi_isi`) VALUES
(26, 28, 69, 'Kehadiran peserta sidang yang minim'),
(27, 28, 69, 'Jadwal yang kurang mengakomodir kehadiran'),
(28, 28, 69, 'Perlunya pemahaman tentang bahasan sidang'),
(29, 28, 69, 'Perlunya pemahaman terkait urgensi dari setiap sidang'),
(30, 33, 69, 'Perlu ditambahkan follow up dengan bentuk komunikasi yang berkelanjutan dengan dekanat FMIPA '),
(31, 34, 69, 'Diganti dengan rapat rutin karena jadwal anggota yang padat'),
(32, 35, 69, 'Perlu meningkatkan kesadaran antara BPM dengan BEMF dalam menjalankan rapat ini'),
(33, 36, 69, 'Jadwal harus mengakomidir kehadiran semua peserta sidang'),
(34, 36, 69, 'Perlunya pemahaman terkait urgensi menghadiri sidang pleno'),
(35, 38, 69, 'Dalam pelaksanaannya perlu untuk disosialisasikan ke semua anggota BPM FMIPA agar dalam mengawasinya bisa lebih lengkap'),
(36, 39, 69, 'Perlu ada persiapan lebih baik'),
(37, 40, 69, 'Pembuatan diusahakan diawal kepengurusan sehingga sudah dapat dipakai ketika pertama kali mengawas'),
(38, 41, 69, 'Perlu adanya konsistensi dan modifikasi'),
(39, 42, 69, 'Perlu adanya penyatuan visi dalam program ini'),
(40, 43, 69, 'Jadwal perlu mengakomidir kehadiran peserta'),
(41, 44, 69, 'Perlu keistiqomahan dalam memposting'),
(42, 44, 69, 'Perlu konsep media yang baku untuk satu periode'),
(43, 45, 69, 'BPM FMIPA perlu berperan lebih aktif lagi dalam menjaring aspirasi dan menggalang isu'),
(44, 45, 69, 'Lebih luas lagi yang dijadikan pesertanya'),
(45, 46, 69, 'Perlu adanya penyatuan visi dalam program ini'),
(46, 47, 69, 'Perlu adanya sosialisasi jadwal agar waktunya tidak bentrok'),
(47, 48, 69, 'Perlu follow up dan info kepada mahasiswa tentang hasilnya'),
(48, 49, 69, 'Kesadaran anggota legislatif masih rendah terkait proses kaderisasi yang berdampak pada terhambatnya kinerja dan perkembangan lembaga'),
(49, 50, 69, 'Lebih sering'),
(50, 51, 69, 'Pelaksanaannya sudah baik namun perlu disosialisasikan lebih gencar lagi agar banyak anggota legislatif yang hadir'),
(51, 52, 69, 'Pelaksanaannya sudah baik namun perlu disosialisasikan lebih gencar lagi agar banyak anggota legislatif yang hadir'),
(52, 53, 69, 'Perlu kesadaran dari setiap anggota komisi terkait pentingnya mengawasi BEMF'),
(53, 54, 69, 'Perlu dipersiapkan penyelenggara pemilu yang berkualitas'),
(59, 85, 69, 'Karena kita menunjuk bamus, jadi semua berhak untuk ikut musyawarah '),
(60, 86, 69, 'Perlu adanya kesadaran dari pihak LLM maupun BEM untuk mengadakan rapat ini'),
(61, 88, 69, 'Hanya terlaksana sekali, berdasarkan PO seharusnya pertriwulan (3bulan sekali) '),
(62, 89, 69, 'Kurang efektif karena sering tidak dibawa oleh LLM atau lupa diserahkan ketika diterima, ataupun juga karena hanya selembar kertas kecil, maka mudah hilang. '),
(63, 91, 69, 'Terlaksana dua kali sesuai dengan kesepakatan bersama dengan LLMP Ilmu Komputer dan Ilmu Komputer yang masing-masing mendapat kesempatan untuk mengadakan kajian satu kali'),
(64, 95, 69, 'Terlaksana satu kali setelah ada mahasiswa baru, satu saat PKKM'),
(65, 97, 69, 'Hanya terlaksana saat sidang RKB dan sidang umum '),
(66, 99, 69, 'Diadakan bersama dengan LLMP Matematika dan LLMP Ilmu Komputer '),
(67, 100, 69, 'Kurangnya kesadaran untuk saling mengingatkan dan hanya ketua yang sering mengingatkan melalui Birthday Alert di grup WA'),
(68, 101, 69, 'Diharapkan lebih aktif dan rapih dalam setiap postingannya '),
(69, 100, 69, 'Kerja jangan gabut terus'),
(70, 92, 69, 'Kurang gorengan'),
(71, 74, 69, 'TEst\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `prokerposisi_tbl`
--

CREATE TABLE `prokerposisi_tbl` (
  `prokerPosisi_ID` int(11) NOT NULL,
  `id_proker` int(3) NOT NULL,
  `prokerPosisi_nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prokerposisi_tbl`
--

INSERT INTO `prokerposisi_tbl` (`prokerPosisi_ID`, `id_proker`, `prokerPosisi_nama`) VALUES
(85, 12, 'Ketua pelaksana'),
(86, 13, 'Ketua pelaksana'),
(87, 14, 'Ketua pelaksana'),
(88, 15, 'Ketua pelaksana'),
(89, 16, 'Ketua pelaksana'),
(90, 17, 'Ketua pelaksana'),
(91, 26, 'TEST'),
(92, 12, 'Administrasi'),
(93, 56, 'Ketua Pelaksana'),
(94, 56, 'Wakil Ketua Pelaksana'),
(95, 56, 'Staff Panitia'),
(96, 74, 'Ketua Pelaksana'),
(97, 74, 'Wakil Ketua Pelaksana'),
(98, 74, 'Staff Panitia'),
(99, 64, 'Ketua Pelaksana'),
(100, 64, 'Wakil Ketua Pelaksana'),
(101, 64, 'Staff Panitia'),
(102, 100, 'Bendahara'),
(104, 92, 'Ketua'),
(105, 92, 'Bendahara'),
(106, 55, 'Ketua Pelaksana');

-- --------------------------------------------------------

--
-- Table structure for table `prokertugas_tbl`
--

CREATE TABLE `prokertugas_tbl` (
  `prokerTugas_ID` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_proker` int(11) NOT NULL,
  `prokerTugas_deskripsi` varchar(255) NOT NULL,
  `prokerTugas_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prokertugas_tbl`
--

INSERT INTO `prokertugas_tbl` (`prokerTugas_ID`, `id_user`, `id_proker`, `prokerTugas_deskripsi`, `prokerTugas_status`) VALUES
(1, 45, 12, 'Buat rundown untuk acara', 1),
(2, 70, 100, '1. Mengelola keuangan kepanitian', 0),
(3, 74, 92, 'Mengumpulkan uang', 0),
(4, 69, 92, 'Mengkordinir panitia', 1),
(5, 0, 56, 'A\r\n', 0),
(6, 0, 56, 'A\r\n', 0),
(7, 0, 56, 'dasd', 0),
(8, 0, 56, 'las', 0),
(9, 0, 56, '', 0),
(10, 0, 56, 'sdadsad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `proker_tbl`
--

CREATE TABLE `proker_tbl` (
  `proker_ID` int(11) NOT NULL,
  `proker_nama` varchar(100) NOT NULL,
  `proker_deskripsi` text NOT NULL,
  `proker_tanggal` date DEFAULT NULL,
  `proker_jenis` varchar(10) DEFAULT NULL,
  `proker_lembaga` int(2) NOT NULL,
  `proker_tahun` int(5) NOT NULL,
  `proker_nilai` varchar(5) DEFAULT NULL,
  `proker_output` text,
  `id_opmawa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proker_tbl`
--

INSERT INTO `proker_tbl` (`proker_ID`, `proker_nama`, `proker_deskripsi`, `proker_tanggal`, `proker_jenis`, `proker_lembaga`, `proker_tahun`, `proker_nilai`, `proker_output`, `id_opmawa`) VALUES
(12, 'Pelatihan Kepemimpinan Mahasiswa FMIPA ', 'Sebagai salah satu program  untuk menghasilkan mahasiswa FMIPA yang kritis, peka terhadap masalah di lingkungan masyarakat, serta memiliki jiwa sosial di masyarakat nantinya terutama di lingkungan FMIPA', '2018-04-02', 'event', 1, 2018, NULL, 'Sebagai salah satu program  untuk menghasilkan mahasiswa FMIPA yang kritis, peka terhadap masalah di lingkungan masyarakat, serta memiliki jiwa sosial di masyarakat nantinya terutama di lingkungan FMIPA', 1),
(13, 'Family day', 'Kegiatan Famday BEM FMIPA diadakan sebagai bentuk penjagaan, yang merupakan fungsi dari departemen kaderisasi, selain itu sebagai bentuk Quality time bagi kader BEM FMIPA', '0000-00-00', 'non_event', 1, 2018, NULL, 'Sebagai salah satu program  untuk menghasilkan mahasiswa FMIPA yang kritis, peka terhadap masalah di lingkungan masyarakat, serta memiliki jiwa sosial di masyarakat nantinya terutama di lingkungan FMIPA', 1),
(14, 'BE-MINION, FISI, dan DBD ', 'BEMF MIPA notifications, FMIPA menginspirasi, dan Dekat Bersama Mereka', '0000-00-00', 'non_event', 1, 2018, NULL, 'Untuk BE-MINION dilaksanakan untuk mengabarkan, kabar setiap anggota BEM FMIPA baik ulang tahun, kabar duka, ataupun musibah yang akan selalu update tiap harinya. Untuk FISI dilaksanakan tiap pekan dengan memberikan motivasi ke setiap kader , melalui media sosial Whats App yang di laksanakan oleh delegasi di tiap departemen. Dan untuk DBD dilaksanakan 2 pekan sekali dengan narasumber yang berbeda-beda', 1),
(15, 'Sahabat kaderisasi', 'Perlu adanya penjagaan dari kaderisasi ke tiap departemen BEM FMIPA dan juga ke tiap Prodi. Sebagai sarana mempererat tali silaturahmi dan juga sebagai bentuk monitoring kondisi di tiap departemen dan BEM Prodi', '0000-00-00', 'non_event', 1, 2018, NULL, NULL, 1),
(16, 'SOL (School of Leadership)', 'Diperlukannya alur pengkaderan untuk mempersiapkan kader yang akan meneruskan tonggak perjuangan di BEM FMIPA. Dalam bergorganisasi penting bagi kita untuk meningkatkan kualitas kepemimpinan kita, maka hadirlah SOL untuk mengembangkan jiwa kepemimpin', '0000-00-00', 'non_event', 1, 2018, NULL, 'Diperlukannya alur pengkaderan untuk mempersiapkan kader yang akan meneruskan tonggak perjuangan di BEM FMIPA. Dalam bergorganisasi penting bagi kita untuk meningkatkan kualitas kepemimpinan kita, maka hadirlah SOL untuk mengembangkan jiwa kepemimpinan terkhusus untuk anggota BEM se MIPA', 1),
(17, 'Pengenalan Kehidupan Kampus Mahasiswa Baru FMIPA', 'PKKMB FMIPA merupakan suatu agenda yang dilatarbelakangi banyaknya mahasiswa baru yang masih susah beradaptasi dengan dunia kampus, terutama dalam hal keakademikan dan organisasi yang berada di dalam kampus', '2018-01-01', 'event', 1, 2018, NULL, NULL, 1),
(18, 'Diklit Zone', 'Diklit Zone merupakan program kerja yang sudah dilaksanakan di tahun sebelumnya. Program kerja ini merupakan bagian dari info-info mengenai keilmiahan seperti info lomba, info prestasi, lelang judul, dan info terkini dari hasil diskusi. Semua sub-sub proker ini memiliki perbedaan waktu pelaksanaan. Info lomba dilaksanakan 2 minggu sekali, pada 6 bulan pertama info lomba disebar melalui grup namun berdasarkan evaluasi dan diskusi, info lomba dibuatkan grup khusus. Info prestasi berisifat tentatif, dibuat sesuai dengan kondisi.  Lelang judul dipertengahan tahun, dan diskusi ilmiah diadakan sebulan sekali. Dari semua hal ini yang berjalan hanya info prestasi, info lomba dan diskusi ilmiah sedangkan lelang judul belum terlaksana', '0000-00-00', 'non_event', 1, 2018, NULL, 'Diklit Zone merupakan program kerja yang sudah dilaksanakan di tahun sebelumnya. Program kerja ini merupakan bagian dari info-info mengenai keilmiahan seperti info lomba, info prestasi, lelang judul, dan info terkini dari hasil diskusi. Semua sub-sub proker ini memiliki perbedaan waktu pelaksanaan. Info lomba dilaksanakan 2 minggu sekali, pada 6 bulan pertama info lomba disebar melalui grup namun berdasarkan evaluasi dan diskusi, info lomba dibuatkan grup khusus. Info prestasi berisifat tentatif, dibuat sesuai dengan kondisi.  Lelang judul dipertengahan tahun, dan diskusi ilmiah diadakan sebulan sekali. Dari semua hal ini yang berjalan hanya info prestasi, info lomba dan diskusi ilmiah sedangkan lelang judul belum terlaksana. ', 1),
(19, 'kajian Pendidikan', 'Kajian Pendidikan merupakan kajian tahunan yang biasanya diadakan untuk menyambut event-event kependidikan, seperti Hardiknas dan Hari Guru. Pada Hardiknas kemarin, kajian pendidikan ini dapat terlaksana dengan dua kali pertemuan yaitu online dan off', '0000-00-00', 'non_event', 1, 2018, NULL, 'Kajian Pendidikan merupakan kajian tahunan yang biasanya diadakan untuk menyambut event-event kependidikan, seperti Hardiknas dan Hari Guru. Pada Hardiknas kemarin, kajian pendidikan ini dapat terlaksana dengan dua kali pertemuan yaitu online dan offline. Peserta yang datang cukup banyak tetapi semua kegiatan dilaksanakannya secara selalu mepet. Di Kajian Pendidikan ini, seharusnya mendapatkan dana rektorat tetapi proposal yang diajukan terlalu lama dibuat sehingga tidak dapat dicairkan. Kajian pendidikan berikutnya dilakukan sebanyak tiga kali berturut-turut dengan tema pengembangan softskill mahasiswa dimana pelaksanaannya dibantu oleh pihak dekanat. Peserta yang hadir tidak begitu banyak karena dilaksanakan siang hari pada jam kuliah namun ada yang diisi oleh prodi biologi sebagai kuliah umum wajib.', 1),
(20, 'Festival MIPA UNJ 2018', 'Festival MIPA merupakan program kerja Depatemen Pendidikan dan Penelitian Badan Eksekutif Mahasiswa Fakultas Matematika dan Ilmu Pengetahuan Alam Universitas Negeri Jakarta 2018. Kegiatan ini terdiri dari Pelangi Matematika 25, Pekan Ilmiah Fisika, T', '2018-01-01', 'event', 1, 2018, NULL, 'Festival MIPA merupakan program kerja Depatemen Pendidikan dan Penelitian Badan Eksekutif Mahasiswa Fakultas Matematika dan Ilmu Pengetahuan Alam Universitas Negeri Jakarta 2018. Kegiatan ini terdiri dari Pelangi Matematika 25, Pekan Ilmiah Fisika, Temu Kimia XXII, dan Biology Learning Festival. Kegiatan ini meliputi Olimpiade IPA Terpadu, Olimpiade Matematika (SD/MI/Sederajat, SMP/MTs/Sederajat, SMA/MA/SMK/Sederajat), Galileo dan Eistein Competition (SMA/MA/SMK/Sederajat), Pesona Kimia (SMA/MA/SMK/Sederajat), dan Olimpiade Biologi (SMA/MA/SMK/Sederajat). Selain itu acara tahun ini ditambah dengan Lomba Karya Tulis Nasional Festival MIPA 2018, dan Seminar. Olimpiade ini diadakan untuk seluruh Siswa/i di Indonesia. Dengan izin Allah, proker ini dapat berjalan dengan lancar dan tidak mengalami defisit.', 1),
(21, 'Orientasi Science Club (OSC)', 'Kegiatan ini terdiri dari dua bagian yaitu Pra OSC dan OSC. Pra OSC dilaksanakan pada hari Sabtu, 24 Maret 2018 bertempat di Gedung Dewi Sartika Lt. 10, Kampus A UNJ. Untuk hari-H OSC berlangsung pada Sabtu-Minggu, 78 April 2018 di PP IPTEK TMII. Ada', '2018-03-24', 'event', 1, 2018, NULL, 'Kegiatan ini terdiri dari dua bagian yaitu Pra OSC dan OSC. Pra OSC dilaksanakan pada hari Sabtu, 24 Maret 2018 bertempat di Gedung Dewi Sartika Lt. 10, Kampus A UNJ. Untuk hari-H OSC berlangsung pada Sabtu-Minggu, 78 April 2018 di PP IPTEK TMII. Adapun kegiatan ini bertujuan untuk meningkatkan budaya ilmiah dikalangan mahasiswa FMIPA, meningkatkan kemampuan menulis dikalangan mahasiswa FMIPA, memperkenalkan seluk beluk penelitian kepada mahasiswa FMIPA, menumbuhkan daya tarik \r\n\r\n \r\nmahasiswa FMIPA dalam bidang penelitian, meningkatkan motivasi berprestasi yang didapat dari narasumber yang dihadirkan dalam acara OSC dan melakukan pengkaderan calon anggota Science Club. Pelaksanaan OSC banyak mengalami kendala. Kesibukkan panitia ditempat lain menyebabkan beberapa tugas sie back up dengan panitia lain dan kegiatan OSC ini kurang maksimal dilihat dari sedikitnya peserta yang ikut sampai OSC Perlu komunikasi yang intensif antar panitia dengan angggota diklit BEMF agar saling memberikan motivasi dan mengingatkan dalam kebaikan. \r\n ', 1),
(22, 'Reform', '-', '2018-12-03', 'event', 1, 2018, NULL, NULL, 1),
(23, 'Festival kesehatan', 'Festival Kesehatan 2018 di komandoi oleh Muhammad Irfan Ananda.Program ini terlaksana pada tanggal 7 juni 2018 melayani berbagai pelayanan kesehatan yang  berkerjasama dengan Ikatan Dokter Indonesia (IDI). Dengan jumlah peserta sebanyak 100 peserta khitanan masal, pengobatan umum, bedah minor, dan periksa gigi. Pada tahun ini festival kesehatan di laksanakan lebih awal dari tahun sebelumnya baru terselenggara pada bulan September', '2018-06-07', 'event', 1, 2018, NULL, 'Festival Kesehatan 2018 di komandoi oleh Muhammad Irfan Ananda.Program ini terlaksana pada tanggal 7 juni 2018 melayani berbagai pelayanan kesehatan yang berkerjasama dengan Ikatan Dokter Indonesia (IDI). Dengan jumlah peserta sebanyak 100 peserta khitanan masal, pengobatan umum, bedah minor, dan periksa gigi. Pada tahun ini festival kesehatan di laksanakan lebih awal dari tahun sebelumnya baru terselenggara pada bulan September', 1),
(24, 'Lemari baca anak MIPA', 'Dalam pelaksanaannya, Lemari baca ini kurang maksimal dikarenakan perijinan penempatan lemari yang terkendala ijin dari pihak dekanat. Sehingga buku-buku yang sudah ada hanya diletakkan di secretariat BEM FMIPA lantai 4 GHA', '2018-06-07', 'non_event', 1, 2018, NULL, 'Dalam pelaksanaannya, Lemari baca ini kurang maksimal dikarenakan perijinan penempatan lemari yang terkendala ijin dari pihak dekanat. Sehingga buku-buku yang sudah ada hanya diletakkan di secretariat BEM FMIPA lantai 4 GHA', 1),
(25, 'Ketuk pintu sospol', 'Dalam rangka silaturahmi dan haering antara underbow dengan Departemen Sospol di laksanakan agenda KPS. Program ini berjalan satu kali selama priode kepengurusan pada tanggal 25 maret bertempat di rumah Irfan.  Dalam agenda ini di hadiri oleh anggota Departemen Sospol, desa binaan , TAnK MIPA, Forum Perempuan FMIPA', '2018-06-07', 'non_event', 1, 2018, NULL, 'Dalam rangka silaturahmi dan haering antara underbow dengan Departemen Sospol di laksanakan agenda KPS. Program ini berjalan satu kali selama priode kepengurusan pada tanggal 25 maret bertempat di rumah Irfan. Dalam agenda ini di hadiri oleh anggota Departemen Sospol, desa binaan , TAnK MIPA, Forum Perempuan FMIPA', 1),
(26, 'Aksi sospol', 'Dalam berapa momentum kami melakukan aksi turun ke jalan diantaranya :Aksi bela rupiah (14 september 2018),  Aksi tugu tani (24 september 2018), Aksi Nasional Jokowi-JK (29 oktober 2018), Aksi Gruduk Kemenristekdikti (13 Desember 2018),dll ', '2018-06-07', 'non_event', 1, 2018, NULL, 'Dalam berapa momentum kami melakukan aksi turun ke jalan diantaranya :Aksi bela rupiah (14 september 2018), Aksi tugu tani (24 september 2018), Aksi Nasional Jokowi-JK (29 oktober 2018), Aksi Gruduk Kemenristekdikti (13 Desember 2018),dll', 1),
(27, 'FMIPA peduli', 'Dalam rangka tanggap bencana  Departemen Sospol FMIPA beberapa kali melakukan penggalangan donasi untuk korban bencana alam salah satunnya pada saat \r\n\r\n \r\ngemba Lombok dan Tsunami Palu. Bantuan yang di berikan berupa uang tunai dan pakaian layak pakai', '2018-06-07', 'non_event', 1, 2018, NULL, 'Dalam rangka tanggap bencana Departemen Sospol FMIPA beberapa kali melakukan penggalangan donasi untuk korban bencana alam salah satunnya pada saat gemba Lombok dan Tsunami Palu. Bantuan yang di berikan berupa uang tunai dan pakaian layak pakai', 1),
(28, 'Sidang paripurna', 'Sidang yang diselenggarakan untuk melaksanakan tugas dan wewenang lembaga legislatif. Seperti mengesahkan anggota BPM, pengesahan ketua KPU', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(29, 'Rapat koordinasi I', 'Sidang yang bertujuan untuk membahas dan mengesahkan peraturan internal, struktur, timeline, dan agenda kerja BPM', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(30, 'Rapat koordinasi II', 'Sidang yang bertujuan untuk membuat dan pembahasan awal draft mekanisme pengawasan, mekanisme anggaran, dan mekanisme aspirasi', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(31, 'Pra rapat kerja bersama BEMF', 'Membahas mekanisme pengawasan, mekanismen anggaran, dan mekanisme aspirasi dengan BEMF serta membahas peraturan ketua BEMF dan proker-proker BEMF', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(32, 'Rapat kerja bersama BEMF', 'Mengesahkan mekanisme pengawasan, mekanisme anggaran, mekanisme aspirasi, peraturan ketua BEMF dan proker-proker BEMF', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(33, 'Rapat kerja bersama dekanat', 'Membahas dan mengesahkan program keja BEMF dan agenda kerja BPM beserta anggaranya dengan dekanat FMIPA', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(34, 'Rapat pimpinan', 'Membahas kabar tiap fraksi dan menentukan langkah strategis lainnya', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(35, 'Rapat dengar pendapat komisi', 'Rapat yang dilakukan untuk mengkonfirmasi sesuatu antara komisi pengawas dengan departemen yang diawasi', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(36, 'Sidang pleno', 'Sidang untuk mengevaluasi tengah periode kinerja BEMF dan BPM', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(37, 'Sidang umum BPM FMIPA UNJ', 'Forum tertinggi Opmawa FMIPA yang dilaksanakan akhir periode', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(38, 'SOP administrasi', 'SOP yang mengatur tata administrasi di Opmawa FMIPA', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(39, 'Buletin legislatif', 'Buletin yang berisikan info-info tentang legislatif FMIPA', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(40, 'Identity card', 'Kartu anggota BPM FMIPA', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(41, 'Legislatif news', 'Artikel berita yang membahas tema kelegislatifan', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(42, 'Studi banding legislatif', 'Studi banding ke lembaga legislatif lain', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(43, 'Open house legislatif', 'Penyambutan mahasiswa baru dari lembaga legislatif se-MIPA', '2018-01-01', 'event', 2, 2018, NULL, NULL, 1),
(44, 'Media sosial legislatif', 'Sosial media BPM FMIPA', '2018-01-01', 'non_event', 2, 2018, NULL, NULL, 1),
(45, 'DIVA', 'Forum dialog seluruh civitas akademika FMIPA', '2018-01-01', 'event', 2, 2018, NULL, NULL, 1),
(46, 'Class to class', 'Menjaring aspirasi mahasiswa dengan cara masuk ke kelas-kelas', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(47, 'Hearing', 'BPM FMIPA untuk menjaring aspirasi legislatif prodi dengan cara menemui langsung', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(48, 'Jaring aspirasi', 'Menjaring aspirasi mahasiswa', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 1),
(49, 'PLMF', 'Proses kaderisasi anggota legislatif tingkat fakultas', '2018-01-01', 'event', 2, 2018, NULL, NULL, 1),
(50, 'Family day BPM FMIPA UNJ', 'Proses silaturahim untuk menguatkan ikatan antar anggota BPM', '2018-01-01', 'non_event', 2, 2018, NULL, NULL, 1),
(51, 'Kajian legislatif', 'Salah satu program kaderisasi dalam hal peningkatan pemahaman kelegislatifan', '2018-01-01', 'event', 2, 2018, NULL, NULL, 1),
(52, 'Sosialisasi peraturan Opmawa', 'Salah satu program kaderisasi dalam hal peningkatan pemahaman kelegislatifan di bidang legislasi', '2018-01-01', 'event', 2, 2018, NULL, NULL, 1),
(53, 'Pengawasan proker BEM', 'Mengawasi setiap program kerja BEMF', '2018-01-01', 'non_event', 2, 2018, NULL, NULL, 1),
(54, 'Komisi pemilihan umum', 'Lembaga independent yang menyelenggarakan pemilu', '2018-01-01', 'non_event', 2, 2018, NULL, NULL, 1),
(55, ' Pundi dan Nadi', 'Nadi merupakan program turunan dari Departemen Advokasi BEM UNJ', '0000-00-00', 'non_event', 1, 2018, NULL, NULL, 2),
(56, 'Computer Science Sport (CSS) ', 'Computer Science Sport adalah suatu perlombaan keolahragaan yang coba mempertemukan tiap kelas/prodi yang ada dengan cabang olahraga diantara lain futsal putra/putri, voli putra, catur putra/putri, tarik tambang putra/putri, basket putra, Estafet dan E-Sport yang telah direncanakan berlangsung pada bulan Mei 2018', '2018-05-02', 'event', 1, 2018, NULL, NULL, 2),
(57, ' Bank Data Mahasiswa (BADAI) ', 'BADAI merupakan proker pengumpulan data mahasiswa', '2018-05-02', 'non_event', 1, 2018, NULL, NULL, 2),
(58, 'Bank Data Kuliah (BADAK) ', 'BADAI merupakan proker pengumpulan data mata kuliah yang di dapat dari soal-soal pada saat ujian ', '2018-05-02', 'non_event', 1, 2018, NULL, NULL, 2),
(59, 'Agen Advor ', 'Agen advor merupakan mahasiswa yang menjadi perwakilan untuk setiap kelas di angkatannya sebagai wadah penyampai informasi dan sebagai wadah penjaring aspirasi', '2018-05-02', 'non_event', 1, 2018, '80', NULL, 2),
(60, ' I-Lowker Beasiswa Lomba', 'Informasi Lowongan Kerja, beasiswa, dan lomba', '2018-05-02', 'non_event', 1, 2018, NULL, NULL, 2),
(61, ' Apresiasi Wisuda Mahasiswa Ilmu Komputer', 'Pada semester 108 dan 109, Prodi Ilmu Komputer memiliki Mahasiswa yang lulus sebanyak 12 orang, dan seluruh memdapatkan Siluet yang diberikan saat Acara Wisuda yang bertempat di Hall D2 Jiexpo Kemayoran.', '2018-05-02', 'non_event', 1, 2018, NULL, NULL, 2),
(62, 'Fun Fact Sport', 'Proker yang bergerak dalam bidang publikasi yang memberikan info menarik tentang dunia olahraga, Proker ini juga belum terlaksana lantaran masih belum adanya Sosialisasi kepada Masyarakat Ilmu Komputer', '2018-05-02', 'non_event', 1, 2018, NULL, NULL, 2),
(63, 'Family Day', 'Sebuah acara silaturahmi antar pengurus opmawa prodi ilmu komputer', '2018-05-02', 'non_event', 1, 2018, NULL, NULL, 2),
(64, 'PKKMB prodi ilmu komputer', 'PKKMB Prodi Ilmu Komputer merupakan wadah pengkaderan bagi mahasiswa baru yang akan mulai memasuki dunia kampus. PKKMB Prodi Ilmu Komputer ini berlangsung pada tanggal 18 Agustus dan 7 September 2018 yang bertempat di Gedung Hasyim Asjarie. ', '2018-08-17', 'event', 1, 2018, NULL, NULL, 2),
(65, 'Muhasabah Perjuangan', '-', '2018-08-17', 'non_event', 1, 2018, NULL, NULL, 2),
(66, 'Upgrading staff', 'Disatukan dengan Famday I', '2018-08-17', 'non_event', 1, 2018, NULL, NULL, 2),
(67, 'Hati ke Hati', 'Hati ke Hati kami melaksanakan nya secara Online. Hati ke Hati  ini dilaksanakan setiap malam minggu sampai akhir kepengurusan. Berlangsung pada pukul 20.00 sampai menjelang Jam Malam', '2018-08-17', 'non_event', 1, 2018, NULL, NULL, 2),
(68, 'Pelatihan Kepemimpinan Mahasiswa Prodi Bersama (PKMPB) ', 'Acara pelatihan kepemimpinan untuk mahasiswa ilmu komputer', '2018-09-17', 'event', 1, 2018, NULL, NULL, 2),
(69, 'Mading', '-', '2018-09-17', 'non_event', 1, 2018, NULL, NULL, 2),
(70, 'Reminder Hari X ', '-', '2018-09-17', 'non_event', 1, 2018, NULL, NULL, 2),
(71, 'Pelatihan Website', 'Pelatihan pembuatan website bagi prodi ilmu komputer', '2018-09-17', 'non_event', 1, 2018, NULL, NULL, 2),
(72, 'Gathering Ilkom', 'Kumpul bersama dengan mahasiswa dan alumni ilmu komputer', '2018-09-17', 'non_event', 1, 2018, NULL, NULL, 2),
(73, ' Sosmed Maintenance', '-', '2018-09-17', 'non_event', 1, 2018, NULL, NULL, 2),
(74, 'GRAFIC (Gema Ramadhan From Mathematic) ', '\r\n Bulan ramadhan ialah bulan yang penuh dengan berkah. maka dari itu dept cosmic mengajak civitas akademika rumpun matematika untuk menyemarakkan ramadhan dengan menyelenggarakan agenda kebaikan bernama GRAFIC (Gema Ramadhan From Mathematic).  ', '2018-06-08', 'event', 1, 2018, NULL, NULL, 2),
(75, 'BAPER (Buka Puasa Bareng Ilmu Komputer) ', 'Agenda BAPER adalah agenda yang mirip dengan GRAFIC namun agenda ini lebih dibatasi pada civitas akademika Ilmu Komputer saja', '0000-00-00', 'non_event', 1, 2018, NULL, NULL, 2),
(76, 'Majalah Dinding (Mading)', 'Mading ini bertempat di Musholla Al-Khawarizmi di Gedung Dewi Sartika Lantai 5. Alhamdulillah selama 1 periode ini, kami sudah membuat 1 tema mading yaitu “Saatnya Move On” di bulan Januari 2019 H', '0000-00-00', 'non_event', 1, 2018, NULL, NULL, 2),
(77, 'KABAR (Kajian Bareng Ilmu Komputer)', '\r\n KABAR berbentuk taujih yang mana tema dari taujih tersebut ditentukan oleh kelas Ilmu Komputer yang ditunjuk, dan dilaksanakan oleh departemen cosmic', '0000-00-00', 'non_event', 1, 2018, NULL, NULL, 2),
(78, 'HTML (Hadist, Tausiyah, Motivasi, dan La Tansa)', '\r\n HTML berbentuk elektronik (jarkoman) alhamdulillah sudah kami jalankan di setiap kamisnya sesuai kesepakatan Aliansi Dakwah FMIPA walau tidak berjalan dengan baik agar tiap harinya selalu ada tausiyah dari rohis jurusan maupun LD MUA dan dengan itu HTML dapat tersebar lebih luas ke segala jurusan bahklan lebih luas lagi, begitu juga dengan tausiyah rohis jurusan lainnya dan LD MUA', '0000-00-00', 'non_event', 1, 2018, NULL, NULL, 2),
(79, 'Pra Rapat Koordinasi', 'rapat pertama bersama BEM prodi', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 2),
(80, 'Rapat Koordinasi', 'rapat bersama BEM prodi', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 2),
(81, 'Pra Rapat Kerja Bersama', 'rapat bersama BEM prodi', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 2),
(82, 'Rapat Kerja Bersama', 'rapat bersama BEM prodi', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 2),
(83, 'Rapat Pimpinan', 'rapat bersama pimpinan BEM prodi', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 2),
(84, 'Rapat Komisi', 'rapat bersama perwakilan setiap departemen BEM prodi', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 2),
(85, 'Rapat Koordinasi Bamus', '-', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 2),
(86, 'Rapat Dengar Pendapat', 'Rapat Bersama BEM prodi', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 2),
(87, 'Sidang Umum', 'Sidang untuk membicarakan pertanggungjawaban pada kepengurusan Opmawa periode 2018-2019', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 2),
(88, 'Sidang Pleno', '-', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 2),
(89, 'Tanda Bukti Penerimaan Proposal atau LPJ', 'Bukti bahwa BEM prodi telah memberikan/menyerahkan proposal/LPJ kepada LLM prodi', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 2),
(91, 'Kajian Legislatif', 'Seminar tentang kelegislatifan', '2018-01-01', 'event', 2, 2018, NULL, NULL, 2),
(92, 'Open House Legislatif', 'Open house untuk lebih mengenal lebih tentang kelegislatifan', '2018-01-01', 'event', 2, 2018, NULL, NULL, 2),
(93, 'Komisi Pemilihan Umum', 'Pemilu untuk menentukan kepengurusan Opmawa pada periode berikutnya', '2018-01-01', 'event', 2, 2018, NULL, NULL, 2),
(94, 'TIPE MPA FMIPA', 'Pengawasan MPA yang dilakukan saat pengenalan lingkungan akademik kepada mahasiswa baru, bekerja sama dengan BPM fakultas', '2018-01-01', 'event', 2, 2018, NULL, NULL, 2),
(95, 'Kotak Aspirasi', 'Wadah berupa kotak saran yang berisi aspirasi dari mahasiswa', '2018-01-01', 'non_event', 2, 2018, NULL, NULL, 2),
(96, 'Legislatif News', '-', '2018-01-01', 'non_event', 2, 2018, NULL, NULL, 2),
(97, 'Jaring Aspirasi (Angket)', 'Penyebaran angket untuk mendapatkan aspirasi dari mahasiswa', '2018-01-01', 'non_event', 2, 2018, NULL, NULL, 2),
(98, 'Studi Banding Legislatif', 'Silaturahmi dengan legislatif di prodi lain', '2018-01-01', 'non_event', 2, 2018, NULL, NULL, 2),
(99, 'Family Day LLM', '-', '2018-01-01', 'non_event', 2, 2018, NULL, NULL, 2),
(100, 'Birthday Alert', 'Birthday Alert adalah notifikasi secara berkala apabila ada anggota Legislatif yang berulang tahun', '2018-01-01', 'non_event', 2, 2018, NULL, NULL, 2),
(101, 'Sosial Media', '-', '2018-01-01', 'non_event', 2, 2018, NULL, NULL, 2),
(102, 'Seminar Kewirausahaan', 'Seminar', '2018-03-31', 'event', 1, 2018, NULL, NULL, 1),
(105, 'Bulan Legislatif', 'lll', '0000-00-00', 'non_event', 2, 2018, NULL, NULL, 2),
(106, 'Pelatihan Web Compare', 'pelatihan membuat website', '2019-06-20', 'event', 1, 2019, NULL, NULL, 3),
(107, 'Seminar Digital Startup', 'Seminar dalam membangun Startup', '2019-07-06', 'event', 1, 2019, NULL, NULL, 3),
(108, 'ULTRAMILK', 'Silaturahmi dengan keluarga ilmu komputer', '2019-09-29', 'event', 1, 2019, NULL, NULL, 3),
(109, 'Anjangsana', 'studi banding', '2019-11-22', 'event', 1, 2019, NULL, NULL, 3),
(110, 'GRAFIC (Gema Ramadhan From Mathematic) ', 'Perayaan bulan Ramadhan', '2019-05-22', 'event', 1, 2019, NULL, NULL, 3),
(111, 'BAPER (Buka Puasa Bareng Ilmu Komputer) ', 'Buka bersama dengan keluarga ilmu komputer', '2019-05-24', 'event', 1, 2019, NULL, NULL, 3),
(112, 'KABAR', '-', '0000-00-00', 'non_event', 1, 2019, NULL, NULL, 3),
(113, 'Apresiasi Wisuda', '-', '0000-00-00', 'non_event', 1, 2019, NULL, NULL, 3),
(114, 'PUNDI', 'kolektif untuk membantu mahasiswa yang kesulitan', '0000-00-00', 'non_event', 1, 2019, NULL, NULL, 3),
(115, 'Famday', 'Silaturahmi kepengurusan Opmawa ilkom', '2019-04-07', 'event', 1, 2019, NULL, NULL, 3),
(116, 'PKKMB', 'Penerimaan mahasiswa baru', '2019-08-17', 'event', 1, 2019, NULL, NULL, 3),
(117, 'PKMPB', 'Penerimaan kepemimpinan mahasiswa baru', '2019-10-15', 'event', 1, 2019, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rapat_tbl`
--

CREATE TABLE `rapat_tbl` (
  `rapat_ID` int(11) NOT NULL,
  `rapat_tanggal` date NOT NULL,
  `rapat_deskripsi` varchar(100) NOT NULL,
  `rapat_lembaga` int(11) NOT NULL,
  `id_opmawa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rapat_tbl`
--

INSERT INTO `rapat_tbl` (`rapat_ID`, `rapat_tanggal`, `rapat_deskripsi`, `rapat_lembaga`, `id_opmawa`) VALUES
(2, '2020-01-24', 'Silaturahmi', 1, 2),
(3, '2020-01-28', 'Bro', 1, 1),
(5, '2020-01-01', 'Famday New Year', 2, 2),
(6, '2020-01-28', 'Rapat mingguan', 2, 2),
(9, '2020-02-12', 'Membicarakan kebutuhan sidang umum bersama Legislatif', 1, 2),
(10, '2020-03-24', 'Test input jadwal', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_ID` int(11) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_NIM` varchar(15) NOT NULL,
  `user_pass` varchar(25) NOT NULL,
  `id_prodi` int(2) NOT NULL,
  `id_posisi` int(2) NOT NULL,
  `id_opmawa` int(11) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `user_tahun` int(4) NOT NULL,
  `user_role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_ID`, `user_nama`, `user_NIM`, `user_pass`, `id_prodi`, `id_posisi`, `id_opmawa`, `id_departemen`, `user_tahun`, `user_role`) VALUES
(34, 'Andi Ilham Razak', '9090909090', '9090909090', 12, 4, 1, 15, 2018, 1),
(35, 'M. Fadhil Haritsah ', '9090909090', '9090909090', 12, 4, 1, 15, 2018, 1),
(36, 'Citra Fatmala', '9090909090', '9090909090', 12, 4, 1, 15, 2018, 1),
(38, 'Ulan Al Ismu', '9090909090', '9090909090', 10, 4, 1, 15, 2018, 1),
(39, 'Mutiara Chaerunnisa', '9090909090', '9090909090', 9, 4, 1, 15, 2018, 1),
(40, 'Linda Astuti', '9090909090', '9090909090', 13, 4, 1, 15, 2018, 1),
(41, 'Refani Izqi L', '9090909090', '9090909090', 13, 4, 1, 15, 2018, 1),
(42, 'Nurul Thaniya S', '9090909090', '9090909090', 1, 4, 1, 15, 2018, 1),
(43, 'Mithalia Nour S', '9090909090', '9090909090', 5, 4, 1, 15, 2018, 1),
(44, 'Monica Ratna A', '9090909090', '9090909090', 6, 4, 1, 15, 2018, 1),
(46, 'Tri Setiyoto', '3325152952 ', '3325152952 ', 10, 3, 1, 16, 2018, 1),
(47, 'Jorgi Sanjaya', '9090909090', '9090909090', 10, 4, 1, 16, 2018, 1),
(48, 'Hanan Nurrohman', '9090909090', '9090909090', 10, 4, 1, 16, 2018, 1),
(49, 'Susi Rahmiyati', '9090909090', '9090909090', 10, 4, 1, 16, 2018, 1),
(50, 'Filadelfia R', '9090909090', '9090909090', 10, 4, 1, 16, 2018, 1),
(51, 'Faizah Nurwita', '9090909090', '9090909090', 1, 4, 1, 16, 2018, 1),
(52, 'Selfista Maria E', '9090909090', '9090909090', 1, 4, 1, 16, 2018, 1),
(53, 'Adi Bangga Wijaya', '9090909090', '9090909090', 1, 4, 1, 16, 2018, 1),
(54, 'Assita Wahyu A', '9090909090', '9090909090', 1, 4, 1, 16, 2018, 1),
(55, 'Nurul Avita Sari', '9090909090', '9090909090', 1, 4, 1, 16, 2018, 1),
(56, 'Radina Hanifah', '9090909090', '9090909090', 1, 4, 1, 16, 2018, 1),
(57, 'Wisnu Adi Nugroho', '3325152960 ', '3325152960 ', 1, 3, 1, 17, 2018, 1),
(58, 'Dini Fitria', '9090909090', '9090909090', 5, 4, 1, 17, 2018, 1),
(59, 'Rainy Suluya', '9090909090', '9090909090', 5, 4, 1, 17, 2018, 1),
(60, 'Chika Annisa', '9090909090', '9090909090', 5, 4, 1, 17, 2018, 1),
(61, 'Nuurur Risqa Aliya', '9090909090', '9090909090', 5, 4, 1, 17, 2018, 1),
(62, 'M. Irfany Ananda', '9090909090', '9090909090', 1, 4, 1, 17, 2018, 1),
(63, 'Nadhirah', '9090909090', '9090909090', 1, 4, 1, 17, 2018, 1),
(64, 'Nur Eka', '9090909090', '9090909090', 1, 4, 1, 17, 2018, 1),
(65, 'Widuri', '9090909090', '9090909090', 1, 4, 1, 17, 2018, 1),
(66, 'Anas Sadewo', '9090909090', '9090909090', 9, 5, 1, 17, 2018, 1),
(67, 'Robby Haryanto', '9090909090', '9090909090', 9, 5, 1, 17, 2018, 1),
(68, 'Widuri Andriana', '9090909090', '9090909090', 9, 5, 1, 17, 2018, 1),
(69, 'master LEGISLATIF', '2', '2', 6, 1, 2, 1, 2018, 2),
(70, 'Dhia Rahid', '3415150424', '3415150424', 12, 2, 1, 1, 2018, 2),
(71, 'Noer Syahbani', '1308617029', '1308617029', 10, 8, 1, 1, 2018, 2),
(72, 'Fauzan Nur Fahlurrahman', '3415163523', '3415163523', 12, 8, 1, 1, 2018, 2),
(73, 'Fadhillah Arifin', '3315160803', '3315160803', 13, 8, 1, 1, 2018, 2),
(74, 'Agung Aji Saputro', '3225161085', '3225161085', 8, 8, 1, 1, 2018, 2),
(75, 'Nur Devi Vani', '3215150734', '3215150734', 9, 8, 1, 1, 2018, 2),
(76, 'Devy Retnosari', '3125163412', '3125163412', 5, 8, 1, 1, 2018, 2),
(77, 'Dickny Asti Khaerunisa', '3415150782', '3415150782', 12, 9, 1, 1, 2018, 2),
(78, 'Zico Arman', '34251613174', '34251613174', 10, 6, 1, 15, 2018, 2),
(79, 'Maghfirah Idzati Aulia', '3415160162', '3415160162', 12, 6, 1, 12, 2018, 2),
(80, 'Dessy Putriana Sari', '3425161134', '3425161134', 10, 6, 1, 15, 2018, 2),
(81, 'Wahdivati Laisa A.P', '3315160416', '3315160416', 13, 6, 1, 13, 2018, 2),
(82, 'Rosita Ayu M', '1212121212', '1212121212', 10, 12, 1, 17, 2018, 2),
(83, 'Allika Firhandini', '1212121212', '1212121212', 10, 7, 1, 16, 2018, 2),
(84, 'Nina Deslina', '1212121212', '1212121212', 12, 7, 1, 14, 2018, 2),
(85, 'Elsa Oktaviani', '1212121212', '1212121212', 9, 7, 1, 15, 2018, 2),
(86, 'Bella Octavia', '1212121212', '1212121212', 5, 7, 1, 14, 2018, 2),
(87, 'Auzan Asyraf', '1212121212', '1212121212', 7, 7, 1, 17, 2018, 2),
(88, 'Athiyyah Afifah', '1212121212', '1212121212', 7, 7, 1, 13, 2018, 2),
(89, 'Master DOSEN', '1', '3', 6, 1, 2, 1, 2018, 0),
(92, 'Febrian Abdul Fatah', '3145161578', '3145161578', 6, 1, 2, 22, 2018, 1),
(93, 'Farah Ayu Anandita', '3145160616', '3145160616 ', 6, 16, 2, 22, 2018, 1),
(94, 'Dwi Solihatun', '3145161574', '3145161574 ', 6, 17, 2, 22, 2018, 1),
(95, 'Dwi Aryanto Dio Wicaksono', '3145161971 ', '3145161971 ', 6, 3, 2, 25, 2018, 1),
(96, 'Fathurrahman Ikhsan', '3145162943', '3030', 6, 4, 2, 25, 2018, 1),
(97, 'Ilham Arrosyid', '3145771278', '3030', 6, 4, 2, 25, 2018, 1),
(98, 'Ivan Adi Putra', '3145000011', '3030', 6, 4, 2, 25, 2018, 1),
(99, 'Octanina Salsabila', '3145163844', '3030', 6, 4, 2, 25, 2018, 1),
(100, 'Aina Indah Lestari', '3145163237 ', '3145163237 ', 6, 3, 2, 26, 2018, 1),
(101, 'Maldini Abdillah', '3145161922', '3030', 6, 1, 3, 29, 2019, 1),
(102, 'Yoppi Prasetya Saputra', '3144161011', '3030', 6, 4, 2, 26, 2018, 1),
(103, 'Maura Qoonitah Putri', '3145163934', '3030', 6, 4, 2, 26, 2018, 1),
(104, 'Togu Annaaf Kumara', '3145160483', '3030', 6, 4, 2, 26, 2018, 1),
(105, 'Anjar Mursyidi', '3145164245', '3145164245 ', 6, 3, 2, 27, 2018, 1),
(106, ' Muhammad Hafidz Oktaneva', '3145162844', '3030', 6, 4, 2, 27, 2018, 1),
(107, 'Muhammad Aufi Rayesa', '3145168322', '3030', 6, 4, 2, 27, 2018, 1),
(108, 'Aty Lestari', '3145163913', '3030', 6, 4, 2, 27, 2018, 1),
(109, 'Berilya Imandika', '3145169322', '3030', 6, 4, 2, 27, 2018, 1),
(110, 'Muhammad Insan Khamil', '3145161580', '3145161580 ', 6, 3, 2, 28, 2018, 1),
(111, ' Faqihuddin Al Farisi', '3145028118', '3030', 6, 4, 2, 28, 2018, 1),
(112, 'Faiz Akmal', '3145163893', '3030', 6, 4, 2, 28, 2018, 1),
(113, 'Muhammad Aziz Nurhikmah', '3145163855', '3030', 6, 4, 2, 28, 2018, 1),
(115, 'Norman Setyadi', '3125153860', 'ayam', 5, 3, 1, 13, 2018, 1),
(116, 'Erik Santiago', '3145152941', 'sonyericson', 6, 6, 2, 25, 2018, 2),
(121, 'Master EKSEKUTIF', '1', '1', 6, 1, 2, 1, 2018, 1),
(122, 'Assofa Maria', '9090909090-2018', '9090909090', 10, 4, 1, 15, 2018, 1),
(123, 'Wahyu Hutomo', '315151047-2018', '315151047', 1, 3, 1, 15, 2018, 1),
(124, 'Bayu Mukti Sanjoyo ', '3215153254', '3215153254', 12, 1, 1, 1, 2018, 1),
(125, 'Fachry Muhammad', '1313617019', '1313617019', 6, 2, 2, 22, 2018, 2),
(128, 'Tasya Nurfitria', '3145162145 ', '3145162145 ', 6, 6, 2, 26, 2018, 2),
(133, 'Prianugrah Widijatmiko', '1313617024', '1313617024 ', 6, 6, 2, 27, 2018, 2),
(135, 'Puti Andini', '3145160515', '3145160515 ', 6, 6, 2, 25, 2018, 2),
(136, 'Septi Lusiana', '3145160514', '3145160515 ', 6, 11, 2, 22, 2018, 2),
(137, 'Maldini Abdillah', '3145161922-2018', '3030', 6, 4, 2, 26, 2018, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_tbl`
--
ALTER TABLE `berkas_tbl`
  ADD PRIMARY KEY (`berkas_ID`),
  ADD KEY `uploadOleh` (`id_user`),
  ADD KEY `berkasProker` (`id_proker`);

--
-- Indexes for table `departemen_tbl`
--
ALTER TABLE `departemen_tbl`
  ADD PRIMARY KEY (`departemen_ID`),
  ADD KEY `id_opmawa` (`id_opmawa`);

--
-- Indexes for table `dosen_tbl`
--
ALTER TABLE `dosen_tbl`
  ADD PRIMARY KEY (`dosen_ID`),
  ADD KEY `dosen_prodi` (`id_prodi`);

--
-- Indexes for table `evaluasirapat_tbl`
--
ALTER TABLE `evaluasirapat_tbl`
  ADD PRIMARY KEY (`evaluasiRapat_ID`),
  ADD KEY `evaluasiRapat-rapat` (`id_rapat`),
  ADD KEY `evaluasiRapat-user` (`id_user`);

--
-- Indexes for table `opmawa_tbl`
--
ALTER TABLE `opmawa_tbl`
  ADD PRIMARY KEY (`opmawa_ID`),
  ADD KEY `getKetuaNama` (`id_user`);

--
-- Indexes for table `pemasukan_tbl`
--
ALTER TABLE `pemasukan_tbl`
  ADD PRIMARY KEY (`pemasukan_ID`),
  ADD KEY `OpmawaIDpemasukan` (`id_opmawa`);

--
-- Indexes for table `pengeluaran_tbl`
--
ALTER TABLE `pengeluaran_tbl`
  ADD PRIMARY KEY (`pengeluaran_ID`),
  ADD KEY `OpmawaID` (`id_opmawa`);

--
-- Indexes for table `posisi_tbl`
--
ALTER TABLE `posisi_tbl`
  ADD PRIMARY KEY (`posisi_ID`);

--
-- Indexes for table `prodi_tbl`
--
ALTER TABLE `prodi_tbl`
  ADD PRIMARY KEY (`prodi_ID`);

--
-- Indexes for table `prokeranggota_tbl`
--
ALTER TABLE `prokeranggota_tbl`
  ADD PRIMARY KEY (`prokerAnggota_ID`),
  ADD KEY `proker` (`id_proker`),
  ADD KEY `posisi` (`id_posisi`),
  ADD KEY `nama` (`id_user`);

--
-- Indexes for table `prokerevaluasi_tbl`
--
ALTER TABLE `prokerevaluasi_tbl`
  ADD PRIMARY KEY (`prokerEvaluasi_ID`),
  ADD KEY `proker-prokerEvaluasi` (`id_proker`),
  ADD KEY `user-prokerEvaluasi` (`id_user`);

--
-- Indexes for table `prokerposisi_tbl`
--
ALTER TABLE `prokerposisi_tbl`
  ADD PRIMARY KEY (`prokerPosisi_ID`),
  ADD KEY `getProker` (`id_proker`);

--
-- Indexes for table `prokertugas_tbl`
--
ALTER TABLE `prokertugas_tbl`
  ADD PRIMARY KEY (`prokerTugas_ID`),
  ADD KEY `namaUser` (`id_user`),
  ADD KEY `namaProker` (`id_proker`);

--
-- Indexes for table `proker_tbl`
--
ALTER TABLE `proker_tbl`
  ADD PRIMARY KEY (`proker_ID`);

--
-- Indexes for table `rapat_tbl`
--
ALTER TABLE `rapat_tbl`
  ADD PRIMARY KEY (`rapat_ID`),
  ADD KEY `getOpmawa_rapat` (`id_opmawa`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `getProdi` (`id_prodi`),
  ADD KEY `getDepartemen` (`id_departemen`),
  ADD KEY `getPosisi` (`id_posisi`),
  ADD KEY `getOpmawa` (`id_opmawa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas_tbl`
--
ALTER TABLE `berkas_tbl`
  MODIFY `berkas_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `departemen_tbl`
--
ALTER TABLE `departemen_tbl`
  MODIFY `departemen_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `dosen_tbl`
--
ALTER TABLE `dosen_tbl`
  MODIFY `dosen_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `evaluasirapat_tbl`
--
ALTER TABLE `evaluasirapat_tbl`
  MODIFY `evaluasiRapat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `opmawa_tbl`
--
ALTER TABLE `opmawa_tbl`
  MODIFY `opmawa_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemasukan_tbl`
--
ALTER TABLE `pemasukan_tbl`
  MODIFY `pemasukan_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `pengeluaran_tbl`
--
ALTER TABLE `pengeluaran_tbl`
  MODIFY `pengeluaran_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `posisi_tbl`
--
ALTER TABLE `posisi_tbl`
  MODIFY `posisi_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `prodi_tbl`
--
ALTER TABLE `prodi_tbl`
  MODIFY `prodi_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `prokeranggota_tbl`
--
ALTER TABLE `prokeranggota_tbl`
  MODIFY `prokerAnggota_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `prokerevaluasi_tbl`
--
ALTER TABLE `prokerevaluasi_tbl`
  MODIFY `prokerEvaluasi_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `prokerposisi_tbl`
--
ALTER TABLE `prokerposisi_tbl`
  MODIFY `prokerPosisi_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `prokertugas_tbl`
--
ALTER TABLE `prokertugas_tbl`
  MODIFY `prokerTugas_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `proker_tbl`
--
ALTER TABLE `proker_tbl`
  MODIFY `proker_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `rapat_tbl`
--
ALTER TABLE `rapat_tbl`
  MODIFY `rapat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen_tbl`
--
ALTER TABLE `dosen_tbl`
  ADD CONSTRAINT `dosen_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi_tbl` (`prodi_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `evaluasirapat_tbl`
--
ALTER TABLE `evaluasirapat_tbl`
  ADD CONSTRAINT `evaluasiRapat-rapat` FOREIGN KEY (`id_rapat`) REFERENCES `rapat_tbl` (`rapat_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluasiRapat-user` FOREIGN KEY (`id_user`) REFERENCES `user_tbl` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemasukan_tbl`
--
ALTER TABLE `pemasukan_tbl`
  ADD CONSTRAINT `OpmawaIDpemasukan` FOREIGN KEY (`id_opmawa`) REFERENCES `opmawa_tbl` (`opmawa_ID`);

--
-- Constraints for table `pengeluaran_tbl`
--
ALTER TABLE `pengeluaran_tbl`
  ADD CONSTRAINT `OpmawaID` FOREIGN KEY (`id_opmawa`) REFERENCES `opmawa_tbl` (`opmawa_ID`);

--
-- Constraints for table `prokeranggota_tbl`
--
ALTER TABLE `prokeranggota_tbl`
  ADD CONSTRAINT `nama` FOREIGN KEY (`id_user`) REFERENCES `user_tbl` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posisi` FOREIGN KEY (`id_posisi`) REFERENCES `prokerposisi_tbl` (`prokerPosisi_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proker` FOREIGN KEY (`id_proker`) REFERENCES `proker_tbl` (`proker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prokerevaluasi_tbl`
--
ALTER TABLE `prokerevaluasi_tbl`
  ADD CONSTRAINT `proker-prokerEvaluasi` FOREIGN KEY (`id_proker`) REFERENCES `proker_tbl` (`proker_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user-prokerEvaluasi` FOREIGN KEY (`id_user`) REFERENCES `user_tbl` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prokerposisi_tbl`
--
ALTER TABLE `prokerposisi_tbl`
  ADD CONSTRAINT `getProker` FOREIGN KEY (`id_proker`) REFERENCES `proker_tbl` (`proker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prokertugas_tbl`
--
ALTER TABLE `prokertugas_tbl`
  ADD CONSTRAINT `namaProker` FOREIGN KEY (`id_proker`) REFERENCES `proker_tbl` (`proker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rapat_tbl`
--
ALTER TABLE `rapat_tbl`
  ADD CONSTRAINT `getOpmawa_rapat` FOREIGN KEY (`id_opmawa`) REFERENCES `opmawa_tbl` (`opmawa_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `getDepartemen` FOREIGN KEY (`id_departemen`) REFERENCES `departemen_tbl` (`departemen_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `getOpmawa` FOREIGN KEY (`id_opmawa`) REFERENCES `opmawa_tbl` (`opmawa_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `getPosisi` FOREIGN KEY (`id_posisi`) REFERENCES `posisi_tbl` (`posisi_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `getProdi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi_tbl` (`prodi_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
