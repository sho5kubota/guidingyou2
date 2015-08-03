<?php
///-build_id: 2015022208.5429
/// This source file is subject to the Software License Agreement that is bundled with this 
/// package in the file license.txt, or you can get it here
/// http://addons-modules.com/en/content/3-terms-and-conditions-of-use
///
/// @copyright  2009-2012 Addons-Modules.com
///  If you need open code to customize or merge code with othe modules, please contact us.
if(!class_exists('AgileInstaller'))
{
	include_once(_PS_ROOT_DIR_ . '/modules/agilepaypal/install/' . (_PS_VERSION_ > '1.6'?'1.6x':'1.5x') . '/classes/AgileInstaller.php');
	eval("class AgileInstaller extends AgileInstallerCore {}");	
}

define('Agile_Logging', 'off');

class AgilePaypalBase extends PaymentModule
{
	const INSTALL_SQL_FILE = 'install.sql';

	public static $_newfiles = array( 
		'classes/AgileInstaller.php' => array('1.6x'=>'classes/AgileInstaller.php', '1.5x' => 'classes/AgileInstaller.php')
		,'classes/AgileHelper.php' => array('1.6x'=>'classes/AgileHelper.php', '1.5x' => 'classes/AgileHelper.php')
		,'classes/AgileSellerManager.php' => array('1.6x'=>'classes/AgileSellerManager.php', '1.5x' => 'classes/AgileSellerManager.php')
	    );

	private $version_dependencies = array();

	protected $_html = '';
	protected $_postErrors = array();

	public function __construct()
	{
		$this->name = 'agilepaypal';
	    $this->author = 'addons-modules.com';
	    $this->tab = 'payments_gateways';
		$this->version = '1.6.4.2';
		$this->dependencies = array();
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
		$this->version_dependencies = array(); 

		
		$this->currencies = true;
		$this->currencies_mode = 'checkbox';

        parent::__construct();

	}

	public function getPaypalUrl()
	{
			return Configuration::get('AGILE_PAYPAL_SANDBOX') ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
	}

	public function install()
	{
				if(!defined('_IS_AGILE_DEV_') && !empty(self::$_newfiles) && !Tools::getValue("redirected"))
		{
			$adminfolder = AgileInstaller::detect_admin_folder($_SERVER['SCRIPT_FILENAME']);
			AgileInstaller::install_newfiles(self::$_newfiles, $this->name, $adminfolder, 2);
			$result = AgileInstaller::install_health_check(self::$_newfiles, $this->name, $adminfolder);	
			if(!empty($result))
			{
				$this->_errors[] = '<a target="agile" style="text-decoration:underline;color:blue;" href="http://addons-modules.com/store/en/content/36-agile-module-installation-tips">' .
					$this->getL('Failed to update files due to permission issue, please visit here for more instructions.') . '</a>';
				return false;
			}
			Tools::redirectAdmin("./index.php?controller=AdminModules&token=" . Tools::getValue("token") . "&install=" . $this->name . "&tab_module=" .$this->tab ." &module_name=" . $this->name . "&anchor=anchor" . $this->name . "&redirected=1");
		}

		$reterrs = AgileInstaller::CanModuleOverride($this->name);
		if(!empty($reterrs)){
			$this->_errors = array_merge($this->_errors, $reterrs);
			return false;
		}

		$reterrs = AgileInstaller::version_depencies($this->version_dependencies);
		if(!empty($reterrs)){
			$this->_errors = array_merge($this->_errors, $reterrs);
			return false;
		}

        if(!AgileInstaller::sql_install(dirname(__FILE__).'/'.self::INSTALL_SQL_FILE))
            return false;

		if (!parent::install()
			OR !Configuration::updateValue('AGILE_PAYPAL_BUSINESS', 'paypal@prestashop.com')
			OR !Configuration::updateValue('AGILE_PAYPAL_SANDBOX', 1)
			OR !Configuration::updateValue('AGILE_PAYPAL_FORCE_SUMMARY', '1')
			OR !Configuration::updateValue('AGILE_PAYPAL_HIDE_COUNTRY', 0)
			OR !Configuration::updateValue('AGILE_PAYPAL_HIDE_CARRIER', 0)
			OR !Configuration::updateValue('AGILE_PAYPAL_HIDE_TERMS', 0)
			OR !Configuration::updateValue('AGILE_PAYPAL_HEADER', '')
			OR !Configuration::updateValue('AGILE_PAYPAL_RECURRING_PAYMENT', 0)
			OR !Configuration::updateValue('AGILE_PAYPAL_RECURRING_DAILY', 0)
			OR !Configuration::updateValue('AGILE_PAYPAL_RECURRING_WEEKLY', 0)
			OR !Configuration::updateValue('AGILE_PAYPAL_RECURRING_MONTHLY', 0)
			OR !Configuration::updateValue('AGILE_PAYPAL_RECURRING_YEARLY', 0)
			OR !Configuration::updateValue('AGILE_PAYPAL_SUPPORT_SELLERS', 0)
			OR !Configuration::updateValue('AGILE_PAYPAL_BUSINESS2', '')
			OR !Configuration::updateValue('AGILE_PAYPAL_MICRO_AMOUNT', 0)
			OR !Configuration::updateValue('AGILE_PAYPAL_EXPRESS_ENABLED', 1)
			OR !Configuration::updateValue('AGILE_PAYPAL_AM_INTEGRATED', 0)
			OR !Configuration::updateValue('AGILE_PAYPAL_AM_SHOW_CHOICE', 0)
			OR !Configuration::updateValue('AGILE_PAYPAL_AM_NO_MIX_PRODUCT', 0)
			OR !Configuration::updateValue('AGILE_PAYPAL_SUBSCRIBE_ONLY', 0)
			OR !Configuration::updateValue('AGILE_PAYPAL_CURRENCY', Configuration::get('PS_CURRENCY_DEFAULT'))
			OR !$this->registerHook('agileexpresscheckout')
			OR !$this->registerHook('displayShoppingCartFooter')
			OR !$this->registerHook('displayProductButtons')
			OR !$this->registerHook('displayPayment')
			OR !$this->registerHook('displayPaymentReturn')
			OR !$this->registerHook('displayFooter'))
			return false;

		if(version_compare(_PS_VERSION_, '1.5', '>='))Autoload::getInstance()->generateIndex();

			
		return true;
	}

	public function uninstall()
	{
		if (!parent::uninstall())
			return false;
		return true;
	}

