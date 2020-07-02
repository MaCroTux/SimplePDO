-- MySQL dump 9.11
--
-- Host: localhost    Database: pdns
-- ------------------------------------------------------
-- Server version	4.0.23_Debian-7-log

--
-- Table structure for table `domains`
--

CREATE TABLE `accounts`.`users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `account` varchar(40) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name_index` (`name`)
);

--
-- Dumping data for table `domains`
--

INSERT INTO `accounts`.`users` VALUES (1,'test.com',NULL);
INSERT INTO `accounts`.`users` VALUES (2,'ouvameuh.net',NULL);