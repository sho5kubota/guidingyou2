<?php
///-build_id: 2015022208.5429
/// This source file is subject to the Software License Agreement that is bundled with this 
/// package in the file license.txt, or you can get it here
/// http://addons-modules.com/en/content/3-terms-and-conditions-of-use
///
/// @copyright  2009-2012 Addons-Modules.com
///  If you need open code to customize or merge code with othe modules, please contact us.

class Cart extends CartCore
{
	public function getDeliveryOption($default_country = null, $dontAutoSelectOptions = false, $use_cache = true)
	{
		@session_start();
		if(Module::isInstalled('agilepaypal') && isset($_SESSION['agile_paypal_validating_order']) && $_SESSION['agile_paypal_validating_order'] == 1 && isset($this->delivery_option) && $this->delivery_option != '')
		{
			$_SESSION['agile_paypal_validating_order'] = 0;
			return Tools::unSerialize($this->delivery_option);
		}
		return parent::getDeliveryOption($default_country, $dontAutoSelectOptions, $use_cache);		
	}
}
