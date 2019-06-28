-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 07:52 AM
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
-- Table structure for table `panitia_tbl`
--

CREATE TABLE `panitia_tbl` (
  `panitia_ID` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `panitia_posisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8, 'Ketua Departemen', 2),
(9, 'Sekretaris Biro', 2),
(10, 'Mantap', 1);

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
(13, 'Pendidikan Kimia'),
(14, 'Pendidikan Sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `prokeranggota_tbl`
--

CREATE TABLE `prokeranggota_tbl` (
  `prokerAnggota_ID` int(11) NOT NULL,
  `id_proker` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL,
  `prokerAnggota_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prokeranggota_tbl`
--

INSERT INTO `prokeranggota_tbl` (`prokerAnggota_ID`, `id_proker`, `id_posisi`, `prokerAnggota_nama`) VALUES
(2, 6, 1, 'Evita Dwi Oktaviani');

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
(1, 5, 'Konsumsi'),
(2, 5, 'HPD'),
(9, 5, 'Acara'),
(13, 1, 'Konsumsi'),
(14, 6, 'Ketua Pelaksana'),
(15, 6, 'HPD'),
(16, 6, 'Acara'),
(17, 6, 'Konsumsi'),
(18, 6, 'Sponsor');

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
(6, 'Tuk Tuk', '2019-06-22', 1, 2018, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_ID` int(11) NOT NULL,
  `user_nama` varchar(25) NOT NULL,
  `user_NIM` varchar(15) NOT NULL,
  `user_pass` varchar(25) NOT NULL,
  `user_prodi` int(2) NOT NULL,
  `user_posisi` int(2) NOT NULL,
  `user_tahun` int(4) NOT NULL,
  `user_role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_ID`, `user_nama`, `user_NIM`, `user_pass`, `user_prodi`, `user_posisi`, `user_tahun`, `user_role`) VALUES
(1, 'Maulana', '1', '1', 1, 1, 2018, 1),
(7, 'Rahman', '2', '2', 2, 2, 2018, 2),
(8, 'Evita Dwi Oktaviani', '4415151073', 'sejarah', 14, 1, 2018, 1),
(9, 'Evita Dwi ', '441515', 'TEST', 14, 3, 2018, 1),
(10, 'Evita Dwi Oktaviani', '4415151073', '1234', 9, 1, 2018, 1),
(11, 'Evita Dwi Oktaviani', '9090909', '999', 12, 8, 2018, 2),
(12, 'Asik', '7777', '7', 7, 10, 2018, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `panitia_tbl`
--
ALTER TABLE `panitia_tbl`
  ADD PRIMARY KEY (`panitia_ID`);

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
  ADD KEY `posisi` (`id_posisi`);

--
-- Indexes for table `prokerposisi_tbl`
--
ALTER TABLE `prokerposisi_tbl`
  ADD PRIMARY KEY (`prokerPosisi_ID`),
  ADD KEY `getProker` (`id_proker`);

--
-- Indexes for table `proker_tbl`
--
ALTER TABLE `proker_tbl`
  ADD PRIMARY KEY (`proker_ID`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `getProdi` (`user_prodi`),
  ADD KEY `getPosisi` (`user_posisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `panitia_tbl`
--
ALTER TABLE `panitia_tbl`
  MODIFY `panitia_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posisi_tbl`
--
ALTER TABLE `posisi_tbl`
  MODIFY `posisi_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prodi_tbl`
--
ALTER TABLE `prodi_tbl`
  MODIFY `prodi_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `prokeranggota_tbl`
--
ALTER TABLE `prokeranggota_tbl`
  MODIFY `prokerAnggota_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prokerposisi_tbl`
--
ALTER TABLE `prokerposisi_tbl`
  MODIFY `prokerPosisi_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `proker_tbl`
--
ALTER TABLE `proker_tbl`
  MODIFY `proker_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prokeranggota_tbl`
--
ALTER TABLE `prokeranggota_tbl`
  ADD CONSTRAINT `posisi` FOREIGN KEY (`id_posisi`) REFERENCES `prokerposisi_tbl` (`prokerPosisi_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proker` FOREIGN KEY (`id_proker`) REFERENCES `proker_tbl` (`proker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prokerposisi_tbl`
--
ALTER TABLE `prokerposisi_tbl`
  ADD CONSTRAINT `getProker` FOREIGN KEY (`id_proker`) REFERENCES `proker_tbl` (`proker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `getPosisi` FOREIGN KEY (`user_posisi`) REFERENCES `posisi_tbl` (`posisi_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `getProdi` FOREIGN KEY (`user_prodi`) REFERENCES `prodi_tbl` (`prodi_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
