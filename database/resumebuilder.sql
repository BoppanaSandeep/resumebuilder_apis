-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 03:20 PM
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
  `edu_specialization` varchar(100) NOT NULL,
  `edu_passoutyear` varchar(20) NOT NULL,
  `edu_percentage` int(20) NOT NULL,
  `edu_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edu_updated` datetime NOT NULL,
  `edu_status` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_education`
--

INSERT INTO `rb_education` (`edu_id`, `reg_id`, `edu_university_clg_sch`, `edu_specialization`, `edu_passoutyear`, `edu_percentage`, `edu_added`, `edu_updated`, `edu_status`) VALUES
(1, 1, 'Vidyalaya Public School', 'MPC', '2010', 85, '2018-02-18 13:39:46', '2018-02-15 18:51:12', 1),
(2, 1, 'Gudlavalleru Engg College', '', '2016', 68, '2018-02-17 13:13:37', '2018-02-15 18:50:58', 1),
(3, 1, 'Sri Chaitanya Junior College', 'MPC', '2012', 90, '2018-02-18 13:40:09', '0000-00-00 00:00:00', 1),
(4, 1, 'GITM', 'Information Technology', '2016', 90, '2018-02-20 16:59:31', '2018-02-20 22:29:31', 0),
(5, 3, 'Gudlavalleru Engineering College', 'Information Technology', '2016', 68, '2018-02-20 17:05:13', '0000-00-00 00:00:00', 1),
(6, 3, 'B', 'B', '2018', 58, '2018-02-27 12:33:56', '0000-00-00 00:00:00', 1),
(7, 3, 'G', 'G', '2018', 58, '2018-02-27 12:34:28', '0000-00-00 00:00:00', 1),
(8, 3, 'Dghj', 'Gghh', '2014', 69, '2018-02-27 12:35:20', '0000-00-00 00:00:00', 1),
(9, 3, 'a', 'a', '2011', 45, '2018-02-27 12:40:48', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rb_employer_registration`
--

