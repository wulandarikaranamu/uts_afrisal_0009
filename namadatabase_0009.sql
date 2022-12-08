-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 06:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `namadatabase_0009`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblpendaftaran`
--

CREATE TABLE `tblpendaftaran` (
  `pendaftaran_id` int(11) NOT NULL,
  `pendaftaran_nama` varchar(50) NOT NULL,
  `pendaftaran_gambar` text DEFAULT NULL,
  `pendaftaran_alamat` text NOT NULL,
  `pendaftaran_gender` varchar(20) NOT NULL,
  `pendaftaran_tempatlahir` varchar(30) NOT NULL,
  `pendaftaran_tanggallahir` date NOT NULL,
  `prodi_kode` char(2) NOT NULL,
  `pendaftaran_ukm` text NOT NULL,
  `pendaftaran_ipk` float NOT NULL,
  `pendaftaran_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpendaftaran`
--

INSERT INTO `tblpendaftaran` (`pendaftaran_id`, `pendaftaran_nama`, `pendaftaran_gambar`, `pendaftaran_alamat`, `pendaftaran_gender`, `pendaftaran_tempatlahir`, `pendaftaran_tanggallahir`, `prodi_kode`, `pendaftaran_ukm`, `pendaftaran_ipk`, `pendaftaran_biaya`) VALUES
(1, 'Ahmad Afrisal', '637cbd6a3d770.png', 'Majene', 'Laki - Laki', 'Botto', '2022-11-22', 'S2', 'Olahraga', 3.6, 40000),
(3, 'Amirul Asnan Cirua', '637ccccbc6405.jpeg', 'Makassar', 'Laki - Laki', 'Makassar', '2002-06-22', 'S2', 'Keilmuan', 3.7, 40000),
(4, 'Anastasya Yulia Kamaran', '637cbd528c032.png', 'Mamuju', 'Perempuan', 'Mamuju', '2002-01-22', 'T2', 'Musik dan Seni', 3, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `tblprodi`
--

CREATE TABLE `tblprodi` (
  `prodi_kode` char(2) NOT NULL,
  `prodi_nama` varchar(20) NOT NULL,
  `prodi_jenjang` char(2) NOT NULL,
  `prodi_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblprodi`
--

INSERT INTO `tblprodi` (`prodi_kode`, `prodi_nama`, `prodi_jenjang`, `prodi_status`) VALUES
('S1', 'AKUNTANSI', 'S2', 'C'),
('S2', 'PWK', 'S1', 'B'),
('T2', 'AGRIBISNIS', 'S1', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'ADMIN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'ahmad afrisal', 'isal', '$2y$10$rmM3MZZTmAnufh4Fop/NMuCD.UdO5nyMdvxiiA06e6qfKSucgcnja', 'ADMIN'),
(3, 'admin', 'admin', '$2y$10$VDujZR0poxotZGbfG/GGEONeo3Prjsgl7TTjidWKEK2/cxELtCemO', 'SUPERADMIN'),
(5, 'eka', 'eka22', '$2y$10$//Y9nYo3kzZldgFf8MY/GOIr.seXL38nR3qAEkKO267eO.XwWlb0C', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblpendaftaran`
--
ALTER TABLE `tblpendaftaran`
  ADD PRIMARY KEY (`pendaftaran_id`),
  ADD KEY `prodi_kode` (`prodi_kode`);

--
-- Indexes for table `tblprodi`
--
ALTER TABLE `tblprodi`
  ADD PRIMARY KEY (`prodi_kode`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblpendaftaran`
--
ALTER TABLE `tblpendaftaran`
  MODIFY `pendaftaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblpendaftaran`
--
ALTER TABLE `tblpendaftaran`
  ADD CONSTRAINT `tblpendaftaran_ibfk_1` FOREIGN KEY (`prodi_kode`) REFERENCES `tblprodi` (`prodi_kode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
