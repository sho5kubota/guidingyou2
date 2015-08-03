<?php
///-build_id: 2015022208.5429
/// This source file is subject to the Software License Agreement that is bundled with this 
/// package in the file license.txt, or you can get it here
/// http://addons-modules.com/en/content/3-terms-and-conditions-of-use
///
/// @copyright  2009-2012 Addons-Modules.com
///  If you need open code to customize or merge code with othe modules, please contact us.
class Hook extends HookCore
{
	public static function getHookModuleExecList($hook_name = null)
	{
		$list = parent::getHookModuleExecList($hook_name);
		if($hook_name != 'displayPayment')return $list;
		
		if(Module::isInstalled('agilemembership') && Module::isInstalled('agilepaypal') && ((int)Configuration::get('AGILE_PAYPAL_AM_INTEGRATED')) == 1)
		{
			include_once(_PS_ROOT_DIR_ . "/modules/agilepaypal/agilepaypal.php");
			$ap = new AgilePaypal();
			if($ap->hasNonMembershipProducts())return $list;
			foreach($list as $payment)
			{
				if($payment['module'] == 'agilepaypal')return array($payment);
			}
			return false;
		}
		return $list;
	}
}

