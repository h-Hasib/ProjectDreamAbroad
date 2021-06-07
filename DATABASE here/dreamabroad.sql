-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 04:16 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreamabroad`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `street` varchar(255) DEFAULT NULL,
  `district` varchar(150) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipCode` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `userProfile_UserID` int(11) NOT NULL,
  `uni_UniverityID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(10) NOT NULL,
  `bookingDate` date NOT NULL,
  `UserProfile_userID` int(11) NOT NULL,
  `payment_paymentID` int(10) NOT NULL,
  `university_universityID` int(10) NOT NULL,
  `requiredDoc_reqDocID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `userProfile_UserID` int(11) NOT NULL,
  `resources_resCategory` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptID` int(10) NOT NULL,
  `deptName` varchar(100) NOT NULL,
  `uniSchool_schoolID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `exam_ssc` varchar(50) DEFAULT NULL,
  `group_ssc` varchar(50) DEFAULT NULL,
  `gpa_ssc` varchar(10) DEFAULT NULL,
  `year_ssc` int(4) DEFAULT NULL,
  `institute_ssc` varchar(100) DEFAULT NULL,
  `board_ssc` varchar(50) DEFAULT NULL,
  `exam_hsc` varchar(50) DEFAULT NULL,
  `group_hsc` varchar(50) DEFAULT NULL,
  `gpa_hsc` varchar(10) DEFAULT NULL,
  `year_hsc` int(4) DEFAULT NULL,
  `institute_hsc` varchar(100) DEFAULT NULL,
  `board_hsc` varchar(50) DEFAULT NULL,
  `undergrad` varchar(50) DEFAULT NULL,
  `ug_program` varchar(50) DEFAULT NULL,
  `ug_cgpa` varchar(10) DEFAULT NULL,
  `un_year` int(4) DEFAULT NULL,
  `un_institute` varchar(100) DEFAULT NULL,
  `graduate` varchar(50) DEFAULT NULL,
  `g_program` varchar(50) DEFAULT NULL,
  `g_cgpa` varchar(10) DEFAULT NULL,
  `g_year` int(4) DEFAULT NULL,
  `g_institute` varchar(100) DEFAULT NULL,
  `userProfile_UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expertisearea`
--

