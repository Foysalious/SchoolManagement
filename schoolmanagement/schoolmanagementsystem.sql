-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 09:01 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `addmentor`
--

CREATE TABLE `addmentor` (
  `mentorId` int(10) NOT NULL,
  `mentorFullname` varchar(50) NOT NULL,
  `mentorUserName` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` int(50) NOT NULL,
  `address` varchar(256) NOT NULL,
  `joinDate` date NOT NULL,
  `status` int(2) NOT NULL,
  `user_role` int(1) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addmentor`
--

INSERT INTO `addmentor` (`mentorId`, `mentorFullname`, `mentorUserName`, `password`, `email`, `phone`, `address`, `joinDate`, `status`, `user_role`, `image`) VALUES
(35, 'Foysal Rahman', 'foysalious', '8cb2237d0679ca88db6464eac60da96345513964', 'foysalrahman112@gmail.com', 1855570816, 'H-433, Raod- 30, Mohakhali DOHS', '2020-05-12', 0, 0, '26060434_1542136492520719_6346178666048074705_o.jpg'),
(36, 'Arafat Hossain', 'Rafi', '8cb2237d0679ca88db6464eac60da96345513964', 'arafathossain@gmail.com', 1303064647, 'Mohammadpur', '2020-05-12', 0, 1, '45882107_2121885134542492_481354985070657536_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `allcourse`
--

CREATE TABLE `allcourse` (
  `course_id` int(2) NOT NULL,
  `course_title` varchar(30) NOT NULL,
  `course_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allcourse`
--

INSERT INTO `allcourse` (`course_id`, `course_title`, `course_desc`) VALUES
(3, 'Web Design', 'Lorem Ipsum is simply dummy'),
(4, 'Web development', 'Lorem Ipsum is simply dummy text of the printing a'),
(5, 'Seo and Digital Marketing', 'Lorem Ipsum is simply dummy text of the printing a'),
(6, 'Graphics Design', 'Lorem Ipsum is simply dummy text of the printing a'),
(7, 'Accounting', 'Lorem Ipsum is simply dummy	\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(4) NOT NULL,
  `batch_name` varchar(255) NOT NULL,
  `mentor_name` varchar(255) NOT NULL,
  `sitting_capacity` int(3) NOT NULL,
  `total_student` int(3) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `batch_name`, `mentor_name`, `sitting_capacity`, `total_student`, `course_name`, `status`) VALUES
(2, '2nd special', '36', 40, 1, '3', '0');

-- --------------------------------------------------------

--
-- Table structure for table `class_time`
--

CREATE TABLE `class_time` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_time`
--

INSERT INTO `class_time` (`id`, `time`) VALUES
(1, '12:00-14:00'),
(2, '14:00-16:00');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(2) NOT NULL,
  `grade_name` varchar(255) NOT NULL,
  `lower_value` varchar(255) NOT NULL,
  `upper_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `grade_name`, `lower_value`, `upper_value`) VALUES
(3, 'A+', '90', '100'),
(4, 'A', '85', '89'),
(5, 'B+', '80', '84');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `publish_date` date NOT NULL,
  `role` int(3) NOT NULL,
  `notice_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `description`, `publish_date`, `role`, `notice_by`) VALUES
(19, 'mentor', 'this is mentor notice which is pending.', '2020-01-31', 2, ''),
(20, 'Super Admin', ' This is super admin. No need to approve 1', '2020-01-31', 0, ''),
(21, 'Test', 'Test 1', '2020-05-12', 0, 'Foysal Rahman'),
(22, 'Test 2', '2nd test ', '2020-05-13', 0, 'Foysal Rahman');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(4) NOT NULL,
  `batch_id` int(4) NOT NULL,
  `mentor_id` int(4) NOT NULL,
  `batch_type` varchar(255) NOT NULL,
  `week_day` varchar(255) NOT NULL,
  `class_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(2) NOT NULL,
  `std_fullname` varchar(256) NOT NULL,
  `std_f_name` varchar(256) NOT NULL,
  `std_m_name` varchar(50) NOT NULL,
  `std_username` varchar(50) NOT NULL,
  `std_password` varchar(50) NOT NULL,
  `std_email` varchar(50) NOT NULL,
  `std_phone` int(12) NOT NULL,
  `std_address` varchar(50) NOT NULL,
  `std_dob` varchar(20) NOT NULL,
  `std_gender` varchar(6) NOT NULL,
  `std_image` text NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `batch_name` varchar(255) NOT NULL,
  `transport` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_fullname`, `std_f_name`, `std_m_name`, `std_username`, `std_password`, `std_email`, `std_phone`, `std_address`, `std_dob`, `std_gender`, `std_image`, `course_name`, `batch_name`, `transport`) VALUES
(8, 'Foysal Rahman', 'Habibur Rahman', 'Anwara Habib', 'foysal', '8cb2237d0679ca88db6464eac60da96345513964', 'foysalrahman112@gmail.com', 1855570816, 'H-433', '1988-02-04', '0', '28424049_1613978168669884_1139372053128680246_o.jpg', '4', '2', '1'),
(9, 'Gourab', 'Gonesh', 'Joushna ', 'Gourab', '8cb2237d0679ca88db6464eac60da96345513964', 'gourab@gmail.com', 1855570816, 'H-433', '2020-02-13', '1', '91995452_2561669320769021_1652324303032549376_n.jpg', '4', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `stuff`
--

CREATE TABLE `stuff` (
  `stuff_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stuff`
--

INSERT INTO `stuff` (`stuff_id`, `username`, `password`, `name`, `email`, `phone`, `role`, `image`) VALUES
(7, 'rockstarrocky', '8cb2237d0679ca88db6464eac60da96345513964', 'Rocky Bhai', 'foysalrahman112@outlook.com', 1855570816, 'Manager', '179_92017088_216139706324879_8559271291465498624_n.jpg'),
(8, 'foysalious', '8cb2237d0679ca88db6464eac60da96345513964', 'Foysal Rahman', 'foysalrahman112@gmail.com', 1855570816, 'Manager', '307_92017088_216139706324879_8559271291465498624_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `id` int(4) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `fare` int(4) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id`, `destination`, `vehicle_number`, `fare`, `note`) VALUES
(1, 'Mohakhali to Kuril', 'Dhaka Metro GA 11-2526', 500, 'Safety First');

-- --------------------------------------------------------

--
-- Table structure for table `week_day`
--

CREATE TABLE `week_day` (
  `id` int(4) NOT NULL,
  `day` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `week_day`
--

INSERT INTO `week_day` (`id`, `day`) VALUES
(1, 'Saturday'),
(2, 'Sunday'),
(3, 'Monday'),
(4, 'Tuesday'),
(5, 'Wednesday'),
(6, 'Thursday'),
(7, 'Friday');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addmentor`
--
ALTER TABLE `addmentor`
  ADD PRIMARY KEY (`mentorId`);

--
-- Indexes for table `allcourse`
--
ALTER TABLE `allcourse`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_time`
--
ALTER TABLE `class_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `stuff`
--
ALTER TABLE `stuff`
  ADD PRIMARY KEY (`stuff_id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `week_day`
--
ALTER TABLE `week_day`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addmentor`
--
ALTER TABLE `addmentor`
  MODIFY `mentorId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `allcourse`
--
ALTER TABLE `allcourse`
  MODIFY `course_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_time`
--
ALTER TABLE `class_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stuff`
--
ALTER TABLE `stuff`
  MODIFY `stuff_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `week_day`
--
ALTER TABLE `week_day`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
