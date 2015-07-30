<?php
///-build_id: 2015022208.5429
/// This source file is subject to the Software License Agreement that is bundled with this 
/// package in the file license.txt, or you can get it here
/// http://addons-modules.com/en/content/3-terms-and-conditions-of-use
///
/// @copyright  2009-2012 Addons-Modules.com
///  If you need open code to customize or merge code with othe modules, please contact us.
include_once(dirname(__FILE__).'/../../config/config.inc.php');
include_once(dirname(__FILE__).'/../../init.php');
include_once(dirname(__FILE__).'/agilepaypal.php');
include_once(dirname(__FILE__).'/AgilePaypalTxn.php');

@session_start();

$errors = '';
$result = false;
$paypal = new AgilePaypal();
$customer_isnew = 0;

$params = 'cmd=_notify-validate';
foreach ($_POST AS $key => $value)
	$params .= '&'.$key.'='.urlencode(stripslashes($value));

if(Agile_Logging=='on')$paypal->log_message($params);

$recurring_txn_types = array('subscr_payment','recurring_payment_outstanding_payment','recurring_payment');
$interest_txn_types = array_merge(array('cart'),$recurring_txn_types);
$txn_type = $_POST['txn_type'];
if(!in_array($txn_type,$interest_txn_types))die($paypal->getL('Non interest txn_type: (None interest txn_type, ignored)'));

$paypalServer = 'www.'.(Configuration::get('AGILE_PAYPAL_SANDBOX') ? 'sandbox.' : '').'paypal.com';

if (function_exists('curl_exec'))
{
		$ch = curl_init('https://' . $paypalServer . '/cgi-bin/webscr');
    
	 	if (!$ch)
		$ch = curl_init('https://' . $paypalServer . '/cgi-bin/webscr/');
	
	if (!$ch)
		$errors .= $paypal->getL('connect').' '.$paypal->getL('curlmethodfailed');
	else
	{
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSLVERSION, 4);
        
		$result = curl_exec($ch);
		if ($result != 'VERIFIED')
		{
			curl_setopt($ch, CURLOPT_SSLVERSION, 3);
			$result = curl_exec($ch);
			if ($result != 'VERIFIED')
				$errors .= $paypal->getL('curlmethod').$result.' cURL error:'.curl_error($ch);
		}
		curl_close($ch);
	}
}
if($result != 'VERIFIED' OR !empty($errors))
{
    if (($fp = @fsockopen('ssl://' . $paypalServer, 443, $errno, $errstr, 30)) || ($fp = @fsockopen($paypalServer, 80, $errno, $errstr, 30)))
    {
	    	    $header = 'POST /cgi-bin/webscr HTTP/1.0'."\r\n" .
              'Host: '.$paypalServer."\r\n".
              'Content-Type: application/x-www-form-urlencoded'."\r\n".
              'Content-Length: '.Tools::strlen($params)."\r\n".
              'Connection: close'."\r\n\r\n";
	    fputs($fp, $header.$params);
     	
 	    $read = '';
 	    while (!feof($fp))
	    {
		    $reading = trim(fgets($fp, 1024));
		    $read .= $reading;
		    if (($reading == 'VERIFIED') || ($reading == 'INVALID'))
		    {
		 	    $result = $reading;
			    break;
		    }
 	    }
	    if ($result != 'VERIFIED')
		    $errors .= $paypal->getL('socketmethod').$result;
	    fclose($fp);
    }
    else
	    $errors = $paypal->getL('connect').$paypal->getL('nomethod');
}

if(in_array($txn_type,$recurring_txn_types))
{
    if( (!isset($_POST['subscr_id']) OR empty($_POST['subscr_id'])) AND isset($_POST['recurring_payment_id']) AND !empty($_POST['recurring_payment_id']))
    {
    	$_POST['subscr_id'] =  $_POST['recurring_payment_id'];
    }
    if(!isset($_POST['subscr_id']) OR empty($_POST['subscr_id']))die('subscriber id invalid');
    $recs_total = AgilePaypalTxn::search($_POST['subscr_id']);
    if(count($recs_total)>0)    {
	    $recs_this_txn = AgilePaypalTxn::search($_POST['subscr_id'], $_POST['txn_id']);
	    if(count($recs_this_txn)>0)die('transaction processed before');
			$foundrec = array_shift($recs_total);
		
		$oldCart = new Cart((int)$foundrec['id_cart']);
		$duplicated = $oldCart->duplicate();
		$newCart = $duplicated['cart'];
	    if(!isset($newCart))die($paypal->getL('Error copying cart: (Error occured when copying cart for recurring payment)'));
	    if(Agile_Logging=='on')$paypal->log_message("recs_total:$recs_total recs_this_txn:$recs_this_txn  old_cart_id:" . (isset($_POST['custom'])?$_POST['custom']:'') . " new_cart_id:" . $newCart->id);    
	    $_POST['custom'] = $newCart->id;
	}
}

