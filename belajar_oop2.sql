-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2025 at 07:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar_oop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kd_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(1) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kd_barang`, `nama_barang`, `stok`, `harga_beli`, `harga_jual`) VALUES
(2, 'BRG01', 'Samsung M20', 7, 2520000, 2700000),
(4, 'BRG02', 'Redmi Note6', 20, 2200000, 2500000),
(6, 'BRG03', 'Xiaomi Redmi Note 9 Pro ', 11, 3200000, 3350000),
(8, 'BRG04', 'Xiaomi Redmi Note 8', 10, 2500000, 2850000),
(10, 'BRG05', 'Vivo X70 Pro ', 5, 18000000, 18500000),
(11, 'BRG06', 'Asus Zenphone X7', 6, 3200000, 3350000),
(12, 'BRG07', 'Realme A5', 11, 3200000, 3350000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` varchar(100) NOT NULL,
  `nik_customer` text NOT NULL,
  `nama_customer` text NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `alamat_customer` text NOT NULL,
  `telepon_customer` varchar(100) NOT NULL,
  `email_customer` varchar(100) NOT NULL,
  `pass_customer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `nik_customer`, `nama_customer`, `jenis_kelamin`, `alamat_customer`, `telepon_customer`, `email_customer`, `pass_customer`) VALUES
('CST0001', '9132942020231', 'Muhamad Ferdiansah', 'Laki-laki', 'Subang', '08523342342', 'ferdiansah_m@gmail.com', '********'),
('CST0002', '9128327493433', 'Khaila Juliani', 'Perempuan', 'Jakarta', '08734353454', 'Khaila_Juliani@gmail.com', '********');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` varchar(100) NOT NULL,
  `nama_supplier` text NOT NULL,
  `alamat_supplier` text NOT NULL,
  `telepon_supplier` varchar(100) NOT NULL,
  `email_supplier` varchar(100) NOT NULL,
  `pass_supplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `telepon_supplier`, `email_supplier`, `pass_supplier`) VALUES
('SUPP0001', 'PT. Electronic City', 'Jakarta', '08968968765', 'ptindomarco@gmail.com', '********'),
('SUPP0002', 'PT. Megatron Elektronik', 'Jakarta', '08953453463', 'megatronelec@gmail.com', '********');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipe_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `tipe_user`) VALUES
(1, 'admin ', 'admin', 'administrator'),
(2, 'petugas ', 'petugas', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
