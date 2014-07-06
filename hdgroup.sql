/*
Navicat MySQL Data Transfer

Source Server         : PHP
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : hdgroup

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2014-07-07 00:31:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for group_cart
-- ----------------------------
DROP TABLE IF EXISTS `group_cart`;
CREATE TABLE `group_cart` (
  `user_id` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned NOT NULL COMMENT '购物车表',
  `goods_num` smallint(6) NOT NULL COMMENT '商品数',
  KEY `fk_group_user_has_group_goods_group_goods4_idx` (`goods_id`),
  KEY `fk_group_user_has_group_goods_group_user4_idx` (`user_id`),
  CONSTRAINT `fk_group_user_has_group_goods_group_goods4` FOREIGN KEY (`goods_id`) REFERENCES `group_goods` (`gid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_user_has_group_goods_group_user4` FOREIGN KEY (`user_id`) REFERENCES `group_user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户购物车表';

-- ----------------------------
-- Records of group_cart
-- ----------------------------

-- ----------------------------
-- Table structure for group_category
-- ----------------------------
DROP TABLE IF EXISTS `group_category`;
CREATE TABLE `group_category` (
  `cid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cname` char(20) NOT NULL DEFAULT '' COMMENT '分类名称',
  `keywords` varchar(120) NOT NULL DEFAULT '' COMMENT '分类关键字',
  `title` varchar(60) NOT NULL DEFAULT '' COMMENT '分类标题',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '分类描述',
  `sort` smallint(5) unsigned NOT NULL COMMENT '排序',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
-- Records of group_category
-- ----------------------------
INSERT INTO `group_category` VALUES ('1', '美食', '北京 美食 团购', '北京火锅', '北京 美食 团购北京 美食 团购', '1', '1', '0');
INSERT INTO `group_category` VALUES ('2', '电影', '北京 电影 团购', '电影', '北京 电影 团购', '2', '1', '0');
INSERT INTO `group_category` VALUES ('3', '火锅', '北京 美食 团购', '北京火锅', '北京 美食 团购', '2', '1', '1');
INSERT INTO `group_category` VALUES ('4', '数码', 'IPhone6', 'IPhone', 'IPhone6', '3', '1', '0');
INSERT INTO `group_category` VALUES ('9', '三星', '三星', '三星', '三星', '4', '1', '4');

-- ----------------------------
-- Table structure for group_collect
-- ----------------------------
DROP TABLE IF EXISTS `group_collect`;
CREATE TABLE `group_collect` (
  `goods_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  KEY `fk_group_goods_has_group_user_group_user1_idx` (`user_id`),
  KEY `fk_group_goods_has_group_user_group_goods1_idx` (`goods_id`),
  CONSTRAINT `fk_group_goods_has_group_user_group_goods1` FOREIGN KEY (`goods_id`) REFERENCES `group_goods` (`gid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_goods_has_group_user_group_user1` FOREIGN KEY (`user_id`) REFERENCES `group_user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户收藏表';

-- ----------------------------
-- Records of group_collect
-- ----------------------------

-- ----------------------------
-- Table structure for group_comment
-- ----------------------------
DROP TABLE IF EXISTS `group_comment`;
CREATE TABLE `group_comment` (
  `user_id` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  `time` int(11) NOT NULL COMMENT '评论时间',
  `content` varchar(255) NOT NULL COMMENT '评论内容',
  KEY `fk_group_user_has_group_goods_group_goods3_idx` (`goods_id`),
  KEY `fk_group_user_has_group_goods_group_user3_idx` (`user_id`),
  CONSTRAINT `fk_group_user_has_group_goods_group_goods3` FOREIGN KEY (`goods_id`) REFERENCES `group_goods` (`gid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_user_has_group_goods_group_user3` FOREIGN KEY (`user_id`) REFERENCES `group_user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户评论表';

-- ----------------------------
-- Records of group_comment
-- ----------------------------

-- ----------------------------
-- Table structure for group_goods
-- ----------------------------
DROP TABLE IF EXISTS `group_goods`;
CREATE TABLE `group_goods` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品主键',
  `shopid` smallint(5) unsigned NOT NULL,
  `cid` smallint(5) unsigned NOT NULL,
  `lid` smallint(5) unsigned NOT NULL,
  `main_title` varchar(30) NOT NULL DEFAULT '' COMMENT '商品主标题',
  `sub_title` varchar(255) NOT NULL DEFAULT '' COMMENT '商品副标题',
  `price` decimal(7,1) NOT NULL DEFAULT '0.0' COMMENT '商品价格',
  `old_price` decimal(7,1) NOT NULL DEFAULT '0.0' COMMENT '原价',
  `buy` smallint(6) NOT NULL DEFAULT '0' COMMENT '购买人数',
  `goods_img` varchar(60) NOT NULL COMMENT '商品图',
  `begin_time` int(11) unsigned DEFAULT NULL,
  `end_time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`gid`),
  UNIQUE KEY `gid` (`gid`),
  KEY `fk_group_goods_group_shop_idx` (`shopid`),
  KEY `fk_group_goods_group_category1_idx` (`cid`),
  KEY `fk_group_goods_group_locality1_idx` (`lid`),
  CONSTRAINT `fk_group_goods_group_category1` FOREIGN KEY (`cid`) REFERENCES `group_category` (`cid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_goods_group_shop` FOREIGN KEY (`shopid`) REFERENCES `group_shop` (`shopid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of group_goods
-- ----------------------------

-- ----------------------------
-- Table structure for group_goods_detail
-- ----------------------------
DROP TABLE IF EXISTS `group_goods_detail`;
CREATE TABLE `group_goods_detail` (
  `goods_id` int(10) unsigned NOT NULL,
  `detail` text,
  `goods_server` varchar(255) NOT NULL,
  KEY `fk_table1_group_goods1_idx` (`goods_id`),
  CONSTRAINT `fk_table1_group_goods1` FOREIGN KEY (`goods_id`) REFERENCES `group_goods` (`gid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group_goods_detail
-- ----------------------------

-- ----------------------------
-- Table structure for group_locality
-- ----------------------------
DROP TABLE IF EXISTS `group_locality`;
CREATE TABLE `group_locality` (
  `lid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `lname` char(20) DEFAULT '',
  `pid` smallint(5) unsigned DEFAULT '0',
  `sort` smallint(5) unsigned DEFAULT '0' COMMENT '排序',
  `display` tinyint(4) DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='地区表';

-- ----------------------------
-- Records of group_locality
-- ----------------------------
INSERT INTO `group_locality` VALUES ('1', '云南', '0', '12', '1');
INSERT INTO `group_locality` VALUES ('2', '昆明', '1', '2', '1');
INSERT INTO `group_locality` VALUES ('3', '盘龙区', '2', '3', '1');
INSERT INTO `group_locality` VALUES ('4', '五华区', '2', '4', '1');
INSERT INTO `group_locality` VALUES ('5', '官渡区', '2', '5', '1');
INSERT INTO `group_locality` VALUES ('6', '西山区', '2', '6', '1');
INSERT INTO `group_locality` VALUES ('7', '玉溪', '1', '23', '1');
INSERT INTO `group_locality` VALUES ('8', '楚雄', '1', '55', '1');
INSERT INTO `group_locality` VALUES ('9', '大姚县', '8', '66', '1');
INSERT INTO `group_locality` VALUES ('10', '红塔区', '7', '85', '1');
INSERT INTO `group_locality` VALUES ('11', '高新区', '2', '10', '1');
INSERT INTO `group_locality` VALUES ('13', '大理', '1', '54', '1');
INSERT INTO `group_locality` VALUES ('14', '文山', '1', '52', '1');
INSERT INTO `group_locality` VALUES ('17', '临沧县', '1', '21', '1');
INSERT INTO `group_locality` VALUES ('18', '南华县', '8', '21', '1');
INSERT INTO `group_locality` VALUES ('19', '祥云县', '13', '21', '1');

-- ----------------------------
-- Table structure for group_open_bind
-- ----------------------------
DROP TABLE IF EXISTS `group_open_bind`;
CREATE TABLE `group_open_bind` (
  `user_id` int(10) unsigned NOT NULL,
  `openid` char(64) NOT NULL,
  `open_distinguish` tinyint(4) NOT NULL COMMENT '开发平台区别',
  `open_name` varchar(16) NOT NULL COMMENT '开发平台名称',
  UNIQUE KEY `openid_UNIQUE` (`openid`),
  KEY `fk_group_open_bind_group_user1_idx` (`user_id`),
  CONSTRAINT `fk_group_open_bind_group_user1` FOREIGN KEY (`user_id`) REFERENCES `group_user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='站点用户与开发平台绑定表';

-- ----------------------------
-- Records of group_open_bind
-- ----------------------------

-- ----------------------------
-- Table structure for group_order
-- ----------------------------
DROP TABLE IF EXISTS `group_order`;
CREATE TABLE `group_order` (
  `user_id` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  `goods_num` smallint(6) NOT NULL,
  `orderid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `total_money` smallint(6) NOT NULL COMMENT '总金额',
  PRIMARY KEY (`orderid`),
  UNIQUE KEY `orderid_UNIQUE` (`orderid`),
  KEY `fk_group_user_has_group_goods_group_goods1_idx` (`goods_id`),
  KEY `fk_group_user_has_group_goods_group_user1_idx` (`user_id`),
  CONSTRAINT `fk_group_user_has_group_goods_group_goods1` FOREIGN KEY (`goods_id`) REFERENCES `group_goods` (`gid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_user_has_group_goods_group_user1` FOREIGN KEY (`user_id`) REFERENCES `group_user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户订单表';

-- ----------------------------
-- Records of group_order
-- ----------------------------

-- ----------------------------
-- Table structure for group_shop
-- ----------------------------
DROP TABLE IF EXISTS `group_shop`;
CREATE TABLE `group_shop` (
  `shopid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `shopname` varchar(30) NOT NULL DEFAULT '' COMMENT '商品名称',
  `shopaddress` varchar(120) NOT NULL DEFAULT '' COMMENT '商铺地址',
  `metroaddress` varchar(120) NOT NULL DEFAULT '' COMMENT '地铁地址',
  `shoptel` char(50) NOT NULL COMMENT '商铺电话',
  `shopcoord` varchar(60) NOT NULL DEFAULT '' COMMENT '商铺坐标',
  PRIMARY KEY (`shopid`),
  UNIQUE KEY `shopid_UNIQUE` (`shopid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='商铺表';

-- ----------------------------
-- Records of group_shop
-- ----------------------------
INSERT INTO `group_shop` VALUES ('1', '耀莱成龙影院（昆明店）', '云南省昆明市盘龙区白塔路399号ME TOWNA栋5楼', '地铁二号线', '0871-63106116', '{\"lng\":102.733037,\"lat\":25.052912}');
INSERT INTO `group_shop` VALUES ('2', '【欣都龙城】喜满客影城', '云南省昆明市盘龙区北京路1079号欣都龙城5栋附属3楼', '地铁二号线', '0871-64162001', '{\"lng\":102.739001,\"lat\":25.086619}');
INSERT INTO `group_shop` VALUES ('3', '【新亚洲体育城】妙音KTV', '昆明市官渡区新亚洲体育城9-10号', '地铁二号线', '0871-65026660', '{\"lng\":102.767678,\"lat\":24.945054}');
INSERT INTO `group_shop` VALUES ('4', '【圆通山】圆通国际影城', '云南昆明五华区园西路85号', '地铁三号线', '0871-65188637', '{\"lng\":102.712388,\"lat\":25.061355}');
INSERT INTO `group_shop` VALUES ('5', '【呈贡新城】呈贡影城', '昆明市呈贡县呈贡广场好友来大厦4楼', '地铁二号线', '0871-67433441', '{\"lng\":102.872617,\"lat\":24.871682}');
INSERT INTO `group_shop` VALUES ('6', '【南屏街】纯色视觉', '南屏街时代大厦1120号', '地铁二号线', '18669201886,087163645486', '南屏街时代大厦1120号');

-- ----------------------------
-- Table structure for group_user
-- ----------------------------
DROP TABLE IF EXISTS `group_user`;
CREATE TABLE `group_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(32) NOT NULL COMMENT '邮箱',
  `uname` char(16) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `phone` char(11) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid_UNIQUE` (`uid`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `uname_UNIQUE` (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group_user
-- ----------------------------

-- ----------------------------
-- Table structure for group_userinfo
-- ----------------------------
DROP TABLE IF EXISTS `group_userinfo`;
CREATE TABLE `group_userinfo` (
  `user_id` int(10) unsigned NOT NULL,
  `balance` smallint(6) NOT NULL COMMENT '余额',
  `integral` smallint(6) NOT NULL COMMENT '积分',
  KEY `fk_group_userinfo_group_user1_idx` (`user_id`),
  CONSTRAINT `fk_group_userinfo_group_user1` FOREIGN KEY (`user_id`) REFERENCES `group_user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户信息表,用于保存用户账户余额，积分等数据';

-- ----------------------------
-- Records of group_userinfo
-- ----------------------------

-- ----------------------------
-- Table structure for group_user_address
-- ----------------------------
DROP TABLE IF EXISTS `group_user_address`;
CREATE TABLE `group_user_address` (
  `addressid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `consignee` char(20) NOT NULL,
  `city` char(20) NOT NULL COMMENT '市',
  `province` char(12) NOT NULL COMMENT '省',
  `county` char(12) NOT NULL COMMENT '县',
  `tel` char(12) NOT NULL,
  `street` varchar(120) NOT NULL COMMENT '街道地址',
  `postcode` char(10) NOT NULL,
  PRIMARY KEY (`addressid`),
  KEY `fk_group_user_address_group_user1_idx` (`user_id`),
  CONSTRAINT `fk_group_user_address_group_user1` FOREIGN KEY (`user_id`) REFERENCES `group_user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户收货地址表，一个用户可以有多个收货地址';

-- ----------------------------
-- Records of group_user_address
-- ----------------------------
