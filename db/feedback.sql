-- Database: `feedback`

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`id`)
);
INSERT INTO `status` VALUES(1, 'Принят');
INSERT INTO `status` VALUES(2, 'Отклонен');


DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`username` VARCHAR(100) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);
INSERT INTO `admin` VALUES(1, 'Islam', 'admin', '123');


DROP TABLE IF EXISTS `otziv`;
CREATE TABLE `otziv` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `description` TEXT NOT NULL,
  `date` DATETIME NOT NULL,
  `image` VARCHAR(100) DEFAULT NULL,
  `changed` VARCHAR(100) DEFAULT NULL,
  `status_id` INT(10) NOT NULL DEFAULT '2',
	PRIMARY KEY (`id`),
	FOREIGN KEY (`status_id`) REFERENCES `status`(`id`)
);
INSERT INTO `otziv` VALUES(1, 'Islam', 'islamchik@mail.ru', 'hgfjhgkj', '2016-11-15 18:34:23', 'some.jpg', NULL, 1);
INSERT INTO `otziv` VALUES(2, 'Вердум', 'verdum@mail.ru', 'kjhhjgjhhkuiyui', '2016-11-15 21:12:24', NULL, NULL, 2);