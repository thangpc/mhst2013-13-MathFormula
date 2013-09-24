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

 Date: 09/24/2013 15:08:31 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `formulas`
-- ----------------------------
DROP TABLE IF EXISTS `formulas`;
CREATE TABLE `formulas` (
  `formula_id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(25) DEFAULT 'encrypt id',
  `title` varchar(255) DEFAULT NULL,
  `latex` text NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `time_created` varchar(25) DEFAULT NULL,
  `time_updated` varchar(25) DEFAULT NULL,
  `is_actived` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`formula_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `formulas`
-- ----------------------------
BEGIN;
INSERT INTO `formulas` VALUES ('1', 'encrypt id', 'Untitled', 'SDFSDFDS', '2', '1379772003', null, '1'), ('2', 'encrypt id', 'Untitled', 'asdsadasd', '2', '1379772015', null, '1'), ('3', 'encrypt id', 'Untitled', 'sdasdas', '2', '1379772126', null, '1'), ('4', 'encrypt id', 'Untitled', 'ASDSAD', '2', '1379772137', null, '1'), ('5', 'encrypt id', 'Untitled', 'D', '2', '1379772146', null, '1'), ('6', 'encrypt id', 'Untitled', 'DSFSDFSDF', '2', '1379772227', null, '1'), ('7', 'encrypt id', 'Untitled', 'SDFDSFSD', '2', '1379772233', null, '1'), ('8', 'encrypt id', 'A', 'SFQ', '2', '1379772240', null, '1'), ('9', 'encrypt id', 'Untitled', 'D', '2', '1379772340', null, '1'), ('11', 'encrypt id', 'Chứng minh đẳng thức sau là đúng', '\\sqrt{(x^2\\:+\\:y^2)\\:}=\\:(x+y)^2\\:-\\:xy \\sqrt{(x^2\\:+\\:y^2)\\:}=\\:(x+y)^2\\:-\\:xy \\sqrt{(x^2\\:+\\:y^2)\\:}=\\:(x+y)^2\\:-\\:xy', '2', '1379776358', '1379777620', '1'), ('12', 'encrypt id', 'Untitled', '\\pi(x)\\:=\\sum_{ }^{\\infty}_{n\\:=\\:1}\\:\\frac{\\mu(n)}{n}J(\\sqrt[n]{x})\\:where\\:J(x)\\:=\\:Li(x)\\:+\\:\\sum_pLi(x^p)\\:-\\:\\log2\\:+\\:\\int_x^{\\infty}\\frac{dt}{t(t^2\\:-\\:1)\\log t}', '2', '1379777847', null, '1'), ('14', 'encrypt id', 'Untitled', '\\sqrt{(x^2\\:+\\:y^2)\\:}=\\:(x+y)^2\\:-\\:xy \\sqrt{(x^2\\:+\\:y^2)\\:}=\\:(x+y)^2\\:-\\:xy \\sqrt{(x^2\\:+\\:y^2)\\:}=\\:(x+y)^2\\:-\\:xy', '0', '1379786886', null, '1'), ('15', 'encrypt id', 'Chứng minh đẳng thức sau là đúng', '\\sqrt{(x^2+y^2)}=\\:(x+y)^2\\:-\\:xy\\sqrt{(x^2\\:+\\:y^2)\\:}=\\:(x+y)^2\\:-\\:xy\\sqrt{(x^2\\:+\\:y^2)\\:}=\\:(x+y)^2\\:-\\:xy', '0', '1379788971', null, '1');
COMMIT;

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
INSERT INTO `sessions` VALUES ('99c6d005297cbfd4b7633afc58279b20', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '1379913046', 'a:7:{s:9:\"user_data\";s:0:\"\";s:5:\"admin\";s:5:\"admin\";s:8:\"admin_id\";s:1:\"1\";s:14:\"admin_loggedin\";s:5:\"admin\";s:4:\"user\";s:6:\"tester\";s:7:\"user_id\";s:1:\"2\";s:13:\"user_loggedin\";s:6:\"public\";}');
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
  `time_created` varchar(30) DEFAULT NULL,
  `role` varchar(15) DEFAULT 'user' COMMENT 'user, admin\n1: editor\n2: user',
  `is_active` smallint(1) DEFAULT '1' COMMENT '0: unactive\n1: actived\n2: deleted',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'admin', 'bdb199b096d7c629783c1e292227f0ed180c0d9f36566c1e5189e2cb4e1fc6e7c93cbda06e887036a51e615de8b7f2747786026f9ac48ebe4faef6f7eaaa1329', 'admin@pastebyme.com', 'Admin', null, '1379824786', 'admin', '1'), ('2', 'tester', 'bdb199b096d7c629783c1e292227f0ed180c0d9f36566c1e5189e2cb4e1fc6e7c93cbda06e887036a51e615de8b7f2747786026f9ac48ebe4faef6f7eaaa1329', 'tester@pastebyme.com', 'Tester', null, '1379867907', 'user', '1'), ('3', 'trunghieuhf', 'bdb199b096d7c629783c1e292227f0ed180c0d9f36566c1e5189e2cb4e1fc6e7c93cbda06e887036a51e615de8b7f2747786026f9ac48ebe4faef6f7eaaa1329', 'trunghieuhf@gmail.com', null, null, '1379824786', 'user', '1'), ('4', 'trunghieuhf', 'bdb199b096d7c629783c1e292227f0ed180c0d9f36566c1e5189e2cb4e1fc6e7c93cbda06e887036a51e615de8b7f2747786026f9ac48ebe4faef6f7eaaa1329', 'trunghieuhf@gmail.com', null, null, '1379824786', 'user', '1'), ('5', 'trunghieuhf15', 'bdb199b096d7c629783c1e292227f0ed180c0d9f36566c1e5189e2cb4e1fc6e7c93cbda06e887036a51e615de8b7f2747786026f9ac48ebe4faef6f7eaaa1329', 'trunghieuhf@gmail.com', null, null, '1379824786', 'user', '1'), ('6', 'tesdfds', 'a6465ddeb32045d875fe96360d9940d0c868bbebd93eefdbd1a781fadf77451ed082ce2aedd285cfcc47b7c1f82950ffaa1ba35c1e2620756ff0e93779015a57', 'trunghieuhf@gmail.com', null, null, '1379824838', 'user', '1'), ('7', 'trunghieuhf@gmail.com', 'bdb199b096d7c629783c1e292227f0ed180c0d9f36566c1e5189e2cb4e1fc6e7c93cbda06e887036a51e615de8b7f2747786026f9ac48ebe4faef6f7eaaa1329', 'trunghieuhf@gmail.com', null, null, '1379824892', 'user', '1'), ('8', 'asdfds', 'eb0f8ce62badef240841d67800b57bada2b7494a14578a3ca02c69cace9054dae9fe32e7564cf568ad6fafde2e398848249dc7dd014d0ee16185d5da6b441b4d', 'sdfdsfds@gmail.com', null, null, '1379824984', 'user', '1'), ('9', 'trsfdsf', '120e7ee5e782943dab43a92fc769785f7c5d92ab865166c496406a2d1bc48dd01b4d2b0f4e6d1b7e1c63029c3769b43c373dc70a897268c84dbddf4281e758b5', 'thang@gmail.com', null, null, '1379825811', 'user', '1'), ('10', 'sfsdf', 'd8a79395a98035728309296d906d4224930aad68663e6046ed1ebcd5cfb13967706d81a0ae4be55091baada4ffbb92227df327fa38ecebb1fa1ccf809751070f', 'tra@sds.co', null, null, '1379825839', 'user', '1'), ('11', 'tester2', '8587f816f5f16383f16b394897673e3a68a81a071ab1ef0a6dd898576eb0182e71647b65d172e47fc6a3e7ba6f837a7ee9d344adcae278ec4c93b4c0dc1cfa1c', 'tester@pastebyme.com', null, null, '1379827517', 'user', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
