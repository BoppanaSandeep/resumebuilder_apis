-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 01:33 PM
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
(4, 1, 'Ajax', 0, 0, '2018-02-11 12:30:05', 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `rb_registration`
--
ALTER TABLE `rb_registration`
  MODIFY `reg_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rb_skills`
--
ALTER TABLE `rb_skills`
  MODIFY `skill_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
