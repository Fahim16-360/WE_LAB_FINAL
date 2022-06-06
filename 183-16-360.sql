/*
MySQL Data Transfer
Source Host: localhost
Source Database: 183-16-360
Target Host: localhost
Target Database: 183-16-360
Date: 22-Aug-21 5:11:23 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for item
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) NOT NULL,
  `item_price` int(50) NOT NULL,
  `item_type` varchar(50) NOT NULL,
  `item_code` varchar(35) NOT NULL,
  `item_brand` varchar(50) NOT NULL,
  `item_grams` varchar(20) NOT NULL,
  `manu_date` date DEFAULT NULL,
  `ex_date` date DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for item_image
-- ----------------------------
DROP TABLE IF EXISTS `item_image`;
CREATE TABLE `item_image` (
  `item_id` int(20) NOT NULL AUTO_INCREMENT,
  `item_image` varchar(5000) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `item` VALUES ('1', 'sipons', '4', 'Sugar', '131313', 'Brand Ni Siya', '500ml', '2021-08-22', '2021-08-25');
INSERT INTO `item` VALUES ('2', 'haha', '6', 'Milk', '12321', '12321321', '1232213', '2021-08-22', '2021-08-25');
INSERT INTO `item` VALUES ('3', '111', '8', 'Sevelon', '111', '111', '11', '2021-08-22', '2021-08-25');
INSERT INTO `item` VALUES ('4', 'Lala', '15', 'Crayon', '12321', '12321321', '1232213', '2021-08-22', '2021-08-25');
INSERT INTO `item` VALUES ('6', 'bla', '45', 'bla', '34', 'bj', '4', null, null);
INSERT INTO `item_image` VALUES ('1', '.jpg', 'Ayurvedik');
