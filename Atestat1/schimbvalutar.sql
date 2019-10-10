-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for schimbvalutar
CREATE DATABASE IF NOT EXISTS `schimbvalutar` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `schimbvalutar`;


-- Dumping structure for table schimbvalutar.client
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL,
  `Nume` text NOT NULL,
  `CNP` char(50) NOT NULL,
  `Data` date NOT NULL,
  `Tip` text NOT NULL,
  `id_valuta` text NOT NULL,
  `Suma` float NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table schimbvalutar.client: ~9 rows (approximately)
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT IGNORE INTO `client` (`id_client`, `Nume`, `CNP`, `Data`, `Tip`, `id_valuta`, `Suma`) VALUES
	(1, 'Andrei Vasilcin', '9438127443215', '2017-05-03', ' Vanzare', 'EUR', 100),
	(2, 'Marin Ionescu', '5423622435', '2017-04-03', 'Cumparare', 'EUR', 50),
	(3, 'Malone Malone', '22113344422', '2017-04-04', ' Vanzare', 'EUR', 350),
	(4, 'Alin Marin', '54316457', '2017-05-03', 'Cumparare', 'EUR', 200),
	(5, 'Mircea Georgescu', '6522456323', '2017-05-03', 'Cumparare', 'USD', 200),
	(6, 'Andrei Vasilcin', '65244231', '2017-04-14', ' Vanzare', 'GBP', 30),
	(8, 'Sorin Ionut', '52324231423', '2017-05-03', ' Vanzare', 'HUF', 50000),
	(9, 'Andrei Vasilcin', '5432624564564', '2017-05-03', 'Cumparare', 'BGN', 1000),
	(10, 'Andreescu Sergiu', '54654765765', '2017-05-03', ' Vanzare', 'GBP', 350);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;


-- Dumping structure for table schimbvalutar.curs
CREATE TABLE IF NOT EXISTS `curs` (
  `id_curs` int(11) NOT NULL,
  `id_valuta` int(11) NOT NULL,
  `Denumire` text NOT NULL,
  `Data` date NOT NULL,
  `Vanzare` float NOT NULL,
  `Cumparare` float NOT NULL,
  PRIMARY KEY (`id_curs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table schimbvalutar.curs: ~6 rows (approximately)
/*!40000 ALTER TABLE `curs` DISABLE KEYS */;
INSERT IGNORE INTO `curs` (`id_curs`, `id_valuta`, `Denumire`, `Data`, `Vanzare`, `Cumparare`) VALUES
	(1, 1, 'EUR', '2017-04-29', 4.563, 4.513),
	(2, 2, 'USD', '2017-04-25', 4.211, 4.201),
	(3, 3, 'GBP', '2017-04-29', 5.428, 5.328),
	(4, 4, 'BGN', '2017-04-25', 2.321, 2.294),
	(5, 5, 'HUF', '2017-04-25', 0.034, 0.0125);
/*!40000 ALTER TABLE `curs` ENABLE KEYS */;


-- Dumping structure for table schimbvalutar.tranzactie
CREATE TABLE IF NOT EXISTS `tranzactie` (
  `id_tranzactie` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `Tip` text NOT NULL,
  `Data` date NOT NULL,
  `id_valuta` text NOT NULL,
  `Suma` float NOT NULL,
  PRIMARY KEY (`id_tranzactie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table schimbvalutar.tranzactie: ~8 rows (approximately)
/*!40000 ALTER TABLE `tranzactie` DISABLE KEYS */;
INSERT IGNORE INTO `tranzactie` (`id_tranzactie`, `id_client`, `Tip`, `Data`, `id_valuta`, `Suma`) VALUES
	(1, 1, ' Vanzare', '2017-05-03', 'EUR', 100),
	(2, 2, 'Cumparare', '2017-04-03', 'EUR', 50),
	(3, 3, ' Vanzare', '2017-04-04', 'EUR', 350),
	(4, 4, 'Cumparare', '2017-05-03', 'EUR', 200),
	(5, 5, 'Cumparare', '2017-05-03', 'USD', 200),
	(6, 6, ' Vanzare', '2017-04-14', 'GBP', 30),
	(8, 8, ' Vanzare', '2017-05-03', 'HUF', 50000),
	(9, 9, 'Cumparare', '2017-05-03', 'BGN', 1000),
	(10, 10, ' Vanzare', '2017-05-03', 'GBP', 350);
/*!40000 ALTER TABLE `tranzactie` ENABLE KEYS */;


-- Dumping structure for table schimbvalutar.valuta
CREATE TABLE IF NOT EXISTS `valuta` (
  `id_valuta` int(11) NOT NULL,
  `Denumire` text NOT NULL,
  `Sold` float NOT NULL,
  `Data` date NOT NULL,
  `Sold_Final` float NOT NULL,
  PRIMARY KEY (`id_valuta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table schimbvalutar.valuta: ~6 rows (approximately)
/*!40000 ALTER TABLE `valuta` DISABLE KEYS */;
INSERT IGNORE INTO `valuta` (`id_valuta`, `Denumire`, `Sold`, `Data`, `Sold_Final`) VALUES
	(1, 'EUR', 10000, '2017-04-29', 9800),
	(2, 'USD', 10000, '2017-04-29', 10200),
	(3, 'GBP', 10000, '2017-04-29', 9620),
	(4, 'BGN', 100000, '2017-04-29', 101000),
	(5, 'HUF', 1000000, '2017-04-29', 950000),
	(6, 'RON', 100000, '2017-04-29', 102094);
/*!40000 ALTER TABLE `valuta` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
