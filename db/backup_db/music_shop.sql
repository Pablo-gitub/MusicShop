-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Lug 14, 2021 alle 21:38
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
  `Titolo` varchar(30) NOT NULL,
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
(1, 'Physical Graffiti', 'Led Zeppelin', 'Physical_graffiti.jpg', '2LP set, on 180-gram vinyl in an exact replica sleeve. Remastered in 2015! Epic 1975 album includes \"Kashmir\" and \"Black Country Woman', 'Hard Rock', 23, 14, 1975),
(2, 'Beggars Banquet', 'Rolling Stones', 'Beggars_banquet.jpg', 'Beggars Banquet is the 10th studio album by English rock band the Rolling Stones.', 'Psychedelic Rock', 20, 5, 1968),
(3, 'The Wall', 'Pink Floyd', 'The_wall.jpg', 'The Wall is the eleventh studio album by the English rock band Pink Floyd, released on 30 November 1979 by Harvest and Columbia Records. It is a rock opera that explores Pink, a jaded Rockstar whose eventual self-imposed isolation from society forms a figurative wall', 'Rock & Roll', 22, 18, 1979),
(4, 'Let It Bleed', 'Rolling Stones', 'Let_it_bleed.jpg', 'Let It Bleed is the eighth British and tenth American studio album by English rock band the Rolling Stones, released in December 1969 by Decca Records in the United Kingdom and London Records in the United States. Released shortly after the band\'s 1969 American Tour, it is the follow-up to 1968\'s Beggars Banquet', 'Hard Rock', 22, 8, 1969);

-- --------------------------------------------------------

--
-- Struttura della tabella `Carrelli`
--

CREATE TABLE `Carrelli` (
  `Username` varchar(30) NOT NULL,
  `AlbumId` int(11) NOT NULL,
  `Quantità` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Ordini`
--

CREATE TABLE `Ordini` (
  `Id` int(11) NOT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Importo` float DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `OrdiniCarrello`
--

CREATE TABLE `OrdiniCarrello` (
  `IdOrdine` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `AlbumId` int(11) NOT NULL,
  `Quantità` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `OrdiniDati`
--

CREATE TABLE `OrdiniDati` (
  `IdOrdine` int(11) NOT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `Cognome` varchar(30) DEFAULT NULL,
  `Indirizzo` varchar(30) DEFAULT NULL,
  `Citta` varchar(30) DEFAULT NULL,
  `Stato` varchar(30) DEFAULT NULL,
  `CodP` smallint(11) DEFAULT NULL,
  `CCNumero` bigint(20) DEFAULT NULL,
  `CCScadenza` varchar(30) DEFAULT NULL,
  `CCVV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Utenti`
--

CREATE TABLE `Utenti` (
  `Username` varchar(30) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `Cognome` varchar(30) DEFAULT NULL,
  `Indirizzo` varchar(30) DEFAULT NULL,
  `Citta` varchar(30) DEFAULT NULL,
  `Stato` varchar(30) DEFAULT NULL,
  `CodP` int(11) DEFAULT NULL,
  `CCNumero` bigint(20) DEFAULT NULL,
  `CCScadenza` varchar(30) DEFAULT NULL,
  `CCVV` int(11) DEFAULT NULL,
  `Privilegi` tinyint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Album`
--
ALTER TABLE `Album`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `Ordini`
--
ALTER TABLE `Ordini`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `OrdiniCarrello`
--
ALTER TABLE `OrdiniCarrello`
  ADD KEY `IdOrdine` (`IdOrdine`);

--
-- Indici per le tabelle `OrdiniDati`
--
ALTER TABLE `OrdiniDati`
  ADD KEY `IdOrdine` (`IdOrdine`);

--
-- Indici per le tabelle `Utenti`
--
ALTER TABLE `Utenti`
  ADD PRIMARY KEY (`Username`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `OrdiniCarrello`
--
ALTER TABLE `OrdiniCarrello`
  ADD CONSTRAINT `Ord` FOREIGN KEY (`IdOrdine`) REFERENCES `Ordini` (`Id`);

--
-- Limiti per la tabella `OrdiniDati`
--
ALTER TABLE `OrdiniDati`
  ADD CONSTRAINT `Dati` FOREIGN KEY (`IdOrdine`) REFERENCES `Ordini` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
