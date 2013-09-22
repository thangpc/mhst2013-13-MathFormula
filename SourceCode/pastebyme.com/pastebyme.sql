/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50525
 Source Host           : localhost
 Source Database       : pastebyme

 Target Server Type    : MySQL
 Target Server Version : 50525
 File Encoding         : utf-8

 Date: 09/21/2013 18:29:14 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `formulars`
-- ----------------------------
DROP TABLE IF EXISTS `formulars`;
CREATE TABLE `formulars` (
  `formular_id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(25) DEFAULT 'encrypt id',
  `title` varchar(255) DEFAULT NULL,
  `latex` text NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `time_created` varchar(25) DEFAULT NULL,
  `time_updated` varchar(25) DEFAULT NULL,
  `is_actived` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`formular_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `sessions`
-- ----------------------------
BEGIN;
INSERT INTO `sessions` VALUES ('874614c3a0e861f4376795f08f660beb', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '1379762841', 'a:4:{s:9:\"user_data\";s:0:\"\";s:5:\"admin\";s:5:\"admin\";s:8:\"admin_id\";s:1:\"1\";s:14:\"admin_loggedin\";s:5:\"admin\";}');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `oauth_id` int(11) DEFAULT NULL,
  `date_created` varchar(30) DEFAULT NULL,
  `role` varchar(15) DEFAULT 'user' COMMENT 'user, admin\n1: editor\n2: user',
  `is_active` smallint(1) DEFAULT '1' COMMENT '0: unactive\n1: actived\n2: deleted',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'admin', 'bdb199b096d7c629783c1e292227f0ed180c0d9f36566c1e5189e2cb4e1fc6e7c93cbda06e887036a51e615de8b7f2747786026f9ac48ebe4faef6f7eaaa1329', 'admin@pastebyme.com', 'Admin', null, null, 'admin', '1'), ('2', 'tester', 'bdb199b096d7c629783c1e292227f0ed180c0d9f36566c1e5189e2cb4e1fc6e7c93cbda06e887036a51e615de8b7f2747786026f9ac48ebe4faef6f7eaaa1329', 'tester@pastebyme.com', 'Tester', null, null, 'user', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
