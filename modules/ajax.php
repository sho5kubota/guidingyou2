<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
require_once(dirname(__FILE__).'../../config/config.inc.php');
require_once(dirname(__FILE__).'../../init.php');

$sellerId = $_GET['seller_id'];

if(isset($_FILES['logo'])) {
	$sellerId = $_GET['seller_id'];
	$tmp_name = $_FILES['logo']['tmp_name'][0];

	$path = '..' . DS . 'img' . DS . 'as' . DS . $sellerId;

	$currentImages = getImages($path);

	// insert data without name
	Db::getInstance(_PS_USE_SQL_SLAVE_)->Execute("
		INSERT INTO " . _DB_PREFIX_ . "sellerinfo_logo (seller_id)
		VALUES ('$sellerId')
	");

	$lastInsertId = Db::getInstance()->Insert_ID();

	$name =  $sellerId . '-' . $lastInsertId .'.jpg';

	// update name
	Db::getInstance(_PS_USE_SQL_SLAVE_)->Execute("
		UPDATE " . _DB_PREFIX_ . "sellerinfo_logo sl
		SET sl.`img_name` = '$name'
		WHERE sl.`id` = $lastInsertId AND sl.`seller_id` = '$sellerId'
	");


	$newUpload = $path . DS . $name;

	if (!file_exists($path)) {
    	mkdir($path, 0755, true);
	}

	move_uploaded_file($tmp_name, $newUpload);

	
} else {
	$id = $_POST['id_data'];
	$sellerId = $_POST['seller_id'];
}

$path = '..' . DS . 'img' . DS . 'as' . DS . $sellerId;


if(isset($_POST['process'])) {

	// Process 1 = Rename images (Setting active image)
	if($_POST['process'] == 1) {

		// set all image active = 0
		Db::getInstance(_PS_USE_SQL_SLAVE_)->Execute("
			UPDATE " . _DB_PREFIX_ . "sellerinfo_logo
			SET active = 0
			WHERE seller_id = $sellerId
		");

		// set active img
		Db::getInstance(_PS_USE_SQL_SLAVE_)->Execute("
			UPDATE " . _DB_PREFIX_ . "sellerinfo_logo
			SET active = 1
			WHERE id = $id
		");

		$currentImages = getImages($path);
		
		$activeImage = $path . DS . $sellerId . '-' . $id .'.jpg';
		// New Active Image
		$activeImageNew =  $path . DS . $sellerId . '-' . $id .'-active.jpg';

		$originalActive = $path . DS . getActiveImg($currentImages);

		$removeActive = $path . DS . removeActive(getActiveImg($currentImages));

		// Set the Active Image
		rename($activeImage, $activeImageNew);
		// remove active image
		rename($originalActive, $removeActive);
	}


	if($_POST['process'] == 2) {

		// delete data in the database
		Db::getInstance(_PS_USE_SQL_SLAVE_)->Execute("
			DELETE FROM " . _DB_PREFIX_ . "sellerinfo_logo WHERE id = $id
		");


		// Delete file (Not Active)
		$images = explode("/", $_POST['url']);
		$image = end($images);
		$file = $path . DS . $image;

		// Delete File (Active)
		$image2 = explode(".jpg", $image);
		@$img = $image2[0] . '-active.jpg';
		@$fileActive = $path . DS . $img;

		// Delete FUnction
		if(file_exists($file))
			unlink($file);
		else 
			unlink($fileActive);

		$imagesArray = array();
		$remainingImages = scandir($path);
		unset($remainingImages[0]);
		unset($remainingImages[1]);
		$remainingImages = array_values($remainingImages);

		// Get Id
		foreach($remainingImages as $k => $v) {
			$img = explode("-", $v);
			if (strpos($img[1],'jpg') !== false)
				$id = substr($img[1], 0, -4);
			else
				$id = $img[1];

			$imagesArray['image'][$id] = $v;
		}

		$imagesArray['seller_id'] = $sellerId;

		echo json_encode($imagesArray);
	}

}
function getImages($path) {
	$currentImages = scandir($path);
	unset($currentImages[0]);
	unset($currentImages[1]);
	$currentImages = array_values($currentImages);

	return $currentImages;
}

/**
 * Function for getting Active Image
 * @param  Array  $images [list of images]
 * @return [String]         [active image]
 */

function getActiveImg(Array $images) {

	foreach($images as $k => $v) {
		$img = explode('-', $v);
		$lastExtension = end($img);
		if($lastExtension == 'active.jpg')
			$active = $v;
	}

	return $active;
}

/**
 * Function for removing active suffix
 * @param  [String] $img Image name
 * @return [String] removed active suffix
 */

function  removeActive($img) {
	$i = explode('-active', $img);
	$image = $i[0] . '.jpg';
	return $image;
}
