<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

require_once(dirname(__FILE__).'../../config/config.inc.php');
require_once(dirname(__FILE__).'../../init.php');

if(isset($_POST)) {

	$id_seller 	= $_POST['id_seller'];
	$name 		= $_POST['name'];
	$id 		= $_POST['id'];

	$path = '..' . DS . 'img' . DS . 'as' . DS . $id_seller . '_license';

	Db::getInstance(_PS_USE_SQL_SLAVE_)->Execute("
		UPDATE " . _DB_PREFIX_ . "sellerinfo_license
		SET del_flg = 1 
		WHERE id = $id AND seller_id = $id_seller
	");
	

	$data = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS("
		SELECT * 
		FROM " . _DB_PREFIX_ . "sellerinfo_license
		WHERE del_flg = 1 AND seller_id = $id_seller
	");

	die(json_encode($data));
}