/*
SQLyog Community v13.0.0 (32 bit)
MySQL - 10.1.32-MariaDB : Database - pus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pus` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pus`;

/*Table structure for table `antrian_dan_keluhan` */

DROP TABLE IF EXISTS `antrian_dan_keluhan`;

CREATE TABLE `antrian_dan_keluhan` (
  `id_antrian` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) NOT NULL,
  `tgl_antrian` datetime NOT NULL,
  `tinggi_badan_pasien` int(11) NOT NULL,
  `berat_badan_pasien` int(11) NOT NULL,
  `tekanan_darah_pasien` int(11) NOT NULL,
  `keluhan_pasien` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  PRIMARY KEY (`id_antrian`),
  KEY `const_antrian_pasien` (`id_pasien`),
  KEY `const_dokter` (`id_dokter`),
  CONSTRAINT `const_antrian_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pendaftaran_pasien` (`id_pasien`),
  CONSTRAINT `const_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `antrian_dan_keluhan` */

insert  into `antrian_dan_keluhan`(`id_antrian`,`id_pasien`,`tgl_antrian`,`tinggi_badan_pasien`,`berat_badan_pasien`,`tekanan_darah_pasien`,`keluhan_pasien`,`status`,`id_dokter`) values 
(1,18,'2009-01-06 00:00:00',23,23,45,'Sakit kepala','selesai',11),
(2,18,'2018-06-03 08:30:00',23,45,36,'sakit perut','selesai',1),
(5,25,'2018-06-05 00:00:00',150,34,67,'perut keroncongan','selesai',1),
(6,18,'2018-06-04 00:00:00',23,21,236,'pusing','selesai',1),
(8,26,'2018-06-01 00:00:00',76,34,12,'kaki pegal-pegal','selesai',1),
(10,27,'2018-06-02 00:00:00',23,34,45,'sakit perut, pusing','selesai',1),
(11,29,'2018-06-06 00:00:00',67,8,78,'dbcd','selesai',1),
(12,31,'2018-06-07 00:00:00',145,50,110,'Mual','selesai',1),
(13,32,'2018-06-01 00:00:00',76,45,120,'demam','selesai',1),
(14,33,'2018-06-08 00:00:00',170,54,125,'Nyeri tulang','antri',1),
(15,34,'2018-06-06 00:00:00',170,45,120,'Sakit kepala','selesai',1),
(16,35,'2018-06-01 00:00:00',158,56,120,'maa berkunang kunang','antri',1),
(17,36,'2018-06-07 00:00:00',158,56,120,'kepala pusing tujuh keliling','antri',1),
(18,37,'2018-06-01 00:00:00',158,56,120,'perut perih ','antri',1),
(19,18,'2018-06-01 00:00:00',158,56,120,'maa berkunang kunang','antri',1);

/*Table structure for table `apoteker` */

DROP TABLE IF EXISTS `apoteker`;

CREATE TABLE `apoteker` (
  `id_apoteker` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `status` varchar(225) NOT NULL,
  PRIMARY KEY (`id_apoteker`),
  KEY `const_apoteker_user` (`id`),
  CONSTRAINT `const_apoteker_user` FOREIGN KEY (`id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `apoteker` */

insert  into `apoteker`(`id_apoteker`,`nama`,`jenis_kelamin`,`alamat`,`id`,`status`) values 
(1,'af','l','gd',7,''),
(13,'Astri Pangaribuan','perempuan','Balige',13,'APOTEKER'),
(14,'Astri Pangaribuan','perempuan','Balige',15,'APOTEKER');

/*Table structure for table `detail_resep_obat` */

DROP TABLE IF EXISTS `detail_resep_obat`;

