-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2019 at 07:34 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
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

CREATE TABLE `words1` (
  `id` int(11) NOT NULL,
  `word` varchar(256) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `start` int(11) NOT NULL DEFAULT '0',
  `end` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `words2`
--

CREATE TABLE `words2` (
  `id` int(11) NOT NULL,
  `word` varchar(256) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `start` int(11) NOT NULL DEFAULT '0',
  `end` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `words3`
--

CREATE TABLE `words3` (
  `id` int(11) NOT NULL,
  `word` varchar(256) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `start` int(11) NOT NULL DEFAULT '0',
  `end` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `words4`
--

CREATE TABLE `words4` (
  `id` int(11) NOT NULL,
  `word` varchar(256) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `start` int(11) NOT NULL DEFAULT '0',
  `end` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `words5`
--

CREATE TABLE `words5` (
  `id` int(11) NOT NULL,
  `word` varchar(256) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `start` int(11) NOT NULL DEFAULT '0',
  `end` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `words1`
--
ALTER TABLE `words1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `word` (`word`);

--
-- Indexes for table `words2`
--
ALTER TABLE `words2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `word` (`word`);

--
-- Indexes for table `words3`
--
ALTER TABLE `words3`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `word` (`word`);

--
-- Indexes for table `words4`
--
ALTER TABLE `words4`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `word` (`word`);

--
-- Indexes for table `words5`
--
ALTER TABLE `words5`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `word` (`word`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `words1`
--
ALTER TABLE `words1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `words2`
--
ALTER TABLE `words2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `words3`
--
ALTER TABLE `words3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `words4`
--
ALTER TABLE `words4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `words5`
--
ALTER TABLE `words5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
