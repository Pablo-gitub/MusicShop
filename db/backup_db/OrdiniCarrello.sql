-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Lug 14, 2021 alle 21:42
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
-- Struttura della tabella `OrdiniCarrello`
--

CREATE TABLE `OrdiniCarrello` (
  `IdOrdine` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `AlbumId` int(11) NOT NULL,
  `Quantità` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `OrdiniCarrello`
--
ALTER TABLE `OrdiniCarrello`
  ADD KEY `IdOrdine` (`IdOrdine`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `OrdiniCarrello`
--
ALTER TABLE `OrdiniCarrello`
  ADD CONSTRAINT `Ord` FOREIGN KEY (`IdOrdine`) REFERENCES `Ordini` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
