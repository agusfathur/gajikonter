-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 05:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gajikonter`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_divisi`
--

CREATE TABLE `data_divisi` (
  `id_divisi` int(11) UNSIGNED NOT NULL,
  `nama_divisi` varchar(100) NOT NULL,
  `fee` int(100) NOT NULL,
  `bonus` int(255) NOT NULL,
  `gaji_harian` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_divisi`
--

INSERT INTO `data_divisi` (`id_divisi`, `nama_divisi`, `fee`, `bonus`, `gaji_harian`) VALUES
(1, 'admin', 0, 0, 80000),
(2, 'online shop', 35000, 0, 0),
(3, 'jaga konter', 0, 0, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `data_gaji`
--

CREATE TABLE `data_gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `bulan` varchar(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `divisi` varchar(40) NOT NULL,
  `fee` int(100) NOT NULL,
  `bonus` int(100) NOT NULL,
  `gaji_harian` int(100) NOT NULL,
  `potongan` int(100) NOT NULL,
  `pinjaman` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_gaji`
--

INSERT INTO `data_gaji` (`id_gaji`, `id_karyawan`, `nik`, `bulan`, `nama_karyawan`, `divisi`, `fee`, `bonus`, `gaji_harian`, `potongan`, `pinjaman`, `total`) VALUES
(1, 2, '080102122', '11-2022', 'Leonel Messi', 'admin', 0, 1000, 1600000, 0, 0, 1601000),
(2, 4, '2321412', '11-2022', 'Dodol Portugal', 'online shop', 35000, 0, 0, 0, 1000000, -965000),
(3, 7, '1231', '11-2022', 'QQ', 'online shop', 35000, 0, 0, 5000, 0, 30000),
(4, 2, '080102122', '12-2022', 'Leonel Messi', 'admin', 0, 10000, 1600000, 10000, 1111, 1598889),
(5, 4, '2321412', '12-2022', 'Dodol Portugal', 'online shop', 70000, 10111, 0, 0, 10000, 70111),
(6, 7, '1231', '12-2022', 'QQ', 'online shop', 35000, 30000, 0, 20000, 10000, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `username`, `password`, `jenis_kelamin`, `divisi`, `no_hp`, `alamat`, `foto`, `hak_akses`) VALUES
(2, '080102122', 'Leonel Messi', 'goat', '$2y$10$mdX4K9N8g13HASi7CVz/LO9aZzEZZ8JOBzDPbbDkCSO9NMtkYKpCm', 'laki-laki', 'admin', '0183133', 'Sragentina Latin', 'messi.jpeg', 1),
(4, '2321412', 'Dodol Portugal', 'dodol', '$2y$10$i7hz4GbtIjWW3Rk8q.k9iuGWHKsOLKJpduMvq63ZTn6zXZwE3gdja', 'laki-laki', 'online shop', '091212121', 'PorTegal Kota', 'dodol.jpeg', 2),
(7, '1231', 'QQ', 'thor11', '$2y$10$SGlb8R.8/bpGgyBTn5D8KeBK4rwCZQGDUTOfkvnN0Arpcw0pIA9Ay', 'perempuan', 'online shop', '2312312', 'winong pati', '1669564548_a2da2983e64152bc2ff7.png', 2),
(9, '0123456789012345', 'Niam Cell', 'admin', '$2y$10$s6Al5b7EaI4BSz4WlTm77OOmgQoQegRylHVaVqS.srCE/mYXsHJsG', 'laki-laki', 'admin', '081231231231', 'kalirejo, undaan, kudus', 'default.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gaji_perhari`
--

CREATE TABLE `gaji_perhari` (
  `id_gaji` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tgl` date NOT NULL,
  `bulan` varchar(11) NOT NULL,
  `nama_karyawan` varchar(70) NOT NULL,
  `divisi` varchar(30) NOT NULL,
  `fee` int(100) NOT NULL,
  `bonus` int(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji_perhari`
--

INSERT INTO `gaji_perhari` (`id_gaji`, `id_karyawan`, `nik`, `tgl`, `bulan`, `nama_karyawan`, `divisi`, `fee`, `bonus`, `keterangan`) VALUES
(1, 7, '1231', '2022-11-28', '11-2022', 'QQ', 'online shop', 35000, 0, 'CO 10x'),
(2, 7, '1231', '2022-11-29', '12-2022', 'QQ', 'online shop', 35000, 30000, 'CO 20x'),
(8, 4, '2321412', '2022-12-01', '', 'Dodol Portugal', 'online shop', 35000, 0, 'banku1'),
(9, 2, '080102122', '2022-09-10', '09-2022', 'Leonel Messi', 'admin', 0, 10000, '123'),
(10, 4, '2321412', '2022-12-01', '12-2022', 'Dodol Portugal', 'online shop', 35000, 111, '1111'),
(11, 4, '2321412', '2022-12-01', '12-2022', 'Dodol Portugal', 'online shop', 35000, 10000, 'banku1'),
(12, 4, '2321412', '2022-11-29', '11-2022', 'Dodol Portugal', 'online shop', 35000, 0, '123'),
(13, 4, '2321412', '2024-01-04', '01-2024', 'Dodol Portugal', 'online shop', 35000, 0, '12'),
(14, 2, '080102122', '2022-11-30', '11-2022', 'Leonel Messi', 'admin', 0, 1000, 'banku1'),
(15, 2, '080102122', '2022-12-14', '12-2022', 'Leonel Messi', 'admin', 0, 10000, 'CO 20x');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(1, 'admin', 1),
(2, 'karyawan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2022-11-20-082026', 'App\\Database\\Migrations\\DataDivisi', 'default', 'App', 1668933046, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjam` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `bulan` varchar(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `nominal` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjam`, `id_karyawan`, `bulan`, `nik`, `nama_karyawan`, `tgl`, `nominal`) VALUES
(1, 7, '12-2022', '1231', 'QQ', '2022-12-08', 10000),
(11, 4, '11-2022', '2321412', 'Dodol Portugal', '2022-11-03', 1000000),
(13, 7, '01-2023', '1231', 'QQ', '2023-01-20', 1000),
(14, 2, '12-2022', '080102122', 'Leonel Messi', '2022-12-29', 1111),
(15, 4, '12-2022', '2321412', 'Dodol Portugal', '2022-12-14', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `potong_gaji`
--

CREATE TABLE `potong_gaji` (
  `id_potong` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `tgl_potong` date NOT NULL,
  `nominal` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potong_gaji`
--

INSERT INTO `potong_gaji` (`id_potong`, `id_karyawan`, `bulan`, `nik`, `nama_karyawan`, `tgl_potong`, `nominal`) VALUES
(1, 7, '11-2022', '1231', 'QQ', '2022-11-15', 5000),
(8, 7, '12-2022', '1231', 'QQ', '2022-12-01', 10000),
(9, 4, '01-2023', '2321412', 'Dodol Portugal', '2023-01-10', 10000),
(10, 2, '06-2024', '080102122', 'Leonel Messi', '2024-06-11', 100000),
(11, 2, '12-2022', '080102122', 'Leonel Messi', '2022-12-14', 10000),
(12, 7, '12-2022', '1231', 'QQ', '2022-12-19', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `rekap_absen`
--

CREATE TABLE `rekap_absen` (
  `id_absen` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `bulan` varchar(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekap_absen`
--

INSERT INTO `rekap_absen` (`id_absen`, `id_karyawan`, `bulan`, `nik`, `nama_karyawan`, `jenis_kelamin`, `divisi`, `hadir`, `sakit`, `alpha`) VALUES
(1, 2, '11-2022', '080102122', 'Leonel Messi', 'laki-laki', 'admin', 20, 4, 4),
(2, 4, '11-2022', '2321412', 'Dodol Portugal', 'laki-laki', 'online shop', 20, 5, 3),
(3, 7, '11-2022', '1231', 'QQ', 'perempuan', 'online shop', 25, 3, 0),
(4, 2, '12-2022', '080102122', 'Leonel Messi', 'laki-laki', 'admin', 20, 11, 0),
(5, 4, '12-2022', '2321412', 'Dodol Portugal', 'laki-laki', 'online shop', 25, 1, 3),
(6, 7, '12-2022', '1231', 'QQ', 'perempuan', 'online shop', 30, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_divisi`
--
ALTER TABLE `data_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `data_gaji`
--
ALTER TABLE `data_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `gaji_perhari`
--
ALTER TABLE `gaji_perhari`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `potong_gaji`
--
ALTER TABLE `potong_gaji`
  ADD PRIMARY KEY (`id_potong`);

--
-- Indexes for table `rekap_absen`
--
ALTER TABLE `rekap_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_divisi`
--
ALTER TABLE `data_divisi`
  MODIFY `id_divisi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_gaji`
--
ALTER TABLE `data_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gaji_perhari`
--
ALTER TABLE `gaji_perhari`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `potong_gaji`
--
ALTER TABLE `potong_gaji`
  MODIFY `id_potong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rekap_absen`
--
ALTER TABLE `rekap_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