	public function getContent()
	{
		$this->_html = '<h2>'.$this->displayName.'</h2>';
		
		$adminfolder = AgileInstaller::detect_admin_folder($_SERVER['SCRIPT_FILENAME']);
		$health_check = AgileInstaller::install_health_check(self::$_newfiles, $this->name, $adminfolder);
		if(!empty($health_check))	$this->_html .= $health_check;
		
		$this->_html .= AgileInstaller::show_agile_links();
		if (isset($_POST['submitPaypal']))
		{
			if (empty($_POST['business']))
				$this->_postErrors[] = $this->getL('Paypal business e-mail address is required.');
			elseif (!Validate::isEmail($_POST['business']))
				$this->_postErrors[] = $this->getL('Paypal business must be an e-mail address.');
			if (!isset($_POST['sandbox']))
				$_POST['sandbox'] = 1;
			if (!isset($_POST['force_summary']))
				$_POST['force_summary'] = 1;
			if (!isset($_POST['hidecountry']))
				$_POST['hidecountry'] = 0;
			if (!isset($_POST['hidecarrier']))
				$_POST['hidecarrier'] = 0;
			if (!isset($_POST['hideterms']))
				$_POST['hideterms'] = 0;
			if (!isset($_POST['recurringpayment']))
				$_POST['recurringpayment'] = 0;

			if (!isset($_POST['recurringdaily']))
				$_POST['recurringdaily'] = 0;
			if (!isset($_POST['recurringweekly']))
				$_POST['recurringweekly'] = 0;
			if (!isset($_POST['recurringmonthly']))
				$_POST['recurringmonthly'] = 0;
			if (!isset($_POST['recurringyearly']))
				$_POST['recurringyearly'] = 0;

			if (!isset($_POST['support_sellers']))
				$_POST['support_sellers'] = 0;

			if (!isset($_POST['am_integrated']))
				$_POST['am_integrated'] = 0;

			if (!isset($_POST['am_show_choice']))
				$_POST['am_show_choice'] = 0;

			if (!isset($_POST['am_mix_product']))
				$_POST['am_mix_product'] = 0;

			if (!sizeof($this->_postErrors))
			{
				Configuration::updateValue('AGILE_PAYPAL_BUSINESS', strval($_POST['business']));
				Configuration::updateValue('AGILE_PAYPAL_SANDBOX', intval($_POST['sandbox']));
				Configuration::updateValue('AGILE_PAYPAL_FORCE_SUMMARY', intval($_POST['force_summary']));
				Configuration::updateValue('AGILE_PAYPAL_HEADER', strval($_POST['header']));
				Configuration::updateValue('AGILE_PAYPAL_HIDE_COUNTRY', intval($_POST['hidecountry']));
				Configuration::updateValue('AGILE_PAYPAL_HIDE_CARRIER', intval($_POST['hidecarrier']));
				Configuration::updateValue('AGILE_PAYPAL_HIDE_TERMS', intval($_POST['hideterms']));
				Configuration::updateValue('AGILE_PAYPAL_RECURRING_PAYMENT', intval($_POST['recurringpayment']));
				Configuration::updateValue('AGILE_PAYPAL_RECURRING_DAILY', intval($_POST['recurringdaily']));
				Configuration::updateValue('AGILE_PAYPAL_RECURRING_WEEKLY', intval($_POST['recurringweekly']));
				Configuration::updateValue('AGILE_PAYPAL_RECURRING_MONTHLY', intval($_POST['recurringmonthly']));
				Configuration::updateValue('AGILE_PAYPAL_RECURRING_YEARLY', intval($_POST['recurringyearly']));
				Configuration::updateValue('AGILE_PAYPAL_SUPPORT_SELLERS',floatval($_POST['support_sellers']));
				Configuration::updateValue('AGILE_PAYPAL_BUSINESS2', strval($_POST['business2']));
				Configuration::updateValue('AGILE_PAYPAL_MICRO_AMOUNT',floatval($_POST['micro_amount']));
				Configuration::updateValue('AGILE_PAYPAL_EXPRESS_ENABLED',intval(Tools::getValue('express_enabled')));
				Configuration::updateValue('AGILE_PAYPAL_AM_INTEGRATED',intval(Tools::getValue('am_integrated')));
				Configuration::updateValue('AGILE_PAYPAL_AM_SHOW_CHOICE',intval(Tools::getValue('am_show_choice')));
				Configuration::updateValue('AGILE_PAYPAL_AM_NO_MIX_PRODUCT',intval(Tools::getValue('am_mix_product')));
				Configuration::updateValue('AGILE_PAYPAL_SUBSCRIBE_ONLY',intval(Tools::getValue('subscribe_only')));
				Configuration::updateValue('AGILE_PAYPAL_CURRENCY',intval(Tools::getValue('paypal_currency')));

				$this->displayConf();
			}
			else
				$this->displayErrors();
		}

				$this->displayFormSettings();
		return $this->_html;
	}


	public function hookDisplayFooter($params)
    {
        global $smarty,$cookie,$cart;

		if (!$this->active)return;
		
		$smarty->assign(array(
		    'force_summary' => intval(Configuration::get('AGILE_PAYPAL_FORCE_SUMMARY')),
			'hide_add2cart4membership' => $this->hide_add2cart4membership()
		    ));

		return $this->display($this->get_module_file(), 'agilepaypalfooter.tpl');        
    }
	
	private function hide_add2cart4membership()
	{
		if (!$this->active)return 0;
		$atpage = AgileHelper::getPageName();
		if($atpage != "category.php")return 0;
		$id_category = (int)Tools::getValue('id_category');
		if($id_category != (int)Configuration::get('AGILE_MEMBERSHIP_CID'))return 0;		

		if(!Module::isInstalled('agilemembership'))return 0;
		if(!(int)Configuration::get('AGILE_PAYPAL_AM_INTEGRATED'))return 0;
		
		return 1;
	}

