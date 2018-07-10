-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2018 at 07:34 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `rb_appliedjobs`
--

CREATE TABLE `rb_appliedjobs` (
  `appliedIds` int(11) NOT NULL,
  `appliedJobPostId` int(11) NOT NULL,
  `appliedBy` varchar(100) NOT NULL,
  `appliedStatus` int(11) NOT NULL COMMENT '1 Applied 2 Rejected 3 Hold 4 Contacted 5 Viewed 6 Selected 7 Cancelled',
  `addedDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_appliedjobs`
--

INSERT INTO `rb_appliedjobs` (`appliedIds`, `appliedJobPostId`, `appliedBy`, `appliedStatus`, `addedDate`, `updatedDate`) VALUES
(1, 666, 'RBFIR000001', 1, '2018-07-03 09:02:30', '0000-00-00 00:00:00'),
(2, 3, 'RBFIR000001', 1, '2018-07-03 09:06:16', '0000-00-00 00:00:00'),
(3, 4, 'RBFIR000001', 1, '2018-07-03 09:07:04', '0000-00-00 00:00:00'),
(4, 1, 'RBFIR000001', 1, '2018-07-03 09:09:28', '0000-00-00 00:00:00');

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
(9, 3, 'a', 'a', '2011', 45, '2018-02-27 12:40:48', '0000-00-00 00:00:00', 1),
(10, 2, 'Gdlv', 'MBA', '2000', 80, '2018-04-14 08:51:27', '0000-00-00 00:00:00', 1),
(11, 9, 'Gdlav', 'IT', '2016', 67, '2018-04-14 08:55:46', '0000-00-00 00:00:00', 1),
(12, 4, 'Gdlav', 'IT', '2016', 72, '2018-04-14 09:02:57', '0000-00-00 00:00:00', 1),
(13, 15, 'Sarojini', 'ECE', '2014', 70, '2018-04-14 09:07:39', '0000-00-00 00:00:00', 1),
(14, 16, 'Gdlv', 'CSE', '1995', 80, '2018-04-14 09:30:55', '0000-00-00 00:00:00', 1),
(15, 17, 'Vr s', 'IT', '2016', 70, '2018-04-14 09:34:11', '0000-00-00 00:00:00', 1),
(16, 18, 'Gdlv', 'Cse', '2016', 80, '2018-04-14 09:36:42', '0000-00-00 00:00:00', 1),
(17, 19, 'Iith', 'Msc computers', '1998', 80, '2018-04-14 09:39:07', '0000-00-00 00:00:00', 1),
(18, 20, 'Iitw', 'Cse', '1973', 80, '2018-04-14 09:41:20', '0000-00-00 00:00:00', 1),
(19, 21, 'Jansi', 'It', '1984', 80, '2018-04-14 09:43:21', '0000-00-00 00:00:00', 1);

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
  `emp_first_name` varchar(250) NOT NULL,
  `emp_last_name` varchar(250) NOT NULL,
  `emp_contact_num` varchar(20) NOT NULL,
  `emp_address` text NOT NULL,
  `emp_city` varchar(255) NOT NULL,
  `emp_country` varchar(255) NOT NULL,
  `emp_postal` int(255) NOT NULL,
  `emp_about` varchar(500) NOT NULL,
  `emp_pwd` varchar(255) NOT NULL,
  `emp_picture` varchar(255) NOT NULL,
  `emp_joined_date` datetime DEFAULT NULL,
  `emp_updated_date` datetime DEFAULT NULL,
  `emp_status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_employer_registration`
--

INSERT INTO `rb_employer_registration` (`employer_id`, `emp_rb_id`, `emp_company`, `emp_email`, `emp_name`, `emp_first_name`, `emp_last_name`, `emp_contact_num`, `emp_address`, `emp_city`, `emp_country`, `emp_postal`, `emp_about`, `emp_pwd`, `emp_picture`, `emp_joined_date`, `emp_updated_date`, `emp_status`) VALUES
(1, 'RBFIREMP000001', 'Sandeep Inc.', 'boppanasandeep57@gmail.com', 'Sandeep', 'Boppana', 'Sandeep', '9573879057', 'Nizampet, Hyderabad, Telangana.', 'Hyderabad', 'India', 500090, 'Lamborghini Mercy \r\nYour chick she so thirsty \r\nI\'m in that two seat Lambo', 'sandeep57', 'company_logos/20180323182638_Desert.jpg', NULL, '2018-07-07 23:12:02', 1),
(4, 'RBFIREMP000002', 'ABC2', 'abc2@abc.com', 'ABC2', '', '', '9874563210', '4309 N Whipple', '', '', 0, '', '123456', '', NULL, NULL, 1),
(5, 'RBFIREMP000003', 'ABC2', 'abc2@abc.com', 'ABC2', '', '', '9874563210', '4309 N Whipple', '', '', 0, '', '123456', '', NULL, NULL, 1),
(6, 'RBFIREMP000004', 'ABC2', 'abc2@abc.com', 'ABC2', '', '', '9874563210', '4309 N Whipple', '', '', 0, '', '123456', '', NULL, NULL, 1),
(7, 'RBFIREMP000005', '1', 'adc@sdfsd.sdf', '1', '', '', '1', '1 ', '', '', 0, '', '1', '', NULL, NULL, 1),
(8, 'RBFIREMP000006', '2', '2@2.cm', '2', '', '', '2', '2 ', '', '', 0, '', '2', '', NULL, NULL, 1),
(9, 'RBFIREMP000007', 'sandeep', '2@2.cm', 'sandeep', '', '', '9786543210', 'sandeep, vij ', '', '', 0, '', '123456', '', NULL, NULL, 1),
(10, 'RBFIREMP000008', 'sdfkjs', '2@2.cm', 'ffksdff', '', '', 'jdfjkdfk', 'kjdfsdr435 ', '', '', 0, '', '12345', '', NULL, NULL, 1),
(11, 'RBFIREMP000009', 'sdfsdf', '2@2.cm', 'sdfsdf', '', '', 'sdfsfsdf', ' fsdfsdfsdf', '', '', 0, '', '1234', '', NULL, NULL, 1),
(12, 'RBFIREMP0000010', 'asdadsasdad', 'sandeep@gmil.com', 'asdasd', '', '', '324', ' asdasd', '', '', 0, '', '123', 'company_logos/20180415190536_error.png', NULL, '2018-04-15 19:05:36', 1),
(13, 'RBFIREMP0000011', 'google', 'hr@google.com', 'Google', 'Sundhar', 'Pichai', '9874563210', 'Hitech City', 'Hyderabad', 'India', 500090, 'Google Search, commonly referred to as Google Web Search or simply Google, is a web search engine developed by Google. It is the most-used search engine on the World Wide Web, handling more than three billion searches each day.', 'google@123', 'company_logos/20180415190536_error.png', '2018-04-15 19:03:30', '2018-04-19 18:49:29', 1),
(14, 'RBFIREMP0000012', 'Github', 'hr@github.com', 'Github', '', '', '9856741230', ' sdfsdf', '', '', 0, '', 'github@123', '', '2018-04-15 19:09:43', NULL, 1);

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
(6, 9, 'Cognizent', '2017-06-20', '0000-00-00', 1, 'System Adminstrator', 'Job processi g', '2018-04-14 08:57:06', '2018-04-14 14:27:06', 1),
(7, 3, 'ab', '2016-02-27', '2017-06-25', 2, 'ab', 'ab', '2018-02-27 12:24:19', '0000-00-00 00:00:00', 1),
(8, 3, 'Ab', '2018-02-27', '2018-02-27', 2, 'Ab', 'Ab', '2018-02-27 12:33:43', '0000-00-00 00:00:00', 1),
(9, 2, 'Bnp', '2005-04-14', '0000-00-00', 1, 'Chairman', 'Chairman', '2018-04-14 08:50:42', '0000-00-00 00:00:00', 1),
(10, 4, 'Atmecs', '2017-04-14', '0000-00-00', 1, 'Software Engineer', 'Lead', '2018-04-14 09:02:37', '0000-00-00 00:00:00', 1),
(11, 15, 'Chakresh', '2014-05-14', '0000-00-00', 1, 'MD', 'Management', '2018-04-14 09:07:16', '0000-00-00 00:00:00', 1),
(12, 16, 'Sridevi', '2000-04-14', '0000-00-00', 1, 'CEO', 'CEO', '2018-04-14 09:30:12', '0000-00-00 00:00:00', 1),
(13, 17, 'Vr', '2016-04-14', '0000-00-00', 1, 'Vr', 'Vr', '2018-04-14 09:33:26', '0000-00-00 00:00:00', 1),
(14, 18, 'Google', '2017-04-14', '0000-00-00', 1, 'Enginner', 'Engineer', '2018-04-14 09:36:25', '0000-00-00 00:00:00', 1),
(15, 19, 'Infosys', '2007-04-14', '0000-00-00', 1, 'Engineer', 'Engineer', '2018-04-14 09:38:30', '0000-00-00 00:00:00', 1),
(16, 20, 'Nn rao', '1977-04-14', '0000-00-00', 1, 'Chairman', 'Chairman', '2018-04-14 09:40:48', '0000-00-00 00:00:00', 1),
(17, 21, 'Jansi', '1994-04-14', '0000-00-00', 1, 'Md', 'Md', '2018-04-14 09:43:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rb_jobposts`
--

CREATE TABLE `rb_jobposts` (
  `post_id` int(11) NOT NULL,
  `post_emp_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_position` varchar(100) NOT NULL,
  `job_description` text NOT NULL,
  `skills_req` varchar(500) NOT NULL,
  `job_opening_date` date NOT NULL,
  `job_closing_date` date NOT NULL,
  `contact_email` varchar(250) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `added_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `post_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_jobposts`
--

INSERT INTO `rb_jobposts` (`post_id`, `post_emp_id`, `job_title`, `job_position`, `job_description`, `skills_req`, `job_opening_date`, `job_closing_date`, `contact_email`, `contact_number`, `address`, `city`, `state`, `country`, `added_date`, `update_date`, `post_status`) VALUES
(1, 1, 'Developer', 'Jr. Software Engineer', 'Jr. Software Engineer all capabilities of doing work.', 'PHP, Codeigniter,HTML5, JS, CSS, Angular 2', '2018-03-17', '2018-03-20', 'hr@abc.com', '9874563210', 'Hitech city, hyderabad.', 'Hyderabad', 'Telanaga', 'India', '2018-03-16 16:41:00', '2018-03-16 16:41:00', 1),
(2, 1, 'Designer', 'Software Engineer', 'Good in UI/ UX related designs.', 'All design Technologies', '2018-03-19', '2018-03-21', 'hr@abc.com', '9632587410', 'Hyderabad', 'Hyderabad', 'Telanaga', 'India', '2018-03-16 16:44:25', '2018-03-16 16:44:25', 1),
(3, 1, 'Developer', 'Sr. Developer', 'Sr. Developer', 'PHP', '2018-03-19', '2018-03-23', 'hr@comp.com', '9632587415', 'Hyd', 'Hyderabad', 'TS', 'India', '2018-03-16 16:48:10', '2018-04-19 14:56:41', 1),
(4, 1, 'Database', 'Back End Engineer', 'Back End Engineer', 'MySQL, Oracle, Maria DB', '2018-03-17', '2018-03-27', 'hr@abc.com', '9874563210', 'Mindspace, Hitech City, Hyderabad.', 'Hyderabad', 'Telanaga', 'India', '2018-03-16 18:25:56', '2018-04-19 14:54:00', 1),
(666, 1, '.NET Developer', 'DEveloper', '<p><br></p><ul><li>dfgdfgdfg</li><li>fgdfgfg</li><li>fgdgfdfg</li><li>fgdfg</li></ul><p><br></p>', 'C#.Net', '2018-04-14', '2018-04-25', 'hr@rb.com', '9632587410', 'Hyd, Telanaga', 'Hyderabad', 'Telanagana', 'India', '2018-04-14 15:16:36', '2018-07-07 09:11:56', 1),
(667, 13, 'Software Engineer', 'Software Engineer', '<p><span xss=removed>Google Search, commonly referred to as Google Web Search or simply Google, is a web search engine developed by Google. It is the most-used search engine on the World Wide Web, handling more than three billion searches each day.</span><br></p>', 'Python,PHP,Oracle.', '2018-04-19', '2018-04-27', 'hr@google.com', '9874563210', 'Block A, Hitech city, Hyderabad.', 'Hyderabad', 'Telanagana', 'India', '2018-04-19 18:52:31', '2018-04-19 18:55:27', 1);

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
(1, 'RBFIR000001', 'Boppana', 'Sandeep', 'profile_imgs/1523690690262.jpg', 'boppanasandeep57@gmail.com', 'sandeep57', '9573879057', '1995-03-01', 1, '2017-12-17 16:23:59', '2018-04-14 12:55:10', 1),
(2, 'RBFIR000002', 'Boppana', 'Nagendra Prasad', 'profile_imgs/1523695947325.jpg', 'bnp@gmail.com', 'prasad', '9949398140', '1969-05-07', 1, '2017-12-17 16:27:04', '2018-04-14 14:22:47', 1),
(3, 'RBFIR000003', 'san', 'deep', 'profile_imgs/1519741722731.jpg', 'san@gmail.com', 'sandeep57', '987643212', '2018-01-06', 1, '2018-01-06 10:08:41', NULL, 1),
(4, 'RBFIR000004', 'Vamsi', 'V', 'profile_imgs/1523696497693.jpg', 'vamsi@rb.com', 'vamsi', '543435554', '2018-01-06', 1, '2018-01-06 10:09:22', '2018-04-14 14:31:57', 1),
(9, 'RBFIR000009', 'Sasi', 'Donepudi', 'profile_imgs/1519634021036.jpg', 'sasidonepudi@gmail.com', 'sasi1234', '9999998888', '1994-02-10', 1, '2018-02-20 22:46:46', NULL, 1),
(15, 'RBFIR0000010', 'Chakresh', 'B', 'profile_imgs/1523696783096.jpg', 'cb@rb.com', 'chakresh', '9632587410', '1993-06-14', 1, '2018-04-14 14:35:08', '2018-04-14 14:36:40', 1),
(16, 'RBFIR0000011', 'Sri devi', 'B', 'profile_imgs/1523698157260.jpg', 'sri@gmail.com', 'sridevi123', '9632587410', '1975-06-04', 2, '2018-04-14 14:41:48', '2018-04-14 14:59:37', 1),
(17, 'RBFIR0000012', 'Kali', 'E', 'profile_imgs/1523698340800.jpg', 'kali@gmail.com', 'kali1234', '3698521470', '1992-01-01', 1, '2018-04-14 14:42:45', '2018-04-14 15:02:39', 1),
(18, 'RBFIR0000013', 'Ganesh', 'C', 'profile_imgs/1523698537771.jpg', 'ganesh@gmail.com', 'ganesh123', '9856321470', '1995-01-01', 1, '2018-04-14 14:43:38', '2018-04-14 15:05:56', 1),
(19, 'RBFIR0000014', 'Srinivas', 'N', 'profile_imgs/1523698651890.jpg', 'narra@gmail.com', 'narra123', '7412580963', '1974-01-01', 1, '2018-04-14 14:45:30', '2018-04-14 15:07:50', 1),
(20, 'RBFIR0000015', 'Narashimarao', 'N', 'profile_imgs/1523698804104.jpg', 'narra@gmail.com', 'nn123456', '7896541230', '1948-01-01', 1, '2018-04-14 14:49:34', '2018-04-14 15:10:22', 1),
(21, 'RBFIR0000016', 'Jansi', 'N', 'profile_imgs/1523698941829.jpg', 'narra@gmail.com', 'jansi1234', '7458963210', '1949-01-01', 2, '2018-04-14 14:58:28', '2018-04-14 15:12:40', 1);

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
(30, 3, 'C#.Net', 0, 3, '2018-02-28 13:31:43', '0000-00-00 00:00:00', 1),
(31, 1, 'MySQL', 0, 3, '2018-04-14 07:27:56', '0000-00-00 00:00:00', 1),
(32, 1, 'Oracle', 0, 3, '2018-04-14 07:27:56', '0000-00-00 00:00:00', 1),
(33, 2, 'MySQL', 0, 3, '2018-04-14 08:52:07', '0000-00-00 00:00:00', 1),
(34, 2, 'Android', 0, 2, '2018-04-14 08:52:09', '0000-00-00 00:00:00', 1),
(35, 2, 'PHP', 0, 3, '2018-04-14 08:54:10', '0000-00-00 00:00:00', 1),
(36, 9, 'PHP', 0, 3, '2018-04-14 08:56:04', '0000-00-00 00:00:00', 1),
(37, 4, 'PHP', 0, 3, '2018-04-14 09:03:14', '0000-00-00 00:00:00', 1),
(38, 15, 'MySQL', 0, 3, '2018-04-14 09:07:51', '0000-00-00 00:00:00', 1),
(39, 15, 'PHP', 0, 2, '2018-04-14 09:08:53', '0000-00-00 00:00:00', 1),
(40, 16, 'PHP', 0, 4, '2018-04-14 09:31:15', '0000-00-00 00:00:00', 1),
(41, 17, 'PHP', 0, 4, '2018-04-14 09:34:23', '0000-00-00 00:00:00', 1),
(42, 18, 'PHP', 0, 4, '2018-04-14 09:36:56', '0000-00-00 00:00:00', 1),
(43, 19, 'Android', 0, 3, '2018-04-14 09:39:18', '0000-00-00 00:00:00', 1),
(44, 19, 'C#.Net', 0, 3, '2018-04-14 09:39:39', '0000-00-00 00:00:00', 1),
(45, 20, 'Oracle', 0, 3, '2018-04-14 09:41:39', '0000-00-00 00:00:00', 1),
(46, 21, 'PHP', 0, 3, '2018-04-14 09:43:31', '0000-00-00 00:00:00', 1),
(47, 1, 'C#.Net', 0, 3, '2018-04-19 09:22:56', '0000-00-00 00:00:00', 1),
(48, 1, 'Apache Administrator', 0, 4, '2018-07-07 07:49:57', '0000-00-00 00:00:00', 1);

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
-- Indexes for table `rb_appliedjobs`
--
ALTER TABLE `rb_appliedjobs`
  ADD PRIMARY KEY (`appliedIds`);

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
-- Indexes for table `rb_jobposts`
--
ALTER TABLE `rb_jobposts`
  ADD PRIMARY KEY (`post_id`);

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
-- AUTO_INCREMENT for table `rb_appliedjobs`
--
ALTER TABLE `rb_appliedjobs`
  MODIFY `appliedIds` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rb_education`
--
ALTER TABLE `rb_education`
  MODIFY `edu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rb_employer_registration`
--
ALTER TABLE `rb_employer_registration`
  MODIFY `employer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rb_experience`
--
ALTER TABLE `rb_experience`
  MODIFY `exp_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rb_jobposts`
--
ALTER TABLE `rb_jobposts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=668;

--
-- AUTO_INCREMENT for table `rb_registration`
--
ALTER TABLE `rb_registration`
  MODIFY `reg_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rb_skills`
--
ALTER TABLE `rb_skills`
  MODIFY `skill_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `rb_technologies`
--
ALTER TABLE `rb_technologies`
  MODIFY `tech_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
