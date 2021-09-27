-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 02:49 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugascrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` int(10) NOT NULL,
  `Nama_Mhs` varchar(50) NOT NULL,
  `Jenis_Kelamin` varchar(50) NOT NULL,
  `Program_Studi` varchar(50) NOT NULL,
  `Nomor_HP` varchar(13) NOT NULL,
  `Tanggal_Lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama_Mhs`, `Jenis_Kelamin`, `Program_Studi`, `Nomor_HP`, `Tanggal_Lahir`) VALUES
(0, 'Alexander Rama G', 'Perempuan', 'Teknik Elektro', '', '0000-00-00'),
(1803040001, 'Arief Luqman', 'Laki-Laki', 'Teknik Informatika', '081517306870', '2002-09-28'),
(1803040002, 'Samsul Rifai', 'Laki-Laki', 'Teknik Komputer', '081510306820', '2001-07-30'),
(1803040003, 'Dhoni Ari', 'Laki-Laki', 'Teknik Informatika', '081519735213', '2001-04-03'),
(1803040004, 'Sarah Kogawa', 'Perempuan', 'Sistem Informasi', '089523417860', '2002-06-11'),
(1803040006, 'Luna Maya', 'Perempuan', 'Sistem Informasi', '081212456777', '2002-11-12'),
(1803040007, 'Gani Maulana', 'Laki-Laki', 'Pendidikan Teknologi Informasi', '081222852333', '2001-06-21'),
(1803040008, 'Putri Azhar', 'Perempuan', 'Teknologi Informasi', '089743217866', '2001-08-14'),
(1803040080, 'Fauzan Hilmi', 'Laki-Laki', 'Teknologi Informasi', '081252341786', '2001-01-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
