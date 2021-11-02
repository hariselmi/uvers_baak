-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: simak_uvers
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agama`
--

DROP TABLE IF EXISTS `agama`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agama` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agama`
--

LOCK TABLES `agama` WRITE;
/*!40000 ALTER TABLE `agama` DISABLE KEYS */;
INSERT INTO `agama` VALUES (1,'Islam'),(2,'Kristen'),(3,'Katolik'),(4,'Hindu'),(5,'Budha'),(6,'Konghucu');
/*!40000 ALTER TABLE `agama` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aktivitas`
--

DROP TABLE IF EXISTS `aktivitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aktivitas` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `peran` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `penyelenggara` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `kategori` varchar(191) COLLATE utf8_unicode_ci DEFAULT '0',
  `jenis` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jml_peserta` int DEFAULT NULL,
  `capaian` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sertifikat` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `laman_penyelenggara` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto_penghargaan` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `surat_lomba` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `jenis_aktivitas` tinyint DEFAULT NULL,
  `dlt` tinyint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `golongan_skpi_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aktivitas`
--

LOCK TABLES `aktivitas` WRITE;
/*!40000 ALTER TABLE `aktivitas` DISABLE KEYS */;
INSERT INTO `aktivitas` VALUES (21,'test kegiatan','test peran','test penyelenggara','2021-10-01','2021-10-31','5','2',15,'4','1715011262110604.jpg','test.com','1715011262111998.jpg','1715011262112947.jpg','test',1,1,'2021-10-30 12:12:46','2021-10-30 12:12:46',11,2,2),(22,'test kegiatan','testt','testttt 1','2021-10-30','2021-10-30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,1,'2021-10-30 10:52:18','2021-10-30 10:52:18',11,2,3),(23,'lomba coding','juara I','L2DIKTI','2021-10-01','2021-10-31','4',NULL,200,'2','1715023591734079.jpg',NULL,'1715023591734659.jpg','1715023591735063.jpg','-',1,0,'2021-10-30 12:41:38','2021-10-30 12:41:38',11,2,1);
/*!40000 ALTER TABLE `aktivitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `category` int NOT NULL,
  `dlt` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'2021-10-01','test','<p>test</p>','1715009954567649_1.jpg',1,0,'2021-10-30 01:29:06','2021-10-30 01:29:06'),(2,'2021-10-30','test','<p>test</p>','1715010287682447_2.jpg',2,0,'2021-10-30 01:34:23','2021-10-30 01:34:23'),(3,'2021-10-30','test','<p>test</p>','1715010700555020_3.jpg',3,0,'2021-10-30 01:40:57','2021-10-30 01:40:57'),(4,'2021-10-31','test','<p>test</p>','1715010715355784_5.jpg',4,0,'2021-10-30 01:41:11','2021-10-30 01:41:11');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beasiswa`
--

DROP TABLE IF EXISTS `beasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beasiswa` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_pendaftaran` tinyint DEFAULT '1',
  `tgl_mulai_periode` date DEFAULT NULL,
  `tgl_sampai_periode` date DEFAULT NULL,
  `dlt` tinyint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beasiswa`
--

LOCK TABLES `beasiswa` WRITE;
/*!40000 ALTER TABLE `beasiswa` DISABLE KEYS */;
INSERT INTO `beasiswa` VALUES (2,'11','22',1,'2021-10-01','2021-10-31',0,'2021-10-30 05:58:07','2021-10-30 05:58:07');
/*!40000 ALTER TABLE `beasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capaian_prestasi`
--

DROP TABLE IF EXISTS `capaian_prestasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `capaian_prestasi` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capaian_prestasi`
--

LOCK TABLES `capaian_prestasi` WRITE;
/*!40000 ALTER TABLE `capaian_prestasi` DISABLE KEYS */;
INSERT INTO `capaian_prestasi` VALUES (1,'Juara Umum'),(2,'Juara I'),(3,'Juara II'),(4,'Juara III'),(5,'Juara Harapan'),(6,'Partisipasi/delgasi/peserta kejuruan'),(7,'Penyelenggara Kegiatan Kejuaraan');
/*!40000 ALTER TABLE `capaian_prestasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `golongan_skpi`
--

