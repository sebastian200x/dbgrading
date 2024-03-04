-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 09:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olgrading`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicinfo`
--

CREATE TABLE `academicinfo` (
  `AcadInfo` int(11) NOT NULL,
  `AY` varchar(11) NOT NULL,
  `Sem` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academicinfo`
--

INSERT INTO `academicinfo` (`AcadInfo`, `AY`, `Sem`) VALUES
(1, '2021-2022', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `tblacadinfo`
--

CREATE TABLE `tblacadinfo` (
  `StdAcadID` int(11) NOT NULL,
  `StdID` int(11) NOT NULL,
  `StdSec` varchar(255) NOT NULL,
  `StdYear` varchar(255) NOT NULL,
  `StdSem` varchar(255) NOT NULL,
  `StdAY` varchar(255) NOT NULL,
  `StdCourse` varchar(255) NOT NULL,
  `StdDept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblacadinfo`
--

INSERT INTO `tblacadinfo` (`StdAcadID`, `StdID`, `StdSec`, `StdYear`, `StdSem`, `StdAY`, `StdCourse`, `StdDept`) VALUES
(1, 14, 'BSIT 3D', '3rd', '1st', '2021-2022', 'Bachelor of Science in Information Technology', 'CSS');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `AdminID` int(11) NOT NULL,
  `AdminUser` varchar(255) NOT NULL,
  `AdminPass` varchar(255) NOT NULL,
  `AdminEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`AdminID`, `AdminUser`, `AdminPass`, `AdminEmail`) VALUES