	public function hookDisplayPayment($params)
	{
		if (!$this->active)
			return ;
		
        global $smarty,$cart,$cookie;
		$atpage = AgileHelper::getPageName();

		$am_integrated = (int)Configuration::get('AGILE_PAYPAL_AM_INTEGRATED');
		$subscribe_only = (int)Configuration::get('AGILE_PAYPAL_SUBSCRIBE_ONLY');
		$hasNonMembershipProducts = $this->hasNonMembershipProducts();
		if(Module::isInstalled('agilemembership') && $am_integrated && $subscribe_only && $hasNonMembershipProducts)return;

        $address = new Address($cart->id_address_delivery);

		if(Module::isInstalled('agilemultipleseller')) 
		{
			include_once(_PS_ROOT_DIR_  . "/modules/agilemultipleseller/agilemultipleseller.php");
			if (intval(Configuration::get('AGILE_MS_PAYMENT_MODE')) == AgileMultipleSeller::PAYMENT_MODE_BOTH)
				return ;
			
			include_once(_PS_ROOT_DIR_  . "/modules/agilemultipleseller/SellerInfo.php");
			$sellermodule = new AgileMultipleSeller();
			$subcartPaymentInfoDisplay = $sellermodule->hookSubcartPaymentInfo($this->name,'expresscheckout_form', false);
			if(empty($subcartPaymentInfoDisplay) AND intval(Configuration::get('AGILE_MS_PAYMENT_MODE')) == AgileMultipleSeller::PAYMENT_MODE_SELLER) return '';
			$HOOK_SUBCARTP_PAYMENTINFO_AGILEPAYPAL = $subcartPaymentInfoDisplay;
		}

		$agilepayoal_redirect_url = Tools::getShopDomainSsl(true,true) . __PS_BASE_URI__ . "modules/agilepaypal/redirect.php";
		$agilepayoal_recurring_url = Tools::getShopDomainSsl(true,true) . __PS_BASE_URI__ . "modules/agilepaypal/subscribe.php";
		if(version_compare(_PS_VERSION_, '1.5', '>='))
		{
			$agilepayoal_redirect_url = Context::getContext()->link->getModuleLink('agilepaypal', 'redirect', array(), true);
			$agilepayoal_recurring_url = Context::getContext()->link->getModuleLink('agilepaypal', 'subscribe', array(), true);
		}

	    $membership_interval = $this->get_membership_interval();
		$recurring_only =  (intval(Configuration::get('AGILE_PAYPAL_AM_INTEGRATED'))==1
					&&  intval(Configuration::get('AGILE_PAYPAL_AM_SHOW_CHOICE'))==0
					&&  $membership_interval != '')?1:0;
						$display_repeating = (intval(Configuration::get('AGILE_PAYPAL_RECURRING_PAYMENT'))==1) ? 1 :
		  ((intval(Configuration::get('AGILE_PAYPAL_AM_INTEGRATED'))==1
			&&  (intval(Configuration::get('AGILE_PAYPAL_AM_NO_MIX_PRODUCT'))==1 || intval(Configuration::get('AGILE_PAYPAL_AM_SHOW_CHOICE'))==1)
			&& $membership_interval !='')? (($recurring_only==1) ? 0 : 1): 0);

        $smarty->assign(array('atpage' => $atpage,
						'HOOK_SUBCARTP_PAYMENTINFO_AGILEPAYPAL' => (isset($HOOK_SUBCARTP_PAYMENTINFO_AGILEPAYPAL)?$HOOK_SUBCARTP_PAYMENTINFO_AGILEPAYPAL:""),
                        'agilepaypal_dir'=>dirname(__FILE__). '/',
                        'sl_country'=>$address->id_country,
						'cycle_base' => $this->get_membership_units(),
						'membership_interval' => $membership_interval,
						'hidecarrier' => intval(Configuration::get('AGILE_PAYPAL_HIDE_CARRIER')),
                        'recurringpayment' => $display_repeating,
						                        'recurringdaily' => (intval(Configuration::get('AGILE_PAYPAL_RECURRING_DAILY'))==1)?1:0,
                        'recurringweekly' => (intval(Configuration::get('AGILE_PAYPAL_RECURRING_WEEKLY'))==1)?1:0,
                        'recurringmonthly' => (intval(Configuration::get('AGILE_PAYPAL_RECURRING_MONTHLY'))==1)?1:0,
						'recurringyearly' => (intval(Configuration::get('AGILE_PAYPAL_RECURRING_YEARLY'))==1)?1:0,
						'agilepayoal_redirect_url' => $agilepayoal_redirect_url,
						'agilepayoal_recurring_url' => $agilepayoal_recurring_url,
						'recurringOnly' =>intval($recurring_only),
						'displayrepeating' => intval($display_repeating)
                        ));

		Context::getContext()->controller->addCSS($this->_path.'css/agilepaypal.css', 'all');;


		return $this->display($this->get_module_file(), 'agilepaypal.tpl');
	}
	
	public function hasNonMembershipProducts()
	{
		if(!Module::isInstalled('agilemembership'))return true;
		$sql = 'SELECT count(*) AS num from ' . _DB_PREFIX_  . 'cart_product cp INNER JOIN ' . _DB_PREFIX_ . 'category_product cp2 ON (cp.id_product=cp2.id_product) WHERE cp.id_cart=' . $this->context->cart->id . ' AND cp2.id_category !=' .(int)Configuration::get('AGILE_MEMBERSHIP_CID');
		$num = (int)Db::getInstance()->getValue($sql);
		return ($num >0);
	}

	public function hookDisplayProductButtons($params)
	{
		global $smarty,$cart,$cookie;
		if (!$this->active)return ;

		$sql = 'SELECT id_category FROM ' . _DB_PREFIX_ . 'category_product WHERE id_product=' . (int)$params['product']->id. ' AND id_category=' . (int)Configuration::get('AGILE_MEMBERSHIP_CID');
		$id_category = Db::getInstance()->getValue($sql);
		if($id_category != (int)Configuration::get('AGILE_MEMBERSHIP_CID'))return;		

		if(!Module::isInstalled('agilemembership'))return;
		if(!(int)Configuration::get('AGILE_PAYPAL_AM_INTEGRATED'))return;

		include_once(_PS_ROOT_DIR_ . "/modules/agilemembership/MembershipType.php");
		include_once(_PS_ROOT_DIR_  . "/modules/agilemembership/agilemembership.php");
		$membershiptype= MembershipType::getMembershipTypeByProductID($params['product']->id, $cookie->id_lang);
		$ammodule = new AgileMembership();
		
		$displayName = '';
		$recurring_cycle = '';
		if($membershiptype['interval'] == 'DAY'){ $recurring_cycle="D"; $displayName = $this->getL('Day');}
		if($membershiptype['interval'] == 'MONTH'){$recurring_cycle="M"; $displayName = $this->getL('Month');}
		if($membershiptype['interval'] == 'YEAR'){ $recurring_cycle="Y"; $displayName = $this->getL('Year');}
		if($membershiptype['interval'] == 'WEEK'){ $recurring_cycle="W"; $displayName = $this->getL('Week');}

		$smarty->assign(array(
			'am_show_choice' => (int)Configuration::get('AGILE_PAYPAL_AM_SHOW_CHOICE')
			,'am_mix_product' => (int)Configuration::get('AGILE_PAYPAL_AM_NO_MIX_PRODUCT')
			,'recurring_cycle' => $recurring_cycle
			,'recurring_base' => (int)$membershiptype['units']
			,'recurring_cycle_displayname' => $displayName
			,'cart_product_nb' => (int)$cart->nbProducts()
			,'subscribe_membership_button' => $ammodule->getL('Subscribe Membership')
			,'subscribe_cfm_msg' =>$ammodule->getL('Membership can not be ordered together with other products, exising products in your shopping cart will be cleared. Please confirm if you would like to proceed.')
			));

		Context::getContext()->controller->addCSS($this->_path.'css/agilepaypal.css', 'all');;
		return $this->display($this->get_module_file(), 'hooksubscribe.tpl');
		
	}

	public function hookDisplayPaymentReturn($params)
	{
		if (!$this->active)
			return ;

		return $this->display($this->get_module_file(), 'confirmation.tpl');
	}

	public function hookDisplayShoppingCartFooter($params)
	{
		if (!$this->active)
			return ;

		$am_integrated = (int)Configuration::get('AGILE_PAYPAL_AM_INTEGRATED');
		$subscribe_only = (int)Configuration::get('AGILE_PAYPAL_SUBSCRIBE_ONLY');
		$hasNonMembershipProducts = $this->hasNonMembershipProducts();
		if(Module::isInstalled('agilemembership') && $am_integrated && $subscribe_only && $hasNonMembershipProducts)return;
		
        return $this->hookAgileExpressCheckout($params);
	}
	
	private function get_membership_interval()
	{
		global $cart, $cookie;
		
				$interval = ''; 		if(Module::isInstalled('agilemembership'))
		{
			include_once(_PS_ROOT_DIR_  . "/modules/agilemembership/MembershipType.php");
						$products = $cart->getProducts();
			if(count($products)==1)
			{
				$membershiptype =MembershipType::getMembershipTypeByProductID(intval($products[0]['id_product']),$cart->id_lang);
				if(isset($membershiptype) AND !empty($membershiptype['interval']))
				{
					$interval = $membershiptype['interval'];
				}
			}
		}
		return $interval;		
	}	
	
