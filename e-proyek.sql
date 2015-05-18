-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2015 at 12:16 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-proyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi`
--

CREATE TABLE IF NOT EXISTS `dokumentasi` (
`id_dokumentasi` int(11) NOT NULL,
  `file_dokumentasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kebutuhan_material`
--

CREATE TABLE IF NOT EXISTS `kebutuhan_material` (
`kode_material` int(11) NOT NULL,
  `nama_material` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `kode_pelaksanaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kebutuhan_sdm`
--

CREATE TABLE IF NOT EXISTS `kebutuhan_sdm` (
`kode_kebutuhan` int(11) NOT NULL,
  `petugas` varchar(20) NOT NULL,
  `kode_team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE IF NOT EXISTS `klien` (
  `kode_klien` varchar(20) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`kode_klien`, `nama_instansi`, `penanggung_jawab`, `alamat`, `no_telp`, `email`, `username`, `password`) VALUES
('KL150400001', 'PT.Nuansa Cerah Bangsa', 'DR.Dedi mursaid', ' Jl.Soekarno Hatta no.456 bandung jawa barat', 2147483647, 'dedi@gmail.com', 'fajar', 'fajar'),
('KL150400002', 'CV.Muara baru indah', 'Donny Setiabudi', 'Jl.muarabaru indah ', 2147483647, 'rere123bandung@gmail.com', 'doni Setiabudi', 'doni'),
('KL150400003', 'PT.Ghanim design & Networking', 'Rendi', 'Jl.Cimahi barat 1 bandung ', 9821980, 'rendi@gmail.com', 'rendi', 'rendi'),
('KL150400004', 'PT.Sumber Maju Jaya', 'Angga Permadi', 'Jl.Taman Kopo INdah 2 ', 2147483647, 'angga@gmail.com', 'angga', 'angga'),
('KL150400005', 'CV.Pembangunan daerah ', 'Rahmat RA', 'Jl.GBI 2 bandung raya ', 989890898, 'rahmat@gmail.com', 'rahmat', 'rahmat'),
('KL150400006', 'CV.Sumber Daya Nuansa', 'Diah', 'Jl.Veteran raya selatan No.321 Jakarta ', 2147483647, 'diah@gmail.com', 'Diah', 'diah'),
('KL150400007', 'CV.Cerah Baru Bangsa', 'dendi setiabudi', ' Jl.Raya muara baru indah 2 no 43, Jakarta indonesia', 2147483647, 'dendi@gmail.com', 'dendi', 'dendi'),
('KL150400008', 'PT.Internofa', 'dinda', 'Jl.Margaluyu barat 2 no 199 bandung ', 2147483647, 'dinda@gmail.com', 'dinda', 'dinda'),
('KL150400009', 'PT.Pelajar Pejuang 45', 'Dinda Permatasari', 'Jl.Caringin barat 1 n0 456 bandung ', 2147483647, 'dinda45@gmail.com', 'Dinda', 'dinda');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
`kode_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`kode_level`, `nama_level`) VALUES
(7, 'Manager Analis'),
(8, 'Kepala Proyek'),
(9, 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `pelaksanaan_proses_proyek`
--

CREATE TABLE IF NOT EXISTS `pelaksanaan_proses_proyek` (
  `kode_pelaksanaan` varchar(10) NOT NULL,
  `kode_proyek` varchar(10) NOT NULL,
  `catatan` text NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_termin`
--

