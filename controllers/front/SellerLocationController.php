<?php
///-build_id: 2015070722.3847
/// This source file is subject to the Software License Agreement that is bundled with this 
/// package in the file license.txt, or you can get it here
/// http://addons-modules.com/en/content/3-terms-and-conditions-of-use
///
/// @copyright  2009-2012 Addons-Modules.com
///  If you need open code to customize or merge code with othe modules, please contact us.
if(Module::isInstalled('agilemultipleshop'))
{
	include_once(_PS_ROOT_DIR_ . "/modules/agilemultipleshop/agilemultipleshop.php");
	include_once(_PS_ROOT_DIR_ . "/modules/agilemultipleshop/SellerType.php");
}
if(Module::isInstalled('agilemultipleseller'))
{
	require_once(_PS_ROOT_DIR_ . "/modules/agilemultipleseller/agilemultipleseller.php");
	require_once(_PS_ROOT_DIR_ . "/modules/agilemultipleseller/SellerInfo.php");
}

class SellerLocationControllerCore extends FrontController
{
	public $php_self = 'sellerlocation';
	public $authRedirection = 'sellerlocation';
	private $location_level = '';
	
	protected $id_location;
	protected $custom_field;
	
	protected function canonicalRedirection($canonical_url = '')
	{
		parent::canonicalRedirection();  
	}	
	
	
	public function __construct()
	{
		parent::__construct();
		$this->location_level = AgileMultipleShop::getShopByLocationLevel();
		$this->id_location = AgileMultipleShop::getShopByLocationID();
		$this->custom_field = AgileMultipleShop::SHOP_BY_CUSTOM_FIELD;

	}	

	public function setMedia()
	{
		parent::setMedia();

		Context::getContext()->controller->addCSS(array(
				_PS_CSS_DIR_.'jquery.cluetip.css' => 'all',
				_MODULE_DIR_.'category.css' => 'all',
				_THEME_CSS_DIR_.'product_list.css' => 'all'));

		if (Configuration::get('PS_COMPARATOR_MAX_ITEM') > 0)
		{
			$this->addJS(_THEME_JS_DIR_.'products-comparison.js');
		}
	}

	public function init()
	{		
		parent::init();	
		$this->productSort();
	}


