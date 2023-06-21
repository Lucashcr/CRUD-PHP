CREATE DATABASE IF NOT EXISTS `todolist` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `todolist`;
CREATE TABLE IF NOT EXISTS `tasks` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `priority` ENUM('low', 'medium', 'high') NOT NULL,
    `deadline` DATETIME NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`));
