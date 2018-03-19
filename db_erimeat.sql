# Host: localhost  (Version 5.5.5-10.1.30-MariaDB)
# Date: 2018-03-19 23:21:33
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
  `jobFunctionId` varchar(11) DEFAULT '0',
  `email` varchar(50) DEFAULT NULL,
  `isDeleted` varchar(2) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES (34,'admin','admin','admin','admin','admin','0','torredale1014@gmail.com','0'),(35,'hr','hr','hr','hr','hr','1','robertcdc21@gmail.com','0'),(36,'payroll','payroll','payroll','payroll','payroll','0','payroll@payroll.com','0');

#
# Structure for table "city_option"
#

DROP TABLE IF EXISTS `city_option`;
CREATE TABLE `city_option` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `countryId` varchar(11) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `isDeleted` varchar(1) DEFAULT '0' COMMENT '0: notDeleted, 1: Deleted',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "city_option"
#

INSERT INTO `city_option` VALUES (1,'1','Bacolod','0'),(2,'1','Bago','0'),(3,'1','Sipalay','0'),(4,'1','Talisay','0'),(5,'1','Silay','1'),(6,'1','Manapla','0'),(7,'1','Victorias','0'),(9,'2','Sydney','0');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "company"
#

INSERT INTO `company` VALUES (1,'C1521441495','Villacar Transit','11111111111','jasldfjakdsjfljdsfdsfjlkdsjflkdsjflkdsjflkdsjfldf','torredale1014@gmail.com','Dale Torre','(+61) 234-567-890','(+61) 111-111-111','Billboard, Billboard','Domestic Transport','1','1'),(2,'C1521471998','ljasldjfsdflsdjf','12321321312','sadjlkfjsdlfjsfslflsdfdsfsdjfljlsadfsdf','a@a.com','sadfsjdfslflsdfj','(+61) 111-111-111','(+61) 111-111-111','lsjadfsjdflsjdlfj','asdjflsjflsjfdldsjf','5','1'),(3,'C1521472117','asdfsdfsdfsdf','22222222222','asdfsdfsdfsdfsdfsdfsdfasfsdf','torredale1014@gmail.com','dsfsfsdfsdfsdf','(+61) 234-567-890','(+61) 111-111-111','Billboard, Billboard','asdfsdfsdfsfasdf','6','1'),(4,'C1521472205','asdfsdfdsfdsf','33333333333','(+61) 234-567-890(+61) 234-567-890(+61) 234-567-890(+61) 234-567-890(+61) 234-567-890','torredale1014@gmail.com','sadfsdfdsfdsf','(+61) 234-567-890','(+61) 612-345-678','Billboard, Billboard','asdfsdfsdfdsf','8','1'),(5,'C1521472305','asdfsdffds','44444444444','(+61) 234-567-890(+61) 234-567-890(+61) 234-567-890(+61) 234-567-890(+61) 234-567-890','torredale1014@gmail.com','asdfdsfds','(+61) 234-567-890','(+61) 612-345-678','Billboard, Billboard','adsfdsfsdfsdf','4','1'),(6,'C1521472516','asdfsdfdsf','55555555555','sdfjsdjfldsjlfkdsjfjdsflkjdfljdsf','torredale1014@gmail.com','asdfdsfdsf','(+61) 234-567-890','(+61) 612-345-678','Billboard, Billboard','asdfsdfsdfdsf','7','1');

#
# Structure for table "country_option"
#

DROP TABLE IF EXISTS `country_option`;
CREATE TABLE `country_option` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(50) DEFAULT NULL,
  `isDeleted` varchar(1) DEFAULT '0' COMMENT '0: notDeleted, 1: Deleted',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "country_option"
#

INSERT INTO `country_option` VALUES (1,'Philippines','0'),(2,'Australia','0'),(4,'India','0');

#
# Structure for table "downloads"
#

