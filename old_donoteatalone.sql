-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2020 at 01:43 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `old_donoteatalone`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `MessageId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `UserOneId` int(11) NOT NULL,
  `UserTwoId` int(11) NOT NULL,
  `Status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `InvitationId` int(11) NOT NULL,
  `InvitationSenderId` int(11) NOT NULL,
  `InvitationReceiverId` int(11) NOT NULL,
  `InvitationStartTime` time NOT NULL,
  `InvitationDate` date NOT NULL,
  `RestaurantId` int(11) NOT NULL,
  `InvitationResponse` enum('0','1','2') NOT NULL,
  `InvitationEndTime` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageId` int(11) NOT NULL,
  `MessageSenderId` int(11) NOT NULL,
  `MessageReceiverId` int(11) NOT NULL,
  `MessageContent` varchar(500) DEFAULT NULL,
  `IsRead` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `IsRead` tinyint(1) NOT NULL,
  `ReservationDate` date NOT NULL,
  `ReservationStartTime` time NOT NULL,
  `ReservationEndTime` time NOT NULL,
  `NotificationToId1` int(11) DEFAULT NULL,
  `NotificationFormId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `NotificationToId2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `provider` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ReservationId` int(11) NOT NULL,
  `ReservationDate` date NOT NULL,
  `ReservationStartTime` time NOT NULL,
  `ReservationMakerId` int(11) NOT NULL,
  `ReservationRestaurantId` int(11) NOT NULL,
  `ReservationResponse` enum('0','1','2') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ReservationEndTime` time NOT NULL,
  `ReservationMaker2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `RestaurantName` varchar(100) DEFAULT NULL,
  `RestaurantAddress` varchar(200) DEFAULT NULL,
  `RestaurantPhone` varchar(45) DEFAULT NULL,
  `RestaurantLongitude` int(200) DEFAULT NULL,
  `RestaurantLatitude` int(200) DEFAULT NULL,
  `RestaurantPhoto` varchar(200) DEFAULT NULL,
  `RestaurantManager` int(11) NOT NULL,
  `AddedBy` varchar(70) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `RestaurantName`, `RestaurantAddress`, `RestaurantPhone`, `RestaurantLongitude`, `RestaurantLatitude`, `RestaurantPhoto`, `RestaurantManager`, `AddedBy`, `created_at`, `updated_at`) VALUES
(1, 'Mac', NULL, '01244558877', NULL, NULL, NULL, 2, 'Kairo', '2020-02-01 12:29:30', '2020-02-01 12:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `UserName` varchar(70) NOT NULL,
  `email` varchar(60) NOT NULL,
  `UserCity` varchar(45) NOT NULL,
  `UserPhone` varchar(45) DEFAULT NULL,
  `UserPhoto` varchar(150) DEFAULT 'noimage.jpg',
  `UserBirthDate` date NOT NULL,
  `password` varchar(250) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `UserLongitude` varchar(250) NOT NULL,
  `UserLatitude` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Gender` varchar(25) NOT NULL,
  `UserInterests` varchar(250) NOT NULL,
  `UserJob` varchar(100) NOT NULL,
  `UserAbout` text NOT NULL,
  `UserAge` varchar(10) NOT NULL,
  `role` enum('user','admin','RManager') NOT NULL DEFAULT 'user',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `UserName`, `email`, `UserCity`, `UserPhone`, `UserPhoto`, `UserBirthDate`, `password`, `remember_token`, `UserLongitude`, `UserLatitude`, `created_at`, `Gender`, `UserInterests`, `UserJob`, `UserAbout`, `UserAge`, `role`, `updated_at`) VALUES
(1, 'Kairo', 'kairo.wageh@gmail.com', '', NULL, 'noimage.jpg', '0000-00-00', '$2y$10$bBcPnmOiDydULwDlapLYV.5GnSu8ciQSmbisWbZHXgan5g8fmhL2W', 'oLPXtAlxnoqKFN9i9BuoL5o0l3cVGptGkDTUtWllvxIp3Iz77l4EusTo2QHF', '', '', '2020-02-02 04:12:03', '', '', '', '', '', 'admin', '2020-02-02 02:12:03'),
(2, 'Mac', 'mac@gmail.com', '', NULL, 'noimage.jpg', '0000-00-00', '$2y$10$oaHakiIm6902sHKdi5s15eDvWvp5AvSsCmL5D5qtQmiCAFGeS9RM.', 'IimM3uPyDcJFp7JcwO2nlQXAkHyHQ4Omu0xwpi2mxfU6ZXIgExE1gtl1hbIu', '', '', '2020-02-01 14:31:20', '', '', '', '', '', 'RManager', '2020-02-01 12:31:20'),
(3, 'KairoUser', 'kairo.wageh@yahoo.com', '', NULL, 'noimage.jpg', '0000-00-00', '$2y$10$KBF86EAFz64F78Yjmy3uS.YxiLoBLQiw.zlVvbesjSrlYyOuKhDlS', '', '', '', '2020-02-02 02:12:42', '', '', '', '', '', 'user', '2020-02-02 02:12:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ConversationMessageId` (`MessageId`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD KEY `FriendsUserOneId` (`UserOneId`),
  ADD KEY `FriendsUserTwoId` (`UserTwoId`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`InvitationId`),
  ADD KEY `InvationSenderId` (`InvitationSenderId`),
  ADD KEY `InvationReciverId` (`InvitationReceiverId`),
  ADD KEY `RestaurantId` (`RestaurantId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageId`),
  ADD KEY `MessageSenderId` (`MessageSenderId`),
  ADD KEY `MessageReciverId` (`MessageReceiverId`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NotificationToId` (`NotificationToId1`),
  ADD KEY `NotificationFromId` (`NotificationFormId`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ReservationId`),
  ADD KEY `ReservationMakerId` (`ReservationMakerId`),
  ADD KEY `ReservationMaker2` (`ReservationMaker2`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RestaurantManager` (`RestaurantManager`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `InvitationId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ReservationId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
