/*
 Navicat Premium Data Transfer

 Source Server         : test
 Source Server Type    : MySQL
 Source Server Version : 50739
 Source Host           : 43.140.211.149:3306
 Source Schema         : demo

 Target Server Type    : MySQL
 Target Server Version : 50739
 File Encoding         : 65001

 Date: 16/12/2022 11:49:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `num` int(10) UNSIGNED NOT NULL,
  `small_pic` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES (19, 'Dining chair', 79, 1, 'https://muti.cvun.net/assets/g3.png');
INSERT INTO `cart` VALUES (20, 'Folding small round table', 149, 1, 'http://muti.cvun.net/assets/g2.png');
INSERT INTO `cart` VALUES (21, 'The Stool', 49, 1, 'http://muti.cvun.net/assets/g1.png');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `designer` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `small_pic` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `big_pic` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `imgurl` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (1, 'The Stool', 'Kiki', 49, 'g1', 'd1', './assets/g1.png', 'Stool');
INSERT INTO `product` VALUES (2, 'Folding small round table', 'Wind', 149, 'g2', 'd2', './assets/g2.png', 'Table');
INSERT INTO `product` VALUES (3, 'Dining chair', 'Wind', 79, 'g3', 'd3', './assets/g3.png', 'Chair');
INSERT INTO `product` VALUES (4, 'The fluffy sofa', 'Vivi', 79, 'g4', 'd4', './assets/g4.png', 'Sofa');
INSERT INTO `product` VALUES (5, 'Metal dining chair', 'Vivi', 69, 'g5', 'd5', './assets/g5.png', 'Chair');
INSERT INTO `product` VALUES (6, 'Japanese dining chair', 'Wawa', 29, 'g6', 'd6', './assets/g6.png', 'Chair');
INSERT INTO `product` VALUES (7, '”Coin“ tables', '', 159, 'g10', 'd10', './assets/g10.png', 'Table');
INSERT INTO `product` VALUES (8, 'Waves table', '', 229, 'g11', 'd11', './assets/g11.png', 'Table');
INSERT INTO `product` VALUES (9, 'Chinese stool', '', 99, 'g12', 'd12', './assets/g12.png', 'Stool');
INSERT INTO `product` VALUES (10, 'Lola sofa', '', 119, 'g8', 'd8', './assets/g8.png', 'Sofa');
INSERT INTO `product` VALUES (11, 'The \"Burger\" sofa', '', 179, 'g9', 'd9', './assets/g9.png', 'Sofa');
INSERT INTO `product` VALUES (12, 'Swimming ring sofa', '', 139, 'g7', 'd7', './assets/g7.png', 'Sofa');

SET FOREIGN_KEY_CHECKS = 1;
