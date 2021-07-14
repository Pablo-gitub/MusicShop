-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Lug 14, 2021 alle 22:52
-- Versione del server: 10.4.17-MariaDB
-- Versione PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_shop`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Album`
--

CREATE TABLE `Album` (
  `Id` int(11) NOT NULL,
  `Titolo` varchar(255) NOT NULL,
  `Band` varchar(30) NOT NULL,
  `Imgalbum` varchar(1000) NOT NULL,
  `Descrizione` varchar(500) NOT NULL,
  `Genere` varchar(30) NOT NULL,
  `Prezzo` int(11) NOT NULL,
  `Rimanenza` int(11) NOT NULL,
  `Anno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Album`
--

INSERT INTO `Album` (`Id`, `Titolo`, `Band`, `Imgalbum`, `Descrizione`, `Genere`, `Prezzo`, `Rimanenza`, `Anno`) VALUES
(1, 'Physical Graffiti', 'Led Zeppelin', 'https://media.npr.org/assets/img/2015/02/24/led-zeppelin-physical-graffiti-cover_sq-8464edf18ecaee1711cc38586e67632c62661792-s1100-c15.jpg', '2LP set, on 180-gram vinyl in an exact replica sleeve. Remastered in 2015! Epic 1975 album includes \"Kashmir\" and \"Black Country Woman', 'Hard Rock', 23, 14, 1975),
(2, 'Beggars Banquet', 'Rolling Stones', 'https://img.discogs.com/5czctdjr3Ja0UOztJiaUEGKihGM=/fit-in/600x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-2305741-1432104330-6520.jpeg.jpg', 'Beggars Banquet is the 10th studio album by English rock band the Rolling Stones.', 'Psychedelic Rock', 20, 5, 1968),
(3, 'The Wall', 'Pink Floyd', 'https://www.covermesongs.com/wp-content/uploads/2010/09/PinkFloydTheWall.jpg', 'The Wall is the eleventh studio album by the English rock band Pink Floyd, released on 30 November 1979 by Harvest and Columbia Records. It is a rock opera that explores Pink, a jaded Rockstar whose eventual self-imposed isolation from society forms a figurative wall', 'Rock & Roll', 22, 18, 1979),
(4, 'Let It Bleed', 'Rolling Stones', 'https://www.mesdisquesvinyles.com/wp-content/uploads/2015/06/rolling_stones_let_it_bleed_1.jpg', 'Let It Bleed is the eighth British and tenth American studio album by English rock band the Rolling Stones, released in December 1969 by Decca Records in the United Kingdom and London Records in the United States. Released shortly after the band\'s 1969 American Tour, it is the follow-up to 1968\'s Beggars Banquet', 'Hard Rock', 22, 8, 1969);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Album`
--
ALTER TABLE `Album`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
