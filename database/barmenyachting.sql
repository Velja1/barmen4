-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 11:37 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barmenyachting`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id_anketa` int(11) NOT NULL,
  `id_korisnik` int(11) NOT NULL,
  `id_plovila` int(11) NOT NULL,
  `ocena` int(11) NOT NULL,
  `objasnjenje` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id_anketa`, `id_korisnik`, `id_plovila`, `ocena`, `objasnjenje`) VALUES
(10, 90, 1, 3, 'asdadadad'),
(17, 1, 1, 1, 'a'),
(23, 99, 1, 2, 'Test'),
(61, 106, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id_features` int(10) NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `h4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pHeader` text COLLATE utf8_unicode_ci NOT NULL,
  `pFeatures` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id_features`, `src`, `alt`, `h4`, `pHeader`, `pFeatures`) VALUES
(1, 'images/iznajmljivanje.jpg', 'Iznajmljivanje', 'Iznajmljivanje plovila', 'Iznajmite plovilo po povoljnim cenama', 'Kompanija Barmen Yachting nudi svim potencijalnim klijentima mogućnost iznajmljivanja plovila po čarter principu.'),
(2, 'images/marina.jpg', 'Marina', 'Marina', 'Raskomotite se', 'Ekskluzivni brod-marina na dva nivoa smešten je na jednom od najlepših delova Zemunskog keja, sa pogledom na Veliko ratno ostrvo.'),
(3, 'images/servis.jpg', 'Servis', 'Servis plovila', 'Servisirajte Vaše plovilo povoljno', 'Kompanija Barmen Yachting poseduje savremeni servisni prostor koji zadovoljava sve standarde plovila različitih dimenzija i brendova.'),
(4, 'images/zimovnik.jpg', 'Zimovnik', 'Zimovnik', 'Neka Vaše plovilo prezimi kod nas', 'Kapacitet dva zatvorena zimovnika, koja se nalaze u sklopu kompanije Barmen Yachting, obuhvata 1260 m² moderno i funkcionalno uređenog enterijera.');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id_korisnik` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sifra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_uloga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnik`, `ime`, `prezime`, `email`, `username`, `sifra`, `id_uloga`) VALUES
(1, 'Veljko', 'Vulovic', 'veljko@gmail.com', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 1),
(90, 'Aaa', 'Aaa', 'a@a.com', 'a', '0cc175b9c0f1b6a831c399e269772661', 2),
(96, 'AKorisnik', 'AKorisnik', 'korisnik@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2),
(97, 'Test', 'Test', 'test@gmail.com', 'test', '4e8a273b3543207fe94f17515b68f247', 2),
(99, 'Zivko', 'Petrovic', 'zivko@gmail.com', 'zivko', '13a72d0fa9fba1a5c944f3cd925c478f', 2),
(102, 'Zivko', 'Petrovic', 'zivko@gmail.com', 'zidavinka', '923352284767451ab158a387a283df26', 2),
(103, 'Zivko', 'Petrovic', 'zivko@gmail.com', 'zivadinka', '923352284767451ab158a387a283df26', 2),
(104, 'Zivko', 'Petrovic', 'zivko@gmail.com', 'zivadinka1', '923352284767451ab158a387a283df26', 2),
(105, 'Testa', 'Testa', 'adada@aca.cpm', 'adad', 'c5f8248a403274416179aa9fbd852344', 2),
(106, 'Petar', 'Pantic', 'pera@gmail.com', 'pera', '13a72d0fa9fba1a5c944f3cd925c478f', 2);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `id_meni` int(11) NOT NULL,
  `href` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lokacija` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`id_meni`, `href`, `naziv`, `lokacija`) VALUES
(1, 'index', 'Početna', 'header'),
(2, 'plovila', 'Plovila', 'header'),
(3, 'prodaja', 'Prodaja plovila', 'header'),
(4, 'proizvodi', 'Proizvodi', 'header'),
(5, 'oautoru', 'O autoru', 'footer'),
(6, 'sitemap.xml', 'Sitemap', 'footer'),
(7, 'dokumentacija.pdf', 'Dokumentacija', 'footer'),
(8, 'admin', 'Admin', 'header'),
(9, 'registracija', 'registracija', 'header'),
(10, 'logovanje', 'Logovanje', 'header');

