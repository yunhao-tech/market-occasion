-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2021-03-14 18:11:36
-- 服务器版本： 10.4.13-MariaDB
-- PHP 版本： 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `occasion_market`
--

-- --------------------------------------------------------

--
-- 表的结构 `articles`
--

CREATE TABLE `articles` (
  `ID` int(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price_uni` int(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  `number` int(64) NOT NULL,
  `date_begin` timestamp NOT NULL DEFAULT current_timestamp(),
  `login_utilisateur` varchar(64) NOT NULL,
  `description` varchar(128) NOT NULL,
  `img_path` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `articles`
--

INSERT INTO `articles` (`ID`, `name`, `price_uni`, `type`, `number`, `date_begin`, `login_utilisateur`, `description`, `img_path`) VALUES
(60, 'Pen', 1, 'School supplies', 5, '2021-03-14 09:23:26', 'tiger', 'Blue color pens, very smooth to use', 'photos/articles_tiger_Pen.jpg'),
(61, 'cuiseur électrique', 25, 'Kitchenware', 1, '2021-03-14 10:11:23', 'bob', 'Tu peux cuisiner le riz avec ce cuiseur :-)\r\nJe l\'ai acheté il y a trois mois en Amazon au prix 50 euros.', 'photos/articles_Bob_cuiseurélectrique.png'),
(62, 'sport shoes', 50, 'Daily necessities', 1, '2021-03-14 15:46:18', 'tiger', 'one pair of Nike\'s sport shoes', 'photos/articles_tiger_sportshoes.jpg'),
(66, 'ipad mini', 100, 'Electronic devices', 1, '2021-03-14 17:01:39', 'rabbit', 'ipad mini, acheté en 2019 au prix 300 euros', 'photos/articles_rabbit_ipadmini.jpg'),
(69, 'écran', 150, 'Electronic devices', 1, '2021-03-14 17:03:56', 'rabbit', 'ecran sony, prix original 300 euros', 'photos/articles_rabbit_écran.jpg'),
(70, 'onions', 1, 'Food', 5, '2021-03-14 17:05:17', 'rabbit', '5 onions, chaque 1 euro ', 'photos/articles_rabbit_onions.png'),
(71, 'poele', 5, 'Kitchenware', 1, '2021-03-14 17:06:11', 'rabbit', 'un Tefal poele', 'photos/articles_rabbit_poele.jpg'),
(72, 'Note de Modal Web developpment ', 2, 'School supplies', 1, '2021-03-14 17:08:42', 'rabbit', 'la note d\'un groupe du Modal Web dev', 'photos/articles_rabbit_NotedeModalWebdeveloppment.jpg'),
(73, 'Jus d\'orange', 2, 'Food', 3, '2021-03-14 17:10:15', 'rabbit', '3 bouteilles de jus d\'orange, chacun 2 euros', 'photos/articles_rabbit_Jusd\'orange.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `typelist`
--

CREATE TABLE `typelist` (
  `type` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `typelist`
--

INSERT INTO `typelist` (`type`) VALUES
('Daily necessities'),
('Electronic devices'),
('Food'),
('Kitchenware'),
('School supplies');

-- --------------------------------------------------------

--
-- 表的结构 `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `login` varchar(64) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `promotion` varchar(32) DEFAULT NULL,
  `img_profile` varchar(64) DEFAULT NULL,
  `type` varchar(32) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `utilisateurs`
--

INSERT INTO `utilisateurs` (`login`, `mdp`, `name`, `lastName`, `email`, `promotion`, `img_profile`, `type`) VALUES
('alice', '663194f2b9123a38cd9e2e2811f8d2fd387b765e', 'Alice', 'ADMIN', 'alice.admin@polytechnique.edu', 'X2019', 'photos/profile_admin.jpg', 'admin'),
('bob', '9cc140dd813383e134e7e365b203780da9376438', 'Bob', 'normal', 'Bob.normal@gmail.com', 'X2020', 'photos/profile_Bob.jpg', 'normal'),
('rabbit', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Arnault', 'Louis', 'louis.arnault@polytechnique.edu', 'X2018', 'photos/profile_rabbit.jpg', 'normal'),
('tiger', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Yunhao', 'chen', 'yunhao.chen@polytechnique.edu', 'X2019', 'photos/profile_tiger.jpg', 'normal'),
('yuhan.xiong', '125908c0d8567f00b27f4ab17c5158de42500387', 'Yuhan', 'XIONG', '937607746@qq.com', 'X2019', 'photos/profile_yuhan.xiong.png', 'normal');

-- --------------------------------------------------------

--
-- 表的结构 `voeuxlist`
--

CREATE TABLE `voeuxlist` (
  `id` int(11) NOT NULL,
  `login_utilisateur` varchar(64) NOT NULL,
  `ID_article` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `voeuxlist`
--

INSERT INTO `voeuxlist` (`id`, `login_utilisateur`, `ID_article`) VALUES
(118, 'bob', 60),
(123, 'tiger', 61);

--
-- 转储表的索引
--

--
-- 表的索引 `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `type` (`type`),
  ADD KEY `articles_ibfk_3` (`login_utilisateur`);

--
-- 表的索引 `typelist`
--
ALTER TABLE `typelist`
  ADD PRIMARY KEY (`type`);

--
-- 表的索引 `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`login`);

--
-- 表的索引 `voeuxlist`
--
ALTER TABLE `voeuxlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_article` (`ID_article`),
  ADD KEY `login_utilisateurs` (`login_utilisateur`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `articles`
--
ALTER TABLE `articles`
  MODIFY `ID` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- 使用表AUTO_INCREMENT `voeuxlist`
--
ALTER TABLE `voeuxlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- 限制导出的表
--

--
-- 限制表 `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`type`) REFERENCES `typelist` (`type`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_ibfk_3` FOREIGN KEY (`login_utilisateur`) REFERENCES `utilisateurs` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `voeuxlist`
--
ALTER TABLE `voeuxlist`
  ADD CONSTRAINT `voeuxlist_ibfk_13` FOREIGN KEY (`ID_article`) REFERENCES `articles` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voeuxlist_ibfk_14` FOREIGN KEY (`login_utilisateur`) REFERENCES `utilisateurs` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