	private function get_membership_units()
	{
		global $cart, $cookie;
		
				$unis = 1; 		if(Module::isInstalled('agilemembership'))
		{
			include_once(_PS_ROOT_DIR_  . "/modules/agilemembership/MembershipType.php");
						$products = $cart->getProducts();
			if(count($products)==1)
			{
				$membershiptype =MembershipType::getMembershipTypeByProductID(intval($products[0]['id_product']),$cart->id_lang);
				if(isset($membershiptype) AND intval($membershiptype['units'])>0)
				{
					$unis = intval($membershiptype['units']);
				}
			}
		}
		return $unis;		
	}

	public function hookAgileExpressCheckout($params)
    {
        global $cookie, $cart, $smarty, $link;
		
		if(Module::isInstalled('agilemultipleseller'))
		{
			include_once(_PS_ROOT_DIR_  . "/modules/agilemultipleseller/agilemultipleseller.php");
			if (intval(Configuration::get('AGILE_MS_PAYMENT_MODE')) == AgileMultipleSeller::PAYMENT_MODE_BOTH)
				return ;
		
			if (intval(Configuration::get('AGILE_MS_PAYMENT_MODE')) != AgileMultipleSeller::PAYMENT_MODE_STORE AND 
				count(AgileMultipleSeller::getSellersByCart($cart->id))>1)
				return ;
		}
		
		if (!$this->active)return ;
		if(intval(Configuration::get('AGILE_PAYPAL_EXPRESS_ENABLED'))!=1)return;

		$cms = new CMS((int)(Configuration::get('PS_CONDITIONS_CMS_ID')), (int)($cookie->id_lang));
		$link_conditions = $link->getCMSLink($cms, $cms->link_rewrite, true);
		if (!strpos($link_conditions, '?'))
			$link_conditions .= '?content_only=1';
		else
			$link_conditions .= '&content_only=1';

		$atpage = AgileHelper::getPageName();
                $back = Tools::getValue('back');
        if($atpage == "order-opc.php")return;
        if($atpage == "authentication.php")
        {
            if(strlen($back)<9)return;
            if(substr($back,0,9)!='order.php')return;
        }
        
		if($cart->nbProducts() ==0)return;
        if($cart->getOrderTotal() <= 0)return;         
		$agilepayoal_redirect_url = Tools::getShopDomainSsl(true,true) . __PS_BASE_URI__ . "modules/agilepaypal/redirect.php";
		$agilepayoal_recurring_url = Tools::getShopDomainSsl(true,true) . __PS_BASE_URI__ . "modules/agilepaypal/subscribe.php";
		if(version_compare(_PS_VERSION_, '1.5', '>='))
		{
			$agilepayoal_redirect_url = Context::getContext()->link->getModuleLink('agilepaypal', 'redirect', array(), true);
			$agilepayoal_recurring_url = Context::getContext()->link->getModuleLink('agilepaypal', 'subscribe', array(), true);
		}

		if(version_compare(_PS_VERSION_ , "1.5", ">="))
		{
			Context::getContext()->controller->addJqueryPlugin("fancybox");	
			Context::getContext()->controller->addCSS(__PS_BASE_URI__ . "css/jquery.fancybox-1.3.4.css");
		}
		else
		{
			Tools::addJS(__PS_BASE_URI__ . "js/jquery/jquery.fancybox-1.3.4.js");
			Tools::addCSS(__PS_BASE_URI__ . "css/jquery.fancybox-1.3.4.css");
		}

		$smarty->assign(array(
                        'link_conditions' =>$link_conditions,
                        'agilepaypal_dir'=>dirname(__FILE__). '/',
                        'atpage' => $atpage,
                        'back' => $back,
						'cycle_base' => $this->get_membership_units(),
                        'hideterms' => intval(Configuration::get('AGILE_PAYPAL_HIDE_TERMS')),
                        'sl_country'=>(isset($selectedCountry) ? $selectedCountry : 0),
                        'sl_state'=>(isset($selectedState) ? $selectedState : 0),
                        'sl_carrier'=>(isset($selectedCarrier) ? $selectedCarrier : 0),
						'agilepayoal_redirect_url' => $agilepayoal_redirect_url,
						'agilepayoal_recurring_url' => $agilepayoal_recurring_url,
						'agilePaypalExpressCheckoutForm' => $this->getCheckoutForm()
			));

		return $this->display($this->get_module_file(), 'hookexpresscheckout.tpl');
    }
    
    public function getCheckoutForm()
    {
        return $this->agileExpressCheckout('expresscheckout.tpl');
    }
    
