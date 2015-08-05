/*Table structure for table `ps_smart_blog_post` */

DROP TABLE IF EXISTS `ps_smart_blog_post`;

CREATE TABLE `ps_smart_blog_post` (
  `id_smart_blog_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_author` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `available` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `viewed` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `comment_status` int(11) DEFAULT NULL,
  `post_type` varchar(45) DEFAULT NULL,
  `image` varchar(245) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_smart_blog_post`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

/*Data for the table `ps_smart_blog_post` */


/*Table structure for table `ps_smart_blog_images` */

DROP TABLE IF EXISTS `ps_smart_blog_images`;

CREATE TABLE `ps_smart_blog_images` (
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  `id_smart_blog_post` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `img_name` varchar(255) DEFAULT NULL,
  `cover` int(11) NOT NULL,
  PRIMARY KEY (`id_img`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ps_smart_blog_images` */