/*
Navicat MySQL Data Transfer

Source Server         : phpdev_mysql5.1.57
Source Server Version : 50157
Source Host           : localhost:3306
Source Database       : psd1403

Target Server Type    : MYSQL
Target Server Version : 50157
File Encoding         : 65001

Date: 2014-07-14 17:43:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cms_article`
-- ----------------------------
DROP TABLE IF EXISTS `cms_article`;
CREATE TABLE `cms_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `content` text,
  `ptime` int(10) unsigned NOT NULL DEFAULT '0',
  `source` varchar(100) DEFAULT NULL,
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `cid` int(10) unsigned NOT NULL DEFAULT '0',
  `istui` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_article
-- ----------------------------
INSERT INTO `cms_article` VALUES ('8', '测试分类2文章1', '<p>测试分类2文章内容1</p>', '1405328197', null, '1', '0', '52', '1');
INSERT INTO `cms_article` VALUES ('9', '测试分类2文章1', '<p>测试分类2文章内容1</p>', '1405328197', null, '3', '0', '52', '1');
INSERT INTO `cms_article` VALUES ('10', '测试分类2文章1', '<p>测试分类2文章内容1</p>', '1405328197', null, '0', '0', '52', '0');
INSERT INTO `cms_article` VALUES ('12', '测试分类2文章1', '<p>测试分类2文章内容1</p>', '1405328197', null, '8', '0', '52', '1');
INSERT INTO `cms_article` VALUES ('16', '测试分类2文章1', '<p>测试分类2文章内容1</p>', '1405328197', null, '11', '0', '52', '1');
INSERT INTO `cms_article` VALUES ('17', '测试分类2文章1', '<p>测试分类2文章内容1</p>', '1405328197', null, '1', '0', '52', '0');
INSERT INTO `cms_article` VALUES ('18', '测试分类2文章1', '<p>测试分类2文章内容1</p>', '1405328197', null, '0', '0', '52', '0');
INSERT INTO `cms_article` VALUES ('19', '窃听风云', '<p>窃听风云3</p>', '1405330040', null, '50', '0', '2', '0');
INSERT INTO `cms_article` VALUES ('21', '奥林匹克新闻1', '<p>奥林匹克新闻1文章内容1</p>', '1405330066', null, '0', '0', '3', '0');
INSERT INTO `cms_article` VALUES ('22', '变形金刚', '<p>变形金刚电影</p>', '1405329991', null, '0', '0', '2', '0');
INSERT INTO `cms_article` VALUES ('23', '体育新闻1', '<p>体育新闻1文章内容1</p>', '1405329874', null, '0', '0', '1', '0');

-- ----------------------------
-- Table structure for `cms_category`
-- ----------------------------
DROP TABLE IF EXISTS `cms_category`;
CREATE TABLE `cms_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `tid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_category
-- ----------------------------
INSERT INTO `cms_category` VALUES ('1', '体育新闻', '2');
INSERT INTO `cms_category` VALUES ('2', '最新电影', '2');
INSERT INTO `cms_category` VALUES ('3', '奥林匹克', '2');
INSERT INTO `cms_category` VALUES ('4', '科技新闻', '1');
INSERT INTO `cms_category` VALUES ('5', '达内新闻', '1');
INSERT INTO `cms_category` VALUES ('52', '测试分类1', '0');
INSERT INTO `cms_category` VALUES ('53', '娱乐新闻', '0');
INSERT INTO `cms_category` VALUES ('57', '测试分类2', '0');

-- ----------------------------
-- Table structure for `cms_profile`
-- ----------------------------
DROP TABLE IF EXISTS `cms_profile`;
CREATE TABLE `cms_profile` (
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `truename` varchar(100) DEFAULT NULL,
  `age` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `edu` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `signed` text,
  `pic` varchar(50) NOT NULL DEFAULT 'default.gif',
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_profile
-- ----------------------------
INSERT INTO `cms_profile` VALUES ('1', '黄洋', '27', '0', '4', 'this is a signed', '4395960ea544ef4fa109fc6baa01b2b6.jpg', '956727@qq.com', '大学城', '18983225501');
INSERT INTO `cms_profile` VALUES ('1', '黄洋', '27', '0', '4', 'this is a signed', '3da6e1f2ac58aced36525b3029c72378.jpg', '956727@qq.com', '大学城', '18983225501');
INSERT INTO `cms_profile` VALUES ('9', '测试1', '1', '1', '0', 'test1', 'default.gif', 'test@test.com', 'test addres', '12312312311');

-- ----------------------------
-- Table structure for `cms_reply`
-- ----------------------------
DROP TABLE IF EXISTS `cms_reply`;
CREATE TABLE `cms_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text,
  `ptime` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `aid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_reply
-- ----------------------------
INSERT INTO `cms_reply` VALUES ('6', 'pinglun1', '1400242966', '0', '19');

-- ----------------------------
-- Table structure for `cms_top`
-- ----------------------------
DROP TABLE IF EXISTS `cms_top`;
CREATE TABLE `cms_top` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_top
-- ----------------------------
INSERT INTO `cms_top` VALUES ('1', '国内新闻');
INSERT INTO `cms_top` VALUES ('2', '国际新闻');

-- ----------------------------
-- Table structure for `cms_user`
-- ----------------------------
DROP TABLE IF EXISTS `cms_user`;
CREATE TABLE `cms_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` char(32) NOT NULL,
  `rtime` int(10) unsigned NOT NULL DEFAULT '0',
  `rip` int(11) NOT NULL DEFAULT '0',
  `ltime` int(10) unsigned NOT NULL DEFAULT '0',
  `lip` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_user
-- ----------------------------
INSERT INTO `cms_user` VALUES ('1', 'young', '202cb962ac59075b964b07152d234b70', '1399865708', '2130706433', '1401350448', '2130706433');
INSERT INTO `cms_user` VALUES ('2', 'huang', '202cb962ac59075b964b07152d234b70', '1399869000', '2130706433', '1401188197', '2130706433');
INSERT INTO `cms_user` VALUES ('3', 'zhangsan', '202cb962ac59075b964b07152d234b70', '1399869015', '2130706433', '1401188371', '2130706433');
INSERT INTO `cms_user` VALUES ('4', 'lisi', '202cb962ac59075b964b07152d234b70', '1399869025', '2130706433', '0', '0');
INSERT INTO `cms_user` VALUES ('5', 'wangwu', 'c4ca4238a0b923820dcc509a6f75849b', '1399869032', '2130706433', '0', '0');
INSERT INTO `cms_user` VALUES ('9', 'test', 'c4ca4238a0b923820dcc509a6f75849b', '1399949293', '2130706433', '0', '0');
INSERT INTO `cms_user` VALUES ('10', 'test', 'c4ca4238a0b923820dcc509a6f75849b', '1399949303', '2130706433', '0', '0');
INSERT INTO `cms_user` VALUES ('11', 'test', 'c4ca4238a0b923820dcc509a6f75849b', '1399949309', '2130706433', '0', '0');
INSERT INTO `cms_user` VALUES ('12', 'test', 'c4ca4238a0b923820dcc509a6f75849b', '1399949317', '2130706433', '0', '0');
INSERT INTO `cms_user` VALUES ('13', 'test', 'c4ca4238a0b923820dcc509a6f75849b', '1399949324', '2130706433', '0', '0');
INSERT INTO `cms_user` VALUES ('14', 'test', 'c4ca4238a0b923820dcc509a6f75849b', '1399949331', '2130706433', '0', '0');
INSERT INTO `cms_user` VALUES ('15', 'aaa', '123', '1404459650', '2130706433', '0', '0');
INSERT INTO `cms_user` VALUES ('16', 'bbb', '202cb962ac59075b964b07152d234b70', '1404459759', '2130706433', '0', '0');
