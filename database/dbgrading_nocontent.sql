-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql311.epizy.com
-- Generation Time: Nov 13, 2022 at 12:50 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32967480_olgrading`
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
  MODIFY `AcadInfo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblacadinfo`
--
ALTER TABLE `tblacadinfo`
  MODIFY `StdAcadID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ContID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblgrades`
--
ALTER TABLE `tblgrades`
  MODIFY `GradeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblprof`
--
ALTER TABLE `tblprof`
  MODIFY `ProfID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstd`
--
ALTER TABLE `tblstd`
  MODIFY `StdID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsubinfo`
--
ALTER TABLE `tblsubinfo`
  MODIFY `SubID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
