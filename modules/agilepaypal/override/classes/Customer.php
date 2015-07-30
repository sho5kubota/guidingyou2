<?php
///-build_id: 2015022208.5429
/// This source file is subject to the Software License Agreement that is bundled with this 
/// package in the file license.txt, or you can get it here
/// http://addons-modules.com/en/content/3-terms-and-conditions-of-use
///
/// @copyright  2009-2012 Addons-Modules.com
///  If you need open code to customize or merge code with othe modules, please contact us.

class Customer extends CustomerCore
{
		public static function customerHasAddress($id_customer, $id_address)
	{
		if(!Module::isInstalled('agilepaypal'))return parent::customerHasAddress($id_customer, $id_address);

		$address = new Address($id_address);
		if(Validate::isLoadedObject($address))
		{
			if($address->alias == 'agileexpress' AND $address->id_customer == 0 AND $address->id_manufacturer == 0 AND $address->id_supplier==0)
				return true;
		}
		
		return parent::customerHasAddress($id_customer, $id_address);
	}
	

}

