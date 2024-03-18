-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 11:07 AM
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `molkky`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gracze`
--

CREATE TABLE `gracze` (
  `ID` int(11) NOT NULL,
  `Nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gracze`
--

INSERT INTO `gracze` (`ID`, `Nazwa`) VALUES
(1, 'Ążej'),
(2, 'Michu'),
(3, 'Ździchu');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mecz`
--

CREATE TABLE `mecz` (
  `ID` int(11) NOT NULL,
  `ID_G1` int(11) NOT NULL,
  `ID_G2` int(11) NOT NULL,
  `Data` date NOT NULL,
  `wygrany` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mecz`
--

INSERT INTO `mecz` (`ID`, `ID_G1`, `ID_G2`, `Data`, `wygrany`) VALUES
(2, 1, 2, '2024-03-18', 1),
(7, 2, 3, '2024-03-18', 2),
(8, 1, 3, '2024-03-18', 3),
(9, 2, 3, '2024-03-18', 3),
(10, 1, 2, '2024-03-18', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rzuty`
--

CREATE TABLE `rzuty` (
  `ID` int(11) NOT NULL,
  `ID_Meczu` int(11) NOT NULL,
  `ID_Gracza` int(11) NOT NULL,
  `punkty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rzuty`
--

INSERT INTO `rzuty` (`ID`, `ID_Meczu`, `ID_Gracza`, `punkty`) VALUES
(18, 2, 2, 4),
(19, 2, 1, 2),
(20, 2, 2, 2),
(21, 2, 2, 4),
(22, 2, 1, 8),
(23, 2, 2, 2),
(24, 2, 1, 5),
(25, 2, 1, 12),
(26, 2, 2, 9),
(27, 2, 1, 9),
(28, 2, 2, 2),
(29, 2, 1, 12),
(30, 2, 2, 11),
(31, 2, 1, 2),
(32, 7, 2, 0),
(33, 7, 3, 6),
(34, 7, 2, 7),
(35, 7, 3, 2),
(36, 7, 2, 11),
(37, 7, 3, 7),
(38, 7, 2, 6),
(39, 7, 3, 6),
(40, 7, 2, 10),
(41, 7, 3, 12),
(42, 7, 2, 4),
(43, 7, 3, 1),
(44, 7, 2, 0),
(45, 7, 3, 0),
(46, 7, 2, 0),
(47, 7, 2, 12),
(48, 8, 1, 0),
(49, 8, 3, 3),
(50, 8, 1, 0),
(51, 8, 3, 8),
(52, 8, 1, 6),
(53, 8, 3, 0),
(54, 8, 1, 0),
(55, 8, 3, 7),
(56, 8, 1, 0),
(57, 8, 3, 11),
(58, 8, 1, 0),
(59, 9, 2, 3),
(60, 9, 3, 12),
(61, 9, 2, 8),
(62, 9, 3, 3),
(63, 9, 2, 7),
(64, 9, 3, 9),
(65, 9, 2, 11),
(66, 9, 3, 2),
(67, 9, 2, 12),
(68, 9, 3, 12),
(69, 9, 2, 12),
(70, 9, 3, 11),
(71, 9, 2, 9),
(72, 9, 3, 3),
(73, 9, 2, 3),
(74, 9, 3, 0),
(75, 9, 2, 0),
(76, 9, 3, 0),
(77, 9, 2, 0),
(78, 9, 3, 5),
(79, 9, 2, 0),
(80, 9, 3, 0),
(81, 9, 3, 0),
(82, 10, 1, 11),
(83, 10, 2, 8),
(84, 10, 1, 0),
(85, 10, 2, 0),
(86, 10, 1, 3),
(87, 10, 2, 0),
(88, 10, 1, 2),
(89, 10, 2, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `gracze`
--
ALTER TABLE `gracze`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `mecz`
--
ALTER TABLE `mecz`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `rzuty`
--
ALTER TABLE `rzuty`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gracze`
--
ALTER TABLE `gracze`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mecz`
--
ALTER TABLE `mecz`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rzuty`
--
ALTER TABLE `rzuty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
