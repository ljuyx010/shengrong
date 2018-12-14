/*
MySQL Backup
Source Server Version: 5.5.53
Source Database: shengrongoa
Date: 2018/12/14 23:10:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `dp_admin`
-- ----------------------------
DROP TABLE IF EXISTS `dp_admin`;
CREATE TABLE `dp_admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `account` varchar(12) NOT NULL COMMENT '账号',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `name` varchar(10) NOT NULL COMMENT '姓名',
  `type` int(1) NOT NULL COMMENT '用户组0员工1管理员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dp_ccon`
-- ----------------------------
DROP TABLE IF EXISTS `dp_ccon`;
CREATE TABLE `dp_ccon` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(5) NOT NULL,
  `cid` int(10) NOT NULL,
  `content` text NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dp_customer`
-- ----------------------------
DROP TABLE IF EXISTS `dp_customer`;
CREATE TABLE `dp_customer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL COMMENT '客户名',
  `lx` varchar(200) NOT NULL COMMENT '联系信息',
  `lxr` varchar(12) DEFAULT NULL COMMENT '联系人',
  `adr` varchar(200) DEFAULT NULL COMMENT '地址',
  `zt` int(11) NOT NULL DEFAULT '0' COMMENT '0客户库1联系中2意向客户3跟进客户4重点客户5成交客户',
  `uid` int(5) DEFAULT NULL COMMENT '跟进人',
  `addtime` int(10) NOT NULL COMMENT '添加日期',
  `uptime` int(10) NOT NULL COMMENT '最后一次更新日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dp_pcon`
-- ----------------------------
DROP TABLE IF EXISTS `dp_pcon`;
CREATE TABLE `dp_pcon` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL COMMENT '项目id',
  `uid` int(5) NOT NULL COMMENT '用户id',
  `time` int(10) NOT NULL COMMENT '更新时间',
  `content` text NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dp_project`
-- ----------------------------
DROP TABLE IF EXISTS `dp_project`;
CREATE TABLE `dp_project` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL COMMENT '标题',
  `kh` varchar(255) NOT NULL COMMENT '客户联系信息',
  `htime` int(10) NOT NULL COMMENT '合同日期',
  `gq` varchar(10) NOT NULL COMMENT '工期',
  `dz` int(10) NOT NULL COMMENT '队长',
  `Participant` varchar(255) NOT NULL COMMENT '参与者',
  `addtime` int(10) NOT NULL COMMENT '添加日期',
  `zt` int(1) NOT NULL COMMENT '0进行中1已完成2异常',
  `uptime` int(10) NOT NULL COMMENT '最后一次更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
