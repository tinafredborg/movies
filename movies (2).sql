-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 07. 02 2017 kl. 11:43:26
-- Serverversion: 5.7.11
-- PHP-version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `film`
--

INSERT INTO `film` (`id`, `title`, `description`, `price`, `photo`) VALUES
(20, 'wonderwoman', 'movie about wonders', 50, 'asset/wonderwoman.jpg'),
(21, 'war for the planet of theapes', 'war and action', 65, 'asset/warfortheplanetoftheapes.jpg'),
(22, 'the last knight', 'science', 45, 'asset/transformers_thelastknight.jpg'),
(23, 'thor the viking', 'viking action', 70, 'asset/thor_ragnarok.jpg'),
(24, 'the space between us', 'romance', 50, 'asset/thespacebetweenus.jpg'),
(25, 'the last jedi', 'another starwar', 45, 'asset/starwars_thelastjedi.jpg'),
(26, 'spiderman', 'action', 55, 'asset/spiderman_homecoming.jpg'),
(27, 'power rangers', ' action', 25, 'asset/powerrangers.jpg'),
(28, 'dead man tell notales', 'pirates of the caribbean', 45, 'asset/piratesofthecaribbean_deadmantellnotales.jpg'),
(29, 'skullisland', 'action', 45, 'asset/kong_skullisland.jpg'),
(30, 'justice league', ' action', 55, 'justiceleague.jpg'),
(31, 'jumanji', 'funny games', 45, 'asset/jumanji.jpg'),
(32, 'guardians of the galaxy', 'science', 56, 'guardiansofthegalaxy_vol2.jpg'),
(33, 'ghost in the shell', 'family', 45, 'asset/ghostintheshell.jpg'),
(34, 'fifty shades', ' action', 65, 'asset/fiftyshades_darker.jpg'),
(35, 'dunkirk', 'war and action', 45, 'asset/dunkirk.jpg'),
(36, 'bladerunner', 'war and action', 55, 'asset/bladerunner_2049.jpg'),
(37, 'beauty and the beast', 'family', 45, 'asset/beautyandthebeast.jpg'),
(38, 'alien', 'science', 45, 'asset/alien_covenant.jpg');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `filmgenre`
--

CREATE TABLE `filmgenre` (
  `id` int(50) NOT NULL,
  `sciencfiction` varchar(100) NOT NULL,
  `familymovie` varchar(100) NOT NULL,
  `romantic` varchar(100) NOT NULL,
  `actionmovie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `genre`
--

CREATE TABLE `genre` (
  `filmId` int(50) NOT NULL,
  `filmgenreID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `movietags`
--

CREATE TABLE `movietags` (
  `filmId` int(11) NOT NULL,
  `tagsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'sci-fi '),
(2, 'fantasy'),
(3, 'romance'),
(4, 'family'),
(5, 'war'),
(6, 'spinderman'),
(7, 'pirates'),
(8, 'bladerunner'),
(9, 'alien'),
(10, 'triller');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `filmgenre`
--
ALTER TABLE `filmgenre`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`filmId`);

--
-- Indeks for tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Tilføj AUTO_INCREMENT i tabel `filmgenre`
--
ALTER TABLE `filmgenre`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
