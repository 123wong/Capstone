-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2018 at 03:48 AM
-- Server version: 5.6.36-log
-- PHP Version: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `m4schema`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `procSaveUser`(IN `iUser_ID` INT, IN `i_Name` VARCHAR(45), IN `i_UserEmail` VARCHAR(45), IN `i_UserAddress` VARCHAR(45), IN `i_UserPassword` TEXT, IN `i_UserType` VARCHAR(45), IN `i_UserStatus` VARCHAR(45), IN `i_subscribeToken` TEXT)
    NO SQL
BEGIN
   
insert into cp_tb_user ( UserName, UserEmail, UserAddress, UserPassword, UserType, UserStatus, subscribeToken) 
values ( i_Name, i_UserEmail, i_UserAddress, i_UserPassword, i_UserType,  i_UserStatus, i_subscribeToken);
   

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `administrator`
--
CREATE TABLE IF NOT EXISTS `administrator` (
`Job Position` varchar(12)
,`Job Description` varchar(15)
);
-- --------------------------------------------------------

--
-- Table structure for table `cp_tb_create`
--

CREATE TABLE IF NOT EXISTS `cp_tb_create` (
  `User_ID` int(11) NOT NULL,
  `Thread_ID` int(11) NOT NULL,
  PRIMARY KEY (`User_ID`,`Thread_ID`),
  KEY `threadidconstcreate_idx` (`Thread_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cp_tb_job`
--

CREATE TABLE IF NOT EXISTS `cp_tb_job` (
  `Job ID` int(11) NOT NULL,
  `Job Position` varchar(45) DEFAULT NULL,
  `Job Description` varchar(45) DEFAULT NULL,
  KEY `jusercontjob_idx` (`Job ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cp_tb_jobapply`
--

CREATE TABLE IF NOT EXISTS `cp_tb_jobapply` (
  `Job Apply ID` int(11) DEFAULT NULL,
  `Job Name` varchar(45) DEFAULT NULL,
  `User ID` int(11) DEFAULT NULL,
  KEY `jobcontapply_idx` (`Job Apply ID`),
  KEY `jobcontid_idx` (`User ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cp_tb_message`
--

CREATE TABLE IF NOT EXISTS `cp_tb_message` (
  `Message ID` int(11) DEFAULT NULL,
  `Message Title` varchar(45) DEFAULT NULL,
  `Message Name` varchar(45) DEFAULT NULL,
  KEY `usercontmg_idx` (`Message ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cp_tb_message_receive`
--

CREATE TABLE IF NOT EXISTS `cp_tb_message_receive` (
  `Email_ID` int(11) NOT NULL,
  `EmailName` varchar(45) DEFAULT NULL,
  `EmailTitle` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Email_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cp_tb_participate`
--

CREATE TABLE IF NOT EXISTS `cp_tb_participate` (
  `User_ID` int(11) NOT NULL,
  `Thread_Message_ID` int(11) NOT NULL,
  PRIMARY KEY (`User_ID`,`Thread_Message_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cp_tb_thread`
--

CREATE TABLE IF NOT EXISTS `cp_tb_thread` (
  `Thread ID` int(11) NOT NULL,
  `Thread Name` varchar(45) DEFAULT NULL,
  `Thread Date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Thread ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cp_tb_threadattach`
--

CREATE TABLE IF NOT EXISTS `cp_tb_threadattach` (
  `Create By` int(11) DEFAULT NULL,
  `Detail` varchar(45) DEFAULT NULL,
  `ThreadAttachment_ID` int(11) NOT NULL,
  `ThraedMessage_ID` int(11) NOT NULL,
  PRIMARY KEY (`ThreadAttachment_ID`,`ThraedMessage_ID`),
  KEY `threadmgcontatt_idx` (`ThraedMessage_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cp_tb_threadmsg`
--

CREATE TABLE IF NOT EXISTS `cp_tb_threadmsg` (
  `Message_ID` int(11) NOT NULL,
  `Post_Date` int(11) DEFAULT NULL,
  `Content` varchar(45) DEFAULT NULL,
  `Thread_ID` int(11) NOT NULL,
  PRIMARY KEY (`Message_ID`,`Thread_ID`),
  KEY `threadidconttm_idx` (`Thread_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cp_tb_user`
--

CREATE TABLE IF NOT EXISTS `cp_tb_user` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(45) DEFAULT NULL,
  `UserAddress` varchar(45) DEFAULT NULL,
  `UserEmail` varchar(45) DEFAULT NULL,
  `UserPassword` varchar(45) DEFAULT NULL,
  `UserType` varchar(45) DEFAULT NULL,
  `UserStatus` varchar(45) DEFAULT NULL,
  `subscribeToken` text,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `UserEmail` (`UserEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

-- --------------------------------------------------------

--
-- Table structure for table `cp_tb_userjob`
--

CREATE TABLE IF NOT EXISTS `cp_tb_userjob` (
  `Job ID` int(11) NOT NULL,
  `Job position` varchar(45) DEFAULT NULL,
  `Job Description` varchar(45) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Job ID`),
  KEY `useridcontujob_idx` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cp_tb_usredu`
--

CREATE TABLE IF NOT EXISTS `cp_tb_usredu` (
  `User Edu ID` int(11) NOT NULL,
  `Graduate Date` int(11) DEFAULT NULL,
  `Institution` varchar(45) DEFAULT NULL,
  `Certificate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`User Edu ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `message`
--
CREATE TABLE IF NOT EXISTS `message` (
`Message ID` varchar(10)
,`Message Title` varchar(13)
,`Message Name` varchar(12)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `schools starting with n`
--
CREATE TABLE IF NOT EXISTS `schools starting with n` (
`Institution` varchar(45)
);
-- --------------------------------------------------------

--
-- Structure for view `administrator`
--
DROP TABLE IF EXISTS `administrator`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `administrator` AS select 'Job Position' AS `Job Position`,'Job Description' AS `Job Description` from `cp_tb_job` where ('Job Position' like '%Administrator%');

-- --------------------------------------------------------

--
-- Structure for view `message`
--
DROP TABLE IF EXISTS `message`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `message` AS select 'Message ID' AS `Message ID`,'Message Title' AS `Message Title`,'Message Name' AS `Message Name` from `cp_tb_message` where ('Message ID' like '%message%');

-- --------------------------------------------------------

--
-- Structure for view `schools starting with n`
--
DROP TABLE IF EXISTS `schools starting with n`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `schools starting with n` AS select `cp_tb_usredu`.`Institution` AS `Institution` from `cp_tb_usredu` where (`cp_tb_usredu`.`Institution` like 'N%');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cp_tb_create`
--
ALTER TABLE `cp_tb_create`
  ADD CONSTRAINT `threadidconstcreate` FOREIGN KEY (`Thread_ID`) REFERENCES `cp_tb_thread` (`Thread ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `udridconstcreate` FOREIGN KEY (`User_ID`) REFERENCES `cp_tb_user` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cp_tb_job`
--
ALTER TABLE `cp_tb_job`
  ADD CONSTRAINT `jusercontjob` FOREIGN KEY (`Job ID`) REFERENCES `cp_tb_user` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cp_tb_jobapply`
--
ALTER TABLE `cp_tb_jobapply`
  ADD CONSTRAINT `jobcontapply` FOREIGN KEY (`Job Apply ID`) REFERENCES `cp_tb_job` (`Job ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jobcontid` FOREIGN KEY (`User ID`) REFERENCES `cp_tb_user` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cp_tb_message`
--
ALTER TABLE `cp_tb_message`
  ADD CONSTRAINT `usercontmg` FOREIGN KEY (`Message ID`) REFERENCES `cp_tb_user` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cp_tb_message_receive`
--
ALTER TABLE `cp_tb_message_receive`
  ADD CONSTRAINT `usermgcontreceive` FOREIGN KEY (`Email_ID`) REFERENCES `cp_tb_message` (`Message ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cp_tb_participate`
--
ALTER TABLE `cp_tb_participate`
  ADD CONSTRAINT `useridcontpart` FOREIGN KEY (`User_ID`) REFERENCES `cp_tb_user` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cp_tb_threadattach`
--
ALTER TABLE `cp_tb_threadattach`
  ADD CONSTRAINT `threadmgcontatt` FOREIGN KEY (`ThraedMessage_ID`) REFERENCES `cp_tb_threadmsg` (`Message_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cp_tb_threadmsg`
--
ALTER TABLE `cp_tb_threadmsg`
  ADD CONSTRAINT `threadidconttm` FOREIGN KEY (`Thread_ID`) REFERENCES `cp_tb_thread` (`Thread ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cp_tb_userjob`
--
ALTER TABLE `cp_tb_userjob`
  ADD CONSTRAINT `useridcontujob` FOREIGN KEY (`UserID`) REFERENCES `cp_tb_user` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cp_tb_usredu`
--
ALTER TABLE `cp_tb_usredu`
  ADD CONSTRAINT `userconteduid` FOREIGN KEY (`User Edu ID`) REFERENCES `cp_tb_user` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
