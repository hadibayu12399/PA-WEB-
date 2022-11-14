-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2018 at 07:36 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ukk_insapra`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` char(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `spesifikasi` varchar(35) NOT NULL,
  `lokasi_barang` varchar(40) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `jml_barang` int(5) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `sumber_dana` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `spesifikasi`, `lokasi_barang`, `kategori`, `jml_barang`, `kondisi`, `jenis_barang`, `sumber_dana`) VALUES
('BR001', 'Laptop Toshiba', ' Intel Dual Core', 'R.Kepsek', 'Elektronik', -30, 'Baik', 'Komputer', 'CV.ERLANGGA'),
('BR002', 'Netbook Mugen', ' Intel Atom 1,66', 'R.Kepsek', 'Elektronik', 180, 'Baik', 'Komputer', 'CV.Komputer Maju '),
('BR003', 'Komputer (PC)', ' Intel P4 3.00GHz', 'Lab. Komputer', 'Elektronik', 200, 'Baik', 'Komputer', 'Cv.Apple Course'),
('BR004', 'Monitor LCD', ' Viewsonic 14', 'Lab. Komputer', 'Elektronik', 100, 'Baik', 'Monitor', 'CV.Komputer Maju '),
('BR005', 'Mesin Ketik', ' Olympia', 'R.Tata Usaha', 'Elektronik', 200, 'Baik', 'Mebeler', 'CV.Mesin Lama');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluar_barang`
--

CREATE TABLE `tb_keluar_barang` (
  `id_brg_keluar` varchar(8) NOT NULL,
  `kode_barang` char(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `penerima` varchar(35) NOT NULL,
  `jml_brg_keluar` int(8) NOT NULL,
  `keperluan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keluar_barang`
--

INSERT INTO `tb_keluar_barang` (`id_brg_keluar`, `kode_barang`, `nama_barang`, `tgl_keluar`, `penerima`, `jml_brg_keluar`, `keperluan`) VALUES
('BKB001', 'BR001', '', '2018-02-15', 'Alif Rustam', 100, 'Kegiatan UN'),
('BKB002', 'BR002', '', '2018-02-07', 'Fauzi Jaya', 10, 'Untuk Kegiatan UNBK'),
('BKB003', 'BR001', '', '2018-02-03', 'Fauzi', 120, 'Untuk apa Saja');

--
-- Triggers `tb_keluar_barang`
--
DELIMITER $$
CREATE TRIGGER `keluar_barang` AFTER INSERT ON `tb_keluar_barang` FOR EACH ROW UPDATE tb_barang SET jml_barang=jml_barang-NEW.jml_brg_keluar
WHERE kode_barang = NEW.kode_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_masuk`
--

