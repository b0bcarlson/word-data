-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2019 at 05:46 AM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `words`
--
CREATE DATABASE IF NOT EXISTS `words` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `words`;

-- --------------------------------------------------------

--
-- Table structure for table `words1`
--

CREATE TABLE IF NOT EXISTS `words1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(256) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `start` int(11) NOT NULL DEFAULT '0',
  `end` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `word` (`word`),
  KEY `count` (`count`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `words2`
--

CREATE TABLE IF NOT EXISTS `words2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(256) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `start` int(11) NOT NULL DEFAULT '0',
  `end` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `word` (`word`),
  KEY `count` (`count`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `words3`
--

CREATE TABLE IF NOT EXISTS `words3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(256) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `start` int(11) NOT NULL DEFAULT '0',
  `end` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `word` (`word`),
  KEY `count` (`count`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `words4`
--

CREATE TABLE IF NOT EXISTS `words4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(256) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `start` int(11) NOT NULL DEFAULT '0',
  `end` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `word` (`word`),
  KEY `count` (`count`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `words5`
--

CREATE TABLE IF NOT EXISTS `words5` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(256) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `start` int(11) NOT NULL DEFAULT '0',
  `end` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `word` (`word`),
  KEY `count` (`count`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
