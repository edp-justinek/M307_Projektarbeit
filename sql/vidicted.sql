-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Jun 2021 um 09:05
-- Server-Version: 10.4.19-MariaDB
-- PHP-Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `vidicted`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lend`
--

CREATE TABLE `lend` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `mail` varchar(80) NOT NULL,
  `lenddate` date NOT NULL,
  `returndate` date NOT NULL,
  `returned` tinyint(1) NOT NULL,
  `fk_movieID` int(11) NOT NULL,
  `fk_membershipID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `membership`
--

CREATE TABLE `membership` (
  `ID` int(11) NOT NULL,
  `membershipstate` varchar(50) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `movie`
--

CREATE TABLE `movie` (
  `ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `lend`
--
ALTER TABLE `lend`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_membershipID` (`fk_membershipID`),
  ADD KEY `fk_movieID` (`fk_movieID`);

--
-- Indizes für die Tabelle `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `lend`
--
ALTER TABLE `lend`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `membership`
--
ALTER TABLE `membership`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `movie`
--
ALTER TABLE `movie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `lend`
--
ALTER TABLE `lend`
  ADD CONSTRAINT `lend_ibfk_1` FOREIGN KEY (`fk_membershipID`) REFERENCES `membership` (`ID`),
  ADD CONSTRAINT `lend_ibfk_2` FOREIGN KEY (`fk_movieID`) REFERENCES `movie` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
