<?php
/*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class SearchControllerCore extends FrontController
{
	public $php_self = 'search';
	public $instant_search;
	public $ajax_search;

	/**
	 * Initialize search controller
	 * @see FrontController::init()
	 */
	public function init()
	{
		parent::init();

		$this->instant_search = Tools::getValue('instantSearch');

		$this->ajax_search = Tools::getValue('ajaxSearch');

		if ($this->instant_search || $this->ajax_search)
		{
			$this->display_header = false;
			$this->display_footer = false;
		}
	}

	/**
	 * Assign template vars related to page content
	 * @see FrontController::initContent()
	 */
	public function initContent()
	{
		$query = Tools::replaceAccentedChars(urldecode(Tools::getValue('q')));
		$query_loc = Tools::replaceAccentedChars(urldecode(Tools::getValue('search_loc')));
		$query_state = Tools::replaceAccentedChars(urldecode(Tools::getValue('search_state')));
		$query_city = Tools::replaceAccentedChars(urldecode(Tools::getValue('search_city')));
		$query_cat = Tools::replaceAccentedChars(urldecode(Tools::getValue('search_cat')));
		$query_words = Tools::replaceAccentedChars(urldecode(Tools::getValue('search_words')));
		
		$original_query = Tools::getValue('q');
		$original_query_loc = Tools::getValue('search_original');
		$query_original = Tools::getValue('search_original');
		$original_query_cat = Tools::getValue('search_cat');
		$original_query_words = Tools::getValue('search_words');

		if ($this->ajax_search)
		{
			// die(Tools::jsonEncode(array('key' => 'value')));
			$searchresult = array();
			
			$sqlcountry = 'SELECT *, country as countryflg FROM '._DB_PREFIX_.'product_lang where country LIKE "'.$query.'%" Group by country';
			$resultcountry =  Db::getInstance()->ExecuteS($sqlcountry);
			
			$sqlstate = 'SELECT *, state as stateflg FROM '._DB_PREFIX_.'product_lang where state LIKE "'. $query .'%" Group by state';
			$resultstate =  Db::getInstance()->ExecuteS($sqlstate);

			$sqlcity = 'SELECT *, city as cityflg FROM '._DB_PREFIX_.'product_lang where city LIKE "'. $query .'%" Group by city ' ;
			$resultcity =  Db::getInstance()->ExecuteS($sqlcity);
			array_push($searchresult, $resultcountry);
			array_push($searchresult, $resultstate);
			array_push($searchresult, $resultcity);

			if($resultcity == null && $resultstate ==null && $resultcountry ==null){

				$sqlplace = 'SELECT *, concat_ws(" ",country,state) as allflg,country as country FROM '._DB_PREFIX_.'product_lang	
					where concat_ws(" ",country,state) LIKE "'. $query .'%" AND id_lang = 1 Group by state limit 5 ' ;
				$resultplace= Db::getInstance()->ExecuteS($sqlplace);
				
				$sqlplacecity = 'SELECT *, city as cityflg,country as country FROM '._DB_PREFIX_.'product_lang	
					where concat_ws(" ",country,city) LIKE "'. $query .'%" AND id_lang = 1 Group by city limit 5 ' ;
				$resultplacecity= Db::getInstance()->ExecuteS($sqlplacecity);

				array_push($searchresult, $resultplace);
				array_push($searchresult, $resultplacecity);				

				
				

			}

			
			
			$searchresult = array_filter($searchresult);
			$searchresult = array_values($searchresult);
			 // foreach ($results as $key => $values){
			 // 	$results[$key]['cityflag'] = $resultscity;
			 // }
			die(Tools::jsonEncode($searchresult));
			// die('<pre>'.print_r($searchresult,true));
		}

		//Only controller content initialization when the user use the normal search
		parent::initContent();

		if ($this->instant_search && !is_array($query))
		{
			$this->productSort();
			$this->n = abs((int)(Tools::getValue('n', Configuration::get('PS_PRODUCTS_PER_PAGE'))));
			$this->p = abs((int)(Tools::getValue('p', 1)));
			$search = Search::find($this->context->language->id, $query, 1, 10, 'position', 'desc');
			Hook::exec('actionSearch', array('expr' => $query, 'total' => $search['total']));
			$nbProducts = $search['total'];
			$this->pagination($nbProducts);

			$this->addColorsToProductList($search['result']);

			$this->context->smarty->assign(array(
				'products' => $search['result'], // DEPRECATED (since to 1.4), not use this: conflict with block_cart module
				'search_products' => $search['result'],
				'nbProducts' => $search['total'],
				'search_query' => $original_query,
				'instant_search' => $this->instant_search,
				'homeSize' => Image::getSize(ImageType::getFormatedName('home'))));
		}
		elseif (($query = Tools::getValue('search_query', Tools::getValue('ref'))) && !is_array($query))
		{
			$this->productSort();
			$this->n = abs((int)(Tools::getValue('n', Configuration::get('PS_PRODUCTS_PER_PAGE'))));
			$this->p = abs((int)(Tools::getValue('p', 1)));
			$original_query = $query;
			$query = Tools::replaceAccentedChars(urldecode($query));
			$search = Search::find($this->context->language->id, $query, $this->p, $this->n, $this->orderBy, $this->orderWay);
			foreach ($search['result'] as &$product)
				$product['link'] .= (strpos($product['link'], '?') === false ? '?' : '&').'search_query='.urlencode($query).'&results='.(int)$search['total'];
			Hook::exec('actionSearch', array('expr' => $query, 'total' => $search['total']));
			$nbProducts = $search['total'];
			$this->pagination($nbProducts);

			$this->addColorsToProductList($search['result']);

			$this->context->smarty->assign(array(
				'products' => $search['result'], // DEPRECATED (since to 1.4), not use this: conflict with block_cart module
				'search_products' => $search['result'],
				'nbProducts' => $search['total'],
				'search_query' => $original_query,
				'homeSize' => Image::getSize(ImageType::getFormatedName('home'))));
		}
		elseif (($tag = urldecode(Tools::getValue('tag'))) && !is_array($tag))
		{
			$nbProducts = (int)(Search::searchTag($this->context->language->id, $tag, true));
			$this->pagination($nbProducts);
			$result = Search::searchTag($this->context->language->id, $tag, false, $this->p, $this->n, $this->orderBy, $this->orderWay);
			Hook::exec('actionSearch', array('expr' => $tag, 'total' => count($result)));

			$this->addColorsToProductList($result);

			$this->context->smarty->assign(array(
				'search_tag' => $tag,
				'products' => $result, // DEPRECATED (since to 1.4), not use this: conflict with block_cart module
				'search_products' => $result,
				'nbProducts' => $nbProducts,
				'homeSize' => Image::getSize(ImageType::getFormatedName('home'))));
		}
		elseif ($query_loc !== "" || $query_cat !== "" || $query_words !== "" || $query_state !== "" || $query_city !== ""  || $query_original!=="")
        {
			$this->productSort();
			$this->n = abs((int)(Tools::getValue('n', Configuration::get('PS_PRODUCTS_PER_PAGE'))));
			$this->p = abs((int)(Tools::getValue('p', 1)));
            $query_arr = array('words' => $query_words, 'location' => $query_loc,'city' => $query_city, 'state'=>$query_state,'original'=>$query_original,  'category' => $query_cat);
			$search = Search::find($this->context->language->id, $query_arr, $this->p, $this->n, $this->orderBy, $this->orderWay);
			foreach ($search['result'] as &$product)
				$product['link'] .= (strpos($product['link'], '?') === false ? '?' : '&').'search_query='.urlencode($query).'&results='.(int)$search['total'];
			Hook::exec('actionSearch', array('expr' => $query, 'total' => $search['total']));
			$nbProducts = $search['total'];
			$this->pagination($nbProducts);

			/*foreach($search['result'] as $k => $v) {
				$country = $v['country'];
				$flagId = Country::getIdByName(1, $country);
				$search['result'][$k]['img_exist']	= file_exists(_PS_ROOT_DIR_ . DS . 'flag' . DS . 'mini'. DS . $flagId . '.jpg')? 1 : 0;
				$search['result'][$k]['img_name']	= $flagId . '.jpg';
			}*/

			foreach ($search['result'] as $key => $value) {
				$seller_id = $value['id_seller'];
				$flagIds = self::getFlagsId($seller_id);
				foreach($flagIds as $k => $flgId) {
					$search['result'][$key]['img_exist'][$k]	= file_exists(_PS_ROOT_DIR_ . DS . 'flag' . DS . 'mini'. DS . $flgId . '.jpg')? 1 : 0;
					$search['result'][$key]['img_name'][$k]	= $flgId . '.jpg';
				}
			}

			// die('<pre>' . print_r($search['result'], true));

			$this->addColorsToProductList($search['result']);

			$original_query = array();
			if($query_loc != "")
				array_push($original_query, $query_original);
			if($query_words != "")
				array_push($original_query, $query_words);

			
			$original_query_text = implode(" ", $original_query);
			$cat_name = $original_query_cat == 0 ? 'All Categories' : self::getCategoryName($original_query_cat);

			$this->context->smarty->assign(array(
				'products' => $search['result'], // DEPRECATED (since to 1.4), not use this: conflict with block_cart module
				'search_words' => $original_query_words,
				'search_products' => $search['result'],
				'cat_id' => $original_query_cat,
				'cat_name' => $cat_name,
				'nbProducts' => $search['total'],
				'search_query' => @$query_loc.' '.@$query_state.' '.@$query_city,
				'homeSize' => Image::getSize(ImageType::getFormatedName('home'))));
		}
		else
		{
			$this->context->smarty->assign(
				array(
					'products' => array(),
					'search_products' => array(),
					'pages_nb' => 1,
					'nbProducts' => 0,
				)
			);
		}
		$this->context->smarty->assign(array('add_prod_display' => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'), 'comparator_max_item' => Configuration::get('PS_COMPARATOR_MAX_ITEM')));

		$this->setTemplate(_PS_THEME_DIR_.'search.tpl');
	}

	public function displayHeader($display = true)
	{
		if (!$this->instant_search && !$this->ajax_search)
			parent::displayHeader();
		else
			$this->context->smarty->assign('static_token', Tools::getToken(false));
	}

	public function displayFooter($display = true)
	{
		if (!$this->instant_search && !$this->ajax_search)
			parent::displayFooter();
	}

	public function setMedia()
	{
		parent::setMedia();

		if (!$this->instant_search && !$this->ajax_search)
			$this->addCSS(_THEME_CSS_DIR_.'product_list.css');
	}

	public static function getCategoryName($id) {

	$category = new Category ($id,Context::getContext()->language->id);

	return $category->name;

	}

	public static function getFlagsId($seller_id) {

		$sql = "
		SELECT s.language
		FROM " . _DB_PREFIX_ . "sellerinfo s
		WHERE s.id_seller = ". $seller_id;

		$lang = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

		$languages = explode(",", $lang[0]['language']);

		$data = array();

		foreach ($languages as $key => $value) {
			$sql2 = "
			SELECT l.id_lang
			FROM " . _DB_PREFIX_ . "lang l
			WHERE l.name = '". $value . "'";

			$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql2);
			$data[] = @$result[0]['id_lang'];
		}

		return $data;
	}
}
