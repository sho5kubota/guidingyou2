<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
require_once(dirname(__FILE__).'../../config/config.inc.php');
require_once(dirname(__FILE__).'../../init.php');

$sellerId = $_GET['seller_id'];

$path = '..' . DS . 'img' . DS . 'as' . DS . $sellerId . '_license';

if (!file_exists($path)) {
    mkdir($path, 0755, true);
}


if(isset($_FILES['license'])) {

	$tmp_name = $_FILES['license']['tmp_name'][0];

	// insert data without name
	Db::getInstance(_PS_USE_SQL_SLAVE_)->Execute("
		INSERT INTO " . _DB_PREFIX_ . "sellerinfo_license (seller_id)
		VALUES ('$sellerId')
	");

	$lastInsertId = Db::getInstance()->Insert_ID();

	$name =  $sellerId . '-' . $lastInsertId .'.jpg';

	// update name
	Db::getInstance(_PS_USE_SQL_SLAVE_)->Execute("
		UPDATE " . _DB_PREFIX_ . "sellerinfo_license sl
		SET sl.`name` = '$name'
		WHERE sl.`id` = $lastInsertId AND sl.`seller_id` = '$sellerId'
	");


	$newUpload = $path . DS . $name;


	move_uploaded_file($tmp_name, $newUpload);

}