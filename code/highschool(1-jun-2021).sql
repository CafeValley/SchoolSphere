-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2021 at 02:19 PM
-- Server version: 10.3.27-MariaDB-0+deb10u1
-- PHP Version: 7.3.27-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicyear`
--

CREATE TABLE `academicyear` (
  `idoftable` bigint(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `active` int(2) NOT NULL,
  `dateoftthis` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academicyear`
--

INSERT INTO `academicyear` (`idoftable`, `name`, `active`, `dateoftthis`) VALUES
(13, '2011 - 2012', 0, '2021-05-04 02:55:07'),
(14, '2012 - 2013', 0, '2021-05-04 03:08:18'),
(15, '2013 - 2014', 0, '2021-05-04 03:26:36'),
(16, '2014 - 2015', 0, '2021-05-04 03:26:41'),
(17, '2020 - 2021', 1, '2021-05-06 08:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `extranotes`
--

CREATE TABLE `extranotes` (
  `tableid` bigint(15) NOT NULL,
  `studentindex` varchar(10) NOT NULL,
  `note` text NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `whenwasit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `extranotes`
--

INSERT INTO `extranotes` (`tableid`, `studentindex`, `note`, `acadmicyear`, `whenwasit`) VALUES
(15, '21A05', 'he is lost', '2020 - 2021', '2021-05-06 06:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `fees_set`
--

CREATE TABLE `fees_set` (
  `id` bigint(20) NOT NULL,
  `feesname` varchar(25) NOT NULL,
  `feesamount` decimal(20,2) NOT NULL,
  `feesdate` date NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fees_set`
--

INSERT INTO `fees_set` (`id`, `feesname`, `feesamount`, `feesdate`, `acadmicyear`, `active`) VALUES
(6, 'Registeration_Fees', '200.00', '2020-11-22', '', 0),
(7, 'Registeration_Fees', '2000.00', '2020-11-22', '', 0),
(8, 'P1', '150.00', '2020-11-22', '', 0),
(9, 'P1', '200.00', '2020-11-22', '', 1),
(10, 'P3', '300.00', '2021-03-03', '', 1),
(11, 'Registeration_Fees', '30.00', '2021-03-04', '', 1),
(12, 'S1', '2000.00', '2021-03-04', '', 1),
(13, 'S2', '3000.00', '2021-05-03', '', 1),
(14, 'P1', '5000.00', '2021-05-06', '2020 - 2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `marks_finalexams`
--

CREATE TABLE `marks_finalexams` (
  `id` bigint(50) NOT NULL,
  `studentindex` varchar(15) NOT NULL,
  `subjectid` varchar(15) NOT NULL,
  `class` varchar(15) NOT NULL,
  `subclassname` varchar(4) NOT NULL,
  `mark` decimal(5,2) NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks_finalexams`
--

INSERT INTO `marks_finalexams` (`id`, `studentindex`, `subjectid`, `class`, `subclassname`, `mark`, `acadmicyear`, `date`) VALUES
(42, '21A05', 'English', 'P1', 'A', '50.00', '2020 - 2021', '2021-05-16 21:17:02'),
(43, '21A01', 'English', 'P1', 'A', '50.00', '2020 - 2021', '2021-05-16 21:17:02'),
(44, '21A05', 'chemistry', 'P1', 'A', '50.00', '2020 - 2021', '2021-05-16 21:17:37'),
(45, '21A01', 'chemistry', 'P1', 'A', '50.00', '2020 - 2021', '2021-05-16 21:17:37'),
(46, '21A02', 'cre', 'S1', 'A', '90.00', '2020 - 2021', '2021-05-31 00:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `marks_first_term`
--

CREATE TABLE `marks_first_term` (
  `id` bigint(50) NOT NULL,
  `studentindex` varchar(15) NOT NULL,
  `subjectid` varchar(15) NOT NULL,
  `class` varchar(15) NOT NULL,
  `subclassname` varchar(4) NOT NULL,
  `mark` decimal(5,2) NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks_first_term`
--

INSERT INTO `marks_first_term` (`id`, `studentindex`, `subjectid`, `class`, `subclassname`, `mark`, `acadmicyear`, `date`) VALUES
(27, '21A05', 'English', 'P1', 'A', '90.00', '2020 - 2021', '2021-05-16 21:03:29'),
(28, '21A05', 'Application', 'P1', 'A', '10.00', '2020 - 2021', '2021-05-14 13:56:51'),
(29, '21A01', 'Application', 'P1', 'A', '50.00', '2020 - 2021', '2021-05-14 13:56:52'),
(30, '21A05', 'Arabic', 'P1', 'A', '50.00', '2020 - 2021', '2013-09-18 19:33:18'),
(31, '21A01', 'Arabic', 'P1', 'A', '60.00', '2020 - 2021', '2013-09-18 19:33:18'),
(32, '21A05', 'bio', 'P1', 'A', '50.00', '2020 - 2021', '2021-05-14 13:57:16'),
(33, '21A01', 'bio', 'P1', 'A', '53.00', '2020 - 2021', '2021-05-14 13:57:16'),
(34, '21A05', 'English', 'P1', 'A', '90.00', '2020 - 2021', '2021-05-16 21:03:29'),
(35, '21A01', 'English', 'P1', 'A', '70.00', '2020 - 2021', '2021-05-16 21:03:29'),
(36, '21A05', 'fine art', 'P1', 'A', '2.00', '2020 - 2021', '2021-05-14 14:07:48'),
(37, '21A01', 'fine art', 'P1', 'A', '1.00', '2020 - 2021', '2021-05-16 20:34:18'),
(38, '21A05', 'Conduct', 'P1', 'A', '26.00', '2020 - 2021', '2021-05-14 14:10:00'),
(39, '21A01', 'Conduct', 'P1', 'A', '80.00', '2020 - 2021', '2021-05-14 14:10:00'),
(40, '21A05', 'order', 'P1', 'A', '4.00', '2020 - 2021', '2021-05-14 14:10:12'),
(41, '21A01', 'order', 'P1', 'A', '70.00', '2020 - 2021', '2021-05-14 14:10:12'),
(42, '21A05', 'Arabic', 'P1', 'A', '50.00', '2020 - 2021', '2013-09-18 19:33:18'),
(43, '21A01', 'Arabic', 'P1', 'A', '60.00', '2020 - 2021', '2013-09-18 19:33:18'),
(46, '21A05', 'history', 'P1', 'A', '60.00', '2020 - 2021', '2021-05-16 21:03:04'),
(47, '21A01', 'history', 'P1', 'A', '60.00', '2020 - 2021', '2021-05-16 21:03:04'),
(48, '21A05', 'chemistry', 'P1', 'A', '80.00', '2020 - 2021', '2021-05-16 21:16:23'),
(49, '21A01', 'chemistry', 'P1', 'A', '50.00', '2020 - 2021', '2021-05-16 21:16:24'),
(50, '21A05', 'test subject', 'P1', 'A', '90.00', '2020 - 2021', '2013-09-18 19:32:51'),
(51, '21A01', 'test subject', 'P1', 'A', '90.00', '2020 - 2021', '2013-09-18 19:32:52'),
(52, '21A02', 'cre', 'S1', 'A', '20.00', '2020 - 2021', '2021-05-31 00:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `marks_second_term`
--

CREATE TABLE `marks_second_term` (
  `id` bigint(50) NOT NULL,
  `studentindex` varchar(15) NOT NULL,
  `subjectid` varchar(15) NOT NULL,
  `class` varchar(15) NOT NULL,
  `subclassname` varchar(4) NOT NULL,
  `mark` decimal(5,2) NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks_second_term`
--

INSERT INTO `marks_second_term` (`id`, `studentindex`, `subjectid`, `class`, `subclassname`, `mark`, `acadmicyear`, `date`) VALUES
(15, '21A05', 'Conduct', 'P1', 'A', '2.00', '2020 - 2021', '2021-05-14 14:05:32'),
(16, '21A01', 'Conduct', 'P1', 'A', '90.00', '2020 - 2021', '2021-05-14 14:05:32'),
(17, '21A05', 'fine art', 'P1', 'A', '9.00', '2020 - 2021', '2021-05-14 14:05:44'),
(18, '21A01', 'fine art', 'P1', 'A', '10.00', '2020 - 2021', '2021-05-14 14:05:44'),
(19, '21A05', 'Application', 'P1', 'A', '90.00', '2020 - 2021', '2021-05-14 14:07:29'),
(20, '21A01', 'Application', 'P1', 'A', '0.00', '2020 - 2021', '2021-05-14 14:07:30'),
(21, '21A02', 'cre', 'S1', 'A', '50.00', '2020 - 2021', '2021-05-31 00:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `marks_third_term`
--

CREATE TABLE `marks_third_term` (
  `id` bigint(50) NOT NULL,
  `studentindex` varchar(15) NOT NULL,
  `subjectid` varchar(15) NOT NULL,
  `class` varchar(15) NOT NULL,
  `subclassname` varchar(4) NOT NULL,
  `mark` decimal(5,2) NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks_third_term`
--

INSERT INTO `marks_third_term` (`id`, `studentindex`, `subjectid`, `class`, `subclassname`, `mark`, `acadmicyear`, `date`) VALUES
(15, '21A02', 'cre', 'S1', 'A', '9.00', '2020 - 2021', '2021-05-31 00:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Id_Student` int(15) NOT NULL,
  `StudentName` varchar(20) NOT NULL,
  `Dateofbirth` date NOT NULL,
  `Nationality` varchar(20) NOT NULL,
  `Religion` varchar(20) NOT NULL,
  `Address_area` varchar(255) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `IndexNo` varchar(20) NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `whodidit` varchar(25) NOT NULL DEFAULT 'admin',
  `whenwasit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Id_Student`, `StudentName`, `Dateofbirth`, `Nationality`, `Religion`, `Address_area`, `phone1`, `phone2`, `Email`, `IndexNo`, `acadmicyear`, `whodidit`, `whenwasit`) VALUES
(5731, 'Asmi', '2020-04-01', 'Sudanese', 'Christian', 'home', '12312', '123', 'fa@gmail.com', '21A01', '', 'admin', '2021-05-02 11:30:26'),
(5732, 'samir', '2020-04-02', 'Sudanese', 'Muslim', 'home', '12312', '123', 'a@gmail.com', '21A02', '', 'admin', '2021-05-03 20:54:47'),
(5733, 'amro', '2020-04-02', 'Sudanese', 'Muslim', 'home', '12312', '123', 'a@gmail.com', '21A03', '', 'admin', '2021-05-03 20:54:56'),
(5734, 'omer', '2020-04-02', 'Sudanese', 'Muslim', 'home', '12312', '123', 'a@gmail.com', '21A04', '', 'admin', '2021-05-03 20:59:03'),
(5735, 'chris', '2018-04-05', 'Sudanese', 'Muslim', 'home', '12312', '123', 'a@gmail.com', '21A05', '2020 - 2021', 'admin', '2021-05-06 06:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `studentsregistered`
--

CREATE TABLE `studentsregistered` (
  `id` bigint(25) NOT NULL,
  `studentindex` varchar(25) NOT NULL,
  `yearselect` varchar(15) NOT NULL,
  `subclassname` varchar(2) NOT NULL,
  `feesregis` double(15,2) NOT NULL,
  `feesyear` double(15,2) NOT NULL,
  `active` int(2) NOT NULL,
  `2ndactive` int(2) NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `whodidthis` varchar(25) NOT NULL,
  `whenwasit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsregistered`
--

INSERT INTO `studentsregistered` (`id`, `studentindex`, `yearselect`, `subclassname`, `feesregis`, `feesyear`, `active`, `2ndactive`, `acadmicyear`, `whodidthis`, `whenwasit`) VALUES
(22, '21A03', 'S1', 'B', 30.00, 2000.00, 1, 0, '', 'admin', '2021-05-03 20:55:21'),
(23, '21A04', 'S2', 'B', 30.00, 3000.00, 1, 1, '', 'admin', '2021-05-03 21:00:08'),
(24, '21A05', 'P1', 'B', 30.00, 200.00, 1, 1, '2020 - 2021', 'admin', '2021-05-06 06:29:36'),
(25, '21A01', 'P1', 'A', 30.00, 200.00, 1, 0, '2020 - 2021', 'admin', '2021-05-06 06:36:51'),
(26, '21A05', 'P1', 'A', 30.00, 200.00, 1, 1, '2020 - 2021', 'admin', '2021-05-30 23:00:38'),
(27, '21A03', 'P1', 'A', 30.00, 200.00, 1, 1, '2020 - 2021', 'admin', '2021-05-30 23:01:22'),
(29, '21A02', 'S2', 'A', 30.00, 3000.00, 1, 1, '2020 - 2021', 'admin', '2021-05-30 23:07:41'),
(30, '21A02', 'S1', 'A', 30.00, 2000.00, 1, 1, '2020 - 2021', 'admin', '2021-05-30 23:07:59'),
(31, '21A02', 'P1', 'A', 30.00, 200.00, 1, 1, '2020 - 2021', 'admin', '2021-05-30 23:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `studentsregisteredfees`
--

CREATE TABLE `studentsregisteredfees` (
  `id` bigint(25) NOT NULL,
  `relatedregisid` bigint(15) DEFAULT NULL,
  `studentindex` varchar(25) NOT NULL,
  `totaloffees` double(15,2) NOT NULL,
  `typeofpayment` int(2) NOT NULL,
  `active1` int(2) NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `whodidthis` varchar(25) NOT NULL,
  `whenwasit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsregisteredfees`
--

INSERT INTO `studentsregisteredfees` (`id`, `relatedregisid`, `studentindex`, `totaloffees`, `typeofpayment`, `active1`, `acadmicyear`, `whodidthis`, `whenwasit`) VALUES
(35, NULL, '21A01', 2030.00, 12, 0, '', 'admin', '2021-05-02 12:15:45'),
(36, 21, '21A02', 2030.00, 11, 1, '', 'admin', '2021-05-03 20:55:11'),
(37, 22, '21A03', 2030.00, 11, 0, '', 'admin', '2021-05-03 20:55:21'),
(38, NULL, '21A03', 2030.00, 12, 0, '', 'admin', '2021-05-03 20:55:34'),
(39, NULL, '21A02', 30.00, 12, 1, '', 'admin', '2021-05-03 20:56:01'),
(40, 23, '21A04', 3030.00, 11, 1, '', 'admin', '2021-05-03 21:00:08'),
(41, 24, '21A05', 230.00, 11, 1, '2020 - 2021', 'admin', '2021-05-06 06:29:36'),
(42, NULL, '21A05', 30.00, 12, 1, '2020 - 2021', 'admin', '2021-05-06 06:31:48'),
(43, 25, '21A01', 230.00, 11, 0, '2020 - 2021', 'admin', '2021-05-06 06:36:51'),
(44, NULL, '21A01', 30.00, 12, 0, '2020 - 2021', 'admin', '2013-09-18 19:38:43'),
(45, NULL, '21A01', 200.00, 12, 0, '2020 - 2021', 'admin', '2013-09-18 19:38:49'),
(46, 26, '21A05', 230.00, 11, 1, '2020 - 2021', 'admin', '2021-05-30 23:00:38'),
(47, 27, '21A03', 230.00, 11, 1, '2020 - 2021', 'admin', '2021-05-30 23:01:22'),
(48, 28, '21A02', 230.00, 11, 1, '2020 - 2021', 'admin', '2021-05-30 23:04:09'),
(49, 29, '21A02', 3030.00, 11, 1, '2020 - 2021', 'admin', '2021-05-30 23:07:41'),
(50, 30, '21A02', 2030.00, 11, 1, '2020 - 2021', 'admin', '2021-05-30 23:07:59'),
(51, 31, '21A02', 230.00, 11, 1, '2020 - 2021', 'admin', '2021-05-30 23:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `intotal` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `intotal`) VALUES
(8, 'Arabic', 1),
(9, 'English', 1),
(15, 'Application', 0),
(16, 'Conduct', 0),
(17, 'order', 0),
(18, 'cre', 1),
(19, 'math', 1),
(20, 'physics', 1),
(21, 'chemistry', 1),
(22, 'bio', 1),
(23, 'enginerring', 1),
(24, 'geo', 1),
(25, 'history', 1),
(26, 'fimaly something', 1),
(27, 'fine art', 1),
(28, 'test subject', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicyear`
--
ALTER TABLE `academicyear`
  ADD PRIMARY KEY (`idoftable`);

--
-- Indexes for table `extranotes`
--
ALTER TABLE `extranotes`
  ADD PRIMARY KEY (`tableid`);

--
-- Indexes for table `fees_set`
--
ALTER TABLE `fees_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_finalexams`
--
ALTER TABLE `marks_finalexams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_first_term`
--
ALTER TABLE `marks_first_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_second_term`
--
ALTER TABLE `marks_second_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_third_term`
--
ALTER TABLE `marks_third_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Id_Student`);

--
-- Indexes for table `studentsregistered`
--
ALTER TABLE `studentsregistered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentsregisteredfees`
--
ALTER TABLE `studentsregisteredfees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academicyear`
--
ALTER TABLE `academicyear`
  MODIFY `idoftable` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `extranotes`
--
ALTER TABLE `extranotes`
  MODIFY `tableid` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fees_set`
--
ALTER TABLE `fees_set`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `marks_finalexams`
--
ALTER TABLE `marks_finalexams`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `marks_first_term`
--
ALTER TABLE `marks_first_term`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `marks_second_term`
--
ALTER TABLE `marks_second_term`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `marks_third_term`
--
ALTER TABLE `marks_third_term`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Id_Student` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5736;

--
-- AUTO_INCREMENT for table `studentsregistered`
--
ALTER TABLE `studentsregistered`
  MODIFY `id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `studentsregisteredfees`
--
ALTER TABLE `studentsregisteredfees`
  MODIFY `id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
