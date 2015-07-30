<?php

class FrontController extends FrontControllerCore
{

	/*
	* module: belvg_staticblocks
	* date: 2015-07-10 12:35:20
	* version: 1.0.0
	*/
    public function init()
    {
        parent::init();
        global $smarty;

        require_once _PS_MODULE_DIR_ . 'belvg_staticblocks/classes/BelvgStaticBlocks.php';
        smartyRegisterFunction($smarty, 'function', 'getBelvgBlockContent', array('BelvgStaticBlocks', 'getBlockContent'));
    }

	/*
	* module: agilemultipleseller
	* date: 2015-07-10 13:48:21
	* version: 3.0.6.2
	*/
	public function initHeader()
	{
		parent::initHeader();
		
		if(Module::isInstalled('agilemultipleshop'))
		{
			include_once(_PS_ROOT_DIR_  . "/modules/agilemultipleshop/agilemultipleshop.php");
			AgileMultipleShop::init_shop_header();
			AgileMultipleShop::clear_blockcategory_cache();
		}
	}	
}