CREATE TABLE `tb_masuk` (
  `id_msk_brg` char(8) NOT NULL,
  `kode_barang` char(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_masuk` int(8) NOT NULL,
  `kode_supplier` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_masuk`
--

INSERT INTO `tb_masuk` (`id_msk_brg`, `kode_barang`, `nama_barang`, `tgl_masuk`, `jml_masuk`, `kode_supplier`) VALUES
('BMK001', 'BR001', '', '2018-02-08', 200, 'SP002'),
('BMK002', 'BR002', '', '2018-02-02', 200, 'SP001'),
('BMK003', 'BR003', '', '2018-02-06', 200, 'SP003'),
('BMK005', 'BR005', '', '2018-02-14', 200, 'SP005'),
('BMK006', 'BR004', '', '2018-02-10', 100, 'SP002');

--
-- Triggers `tb_masuk`
--
DELIMITER $$
CREATE TRIGGER `masuk_barang` AFTER INSERT ON `tb_masuk` FOR EACH ROW BEGIN 
	UPDATE tb_barang SET jml_barang = jml_barang+NEW.jml_masuk
    WHERE kode_barang = NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam_barang`
--

CREATE TABLE `tb_pinjam_barang` (
  `no_pinjam` char(8) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `kode_barang` char(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jml_pinjam` int(7) NOT NULL,
  `peminjam` varchar(35) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pinjam_barang`
--

INSERT INTO `tb_pinjam_barang` (`no_pinjam`, `tgl_pinjam`, `kode_barang`, `nama_barang`, `jml_pinjam`, `peminjam`, `tgl_kembali`, `keterangan`) VALUES
('PJB001', '2018-02-03', 'BR002', '', 10, 'Siswanto', '2018-02-10', 'Di Lab.Komputer'),
('PJB002', '2018-02-09', 'BR001', '', 10, 'Riska Febrianti', '2018-02-09', 'Di Lab.Komputer');

--
-- Triggers `tb_pinjam_barang`
--
DELIMITER $$
CREATE TRIGGER `pinjam` AFTER INSERT ON `tb_pinjam_barang` FOR EACH ROW BEGIN 
	UPDATE tb_barang SET jml_barang = jml_barang -NEW.jml_pinjam
    WHERE kode_barang = NEW.kode_barang;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok`
--

CREATE TABLE `tb_stok` (
  `kode_barang` char(10) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stok`
--

INSERT INTO `tb_stok` (`kode_barang`, `keterangan`) VALUES
('BR001', 'Digunakan Siswa Untuk UN'),
('BR002', 'Untuk Kegiatan Sekolah'),
('BR003', 'Lab.Komputer'),
('BR004', 'Penunjang Kegiatan Belaja'),
('BR005', 'Praktek Administrasi Perk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kode_supplier` char(5) NOT NULL,
  `nama_supplier` varchar(35) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `telp_supplier` varchar(25) NOT NULL,
  `kota_supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`kode_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`, `kota_supplier`) VALUES
('SP001', 'ELS Komputer', ' Jln.Adisucipto No 50', '(0541)-20002', 'Jakarta'),
('SP002', 'ALNECT Komputer', ' Jln.Jantil No.80', '(0541)-30003', 'Bandung'),
('SP003', 'MAKRO Gudang Rabat', ' Jln.Maguwo No.1A', '(0741)-55555', 'Bali'),
('SP004', 'Gondarang Jaya Model', ' Jln.Adisucipto No.30', '(0541)-20022', 'Samarinda'),
('SP005', 'PROGO Toshiba', ' Jln.Maliboro ', '(0741)-5522', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
('P001', 'Administrator', 'Administrator', 'admin2', 'Administrator'),
('P002', 'Petugas', 'Petugas', 'petugas2', 'Petugas'),
('P003', 'Fahrul Rizal', 'FahrulRizal', 'rizal123', 'Administrator'),
('P004', 'MuhammadRidwan', 'MuhammadRidwan', 'ridwan123', 'Petugas');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stok`
-- (See below for the actual view)
--
CREATE TABLE `v_stok` (
`kode_barang` char(10)
,`nama_barang` varchar(30)
,`jml_masuk` decimal(32,0)
,`jml_pinjam` decimal(32,0)
,`jml_keluar` decimal(32,0)
,`jml_barang_keluar` decimal(33,0)
,`jml_total` decimal(34,0)
,`keterangan` varchar(25)
);

-- --------------------------------------------------------

--
-- Structure for view `v_stok`
--
DROP TABLE IF EXISTS `v_stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stok`  AS  select `b`.`kode_barang` AS `kode_barang`,`b`.`nama_barang` AS `nama_barang`,(select sum(`tb_masuk`.`jml_masuk`) from `tb_masuk` where (`tb_masuk`.`kode_barang` = `a`.`kode_barang`)) AS `jml_masuk`,(select sum(`tb_pinjam_barang`.`jml_pinjam`) from `tb_pinjam_barang` where (`tb_pinjam_barang`.`kode_barang` = `a`.`kode_barang`)) AS `jml_pinjam`,(select sum(`tb_keluar_barang`.`jml_brg_keluar`) from `tb_keluar_barang` where (`tb_keluar_barang`.`kode_barang` = `a`.`kode_barang`)) AS `jml_keluar`,(select ifnull((`jml_pinjam` + `jml_keluar`),0)) AS `jml_barang_keluar`,(select ifnull((`jml_masuk` - `jml_barang_keluar`),0)) AS `jml_total`,`a`.`keterangan` AS `keterangan` from (`tb_stok` `a` join `tb_barang` `b` on((`a`.`kode_barang` = `b`.`kode_barang`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_keluar_barang`
--
ALTER TABLE `tb_keluar_barang`
  ADD PRIMARY KEY (`id_brg_keluar`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD PRIMARY KEY (`id_msk_brg`),
  ADD KEY `kode_supplier` (`kode_supplier`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `tb_pinjam_barang`
--
ALTER TABLE `tb_pinjam_barang`
  ADD PRIMARY KEY (`no_pinjam`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_keluar_barang`
--
ALTER TABLE `tb_keluar_barang`
  ADD CONSTRAINT `tb_keluar_barang_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `tb_barang` (`kode_barang`);

--
-- Constraints for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD CONSTRAINT `tb_masuk_ibfk_2` FOREIGN KEY (`kode_supplier`) REFERENCES `tb_supplier` (`kode_supplier`),
  ADD CONSTRAINT `tb_masuk_ibfk_3` FOREIGN KEY (`kode_barang`) REFERENCES `tb_barang` (`kode_barang`);

--
-- Constraints for table `tb_pinjam_barang`
--
ALTER TABLE `tb_pinjam_barang`
  ADD CONSTRAINT `tb_pinjam_barang_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `tb_barang` (`kode_barang`);

--
-- Constraints for table `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD CONSTRAINT `tb_stok_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `tb_barang` (`kode_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
