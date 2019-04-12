-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2015 at 01:26 AM
-- Server version: 5.6.25-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `owasp`
--

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `owasp_flags` (
`id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `flag` varchar(50) NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Table structure for table `owasp_1_users`
--
DROP TABLE owasp_1_users;
CREATE TABLE IF NOT EXISTS `owasp_1_users` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owasp_1_users`
--

INSERT INTO `owasp_1_users` (`id`, `name`, `pass`) VALUES
(1, 'admin', 'adminOWA$Padmin');

-- --------------------------------------------------------

--
-- Table structure for table `owasp_2_users`
--
DROP TABLE owasp_2_users;
CREATE TABLE IF NOT EXISTS `owasp_2_users` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owasp_2_users`
--

INSERT INTO `owasp_2_users` (`id`, `name`, `pass`) VALUES
(1, 'user', 'user'),
(2, 'Flag2 UNLOCKED 9ae9d88a52b7d2c74071c5e87dc74c58', 'unPassWorD');

-- --------------------------------------------------------

--
-- Table structure for table `owasp_3_comments`
--
DROP TABLE owasp_3_comments;
CREATE TABLE IF NOT EXISTS `owasp_3_comments` (
`id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owasp_3_users`
--
DROP TABLE owasp_3_users;
CREATE TABLE IF NOT EXISTS `owasp_3_users` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `likes` int(11) DEFAULT '0',
  `ip` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owasp_4_users`
--
DROP TABLE owasp_4_users;
CREATE TABLE IF NOT EXISTS `owasp_4_users` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `salary` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owasp_4_users`
--

INSERT INTO `owasp_4_users` (`id`, `name`, `pass`, `salary`) VALUES
(1, 'user', 'secure!password', '$ 10.000 (SECRET)'),
(2, 'cesarBananaPueyrredon', '1234569!', '$ 20.000 (FLAG UNLOCKED) f2448ba3d7bf0fba904badc0fb0a5246');

-- --------------------------------------------------------

--
-- Table structure for table `owasp_6_users`
--
DROP TABLE owasp_6_users;
CREATE TABLE IF NOT EXISTS `owasp_6_users` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owasp_6_users`
--

INSERT INTO `owasp_6_users` (`id`, `name`, `pass`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad'),
(2, 'owasp', 'a42d82455cd2447eaa4dbc7d2bf878ce');

-- --------------------------------------------------------

--
-- Table structure for table `owasp_7_comments`
--
DROP TABLE owasp_7_comments;
CREATE TABLE IF NOT EXISTS `owasp_7_comments` (
`id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

INSERT INTO `owasp_7_comments` (`id`, `ip`, `comment`) VALUES
(1, '10.11.22.3', 'A simple comment'),
(2, '10.11.22.4', 'Another simple comment');

--
-- Table structure for table `owasp_8_comments`
--
DROP TABLE owasp_8_comments;
CREATE TABLE IF NOT EXISTS `owasp_8_comments` (
`id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owasp_8_comments`
--

INSERT INTO `owasp_8_comments` (`id`, `comment`) VALUES
(2, '<font color="#FF6600">:D</font>');

-- --------------------------------------------------------

--
-- Table structure for table `owasp_8_users`
--
DROP TABLE owasp_8_users;
CREATE TABLE IF NOT EXISTS `owasp_8_users` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `likes` int(11) DEFAULT '0',
  `ip` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owasp_8_users`
--

INSERT INTO `owasp_8_users` (`id`, `name`, `likes`, `ip`) VALUES
(2, 'PepitO', 2, ''),
(3, 'Pepito2', 1, ''),
(4, 'Pepito3', 0, ''),
(5, 'Pepito4', 0, ''),
(6, 'JOJO', 1, '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `owasp_1_users`
--
ALTER TABLE `owasp_1_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owasp_2_users`
--
ALTER TABLE `owasp_2_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owasp_3_comments`
--
ALTER TABLE `owasp_3_comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owasp_3_users`
--
ALTER TABLE `owasp_3_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owasp_4_users`
--
ALTER TABLE `owasp_4_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owasp_6_users`
--
ALTER TABLE `owasp_6_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owasp_7_comments`
--
ALTER TABLE `owasp_7_comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owasp_8_comments`
--
ALTER TABLE `owasp_8_comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owasp_8_users`
--
ALTER TABLE `owasp_8_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `owasp_1_users`
--
ALTER TABLE `owasp_1_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `owasp_2_users`
--
ALTER TABLE `owasp_2_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `owasp_3_comments`
--
ALTER TABLE `owasp_3_comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `owasp_3_users`
--
ALTER TABLE `owasp_3_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `owasp_4_users`
--
ALTER TABLE `owasp_4_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `owasp_6_users`
--
ALTER TABLE `owasp_6_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `owasp_7_comments`
--
ALTER TABLE `owasp_7_comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `owasp_8_comments`
--
ALTER TABLE `owasp_8_comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `owasp_8_users`
--
ALTER TABLE `owasp_8_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