-- --------------------------------------------------------

--
-- Table structure for table `plovila`
--

CREATE TABLE `plovila` (
  `id_plovila` int(11) NOT NULL,
  `id_tip` int(11) NOT NULL,
  `id_proizvodjac` int(11) NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `duzina` decimal(10,2) NOT NULL,
  `sirina` decimal(10,2) NOT NULL,
  `tezina` decimal(10,2) NOT NULL,
  `kapacitetRezervoara` decimal(10,2) NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plovila`
--

INSERT INTO `plovila` (`id_plovila`, `id_tip`, `id_proizvodjac`, `model`, `cena`, `duzina`, `sirina`, `tezina`, `kapacitetRezervoara`, `opis`) VALUES
(1, 1, 1, 'E52', '904000.00', '15.82', '4.67', '20100.00', '1570.00', 'Rezervoar za otpadne vode, Sidro 35kg Ultramarine nerđajući čelik, Antialgin zaštita - crna boja (korito, propeleri i pogon IPS), dva premaza, Klima uređaj 60.000 BTU sistem hladne vode, sa toplotnom pompom, Bimini Top tenda na komandnom mostu sa nosačima od nerđajućeg čelika i prigušenim osvetljenjem, Bimini Top tenda na pramcu, Krmena \\\"skiper\\\" kabina sa tušem - wc - lavabo – dušek, Krmena komplet cirada sa bočnim zastorima i prolazima'),
(2, 1, 2, 'C34', '19900.00', '10.82', '3.96', '7847.00', '946.00', 'Pramačni pomoćni elektromotor „bow thruster“, 7.0KW Kohler generator Diesel- 50Hz, 25.000BTU Klima uređaj, Sistem za izbacivanje otpadnih voda, Tank za otpadne vode, Displej za praćenje nivoa otpadne i tehničke vode, Sistem za spiranje sa svežom vodom, na krmi, Elektronski paket - E127 navigacioni paket opreme na komandnom mostu'),
(3, 1, 3, '295', '138970.00', '8.84', '2.79', '3719.00', '340.00', 'Želkot bočna linija iznad trupa (drugacija od Arctic Ice), Želkot bočna linija na trupu (drugačija od Arctic Ice), Želkot akcentna linija na trupu (drugačija od Arctic Ice), Sidreno vitlo sa sidrom, kanapom i lancem, Priprema instalacije za sidreno vitlo, Sidro od nerdjajućeg čelika, Reflektor sa daljinskom kontrolom, Rol Bar nadogradnja, električno sklapanje, sa osvetljenjem iznad'),
(4, 1, 3, '378', '337446.00', '11.28', '3.35', '7257.00', '757.00', 'Sidreno vitlo sa sidrom, kanapom i lancem, Priprema instalacije za sidreno vitlo, Nadogradnja užeta sidra (sve lanac umesto kanapa i lanca), Sidro od nerdjajućeg čelika, Bočna linija iznad trupa u boji (drugacija od Arctic Ice), Bočna linija na trupu u boji (drugacija od Arctic Ice), Želkot akcentna linija, \'Cone\'\' vodootporni zvučnici za Rol Bar sa 4-kan. poj. (zahteva Rol Bar i Stereo paket)'),
(5, 2, 4, 'LS 4C', '78800.00', '7.42', '2.50', '2064.00', '212.00', 'Bokovi plovila Sand Stone (bež) boji, Bočna linija na koritu u Black (crna) boji, Dno korita u Sand Stone (bež) boji, Enterijer plovila - Pebble Beach (braon / bež nijanse enterijera), Punjač za akumulatore, Prekidač za dva akumulatora, Tuš na krmi sa vodom pod pritiskom, Prekrivač pramca - Black (crna) boja'),
(7, 2, 3, '238', '60605.00', '7.01', '2.59', '1762.00', '197.00', 'Krmeni tuš sa vodom pod pritiskom (samo hladna voda), Dno trupa u boji (drugačije od Artic Ice), Želkot akcentna linija na trupu, Super Sport Grafika, Wakeboard Rol Bar beli ili crni (uključuje Wakeboard Bimini), \'Cone\'\' vodootporni zvučnici za Rol Bar sa 4-kan. poj. (zahteva Rol Bar i Stereo paket), Produžena krmena platforma popločana SeaDek-om (braon ili sivi), Podvodna LED svetla'),
(8, 2, 6, 'V175', '15555.00', '5.61', '2.46', '692.00', '96.50', 'Vinil nadogradnja, Sedište \\\"Caddy\\\", VERSATRACK® držač za čaše, VERSATRACK® držač alata, VERSATRACK® prostor za pribor, VERSATRACK® daska za sečenje, VERSATRACK® komplet držača za 4 šipke, VERSATRACK® donji montažni držač'),
(28, 2, 1, 'test', '1.00', '1.00', '1.00', '1.00', '1.00', 'testiranje');

-- --------------------------------------------------------

--
-- Table structure for table `posete`
--

CREATE TABLE `posete` (
  `id_poseta` int(11) NOT NULL,
  `datum` date NOT NULL,
  `dodatni_zahtevi` text NOT NULL,
  `plovilo_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posete`
--

INSERT INTO `posete` (`id_poseta`, `datum`, `dodatni_zahtevi`, `plovilo_id`, `korisnik_id`) VALUES
(1, '2000-01-01', 'Testiranje sada', 1, 99),
(2, '2000-01-01', 'Testiranje sada', 1, 99),
(3, '2000-01-01', 'Testiranje sada', 1, 99),
(4, '2000-01-01', '', 1, 99),
(5, '2000-01-01', '', 1, 99),
(6, '2000-01-01', '', 1, 99),
(7, '2000-01-01', '', 1, 99),
(8, '2000-01-01', '', 1, 99),
(9, '2000-01-01', '', 1, 99),
(10, '2000-01-01', '', 1, 99),
(11, '2000-01-01', '', 1, 99),
(12, '2000-01-01', '', 1, 99),
(13, '2000-01-01', '', 1, 99),
(14, '2000-01-01', '', 1, 99),
(15, '2022-05-25', 'sada', 2, 99);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodjaci`
--

CREATE TABLE `proizvodjaci` (
  `id_proizvodjac` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodjaci`
--

INSERT INTO `proizvodjaci` (`id_proizvodjac`, `naziv`) VALUES
(1, 'Cranchi'),
(2, 'Carver'),
(3, 'Monterey'),
(4, 'Regal'),
(5, 'Sea Ray'),
(6, 'Tracker');

-- --------------------------------------------------------

--
-- Table structure for table `slajder`
--

CREATE TABLE `slajder` (
  `id_slajder` int(10) NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slajder`
--

INSERT INTO `slajder` (`id_slajder`, `src`, `alt`) VALUES
(1, 'images/monterey238.jpg', 'Monterey 238'),
(2, 'images/carverc34.jpg', 'Carver C34'),
(3, 'images/monterey295.jpg', 'Monterey 295'),
(4, 'images/cranchie52.jpg', 'Cranchi E52'),
(5, 'images/monterey238ss.jpg', 'Monterey 238 SS'),
(6, 'images/tracker.jpg', 'Tracker V-175'),
(7, 'images/searay.jpg', 'Sea Ray SLX 400'),
(8, 'images/regal.jpg', 'Regal LS 4C');

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `id_slika` int(11) NOT NULL,
  `id_plovila` int(11) NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tip` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`id_slika`, `id_plovila`, `src`, `alt`, `tip`) VALUES
(1, 1, 'images/cranchie52.jpg', 'Cranchi E52', 'exterior'),
(2, 1, 'images/cranchie52interior.jpg', 'Cranchi E52 interior', 'interior'),
(3, 2, 'images/carverc34.jpg', 'Carver C34', 'exterior'),
(4, 2, 'images/carverc34interior.jpg', 'Carver C34 interior', 'interior'),
(5, 3, 'images/monterey295.jpg', 'Monterey 295', 'exterior'),
(6, 3, 'images/monterey295interior.jpg', 'Monterey 295 interior', 'interior'),
(7, 4, 'images/monterey378.jpg', 'Monterey 378', 'exterior'),
(8, 4, 'images/monterey378interior.jpg', 'Monterey 378 interior', 'interior'),
(9, 5, 'images/regal.jpg', 'Regal LS 4C', 'exterior'),
(11, 7, 'images/monterey238.jpg', 'Monterey 238', 'exterior'),
(12, 8, 'images/tracker.jpg', 'Tracker V175', 'exterior');

-- --------------------------------------------------------

--
-- Table structure for table `tipovi`
--

CREATE TABLE `tipovi` (
  `id_tip` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tipovi`
--

INSERT INTO `tipovi` (`id_tip`, `naziv`) VALUES
(1, 'jahta'),
(2, 'gliser');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id_uloga` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id_uloga`, `naziv`) VALUES
(1, 'admin'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id_anketa`),
  ADD UNIQUE KEY `id_korisnik` (`id_korisnik`),
  ADD KEY `id_plovila` (`id_plovila`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id_features`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_uloga` (`id_uloga`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`id_meni`);

--
-- Indexes for table `plovila`
--
ALTER TABLE `plovila`
  ADD PRIMARY KEY (`id_plovila`),
  ADD KEY `id_tip` (`id_tip`,`id_proizvodjac`),
  ADD KEY `id_proizvodjac` (`id_proizvodjac`);

--
-- Indexes for table `posete`
--
ALTER TABLE `posete`
  ADD PRIMARY KEY (`id_poseta`),
  ADD KEY `plovilo_id` (`plovilo_id`,`korisnik_id`),
  ADD KEY `korisnik_id` (`korisnik_id`);

--
-- Indexes for table `proizvodjaci`
--
ALTER TABLE `proizvodjaci`
  ADD PRIMARY KEY (`id_proizvodjac`);

--
-- Indexes for table `slajder`
--
ALTER TABLE `slajder`
  ADD PRIMARY KEY (`id_slajder`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`id_slika`),
  ADD KEY `id_plovila` (`id_plovila`);

--
-- Indexes for table `tipovi`
--
ALTER TABLE `tipovi`
  ADD PRIMARY KEY (`id_tip`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id_uloga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id_anketa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id_features` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `id_meni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plovila`
--
ALTER TABLE `plovila`
  MODIFY `id_plovila` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `posete`
--
ALTER TABLE `posete`
  MODIFY `id_poseta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `proizvodjaci`
--
ALTER TABLE `proizvodjaci`
  MODIFY `id_proizvodjac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slajder`
--
ALTER TABLE `slajder`
  MODIFY `id_slajder` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `id_slika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tipovi`
--
ALTER TABLE `tipovi`
  MODIFY `id_tip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id_uloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anketa`
--
ALTER TABLE `anketa`
  ADD CONSTRAINT `anketa_ibfk_1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnici` (`id_korisnik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anketa_ibfk_2` FOREIGN KEY (`id_plovila`) REFERENCES `plovila` (`id_plovila`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`id_uloga`) REFERENCES `uloga` (`id_uloga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plovila`
--
ALTER TABLE `plovila`
  ADD CONSTRAINT `plovila_ibfk_1` FOREIGN KEY (`id_tip`) REFERENCES `tipovi` (`id_tip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plovila_ibfk_2` FOREIGN KEY (`id_proizvodjac`) REFERENCES `proizvodjaci` (`id_proizvodjac`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posete`
--
ALTER TABLE `posete`
  ADD CONSTRAINT `posete_ibfk_1` FOREIGN KEY (`plovilo_id`) REFERENCES `plovila` (`id_plovila`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posete_ibfk_2` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id_korisnik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slike`
--
ALTER TABLE `slike`
  ADD CONSTRAINT `slike_ibfk_1` FOREIGN KEY (`id_plovila`) REFERENCES `plovila` (`id_plovila`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
