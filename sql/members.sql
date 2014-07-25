CREATE TABLE `members` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `level` int(4) NOT NULL,
  `last_login` datetime NOT NULL,
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;