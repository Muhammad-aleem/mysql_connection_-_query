-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2019 at 12:10 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '1133');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `present` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `class`, `section`, `present`, `student_id`, `date`) VALUES
(58, 9, 43, 1, 6, '2019-02-27'),
(59, 10, 49, 0, 7, '2019-02-27'),
(60, 10, 50, 1, 14, '2019-02-27'),
(61, 10, 51, 0, 8, '2019-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `degree_id` int(11) NOT NULL,
  `degreename` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`degree_id`, `degreename`) VALUES
(9, 'BA'),
(10, 'BSE'),
(11, 'Fa'),
(12, 'FA-IT'),
(13, 'FSE');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fees_id` int(11) NOT NULL,
  `feestype` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`fees_id`, `feestype`) VALUES
(4, 'check'),
(6, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoices_id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `rollno` varchar(100) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoices_id`, `class`, `section`, `student`, `phone`, `rollno`, `amount`, `date`, `paid`) VALUES
(19, 9, 42, 6, '97798978789789', '1236', '500', '2019-02-11', 0),
(22, 10, 49, 7, '00', '1236', '200', '2019-02-12', 0),
(23, 10, 50, 14, '00', '1236', '200', '2019-02-12', 0),
(24, 10, 51, 8, '03475541412', '121', '200', '2019-02-12', 0),
(25, 10, 49, 7, '03071517293', '121', '5000', '2019-02-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `paymenttype` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoiceid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `amount`, `paymenttype`, `date`, `invoiceid`) VALUES
(17, '4000', 6, '2019-02-13', 25),
(18, '300', 6, '2019-02-13', 24),
(19, '300', 4, '2019-02-10', 19),
(20, '4000', 6, '2019-02-14', 25),
(21, '4000', 6, '2019-02-14', 25);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `sectionname` varchar(25) NOT NULL,
  `degree` int(11) NOT NULL,
  `student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `sectionname`, `degree`, `student`) VALUES
(42, 'A', 9, 6),
(43, 'B', 9, 7),
(44, 'C', 9, 8),
(49, 'A', 10, 13),
(50, 'B', 10, 8),
(51, 'C', 10, 14);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(11) NOT NULL,
  `sessionname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `sessionname`) VALUES
(1, '2010'),
(2, '2019'),
(3, '2018');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `studentname` varchar(25) NOT NULL,
  `fathername` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `rollno` varchar(25) NOT NULL,
  `student_image` varchar(100) NOT NULL,
  `session` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `degree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `studentname`, `fathername`, `address`, `rollno`, `student_image`, `session`, `section`, `degree`) VALUES
(6, 'Aleem', 'khalid', 'kamalia', '6565', '46859.jpg', 1, 43, 9),
(7, 'Naeem', 'Ahmad', 'toba tek sing', '121', '38193.jpg', 2, 49, 10),
(8, 'shoaib', 'Ahmad', 'toba tek sing', '23', '78109.jpg', 3, 51, 10),
(13, 'Haider Ali', 'khalid', 'kamalia', '6565', '18250.jpg', 1, 42, 10),
(14, 'asim', 'Naeem', 'kamalia', '13413', '67804.jpg', 2, 50, 10),
(15, '', '', '', '', '52223.', 0, 0, 0),
(16, '', '', '', '', '57474.', 0, 0, 0),
(17, '', '', '', '', '56378.', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`degree_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoices_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `degree_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoices_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