$oldcart = new Cart(intval($_POST['custom']));

$customer = new Customer(intval($oldcart->id_customer));

if(!Validate::isLoadedObject($customer))
    $customer->getByEmail($_POST['payer_email']);

if(!$customer->id)
{
    $customer = new Customer();
    $customer->id = 0;
    $tmppass = $paypal->genRandomString();
    $customer->passwd = md5(_COOKIE_KEY_ . $tmppass);
    $customer->id_default_group = 1;
    $customer->ip_registration_newsletter = 0;
    $customer->optin = 0;
    $customer->active  = 1;
    $customer->firstname = utf8_encode($_POST['first_name']);
    $customer->lastname = utf8_encode($_POST['last_name']);
    $customer->email = $_POST['payer_email'];
    $customer->save();
    
    $customer_isnew = 1;
   
    if(Agile_Logging == 'on')$paypal->log_message("tmppass:" . $tmppass);
    if(Agile_Logging == 'on')$paypal->log_message("email:" . $customer->email);    

    try 
    {
        Mail::Send(intval($oldcart->id_lang), 'account', 'Welcome!', array('{firstname}' => $customer->firstname, '{lastname}' => $customer->lastname, '{email}' => $customer->email, '{passwd}' => $tmppass), $customer->email, $customer->firstname.' '.$customer->lastname);
    }
    catch(Exception $e)
    {
        if(Agile_Logging == 'on')$paypal->log_message('error at sending email:' .$e->getMessage());
    }
}

$addresses = $customer->getAddresses($oldcart->id_lang);

if($findid = $paypal->findExistingAddress($addresses))
{
    $address = new Address($findid);
}
else 
{
    $address = new Address();
    $address->id = 0;
    $address->id_customer = $customer->id;
    $address->address1 = ($_POST['address_street']);
    $address->city = ($_POST['address_city']);
	if(empty($address->city)) $address->city= "Unknown";
	$address->postcode = utf8_encode($_POST['address_zip']);
	$address->phone = (isset($_POST['contact_phone']) ?  utf8_encode($_POST['contact_phone']) : "");
	$address->id_country = Country::getByIso($_POST['address_country_code']);     $theCountry = new Country($address->id_country);
    if( isset($_POST['address_state']) AND strlen($_POST['address_state'])>0)
    {
	    if($theCountry->contains_states)
    	{ 
	        $address->id_state = $paypal->getIdByCodeOrName(utf8_encode($_POST['address_state']), $address->id_country);
	        if(!$address->id_state)
	        {
	            $address->id_state = $paypal->createNewState($address->id_country, $_POST['address_country_code'], utf8_encode($_POST['address_state']));
	            if(Agile_Logging == 'on')$paypal->log_message('new state is created:' . $address->id_state . ' name:' . utf8_encode($_POST['address_state']));
	            	            mail(Configuration::get('PS_SHOP_EMAIL'),'New state/province created','A new state is created with ID:' . $address->id_state . ' isocode/name:' . utf8_encode($_POST['address_state']));
	        }
	    }
	    else $address->address2 = utf8_encode($_POST['address_state']);
	    
    }
	$address->alias = 'My Address' . (count($addresses) + 1);
    $address->lastname  = utf8_encode($_POST['last_name']);
    $address->firstname = utf8_encode($_POST['first_name']);;
    $address->save();
}

