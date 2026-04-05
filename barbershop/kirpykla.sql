-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2026 at 03:34 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kirpykla`
--

-- --------------------------------------------------------

--
-- Table structure for table `klientai`
--

CREATE TABLE IF NOT EXISTS `klientai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vardas` varchar(100) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `telefonas` varchar(20) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=55 ;

--
-- Dumping data for table `klientai`
--

INSERT INTO `klientai` (`id`, `vardas`, `telefonas`, `email`) VALUES
(5, 'Eglė Jonaitytė', '+37060011111', 'egle1@gmail.com'),
(6, 'Monika Petrauskaitė', '+37060011112', 'monika2@gmail.com'),
(7, 'Gabija Kazlauskaitė', '+37060011113', 'gabija3@gmail.com'),
(8, 'Ieva Vaitkutė', '+37060011114', 'ieva4@gmail.com'),
(9, 'Aistė Žukaitė', '+37060011115', 'aiste5@gmail.com'),
(10, 'Milda Paulauskaitė', '+37060011116', 'milda6@gmail.com'),
(11, 'Justė Mockutė', '+37060011117', 'juste7@gmail.com'),
(12, 'Greta Urbonaitė', '+37060011118', 'greta8@gmail.com'),
(13, 'Laura Mažeikaitė', '+37060011119', 'laura9@gmail.com'),
(14, 'Rūta Jankauskaitė', '+37060011120', 'ruta10@gmail.com'),
(15, 'Tadas Rimkus', '+37060022221', 'tadas1@gmail.com'),
(16, 'Paulius Dambrauskas', '+37060022222', 'paulius2@gmail.com'),
(17, 'Vytenis Kairys', '+37060022223', 'vytenis3@gmail.com'),
(18, 'Deividas Balčiūnas', '+37060022224', 'deividas4@gmail.com'),
(19, 'Saulius Petkevičius', '+37060022225', 'saulius5@gmail.com'),
(20, 'Dominykas Stankevičius', '+37060022226', 'dominykas6@gmail.com'),
(21, 'Marius Sabonis', '+37060022227', 'marius7@gmail.com'),
(22, 'Edgaras Žilinskas', '+37060022228', 'edgaras8@gmail.com'),
(23, 'Gytis Navickas', '+37060022229', 'gytis9@gmail.com'),
(24, 'Arnas Kavaliauskas', '+37060022230', 'arnas10@gmail.com'),
(25, 'Monika Linkytė', '061259402', 'darius.ven@gmail.com'),
(26, 'Inga kirpėjaitė', '061494896', 'ina.ven@gmail.com'),
(27, 'Abigaile Venslovaite', '+37060831056', 'ad@df.t'),
(28, 'Mantas Petrauskas', '+37061100001', 'mantas1@gmail.com'),
(29, 'Karolis Žilinskas', '+37061100002', 'karolis2@gmail.com'),
(30, 'Simonas Jankauskas', '+37061100003', 'simonas3@gmail.com'),
(31, 'Rokas Kazlauskas', '+37061100004', 'rokas4@gmail.com'),
(32, 'Paulius Vaitkus', '+37061100005', 'paulius5@gmail.com'),
(33, 'Andrius Stankevičius', '+37061100006', 'andrius6@gmail.com'),
(34, 'Domantas Sabonis', '+37061100007', 'domantas7@gmail.com'),
(35, 'Edvinas Mockus', '+37061100008', 'edvinas8@gmail.com'),
(36, 'Tautvydas Urbonas', '+37061100009', 'tautvydas9@gmail.com'),
(37, 'Justinas Rimkus', '+37061100010', 'justinas10@gmail.com'),
(38, 'Gabrielė Paulauskaitė', '+37061100011', 'gabriele11@gmail.com'),
(39, 'Ugnė Mažeikaitė', '+37061100012', 'ugne12@gmail.com'),
(40, 'Emilija Jonaitytė', '+37061100013', 'emilija13@gmail.com'),
(41, 'Kamilė Kavaliauskaitė', '+37061100014', 'kamile14@gmail.com'),
(42, 'Austėja Navickaitė', '+37061100015', 'austeja15@gmail.com'),
(43, 'Liepa Žukaitė', '+37061100016', 'liepa16@gmail.com'),
(44, 'Ieva Petrauskaitė', '+37061100017', 'ieva17@gmail.com'),
(45, 'Greta Dambrauskaitė', '+37061100018', 'greta18@gmail.com'),
(46, 'Monika Balčiūnaitė', '+37061100019', 'monika19@gmail.com'),
(47, 'Rūta ', '+37061100020', 'ruta20@gmail.com'),
(52, 'Lina', '+37060831056', 'ad@df.t'),
(53, 'Jonas', '+37060845795', 'jonas@gmail.com'),
(54, 'Jonas Jonaitis', '3706452454', 'labas@fs.lt');

-- --------------------------------------------------------

--
-- Table structure for table `laikai`
--

CREATE TABLE IF NOT EXISTS `laikai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `laikas` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `laikai`
--

