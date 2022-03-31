-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 05:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ermsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(50) DEFAULT NULL,
  `AdminuserName` varchar(50) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `AdminName`, `AdminuserName`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'Admin', 'admin', '2019-02-07 16:52:45'),
(2, 'ashik', 'ashik', 'ashik', '2022-03-29 14:50:05'),
(3, 'asif', 'asif', 'asif', '2022-03-29 14:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `ID` int(10) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `Department` varchar(30) NOT NULL,
  `Salary` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `Designation`, `Department`, `Salary`) VALUES
(1, 'HR manager', 'HR', 30000),
(2, 'Sales Manager', 'Management', 40000),
(3, 'Software Developer', 'Development', 50000),
(4, 'Web developer', 'Development', 45000),
(5, 'Production Manager', 'Production', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `empeducation`
--

CREATE TABLE `empeducation` (
  `Id` int(11) NOT NULL,
  `EduID` int(5) DEFAULT NULL,
  `CourseGra` varchar(45) DEFAULT NULL,
  `SchoolCollegeGra` varchar(45) DEFAULT NULL,
  `YearPassingGra` varchar(45) DEFAULT NULL,
  `PercentageGra` varchar(4) DEFAULT NULL,
  `CourseSSC` varchar(45) DEFAULT NULL,
  `SchoolCollegeSSC` varchar(45) DEFAULT NULL,
  `YearPassingSSC` varchar(45) DEFAULT NULL,
  `PercentageSSC` varchar(4) DEFAULT NULL,
  `CourseHSC` varchar(45) DEFAULT NULL,
  `SchoolCollegeHSC` varchar(45) DEFAULT NULL,
  `YearPassingHSC` varchar(45) DEFAULT NULL,
  `PercentageHSC` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empeducation`
--

INSERT INTO `empeducation` (`Id`, `EduID`, `CourseGra`, `SchoolCollegeGra`, `YearPassingGra`, `PercentageGra`, `CourseSSC`, `SchoolCollegeSSC`, `YearPassingSSC`, `PercentageSSC`, `CourseHSC`, `SchoolCollegeHSC`, `YearPassingHSC`, `PercentageHSC`) VALUES
(1, 12384, 'B.Tech(IT)', 'LPU', '2014', '86%', 'Science', 'ABC Senoir secondary School', '2010', '64%', 'Science', 'abcd', '2008', '98%'),
(2, 46373, 'B.Tech(IT)', 'LPU', '2013', '86%', 'Science', 'DPS Senoir secondary School', '2009', '64%', 'Science', 'DPS Senoir secondary School', '2008', '90%'),
(4, 63723, 'BCA', 'TVN', '1997', '68 %', 'Science', 'TVN', '1992', '76 %', 'Science', 'TVN', '2010', '89 %'),
(7, 45436, 'B.Tech', 'ABC', '2012', '75', 'PCM', 'XYZ', '2008', '67', '10th', 'HGHH', '2006', '89'),
(9, 36, 'B.Sc in CSE', 'Portcity International University', '2023', '3.78', 'Science', 'Akbaria School and College', '2017', '4.68', 'Science', 'Hajerataju University College', '2019', '4.00'),
(10, 16251, 'B.Sc in CSE', 'Portcity International University', '2023', '3.31', 'Science', 'fgdg', '2017', '4.62', 'Science', 'bhjfgj', '2019', '4.45');

-- --------------------------------------------------------

--
-- Table structure for table `empexpireince`
--

CREATE TABLE `empexpireince` (
  `ID` int(11) NOT NULL,
  `ExpID` varchar(5) DEFAULT NULL,
  `Employer1Name` varchar(75) DEFAULT NULL,
  `Employer1Designation` varchar(50) DEFAULT NULL,
  `Employer1CTC` varchar(50) DEFAULT NULL,
  `Employer1WorkDuration` varchar(11) DEFAULT NULL,
  `Employer2Name` varchar(75) DEFAULT NULL,
  `Employer2Designation` varchar(50) DEFAULT NULL,
  `Employer2CTC` varchar(50) DEFAULT NULL,
  `Employer2WorkDuration` varchar(11) DEFAULT NULL,
  `Employer3Name` varchar(75) DEFAULT NULL,
  `Employer3Designation` varchar(50) DEFAULT NULL,
  `Employer3CTC` varchar(50) DEFAULT NULL,
  `Employer3WorkDuration` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empexpireince`
--

INSERT INTO `empexpireince` (`ID`, `ExpID`, `Employer1Name`, `Employer1Designation`, `Employer1CTC`, `Employer1WorkDuration`, `Employer2Name`, `Employer2Designation`, `Employer2CTC`, `Employer2WorkDuration`, `Employer3Name`, `Employer3Designation`, `Employer3CTC`, `Employer3WorkDuration`) VALUES
(2, '12384', 'abc.pvt.td', 'software tester', '20,000 p/m', '4 yrs', 'tch.pvt.td', 'software tester', '32000 p/m', '4 yrs', 'dfg.pvt.td', 'SR.software tester', '45000 p/m', '7 yrs'),
(7, '46373', 'SAR pvt.ltd', 'Software Developer', '25000 p/m', '3 yrs', 'abc enterprise', 'software developer', '30000 p/m', '3 yrs', 'dgfhgfg.pt.ltd', 'software developer', '35000 p/m', '2 yrs till '),
(9, '63723', 'FAG pvt.ltd', 'HR Executive', '25000 p/m', '6 yrs', 'TYS', 'HR Executive', '35000 p/m', '7 yrs', 'hirp pvt.ltd', 'HR Executive', '45000 p/m', '4 yrs till'),
(12, '45436', 'amx.ltd', 'web developer', '20000', '2yrs', 'bny.ltd', 'app developer', '30000', '3yrs', '', '', '', ''),
(16, '36', 'ab.ltd', 'web developer', '14000', '2years', 'xy.ltd', 'web developer', '20000', '3yrs', '', '', '', ''),
(17, '16251', 'fdg.ltd', 'df', '20000', '3yrs', 'tyu.ltd', 'fd', '30000', '2yrs', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `s_no` int(20) NOT NULL,
  `EmpID` varchar(5) NOT NULL,
  `EmpEmail` varchar(30) NOT NULL,
  `EmpPassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`s_no`, `EmpID`, `EmpEmail`, `EmpPassword`) VALUES
(16, '12384', 'tanvir@gmail.com', '156975'),
(13, '13455', 'Rimon@gmail.com', '3443'),
(9, '16251', 'shohid@gmail.com', '789'),
(11, '36', 'rahat@gmail.com', '1234'),
(18, '36987', 'atef@gmail.com', '987563'),
(14, '45436', 'ashik@gmail.com', '2345'),
(15, '46373', 'asif@gmail.com', '123'),
(12, '63723', 'Safi@gmail.com', '99999');

-- --------------------------------------------------------

--
-- Table structure for table `employeedetail`
--

CREATE TABLE `employeedetail` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `EmpFname` varchar(50) DEFAULT NULL,
  `EmpLName` varchar(50) NOT NULL,
  `EdID` varchar(5) DEFAULT NULL,
  `Designation` varchar(120) DEFAULT NULL,
  `EmpContactNo` varchar(15) DEFAULT NULL,
  `EmpGender` enum('Male','Female') DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `EmpJoingdate` date DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeedetail`
--

INSERT INTO `employeedetail` (`ID`, `Name`, `EmpFname`, `EmpLName`, `EdID`, `Designation`, `EmpContactNo`, `EmpGender`, `BirthDate`, `EmpJoingdate`, `PostingDate`) VALUES
(1, 'Ashikuzzaman Nayem', 'Ashikuzzaman ', 'Nayem', '45436', 'Software Developer', '+8801386458734', 'Male', '1999-08-16', '2019-01-02', '2019-02-06 06:31:49'),
(2, 'A.K.M Asif Mahmud', 'A.K.M Asif ', 'Mahmud', '46373', 'Software Developer', '+8801234567890', 'Male', '1999-07-16', '2017-03-23', '2019-02-06 06:41:42'),
(4, 'Tanvir Alam', 'Tanvir', 'Alam', '12384', 'Software Developer', '+8801234567890', 'Male', '1999-03-08', '2000-03-23', '2019-02-06 06:42:47'),
(6, 'Atef Abrar', 'Atef ', 'abrar', '36987', 'marketing', '+8801778453753', 'Male', '2000-01-23', '2020-09-13', '2019-02-06 12:00:50'),
(7, 'Safi Ullah', 'Safi', 'Ullah', '63723', 'Web developer', '+880177463854', 'Male', '1999-08-16', '2021-04-24', '2019-02-08 07:22:40'),
(8, 'Rimon Dev', 'Rimon', 'Dev', '13455', 'Software Developer', '+8801386475734', 'Male', '2000-03-28', '2020-08-28', '2019-02-11 05:08:40'),
(16, 'Nurnabi  Rahat', 'Nurnabi ', 'Rahat', '36', 'Web developer', '+8801889593452', 'Male', '2000-10-28', '2022-03-01', '2022-03-07 14:04:59'),
(68, 'Shohid Afridi', 'shohid', 'afridi', '16251', 'Sales Manager', '+8801868866935', 'Male', '2001-05-21', '2020-09-13', '2022-03-22 13:43:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `empeducation`
--
ALTER TABLE `empeducation`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `empexpireince`
--
ALTER TABLE `empexpireince`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpID`),
  ADD UNIQUE KEY `s_no` (`s_no`);

--
-- Indexes for table `employeedetail`
--
ALTER TABLE `employeedetail`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EmpCode` (`EdID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `empeducation`
--
ALTER TABLE `empeducation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `empexpireince`
--
ALTER TABLE `empexpireince`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `s_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `employeedetail`
--
ALTER TABLE `employeedetail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
