-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.30-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ukmapp.AppData
CREATE TABLE IF NOT EXISTS `AppData` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `AppsName` varchar(255) NOT NULL,
  `ClientID` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ukmapp.AppData: ~1 rows (approximately)
/*!40000 ALTER TABLE `AppData` DISABLE KEYS */;
INSERT INTO `AppData` (`id`, `AppsName`, `ClientID`, `created_at`, `updated_at`) VALUES
	(1, 'Android', '12345', '2019-01-13 17:37:41', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `AppData` ENABLE KEYS */;

-- Dumping structure for table ukmapp.Config
CREATE TABLE IF NOT EXISTS `Config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `Description` text NOT NULL,
  `Icon` varchar(255) NOT NULL,
  `Logo` varchar(255) NOT NULL,
  `MetaDeskripsi` text NOT NULL,
  `MetaKeyword` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ukmapp.Config: ~1 rows (approximately)
/*!40000 ALTER TABLE `Config` DISABLE KEYS */;
INSERT INTO `Config` (`id`, `Name`, `Email`, `Mobile`, `Phone`, `Address`, `Description`, `Icon`, `Logo`, `MetaDeskripsi`, `MetaKeyword`, `created_at`, `updated_at`) VALUES
	(1, 'UKM Center', 'noreply@ukmcenter.com', '081', '031', 'Surabaya', 'UKM JOSS', '', '', '', '', '2019-01-13 17:41:25', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `Config` ENABLE KEYS */;

-- Dumping structure for table ukmapp.Member
CREATE TABLE IF NOT EXISTS `Member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `Gender` enum('FEMALE','MALE','UNKNOW') NOT NULL DEFAULT 'UNKNOW',
  `DateOfBirth` date NOT NULL,
  `CodeActivation` text NOT NULL,
  `Status` enum('AKTIF','NON-AFTIF') NOT NULL DEFAULT 'NON-AFTIF',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Dumping data for table ukmapp.Member: ~3 rows (approximately)
/*!40000 ALTER TABLE `Member` DISABLE KEYS */;
INSERT INTO `Member` (`id`, `Name`, `Phone`, `Email`, `Username`, `Password`, `Gender`, `DateOfBirth`, `CodeActivation`, `Status`, `created_at`, `updated_at`) VALUES
	(1, 'ikko', '', 'ikko@ikko.com', '', 'aasd', 'UNKNOW', '0000-00-00', '', 'NON-AFTIF', '2019-01-12 18:02:34', '2019-01-12 18:02:34'),
	(26, 'Arika', '', 'arikaramadini96@gmail.com', '', 'aasd', 'UNKNOW', '0000-00-00', '389502baa2082435add64bd03cac46cc', 'NON-AFTIF', '2019-01-13 12:26:07', '2019-01-13 12:26:07'),
	(27, 'Ikko Satrio', '', 'ikkosatrio0@gmail.com', '', '888ef284d6935dc7ed277af7defa6cf6', 'UNKNOW', '0000-00-00', '8250b7743f486bde4636897fd3f5ccc5', 'AKTIF', '2019-01-13 18:51:06', '2019-01-13 12:51:06');
/*!40000 ALTER TABLE `Member` ENABLE KEYS */;

-- Dumping structure for table ukmapp.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ukmapp.migrations: ~1 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`version`) VALUES
	(5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table ukmapp.Slide
CREATE TABLE IF NOT EXISTS `Slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ukmapp.Slide: ~0 rows (approximately)
/*!40000 ALTER TABLE `Slide` DISABLE KEYS */;
INSERT INTO `Slide` (`id`, `Title`, `Description`, `Image`, `created_at`, `updated_at`) VALUES
	(1, 'SLide1', '', 'BACK-HOME.png', '2019-01-13 22:23:13', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `Slide` ENABLE KEYS */;

-- Dumping structure for table ukmapp.Token
CREATE TABLE IF NOT EXISTS `Token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `AccessToken` varchar(255) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ukmapp.Token: ~0 rows (approximately)
/*!40000 ALTER TABLE `Token` DISABLE KEYS */;
/*!40000 ALTER TABLE `Token` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
