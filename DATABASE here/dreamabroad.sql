-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 08:17 AM
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
  `userProfile_UserID` int(11) DEFAULT NULL,
  `addressID` int(10) NOT NULL,
  `uni_universityID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`street`, `district`, `city`, `state`, `zipCode`, `country`, `userProfile_UserID`, `addressID`, `uni_universityID`) VALUES
('34-C', 'Dhaka', 'Khilkhet', 'N/A', '4567', 'Bangladesh', 15, 2, NULL),
('64B', 'Washington', 'Hamilton', 'North caroline', '67123', 'USA', 16, 3, NULL),
('', '', '', '', '', '', 18, 4, NULL),
('Road no 6,H#17', 'NILPHAMARI', 'UKIL PARA', 'NILPHAMARI', '5300', 'BANGLADESH', 19, 5, NULL),
('Public Library', 'Jamalpur', 'Amlapara', '', '2000', 'Bangladesh', 20, 6, NULL),
('77 Massachusetts Avenue', 'Cambridge', 'Massachusetts', 'Cambridge', 'MA 02139', 'USA', NULL, 7, 2),
('University Street', 'Doha', 'Doha', 'N/A', '2713', 'Qatar', NULL, 8, 3),
('The Old Schools', 'Cambridge', 'Trinity Ln', 'Cambridge', 'CB2 1TN', 'United Kingdom', NULL, 9, 5),
('27 King\'s College Circle', 'Toronto', 'Toronto', 'Ontario', ' M5S 1A1 ', 'Canada', NULL, 10, 6),
('31C, public Library', '', 'Jamalpur', '', '', 'Bangladesh', 21, 11, NULL),
('United City, Madani Avenue', 'Dhaka', 'Badda', 'N/A', 'Dhaka 1212', 'Bangladesh', NULL, 12, 7),
(NULL, NULL, NULL, NULL, NULL, NULL, 22, 13, NULL),
('Comilla Para', 'Dhaka', 'Badda', 'N/A', '1212', 'Bangladesh', 23, 14, NULL),
('7, Chandipur', 'Bogra', 'Sherpur', 'North-Bengal', '5840', 'Bangladesh', 24, 15, NULL),
('64B Panir Lane', 'Sirajgonj', 'ullapara', 'N/A', '6760', 'Bangladesh', 25, 16, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adminprofile`
--

