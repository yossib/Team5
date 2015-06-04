-- Team 5 - if you make changes to the database, make an export and replace this file with the exported file (and keep this line :))

-- phpMyAdmin SQL Dump
-- version 4.0.9deb1.precise~ppa.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2015 at 09:30 AM
-- Server version: 5.5.37-0ubuntu0.12.04.1-log
-- PHP Version: 5.4.30-2+deb.sury.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `team5`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short_description` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `location` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `company_event` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `events`
--

INSERT IGNORE INTO `events` (`id`, `short_description`, `created_by`, `start_time`, `end_time`, `location`, `description`, `company_event`) VALUES
  (1, 'Party at my house!', 7, '2015-06-06 22:00:00', '2015-06-07 03:00:00', 'Yuval''s house', 'Excellent party!!!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_attendees`
--

CREATE TABLE IF NOT EXISTS `event_attendees` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_attendees`
--

INSERT IGNORE INTO `event_attendees` (`event_id`, `user_id`) VALUES
  (1, 2),
  (1, 4),
  (1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(2000) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts_comments`
--

CREATE TABLE IF NOT EXISTS `posts_comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(2000) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `position` varchar(50) NOT NULL,
  `description` varchar(256) NOT NULL,
  `work_start_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `system` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT IGNORE INTO `users` (`id`, `first_name`, `last_name`, `avatar`, `email`, `birthday`, `position`, `description`, `work_start_date`, `is_active`, `system`) VALUES
  (1, 'Abi', 'Saraga', '', 'abi@genieo.com', '1962-06-04', 'Product Manager', 'Yoyo', '2014-07-02', 1, 0),
  (2, 'Yossi', 'Ben_Haim', '', 'yossi@somoto.net', '1983-07-18', 'R&D TL', '', '2014-07-02', 1, 0),
  (3, 'Umitai', 'Tordikulov', '', 'umitai@genieo.com', '1978-03-17', 'Server developer', 'Russian', '2014-05-06', 1, 0),
  (4, 'Eyal', 'Onn', '', 'eyal@genieo.com', '1989-06-04', 'QA manager', 'Pro4life', '2013-08-26', 1, 0),
  (5, 'Alexander', 'Goldshtein', '', 'alex@genieo.com', '1979-08-12', 'Team lead - Dev', 'A major slacker', '2013-05-08', 1, 0),
  (6, 'Dana', 'Fidelmen', '', 'dana@genieo.com', '1993-08-18', 'minor QA', '', '2015-02-04', 1, 0),
  (7, 'Yuval', 'Zeharhary', 'https://alaska.somoto.org:8443/secure/useravatar?ownerId=yuval&avatarId=11102', 'yuval@somoto.net', '1981-02-02', 'Developer', 'Really really tall!!', '2013-01-02', 1, 0),
  (8, 'Eyal', 'Yakov', '', 'eyal@somoto.net', '1974-02-11', 'CTO', '', '2010-04-06', 1, 0),
  (9, 'Rani', 'Avnimelech', '', 'ran@genieo.com', '1970-09-12', 'Algorithm', '', '2008-03-17', 1, 0),
  (10, 'Yaron', 'Fishman', '', 'yaron@genieo.com', '1968-09-20', 'R&D leader Genieo', 'gefiltefish', '2006-06-16', 1, 0),
  (11, 'Tal', 'Shor', '', 'tal@genieo.com', '1984-02-02', 'Sales manager', '', '2014-09-09', 1, 0),
  (12, 'Itay', 'Kotler', '', 'itay@somoto.net', '1980-12-30', 'QA + IT', 'will automate you', '2014-11-05', 1, 0),
  (13, 'Ben', 'Geron', '', 'ben@somoto.net', '1974-05-11', 'CEO', 'I rule bitches! ', '2008-08-19', 1, 0),
  (14, 'Aviv', 'Klaskin', '', 'aviv@somoto.net', '1984-06-04', 'Developer', '', '2013-03-17', 1, 0),
  (15, 'Yotam', 'Berger', '', 'yotam@somoto.net', '1983-08-21', 'Marketing AM', '', '2014-09-16', 1, 0),
  (16, 'Iddo', 'Eldor', '', 'iddo@genieo.com', '1991-12-19', 'Web Developer', 'hack4life', '2014-11-05', 1, 0),
  (17, 'Somoto', 'User', '', 'admin@somoto.net', '0000-00-00', '', '', '0000-00-00', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