	public function agileExpressCheckout($tpl_file)
	{
        global $cookie, $cart, $smarty;

		if (!$this->active)	return ;
        $countries = Country::getCountries(intval($cookie->id_lang), !$cart->isVirtualCart());        
        
        		$selectedCountry = 0;
		if(!AgileHelper::isLocalIP() && Configuration::get('PS_GEOLOCATION_ENABLED') == 1)
		{
			include_once(_PS_GEOIP_DIR_.'geoipcity.inc');
			$gi = geoip_open(realpath(_PS_GEOIP_DIR_.'GeoLiteCity.dat'), GEOIP_STANDARD);
			$ip_addr = Tools::getRemoteAddr();
			$record = geoip_record_by_addr($gi, $ip_addr);
			$selectedCountry = (int)AgileHelper::getCountryIDbyIso($record->country_code);
		}

		if($selectedCountry <=0)$selectedCountry = intval(Configuration::get('PS_COUNTRY_DEFAULT'));
		
        if($cart->id_address_delivery>0)
        {
            $daddress = new Address($cart->id_address_delivery);
            $selectedCountry = $daddress->id_country;
        }
        if(isset($_POST['expresscheckout_id_country']) AND intval($_POST['expresscheckout_id_country'])>0)
        {
	        $selectedCountry = intval($_POST['expresscheckout_id_country']);
    	}
    	
                $hasStates = isset($countries[$selectedCountry]['states']) AND $countries[$selectedCountry]['contains_states'];
    	
                $selectedState = 0;
        if($hasStates)
        {
            if($cart->id_address_delivery>0)
            {
                $daddress = new Address($cart->id_address_delivery);
                if($this->stateInList($daddress->id_state,$countries[$selectedCountry]['states'])) 
                    $selectedState = $daddress->id_state;
            }
            if(isset($_POST['expresscheckout_id_state']) AND intval($_POST['expresscheckout_id_state'])>0)
            {
            
                if($this->stateInList(intval($_POST['expresscheckout_id_state']),$countries[$selectedCountry]['states'])) 
    	            $selectedState = intval($_POST['expresscheckout_id_state']);
            }
        }
        
                $cart->id_address_delivery = $this->getShippingAddressID($selectedCountry, $selectedState);
        $cart->save();
        
                $selectedZoneID = $this->getZoneByStateOrCountry(isset($selectedCountry) ? $selectedCountry : 0, isset($selectedState) ? $selectedState : 0);

                $currency_cart = new Currency(intval($cart->id_currency));
        $carriers = $this->getCarriersByZoneID($selectedZoneID);
        for($idx=0; $idx <count($carriers); $idx++)
        {
			$fees = Tools::ps_round(floatval($carriers[$idx]['price']), 2);
            $carriers[$idx]['name'] = $carriers[$idx]['name'] . ' -- ' . $currency_cart->sign . ' ' . $fees;
        }
                $selectedCarrier = empty($carriers)? 0 : $carriers[0]['id_carrier'];
        if(isset($cart->id_carrier) AND intval($cart->id_carrier)>0 AND $this->carrierInList($cart->id_carrier,$carriers))
        {
            $selectedCarrier = intval($cart->id_carrier);
        }
        if(isset($_POST['expresscheckout_id_carrier']) AND intval($_POST['expresscheckout_id_carrier'])>0 AND $this->carrierInList($_POST['expresscheckout_id_carrier'],$carriers))
        {
	        $selectedCarrier = intval($_POST['expresscheckout_id_carrier']);
        }

                $cart->id_carrier = $selectedCarrier;
		$delivery_option[(int)$cart->id_address_delivery] = $selectedCarrier . ",";		
		$cart->setDeliveryOption($delivery_option);
		
        $cart->save();
	    $membership_interval = $this->get_membership_interval();
		$recurring_only =  (intval(Configuration::get('AGILE_PAYPAL_AM_INTEGRATED'))==1
					&&  intval(Configuration::get('AGILE_PAYPAL_AM_SHOW_CHOICE'))==0
					&&  $membership_interval != '')?1:0;
						$display_repeating = (intval(Configuration::get('AGILE_PAYPAL_RECURRING_PAYMENT'))==1) ? 1 :
		  ((intval(Configuration::get('AGILE_PAYPAL_AM_INTEGRATED'))==1
			&&  (intval(Configuration::get('AGILE_PAYPAL_AM_NO_MIX_PRODUCT'))==1 || intval(Configuration::get('AGILE_PAYPAL_AM_SHOW_CHOICE'))==1)
			&& $membership_interval !='')? (($recurring_only==1) ? 0 : 1): 0);


        $smarty->assign(array('countries'=>$countries,
                        'hasStates' => $hasStates,
                        'states' => $hasStates? $countries[$selectedCountry]['states'] : '',
                        'carriers' =>$carriers,
                        'agilepaypal_dir'=>dirname(__FILE__). '/',
                        'sl_country'=>(isset($selectedCountry) ? $selectedCountry : 0),
                        'sl_state'=>(isset($selectedState) ? $selectedState : 0),
                        'sl_carrier'=>(isset($selectedCarrier) ? $selectedCarrier : 0),
						'cycle_base' => $this->get_membership_units(),
						'membership_interval' => $this->get_membership_interval(),
						'hidestates' => (!$hasStates OR intval(Configuration::get('AGILE_PAYPAL_HIDE_CARRIER'))==1)?1:0,
                        'hidecarrier' => intval(Configuration::get('AGILE_PAYPAL_HIDE_CARRIER')),
                        'recurringpayment' => intval($display_repeating),
						                        'recurringdaily' => (intval(Configuration::get('AGILE_PAYPAL_RECURRING_DAILY'))==1)?1:0,
                        'recurringweekly' => (intval(Configuration::get('AGILE_PAYPAL_RECURRING_WEEKLY'))==1)?1:0,
                        'recurringmonthly' => (intval(Configuration::get('AGILE_PAYPAL_RECURRING_MONTHLY'))==1)?1:0,
                        'recurringyearly' => (intval(Configuration::get('AGILE_PAYPAL_RECURRING_YEARLY'))==1)?1:0,
                        'hidecountry' => intval(Configuration::get('AGILE_PAYPAL_HIDE_COUNTRY')),
						'recurringOnly' => intval($recurring_only),
						'displayrepeating' => intval($display_repeating)
					));

		return $this->display($this->get_module_file(), $tpl_file);
	}

    private function stateInList($id_state,$states)
    {
        if(empty($states))return false;
        foreach($states AS $state)
        {
            if($state['id_state'] == intval($id_state))return true;
        }
        return false;
    }

    private function carrierInList($id_carrier,$carriers)
    {
        if(empty($carriers))return false;
        foreach($carriers AS $carrier)
        {
            if($carrier['id_carrier'] == intval($id_carrier))return true;
        }
        return false;
    }


	public function validateOrder($id_cart, $id_order_state, $amountPaid, $paymentMethod = 'Unknown', $message = NULL, $extraVars = array(), $currency_special = NULL, $dont_touch_amount = false, $secure_key = false, Shop $shop = null)
	{
		if (!$this->active)
			return ;

		parent::validateOrder($id_cart, $id_order_state, $amountPaid, $paymentMethod, $message, $extraVars, $currency_special, $dont_touch_amount, $secure_key, $shop);
	}
	
	
	    function genRandomString($length=8) 
    {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
        $string ="";    
        for ($p = 0; $p < $length; $p++) {
            $string .= $characters[mt_rand(0, strlen($characters) -1 )];
        }
        return $string;
    }

    function createNewState($id_country, $iso_country, $state_code_name)
    {
        $newstate = new State();
        $newstate->id = 0;
        $newstate->id_country = $id_country;
        $newstate->id_zone = Country::getIdZone($id_country);
        $newstate->name = $state_code_name;

        if( strlen($state_code_name)>2)
            $newstate->iso_code = $iso_country . substr($state_code_name,0,2);
        else
            $newstate->iso_code = $iso_country . $state_code_name;
        
        $newstate->tax_behavior = 0;
        $newstate->active = 1;
        $newstate->save();
        return $newstate->id;
    }

