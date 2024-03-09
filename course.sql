-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 02:45 PM
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
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `password`, `username`) VALUES
(1, 'admin', 'admin', 'admin'),
(6, 'testadmin', '21232f297a57a5a743894a0e4a801fc3', ''),
(11, 'piyush', '86f500cd7b7d38e5d4ae6cde3920f589', 'piyush');

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
(6, 'Programming Language', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `mark_as_read` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `language` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `preview_video` varchar(250) NOT NULL,
  `active` varchar(100) NOT NULL,
  `price` int(255) NOT NULL,
  `ratings` float NOT NULL,
  `discount` float NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `educator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `category_id`, `image`, `title`, `language`, `description`, `preview_video`, `active`, `price`, `ratings`, `discount`, `updatedAt`, `educator_id`) VALUES
(62, 1, 'Course-Name-4808.png', 'CSS for Begineers', 'english', 'Dive into the world of web design with our CSS course, tailored to teach you how to style and visually organize HTML content', 'video-65e92dd3408493.66432709.mp4', 'No', 1200, 0, 17, '2024-03-07 03:00:35', 6),
(63, 1, 'Course-Name-579.jpg', 'HTML', 'english', 'Embark on your web developement journey with our comprehensive HMTL course, the foundational building block for creating web content.', 'video-65e93122248b06.47050990.mp4', 'Yes', 1800, 0, 13, '2024-03-07 05:07:03', 6),
(64, 1, 'Course-Name-7127.png', 'JavaScript', 'english', 'Unlock the dynamic and interactive elements of web development with out JavaScript course. From basic syntax and data structures to the Document Object Model manipulation, and event handling.', 'video-65e932ad51bb45.89911722.mp4', 'Yes', 2100, 0, 20, '2024-03-07 07:35:44', 6),
(65, 6, 'Course-Name-3296.png', 'C++ Course', 'english', 'Step into the world of programming with our C++ course, designed to introduce you o both procedural and object oriented programming paradigms. Learn to write efficient code with a deep dive into variables. control glow, functions and data structures, progressing to complex c concepts like inheritance, polymorphism, and templates t', 'video-65e93368526867.86221914.mp4', 'No', 3000, 0, 25, '2024-03-07 05:02:38', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courseorder`
--

CREATE TABLE `tbl_courseorder` (
  `order_id` int(11) NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
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
(7, 'sam', 'sam@gmail.com', '332532dcfaa1cbf61e2a266bd723612c'),
(8, 'teacher', 'teacher@gmail.com', '8d788385431273d11e8b43bb78f3aa41'),
(9, 'Rajesh Hamal', 'rajesh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enroll`
--

CREATE TABLE `tbl_enroll` (
  `order_id` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_enroll`
--

INSERT INTO `tbl_enroll` (`order_id`, `id`, `course_id`, `amount`, `name`, `address`, `phone`, `gender`, `status`, `email`, `order_date`) VALUES
('dlHCbSEh9s', 62, 63, 0, 'nabraj', '', 0, '', 1, 'nabraj@gmail.com', '2024-03-07 07:09:35'),
('pLA1HXA3uS', 70, 64, 0, 'nabraj', '', 2147483647, '', 1, 'nabraj@gmail.com', '2024-03-09 13:36:11');

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
(53, 62, 'Day 1: CSS Foundation', 'Yes'),
(54, 62, 'Day 2: Layout Techniques', 'Yes'),
(55, 62, 'Day 3: Styling Essentials and Responsive Desgin', 'Yes'),
(56, 62, 'Day 5: Advanced CSS features', 'Yes'),
(57, 62, 'Day 5: Responsive Design and Best Practices', 'Yes'),
(58, 63, 'Day 1: Introduction to HTML and Basic Structure', 'Yes'),
(59, 63, 'Day 2: Organizing Content and Structure', 'Yes'),
(60, 63, 'Day 3: HTML forms and User Inputs', 'Yes'),
(61, 63, 'Day 4: Embedding the Media and Interactive Elements', 'Yes'),
(62, 63, 'Day 5: Advanced HTML5 features', 'Yes'),
(63, 64, 'Day 1: JavaScript Basics', 'Yes'),
(64, 64, 'Day 2: Functions and Objects', 'Yes'),
(65, 64, 'Day 3: DOM Manipulation', 'Yes'),
(66, 64, 'Day 4: Advanced JS Concepts', 'Yes'),
(67, 64, 'Day 5: JS in Real World', 'Yes'),
(68, 65, 'Day 1: Introduction to C++ and Setup', 'Yes'),
(69, 65, 'Day 2: Fundamental Concepts ', ''),
(70, 65, 'Day 3: Object Oriented Programming in C++', 'Yes'),
(71, 65, 'Day 4: Advanced C++ Features', 'Yes'),
(72, 65, 'Day 5: Data Structures and Algorithms', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `review_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_review` varchar(255) NOT NULL,
  `rating_data` int(11) NOT NULL,
  `datetime` date NOT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`review_id`, `user_name`, `user_review`, `rating_data`, `datetime`, `course_id`) VALUES
(23, 'Piyush', 'ddfsaf', 3, '2024-02-28', 57),
(24, 'asdf', 'qer', 2, '2024-02-28', 56),
(25, 'John', 'I have gone through all the courses. I have known alot.', 4, '2024-02-28', 56),
(26, 'dfdf', 'q23easd', 1, '2024-02-28', 56),
(27, 'Nabraj', 'Excellent course.', 4, '2024-02-29', 59),
(28, 'Piyush', 'course review', 3, '2024-02-29', 56),
(29, 'Piyush', 'good', 5, '2024-03-07', 63),
(30, 'asdfasdfasdf', 'dfgh', 4, '2024-03-07', 63),
(31, 'kriti', 'fantastic', 4, '2024-03-07', 63);

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
(52, 53, 'Selectors in CSS', 'video-65e92f9116b754.10141726.mp4', 'Yes', '00:22:39', ''),
(53, 53, 'Colors in CSS', 'video-65e92fb8258960.07493057.mp4', 'Yes', '00:12:39', ''),
(55, 54, 'Units in CSS', 'video-65e930251a0836.84947247.mp4', 'Yes', '00:18:44', ''),
(56, 55, 'CSS Box Models', 'video-65e93048f22063.29662311.mp4', 'Yes', '00:12:20', ''),
(57, 55, 'Text and Font Properties', 'video-65e9305c21d460.16385896.mp4', 'Yes', '00:21:14', ''),
(58, 56, 'Position Property', 'video-65e930774885c8.67254482.mp4', 'Yes', '00:16:39', ''),
(59, 57, 'Display Property ', 'video-65e9309a790900.50724138.mp4', 'Yes', '00:17:03', ''),
(60, 57, 'Float and Clear', 'video-65e930a8320c41.79370646.mp4', 'Yes', '00:26:19', ''),
(61, 58, 'Introduction to HTML', 'video-65e9434dc2bce6.42560141.mp4', 'Yes', '00:18:26', ''),
(62, 58, 'Installing VS Code and Live Server', 'video-65e9436c0934f6.43419809.mp4', 'Yes', '00:17:49', ''),
(63, 59, 'Basic Structure of a Website', 'video-65e9439c3fcd23.05485571.mp4', 'Yes', '00:11:45', ''),
(65, 60, 'Title, Script, Link and Meta Data', 'video-65e943fc1b4f95.37219254.mp4', 'Yes', '00:08:48', ''),
(66, 61, 'Img and Anchor Tags', 'video-65e944131b00e5.25354172.mp4', 'Yes', '00:14:38', ''),
(67, 62, 'Heading & Paragraphs', 'video-65e9443602d455.49782284.mp4', 'Yes', '00:13:31', ''),
(68, 62, 'Lists and Tables', 'video-65e94447e368c4.14473538.mp4', 'Yes', '00:09:57', ''),
(69, 63, 'Introduction', 'video-65e94567a292f1.64044492.mp4', 'Yes', '00:13:45', ''),
(70, 63, 'Variables in JS', 'video-65e94576b527e8.92629160.mp4', 'Yes', '00:13:33', ''),
(71, 64, 'Const, Let and Var in JS', 'video-65e94592199dd7.08025228.mp4', 'Yes', '00:12:57', ''),
(72, 64, 'Pimitives and Objects', 'video-65e945a2d98150.03889753.mp4', 'Yes', '00:11:31', ''),
(73, 65, 'Operators and Expressions', 'video-65e945bd8f18e5.19441307.mp4', 'Yes', '00:23:25', ''),
(74, 65, 'Conditional Expressions', 'video-65e945d0b35d78.48526215.mp4', 'Yes', '00:20:58', ''),
(75, 66, 'For Loops', 'video-65e946128c9082.44677162.mp4', 'Yes', '00:19:39', ''),
(76, 66, 'While Loops', 'video-65e94634c89ff4.77358905.mp4', 'Yes', '00:11:07', ''),
(77, 67, 'Chapter 2', 'video-65e9466d415f06.89123039.mp4', 'Yes', '00:14:04', ''),
(78, 67, 'Chapter 1', 'video-65e94694d8c2f3.66001100.mp4', 'Yes', '00:12:24', ''),
(79, 68, 'Introduction', 'video-65e94934b54f74.75881586.mp4', 'Yes', '00:22:21', ''),
(80, 68, 'Basic Structure of C++ Program', 'video-65e9494abca127.05558909.mp4', 'Yes', '00:19:08', ''),
(81, 69, 'Variables and Comments', 'video-65e9495ecf0867.04321240.mp4', 'Yes', '00:15:44', ''),
(82, 69, 'Variable Scope & Data types', 'video-65e94978e70a01.49774486.mp4', 'Yes', '00:28:32', ''),
(83, 70, 'Basic Input Output', 'video-65e949959a07e6.53813217.mp4', 'Yes', '00:16:10', ''),
(84, 70, 'Header files and Operators', 'video-65e949a591b1f6.72852066.mp4', 'Yes', '00:23:35', ''),
(85, 71, 'Reference Variable and TypeCasting', 'video-65e949bb3ad930.20051550.mp4', 'Yes', '00:20:16', ''),
(86, 71, 'Constants, Manipulators & Operators Precedence', 'video-65e949e5cd24e2.76694555.mp4', 'Yes', '00:16:06', ''),
(87, 71, 'C++ Control Structures', 'video-65e949f5692e71.90148372.mp4', 'Yes', '00:23:26', ''),
(88, 72, 'For While and do-while loops', 'video-65e94a1504b494.95259967.mp4', 'Yes', '00:20:34', '');

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
(28, 'sohan basnet', 'sohan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(29, 'piyush', 'piyush@gmail.com', '86f500cd7b7d38e5d4ae6cde3920f589'),
(30, 'SHRIYA', 'shriya@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(31, 'rojish', 'rojish@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(32, 'test', 'testt@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(33, 'nekesh', 'nek@gmail', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tbl_courseorder`
--
ALTER TABLE `tbl_courseorder`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_educator`
--
ALTER TABLE `tbl_educator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_enroll`
--
ALTER TABLE `tbl_enroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_enroll_course_id` (`course_id`),
  ADD KEY `fk_enroll_user_email` (`email`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lesson_course_id` (`course_id`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_constraint_name` (`course_id`);

--
-- Indexes for table `tbl_sublesson`
--
ALTER TABLE `tbl_sublesson`
  ADD PRIMARY KEY (`sublesson_id`),
  ADD KEY `fk_sublesson_lesson_id` (`lesson_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_courseorder`
--
ALTER TABLE `tbl_courseorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_educator`
--
ALTER TABLE `tbl_educator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_enroll`
--
ALTER TABLE `tbl_enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_sublesson`
--
ALTER TABLE `tbl_sublesson`
  MODIFY `sublesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD CONSTRAINT `fk_tbl_course_educator` FOREIGN KEY (`educator_id`) REFERENCES `tbl_educator` (`id`),
  ADD CONSTRAINT `tbl_course_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`);

--
-- Constraints for table `tbl_courseorder`
--
ALTER TABLE `tbl_courseorder`
  ADD CONSTRAINT `tbl_courseorder_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`id`),
  ADD CONSTRAINT `tbl_courseorder_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_enroll`
--
ALTER TABLE `tbl_enroll`
  ADD CONSTRAINT `fk_enroll_course_id` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_enroll_user_email` FOREIGN KEY (`email`) REFERENCES `tbl_user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  ADD CONSTRAINT `fk_lesson_course_id` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sublesson`
--
ALTER TABLE `tbl_sublesson`
  ADD CONSTRAINT `fk_sublesson_lesson_id` FOREIGN KEY (`lesson_id`) REFERENCES `tbl_lesson` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
