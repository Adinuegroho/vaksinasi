-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 03:56 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaksinasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal_vaksinasi`
--

CREATE TABLE `tb_jadwal_vaksinasi` (
  `id_jadwal_vaksinasi` int(11) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `id_vaksin` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal_vaksinasi`
--

INSERT INTO `tb_jadwal_vaksinasi` (`id_jadwal_vaksinasi`, `tanggal`, `tempat`, `id_vaksin`, `status`) VALUES
(1, '21-12-2021', 'Puskesmas A', 2, 'Dibuka'),
(2, '21-12-2021', 'Puskesmas A', 1, 'Dibuka'),
(3, '22-12-2021', 'Puskesmas A', 1, 'Ditutup'),
(4, '22-12-2021', 'Puskesmas A', 2, 'Dibuka'),
(5, '23-12-2021', 'Puskesmas A', 2, 'Ditutup'),
(6, '2021-11-30', 'Puskesmas B', 3, 'Dibuka'),
(7, '2021-12-27', 'Puskesmas B', 4, 'Dibuka');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nik`, `nama_pasien`, `hp`, `alamat`) VALUES
(1, '123', 'Joko Prasetyo Gunawan', '08218828281', 'Jalan Gondo Puri no. 3 Surakarta jawatengah'),
(2, '456', 'Ian Prasetyo', '08299928833', 'Palur gadingan Sukoharjo'),
(3, '999', 'Doni Setiawan', '08327727373', 'Semanggi Surakarta'),
(6, '555', 'Ian', '088929292828', 'Mojolaban Surakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pilihan_vaksin`
--

CREATE TABLE `tb_pilihan_vaksin` (
  `id_pilihan_vaksin` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_jadwal_vaksinasi` int(11) NOT NULL,
  `nomor_antrian` varchar(15) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pilihan_vaksin`
--

INSERT INTO `tb_pilihan_vaksin` (`id_pilihan_vaksin`, `id_pasien`, `id_jadwal_vaksinasi`, `nomor_antrian`, `tanggal`, `status`) VALUES
(11, 1, 1, 'V-001', '26-12-2021', 'Terdaftar'),
(12, 1, 4, 'V-002', '26-12-2021', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `alamat`) VALUES
(1, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vaksin`
--

CREATE TABLE `tb_vaksin` (
  `id_vaksin` int(11) NOT NULL,
  `nama_vaksin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_vaksin`
--

INSERT INTO `tb_vaksin` (`id_vaksin`, `nama_vaksin`) VALUES
(1, 'Sinovac'),
(2, 'Astrazaneca'),
(3, 'Pfizer'),
(4, 'Vaksin Nusantara'),
(5, 'Moderna A'),
(7, 'Moderna B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jadwal_vaksinasi`
--
ALTER TABLE `tb_jadwal_vaksinasi`
  ADD PRIMARY KEY (`id_jadwal_vaksinasi`),
  ADD KEY `id_vaksin` (`id_vaksin`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_pilihan_vaksin`
--
ALTER TABLE `tb_pilihan_vaksin`
  ADD PRIMARY KEY (`id_pilihan_vaksin`),
  ADD KEY `id_user` (`id_pasien`,`id_jadwal_vaksinasi`),
  ADD KEY `id_jadwal_vaksinasi` (`id_jadwal_vaksinasi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_vaksin`
--
ALTER TABLE `tb_vaksin`
  ADD PRIMARY KEY (`id_vaksin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jadwal_vaksinasi`
--
ALTER TABLE `tb_jadwal_vaksinasi`
  MODIFY `id_jadwal_vaksinasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_pilihan_vaksin`
--
ALTER TABLE `tb_pilihan_vaksin`
  MODIFY `id_pilihan_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_vaksin`
--
ALTER TABLE `tb_vaksin`
  MODIFY `id_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jadwal_vaksinasi`
--
ALTER TABLE `tb_jadwal_vaksinasi`
  ADD CONSTRAINT `tb_jadwal_vaksinasi_ibfk_1` FOREIGN KEY (`id_vaksin`) REFERENCES `tb_vaksin` (`id_vaksin`);

--
-- Constraints for table `tb_pilihan_vaksin`
--
ALTER TABLE `tb_pilihan_vaksin`
  ADD CONSTRAINT `tb_pilihan_vaksin_ibfk_1` FOREIGN KEY (`id_jadwal_vaksinasi`) REFERENCES `tb_jadwal_vaksinasi` (`id_jadwal_vaksinasi`),
  ADD CONSTRAINT `tb_pilihan_vaksin_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
