-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 23. Jun 2018 um 17:08
-- Server-Version: 10.1.32-MariaDB
-- PHP-Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr10_sabine_steiger_biglibrary`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `author`
--

CREATE TABLE `author` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `surname` varchar(40) DEFAULT NULL,
  `pieces` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `author`
--

INSERT INTO `author` (`ID`, `first_name`, `surname`, `pieces`) VALUES
(1, 'Marc', 'Stürler', NULL),
(2, 'Marc', 'Stürler', NULL),
(3, 'Anna', 'Halprin', NULL),
(4, 'Gustavo', 'Dudamel', NULL),
(5, 'Edward W.', 'Said', NULL),
(6, 'Thomas Hylland', 'Eriksen', NULL),
(7, ' Jochen', 'Raiß', NULL),
(8, 'Richa', 'Hingle', NULL),
(9, 'Ernest', 'Hemingway', NULL),
(10, ' Ryū', 'Murakami', NULL),
(11, '', 'Niark', NULL),
(12, 'Amy', 'Liptrot', NULL),
(13, 'The', 'Regrettes', NULL),
(14, 'Nothing but', 'Thieves', NULL),
(15, 'We are', 'the Ocean', NULL),
(16, 'NO', 'FX', NULL),
(17, 'Cosmo ', 'Sheldrake', NULL),
(18, '', 'Beirut', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `city`
--

CREATE TABLE `city` (
  `ID` int(11) NOT NULL,
  `postal_code` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `city`
--

INSERT INTO `city` (`ID`, `postal_code`, `city`) VALUES
(1, 'SW10 0QJ', 'London'),
(2, '22419', 'Hamburg'),
(3, '85586', 'Poing'),
(4, '49587', 'City of Westminster'),
(5, '3982', 'London'),
(6, '10629', 'Berlin'),
(7, '875', 'London'),
(8, '21465', 'Reinbek'),
(9, '3982', 'Osaka'),
(10, '8764', 'Amsterdam'),
(11, '81673', 'München'),
(12, '5445', 'New York'),
(13, '3982', 'Hamburg'),
(14, '4321', 'London'),
(15, '3465', 'New York'),
(16, '4458', 'Berlin'),
(17, '3948', 'Athen');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `genre`
--

CREATE TABLE `genre` (
  `ID` int(11) NOT NULL,
  `genre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `genre`
--

