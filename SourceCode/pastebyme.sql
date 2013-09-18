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

 Date: 09/18/2013 17:56:03 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `formulars`
-- ----------------------------
BEGIN;
INSERT INTO `formulars` VALUES ('1', 'encrypt id', 'Untitled', '\\frac{d}{dx}\\sqrt{x}=\\frac{d}{dx}x^{\\frac{1}{2}}=\\frac{1}{2}x^{-\\frac{1}{2}}=\\frac{1}{2\\sqrt{x}}', '3', '2013-09-17 07:44', null, '1'), ('2', 'encrypt id', 'Untitled', '\\frac{d}{dx}\\sqrt{x}=\\frac{d}{dx}x^{\\frac{1}{2}}', '1', '2013-09-17 07:46', '1379441676', '1'), ('3', 'encrypt id', 'Untitled', '\\frac{d}{dx}\\sqrt{x}=\\frac{d}{dx}x^{\\frac{1}{2}}=\\frac{1}{2}x^{-\\frac{1}{2}}=\\frac{1}{2\\sqrt{x}}', '3', '2013-09-17 07:47', null, '1'), ('4', 'encrypt id', 'Untitled', '\\frac{d}{dx}\\sqrt{x}=\\frac{d}{dx}x^{\\frac{1}{2}}=\\frac{1}{2}x^{-\\frac{1}{2}}=\\frac{1}{2\\sqrt{x}}', '3', '2013-09-17 07:47', null, '1'), ('5', 'encrypt id', 'Untitled', '\\frac{d}{dx}\\sqrt{x}=\\frac{d}{dx}x^{\\frac{1}{2}}=\\frac{1}{2}x^{-\\frac{1}{2}}=\\frac{1}{2\\sqrt{x}}', '3', '2013-09-17 04:32', null, '1'), ('6', 'encrypt id', 'Untitled', '\\frac{d}{dx}\\sqrt{x}=\\frac{d}{dx}x^{\\frac{1}{2}}=\\frac{1}{2}x^{-\\frac{1}{2}}=\\frac{1}{2\\sqrt{x}}', '3', '2013-09-17 05:16', null, '1'), ('7', 'encrypt id', 'Untitled', '\\frac{d}{dx}\\sqrt{x}=\\frac{d}{dx}x^{\\frac{1}{2}}=\\frac{1}{2}x^{-\\frac{1}{2}}=\\frac{1}{2\\sqrt{x}}', '0', '2013-09-17 05:22', null, '1'), ('8', 'encrypt id', 'Untitled', '\\frac{d}{dx}\\sqrt{x}=\\frac{d}{dx}x^{\\frac{1}{2}}=\\frac{1}{2}x^{-\\frac{1}{2}}=\\frac{1}{2\\sqrt{x}}', '0', '2013-09-17 05:25', null, '1'), ('9', 'encrypt id', 'Untitled', '\\frac{d}{dx}\\sqrt{x}=\\frac{d}{dx}x^{\\frac{1}{2}}=\\frac{1}{2}x^{-\\frac{1}{2}}=\\frac{1}{2\\sqrt{x}}', '0', '2013-09-17 05:28', null, '1'), ('10', 'encrypt id', 'Untitled', '\\frac{d}{dx}\\sqrt{x}=\\frac{d}{dx}x^{\\frac{1}{2}}=\\frac{1}{2}x^{-\\frac{1}{2}}=\\frac{1}{2\\sqrt{x}}', '0', '2013-09-17 05:28', null, '1'), ('11', 'encrypt id', 'Untitled', '\\frac{d}{dx}\\sqrt{x}=\\frac{d}{dx}x^{\\frac{1}{2}}=\\frac{1}{2}x^{-\\frac{1}{2}}=\\frac{1}{2\\sqrt{x}}', '0', '2013-09-17 05:29', null, '1'), ('12', 'encrypt id', 'p3', '\\frac{d}{dx}\\sqrt{x}=\\frac{d}{dx}x^{\\frac{1}{2}}=\\frac{1}{2}x^{-\\frac{1}{2}}=\\frac{1}{2\\sqrt{x}}', '0', '2013-09-17 05:31', null, '1'), ('13', 'encrypt id', 'Untitled', '\\frac{d}{dx}\\sqrt{x}=\\frac{d}{dx}x^{\\frac{1}{2}}=\\frac{1}{2}x^{-\\frac{1}{2}}=\\frac{1}{2\\sqrt{x}}', '0', '2013-09-17 05:31', null, '1'), ('14', 'encrypt id', 'Untitled', '\\frac{d}{dx}\\sqrt{x}=\\frac{d}{dx}x^{\\frac{1}{2}}=\\frac{1}{2}x^{-\\frac{1}{2}}=\\frac{1}{2\\sqrt{x}}', '0', '2013-09-17 05:36', null, '1'), ('15', 'encrypt id', 'Untitled', 'ADASDSA', '0', '2013-09-17 05:42', null, '1'), ('16', 'encrypt id', 'Untitled', 'asdsadas', '0', '2013-09-17 05:46', null, '1'), ('17', 'encrypt id', 'p2', 'SASDSA', '0', '2013-09-17 05:47', null, '1'), ('18', 'encrypt id', 'abc', '\\sqrt[n]{n}', '0', '1379470766', null, '1'), ('19', 'encrypt id', 'asaf dsf ds', 'asadfas', '1', '1379471182', '1379471861', '1'), ('20', 'encrypt id', 'x', 'sfasf\\:', '0', '1379471215', null, '1'), ('21', 'encrypt id', 'asdfds', 'x^{2^2}\\:+\\:x_2\\:\\:+\\:\\sqrt{(x_2)}', '0', '1379471643', null, '1'), ('22', 'encrypt id', 'Untitled', 'dsfdsf', '1', '1379471883', null, '1'), ('23', 'encrypt id', 'guest', 'd', '0', '1379498767', null, '1'), ('24', 'encrypt id', 'Untitled', 'sadsadsadsa', '0', '1379501264', null, '1');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'trunghieuhf', '21232f297a57a5a743894a0e4a801fc3', 'trunghieuhf@gmail.com', 'Tran Trung Hieu', null, null, '0', '0'), ('3', 'tester', '21232f297a57a5a743894a0e4a801fc3', 'tester@localhost', null, null, null, '0', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
