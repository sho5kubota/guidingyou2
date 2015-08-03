<?php
///-build_id: 2015031920.2559
/// This source file is subject to the Software License Agreement that is bundled with this 
/// package in the file license.txt, or you can get it here
/// http://addons-modules.com/en/content/3-terms-and-conditions-of-use
///
/// @copyright  2009-2012 Addons-Modules.com
///  If you need open code to customize or merge code with othe modules, please contact us.
class Search extends SearchCore
{

	public static function sanitize($string, $id_lang, $indexation = false, $iso_code = false)
	{
		$string = trim($string);
		if (empty($string))
			return '';

		$string = Tools::strtolower(strip_tags($string));
		$string = html_entity_decode($string, ENT_NOQUOTES, 'utf-8');

		$string = preg_replace('/(['.PREG_CLASS_NUMBERS.']+)['.PREG_CLASS_PUNCTUATION.']+(?=['.PREG_CLASS_NUMBERS.'])/u', '\1', $string);
		$string = preg_replace('/['.PREG_CLASS_SEARCH_EXCLUDE.']+/u', ' ', $string);

		if ($indexation)
			$string = preg_replace('/[._-]+/', ' ', $string);
		else
		{
			$string = preg_replace('/[._]+/', '', $string);
			$string = ltrim(preg_replace('/([^ ])-/', '$1 ', ' '.$string));
			$string = preg_replace('/[._]+/', '', $string);
			$string = preg_replace('/[^\s]-+/', '', $string);
		}

		$blacklist = Tools::strtolower(Configuration::get('PS_SEARCH_BLACKLIST', $id_lang));
		if (!empty($blacklist))
		{
			$string = preg_replace('/(?<=\s)('.$blacklist.')(?=\s)/Su', '', $string);
			$string = preg_replace('/^('.$blacklist.')(?=\s)/Su', '', $string);
			$string = preg_replace('/(?<=\s)('.$blacklist.')$/Su', '', $string);
			$string = preg_replace('/^('.$blacklist.')$/Su', '', $string);
		}

		if (!$indexation)
		{
			$words = explode(' ', $string);
			$processed_words = array();
			// search for aliases for each word of the query
			foreach ($words as $word)
			{
				$alias = new Alias(null, $word);
				if (Validate::isLoadedObject($alias))
					$processed_words[] = $alias->search;
				else
					$processed_words[] = $word;
			}
			$string = implode(' ', $processed_words);
		}

		// If the language is constituted with symbol and there is no "words", then split every chars
		if (in_array($iso_code, array('zh', 'tw', 'ja')) && function_exists('mb_strlen'))
		{
			// Cut symbols from letters
            /*
			$symbols = '';
			$letters = '';
			foreach (explode(' ', $string) as $mb_word)
				if (strlen(Tools::replaceAccentedChars($mb_word)) == mb_strlen(Tools::replaceAccentedChars($mb_word)))
					$letters .= $mb_word.' ';
				else
					$symbols .= $mb_word.' ';

			if (preg_match_all('/./u', $symbols, $matches))
				$symbols = implode(' ', $matches[0]);

			$string = $letters.$symbols;
            */
		}
		elseif ($indexation)
		{
			$minWordLen = (int)Configuration::get('PS_SEARCH_MINWORDLEN');
			if ($minWordLen > 1)
			{
				$minWordLen -= 1;
				$string = preg_replace('/(?<=\s)[^\s]{1,'.$minWordLen.'}(?=\s)/Su', ' ', $string);
				$string = preg_replace('/^[^\s]{1,'.$minWordLen.'}(?=\s)/Su', '', $string);
				$string = preg_replace('/(?<=\s)[^\s]{1,'.$minWordLen.'}$/Su', '', $string);
				$string = preg_replace('/^[^\s]{1,'.$minWordLen.'}$/Su', '', $string);
			}
		}

		$string = trim(preg_replace('/\s+/', ' ', $string));
		return $string;
	}