DROP TABLE IF EXISTS `downloads`;
CREATE TABLE `downloads` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `fileName` varchar(255) DEFAULT NULL,
  `uploadedFile` varchar(255) DEFAULT NULL,
  `isDeleted` varchar(1) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "downloads"
#


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
  `status` varchar(1) DEFAULT '0' COMMENT '0:login, 1:break, 2:break2, 3:lunch, 4:logout',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "dtr"
#

INSERT INTO `dtr` VALUES (4,2,'E1521443984','15:28:58','15:29:01','15:28:58','15:28:59','15:29:00','15:29:01','15:29:00','15:28:59','2018-03-18','0'),(5,2,'E1521443984','15:29:10','15:29:13','15:29:11','15:29:11','15:29:12','15:29:13','15:29:12','15:29:11','2018-03-17','0'),(8,3,'E1521446057','15:55:30','15:55:33','15:55:30','15:55:31','15:55:32','15:55:33','15:55:32','15:55:31','2018-03-18','4'),(9,3,'E1521446057','15:55:41','15:55:45','15:55:42','15:55:42','15:55:44','15:55:44','15:55:43','15:55:43','2018-03-19','4'),(10,4,'E1521447336','16:16:02','16:16:05','16:16:03','16:16:03','16:16:04','16:16:05','16:16:04','16:16:04','2018-03-19','4');

#
# Structure for table "employee"
#

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `jobId` int(11) DEFAULT NULL,
  `username` varchar(12) DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `status` varchar(2) DEFAULT '1' COMMENT '1: Employed, 0: Unemployed',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "employee"
#

INSERT INTO `employee` VALUES (19,1,'E1521443984','2018-03-19 15:19:43','1'),(20,1,'E1521446057','2018-03-19 15:54:16','1'),(21,1,'E1521447336','2018-03-19 16:15:35','1');

#
# Structure for table "faq"
#

DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text,
  `answer` text,
  `level` varchar(50) DEFAULT NULL,
  `isDeleted` varchar(1) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "faq"
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "inquiries"
#


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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "interview_date"
#

INSERT INTO `interview_date` VALUES (1,'1','2018-03-28','13:00:00'),(2,'1','2018-03-20','01:00:00'),(3,'1','2018-03-20','01:00:00'),(4,'1','2018-03-16','01:00:00'),(5,'1','2018-03-21','01:00:00'),(6,'1','2018-03-20','01:00:00'),(7,'1','2018-03-20','01:00:00'),(8,'2','2018-03-14','01:00:00'),(9,'3','2018-03-22','02:00:00');

#
# Structure for table "invoice"
#

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `refNum` varchar(25) DEFAULT NULL,
  `timesheetId` varchar(11) DEFAULT NULL,
  `owner` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "invoice"
#

