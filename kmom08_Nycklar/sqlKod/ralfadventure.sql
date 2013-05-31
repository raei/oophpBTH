-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 13 maj 2013 kl 18:23
-- Serverversion: 5.5.24-log
-- PHP-version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `ralfadventure`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namn` varchar(100) NOT NULL,
  `event` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumpning av Data i tabell `action`
--

INSERT INTO `action` (`id`, `namn`, `event`) VALUES
(1, 'Drick vatten ur flaskan', 'increaseHealthBy5'),
(2, 'Ät ett päron', 'eatFruit'),
(3, 'Spela kort', 'playGameHighLow'),
(4, 'Ät en banan', 'eatFruit'),
(5, 'Ät en jordgubbe', 'eatFruit'),
(6, 'Till startsidan', 'start'),
(7, 'Kasta tärning', 'dice'),
(8, 'Spela hangman', 'hangman'),
(9, 'Ät ett äpple', 'eatAppel');

-- --------------------------------------------------------

--
-- Tabellstruktur `rum`
--

CREATE TABLE IF NOT EXISTS `rum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namn` varchar(100) NOT NULL,
  `beskrivning` text NOT NULL,
  `grafik` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumpning av Data i tabell `rum`
--

INSERT INTO `rum` (`id`, `namn`, `beskrivning`, `grafik`) VALUES
(1, 'Hamnen', 'Du är strandsatt på en öde ö. Båten som kan ta dig hem är låst med ett stort hänglås. En säker död väntar dig om du inte lyckas hitta nyckeln. Lycka till!', '<embed type="image/svg+xml" src="img/stranden.svg" width="707" height="480" />'),
(2, 'Vägkorsning', 'Du kommer till en vägkorsning. Här måste du fundera noga på vilken väg du ska ta. ', '<embed type="image/svg+xml" src="img/crossroad.svg" width="707" height="480" />'),
(3, 'Grottöppning', 'Framför dig finns en lucka av trä i marken. När du öppnar den ser du trappsteg som leder ner i en grotta. Det ser mörkt och kallt ut i grottan, men ändå lite spännande. Se upp du vet aldrig vad som väntar i mörkret.', '<embed type="image/svg+xml" src="img/utgrotta.svg" width="707" height="480" />'),
(4, 'Grotta', 'Du är mitt i den djupa grottan. Du ser inte särskilt bra. Endast ett svagt ljussken lyser bakom dig från en gammal oljelampa. Antingen sticker du eller så spelar du hangman.', '<embed type="image/svg+xml" src="img/cave.svg" width="707" height="480" />'),
(5, 'Eldplatsen', 'Du finner mat vid eldstaden framför passa på att vila.', '<embed type="image/svg+xml" src="img/eldplatsen.svg" width="707\n" height="480" />'),
(6, 'Djupa skogen', 'Du är mitt i skogen och ser lite vilsen ut. Det ser nästan ut som om det börjar mörkna, men kanske är det bara ett moln... Du ser dig om och funderar åt vilket håll som du bör fortsätta... Nu gäller det...', '<embed type="image/svg+xml" src="img/djupa_skogen.svg" width="707" height="480" />'),
(7, 'Stranden', 'Du kommer fram till stranden. Det är en vacker plats och du sätter dig på bänken och funderar över var nyckeln kan finnas så du kan åka hem. Plötsligt ser du en liten låda. Du öppnar den och hittar några tärningar och ett brev. Där står: Kasta tärningarna om du vill komma hem. Hälsningar En Vän!', '<embed type="image/svg+xml" src="img/havet.svg" width="707" height="480" />'),
(8, 'Hemliga staden', 'Du kommer fram till en väldigt konstig stad. Se dig omkring. ', '<embed type="image/svg+xml" src="img/hemligstad.svg" width="707" height="480" />'),
(9, 'Spelstigen', 'Du vandrar längs vägen och ser en man. Han ser ut att ha en kortlek. Han vill nog spela kort med dig. ', '<embed type="image/svg+xml" src="img/spelstigen.svg" width="707" height="480" />'),
(10, 'Borgen', 'Du står i en glänta mitt framför en historisk och magisk borg. Den här platsen verkar spännande. Här kanske nyckeln finns. Det står en flaska vatten i gräset.', '<embed type="image/svg+xml" src="img/borgen.svg" width="707" height="480" />'),
(11, 'Hemresa', 'Tack för hjälpen nu seglar jag hem.', '<embed type="image/svg+xml" src="img/slut.svg" width="707" height="480" />');

-- --------------------------------------------------------

--
-- Tabellstruktur `rumaction`
--

CREATE TABLE IF NOT EXISTS `rumaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Rum` int(11) NOT NULL,
  `id_Action` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumpning av Data i tabell `rumaction`
--

INSERT INTO `rumaction` (`id`, `id_Rum`, `id_Action`) VALUES
(1, 7, 4),
(4, 10, 1),
(5, 5, 2),
(6, 9, 3),
(8, 6, 5),
(9, 11, 6),
(10, 8, 7),
(11, 4, 8),
(12, 3, 9);

-- --------------------------------------------------------

--
-- Tabellstruktur `rumkoppling`
--

CREATE TABLE IF NOT EXISTS `rumkoppling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Rum1` int(11) NOT NULL,
  `id_Rum2` int(11) NOT NULL,
  `namn` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumpning av Data i tabell `rumkoppling`
--

INSERT INTO `rumkoppling` (`id`, `id_Rum1`, `id_Rum2`, `namn`) VALUES
(1, 1, 2, 'Följ stigen in i skogen'),
(2, 2, 3, 'Vänster'),
(3, 2, 6, 'Raktfram'),
(4, 3, 4, 'Gå in i grottan'),
(5, 4, 3, 'Grottöppningen'),
(6, 3, 2, 'Vägkorsningen'),
(8, 1, 7, 'Stranden'),
(9, 7, 1, 'Hamnen'),
(10, 7, 8, 'Hemliga staden'),
(11, 8, 7, 'Stranden'),
(13, 9, 5, 'Eldplatsen'),
(15, 6, 10, 'Borgen'),
(17, 10, 6, 'Djupa skogen'),
(19, 5, 9, 'Spelstigen'),
(20, 2, 5, 'Höger'),
(22, 2, 1, 'Tillbaka'),
(23, 5, 2, 'Vägkorsningen'),
(24, 6, 2, 'Vägkorsningen'),
(28, 3, 1, 'Hamnen');

-- --------------------------------------------------------

--
-- Tabellstruktur `ryggsack`
--

CREATE TABLE IF NOT EXISTS `ryggsack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `saker` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
