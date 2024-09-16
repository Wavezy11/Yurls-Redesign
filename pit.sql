-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 sep 2024 om 14:08
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pit`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(75) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `admin`) VALUES
(1, 'farhan2005231@gmail.com', 'farhan', '$2y$10$9ch0C1mBLrK/idCRbyPil.F.5Yi.4WnGOAru2rqf4Ehkf5NkmLm3C', 1),
(3, 'farhan2005231@gmail.com', 'kaas', '$2y$10$S9MDyV7A7cqQ5UiU1ezCb.xGk/gvy/rzCdquEEupN54liIPKkO4r6', 1),
(5, 'kaas@gmail.com', 'farhan2005', '$2y$10$gpZYvZn6pnFzI5A4wu5GReTSIoBIOdQ4ciCFYi3Ll4JhX2JL.EaHy', 1),
(6, 'youtube@gmail.com', 'wavez', '$2y$10$TLBzIPuts/fm4CE2fOtMguRvo.iOZGieW5DW7DRHVMIDps1pfJTGm', 0),
(9, 'wavez@gmail.com', 'hoii', '$2y$10$K.YhfQ1y1MybyLXsB6LM/OVBHSYkw7hAsFi2ZO0BMaBPLXesnFpyS', 1),
(10, 'farhan@gmail.com', 'wavezy', '$2y$10$vxEeWPbefCDws8TqVVRkHuGcXWnt7UVdX3fQoydpNtX7yeMlV6zLu', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