INSERT INTO `invoice` VALUES (2,'1521444994','2','E1521443984'),(3,'1521446216','3','E1521446057'),(4,'1521447444','4','E1521447336');

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
  `isApproved` varchar(2) DEFAULT '0' COMMENT '0:pending, 1:approved, -1:denied',
  `contactName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "job"
#

INSERT INTO `job` VALUES (1,'1521441294',1,1,'Bus Driver','Villacar Transit','11111111111','torredale1014@gmail.com','Operations Manager','(+61) 111-111-111','1111','Bacolod City Negros Occidental','0-1 Year','We are looking for an experienced bus driver',NULL,'1','Dale Torre'),(2,'1521454915',1,1,'asdfdsfsdfsdfsdfdsf','asdfsfsfsdf','11111111111','A@a.com','sadfdsfsdfsdf','(+61) 321-321-321','1232','sdsdasdasdsd','0-1 Year','sdsdasdasdsdsdsdasdasdsdsdsdasdasdsdsdsdasdasdsd','2018-03-19 18:22:57','1','sdfsdfdsfasfdsaf');

#
# Structure for table "job_function"
#

DROP TABLE IF EXISTS `job_function`;
CREATE TABLE `job_function` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `option` varchar(255) DEFAULT NULL,
  `title` text,
  `header` text,
  `description` text,
  `isDeleted` varchar(1) DEFAULT '0' COMMENT '0:no, 1:yes',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "job_function"
#

INSERT INTO `job_function` VALUES (1,'tran','Transportation','Transporation','Transportation expert hiring made easy','Enter description here..','0'),(2,'pro','Procurement','Procurement','Procurement expert hiring made easy','Involves the process of selecting vendors, establishing payment terms, strategic vetting, selection, the negotiation of contracts and actual purchasing of goods. We are concerned with acquiring (procuring) all of the goods, services, and work that is vital to an organization. Procurement is, essentially, the overarching or umbrella term within which purchasing can be found.','0'),(3,'sup','Supply Planning','Supply Planning','Supply Planning expert hiring made easy','Involve with determining how best to fulfill the requirements created from the Demand Plan. Our objective is to balance supply and demand in a manner that we achieve the financial and service objectives of the enterprise.','0'),(4,'log','Logistics','Logistics','Logistics expert hiring made easy','Enter description here..\n','0'),(5,'tra','Training Certification','Training Certification','Training Certification expert hiring made easy','Gain a practical, how-to overview of the entire training function. Through modeling of the best practices and latest techniques in training delivery, discover the 4Ps of training: Purpose & Assessment, Planning & Preparation, Presentation & Facilitation, and Performance & Evaluation.','0'),(6,'dem','Demand Planning','Demand Planning','Demand Planning expert hiring made easy','A multi-step operational supply chain management (SCM) process used to create reliable forecasts. We can quickly guide users to improve the accuracy of revenue forecasts, align inventory levels with peaks and troughs in demands, and help enhance profitability for a given channel or product.','0'),(7,'ord','Order Fulfillment','Order Fulfillment','Order Fulfillment expert hiring made easy','We facilitate customer orders through the order fulfillment cycle. In internal advocacy and voice for sales and customer needs.','0'),(8,'man','Manufacturing','Manufacturing\t','Manufacturing expert hiring made easy','We cover work performed in mechanical, physical, or components into new products. Assembling of component parts for manufactured products also falls under this umbrella unless the activity is appropriately classified in Construction.','0'),(9,'war','Warehousing','Warehousing','Warehousing expert hiring made easy','Enter description here..\n','0');

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
  `isDeleted` varchar(1) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "projects"
#


#
# Structure for table "resume"
#

DROP TABLE IF EXISTS `resume`;
CREATE TABLE `resume` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `jobId` int(11) DEFAULT NULL,
  `jobFunctionId` int(11) DEFAULT NULL,
  `username` varchar(12) DEFAULT NULL,
  `refNum` varchar(25) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `birthdate` varchar(10) DEFAULT NULL,
  `abn` varchar(11) DEFAULT NULL,
  `taxNumber` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phoneNumber` varchar(100) DEFAULT NULL,
  `address1` text,
  `address2` text,
  `city` varchar(11) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zipCode` varchar(20) DEFAULT NULL,
  `coverLetter` text,
  `uploadedResume` varchar(100) DEFAULT NULL,
  `speedtest` varchar(100) DEFAULT NULL,
  `uploadedSpecs` varchar(100) DEFAULT NULL,
  `uploadedCerts` varchar(255) DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `isApproved` varchar(2) DEFAULT '0' COMMENT '0:pending, 1:approved, -1:denied',
  `isHired` varchar(2) DEFAULT '0' COMMENT '0:no, 1:yes',
  `isDeleted` varchar(1) DEFAULT '0' COMMENT '0:no, 1:yes',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "resume"
#

INSERT INTO `resume` VALUES (1,1,1,'E1521443984','1521441620','Mark','Mendoza','11-11-1111','22222222222','22222','rgmak12@gmail.com','(+61) 222-222-222','2222222222','2222222222222222','1','22222222','2222','222222222222222222222222','1521441620.txt','222222222222222222','0','0',NULL,'1','1','0'),(2,1,1,'E1521446057','1521445993','Robert','Cap','33-33-3333','33333333333','3333','torredale1014@gmail.com','(+61) 234-567-890','Billboard','Billboard','1','Negros Occidental','6100','fasdfsdfdsffasdfsdfdsffasdfsdfdsffasdfsdfdsffasdfsdfdsf','1521445993.pdf','sdfsfsfsdfsdf','1521445993.png','0',NULL,'1','1','0'),(3,1,1,'E1521447336','1521447280','adsfadsfdsfsd','sdfdsafdsf','12-32-1321','21312323123','21213123','torredale1014@gmail.com','(+61) 234-567-890','Billboard','Billboard','1','Negros Occidental','6100','asdasdsadsadsadsadsadsadasdsad','1521447280.pdf','sadasdasdadsadsad','0','0',NULL,'1','1','0'),(4,1,1,NULL,'1521450908','sadasdsad','asdasdasd','11-11-1111','11111111111','123123','torredale1014@gmail.com','(+61) 234-567-890','Billboard','Billboard','1','Negros Occidental','6100','dsadsaddsasadsadsaddsasadsadsaddsasadsadsaddsasa','1521450908.pdf','dsadsaddsasa','1521450908.png','0',NULL,'0','0','0'),(5,1,1,'','1521447280','adsfadsfdsfsd','sdfdsafdsf','12-32-1321','21312323123','21213123','torredale1014@gmail.com','(+61) 234-567-890','Billboard','Billboard','1','Negros Occidental','6100','asdasdsadsadsadsadsadsadasdsad','1521447280.pdf','sadasdasdadsadsad','0','0','1899-12-29 00:00:00','0','0','0');

#
# Structure for table "timesheet"
#

DROP TABLE IF EXISTS `timesheet`;
CREATE TABLE `timesheet` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `jobId` int(11) DEFAULT NULL,
  `employee` varchar(15) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` varchar(2) DEFAULT '0' COMMENT '0:pending, 1:verified, 2:dispute, 3:approved',
  `createDate` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "timesheet"