INSERT INTO `genre` (`ID`, `genre`) VALUES
(1, 'Drama'),
(2, 'Romance'),
(3, 'Social Science'),
(4, 'Documentary'),
(5, 'Spiritual'),
(6, 'Childrens'),
(7, 'Cookbooks'),
(8, 'Biographies and Autobiographie'),
(9, 'Fantasy'),
(10, 'Punk'),
(11, 'Alternative'),
(12, 'Pop');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lending`
--

CREATE TABLE `lending` (
  `ID` int(11) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `fk_users` int(11) DEFAULT NULL,
  `fk_media` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `media`
--

CREATE TABLE `media` (
  `ISBN` int(11) NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `img` text,
  `publishing_date` date DEFAULT NULL,
  `short_description` varchar(100) DEFAULT NULL,
  `fk_author` int(11) DEFAULT NULL,
  `fk_publisher` int(11) DEFAULT NULL,
  `fk_media_type` int(11) DEFAULT NULL,
  `fk_genre` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `media`
--

INSERT INTO `media` (`ISBN`, `title`, `img`, `publishing_date`, `short_description`, `fk_author`, `fk_publisher`, `fk_media_type`, `fk_genre`) VALUES
(7654, 'Der alte Mann und das Meer', 'https://images-na.ssl-images-amazon.com/images/I/41rPt7iA8rL._SX301_BO1,204,203,200_.jpg', '2014-00-00', 'Hemingways faszinierende Novelle über den kubanischen Fischer Santiago. Allein fährt er in einem kle', 9, 11, 1, 1),
(8594, 'Feel Your Feelings Fool!', 'https://images-na.ssl-images-amazon.com/images/I/81F83oD%2BG9L._SX522_.jpg', '2017-00-00', '\r\nSeashore \r\nJuicebox Baby\r\n\'Til Tomorrow\r\nPale Skin	\r\nLacy Loo	\r\nHead in the Clouds', 13, 17, 2, 12),
(8754, 'Monsters: 11 monsters in 3D om zelf te m', 'https://images-eu.ssl-images-amazon.com/images/I/5184S8W5JmL._AC_US436_QL65_.jpg', '2014-00-00', 'Met de reeks Paper Toys wordt knutselen eenvoudig: zonder schaar en zonder lijm maak je de mooiste 3', 11, 13, 1, 6),
(29409, 'Breath made visible\r\n', 'https://images-na.ssl-images-amazon.com/images/I/81-BPbsJh7L._SY679_.jpg', '2004-00-00', 'Jeder ist ein Tänzer/eine Tänzerin - dies ist der Leitspruch einer der bedeutendsten Pionierinnen de', 3, 6, 3, 4),
(48593, 'Touch the Sound - A Sound Journey with E', 'https://images-na.ssl-images-amazon.com/images/I/51E5%2BlURInL.jpg', '2015-00-00', 'Von den Geräuschen, Klängen und Rhythmen des Alltags bis zu den Ursprüngen des Klangs. Vom Atem zum ', 1, 1, 3, 4),
(49230, 'El Sistema', 'https://images-na.ssl-images-amazon.com/images/I/71%2BaVVDqGDL._SY679_.jpg', '2018-00-00', 'Seit mehr als dreißig Jahren errichtet José Antonio Abreu in Venezuela das \'Sistema\' - ein Netzwerk ', 1, 16, 3, 4),
(85376, 'Nachtlichter', 'https://images-na.ssl-images-amazon.com/images/I/613ZUxumgZL._SX309_BO1,204,203,200_.jpg', '2017-00-00', 'Die ursprüngliche Kraft einer einzigartigen Landschaft lässt alte Wunden heilen: Mit Anfang dreißig ', 12, 14, 1, 1),
(293847, 'Das Casting: Romanvorlage zum Film Audit', 'https://images-na.ssl-images-amazon.com/images/I/51bLRPaKxnL._SX314_BO1,204,203,200_.jpg', '2018-00-00', 'Seit dem Tod seiner Frau vor 7 Jahren hatte Dokumentarfilmer Aoyama keine einzige Verabredung. Nachd', 10, 12, 1, 9),
(483945, 'Ark', 'https://images-eu.ssl-images-amazon.com/images/I/51ylefiWBVL._SS500_PIPJStripe-Robin-Large-V2,TopLeft,0,0.jpg', '2015-00-00', 'lorem ipsum', 15, 15, 2, 11),
(593985, 'Broken Machine', 'https://images-eu.ssl-images-amazon.com/images/I/41YhdIRPrsL._SS500.jpg', '2017-00-00', 'ipsum lorem', 14, 16, 2, 11),
(876554, 'Vegane Indische Küche: Traditionelle und', 'https://images-na.ssl-images-amazon.com/images/I/613X8cgsTZL._SX400_BO1,204,203,200_.jpg', '2016-00-00', '- ein kulinarischer Reiseführer durch die Vielfalt der indischen Küche\r\n- die besten Rezepte von ein', 8, 8, 1, 7),
(4584783, 'The Greatest Songs Ever Written', 'https://images-eu.ssl-images-amazon.com/images/I/61L7bzixgWL._SS500_PIPJStripe-Robin-Large-V2,TopLeft,0,0.jpg', '2004-00-00', 'ipsum loremius', 16, 18, 2, 10),
(47588393, 'The Much Much How How and I', 'https://images-eu.ssl-images-amazon.com/images/I/6146CeU09KL._SS500.jpg', '2018-00-00', 'ipsumiumsiumsio', 17, 17, 2, 12),
(141187425, 'Orientalism: Western Conceptions of the ', 'https://images-na.ssl-images-amazon.com/images/I/51XaFHc9JzL._SX324_BO1,204,203,200_.jpg', '1995-00-00', '\'Orientalism\' is one of the greatest and most influential of books of ideas to be published since th', 5, 11, 1, 3),
(485858595, '	\r\nThe Rip Tide', 'https://images-eu.ssl-images-amazon.com/images/I/51Yd0RxgyPL._SS500.jpg', '2011-00-00', 'ipsuum', 18, 20, 2, 11),
(745335934, 'Small Places, Large Issues - Fourth Edit', 'https://images-na.ssl-images-amazon.com/images/I/519-KJVUnhL._SX311_BO1,204,203,200_.jpg', '2013-00-00', 'This concise introduction to social and cultural anthropology has become a modern classic, revealing', 6, 11, 1, 3),
(2147483647, 'Frauen auf Bäumen', 'https://images-na.ssl-images-amazon.com/images/I/61zHu8IEP2L._SX354_BO1,204,203,200_.jpg', '2018-00-00', '\'Ich verstehe nicht, wie man an einem Baum vorübergehen kann, ohne glücklich zu sein\', heißt es in F', 7, 9, 1, 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `media_type`
--

CREATE TABLE `media_type` (
  `ID` int(11) NOT NULL,
  `data_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `media_type`
