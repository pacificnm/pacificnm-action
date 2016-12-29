-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2016 at 08:12 PM
-- Server version: 10.0.28-MariaDB-0+deb8u1
-- PHP Version: 5.6.27-0+deb8u1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `camper`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
`action_id` int(20) unsigned NOT NULL,
  `controller_id` int(20) unsigned NOT NULL,
  `action_name` varchar(100) NOT NULL
) ENGINE=InnoDB;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
 ADD PRIMARY KEY (`action_id`), ADD KEY `controller_id` (`controller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
MODIFY `action_id` int(20) unsigned NOT NULL AUTO_INCREMENT;SET FOREIGN_KEY_CHECKS=1;

