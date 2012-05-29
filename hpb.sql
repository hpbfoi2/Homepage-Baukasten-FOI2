-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 08. Mai 2012 um 20:00
-- Server Version: 5.5.16
-- PHP-Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `hpb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hp_benutzer`
--

CREATE TABLE IF NOT EXISTS `hp_benutzer` (
  `be_pid` int(11) NOT NULL AUTO_INCREMENT,
  `be_username` varchar(50) NOT NULL,
  `be_passwort` varchar(50) NOT NULL,
  PRIMARY KEY (`be_pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `hp_benutzer`
--

INSERT INTO `hp_benutzer` (`be_pid`, `be_username`, `be_passwort`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin2', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'admin3', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hp_inhalt`
--

CREATE TABLE IF NOT EXISTS `hp_inhalt` (
  `in_pid` int(11) NOT NULL AUTO_INCREMENT,
  `in_we_pid` int(11) NOT NULL,
  `in_name` varchar(25) NOT NULL,
  `in_maintext` longtext NOT NULL,
  PRIMARY KEY (`in_pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Daten für Tabelle `hp_inhalt`
--

INSERT INTO `hp_inhalt` (`in_pid`, `in_we_pid`, `in_name`, `in_maintext`) VALUES
(1, 1, 'Verein', 'Der tolle FC Bayern München (offiziell: Fußball-Club Bayern, München eingetragener Verein)[1] ist ein Sportverein aus München. Die seit 2002 in eine eigene Aktiengesellschaft ausgegliederte Profifußballabteilung ist deutscher Rekordmeister, Rekordsieger im DFB-Pokal, Ligapokal sowie Supercup und belegt in der Ewigen Tabelle der Bundesliga den ersten Platz. Damit ist Bayern München im Profifußball der erfolgreichste deutsche Fußballverein.\r\n\r\nAuf europäischer Ebene gehört der FC Bayern mit sechs Europapokalsiegen, davon vier in der Champions League bzw. dem Europapokal der Landesmeister, zu den fünf erfolgreichsten Vereinen. Neben dem FC Barcelona, Juventus Turin und Ajax Amsterdam ist er einer der Vereine, die drei verschiedene europäische Pokalwettbewerbe gewinnen konnten. Zudem konnte er zweimal den Weltpokal gewinnen.\r\n\r\nAuch wirtschaftlich gehört der Verein zu den weltweit erfolgreichsten: Nach der Saison 2009/10 belegten die Bayern Rang vier in der Rangliste der umsatzstärksten Klubs und im April 2011 den gleichen Rang in der Liste der wertvollsten Vereine des Forbes Magazine.[2] Mit 171.345 Vereinsmitgliedern (Stand: 18. November 2011) ist der FC Bayern einer der mitgliederstärksten Sportvereine weltweit. Innerhalb der letzten zwölf Monate stieg die Zahl um über 11.000 Mitglieder. Der Verein hat 2952 offizielle Fanclubs (Vorjahr: 2764) mit insgesamt 204.235 registrierten Mitgliedern. Dies ist ein Anstieg von über 12.000 Mitgliedern.[3][4]\r\n\r\nSeit 1965 spielt der FC Bayern ununterbrochen in der Bundesliga, lediglich die ersten zwei Jahre nach Einführung der Bundesliga war die Mannschaft zweitklassig. Die zweite Mannschaft des FC Bayern spielt zurzeit in der viertklassigen Regionalliga Süd. Sie gewann in der Saison 2003/04 den Meistertitel in der damals noch drittklassigen Regionalliga Süd.\r\n\r\nZum FC Bayern gehören zudem weitere Abteilungen, die auch einige Erfolge aufweisen können. So wurden die derzeit in der Frauen-Bundesliga spielenden Fußballfrauen 1976 Deutscher Meister. Weitere Erfolge feierten die Basketballer mit zwei Meisterschaften und einem Pokalsieg, die Schachabteilung mit neun Deutschen Meisterschaften und einem Europapokalsieg sowie die Turner mit vier Deutschen Meisterschaften.'),
(2, 1, 'Spieler', 'Der geniale FC Bayern München (offiziell: Fußball-Club Bayern, München eingetragener Verein)[1] ist ein Sportverein aus München. Die seit 2002 in eine eigene Aktiengesellschaft ausgegliederte Profifußballabteilung ist deutscher Rekordmeister, Rekordsieger im DFB-Pokal, Ligapokal sowie Supercup und belegt in der Ewigen Tabelle der Bundesliga den ersten Platz. Damit ist Bayern München im Profifußball der erfolgreichste deutsche Fußballverein.\r\n\r\nAuf europäischer Ebene gehört der FC Bayern mit sechs Europapokalsiegen, davon vier in der Champions League bzw. dem Europapokal der Landesmeister, zu den fünf erfolgreichsten Vereinen. Neben dem FC Barcelona, Juventus Turin und Ajax Amsterdam ist er einer der Vereine, die drei verschiedene europäische Pokalwettbewerbe gewinnen konnten. Zudem konnte er zweimal den Weltpokal gewinnen.\r\n\r\nAuch wirtschaftlich gehört der Verein zu den weltweit erfolgreichsten: Nach der Saison 2009/10 belegten die Bayern Rang vier in der Rangliste der umsatzstärksten Klubs und im April 2011 den gleichen Rang in der Liste der wertvollsten Vereine des Forbes Magazine.[2] Mit 171.345 Vereinsmitgliedern (Stand: 18. November 2011) ist der FC Bayern einer der mitgliederstärksten Sportvereine weltweit. Innerhalb der letzten zwölf Monate stieg die Zahl um über 11.000 Mitglieder. Der Verein hat 2952 offizielle Fanclubs (Vorjahr: 2764) mit insgesamt 204.235 registrierten Mitgliedern. Dies ist ein Anstieg von über 12.000 Mitgliedern.[3][4]\r\n\r\nSeit 1965 spielt der FC Bayern ununterbrochen in der Bundesliga, lediglich die ersten zwei Jahre nach Einführung der Bundesliga war die Mannschaft zweitklassig. Die zweite Mannschaft des FC Bayern spielt zurzeit in der viertklassigen Regionalliga Süd. Sie gewann in der Saison 2003/04 den Meistertitel in der damals noch drittklassigen Regionalliga Süd.\r\n\r\nZum FC Bayern gehören zudem weitere Abteilungen, die auch einige Erfolge aufweisen können. So wurden die derzeit in der Frauen-Bundesliga spielenden Fußballfrauen 1976 Deutscher Meister. Weitere Erfolge feierten die Basketballer mit zwei Meisterschaften und einem Pokalsieg, die Schachabteilung mit neun Deutschen Meisterschaften und einem Europapokalsieg sowie die Turner mit vier Deutschen Meisterschaften.'),
(3, 1, 'Stadion', 'Der super tolle FC Bayern München (offiziell: Fußball-Club Bayern, München eingetragener Verein)[1] ist ein Sportverein aus München. Die seit 2002 in eine eigene Aktiengesellschaft ausgegliederte Profifußballabteilung ist deutscher Rekordmeister, Rekordsieger im DFB-Pokal, Ligapokal sowie Supercup und belegt in der Ewigen Tabelle der Bundesliga den ersten Platz. Damit ist Bayern München im Profifußball der erfolgreichste deutsche Fußballverein.\r\n\r\nAuf europäischer Ebene gehört der FC Bayern mit sechs Europapokalsiegen, davon vier in der Champions League bzw. dem Europapokal der Landesmeister, zu den fünf erfolgreichsten Vereinen. Neben dem FC Barcelona, Juventus Turin und Ajax Amsterdam ist er einer der Vereine, die drei verschiedene europäische Pokalwettbewerbe gewinnen konnten. Zudem konnte er zweimal den Weltpokal gewinnen.\r\n\r\nAuch wirtschaftlich gehört der Verein zu den weltweit erfolgreichsten: Nach der Saison 2009/10 belegten die Bayern Rang vier in der Rangliste der umsatzstärksten Klubs und im April 2011 den gleichen Rang in der Liste der wertvollsten Vereine des Forbes Magazine.[2] Mit 171.345 Vereinsmitgliedern (Stand: 18. November 2011) ist der FC Bayern einer der mitgliederstärksten Sportvereine weltweit. Innerhalb der letzten zwölf Monate stieg die Zahl um über 11.000 Mitglieder. Der Verein hat 2952 offizielle Fanclubs (Vorjahr: 2764) mit insgesamt 204.235 registrierten Mitgliedern. Dies ist ein Anstieg von über 12.000 Mitgliedern.[3][4]\r\n\r\nSeit 1965 spielt der FC Bayern ununterbrochen in der Bundesliga, lediglich die ersten zwei Jahre nach Einführung der Bundesliga war die Mannschaft zweitklassig. Die zweite Mannschaft des FC Bayern spielt zurzeit in der viertklassigen Regionalliga Süd. Sie gewann in der Saison 2003/04 den Meistertitel in der damals noch drittklassigen Regionalliga Süd.\r\n\r\nZum FC Bayern gehören zudem weitere Abteilungen, die auch einige Erfolge aufweisen können. So wurden die derzeit in der Frauen-Bundesliga spielenden Fußballfrauen 1976 Deutscher Meister. Weitere Erfolge feierten die Basketballer mit zwei Meisterschaften und einem Pokalsieg, die Schachabteilung mit neun Deutschen Meisterschaften und einem Europapokalsieg sowie die Turner mit vier Deutschen Meisterschaften.'),
(4, 1, 'test', ''),
(5, 1, 'test2', ''),
(8, 2, 'Projekt', '<b>Test Projekt</b>\r\n'),
(9, 2, 'Dokumentation', ''),
(10, 2, 'Klasse', ''),
(11, 2, 'Team', ''),
(12, 2, 'Lehrer', ''),
(13, 2, 'Stundenplan', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hp_webseite`
--

CREATE TABLE IF NOT EXISTS `hp_webseite` (
  `we_pid` int(11) NOT NULL AUTO_INCREMENT,
  `we_be_pid` int(11) NOT NULL,
  `we_name` varchar(100) NOT NULL,
  `we_layout` varchar(25) NOT NULL,
  PRIMARY KEY (`we_pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `hp_webseite`
--

INSERT INTO `hp_webseite` (`we_pid`, `we_be_pid`, `we_name`, `we_layout`) VALUES
(1, 1, 'fcbayern', 'layout.css'),
(2, 2, 'schule', 'layout2.css'),
(3, 3, 'homepage', 'layout3.css');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
