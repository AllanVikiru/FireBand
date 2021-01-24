--
-- Database: `fireband`
-- CREATE DATABASE `fireband`;
-- Copy, paste this SQL code - it would fail on add foreign key if imported

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `profile_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `dob` date DEFAULT NULL,
  `sex_id` int(10) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `height` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `user_id`, `dob`, `sex_id`, `weight`, `height`) VALUES
(1, 3, '1989-07-02', 1, 79, 123);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(10) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`) VALUES
(1, 'Superadmin'),
(2, 'Commander'),
(3, 'Firefighter');

-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

CREATE TABLE IF NOT EXISTS `sex` (
  `sex_id` int(10) NOT NULL,
  `sex` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`sex_id`, `sex`) VALUES
(1, 'Female'),
(2, 'Male'),
(3, 'Intersex'),
(4, 'Rather not say');

-- --------------------------------------------------------

--
-- Table structure for table `thingspeak`
--

CREATE TABLE IF NOT EXISTS `thingspeak` (
  `ts_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `channel` varchar(255) DEFAULT NULL,
  `read_key` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thingspeak`
--

INSERT INTO `thingspeak` (`ts_id`, `user_id`, `channel`, `read_key`, `location`) VALUES
(1, 3, '1259465', 'RSE5CUZBM5OPTYBS', '382204');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(1, 'super@mail.com', '$2y$10$pRn6R2mB.uPO8tw3gWu.E.k8XFN1yKdIUgY4Lk8twGkJyRHJYkuKy', 'Superadmin', 0, 1, 1, 1, 1610208409, 1611460326, 34),
(2, 'commander@mail.com', '$2y$10$pRn6R2mB.uPO8tw3gWu.E.k8XFN1yKdIUgY4Lk8twGkJyRHJYkuKy', 'Commander A.N Other', 0, 1, 1, 2, 1610208600, 1611460178, 23),
(3, 'firefighter@mail.com', '$2y$10$mgv1aeRDhqUhPOH43XP6xuJoklOBwvHfsS1cNSMu9nmVQ/XabA2Di', 'Firefighter K.Q User', 0, 1, 1, 3, 1610212410, 1611453135, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users_resets`
--

CREATE TABLE IF NOT EXISTS `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `users_throttling`
--

CREATE TABLE IF NOT EXISTS `users_throttling` (
  `bucket` varchar(44) NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vo2max`
--

CREATE TABLE IF NOT EXISTS `vo2max` (
  `vo2_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `value` float DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `test_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vo2max`
--
INSERT INTO `vo2max` (`vo2_id`, `user_id`, `value`, `status`, `test_date`) VALUES
(1, 3, 50.12, 'Superior', '2021-01-21 15:25:28');
--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`sex_id`);

--
-- Indexes for table `thingspeak`
--
ALTER TABLE `thingspeak`
  ADD PRIMARY KEY (`ts_id`),
  ADD UNIQUE KEY `ts_id` (`ts_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Indexes for table `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- Indexes for table `vo2max`
--
ALTER TABLE `vo2max`
  ADD PRIMARY KEY (`vo2_id`),
  ADD UNIQUE KEY `vo2_id` (`vo2_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sex`
--
ALTER TABLE `sex`
  MODIFY `sex_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thingspeak`
--
ALTER TABLE `thingspeak`
  MODIFY `ts_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vo2max`
--
ALTER TABLE `vo2max`
  MODIFY `vo2_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `thingspeak`
--
ALTER TABLE `thingspeak`
  ADD CONSTRAINT `thingspeak_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vo2max`
--
ALTER TABLE `vo2max`
  ADD CONSTRAINT `vo2max_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;