#

INSERT INTO `timesheet` VALUES (2,1,'E1521443984','Timesheet as of 2018-03-19 08:29:24','3','2018-03-19 15:29:24'),(3,1,'E1521446057','Timesheet as of 2018-03-19 08:55:50','3','2018-03-19 15:55:50'),(4,1,'E1521447336','Timesheet as of 2018-03-19 09:16:12','3','2018-03-19 16:16:12');

#
# Structure for table "timesheet_dispute"
#

DROP TABLE IF EXISTS `timesheet_dispute`;
CREATE TABLE `timesheet_dispute` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `timesheetId` int(11) DEFAULT NULL,
  `reason` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "timesheet_dispute"
#


#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'C1521441495','12345','Dale Torre','Villacar Transit','company'),(12,'E1521443984','12345','Mark','Mendoza','employee'),(13,'E1521446057','12345','Robert','Cap','employee'),(14,'E1521447336','temppassword','adsfadsfdsfsd','sdfdsafdsf','employee'),(15,'C1521471998','2b8889e80cb6afc64ea9923339183799475b1123','sadfsjdfslflsdfj','ljasldjfsdflsdjf','company'),(16,'C1521472117','2b8889e80cb6afc64ea9923339183799475b1123','dsfsfsdfsdfsdf','asdfsdfsdfsdf','company'),(17,'C1521472205','2b8889e80cb6afc64ea9923339183799475b1123','sadfsdfdsfdsf','asdfsdfdsfdsf','company'),(18,'C1521472305','2b8889e80cb6afc64ea9923339183799475b1123','asdfdsfds','asdfsdffds','company'),(19,'C1521472516','8cb2237d0679ca88db6464eac60da96345513964','asdfdsfdsf','asdfsdfdsf','company');
