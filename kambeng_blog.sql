CREATE TABLE IF NOT EXISTS `acl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(100) DEFAULT NULL,
  `groupId` int(11) DEFAULT NULL,
  `rule` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Editor');
CREATE TABLE IF NOT EXISTS `tblimage` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `link` text NOT NULL,
  `source` text NOT NULL,
  `aksesable` text NOT NULL,
  `size` text NOT NULL,
  `date_added` datetime NOT NULL,
  `srcx` text NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
INSERT INTO `tblimage` (`pid`, `uid`, `link`, `source`, `aksesable`, `size`, `date_added`, `srcx`) VALUES
(1, 0, 'generic', 'image_generic_404.jpg', '1', '1024x1024', '2015-12-23 00:00:00', 'generic404');
CREATE TABLE IF NOT EXISTS `tblpost` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL COMMENT 'Cover ID',
  `uid` int(11) NOT NULL COMMENT 'User ID',
  `published` int(11) NOT NULL,
  `uniq_url` text NOT NULL,
  `title` text NOT NULL,
  `content` mediumtext NOT NULL,
  `meta_tag` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
INSERT INTO `tblpost` (`pid`, `cid`, `uid`, `published`, `uniq_url`, `title`, `content`, `meta_tag`, `date_created`, `date_modified`) VALUES
(2, 1, 1, 1, 'ganbatte_kudasaii2', 'Aku Kerh2en', 'Yuhuu~ hoho la2la. Lele Bangkong', '', '2015-12-18 00:00:00', '2015-12-18 00:00:00'),
(3, 1, 1, 1, 'asdz', 'asd', 'asd', 'asdsa', '2015-12-18 00:00:00', '2015-12-18 00:00:00'),
(4, 1, 1, 1, 'asd', 'asd', 'asd', 'asdsa', '2015-12-18 00:00:00', '2015-12-18 00:00:00');
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `kelamin` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_belakang` text NOT NULL,
  `nama_depan` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `ppid` int(11) NOT NULL COMMENT 'Profile Picture ID',
  `groupId` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `regdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
INSERT INTO `users` (`id`, `email`, `kelamin`, `password`, `nama_belakang`, `nama_depan`, `tgl_lahir`, `ppid`, `groupId`, `name`, `regdate`) VALUES
(1, 'aku@kekesed.gq', 0, '$2y$14$2a0d4970a1d6d7b654ec5uLs7VsRvwJTTAhSPAQFvQQrU2iGbCGvu', 'Hayashi', 'Tsuyosu', '0000-00-00', 1, '1', 'admin', '2015-12-24 00:00:00');
