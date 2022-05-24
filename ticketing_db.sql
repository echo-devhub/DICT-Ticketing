-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 02:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `agent_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(150) NOT NULL,
  `user_role` enum('Agent','Administrator') NOT NULL,
  `photo` text DEFAULT NULL,
  `pwd` varchar(300) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `joined_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`agent_id`, `first_name`, `last_name`, `email_address`, `user_role`, `photo`, `pwd`, `is_active`, `joined_at`) VALUES
(45, 'Jericko', 'Rubio', 'jerickorubiodev@gmail.com', 'Administrator', 'DICT_6289deb271d3c5.21009728.jpg', 'jerickorubiodev', 0, '2022-05-21 15:02:42'),
(62, 'Jericko', 'Rubio', 'jerickorubioOfficial@gmail.com', 'Agent', 'DICT_628b2c9d178915.37530143.jpg', '90hj9nUH', 0, '2022-05-22 19:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `text_chat` text DEFAULT '0',
  `image_chat` text DEFAULT '0',
  `send_date` datetime DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0,
  `ticket_number` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email_address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `full_name`, `email_address`) VALUES
(70, 'Jericko Rubio', 'jerickorubiodev@gmail.com'),
(71, 'John doe canada', 'jerickorubioOfficial@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `ticket_number` varchar(6) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` text DEFAULT '0',
  `status_id` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `customer_id` int(11) NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `priority_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `ticket_number`, `category_id`, `description`, `photo`, `status_id`, `create_at`, `updated_at`, `customer_id`, `agent_id`, `priority_id`) VALUES
(63, '251633', 18, 'Please help me with my Computer.', '0', 4, '2022-05-22 19:54:44', '2022-05-22 22:48:09', 70, 62, 2),
(64, '503133', 19, 'dadasd', '0', 1, '2022-05-22 23:12:44', NULL, 71, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_categories`
--

CREATE TABLE `ticket_categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_categories`
--

INSERT INTO `ticket_categories` (`category_id`, `category`) VALUES
(15, 'Hardware'),
(17, 'Software'),
(18, 'Maintenances'),
(19, 'Wirings'),
(21, 'Networks'),
(24, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_priorities`
--

CREATE TABLE `ticket_priorities` (
  `priority_id` int(11) NOT NULL,
  `priority` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_priorities`
--

INSERT INTO `ticket_priorities` (`priority_id`, `priority`, `description`) VALUES
(1, 'Low', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt ipsa earum suscipit ad blanditiis a tempora at Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint obcaecati'),
(2, 'Medium', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt ipsa earum suscipit ad blanditiis a tempora at Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint obcaecati'),
(3, 'High', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt ipsa earum suscipit ad blanditiis a tempora at Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint obcaecati'),
(4, 'Urgent', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt ipsa earum suscipit ad blanditiis a tempora at Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint obcaecati');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_statuses`
--

CREATE TABLE `ticket_statuses` (
  `status_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_statuses`
--

INSERT INTO `ticket_statuses` (`status_id`, `status`, `description`) VALUES
(1, 'Open', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel vitae suscipit veniam amet, doloribus neque dolore voluptatum similique, alias velit illum! Incidunt, velit. Inventore eius dicta ut fugit aspernatur soluta, provident sequi cum sapiente corrupti veniam, alias maiores animi! Harum!'),
(2, 'Pending', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel vitae suscipit veniam amet, doloribus neque dolore voluptatum similique, alias velit illum! Incidunt, velit. Inventore eius dicta ut fugit aspernatur soluta, provident sequi cum sapiente corrupti veniam, alias maiores animi! Harum!'),
(3, 'Resolved', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel vitae suscipit veniam amet, doloribus neque dolore voluptatum similique, alias velit illum! Incidunt, velit. Inventore eius dicta ut fugit aspernatur soluta, provident sequi cum sapiente corrupti veniam, alias maiores animi! Harum!'),
(4, 'Closed', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel vitae suscipit veniam amet, doloribus neque dolore voluptatum similique, alias velit illum! Incidunt, velit. Inventore eius dicta ut fugit aspernatur soluta, provident sequi cum sapiente corrupti veniam, alias maiores animi! Harum!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`agent_id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `fk_ticket_status` (`status_id`),
  ADD KEY `fk_ticket_category` (`category_id`),
  ADD KEY `fk_ticket_priority` (`priority_id`);

--
-- Indexes for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  ADD PRIMARY KEY (`priority_id`);

--
-- Indexes for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  MODIFY `priority_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_priority` FOREIGN KEY (`priority_id`) REFERENCES `ticket_priorities` (`priority_id`),
  ADD CONSTRAINT `fk_ticket_category` FOREIGN KEY (`category_id`) REFERENCES `ticket_categories` (`category_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_ticket_priority` FOREIGN KEY (`priority_id`) REFERENCES `ticket_priorities` (`priority_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_ticket_status` FOREIGN KEY (`status_id`) REFERENCES `ticket_statuses` (`status_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
