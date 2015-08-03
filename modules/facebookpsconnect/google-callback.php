<?php
/**
 * google-callback.php file execute module for Front Office
 * @author Business Tech (www.businesstech.fr) - Contact: http://www.businesstech.fr/en/contact-us
 * @category ws collection
 * @license Business Tech
 * @uses Please read included installation and configuration instructions (PDF format)
 */

require_once(dirname(__FILE__) . '/../../config/config.inc.php');
require_once(dirname(__FILE__) . '/../../init.php');
require_once(dirname(__FILE__) . '/facebookpsconnect.php');


// instantiate
$oModule = new FacebookPsConnect();

// execute google connector
echo $oModule->HookConnectorCallback(array('connector' => 'google', 'activecallback' => true, 'code' => Tools::getValue('code')));