	public function initContent()
	{
		parent::initContent();
		$this->processData();
		$this->setTemplate(_PS_ROOT_DIR_.'/modules/agilemultipleshop/views/templates/front/sellerlocation.tpl');
	}

	
	public function processData()
	{
		$nbProducts = $this->getProducts(NULL, NULL, NULL, $this->orderBy, $this->orderWay, true);
		$this->pagination((int)$nbProducts);
		self::$smarty->assign('nb_products', (int)$nbProducts);
		$seller_products = $this->getProducts((int)(self::$cookie->id_lang), (int)($this->p), (int)($this->n), $this->orderBy, $this->orderWay);

		AgileHelper::AssignProductImgs($seller_products);

		$si_1531_later = version_compare(_PS_VERSION_, '1.5.3.1', ">=");

		include_once(_PS_ROOT_DIR_ . "/modules/agilemultipleshop/agilemultipleshop.php");
		$module = new AgileMultipleShop();
		self::$smarty->assign(array(
			'products' => (isset($seller_products) AND $seller_products) ? $seller_products : NULL,
			'id_location' =>  $this->id_location,
			'agilesellerproducts_tpl' => _PS_ROOT_DIR_ . '/modules/' . (_PS_VERSION_>'1.5'?'agilemultipleshop':'agilesellerproducts') . '/', 
			'add_prod_display' => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
			'categorySize' => Image::getSize(($si_1531_later? ImageType::getFormatedName('category') : 'category')),
			'mediumSize' => Image::getSize(($si_1531_later? ImageType::getFormatedName('medium') : 'medium')),
			'thumbSceneSize' => Image::getSize(($si_1531_later? ImageType::getFormatedName('thumb_scene') : 'thumb_scene')),
			'homeSize' => Image::getSize(($si_1531_later? ImageType::getFormatedName('home') : 'home')),
			'path' => $module->getL('Shop By Location'),
			));
			
		$ver = (int)str_replace(".","",_PS_VERSION_);
		if (isset(self::$cookie->id_compare))
			self::$smarty->assign('compareProducts', CompareProduct::getCompareProducts((int)self::$cookie->id_compare));

		self::$smarty->assign(array(
			'seller_locations4page' => agilemultipleshop::getLocationListNV($this->location_level)
			,'location_level4page' => $this->location_level
		));


		self::$smarty->assign(array(
			'allow_oosp' => (int)(Configuration::get('PS_ORDER_OUT_OF_STOCK')),
			'comparator_max_item' => (int)(Configuration::get('PS_COMPARATOR_MAX_ITEM'))
		));
	}

	
	protected function getProducts($id_lang, $p, $n, $orderBy = NULL, $orderWay = NULL, $getTotal = false, $active = true,$random = false, $randomNumberProducts = 1)
    {
        global $cookie, $smarty;

		$id_seller_country = (int)Tools::getValue('id_seller_country');

		if ($p < 1) $p = 1;
        if ($n <= 0)$n = 10;

		if (empty($orderBy))
			$orderBy = 'price';
		else
						$orderBy = strtolower($orderBy);

		if (empty($orderWay))
			$orderWay = 'ASC';
		if ($orderBy == 'id_product' OR	$orderBy == 'date_add')
			$orderByPrefix = 'p';
		elseif ($orderBy == 'name')
			$orderByPrefix = 'pl';
		elseif ($orderBy == 'manufacturer')
		{
			$orderByPrefix = 'm';
			$orderBy = 'name';
		}

		if ($orderBy == 'price')
			$orderBy = 'orderprice';

		if (!Validate::isBool($active) OR !Validate::isOrderBy($orderBy) OR !Validate::isOrderWay($orderWay))
			die (Tools::displayError());

        $requiredcond = '';
        if(intval(Configuration::get('AGILE_MS_PRODUCT_APPROVAL')) ==1)
            $requiredcond = ' AND po.approved = 1 ';

		$joins = '';
		$wheres = '';
        if(Module::isInstalled('agilesellerlistoptions'))
        {
			require_once(_PS_ROOT_DIR_ . "/modules/agilesellerlistoptions/agilesellerlistoptions.php");

            $joins = $joins . '
                LEFT JOIN `'._DB_PREFIX_.'seller_listoption` slb ON (p.id_product = slb.id_product AND slb.id_option = ' . AgileSellerListOptions::ASLO_OPTION_LIST . ')
                ';
                
			$aslo_list_prod_id = intval(Configuration::get('ASLO_PROD_FOR_OPTION' . AgileSellerListOptions::ASLO_OPTION_LIST));
			$wheres = $wheres . ' 
    		    AND (slb.status = ' . AgileSellerListOptions::ASLO_STATUS_IN_EFFECT . '  OR IFNULL(po.id_owner,0) = 0 OR ' . $aslo_list_prod_id . '=' . AgileSellerListOptions::ASLO_ALWAYS_FREE .')
                ';
        }

		$location_conditions = '';
		switch($this->location_level)
		{
			case 'country':
				if((int)$this->id_location >0)
					$location_conditions = ' AND si.id_country=' . (int)$this->id_location;
				break;
			case 'state':
				if((int)$this->id_location >0)
					$location_conditions = ' AND si.id_state=' . (int)$this->id_location;
				break;
			case 'city':
				if(!empty($this->id_location))
					$location_conditions = ' AND sil.city=\'' . $this->id_location . '\'';
				break;
			case 'sellertype':
				if(!empty($this->id_location))
					$location_conditions = ' AND si.id_sellertype1=' . $this->id_location;
				break;
			case 'custom':
				if(!empty($this->id_location))
				{
					if(AgileMultipleShop::SHOP_BY_CUSTOM_LANG)
					{
						$location_conditions = ' AND sil.' . AgileMultipleShop::SHOP_BY_CUSTOM_FIELD . '=\'' . $this->id_location . '\'';
					}
					else
					{
						$location_conditions = ' AND si.' . AgileMultipleShop::SHOP_BY_CUSTOM_FIELD . '=\'' . $this->id_location . '\'';
					}
				}
				break;
		}

				if ($getTotal)
		{		
			$sql = '
			SELECT COUNT(po.`id_product`) AS total
			FROM `'._DB_PREFIX_.'product` p
			LEFT JOIN `'._DB_PREFIX_.'product_owner` po ON p.`id_product` = po.`id_product`
	        LEFT JOIN `'._DB_PREFIX_.'sellerinfo` si ON si.`id_seller` = po.`id_owner`
	        LEFT JOIN `'._DB_PREFIX_.'sellerinfo_lang` sil ON si.`id_sellerinfo` = sil.`id_sellerinfo` AND sil.id_lang = ' . $cookie->id_lang . '
			' . $joins . '
			WHERE p.active=1 
				' . $location_conditions .'
			    ' . ($active ? ' AND p.`active` = 1' : '') . '
				' . $requiredcond . '
				' . $wheres .'
			    ';

			$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql);

			return isset($result) ? $result['total'] : 0;
		}


