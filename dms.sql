-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2015 at 07:53 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE IF NOT EXISTS `doc` (
  `dDate` varchar(11) NOT NULL,
  `composer` varchar(50) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `msg` text NOT NULL,
  `Access` varchar(15) NOT NULL,
  `protected` varchar(5) NOT NULL,
  `file_location` text NOT NULL,
  `folder_name` varchar(15) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`dDate`, `composer`, `dept`, `title`, `type`, `msg`, `Access`, `protected`, `file_location`, `folder_name`, `id`) VALUES
('02/05/15', 'Aneke chike', 'Admin', 'Money', 'text', 'I can see everything turning arround! turning Arround!! for my Good.', '1', '1', '', '6', 10),
('02/05/15', 'Aneke chike', 'Admin', 'Rudiments of anger management', 'text', '', '1', '0', '', '3', 11),
('02/05/15', 'Aneke chike', 'Admin', 'Peom by great poets', 'text', ' i am a great poet', '1', '0', '', '2', 13),
('02/05/15', 'Aneke chike', 'Admin', 'IMT 301', 'text', 'student performance register', '1', '1', '', '7', 14),
('03/05/15', 'Aneke chike', 'Admin', 'test my add new fxn', 'text', '    what? is happening?        ', '1', '0', '', '6', 15),
('05/05/15', 'Aneke chike', 'Admin', 'wow', 'formatted', 'uploads/wow.docx', '', 'on', '', '6', 17),
('06/05/15', 'onyeka Samuel', 'ICT', 'My practice performance with the app', 'text', 'just try to demostrate the workability of this app. now i rest my case with the developers.\r\ni think they did a good work.\r\nkeep it up.', '1', '0', '', '8', 18);

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE IF NOT EXISTS `folder` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `dateofcreation` varchar(10) NOT NULL,
  `foldername` varchar(50) NOT NULL,
  `protected` varchar(10) NOT NULL,
  `creator` varchar(50) NOT NULL,
  PRIMARY KEY (`sn`,`foldername`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`sn`, `dateofcreation`, `foldername`, `protected`, `creator`) VALUES
(2, '11/12/14', 'My second', '1', '20'),
(6, '31/12/14', 'test folder', '1', '20'),
(7, '02/05/15', 'Students doc', '1', '20'),
(8, '06/05/15', 'onyeka personnal', '0', '32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `accesslevel` varchar(15) NOT NULL,
  `id` int(20) NOT NULL,
  `psw` varchar(20) NOT NULL,
  PRIMARY KEY (`sn`,`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sn`, `name`, `sname`, `dept`, `accesslevel`, `id`, `psw`) VALUES
(7, 'chike', 'Aneke', 'Admin', '1', 20, 'd123'),
(9, 'Samuel', 'onyeka', 'ICT', '1', 32, 'onyi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
