-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 18 feb 2020 om 12:42
-- Serverversie: 5.7.29-0ubuntu0.16.04.1-log
-- PHP-versie: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fairbree_fairbreed`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `text` varchar(5000) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pagina` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `content`
--

INSERT INTO `content` (`id`, `text`, `title`, `pagina`) VALUES
(1, '<main>\r\n  <div>\r\n    <h1>lorem</h1>\r\n    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque, dicta laborum nisi tempore culpa earum fugit quis assumenda sapiente voluptates itaque consequatur voluptas vero neque consequuntur laboriosam non aut veritatis!</p>\r\n    <img src=\"images/07_Keurmerk_logo.jpg\" alt=\"logo\" width=\"200\" height=\"200\">\r\n    <img src=\"\" alt=\"baloon\">\r\n  </div>\r\n  <div>\r\n    <h1>lorem</h1>\r\n    <ol>\r\n      <li>algemene eisen</li>\r\n      <li>kennis en vaardigheden</li>\r\n      <li>de inrichting</li>\r\n      <li>de (gefokte) dieren</li>\r\n      <li>de omgang met dieren</li>\r\n      <li>de omgang met klanten</li>\r\n      <li>algemene eisen</li>\r\n      <li>algemene eisen</li>\r\n      <li>algemene eisen</li>\r\n      <li>algemene eisen</li>\r\n      <li>algemene eisen</li>\r\n      <li>algemene eisen</li>\r\n    </ol>\r\n  </div>\r\n  <div>\r\n    <section>\r\n      <h1>lorem</h1>\r\n      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, error! Saepe soluta explicabo unde, consectetur dolores qui consequuntur neque maxime voluptatum esse molestias ut eligendi perferendis adipisci dolor vel sequi.</p>\r\n    </section>\r\n    <section>\r\n      <h1>lorem</h1>\r\n      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, error! Saepe soluta explicabo unde, consectetur dolores qui consequuntur neque maxime voluptatum esse molestias ut eligendi perferendis adipisci dolor vel sequi.</p>\r\n    </section>\r\n    <section>\r\n      <h1>lorem</h1>\r\n      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, error! Saepe soluta explicabo unde, consectetur dolores qui consequuntur neque maxime voluptatum esse molestias ut eligendi perferendis adipisci dolor vel sequi.</p>\r\n    </section>\r\n  </div>\r\n</main>', 'Fairbreed', 'home'),
(4, '<div id=\"container-aanmeld\">\r\n                    <h1>Aanmelden</h1>\r\n                    <form action=\"https://fairbreed.nl/aanmelden/\" method=\"post\">\r\n                        <label for=\"newKennelKennelnaam\">Kennelnaam </label>\r\n                        <input type=\"text\" id=\"newKennelKennelnaam\" name=\"newKennelKennelnaam\" required>\r\n\r\n                        <label for=\"newKennelNaam\">Contactpersoon </label>\r\n                        <input type=\"text\" id=\"newKennelNaam\" name=\"newKennelNaam\" required>\r\n\r\n                        <label for=\"newKennelWachtwoordConfirm\">Wachtwoord </label>\r\n                        <input type=\"password\" id=\"newKennelWachtwoord\" name=\"newKennelWachtwoord\" required>\r\n\r\n                        <label for=\"newKennelWachtwoord\">Bevestiging Wachtwoord </label>\r\n                        <input type=\"password\" id=\"newKennelWachtwoordConfirm\" name=\"newKennelWachtwoordConfirm\" required>\r\n\r\n                        <label for=\"newKennelAddress\">address</label>\r\n                        <input type=\"text\" id=\"newKennelAddress\" name=\"newKennelAddress\" required>\r\n\r\n                        <label for=\"newKennelTel\">Telefoon </label>\r\n                        <input type=\"tel\" id=\"tel\" name=\"tel\" required>\r\n\r\n                        <label for=\"newKennelEmail\">Email </label>\r\n                        <input type=\"newKennelEmail\" id=\"email\" name=\"newKennelEmail\" required>\r\n\r\n                        <label for=\"newKennelUbn\">Ubn </label>\r\n                        <input type=\"text\" id=\"newKennelUbn\" name=\"newKennelUbn\" required>\r\n\r\n                        <label for=\"newKennelKvk\">Kvk</label>\r\n                        <input type=\"text\" id=\"newKennelKvk\" name=\"newKennelKvk\" required>\r\n\r\n                        <label for=\"newKennelBio\">Bio</label>\r\n                        <input type=\"text\" id=\"newKennelBio\" name=\"newKennelBio\" placeholder=\"Bio van max 250 letters.\">\r\n\r\n                        <label for=\"newKennelFoto\">upload foto</label>\r\n                        <input type=\"file\" id=\"newKennelFoto\" name=\"newKennelFoto\" required>\r\n\r\n                        <button type=\"submit\" value=\"Submit\" name=\"kennelAanmelding\">\r\n                    </form>\r\n                </div>', 'Aanmelden', 'aanmelden'),
(5, '<div id=\"container-contact\">\r\n                    <h1>Contact</h1>\r\n                    <form action=\"https://fairbreed.nl/contact/\" method=\"post\" >\r\n                        <label for=\"naam\">Naam </label>\r\n                            <input type=\"text\" id=\"naam\" name=\"naam\">\r\n                        <label for=\"email\">Email </label>\r\n                            <input type=\"email\" id=\"email\" name=\"email\" required>\r\n                        <label for=\"tel\">Telefoon </label>\r\n                            <input type=\"tel\" id=\"tel\" name=\"tel\">\r\n                        <label for=\"bericht\">Je bericht </label>\r\n                            <input type=\"text\" id=\"bericht\" name=\"bericht\" value=\"Typ hier uw bericht.\" required>\r\n                        <input type=\"submit\" value=\"Verstuur\" name=\"contact\">\r\n                    </form>\r\n                </div>', 'Contact', 'contact');

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
  `img` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `kennelhouders`
