-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 01:51 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturan_gaji`
--

CREATE TABLE `aturan_gaji` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `masa_kerja` int(11) NOT NULL,
  `insentif` double NOT NULL,
  `bonus` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan_gaji`
--

INSERT INTO `aturan_gaji` (`id`, `jabatan`, `masa_kerja`, `insentif`, `bonus`) VALUES
(5, 'Marketing', 1, 100000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `kode_penggajian` varchar(20) NOT NULL,
  `nip` int(15) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `nominal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`kode_penggajian`, `nip`, `nama_karyawan`, `tanggal_penerimaan`, `nominal`) VALUES
('GJ001', 123456789, 'Aditya', '2020-04-01', 2200000);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `standar_gaji` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `kode`, `jabatan`, `standar_gaji`, `keterangan`) VALUES
(4, 'Mrk', 'Marketing', 2000000, 'Marketing Pemasaran');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nip` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `masa_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nip`, `nama`, `jenis_kelamin`, `tgl_lahir`, `telp`, `email`, `alamat`, `jabatan`, `masa_kerja`) VALUES
(3, 123456789, 'Aditya', 'Pria', '1998-08-13', '08123456789', 'aditya@gmail.com', 'Depok', 'Marketing', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturan_gaji`
--
ALTER TABLE `aturan_gaji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jabatan` (`jabatan`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`kode_penggajian`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturan_gaji`
--
ALTER TABLE `aturan_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