	/*
	* module: agilemultipleseller
	* date: 2015-05-07 23:01:22
	* version: 3.0.6.2
	*/
	public static function find($id_lang, $expr, $pageNumber = 1, $pageSize = 1, $orderBy = 'position', $orderWay = 'desc', $ajax = false, $useCookie = true,Context $context = null)
	{
		global $cookie;

				if(!Module::isInstalled('agilemultipleseller') AND !Module::isInstalled('agilesellerlistoptions'))
			return  parent::find($id_lang, $expr, $pageNumber, $pageSize, $orderBy, $orderWay, $ajax, $useCookie);

		$agile_sql_parts = AgileSellerManager::getAdditionalSqlForProducts("p");
		
		$db = Db::getInstance(_PS_USE_SQL_SLAVE_);
		
				if ($useCookie)
			$id_customer = (int)$cookie->id_customer;
		else
			$id_customer = 0;
		
				if ($pageNumber < 1) $pageNumber = 1;
		if ($pageSize < 1) $pageSize = 1;

		if (!Validate::isOrderBy($orderBy) OR !Validate::isOrderWay($orderWay))
			return false;

		$intersectArray = array();
		$scoreArray = array();
        if(is_array($expr)) {
		    $words = explode(' ', Search::sanitize($expr['words'], (int)$id_lang));
        } else {
		    $words = explode(' ', Search::sanitize($expr, (int)$id_lang));
        }
		foreach ($words AS $key => $word)
			if (!empty($word) AND strlen($word) >= (int)Configuration::get('PS_SEARCH_MINWORDLEN'))
			{
				$word = str_replace('%', '\\%', $word);
				$word = str_replace('_', '\\_', $word);
				$intersectArray[] = 'SELECT id_product
					FROM '._DB_PREFIX_.'search_word sw
					LEFT JOIN '._DB_PREFIX_.'search_index si ON sw.id_word = si.id_word
					WHERE sw.id_lang = '.(int)$id_lang.'
					AND sw.word LIKE 
					'.($word[0] == '-'
						? ' \''.pSQL(Tools::substr($word, 1, PS_SEARCH_MAX_WORD_LENGTH)).'%\''
						: '\''.pSQL(Tools::substr($word, 0, PS_SEARCH_MAX_WORD_LENGTH)).'%\''
						);
				if ($word[0] != '-')
					$scoreArray[] = 'sw.word LIKE \''.pSQL(Tools::substr($word, 0, PS_SEARCH_MAX_WORD_LENGTH)).'%\'';
			}
			else
				unset($words[$key]);
		if (!is_array($expr) && !sizeof($words))
			return ($ajax ? array() : array('total' => 0, 'result' => array()));