DROP TABLE IF EXISTS `golongan_skpi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `golongan_skpi` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `golongan_skpi`
--

LOCK TABLES `golongan_skpi` WRITE;
/*!40000 ALTER TABLE `golongan_skpi` DISABLE KEYS */;
INSERT INTO `golongan_skpi` VALUES (1,'A. Prestasi, Penghargaan, Sertifikat Komptensi'),(2,'B. Pelatih, Seminar, Workshop'),(3,'C. Magang, Pengalaman Organisasi, Kegiatan Sosial');
/*!40000 ALTER TABLE `golongan_skpi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `identities`
--

DROP TABLE IF EXISTS `identities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `identities` (
  `id` int unsigned NOT NULL,
  `nama` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identities`
--

LOCK TABLES `identities` WRITE;
/*!40000 ALTER TABLE `identities` DISABLE KEYS */;
INSERT INTO `identities` VALUES (1,'Sitem Layanan Kemahasiswaan - Universitas Universal','uversbatam','6285272161218','uvers_batam','info@uvers.ac.id','+62778473399','2021-07-17 11:26:07','2021-07-18 12:50:19');
/*!40000 ALTER TABLE `identities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_kelamin`
--

DROP TABLE IF EXISTS `jenis_kelamin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_kelamin` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_kelamin`
--

LOCK TABLES `jenis_kelamin` WRITE;
/*!40000 ALTER TABLE `jenis_kelamin` DISABLE KEYS */;
INSERT INTO `jenis_kelamin` VALUES (1,'Laki-laki'),(2,'Perempuan');
/*!40000 ALTER TABLE `jenis_kelamin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_kepesertaan`
--

DROP TABLE IF EXISTS `jenis_kepesertaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_kepesertaan` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_kepesertaan`
--

LOCK TABLES `jenis_kepesertaan` WRITE;
/*!40000 ALTER TABLE `jenis_kepesertaan` DISABLE KEYS */;
INSERT INTO `jenis_kepesertaan` VALUES (1,'Individu'),(2,'Kelompok');
/*!40000 ALTER TABLE `jenis_kepesertaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_kegiatan`
--

DROP TABLE IF EXISTS `kategori_kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori_kegiatan` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_kegiatan`
--

LOCK TABLES `kategori_kegiatan` WRITE;
/*!40000 ALTER TABLE `kategori_kegiatan` DISABLE KEYS */;
INSERT INTO `kategori_kegiatan` VALUES (1,'Sekolah'),(2,'Kecamatan'),(3,'Kab/Kota'),(4,'Provinsi'),(5,'Wilayah'),(6,'Nasional'),(7,'Internasional');
/*!40000 ALTER TABLE `kategori_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_pelaporan`
--

DROP TABLE IF EXISTS `kategori_pelaporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori_pelaporan` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_pelaporan`
--

LOCK TABLES `kategori_pelaporan` WRITE;
/*!40000 ALTER TABLE `kategori_pelaporan` DISABLE KEYS */;
INSERT INTO `kategori_pelaporan` VALUES (1,'Kegiatan Lomba'),(2,'Kegiatan Non Lomba'),(3,'Sertifikat Kompetensi'),(4,'Keikutsertaan Pelatihan'),(5,'Aktivitas Lain-lain');
/*!40000 ALTER TABLE `kategori_pelaporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mahasiswa` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_lahir` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `agama` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `telp` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `prodi` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dlt` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES (7,'123','Putra','Batam','2021-10-30','1','1','Batam','085858585858','1',0,'2021-10-30 00:08:03','2021-10-30 00:08:03','ilham05saputra@gmail.com'),(8,'112233','Luffty','Batam','2021-10-30','6','1','Batam Kota','082285101001','9',0,'2021-10-30 01:46:22','2021-10-30 01:46:22','luffty@gmail.com');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2015_05_30_015027_create_items_table',1),(4,'2017_08_24_000000_create_settings_table',1),(5,'2019_02_08_131317_create_permission_tables',1),(6,'2021_06_23_163852_create_members_table',1),(7,'2021_06_23_185950_create_schedules_table',1),(8,'2021_06_25_131207_create_documents_table',1),(9,'2021_06_25_145512_create_document_details_table',1),(10,'2021_06_25_185523_create_check_lists_table',1),(11,'2021_06_25_185607_create_check_list_details_table',1),(12,'2021_06_25_185647_create_findings_table',1),(13,'2021_06_25_185721_create_finding_details_table',1),(14,'2021_06_27_111019_create_reports_table',1),(15,'2021_07_02_134708_create_upload_documents_table',1),(16,'2021_07_02_140049_create_upload_document_details_table',1),(17,'2021_07_03_103929_create_standards_table',1),(18,'2021_07_03_104003_create_standard_details_table',1),(19,'2021_07_04_195446_create_articles_table',1),(20,'2021_07_07_135242_create_divisions_table',1),(21,'2021_07_12_215344_create_standard_documents_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` int unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` int unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\User',1),(2,'App\\User',2),(3,'App\\User',8),(3,'App\\User',10),(3,'App\\User',11),(4,'App\\User',12);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` int unsigned NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Informasi Kemahasiswaan','<p><strong>INFORMASI KEMAHASISWAAN</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',NULL,'2021-10-26 07:39:59'),(2,'Kegiatan Kemahasiswaan','<p><strong>KEGIATAN KEMAHASISWAAN</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',NULL,'2021-10-26 07:40:12'),(3,'Informasi Beasiswa','<p><strong>INFORMASI BEASISWA</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',NULL,'2021-10-26 07:40:22'),(4,'Dashboard Landing','<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p style=\"text-align:justify\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',NULL,'2021-10-26 07:39:08');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendaftaran_beasiswa`
--

DROP TABLE IF EXISTS `pendaftaran_beasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pendaftaran_beasiswa` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `beasiswa_id` int DEFAULT NULL,
  `mahasiswa_id` int DEFAULT NULL,
  `no_identitas` varchar(50) COLLATE utf8_unicode_ci DEFAULT '1',
  `no_rekening` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pemilik_rekening` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dlt` tinyint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ktm` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transkip_nilai` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendaftaran_beasiswa`
--

LOCK TABLES `pendaftaran_beasiswa` WRITE;
/*!40000 ALTER TABLE `pendaftaran_beasiswa` DISABLE KEYS */;
INSERT INTO `pendaftaran_beasiswa` VALUES (5,2,8,'1','2','3',0,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pendaftaran_beasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Menu Palaporan Aktivitas Mahasiswa','pelaporan.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(2,'Menu Beasiswa','beasiswa.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(3,'List Data Master','datamaster.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(4,'Konfigurasi Website','settingweb.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(5,'List Lomba','lomba.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(6,'Create Lomba','lomba.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(7,'Store Lomba','lomba.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(8,'View Lomba','lomba.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(9,'Delete Lomba','lomba.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(10,'Update Lomba','lomba.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(11,'Edit Lomba','lomba.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(12,'List Non Lomba','nonlomba.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(13,'Create Non Lomba','nonlomba.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(14,'Store Non Lomba','nonlomba.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(15,'View Non Lomba','nonlomba.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(16,'Delete Non Lomba','nonlomba.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(17,'Update Non Lomba','nonlomba.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(18,'Edit Non Lomba','nonlomba.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(19,'List Sertifikat Kompetensi','sertifikat.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(20,'Create Sertifikat Kompetensi','sertifikat.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(21,'Store Sertifikat Kompetensi','sertifikat.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(22,'View Sertifikat Kompetensi','sertifikat.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(23,'Delete Sertifikat Kompetensi','sertifikat.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(24,'Update Sertifikat Kompetensi','sertifikat.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(25,'Edit Sertifikat Kompetensi','sertifikat.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(26,'Print Sertifikat Kompetensi','sertifikat.print','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(27,'List Keikutsertaan Pelatihan','pelatihan.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(28,'Create Keikutsertaan Pelatihan','pelatihan.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(29,'Store Keikutsertaan Pelatihan','pelatihan.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(30,'View Keikutsertaan Pelatihan','pelatihan.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(31,'Delete Keikutsertaan Pelatihan','pelatihan.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(32,'Update Keikutsertaan Pelatihan','pelatihan.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(33,'Edit Keikutsertaan Pelatihan','pelatihan.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(34,'Print Keikutsertaan Pelatihan','pelatihan.print','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(35,'List Magang','magang.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(36,'Create Magang','magang.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(37,'Store Magang','magang.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(38,'View Magang','magang.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(39,'Delete Magang','magang.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(40,'Update Magang','magang.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(41,'Edit Magang','magang.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(42,'Print Magang','magang.print','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(43,'List Daftar Beasiswa','pendaftaran.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(44,'Create Daftar Beasiswa','pendaftaran.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(45,'Store Daftar Beasiswa','pendaftaran.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(46,'View Daftar Beasiswa','pendaftaran.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(47,'Delete Daftar Beasiswa','pendaftaran.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(48,'Update Daftar Beasiswa','pendaftaran.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(49,'Edit Daftar Beasiswa','pendaftaran.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(50,'Print Daftar Beasiswa','pendaftaran.print','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(58,'List Pemrosesan Status ','statuspemrosesan.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(59,'Create Pemrosesan Status ','statuspemrosesan.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(60,'Store Pemrosesan Status ','statuspemrosesan.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(61,'View Pemrosesan Status ','statuspemrosesan.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(62,'Delete Pemrosesan Status ','statuspemrosesan.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(63,'Update Pemrosesan Status ','statuspemrosesan.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(64,'Edit Pemrosesan Status ','statuspemrosesan.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(65,'Print Pemrosesan Status ','statuspemrosesan.print','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(66,'List ekspor','ekspor.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(67,'Create ekspor','ekspor.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(68,'Store ekspor','ekspor.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(69,'View ekspor','ekspor.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(70,'Delete ekspor','ekspor.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(71,'Update ekspor','ekspor.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(72,'Edit ekspor','ekspor.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(73,'List Mahasiswa','mahasiswa.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(74,'Create Mahasiswa','mahasiswa.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(75,'Store Mahasiswa','mahasiswa.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(76,'View Mahasiswa','mahasiswa.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(77,'Delete Mahasiswa','mahasiswa.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(78,'Update Mahasiswa','mahasiswa.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(79,'Edit Mahasiswa','mahasiswa.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(80,'List Employees','employees.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(81,'Create Employees','employees.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(82,'Store Employees','employees.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(83,'View Employees','employees.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(84,'Delete Employees','employees.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(85,'Update Employees','employees.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(86,'Edit Employees','employees.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(87,'List Permissions','permissions.list','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(88,'Assaign Roles','assaign.roles','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(89,'Create Roles','employeerole.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(90,'Create Permission Role','permissionrole.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(91,'Create Permissions','permissions.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(92,'List Sliders','sliders.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(93,'Create Sliders','sliders.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(94,'Store Sliders','sliders.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(95,'View Sliders','sliders.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(96,'Delete Sliders','sliders.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(97,'Update Sliders','sliders.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(98,'Edit Sliders','sliders.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(99,'List Pages','pages.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(100,'Create Pages','pages.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(101,'Store Pages','pages.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(102,'View Pages','pages.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(103,'Delete Pages','pages.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(104,'Update Pages','pages.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(105,'Edit Pages','pages.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(106,'List Identitas','identity.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(107,'Create Identitas','identity.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(108,'Store Identitas','identity.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(109,'View Identitas','identity.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(110,'Delete Identitas','identity.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(111,'Update Identitas','identity.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(112,'Edit Identitas','identity.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(113,'List SKPI','skpi.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(114,'Create SKPI','skpi.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(115,'Store SKPI','skpi.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(116,'View SKPI','skpi.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(117,'Delete SKPI','skpi.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(118,'Update SKPI','skpi.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(119,'Edit SKPI','skpi.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(149,'List Artikel','articles.index','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(150,'Create Artikel','articles.create','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(151,'Store Artikel','articles.store','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(152,'View Artikel','articles.show','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(153,'Delete Artikel','articles.destroy','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(154,'Update Artikel','articles.update','web','2021-07-13 05:58:09','2021-07-13 05:58:09'),(155,'Edit Artikel','articles.edit','web','2021-07-13 05:58:09','2021-07-13 05:58:09');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodi`
--

DROP TABLE IF EXISTS `prodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodi` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodi`
--

LOCK TABLES `prodi` WRITE;
/*!40000 ALTER TABLE `prodi` DISABLE KEYS */;
INSERT INTO `prodi` VALUES (1,'Akuntansi'),(2,'Manajemen'),(3,'Sistem Informasi'),(4,'Teknik Informatika'),(5,'Teknik Perangkat Lunak'),(6,'Pendidikan Bahasa Mandarin'),(7,'Seni Musik'),(8,'Seni Tari'),(9,'Teknik Industri'),(10,'Teknik Lingkungan');
/*!40000 ALTER TABLE `prodi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reports` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `schedule_id` int NOT NULL,
  `dlt` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
INSERT INTO `reports` VALUES (1,1,0,'2021-07-29 11:56:24','2021-07-29 11:56:24');
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` int unsigned NOT NULL,
  `role_id` int unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,1),(92,1),(93,1),(94,1),(95,1),(96,1),(97,1),(98,1),(99,1),(100,1),(101,1),(102,1),(103,1),(104,1),(105,1),(106,1),(107,1),(108,1),(109,1),(110,1),(111,1),(112,1),(113,1),(114,1),(115,1),(116,1),(117,1),(118,1),(119,1),(149,1),(150,1),(151,1),(152,1),(153,1),(154,1),(155,1),(85,2),(86,2),(113,2),(114,2),(115,2),(116,2),(117,2),(118,2),(119,2),(1,3),(2,3),(5,3),(6,3),(7,3),(8,3),(9,3),(10,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(18,3),(19,3),(20,3),(21,3),(22,3),(23,3),(24,3),(25,3),(26,3),(27,3),(28,3),(29,3),(30,3),(31,3),(32,3),(33,3),(34,3),(35,3),(36,3),(37,3),(38,3),(39,3),(40,3),(41,3),(42,3),(43,3),(44,3),(45,3),(46,3),(47,3),(48,3),(49,3),(50,3),(58,3),(59,3),(60,3),(61,3),(62,3),(63,3),(64,3),(65,3),(85,3),(86,3),(113,4),(114,4),(115,4),(116,4),(117,4),(118,4),(119,4);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2021-09-05 14:43:56','2021-09-05 14:43:56'),(2,'admin-skpi','web','2021-10-01 14:52:45','2021-10-01 14:52:45'),(3,'mahasiswa','web','2021-10-01 14:54:15','2021-10-01 14:54:15'),(4,'staff-skpi','web','2021-10-30 02:33:10','2021-10-30 02:33:10'),(5,'admin-kemahasiswaan','web','2021-10-30 06:12:43','2021-10-30 06:12:43');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` int unsigned NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `thumbnail` text,
  `status` enum('0','1') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dlt` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'11','1713522201212904_mdlbquqxrjqtoefcms00qkuxltkyq0ytrki2nznemefgmuvc.jpeg','1',NULL,'2021-10-14 01:37:57','0');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Pending'),(2,'Disetujui'),(3,'Ditolak');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_pendaftaran`
--

DROP TABLE IF EXISTS `status_pendaftaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_pendaftaran` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_pendaftaran`
--

LOCK TABLES `status_pendaftaran` WRITE;
/*!40000 ALTER TABLE `status_pendaftaran` DISABLE KEYS */;
INSERT INTO `status_pendaftaran` VALUES (1,'Masih Dibuka'),(2,'Sudah Ditutup');
/*!40000 ALTER TABLE `status_pendaftaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mahasiswa_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@uvers.ac.id','$2y$10$VCT4mgRKi3yz8obCCZVTC.0XXuITf9jXwsIH.0RkWzSfKVpSktU/K','admin',NULL,'2021-09-05 14:43:44','2021-09-05 14:43:44',NULL),(2,'admin skpi','adminskpi@uvers.com','$2y$10$m6e7yguqxEH5OhdI2e5JOeOqlJLIqfKXWBuUHZ3wlH6NSCzkdxrWy','admin-skpi',NULL,'2021-10-13 14:25:24','2021-10-13 14:25:24',NULL),(10,'Putra','123','$2y$10$m6e7yguqxEH5OhdI2e5JOeOqlJLIqfKXWBuUHZ3wlH6NSCzkdxrWy','mahasiswa',NULL,'2021-10-30 00:08:03','2021-10-30 00:11:06',7),(11,'Luffty','112233','$2a$12$6irrCLyAPmMkPmMVmm4Fce6PlN/8XGNTt2OHu9lHxu6SQefpjALGq','mahasiswa',NULL,'2021-10-30 01:46:22','2021-10-30 01:46:22',8),(12,'staff skpi','staffskpi@uvers.ac.id','$2y$10$BrE5z1oEp/wsqVOEtIPdvebpvx.ucUTKpEp8WJPdwEkEewCY5OCGG','staff-skpi',NULL,'2021-10-30 02:33:54','2021-10-30 02:33:54',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-02  9:58:09
