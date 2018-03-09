# Host: localhost  (Version 5.5.5-10.1.30-MariaDB)
# Date: 2018-03-08 19:26:26
# Generator: MySQL-Front 5.4  (Build 1.40)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES (15,'admin','admin','admin','admin','admin'),(16,'hr','hr','hr','hr','hr'),(20,'payroll','payroll','payroll','payroll','payroll');

#
# Structure for table "company"
#

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `abn` varchar(50) DEFAULT NULL,
  `description` text,
  `email` varchar(100) DEFAULT NULL,
  `contactPerson` varchar(100) DEFAULT NULL,
  `phoneNumber` varchar(100) DEFAULT NULL,
  `mobileNumber` varchar(100) DEFAULT NULL,
  `address` text,
  `department` varchar(100) DEFAULT NULL,
  `jobFunctionId` varchar(11) DEFAULT NULL,
  `isApproved` varchar(1) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "company"
#

INSERT INTO `company` VALUES (5,'C12345678901','Villacar Transit','12345678901','heheheh','torredale1014@gmail.com','Dale Torre','12312312','123213123','bacolod city negros occ','domestic transport','1','1');

#
# Structure for table "downloads"
#

DROP TABLE IF EXISTS `downloads`;
CREATE TABLE `downloads` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `fileName` varchar(255) DEFAULT NULL,
  `uploadedFile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "downloads"
#

INSERT INTO `downloads` VALUES (1,'Employee Contract','1520552649.pdf'),(2,'Client Contract','1520552679.pdf');

#
# Structure for table "dtr"
#

DROP TABLE IF EXISTS `dtr`;
CREATE TABLE `dtr` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `timesheetId` int(11) DEFAULT '0',
  `owner` varchar(50) DEFAULT NULL,
  `checkIn` time DEFAULT NULL,
  `checkOut` time DEFAULT NULL,
  `breakOut` time DEFAULT NULL,
  `breakIn` time DEFAULT NULL,
  `breakOut2` time DEFAULT NULL,
  `breakIn2` time DEFAULT NULL,
  `lunchIn` time DEFAULT NULL,
  `lunchOut` time DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `status` varchar(1) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

#
# Data for table "dtr"
#

INSERT INTO `dtr` VALUES (67,1,'E1520420680','21:48:23','21:48:33','21:48:26','21:48:28','21:48:31','21:48:32','21:48:30','21:48:29','2018-03-07','4'),(68,1,'E1520420680','17:39:54','18:31:06','17:45:26','18:29:35','18:30:17','18:31:03','18:31:05','18:31:04','2018-03-06','4'),(69,2,'E1520420680','18:31:52','18:31:59','18:31:56','18:31:57',NULL,NULL,'18:31:59','18:31:58','2018-03-05','4'),(70,2,'E1520420680','18:32:42','18:32:45','18:32:43','18:32:44',NULL,NULL,NULL,NULL,'2018-03-04','4'),(71,2,'E1520420680','18:32:58','18:33:00',NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-08','4');

#
# Structure for table "employee"
#

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `jobId` int(11) DEFAULT NULL,
  `username` varchar(12) DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "employee"
#

INSERT INTO `employee` VALUES (2,2,'E1520420680','0000-00-00 00:00:00');

#
# Structure for table "hr"
#

DROP TABLE IF EXISTS `hr`;
CREATE TABLE `hr` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `jobFunction` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "hr"
#


#
# Structure for table "inquiries"
#

DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE `inquiries` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(100) DEFAULT NULL,
  `workEmail` varchar(100) DEFAULT NULL,
  `jobFunctionId` varchar(11) DEFAULT NULL,
  `zipCode` varchar(4) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "inquiries"
#

INSERT INTO `inquiries` VALUES (1,'dale','torre','2345678909','torredale1014%40gmail.com','1','6100','asdljflsdfjkdsflkdsjfdsfdsfsdf'),(2,'kevin','arnol','123213123','ako%40gmail.com','1','1231','asdjfsjdlfjiqwieoruweoiruwoejfajsdlfjlsajdf%3Bjsadf'),(3,'fred','garcia','123123213123123','fred.garcia%40tekinbox.com','1','1234','heheheh+hello+therelasjdlfjldsfldsjf123213123213+kope');

#
# Structure for table "interview_date"
#

DROP TABLE IF EXISTS `interview_date`;
CREATE TABLE `interview_date` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `resumeId` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "interview_date"
#

INSERT INTO `interview_date` VALUES (1,'1','2018-03-06','12:59:00'),(2,'','0000-00-00','00:00:00'),(3,'7','2018-03-08','00:00:12'),(4,'7','2018-12-01','00:00:12');

#
# Structure for table "job"
#

DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `refNum` varchar(25) DEFAULT NULL,
  `jobFunctionId` int(11) DEFAULT NULL,
  `positionTypeId` int(11) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `abn` varchar(50) DEFAULT NULL,
  `workEmail` varchar(100) DEFAULT NULL,
  `jobTitle` varchar(100) DEFAULT NULL,
  `businessPhone` varchar(100) DEFAULT NULL,
  `zipCode` varchar(4) DEFAULT NULL,
  `address` text,
  `requiredExperience` varchar(100) DEFAULT NULL,
  `comment` text,
  `createDate` datetime DEFAULT NULL,
  `isApproved` varchar(1) DEFAULT '0',
  `contactName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "job"
