-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 nov 2024 om 11:53
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nfcd`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbladmin`
--

CREATE TABLE `tbladmin` (
  `functie_id` int(11) NOT NULL,
  `functienaam` text NOT NULL,
  `functiewaarde` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tbladmin`
--

INSERT INTO `tbladmin` (`functie_id`, `functienaam`, `functiewaarde`) VALUES
(1, 'onderhoudmodus', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblafspraken`
--

CREATE TABLE `tblafspraken` (
  `afspraak_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `servicenaam` varchar(50) NOT NULL,
  `datum` date NOT NULL,
  `tijdslot` time NOT NULL,
  `locatie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblafspraken`
--

INSERT INTO `tblafspraken` (`afspraak_id`, `email`, `servicenaam`, `datum`, `tijdslot`, `locatie`) VALUES
(10, 'yassine.b2007@hotmail.com', 'Refresh', '2024-11-22', '14:00:00', 'Schipstraat 2 2890 Puurs');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblklant`
--

CREATE TABLE `tblklant` (
  `klant_id` int(11) NOT NULL,
  `klantnaam` text NOT NULL,
  `wachtwoord` text NOT NULL,
  `email` text NOT NULL,
  `telefoonnummer` text DEFAULT NULL,
  `adres` text NOT NULL,
  `postcode` text NOT NULL,
  `plaats` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblklant`
--

INSERT INTO `tblklant` (`klant_id`, `klantnaam`, `wachtwoord`, `email`, `telefoonnummer`, `adres`, `postcode`, `plaats`, `type`) VALUES
(5, 'Yassine', '$2y$10$4wgF.k/IjA1Q4n1L5OLiUOb2onfJIkGgldo6yXKq3/KujiM2i6yeC', 'yassine.b2007@hotmail.com', '+32499 91 21 81', 'Mechelsesteenweg 164', '2860', 'Sint-Katelijne-Waver', 'admin'),
(14, 'NFCD', '$2y$10$NBJ3skX0s7iQi5Kbnqmfs.VDJ1SCmh5SMULQVLqxMaWM4lE9bE40y', 'needforcardetailing@gmail.com', '+32499912181', 'Mechelsesteenweg', '2860', 'Sint-Katelijne-Waver', 'eigenaar'),
(19, 'wijns', '$2y$10$kjaqbqxru1t/97BwPVWzQeVVHb/lnQDWFKVe6HggKcV/Lv78dya5G', 'wijns@hotmail.com', NULL, '', '', '', 'klant'),
(20, 'bibi', '$2y$10$mxdU.wzd5qO767yTTst15O9lyN4AXPeF9rmGOHuufoSDe4IQEQHsG', 'bibi@gmail.com', NULL, '', '', '', 'klant'),
(22, 'yaz', '$2y$10$Bxf5DtLX22GP87jP.x9P/OGsjPpjQ1NvikC8HTOWtPrLDgiwbEdfO', 'yaz@gmail.com', '0484853133', '', '', '', 'klant');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbllocatie`
--

CREATE TABLE `tbllocatie` (
  `locatie_id` int(11) NOT NULL,
  `adresnaam` text NOT NULL,
  `adres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tbllocatie`
--

INSERT INTO `tbllocatie` (`locatie_id`, `adresnaam`, `adres`) VALUES
(1, 'Locatie 1:', 'Mechelsesteenweg 164 2860 Sint-Katelijne-Waver'),
(2, 'Locatie 2:', 'Schipstraat 2 2890 Puurs');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblservice`
--

CREATE TABLE `tblservice` (
  `service_id` int(11) NOT NULL,
  `servicenaam` varchar(50) NOT NULL,
  `prijs` decimal(10,2) NOT NULL,
  `tijd` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblservice`
--

INSERT INTO `tblservice` (`service_id`, `servicenaam`, `prijs`, `tijd`) VALUES
(1, 'Classic', 25.00, '00:30:00'),
(2, 'Refresh', 80.00, '03:00:00'),
(3, 'Diamond', 130.00, '06:00:00');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`functie_id`);

--
-- Indexen voor tabel `tblafspraken`
--
ALTER TABLE `tblafspraken`
  ADD PRIMARY KEY (`afspraak_id`);

--
-- Indexen voor tabel `tblklant`
--
ALTER TABLE `tblklant`
  ADD PRIMARY KEY (`klant_id`);

--
-- Indexen voor tabel `tbllocatie`
--
ALTER TABLE `tbllocatie`
  ADD PRIMARY KEY (`locatie_id`);

--
-- Indexen voor tabel `tblservice`
--
ALTER TABLE `tblservice`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `functie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `tblafspraken`
--
ALTER TABLE `tblafspraken`
  MODIFY `afspraak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `tblklant`
--
ALTER TABLE `tblklant`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT voor een tabel `tbllocatie`
--
ALTER TABLE `tbllocatie`
  MODIFY `locatie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `tblservice`
--
ALTER TABLE `tblservice`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
