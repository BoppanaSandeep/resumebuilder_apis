-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2018 at 02:51 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resumebuilder`
--

-- --------------------------------------------------------

--
-- Table structure for table `rb_education`
--

CREATE TABLE `rb_education` (
  `edu_id` int(20) NOT NULL,
  `reg_id` int(200) NOT NULL,
  `edu_university_clg_sch` varchar(50) NOT NULL,
  `edu_passoutyear` varchar(20) NOT NULL,
  `edu_percentage` int(20) NOT NULL,
  `edu_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edu_status` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_education`
--

INSERT INTO `rb_education` (`edu_id`, `reg_id`, `edu_university_clg_sch`, `edu_passoutyear`, `edu_percentage`, `edu_added`, `edu_status`) VALUES
(1, 1, 'Vidyalaya Public School', '2010', 85, '2018-02-12 12:44:57', 1),
(2, 1, 'Gudlavalleru Engg College', '2016', 68, '2018-02-12 11:31:32', 1),
(3, 1, 'Sri Chaitanya Junior College', '2012', 90, '2018-02-12 11:31:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rb_experience`
--

CREATE TABLE `rb_experience` (
  `exp_id` int(20) NOT NULL,
  `reg_id` int(200) NOT NULL,
  `exp_company` varchar(50) NOT NULL,
  `exp_working_from` date NOT NULL,
  `exp_last_work_date` date NOT NULL,
  `exp_currently_working` int(11) NOT NULL,
  `exp_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `exp_status` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_experience`
--

INSERT INTO `rb_experience` (`exp_id`, `reg_id`, `exp_company`, `exp_working_from`, `exp_last_work_date`, `exp_currently_working`, `exp_added`, `exp_status`) VALUES
(1, 1, 'Ameripro Solutions', '2018-02-12', '2018-02-12', 2, '2018-02-12 11:28:33', 1),
(2, 1, 'Ameripro Solutions', '2018-02-12', '2018-02-12', 1, '2018-02-12 11:31:32', 1),
(3, 1, 'Zlapch Tech Studio', '2018-02-12', '2018-02-12', 2, '2018-02-12 11:31:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rb_registration`
--

CREATE TABLE `rb_registration` (
  `reg_id` int(200) NOT NULL,
  `rb_id` varchar(255) DEFAULT NULL,
  `name_first` varchar(255) NOT NULL,
  `name_last` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `joined_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_registration`
--

INSERT INTO `rb_registration` (`reg_id`, `rb_id`, `name_first`, `name_last`, `email`, `password`, `phonenumber`, `dob`, `gender`, `joined_on`, `updated_on`, `status`) VALUES
(1, 'RBFIR000001', 'Boppana', 'Sandeep', 'boppanasandeep57@gmail.com', 'sandeep57', '9573879057', '1995-03-01', 1, '2017-12-17 16:23:59', NULL, 1),
(2, 'RBFIR000002', 'Boppana', 'Nagendra Prasad', 'boppanaagendraprasad@gmail.com', 'prasad', '9949398140', '1969-05-07', 1, '2017-12-17 16:27:04', NULL, 1),
(3, 'RBFIR000003', 'san', 'deep', 'san@gmail.com', 'sandeep57', '987643212', '2018-01-06', 1, '2018-01-06 10:08:41', NULL, 1),
(4, 'RBFIR000004', 'gf', 'fdgfd', 'dg@dgd.ghjg', 'rertetrt', '543435554', '2018-01-06', 1, '2018-01-06 10:09:22', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rb_skills`
--

CREATE TABLE `rb_skills` (
  `skill_id` int(20) NOT NULL,
  `reg_id` int(200) NOT NULL,
  `skill_name` varchar(50) NOT NULL,
  `skill_priority` int(20) NOT NULL DEFAULT '0',
  `skill_rating` int(20) NOT NULL,
  `skill_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `skill_status` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_skills`
--

INSERT INTO `rb_skills` (`skill_id`, `reg_id`, `skill_name`, `skill_priority`, `skill_rating`, `skill_added`, `skill_status`) VALUES
(1, 1, 'PHP', 0, 0, '2018-02-11 12:07:23', 1),
(2, 1, 'JQuery', 0, 0, '2018-02-11 12:07:26', 1),
(3, 1, 'Codeigniter', 0, 0, '2018-02-11 12:29:42', 1),
(4, 1, 'Ajax', 0, 0, '2018-02-11 12:30:05', 1),
(5, 1, 'Ionic Framework', 0, 0, '2018-02-12 09:52:17', 1),
(6, 1, 'Angular 5', 0, 0, '2018-02-12 09:53:59', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rb_education`
--
ALTER TABLE `rb_education`
  ADD PRIMARY KEY (`edu_id`);

--
-- Indexes for table `rb_experience`
--
ALTER TABLE `rb_experience`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `rb_registration`
--
ALTER TABLE `rb_registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `rb_skills`
--
ALTER TABLE `rb_skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rb_education`
--
ALTER TABLE `rb_education`
  MODIFY `edu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rb_experience`
--
ALTER TABLE `rb_experience`
  MODIFY `exp_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rb_registration`
--
ALTER TABLE `rb_registration`
  MODIFY `reg_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rb_skills`
--
ALTER TABLE `rb_skills`
  MODIFY `skill_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
