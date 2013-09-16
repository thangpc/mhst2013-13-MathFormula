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

 Date: 07/23/2013 20:52:50 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `oauth_id` int(11) DEFAULT NULL,
  `date_created` varchar(30) DEFAULT NULL,
  `role` smallint(1) DEFAULT '0' COMMENT '0: full admin\n1: editor\n2: user',
  `is_active` smallint(1) DEFAULT '0' COMMENT '0: unactive\n1: actived\n2: deleted',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'trunghieuhf', '21232f297a57a5a743894a0e4a801fc3', 'trunghieuhf@gmail.com', 'Tran Trung Hieu', null, null, '0', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
