-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2019 at 02:40 PM
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
(9, 'Pendidikan Fisika');

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
(5, 'BINER', '2019-05-22', 1, 2018, NULL);

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
(1, 'Maulana', '1234', '1234', 1, 1, 2018, 1),
(2, 'Rahman', '1235', '1235', 5, 2, 2019, 2),
(6, 'Maulana Rahman Nur', '3145151011', 'ilkom2015', 6, 5, 2018, 1),
(7, 'Evita Dwi Oktaviani', '441827815', 'sejarah', 5, 5, 2018, 1);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `proker_tbl`
--
ALTER TABLE `proker_tbl`
  ADD PRIMARY KEY (`proker_ID`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `getProdi` (`user_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posisi_tbl`
--
ALTER TABLE `posisi_tbl`
  MODIFY `posisi_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prodi_tbl`
--
ALTER TABLE `prodi_tbl`
  MODIFY `prodi_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `proker_tbl`
--
ALTER TABLE `proker_tbl`
  MODIFY `proker_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `getProdi` FOREIGN KEY (`user_prodi`) REFERENCES `prodi_tbl` (`prodi_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
