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

INSERT INTO `area` (`id_area`, `area`) VALUES
(1,	'Intake Silo'),
(2,	'Intake Tilting'),
(3,	'Dryer 1'),
(5,	'Dryer 2'),
(6,	'Intake FM'),
(7,	'Hammermill 1'),
(8,	'Hammermill 2'),
(9,	'Hammermill 3'),
(10,	'Rollermill'),
(11,	'Mixer A'),
(12,	'Mixer B'),
(13,	'Pelletmill 1'),
(14,	'Pelletmill 2'),
(15,	'Pelletmill 3'),
(16,	'Pelletmill 4'),
(17,	'Pelletmill 5'),
(18,	'Pelletmill 6'),
(19,	'Pelletmill 7'),
(20,	'Pelletmill 8'),
(21,	'kebun');

DROP TABLE IF EXISTS `detail_work_order`;
CREATE TABLE `detail_work_order` (
  `id_detail_work_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_work_order` varchar(50) NOT NULL,
  `approved_order` timestamp NULL DEFAULT NULL,
  `execution` timestamp NULL DEFAULT NULL,
  `approved_work` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail_work_order`),
  KEY `id_work_order` (`id_work_order`),
  CONSTRAINT `detail_work_order_ibfk_3` FOREIGN KEY (`id_work_order`) REFERENCES `work_order` (`id_work_order`) ON DELETE CASCADE ON UPDATE CASCADE
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

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `grup`, `is_lapor`, `updated_at`) VALUES
(1,	'William',	'wil',	'202cb962ac59075b964b07152d234b70',	'Admin',	'',	0,	NULL),
(3,	'Admin',	'admin',	'21232f297a57a5a743894a0e4a801fc3',	'Admin',	'',	0,	NULL),
(6,	'johan',	'jhn',	'202cb962ac59075b964b07152d234b70',	'Teknisi',	'Electrical',	1,	'2021-08-13'),
(7,	'thomas',	'thomthom',	'202cb962ac59075b964b07152d234b70',	'Teknisi',	'Electrical',	1,	'2021-08-13'),
(9,	'james bond',	'james1223',	'202cb962ac59075b964b07152d234b70',	'Teknisi',	'Automation',	1,	'2021-08-13'),
(10,	'Teknisi saja',	'tektek',	'202cb962ac59075b964b07152d234b70',	'Teknisi',	'Electrical',	1,	'2021-08-13'),
(38,	'Nanang Haruni',	'nanang',	'202cb962ac59075b964b07152d234b70',	'Supervisor-NonMTN',	'Warehouse',	0,	NULL),
(40,	'Non enim dolor nostr',	'nugysyn',	'202cb962ac59075b964b07152d234b70',	'Karyawan-NonMTN',	'Warehouse',	0,	NULL),
(42,	'Cipta Hartanto',	'cipta',	'202cb962ac59075b964b07152d234b70',	'Supervisor-NonMTN',	'Produksi',	0,	NULL),
(43,	'Ducimus voluptatem',	'kelir',	'202cb962ac59075b964b07152d234b70',	'Karyawan-NonMTN',	'Produksi',	0,	NULL),
(45,	'Dadang',	'dadang',	'202cb962ac59075b964b07152d234b70',	'Karyawan-NonMTN',	'Produksi',	0,	NULL);

DROP TABLE IF EXISTS `work_order`;
CREATE TABLE `work_order` (
  `id_work_order` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL,
  `grup` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `permasalahan` text NOT NULL,
  `photo` varchar(50) NOT NULL,
  `request_by` varchar(50) NOT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `wo_status` int(11) NOT NULL,
  PRIMARY KEY (`id_work_order`),
  KEY `wo_status` (`wo_status`),
  CONSTRAINT `work_order_ibfk_2` FOREIGN KEY (`wo_status`) REFERENCES `detail_wo_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2021-08-13 03:49:12