CREATE TABLE `adminprofile` (
  `admin_ID` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminprofile`
--

INSERT INTO `adminprofile` (`admin_ID`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Hasibul Hasan', 'admin.da@master.com', 'hasib@admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(10) NOT NULL,
  `bookingDate` date NOT NULL,
  `UserProfile_userID` int(11) DEFAULT NULL,
  `payment_paymentID` int(10) DEFAULT NULL,
  `university_universityID` int(10) DEFAULT NULL,
  `requiredDoc_reqDocID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `bookmarkID` int(12) NOT NULL,
  `userProfile_UserID` int(11) NOT NULL,
  `resource_resourceID` int(10) NOT NULL,
  `payment_paymentID` int(10) DEFAULT NULL
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

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptID`, `deptName`, `uniSchool_schoolID`) VALUES
(1, 'Aeronautics and Astronautics', 1),
(2, 'Chemical Engineering', 1),
(3, 'Mechanical Engineering ', 1),
(4, 'Computer Engineering ', 1),
(7, 'Mechanical Engineering ', 2),
(8, 'Civil Engineering ', 2),
(9, 'Computer Science Engineering ', 2),
(10, 'Economics', 10),
(11, 'Music and Theater Arts ', 10),
(12, 'Biology', 11),
(13, 'Mathematics', 11),
(14, 'Architecture', 12),
(15, 'Computer Science', 13),
(16, 'Mining and petroleum engineering', 13),
(17, 'Medical Science', 14),
(18, 'Humanities', 14),
(19, 'Business and Mangement', 15),
(20, 'Economics', 15),
(21, 'Masters in Business Administration', 16),
(22, 'Masters in Economics', 16),
(27, 'Doctorate at Law', 17),
(28, 'MSc in Medicinal Chemistry', 18),
(29, 'MSc in Biomedicine', 18),
(30, 'Masters in Philosophy', 19),
(31, 'Masters in literature', 19),
(32, 'Bachelor in literature', 20),
(33, 'Bachelor of Arts', 20),
(34, 'Doctorate at Literature', 21),
(35, 'Bachelor in Biomedicine', 22),
(36, 'Bachelor in pharmacy', 22),
(37, 'Bachelor in Computer Science', 25),
(38, 'Bachelor in EEE', 25),
(39, 'Bachelor in Business and Administration', 26),
(40, 'Bachelor in Marketing ', 26),
(41, 'Bachelor in Accounting', 26),
(42, 'Bachelor in Finance', 26),
(43, 'Bachelor in Biology', 27),
(44, 'Bachelor in Mathematics', 27),
(45, 'Architecture', 28),
(46, 'Masters in Architecture', 29),
(49, 'Music', 20),
(50, 'Masters in Finance', 30),
(51, 'Masters in Accounting', 30),
(52, 'Doctorate in Finance', 31),
(53, 'Doctorate in Accounting', 31),
(54, 'Masters in Computer Science and Engineering', 32),
(55, 'Masters in Mechanical Engineering', 32),
(56, 'Masters in Chemical Engineering', 32),
(57, 'Masters in Civil Engineering', 32),
(58, 'Bachelor in Computer Science and Engineering', 33),
(59, 'Bachelor in EEE', 33),
(60, 'Bachelor in Mechanical Engineering', 33),
(61, 'Bachelor in Arts', 34),
(62, 'Bachelor in Economics', 34),
(63, 'Bachelor in Geology', 34),
(64, 'Doctorate in Culture', 35),
(65, 'Doctorate in Literature', 35),
(66, 'Bachelor of Business Administration', 36),
(67, 'Bachelor of Science in Economics', 36),
(68, 'CE', 37),
(69, 'EEE', 37),
(70, 'CSE', 37),
(71, 'ENVIRONMENT AND DEVELOPMENT STUDIES', 38),
(72, 'Master of Business Administration', 39),
(73, 'Master of Computer Science and Engineering', 40);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `educationID` int(10) NOT NULL,
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
  `ug_year` int(4) DEFAULT NULL,
  `ug_institute` varchar(100) DEFAULT NULL,
  `graduate` varchar(50) DEFAULT NULL,
  `g_program` varchar(50) DEFAULT NULL,
  `g_cgpa` varchar(10) DEFAULT NULL,
  `g_year` int(4) DEFAULT NULL,
  `g_institute` varchar(100) DEFAULT NULL,
  `userProfile_UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`educationID`, `exam_ssc`, `group_ssc`, `gpa_ssc`, `year_ssc`, `institute_ssc`, `board_ssc`, `exam_hsc`, `group_hsc`, `gpa_hsc`, `year_hsc`, `institute_hsc`, `board_hsc`, `undergrad`, `ug_program`, `ug_cgpa`, `ug_year`, `ug_institute`, `graduate`, `g_program`, `g_cgpa`, `g_year`, `g_institute`, `userProfile_UserID`) VALUES
