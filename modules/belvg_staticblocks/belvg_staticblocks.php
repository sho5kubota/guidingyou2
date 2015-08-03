<?php

/*
 * 2007-2012 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 *         DISCLAIMER   *
 * *************************************** */
/* Do not edit or add to this file if you wish to upgrade Prestashop to newer
 * versions in the future.
 * ****************************************************
 * @category   Belvg
 * @package    Belvg_Static Blocks
 * @author     Dzianis Yurevich (dzianis.yurevich@gmail.com)
 * @site       http://module-presta.com
 * @copyright  Copyright (c) 2010 - 2012 BelVG LLC. (http://www.belvg.com)
 * @license    http://store.belvg.com/BelVG-LICENSE-COMMUNITY.txt
 */
 
if (!defined('_PS_VERSION_')) {
    exit;
}

class belvg_staticblocks extends Module
{
    public function __construct()
    {
        $this->name = 'belvg_staticblocks';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'BelVG';
        $this->need_instance = 0;
        $this->module_key = 'cb483701b4cc60dac48b7d5cf3b15118';

        parent::__construct();

        $this->displayName = $this->l('Static Blocks');
        $this->description = $this->l('Static Blocks');
    }

    public function install()
    {
        $sql = array();

        $sql[] =
            'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'belvg_staticblocks` (
              `id_belvg_staticblocks` int(10) unsigned NOT NULL auto_increment,
              `status` int(10) NOT NULL default "1",
              `block_identifier` varchar(255) NOT NULL,
              `date_add` datetime NOT NULL,
              `date_upd` datetime NOT NULL,
              PRIMARY KEY  (`id_belvg_staticblocks`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

        $sql[] =
            'ALTER TABLE  `' . _DB_PREFIX_ . 'belvg_staticblocks`
                ADD UNIQUE  `block_identifier` (  `block_identifier` )';

        $sql[] =
            'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'belvg_staticblocks_shop` (
              `id_belvg_staticblocks` int(10) unsigned NOT NULL auto_increment,
              `id_shop` int(10) unsigned NOT NULL,
              PRIMARY KEY (`id_belvg_staticblocks`, `id_shop`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

        $sql[] =
            'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'belvg_staticblocks_lang` (
              `id_belvg_staticblocks` int(10) unsigned NOT NULL,
              `id_lang` int(10) unsigned NOT NULL,
              `title` varchar(255) NOT NULL,
              `content` text,
              PRIMARY KEY (`id_belvg_staticblocks`,`id_lang`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';
/* theme data [begin] */
		$sql[] = "INSERT INTO `" . _DB_PREFIX_ . "belvg_staticblocks` 
		(`id_belvg_staticblocks`, `status`, `block_identifier`, `date_add`, `date_upd`)
		VALUES 
		(3, 1, 'p1', '2015-02-13 14:33:14', '2015-02-25 14:25:09'),
		(4, 1, 'p2', '2015-02-13 14:34:22', '2015-02-25 15:05:43'),
		(5, 1, 'p3', '2015-02-13 14:46:58', '2015-02-24 13:40:32'),
		(6, 1, 'p4', '2015-02-13 14:47:29', '2015-02-25 14:48:40'),
		(7, 1, 'ib1', '2015-02-16 08:44:16', '2015-02-17 15:30:14'),
		(8, 1, 'ib2', '2015-02-16 08:44:35', '2015-02-17 15:16:03'),
		(9, 1, 'ib3', '2015-02-16 08:44:59', '2015-02-17 15:34:19'),
		(10, 1, 'ib4', '2015-02-16 08:45:19', '2015-02-17 08:10:22'),
		(11, 1, 'sb1', '2015-02-16 08:58:38', '2015-02-26 10:45:14'),
		(12, 1, 'sb2', '2015-02-16 08:58:58', '2015-02-26 10:46:02'),
		(13, 1, 'sb3', '2015-02-16 08:59:16', '2015-02-26 11:08:31'),
		(15, 1, 'foo1', '2015-02-20 10:57:15', '2015-02-20 15:53:43'),
		(17, 1, 'foo2', '2015-02-20 15:15:22', '2015-02-20 15:54:09'),
		(18, 1, 'foo3', '2015-02-20 15:22:41', '2015-02-25 10:53:44'),
		(19, 1, 'discount', '2015-02-20 15:42:55', '2015-02-20 15:49:14'),
		(20, 1, 'promo1', '2015-02-23 13:58:40', '2015-02-24 15:03:34'),
		(21, 1, 'promo2', '2015-02-23 14:24:40', '2015-02-24 14:30:51'),
		(22, 1, 'promo3', '2015-02-23 14:42:18', '2015-02-24 11:28:59'),
		(23, 1, 'poptour-title', '2015-02-23 15:31:46', '2015-02-25 12:53:14'),
		(24, 1, 'promo-title', '2015-02-24 14:34:05', '2015-02-24 15:04:03')";
		$languages = Language::getLanguages();
        foreach ($languages as $language) {
			$sql[] = "INSERT INTO `" . _DB_PREFIX_ . "belvg_staticblocks_lang` 
			(`id_belvg_staticblocks`, `id_lang`, `title`, `content`)
			VALUES
			(3, '" . (int)$language['id_lang'] . "', 'Popular Tours', '<div class=\"popular_tours\">\r\n<div class=\"pop_new_label_wrapper\">\r\n<div class=\"pop_new_label\">NEW!</div>\r\n</div>\r\n<div class=\"pop_label\"><span class=\"pop_label_bold\">11 </span><span class=\"pop_label_thin\">days</span></div>\r\n<div class=\"pop_descr\">Norway Fjords Tour</div>\r\n<div class=\"pop_center_name_wrapper\">\r\n<div class=\"pop_center_name\">Norway</div>\r\n<div class=\"pop_center_name_below\">FjordsTours every Friday</div>\r\n</div>\r\n<div class=\"pop_image_wrapper\"><img src=\"http://belvg.net/helen/prestashop_themes/theme6/prestashop/img/cms/norway3.jpg\" alt=\"\" width=\"832\" height=\"238\" /></div>\r\n<div class=\"popular_text\">\r\n<div class=\"poptour_price_block\">\r\n<div class=\"poptour_price\">$1200 - $1800</div>\r\n<span style=\"padding-left: 15px;\"><strong>8-12</strong> nights flight from Vilnius</span>\r\n<div class=\"pop_rating\"><img src=\"http://belvg.net/helen/prestashop_themes/theme6/prestashop/img/cms/rating.jpg\" alt=\"\" width=\"66\" height=\"18\" /> <button class=\"btn btn-default\" type=\"button\">Shop now !</button></div>\r\n</div>\r\n</div>\r\n</div>'),
			(4, '" . (int)$language['id_lang'] . "', 'Popular Tours', '<div class=\"popular_tours\">\r\n<div class=\"pop_new_label_wrapper\">\r\n<div class=\"pop_new_label\">NEW!</div>\r\n</div>\r\n<div class=\"pop_label\"><span class=\"pop_label_bold\">14 </span><span class=\"pop_label_thin\">days</span></div>\r\n<div class=\"pop_descr\">America tours</div>\r\n<div class=\"pop_center_name_wrapper\">\r\n<div class=\"pop_center_name\">America</div>\r\n<div class=\"pop_center_name_below\">Grand Canyon Tour every week</div>\r\n</div>\r\n<div class=\"pop_image_wrapper\"><img src=\"http://belvg.net/helen/prestashop_themes/theme6/prestashop/img/cms/canyon1.jpg\" alt=\"\" width=\"832\" height=\"238\" /></div>\r\n<div class=\"popular_text\">\r\n<div class=\"poptour_price_block\">\r\n<div class=\"poptour_price\">$3500 - $4200</div>\r\n<span style=\"padding-left: 15px;\"><strong>8-12</strong> nights flight from Vilnius</span>\r\n<div class=\"pop_rating\"><img src=\"http://belvg.net/helen/prestashop_themes/theme6/prestashop/img/cms/rating.jpg\" alt=\"\" width=\"66\" height=\"18\" /><button class=\"btn btn-default\" type=\"button\">Shop now !</button></div>\r\n</div>\r\n</div>\r\n</div>'),
			(5, '" . (int)$language['id_lang'] . "', 'Popular Tours', '<div class=\"popular_tours\">\r\n<div class=\"pop_new_label_wrapper\">\r\n<div class=\"pop_new_label\">NEW!</div>\r\n</div>\r\n<div class=\"pop_label\"><span class=\"pop_label_bold\">8 </span><span class=\"pop_label_thin\">days</span></div>\r\n<div class=\"pop_descr\">Egypt holidays</div>\r\n<div class=\"pop_center_name_wrapper\">\r\n<div class=\"pop_center_name\">Egypt</div>\r\n<div class=\"pop_center_name_below\">Hot tour to Egypt every Friday</div>\r\n</div>\r\n<div class=\"pop_image_wrapper\"><a href=\"module-presta.com\"><img src=\"http://belvg.net/helen/prestashop_themes/theme6/prestashop/img/cms/popegypt.jpg\" alt=\"\" width=\"832\" height=\"238\" /></a></div>\r\n<div class=\"popular_text\">\r\n<div class=\"poptour_price_block\">\r\n<div class=\"poptour_price\">$600 - $1200</div>\r\n<span style=\"padding-left: 15px;\"><strong>8-12</strong> nights flight from Vilnius</span>\r\n<div class=\"pop_rating\"><img src=\"http://belvg.net/helen/prestashop_themes/theme6/prestashop/img/cms/rating.jpg\" alt=\"\" width=\"66\" height=\"18\" /> <button class=\"btn btn-default\" type=\"button\">Shop now !</button></div>\r\n</div>\r\n</div>\r\n</div>'),
			(6, '" . (int)$language['id_lang'] . "', 'Popular Tours', '<div class=\"popular_tours\">\r\n<div class=\"pop_new_label_wrapper\">\r\n<div class=\"pop_new_label\">NEW!</div>\r\n</div>\r\n<div class=\"pop_label\"><span class=\"pop_label_bold\">8 </span><span class=\"pop_label_thin\">days</span></div>\r\n<div class=\"pop_descr\">wild Russia tour</div>\r\n<div class=\"pop_center_name_wrapper\">\r\n<div class=\"pop_center_name\">Russia</div>\r\n<div class=\"pop_center_name_below\">Find the wild Russia Nature</div>\r\n</div>\r\n<div class=\"pop_image_wrapper\"><a href=\"module-presta.com\"><img src=\"http://belvg.net/helen/prestashop_themes/theme6/prestashop/img/cms/bear2.jpg\" alt=\"\" width=\"832\" height=\"238\" /></a></div>\r\n<div class=\"popular_text\">\r\n<div class=\"poptour_price_block\">\r\n<div class=\"poptour_price\">$600 - $1200</div>\r\n<span style=\"padding-left: 15px;\"><strong>8-12</strong> nights flight from Vilnius</span>\r\n<div class=\"pop_rating\"><img src=\"http://belvg.net/helen/prestashop_themes/theme6/prestashop/img/cms/rating.jpg\" alt=\"\"\ width=\"66\" height=\"18\" /> <button class=\"btn btn-default\" type=\"button\">Shop now !</button></div>\r\n</div>\r\n</div>\r\n</div>'),
			(7, '" . (int)$language['id_lang'] . "', 'Info Banner', '<div class=\"ib\"><span class=\"icon-file-photo-o\">&nbsp;</span> &nbsp; <span class=\"ib_title\">VISA SUPPORT</span>&nbsp;in 3 days</div>'),
			(8, '" . (int)$language['id_lang'] . "', 'Info Banner', '<div class=\"ib\"><span class=\"icon-plane\">&nbsp;</span><span class=\"ib_title\"> CHEAP FLIGHTS</span> early booking</div>'),
			(9, '" . (int)$language['id_lang'] . "', 'Info Banner', '<div class=\"ib\"><span class=\"icon-discount\">&nbsp;</span><span class=\"ib_title\"> 20% OFF</span> on all Europe</div>'),
			(10, '" . (int)$language['id_lang'] . "', 'Info Banner', '<div class=\"ib\"><span class=\"icon-phone1\">&nbsp;</span><span class=\"ib_title\"> Need help?</span> +1 800 123 1234</div>'),
			(11, '" . (int)$language['id_lang'] . "', 'Slider Banners', '<div class=\"sb\"><img src=\"http://belvg.net/helen/prestashop_themes/theme6/prestashop/img/cms/family2_1.jpg\" alt=\"\" width=\"367\" height=\"202\" />\r\n<div class=\"sb-title\">Family Tours</div>\r\n<div class=\"sb-mini-text\">Spain, Turkey, Italy Avia Tours</div>\r\n<div class=\"sb-shopnow\"><a href=\"#\">Shop Now</a></div>\r\n</div>'),
			(12, '" . (int)$language['id_lang'] . "', 'Slider Banners', '<div class=\"sb\"><img src=\"http://belvg.net/helen/prestashop_themes/theme6/prestashop/img/cms/worktravel1.jpg\" alt=\"\" width=\"367\" height=\"202\" />\r\n<div class=\"sb-title\">Work&Travel</div>\r\n<div class=\"sb-mini-text\">Travel, Work and Earn Money</div>\r\n<div class=\"sb-shopnow\"><a href=\"#\">Shop Now</a></div>\r\n</div>'),
			(13, '" . (int)$language['id_lang'] . "', 'Slider Banners', '<div class=\"sb-r\"><img src=\"http://belvg.net/helen/prestashop_themes/theme6/prestashop/img/cms/honemoon.jpg\" alt=\"\" width=\"367\" height=\"202\" />\r\n<div class=\"sb-title\">Honeymoon</div>\r\n<div class=\"sb-mini-text\">Mexico, Philippines + Ceremony</div>\r\n<div class=\"sb-shopnow\"><a href=\"#\">Shop Now</a></div>\r\n</div>'),
			(15, '" . (int)$language['id_lang'] . "', 'Footer Banner', '<div class=\"foo_banner wow bounceIn\">\r\n<div class=\"icosearch\">&nbsp;</div>\r\n<div class=\"foo-text\">Search Tours<span class=\"foo-mini\">Lorem ipsum dolor sit amen</span></div>\r\n</div>'),
			(17, '" . (int)$language['id_lang'] . "', 'Footer Banner', '<div class=\"foo_banner wow bounceIn\">\r\n<div class=\"icovisa\">&nbsp;</div>\r\n<div class=\"foo-text\">Easy Visa<span class=\"foo-mini\">Lorem ipsum dolor sit amen</span></div>\r\n</div>'),
			(18, '" . (int)$language['id_lang'] . "', 'Footer Banner', '<div class=\"foo_banner lastfoo wow bounceIn\">\r\n<div class=\"icocall\">&nbsp;</div>\r\n<div class=\"foo-text\">Call Us Now<span class=\"foo-mini\">Free call: 8 (095) 1234-5678</span></div>\r\n</div>'),
			(19, '" . (int)$language['id_lang'] . "', 'Discount Banner', '<div class=\"discount-banner\"><strong>5%</strong> discount for regular clients!<a href=\"#\">Discover</a></div>'),
			(20, '" . (int)$language['id_lang'] . "', 'Promo Banner', '<div class=\"promo_banner\">\r\n<h2>Shop Now</h2>\r\n<div class=\"promo-hr\">&nbsp;</div>\r\n<div class=\"promo_banner_descr\">The Best Theme</div>\r\n<div class=\"promo_banner_descr\">For Travel Agency</div>\r\n</div>'),
			(21, '" . (int)$language['id_lang'] . "', 'Promo Banner', '<div class=\"promo_banner\">\r\n<h2>Responsive</h2>\r\n<div class=\"promo-hr\">&nbsp;</div>\r\n<div class=\"promo_banner_descr\">The Best Theme</div>\r\n<div class=\"promo_banner_descr\">Fits any screen</div>\r\n</div>'),
			(22, '" . (int)$language['id_lang'] . "', 'Promo Banner', '<div class=\"promo_banner\">\r\n<h2>Traveler</h2>\r\n<div class=\"promo-hr\">&nbsp;</div>\r\n<div class=\"promo_banner_descr\">The Best Theme</div>\r\n<div class=\"promo_banner_descr\">For Travel Agency</div>\r\n</div>'),
			(23, '" . (int)$language['id_lang'] . "', 'Poptour tours Title', '<div class=\"poptour-title\">Special Offers</div>'),
			(24, '" . (int)$language['id_lang'] . "', 'Promo Banner Title', '<div class=\"promo-top-title\">Best Offer!</div>')";
						
        }
		/* theme data [end] */
        foreach ($sql as $_sql) {
            Db::getInstance()->Execute($_sql);
        }

        $new_tab = new Tab();
        $new_tab->class_name = 'AdminStaticBlocks';
        $new_tab->id_parent = Tab::getCurrentParentId();
        $new_tab->module = $this->name;
        $languages = Language::getLanguages();
        foreach ($languages as $language) {
            $new_tab->name[$language['id_lang']] = 'Belvg Static Blocks';
        }

        $new_tab->add();

        return parent::install();
    }

    public function uninstall()
    {
        $sql = array();

        $sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'belvg_staticblocks`';
        $sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'belvg_staticblocks_shop`';
        $sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'belvg_staticblocks_lang`';

        foreach ($sql as $_sql) {
            Db::getInstance()->Execute($_sql);
        }

        $idTab = Tab::getIdFromClassName('AdminStaticBlocks');
        if ($idTab) {
            $tab = new Tab($idTab);
            $tab->delete();
        }

        return parent::uninstall();
    }
}
