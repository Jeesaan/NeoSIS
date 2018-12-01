-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2017 at 10:29 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neosis`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_info`
--

CREATE TABLE `attendance_info` (
  `ID` int(10) NOT NULL,
  `ID_per_type` int(10) NOT NULL,
  `ID_stud_tech` int(10) NOT NULL,
  `ID_sub` int(10) NOT NULL,
  `ID_sem` int(10) NOT NULL,
  `date` date NOT NULL,
  `atten_type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `attendance_info`
--

INSERT INTO `attendance_info` (`ID`, `ID_per_type`, `ID_stud_tech`, `ID_sub`, `ID_sem`, `date`, `atten_type`) VALUES
(1, 3, 6, 1, 1, '2017-05-29', 1),
(2, 3, 7, 1, 1, '2017-05-29', 1),
(3, 3, 8, 1, 1, '2017-05-29', 1),
(4, 3, 6, 1, 1, '2017-05-30', 1),
(5, 3, 7, 1, 1, '2017-05-30', 2),
(6, 3, 8, 1, 1, '2017-05-30', 3),
(7, 3, 6, 1, 1, '2017-05-31', 1),
(8, 3, 7, 1, 1, '2017-05-31', 1),
(9, 3, 8, 1, 1, '2017-05-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dept_info`
--

CREATE TABLE `dept_info` (
  `ID_dept` int(10) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `dept_abbri` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dept_info`
--

INSERT INTO `dept_info` (`ID_dept`, `dept_name`, `dept_abbri`) VALUES
(1, 'Bachelor Of Computer Application', 'BCA'),
(2, 'Master Of Computer Application', 'MCA'),
(3, 'Bachelor Of Technology In Computer Science And Engineering', 'B.Tech CSE'),
(4, 'Bachelor Of Technology In Civil Engineering', 'B.Tech CE');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(10) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `user`, `pass`, `type`) VALUES
(1, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `marksheet`
--

CREATE TABLE `marksheet` (
  `ID_marksheet` int(10) NOT NULL,
  `sheet_name` varchar(100) NOT NULL,
  `date_exam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks_info`
--

CREATE TABLE `marks_info` (
  `ID_stud` int(10) NOT NULL,
  `ID_sub` int(10) NOT NULL,
  `marks` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `person_type`
--

CREATE TABLE `person_type` (
  `ID_per_type` int(10) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person_type`
--

INSERT INTO `person_type` (`ID_per_type`, `name`) VALUES
(1, 'admin'),
(2, 'Teacher'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `sem_info`
--

CREATE TABLE `sem_info` (
  `ID_sem` int(11) NOT NULL,
  `sem_code` varchar(10) NOT NULL,
  `ID_dept` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem_info`
--

INSERT INTO `sem_info` (`ID_sem`, `sem_code`, `ID_dept`) VALUES
(1, 'BCA101', 1),
(2, 'MCA101', 2),
(3, 'CSE101', 3),
(4, 'CE101', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `ID_stud` int(10) NOT NULL,
  `photo` longblob NOT NULL,
  `fst_name` text NOT NULL,
  `lst_name` text NOT NULL,
  `dob` text NOT NULL,
  `age` int(3) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `reg_date` text NOT NULL,
  `ID_dept` int(10) NOT NULL,
  `ID_per_type` int(10) NOT NULL,
  `ID_sem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`ID_stud`, `photo`, `fst_name`, `lst_name`, `dob`, `age`, `email_id`, `mobile_no`, `address`, `city`, `country`, `reg_date`, `ID_dept`, `ID_per_type`, `ID_sem`) VALUES
(6, '', 'Jeesaan', 'Gupta', '1995-12-04', 22, 'qwerty@gmail.com', '2147483647', '', 'Siliguri', 'India', '2017-08-02', 1, 3, 1),
(7, '', 'Subham', 'Goyal', '1996-10-11', 21, 'qwerty.dk8@gmail.com', '2147483647', '', 'Siliguri', 'India', '2017-08-02', 2, 3, 2),
(8, '', 'Kartik', 'Gupta', '1996-08-28', 21, 'qwerty@gmail.com', '9832495033', '', 'Siliguri', 'India', '2017-08-02', 3, 3, 3),
(9, '', 'Golu', 'Sharma', '1995-07-19', 22, 'jaghsha@gmail.com', '6523415267', '', 'Siliguri', 'India', '2017-08-02', 2, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subject_info`
--

CREATE TABLE `subject_info` (
  `ID_sub` int(10) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `marks` int(4) NOT NULL,
  `ID_teach` int(10) NOT NULL,
  `ID_sem` int(10) NOT NULL,
  `ID_dept` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `subject_info`
--

INSERT INTO `subject_info` (`ID_sub`, `sub_name`, `marks`, `ID_teach`, `ID_sem`, `ID_dept`) VALUES
(1, 'Digital Electronic', 100, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `ID_teach` int(10) NOT NULL,
  `photo` longblob,
  `fst_name` text NOT NULL,
  `lst_name` text NOT NULL,
  `dob` text NOT NULL,
  `age` int(3) DEFAULT NULL,
  `mobile_no` int(10) NOT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `address` text NOT NULL,
  `city` text,
  `country` text,
  `reg_date` text,
  `ID_per_type` int(10) NOT NULL,
  `ID_dept` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`ID_teach`, `photo`, `fst_name`, `lst_name`, `dob`, `age`, `mobile_no`, `email_id`, `address`, `city`, `country`, `reg_date`, `ID_per_type`, `ID_dept`) VALUES
(1, NULL, 'Jeesaan', 'Gupta', '1995-04-18', 22, 2147483647, 'qwerty.dk8@gmail.com', '', 'Siliguri', 'India', '2017-08-02', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_info`
--
ALTER TABLE `attendance_info`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_per_type` (`ID_per_type`),
  ADD KEY `ID_sub` (`ID_sub`),
  ADD KEY `ID_sem` (`ID_sem`);

--
-- Indexes for table `dept_info`
--
ALTER TABLE `dept_info`
  ADD PRIMARY KEY (`ID_dept`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `marksheet`
--
ALTER TABLE `marksheet`
  ADD PRIMARY KEY (`ID_marksheet`);

--
-- Indexes for table `marks_info`
--
ALTER TABLE `marks_info`
  ADD KEY `ID_stud` (`ID_stud`),
  ADD KEY `ID_sub` (`ID_sub`);

--
-- Indexes for table `person_type`
--
ALTER TABLE `person_type`
  ADD PRIMARY KEY (`ID_per_type`);

--
-- Indexes for table `sem_info`
--
ALTER TABLE `sem_info`
  ADD PRIMARY KEY (`ID_sem`),
  ADD KEY `ID_dept` (`ID_dept`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`ID_stud`),
  ADD KEY `ID_dept` (`ID_dept`),
  ADD KEY `ID_sem` (`ID_sem`),
  ADD KEY `ID_per_type` (`ID_per_type`);

--
-- Indexes for table `subject_info`
--
ALTER TABLE `subject_info`
  ADD PRIMARY KEY (`ID_sub`),
  ADD KEY `ID_teach` (`ID_teach`),
  ADD KEY `ID_sem` (`ID_sem`),
  ADD KEY `ID_dept` (`ID_dept`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`ID_teach`),
  ADD KEY `ID_per_type` (`ID_per_type`),
  ADD KEY `ID_dept` (`ID_dept`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_info`
--
ALTER TABLE `attendance_info`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `dept_info`
--
ALTER TABLE `dept_info`
  MODIFY `ID_dept` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `marksheet`
--
ALTER TABLE `marksheet`
  MODIFY `ID_marksheet` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sem_info`
--
ALTER TABLE `sem_info`
  MODIFY `ID_sem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `ID_stud` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `subject_info`
--
ALTER TABLE `subject_info`
  MODIFY `ID_sub` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teacher_info`
--
ALTER TABLE `teacher_info`
  MODIFY `ID_teach` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_info`
--
ALTER TABLE `attendance_info`
  ADD CONSTRAINT `attendance_info_ibfk_1` FOREIGN KEY (`ID_per_type`) REFERENCES `person_type` (`ID_per_type`),
  ADD CONSTRAINT `attendance_info_ibfk_2` FOREIGN KEY (`ID_sub`) REFERENCES `subject_info` (`ID_sub`),
  ADD CONSTRAINT `attendance_info_ibfk_3` FOREIGN KEY (`ID_sem`) REFERENCES `sem_info` (`ID_sem`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`type`) REFERENCES `person_type` (`ID_per_type`);

--
-- Constraints for table `marks_info`
--
ALTER TABLE `marks_info`
  ADD CONSTRAINT `marks_info_ibfk_1` FOREIGN KEY (`ID_stud`) REFERENCES `student_info` (`ID_stud`),
  ADD CONSTRAINT `marks_info_ibfk_2` FOREIGN KEY (`ID_sub`) REFERENCES `subject_info` (`ID_sub`);

--
-- Constraints for table `sem_info`
--
ALTER TABLE `sem_info`
  ADD CONSTRAINT `sem_info_ibfk_1` FOREIGN KEY (`ID_dept`) REFERENCES `dept_info` (`ID_dept`);

--
-- Constraints for table `student_info`
--
ALTER TABLE `student_info`
  ADD CONSTRAINT `student_info_ibfk_1` FOREIGN KEY (`ID_dept`) REFERENCES `dept_info` (`ID_dept`),
  ADD CONSTRAINT `student_info_ibfk_3` FOREIGN KEY (`ID_per_type`) REFERENCES `person_type` (`ID_per_type`),
  ADD CONSTRAINT `student_info_ibfk_4` FOREIGN KEY (`ID_sem`) REFERENCES `sem_info` (`ID_sem`);

--
-- Constraints for table `subject_info`
--
ALTER TABLE `subject_info`
  ADD CONSTRAINT `subject_info_ibfk_1` FOREIGN KEY (`ID_teach`) REFERENCES `teacher_info` (`ID_teach`),
  ADD CONSTRAINT `subject_info_ibfk_3` FOREIGN KEY (`ID_dept`) REFERENCES `dept_info` (`ID_dept`),
  ADD CONSTRAINT `subject_info_ibfk_4` FOREIGN KEY (`ID_sem`) REFERENCES `sem_info` (`ID_sem`);

--
-- Constraints for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD CONSTRAINT `teacher_info_ibfk_2` FOREIGN KEY (`ID_per_type`) REFERENCES `person_type` (`ID_per_type`),
  ADD CONSTRAINT `teacher_info_ibfk_3` FOREIGN KEY (`ID_dept`) REFERENCES `dept_info` (`ID_dept`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
