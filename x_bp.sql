-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2019 at 10:35 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `x_bp`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_daftar`
--

CREATE TABLE `t_daftar` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `status` enum('terima','tolak','','') NOT NULL,
  `level` enum('admin','member','','') NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `terakhir_masuk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_daftar`
--

INSERT INTO `t_daftar` (`id_user`, `nama_depan`, `nama_belakang`, `email`, `password`, `status`, `level`, `tgl_daftar`, `terakhir_masuk`) VALUES
(3, 'johan', 'santri', 'kirimcek@gmail.com', 'sha256:1000:lMa9KHsieqG956+A5SK+1k8szgD1oqVC:KzBNeQ6V5YrMub61kZRb024UC8YyWJdj', 'terima', 'member', '2018-10-25 08:01:34', '2018-10-25 08:13:11 AM'),
(4, 'a', 'a', 'asu@gmail.com', 'sha256:1000:awtvv0rGNyuxEoYk9XSeyQokFmmsrQDv:frCbkgbWqoiGI8GVwwVWmy2fnZ0mqI7w', 'terima', 'member', '2018-10-26 06:45:13', '2018-10-26 08:13:15 AM'),
(5, 'annisa', 'agata', 'annisa@gmail.com', 'sha256:1000:uon9OBeosEmD2sW+rk88ITGzxuSFTpsx:crNpE2P6y/MobVBqRJ7E2PkaNJcpJYo4', 'terima', 'member', '2018-10-31 03:47:15', '2018-10-31 04:47:15 AM');

-- --------------------------------------------------------

--
-- Table structure for table `t_detail`
--

CREATE TABLE `t_detail` (
  `id_detail` int(11) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jk` enum('Male','Female','','') NOT NULL,
  `tlpn` varchar(25) NOT NULL,
  `status` enum('Single','Merried','','') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nik_paspor` varchar(50) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `maksimal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_detail`
--

INSERT INTO `t_detail` (`id_detail`, `alamat`, `jk`, `tlpn`, `status`, `tempat_lahir`, `tgl_lahir`, `nik_paspor`, `negara`, `id_user`, `maksimal`) VALUES
(1, 'jl bumi manti no 38 kampung baru, kec kedaton bandar lampung', 'Male', '085768137009', 'Single', 'padang cahya', '2018-10-29', '327932323912321', 'indonesia', 3, 0),
(15, 'jakarta selatan', 'Male', '085768137009', 'Single', 'lampung', '2019-02-21', '123456789', 'indonesia', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_image`
--

CREATE TABLE `t_image` (
  `id_image` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL,
  `maksimal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_image`
--

INSERT INTO `t_image` (`id_image`, `file_name`, `id_user`, `maksimal`) VALUES
(7, 'cd092c22b6f7cfb11f608a6486e0fe1d.jpg', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_pendidikan`
--

CREATE TABLE `t_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `institusi` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `level_pendidikan` varchar(5) NOT NULL,
  `tahun_lulus` date NOT NULL,
  `nilai` varchar(4) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pendidikan`
--

INSERT INTO `t_pendidikan` (`id_pendidikan`, `institusi`, `jurusan`, `level_pendidikan`, `tahun_lulus`, `nilai`, `id_user`) VALUES
(1, 'universitas lampung', 'biologi', 's1', '2018-10-31', '3,38', 5),
(2, 'universitas lampung', 'biologi', 's2', '2018-10-31', '3,38', 5);

-- --------------------------------------------------------

--
-- Table structure for table `t_pengalaman`
--

CREATE TABLE `t_pengalaman` (
  `id_pengalaman` int(11) NOT NULL,
  `organisasi` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `tahun` date NOT NULL,
  `gaji` int(15) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pengalaman`
--

INSERT INTO `t_pengalaman` (`id_pengalaman`, `organisasi`, `jabatan`, `deskripsi`, `tahun`, `gaji`, `id_user`) VALUES
(1, 'PT BESS PROJECT INDONESIA', 'IT DEVELOPER', 'tets ting', '2018-10-31', 10000000, 3),
(2, 'UNIVERSITAS UMITRA INDONESIA', 'DOSEN', 'MENGAJAR', '2018-10-31', 50000000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `t_tokens`
--

CREATE TABLE `t_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_tokens`
--

INSERT INTO `t_tokens` (`id`, `token`, `id_user`, `created`) VALUES
(0, '88405c6a6925a456840f724ef63c71', 0, '2018-10-25'),
(0, '72bb3345f74945f1d4d40e05daf9de', 1, '2018-10-25'),
(0, 'f4e20a825ec787b996ee9b1a0a4f8e', 2, '2018-10-25'),
(0, '6f3452eddc267c5001ff576e3d7a3d', 3, '2018-10-25'),
(0, '27f49875a9673c9f5f9192ff637dd4', 3, '2018-10-25'),
(0, 'e62287b640cd1a818f2f208ec5e1a0', 3, '2018-10-25'),
(0, '193e01192886e3872df4ae776d8c94', 3, '2018-10-25'),
(0, 'd38ff1f4870294a5e54edda6714162', 4, '2018-10-26'),
(0, 'ce9b7e3a7b868b68a62c301981bbdd', 4, '2018-10-26'),
(0, 'cd5dd3db1bc3744180171df264e4ea', 4, '2018-10-26'),
(0, 'cedf07b21a8924f04759238b5228f0', 3, '2018-10-27'),
(0, 'dbef7ea43178349feb4417656e0f48', 5, '2018-10-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_daftar`
--
ALTER TABLE `t_daftar`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `t_detail`
--
ALTER TABLE `t_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `t_image`
--
ALTER TABLE `t_image`
  ADD PRIMARY KEY (`id_image`);

--
-- Indexes for table `t_pendidikan`
--
ALTER TABLE `t_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `t_pengalaman`
--
ALTER TABLE `t_pengalaman`
  ADD PRIMARY KEY (`id_pengalaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_daftar`
--
ALTER TABLE `t_daftar`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_detail`
--
ALTER TABLE `t_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t_image`
--
ALTER TABLE `t_image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_pendidikan`
--
ALTER TABLE `t_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_pengalaman`
--
ALTER TABLE `t_pengalaman`
  MODIFY `id_pengalaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
