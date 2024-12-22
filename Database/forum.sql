-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 10:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(99) NOT NULL,
  `cat_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_description`) VALUES
(8, 'Programming', 'Discussions and resources about various programming languages.'),
(9, 'Web Development', 'Topics covering front-end and back-end web development.'),
(10, 'Database Management', 'All about SQL, NoSQL, and database optimization techniques.'),
(11, 'Career Development', 'Advice and tips for advancing your career in tech.'),
(12, 'Cloud Computing', 'Learn about AWS, Azure, Google Cloud, and other cloud platforms.'),
(13, 'Mobile Development', 'Focus on Android, iOS, and cross-platform app development.'),
(14, 'Artificial Intelligence', 'Explore AI, machine learning, and data science topics.'),
(15, 'Networking', 'Discussions about network security, architecture, and troubleshooting.'),
(16, 'Game Development', 'Learn and share insights about creating games and gaming engines.'),
(17, 'DevOps', 'Best practices, tools, and methodologies for DevOps and automation.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(99) NOT NULL,
  `comments_content` text NOT NULL,
  `threads_id` int(11) NOT NULL,
  `comments_by` int(11) NOT NULL,
  `comments_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comments_id`, `comments_content`, `threads_id`, `comments_by`, `comments_time`) VALUES
(112, 'This is a great thread! I love Python programming.', 187, 101, '2024-12-23 11:00:00'),
(113, 'Responsive design is essential for modern websites, great topic.', 188, 102, '2024-12-22 15:00:00'),
(114, 'Optimizing queries can drastically improve performance, thanks for the tips!', 189, 103, '2024-12-21 19:00:00'),
(115, 'Building a career in tech requires constant learning and growth, I agree with the advice here.', 190, 104, '2024-12-20 10:30:00'),
(116, 'I prefer AWS for cloud computing, but I’m still learning about Google Cloud.', 191, 105, '2024-12-19 17:00:00'),
(117, 'Android development is an exciting field, especially with Kotlin!', 192, 106, '2024-12-18 12:00:00'),
(118, 'Machine learning is the future! Looking forward to more discussions on this.', 193, 107, '2024-12-17 14:00:00'),
(119, 'Network security is crucial, especially with so many threats out there.', 194, 108, '2024-12-16 20:00:00'),
(120, 'I’ve been using Unity for game development, and it’s a great tool for beginners.', 195, 109, '2024-12-15 09:00:00'),
(121, 'DevOps tools like Docker and Kubernetes have revolutionized deployment workflows.', 196, 110, '2024-12-14 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(99) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(99) NOT NULL,
  `thread_user_id` int(99) NOT NULL,
  `thread_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `thread_time`) VALUES
(187, 'Introduction to Python Programming', 'Discussing basic syntax and concepts of Python programming.', 8, 101, '2024-12-23 10:30:00'),
(188, 'Building Responsive Websites', 'How to build websites that work across all devices using CSS and HTML.', 9, 102, '2024-12-22 14:15:00'),
(189, 'Optimizing MySQL Queries', 'Tips for improving performance in MySQL databases.', 10, 103, '2024-12-21 18:45:00'),
(190, 'Advancing Your Tech Career', 'What skills are most valuable for career progression in technology?', 11, 104, '2024-12-20 09:00:00'),
(191, 'AWS vs Google Cloud', 'A comparison between AWS and Google Cloud platforms for enterprise solutions.', 12, 105, '2024-12-19 16:20:00'),
(192, 'Starting with Android Development', 'Guides and resources to help you get started with Android app development.', 13, 106, '2024-12-18 11:10:00'),
(193, 'Introduction to Machine Learning', 'A beginner’s guide to understanding machine learning algorithms and their applications.', 14, 107, '2024-12-17 13:30:00'),
(194, 'Network Security Best Practices', 'How to protect networks from unauthorized access and vulnerabilities.', 15, 108, '2024-12-16 19:55:00'),
(195, 'Game Engines and Development', 'Exploring different game engines and tips for game development.', 16, 109, '2024-12-15 08:25:00'),
(196, 'Automation in DevOps', 'How automation tools help streamline DevOps processes and improve efficiency.', 17, 110, '2024-12-14 12:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `pass` varchar(99) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `time`) VALUES
(101, 'John Doe', 'johndoe@example.com', 'password123', '2024-12-23 10:30:00'),
(102, 'Jane Smith', 'janesmith@example.com', 'password456', '2024-12-22 14:15:00'),
(103, 'Alice Johnson', 'alice.johnson@example.com', 'password789', '2024-12-21 18:45:00'),
(104, 'Bob Brown', 'bob.brown@example.com', 'mypassword1', '2024-12-20 09:00:00'),
(105, 'Charlie Davis', 'charlie.davis@example.com', 'password@123', '2024-12-19 16:20:00'),
(106, 'Eve Wilson', 'eve.wilson@example.com', '12345password', '2024-12-18 11:10:00'),
(107, 'Frank Miller', 'frank.miller@example.com', 'secretpassword', '2024-12-17 13:30:00'),
(108, 'Grace Lee', 'grace.lee@example.com', 'password2024', '2024-12-16 19:55:00'),
(109, 'Henry Harris', 'henry.harris@example.com', 'HarrisPass@1', '2024-12-15 08:25:00'),
(110, 'Isabella Clark', 'isabella.clark@example.com', 'clarkpass321', '2024-12-14 12:45:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);
ALTER TABLE `categories` ADD FULLTEXT KEY `cat_title` (`cat_title`,`cat_description`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
