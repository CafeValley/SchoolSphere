-- -------------------------------------------------------------
-- TablePlus 6.7.1(636)
--
-- https://tableplus.com/
--
-- Database: highschool
-- Generation Time: 2025-11-03 02:01:35.0030
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `academicyear`;
CREATE TABLE `academicyear` (
  `idoftable` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `active` int NOT NULL,
  `dateoftthis` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idoftable`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `discountdata`;
CREATE TABLE `discountdata` (
  `idfortable` bigint NOT NULL AUTO_INCREMENT,
  `regisid` bigint NOT NULL,
  `discountamount` double(100,2) NOT NULL,
  PRIMARY KEY (`idfortable`)
) ENGINE=InnoDB AUTO_INCREMENT=4052 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `extranotes`;
CREATE TABLE `extranotes` (
  `tableid` bigint NOT NULL AUTO_INCREMENT,
  `studentindex` varchar(10) NOT NULL,
  `note` text NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `whenwasit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tableid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `fees_set`;
CREATE TABLE `fees_set` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `feesname` varchar(25) NOT NULL,
  `feesamount` decimal(20,2) NOT NULL,
  `feesdate` date NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `active` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `marks_finalexams`;
CREATE TABLE `marks_finalexams` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `studentindex` varchar(15) NOT NULL,
  `subjectid` varchar(100) NOT NULL,
  `class` varchar(15) NOT NULL,
  `subclassname` varchar(4) NOT NULL,
  `mark` decimal(5,2) NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12676 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `marks_first_term`;
CREATE TABLE `marks_first_term` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `studentindex` varchar(15) NOT NULL,
  `subjectid` varchar(100) NOT NULL,
  `class` varchar(15) NOT NULL,
  `subclassname` varchar(4) NOT NULL,
  `mark` double(5,2) NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43038 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `marks_second_term`;
CREATE TABLE `marks_second_term` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `studentindex` varchar(15) NOT NULL,
  `subjectid` varchar(100) NOT NULL,
  `class` varchar(15) NOT NULL,
  `subclassname` varchar(4) NOT NULL,
  `mark` decimal(5,2) NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27544 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `marks_third_term`;
CREATE TABLE `marks_third_term` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `studentindex` varchar(15) NOT NULL,
  `subjectid` varchar(100) NOT NULL,
  `class` varchar(15) NOT NULL,
  `subclassname` varchar(4) NOT NULL,
  `mark` decimal(5,2) NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20466 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `idfortable` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  PRIMARY KEY (`idfortable`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `Id_Student` int NOT NULL AUTO_INCREMENT,
  `StudentName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
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
  `whenwasit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_Student`)
) ENGINE=InnoDB AUTO_INCREMENT=2541 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `studentsregistered`;
CREATE TABLE `studentsregistered` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `studentindex` varchar(25) NOT NULL,
  `yearselect` varchar(15) NOT NULL,
  `subclassname` varchar(2) NOT NULL,
  `feesregis` double(15,2) NOT NULL,
  `feesyear` double(15,2) NOT NULL,
  `active` int NOT NULL,
  `2ndactive` int NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `whodidthis` varchar(25) NOT NULL,
  `whenwasit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4050 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `studentsregisteredfees`;
CREATE TABLE `studentsregisteredfees` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `relatedregisid` bigint DEFAULT NULL,
  `studentindex` varchar(25) NOT NULL,
  `totaloffees` double(15,2) NOT NULL,
  `typeofpayment` int NOT NULL,
  `active1` int NOT NULL,
  `acadmicyear` varchar(15) NOT NULL,
  `whodidthis` varchar(25) NOT NULL,
  `whenwasit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receiptno` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9405 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `intotal` int NOT NULL,
  `codename` varchar(25) NOT NULL,
  `priorityinr` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `members` (`idfortable`, `username`, `password`, `user_type`) VALUES
(1, 'admin', 'admin', 'admin');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;