		$score = '';
		if (sizeof($scoreArray))
			$score = ',(
				SELECT SUM(weight)
				FROM '._DB_PREFIX_.'search_word sw
				LEFT JOIN '._DB_PREFIX_.'search_index si ON sw.id_word = si.id_word
				WHERE sw.id_lang = '.(int)$id_lang.'
				AND si.id_product = p.id_product
				AND ('.implode(' OR ', $scoreArray).')
			) position';

        if (is_array($expr)) {

        	if($expr['category'] == 0)
        		$catSql = '';
        	else
        		$catSql = ' AND c.id_category = ' . $expr['category'];

            $result = $db->ExecuteS('
            SELECT p.`id_product`
            FROM `'._DB_PREFIX_.'product` p
            INNER JOIN `'._DB_PREFIX_.'category` c ON p.`id_category_default` = c.`id_category`
            WHERE c.`active` = 1 AND p.`active` = 1 AND indexed = 1' . $catSql
            , false);
        } else {
            $result = $db->ExecuteS('
            SELECT cp.`id_product`
            FROM `'._DB_PREFIX_.'category_group` cg
            INNER JOIN `'._DB_PREFIX_.'category_product` cp ON cp.`id_category` = cg.`id_category`
            INNER JOIN `'._DB_PREFIX_.'category` c ON cp.`id_category` = c.`id_category`
            INNER JOIN `'._DB_PREFIX_.'product` p ON cp.`id_product` = p.`id_product`
            WHERE c.`active` = 1 AND p.`active` = 1 AND indexed = 1
            AND cg.`id_group` '.(!$id_customer ?  '= 1' : 'IN (
                SELECT id_group FROM '._DB_PREFIX_.'customer_group
                WHERE id_customer = '.(int)$id_customer.'
            )'), false);
        }
		
		$eligibleProducts = array();
		while ($row = $db->nextRow($result))
			$eligibleProducts[] = $row['id_product'];
        $first = true;
		foreach ($intersectArray as $query)
		{
			$result = $db->ExecuteS($query, false);
			$eligibleProducts2 = array();
			while ($row = $db->nextRow($result))
				$eligibleProducts2[] = $row['id_product'];
            if ((int)@$expr['category'] === 0 && $first) {
			    $eligibleProducts = $eligibleProducts2;
                $first = false;
            } else {
			    $eligibleProducts = array_intersect($eligibleProducts, $eligibleProducts2);
            }
			if ((int)@$expr['category'] !== 0 && !count($eligibleProducts))
				return ($ajax ? array() : array('total' => 0, 'result' => array()));
		}
		array_unique($eligibleProducts);
		
        if (is_array($expr) && $expr['location'] !== '') {

        	if($expr['city']!=='' && $expr['state']!==''){
        		 $results = $db->executeS('
	                SELECT DISTINCT id_product FROM ps_product_lang pl
	                WHERE pl.country = "'.$expr['location'].'"
	                AND pl.city = "'.$expr['city'].'"
	                AND pl.state = "'.$expr['state'].'"

	            ');
        	} elseif ($expr['city']!=='' && $expr['state']==='') {
        		$results = $db->executeS('
	                SELECT DISTINCT id_product FROM ps_product_lang pl
	                WHERE pl.country = "'.$expr['location'].'"
	                AND pl.city = "'.$expr['city'].'"
	            ');
        		# code...
        	} elseif ($expr['city']==='' && $expr['state']!=='') {
        		$results = $db->executeS('
	                SELECT DISTINCT id_product FROM ps_product_lang pl
	                WHERE pl.country = "'.$expr['location'].'"
	                AND pl.state = "'.$expr['state'].'"
	            ');
        		# code...
        	}else{
        		// $placeArray = array('0'); // Stop errors when $words is empty
        		$placeArray = array();
				$pieces = explode(" ", $expr['location']);

				foreach($pieces as $word){

					if(Product::getProductLikeName($id_lang, $word, 'country'))
				    	$placeArray[] = '( pl.country LIKE  "'.$word.'%" )';

					else if(Product::getProductStateLikeName($word))
						$placeArray[] = '( pl.state LIKE  "'.$word.'%" )';

					else if(Product::getProductLikeName($id_lang, $word, 'city'))
						$placeArray[] = '( pl.city LIKE  "'.$word.'%" )';
					else
						$placeArray[] = '( pl.address LIKE  "'.$word.'%" )';
				}

        		$results = $db->executeS(
                'SELECT DISTINCT id_product FROM ps_product_lang pl
                WHERE '.implode(" AND ", $placeArray));

        	}
            

            $eligibleProducts3 = array();
            foreach ($results as $row) {
                $eligibleProducts3[] = $row['id_product'];
            }
            if ((int)$expr['category'] === 0 && !sizeof($words)) {
			    $eligibleProducts = $eligibleProducts3;
            } else {
			    $eligibleProducts = array_intersect($eligibleProducts, $eligibleProducts3);
            }
            if (!count($eligibleProducts)) {
                return ($ajax ? array() : array('total' => 0, 'result' => array()));
            }
        }
		array_unique($eligibleProducts);

		$productPool = '';
		foreach ($eligibleProducts AS $id_product)
			if ($id_product)
				$productPool .= (int)$id_product.',';
		if (empty($productPool))
			return ($ajax ? array() : array('total' => 0, 'result' => array()));
		$productPool = ((strpos($productPool, ',') === false) ? (' = '.(int)$productPool.' ') : (' IN ('.rtrim($productPool, ',').') '));

		if ($ajax)
		{
			$sql = 'SELECT DISTINCT p.id_product, pl.name pname, pl.country, pl.address, pl.city, cl.name cname,
						cl.link_rewrite crewrite, pl.link_rewrite prewrite '.$score.'
						' . $agile_sql_parts['selects'] . '
					FROM '._DB_PREFIX_.'product p
					INNER JOIN `'._DB_PREFIX_.'product_lang` pl ON (
						p.`id_product` = pl.`id_product`
						AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').'
					)
					'.Shop::addSqlAssociation('product', 'p').'
					INNER JOIN `'._DB_PREFIX_.'category_lang` cl ON (
						product_shop.`id_category_default` = cl.`id_category`
						AND cl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').'
					)
					' . $agile_sql_parts['joins'] . '
					WHERE p.`id_product` '.$productPool.'
					' . $agile_sql_parts['wheres'] . '
					ORDER BY position DESC LIMIT 10';
			return $db->executeS($sql);
		}
		// Edited active product
		$from_conds = '
		FROM '._DB_PREFIX_.'product p
            ' . $agile_sql_parts['joins'] . '
		INNER JOIN `'._DB_PREFIX_.'product_lang` pl ON (p.`id_product` = pl.`id_product` AND pl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'tax_rule` tr ON (p.`id_tax_rules_group` = tr.`id_tax_rules_group`
		                                           AND tr.`id_country` = '.(int)(_PS_VERSION_>'1.5' ? Context::getContext()->country->id :  Country::getDefaultCountryId()).'
	                                           	   AND tr.`id_state` = 0)
	    LEFT JOIN `'._DB_PREFIX_.'tax` tax ON (tax.`id_tax` = tr.`id_tax`)
		LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON m.`id_manufacturer` = p.`id_manufacturer`
		LEFT JOIN `'._DB_PREFIX_.'image` i ON (i.`id_product` = p.`id_product` AND i.`cover` = 1)
		LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$id_lang.')
		WHERE p.`id_product` '.$productPool.' AND p.active = 1 
		' . $agile_sql_parts['wheres'] . '
		';

		$sort_limit = ($orderBy ? 'ORDER BY  '.$orderBy : '').($orderWay ? ' '.$orderWay : '').'
			LIMIT '.(int)(($pageNumber - 1) * $pageSize).','.(int)$pageSize;
		

		$total = $db->getValue(' SELECT COUNT(*) ' . $from_conds);
		
		$queryResults = '	SELECT p.*, pl.`description_short`, pl.`available_now`, pl.`available_later`, pl.`link_rewrite`, pl.`name`,pl.`country`,pl.`address`,pl.`city`,
			tax.`rate`, i.`id_image`, il.`legend`, m.`name` manufacturer_name '.$score.', DATEDIFF(p.`date_add`, DATE_SUB(NOW(), INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).' DAY)) > 0 new
            ' . $agile_sql_parts['selects'] . '
			' . $from_conds. '
			' . $sort_limit . '
			';

		$result = $db->ExecuteS($queryResults);
				
		if (!$result)
			$resultProperties = false;
		else
			$resultProperties = Product::getProductsProperties((int)$id_lang, $result);

		$resultProperties = AgileSellerManager::prepareSellerRattingInfo($resultProperties);		
		return array('total' => $total,'result' => $resultProperties);
	}
	

	/*
	* module: agilemultipleseller
	* date: 2015-05-07 23:01:22
	* version: 3.0.6.2
	*/
	public static function searchTag($id_lang, $tag, $count = false, $pageNumber = 0, $pageSize = 10, $orderBy = false, $orderWay = false,
		$useCookie = true, Context $context = null)
	{
		if (!$context)
			$context = Context::getContext();

				if(!Module::isInstalled('agilemultipleseller') AND !Module::isInstalled('agilesellerlistoptions'))
			return  parent::searchTag($id_lang, $expr, $pageNumber, $pageSize, $orderBy, $orderWay, $ajax, $useCookie, $context);

		$agile_sql_parts = AgileSellerManager::getAdditionalSqlForProducts("p");
		

				if ($useCookie)
			$id_customer = (int)$context->customer->id;
		else
			$id_customer = 0;

		if (!is_numeric($pageNumber) || !is_numeric($pageSize) || !Validate::isBool($count) || !Validate::isValidSearch($tag)
			|| $orderBy && !$orderWay || ($orderBy && !Validate::isOrderBy($orderBy)) || ($orderWay && !Validate::isOrderBy($orderWay)))
			return false;

		if ($pageNumber < 1) $pageNumber = 1;
		if ($pageSize < 1) $pageSize = 10;

		$id = Context::getContext()->shop->id;
		$id_shop = $id ? $id : Configuration::get('PS_SHOP_DEFAULT');
		if ($count)
		{
			$sql = 'SELECT COUNT(DISTINCT pt.`id_product`) nb
					FROM `'._DB_PREFIX_.'product` p
		            ' . $agile_sql_parts['joins'] . '
					'.Shop::addSqlAssociation('product', 'p').'
					LEFT JOIN `'._DB_PREFIX_.'product_tag` pt ON (p.`id_product` = pt.`id_product`)
					LEFT JOIN `'._DB_PREFIX_.'tag` t ON (pt.`id_tag` = t.`id_tag` AND t.`id_lang` = '.(int)$id_lang.')
					LEFT JOIN `'._DB_PREFIX_.'category_product` cp ON (cp.`id_product` = p.`id_product`)
					LEFT JOIN `'._DB_PREFIX_.'category_shop` cs ON (cp.`id_category` = cs.`id_category` AND cs.`id_shop` = '.(int)$id_shop.')
					LEFT JOIN `'._DB_PREFIX_.'category_group` cg ON (cg.`id_category` = cp.`id_category`)
					WHERE product_shop.`active` = 1
						' . $agile_sql_parts['wheres'] . '
						AND cs.`id_shop` = '.(int)Context::getContext()->shop->id.'
						AND cg.`id_group` '.(!$id_customer ?  '= '.(int)Configuration::get('PS_UNIDENTIFIED_GROUP') : 'IN (
							SELECT id_group FROM '._DB_PREFIX_.'customer_group
							WHERE id_customer = '.(int)$id_customer.')').'
						AND t.`name` LIKE \'%'.pSQL($tag).'%\'';
			return (int)Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
		}

		$sql = 'SELECT DISTINCT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity, pl.`description_short`, pl.`link_rewrite`, pl.`name`,
					MAX(image_shop.`id_image`) id_image, il.`legend`, m.`name` manufacturer_name, 1 position,
					DATEDIFF(
						p.`date_add`,
						DATE_SUB(
							NOW(),
							INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).' DAY
						)
					) > 0 new
	            ' . $agile_sql_parts['selects'] . '
				FROM `'._DB_PREFIX_.'product` p
	            ' . $agile_sql_parts['joins'] . '
				INNER JOIN `'._DB_PREFIX_.'product_lang` pl ON (
					p.`id_product` = pl.`id_product`
					AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').'
				)
				'.Shop::addSqlAssociation('product', 'p', false).'
				LEFT JOIN `'._DB_PREFIX_.'image` i ON (i.`id_product` = p.`id_product`)'.
			Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1').'		
				LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$id_lang.')
				LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON (m.`id_manufacturer` = p.`id_manufacturer`)
				LEFT JOIN `'._DB_PREFIX_.'product_tag` pt ON (p.`id_product` = pt.`id_product`)
				LEFT JOIN `'._DB_PREFIX_.'tag` t ON (pt.`id_tag` = t.`id_tag` AND t.`id_lang` = '.(int)$id_lang.')
				LEFT JOIN `'._DB_PREFIX_.'category_product` cp ON (cp.`id_product` = p.`id_product`)
				LEFT JOIN `'._DB_PREFIX_.'category_group` cg ON (cg.`id_category` = cp.`id_category`)
				LEFT JOIN `'._DB_PREFIX_.'category_shop` cs ON (cg.`id_category` = cs.`id_category` AND cs.`id_shop` = '.(int)$id_shop.')
				'.Product::sqlStock('p', 0).'
				WHERE product_shop.`active` = 1
					' . $agile_sql_parts['wheres'] . '
					AND cs.`id_shop` = '.(int)Context::getContext()->shop->id.'
					AND cg.`id_group` '.(!$id_customer ?  '= '.(int)Configuration::get('PS_UNIDENTIFIED_GROUP') : 'IN (
						SELECT id_group FROM '._DB_PREFIX_.'customer_group
						WHERE id_customer = '.(int)$id_customer.')').'
					AND t.`name` LIKE \'%'.pSQL($tag).'%\'
					GROUP BY product_shop.id_product
				ORDER BY position DESC'.($orderBy ? ', '.$orderBy : '').($orderWay ? ' '.$orderWay : '').'
				LIMIT '.(int)(($pageNumber - 1) * $pageSize).','.(int)$pageSize;
		if (!$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql))
			return false;

		$results = Product::getProductsProperties((int)$id_lang, $result);

		$results = AgileSellerManager::prepareSellerRattingInfo($results);				
		return $results;
	}

}