CREATE TABLE `expertisearea` (
  `expAreaID` int(10) NOT NULL,
  `areaName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(10) NOT NULL,
  `paymentAmount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `profEmail` varchar(100) NOT NULL,
  `profName` varchar(100) NOT NULL,
  `department_deptID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `professor_expertisearea`
--

CREATE TABLE `professor_expertisearea` (
  `professor_profEmail` varchar(100) NOT NULL,
  `expertiseArea_expAreaID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `professor_researchproject`
--

CREATE TABLE `professor_researchproject` (
  `professor_profEmail` varchar(100) NOT NULL,
  `researchProject_researchID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requireddoc`
--

CREATE TABLE `requireddoc` (
  `reqDocID` int(10) NOT NULL,
  `file` varchar(255) NOT NULL,
  `department_deptID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `researchproject`
--

CREATE TABLE `researchproject` (
  `researchID` int(10) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `projectName` varchar(100) NOT NULL,
  `startDate` date NOT NULL,
  `university_universityID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resCategory` varchar(20) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `uploadDate` date NOT NULL,
  `about` varchar(255) DEFAULT NULL,
  `examDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unischool`
--

CREATE TABLE `unischool` (
  `schoolID` int(10) NOT NULL,
  `schoolName` varchar(100) NOT NULL,
  `uni_universityID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `universityID` int(10) NOT NULL,
  `uniName` varchar(100) NOT NULL,
  `uniWebUrl` varchar(255) NOT NULL,
  `uniEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`universityID`, `uniName`, `uniWebUrl`, `uniEmail`) VALUES
(1, 'MIT', 'www.mit.edu', 'mit@mit.com');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `profilePic` varchar(255) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `fatherName` varchar(100) DEFAULT NULL,
  `motherName` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nidPassport` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`userID`, `firstName`, `lastName`, `email`, `password`, `gender`, `phoneNumber`, `profilePic`, `nationality`, `religion`, `fatherName`, `motherName`, `dob`, `nidPassport`) VALUES
(5, 'Ahnaf', 'Ahmed', 'ahnaf@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '01521345678', 'images/profile_picture/ahnaf.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Hasibul', 'Hasan', 'hasibul@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '01795645117', 'images/profile_picture/hasibul.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Estiack', 'Shaon', 'estiack@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '01987767665', 'images/profile_picture/shaon.jpg', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD KEY `FKaddress198500` (`userProfile_UserID`),
  ADD KEY `FKaddress129266` (`uni_UniverityID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `FKbooking110852` (`UserProfile_userID`),
  ADD KEY `FKbooking128843` (`payment_paymentID`),
  ADD KEY `FKbooking52369` (`university_universityID`),
  ADD KEY `FKbooking407125` (`requiredDoc_reqDocID`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`userProfile_UserID`,`resources_resCategory`),
  ADD KEY `FKbookmark96536` (`userProfile_UserID`),
  ADD KEY `FKbookmark9500` (`resources_resCategory`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptID`),
  ADD UNIQUE KEY `deptName` (`deptName`),
  ADD KEY `FKdepartment924890` (`uniSchool_schoolID`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD KEY `FKeducation737704` (`userProfile_UserID`);

--
-- Indexes for table `expertisearea`
--
ALTER TABLE `expertisearea`
  ADD PRIMARY KEY (`expAreaID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`profEmail`),
  ADD KEY `FKprofessor334601` (`department_deptID`);

--
-- Indexes for table `professor_expertisearea`
--
ALTER TABLE `professor_expertisearea`
  ADD PRIMARY KEY (`professor_profEmail`,`expertiseArea_expAreaID`),
  ADD KEY `FKprofessor_832478` (`professor_profEmail`),
  ADD KEY `FKprofessor_3276` (`expertiseArea_expAreaID`);

--
-- Indexes for table `professor_researchproject`
--
ALTER TABLE `professor_researchproject`
  ADD PRIMARY KEY (`professor_profEmail`,`researchProject_researchID`),
  ADD KEY `FKprofessor_836268` (`professor_profEmail`),
  ADD KEY `FKprofessor_576626` (`researchProject_researchID`);

--
-- Indexes for table `requireddoc`
--
ALTER TABLE `requireddoc`
  ADD PRIMARY KEY (`reqDocID`),
  ADD KEY `FKrequiredDo373251` (`department_deptID`);

--
-- Indexes for table `researchproject`
--
ALTER TABLE `researchproject`
  ADD PRIMARY KEY (`researchID`),
  ADD UNIQUE KEY `projectName` (`projectName`),
  ADD KEY `FKresearchPr841566` (`university_universityID`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resCategory`);

--
-- Indexes for table `unischool`
--
ALTER TABLE `unischool`
  ADD PRIMARY KEY (`schoolID`),
  ADD UNIQUE KEY `schoolName` (`schoolName`),
  ADD KEY `FKuniSchool275645` (`uni_universityID`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`universityID`),
  ADD UNIQUE KEY `uniName` (`uniName`),
  ADD UNIQUE KEY `uniWebUrl` (`uniWebUrl`),
  ADD UNIQUE KEY `uniEmail` (`uniEmail`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `deptID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expertisearea`
--
ALTER TABLE `expertisearea`
  MODIFY `expAreaID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requireddoc`
--
ALTER TABLE `requireddoc`
  MODIFY `reqDocID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `researchproject`
--
ALTER TABLE `researchproject`
  MODIFY `researchID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unischool`
--
ALTER TABLE `unischool`
  MODIFY `schoolID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `universityID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `FKaddress129266` FOREIGN KEY (`uni_UniverityID`) REFERENCES `university` (`universityID`),
  ADD CONSTRAINT `FKaddress198500` FOREIGN KEY (`userProfile_UserID`) REFERENCES `userprofile` (`userID`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FKbooking110852` FOREIGN KEY (`UserProfile_userID`) REFERENCES `userprofile` (`userID`),
  ADD CONSTRAINT `FKbooking128843` FOREIGN KEY (`payment_paymentID`) REFERENCES `payment` (`paymentID`),
  ADD CONSTRAINT `FKbooking407125` FOREIGN KEY (`requiredDoc_reqDocID`) REFERENCES `requireddoc` (`reqDocID`),
  ADD CONSTRAINT `FKbooking52369` FOREIGN KEY (`university_universityID`) REFERENCES `university` (`universityID`);

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `FKbookmark9500` FOREIGN KEY (`resources_resCategory`) REFERENCES `resources` (`resCategory`),
  ADD CONSTRAINT `FKbookmark96536` FOREIGN KEY (`userProfile_UserID`) REFERENCES `userprofile` (`userID`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `FKdepartment924890` FOREIGN KEY (`uniSchool_schoolID`) REFERENCES `unischool` (`schoolID`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `FKeducation737704` FOREIGN KEY (`userProfile_UserID`) REFERENCES `userprofile` (`userID`);

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `FKprofessor334601` FOREIGN KEY (`department_deptID`) REFERENCES `department` (`deptID`);

--
-- Constraints for table `professor_expertisearea`
--
ALTER TABLE `professor_expertisearea`
  ADD CONSTRAINT `FKprofessor_3276` FOREIGN KEY (`expertiseArea_expAreaID`) REFERENCES `expertisearea` (`expAreaID`),
  ADD CONSTRAINT `FKprofessor_832478` FOREIGN KEY (`professor_profEmail`) REFERENCES `professor` (`profEmail`);

--
-- Constraints for table `professor_researchproject`
--
ALTER TABLE `professor_researchproject`
  ADD CONSTRAINT `FKprofessor_576626` FOREIGN KEY (`researchProject_researchID`) REFERENCES `researchproject` (`researchID`),
  ADD CONSTRAINT `FKprofessor_836268` FOREIGN KEY (`professor_profEmail`) REFERENCES `professor` (`profEmail`);

--
-- Constraints for table `requireddoc`
--
ALTER TABLE `requireddoc`
  ADD CONSTRAINT `FKrequiredDo373251` FOREIGN KEY (`department_deptID`) REFERENCES `department` (`deptID`);

--
-- Constraints for table `researchproject`
--
ALTER TABLE `researchproject`
  ADD CONSTRAINT `FKresearchPr841566` FOREIGN KEY (`university_universityID`) REFERENCES `university` (`universityID`);

--
-- Constraints for table `unischool`
--
ALTER TABLE `unischool`
  ADD CONSTRAINT `FKuniSchool275645` FOREIGN KEY (`uni_universityID`) REFERENCES `university` (`universityID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
