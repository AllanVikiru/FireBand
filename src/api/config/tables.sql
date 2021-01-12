CREATE DATABASE `fireband`;
CREATE TABLE `fireband`.`users` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `role` VARCHAR(10) NOT NULL DEFAULT '1',
    `email` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(13) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(255),
    PRIMARY KEY (`id`)
);
CREATE TABLE `fireband`.`biodata` (
    `bio_id` INT(255) NOT NULL AUTO_INCREMENT,
    `user_id` INT(255) NOT NULL,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `dob` DATE NOT NULL,
    `gender_id` INT(10) NOT NULL,
    `weight` FLOAT(50) NOT NULL,
    `height` FLOAT(50) NOT NULL,
    PRIMARY KEY (`bio_id`)
);
CREATE TABLE `fireband`.`vo2max` (
    `vo2_id` INT(10) NOT NULL,
    `user_id` INT(10) NOT NULL,
    `value` FLOAT(10) NOT NULL,
    `test_date` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
    PRIMARY KEY (`vo2_id`)
);
CREATE TABLE `fireband`.`thingspeak` (
    `ts_id` INT(10) NOT NULL,
    `user_id` INT(10) NOT NULL,
    `ts_channel` VARCHAR(255) NOT NULL,
    `ts_read_key` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`ts_id`)
);
CREATE TABLE `fireband`.`roles` (
    `role_id` INT(10) NOT NULL AUTO_INCREMENT,
    `role` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`role_id`)
);
INSERT INTO `roles` (`role_id`, `role`)
VALUES ('1', 'Superadmin'),
    ('2', 'Commander'),
    ('3', 'Firefighter');
CREATE TABLE `fireband`.`sex` (
    `sex_id` INT(10) NOT NULL AUTO_INCREMENT,
    `sex` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`sex_id`)
);
INSERT INTO `sex` (`sex_id`, `sex`)
VALUES ('1', 'Female'),
    ('2', 'Male'),
    ('3', 'Intersex'),
    ('4', 'Rather not say');