INSERT INTO `laikai` (`id`, `laikas`) VALUES
(1, '08:00:00'),
(2, '09:00:00'),
(3, '10:00:00'),
(4, '11:00:00'),
(5, '12:00:00'),
(6, '13:00:00'),
(7, '14:00:00'),
(8, '15:00:00'),
(9, '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `meistrai`
--

CREATE TABLE IF NOT EXISTS `meistrai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vardas` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  `specialybe` varchar(100) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `meistrai`
--

INSERT INTO `meistrai` (`id`, `vardas`, `specialybe`) VALUES
(1, 'Agnė', 'Kirpėja'),
(2, 'Lukas', 'Kirpėjas'),
(3, 'Inga', 'Kirpėja - koloristė'),
(4, 'Tomas', 'Kirpėjas, barzdos meistras');

-- --------------------------------------------------------

--
-- Table structure for table `paslauga_meistras`
--

CREATE TABLE IF NOT EXISTS `paslauga_meistras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paslauga_id` int(11) DEFAULT NULL,
  `meistras_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `paslauga_meistras`
--

INSERT INTO `paslauga_meistras` (`id`, `paslauga_id`, `meistras_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 4),
(4, 2, 4),
(5, 3, 4),
(6, 4, 1),
(7, 4, 2),
(8, 5, 1),
(9, 5, 3),
(10, 6, 3),
(11, 7, 3),
(12, 8, 1),
(13, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `paslaugos`
--

CREATE TABLE IF NOT EXISTS `paslaugos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pavadinimas` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  `kaina` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `paslaugos`
--

INSERT INTO `paslaugos` (`id`, `pavadinimas`, `kaina`) VALUES
(1, 'Vyriškas kirpimas', 25.00),
(2, 'Plaukų kirpimas ir barzdos modeliavimas', 35.00),
(3, 'Barzdos modeliavimas', 20.00),
(4, 'Vaikų kirpimas', 15.00),
(5, 'Moteriškas kirpimas', 25.00),
(6, 'Plaukų dažymas', 40.00),
(7, 'Plaukų tiesinimas', 20.00),
(8, 'Proginis šukavimas', 30.00);

-- --------------------------------------------------------

--
-- Table structure for table `registracijos`
--

CREATE TABLE IF NOT EXISTS `registracijos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paslauga_id` int(11) DEFAULT NULL,
  `meistras_id` int(11) DEFAULT NULL,
  `klientas_id` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `laikas_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=139 ;

--
-- Dumping data for table `registracijos`
--

INSERT INTO `registracijos` (`id`, `paslauga_id`, `meistras_id`, `klientas_id`, `data`, `laikas_id`) VALUES
(77, 4, 1, 2, '2026-03-27', 6),
(89, 2, 4, 4, '2026-03-10', 5),
(90, 1, 1, 5, '2026-04-01', 1),
(91, 2, 4, 6, '2026-04-01', 2),
(92, 3, 4, 7, '2026-04-02', 3),
(93, 4, 1, 8, '2026-04-02', 4),
(95, 6, 3, 10, '2026-04-03', 6),
(96, 7, 1, 11, '2026-04-04', 7),
(97, 8, 1, 12, '2026-04-04', 8),
(98, 2, 4, 13, '2026-04-05', 9),
(99, 1, 3, 14, '2026-04-05', 1),
(100, 3, 4, 15, '2026-04-06', 2),
(101, 4, 2, 16, '2026-04-06', 3),
(102, 5, 3, 17, '2026-04-07', 4),
(104, 7, 1, 19, '2026-04-08', 6),
(105, 8, 3, 20, '2026-04-08', 7),
(107, 2, 4, 22, '2026-04-09', 9),
(108, 3, 4, 23, '2026-04-10', 1),
(109, 4, 2, 24, '2026-04-10', 2),
(110, 3, 4, 25, '2026-09-05', 8),
(111, 7, 3, 26, '2026-04-04', 5),
(112, 1, 1, 28, '2026-04-13', 1),
(113, 4, 2, 29, '2026-04-13', 2),
(114, 2, 4, 30, '2026-04-13', 3),
(115, 5, 3, 31, '2026-04-14', 1),
(116, 6, 3, 32, '2026-04-14', 2),
(117, 1, 2, 33, '2026-04-14', 3),
(118, 3, 4, 34, '2026-04-14', 4),
(119, 8, 1, 35, '2026-04-16', 2),
(120, 5, 3, 36, '2026-04-16', 3),
(121, 1, 4, 37, '2026-04-16', 4),
(122, 4, 1, 38, '2026-04-17', 1),
(123, 1, 2, 39, '2026-04-17', 2),
(125, 3, 4, 41, '2026-04-17', 4),
(126, 6, 3, 42, '2026-04-20', 1),
(127, 5, 1, 43, '2026-04-20', 2),
(128, 2, 4, 44, '2026-04-22', 3),
(129, 1, 2, 45, '2026-04-22', 4),
(131, 5, 3, 47, '2026-04-24', 7),
(136, 7, 3, 52, '2026-03-31', 5),
(137, 4, 2, 53, '2026-03-31', 3),
(138, 1, 2, 54, '2026-03-23', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
