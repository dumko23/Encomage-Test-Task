SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `PostList`
USE `PostList`;

CREATE TABLE `Posts`
(
    `postId`   int(11) NOT NULL,
    `userName` varchar(255) DEFAULT NULL,
    `text`  varchar(255) DEFAULT NULL,
    `date` timestamp,
    `rating` decimal (1,1) NOT NULL
)
    DEFAULT CHARSET = utf8;