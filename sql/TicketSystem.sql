/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : 127.0.0.1:3306
 Source Schema         : TicketSystem

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 19/08/2019 09:52:24
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
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hastag
-- ----------------------------
INSERT INTO `hastag` VALUES (10, 'keyword1', 1, '2019-08-11 01:04:37', '2019-08-11 01:05:23', '2019-08-11 00:00:00');
INSERT INTO `hastag` VALUES (11, 'keyword2', 1, '2019-08-11 01:04:37', '2019-08-11 01:05:23', '2019-08-11 00:00:00');
INSERT INTO `hastag` VALUES (12, 'keyword1', 1, '2019-08-11 01:05:23', NULL, NULL);
INSERT INTO `hastag` VALUES (13, 'keyword2 ', 1, '2019-08-11 01:05:23', NULL, NULL);
INSERT INTO `hastag` VALUES (14, 'keyword3', 2, '2019-08-11 03:38:47', '2019-08-11 03:38:50', '2019-08-11 00:00:00');
INSERT INTO `hastag` VALUES (15, 'keyword2', 2, '2019-08-11 03:38:50', NULL, NULL);
INSERT INTO `hastag` VALUES (16, 'keyword1', 1, '2019-08-17 23:39:42', NULL, NULL);
INSERT INTO `hastag` VALUES (21, 'sss', 13, '2019-08-18 22:36:54', '2019-08-18 22:36:54', NULL);
INSERT INTO `hastag` VALUES (22, 'ddd', 13, '2019-08-18 22:36:54', '2019-08-18 22:36:54', NULL);
INSERT INTO `hastag` VALUES (23, 'key1', 14, '2019-08-18 22:42:13', '2019-08-18 22:42:13', NULL);
INSERT INTO `hastag` VALUES (24, 'key2', 14, '2019-08-18 22:42:13', '2019-08-18 22:42:13', NULL);
INSERT INTO `hastag` VALUES (25, 'key3', 14, '2019-08-18 22:42:13', '2019-08-18 22:42:13', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subTicket
-- ----------------------------
INSERT INTO `subTicket` VALUES (1, 4, '<p>replll</p><p>sss</p>', 1, '2019-08-17 13:33:55', '2019-08-17 13:33:55', NULL);
INSERT INTO `subTicket` VALUES (2, 4, '<p>test</p>', 1, '2019-08-17 13:36:31', '2019-08-17 13:36:31', NULL);
INSERT INTO `subTicket` VALUES (3, 4, '<p>bu bir denemedir son</p>', 1, '2019-08-17 14:12:12', '2019-08-17 14:12:12', NULL);
INSERT INTO `subTicket` VALUES (4, 4, '<p>tst</p>', 1, '2019-08-17 20:38:36', '2019-08-17 20:38:36', NULL);
INSERT INTO `subTicket` VALUES (5, 3, '<p>Şunu deneyin...</p>', 1, '2019-08-17 22:40:59', '2019-08-17 22:40:59', NULL);
INSERT INTO `subTicket` VALUES (6, 2, '<p>tst3</p>', 1, '2019-08-17 23:06:58', '2019-08-17 23:06:58', NULL);
INSERT INTO `subTicket` VALUES (7, 2, '<p>dddd</p>', 1, '2019-08-17 23:14:41', '2019-08-17 23:14:41', NULL);
INSERT INTO `subTicket` VALUES (8, 2, '<p>nn</p>', 1, '2019-08-17 23:14:59', '2019-08-17 23:14:59', NULL);
INSERT INTO `subTicket` VALUES (9, 2, '<p>son mesaj</p>', 1, '2019-08-17 23:16:01', '2019-08-17 23:16:01', NULL);
INSERT INTO `subTicket` VALUES (10, 1, '<p>Tamamdır sorun çözüldü</p>', 1, '2019-08-18 00:46:20', '2019-08-18 00:46:20', NULL);
INSERT INTO `subTicket` VALUES (11, 4, '', 1, '2019-08-18 01:15:57', '2019-08-18 01:15:57', NULL);
INSERT INTO `subTicket` VALUES (12, 4, '<p>son</p>', 1, '2019-08-18 13:21:47', '2019-08-18 13:21:47', NULL);
INSERT INTO `subTicket` VALUES (13, 5, '<p>Deneme</p>', 1, '2019-08-18 21:43:44', '2019-08-18 21:43:44', NULL);
INSERT INTO `subTicket` VALUES (14, 2, '<p>Sorununuz çözüldü mü &nbsp;acaba ?</p>', 1, '2019-08-18 21:44:44', '2019-08-18 21:44:44', NULL);
INSERT INTO `subTicket` VALUES (15, 2, '<p>Rica ederim iyi çalışmalar..</p>', 1, '2019-08-18 21:45:13', '2019-08-18 21:45:13', NULL);
INSERT INTO `subTicket` VALUES (16, 5, '<p>ticket kapandı</p>', 1, '2019-08-18 22:08:53', '2019-08-18 22:08:53', NULL);

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
  `inserted_at` datetime(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` datetime(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `deleted_at` datetime(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ticket
-- ----------------------------
INSERT INTO `ticket` VALUES (1, 'Panele Giriş Yapamıyorum', 'Merhablar, 195. İp adresli sunumun plesk paneline erişemiyorumM', 'ACİL', 'BEKLİYOR', 1, '2019-08-10 14:06:11.000000', '2019-08-18 01:15:57.000000', NULL);
INSERT INTO `ticket` VALUES (2, 'Panele Giriş Hatası', 'Merhablar, 195. İp adresli sunumun plesk paneline erişemiyorum', 'ÖNCELİKLİ', 'TAMAMLANDI', 2, '2019-08-10 14:06:11.000000', '2019-08-18 21:45:13.000000', NULL);
INSERT INTO `ticket` VALUES (3, 'Paneli Kapattıkk', 'Merhablar, 195. İp adresli sunumun plesk paneline erişemiyorum', 'ÖNCELİKLİ', 'İŞLEME BAŞLANDI', 2, '2019-08-10 14:06:11.000000', '2019-08-18 01:15:57.000000', NULL);
INSERT INTO `ticket` VALUES (14, '7 gunden fazla', '7 günden fazla', 'ACİL', 'BEKLİYOR', NULL, '2019-08-18 22:42:13.475255', '2019-08-18 22:42:13.475255', NULL);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_type` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'ef2625d3a1c35560c0bddac4b5cd99d2', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