        $sql = '
		        SELECT p.*, pa.`id_product_attribute`, pl.`description`, pl.`description_short`, pl.`available_now`, pl.`available_later`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`, pl.`name`, i.`id_image`, il.`legend`, m.`name` AS manufacturer_name, tl.`name` AS tax_name, t.`rate`, cl.`name` AS category_default, DATEDIFF(p.`date_add`, DATE_SUB(NOW(), INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).' DAY)) > 0 AS new,
			        (p.`price` * IF(t.`rate`,((100 + (t.`rate`))/100),1)) AS orderprice
		        FROM `'._DB_PREFIX_.'product_owner` po
		        LEFT JOIN `'._DB_PREFIX_.'sellerinfo` si ON si.`id_seller` = po.`id_owner`
		        LEFT JOIN `'._DB_PREFIX_.'sellerinfo_lang` sil ON si.`id_sellerinfo` = sil.`id_sellerinfo` AND sil.id_lang = ' . $cookie->id_lang . '
		        LEFT JOIN `'._DB_PREFIX_.'product` p ON p.`id_product` = po.`id_product`
		        LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa ON (p.`id_product` = pa.`id_product` AND default_on = 1)
		        LEFT JOIN `'._DB_PREFIX_.'category_lang` cl ON (p.`id_category_default` = cl.`id_category` AND cl.`id_lang` = '.(int)($cookie->id_lang).')
		        LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (p.`id_product` = pl.`id_product` AND pl.`id_lang` = '.(int)($cookie->id_lang).')
		        LEFT JOIN `'._DB_PREFIX_.'image` i ON (i.`id_product` = p.`id_product` AND i.`cover` = 1)
		        LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)($cookie->id_lang).')
		        LEFT JOIN `'._DB_PREFIX_.'tax_rule` tr ON (p.`id_tax_rules_group` = tr.`id_tax_rules_group`
		                                                   AND tr.`id_country` = '.(int)(_PS_VERSION_>'1.5' ? Context::getContext()->country->id :  Country::getDefaultCountryId()).'
	                                           	           AND tr.`id_state` = 0)
	            LEFT JOIN `'._DB_PREFIX_.'tax` t ON (t.`id_tax` = tr.`id_tax`)
		        LEFT JOIN `'._DB_PREFIX_.'tax_lang` tl ON (t.`id_tax` = tl.`id_tax` AND tl.`id_lang` = '.(int)($cookie->id_lang).')
		        LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON m.`id_manufacturer` = p.`id_manufacturer`
				' . $joins . '
		        WHERE p.active=1 
					' . $location_conditions. '
        			' . $requiredcond . '
					' . $wheres . '
		        ';

		if ($random === true)
		{
			$sql .= ' ORDER BY RAND()';
			$sql .= ' LIMIT 0, '.(int)($randomNumberProducts);
		}
		else
		{
			$sql .= ' ORDER BY '.(isset($orderByPrefix) ? $orderByPrefix.'.' : '').'`'.pSQL($orderBy).'` '.pSQL($orderWay).'
			LIMIT '.(((int)($p) - 1) * (int)($n)).','.(int)($n);
		}


		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

		if ($orderBy == 'orderprice')
			Tools::orderbyPrice($result, $orderWay);

		if (!$result)
			return false;

				return Product::getProductsProperties($id_lang, $result);

    }
	
	
}

