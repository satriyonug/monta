/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.37-MariaDB : Database - monta
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`monta` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `monta`;

/*Table structure for table `tb_proposal` */

DROP TABLE IF EXISTS `tb_proposal`;

CREATE TABLE `tb_proposal` (
  `prefix` varchar(2) NOT NULL DEFAULT 'TA',
  `id_proposal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_mhs` varchar(100) NOT NULL,
  `nrp` varchar(14) NOT NULL,
  `rmk` varchar(5) NOT NULL,
  `judul_ta` text NOT NULL,
  `abstrak_ta` text NOT NULL,
  `kata_kunci_ta` text NOT NULL,
  `pembimbing1_ta` varchar(100) NOT NULL,
  `pembimbing2_ta` varchar(100) NOT NULL,
  `proposal_ta` blob NOT NULL,
  `referensi_ta` blob,
  `status` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_proposal`),
  UNIQUE KEY `prefix` (`prefix`,`id_proposal`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `tb_proposal` */

insert  into `tb_proposal`(`prefix`,`id_proposal`,`nama_mhs`,`nrp`,`rmk`,`judul_ta`,`abstrak_ta`,`kata_kunci_ta`,`pembimbing1_ta`,`pembimbing2_ta`,`proposal_ta`,`referensi_ta`,`status`,`created_at`,`updated_at`) values 
('TA',6,'Satriyo Nugroho','05111540000034','IGS','Virtual Assistant Chatbot pada aplikasi Gifood.id Menggunakan Speech Recognition dengan Algoritma Natural Language Processing','Virtual Assistant Chatbot pada aplikasi Gifood.id Menggunakan Speech Recognition dengan Algoritma Natural Language Processing','NLP, Chatbot, Voice Recognition','Hari Ginardi','Kelly Rossa','Proposal TA - Satriyo Nugroho - 05111540000034.pdf','cover_proposalTA_05111540000034.pdf','Mendaftar','2019-03-02 22:25:12','2019-03-02 22:35:34'),
('TA',7,'Abyan Dafa','05111540000040','RPL',' Integrasi dan Rancang Bangun Kembali Aplikasi Push Notification Terpusat dengan MyITS SSO','\r\nIntegrasi dan Rancang Bangun Kembali Aplikasi Push Notification Terpusat dengan MyITS SSO','SSO','Hari Ginardi','Kelly Rossa','Proposal TA - Satriyo Nugroho - 05111540000034.pdf','cover_proposalTA_05111540000034.pdf','Mendaftar','2019-03-02 22:41:57','2019-03-02 22:41:57');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` varchar(14) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`nama`,`departemen`,`password`,`role`) values 
('05111540000020','Nabilah Zaki Lismia','Informatika','9397720251b99acaca13a1e51685e983','Mahasiswa'),
('05111540000034','Satriyo Nugroho','Informatika','0d6efea15b90466e303899093a483e2d','Mahasiswa'),
('05111540000040','Abyan Dafa','Informatika','d8b895fbc9eef2864658eb5739f77b75','Mahasiswa');

/*Table structure for table `tb_web` */

DROP TABLE IF EXISTS `tb_web`;

CREATE TABLE `tb_web` (
  `id_web` int(11) NOT NULL AUTO_INCREMENT,
  `nama_web` varchar(35) NOT NULL,
  `domain_web` varchar(10) NOT NULL,
  `slogan_web` text NOT NULL,
  `alamat_web` text NOT NULL,
  `telp_web` varchar(16) NOT NULL,
  `fax_web` varchar(16) NOT NULL,
  `email_web` varchar(50) NOT NULL,
  `author_web` varchar(50) NOT NULL,
  `deskripsi_web` text NOT NULL,
  `keyword_web` text NOT NULL,
  `tahun_web` year(4) NOT NULL,
  PRIMARY KEY (`id_web`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_web` */

insert  into `tb_web`(`id_web`,`nama_web`,`domain_web`,`slogan_web`,`alamat_web`,`telp_web`,`fax_web`,`email_web`,`author_web`,`deskripsi_web`,`keyword_web`,`tahun_web`) values 
(1,'MONTA ITS','.ID','Aplikasi Web Pengajuan Tugas Akhir / Skripsi','Ds. Maju Jaya RT 09 RW 02, Kecamatan Maju Jaya, Kabupaten Pati, Provinsi Jawa Tengah','081215409236','---','rumitkode@gmail.com','Kode Rumit','PPDB RUMIT adalah Aplikasi Pendaftaran Peserta Didik Baru Berbasis Web','Aplikasi PPDB, Web PPDB Online Free',2019);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
