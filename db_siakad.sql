-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2015 at 05:28 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siakad`
--
CREATE DATABASE IF NOT EXISTS `db_siakad` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_siakad`;

-- --------------------------------------------------------

--
-- Table structure for table `mst_dosen`
--

CREATE TABLE IF NOT EXISTS `mst_dosen` (
  `id_dosen` int(2) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jns_kelamin` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id_dosen`),
  UNIQUE KEY `nama_lengkap` (`nama_lengkap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mst_dosen`
--

INSERT INTO `mst_dosen` (`id_dosen`, `nama_lengkap`, `nidn`, `nip`, `tempat_lahir`, `tanggal_lahir`, `jns_kelamin`, `agama`, `alamat`, `no_telp`, `username`, `password`) VALUES
(1, 'akhmad maftukh hadil kamal', '11.1.03.03.0022', '', 'gresik', '2014-12-01', 'LAKI-LAKI', 'islam', 'kediri', '081977342020', 'kamal', 'aa63b0d5d950361c05012235ab520512'),
(2, 'joko susilo', '66yyyt345678', '-', 'jakarta', '2015-10-01', '0', '0', 'kediri', '0823456789', 'admin', 'd41d8cd98f00b204e9800998ecf8427e'),
(10, 'memey', '98834567890', '3467898765', 'kediri', '2015-10-19', 'PEREMPUAN', 'hindu', 'pare', '08567654567', 'memey', 'bc177fc2b187cc4ac44ead2587828c17'),
(11, 'narutokun', '994567890', '882346998765', 'kediri', '2015-10-01', 'LAKI-LAKI', 'islam', 'kediri', '08567655676', 'naruto', 'cf9ee5bcb36b4936dd7064ee9b2f139e');

-- --------------------------------------------------------

--
-- Table structure for table `mst_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mst_mahasiswa` (
  `id_mahasiswa` int(3) NOT NULL AUTO_INCREMENT,
  `nim` varchar(15) NOT NULL,
  `nm_mahasiswa` varchar(25) NOT NULL,
  `thn_angkatan` int(2) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jurusan` varchar(40) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mst_mahasiswa`
--

INSERT INTO `mst_mahasiswa` (`id_mahasiswa`, `nim`, `nm_mahasiswa`, `thn_angkatan`, `tempat_lahir`, `tgl_lahir`, `jurusan`, `no_telp`, `alamat`) VALUES
(1, '11103030022', 'hadil kamal', 2010, 'jakarta', '2010-06-10', 'Akademi Keperawatan', '081977342020', 'pare'),
(2, '11103030023', 'tukiman', 2010, 'surabaya', '1992-10-10', 'Akademi Keperawatan', '085648769143', 'kediri'),
(3, '', '', 0, '', '0000-00-00', '', '633453534534', '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_matkul`
--

CREATE TABLE IF NOT EXISTS `mst_matkul` (
  `id_matkul` int(2) NOT NULL AUTO_INCREMENT,
  `kode_matkul` varchar(25) NOT NULL,
  `nm_matkul` varchar(100) NOT NULL,
  `sks` int(1) NOT NULL,
  `semester` varchar(11) NOT NULL,
  PRIMARY KEY (`id_matkul`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mst_matkul`
--

INSERT INTO `mst_matkul` (`id_matkul`, `kode_matkul`, `nm_matkul`, `sks`, `semester`) VALUES
(1, 'm001', 'Agama', 3, 'semester 1'),
(3, 'm002', 'Kewarganegaraan', 3, 'semester 1'),
(4, 'm003', 'Bahasa Indonesia', 3, 'semester 1'),
(5, 'm004', 'Bahasa Inggris 1', 2, 'semester 2'),
(6, 'm005', 'Patofisiologi', 2, 'semester 2');

-- --------------------------------------------------------

--
-- Table structure for table `mst_nilai`
--

CREATE TABLE IF NOT EXISTS `mst_nilai` (
  `id_nilai` int(6) NOT NULL AUTO_INCREMENT,
  `nim` varchar(12) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `kode_matkul` varchar(7) NOT NULL,
  `grade` varchar(1) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `mst_nilai`
--

INSERT INTO `mst_nilai` (`id_nilai`, `nim`, `semester`, `kode_matkul`, `grade`) VALUES
(23, '11103030022', 'semester 1', 'm005', '0'),
(24, '11103030023', 'semester 2', 'm005', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE IF NOT EXISTS `mst_user` (
  `id_user` int(1) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` enum('administrator','mahasiswa','dosen') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator'),
(2, 'siswa', '5787be38ee03a9ae5360f54d9026465f', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `ref_agama`
--

CREATE TABLE IF NOT EXISTS `ref_agama` (
  `id_agama` int(1) NOT NULL,
  `agama` varchar(15) NOT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_agama`
--

INSERT INTO `ref_agama` (`id_agama`, `agama`) VALUES
(1, 'islam'),
(2, 'katolik'),
(3, 'kristen'),
(4, 'hindu'),
(5, 'budha');

-- --------------------------------------------------------

--
-- Table structure for table `ref_grade`
--

CREATE TABLE IF NOT EXISTS `ref_grade` (
  `id_grade` int(1) NOT NULL AUTO_INCREMENT,
  `dari` varchar(5) NOT NULL,
  `sampai` varchar(5) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `keterangan` int(25) NOT NULL,
  PRIMARY KEY (`id_grade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ref_kelamin`
--

CREATE TABLE IF NOT EXISTS `ref_kelamin` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `jns_kelamin` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ref_kelamin`
--

INSERT INTO `ref_kelamin` (`id`, `jns_kelamin`) VALUES
(1, 'LAKI-LAKI'),
(2, 'PEREMPUAN');

-- --------------------------------------------------------

--
-- Table structure for table `ref_level`
--

CREATE TABLE IF NOT EXISTS `ref_level` (
  `id_level` int(1) NOT NULL,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_level`
--

INSERT INTO `ref_level` (`id_level`, `level`) VALUES
(1, 'administrator'),
(2, 'dosen'),
(3, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `ref_prodi`
--

CREATE TABLE IF NOT EXISTS `ref_prodi` (
  `id_prodi` int(2) NOT NULL AUTO_INCREMENT,
  `no_izin` varchar(25) NOT NULL,
  `nm_prodi` varchar(25) NOT NULL,
  `nm_ketua` varchar(30) NOT NULL,
  PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ref_prodi`
--

INSERT INTO `ref_prodi` (`id_prodi`, `no_izin`, `nm_prodi`, `nm_ketua`) VALUES
(1, '12.1234.akper', 'Akademi Keperawatan', 'Suryono'),
(5, '11.1.03.03.0022', 'D4 Kebidanan', 'paijah');

-- --------------------------------------------------------

--
-- Table structure for table `ref_semester`
--

CREATE TABLE IF NOT EXISTS `ref_semester` (
  `id_semester` int(2) NOT NULL AUTO_INCREMENT,
  `semester` varchar(25) NOT NULL,
  PRIMARY KEY (`id_semester`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ref_semester`
--

INSERT INTO `ref_semester` (`id_semester`, `semester`) VALUES
(1, 'semester 1'),
(2, 'semester 2'),
(3, 'semester 3'),
(4, 'semester 4'),
(5, 'semester 5'),
(6, 'semester 6'),
(7, 'semester 7'),
(8, ' semester 8');

-- --------------------------------------------------------

--
-- Table structure for table `ref_thn_angkatan`
--

CREATE TABLE IF NOT EXISTS `ref_thn_angkatan` (
  `id_thn_angkatan` int(11) NOT NULL AUTO_INCREMENT,
  `thn_angkatan` varchar(11) NOT NULL,
  PRIMARY KEY (`id_thn_angkatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ref_thn_angkatan`
--

INSERT INTO `ref_thn_angkatan` (`id_thn_angkatan`, `thn_angkatan`) VALUES
(1, '2010-2011');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
