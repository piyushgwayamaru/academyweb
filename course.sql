-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 06:54 PM
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

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `fullname`, `email`, `message`, `mark_as_read`) VALUES
(17, 'Piyush Gwayamaru', 'shresthapiyush6@gmail.com', 'I need a php coursess freely.', ''),
(18, 'Piyush Gwayamaru', 'shresthapiyush6@gmail.com', 'I need a php coursess freely.', '');

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
(56, 1, 'Course-Name-7701.png', 'CSS', 'english', 'embark kasdfasdfads', 'video-65deeaa0670ef2.51334984.mp4', 'Yes', 1500, 0, 0, '2024-02-29 04:50:30', 6),
(57, 6, 'Course-Name-4611.png', 'C Programming', 'english', 'C programming ', 'video-65df1bfd57a0e1.24725569.mp4', 'Yes', 2000, 0, 2, '2024-02-29 01:44:06', 6),
(60, 1, 'Course-Name-5024.png', 'JavaScript Course Beginners', 'english', 'Course Description: Are you eager to dive into the world of web development? JavaScript is an essential tool for anyone looking to build dynamic, interactive websites and web applications. This beginner-level course is designed to provide you with a solid foundation in JavaScript programming, regardless of your prior experience with coding.', 'video-65e0016cb36bb5.91855889.mp4', 'Yes', 2000, 0, 13, '2024-02-29 04:00:44', 6);

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
(8, 'teacher', 'teacher@gmail.com', '8d788385431273d11e8b43bb78f3aa41');

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
('bYSwkSSgId', 54, 60, 0, 'nabraj', '', 2147483647, '', 1, 'nabraj@gmail.com', '2024-02-29 04:09:59'),
('criioHmQ7L', 55, 60, 0, 'piyush', '', 2147483647, '', 1, 'piyush@gmail.com', '2024-02-29 04:57:50');

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
(44, 56, 'CSS Day 1', 'Yes'),
(45, 56, 'CSS Day 2', 'Yes'),
(50, 60, 'Introduction', 'Yes'),
(51, 60, 'Conditionals', 'Yes');

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
(28, 'Piyush', 'course review', 3, '2024-02-29', 56);

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
(26, 44, 'day 1', 'video-65df38481be054.64356636.mp4', 'Yes', '00:03:38', 'pdf-65df38472d7bd1.64597477.pdf'),
(27, 44, 'day 2', 'video-65df4391d75254.59761444.mp4', 'Yes', '00:00:28', 'pdf-65df4391af4778.14001832.pdf'),
(28, 45, 'css margin', 'video-65df43e3e43f73.05403949.mp4', 'Yes', '00:03:38', 'pdf-65df43e3d5c899.77672314.pdf'),
(29, 45, 'css background', 'video-65df43f85fd1b0.12146130.mp4', 'Yes', '00:00:28', 'pdf-65df43f84f20e5.95782476.pdf'),
(38, 50, 'Introduction + Setup', 'video-65e001e161a497.32927735.mp4', 'Yes', '00:13:45', 'pdf-65e001e090d1e7.16477631.pdf'),
(39, 50, 'Variables in JavaScript ', 'video-65e0021773f479.29916393.mp4', 'Yes', '00:13:33', 'pdf-65e00217614af6.81096062.pdf'),
(40, 50, 'const, let and var ', 'video-65e0025136c513.29621131.mp4', 'Yes', '00:12:57', 'pdf-65e00251256d75.08312755.pdf'),
(41, 51, 'Conditional expressions', 'video-65e002a326f191.42194626.mp4', 'Yes', '00:20:58', 'pdf-65e002a31034d7.62435422.pdf'),
(42, 51, 'For Loop', 'video-65e002eea51182.91506097.mp4', 'Yes', '00:19:39', 'pdf-65e002ee92a5e7.88487976.pdf'),
(43, 51, 'While Loop', 'video-65e0030418b1f5.64254429.mp4', 'Yes', '00:11:07', 'pdf-65e00304080e18.47280742.pdf');

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
(29, 'piyush', 'piyush@gmail.com', '86f500cd7b7d38e5d4ae6cde3920f589');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_courseorder`
--
ALTER TABLE `tbl_courseorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_educator`
--
ALTER TABLE `tbl_educator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_enroll`
--
ALTER TABLE `tbl_enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_sublesson`
--
ALTER TABLE `tbl_sublesson`
  MODIFY `sublesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
