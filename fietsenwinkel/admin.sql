-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 06 jul 2021 om 00:34
-- Serverversie: 10.4.19-MariaDB-cll-lve
-- PHP-versie: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s157947_fietsenwinkel`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `date_time`) VALUES
(25, 'mito', '157472@student.horizoncollege.nl', '$2y$12$hc9XDjJeGyMmvJ8lJ4xXd.oPcPz79uKAYZUHdtm3iZLLp8ICsZtdy', '2021-07-03 13:43:13'),
(24, 'saus', 'saus@gmail.com', '$2y$12$TzUhGv1/h/xXeIBKpQh7v.oVawhCcE0J6YJYtKLUIsGnUOrn87HjO', '2021-07-02 23:20:19'),
(23, 'jason', 'jasonmito10@gmail.com', '$2y$12$fHOhKSbMqgAxoXgj8NDIJeL8OCMCergDbTmQunkq0LwjfF11FMrPG', '2021-07-02 23:02:22'),
(19, 'admin', 'admin@gmail.com', '$2y$12$L1/OzwPe0jHHFYXLVWliGeZLHtmQ4rOsmJtx725jUK37IR0j8FXum', '2021-06-21 19:42:35');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
