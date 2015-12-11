/*
Navicat MySQL Data Transfer

Source Server         : ServerQ
Source Server Version : 50541
Source Host           : localhost:3306
Source Database       : db_siakad

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-12-11 21:13:03
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_dosen
-- ----------------------------
INSERT INTO `mst_dosen` VALUES ('1', 'akhmad maftukh hadil kamal', '11.1.03.03.0022', 'gresik', '2014-12-01', 'LAKI-LAKI', '0', '081977342020', 'kediri');
INSERT INTO `mst_dosen` VALUES ('2', 'joko susilo', '66yyyt345678', 'jakarta', '2015-10-01', '0', '0', '0823456789', 'kediri');
INSERT INTO `mst_dosen` VALUES ('10', 'memey', '98834567890', 'kediri', '2015-10-19', 'PEREMPUAN', '0', '08567654567', 'pare');
INSERT INTO `mst_dosen` VALUES ('11', 'narutokun', '994567890', 'kediri', '2015-10-01', 'LAKI-LAKI', '0', '08567655676', 'kediri');
INSERT INTO `mst_dosen` VALUES ('13', 'Heru Setyiawan', '129293737', 'Kediri', '0000-00-00', '1', '1', '0234 5234 52', '\"sdfgdsfasdfasdf');
INSERT INTO `mst_dosen` VALUES ('14', 'Drs. MUHSIN', '234523453', 'Tulungagung', '0000-00-00', '1', '1', '0456 3453 45', '\"\"asdfsdfasdf');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_krs
-- ----------------------------
INSERT INTO `mst_krs` VALUES ('11', '7', '10');
INSERT INTO `mst_krs` VALUES ('12', '7', '11');
INSERT INTO `mst_krs` VALUES ('13', '7', '12');
INSERT INTO `mst_krs` VALUES ('14', '7', '13');
INSERT INTO `mst_krs` VALUES ('15', '8', '11');
INSERT INTO `mst_krs` VALUES ('16', '8', '13');
INSERT INTO `mst_krs` VALUES ('19', '7', '14');
INSERT INTO `mst_krs` VALUES ('20', '7', '15');
INSERT INTO `mst_krs` VALUES ('21', '7', '16');
INSERT INTO `mst_krs` VALUES ('22', '7', '17');

-- ----------------------------
-- Table structure for `mst_mahasiswa`
-- ----------------------------
DROP TABLE IF EXISTS `mst_mahasiswa`;
CREATE TABLE `mst_mahasiswa` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nim` varchar(15) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `ref_periode_id` int(5) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` int(2) DEFAULT NULL COMMENT '1=Laki-Laki, 2=Perempuan',
  `ref_prodi_id` int(5) NOT NULL,
  `ref_agama_id` int(5) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_mahasiswa
-- ----------------------------
INSERT INTO `mst_mahasiswa` VALUES ('1', '11103030022', 'hadil kamal', '0', '0', '2010-06-10', null, '0', null, '081977342020', 'pare');
INSERT INTO `mst_mahasiswa` VALUES ('14', '11.1.03.03.0118', 'HERU SETYIAWAN', 'Kediri', '4', '2012-12-21', '1', '7', '1', '0345 3245 3453', 'anonym');
INSERT INTO `mst_mahasiswa` VALUES ('41', 'AG111030302010', 'MUHAMMAD KHOIRI', 'Kediri', '2', '2012-03-14', '1', '7', '1', '0234 5234 5234', 'sdfasdfasdfsadfasdf');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_matkul
-- ----------------------------
INSERT INTO `mst_matkul` VALUES ('10', 'mt001', 'Matmatika', '4', '5');
INSERT INTO `mst_matkul` VALUES ('11', 'mt002', 'Bahasa Indonesia', '4', '8');
INSERT INTO `mst_matkul` VALUES ('12', 'mt003', 'Ekonomi', '4', '8');
INSERT INTO `mst_matkul` VALUES ('13', 'mt004', 'Penjaskes', '3', '6');
INSERT INTO `mst_matkul` VALUES ('14', 'MT1002', 'E-commerce', '2', '5');
INSERT INTO `mst_matkul` VALUES ('15', 'MT10003', 'Pemberdayaan Perempuan', '2', '6');
INSERT INTO `mst_matkul` VALUES ('16', 'MT10004', 'Bahasa Jawa', '2', '6');
INSERT INTO `mst_matkul` VALUES ('17', 'MT100022', 'Kewarganegaraan', '2', '5');

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
  `nilai` float(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_nilai
-- ----------------------------
INSERT INTO `mst_nilai` VALUES ('1', '14', '11', '7', '8', null, '3.75');
INSERT INTO `mst_nilai` VALUES ('2', '14', '12', '7', '8', null, '3.75');
INSERT INTO `mst_nilai` VALUES ('3', '14', '10', '7', '5', null, '3.75');
INSERT INTO `mst_nilai` VALUES ('4', '14', '14', '7', '5', null, '3.25');
INSERT INTO `mst_nilai` VALUES ('5', '14', '17', '7', '5', null, '3.50');
INSERT INTO `mst_nilai` VALUES ('6', '14', '15', '7', '6', null, '1.50');
INSERT INTO `mst_nilai` VALUES ('7', '14', '16', '7', '6', null, '1.58');
INSERT INTO `mst_nilai` VALUES ('8', '14', '13', '7', '6', null, '0.12');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mst_user
-- ----------------------------
INSERT INTO `mst_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '1', '2015-12-11 19:12:53', null);
INSERT INTO `mst_user` VALUES ('14', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '3', '2015-12-06 10:12:09', '1');
INSERT INTO `mst_user` VALUES ('27', '11.1.04.04.0199', '56117b5e797e699cb8af1f87e47e1377', '', '3', '2015-12-06 07:12:43', null);
INSERT INTO `mst_user` VALUES ('29', '11.1.03.03.0118', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '3', '2015-12-06 22:12:59', '1');
INSERT INTO `mst_user` VALUES ('30', 'AG111030302010', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '3', '2015-12-06 19:12:57', null);

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
  `value` double(5,2) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `min` int(5) NOT NULL,
  `max` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_grade
-- ----------------------------
INSERT INTO `ref_grade` VALUES ('1', '4.00', 'A', '0', '0');
INSERT INTO `ref_grade` VALUES ('2', '3.99', 'A', '0', '0');
INSERT INTO `ref_grade` VALUES ('3', '3.87', 'A', '0', '0');
INSERT INTO `ref_grade` VALUES ('4', '3.75', 'A', '0', '0');
INSERT INTO `ref_grade` VALUES ('5', '3.66', 'A', '0', '0');
INSERT INTO `ref_grade` VALUES ('6', '3.59', 'A', '0', '0');
INSERT INTO `ref_grade` VALUES ('7', '3.51', 'A', '0', '0');
INSERT INTO `ref_grade` VALUES ('8', '3.50', 'B', '0', '0');
INSERT INTO `ref_grade` VALUES ('9', '3.33', 'B', '0', '0');
INSERT INTO `ref_grade` VALUES ('10', '3.25', 'B', '0', '0');
INSERT INTO `ref_grade` VALUES ('11', '3.24', 'B', '0', '0');
INSERT INTO `ref_grade` VALUES ('12', '3.16', 'B', '0', '0');
INSERT INTO `ref_grade` VALUES ('13', '3.00', 'B', '0', '0');
INSERT INTO `ref_grade` VALUES ('14', '2.99', 'B', '0', '0');
INSERT INTO `ref_grade` VALUES ('15', '2.88', 'B', '0', '0');
INSERT INTO `ref_grade` VALUES ('16', '2.76', 'B', '0', '0');
INSERT INTO `ref_grade` VALUES ('17', '2.75', 'C', '0', '0');
INSERT INTO `ref_grade` VALUES ('18', '2.67', 'C', '0', '0');
INSERT INTO `ref_grade` VALUES ('19', '2.58', 'C', '0', '0');
INSERT INTO `ref_grade` VALUES ('20', '2.50', 'C', '0', '0');
INSERT INTO `ref_grade` VALUES ('21', '2.49', 'C', '0', '0');
INSERT INTO `ref_grade` VALUES ('22', '2.33', 'C', '0', '0');
INSERT INTO `ref_grade` VALUES ('23', '2.25', 'C', '0', '0');
INSERT INTO `ref_grade` VALUES ('24', '2.24', 'C', '0', '0');
INSERT INTO `ref_grade` VALUES ('25', '2.16', 'C', '0', '0');
INSERT INTO `ref_grade` VALUES ('26', '2.16', 'C', '0', '0');
INSERT INTO `ref_grade` VALUES ('27', '2.00', 'C', '0', '0');
INSERT INTO `ref_grade` VALUES ('28', '1.99', 'D', '0', '0');
INSERT INTO `ref_grade` VALUES ('29', '1.91', 'D', '0', '0');
INSERT INTO `ref_grade` VALUES ('30', '1.83', 'D', '0', '0');
INSERT INTO `ref_grade` VALUES ('31', '1.74', 'D', '0', '0');
INSERT INTO `ref_grade` VALUES ('32', '1.66', 'D', '0', '0');
INSERT INTO `ref_grade` VALUES ('33', '1.58', 'D', '0', '0');
INSERT INTO `ref_grade` VALUES ('34', '1.50', 'D', '0', '0');
INSERT INTO `ref_grade` VALUES ('35', '1.41', 'D', '0', '0');
INSERT INTO `ref_grade` VALUES ('36', '1.33', 'D', '0', '0');
INSERT INTO `ref_grade` VALUES ('37', '1.25', 'D', '0', '0');
INSERT INTO `ref_grade` VALUES ('38', '1.24', 'D', '0', '0');
INSERT INTO `ref_grade` VALUES ('39', '1.00', 'D', '0', '0');
INSERT INTO `ref_grade` VALUES ('40', '0.93', 'E', '0', '0');
INSERT INTO `ref_grade` VALUES ('41', '0.86', 'E', '0', '0');
INSERT INTO `ref_grade` VALUES ('42', '0.80', 'E', '0', '0');
INSERT INTO `ref_grade` VALUES ('43', '0.66', 'E', '0', '0');
INSERT INTO `ref_grade` VALUES ('44', '0.59', 'E', '0', '0');
INSERT INTO `ref_grade` VALUES ('45', '0.52', 'E', '0', '0');
INSERT INTO `ref_grade` VALUES ('46', '0.46', 'E', '0', '0');
INSERT INTO `ref_grade` VALUES ('47', '0.32', 'E', '0', '0');
INSERT INTO `ref_grade` VALUES ('48', '0.25', 'E', '0', '0');
INSERT INTO `ref_grade` VALUES ('49', '0.19', 'E', '0', '0');
INSERT INTO `ref_grade` VALUES ('50', '0.12', 'E', '0', '0');
INSERT INTO `ref_grade` VALUES ('51', '0.10', 'E', '0', '0');

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
INSERT INTO `ref_prodi` VALUES ('8', '1234567', 'Keperawatan', '14');

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
