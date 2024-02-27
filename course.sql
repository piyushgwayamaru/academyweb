-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 12:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'Admin Kumar', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `course_desc` text NOT NULL,
  `course_author` varchar(255) NOT NULL,
  `course_img` text NOT NULL,
  `course_duration` text NOT NULL,
  `course_price` int(11) NOT NULL,
  `course_original_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_img`, `course_duration`, `course_price`, `course_original_price`) VALUES
(8, 'Learn Guitar The Easy Wayy', 'This course is your \"Free Pass\" to playing guitar. It is the most direct and to the point complete online guitar course.', 'Adil', '../image/courseimg/Guitar.jpg', '3 Hours', 1655, 1800),
(9, 'Complete PHP Bootcamp', 'This course will help you get all the Object Oriented PHP, MYSQLi and ending the course by building a CMS system.', 'Rajesh Kumar', '../image/courseimg/php.jpg', '3 Months', 700, 1700),
(10, 'Learn Python A-Z', 'This is the most comprehensive, yet straight-forward, course for the Python programming language.', 'Rahul Kumar', '../image/courseimg/Python.jpg', '4 Months', 800, 1800),
(11, 'Hands-on Artificial Intelligence', 'Learn and Master how AI works and how it is changing our lives in this Course.\r\nlives in this Course.', 'Jay Veeru', '../image/courseimg/ai.jpg', '6 Months', 900, 1900),
(12, 'Learn Vue JS', 'The skills you will learn from this course is applicable to the real world, so you can go ahead and build similar app.', 'Jay Shukla', '../image/courseimg/vue.jpg', '2 Months', 100, 1000),
(13, 'Angular JS', 'Angular is one of the most popular frameworks for building client apps with HTML, CSS and TypeScript.', 'Sonam Gupta', '../image/courseimg/angular.jpg', '4 Month', 800, 1600),
(16, 'Python Complete', 'This is complete Python COurse', 'RK', '../image/courseimg/Python.jpg', '4 hours', 500, 4000),
(17, 'Learn React Native', 'THis is react native for android and iso app development', 'GeekyShows', '../image/courseimg/Machine.jpg', '2 months', 200, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `co_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `respmsg` text NOT NULL,
  `amount` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`co_id`, `order_id`, `stu_email`, `course_id`, `status`, `respmsg`, `amount`, `order_date`) VALUES
(10, 'ORDS59885531', 'sonam@gmail.com', 10, 'TXN_SUCCESS', 'Txn Success', 800, '2020-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` text NOT NULL,
  `lesson_desc` text NOT NULL,
  `lesson_link` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`) VALUES
(32, 'Introduction to Python ', 'Introduction to Python Desc', '../lessonvid/video2.mp4', 10, 'Learn Python A-Z'),
(33, 'How Python Works', 'How Python Works Descc', '../lessonvid/video3.mp4', 10, 'Learn Python A-Z'),
(34, 'Why Python is powerful', 'Why Python is powerful Desc', '../lessonvid/video9.mp4', 10, 'Learn Python A-Z'),
(35, 'Everyone should learn Python ', 'Everyone should learn Python  Desccc', '../lessonvid/video1.mp4', 10, 'Learn Python A-Z'),
(36, 'Introduction to PHP', 'Introduction to PHP Desc', '../lessonvid/video4.mp4', 9, 'Complete PHP Bootcamp'),
(37, 'How PHP works', 'How PHP works Desc', '../lessonvid/video5.mp4', 9, 'Complete PHP Bootcamp'),
(38, 'is PHP really easy ?', 'is PHP really easy ? desc', '../lessonvid/video6.mp4', 9, 'Complete PHP Bootcamp'),
(39, 'Introduction to Guitar44', 'Introduction to Guitar desc1', '../lessonvid/video7.mp4', 8, 'Learn Guitar The Easy Way'),
(40, 'Type of Guitar', 'Type of Guitar Desc2', '../lessonvid/video8.mp4', 8, 'Learn Guitar The Easy Way'),
(41, 'Intro Hands-on Artificial Intelligence', 'Intro Hands-on Artificial Intelligence desc', '../lessonvid/video10.mp4', 11, 'Hands-on Artificial Intelligence'),
(42, 'How it works', 'How it works descccccc', '../lessonvid/video11.mp4', 11, 'Hands-on Artificial Intelligence'),
(43, 'Inro Learn Vue JS', 'Inro Learn Vue JS desc', '../lessonvid/video12.mp4', 12, 'Learn Vue JS'),
(44, 'intro Angular JS', 'intro Angular JS desc', '../lessonvid/video13.mp4', 13, 'Angular JS'),
(48, 'Intro to Python Complete', 'This is lesson number 1', '../lessonvid/video11.mp4', 16, 'Python Complete'),
(49, 'Introduction to React Native', 'This intro video of React native', '../lessonvid/video11.mp4', 17, 'Learn React Native');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `stu_pass` varchar(255) NOT NULL,
  `stu_occ` varchar(255) NOT NULL,
  `stu_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `stu_occ`, `stu_img`) VALUES