if($oldcart->id)
{
        $oldcart->id_customer = $customer->id;
	    if($oldcart->id_address_delivery <=0 OR !in_array($txn_type,$recurring_txn_types))
	{
		$oldcart->id_address_delivery = $address->id;
		$delivery_option[(int)$oldcart->id_address_delivery] = $oldcart->id_carrier . ",";		
		$oldcart->delivery_option = serialize($delivery_option);
	}
	if($oldcart->id_address_invoice <=0 OR !in_array($txn_type,$recurring_txn_types))$oldcart->id_address_invoice = $address->id;
	        $paid_currency_id = intval(Currency::getIdByIsoCode($_POST['mc_currency']));
    if(isset($paid_currency_id) AND $paid_currency_id >0)$oldcart->id_currency = $paid_currency_id;
    
        $oldcart->secure_key = $customer->secure_key;
    
    $oldcart->save();
	Db::getInstance()->Execute('UPDATE ' . _DB_PREFIX_ . 'cart_product SET id_address_delivery = ' . (int)$oldcart->id_address_delivery. ' WHERE id_cart=' . (int)$oldcart->id);	
}
$cookie->id_customer = intval($customer->id);
$cookie->customer_lastname = $customer->lastname;
$cookie->customer_firstname = $customer->firstname;
$cookie->passwd = $customer->passwd;
$cookie->logged = 1;
$cookie->email = $customer->email;
$cookie->id_lang = $oldcart->id_lang;
$cookie->id_cart = $oldcart->id;



if ($result == 'VERIFIED') {
	if (!isset($_POST['mc_gross']))
		$errors .= $paypal->getL('mc_gross').'<br />';
	if (!isset($_POST['payment_status']))
		$errors .= $paypal->getL('payment_status').'<br />';
	elseif ($_POST['payment_status'] != 'Completed')
		$errors .= $paypal->getL('payment').$_POST['payment_status'].'<br />';
	if (!isset($_POST['custom']))
		$errors .= $paypal->getL('custom').'<br />';
	if (!isset($_POST['txn_id']))
		$errors .= $paypal->getL('txn_id').'<br />';
	if (!isset($_POST['mc_currency']))
		$errors .= $paypal->getL('mc_currency').'<br />';
	if (empty($errors))
	{
		$theCart = new Cart(intval($_POST['custom']));
		if (!$theCart->id)
			$errors = $paypal->getL('cart').'<br />';
		elseif (Order::getOrderByCartId(intval($_POST['custom'])))
			$errors = $paypal->getL('order').'<br />';
		else
		{
			$_SESSION['agile_paypal_validating_order'] = 1;
			$paypal->validateOrder($_POST['custom'], _PS_OS_PAYMENT_, floatval($_POST['mc_gross']), $paypal->displayName, $paypal->getL('transaction').$_POST['txn_id'],array(),NULL,false,$customer->secure_key);
			$_SESSION['agile_paypal_validating_order'] = 0;
		}
	}
} else {
	$errors .= $paypal->getL('verified');
}

if (!empty($errors) AND isset($_POST['custom']))
{
	$_SESSION['agile_paypal_validating_order'] = 1;
	
	if ($_POST['payment_status'] == 'Pending')
		$paypal->validateOrder(intval($_POST['custom']), _PS_OS_PAYPAL_, floatval($_POST['mc_gross']), $paypal->displayName, $paypal->getL('transaction').$_POST['txn_id'].'<br />'.$errors, array(), NULL, false, $customer->secure_key);
	else
		$paypal->validateOrder(intval($_POST['custom']), _PS_OS_ERROR_, 0, $paypal->displayName, $errors.'<br />',  array(),  NULL, false,  $customer->secure_key);

	$_SESSION['agile_paypal_validating_order'] = 0;
}

if(intval($paypal->currentOrder)>0)
{
    $apt = new AgilePaypalTxn();
    $apt->id_cart = intval($_POST['custom']);
    $apt->id_order = $paypal->currentOrder;
    $apt->paypal_txn = $_POST['txn_id'];
    $apt->subscr_id = (isset($_POST['subscr_id'])?$_POST['subscr_id'] : '');
    $apt->remark = 'Payment status:' . $_POST['payment_status'];
    $apt->add();
}

if(intval($paypal->currentOrder)>0 AND Module::isInstalled('agilesellercommission'))
{
    include_once(dirname(__FILE__).'/../../modules/agilesellercommission/agilesellercommission.php');
    include_once(dirname(__FILE__).'/../../modules/agilesellercommission/SellerCommission.php');
        SellerCommission::updateRecordType($paypal->currentOrder, intval(Tools::getValue('invoice')), $_POST['txn_id']);
}

if($customer_isnew == 1 AND Module::isInstalled('agilemultipleseller') AND intval(Configuration::get('AGILE_MS_CUSTOMER_SELLER')) == 1 AND intval(Configuration::get('AGILE_MS_AUTO_SIGNUP'))==1)
{
    include_once(dirname(__FILE__).'/../../modules/agilemultipleseller/agilemultipleseller.php');
	AgileMultipleSeller::createSellerAccount(new Customer($customer->id));
}


?>