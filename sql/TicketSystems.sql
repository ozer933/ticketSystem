/*
 Navicat MySQL Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : 127.0.0.1:3306
 Source Schema         : TicketSystem

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 18/08/2019 21:04:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for hastag
-- ----------------------------
DROP TABLE IF EXISTS `hastag`;
CREATE TABLE `hastag`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ticket_id` int(11) NULL DEFAULT NULL,
  `inserted_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for subTicket
-- ----------------------------
DROP TABLE IF EXISTS `subTicket`;
CREATE TABLE `subTicket`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `up_ticket_id` int(11) NOT NULL,
  `reply` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `inserted_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ticket
-- ----------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `question_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `emergency_status` enum('ACİL','ÖNCELİKLİ','NORMAL') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `transaction_status` enum('BEKLİYOR','İŞLEME BAŞLANDI','TAMAMLANDI') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'BEKLİYOR',
  `user_id` int(11) NULL DEFAULT NULL,
  `inserted_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_type` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for userPermissions
-- ----------------------------
DROP TABLE IF EXISTS `userPermissions`;
CREATE TABLE `userPermissions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `servicename` enum('ALL','ALTBAND','ALTBAND-TEST','EVERMOBY','GAME10','GAMEOFMOBI','HAVAYIKOKLAYANADAM','HIGHQUALITY','KAMUBILGI','KAZANDIRANSORULAR','MOBILSORGULAMA-EKO','MOBILSORGULAMA-SUPER','NUMARABIL-EKO','NUMARABIL-SUPER','SOSYALDUNYA','SPORTMAX','SPORTMAX-IVR','TVMESAJ','VIDYOMOBI') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