(1, 'admin', '$2y$10$xjvtajtdEur2Yt7.G.b6TOMMcPHOcoIQkmncGL7DzTkV4r5lUYBOC', 'admin@admin.com'),
(2, 'admin2', 'admin2', 'admin2@admin2.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ContID` int(11) NOT NULL,
  `ContEmail` varchar(255) NOT NULL,
  `ContDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblgrades`
--

CREATE TABLE `tblgrades` (
  `GradeID` int(11) NOT NULL,
  `SubID` int(11) NOT NULL,
  `SubGrade` int(3) NOT NULL DEFAULT 0,
  `GradeSem` varchar(255) NOT NULL,
  `GradeAY` varchar(255) NOT NULL,
  `ProfID` int(11) NOT NULL,
  `StdID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblprof`
--

CREATE TABLE `tblprof` (
  `ProfID` int(11) NOT NULL,
  `ProfUser` varchar(255) NOT NULL,
  `ProfPass` varchar(255) NOT NULL,
  `ProfEmail` varchar(255) NOT NULL,
  `ProfFName` varchar(255) NOT NULL,
  `ProfLName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprof`
--

INSERT INTO `tblprof` (`ProfID`, `ProfUser`, `ProfPass`, `ProfEmail`, `ProfFName`, `ProfLName`) VALUES
(1, 'prof', '$2y$10$c7mE0fbbUbpMK9fSGyYsIOSLIqe5dhiiVuwtOEx5RUUkUfaiJiQ3G', 'faculty@faculty.com', 'Mar Eli', 'Sagsagat'),
(2, 'prof2', '$2y$10$fpJPk0C085qo6Es5XhebpOhlEQBk9JZKnHwxNJ40jnAY7I3vzwmSu', 'faculty2@faculty.com', 'Ana Marie', 'Obon'),
(3, 'prof3', '$2y$10$YsKVVIj5UT9qdxZ7mCCaMeO8LT/KXNgecwuHE2WIwb5DawW3uEG2W', 'faculty3@cityofmalabonuniversity.edu.ph', 'Nicolas', 'Cayetano '),
(4, 'prof4', '$2y$10$ecWf3OOSCbfO.1M4mmJaoueUBcJNpuHySajPgWFUZI/0i6qx1srja', 'faculty4@cityofmalabonuniversity.edu.ph', 'Jensen', 'Santillan'),
(5, 'prof5', '', 'faculty5@cityofmalabonuniversity.edu.ph', 'Elmer', 'Tamana'),
(6, 'prof6', '$2y$10$JMxkpJF/vVkfw.6QEMFBkevVvMXmRruQsHF6GTWn8ACK5nZ4iSO6a', '', 'Prof', 'Prof');

-- --------------------------------------------------------

--
-- Table structure for table `tblstd`
--

CREATE TABLE `tblstd` (
  `StdID` int(11) NOT NULL,
  `StdUser` varchar(255) NOT NULL,
  `StdPass` varchar(255) NOT NULL,
  `StdEmail` varchar(255) NOT NULL,
  `StdReg` int(2) NOT NULL COMMENT '0 = Registered User\r\n1 = Official Student'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstd`
--

INSERT INTO `tblstd` (`StdID`, `StdUser`, `StdPass`, `StdEmail`, `StdReg`) VALUES
(14, '20200000', '$2y$10$WpwW7nT4NsQup.lTLSdQYuYOGNJ0.alRMsrr97ZCFDIcvqTOGdsfK', '20200881@cityofmalabonuniversity.edu.ph', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstdinfo`
--

CREATE TABLE `tblstdinfo` (
  `StdID` int(11) NOT NULL,
  `StdFName` varchar(255) NOT NULL,
  `StdMName` varchar(255) NOT NULL,
  `StdLName` varchar(255) NOT NULL,
  `StdBday` date NOT NULL,
  `StdSex` varchar(255) NOT NULL,
  `StdStatus` varchar(255) NOT NULL,
  `StdHNo` varchar(255) NOT NULL,
  `StdStreet` varchar(255) NOT NULL,
  `StdBarangay` varchar(255) NOT NULL,
  `StdCity` varchar(255) NOT NULL,
  `StdZip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstdinfo`
--

INSERT INTO `tblstdinfo` (`StdID`, `StdFName`, `StdMName`, `StdLName`, `StdBday`, `StdSex`, `StdStatus`, `StdHNo`, `StdStreet`, `StdBarangay`, `StdCity`, `StdZip`) VALUES
(14, 'HENRY', 'ROBRIGADO', 'OLIVEROS', '2001-10-24', 'Male', 'TAKEN', '234', 'MATADOR', 'UBO', 'ENGOT', '1232');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubinfo`
--

CREATE TABLE `tblsubinfo` (
  `SubID` int(11) NOT NULL,
  `SubCode` varchar(255) NOT NULL,
  `SubName` varchar(255) NOT NULL,
  `SubUnit` int(11) NOT NULL,
  `SubSec` varchar(255) NOT NULL,
  `SubSem` varchar(255) NOT NULL,
  `SubAY` varchar(255) NOT NULL,
  `ProfID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubinfo`
--

INSERT INTO `tblsubinfo` (`SubID`, `SubCode`, `SubName`, `SubUnit`, `SubSec`, `SubSem`, `SubAY`, `ProfID`) VALUES
(1, 'ITE311', 'INTEGRATIVE PROGRAMMING AND TECHNOLOGY', 5, 'BSIT 3D', '1st', '2022-2023', 1),
(2, 'ITE312', 'SYSTEM INTEGRATION AND ARCHITECTURE 1', 3, 'BSIT 3D', '1st', '2022-2023', 2),
(3, 'ITE314', 'SYSTEM ANALYSIS AND DESIGN', 3, 'BSIT 3D', '1st', '2022-2023', 3),
(4, 'ITE315', 'PLATFORMS TECHNOLOGIES', 3, 'BSIT 3D', '1st', '2022-2023', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicinfo`
--
ALTER TABLE `academicinfo`
  ADD PRIMARY KEY (`AcadInfo`);

--
-- Indexes for table `tblacadinfo`
--
ALTER TABLE `tblacadinfo`
  ADD PRIMARY KEY (`StdAcadID`),
  ADD KEY `StdID` (`StdID`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ContID`);
ALTER TABLE `tblcontact` ADD FULLTEXT KEY `ContEmail` (`ContEmail`,`ContDesc`);

--
-- Indexes for table `tblgrades`
--
ALTER TABLE `tblgrades`
  ADD PRIMARY KEY (`GradeID`),
  ADD KEY `StdID` (`StdID`),
  ADD KEY `ProfID` (`ProfID`),
  ADD KEY `SubID` (`SubID`);

--
-- Indexes for table `tblprof`
--
ALTER TABLE `tblprof`
  ADD PRIMARY KEY (`ProfID`);

--
-- Indexes for table `tblstd`
--
ALTER TABLE `tblstd`
  ADD PRIMARY KEY (`StdID`);

--
-- Indexes for table `tblstdinfo`
--
ALTER TABLE `tblstdinfo`
  ADD UNIQUE KEY `StdID_2` (`StdID`);

--
-- Indexes for table `tblsubinfo`
--
ALTER TABLE `tblsubinfo`
  ADD PRIMARY KEY (`SubID`),
  ADD KEY `ProfID` (`ProfID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academicinfo`
--
ALTER TABLE `academicinfo`
  MODIFY `AcadInfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblacadinfo`
--
ALTER TABLE `tblacadinfo`
  MODIFY `StdAcadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ContID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblgrades`
--
ALTER TABLE `tblgrades`
  MODIFY `GradeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblprof`
--
ALTER TABLE `tblprof`
  MODIFY `ProfID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblstd`
--
ALTER TABLE `tblstd`
  MODIFY `StdID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblsubinfo`
--
ALTER TABLE `tblsubinfo`
  MODIFY `SubID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblacadinfo`
--
ALTER TABLE `tblacadinfo`
  ADD CONSTRAINT `tblacadinfo_ibfk_1` FOREIGN KEY (`StdID`) REFERENCES `tblstd` (`StdID`);

--
-- Constraints for table `tblgrades`
--
ALTER TABLE `tblgrades`
  ADD CONSTRAINT `tblgrades_ibfk_1` FOREIGN KEY (`StdID`) REFERENCES `tblstd` (`StdID`),
  ADD CONSTRAINT `tblgrades_ibfk_2` FOREIGN KEY (`ProfID`) REFERENCES `tblprof` (`ProfID`),
  ADD CONSTRAINT `tblgrades_ibfk_3` FOREIGN KEY (`SubID`) REFERENCES `tblsubinfo` (`SubID`);

--
-- Constraints for table `tblstdinfo`
--
ALTER TABLE `tblstdinfo`
  ADD CONSTRAINT `tblstdinfo_ibfk_1` FOREIGN KEY (`StdID`) REFERENCES `tblstd` (`StdID`);

--
-- Constraints for table `tblsubinfo`
--
ALTER TABLE `tblsubinfo`
  ADD CONSTRAINT `tblsubinfo_ibfk_1` FOREIGN KEY (`ProfID`) REFERENCES `tblprof` (`ProfID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
