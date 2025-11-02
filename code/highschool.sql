-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2020 at 05:30 PM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `highschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `relatedpaper`
--

CREATE TABLE IF NOT EXISTS `relatedpaper` (
  `Id_RelatedPaper` int(15) NOT NULL,
  `S_Index_no` varchar(20) NOT NULL,
  `PaperType` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relatedpaper`
--

INSERT INTO `relatedpaper` (`Id_RelatedPaper`, `S_Index_no`, `PaperType`) VALUES
(1, '100', 'Report Card'),
(2, '222', 'Registration form'),
(3, '50', 'Registration form'),
(4, '50', 'birth cirtificate'),
(5, '50', 'transfer leter'),
(6, '2500', 'Registration form'),
(7, '2500', 'Report Card'),
(8, '2500', 'birth cirtificate'),
(9, '2500', 'Report Card'),
(10, '50', 'Report Card'),
(11, '50', 'other');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Id_Student` int(15) NOT NULL,
  `StudentName` varchar(20) NOT NULL,
  `Dateofentrytocomboni` date NOT NULL,
  `Dateofbirth` date NOT NULL,
  `Nationality` varchar(20) NOT NULL,
  `Religion` varchar(20) NOT NULL,
  `IndexNo` varchar(20) NOT NULL,
  `DateofleavingYear` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Id_Student`, `StudentName`, `Dateofentrytocomboni`, `Dateofbirth`, `Nationality`, `Religion`, `IndexNo`, `DateofleavingYear`) VALUES
(1, 'samir', '2017-02-02', '2017-02-02', 'Sudanese', 'Muslim ', '100', '2016'),
(2, 'omer moh', '2017-05-15', '2017-05-15', 'Sudanese', 'christian', '222', '2018'),
(3, 'robert yacoub abbo', '2000-03-15', '2000-03-15', 'Sudanese', 'christian', '50', '2010'),
(4, 'Jor', '2000-02-12', '2000-02-12', 'other', 'other', '2500', '2004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `relatedpaper`
--
ALTER TABLE `relatedpaper`
  ADD PRIMARY KEY (`Id_RelatedPaper`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Id_Student`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `relatedpaper`
--
ALTER TABLE `relatedpaper`
  MODIFY `Id_RelatedPaper` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Id_Student` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
