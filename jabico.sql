-- phpMyAdmin SQL Dump
-- version 4.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2015 at 12:26 AM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jabico`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `project_type` enum('Internal','External') NOT NULL,
  `description` text NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `due_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('Open','Closed') NOT NULL,
  `created_by` int(11) NOT NULL,
  `parent_project_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `username`, `password`) VALUES
(1, 'Dustin', 'Roth', 'dustinroth@gmail.com', 'droth', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(2, 'Sara', 'Heslep', 'sarabethbeauty@gmail.com', 'sheslep', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(4, 'Test', 'User', 'tester@test.com', 'testuser', '8bb6118f8fd6935ad0876a3be34a717d32708ffd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
