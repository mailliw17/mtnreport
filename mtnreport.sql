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
(3,	'Dryer 1');

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
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `laporan` (`id_laporan`, `tanggal`, `type_wo`, `grup`, `area`, `pekerjaan`, `analisis`, `sparepart`, `jam_mulai`, `jam_selesai`, `durasi`, `shift`, `total_person`, `nama_teknisi`, `status`) VALUES
(10,	'2021-04-26',	'PRO-M',	'Automation',	'Intake Tilting',	'qwertyq',	'wererwer',	'ayam',	'09:19:00',	'13:58:00',	'04 Jam 39 Menit',	2,	2,	'mamat, alkatiri',	'Done'),
(11,	'2021-04-26',	'EM',	'Mechanical',	'Intake Silo',	'Membersihkan rumput',	'Rumput terlalu panjang',	'-',	'13:00:00',	'15:47:00',	'02 Jam 47 Menit',	2,	2,	'Hendri, mamat',	'Done'),
(12,	'2021-04-26',	'PRO-M',	'Mechanical',	'Intake Silo',	'rumput',	'kepanjangan',	'-',	'13:00:00',	'15:50:00',	'02 Jam 50 Menit',	2,	1,	'william',	'Done'),
(13,	'2021-04-26',	'EM',	'Civil',	'Intake Tilting',	'Baut intake',	'Baut hilang',	'',	'13:05:00',	'16:00:00',	'02 Jam 55 Menit',	2,	2,	'Wil, james',	'Done');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('Admin','Teknisi') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1,	'William',	'wil',	'202cb962ac59075b964b07152d234b70',	'Admin'),
(2,	'John',	'john',	'202cb962ac59075b964b07152d234b70',	'Teknisi');

-- 2021-04-26 09:07:40
