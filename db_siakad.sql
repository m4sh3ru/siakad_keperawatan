/*
Navicat MySQL Data Transfer

Source Server         : ServerQ
Source Server Version : 50541
Source Host           : localhost:3306
Source Database       : db_siakad

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-12-02 11:49:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for `mst_dosen`
-- ----------------------------
DROP TABLE IF EXISTS `mst_dosen`;
CREATE TABLE `mst_dosen` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `ref_agama_id` int(5) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_lengkap` (`nama_lengkap`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_dosen
-- ----------------------------
INSERT INTO `mst_dosen` VALUES ('1', 'akhmad maftukh hadil kamal', '11.1.03.03.0022', 'gresik', '2014-12-01', 'LAKI-LAKI', '0', '081977342020', 'kediri');
INSERT INTO `mst_dosen` VALUES ('2', 'joko susilo', '66yyyt345678', 'jakarta', '2015-10-01', '0', '0', '0823456789', 'kediri');
INSERT INTO `mst_dosen` VALUES ('10', 'memey', '98834567890', 'kediri', '2015-10-19', 'PEREMPUAN', '0', '08567654567', 'pare');
INSERT INTO `mst_dosen` VALUES ('11', 'narutokun', '994567890', 'kediri', '2015-10-01', 'LAKI-LAKI', '0', '08567655676', 'kediri');
INSERT INTO `mst_dosen` VALUES ('12', '3452345', '23452345', 'adsfasdfasdf', '0000-00-00', '0', '1', '0356 3456 34', '\"\"56sdfgasdfasdf');
INSERT INTO `mst_dosen` VALUES ('13', 'Heru Setyiawan', '129293737', 'Kediri', '0000-00-00', '1', '1', '0234 5234 52', '\"sdfgdsfasdfasdf');

-- ----------------------------
-- Table structure for `mst_khs`
-- ----------------------------
DROP TABLE IF EXISTS `mst_khs`;
CREATE TABLE `mst_khs` (
  `id` int(11) NOT NULL DEFAULT '0',
  `mst_matkul_id` int(5) NOT NULL,
  `ref_prodi_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_khs
-- ----------------------------

-- ----------------------------
-- Table structure for `mst_krs`
-- ----------------------------
DROP TABLE IF EXISTS `mst_krs`;
CREATE TABLE `mst_krs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_prodi_id` int(5) NOT NULL,
  `mst_matkul_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_krs
-- ----------------------------
INSERT INTO `mst_krs` VALUES ('11', '7', '10');
INSERT INTO `mst_krs` VALUES ('12', '7', '11');
INSERT INTO `mst_krs` VALUES ('13', '7', '12');
INSERT INTO `mst_krs` VALUES ('14', '7', '13');
INSERT INTO `mst_krs` VALUES ('15', '8', '11');
INSERT INTO `mst_krs` VALUES ('16', '8', '13');

-- ----------------------------
-- Table structure for `mst_mahasiswa`
-- ----------------------------
DROP TABLE IF EXISTS `mst_mahasiswa`;
CREATE TABLE `mst_mahasiswa` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nim` varchar(15) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `ref_periode_id` int(5) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` int(2) DEFAULT NULL COMMENT '1=Laki-Laki, 2=Perempuan',
  `ref_prodi_id` int(5) NOT NULL,
  `ref_agama_id` int(5) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_mahasiswa
-- ----------------------------
INSERT INTO `mst_mahasiswa` VALUES ('1', '11103030022', 'hadil kamal', '0', '0', '2010-06-10', null, '0', null, '081977342020', 'pare');
INSERT INTO `mst_mahasiswa` VALUES ('4', '34523452345', '2adfsfadf', 'asdfasdf', '2010', '0000-00-00', null, '0', '0', '24352345', 'asdfasdf');
INSERT INTO `mst_mahasiswa` VALUES ('5', '21341341234', 'asdfasdf', 'asdfasdf', '2010', '0000-00-00', null, '0', '0', '32452345234', '5asdfasdfasdf');
INSERT INTO `mst_mahasiswa` VALUES ('6', '2352345235', 'Mahmud', 'safdasdf', '2010', '0000-00-00', null, '0', '0', '234523452', 'sfasdfasf');
INSERT INTO `mst_mahasiswa` VALUES ('7', '2345234525', 'asfdasdf', 'asdfasdf', '2010', '0000-00-00', null, '0', '0', '', '');
INSERT INTO `mst_mahasiswa` VALUES ('8', '212341234', 'asdfasdfasdf', '', '1', '0000-00-00', null, '1', '1', '', '');
INSERT INTO `mst_mahasiswa` VALUES ('9', '352535', 'adsfasdfasdf', '', '1', '0000-00-00', null, '5', '2', '', '');
INSERT INTO `mst_mahasiswa` VALUES ('10', '3245325', 'asdfasdfasdf', '23452345', '1', '0000-00-00', null, '1', '1', '', '');
INSERT INTO `mst_mahasiswa` VALUES ('11', '12324124', 'asdfsdfasdf', 'asdfasdf', '1', '2012-03-04', null, '1', '1', '0123-4123-4123', 'asdfasdfasdf');
INSERT INTO `mst_mahasiswa` VALUES ('12', '523452345235', 'asdfasdfasdf', 'asfasdf', '1', '2012-03-04', null, '1', '1', '0123 4123 4134', '');
INSERT INTO `mst_mahasiswa` VALUES ('13', '12324124', 'asdfsdfasdf', 'asdfasdf', '1', '2012-03-04', null, '1', '1', '0123 4123 4123', 'asdfasdfasdf');
INSERT INTO `mst_mahasiswa` VALUES ('14', '11.1.03.03.0118', 'Heru Setyiawan', 'kediri', '4', '2012-12-21', null, '7', '1', '0345 3245 3453', 'anonym');
INSERT INTO `mst_mahasiswa` VALUES ('15', '11.1.03.03.0111', 'AHSAN HENDRA', 'Kediri', '1', '0000-00-00', null, '1', '1', '1', '8234234');
INSERT INTO `mst_mahasiswa` VALUES ('16', '11.1.03.03.0111', 'AHSAN HENDRA', 'Kediri', '1', '0000-00-00', null, '1', '1', '1', '08234234');
INSERT INTO `mst_mahasiswa` VALUES ('17', '11.1.03.03.0111', 'AHSAN HENDRA', 'Kediri', '1', '0000-00-00', null, '1', '1', '1', '0823 0928 0283');
INSERT INTO `mst_mahasiswa` VALUES ('18', '11.1.03.03.0111', 'AHSAN HENDRA', 'Kediri', '1', '0000-00-00', null, '1', '1', '1', null);
INSERT INTO `mst_mahasiswa` VALUES ('19', '11.1.03.03.0111', 'AHSAN HENDRA', 'Kediri', '1', '0000-00-00', null, '1', '1', '0823 0928 0283', '1');

-- ----------------------------
-- Table structure for `mst_matkul`
-- ----------------------------
DROP TABLE IF EXISTS `mst_matkul`;
CREATE TABLE `mst_matkul` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `kode_matkul` varchar(25) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `sks` int(1) NOT NULL,
  `semester` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_matkul
-- ----------------------------
INSERT INTO `mst_matkul` VALUES ('10', 'mt001', 'Matmatika', '4', '5');
INSERT INTO `mst_matkul` VALUES ('11', 'mt002', 'Bahasa Indonesia', '4', '8');
INSERT INTO `mst_matkul` VALUES ('12', 'mt003', 'Ekonomi', '4', '8');
INSERT INTO `mst_matkul` VALUES ('13', 'mt004', 'Penjaskes', '3', '6');

-- ----------------------------
-- Table structure for `mst_nilai`
-- ----------------------------
DROP TABLE IF EXISTS `mst_nilai`;
CREATE TABLE `mst_nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mst_mahasiswa_id` int(5) NOT NULL,
  `mst_matkul_id` int(5) DEFAULT NULL,
  `ref_prodi_id` int(5) DEFAULT NULL,
  `ref_semester_id` int(5) NOT NULL,
  `ref_kelas_id` int(5) DEFAULT NULL,
  `nilai` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_nilai
-- ----------------------------
INSERT INTO `mst_nilai` VALUES ('29', '14', '11', '7', '8', '1', '100');
INSERT INTO `mst_nilai` VALUES ('30', '14', '12', '7', '8', '1', '70');
INSERT INTO `mst_nilai` VALUES ('31', '8', '11', '7', '8', '1', '100');
INSERT INTO `mst_nilai` VALUES ('32', '12', '11', '7', '8', '1', '90');
INSERT INTO `mst_nilai` VALUES ('33', '8', '12', '7', '8', '1', '56');
INSERT INTO `mst_nilai` VALUES ('35', '14', '13', '7', '6', '1', '80');
INSERT INTO `mst_nilai` VALUES ('36', '14', '10', '7', '5', '1', '80');

-- ----------------------------
-- Table structure for `mst_user`
-- ----------------------------
DROP TABLE IF EXISTS `mst_user`;
CREATE TABLE `mst_user` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(65) NOT NULL,
  `password_text` varchar(50) NOT NULL,
  `ref_level_id` int(5) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_user
-- ----------------------------
INSERT INTO `mst_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '1', '2015-12-01 21:12:04', null);
INSERT INTO `mst_user` VALUES ('2', 'siswa', '5787be38ee03a9ae5360f54d9026465f', '', '2', '2015-11-26 23:11:37', null);
INSERT INTO `mst_user` VALUES ('3', '11.1.03.03.0118', 'ca77589729804b0def34f854e3fea88c', '', '3', null, '1');
INSERT INTO `mst_user` VALUES ('6', 'asfd', 'd1bb70baa31f1df69628c00632b65eab', '', '3', '2015-11-26 23:11:37', '1');
INSERT INTO `mst_user` VALUES ('7', '1243', '912ec803b2ce49e4a541068d495ab570', 'asdf', '2', null, '1');
INSERT INTO `mst_user` VALUES ('8', '11.1.03.03.0111', '6b8a7d605f526864865055c87118358f', '', '3', null, '1');
INSERT INTO `mst_user` VALUES ('9', '11.1.03.03.0111', '6b8a7d605f526864865055c87118358f', '', '3', null, '1');
INSERT INTO `mst_user` VALUES ('10', '11.1.03.03.0111', '6b8a7d605f526864865055c87118358f', '', '3', null, '1');
INSERT INTO `mst_user` VALUES ('11', '11.1.03.03.0111', '6b8a7d605f526864865055c87118358f', '', '3', null, '1');
INSERT INTO `mst_user` VALUES ('12', '11.1.03.03.0111', '6b8a7d605f526864865055c87118358f', '', '3', null, '1');

-- ----------------------------
-- Table structure for `ref_agama`
-- ----------------------------
DROP TABLE IF EXISTS `ref_agama`;
CREATE TABLE `ref_agama` (
  `id` int(5) NOT NULL,
  `nama_agama` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_agama
-- ----------------------------
INSERT INTO `ref_agama` VALUES ('1', 'islam');
INSERT INTO `ref_agama` VALUES ('2', 'katolik');
INSERT INTO `ref_agama` VALUES ('3', 'kristen');
INSERT INTO `ref_agama` VALUES ('4', 'hindu');
INSERT INTO `ref_agama` VALUES ('5', 'budha');

-- ----------------------------
-- Table structure for `ref_grade`
-- ----------------------------
DROP TABLE IF EXISTS `ref_grade`;
CREATE TABLE `ref_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `min` int(5) NOT NULL,
  `max` int(5) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `value` double(5,1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_grade
-- ----------------------------
INSERT INTO `ref_grade` VALUES ('1', '91', '100', 'A', '4.0');
INSERT INTO `ref_grade` VALUES ('2', '81', '90', 'B+', '3.5');
INSERT INTO `ref_grade` VALUES ('3', '71', '80', 'B', '3.0');
INSERT INTO `ref_grade` VALUES ('4', '61', '70', 'C+', '2.5');
INSERT INTO `ref_grade` VALUES ('5', '51', '60', 'C', '2.0');
INSERT INTO `ref_grade` VALUES ('6', '41', '50', 'D', '1.0');
INSERT INTO `ref_grade` VALUES ('7', '0', '40', 'E', '0.0');

-- ----------------------------
-- Table structure for `ref_kelas`
-- ----------------------------
DROP TABLE IF EXISTS `ref_kelas`;
CREATE TABLE `ref_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `ref_prodi_id` int(5) DEFAULT NULL,
  `ref_periode_id` int(5) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_kelas
-- ----------------------------
INSERT INTO `ref_kelas` VALUES ('1', 'KBD1', '7', '6', null);
INSERT INTO `ref_kelas` VALUES ('3', 'KBD2', '7', '6', null);

-- ----------------------------
-- Table structure for `ref_level`
-- ----------------------------
DROP TABLE IF EXISTS `ref_level`;
CREATE TABLE `ref_level` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_level
-- ----------------------------
INSERT INTO `ref_level` VALUES ('1', 'administrator');
INSERT INTO `ref_level` VALUES ('2', 'dosen');
INSERT INTO `ref_level` VALUES ('3', 'mahasiswa');

-- ----------------------------
-- Table structure for `ref_periode`
-- ----------------------------
DROP TABLE IF EXISTS `ref_periode`;
CREATE TABLE `ref_periode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_periode
-- ----------------------------
INSERT INTO `ref_periode` VALUES ('1', '2010/2011');
INSERT INTO `ref_periode` VALUES ('2', '2011/2012');
INSERT INTO `ref_periode` VALUES ('3', '2012/2013');
INSERT INTO `ref_periode` VALUES ('4', '2013/2014');
INSERT INTO `ref_periode` VALUES ('5', '2015/2016');
INSERT INTO `ref_periode` VALUES ('6', '2014/2015');

-- ----------------------------
-- Table structure for `ref_prodi`
-- ----------------------------
DROP TABLE IF EXISTS `ref_prodi`;
CREATE TABLE `ref_prodi` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `no_izin` varchar(25) NOT NULL,
  `nama_prodi` varchar(25) NOT NULL,
  `mst_dosen_id` int(5) NOT NULL COMMENT 'nama kaprodi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_prodi
-- ----------------------------
INSERT INTO `ref_prodi` VALUES ('1', '12.1234.akper', 'Akademi Keperawatan', '0');
INSERT INTO `ref_prodi` VALUES ('5', '11.1.03.03.0022', 'D4 Kebidanan', '0');
INSERT INTO `ref_prodi` VALUES ('6', '233333', 'Sistem Informasi', '0');
INSERT INTO `ref_prodi` VALUES ('7', '1234123123', 'Kebidanan', '13');
INSERT INTO `ref_prodi` VALUES ('8', '02323', 'Keperawatan', '12');

-- ----------------------------
-- Table structure for `ref_riwayat_kelas`
-- ----------------------------
DROP TABLE IF EXISTS `ref_riwayat_kelas`;
CREATE TABLE `ref_riwayat_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mst_mahasiswa_id` int(5) DEFAULT NULL,
  `ref_periode_id` int(5) DEFAULT NULL,
  `ref_kelas_id` int(5) DEFAULT NULL,
  `ref_semester_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_riwayat_kelas
-- ----------------------------

-- ----------------------------
-- Table structure for `ref_semester`
-- ----------------------------
DROP TABLE IF EXISTS `ref_semester`;
CREATE TABLE `ref_semester` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `semester` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_semester
-- ----------------------------
INSERT INTO `ref_semester` VALUES ('1', 'semester 1');
INSERT INTO `ref_semester` VALUES ('2', 'semester 2');
INSERT INTO `ref_semester` VALUES ('3', 'semester 3');
INSERT INTO `ref_semester` VALUES ('4', 'semester 4');
INSERT INTO `ref_semester` VALUES ('5', 'semester 5');
INSERT INTO `ref_semester` VALUES ('6', 'semester 6');
INSERT INTO `ref_semester` VALUES ('7', 'semester 7');
INSERT INTO `ref_semester` VALUES ('8', ' semester 8');
