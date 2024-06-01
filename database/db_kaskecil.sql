-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 12:28 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kaskecil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbku_pengeluaran`
--

CREATE TABLE `tbbku_pengeluaran` (
  `idbku` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `uraian` text NOT NULL,
  `penerimaan` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbbku_pengeluaran`
--

INSERT INTO `tbbku_pengeluaran` (`idbku`, `tanggal`, `uraian`, `penerimaan`) VALUES
(31, '2021-04-26', 'tes masuk', 1000000),
(32, '2021-04-19', 'tes2', 1000),
(33, '2021-04-11', 'y', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbbukti_pengeluaran`
--

CREATE TABLE `tbbukti_pengeluaran` (
  `idbukti` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `uraian` text NOT NULL,
  `pembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbbukti_pengeluaran`
--

INSERT INTO `tbbukti_pengeluaran` (`idbukti`, `tanggal`, `uraian`, `pembayaran`) VALUES
(13, '2021-04-27', 'tes keluar', '500000'),
(14, '2021-05-02', '2', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbrekening`
--

CREATE TABLE `tbrekening` (
  `idrekening` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `uraian` text NOT NULL,
  `pemasukan` bigint(20) NOT NULL,
  `pengeluaran` bigint(20) NOT NULL,
  `jenistransaksi` enum('Pemasukan','Pengeluaran') NOT NULL,
  `saldo` bigint(20) NOT NULL,
  `idmasuk` int(11) NOT NULL,
  `idkeluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbrekening`
--

INSERT INTO `tbrekening` (`idrekening`, `tanggal`, `uraian`, `pemasukan`, `pengeluaran`, `jenistransaksi`, `saldo`, `idmasuk`, `idkeluar`) VALUES
(11, '2021-04-26', 'tes masuk', 1000000, 0, 'Pemasukan', 0, 31, 0),
(12, '2021-04-27', 'tes keluar', 0, 500000, 'Pengeluaran', 0, 0, 13),
(13, '2021-04-19', 'tes2', 1000, 0, 'Pemasukan', 0, 32, 0),
(14, '2021-05-02', '2', 0, 123, 'Pengeluaran', 0, 0, 14),
(15, '2021-04-11', 'y', 12, 0, 'Pemasukan', 0, 33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `status` enum('aktif','non-aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`, `nama_user`, `level`, `status`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'asep', 'admin', 'aktif'),
(3, 'asep', '81dc9bdb52d04dc20036dbd8313ed055', 'aasep', 'petugas', 'aktif'),
(4, 'asa', 'a8a64cef262a04de4872b68b63ab7cd8', 'sa', 'admin', 'aktif'),
(5, 'asas', '202cb962ac59075b964b07152d234b70', 'sa', 'admin', 'non-aktif'),
(6, 'syayid', '1', 'syayid', 'admin', 'non-aktif'),
(7, 'syayida', 'd41d8cd98f00b204e9800998ecf8427e', 'w', 'admin', 'non-aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbku_pengeluaran`
--
ALTER TABLE `tbbku_pengeluaran`
  ADD PRIMARY KEY (`idbku`);

--
-- Indexes for table `tbbukti_pengeluaran`
--
ALTER TABLE `tbbukti_pengeluaran`
  ADD PRIMARY KEY (`idbukti`);

--
-- Indexes for table `tbrekening`
--
ALTER TABLE `tbrekening`
  ADD PRIMARY KEY (`idrekening`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbbku_pengeluaran`
--
ALTER TABLE `tbbku_pengeluaran`
  MODIFY `idbku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbbukti_pengeluaran`
--
ALTER TABLE `tbbukti_pengeluaran`
  MODIFY `idbukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbrekening`
--
ALTER TABLE `tbrekening`
  MODIFY `idrekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