    function getIdByCodeOrName($codeOrName, $id_country)
    {
  	    $sql ='SELECT `id_state`
	    FROM `'._DB_PREFIX_.'state`
	    WHERE  `id_country`=' . $id_country . ' AND (`iso_code` =\''. $codeOrName . '\' OR `name` = \'' . $codeOrName .'\')';
  	    $result = Db::getInstance()->getRow($sql);
                return (intval($result['id_state']));
    }	
	
		function non_downloadable_products_nbr($id_order)
	{
		$sql = 'SELECT count(od.product_id)
			FROM `' . _DB_PREFIX_ . 'order_detail` od
			LEFT JOIN ' . _DB_PREFIX_ . 'product_download pd ON od.product_id=pd.id_product
			WHERE id_order =' . intval($id_order). ' AND IFNULL(pd.id_product,0) = 0
			';
		$nbr = Db::getInstance()->getValue($sql);
		return intval($nbr);
	}
	
		function change_to_delivered($id_order)
	{
		$sql = 'INSERT INTO `' . _DB_PREFIX_ . 'order_history` (`id_employee`, `id_order`, `id_order_state`, `date_add`) VALUES (0, ' . intval($id_order) . ', 5, \'' . date('y-m-d H:i:s') . '\');';
		Db::getInstance()->Execute($sql);
	}


    function log_message($msg)
    {
		if(Agile_Logging !='on')return;
        $handle = fopen("./debug.log", "a+");
        if(!$handle)return;
        $reffer  = "";
        if(isset($_SERVER['HTTP_REFERER']))$reffer = $_SERVER['HTTP_REFERER'];
        fwrite($handle, date("H:i:s") . "," . $reffer . "," . $msg . "\r\n");
        fclose($handle);
    }

    function getCarriersByZoneID($id_zone)
    {
		global $cookie, $cart;
		
	    $id_groups = array(1);
		$islogged = (_PS_VERSION_ > '1.5' ? Context::getContext()->customer->isLogged() : $cookie->isLogged());
		if($islogged)
		{
			$customer = new Customer((int)($cookie->id_customer));
			$id_groups = $customer->getGroups();
		}
		        
		$result = Carrier::getCarriers(intval($cookie->id_lang), true, false, intval($id_zone), $id_groups, Carrier::ALL_CARRIERS);

	    $resultsArray = array();
	    foreach ($result AS $k => $row)
	    {
		    $carrier = new Carrier(intval($row['id_carrier']));


		    			$shipping_method = $carrier->getShippingMethod();
			if (   ($shipping_method == Carrier::SHIPPING_METHOD_WEIGHT AND $carrier->getMaxDeliveryPriceByWeight($id_zone) === false)
				OR ($shipping_method == Carrier::SHIPPING_METHOD_PRICE  AND $carrier->getMaxDeliveryPriceByPrice($id_zone) === false))
		    {
			    unset($result[$k]);
			    continue ;
			}
			
		    		    if ($row['range_behavior'])
		    {

			    				if ((Configuration::get('PS_SHIPPING_METHOD') AND (!Carrier::checkDeliveryPriceByWeight($row['id_carrier'], $cart->getTotalWeight(), $id_zone)))
					OR (!Configuration::get('PS_SHIPPING_METHOD') AND (!Carrier::checkDeliveryPriceByPrice($row['id_carrier'], $cart->getOrderTotal(true, Cart::BOTH_WITHOUT_SHIPPING), $id_zone))))
				    {
					    unset($result[$k]);
					    continue ;
				    }
		    }

		    $row['name'] = (strval($row['name']) != '0' ? $row['name'] : Configuration::get('PS_SHOP_NAME'));

			$method = $carrier->getShippingMethod();
			$row['price'] = 0;
			if($method == Carrier::SHIPPING_METHOD_PRICE)
				$row['price'] = $carrier->getDeliveryPriceByPrice($cart->getOrderTotal(Cart::BOTH_WITHOUT_SHIPPING),$id_zone);	
			else if($method == Carrier::SHIPPING_METHOD_WEIGHT)
				$row['price'] =  $carrier->getDeliveryPriceByWeight($cart->getTotalWeight(), $id_zone);
			
			if((int)$row['shipping_handling'] ==1)
			{
				$row['price'] = (float)$row['price'] + (float)Configuration::get('PS_SHIPPING_HANDLING');
			}
			if((int)$row['is_free'])$row['price'] = 0;

		    $row['price_tax_exc'] = $row['price'];

			$address = new Address($cart->id_address_delivery); 
			$tax_rate = $carrier->getTaxesRate($address);			

			$currency = new Currency($cart->id_currency);
			$row['price'] = $row['price'] * $currency->conversion_rate * (1 + (float)$tax_rate / 100);
						
			$row['img'] = file_exists(_PS_SHIP_IMG_DIR_.intval($row['id_carrier']).'.jpg') ? _THEME_SHIP_DIR_.intval($row['id_carrier']).'.jpg' : '';
		    $resultsArray[] = $row;
	    }
	    
	    return $resultsArray;
    }


    function getZoneByStateOrCountry($id_country, $id_state)
    {
    	global $defaultCountry;
        if(!isset($id_country) OR intval($id_country)<=0)$id_country = $defaultCountry->id;   
        
        $id_zone = 0;
        if(isset($id_state) AND intval($id_state)>0){
	        $result = Db::getInstance()->getRow('
		    SELECT `id_zone`
		    FROM `'._DB_PREFIX_.'state`
		    WHERE `id_state` = '.intval($id_state));
    		$id_zone = $result['id_zone'];
        }
        if(!isset($id_zone) OR intval($id_zone)<=0){
            $id_zone = Country::getIdZone($id_country);
        }
        return $id_zone;
    }

    function getShippingAddressID($id_country, $id_state)
    {
        if(!$id_state)$id_state = 0;
        $sql = 'SELECT id_address FROM  `'._DB_PREFIX_.'address` WHERE alias=\'agileexpress\' AND id_customer=0 AND id_manufacturer=0 AND id_supplier=0 AND id_country=' . $id_country . ' AND id_state=' . $id_state;
	    $result = Db::getInstance()->getRow($sql);
	    $id_address = 0;
    	$id_address = (isset($result['id_address'])? intval($result['id_address']) : 0);
    	if($id_address<=0)
    	{
    	    $address = new Address();
    	    $address->id=0;
    	    $address->alias='agileexpress';
    	    $address->id_customer=0;
    	    $address->id_manufacturer=0;
    	    $address->id_supplier=0;
    	    $address->id_country = $id_country;
    	    $address->id_state = $id_state;
    	    $address->lastname='Temporary';
    	    $address->firstname='Address';
    	    $address->address1='For shipping fee and tax calculation only';
    	    $address->address2='It will be replaced with real address';
    	    $address->city=' after payment';
    	    $address->postcode='postcode';
    	    $address->add();
    	    $id_address = $address->id;
    	}
    	return $id_address;
    }

    public function getSellerPaypalEmailAddress()
    {
        global $cart;
        
        $support_sellers = intval(Configuration::get('AGILE_PAYPAL_SUPPORT_SELLERS'));
        if($support_sellers != 1 OR !Module::isInstalled('agilemultipleseller') OR intval(Configuration::get('AGILE_MS_PAYMENT_MODE'))!=1)return Configuration::get('AGILE_PAYPAL_BUSINESS');

		$products = $cart->getProducts();
        if(empty($products))return;        
        
        $product = $products[0];
        $sql = 'SELECT id_owner FROM `'._DB_PREFIX_.'product_owner` WHERE id_product=' . $product['id_product'];
        $ownerid = Db::getInstance()->getRow($sql);
        if(!isset($ownerid['id_owner']) OR intval($ownerid['id_owner'])<=0)return Configuration::get('AGILE_PAYPAL_BUSINESS');
        
                $sql = 'SELECT * FROM `'._DB_PREFIX_.'agile_seller_paymentinfo` WHERE module_name=\'' . $this->name . '\' AND id_seller=' . intval($ownerid['id_owner']);
        $payment = Db::getInstance()->getRow($sql);
        if(!isset($payment['id_agile_seller_paymentinfo']) OR intval($payment['id_agile_seller_paymentinfo'])<=0)return '';
        return $payment['info1'];
    }
    
        public function getSellerPaypalMicroEmailAddress()
    {
        global $cart;
        $support_sellers = intval(Configuration::get('AGILE_PAYPAL_SUPPORT_SELLERS'));
        if($support_sellers != 1 OR !Module::isInstalled('agilemultipleseller') OR intval(Configuration::get('AGILE_MS_PAYMENT_MODE'))!=1)return Configuration::get('AGILE_PAYPAL_BUSINESS2');
        
        return '';
    }  
	
	protected function get_module_file()
	{
		return str_replace("agilepaypalbase.","agilepaypal." , __FILE__);
	}
	
	public function findExistingAddress($addresses)
	{
		if(!isset($addresses))return 0;
		if(empty($addresses))return 0;
		$address1 = utf8_encode($_POST['address_street']);
		$city = utf8_encode($_POST['address_city']);
		$postcode = utf8_encode($_POST['address_zip']);
		$id_country = Country::getByIso($_POST['address_country_code']);

		foreach($addresses as $address)
		{
			if(Validate::isLoadedObject($address))
				if($address->address1 == $address1 AND $address->city == $city AND $address->id_country == $id_country)return $address->id;
			else
				if($address['address1'] == $address1 AND $address['city'] == $city AND $address['id_country'] == $id_country)return $address['id_address'];
		}
		return 1;
	}

	public function get_return_url()
	{	
		global $cart;
		
		if(version_compare(_PS_VERSION_, '1.5', '>='))
			return Context::getContext()->link->getModuleLink('agilepaypal', 'return', array('id_cart'=>$cart->id), true);
		else		
			return Tools::getShopDomainSsl(true,true) . __PS_BASE_URI__ . "modules/agilepaypal/agilepaypalreturn.php";
	}
	
	public function agilepaypal_return()
	{
		global $cookie, $smarty;
	
		$isLoggedOn =  (_PS_VERSION_ > '1.5'? Context::getContext()->customer->isLogged() : $cookie->isLogged());
		$id_subcart = 0;
		if(Module::isInstalled('agilemultipleseller'))
		{
			include_once(_PS_ROOT_DIR_  . "/modules/agilemultipleseller/agilemultipleseller.php");
			if(Configuration::get('AGILE_MS_PAYMENT_MODE') == AgileMultipleSeller::PAYMENT_MODE_SELLER AND intval(Tools::getValue('id_subcart')) > 0)
			{
				$id_subcart = intval(Tools::getValue('id_subcart'));
				AgileMultipleSeller::update_subcart_progress($id_subcart, 1);	
			}
		}
		$smarty->assign('id_subcart',$id_subcart);
		$smarty->assign('isLoggedOn',$isLoggedOn);	
	}

	public function agilepaypal_redirect()
	{
		global $cookie, $cart, $smarty, $defaultCountry;
	
		$error_msg = '';

				if(Module::isInstalled('agilemultipleseller'))
		{
			include_once(_PS_ROOT_DIR_  . "/modules/agilemultipleseller/agilemultipleseller.php");
			$original_id_cart = AgileMultipleSeller::backup_cart_for_subcart_payment();
		}

		$paypal = new AgilePaypal();
		$cart = new Cart(intval($cookie->id_cart));
		$expresscheckoutkey = md5(_PS_VERSION_ . $cookie->id_cart);

		$address_override = 0;
		$islogged = Context::getContext()->customer->isLogged();
		if($islogged)
		{
												$customer = new Customer(intval($cart->id_customer));
			$addresses = $customer->getAddresses($cookie->id_lang);
			$id_address = 0; 
			if(!empty($addresses))
			{
				foreach($addresses AS $addr)
				{
					if(intval($cart->id_address_delivery) == intval($addr['id_address']))
					{   
						$id_address = intval($addr['id_address']);
						break;
					}
				}

				if($id_address>0)
					$address = new Address($id_address);
				else
					$address = new Address($addresses[0]['id_address']);  
			}
		}
		if(!isset($address) OR !$address->id_country)
		{
			$address = new Address();
			$address->id_country = intval(Tools::getValue('sl_expresscheckout_id_country')); 
		}
		if(!isset($address) OR !$address->id_country)
		{
			$address = new Address();
			$address->id_country = (int)Configuration::get('PS_COUNTRY_DEFAULT'); 
		}
		
		$country = new Country(intval($address->id_country));
		$zone = new Zone(intval($country->id_zone));
		$doSubmit = (($country->active == 1 AND $zone->active==1) OR $cart->isVirtualCart());

		$state = NULL;
		if ($address->id_state)
			$state = new State(intval($address->id_state));

		if($islogged)
		{
			$customer = new Customer(intval($cart->id_customer));
		}
		else
		{
			$customer = new Customer();
			$customer->secure_key = md5(uniqid(rand(), true));
		}


		$business = $paypal->getSellerPaypalEmailAddress();
		$header = Configuration::get('AGILE_PAYPAL_HEADER');
		$currency_order = new Currency(intval($cart->id_currency));
		$currency_module = new Currency((int)Configuration::get('AGILE_PAYPAL_CURRENCY'));
		
		if (!Validate::isEmail($business))
			$error_msg .= $paypal->getL('Paypal error: (invalid or undefined business account email)');

		if (!Validate::isLoadedObject($currency_module))
			$error_msg .= $paypal->getL('Currency Restriction: (Invalid currency restriction setting for this module)');

				$customercurrency = $cookie->id_currency;
		$defaultCountryAgile = $defaultCountry;
		$defaultCountry = $country;
		
		$the_rate = $currency_order->conversion_rate / $currency_module->conversion_rate;

		$cartproducts = $cart->getProducts();

		$prod_total = $cart->getOrderTotal(true, Cart::ONLY_PRODUCTS);
		$discount = abs(floatval($cart->getOrderTotal(true, Cart::ONLY_DISCOUNTS)));
		$all_total = $cart->getOrderTotal(true, Cart::BOTH);

				$business2 = $paypal->getSellerPaypalMicroEmailAddress();
		$micro_amount = floatval(Configuration::get('AGILE_PAYPAL_MICRO_AMOUNT'));
		if( isset($business2) AND strlen(trim($business2))>0
			AND isset($micro_amount) AND floatval($micro_amount)>0 AND floatval($all_total)<=$micro_amount
		  )$business = $business2;


		if(version_compare(_PS_VERSION_, '1.5', '>='))
			$shipping = Tools::ps_round(floatval($cart->getOrderTotal(true, Cart::ONLY_SHIPPING)),2);
		else
			$shipping = Tools::ps_round(floatval($cart->getOrderShippingCost()) + floatval($cart->getOrderTotal(true, Cart::ONLY_WRAPPING)), 2);

		if(!empty($error_msg))$doSubmit = 0;

		$smarty->assign(array(
			'redirect_text' => $paypal->getL($doSubmit==1?'Please wait, redirecting to Paypal... Thanks.': 'Sorry, we do not ship to your country.'),
			'cancel_text' => $paypal->getL('Cancel'),
			'cart_text' => $paypal->getL('My cart'),
			'return_text' => $paypal->getL('Return to shop'),
			'paypal_url' => $paypal->getPaypalUrl(),
			'address' => $address,
			'country' => $country,
			'state' => $state,
			'doSubmit' => $doSubmit,
			'baseUrl' => __PS_BASE_URI__,
			'address_override' => $address_override,
			'amount' =>  floatval($cart->getOrderTotal(true, Cart::BOTH_WITHOUT_SHIPPING)),
			'customer' => $customer,
			'all_total' => $all_total,
			'shipping' => $shipping,
			'discount' => $discount,
			'show_discount' => ($prod_total > $discount? 1 : 0),
			'business' => $business,
			'currency_module' => $currency_module,
			'cart_id' => intval($cart->id),
			'products' => $cartproducts,
			'paypal_id' => intval($paypal->id),
			'invoice' => intval(Configuration::get('AGILE_MS_PAYMENT_MODE')),
			'header' => $header,
			'expresscheckoutkey' => $expresscheckoutkey,
			'id_subcart' => intval(Tools::getValue('id_subcart')),
			'PS_ALLOW_MOBILE_DEVICE'=>0,
			'agile_url' =>  (_PS_VERSION_ > '1.4'? Tools::getShopDomainSsl(true,true):Tools::getHttpHost(true, true)).__PS_BASE_URI__ ,
			'agilepaypal_return_url' => $this->get_return_url(),
			'error_msg' => $error_msg,
			'the_rate' => $the_rate
			));


				$cookie->id_currency = $customercurrency;
		$defaultCountry = $defaultCountryAgile;

				if(Module::isInstalled('agilemultipleseller'))
		{
			include_once(_PS_ROOT_DIR_  . "/modules/agilemultipleseller/agilemultipleseller.php");
			AgileMultipleSeller::restore_cart_for_subcart_payment($original_id_cart);
		}
	}


	public function agilepaypal_subscribe()
	{
		global $cookie, $cart, $smarty, $defaultCountry;

		$error_msg = '';

		$paypal = new AgilePaypal();
		$cart = new Cart(intval($cookie->id_cart));
		$expresscheckoutkey = md5(_PS_VERSION_ . $cookie->id_cart);

		$cycle_base = Tools::getValue('sl_agilepaypalexpress_cycle_base');
		$cycle = Tools::getValue('sl_agilepaypalexpress_cycle');
		$cycle_list = array('D','W','M','Y');
		if(!in_array($cycle,$cycle_list))
			$error_msg .= $paypal->getL('Recurring cycle error: (invalid or recurring cycle)') . "<BR>";

		$cycle_num = Tools::getValue('sl_agilepaypalexpress_cycle_num');

		$address_override = 0;
		$islogged = Context::getContext()->customer->isLogged();
		if($islogged)
		{
												$customer = new Customer(intval($cart->id_customer));			
			$addresses = $customer->getAddresses($cookie->id_lang);
			if(!empty($addresses))
			{
				$id_address = 0; 
				foreach($addresses AS $addr)
				{
					if(intval($cart->id_address_delivery) == intval($addr['id_address']))
					{   
						$id_address = intval($addr['id_address']);
						break;
					}
				}

				if($id_address>0)
					$address = new Address($id_address);
				else
					$address = new Address($addresses[0]['id_address']);  
			}
		}
		if(!isset($address) OR !$address->id_country)
		{
			$address = new Address();
			$address->id_country = intval(Tools::getValue('sl_expresscheckout_id_country')); 
		}
		if(!isset($address) OR !$address->id_country)
		{
			$address = new Address();
			$address->id_country = (int)Configuration::get('PS_COUNTRY_DEFAULT'); 
		}
		
		$country = new Country(intval($address->id_country));
		$zone = new Zone(intval($country->id_zone));

		$doSubmit = (($country->active == 1 AND $zone->active==1) OR $cart->isVirtualCart());

		$state = NULL;
		if ($address->id_state)
			$state = new State(intval($address->id_state));

		if($islogged)
		{
			$customer = new Customer(intval($cart->id_customer));
		}
		else
		{
			$customer = new Customer();
			$customer->secure_key = md5(uniqid(rand(), true));
		}


		$business = $paypal->getSellerPaypalEmailAddress();
		$header = Configuration::get('AGILE_PAYPAL_HEADER');
		$currency_order = new Currency(intval($cart->id_currency));
		$currency_module = new Currency((int)Configuration::get('AGILE_PAYPAL_CURRENCY'));

		if (!Validate::isEmail($business))
			$error_msg .= $paypal->getL('Paypal error: (invalid or undefined business account email)') . "<BR>";

		if (!Validate::isLoadedObject($currency_module))
			$error_msg .= $paypal->getL('Currency Restriction: (Invalid currency restriction setting for this module)') . "<BR>";

				$customercurrency = $cookie->id_currency;
		$defaultCountryAgile = $defaultCountry;
		$defaultCountry = $country;
		
		$the_rate = $currency_order->conversion_rate / $currency_module->conversion_rate;

		$cartproducts = $cart->getProducts();

		$product1st = $cartproducts[0];

		$all_total = $cart->getOrderTotal(true, Cart::BOTH);

				$business2 = $paypal->getSellerPaypalMicroEmailAddress();
		$micro_amount = floatval(Configuration::get('AGILE_PAYPAL_MICRO_AMOUNT'));
		if( isset($business2) AND strlen(trim($business2))>0
			AND isset($micro_amount) AND floatval($micro_amount)>0 AND floatval($all_total)<=$micro_amount
		  )$business = $business2;

		if(_PS_VERSION_ > '1.5')
			$shipping = Tools::ps_round(floatval($cart->getOrderTotal(true, Cart::ONLY_SHIPPING)),2);
		else
			$shipping = Tools::ps_round(floatval($cart->getOrderShippingCost()) + floatval($cart->getOrderTotal(true, Cart::ONLY_WRAPPING)), 2);

		if(!empty($error_msg))$doSubmit = 0;


		$smarty->assign(array(
			'redirect_text' => $paypal->getL($doSubmit==1?'Please wait, redirecting to Paypal... Thanks.': 'Sorry, we do not ship to your country.'),
			'cancel_text' => $paypal->getL('Cancel'),
			'cart_text' => $paypal->getL('My cart'),
			'return_text' => $paypal->getL('Return to shop'),
			'paypal_url' => $paypal->getPaypalUrl(),
			'address' => $address,
			'country' => $country,
			'state' => $state,
			'doSubmit' => $doSubmit,
			'baseUrl' => __PS_BASE_URI__,
			'address_override' => $address_override,
			'amount' => floatval($cart->getOrderTotal(true, Cart::BOTH_WITHOUT_SHIPPING)),
			'customer' => $customer,
			'all_total' => $all_total,
			'shipping' => $shipping,
			'discount' => abs($cart->getOrderTotal(true, Cart::ONLY_DISCOUNTS)),
			'business' => $business,
			'currency_module' => $currency_module,
			'cart_id' => intval($cart->id),
			'products' => $cartproducts,
			'product1st' => $product1st,
			'paypal_id' => intval($paypal->id),
			'invoice' => intval(Configuration::get('AGILE_MS_PAYMENT_MODE')),
			'header' => $header,
			'cycle_base' => $cycle_base,
			'cycle' => $cycle,
			'cycle_num' => $cycle_num,
			'expresscheckoutkey' => $expresscheckoutkey,
			'PS_ALLOW_MOBILE_DEVICE'=>0,
			'agile_url' =>  (_PS_VERSION_ > '1.4'? Tools::getShopDomainSsl(true,true):Tools::getHttpHost(true, true)).__PS_BASE_URI__ ,
			'agilepaypal_return_url' => $this->get_return_url(),
			'error_msg' => $error_msg,
			'the_rate' => $the_rate
			));


				$cookie->id_currency = $customercurrency;
		$defaultCountry = $defaultCountryAgile;
			}
	
}
