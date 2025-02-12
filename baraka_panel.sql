-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 12 Şub 2025, 12:17:03
-- Sunucu sürümü: 9.1.0
-- PHP Sürümü: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `baraka_panel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `abouts_id` int NOT NULL AUTO_INCREMENT,
  `abouts_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `abouts_slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `abouts_content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `abouts_must` int NOT NULL,
  PRIMARY KEY (`abouts_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `abouts`
--

INSERT INTO `abouts` (`abouts_id`, `abouts_title`, `abouts_slug`, `abouts_content`, `abouts_must`) VALUES
(18, 'vizyon', 'vizyon', '', 1),
(21, 'hakkimizda', 'hakkimizda', '', 2),
(14, 'Misyon', 'misyon', '<p>Hello World</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admins_id` int NOT NULL AUTO_INCREMENT,
  `admins_namesurname` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `admins_file` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `admins_username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `admins_pass` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `admins_status` enum('0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `admins_must` int NOT NULL,
  `admins_roles` enum('0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  PRIMARY KEY (`admins_id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`admins_id`, `admins_namesurname`, `admins_file`, `admins_username`, `admins_pass`, `admins_status`, `admins_must`, `admins_roles`) VALUES
(67, 'Hüseyin Selen', '66ede2e879381.jpg', 'Hüseyin', 'f7c10fe140023c3939bbf1520b6f4acb', '1', 0, '1'),
(71, 'Mehmet Selen', '66ede3f6bfdaf.png', 'Mehmet', 'a746ec2539a82a2899f0b3905d488a89', '1', 0, '0'),
(72, 'Ali Muğlalı', '66ee8c4dca90d.jpg', 'Ali', 'd2558d9977bd9d56310afa6758a708ce', '1', 0, '0'),
(73, 'user', '66f0175f533ee.jpg', 'user', '81dc9bdb52d04dc20036dbd8313ed055', '1', 0, '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `blogs_id` int NOT NULL AUTO_INCREMENT,
  `blogs_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blogs_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `blogs_slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `blogs_file` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `blogs_content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `blogs_must` int NOT NULL,
  PRIMARY KEY (`blogs_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `blogs`
--

INSERT INTO `blogs` (`blogs_id`, `blogs_time`, `blogs_title`, `blogs_slug`, `blogs_file`, `blogs_content`, `blogs_must`) VALUES
(13, '2024-08-25 11:12:14', 'deneme', 'deneme', '66cae75eb8865.jpg', '<p>deneme</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `drinks`
--

DROP TABLE IF EXISTS `drinks`;
CREATE TABLE IF NOT EXISTS `drinks` (
  `drinks_id` int NOT NULL AUTO_INCREMENT,
  `drinks_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `drinks_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `drinks_slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `drinks_file` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `drinks_content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `drinks_must` int NOT NULL,
  `drinks_price` int NOT NULL,
  PRIMARY KEY (`drinks_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `drinks`
--

INSERT INTO `drinks` (`drinks_id`, `drinks_time`, `drinks_title`, `drinks_slug`, `drinks_file`, `drinks_content`, `drinks_must`, `drinks_price`) VALUES
(11, '2024-09-08 23:49:42', 'Kutu Fanta', 'kutu-fanta', '66de0de61066a.jpg', '<p>Buz gibi kutu fanta</p>\r\n', 1, 50),
(12, '2024-09-08 23:51:43', 'Kutu Kola', 'kutu-kola', '66de0f38ed7de.jpg', '<p>Buz gibi kutu kola</p>\r\n', 0, 50),
(13, '2024-09-08 23:53:59', 'Şeftalili Kutu Cappy', '艦eftalili-kutu-cappy', '66de0ee7208de.jpg', '<p>Buz gibi şeftalili kutu cappy</p>\r\n', 2, 50),
(14, '2024-09-08 23:57:12', 'Vişneli Kutu Cappy', 'viеџneli-kutu-cappy', '66de0fa83a193.jpg', '<p>Buz gibi vişneli kutu cappy</p>\r\n', 3, 50),
(15, '2024-09-09 00:00:47', 'Şeftalili Kutu Ice Tea ', '艦eftalili-kutu-ice-tea', '66de107fab515.jpg', '<p>Buz gibi şeftalili kutu ice tea</p>\r\n', 4, 50),
(16, '2024-09-09 00:01:57', 'Mangolu Kutu Ice Tea', 'mangolu-kutu-ice-tea', '66de10c518acb.jpg', '<p>Buz gibi kutu mangolu ice tea</p>\r\n', 5, 50),
(17, '2024-09-09 00:04:12', 'Niğde Gazozu', 'niﾄ歸e-gazozu', '66de114cd95d0.jpg', '<p>Buz gibi Niğde Gazozu</p>\r\n', 7, 35),
(18, '2024-09-09 00:05:21', 'Limonlu Soda', 'limonlu-soda', '66de11912aecd.jpg', '<p>Buz gibi limonlu soda</p>\r\n', 9, 25),
(19, '2024-09-09 00:07:40', 'Sade Soda', 'sade-soda', '66de12cbc6126.jpg', '<p>Buz gibi sade soda&nbsp;</p>\r\n', 8, 20),
(20, '2024-09-09 00:16:03', 'Ayran', 'ayran', '66de143639463.jpg', '<p>Buz gibi k&uuml;&ccedil;&uuml;k ayran</p>\r\n', 6, 20),
(21, '2024-09-09 00:18:10', 'Su', '卵', '66de149255f1e.jpg', '<p>Buz gibi k&uuml;&ccedil;&uuml;k su</p>\r\n', 10, 15),
(22, '2024-09-09 00:22:23', 'Sallama Çay', 'sallama-cay', '66de158f511dc.jpg', '<p>Karton bardakta 1 adet sallama &ccedil;ay&nbsp;</p>\r\n', 11, 25),
(23, '2024-09-09 00:24:33', 'Enerji İçeceği', 'enerji-ﾄｰﾃｧeceﾄ殃', '66de16112a21d.jpg', '<p>Burn kutu enerji i&ccedil;eceği</p>\r\n', 15, 75),
(24, '2024-09-09 00:27:25', 'Nescafe', 'nescafe', '66de16bd50587.jpg', '<p>Cam bardakta, 3&#39;&uuml; 1 arada ve 2&#39;si 1 arada se&ccedil;enekleriyle...</p>\r\n', 13, 40),
(25, '2024-09-09 00:28:50', 'Demlik Çay ', 'demlik-cay', '66de17126f7b6.jpg', '<p>&Ccedil;ay sevenler i&ccedil;in demlik &ccedil;ay&nbsp;</p>\r\n', 12, 250),
(28, '2024-09-09 00:32:22', 'Türk Kahvesi', 'turk-kahvesi', '66de183e89214.jpg', '<p>Ayıltan T&uuml;rk Kahvesi</p>\r\n', 14, 50);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `foods`
--

DROP TABLE IF EXISTS `foods`;
CREATE TABLE IF NOT EXISTS `foods` (
  `foods_id` int NOT NULL AUTO_INCREMENT,
  `foods_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foods_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `foods_slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `foods_file` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `foods_content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `foods_must` int NOT NULL,
  `foods_price` int NOT NULL,
  PRIMARY KEY (`foods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `foods`
--

INSERT INTO `foods` (`foods_id`, `foods_time`, `foods_title`, `foods_slug`, `foods_file`, `foods_content`, `foods_must`, `foods_price`) VALUES
(14, '2024-09-09 00:49:30', 'Yarım Ekmek Karışık Tost', 'yard-m-ekmek-kard-еџd-k-tost', '66de1bea62866.jpg', '<p>Sucuk, salam, kaşar peyniri, domates, ket&ccedil;ap ve mayonez</p>\r\n', 0, 150),
(15, '2024-09-09 00:52:53', 'Yarım Ekmek Arası Sucuk ', 'yar脹m-ekmek-aras脹-sucuk', '66de22e093822.jpg', '<p>Kasap sucuk, kaşar ve domates</p>\r\n', 1, 150),
(16, '2024-09-09 00:54:28', 'Sucuklu Yumurta', 'sucuklu-yumurta', '66de1d14029a2.jpg', '<p>Mis gibi sucuklu yumurta</p>\r\n', 4, 175),
(17, '2024-09-09 01:04:59', 'Kızarmış Patates', 'kizarmis-patates', '66ede411908c6.png', '<p>3 adet patates i&ccedil;erir , ket&ccedil;ap ve mayonez ile servis edilir</p>\r\n', 3, 200),
(18, '2024-09-09 01:05:55', 'Kaşarlı Tost', 'kaеџarld-tost', '66de1fc313450.jpg', '<p>Bol kaşarlı tost</p>\r\n', 2, 125),
(19, '2024-09-09 01:07:07', 'Melemen', 'melemen', '66de200bd3418.jpg', '<p>Leziz melemen</p>\r\n', 5, 175);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `roles_id` int NOT NULL AUTO_INCREMENT,
  `roles_username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `roles_password` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `roles_status` enum('0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  PRIMARY KEY (`roles_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `roles`
--

INSERT INTO `roles` (`roles_id`, `roles_username`, `roles_password`, `roles_status`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `settings_id` int NOT NULL AUTO_INCREMENT,
  `settings_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `settings_key` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `settings_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `settings_type` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `settings_must` int NOT NULL,
  `settings_delete` enum('0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `settings_status` enum('0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`settings_id`, `settings_description`, `settings_key`, `settings_value`, `settings_type`, `settings_must`, `settings_delete`, `settings_status`) VALUES
(3, 'Site Logo', 'logo', '66ccd557a56a1.jpeg', 'file', 0, '0', '1'),
(11, 'Facebook Hesabı', 'facebook', 'https://www.facebook.com/mehmet.selen1', 'text', 9, '0', '1'),
(21, 'Site Logo', 'logo_text', 'GEZİNTİ BÜFE', 'text', 1, '0', '1'),
(25, 'X Hesabı', 'X', 'https://x.com/gezintibufe', 'text', 9, '0', '1'),
(26, 'TikTok Hesabı', 'tiktok', 'https://www.tiktok.com/@mehmet_selen', 'text', 9, '0', '1'),
(27, 'Site Başlık', 'title', 'İzturun Vazgeçilmez Büfesine Hoşgeldiniz!', 'text', 0, '0', '1'),
(24, 'İnstagram Hesabı', 'instagram', 'https://www.instagram.com/gezintibufe/', 'text', 9, '0', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `sliders_id` int NOT NULL AUTO_INCREMENT,
  `sliders_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `sliders_file` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `sliders_must` int NOT NULL,
  PRIMARY KEY (`sliders_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `sliders`
--

INSERT INTO `sliders` (`sliders_id`, `sliders_title`, `sliders_file`, `sliders_must`) VALUES
(11, 'Hoşgeldiniz!', '66ede4ad8b304.jpeg', 3),
(26, 'Hoşgeldiniz!', '66dd69ee08559.jpeg', 0),
(28, 'Hoşgeldiniz!', '66dd6a7843cf9.jpeg', 1),
(29, 'Hoşgeldiniz!', '66dd6ab6eb522.jpeg', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sunbeds`
--

DROP TABLE IF EXISTS `sunbeds`;
CREATE TABLE IF NOT EXISTS `sunbeds` (
  `sunbeds_id` int NOT NULL AUTO_INCREMENT,
  `sunbeds_time` datetime NOT NULL,
  `sunbeds_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `sunbeds_slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `sunbeds_file` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `sunbeds_content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `sunbeds_must` int NOT NULL,
  `sunbeds_price` int NOT NULL,
  PRIMARY KEY (`sunbeds_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `sunbeds`
--

INSERT INTO `sunbeds` (`sunbeds_id`, `sunbeds_time`, `sunbeds_title`, `sunbeds_slug`, `sunbeds_file`, `sunbeds_content`, `sunbeds_must`, `sunbeds_price`) VALUES
(24, '0000-00-00 00:00:00', 'Şezlong Takımı', 'sezlong-takimi', '66ede482c7a62.jpeg', '<p>2 adet şezlong 1 adet şemsiye&nbsp;</p>\r\n', 0, 300);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int NOT NULL AUTO_INCREMENT,
  `users_namesurname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `users_file` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `users_mail` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `users_pass` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `users_status` enum('0','1') CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `users_must` int NOT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`users_id`, `users_namesurname`, `users_file`, `users_mail`, `users_pass`, `users_status`, `users_must`) VALUES
(28, 'admin', '66caf32b9a74d.jpg', 'admin', 'f7c10fe140023c3939bbf1520b6f4acb', '1', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
