SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = 'Europe/Kiev';

CREATE DATABASE IF NOT EXISTS `PostList`;
USE `PostList`;

CREATE TABLE if not exists `Posts`
(
    `postId`   int(11) auto_increment PRIMARY KEY,
    `userName` varchar(255) NOT NULL,
    `text`  varchar(255) NOT NULL,
    `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
    `rating` decimal (1,1) NOT NULL
)
    DEFAULT CHARSET = utf8;

CREATE TABLE `Comments`
(
    'commentId' int(11) auto_increment PRIMARY KEY ,
    `postId`   int(11) NOT NULL,
    `userName` varchar(255)  NOT NULL,
    `text`  varchar(255) NOT NULL,
    `date` timestamp NOT NULL default CURRENT_TIMESTAMP
)
    DEFAULT CHARSET = utf8;