CREATE TABLE `rb_employer_registration` (
  `employer_id` int(255) NOT NULL,
  `emp_rb_id` varchar(255) NOT NULL,
  `emp_company` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_contact_num` varchar(20) NOT NULL,
  `emp_address` text NOT NULL,
  `emp_pwd` varchar(255) NOT NULL,
  `emp_picture` varchar(255) NOT NULL,
  `emp_joined_date` timestamp NULL DEFAULT NULL,
  `emp_updated_date` timestamp NULL DEFAULT NULL,
  `emp_status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_employer_registration`
--

INSERT INTO `rb_employer_registration` (`employer_id`, `emp_rb_id`, `emp_company`, `emp_email`, `emp_name`, `emp_contact_num`, `emp_address`, `emp_pwd`, `emp_picture`, `emp_joined_date`, `emp_updated_date`, `emp_status`) VALUES
(1, 'RBFIREMP000001', 'ABC', 'abc@abc.com', 'ABC', '9874563210', 'hyderabad ', 'sandeep57', '', NULL, NULL, 1),
(2, 'RBFIREMP000001', 'ABC2', 'abc2@abc.com', 'ABC2', '9874563210', '4309 N Whipple', '123456', '', NULL, NULL, 1),
(3, 'RBFIREMP000001', 'ABC2', 'abc2@abc.com', 'ABC2', '9874563210', '4309 N Whipple', '123456', '', NULL, NULL, 1),
(4, 'RBFIREMP000002', 'ABC2', 'abc2@abc.com', 'ABC2', '9874563210', '4309 N Whipple', '123456', '', NULL, NULL, 1),
(5, 'RBFIREMP000003', 'ABC2', 'abc2@abc.com', 'ABC2', '9874563210', '4309 N Whipple', '123456', '', NULL, NULL, 1),
(6, 'RBFIREMP000004', 'ABC2', 'abc2@abc.com', 'ABC2', '9874563210', '4309 N Whipple', '123456', '', NULL, NULL, 1),
(7, 'RBFIREMP000005', '1', 'adc@sdfsd.sdf', '1', '1', '1 ', '1', '', NULL, NULL, 1),
(8, 'RBFIREMP000006', '2', '2@2.cm', '2', '2', '2 ', '2', '', NULL, NULL, 1);

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
  `exp_role` varchar(50) NOT NULL,
  `exp_job_desc` varchar(1000) NOT NULL,
  `exp_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `exp_updated` datetime NOT NULL,
  `exp_status` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_experience`
--

INSERT INTO `rb_experience` (`exp_id`, `reg_id`, `exp_company`, `exp_working_from`, `exp_last_work_date`, `exp_currently_working`, `exp_role`, `exp_job_desc`, `exp_added`, `exp_updated`, `exp_status`) VALUES
(1, 1, 'Ameripro Solutions', '2017-03-20', '0000-00-00', 1, 'Junior Software Engineer', 'Junior Software Engineer', '2018-02-18 13:56:32', '2018-02-15 18:37:23', 1),
(2, 1, 'Ameripro Solutions', '2018-02-12', '2018-02-12', 2, 'Senior Engineer', 'Senior Engineer', '2018-02-20 16:59:45', '2018-02-20 22:29:45', 0),
(3, 1, 'Zlapch Tech Studio', '2018-02-12', '2018-02-12', 2, 'Developer', 'Developer', '2018-02-18 12:57:05', '2018-02-17 14:10:45', 1),
(4, 1, 'Google', '2016-01-15', '2017-02-20', 2, 'Software Engineer', 'Slow network is detected. Fallback font will be used while loading: http://localhost:8100/assets/fonts/roboto-regular.woff2\n(index):1 Slow network is detected. Fallback font will be used while loading: http://localhost:8100/assets/fonts/ionicons.woff2?v=3.0.0-alpha.3', '2018-02-26 08:23:57', '2018-02-26 13:53:57', 0),
(5, 3, 'Ameripro solutions', '2017-03-20', '0000-00-00', 1, 'Software engineer', 'Engineer', '2018-02-20 17:04:10', '0000-00-00 00:00:00', 1),
(6, 9, 'Abc', '2018-02-20', '0000-00-00', 1, 'Abc', 'Abc', '2018-02-20 17:22:09', '0000-00-00 00:00:00', 1),
(7, 3, 'ab', '2016-02-27', '2017-06-25', 2, 'ab', 'ab', '2018-02-27 12:24:19', '0000-00-00 00:00:00', 1),
(8, 3, 'Ab', '2018-02-27', '2018-02-27', 2, 'Ab', 'Ab', '2018-02-27 12:33:43', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rb_registration`
--

CREATE TABLE `rb_registration` (
  `reg_id` int(200) NOT NULL,
  `rb_id` varchar(255) DEFAULT NULL,
  `name_first` varchar(255) NOT NULL,
  `name_last` varchar(255) NOT NULL,
  `profile_image` varchar(200) NOT NULL,
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

INSERT INTO `rb_registration` (`reg_id`, `rb_id`, `name_first`, `name_last`, `profile_image`, `email`, `password`, `phonenumber`, `dob`, `gender`, `joined_on`, `updated_on`, `status`) VALUES
(1, 'RBFIR000001', 'Boppana', 'Sandeep', 'profile_imgs/1519545577522.jpg', 'boppanasandeep57@gmail.com', 'sandeep57', '9573879057', '1995-03-01', 1, '2017-12-17 16:23:59', NULL, 1),
(2, 'RBFIR000002', 'Boppana', 'Nagendra Prasad', '', 'boppanaagendraprasad@gmail.com', 'prasad', '9949398140', '1969-05-07', 1, '2017-12-17 16:27:04', NULL, 1),
(3, 'RBFIR000003', 'san', 'deep', 'profile_imgs/1519741722731.jpg', 'san@gmail.com', 'sandeep57', '987643212', '2018-01-06', 1, '2018-01-06 10:08:41', NULL, 1),
(4, 'RBFIR000004', 'gf', 'fdgfd', '', 'dg@dgd.ghjg', 'rertetrt', '543435554', '2018-01-06', 1, '2018-01-06 10:09:22', NULL, 1),
(9, 'RBFIR000009', 'Sasi', 'Donepudi', 'profile_imgs/1519634021036.jpg', 'sasidonepudi@gmail.com', 'sasi1234', '9999998888', '1994-02-10', 1, '2018-02-20 22:46:46', NULL, 1),
(10, 'RBFIR0000010', '', '', '', '', '', '', '0000-00-00', 3, '2018-02-26 13:54:50', NULL, 1),
(11, 'RBFIR0000010', '', '', '', '', '', '', '0000-00-00', 0, '2018-02-27 12:20:01', NULL, 1),
(12, 'RBFIR0000010', '', '', '', '', '', '', '0000-00-00', 0, '2018-02-27 12:22:23', NULL, 1),
(13, 'RBFIR0000010', '', '', '', '', '', '', '0000-00-00', 0, '2018-02-27 12:23:07', NULL, 1),
(14, 'RBFIR0000010', 'aa', 'AA', '', 'aa@aa.com', '12345678', '9876543210', '2001-01-01', 1, '2018-02-27 12:26:50', NULL, 1);

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
  `skill_updated` datetime NOT NULL,
  `skill_status` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_skills`
--

INSERT INTO `rb_skills` (`skill_id`, `reg_id`, `skill_name`, `skill_priority`, `skill_rating`, `skill_added`, `skill_updated`, `skill_status`) VALUES
(1, 1, 'C++', 0, 3, '2018-02-15 09:46:43', '2018-02-15 15:16:43', 0),
(2, 1, 'PHP', 0, 5, '2018-02-14 13:45:06', '2018-02-14 19:15:06', 0),
(3, 1, 'Apache Administrator', 0, 0, '2018-02-15 06:15:54', '2018-02-15 11:45:54', 0),
(4, 3, 'HTML', 0, 5, '2018-02-15 05:47:42', '0000-00-00 00:00:00', 1),
(5, 1, 'HTML', 0, 4, '2018-02-15 06:17:35', '0000-00-00 00:00:00', 1),
(6, 1, 'PHP', 0, 4, '2018-02-15 09:49:54', '0000-00-00 00:00:00', 1),
(7, 1, '3D Max', 0, 2, '2018-02-15 09:58:26', '2018-02-15 15:28:26', 0),
(8, 1, 'Abaqus', 0, 3, '2018-02-20 16:58:33', '2018-02-20 22:28:33', 0),
(9, 1, '3D Max', 0, 1, '2018-02-18 13:41:33', '2018-02-18 19:11:33', 0),
(10, 1, 'Android', 0, 3, '2018-02-17 08:52:20', '0000-00-00 00:00:00', 1),
(11, 1, 'Ansys', 0, 4, '2018-02-18 13:41:26', '2018-02-18 19:11:26', 0),
(12, 1, 'ASP.net', 0, 1, '2018-02-26 08:23:31', '2018-02-26 13:53:31', 0),
(13, 1, 'Photoshop', 0, 3, '2018-02-20 17:01:17', '0000-00-00 00:00:00', 1),
(14, 3, '3D Max', 0, 2, '2018-02-25 10:34:12', '2018-02-25 16:04:12', 0),
(15, 3, 'Android', 0, 2, '2018-02-20 17:03:12', '0000-00-00 00:00:00', 1),
(16, 3, 'Apache Administrator', 0, 2, '2018-02-25 10:34:08', '2018-02-25 16:04:08', 0),
(17, 3, 'C', 0, 1, '2018-02-20 17:03:12', '0000-00-00 00:00:00', 1),
(18, 3, 'Database administrator', 0, 3, '2018-02-20 17:03:12', '0000-00-00 00:00:00', 1),
(19, 9, 'Android', 0, 3, '2018-02-20 17:22:40', '0000-00-00 00:00:00', 1),
(20, 1, 'SQLite', 0, 3, '2018-02-20 17:24:05', '0000-00-00 00:00:00', 1),
(21, 3, 'Java', 0, 3, '2018-02-27 08:06:37', '0000-00-00 00:00:00', 1),
(22, 1, 'Javascript', 0, 3, '2018-02-27 09:47:05', '0000-00-00 00:00:00', 1),
(23, 3, 'BeOS', 0, 2, '2018-02-27 11:07:20', '2018-02-27 16:37:20', 0),
(24, 3, 'Mat Lab', 0, 1, '2018-02-27 11:07:23', '2018-02-27 16:37:23', 0),
(25, 3, 'iOS', 0, 3, '2018-02-27 10:59:02', '0000-00-00 00:00:00', 1),
(26, 3, 'J2EE', 0, 3, '2018-02-27 11:07:06', '0000-00-00 00:00:00', 1),
(27, 3, 'ADAMS', 0, 2, '2018-02-27 11:19:04', '0000-00-00 00:00:00', 1),
(28, 3, 'J2ME', 0, 2, '2018-02-27 12:32:25', '0000-00-00 00:00:00', 1),
(29, 3, 'PHP', 0, 5, '2018-02-27 12:40:16', '0000-00-00 00:00:00', 1),
(30, 3, 'C#.Net', 0, 3, '2018-02-28 13:31:43', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rb_technologies`
--

CREATE TABLE `rb_technologies` (
  `tech_id` int(200) NOT NULL,
  `tech_name` varchar(200) NOT NULL,
  `tech_group_name` varchar(200) NOT NULL,
  `tech_status` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_technologies`
--

INSERT INTO `rb_technologies` (`tech_id`, `tech_name`, `tech_group_name`, `tech_status`) VALUES
(1, '3D Max', '', 1),
(2, 'ADAMS', '', 1),
(3, 'ASP.net', '', 1),
(4, 'AUTOCAD', '', 1),
(5, 'Abaqus', '', 1),
(6, 'Access', '', 1),
(7, 'Actionscript', '', 1),
(8, 'Android', '', 1),
(9, 'Ansys', '', 1),
(10, 'Apache Administrator', '', 1),
(11, 'Autodesk Inventor', '', 1),
(12, 'Basic', '', 1),
(13, 'BeOS', '', 1),
(14, 'C', '', 1),
(15, 'C#.Net', '', 1),
(16, 'C++', '', 1),
(17, 'CFX', '', 1),
(18, 'Catia', '', 1),
(19, 'Cloud Computing', '', 1),
(20, 'DB2', '', 1),
(21, 'DBase', '', 1),
(22, 'DOS', '', 1),
(23, 'Database administrator', '', 1),
(24, 'Delphi', '', 1),
(25, 'EdgeCAM', '', 1),
(26, 'FireBird', '', 1),
(27, 'Fluent', '', 1),
(28, 'Fortran', '', 1),
(29, 'Gambit', '', 1),
(30, 'HTML', '', 1),
(31, 'Hypermesh', '', 1),
(32, 'IIS Administrator', '', 1),
(33, 'J2EE', '', 1),
(34, 'J2ME', '', 1),
(35, 'Java', '', 1),
(36, 'Javascript', '', 1),
(37, 'LS Dyna', '', 1),
(38, 'LabVIEW', '', 1),
(39, 'Linux', '', 1),
(40, 'MS Excel', '', 1),
(41, 'MS PowerPoint', '', 1),
(42, 'MS Word', '', 1),
(43, 'MacOS', '', 1),
(44, 'Mat Lab', '', 1),
(45, 'Mathematica', '', 1),
(46, 'Matlab', '', 1),
(47, 'MaxDB', '', 1),
(48, 'Microsoft SQL', '', 1),
(49, 'MultiSim', '', 1),
(50, 'MySQL', '', 1),
(51, 'NASTRAN', '', 1),
(52, 'Networking', '', 1),
(53, 'Neurosoft', '', 1),
(54, 'Oracle', '', 1),
(55, 'Orcad', '', 1),
(56, 'PCB Design', '', 1),
(57, 'PHP', '', 1),
(58, 'PRDE', '', 1),
(59, 'PRO-E', '', 1),
(60, 'PROTEL', '', 1),
(61, 'PSPICE', '', 1),
(62, 'Pascal', '', 1),
(63, 'Perl', '', 1),
(64, 'Phoenix', '', 1),
(65, 'Photoshop', '', 1),
(66, 'PostgreSQL', '', 1),
(67, 'Primavera', '', 1),
(68, 'Python', '', 1),
(69, 'RTL', '', 1),
(70, 'Ruby', '', 1),
(71, 'Rup (Case Tools)', '', 1),
(72, 'SQLite', '', 1),
(73, 'Server', '', 1),
(74, 'Shell Programming', '', 1),
(75, 'Solaris', '', 1),
(76, 'Solid Works', '', 1),
(77, 'SolidCam', '', 1),
(78, 'SolidEDGE', '', 1),
(79, 'SolidWorks', '', 1),
(80, 'SunOS', '', 1),
(81, 'Tally', '', 1),
(82, 'Topview Simulator', '', 1),
(83, 'UniGraphics', '', 1),
(84, 'Unix', '', 1),
(85, 'VB.Net', '', 1),
(86, 'VBScript', '', 1),
(87, 'Visual C++', '', 1),
(88, 'Visual Foxpro.Net', '', 1),
(89, 'Windows 3.1', '', 1),
(90, 'Windows 95/98/Me', '', 1),
(91, 'Windows Mobile', '', 1),
(92, 'Windows NT/2000/2003/2008', '', 1),
(93, 'Windows XP/Vista/7', '', 1),
(94, 'XML', '', 1),
(95, 'iOS', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rb_education`
--
ALTER TABLE `rb_education`
  ADD PRIMARY KEY (`edu_id`);

--
-- Indexes for table `rb_employer_registration`
--
ALTER TABLE `rb_employer_registration`
  ADD PRIMARY KEY (`employer_id`);

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
-- Indexes for table `rb_technologies`
--
ALTER TABLE `rb_technologies`
  ADD PRIMARY KEY (`tech_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rb_education`
--
ALTER TABLE `rb_education`
  MODIFY `edu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rb_employer_registration`
--
ALTER TABLE `rb_employer_registration`
  MODIFY `employer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rb_experience`
--
ALTER TABLE `rb_experience`
  MODIFY `exp_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rb_registration`
--
ALTER TABLE `rb_registration`
  MODIFY `reg_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `rb_skills`
--
ALTER TABLE `rb_skills`
  MODIFY `skill_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `rb_technologies`
--
ALTER TABLE `rb_technologies`
  MODIFY `tech_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
