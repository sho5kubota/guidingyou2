<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

require_once(dirname(__FILE__).'../../config/config.inc.php');
require_once(dirname(__FILE__).'../../init.php');

$id_seller = $_POST['id_seller'];
$language_id = $_POST['key'];

$data = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow(
	'SELECT `s`.`language`, `s`.`language_level`  
	 FROM '._DB_PREFIX_.'sellerinfo s 
	 WHERE id_sellerinfo = '.$id_seller
);

$lang = array();

$language = explode(',',$data['language']);
$language_level = explode(',', $data['language_level']);

unset($language[$language_id]);
unset($language_level[$language_id]);

// Reset Keys
$language_new = array_values($language);
$language_level_new = array_values($language_level);

$language = implode(',', $language);
$language_level = implode(',', $language_level);

$lang['language'] = $language_new;
$lang['language_level'] = $language_level;

$update = Db::getInstance(_PS_USE_SQL_SLAVE_)->execute('
			UPDATE '._DB_PREFIX_.'sellerinfo s
			SET `s`.`language` =\''. $language .'\', `s`.`language_level` =\''. $language_level .'\'
			WHERE id_sellerinfo = '.$id_seller
);

echo json_encode($lang);
