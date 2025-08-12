-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 02:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladdsalary`
--

CREATE TABLE `tbladdsalary` (
  `id` int(11) NOT NULL,
  `Department` varchar(45) DEFAULT NULL,
  `empid` varchar(45) DEFAULT NULL,
  `salary` varchar(45) DEFAULT NULL,
  `allowancesalary` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladdsalary`
--

INSERT INTO `tbladdsalary` (`id`, `Department`, `empid`, `salary`, `allowancesalary`, `total`, `create_date`) VALUES
(2, '3', 'Emp12345', '50000', '2500', '52500', '2022-11-17 17:18:03'),
(3, '9', '10806121', '49100', '4523', '53623', '2022-11-22 01:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `name`, `email`, `mobile`, `password`, `create_date`) VALUES
(1, 'admin', 'admin@gmail.com', '1234567890', '5c428d8875d2948607f3e3fe134d71b4', '2022-11-19 11:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`id`, `DepartmentName`) VALUES
(4, 'Account'),
(6, 'Admin'),
(7, 'Operations'),
(9, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `dob` varchar(45) DEFAULT NULL,
  `date_of_joining` varchar(45) DEFAULT NULL,
  `password` varchar(450) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`id`, `EmpId`, `fname`, `lname`, `department_name`, `email`, `mobile`, `country`, `state`, `city`, `address`, `photo`, `dob`, `date_of_joining`, `password`, `create_date`) VALUES
(1, 'Emp12345', 'Rahul', 'Singh', '4', 'sss@gmail.com', '9999999999', 'India', 'UP', 'Lucknow', 'H324 ABC Apartment\r\n                  ', '../uploads/1668969654-doctor.png', '1998-02-03', '2022-03-26', '5c428d8875d2948607f3e3fe134d71b4', '2022-11-19 17:16:41'),
(2, 'Emp123456', 'badal', 'Kumar', '4', 'badal@gmail.com', '9999999999', 'India', 'UP', 'Noida', 'KKKKKK', '../uploads/1648318541-blog.jpg', '2022-03-26', '2022-03-27', 'f925916e2754e5e03f75dd58a5733251', '2022-11-20 18:15:41'),
(3, '10806121', 'Anuj', 'Kumar', '9', 'ak234@test.com', '1234567891', 'India', 'UP', 'Ghazibad', 'A 123 ABC Aprtment', '../uploads/1669081889-security-guard.png', '1996-06-04', '2022-10-14', 'f925916e2754e5e03f75dd58a5733251', '2022-11-22 01:51:29');

-- --------------------------------------------------------

CREATE TABLE tblattendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    attendance_date DATE,
    status ENUM('Present', 'Absent') DEFAULT 'Present'
);
----------------------------------------------------------
--
-- Table structure for table `tblleave`
--

CREATE TABLE `tblleave` (
  `id` int(11) NOT NULL,
  `userID` varchar(45) DEFAULT NULL,
  `EmpID` varchar(45) DEFAULT NULL,
  `LeaveType` varchar(45) DEFAULT NULL,
  `FromDate` varchar(45) DEFAULT NULL,
  `Todate` varchar(45) DEFAULT NULL,
  `Description` varchar(450) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `adminremarks` varchar(450) DEFAULT NULL,
  `Create_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblleave`
--

INSERT INTO `tblleave` (`id`, `userID`, `EmpID`, `LeaveType`, `FromDate`, `Todate`, `Description`, `status`, `adminremarks`, `Create_date`) VALUES
(1, '1', 'Emp12345', '1', '2022-04-02', '2022-04-23', 'aaaaaaaaaaa', 'Approved', 'sssssssss', '2022-11-02 04:15:52'),
(2, '1', 'Emp12345', '1', '2022-04-02', '2022-04-24', 'mmmmmmmmmmmmmm', 'Reject', 'This application has been rejected', '2022-11-12 18:11:57'),
(3, '2', 'Emp123456', '2', '2022-11-22', '2022-11-25', 'I am out of station.', 'Pending', NULL, '2022-11-21 07:06:54'),
(4, '3', '10806121', '1', '2022-11-30', '2022-12-02', 'I have some work at home.', 'Approved', 'Leaves approved', '2022-11-22 01:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `tblleavetype`
--

CREATE TABLE `tblleavetype` (
  `id` int(11) NOT NULL,
  `leaveType` varchar(45) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblleavetype`
--

INSERT INTO `tblleavetype` (`id`, `leaveType`, `create_date`) VALUES
(1, 'Casual Leaves- CL', '2022-03-30 14:13:40'),
(2, 'Earned Leave-EL', '2022-11-17 16:38:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladdsalary`
--
ALTER TABLE `tbladdsalary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblleave`
--
ALTER TABLE `tblleave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladdsalary`
--
ALTER TABLE `tbladdsalary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblleave`
--
ALTER TABLE `tblleave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