CREATE TABLE `detail_resep_obat` (
  `id_detail_resep` int(11) NOT NULL AUTO_INCREMENT,
  `id_resep_obat` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `dosis` varchar(200) DEFAULT NULL,
  `cara_penggunaan` text,
  PRIMARY KEY (`id_detail_resep`),
  KEY `fk_resep_detail` (`id_resep_obat`),
  KEY `fk_obat_detail` (`id_obat`),
  CONSTRAINT `fk_obat_detail` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  CONSTRAINT `fk_resep_detail` FOREIGN KEY (`id_resep_obat`) REFERENCES `resep_obat` (`id_resep`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `detail_resep_obat` */

insert  into `detail_resep_obat`(`id_detail_resep`,`id_resep_obat`,`id_obat`,`dosis`,`cara_penggunaan`) values 
(1,11,2,'23','sebelum makan'),
(2,12,2,'23','sebelum makan'),
(3,13,2,'23','sebelum makan'),
(4,14,4,'11','setelah makan'),
(5,15,3,'23','sebelum makan'),
(6,15,2,'11','setelah makan'),
(7,16,2,'23','sebelum makan'),
(8,16,3,'11','setelah makan');

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `id` int(11) NOT NULL,
  `status` varchar(225) NOT NULL,
  PRIMARY KEY (`id_dokter`),
  KEY `const_dokter_user` (`id`),
  CONSTRAINT `const_dokter_user` FOREIGN KEY (`id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `dokter` */

insert  into `dokter`(`id_dokter`,`nama`,`jenis_kelamin`,`alamat`,`id`,`status`) values 
(1,'lk','l','lk',8,'Dokter Gigi'),
(11,'Naomi Nainggolan','perempuan','laguboti',11,'Dokter Umum'),
(12,'Tika Napit','perempuan','cilangkap',8,'Dokter Umum');

/*Table structure for table `family_folder` */

DROP TABLE IF EXISTS `family_folder`;

CREATE TABLE `family_folder` (
  `noKK` int(11) NOT NULL,
  `nama_kepala_keluarga` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  PRIMARY KEY (`noKK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `family_folder` */

insert  into `family_folder`(`noKK`,`nama_kepala_keluarga`,`alamat`) values 
(100,'Beni','Laguboti'),
(324,'Riswanto','Porsea'),
(1233,'Budo','Balige'),
(1234,'andi','balige'),
(4456,'andi','tarutung'),
(55678,'Cici','Sitoluama'),
(12312312,'Titus','Cilangkap'),
(45453345,'Vicky','Cipayung'),
(123456789,'Brodo','Mandala'),
(2147483647,'Andro Septian','Jl. Sumatera Utara Medan');

/*Table structure for table `kepala_puskesmas` */

DROP TABLE IF EXISTS `kepala_puskesmas`;

CREATE TABLE `kepala_puskesmas` (
  `id_kepala_puskesmas` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `id` int(11) NOT NULL,
  `status` varchar(225) NOT NULL,
  PRIMARY KEY (`id_kepala_puskesmas`),
  KEY `const12` (`id`),
  CONSTRAINT `const12` FOREIGN KEY (`id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kepala_puskesmas` */

insert  into `kepala_puskesmas`(`id_kepala_puskesmas`,`nama`,`id`,`status`) values 
(14,'Hermina Sihite',14,'Kepala Puskesmas');

/*Table structure for table `laporan_rekam_medik` */

DROP TABLE IF EXISTS `laporan_rekam_medik`;

CREATE TABLE `laporan_rekam_medik` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `id_Dokter` int(11) NOT NULL,
  `tgl_laporan` datetime NOT NULL,
  `judul_laporan` varchar(225) NOT NULL,
  PRIMARY KEY (`id_laporan`),
  KEY `const_laporan_dokter` (`id_Dokter`),
  CONSTRAINT `const_laporan_dokter` FOREIGN KEY (`id_Dokter`) REFERENCES `dokter` (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `laporan_rekam_medik` */

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values 
('m000000_000000_base',1524037289),
('m130524_201442_init',1524037293);

/*Table structure for table `obat` */

DROP TABLE IF EXISTS `obat`;

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `id_apoteker` int(11) NOT NULL,
  `nama_obat` varchar(225) NOT NULL,
  `jenis_obat` varchar(225) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  PRIMARY KEY (`id_obat`),
  KEY `Const_obat_apoteker` (`id_apoteker`),
  CONSTRAINT `Const_obat_apoteker` FOREIGN KEY (`id_apoteker`) REFERENCES `apoteker` (`id_apoteker`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `obat` */

insert  into `obat`(`id_obat`,`id_apoteker`,`nama_obat`,`jenis_obat`,`jumlah_obat`) values 
(2,1,'Fenitoin','mual',21),
(3,1,'Epinefrin','demam',17),
(4,1,'Loratadin','pusing',9),
(5,1,'Acetosal','Analgesik',10),
(6,1,'Nalokson','Antidot dan Obat lain untuk Keracunan',2),
(7,1,'Karbamazepin','Antiepilepsi ',22);

/*Table structure for table `obat_keluar` */

DROP TABLE IF EXISTS `obat_keluar`;

CREATE TABLE `obat_keluar` (
  `id_obat_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `id_apoteker` int(11) NOT NULL,
  `tgl_laporan` datetime NOT NULL,
  `file` varchar(225) NOT NULL,
  PRIMARY KEY (`id_obat_keluar`),
  CONSTRAINT `const_1` FOREIGN KEY (`id_obat_keluar`) REFERENCES `apoteker` (`id_apoteker`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `obat_keluar` */

insert  into `obat_keluar`(`id_obat_keluar`,`id_apoteker`,`tgl_laporan`,`file`) values 
(1,1,'2018-06-25 00:00:00','23.pdf');

/*Table structure for table `obat_masuk` */

DROP TABLE IF EXISTS `obat_masuk`;

CREATE TABLE `obat_masuk` (
  `id_obat_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `id_apoteker` int(11) NOT NULL,
  `tgl_laporan` datetime NOT NULL,
  `file` varchar(225) NOT NULL,
  PRIMARY KEY (`id_obat_masuk`),
  KEY `Const_masuk_apoteker` (`id_apoteker`),
  CONSTRAINT `Const_masuk_apoteker` FOREIGN KEY (`id_apoteker`) REFERENCES `apoteker` (`id_apoteker`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `obat_masuk` */

insert  into `obat_masuk`(`id_obat_masuk`,`id_apoteker`,`tgl_laporan`,`file`) values 
(1,1,'2018-06-18 00:00:00','23.pdf'),
(2,1,'2018-06-20 00:00:00','21.pdf'),
(3,1,'2018-06-01 00:00:00','24.pptx'),
(4,1,'2018-06-25 00:00:00','45.pdf'),
(5,1,'2018-06-25 00:00:00','67.ppt');

/*Table structure for table `pendaftaran_pasien` */

DROP TABLE IF EXISTS `pendaftaran_pasien`;

CREATE TABLE `pendaftaran_pasien` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `id_resepsionis` int(11) NOT NULL,
  `noKK_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_telepon` int(11) NOT NULL,
  `pekerjaan` varchar(225) NOT NULL,
  PRIMARY KEY (`id_pasien`),
  KEY `Const_pendaftaran_resepsionis` (`id_resepsionis`),
  KEY `noKK_pasien` (`noKK_pasien`),
  CONSTRAINT `Const_pendaftaran_resepsionis` FOREIGN KEY (`id_resepsionis`) REFERENCES `resepsionis` (`id_resepsionis`),
  CONSTRAINT `pendaftaran_pasien_ibfk_1` FOREIGN KEY (`noKK_pasien`) REFERENCES `family_folder` (`noKK`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `pendaftaran_pasien` */

insert  into `pendaftaran_pasien`(`id_pasien`,`id_resepsionis`,`noKK_pasien`,`nama_pasien`,`jenis_kelamin`,`tgl_lahir`,`alamat`,`no_telepon`,`pekerjaan`) values 
(18,1,100,'Vicky','0','2018-06-28','Laguboti',2147483647,'Satpam'),
(20,1,100,'Putri','1','2018-06-27','Lguboti',4657688,'Sytem analyst'),
(21,1,4456,'risma','1','2018-06-18','Tarutung',8223457,'dokter'),
(22,1,1233,'pitri','1','2018-06-19','Cengkareng',2147483647,'Kuli'),
(23,1,2147483647,'Dedi','0','2018-06-18','Laguboti',2147483647,'Satpam'),
(24,1,100,'widi','1','2018-06-28','Balige',2147483647,'Guru'),
(25,1,55678,'Sandro','0','2018-06-27','tambuanna',2147483647,'Dosen'),
(26,1,4456,'Sintya','1','2018-06-14','Bengkulu',2147483647,'Supir'),
(27,1,100,'David','1','2018-06-19','Porsea',2147483647,'Pedagang'),
(28,1,100,'Budo','0','2018-06-26','Balige',82345768,'Supir'),
(29,1,100,'vuvi','1','2018-06-25','Balige',84548,'kuli'),
(30,1,55678,'pupiy','1','2018-06-18','nuli',98765444,'polisi'),
(31,1,2147483647,'Yuni Raisa','1','2008-05-21','Jl. Sumatera Utara Medan',0,'Pelajar'),
(32,1,2147483647,'cristina','1','2018-06-07','sitoluama',92345567,'Dosen'),
(33,1,2147483647,'adrian','0','2018-06-27','Laguboti',964835243,'Supir'),
(34,1,1234,'cintya','1','2018-06-20','balige',9846365,'Guru'),
(35,1,12312312,'Kiran','1','1990-05-29','Cilangkap',21394242,'Wiraswasta'),
(36,1,12312312,'Karina','1','1980-05-29','Cilangkap',42422,'Wiraswasta'),
(37,12,45453345,'Lewi','1','1980-05-29','Cilangkap',42422,'Wiraswasta'),
(38,12,100,'Leonardo','1','1980-05-29','Laguboti',42422,'Wiraswasta');

/*Table structure for table `permintaan_obat` */

DROP TABLE IF EXISTS `permintaan_obat`;

CREATE TABLE `permintaan_obat` (
  `id_permintaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_apoteker` int(11) NOT NULL,
  `nama_obat` varchar(225) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(225) NOT NULL,
  PRIMARY KEY (`id_permintaan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `permintaan_obat` */

insert  into `permintaan_obat`(`id_permintaan`,`id_apoteker`,`nama_obat`,`jenis`,`jumlah`,`status`) values 
(1,1,'betadin','obat luka',30,'Accept'),
(2,1,'Betadin','obat luka',23,'Accept'),
(3,121212,'Paracetamol','Obat demam',30,'Accept');

/*Table structure for table `rekam_medik` */

DROP TABLE IF EXISTS `rekam_medik`;

CREATE TABLE `rekam_medik` (
  `id_rekam_medik` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_antrian` int(11) NOT NULL,
  `tgl_rekam_medik` datetime NOT NULL,
  `keluhan_pasien` varchar(225) NOT NULL,
  `diagnosa` varchar(225) NOT NULL,
  `jenis_penyakit_pasien` varchar(225) NOT NULL,
  `umur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rekam_medik`),
  KEY `const_rekam_pasien` (`id_pasien`),
  KEY `const_rekam_dokter` (`id_dokter`),
  KEY `const_rekam_antrian` (`id_antrian`),
  CONSTRAINT `const_rekam_antrian` FOREIGN KEY (`id_antrian`) REFERENCES `antrian_dan_keluhan` (`id_antrian`),
  CONSTRAINT `const_rekam_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  CONSTRAINT `const_rekam_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pendaftaran_pasien` (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `rekam_medik` */

insert  into `rekam_medik`(`id_rekam_medik`,`id_pasien`,`id_dokter`,`id_antrian`,`tgl_rekam_medik`,`keluhan_pasien`,`diagnosa`,`jenis_penyakit_pasien`,`umur`) values 
(2,18,11,1,'2009-01-06 00:00:00','kepala nyut-nyutan','stress','mental',21),
(3,18,11,1,'2009-01-06 00:00:00','stress','gila','sdf',NULL),
(4,18,11,1,'2009-01-06 00:00:00','jmg','m jkm ','hm',NULL),
(5,26,1,8,'2018-06-01 00:00:00','pegal-pegal','kanker','kanker stadium 3',21),
(6,27,1,10,'2018-06-02 00:00:00','sakit perut, pusing','kanker','perut',21),
(7,27,1,10,'2018-06-07 00:00:00','sakit perut, pusing','vertigo','kanker otak',NULL),
(8,29,1,11,'2018-06-25 00:00:00','dbcd','iyuy','batuk',NULL),
(9,31,1,12,'2018-06-07 00:00:00','Mual','Keracunan makanan','Sakit perut',NULL),
(10,31,1,12,'2018-06-07 00:00:00','Mual','Keracunan makanan','Sakit perut',21),
(11,32,1,13,'2018-06-18 00:00:00','demam','demam','malaria',NULL),
(12,34,1,15,'2018-06-10 00:00:00','Sakit kepala','vertigo','kanker',NULL),
(13,37,11,18,'2018-05-18 00:00:00','perut perih \r\nmata berkunang-kunang','lapar','kurang makan',NULL),
(14,18,11,1,'2009-01-06 00:00:00','Sakit kepala','lapar','kurang makan',21);

/*Table structure for table `resep_obat` */

DROP TABLE IF EXISTS `resep_obat`;

CREATE TABLE `resep_obat` (
  `id_resep` int(11) NOT NULL AUTO_INCREMENT,
  `id_rekam_medik` int(11) NOT NULL,
  `nama_obat` varchar(225) DEFAULT NULL,
  `dosis` varchar(225) DEFAULT NULL,
  `status` varchar(225) NOT NULL,
  PRIMARY KEY (`id_resep`),
  KEY `const_resep_rekam` (`id_rekam_medik`),
  CONSTRAINT `const_resep_rekam` FOREIGN KEY (`id_rekam_medik`) REFERENCES `rekam_medik` (`id_rekam_medik`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `resep_obat` */

insert  into `resep_obat`(`id_resep`,`id_rekam_medik`,`nama_obat`,`dosis`,`status`) values 
(3,5,'betadine','3 x sehari','Diterima'),
(4,6,'Oskin','3x sehari','Diterima'),
(5,8,'fgyfgyt','byhbu','Diterima'),
(6,9,'Promag','3 x 5','Diterima'),
(7,10,'entrostop','2 x 3','Diterima'),
(8,11,'oralit\r\n','30 mg  , 3 x 1 ','Diterima'),
(9,12,'ranitidin\r\nomoxisilin','3x 1 sehari, sebelum makan \r\n3 x1 sehari, setelah makan dihabiskan','request'),
(10,13,'Obat A\r\nObat B\r\nObat C','3x1 sehari, sesudah makan','request'),
(11,4,NULL,NULL,'request'),
(12,5,NULL,NULL,'request'),
(13,4,NULL,NULL,'request'),
(14,10,NULL,NULL,'request'),
(15,10,NULL,NULL,'request'),
(16,5,NULL,NULL,'request');

/*Table structure for table `resepsionis` */

DROP TABLE IF EXISTS `resepsionis`;

CREATE TABLE `resepsionis` (
  `id_resepsionis` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `id` int(11) NOT NULL,
  `status` varchar(225) NOT NULL,
  PRIMARY KEY (`id_resepsionis`),
  KEY `const_resepsionis_user` (`id`),
  CONSTRAINT `const_resepsionis_user` FOREIGN KEY (`id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `resepsionis` */

insert  into `resepsionis`(`id_resepsionis`,`nama`,`jenis_kelamin`,`alamat`,`id`,`status`) values 
(1,'awfawf','awfawf','awsfas',9,''),
(12,'Puji Napitupulu','perempuan','balige',12,'RESEPSIONIS');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values 
(5,'nom','kq4cDqxcPmjrQWl3ous4GqHBdFmEVrLd','$2y$13$9J0./JsGc.uXbz9Cx84Pq.Kp4P2iCz3Cke7hIy0w0Z6eb3wJm4r9K',NULL,'nom@gmail.com',10,1525957694,1525957694),
(6,'admin','CGBP7rP0KzGbZakEEhJQWQYcyPJAsDML','$2y$13$meUJc2XMcystzc6.lEa9EO0Uap0LwzTdLRvS6ln0dO5zIoqOd2ZIK',NULL,'admin@gmail.com',10,1526721673,1526721673),
(7,'Apoteker','FeLdlfOXoCfVd877Lk2BrTbm1IfQkwWV','$2y$13$3tApKThEBL8SVWYBOkhu0uA51z.pRO8MATmo0rI0VXoRgGxb20jKW',NULL,'apoteker@gmail.com',10,1526787162,1526787162),
(8,'dokter','EmqEDfjhKlj_BHtJtholnxo47qC8DSzE','$2y$13$5JEkuTn1dkQQcnFtGXT9C.FG5lpLOOMwoIhKpBGqynWfXU1IxOHKm',NULL,'dokter@gmail.com',10,1526787261,1526787261),
(9,'resepsionis','M99bJIwmo0YyRqCZBYi4AI35kVHv5grU','$2y$13$uxg4ajo9zJ1jCCYqxg6CxeLFaY.TstfzEgNYmaAdCkUyiqAujhx3K',NULL,'resepsionis@gmail.com',10,1526787303,1526787303),
(10,'kepalapuskesmas','T85aw9Zq6iZSXLrtgzDLa_5SEc-AUxUz','$2y$13$kSc4Plb8/FhS0d.r7pCbW.4NBkDMsEKo3lXa4QoRExGtlNaKIPU..',NULL,'kepalapuskesmas@gmail.com',10,1527398530,1527398530),
(11,'naomi nainggolan','H3IkAfqfir_8aKt7bceCNB4qDFk1OBmj','$2y$13$kHbAASsKm0Enw25OxCboqugJzSuKixzeeLENxSPt13pUCFM9RZo2C',NULL,'naomi@gmail.com',10,1528109266,1528109266),
(12,'puji napitupulu','5MC0wnOn3QTr9wvnhGg_leMhdu0ST9fs','$2y$13$gPQd446OhHH6/bqzeotMv.wYgCY3JcD1AeZyIKBQNdbJkuW1V0kRm',NULL,'puji@gmail.com',10,1528109298,1528109298),
(13,'astri','ldMchgXsiWAJmm865Kh5brNgFEJ3R5DW','$2y$13$S/CeLchYFBF1c.W6oA8iTeMtVK70oiYx2E9R2/wK26yagT.7QU82.',NULL,'astri@gmail.com',10,1528109329,1528109329),
(14,'hermina','NOEx_XLe7nS44NVdCAnVx14dQR-kDwl8','$2y$13$2vHZXyPrYPe6UKM2.U8E4OeiFLqcePMd73i34psT6O7wHSppy.Bdq',NULL,'hermina@gmail.com',10,1528109361,1528109361),
(15,'astripangaribuan','9BWoU5zMjsQ2yi6f_X7bfoj1FjF3FUeR','$2y$13$EGpnQ/mKQwrK6UQNLNt1Jel2JFEv3sMLVKJJtJo.05Np9OrO6ByyS',NULL,'astri1@gmail.com',10,1528207945,1528207945),
(16,'','','',NULL,'',10,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