(2, 'ssc', 'science', '5.00', 2014, 'Biggan', 'RAJ', 'hsc', 'science', '5.00', 2016, 'Biggan', 'RAJ', 'Bachelor', 'BBA', '3.12', 2022, 'North South University', '', '', '', 0, '', 15),
(3, 'ssc', 'science', '5.00', 2014, 'BCPSC', 'California', 'alevel', 'science', '5.00', 2016, 'BCSPSC', 'DHK', 'BSC', 'CSE', '3.12', 2022, 'UIU', 'MBA', 'Marketing', '2.56', 2024, 'DU', 16),
(4, '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', 0, '', 18),
(5, 'ssc', 'science', '5.00', 2015, 'NILPHAMARI GOVT HIGH SCHOOL', 'DNJ', 'hsc', 'science', '4,67', 2017, 'NILPHAMARI GOVT COLLEGE', 'DNJ', 'BSC', 'CSE', '1.45', 2022, 'UNITED INTERNATIONAL UNIVERSITY', '', '', '', 0, '', 19),
(6, 'ssc', 'science', '5.00', 2014, 'Jamalpur Zilla School;', 'Dhaka', 'hsc', 'science', '5.00', 2016, 'Notre Dame College', 'Dhaka', 'Bsc', 'CSE', '2.33', 2022, 'UNITED INTERNATIONAL UNIVERSITY', '', '', '', 0, '', 20),
(7, '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', 0, '', 21),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22),
(9, 'ssc', 'science', '5.00', 2014, 'GCBHS', 'DHAKA', 'hsc', 'science', '5.00', 2016, 'GCPSC', 'DHAKA', 'BSC', 'CSE', '3.99', 2022, 'United International University', '', '', '', 0, '', 23),
(10, 'ssc', 'science', '5.00', 2014, 'Bogra Cantonment Public School & College', 'Rajshahi', 'hsc', 'science', '5.00', 2016, 'Bogra Cantonment Public School & College', 'Rajshahi', 'BSc', 'CSE', '3.98', 2022, 'United International University', 'MSc', 'CSE', '3.98', 2024, 'United International University', 24),
(11, 'ssc', 'science', '5.00', 2015, 'MABS', 'RAJ', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', 0, '', 25);

-- --------------------------------------------------------

--
-- Table structure for table `expertisearea`
--

CREATE TABLE `expertisearea` (
  `expAreaID` int(10) NOT NULL,
  `areaName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expertisearea`
--

INSERT INTO `expertisearea` (`expAreaID`, `areaName`) VALUES
(1, 'Artificial Intelligence'),
(2, 'Data Mining'),
(3, 'Machine Learning'),
(4, 'Algorithms'),
(5, 'Neural Networking'),
(6, 'Networking'),
(7, 'Data Science'),
(8, 'Internet of Thing'),
(9, 'Deep Learning'),
(10, 'Database Management'),
(11, 'Web'),
(12, 'Cloud Computing'),
(13, 'Accounting'),
(14, 'Finance'),
(15, 'Human Resources'),
(16, 'Literature '),
(17, 'Arts And Humanities'),
(18, 'Philosophy'),
(19, 'Language and Culture'),
(20, 'Anthropology'),
(21, 'Geology'),
(22, 'Medicine'),
(23, 'Psychology'),
(24, 'Earth and Soil'),
(25, 'Economics'),
(26, 'Agriculture'),
(27, 'Agro Technology'),
(28, 'Biochemistry'),
(29, 'Molecule and Biotechnology'),
(30, 'Applied Physics'),
(31, 'Hydrology and Fluid Mechanics');

-- --------------------------------------------------------

--
-- Table structure for table `expertisearea_researchproject`
--

CREATE TABLE `expertisearea_researchproject` (
  `exp_res_ID` int(10) NOT NULL,
  `expArea_ID` int(10) NOT NULL,
  `research_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expertisearea_researchproject`
--

INSERT INTO `expertisearea_researchproject` (`exp_res_ID`, `expArea_ID`, `research_ID`) VALUES
(1, 3, 1),
(2, 2, 1),
(3, 10, 2),
(4, 11, 2),
(5, 9, 3),
(6, 3, 3),
(7, 5, 4),
(8, 1, 5),
(9, 3, 5),
(10, 1, 5),
(11, 5, 6),
(12, 4, 7),
(13, 7, 7),
(14, 10, 8),
(15, 12, 8),
(16, 11, 9),
(17, 10, 10),
(18, 12, 10),
(19, 2, 10),
(20, 1, 10),
(21, 3, 11),
(22, 1, 11);

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
  `professor_ID` int(10) NOT NULL,
  `profEmail` varchar(100) NOT NULL,
  `profName` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `department_deptID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`professor_ID`, `profEmail`, `profName`, `country`, `department_deptID`) VALUES
(1, 'cmr@uiu.ac.bd', 'Dr. CHOWDHURY MOFIZUR RAHMAN', 'Bangladesh', 70),
(2, 'imam@cse.uiu.ac.bd\r\n', 'MOHAMMAD IMAM HOSSAIN', 'Bangladesh', 70),
(3, 'mnh@cse.uiu.ac.bd\r\n', 'Dr. MOHAMMAD NURUL HUDA', 'Bangladesh', 70),
(4, 'mnh@cse.uiu.ac.bd', 'Dr. MOHAMMAD NURUL HUDA', 'Bangladesh', 73),
(5, 'richard@gmail.com', 'Dr. Alfred Richard', 'USA', 3),
(6, 'dumbledore@yahoo.com', 'Dr. Albus Dumbledore', 'USA', 4),
(7, 'hjackman@gmail.com', 'Dr. Hugh Jackman', 'Canada', 39),
(8, 'snape@gmail.com', 'Dr. Severus Snape', 'Canada', 58),
(9, 'nolan@hotmail.com', 'Dr. Christopher Nolan', 'Canada', 58),
(10, 'christianbale@gmail.com', 'Dr. Christian Bale', 'Canada', 54),
(11, 'leonardo@hotmail.com', 'Dr. Leonardo DiCaprio', 'Canada', 54),
(12, 'justintrudeau@gmail.com', 'Dr. Justin Trudeau', 'Canada', 58),
(13, 'harrison@yahoo.com', 'Dr. Henry Harrison', 'Canada', 54);

-- --------------------------------------------------------

--
-- Table structure for table `professor_expertisearea`
--

CREATE TABLE `professor_expertisearea` (
  `prof_expID` int(11) NOT NULL,
  `expertiseArea_expAreaID` int(10) NOT NULL,
  `Professor_ProfessorID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professor_expertisearea`
--

INSERT INTO `professor_expertisearea` (`prof_expID`, `expertiseArea_expAreaID`, `Professor_ProfessorID`) VALUES
(1, 10, 2),
(2, 11, 2),
(3, 12, 2),
(4, 2, 3),
(5, 2, 2),
(6, 1, 3),
(7, 5, 3),
(8, 9, 3),
(9, 1, 1),
(10, 4, 1),
(11, 31, 5),
(12, 3, 6),
(13, 13, 7),
(14, 14, 7),
(15, 2, 8),
(16, 3, 8),
(17, 9, 8),
(18, 10, 9),
(19, 11, 9),
(20, 12, 9),
(21, 8, 10),
(22, 6, 11),
(23, 7, 10),
(24, 9, 10),
(25, 3, 10),
(26, 3, 13),
(27, 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `professor_researchproject`
--

CREATE TABLE `professor_researchproject` (
  `pro_resID` int(10) NOT NULL,
  `researchProject_researchID` int(10) NOT NULL,
  `prof_res_professorID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professor_researchproject`
--

INSERT INTO `professor_researchproject` (`pro_resID`, `researchProject_researchID`, `prof_res_professorID`) VALUES
(4, 1, 6),
(5, 2, 2),
(8, 3, 10),
(9, 3, 13),
(10, 4, 12),
(11, 5, 6),
(12, 9, 2),
(13, 9, 3),
(14, 10, 2),
(15, 10, 1),
(16, 11, 1),
(17, 11, 4),
(18, 6, 1),
(19, 6, 3),
(20, 7, 6),
(21, 8, 11),
(22, 8, 10),
(23, 8, 13);

-- --------------------------------------------------------

--
-- Table structure for table `requireddoc`
--

CREATE TABLE `requireddoc` (
  `reqDocID` int(10) NOT NULL,
  `file` varchar(255) NOT NULL,
  `department_deptID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `researchproject`
--

CREATE TABLE `researchproject` (
  `researchID` int(10) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `projectName` varchar(100) DEFAULT NULL,
  `startDate` date NOT NULL,
  `university_universityID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `researchproject`
--

INSERT INTO `researchproject` (`researchID`, `Description`, `projectName`, `startDate`, `university_universityID`) VALUES
(1, 'Because of new computing technologies, machine learning today is not like machine learning of the past. It was born from pattern recognition and the theory that computers can learn without being programmed to perform specific tasks; researchers interested', 'ML in Human Language', '2021-05-12', 2),
(2, 'Numerous associations go through impressive numbers every year promoting on Google or other web indexes, on the grounds that expanding the measure of their site traffic frequently prompts expanded deals and income. In the present worldwide economy, you can contact individuals in a larger number of nations than you presumably at any point expected, and they are utilizing a wide range of gadgets: cell phones, tablets, PCs, and work areas.', 'WEB Programming and Database Management', '2021-04-01', 7),
(3, 'Machine learning and Deep Learning research advances are transforming our technology. Here are the 20 most important (most-cited) scientific papers that have been published since 2014, starting with \"Dropout: a simple way to prevent neural networks from overfitting\".', 'Deep learn tech on Computing system', '2019-05-16', 6),
(4, 'The key idea is to randomly drop units (along with their connections) from the neural network during training. This prevents units from co-adapting too much. This significantly reduces overfitting and gives major improvements over other regularization methods', 'A simple way to prevent neural networks from overfitting', '2010-10-04', 6),
(5, 'We present a residual learning framework to ease the training of deep neural networks that are substantially deeper than those used previously. We explicitly reformulate the layers as learning residual functions with reference to the layer inputs, instead of learning unreferenced functions. We provide comprehensive empirical evidence showing that these residual networks are easier to optimize, and can gain accuracy from considerably increased depth.', 'Deep Residual Learning for Image Recognition,', '2019-05-07', 2),
(6, ' Training Deep Neural Networks is complicated by the fact that the distribution of each layer\'s inputs changes during training, as the parameters of the previous layers change.  We refer to this phenomenon as internal covariate shift, and address the problem by normalizing layer inputs.  Applied to a state-of-the-art image classification model, Batch Normalization achieves the same accuracy with 14 times fewer training steps, and beats the original model by a significant margin.', 'Accelerating Deep Network Training by Reducing Internal Covariate Shift,', '2020-08-05', 7),
(7, 'We present a new dataset with the goal of advancing the state-of-the-art in object recognition by placing the question of object recognition in the context of the broader question of scene understanding. Our dataset contains photos of 91 objects types that would be easily recognizable by a 4 year old. Finally, we provide baseline performance analysis for bounding box and segmentation detection results using a Deformable Parts Model', 'Common Objects in Context ,', '2021-05-11', 2),
(8, ' We introduce a new scene-centric database called Places with over 7 million labeled pictures of scenes. We propose new methods to compare the density and diversity of image datasets and show that Places is as dense as other scene datasets and has more diversity.', 'Learning deep features for scene recognition using places database ', '2020-11-18', 6),
(9, 'As for P2PDDB system, the operation of data on local nodes is fully transparent. It means that users can operate the local database just like the centralized database without needing to care data fragment and node location. But it does not indicate we can operate all global data from just one node. The operation of data on other nodes must be authorized. Therefore, under the premise of not considering the heterogeneous conversion transparency, P2PDDB system data operation is pre-transparent. In general, when developing a new system, either users or developers prefer homogeneous database management system, rather than that of heterogeneous which is for special needs.', 'Research on a Distributed Database System Based on Peer-to-Peer Model with Scientific Materials', '2021-03-09', 7),
(10, 'Scalable data processing in new settings, including interactive exploration, metadata management, cloud and serverless environments, and machine learning; query processing on compressed, semi-structured, and streaming data; query processing with additional constraints, including fairness, resource utilization, and cost.', 'Scalable data analysis and query processing', '2021-02-09', 7),
(11, 'Distributed machine learning and graph analytics; physical and logical optimization of machine learning pipelines; online model management and maintenance; prediction serving; real-time personalization; latency-accuracy tradeoffs and edge computing for large-scale models; machine learning lifecycle management.', 'Systems for machine learning and model management', '2021-06-01', 7);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resource_ID` int(10) NOT NULL,
  `resourceCategory` varchar(100) NOT NULL,
  `about` varchar(1000) DEFAULT NULL,
  `uploadDate` datetime DEFAULT NULL,
  `nextExamDate` date DEFAULT NULL,
  `introVedioLink` varchar(255) DEFAULT NULL,
  `officialLink` varchar(255) DEFAULT NULL,
  `gDriveLink` varchar(255) DEFAULT NULL,
  `pdfPath` varchar(255) DEFAULT NULL,
  `moreLink` varchar(255) DEFAULT NULL,
  `imagePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_ID`, `resourceCategory`, `about`, `uploadDate`, `nextExamDate`, `introVedioLink`, `officialLink`, `gDriveLink`, `pdfPath`, `moreLink`, `imagePath`) VALUES
(6, 'SAT', ' SAT(Scholastic Assessment Test) is a standardized test administered by the College Board and is required to be taken by students seeking admission to undergraduate schools.\r\nSAT exam has been developed to evaluate the written, verbal and mathematical skills of the candidates. Applicants aspire to pursue undergraduate courses.', '2021-06-11 17:23:16', '2024-10-25', 'https://www.youtube.com/embed/DNr2Lc3OZzw', 'http://sat.collegeboard.org/', 'https://drive.google.com/drive/folders/1m6jIaqaKd19rXeNuoeo-kVXTobJi7P2b?usp=sharing', 'resourceFiles/SAT_Guidelines.pdf', 'https://blog.prepscholar.com/how-to-prepare-for-the-sat', 'resourceFiles/SAT_exam_Pattern_info_graph.jpg'),
(11, 'GRE', 'The Graduate Record Examinations(GRE) is a standardized test that is an admissions requirement for many graduate schools in the United States and Canada and few in other countries. The GRE is owned and administered by Educational Testing Service.', '2021-06-11 18:39:19', '2021-07-22', 'https://www.youtube.com/embed/AhZgalyrzCg?start=24', 'https://www.ets.org/gre', 'https://drive.google.com/drive/folders/1olZ7z-VbUbs21lHzLOe8jzSCcme71YLQ?usp=sharing', 'resourceFiles/practice_book_GRE_general_test.pdf', 'https://hsa.grecbd.com/requiredbooksforgre/?fbclid=IwAR2vhIwD90V4BE31pNWzj08V59zZZPLhPZe7iF_ml8uStWZdyDpSBOuGv_I', 'resourceFiles/GRE_mark_distribution.png');

-- --------------------------------------------------------

--
-- Table structure for table `uniprogram`
--

CREATE TABLE `uniprogram` (
  `programID` int(11) NOT NULL,
  `programName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uniprogram`
--

INSERT INTO `uniprogram` (`programID`, `programName`) VALUES
(1, 'Undergraduate'),
(2, 'Graduate'),
(3, 'Postgraduate'),
(4, 'Professional Course'),
(5, 'Diploma');

-- --------------------------------------------------------

--
-- Table structure for table `unischool`
--

CREATE TABLE `unischool` (
  `schoolID` int(10) NOT NULL,
  `uni_UniversityID` int(10) NOT NULL,
  `uniProgram_ProgramID` int(11) NOT NULL,
  `schoolName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unischool`
--

INSERT INTO `unischool` (`schoolID`, `uni_UniversityID`, `uniProgram_ProgramID`, `schoolName`) VALUES
(1, 2, 1, 'School of Engineering'),
(2, 2, 2, 'School of Engineering'),
(10, 2, 1, 'School of Humanities, Arts, and Social Sciences'),
(11, 2, 2, 'School of Science'),
(12, 2, 3, 'School of Architecture and Planning'),
(13, 3, 5, 'Diploma of Engineering'),
(14, 3, 1, 'College of Arts and Science'),
(15, 3, 1, 'College of Business and Economics'),
(16, 3, 2, 'College of Business and Economics'),
(17, 3, 3, 'College of Law'),
(18, 3, 2, 'College of Medicine'),
(19, 5, 2, 'Arts and Humanities'),
(20, 5, 1, 'Arts and Humanities'),
(21, 5, 3, 'Arts and Humanities'),
(22, 5, 1, 'Biological Sciences'),
(23, 5, 2, 'Clinical Medicine'),
(24, 5, 3, 'Clinical Medicine'),
(25, 5, 1, 'School of Technology'),
(26, 6, 1, 'School of Business'),
(27, 6, 1, 'School of Science'),
(28, 6, 1, 'School of Architecture'),
(29, 6, 2, 'School of Architecture'),
(30, 6, 2, 'School of Business'),
(31, 6, 3, 'School of Business'),
(32, 6, 2, 'School of Engineering'),
(33, 6, 1, 'School of Engineering'),
(34, 6, 1, 'School of Arts '),
(35, 6, 3, 'School of Arts'),
(36, 7, 1, 'SCHOOL OF BUSINESS & ECONOMICS'),
(37, 7, 1, 'SCHOOL OF SCIENCE & ENGINEERING'),
(38, 7, 1, 'SCHOOL OF HUMANITIES AND SOCIAL SCIENCES'),
(39, 7, 2, 'SCHOOL OF BUSINESS & ECONOMICS'),
(40, 7, 2, 'SCHOOL OF SCIENCE & ENGINEERING');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `universityID` int(10) NOT NULL,
  `uniName` varchar(100) NOT NULL,
  `uniWebUrl` varchar(255) NOT NULL,
  `uniEmail` varchar(100) NOT NULL,
  `uni_Phone_Number` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`universityID`, `uniName`, `uniWebUrl`, `uniEmail`, `uni_Phone_Number`) VALUES
(2, 'Massachusetts Institute of Technology', 'https://www.mit.edu/', 'admissions@mit.edu', '617-253-1000'),
(3, 'Qatar University', 'http://www.qu.edu.qa/', 'info@qu.edu.qa', '(+974) 4403-3333'),
(5, 'University of Cambridge', 'https://www.cam.ac.uk/', 'admissions@cam.ac.uk', '+44 (0)1223 337733'),
(6, 'University of Toronto', 'https://www.utoronto.ca/', 'admissions.sgs@utoronto.ca', '+1 416-978-2011'),
(7, 'United International University', 'http://www.uiu.ac.bd/', 'info@uiu.ac.bd', '+88 09604-848-848');

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
  `nidPassport` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `job_institute` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`userID`, `firstName`, `lastName`, `email`, `password`, `gender`, `phoneNumber`, `profilePic`, `nationality`, `religion`, `fatherName`, `motherName`, `dob`, `nidPassport`, `occupation`, `job_institute`) VALUES
(15, 'Shakib', 'Ahmed', 'sakib@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '01718889400', 'images/profile_picture/shakib.jpg', 'Bangladeshi', 'Islam', 'Md Ismail Hossen', 'Shamshad Begum', '1995-11-20', '1812356630007', 'Research Assistant', 'North South University'),
(16, 'Alexander', 'James', 'alex@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '05786123123', 'images/profile_picture/download (3).jpg', 'AUS', 'christ', 'Jack Daniel', 'Mrs. Rose Marry', '2024-08-31', '00009999911111', NULL, NULL),
(18, 'ahmed', 'Ashik', 'ashik@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '09231465', 'images/profile_picture/download (4).jpg', 'Bangladeshi', 'Islam', '', '', '0000-00-00', '', NULL, NULL),
(19, 'Ahnaf Ahmed', 'Aquib', 'ahnaf@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '01783899263', 'images/profile_picture/Ahnaf.jpg', 'Bangladeshi', 'Islam', 'ALAMGIR ZAMAN', 'AKHTAR BANU', '1998-03-10', '0174676388637829', 'STUDENT', 'UNITED INTERNATIONAL UNIVERSITY'),
(20, 'Shakir', 'Ahmed', 'shakushaku@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '01319506457', 'images/profile_picture/shakir.jpg', 'Bangladeshi', 'Islam', 'Late Sultan Ahmed', 'Shaheen Sultana', '1999-12-30', '247562216753', 'student', 'UNITED INTERNATIONAL UNIVERSITY'),
(21, 'Roqibul', 'Islam', 'roqib@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '01543651234', 'images/profile_picture/download (7).jpg', '', 'Islam', 'Md. ABC', 'DEF', '1995-07-20', '', 'Research Assistant', 'UCB'),
(22, 'MD Hasibul', 'Hasan', 'h@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '012234567', 'images/profile_picture/download (4).jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Mehedi', 'Saleh', 'admin@hellomunna.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '01798675645', 'images/profile_picture/munna.jpg', 'Bangladeshi', 'Islam', 'Md. Mizanur Rahman', 'Mukuli Rahman', '1998-12-05', '123412341234', 'Developer', 'United International University'),
(24, 'Hasibul', 'Hasan', 'hasib@gmail.com', 'ae167392ccc259673d9b15b4d78450bd', 'male', '01795645117', 'images/profile_picture/hasibul.jpg', 'Bangladeshi', 'Islam', 'MD. Solaiman Ali', 'Rehana Parvin', '1995-11-25', '10150239867', 'Student', 'UIU'),
(25, 'Shahriyar', 'Hasan', 'sh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '01733454534', 'images/profile_picture/shahriyar.jpg', 'Bangaldeshi', 'Islam', 'Md. Abdul Matin', 'Shahinur Begum', '1999-08-17', '1234123412344', 'Teaching Assistant', 'UIU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`),
  ADD KEY `FKaddress198500` (`userProfile_UserID`),
  ADD KEY `FK_universityID` (`uni_universityID`);

--
-- Indexes for table `adminprofile`
--
ALTER TABLE `adminprofile`
  ADD PRIMARY KEY (`admin_ID`);

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
  ADD PRIMARY KEY (`bookmarkID`),
  ADD UNIQUE KEY `bookmarkID` (`bookmarkID`),
  ADD KEY `FKbookmark96536` (`userProfile_UserID`),
  ADD KEY `FK_Payment_Bookmark_paymentID` (`payment_paymentID`),
  ADD KEY `FK_bookmark_resources_resID` (`resource_resourceID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptID`),
  ADD KEY `FKdepartment924890` (`uniSchool_schoolID`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`educationID`),
  ADD KEY `FKeducation737704` (`userProfile_UserID`);

--
-- Indexes for table `expertisearea`
--
ALTER TABLE `expertisearea`
  ADD PRIMARY KEY (`expAreaID`);

--
-- Indexes for table `expertisearea_researchproject`
--
ALTER TABLE `expertisearea_researchproject`
  ADD PRIMARY KEY (`exp_res_ID`),
  ADD KEY `FK_exp_res_expID` (`expArea_ID`),
  ADD KEY `FK_res_exp_ResID` (`research_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`professor_ID`),
  ADD KEY `FKprofessor334601` (`department_deptID`);

--
-- Indexes for table `professor_expertisearea`
--
ALTER TABLE `professor_expertisearea`
  ADD PRIMARY KEY (`prof_expID`),
  ADD KEY `FKprofessor_3276` (`expertiseArea_expAreaID`),
  ADD KEY `FK_Professor_Exp_ProfessorID` (`Professor_ProfessorID`);

--
-- Indexes for table `professor_researchproject`
--
ALTER TABLE `professor_researchproject`
  ADD PRIMARY KEY (`pro_resID`),
  ADD UNIQUE KEY `pro_resID` (`pro_resID`),
  ADD KEY `FKprofessor_576626` (`researchProject_researchID`),
  ADD KEY `FK_professor_research_professorID` (`prof_res_professorID`);

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
  ADD PRIMARY KEY (`resource_ID`),
  ADD UNIQUE KEY `resourceCategory` (`resourceCategory`);

--
-- Indexes for table `uniprogram`
--
ALTER TABLE `uniprogram`
  ADD PRIMARY KEY (`programID`);

--
-- Indexes for table `unischool`
--
ALTER TABLE `unischool`
  ADD PRIMARY KEY (`schoolID`),
  ADD KEY `FK_uniProgram_uniSchool_programID` (`uniProgram_ProgramID`),
  ADD KEY `FK_university_unischool_universityID` (`uni_UniversityID`);

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
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `adminprofile`
--
ALTER TABLE `adminprofile`
  MODIFY `admin_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bookmarkID` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `deptID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `educationID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `expertisearea`
--
ALTER TABLE `expertisearea`
  MODIFY `expAreaID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `expertisearea_researchproject`
--
ALTER TABLE `expertisearea_researchproject`
  MODIFY `exp_res_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `professor_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `professor_expertisearea`
--
ALTER TABLE `professor_expertisearea`
  MODIFY `prof_expID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `professor_researchproject`
--
ALTER TABLE `professor_researchproject`
  MODIFY `pro_resID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `requireddoc`
--
ALTER TABLE `requireddoc`
  MODIFY `reqDocID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `researchproject`
--
ALTER TABLE `researchproject`
  MODIFY `researchID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resource_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `uniprogram`
--
ALTER TABLE `uniprogram`
  MODIFY `programID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `unischool`
--
ALTER TABLE `unischool`
  MODIFY `schoolID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `universityID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `FK_universityID` FOREIGN KEY (`uni_universityID`) REFERENCES `university` (`universityID`),
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
  ADD CONSTRAINT `FK_Payment_Bookmark_paymentID` FOREIGN KEY (`payment_paymentID`) REFERENCES `payment` (`paymentID`),
  ADD CONSTRAINT `FK_bookmark_resources_resID` FOREIGN KEY (`resource_resourceID`) REFERENCES `resources` (`resource_ID`),
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
-- Constraints for table `expertisearea_researchproject`
--
ALTER TABLE `expertisearea_researchproject`
  ADD CONSTRAINT `FK_exp_res_expID` FOREIGN KEY (`expArea_ID`) REFERENCES `expertisearea` (`expAreaID`),
  ADD CONSTRAINT `FK_res_exp_ResID` FOREIGN KEY (`research_ID`) REFERENCES `researchproject` (`researchID`);

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `FKprofessor334601` FOREIGN KEY (`department_deptID`) REFERENCES `department` (`deptID`);

--
-- Constraints for table `professor_expertisearea`
--
ALTER TABLE `professor_expertisearea`
  ADD CONSTRAINT `FK_Professor_Exp_ProfessorID` FOREIGN KEY (`Professor_ProfessorID`) REFERENCES `professor` (`professor_ID`),
  ADD CONSTRAINT `FKprofessor_3276` FOREIGN KEY (`expertiseArea_expAreaID`) REFERENCES `expertisearea` (`expAreaID`);

--
-- Constraints for table `professor_researchproject`
--
ALTER TABLE `professor_researchproject`
  ADD CONSTRAINT `FK_professor_research_professorID` FOREIGN KEY (`prof_res_professorID`) REFERENCES `professor` (`professor_ID`),
  ADD CONSTRAINT `FKprofessor_576626` FOREIGN KEY (`researchProject_researchID`) REFERENCES `researchproject` (`researchID`);

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
  ADD CONSTRAINT `FK_uniProgram_uniSchool_programID` FOREIGN KEY (`uniProgram_ProgramID`) REFERENCES `uniprogram` (`programID`),
  ADD CONSTRAINT `FK_university_unischool_universityID` FOREIGN KEY (`uni_UniversityID`) REFERENCES `university` (`universityID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
