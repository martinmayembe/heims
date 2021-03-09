-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 02:32 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hei`
--

-- --------------------------------------------------------

--
-- Table structure for table `learning_programme`
--

CREATE TABLE `learning_programme` (
  `id` int(30) UNSIGNED NOT NULL,
  `prog_name` varchar(255) NOT NULL,
  `university` int(30) UNSIGNED NOT NULL,
  `date_of_submission` varchar(30) NOT NULL,
  `quarter` varchar(255) NOT NULL,
  `ZQF_level` int(2) NOT NULL,
  `prog_expert1` int(30) UNSIGNED NOT NULL,
  `prog_expert2` int(30) UNSIGNED DEFAULT NULL,
  `prog_expert3` int(30) UNSIGNED DEFAULT NULL,
  `prog_expert4` int(30) UNSIGNED DEFAULT NULL,
  `status` int(30) UNSIGNED NOT NULL,
  `year` int(4) UNSIGNED NOT NULL,
  `date_of_colection` varchar(255) NOT NULL,
  `created_by` int(30) UNSIGNED NOT NULL,
  `created_at` int(30) NOT NULL,
  `updated_by` int(30) UNSIGNED NOT NULL,
  `updated_at` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programme_expert`
--

CREATE TABLE `programme_expert` (
  `id` int(30) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `other_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `primary_email` varchar(255) NOT NULL,
  `secondary_email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `organisation` varchar(255) NOT NULL,
  `status_act` int(5) UNSIGNED NOT NULL,
  `created_by` int(30) UNSIGNED NOT NULL,
  `created_at` int(30) UNSIGNED NOT NULL,
  `updated_by` int(30) UNSIGNED NOT NULL,
  `updated_at` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(30) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `right` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `right`) VALUES
(1, 'Admin', 'all rights');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(30) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Accredited'),
(2, 'Not Accredited'),
(3, 'Submitted For Desk Review'),
(4, 'Site Visit Conducted');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(30) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `title`) VALUES
(1, 'Dr.'),
(2, 'Mr.'),
(3, 'Hon.'),
(4, 'Prof.'),
(5, 'Mrs.'),
(6, 'Ms.'),
(7, 'Assoc. Prof');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `id` int(30) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `address` int(30) UNSIGNED NOT NULL,
  `status_act` int(5) UNSIGNED NOT NULL,
  `created_by` int(30) UNSIGNED NOT NULL,
  `created_at` int(30) UNSIGNED NOT NULL,
  `updated_by` int(30) UNSIGNED NOT NULL,
  `updated_at` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`id`, `name`, `type`, `address`, `status_act`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'University of Zambia', 'Public', 1, 9, 1, 1612386094, 1, 1612386094),
(2, 'Lusaka Apex Medical University', 'Private', 2, 9, 1, 1612386289, 1, 1612386289),
(3, 'Texila American University', 'Private', 3, 9, 1, 1612414637, 1, 1612414637);

-- --------------------------------------------------------

--
-- Table structure for table `university_address`
--

CREATE TABLE `university_address` (
  `id` int(30) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `facebook_id` varchar(255) NOT NULL,
  `twitter_handle` varchar(255) NOT NULL,
  `status_act` int(2) NOT NULL,
  `created_by` int(30) UNSIGNED NOT NULL,
  `created_at` int(30) UNSIGNED NOT NULL,
  `updated_by` int(30) UNSIGNED NOT NULL,
  `updated_at` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university_address`
--

INSERT INTO `university_address` (`id`, `email`, `website`, `location`, `telephone`, `contact`, `whatsapp`, `facebook_id`, `twitter_handle`, `status_act`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'sifo@something.com', 'www.unza.zm', 'Lusaka', '0972024917', '0972024917', '', '', '', 9, 1, 0, 1, 0),
(2, 'contact@lamu.com', 'www.lamu.com', 'Lusaka', '0972024917', '0972024917', '0972024917', '', '', 9, 1, 0, 1, 0),
(3, 'mayembem34@gmail.com', 'www.texila.com', 'Lusaka', '0972024917', '0972024917', '', '', '', 9, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(30) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `other_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `role` int(30) UNSIGNED NOT NULL,
  `created_by` int(30) UNSIGNED NOT NULL,
  `created_at` int(30) UNSIGNED NOT NULL,
  `updated_by` int(30) UNSIGNED NOT NULL,
  `updated_at` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `other_name`, `last_name`, `email`, `password`, `auth`, `contact_no`, `role`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Test', '', 'Test', 'mayembem34@gmail.com', '$2y$13$OjCQuu5VJFQUrcGShBAzuuDz6gBYzq5s6liH051tYAWc3q8EciqFO', '_zXByQBa7QsaEeuZQPbls1DbKXh0qLQK', '0972024917', 1, 0, 0, 0, 0),
(4, 'Martin', '', 'Mayembe', 'mayembem34@gmail.com', '$2y$13$Urv5358U7QP1WZl62HbU/.TYuROq3qVQ7LDzEiTSlkKvRo75XbUwm', 'YQpvRkkrU-eohGk-5UPtWHE6xAwYCY-O', '', 1, 1, 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `learning_programme`
--
ALTER TABLE `learning_programme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university` (`university`),
  ADD KEY `prog_expert1` (`prog_expert1`),
  ADD KEY `prog_expert2` (`prog_expert2`),
  ADD KEY `prog_expert3` (`prog_expert3`),
  ADD KEY `prog_expert4` (`prog_expert4`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `programme_expert`
--
ALTER TABLE `programme_expert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address` (`address`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `university_address`
--
ALTER TABLE `university_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `learning_programme`
--
ALTER TABLE `learning_programme`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `programme_expert`
--
ALTER TABLE `programme_expert`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `university_address`
--
ALTER TABLE `university_address`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
