-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 okt 2024 om 22:26
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
(5, 'Yassine', '$2y$10$4wgF.k/IjA1Q4n1L5OLiUOb2onfJIkGgldo6yXKq3/KujiM2i6yeC', 'yassine.b2007@hotmail.com', '+32 499 91 21 81', 'Mechelsesteenweg 164', '2860', 'Sint-Katelijne-Waver', 'admin'),
(14, 'NFCD', '$2y$10$NBJ3skX0s7iQi5Kbnqmfs.VDJ1SCmh5SMULQVLqxMaWM4lE9bE40y', 'needforcardetailing@gmail.com', NULL, '', '', '', 'eigenaar'),
(15, 'klant', '$2y$10$EnASB8ERicyBxDsHJckbsOOYrvzOQ9d2r25..VrWKi296WqsQyYdC', 'klant@gmail.com', NULL, '', '', '', 'klant');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tblklant`
--
ALTER TABLE `tblklant`
  ADD PRIMARY KEY (`klant_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tblklant`
--
ALTER TABLE `tblklant`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
