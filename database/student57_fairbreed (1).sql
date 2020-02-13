-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 feb 2020 om 11:23
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student57_fairbreed`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pagina` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `content`
--

INSERT INTO `content` (`id`, `text`, `title`, `pagina`) VALUES
(1, '<h1>Lorem ipsum</h1>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde ducimus doloribus deserunt ipsa velit eveniet. Omnis quibusdam, sed commodi quo accusantium nihil, quam temporibus quis, alias reiciendis recusandae vel voluptas.</p>', '', 'home'),
(2, 'hallo 123', '', 'home'),
(3, 'test', '', 'kennels');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kennelhouders`
--

CREATE TABLE `kennelhouders` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `contact_persoon` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `ubn` varchar(50) NOT NULL,
  `kvk` varchar(50) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `kennelhouders`
--

INSERT INTO `kennelhouders` (`id`, `naam`, `contact_persoon`, `adres`, `tel`, `mail`, `ubn`, `kvk`, `bio`, `user_id`) VALUES
(1, 'Test Kennelhouder', 'Test persoon', 'teststraat', '0731234567', 'test@test.com', '123456789', '12345679', 'Dit is een test Bio', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `href` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `menu`
--

INSERT INTO `menu` (`id`, `href`, `name`) VALUES
(1, '#', 'FairBreed'),
(2, '#', 'Keurmerk houders'),
(3, '#', 'contact');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ouder_honden`
--

CREATE TABLE `ouder_honden` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `chipnummer` varchar(255) NOT NULL,
  `ras` varchar(255) NOT NULL,
  `leeftijd` int(11) NOT NULL,
  `kennelhouder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pups`
--

CREATE TABLE `pups` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `chipnummer` varchar(255) NOT NULL,
  `ras` varchar(255) NOT NULL,
  `ouder_hond` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adminlevel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `adminlevel`) VALUES
(1, 'admin', '$2y$12$tgTKx7PbS0fBp947DyRUj.PgdtRZa5iwQZVjBIQayEfQO/wlXQt.e', '1'),
(2, 'testKennel', '$2y$12$Sp4wBrrBbNdSk/LKz0LGlOeGLgqRdFpCA2ey0mXL1jWUSUIMnJ7F2', '3');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `kennelhouders`
--
ALTER TABLE `kennelhouders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `ouder_honden`
--
ALTER TABLE `ouder_honden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kennelhouder_id` (`kennelhouder`);

--
-- Indexen voor tabel `pups`
--
ALTER TABLE `pups`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `kennelhouders`
--
ALTER TABLE `kennelhouders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `ouder_honden`
--
ALTER TABLE `ouder_honden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `pups`
--
ALTER TABLE `pups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `kennelhouders`
--
ALTER TABLE `kennelhouders`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `ouder_honden`
--
ALTER TABLE `ouder_honden`
  ADD CONSTRAINT `kennelhouder_id` FOREIGN KEY (`kennelhouder`) REFERENCES `kennelhouders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