(171, 'Captain Marvel', 'cap@example.com', '123456', ' Web Designer', '../image/stu/student2.jpg'),
(172, 'Ant Man', 'ant@example.com', '123456', ' Web Developer', '../image/stu/student4.jpg'),
(173, ' Dr Strange', 'doc@example.com', '123456', ' Web Developer', '../image/stu/student1.jpg'),
(174, 'Scarlet Witch', 'witch@example.com', '123456', 'Web Designer', '../image/stu/student3.jpg'),
(176, ' Shaktiman', 'shaktiman@ischool.com', '123456', 'Software ENgg', '../image/stu/shaktiman.jpg'),
(178, ' Mario', 'mario@ischool.com', '1234567', ' Web Dev', '../image/stu/super-mario-2690254_1280.jpg'),
(182, ' sonam', 'sonam@gmail.com', '123456', ' Web Dev', '../image/stu/student2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `username`, `password`) VALUES
(6, 'testadmin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(7, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `active` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `active`) VALUES
(1, 'Web Development', 'Yes'),
(3, 'Game Development', 'Yes'),
(4, 'Data Science', 'Yes'),
(5, 'Game Development', 'Yes'),
(6, 'Programming Language', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `fullname`, `email`, `phone`, `message`) VALUES
(17, 'Piyush Gwayamaru', 'shresthapiyush6@gmail.com', '9800000000', 'I need a php coursess freely.'),
(18, 'Piyush Gwayamaru', 'shresthapiyush6@gmail.com', '9800000000', 'I need a php coursess freely.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `instructor` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `language` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `preview_video` varchar(250) NOT NULL,
  `active` varchar(100) NOT NULL,
  `duration` int(155) NOT NULL,
  `price` int(255) NOT NULL,
  `ratings` float NOT NULL,
  `reviews_number` int(11) NOT NULL,
  `discount` float NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `educator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_educator`
--

CREATE TABLE `tbl_educator` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_educator`
--

INSERT INTO `tbl_educator` (`id`, `name`, `email`, `password`) VALUES
(2, 'piyush', 'shresthpiyusha@gmail.com', '86f500cd7b7d38e5d4ae6cde3920f589'),
(5, 'Test', 'test@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e'),
(6, 'educator', 'educator@gmail.com', 'ae3a8f55b3ddd9466c9866bc2261e22e'),
(7, 'sam', 'sam@gmail.com', '332532dcfaa1cbf61e2a266bd723612c');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enroll`
--

CREATE TABLE `tbl_enroll` (
  `order_id` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `course_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_enroll`
--

INSERT INTO `tbl_enroll` (`order_id`, `id`, `email`, `course_id`, `order_date`, `amount`, `name`, `address`, `phone`, `gender`, `course`, `status`) VALUES
('', 19, 'ram@gmail.com', 34, NULL, 0, 'ram', '', 1234567890, '', '34', 0),
('', 20, 'ram@gmail.com', 34, NULL, 0, 'ram', '', 1234567890, '', '34', 0),
('GtSRrjgFUG', 21, 'ram@gmail.com', 34, NULL, 0, 'ram', '', 1234567890, '', '34', 0),
('iMuteHSuMx', 22, 'ram@gmail.com', 34, NULL, 0, 'ram', '', 1234567890, '', '34', 0),
('75aKdFf77Y', 23, 'ram@gmail.com', 34, NULL, 0, 'ram', '', 1234567890, '', '34', 0),
('3x5I0u3rOr', 24, 'ram@gmail.com', 34, NULL, 0, 'ram', '', 1234567890, '', '34', 0),
('iYo0I6QuFq', 25, 'ram@gmail.com', 27, NULL, 0, 'ram', '', 1234567890, '', '27', 1),
('abT42KNvW7', 26, 'ram@gmail.com', 27, NULL, 0, 'ram', '', 1234567890, '', '27', 0),
('8iVdTe9qSD', 27, 'ram@gmail.com', 34, NULL, 0, 'ram', '', 1234567890, '', '34', 0),
('RLntbmA35f', 28, 'ram@gmail.com', 27, NULL, 0, 'ram', '', 1234567890, '', '27', 1),
('PqBGNdefn0', 29, 'ram@gmail.com', 27, NULL, 0, 'ram', '', 1234567890, '', '27', 1),
('vyALAShEMZ', 30, 'ram@gmail.com', 27, NULL, 0, 'ram', '', 1234567890, '', '27', 1),
('ItTIf0AjYH', 31, 'ram@gmail.com', 27, NULL, 0, 'ram', '', 1234567890, '', '27', 1),
('yTYwASFXVL', 32, 'ram@gmail.com', 27, NULL, 0, 'ram', '', 1234567890, '', '27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `f_id` int(11) NOT NULL,
  `f_content` text NOT NULL,
  `stu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`f_id`, `f_content`, `stu_id`) VALUES
(10, 'I am GOD ', 174);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instructor_enroll`
--

CREATE TABLE `tbl_instructor_enroll` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `cv` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lesson`
--

CREATE TABLE `tbl_lesson` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `lesson_name` varchar(200) NOT NULL,
  `active` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lesson`
--

INSERT INTO `tbl_lesson` (`id`, `course_id`, `lesson_name`, `active`) VALUES
(18, 27, 'day 4', 'Yes'),
(23, 27, 'Day 6 of mern', 'Yes'),
(25, 34, 'Unreal Engine 5.3 Beginner Tutorial', 'Yes'),
(26, 34, 'Unreal Engine Full Architecture', 'Yes'),
(30, 27, 'day 5', 'Yes'),
(31, 27, 'day 4', 'Yes'),
(32, 36, 'mern day 1', 'Yes'),
(33, 37, 'CSS Day 1', 'Yes'),
(34, 40, 'HTML Introduction', 'Yes'),
(35, 40, 'HTML forms', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sublesson`
--

CREATE TABLE `tbl_sublesson` (
  `sublesson_id` int(11) NOT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `sublesson_name` varchar(255) DEFAULT NULL,
  `sublesson_video` varchar(255) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL,
  `duration` varchar(255) NOT NULL,
  `pdf_notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sublesson`
--

INSERT INTO `tbl_sublesson` (`sublesson_id`, `lesson_id`, `sublesson_name`, `sublesson_video`, `active`, `duration`, `pdf_notes`) VALUES
(1, 18, 'day 4 ddd', '', 'Yes', '20', ''),
(5, 18, 'god 1', 'video-65dc5f47dcf317.99934067.mp4', 'Yes', '19:00', ''),
(6, 23, 'abc', 'video-65dc6583345e92.39396306.mp4', 'Yes', '20', ''),
(7, 23, 'mern day 2', '', 'Yes', '20', ''),
(8, 32, 'day 1', 'video-65dc6c34429193.66533724.mp4', 'Yes', '10:00', ''),
(9, 32, 'day 2', 'video-65dc6c55648af7.39294050.mp4', 'Yes', '10:00', ''),
(10, 33, 'day 1', 'video-65dd820a4b3032.50608982.mp4', 'Yes', '10:00', ''),
(11, 33, 'day 2', 'video-65dd821ed6e129.00426963.mp4', 'Yes', '10:00', ''),
(12, 34, 'HTML Basics', 'video-65dda8553d4869.38796994.mp4', 'Yes', '00:12:00', ''),
(13, 35, 'HTML Form Elements', 'video-65dda8c23e4c90.73627715.mp4', 'Yes', '00:10:00', ''),
(14, 35, 'HTML Form Action', 'video-65dda9105f17d4.75242436.mp4', 'Yes', '00:13:12', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`) VALUES
(14, 'John ', 'Doe', '72f4e9f3f57a5d7a8d80fa0abcee0bfc'),
(15, 'doe john', 'doejohn@gmai.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(16, 'kp oli', 'kpoli@gmail.com', '0e29eb89bbac6334777ef15e9e7e3d08'),
(17, 'piyush shrestha', 'shresthapiyush999@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(23, 'deepesh', 'deepesh@gmail.com', 'aa6d49d134cbee8e0e7b0b9c5e00e53c'),
(24, 'rashik', 'rashik@gmail.com', '208de955049ca712e6d9fd56aba3989f'),
(25, 'nabraj', 'nabraj@gmail.com', '95e2d32fd6452835b8b7a010757af6cb'),
(26, 'educator', 'educator@gmail.com', 'ae3a8f55b3ddd9466c9866bc2261e22e'),
(27, 'ram', 'ram@gmail.com', '4641999a7679fcaef2df0e26d11e3c72'),
(28, 'sohan basnet', 'sohan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`co_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `fk_tbl_course_educator` (`educator_id`);

--
-- Indexes for table `tbl_educator`
--
ALTER TABLE `tbl_educator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_enroll`
--
ALTER TABLE `tbl_enroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tbl_instructor_enroll`
--
ALTER TABLE `tbl_instructor_enroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sublesson`
--
ALTER TABLE `tbl_sublesson`
  ADD PRIMARY KEY (`sublesson_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_educator`
--
ALTER TABLE `tbl_educator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_enroll`
--
ALTER TABLE `tbl_enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_instructor_enroll`
--
ALTER TABLE `tbl_instructor_enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_sublesson`
--
ALTER TABLE `tbl_sublesson`
  MODIFY `sublesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD CONSTRAINT `fk_tbl_course_educator` FOREIGN KEY (`educator_id`) REFERENCES `tbl_educator` (`id`),
  ADD CONSTRAINT `tbl_course_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
