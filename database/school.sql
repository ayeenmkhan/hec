-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2020 at 06:29 AM
-- Server version: 5.7.24
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `tags` mediumtext,
  `cover_photo` varchar(255) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `course_icon` text,
  `icon_filename` text,
  `content_creater_id` varchar(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `tags`, `cover_photo`, `filename`, `course_icon`, `icon_filename`, `content_creater_id`, `status`, `created_by`, `created_date`) VALUES
(2, 'Java Language Programming', 'java developement', 'Amsterdam,test,java,android,heelo,whre,who', 'http://localhost/ptcl/uploads/course_content/banner.jpg', 'banner.jpg', NULL, NULL, '2', 3, 0, '2019-08-19 07:03:28'),
(22, 'Intro to programming', 'Introduction to programming', 'computer,progrmming,c++', 'http://localhost/ptcl/uploads/course_content/banner6.jpg', 'banner6.jpg', NULL, NULL, '9', 3, 0, '2019-08-19 07:03:28'),
(9, 'test', 'dfajklaf', 'Amsterdam,dlfaj,fadkf,kdfas;f', 'http://localhost/ptcl/uploads/course_content/banner.jpg', 'banner.jpg', NULL, NULL, '8', 3, 80837, '2019-08-19 07:03:28'),
(17, 'Games Designing', 'Game Desinging Course for 76  credit hours foor 6 months.', 'Amsterdam,test,games,designing', 'http://localhost/ptcl/uploads/course_content/banner1.jpg', 'banner1.jpg', NULL, NULL, '2', 3, 80837, '2019-08-19 07:03:28'),
(10, 'test', 'dfajklaf', 'Amsterdam,dlfaj,fadkf,kdfas;f', 'http://localhost/ptcl/uploads/course_content/banner.jpg', 'banner.jpg', 'http://localhost/ptcl/uploads/course_content/6mQKaL.jpg', '6mQKaL.jpg', '', 4, 80837, '2019-08-19 07:03:28'),
(14, 'Java developer', 'testing', 'Amsterdam,test,matha', 'http://localhost/ptcl/uploads/course_content/banner.jpg', 'banner.jpg', NULL, NULL, '2', 3, 80837, '2019-08-19 07:03:28'),
(15, 'Java Language', 'java developement', 'Amsterdam,test,java,android,hello,hi,wher', 'http://localhost/ptcl/uploads/course_content/banner11.jpg', 'banner11.jpg', 'http://localhost/ptcl/uploads/course_content/avatar-3.jpg', 'avatar-3.jpg', '2', 1, 80837, '2019-08-19 07:03:28'),
(16, 'Game Development', 'Hello Developer', 'Game,java,nodejs', 'http://localhost/ptcl/uploads/course_content/banner.jpg', 'banner.jpg', NULL, NULL, '', 0, 80837, '2019-08-19 07:03:28'),
(19, 'PTCL Test', 'mock course', 'Amsterdam,AI,Quality Assurance', 'http://localhost/ptcl/uploads/course_content/banner3.jpg', 'banner3.jpg', 'http://localhost/ptcl/uploads/course_content/6mQKaL1.jpg', '6mQKaL1.jpg', '2', 4, 3882830, '2019-08-19 07:03:28'),
(20, 'EHS Course', 'Testing Course for Urdu', 'Amsterdam,test,dfa,dfgg,ee,ad,fdad,wewe,tggg,rer,ferf,tgrg,wtg,twgw', 'http://localhost/ptcl/uploads/course_content/banner4.jpg', 'banner4.jpg', 'http://localhost/ptcl/uploads/course_content/banner4.jpg', 'banner4.jpg', '2', 3, 80837, '2019-08-19 07:03:28'),
(21, 'Testing Modules', 'fafafaff', 'Amsterdam,fafa,affa', 'http://localhost/ptcl/uploads/course_content/banner5.jpg', 'banner5.jpg', 'http://localhost/ptcl/uploads/course_content/6mQKaL2.jpg', '6mQKaL2.jpg', '2', 3, 0, '2019-08-19 07:03:28'),
(25, 'Quality Assurance', 'Testing', 'Amsterdam,Hello', 'http://localhost/ptcl/uploads/course_content/banner9.jpg', '0-mark-up1.pdf', NULL, NULL, '9', 4, 3882830, '2019-08-19 07:06:08'),
(26, 'TEST ICON', 'test', 'Amsterdam,test,iconm', 'http://localhost/ptcl/uploads/course_content/banner10.jpg', 'banner10.jpg', 'http://localhost/ptcl/uploads/course_content/ptcl.png', 'ptcl.png', '', 3, 0, '2019-08-22 09:37:48'),
(27, 'TESTING LOGS ACTIVITY', 'TEST', 'LMS,LOGS', 'http://localhost/ptcl/uploads/course_content/banner12.jpg', 'banner12.jpg', 'http://localhost/ptcl/uploads/course_content/banner12.jpg', 'banner12.jpg', '2', 3, 0, '2019-08-27 08:54:24'),
(28, 'English', 'this is english', NULL, NULL, NULL, NULL, NULL, NULL, 0, 3882830, '2019-12-29 09:58:57'),
(29, 'Computer Science', 'This is computer science suject', NULL, NULL, NULL, NULL, NULL, NULL, 0, 3882830, '2020-01-04 14:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `course_assesment_questions`
--

DROP TABLE IF EXISTS `course_assesment_questions`;
CREATE TABLE IF NOT EXISTS `course_assesment_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `module_id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `choice_one` varchar(255) DEFAULT NULL,
  `choice_two` varchar(255) DEFAULT NULL,
  `choice_three` varchar(255) DEFAULT NULL,
  `choice_four` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `selected_option` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_assesment_questions`
--

INSERT INTO `course_assesment_questions` (`id`, `course_id`, `module_id`, `question`, `choice_one`, `choice_two`, `choice_three`, `choice_four`, `answer`, `status`, `selected_option`) VALUES
(1, 2, 1, 'What is the name of capital of Pakistan ?', 'Karachi', 'Islmabad', 'Lahore', 'Fourth', 'Karachi', 1, 1),
(2, 2, 2, 'Founder of pakistan?', 'Imran Khan.', 'Quaid-e-Azam', 'Ayeen', 'test', 'Quaid-e-Azam', 1, 1),
(5, 9, 12, 'What is your name ?', 'Ayeen', 'Neeya', 'yeena', 'Fourth', 'Ayeen', 1, 1),
(4, 2, 5, 'PTCL Headquater located in ?', 'Islamabad', 'karachi', 'Gilgit', 'Hunza', 'Islamabad', 1, 1),
(6, 2, 5, 'test', 'A', 'B', 'C', 'D', 'A', 1, 3),
(7, 2, 5, 'Test two', 'B', 'C', 'D', 'TEst', 'C', 1, 3),
(8, 2, 5, 'TEST 3', 'A', 'B', 'F', 'G', 'F', 1, 2),
(9, 15, 62, 'Question One', 'ABCD', 'EFGH', 'IJKL', 'MKL', 'EFGH', 1, 2),
(10, 15, 62, 'Question two', 'ASDF', 'GHJK', 'LKJH', 'LKKL', 'LKKL', 1, 4),
(11, 18, 6, 'Capital Of Pakistan ?', 'Islamabad', 'Karachi', 'Lahore', 'Gilgit', 'Fourth', 1, 1),
(12, 18, 6, 'K2 located at ?', 'Punjab', 'Sindh', 'GB', 'KPK', 'GB', 1, 3),
(14, 18, 6, 'Android development on ?', 'Android studio ?', 'Java', 'Kotlin', 'Nodejs', 'Android studio ?', 1, 1),
(15, 18, 64, 'Founder Of Pakistan', 'Quaid-e-Azam', 'Imran Khan', 'Ayeen khan', 'Uzair', 'Quaid-e-Azam', 1, 1),
(16, 18, 65, 'What is this ?', 'MCQS', 'ANSWER', 'QUESTION', 'test', 'Fourth', 1, 3),
(17, 18, 66, 'Helooo ?', 'Hi', 'This', 'is', 'Hello', 'Fourth', 1, 1),
(18, 18, 6, 'Proffession ?', 'Engineer', 'Developer', 'Backend Engineer', 'Fourth', 'Backend Engineer', 1, 2),
(19, 19, 67, 'whats your name?', 'test', 'aa', '11', 'Fourth', 'Fourth', 1, 1),
(20, 19, 67, 'wiewiewewqwe?', 'asad', 'qwqw', 'qwqw', 'Fourth', 'asad', 1, 1),
(21, 19, 67, 'sasassadadada?', 'sdsds', 'Ssa', 'Aa', 'Fourth', 'Fourth', 1, 1),
(22, 20, 68, 'مپھھغ عتہمععمر کہمغ نرہمنہہن؟', 'ملررہلملم', 'رمورور', 'نھنصنصھ', 'ییکیک؛یک', 'رمورور', 1, 2),
(23, 20, 68, 'نھنصنصھومومو رورمورمر؟', 'دھھدھدھ دنو', 'رکناکرانمای', 'ییکیک؛یک', 'رمورور', 'دھھدھدھ دنو', 1, 1),
(24, 15, 69, 'Hello', 'this', 'is', 'test', 'Fourth', 'Fourth', 1, 2),
(25, 15, 69, 'HI', 'No', 'yes', 'this', 'Fourth', 'Fourth', 1, 3),
(26, 21, 70, 'language', 'englush', 'course', 'test', 'test', 'test', 1, 4),
(27, 21, 70, 'testttst', 'faf', 'afdfa', 'afdaf', 'tdatf', 'tdatf', 1, 4),
(28, 21, 71, 'test', 'dfahf', 'fhja', 'fhadfh', 'hhj', 'fhadfh', 1, 3),
(29, 21, 71, 'Testting option4', 'no', 'yes', 'hi', 'hello', 'hello', 1, 4),
(30, 22, 72, 'Language', 'C++', 'Java', 'PHP', 'NODE', 'NODE', 1, 4),
(31, 22, 73, 'What is this?', 'Course', 'English', 'Maths', 'Urdu', 'English', 1, 2),
(32, 25, 74, 'What is your name?', 'abc', 'def', 'car', 'dadj', 'def', 1, 2),
(33, 26, 75, 'tes', 'dahfh', 'dfjak', 'fhadjfh', 'jdahfk', 'dfjak', 1, 2),
(34, 10, 76, 'Hello word?', 'DE', 'FG', 'HI', 'JK', 'FG', 1, 2),
(35, 10, 76, 'What is this ?', 'dfjh', 'fdjahf', 'hajdhf', 'hajdsf', 'hajdsf', 1, 4),
(36, 15, 69, 'dfajkfh', 'jdfja', 'fjdkfj', 'afjkdfj', 'fjadkfj', 'fjdkfj', 1, 2),
(39, 27, 77, 'HEllo', 'dfjadj', 'djdkafk', 'dfkadfjk', 'fakdfjk', 'dfjadj', 1, 1),
(40, 28, 78, 'What is your name?', 'AS', 'BD', 'DC', 'EF', 'AS', 1, 1),
(41, 28, 78, 'Hello Whats Your name', 'Aa', 'Bb', 'Cc', 'Dd', 'Cc', 1, 3),
(42, 25, 74, 'How are you?', 'Good', 'Fine', 'what', 'no', 'Fine', 1, 2),
(43, 25, 74, 'Hello to school?', 'Yes', 'No', 'Both', 'none', 'Both', 1, 3),
(44, 29, 79, 'abd', 'dabnf', 'bsdnfb', 'fdbsn', 'fadfafa', 'bsdnfb', 1, 2),
(45, 29, 79, 'What is Machine', 'fan', 'Computer', 'Book', 'cat', 'Computer', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `course_assesment_user_answers`
--

DROP TABLE IF EXISTS `course_assesment_user_answers`;
CREATE TABLE IF NOT EXISTS `course_assesment_user_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `is_correct` int(11) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_assesment_user_answers`
--

INSERT INTO `course_assesment_user_answers` (`id`, `employee_id`, `course_id`, `module_id`, `question_id`, `answer`, `is_correct`, `date_time`) VALUES
(1, 15497, 25, 74, 32, 'abc', 1, '2020-01-03 18:15:29'),
(2, 15497, 25, 74, 42, 'Good', 1, '2020-01-03 18:15:29'),
(3, 15497, 25, 74, 43, 'Yes', 1, '2020-01-03 18:15:29'),
(11, 15497, 10, 76, 35, 'dfjh', 0, '2020-01-04 13:16:24'),
(12, 15497, 19, 67, 19, 'test', 0, '2020-01-05 15:39:00'),
(13, 15497, 19, 67, 20, 'Fourth', 0, '2020-01-05 15:39:00'),
(14, 15497, 19, 67, 21, 'Aa', 0, '2020-01-05 15:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `course_class`
--

DROP TABLE IF EXISTS `course_class`;
CREATE TABLE IF NOT EXISTS `course_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `class` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_class`
--

INSERT INTO `course_class` (`id`, `course_id`, `class`) VALUES
(2, 25, '3'),
(3, 28, '2'),
(4, 29, '3');

-- --------------------------------------------------------

--
-- Table structure for table `course_modules`
--

DROP TABLE IF EXISTS `course_modules`;
CREATE TABLE IF NOT EXISTS `course_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` mediumtext,
  `course_file` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_modules`
--

INSERT INTO `course_modules` (`id`, `course_id`, `title`, `description`, `course_file`, `file_name`) VALUES
(5, 2, 'Module 2', 'NTS', 'http://localhost/ptcl/uploads/course_content/Bridge.mp4', NULL),
(4, 2, 'Module 1', 'GRE', 'http://localhost/ptcl/uploads/course_content/Bridge.mp4', NULL),
(6, 9, 'TESTING', 'IELTS', 'http://localhost/ptcl/uploads/course_content/Bridge.mp4', NULL),
(7, 9, 'Module 4', 'SAT', 'http://localhost/ptcl/uploads/course_content/Bridge.mp4', NULL),
(15, 1, 'Module three', 'testing', 'http://localhost/ptcl/uploads/course_content/Bridge.mp4', NULL),
(12, 9, 'TESTING Questions', 'TESTING', 'http://localhost/ptcl/uploads/course_content/Bridge-23544_(1)4.mp4', NULL),
(13, 1, 'Module One', 'testing module one', 'http://localhost/ptcl/uploads/course_content/Bridge.mp4', NULL),
(69, 15, 'Testing', 'dfahfajkhfk', 'http://localhost/ptcl/uploads/course_content/Bridge-23544_(1)7.mp4', 'Bridge-23544_(1)7.mp4'),
(62, 15, 'Module one', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'t heard of them accusamus labore sustainable VHS.', 'http://localhost/ptcl/uploads/course_content/Bridge.mp4', 'Bridge.mp4'),
(61, 1, 'module new', 'new testing', 'http://localhost/ptcl/uploads/course_content/Bridge.mp4', 'Bridge.mp4'),
(67, 19, 'Introduction', 'Intor to quality assureance', 'http://localhost/ptcl/uploads/course_content/Bridge-23544_(1)5.mp4', 'Bridge-23544_(1)5.mp4'),
(68, 20, 'مپھھغ عتہمععمر کہمغ', 'مپھھغ عتہمععمر کہمغ نرہمنہہن  شرنامرنہغک غ کاغرکاغمر مرمرامراین  کنارنایمان کرکنامیرن کرنکیرن رینکیمن کنایرن کیرنارین رکینارکانم رکینمانی۔', 'http://localhost/ptcl/uploads/course_content/Bridge-23544_(1)6.mp4', 'Bridge-23544_(1)6.mp4'),
(70, 21, 'Testing', 'dfahfj', 'http://localhost/ptcl/uploads/course_content/Bridge-23544_(1)8.mp4', 'Bridge-23544_(1)8.mp4'),
(71, 21, 'Hello', 'testing', 'http://localhost/ptcl/uploads/course_content/Bridge-23544_(1)9.mp4', ''),
(72, 22, 'Introdunction', 'Intro to programminf', 'http://localhost/ptcl/uploads/course_content/Bridge-23544_(1)10.mp4', 'Bridge-23544_(1)10.mp4'),
(73, 22, 'Advance Course', 'Advance course', 'http://localhost/ptcl/uploads/course_content/Bridge-23544_(1)11.mp4', 'Bridge-23544_(1)11.mp4'),
(74, 25, 'Test', 'test', 'http://localhost/school/uploads/course_content/Bridge1.mp4', 'Bridge1.mp4'),
(75, 26, 'Module', 'test', 'http://localhost/ptcl/uploads/course_content/Bridge3.mp4', 'Bridge3.mp4'),
(76, 10, 'Ayeen', 'test', 'http://localhost/ptcl/uploads/course_content/SampleVideo_1280x720_1mb.mp4', 'SampleVideo_1280x720_1mb.mp4'),
(77, 27, 'TEST', 'jfdjfajklf', 'http://localhost/ptcl/uploads/course_content/SampleVideo_1280x720_1mb1.mp4', 'SampleVideo_1280x720_1mb1.mp4'),
(78, 28, 'First Chapter', 'Hello This is first chanper', 'http://localhost/school/uploads/course_content/Batch-05_WPS101_2.pdf', 'Batch-05_WPS101_2.pdf'),
(79, 29, 'Computer Science', 'Hello world', 'http://localhost/school/uploads/course_content/Pinata_Idle_and_Explode21.mp4', 'Pinata_Idle_and_Explode21.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `course_progres`
--

DROP TABLE IF EXISTS `course_progres`;
CREATE TABLE IF NOT EXISTS `course_progres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_progres`
--

INSERT INTO `course_progres` (`id`, `course_id`, `module_id`, `user_id`) VALUES
(1, 20, 1, 3882830);

-- --------------------------------------------------------

--
-- Table structure for table `course_users`
--

DROP TABLE IF EXISTS `course_users`;
CREATE TABLE IF NOT EXISTS `course_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_users`
--

INSERT INTO `course_users` (`id`, `course_id`, `user_id`, `status`) VALUES
(16, 2, 3882830, 0),
(13, 22, 1212, 0),
(14, 22, 80837, 0),
(15, 22, 80977, 0),
(12, 22, 3882830, 0),
(17, 2, 1212, 0),
(18, 2, 323, 0),
(19, 2, 80837, 0),
(20, 2, 80977, 0),
(76, 20, 80837, 0),
(78, 20, 3882830, 0),
(77, 20, 80977, 0),
(24, 16, 3882830, 0),
(25, 16, 80837, 0),
(26, 16, 80977, 0),
(27, 24, 3882830, 0),
(28, 24, 1212, 0),
(32, 25, 1212, 0),
(31, 25, 2, 0),
(33, 26, 80837, 0),
(34, 26, 2, 0),
(42, 10, 3882830, 0),
(41, 10, 15497, 0),
(40, 10, 90000, 0),
(39, 10, 2, 0),
(54, 19, 3882830, 0),
(53, 19, 15497, 0),
(52, 19, 90000, 0),
(51, 19, 80837, 0),
(58, 21, 3882830, 0),
(57, 21, 15497, 0),
(56, 21, 90000, 0),
(55, 21, 80837, 0),
(80, 27, 80837, 0),
(81, 27, 90000, 0),
(82, 27, 15497, 0),
(83, 27, 3882830, 0),
(79, 20, 764349, 0),
(84, 28, 80837, 0),
(85, 28, 80977, 0),
(86, 28, 90000, 0),
(87, 29, 15497, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `epi` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `class` text,
  `fcm_token` text,
  `profile_picture` text,
  `filename` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `epi`, `name`, `email_id`, `phone_no`, `user_type`, `class`, `fcm_token`, `profile_picture`, `filename`, `status`, `created_date`) VALUES
(2, 0, 'Ayeen M Khan', 'admin@gmail.com', '38382098', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 'http://localhost/ptcl/uploads/profile_pic/Ayeen_passport.jpg', 'Ayeen_passport.jpg', 1, '2019-08-23 13:27:39'),
(10, 80837, 'Sadia', 'sadia@pixelartga.com', '993939', NULL, '2', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 1, '2019-08-23 13:27:39'),
(11, 80977, 'Marukh', 'marukh@pixelartga.com', '9038829', NULL, '2', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 1, '2019-08-23 13:27:39'),
(12, 90000, 'Anjum', 'anjum@he.com', '92833829', NULL, '2', 'e10adc3949ba59abbe56e057f20f883e', 'http://localhost/uploads/e1634ec829445ccfeaedb8e3b5b0a661.jpg', NULL, 1, '2019-08-23 13:27:39'),
(13, 15497, 'Ayeen', 'ayeenmuhammad@gmail.com', '217727281', NULL, '3', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 1, '2019-08-23 13:27:39'),
(14, 3882830, 'Uzair Hassan', 'uzari@gmail.com', '212892921', NULL, '4', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6InV6YWlyIiwiaWQiOjksImlhdCI6MTU2Njg5MDk0MiwiZXhwIjoxNTY2OTY2NTQyfQ.CBsNb03254PdPoghLVyrdXVeA-YD7IXBy7OOvRa3ET4', NULL, NULL, 1, '2019-08-23 13:27:39'),
(18, 764349, 'Bisma Zia', 'bisama@live.com', '2324353535', NULL, '4', NULL, NULL, NULL, 1, '2019-08-28 12:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `module_logs`
--

DROP TABLE IF EXISTS `module_logs`;
CREATE TABLE IF NOT EXISTS `module_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` text,
  `module_id` text,
  `is_viewed` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module_logs`
--

INSERT INTO `module_logs` (`id`, `user_id`, `module_id`, `is_viewed`) VALUES
(1, '12121', '5', 1),
(2, '1222', '4', 1),
(3, '12121', '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students_questions`
--

DROP TABLE IF EXISTS `students_questions`;
CREATE TABLE IF NOT EXISTS `students_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(200) DEFAULT NULL,
  `no_like` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_questions`
--

INSERT INTO `students_questions` (`id`, `question`, `no_like`, `user_id`, `course_id`, `class`, `status`) VALUES
(1, 'What is PTCL?', 1, 15497, 19, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_likes`
--

DROP TABLE IF EXISTS `student_likes`;
CREATE TABLE IF NOT EXISTS `student_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `is_like` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_likes`
--

INSERT INTO `student_likes` (`id`, `user_id`, `question_id`, `is_like`) VALUES
(9, 15497, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `fcm_token` text,
  `last_login` text,
  `rainbow` text,
  `attempts` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `username`, `password`, `user_type`, `fcm_token`, `last_login`, `rainbow`, `attempts`) VALUES
(1, 2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, '2019-08-26 12:28:16', '123456', NULL),
(9, 3882830, 'uzair', 'e10adc3949ba59abbe56e057f20f883e', 2, NULL, '2019-8-28 17:59:31', '123456', NULL),
(11, 18, '123456', '827ccb0eea8a706c4c34a16891f84e7b', 2, NULL, '2019-8-31 12:13:7', '123456', NULL),
(21, 15497, 'ayeen', 'e10adc3949ba59abbe56e057f20f883e', 3, NULL, NULL, 'Askayeen563', NULL),
(22, 12, 'admin', '73f92847a8e71a633e884f7fd23f6b85', 3, NULL, NULL, 'Aayeen89dadad', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

DROP TABLE IF EXISTS `user_logs`;
CREATE TABLE IF NOT EXISTS `user_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
