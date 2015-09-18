-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2015 at 04:23 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `edu`
--

-- --------------------------------------------------------

--
-- Table structure for table `clase`
--

CREATE TABLE IF NOT EXISTS `clase` (
  `idc` int(3) NOT NULL AUTO_INCREMENT,
  `nume` varchar(30) NOT NULL,
  `idcs` int(3) NOT NULL,
  PRIMARY KEY (`idc`),
  KEY `idcs` (`idcs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `clase`
--

INSERT INTO `clase` (`idc`, `nume`, `idcs`) VALUES
(36, 'cl5', 240),
(37, 'cl4f', 240),
(44, '343', 218),
(53, 'cl44', 218),
(56, 'cl4', 240),
(57, '33', 240),
(59, 'alo', 268);

-- --------------------------------------------------------

--
-- Table structure for table `elevi`
--

CREATE TABLE IF NOT EXISTS `elevi` (
  `ide` int(2) NOT NULL AUTO_INCREMENT,
  `nume` varchar(50) NOT NULL,
  `idec` int(3) NOT NULL,
  PRIMARY KEY (`ide`),
  KEY `idec` (`idec`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `elevi`
--

INSERT INTO `elevi` (`ide`, `nume`, `idec`) VALUES
(8, 'Mircea Cartarescu', 36),
(9, 'Baciu Ciprian ', 36),
(10, 'Alex Velea ', 44),
(23, 'Mircea Vulcanescu', 44),
(24, 'Baciu Ciprian', 57),
(25, 'iuoras Stelian', 57),
(26, 'Baciu Ciprian', 53);

-- --------------------------------------------------------

--
-- Table structure for table `materii`
--

CREATE TABLE IF NOT EXISTS `materii` (
  `idm` int(2) NOT NULL AUTO_INCREMENT,
  `nume` varchar(50) NOT NULL,
  `idme` int(5) NOT NULL,
  PRIMARY KEY (`idm`),
  KEY `idme` (`idme`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `materii`
--

INSERT INTO `materii` (`idm`, `nume`, `idme`) VALUES
(9, 'Chineza', 9),
(10, 'Romana', 9),
(13, 'Franceza', 10),
(14, 'Engleza', 8),
(15, 'Romana', 8),
(29, 'Engleza', 23),
(30, 'Romana', 23),
(34, 'Romana', 10),
(37, 'Engleza', 10),
(38, 'Engleza', 10),
(39, 'Chineza', 25),
(40, 'Engleza', 25);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `idn` int(11) NOT NULL AUTO_INCREMENT,
  `nota` varchar(2) NOT NULL,
  `data` date NOT NULL,
  `idnm` int(11) NOT NULL,
  PRIMARY KEY (`idn`),
  KEY `idnm` (`idnm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`idn`, `nota`, `data`, `idnm`) VALUES
(8, '9', '0000-00-00', 9),
(9, '3', '2012-12-12', 9),
(10, '4', '0000-00-00', 9),
(11, '4', '2015-03-14', 9),
(12, '8', '2015-03-10', 9),
(17, '9', '2012-10-20', 15),
(18, '7', '2015-03-14', 15),
(21, '5', '2013-12-12', 14),
(30, '6', '2015-03-14', 29),
(31, '6', '2015-03-14', 29),
(32, '7', '2012-10-20', 13);

-- --------------------------------------------------------

--
-- Table structure for table `scoli`
--

CREATE TABLE IF NOT EXISTS `scoli` (
  `ids` int(3) NOT NULL AUTO_INCREMENT,
  `nume` varchar(50) NOT NULL,
  PRIMARY KEY (`ids`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=282 ;

--
-- Dumping data for table `scoli`
--

INSERT INTO `scoli` (`ids`, `nume`) VALUES
(218, 'gen11'),
(240, '445'),
(242, '55'),
(247, '345'),
(268, '234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idu` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idu`, `username`, `password`, `name`) VALUES
(1, 'razvan', 'd9b1d7db4cd6e70935368a1efb10e377', 'Iuoras Razvan '),
(7, 'iulian', '202cb962ac59075b964b07152d234b70', 'Iulian'),
(40, 'gigi', '202cb962ac59075b964b07152d234b70', 'Gigi'),
(41, 'raz', '698d51a19d8a121ce581499d7b701668', 'Razvy'),
(42, 'stelian', '310dcbbf4cce62f762a2aaa148d556bd', 'Stelian'),
(43, 'stelian', '310dcbbf4cce62f762a2aaa148d556bd', 'Stelian'),
(74, 'razvan', '202cb962ac59075b964b07152d234b70', 'Razvan'),
(75, 'ioji', '310dcbbf4cce62f762a2aaa148d556bd', 'Ioji'),
(78, 'cocosul', '202cb962ac59075b964b07152d234b70', 'Cucurigu'),
(79, 'razvan22', '202cb962ac59075b964b07152d234b70', 'Stelian'),
(80, 'razy', '115f89503138416a242f40fb7d7f338e', 'Stelian'),
(81, 'torje', '202cb962ac59075b964b07152d234b70', 'Torje'),
(82, 'laica', '202cb962ac59075b964b07152d234b70', 'Torje'),
(83, 'cornel', '11707635d617642ad2e5c9835c3b82da', 'Cornel'),
(84, 'cornele', '698d51a19d8a121ce581499d7b701668', 'Cornel'),
(85, 'abe', '310dcbbf4cce62f762a2aaa148d556bd', 'abe'),
(86, 'victor', 'bcbe3365e6ac95ea2c0343a2395834dd', 'Ponta'),
(87, 'popi', 'f1c1592588411002af340cbaedd6fc33', 'Procopiu'),
(88, 'razvanescu', '550a141f12de6341fba65b0ad0433500', 'Raz'),
(89, '4', '550a141f12de6341fba65b0ad0433500', '4'),
(90, 'pula', '331c6883dd6010864b7ead130be77cd5', 'Muie'),
(91, 'sever', 'd4116cf285b6138f2640370058508405', 'Bogdan '),
(92, 'tibi', '80a9c63c165384b2a32fddfdc2cde1d7', 'Tiben');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `clase_ibfk_1` FOREIGN KEY (`idcs`) REFERENCES `scoli` (`ids`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `elevi`
--
ALTER TABLE `elevi`
  ADD CONSTRAINT `elevi_ibfk_1` FOREIGN KEY (`idec`) REFERENCES `clase` (`idc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materii`
--
ALTER TABLE `materii`
  ADD CONSTRAINT `materii_ibfk_1` FOREIGN KEY (`idme`) REFERENCES `elevi` (`ide`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`idnm`) REFERENCES `materii` (`idm`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
