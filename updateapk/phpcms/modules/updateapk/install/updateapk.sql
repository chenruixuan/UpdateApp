/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50527
Source Host           : 127.0.0.1:3306
Source Database       : ytyd

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-09-04 09:48:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `v9_updateapk`
-- ----------------------------
DROP TABLE IF EXISTS `v9_updateapk`;
CREATE TABLE `v9_updateapk` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `updatetime` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`id`),
  KEY `listorder` (`name`,`id`),
  KEY `catid` (`name`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of v9_updateapk
-- ----------------------------