CREATE TABLE IF NOT EXISTS `pembayaran_termin` (
`kode_termin` int(11) NOT NULL,
  `kode_proyek` varchar(20) NOT NULL,
  `termin_ke` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `dana_masuk` int(11) NOT NULL,
  `presentase` int(11) NOT NULL,
  `jatuh_tempo` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `pembayaran_termin`
--

INSERT INTO `pembayaran_termin` (`kode_termin`, `kode_proyek`, `termin_ke`, `status`, `dana_masuk`, `presentase`, `jatuh_tempo`) VALUES
(48, 'PRO150400001', 1, 'Penagihan', 75000000, 50, '05/27/2015'),
(49, 'PRO150400001', 2, 'Penagihan', 30000000, 20, '05/10/2015'),
(50, 'PRO150400001', 3, 'Menunggu', 45000000, 30, '05/17/2015'),
(51, 'PRO150400002', 1, 'Lunas', 0, 60, '05/17/2015'),
(52, 'PRO150400002', 2, 'Menunggu', 0, 40, '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `kode_pengguna` varchar(20) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` int(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`kode_pengguna`, `nama_pengguna`, `password`, `level`, `email`, `no_telp`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`) VALUES
('PG150400001', 'Doni S', 'doni', 7, 'donny@yahoo.com', 2147483647, '1990-05-10', 'Bandung', 'L'),
('PG150400002', 'Fajar', 'fajar', 8, 'fajarprasetyo45@gmail.com', 2147483647, '1994-01-10', 'Bandung', 'L'),
('PG150400003', 'Rendi', 'rendi', 7, 'rendi@gmail.com', 2147483647, '1991-01-03', 'Bandung', 'L'),
('PG150400005', 'Rere', 'rere', 7, 'rere123bandung@gmail.com', 2147483647, '1988-06-04', 'Bandung', 'P'),
('PG150400006', 'Resa', 'resa', 7, 'resa@gmail.com', 2147483647, '1997-06-03', 'Jakarta', 'P'),
('PG150400007', 'Rudi', 'rudi', 7, 'rudi@gmail.com', 2147483647, '1993-03-04', 'Jakarta', 'L'),
('PG150400008', 'Ronal', 'ronal', 7, 'ronal@gmail.com', 2147483647, '1994-04-04', 'Bandung', 'L'),
('PG150400009', 'dedin', 'dedin', 7, 'dedin@gmail.com', 2147483647, '1994-08-03', 'Jakarta', 'L'),
('PG150400010', 'dodo', 'dodo', 9, 'dodo@gmail.com', 2147483647, '1994-03-03', 'Jakarta', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE IF NOT EXISTS `progress` (
`kode_progress` int(11) NOT NULL,
  `task` text NOT NULL,
  `presentase` int(11) NOT NULL,
  `dari_tanggal` date NOT NULL,
  `sampai_tanggal` date NOT NULL,
  `dokumentasi` int(11) NOT NULL,
  `kode_pelaksanaan` varchar(20) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE IF NOT EXISTS `proyek` (
  `kode_proyek` varchar(20) NOT NULL,
  `nama_proyek` text NOT NULL,
  `deskripsi_proyek` text NOT NULL,
  `petugas` varchar(20) NOT NULL,
  `tanggal_mulai` varchar(50) NOT NULL,
  `tanggal_selesai` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nilai_proyek` int(11) NOT NULL,
  `klien` varchar(20) NOT NULL,
  `total_termin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`kode_proyek`, `nama_proyek`, `deskripsi_proyek`, `petugas`, `tanggal_mulai`, `tanggal_selesai`, `status`, `nilai_proyek`, `klien`, `total_termin`) VALUES
('PRO150400001', 'Perbaikan Jalan Muara Angke', 'Isi Deskripsi Disini', 'PG150400001', '02/22/2015', '04/02/2015', 'Menunggu', 150000000, 'KL150400005', 3),
('PRO150400002', 'Pembangunan Jaringan Instalasi gedung', 'Isi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi DeskrIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaipsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini aja', 'PG150400002', '04/30/2015', '05/09/2015', 'Menunggu', 150000000, 'KL150400002', 2);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
`kode_team` int(11) NOT NULL,
  `nama_team` varchar(20) NOT NULL,
  `kode_pelaksanaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
 ADD PRIMARY KEY (`id_dokumentasi`);

--
-- Indexes for table `kebutuhan_material`
--
ALTER TABLE `kebutuhan_material`
 ADD PRIMARY KEY (`kode_material`), ADD KEY `kode_pelaksanaan` (`kode_pelaksanaan`);

--
-- Indexes for table `kebutuhan_sdm`
--
ALTER TABLE `kebutuhan_sdm`
 ADD PRIMARY KEY (`kode_kebutuhan`), ADD KEY `petugas` (`petugas`), ADD KEY `kode_team` (`kode_team`);

--
-- Indexes for table `klien`
--
ALTER TABLE `klien`
 ADD PRIMARY KEY (`kode_klien`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
 ADD PRIMARY KEY (`kode_level`);

--
-- Indexes for table `pelaksanaan_proses_proyek`
--
ALTER TABLE `pelaksanaan_proses_proyek`
 ADD PRIMARY KEY (`kode_pelaksanaan`), ADD KEY `kode_proyek` (`kode_proyek`), ADD KEY `kode_proyek_2` (`kode_proyek`);

--
-- Indexes for table `pembayaran_termin`
--
ALTER TABLE `pembayaran_termin`
 ADD PRIMARY KEY (`kode_termin`), ADD KEY `kode_proyek` (`kode_proyek`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
 ADD PRIMARY KEY (`kode_pengguna`), ADD KEY `level` (`level`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
 ADD PRIMARY KEY (`kode_progress`), ADD KEY `dokumentasi` (`dokumentasi`), ADD KEY `kode_pelaksanaan` (`kode_pelaksanaan`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
 ADD PRIMARY KEY (`kode_proyek`), ADD KEY `petugas` (`petugas`), ADD KEY `klien` (`klien`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
 ADD PRIMARY KEY (`kode_team`), ADD KEY `kode_pelaksanaan` (`kode_pelaksanaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
MODIFY `id_dokumentasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kebutuhan_material`
--
ALTER TABLE `kebutuhan_material`
MODIFY `kode_material` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kebutuhan_sdm`
--
ALTER TABLE `kebutuhan_sdm`
MODIFY `kode_kebutuhan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
MODIFY `kode_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pembayaran_termin`
--
ALTER TABLE `pembayaran_termin`
MODIFY `kode_termin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
MODIFY `kode_progress` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
MODIFY `kode_team` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kebutuhan_material`
--
ALTER TABLE `kebutuhan_material`
ADD CONSTRAINT `kebutuhan_material_ibfk_1` FOREIGN KEY (`kode_pelaksanaan`) REFERENCES `pelaksanaan_proses_proyek` (`kode_pelaksanaan`);

--
-- Constraints for table `kebutuhan_sdm`
--
ALTER TABLE `kebutuhan_sdm`
ADD CONSTRAINT `kebutuhan_sdm_ibfk_1` FOREIGN KEY (`petugas`) REFERENCES `pengguna` (`kode_pengguna`),
ADD CONSTRAINT `kebutuhan_sdm_ibfk_2` FOREIGN KEY (`kode_team`) REFERENCES `team` (`kode_team`);

--
-- Constraints for table `pelaksanaan_proses_proyek`
--
ALTER TABLE `pelaksanaan_proses_proyek`
ADD CONSTRAINT `pelaksanaan_proses_proyek_ibfk_1` FOREIGN KEY (`kode_proyek`) REFERENCES `proyek` (`kode_proyek`);

--
-- Constraints for table `pembayaran_termin`
--
ALTER TABLE `pembayaran_termin`
ADD CONSTRAINT `pembayaran_termin_ibfk_1` FOREIGN KEY (`kode_proyek`) REFERENCES `proyek` (`kode_proyek`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`kode_level`);

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`dokumentasi`) REFERENCES `dokumentasi` (`id_dokumentasi`),
ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`kode_pelaksanaan`) REFERENCES `pelaksanaan_proses_proyek` (`kode_pelaksanaan`);

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`petugas`) REFERENCES `pengguna` (`kode_pengguna`),
ADD CONSTRAINT `proyek_ibfk_2` FOREIGN KEY (`klien`) REFERENCES `klien` (`kode_klien`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`kode_pelaksanaan`) REFERENCES `pelaksanaan_proses_proyek` (`kode_pelaksanaan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