#

INSERT INTO `job` VALUES (2,'1520419183',1,2,'Bus+Driver','Villacar+Transit','12345678901','torredale1014@gmail.com','Operations+Manager','2345678909','6100','asfsfdsf','1-3+years','jljsdljflksjdlkfjlsdfljowqeurioueworiuasjdlfjdsfdsf',NULL,'1','Dale+Torre'),(3,'1520419182',1,2,'Truck Driver','Villacar+Transit','12345678901','torredale1014@gmail.com','Operations+Manager','2345678909','6100','asfsfdsf','1-3+years','jljsdljflksjdlkfjlsdfljowqeurioueworiuasjdlfjdsfdsf','1899-12-29 00:00:00','1','Dale+Torre'),(4,'1520431443',2,1,'curer','cure me','12312321312','torredale1014@gmail.com','manager','123123213','1122','bacolod city','1-3','lksadfljskfljdsfdsflkdsjflkjdslfjdsklf',NULL,'0','dale torre');

#
# Structure for table "job_function"
#

DROP TABLE IF EXISTS `job_function`;
CREATE TABLE `job_function` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `option` varchar(255) DEFAULT NULL,
  `isDeleted` varchar(1) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "job_function"
#

INSERT INTO `job_function` VALUES (1,'Transportation','0'),(2,'Procurement','0'),(3,'Supply Planning','0'),(4,'Logistics','0'),(5,'Training Certification','0'),(6,'Demand Planning','0'),(7,'Order Fulfilment','0'),(8,'Manufacturing','0'),(9,'Warehousing','0');

#
# Structure for table "position_type"
#

DROP TABLE IF EXISTS `position_type`;
CREATE TABLE `position_type` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `option` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "position_type"
#

INSERT INTO `position_type` VALUES (1,'Temporary'),(2,'Full-time'),(3,'Project'),(4,'Part-time');

#
# Structure for table "projects"
#

DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `uploadedImage` varchar(50) DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "projects"
#

INSERT INTO `projects` VALUES (1,'sample project','sample lng mn ah','1520508331.txt','2018-03-08 19:25:31');

#
# Structure for table "resume"
#

DROP TABLE IF EXISTS `resume`;
CREATE TABLE `resume` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `jobId` int(11) DEFAULT NULL,
  `jobFunctionId` int(11) DEFAULT NULL,
  `refNum` varchar(25) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `abn` varchar(11) DEFAULT NULL,
  `taxNumber` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phoneNumber` varchar(100) DEFAULT NULL,
  `address1` text,
  `address2` text,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zipCode` varchar(20) DEFAULT NULL,
  `coverLetter` text,
  `uploadedResume` varchar(100) DEFAULT NULL,
  `speedtest` varchar(100) DEFAULT NULL,
  `uploadedSpecs` varchar(100) DEFAULT NULL,
  `uploadedCerts` varchar(255) DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `isApproved` varchar(2) DEFAULT '0',
  `isHired` varchar(2) DEFAULT '0',
  `isDeleted` varchar(1) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "resume"
#

INSERT INTO `resume` VALUES (7,2,1,'2832381273','Dale','Torre','12312312312','123213','torredale1014@gmail.com','2345678909','Billboard','Billboard','Bacolod','Negros+Occidental','6100','fadfdsafdsfdsfsdfsdfsadfsdfsdfsdfdsfdsfdsf','1520420366.txt','www.speedtest.com','',NULL,NULL,'1','1','0'),(8,2,1,'1520436853','Dale','Torre','12345671234','123123','torredale1014@gmail.com','2345678909','Billboard','Billboard','Bacolod','Negros Occidental','6100','lsjdfjsdflfdsfwerowuer13213123123','1520436853.txt','www.speedtest.com','',NULL,NULL,'0','0','0'),(9,0,1,NULL,'sampe','asd','11111111111','fdsf','rgmak12%40gmail.com','asd','dfdsk','ad','asd','asd','1111','asdkkasdaasdaaaaaaaaaaaaaaaaaaaaa','1520543500.jpg','asd','','',NULL,'0','0','0');

#
# Structure for table "timesheet"
#

DROP TABLE IF EXISTS `timesheet`;
CREATE TABLE `timesheet` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `jobId` int(11) DEFAULT NULL,
  `employee` varchar(15) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` varchar(2) DEFAULT '0',
  `createDate` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "timesheet"
#

INSERT INTO `timesheet` VALUES (1,2,'E1520420680','Timesheet as of 2018-03-08 11:30:38','0',NULL),(2,2,'E1520420680','Timesheet as of 2018-03-08 11:33:02','0',NULL);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (4,'C12345678901','12345','Dale+Torre','Villacar+Transit','company'),(5,'E1520420680','12345','Dale','Torre','employee');
