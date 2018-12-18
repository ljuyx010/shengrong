/*
MySQL Backup
Source Server Version: 5.6.14
Source Database: myshengrongzhua
Date: 2018/12/18 17:52:26
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
  `zt` int(1) NOT NULL COMMENT '0在职1离职',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dp_logs`
-- ----------------------------
DROP TABLE IF EXISTS `dp_logs`;
CREATE TABLE `dp_logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(5) NOT NULL,
  `content` text NOT NULL,
  `time` int(10) NOT NULL COMMENT '更新日期',
  `type` int(2) NOT NULL DEFAULT '0' COMMENT '0日志1请假2报销3公告',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  `zt` int(1) NOT NULL DEFAULT '0' COMMENT '0进行中1已完成2异常',
  `uptime` int(10) NOT NULL COMMENT '最后一次更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `dp_admin` VALUES ('1','dpwl','fb1ca64b97abe2f25fb5b47318abc093','大鹏网络','1','0'), ('2','ljuyx','14e1b600b1fd579f47433b88e8d85291','李俊','0','0');
INSERT INTO `dp_ccon` VALUES ('1','2','1','准备做一个OA办公系统','1545114688');
INSERT INTO `dp_customer` VALUES ('1','晟荣装饰有限公司','电话：18672996571','孙总','','1','2','1545114688','1545114688');
INSERT INTO `dp_logs` VALUES ('1','2','日志测试一下下','1545118322','0'), ('2','2','请假测试','1545118356','1'), ('3','2','报销测试','1545118390','2'), ('4','1','幸福是奋斗出来的','1545118538','3');
INSERT INTO `dp_pcon` VALUES ('1','1','2','1545114400','项目已经基本完成');
INSERT INTO `dp_project` VALUES ('1','晟荣OA系统制作','姓名:孙总 , 电话：18672996571','1543334400','25','1','2','1545113380','0','1545113380');
