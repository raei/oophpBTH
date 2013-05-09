-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Värd: blu-ray.student.bth.se
-- Skapad: 28 mars 2013 kl 13:20
-- Serverversion: 5.0.51
-- PHP-version: 5.3.3-7+squeeze15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `raer12`
--

-- --------------------------------------------------------

--
-- Struktur för tabell `Kompis`
--

DROP TABLE IF EXISTS `Kompis`;
CREATE TABLE IF NOT EXISTS `Kompis` (
  `id` int(11) NOT NULL auto_increment,
  `namn` varchar(40) NOT NULL,
  `fodd` date NOT NULL,
  `smeknamn` char(8) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Data i tabell `Kompis`
--

INSERT INTO `Kompis` (`id`, `namn`, `fodd`, `smeknamn`) VALUES
(1, 'Mikael Roos', '2002-03-19', 'mos'),
(2, 'Börje Halt', '1988-03-07', 'hultarn'),
(3, 'Ralf Eriksson', '1963-07-07', 'Raffe'),
(4, 'John Larsson', '1971-10-10', 'jonte'),
(5, 'Lars Pettersson', '1967-01-20', 'lasse'),
(6, 'Johan Eriksson', '1950-12-24', 'joh'),
(7, 'Kurt Larsson', '2000-10-10', 'kurre');

-- --------------------------------------------------------

--
-- Struktur för tabell `KompisUtrustning`
--

DROP TABLE IF EXISTS `KompisUtrustning`;
CREATE TABLE IF NOT EXISTS `KompisUtrustning` (
  `id` int(11) NOT NULL auto_increment,
  `id_Kompis` int(11) NOT NULL,
  `id_Utrustning` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Data i tabell `KompisUtrustning`
--

INSERT INTO `KompisUtrustning` (`id`, `id_Kompis`, `id_Utrustning`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 5),
(4, 4, 1),
(5, 4, 2),
(6, 5, 1),
(7, 5, 2),
(8, 5, 5);

-- --------------------------------------------------------

--
-- Struktur för tabell `Utrustning`
--

DROP TABLE IF EXISTS `Utrustning`;
CREATE TABLE IF NOT EXISTS `Utrustning` (
  `id` int(11) NOT NULL auto_increment,
  `typ` varchar(40) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Data i tabell `Utrustning`
--

INSERT INTO `Utrustning` (`id`, `typ`) VALUES
(1, 'TV-spel'),
(2, 'Dator '),
(3, 'Tonårsrum'),
(4, 'Pengar');

-- --------------------------------------------------------

--
-- Ersättningsstruktur för visning `VKompis`
--
DROP VIEW IF EXISTS `VKompis`;
CREATE TABLE IF NOT EXISTS `VKompis` (
`id` int(11)
,`namn` varchar(40)
,`fodd` date
,`smeknamn` char(8)
,`alder` int(6)
);
-- --------------------------------------------------------

--
-- Ersättningsstruktur för visning `VKompisUtrustning`
--
DROP VIEW IF EXISTS `VKompisUtrustning`;
CREATE TABLE IF NOT EXISTS `VKompisUtrustning` (
`Id` int(11)
,`Namn` varchar(40)
,`Smeknamn` char(8)
,`Fodd` date
,`Utrustning` varchar(40)
,`id_Kompis` int(11)
,`id_Utrustning` int(11)
);
-- --------------------------------------------------------

--
-- Struktur för visning `VKompis`
--
DROP TABLE IF EXISTS `VKompis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`raer12`@`` SQL SECURITY DEFINER VIEW `VKompis` AS select `Kompis`.`id` AS `id`,`Kompis`.`namn` AS `namn`,`Kompis`.`fodd` AS `fodd`,`Kompis`.`smeknamn` AS `smeknamn`,((year(curdate()) - year(`Kompis`.`fodd`)) - (right(curdate(),5) < right(`Kompis`.`fodd`,5))) AS `alder` from `Kompis`;

-- --------------------------------------------------------

--
-- Struktur för visning `VKompisUtrustning`
--
DROP TABLE IF EXISTS `VKompisUtrustning`;

CREATE ALGORITHM=UNDEFINED DEFINER=`raer12`@`` SQL SECURITY DEFINER VIEW `VKompisUtrustning` AS select `KU`.`id` AS `Id`,`K`.`namn` AS `Namn`,`K`.`smeknamn` AS `Smeknamn`,`K`.`fodd` AS `Fodd`,`U`.`typ` AS `Utrustning`,`KU`.`id_Kompis` AS `id_Kompis`,`KU`.`id_Utrustning` AS `id_Utrustning` from ((`Kompis` `K` join `Utrustning` `U`) join `KompisUtrustning` `KU`) where ((`K`.`id` = `KU`.`id_Kompis`) and (`U`.`id` = `KU`.`id_Utrustning`));
