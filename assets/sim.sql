-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2019 at 03:12 PM
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
  `berkas_kode` varchar(15) DEFAULT NULL,
  `berkas_nama` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_proker` int(11) DEFAULT NULL,
  `berkas_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `berkas_lembaga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas_tbl`
--

INSERT INTO `berkas_tbl` (`berkas_ID`, `berkas_kode`, `berkas_nama`, `id_user`, `id_proker`, `berkas_tanggal`, `berkas_lembaga`) VALUES
(18, NULL, 'semnas_template_full_paper-edited.docx', 1, 5, '2019-10-18 17:28:51', 1);

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
(4, 'Badan Pengurus Harian', 1),
(5, 'Kesekretariatan', 1),
(6, 'Kaderisasi', 1),
(7, 'Informasi dan Komunikasi', 1),
(8, 'Profesi dan Keilmiahan', 1),
(9, 'Biro Kewirausahaan', 1),
(10, 'Seni dan Keolahragaan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `evaluasirapat_tbl`
--

CREATE TABLE `evaluasirapat_tbl` (
  `evaluasiRapat_ID` int(11) NOT NULL,
  `id_rapat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `evaluasiRapat_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opmawa_tbl`
--

CREATE TABLE `opmawa_tbl` (
  `opmawa_ID` int(11) NOT NULL,
  `opmawa_kabinet` varchar(25) NOT NULL,
  `id_user` int(11) NOT NULL,
  `opmawa_tahun` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opmawa_tbl`
--

INSERT INTO `opmawa_tbl` (`opmawa_ID`, `opmawa_kabinet`, `id_user`, `opmawa_tahun`) VALUES
(1, 'Bersatu', 1, 2018),
(4, 'Madani', 28, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_tbl`
--

CREATE TABLE `pemasukan_tbl` (
  `pemasukan_ID` int(11) NOT NULL,
  `pemasukan_nominal` varchar(15) NOT NULL,
  `pemasukan_deskripsi` varchar(60) NOT NULL,
  `pemasukan_tanggal` date NOT NULL,
  `pemasukan_file` varchar(25) DEFAULT NULL,
  `id_proker` int(5) NOT NULL,
  `pemasukan_lembaga` int(3) NOT NULL,
  `id_opmawa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan_tbl`
--

INSERT INTO `pemasukan_tbl` (`pemasukan_ID`, `pemasukan_nominal`, `pemasukan_deskripsi`, `pemasukan_tanggal`, `pemasukan_file`, `id_proker`, `pemasukan_lembaga`, `id_opmawa`) VALUES
(33, '100000', 'Dana awal sumbangan panitia', '2019-10-19', NULL, 5, 1, 1),
(34, '1000000', 'Beli Laptop', '2019-10-16', NULL, 2, 1, 1);

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
(8, '50000', 'Modal usaha danus', '2019-10-20', '1571419689.jpg', 5, 1, 1),
(9, '300000', 'bayar makanan', '2019-10-15', NULL, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posisi_tbl`
--

CREATE TABLE `posisi_tbl` (
  `posisi_ID` int(11) NOT NULL,
  `posisi_nama` varchar(25) NOT NULL,
  `posisi_lembaga` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi_tbl`
--

INSERT INTO `posisi_tbl` (`posisi_ID`, `posisi_nama`, `posisi_lembaga`) VALUES
(1, 'Ketua Umum', 1),
(2, 'Ketua Umum', 2),
(3, 'Sekretaris Umum', 1),
(4, 'Sekretaris Umum', 2),
(5, 'Bendahara Umum', 1),
(6, 'Bendahara Umum', 2),
(7, 'Ketua Departemen', 1),
(8, 'Ketua Komisi', 2),
(9, 'Sekretaris Departemen', 1),
(10, 'Bendahara Departemen', 1),
(11, 'Anggota Departemen', 1);

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
(2, 'Pendidikan Fisika'),
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
(16, 5, 25, 1);

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
(25, 5, 'Ketua Pelaksana'),
(26, 6, 'Ketua Pelaksana'),
(27, 6, 'HPD'),
(28, 2, 'Ketua Pelaksana'),
(29, 2, 'HPD');

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
(37, 1, 5, 'Membuat tema acara yang berkaitan dengan perkuliahan', 0),
(41, 1, 5, 'Membuat Kepanitiaan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proker_tbl`
--

CREATE TABLE `proker_tbl` (
  `proker_ID` int(11) NOT NULL,
  `proker_nama` varchar(50) NOT NULL,
  `proker_tanggal` date NOT NULL,
  `proker_lembaga` int(2) NOT NULL,
  `proker_tahun` int(5) NOT NULL,
  `proker_nilai` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proker_tbl`
--

INSERT INTO `proker_tbl` (`proker_ID`, `proker_nama`, `proker_tanggal`, `proker_lembaga`, `proker_tahun`, `proker_nilai`) VALUES
(1, 'BINER 4.0', '2019-06-18', 1, 2019, '89'),
(2, 'BINER 3.0', '2019-06-03', 1, 2017, '100'),
(3, 'BINER 2.0', '2019-06-02', 1, 2018, NULL),
(5, 'BINER', '2019-05-22', 1, 2018, NULL),
(6, 'Bulan Legislatif', '2020-03-28', 2, 2018, NULL);

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
(3, '2019-10-31', 'Rapat konsep acara', 1, 1),
(5, '2019-10-28', 'Kumpul Biasa', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_ID` int(11) NOT NULL,
  `user_nama` varchar(25) NOT NULL,
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
(1, 'Maulana Rahman Nur', '1', '1', 6, 1, 1, 4, 2018, 1),
(7, 'M Rahman N', '2', '2', 2, 2, 1, 1, 2018, 2),
(28, 'Saulia Karina', '3', '3', 6, 1, 1, 4, 2018, 1);

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
-- Indexes for table `evaluasirapat_tbl`
--
ALTER TABLE `evaluasirapat_tbl`
  ADD PRIMARY KEY (`evaluasiRapat_ID`);

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
  ADD KEY `getPosisi` (`id_posisi`),
  ADD KEY `getProdi` (`id_prodi`),
  ADD KEY `getDepartemen` (`id_departemen`),
  ADD KEY `getOpmawa` (`id_opmawa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas_tbl`
--
ALTER TABLE `berkas_tbl`
  MODIFY `berkas_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `departemen_tbl`
--
ALTER TABLE `departemen_tbl`
  MODIFY `departemen_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `evaluasirapat_tbl`
--
ALTER TABLE `evaluasirapat_tbl`
  MODIFY `evaluasiRapat_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opmawa_tbl`
--
ALTER TABLE `opmawa_tbl`
  MODIFY `opmawa_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemasukan_tbl`
--
ALTER TABLE `pemasukan_tbl`
  MODIFY `pemasukan_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pengeluaran_tbl`
--
ALTER TABLE `pengeluaran_tbl`
  MODIFY `pengeluaran_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posisi_tbl`
--
ALTER TABLE `posisi_tbl`
  MODIFY `posisi_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `prodi_tbl`
--
ALTER TABLE `prodi_tbl`
  MODIFY `prodi_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `prokeranggota_tbl`
--
ALTER TABLE `prokeranggota_tbl`
  MODIFY `prokerAnggota_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `prokerposisi_tbl`
--
ALTER TABLE `prokerposisi_tbl`
  MODIFY `prokerPosisi_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `prokertugas_tbl`
--
ALTER TABLE `prokertugas_tbl`
  MODIFY `prokerTugas_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `proker_tbl`
--
ALTER TABLE `proker_tbl`
  MODIFY `proker_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rapat_tbl`
--
ALTER TABLE `rapat_tbl`
  MODIFY `rapat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berkas_tbl`
--
ALTER TABLE `berkas_tbl`
  ADD CONSTRAINT `berkasProker` FOREIGN KEY (`id_proker`) REFERENCES `proker_tbl` (`proker_ID`) ON DELETE SET NULL ON UPDATE SET NULL;

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
-- Constraints for table `prokerposisi_tbl`
--
ALTER TABLE `prokerposisi_tbl`
  ADD CONSTRAINT `getProker` FOREIGN KEY (`id_proker`) REFERENCES `proker_tbl` (`proker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prokertugas_tbl`
--
ALTER TABLE `prokertugas_tbl`
  ADD CONSTRAINT `namaProker` FOREIGN KEY (`id_proker`) REFERENCES `proker_tbl` (`proker_ID`);

--
-- Constraints for table `rapat_tbl`
--
ALTER TABLE `rapat_tbl`
  ADD CONSTRAINT `getOpmawa_rapat` FOREIGN KEY (`id_opmawa`) REFERENCES `opmawa_tbl` (`opmawa_ID`);

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `getOpmawa` FOREIGN KEY (`id_opmawa`) REFERENCES `opmawa_tbl` (`opmawa_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `getProdi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi_tbl` (`prodi_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
