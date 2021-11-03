-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 okt 2021 om 12:25
-- Serverversie: 10.4.19-MariaDB
-- PHP-versie: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examentraining`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `accounts`
--

CREATE TABLE `accounts` (
  `idaccounts` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 3,
  `categorie` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `accounts`
--

INSERT INTO `accounts` (`idaccounts`, `email`, `password`, `role`, `categorie`) VALUES
(1, 'kaja@gmail.com', '7cf0b7ff10de3df1ef0a253a79d9a70fac0d0b19', 1, 'ict'),
(3, 'kaja1@gmail.com', '123', 1, 'waarde2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `idcomments` int(11) NOT NULL,
  `titel` varchar(45) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `news_idnews` int(11) NOT NULL,
  `accepted` int(11) NOT NULL DEFAULT 0,
  `geplaatst_door` varchar(60) DEFAULT 'Anoniem'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `comments`
--

INSERT INTO `comments` (`idcomments`, `titel`, `description`, `news_idnews`, `accepted`, `geplaatst_door`) VALUES
(4, 'Titel nummer 1', 'Nummer 2 met alles en niks maar toch met alles omdat alles toch eigenlijk niks is. 5 sterren.', 13, 1, 'Anoniem'),
(7, '', '', 13, 1, ''),
(10, 'huhuu', 'huhu', 13, 0, 'je');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT 'Anoniem',
  `bericht` varchar(400) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `onderwerp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`id`, `email`, `bericht`, `status`, `onderwerp`) VALUES
(1, 'ka@gmail.com', 'djawudhawuidhawudwahduahwdiaw', 1, 'daw'),
(3, 'Anoniem', 'dawdawdawdawd', 2, 'dwadawdawdawdawdawdawd');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `files`
--

CREATE TABLE `files` (
  `idfiles` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `path` varchar(45) NOT NULL,
  `categorie` enum('ict','waarde2') DEFAULT NULL,
  `uploaded_by` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `files`
--

INSERT INTO `files` (`idfiles`, `name`, `path`, `categorie`, `uploaded_by`, `date`) VALUES
(3, 'Mijn project.docx', 'Mijn project.docx', 'ict', 'kaja@gmail.com', '2021-10-01 06:58:30');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `friends`
--

CREATE TABLE `friends` (
  `idfriends` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `logo_path` varchar(45) DEFAULT NULL,
  `categorie` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `friends`
--

INSERT INTO `friends` (`idfriends`, `name`, `url`, `logo_path`, `categorie`) VALUES
(1, 'Kajaa', 'www.kajakoenders.nl', '/path/logo/logo.png', 'ICT'),
(2, 'Kajaa', 'www.kajakoenders.nl', '/path/logo/logo.png', 'ICT');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news`
--

CREATE TABLE `news` (
  `idnews` int(11) NOT NULL,
  `headtext` varchar(45) DEFAULT NULL,
  `coltext` varchar(245) DEFAULT NULL,
  `newstext` varchar(600) DEFAULT NULL,
  `picture_path` varchar(300) DEFAULT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `news`
--

INSERT INTO `news` (`idnews`, `headtext`, `coltext`, `newstext`, `picture_path`, `datum`) VALUES
(13, 'dylan', NULL, 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by a', 'IMG-20210912-WA0006.jpg', '2021-09-28 10:47:42'),
(15, 'Titel nieuws', NULL, 'djawiodawjdoi', 'Untitled.png', '2021-09-28 11:25:02'),
(21, 'test', NULL, 'test', 'image-w1280.jpg', '2021-10-06 08:11:06');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`idaccounts`);

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`idcomments`),
  ADD KEY `fk_comments_news1_idx` (`news_idnews`);

--
-- Indexen voor tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`idfiles`);

--
-- Indexen voor tabel `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`idfriends`);

--
-- Indexen voor tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idnews`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `accounts`
--
ALTER TABLE `accounts`
  MODIFY `idaccounts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `idcomments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `files`
--
ALTER TABLE `files`
  MODIFY `idfiles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `friends`
--
ALTER TABLE `friends`
  MODIFY `idfriends` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `news`
--
ALTER TABLE `news`
  MODIFY `idnews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_news1` FOREIGN KEY (`news_idnews`) REFERENCES `news` (`idnews`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
