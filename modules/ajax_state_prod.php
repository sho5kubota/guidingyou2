<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

require_once(dirname(__FILE__).'../../config/config.inc.php');
require_once(dirname(__FILE__).'../../init.php');

$data = array();

$id_country = Country::getIdByName(1,Tools::getValue('country'));
$contain_state = Country::containsStates($id_country);

if($contain_state) {
	$states = State::getStatesByIdCountry($id_country);
	$data['states'] = $states;
}

$data['id_country'] = $id_country;
$data['contain_state'] = $contain_state;

echo json_encode($data);