--

INSERT INTO `media_type` (`ID`, `data_type`) VALUES
(1, 'book'),
(2, 'CD'),
(3, 'DVD');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `publisher`
--

CREATE TABLE `publisher` (
  `ID` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `address` varchar(55) DEFAULT NULL,
  `fk_city` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `publisher`
--

INSERT INTO `publisher` (`ID`, `name`, `address`, `fk_city`) VALUES
(1, 'Indigo', 'Hempshire Road 85', 1),
(5, 'Lighthouse Home Entertainment', 'Valvo Park, Tarpen 40 Haus 1c', 2),
(6, 'EuroArts Naxos Deutschland GmbH\r\n', 'Gruber Straße 70', 3),
(7, 'Penguin Classics', 'London Street 9', 5),
(8, 'Pluto Press', 'Archway Road 345', 4),
(9, 'Hatje Cantz Verlag', 'Mommsenstraße 27', 6),
(10, 'Unimedica ein Imprint der Narayana Verla', 'Norway Road 546', 7),
(11, 'Rowohlt Taschenbuch Verlag', 'Hamburger Straße 17', 7),
(12, 'Septime Verlag', 'Noshimaku 479', 9),
(13, 'Wpg Uitgevers Be - Strips & Kids', 'Rechkjevki 873', 10),
(14, 'btb Verlag', 'Neumarkter Str. 28', 11),
(15, 'Warner Bros. Records', 'Manhattan Street 9', 12),
(16, 'RCA Records Label', 'Leinerweg 19', 13),
(17, 'BMG Rights Management (UK) Ltd', 'Manchester Road 19', 14),
(18, 'Epitaph', 'Almond Road 40', 15),
(19, 'Transgressive', 'Wiener Straße 154', 16),
(20, 'Pompeii Records', 'Hokopulus 45', 17);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `user_first_name` varchar(30) NOT NULL,
  `user_surname` varchar(30) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_ID`, `user_first_name`, `user_surname`, `user_email`, `user_pass`) VALUES
(1, 'Erik', 'Petersen', 'petersen@hotmail.com', 'erik'),
(9, 'Helga', 'Hebertsen', 'murmur@aon.at', '333'),
(10, 'Monika', 'Hubertsen', 'finally@fugchen.com', '8989'),
(11, 'Maria', 'Hirschler', 'meineemail@gmail.com', '584'),
(12, 'Jeremy', 'Horser', 'esitpl@aon.at', '1818');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `lending`
--
ALTER TABLE `lending`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_media` (`fk_media`),
  ADD KEY `fk_users` (`fk_users`);

--
-- Indizes für die Tabelle `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `fk_media_type` (`fk_media_type`),
  ADD KEY `fk_author` (`fk_author`),
  ADD KEY `fk_publisher` (`fk_publisher`),
  ADD KEY `fk_genre` (`fk_genre`);

--
-- Indizes für die Tabelle `media_type`
--
ALTER TABLE `media_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_city` (`fk_city`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `author`
--
ALTER TABLE `author`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT für Tabelle `city`
--
ALTER TABLE `city`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `lending`
--
ALTER TABLE `lending`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `publisher`
--
ALTER TABLE `publisher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `lending`
--
ALTER TABLE `lending`
  ADD CONSTRAINT `lending_ibfk_1` FOREIGN KEY (`fk_media`) REFERENCES `media` (`ISBN`),
  ADD CONSTRAINT `lending_ibfk_2` FOREIGN KEY (`fk_media`) REFERENCES `media` (`ISBN`),
  ADD CONSTRAINT `lending_ibfk_3` FOREIGN KEY (`fk_users`) REFERENCES `users` (`user_ID`);

--
-- Constraints der Tabelle `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`fk_media_type`) REFERENCES `media_type` (`ID`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`fk_author`) REFERENCES `author` (`ID`),
  ADD CONSTRAINT `media_ibfk_3` FOREIGN KEY (`fk_publisher`) REFERENCES `publisher` (`ID`),
  ADD CONSTRAINT `media_ibfk_4` FOREIGN KEY (`fk_author`) REFERENCES `author` (`ID`),
  ADD CONSTRAINT `media_ibfk_5` FOREIGN KEY (`fk_publisher`) REFERENCES `publisher` (`ID`),
  ADD CONSTRAINT `media_ibfk_6` FOREIGN KEY (`fk_genre`) REFERENCES `genre` (`ID`);

--
-- Constraints der Tabelle `publisher`
--
ALTER TABLE `publisher`
  ADD CONSTRAINT `publisher_ibfk_1` FOREIGN KEY (`fk_city`) REFERENCES `city` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