--

INSERT INTO `kennelhouders` (`id`, `naam`, `contact_persoon`, `adres`, `tel`, `mail`, `ubn`, `kvk`, `bio`, `img`, `user_id`) VALUES
(1, 'Kennelhouder', 'Test persoon TEST', 'teststraat TEST', '0731234567 TEST', 'test@testA.com', '123456789 TEST', '12345679 TEST', 'Dit is een test Bio Dit is een test Bio Dit is een test Bio Dit is een test Bio Dit is een test Bio Dit is een test Bio Dit is een test Bio', 'images/testkennel.jpg', 2),
(3, 'Test Kennelhouder', 'Test persoon', 'teststraat', '0731234567', 'test@test.com', '123456789', '12345679', 'Dit is een test Bio', 'images/testkennel.jpg', 3);

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
(1, 'https://fairbreed.nl/', 'FairBreed'),
(2, 'https://fairbreed.nl/keurmerk_houders/kennels/', 'Keurmerk houders'),
(3, 'https://fairbreed.nl/contact/', 'contact');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ouder_honden`
--

CREATE TABLE `ouder_honden` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `chipnummer` varchar(255) NOT NULL,
  `ras` varchar(255) NOT NULL,
  `leeftijd` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `kennelhouder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `ouder_honden`
--

INSERT INTO `ouder_honden` (`id`, `naam`, `chipnummer`, `ras`, `leeftijd`, `img`, `kennelhouder`) VALUES
(1, 'hond', '123456789', 'hondenras', '5 jaar', 'images/testhond.jpg', 1),
(2, 'hond', '123456789', 'hondenras', '5 jaar', 'images/testhond.jpg', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pups`
--

CREATE TABLE `pups` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `chipnummer` varchar(255) NOT NULL,
  `leeftijd` varchar(255) NOT NULL,
  `ras` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `kennelhouder_id` int(11) NOT NULL,
  `ouder_hond` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `pups`
--

INSERT INTO `pups` (`id`, `naam`, `chipnummer`, `leeftijd`, `ras`, `img`, `kennelhouder_id`, `ouder_hond`) VALUES
(1, 'puppie', '123456789', '4 maanden', 'hondenras', 'images/testpuppy.jpg', 0, 1);

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
(2, 'testKennel', '$2y$12$Sp4wBrrBbNdSk/LKz0LGlOeGLgqRdFpCA2ey0mXL1jWUSUIMnJ7F2', '3'),
(3, 'testKennel2', '$2y$12$Sp4wBrrBbNdSk/LKz0LGlOeGLgqRdFpCA2ey0mXL1jWUSUIMnJ7F2', '3');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `ouder_hond_id` (`ouder_hond`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `kennelhouders`
--
ALTER TABLE `kennelhouders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `ouder_honden`
--
ALTER TABLE `ouder_honden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `pups`
--
ALTER TABLE `pups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

--
-- Beperkingen voor tabel `pups`
--
ALTER TABLE `pups`
  ADD CONSTRAINT `ouder_hond_id` FOREIGN KEY (`ouder_hond`) REFERENCES `ouder_honden` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
