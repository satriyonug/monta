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

/*Table structure for table `tb_dosen` */

DROP TABLE IF EXISTS `tb_dosen`;

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_dosen` */

insert  into `tb_dosen`(`id_dosen`,`nip`,`nama_dosen`) values 
(1,'198410162008121002','Radityo Anggoro S.Kom, M.Sc'),
(2,'198608232015041004','Abdul Munif, S.Kom., M.Sc.'),
(3,'198701032014041001','Rizky Januar Akbar, S.Kom., M.Eng.'),
(4,'196505181992031003','Dr.tech. Ir. R.V.HARI GINARDI, M.Sc.'),
(5,'1994201912088','Kelly Rossa Sungkono, S.Pd., M,Pd.');

/*Table structure for table `tb_judul` */

DROP TABLE IF EXISTS `tb_judul`;

CREATE TABLE `tb_judul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mhs` varchar(100) NOT NULL,
  `nrp_mhs` varchar(14) NOT NULL,
  `rmk` varchar(4) NOT NULL,
  `judul_ta` text NOT NULL,
  `abstrak` text NOT NULL,
  `pembimbing_ta` varchar(100) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `catatan` text,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_judul` */

insert  into `tb_judul`(`id`,`nama_mhs`,`nrp_mhs`,`rmk`,`judul_ta`,`abstrak`,`pembimbing_ta`,`nip`,`catatan`,`status`,`created_at`,`updated_at`) values 
(2,'Nabilah Zaki Lismia','05111540000020','IGS','Simulasi Berbicara dalam Bahasa Asing Berbasis Realitas Virtual Menggunakan Speech Recognition, Chatbot, dan Teknologi Google Daydream','Simulasi Berbicara dalam Bahasa Asing Berbasis Realitas Virtual Menggunakan Speech Recognition, Chatbot, dan Teknologi Google Daydream','Abdul Munif, S.Kom., M.Sc.','198608232015041004',NULL,0,'2019-03-13 03:55:34','2019-03-13 03:55:34'),
(3,'Satriyo Nugroho','05111540000034','MI','Virtual Assistant Chatbot pada aplikasi Gifood.id Menggunakan Speech Recognition dengan Algoritma Natural Language Processing','Virtual Assistant Chatbot pada aplikasi Gifood.id Menggunakan Speech Recognition dengan Algoritma Natural Language Processing dan Cousin Similarity','Dr.tech. Ir. R.V.HARI GINARDI, M.Sc.','196505181992031003','Ganti Judul',1,'2019-03-13 03:57:55','2019-03-13 04:10:49');

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
  `nip1` varchar(30) DEFAULT NULL,
  `pembimbing2_ta` varchar(100) DEFAULT NULL,
  `nip2` varchar(30) DEFAULT NULL,
  `proposal_ta` blob NOT NULL,
  `referensi_ta` blob,
  `revisi` text,
  `status` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_proposal`),
  UNIQUE KEY `prefix` (`prefix`,`id_proposal`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `tb_proposal` */

insert  into `tb_proposal`(`prefix`,`id_proposal`,`nama_mhs`,`nrp`,`rmk`,`judul_ta`,`abstrak_ta`,`kata_kunci_ta`,`pembimbing1_ta`,`nip1`,`pembimbing2_ta`,`nip2`,`proposal_ta`,`referensi_ta`,`revisi`,`status`,`created_at`,`updated_at`) values 
('TA',17,'Alfindio Muhammad Abdallah','05111540000164','MI','Sentiment Analysis pada Tweet berbahasa Indonesia menggunakan fastText dengan metode klasifikasi Naïve Bayes, Decision Tree, dan Random Forest','Sentiment Analysis pada Tweet berbahasa Indonesia menggunakan fastText dengan metode klasifikasi Naïve Bayes, Decision Tree, dan Random Forest\r\n','Naive Bayes','Abdul Munif, S.Kom., M.Sc.','198608232015041004','',NULL,'Proposal TA - Satriyo Nugroho - 05111540000034.pdf','',NULL,'Mendaftar','2019-03-08 16:00:42','2019-03-08 21:15:18'),
('TA',29,'Alvin Mudhoffar','05111540000062','RPL','Implementasi Otentikasi Single-Factor dan Multi-Factor Berbasis Protokol WebAuthn di Aplikasi myITS Single Sign-On','Implementasi Otentikasi Single-Factor dan Multi-Factor Berbasis Protokol WebAuthn di Aplikasi myITS Single Sign-On','SSO','Rizky Januar Akbar, S.Kom., M.Eng.','198701032014041001','Abdul Munif, S.Kom., M.Sc.','198608232015041004','Proposal_TA_-_Satriyo_Nugroho_-_05111540000034.pdf',NULL,NULL,'Mendaftar','2019-03-09 15:32:19','2019-03-09 15:34:09'),
('TA',33,'Satriyo Nugroho','05111540000034','MI','Virtual Assistant Chatbot pada aplikasi Gifood.id Menggunakan Speech Recognition dengan Algoritma Natural Language Processing','Virtual Assistant Chatbot pada aplikasi Gifood.id Menggunakan Speech Recognition dengan Algoritma Natural Language Processing dan Cousin Similarity          ','NLP','Dr.tech. Ir. R.V.HARI GINARDI, M.Sc.',NULL,'Kelly Rossa Sungkono, S.Pd., M,Pd.','1994201912088','Proposal_TA_-_Satriyo_Nugroho_-_05111540000034.pdf',NULL,NULL,'Menunggu Sidang Proposal','2019-03-13 04:12:32','2019-03-13 04:40:35');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` varchar(30) NOT NULL,
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
('05111540000040','Abyan Dafa','Informatika','d8b895fbc9eef2864658eb5739f77b75','Mahasiswa'),
('05111540000062','Alvin Mudhoffar','Informatika','accdb1983f7f9eb3e72f5bec7b84db7d','Mahasiswa'),
('05111540000164','Alfindio Muhammad Abdallah','Informatika','53f24a129d986e373e52dfcbaaf0c016','Mahasiswa'),
('196505181992031003','Dr.tech. Ir. R.V.HARI GINARDI, M.Sc.','Informatika','6bc3ace09cd36d99f001cf746fbfdb7c','Dosen'),
('198410162008121002','Radityo Anggoro S.Kom, M.Sc','Informatika','2ced6917907aa67010a5dd145cac9ecd','Kaprodi'),
('198608232015041004','Abdul Munif, S.Kom., M.Sc.','Informatika','c6913604d673829aeffdf10b80a46b70','Dosen'),
('198701032014041001','Rizky Januar Akbar, S.Kom., M.Eng.','Informatika','7bf9de6972cd7f6fc21729a690e541b1','Dosen'),
('1994201912088','Kelly Rossa Sungkono, S.Pd., M,Pd.','Informatika','8d6cf99eee40078d14c74f7689cf34e2','Dosen'),
('tim_rmk','Tim RMK Informatika','Informatika','e2fdf27972f69f4f774dbc6fd37f4e01','Rmk');

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
