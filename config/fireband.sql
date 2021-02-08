START TRANSACTION;

--
-- Database: `fireband`
--
CREATE DATABASE IF NOT EXISTS `fireband`;
-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
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
(1, 4, '1989-07-02', 1, 79, 123),
(2, 5, '1989-10-19', 2, 86, 189);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
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

CREATE TABLE `sex` (
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

CREATE TABLE `thingspeak` (
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
(1, 4, '1259465', 'RSE5CUZBM5OPTYBS', '382204'),
(2, 5, '1259465', 'RSE5CUZBM5OPTYBS', '382204');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
(1, 'superadmin@mail.com', '$2y$10$7LlUv.5o8MijE.gzKz2jQuOkd3TNPBRuYzy6jsmLLIG3UnB9tZvOW', 'Superadmin', 0, 1, 1, 1, 1610208409, 1612778382, 36),
(2, 'commander1@mail.com', '$2y$10$27WhcV.wPQfm2NdLcVd3OO73VU8/XShaOxFDjr4RpEEV/Gftbh8hq', 'Commander One', 0, 1, 1, 2, 1610208600, 1612778552, 25),
(3, 'commander2@mail.com', '$2y$10$jhnARWq0TWALNNwCR4E9fOZr9Ip2AYrkMRdTvVb1fZqpAg5501LxG', 'Commander Two', 0, 1, 1, 2, 1612776250, 1612778367, 2),
(4, 'firefighter1@mail.com', '$2y$10$Qw68czFQHplk2yqb966.LeKRB3a7.vYWMfqQrRX0eY7tRUKGnnOz6', 'Firefighter One', 0, 1, 1, 3, 1610212410, 1612777899, 20),
(5, 'firefighter2@mail.com', '$2y$10$Z5uYQ74qvvyVfhcaS4WC8.7uZSadgTZIlOB00dpm1OyM4ABHbmfKW', 'Firefighter Two', 0, 1, 1, 3, 1612766386, 1612778015, 2),
(6, 'firefighter3@mail.com', '$2y$10$hCoPmRk2OCp/160YiYLsxOCaE2UZLjklm78XHv1NWlJLxqOwPdkoO', 'Firefighter Three', 0, 1, 1, 3, 1612778422, 1612778536, 1);


-- --------------------------------------------------------

--
-- Table structure for table `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_resets`
--

CREATE TABLE `users_resets` (
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

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vo2max`
--

CREATE TABLE `vo2max` (
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
(1, 4, 50.12, 'Superior', '2021-01-21 15:25:28'),
(2, 5, 37.07, 'Excellent', '2021-02-08 12:32:59');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
COMMIT;
