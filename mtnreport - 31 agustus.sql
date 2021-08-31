-- Adminer 4.8.0 MySQL 5.7.24 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(100) NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `detail_work_order`;
CREATE TABLE `detail_work_order` (
  `id_detail_work_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_work_order` varchar(50) NOT NULL,
  `approved_order` timestamp NULL DEFAULT NULL,
  `execution` timestamp NULL DEFAULT NULL,
  `approved_work` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail_work_order`),
  KEY `id_work_order` (`id_work_order`),
  CONSTRAINT `detail_work_order_ibfk_4` FOREIGN KEY (`id_work_order`) REFERENCES `work_order` (`id_work_order`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `detail_wo_status`;
CREATE TABLE `detail_wo_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `detail_wo_status` (`id`, `status`) VALUES
(1,	'PENDING'),
(2,	'ACC BY SPV'),
(3,	'REJECT BY SPV'),
(4,	'REJECT BY MTN'),
(5,	'SERVICE DONE'),
(6,	'CONFIRM BY SPV');

DROP TABLE IF EXISTS `laporan`;
CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `type_wo` varchar(50) NOT NULL,
  `grup` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `pekerjaan` text NOT NULL,
  `analisis` text NOT NULL,
  `sparepart` text,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `durasi` varchar(50) NOT NULL,
  `shift` int(5) NOT NULL,
  `total_person` int(5) NOT NULL,
  `nama_teknisi` varchar(255) NOT NULL,
  `made_by` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('Admin','Teknisi','Supervisor-NonMTN','Karyawan-NonMTN') NOT NULL,
  `grup` varchar(50) DEFAULT NULL,
  `is_lapor` int(1) unsigned zerofill NOT NULL DEFAULT '0',
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `work_order`;
CREATE TABLE `work_order` (
  `id_work_order` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL,
  `grup` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `permasalahan` text NOT NULL,
  `bagian_teknisi` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `request_by` varchar(50) NOT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `wo_status` int(11) NOT NULL,
  PRIMARY KEY (`id_work_order`),
  KEY `wo_status` (`wo_status`),
  CONSTRAINT `work_order_ibfk_2` FOREIGN KEY (`wo_status`) REFERENCES `detail_wo_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `work_order_ditolak`;
CREATE TABLE `work_order_ditolak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_work_order` varchar(50) NOT NULL,
  `alasan` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_work_order` (`id_work_order`),
  CONSTRAINT `work_order_ditolak_ibfk_1` FOREIGN KEY (`id_work_order`) REFERENCES `work_order` (`id_work_order`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2021-08-31 04:17:15
