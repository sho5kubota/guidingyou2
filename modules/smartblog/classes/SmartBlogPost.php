<?php


class SmartBlogPost extends ObjectModel
{
      public $id_smart_blog_post;
      public $id_author;
      public $id_category;
      public $position = 0;
      public $active = 1;
      public $available;
      public $created;
      public $modified;
      public $short_description;
      public $viewed;
      public $comment_status = 1;
      public $post_type;
      public $meta_title;
      public $meta_keyword;
      public $meta_description;
      public $image;
      public $content;
      public $link_rewrite;
      public $is_featured;

      public static $definition = array(
		'table' => 'smart_blog_post',
		'primary' => 'id_smart_blog_post',
                'multilang'=>true,
		'fields' => array(
                     'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
                     'position' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
                     'id_category' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
                     'id_author' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
                     'available' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
                     'created' => array('type' => self::TYPE_DATE, 'validate' => 'isString'),
                     'modified' => array('type' => self::TYPE_DATE, 'validate' => 'isString'),
                     'viewed' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
                     'is_featured' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
                     'comment_status' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
                     'post_type' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
                     'image' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
                     
                        'meta_title' => array('type' => self::TYPE_STRING, 'validate' => 'isString','lang'=>true,'required'=>true),
                        'meta_keyword' => array('type' => self::TYPE_STRING, 'lang'=>true, 'validate' => 'isString'),
                        'meta_description' => array('type' => self::TYPE_STRING, 'lang'=>true, 'validate' => 'isString'),
                        'short_description' => array('type' => self::TYPE_STRING, 'lang'=>true, 'validate' => 'isString','required'=>true),
                        'content' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString','required'=>true),
	                'link_rewrite' => array('type' => self::TYPE_STRING, 'lang'=>true, 'validate' => 'isString','required'=>false)
                     ),
	);
      

    
    public function __construct($id = null, $id_lang = null, $id_shop = null){
            Shop::addTableAssociation('smart_blog_post', array('type' => 'shop'));
                    parent::__construct($id, $id_lang, $id_shop);
            }
            
    public static function getPost($id_post,$id_lang = null){
        $result = array();  
        if($id_lang == null){
                    $id_lang = (int)Context::getContext()->language->id;
                }
        preg_match('/^[\d]+/', $id_post, $id_post);
        $id_post = $id_post[0];

        $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post 
                WHERE pl.id_lang='.$id_lang.'
                AND p.active= 1 AND p.id_smart_blog_post = '.$id_post;
        
        if (!$post = Db::getInstance()->executeS($sql))
			return false;
                $result['id_post'] = $post[0]['id_smart_blog_post'];
                $result['meta_title'] = $post[0]['meta_title'];
                $result['meta_description'] = $post[0]['meta_description'];
                $result['short_description'] = $post[0]['short_description'];
                $result['meta_keyword'] = $post[0]['meta_keyword'];
				if((Module::isEnabled('smartshortcode') == 1) && (Module::isInstalled('smartshortcode') == 1)){
				 require_once(_PS_MODULE_DIR_ . 'smartshortcode/smartshortcode.php');
				$smartshortcode = new SmartShortCode();
				$result['content'] = $smartshortcode->parse($post[0]['content']);
				}else{
				
				 $result['content'] = $post[0]['content'];
				 }
                $result['active'] = $post[0]['active'];
                $result['created'] = $post[0]['created'];
                $result['comment_status'] = $post[0]['comment_status'];
                $result['viewed'] = $post[0]['viewed'];
                $result['is_featured'] = $post[0]['is_featured'];
                $result['post_type'] = $post[0]['post_type'];
                $result['id_category'] = $post[0]['id_category'];
                $employee = new  Employee($post[0]['id_author']);
                $result['id_author'] = $post[0]['id_author'];
                $result['lastname'] = $employee->lastname;
                $result['firstname'] = $employee->firstname;
                $result['youtube'] = $post[0]['youtube'];
                if (file_exists(_PS_MODULE_DIR_.'smartblog/images/' . $post[0]['id_smart_blog_post'] . '.jpg') )
                {
                   $image =   $post[0]['id_smart_blog_post'] . '.jpg';
                   $result['post_img'] = $image;
		}
                else
                {
                   $result['post_img'] =NULL;
                }
        return $result;
    }
    
    public static function getAllPost($id_lang = null,$limit_start,$limit){
        if($id_lang == null){
                    $id_lang = (int)Context::getContext()->language->id;
                }
        if($limit_start == '')
            $limit_start = 0;
        if($limit == '')
            $limit = 5;
        $result = array();
        $BlogCategory = '';

        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $url = parse_url($actual_link);

        $store_alias = explode('/',$url['path']);

        $seller_alias = $store_alias[1];
      
        $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                WHERE pl.id_lang='.$id_lang.'
                AND p.active= 1 ORDER BY p.id_smart_blog_post DESC LIMIT '.$limit_start.','.$limit;
        
        if (!$posts = Db::getInstance()->executeS($sql))
			return false;
                $BlogCategory = new BlogCategory();
        $i = 0;
            foreach($posts as $post){
                $result[$i]['id_post'] = $post['id_smart_blog_post'];
                $result[$i]['is_featured'] = $post['is_featured'];
                $result[$i]['viewed'] = $post['viewed'];
                $result[$i]['meta_title'] = $post['meta_title'];
                $result[$i]['meta_description'] = $post['meta_description'];
                $result[$i]['short_description'] = $post['short_description'];
                $result[$i]['content'] = $post['content'];
                $result[$i]['meta_keyword'] = $post['meta_keyword'];
                $result[$i]['id_category'] = $post['id_category']; 
                $result[$i]['link_rewrite'] = $post['link_rewrite'];
                $result[$i]['seller_alias'] = $seller_alias;
                $result[$i]['cat_name'] = $BlogCategory->getCatName($post['id_category']);
                $result[$i]['cat_link_rewrite'] = $BlogCategory->getCatLinkRewrite($post['id_category']);
                $employee = new  Employee( $post['id_author']);
                
                $result[$i]['id_author'] = $post['id_author'];
                $result[$i]['lastname'] = $employee->lastname;
                $result[$i]['firstname'] = $employee->firstname;
                 if (file_exists(_PS_MODULE_DIR_.'smartblog/images/' . $post['id_author'] . '/' . $post['id_smart_blog_post'] . '.jpg'))
                    {
                       $image =   $post['id_smart_blog_post'];
                       $result[$i]['post_img'] = $image;
                    }
                    else
                    {
                       $result[$i]['post_img'] = 'no';
                    }
                $result[$i]['created'] = $post['created'];
                $i++;
            }
        return $result;
    }
    
    public static function getToltal($id_lang = null){
        if($id_lang == null){
                    $id_lang = (int)Context::getContext()->language->id;
                }
        $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                WHERE pl.id_lang='.$id_lang.'
                AND p.active= 1';
        if (!$posts = Db::getInstance()->executeS($sql))
			return false;           
        return count($posts);
    }
        
     public static function getToltalByCategory($id_lang = null,$id_category = null){
        if($id_lang == null){
                    $id_lang = (int)Context::getContext()->language->id;
                }
        if($id_category == null){
                    $id_category = 1;
                }
        $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                WHERE pl.id_lang='.$id_lang.'
                AND p.active= 1 AND p.id_category = '.$id_category;
        if (!$posts = Db::getInstance()->executeS($sql))
      return false;
        return count($posts);
    }

    public static function getToltalBySeller($id_lang = null,$id_seller = null){
        if($id_lang == null){
                    $id_lang = (int)Context::getContext()->language->id;
                }

        $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                WHERE pl.id_lang='.$id_lang.'
                AND p.active= 1 AND p.id_author = '.$id_seller;
        if (!$posts = Db::getInstance()->executeS($sql))
      return false;
        return count($posts);
    }
    
    public static function addTags($id_lang = null, $id_post, $tag_list, $separator = ','){
                if($id_lang == null){
                            $id_lang = (int)Context::getContext()->language->id;
                        }
	 	if (!Validate::isUnsignedId($id_lang))
			return false;

		if (!is_array($tag_list))
	 		$tag_list = array_filter(array_unique(array_map('trim', preg_split('#\\'.$separator.'#', $tag_list, null, PREG_SPLIT_NO_EMPTY))));

	 	$list = array();
		if (is_array($tag_list))
			foreach ($tag_list as $tag)
			{
                              $id_tag = BlogTag::TagExists($tag,(int)$id_lang);
                                if(!$id_tag)
                                 {
                                       $tag_obj = new BlogTag(null, $tag, (int)$id_lang);
                                        if (!Validate::isLoadedObject($tag_obj))
                                        {
                                                $tag_obj->name = $tag;
                                                $tag_obj->id_lang = (int)$id_lang;
                                                $tag_obj->add();
                                        }
                                        if (!in_array($tag_obj->id, $list))
                                                $list[] = $tag_obj->id;
                                }
                                else
                                {
                                         if (!in_array($id_tag, $list))
                                            $list[] = $id_tag;
                                }
				
			}
		$data = '';
		foreach ($list as $tag)
			$data .= '('.(int)$tag.','.(int)$id_post.'),';
		$data = rtrim($data, ',');
                
		return Db::getInstance()->execute('
		INSERT INTO `'._DB_PREFIX_.'smart_blog_post_tag` (`id_tag`, `id_post`)
		VALUES '.$data);
	}
        
    public function add($autodate = true, $null_values = false){
		if (!parent::add($autodate, $null_values))
			return false;
		else if (isset($_POST['products']))
			return $this->setProducts(Tools::getValue('products'));
		return true;
	}
        
    public static function postViewed($id_post){
	    
	    $sql = 'UPDATE '._DB_PREFIX_.'smart_blog_post as p SET p.viewed = (p.viewed+1) where p.id_smart_blog_post = '.$id_post;
	 	
		return Db::getInstance()->execute($sql);
	
	return true;
	}
        
    public function setProducts($array){
		$result = Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'smart_blog_post_tag WHERE id_tag = '.(int)$this->id);
		if (is_array($array))
		{
			$array = array_map('intval', $array);
			$result &= ObjectModel::updateMultishopTable('smart_blog_post_tag', array('indexed' => 0), 'a.id_post IN ('.implode(',', $array).')');
			$ids = array();
			foreach ($array as $id_post)
				$ids[] = '('.(int)$id_post.','.(int)$this->id.')';

			if ($result)
			{
				$result &= Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'smart_blog_post_tag (id_post, id_tag) VALUES '.implode(',', $ids));
				if (Configuration::get('PS_SEARCH_INDEXATION'))
					$result &= Search::indexation(false);
			}
		}
		return $result;
	}
        
    public static function deleteTagsForProduct($id_post){
		return Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'smart_blog_post_tag` WHERE `id_post` = '.(int)$id_post);
	}
        
    public static function getProductTags($id_post){
                $id_lang = (int)Context::getContext()->language->id;
	 	if (!$tmp = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT  t.`name`
		FROM '._DB_PREFIX_.'smart_blog_tag t
		LEFT JOIN '._DB_PREFIX_.'smart_blog_post_tag pt ON (pt.id_tag = t.id_tag AND t.id_lang = '.$id_lang.')
		WHERE pt.`id_post`='.(int)$id_post))
	 		return false;
	 	return $tmp;
	}
        
    public static function getProductTagsBylang($id_post,$id_lang = null) {
                if($id_lang == null){
                            $id_lang = (int)Context::getContext()->language->id;
                        }
                 $tags = '';
                    if (!$tmp = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
                    SELECT  t.`name`
                    FROM '._DB_PREFIX_.'smart_blog_tag t
                    LEFT JOIN '._DB_PREFIX_.'smart_blog_post_tag pt ON (pt.id_tag = t.id_tag AND t.id_lang = '.$id_lang.')
                    WHERE pt.`id_post`='.(int)$id_post))
                            return false;
                        $i = 1;
                         foreach ($tmp as $val) {
                             if($i>=count($tmp)){
                                $tags .= $val['name'];
                             }else{
                                 $tags .= $val['name'].',';
                             }
                             $i++;
                         }
                 return $tags;
            }
            
    public static function getPopularPosts($id_lang= null){
                if($id_lang == null){
                    $id_lang = (int)Context::getContext()->language->id;
                }
                if(Configuration::get('smartshowpopularpost') != '' && Configuration::get('smartshowpopularpost') != null){
                     $limit = Configuration::get('smartshowpopularpost');
                }else{
                    $limit = 5;
                }
                    $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT p.viewed ,p.created , p.id_smart_blog_post,pl.meta_title,pl.link_rewrite FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                    '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                    '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                    WHERE pl.id_lang='.$id_lang.' AND p.active = 1 ORDER BY p.viewed DESC LIMIT 0,'.$limit);
	
		return $result;
      }
      
    public static function getRelatedPosts($id_lang = null,$id_cat = null,$id_post= null){
            if($id_lang == null){
                        $id_lang = (int)Context::getContext()->language->id;
                    }
         if(Configuration::get('smartshowrelatedpost') != '' && Configuration::get('smartshowrelatedpost') != null){
                     $limit = Configuration::get('smartshowrelatedpost');
                }else{
                    $limit = 5;
                }
                if($id_cat == null){
                    $id_cat = 1;
                }
                if($id_post == null){
                    $id_post = 1;
                }
            $sql = 'SELECT  p.id_smart_blog_post,p.created,pl.meta_title,pl.link_rewrite FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                WHERE pl.id_lang='.$id_lang.'  AND p.active = 1 AND p.id_category = '.$id_cat.' AND p.id_smart_blog_post != '.$id_post.' ORDER BY p.id_smart_blog_post DESC LIMIT 0,'.$limit;

        if (!$posts = Db::getInstance()->executeS($sql))
			return false;
      return $posts;
        }
        
    public static function getRecentPosts($id_lang = null){
            if($id_lang == null){
                    $id_lang = (int)Context::getContext()->language->id;
                }
                if(Configuration::get('smartshowrecentpost') != '' && Configuration::get('smartshowrecentpost') != null){
                     $limit = Configuration::get('smartshowrecentpost');
                }else{
                    $limit = 5;
                }
                
		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT  p.id_smart_blog_post,p.created,pl.meta_title,pl.link_rewrite FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                WHERE pl.id_lang='.$id_lang.'  AND p.active = 1 ORDER BY p.id_smart_blog_post DESC LIMIT 0,'.$limit);
		
		return $result;
        }

    public static function getSearchPosts($id_lang = null, $search_loc, $search_words){
      if($id_lang == null){
        $id_lang = (int)Context::getContext()->language->id;
      }

      if(Configuration::get('smartshowrecentpost') != '' && Configuration::get('smartshowrecentpost') != null){
        $limit = Configuration::get('smartshowrecentpost');
      } else {
        $limit = 5;
      }

       $page = 0;
      if(isset($_GET['pb'])) {
        $page = ($_GET['pb'] <= 0)? 1 : $_GET['pb'];
         $start_from = ($page-1) * $limit; 
          
      } else {
        $start_from = 0;
      }
      $start_from = ($start_from <= 0)? 0 : $start_from;

      $id_locs = self::getSellersLocationId($search_loc);
      $id_locs = implode(',', $id_locs);
      $author_query = !empty($id_locs)? 'id_author IN ('.$id_locs.') AND' : 'id_author IN (099) AND';

      $word_query = "";
      if(!empty($search_words))
        $word_query = "(pl.meta_title LIKE '%".pSQL($search_words)."%' OR pl.short_description LIKE '%".pSQL($search_words)."%' OR pl.content LIKE '%".pSQL($search_words)."%') AND ";

 
      // die('Start: '.$start_from . ' Page: '. $page);

    $query =    'SELECT  p.id_smart_blog_post,p.created,pl.meta_title,pl.link_rewrite, p.id_author, pl.short_description FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                WHERE '.$author_query. $word_query . '
                pl.id_lang='.$id_lang.'  AND p.active = 1 ORDER BY p.id_smart_blog_post DESC LIMIT '.$start_from.','.$limit;

    $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);

   /* die('SELECT  p.id_smart_blog_post,p.created,pl.meta_title,pl.link_rewrite FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                WHERE '.$author_query. $word_query . '
                pl.id_lang='.$id_lang.'  AND p.active = 1 ORDER BY p.id_smart_blog_post DESC LIMIT '.$start_from.','.$limit);*/
    // die('<pre>'.print_r($result,true));
    
    // $result['query'] = $query;

    return $result;
    }

    public static function getSearchPostsCount($id_lang = null, $search_loc, $search_words) {

      if($id_lang == null){
        $id_lang = (int)Context::getContext()->language->id;
      }

      if(Configuration::get('smartshowrecentpost') != '' && Configuration::get('smartshowrecentpost') != null){
        $limit = Configuration::get('smartshowrecentpost');
      } else {
        $limit = 5;
      }
      $id_locs = self::getSellersLocationId($search_loc);
      $id_locs = implode(',', $id_locs);
      $author_query = !empty($id_locs)? 'id_author IN ('.$id_locs.') AND' : 'id_author IN (099) AND';

      $word_query = "";
      if(!empty($search_words))
        $word_query = "(pl.meta_title LIKE '%".pSQL($search_words)."%' OR pl.short_description LIKE '%".pSQL($search_words)."%' OR pl.content LIKE '%".pSQL($search_words)."%') AND ";


      $count = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
                'SELECT  p.id_smart_blog_post,p.created,pl.meta_title,pl.link_rewrite FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                WHERE '.$author_query. $word_query . '
                pl.id_lang='.$id_lang.'  AND p.active = 1');

    $total_records = count($count);
    $num_rec_per_page = 5;

    $total_pages = ceil($total_records / $num_rec_per_page);

    $page = 0;
      if(isset($_GET['pb'])) {
        $page = ($_GET['pb'] <= 0)? 1 : $_GET['pb'];
         $start_from = ($page-1) * $num_rec_per_page; 
          
      } else {
        $start_from = 0;
      }
      $start_from_final = ($start_from <= 0)? 0 : $start_from;

    $result['total_records'] = $total_records;
    $result['num_rec_per_page'] = $num_rec_per_page;
    $result['total_pages'] = $total_pages;
    $result['start_from'] = $start_from_final;
    $result['current_page'] = $page;

    if($page == 0) {
      $result['previous_page'] = 0;
      $result['next_page'] = 2;
    } else {
      $result['previous_page'] = ($page <= 1)? 1 : $page - 1;
      $result['next_page'] = ($page>$total_pages-1)? $total_pages : $page+1;
    }

      return $result;
    }

    public static function getSellersLocationId($search_loc) {

      $id_loc = Country::getIdByLikeName(1,$search_loc);

      $ids_loc = !empty($id_loc)? implode(',', $id_loc) : 099;

      $query = "SELECT s.id_seller FROM "._DB_PREFIX_."sellerinfo s WHERE id_country IN (". $ids_loc . ")";

      $data = Db::getInstance()->executeS($query);

      $locations = array();
      foreach($data as $value)
        $locations[] = $value['id_seller'];

      return $locations;
    }
    
    public static function tagsPost($tags, $id_lang = null){
        if($id_lang == null)
            $id_lang = (int)Context::getContext()->language->id;
        
        $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON p.id_smart_blog_post=ps.id_smart_blog_post  AND  ps.id_shop = '.(int) Context::getContext()->shop->id.' INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_tag pt ON pl.id_smart_blog_post = pt.id_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_tag t ON pt.id_tag=t.id_tag 
                WHERE pl.id_lang='.$id_lang.'  AND p.active = 1 	 		
                AND t.name="'.$tags.'"';
        
        if (!$posts = Db::getInstance()->executeS($sql))
			return false;
        
                $BlogCategory = new BlogCategory();
            $i = 0;
            foreach($posts as $post){
                $result[$i]['id_post'] = $post['id_smart_blog_post'];
                $result[$i]['viewed'] = $post['viewed'];
                $result[$i]['is_featured'] = $post['is_featured'];
                $result[$i]['meta_title'] = $post['meta_title'];
                $result[$i]['short_description'] = $post['short_description'];
                $result[$i]['meta_description'] = $post['meta_description'];
                $result[$i]['content'] = $post['content'];
                $result[$i]['meta_keyword'] = $post['meta_keyword'];
                $result[$i]['id_category'] = $post['id_category']; 
                $result[$i]['link_rewrite'] = $post['link_rewrite'];
                $result[$i]['cat_name'] = $BlogCategory->getCatName($post['id_category']);
                $result[$i]['cat_link_rewrite'] = $BlogCategory->getCatLinkRewrite($post['id_category']);
                $employee = new  Employee( $post['id_author']);
                
                $result[$i]['lastname'] = $employee->lastname;
                $result[$i]['firstname'] = $employee->firstname;
                 if (file_exists(_PS_MODULE_DIR_.'smartblog/images/' . $post['id_smart_blog_post'] . '.jpg') )
                {
                   $image =   $post['id_smart_blog_post'];
                   $result[$i]['post_img'] = $image;
		}
                else
                {
                   $result[$i]['post_img'] ='no';
                }
                $result[$i]['created'] = $post['created'];
                $i++;
            }
        return $result;
    }
    
    public static function getArchiveResult($month = null,$year = null,$limit_start = 0, $limit = 5){
         $BlogCategory = '';
         $result = array();
         $id_lang = (int)Context::getContext()->language->id;
         if($month != '' and $month != NULL and $year != '' and $year != NULL)
         {
             $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post s INNER JOIN '._DB_PREFIX_.'smart_blog_post_lang sl ON s.id_smart_blog_post = sl.id_smart_blog_post
                 and sl.id_lang = '.$id_lang.' INNER JOIN '._DB_PREFIX_.'smart_blog_post_shop ps ON ps.id_smart_blog_post = s.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id. '
            where s.active = 1 and MONTH(s.created) = '.$month.' AND YEAR(s.created) = '.$year.' ORDER BY s.id_smart_blog_post DESC';
         }elseif($month == '' and $month == NULL and $year != '' and $year != NULL)
         {
              $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post s INNER JOIN '._DB_PREFIX_.'smart_blog_post_lang sl ON s.id_smart_blog_post = sl.id_smart_blog_post
                 and sl.id_lang = '.$id_lang.' INNER JOIN '._DB_PREFIX_.'smart_blog_post_shop ps ON ps.id_smart_blog_post = s.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id. '
           where s.active = 1 AND YEAR(s.created) = '.$year.' ORDER BY s.id_smart_blog_post DESC';
              
         }elseif($month != '' and $month != NULL and $year == '' and $year == NULL)
         {
               $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post s INNER JOIN '._DB_PREFIX_.'smart_blog_post_lang sl ON s.id_smart_blog_post = sl.id_smart_blog_post
                 and sl.id_lang = '.$id_lang.' INNER JOIN '._DB_PREFIX_.'smart_blog_post_shop ps ON ps.id_smart_blog_post = s.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id. '
           where s.active = 1 AND   MONTH(s.created) = '.$month.'  ORDER BY s.id_smart_blog_post DESC';
               
         }else{
             $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post s INNER JOIN '._DB_PREFIX_.'smart_blog_post_lang sl ON s.id_smart_blog_post = sl.id_smart_blog_post
                 and sl.id_lang = '.$id_lang.' INNER JOIN '._DB_PREFIX_.'smart_blog_post_shop ps ON ps.id_smart_blog_post = s.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id. '
            where s.active = 1 ORDER BY s.id_smart_blog_post DESC';
         }
        if (!$posts = Db::getInstance()->executeS($sql))
			return false;
        
                $BlogCategory = new BlogCategory();
            $i = 0;
            foreach($posts as $post){
                $result[$i]['id_post'] = $post['id_smart_blog_post'];
                $result[$i]['viewed'] = $post['viewed'];
                $result[$i]['is_featured'] = $post['is_featured'];
                $result[$i]['meta_title'] = $post['meta_title'];
                $result[$i]['short_description'] = $post['short_description'];
                $result[$i]['meta_description'] = $post['meta_description'];
                $result[$i]['content'] = $post['content'];
                $result[$i]['meta_keyword'] = $post['meta_keyword'];
                $result[$i]['id_category'] = $post['id_category']; 
                $result[$i]['link_rewrite'] = $post['link_rewrite'];
                $result[$i]['cat_name'] = $BlogCategory->getCatName($post['id_category']);
                $result[$i]['cat_link_rewrite'] = $BlogCategory->getCatLinkRewrite($post['id_category']);
                $employee = new  Employee( $post['id_author']);
                
                $result[$i]['lastname'] = $employee->lastname;
                $result[$i]['firstname'] = $employee->firstname;
                 if (file_exists(_PS_MODULE_DIR_.'smartblog/images/' . $post['id_smart_blog_post'] . '.jpg') )
                {
                   $image =   $post['id_smart_blog_post'];
                   $result[$i]['post_img'] = $image;
		}
                else
                {
                   $result[$i]['post_img'] ='no';
                }
                $result[$i]['created'] = $post['created'];
                $i++;
            }
        return $result;
    }
    
    public static function getArchiveD($month,$year){

        $sql = 'SELECT DAY(p.created) as day FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN '._DB_PREFIX_.'smart_blog_post_shop ps ON p.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.' 
                 where MONTH(p.created) = '.$month.' AND YEAR(p.created) = '.$year.' GROUP BY DAY(p.created)';

        if (!$posts = Db::getInstance()->executeS($sql))
			return false;
                   
        return $posts;
        
    }
    
    public static function getArchiveM($year){
         
        $sql = 'SELECT MONTH(p.created) as month FROM '._DB_PREFIX_.'smart_blog_post p  INNER JOIN '._DB_PREFIX_.'smart_blog_post_shop ps ON p.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.' 
                 where YEAR(p.created) = '.$year.' GROUP BY MONTH(p.created)';
        
        if (!$posts = Db::getInstance()->executeS($sql))
			return false;
        return $posts;
        
    }
    
    public static function getArchive(){
         $result = array();
        $sql = 'SELECT YEAR(p.created) as year FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN '._DB_PREFIX_.'smart_blog_post_shop ps ON p.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.' 
                GROUP BY YEAR(p.created)';
        
        if (!$posts = Db::getInstance()->executeS($sql))
			return false;
                        $i = 0;
                    foreach ($posts as $value) {
                       $result[$i]['year'] = $value['year'];
                       $result[$i]['month'] = SmartBlogPost::getArchiveM($value['year']);
                       $months = SmartBlogPost::getArchiveM($value['year']);
                       $j = 0;
                       foreach ($months as $month) {
                               $result[$i]['month'][$j]['day'] = SmartBlogPost::getArchiveD($month['month'],$value['year']);
                               $j++;
                        }
                       $i++;
                    }
        return $result;
    }
    
    public static function SmartBlogSearchPost($keyword = NULL, $id_lang = NULL,$limit_start = 0, $limit = 5){
          if($keyword == NULL)
              return false;
          if($id_lang == NULL)
              $id_lang = (int)Context::getContext()->language->id;
          
        $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post_lang pl, '._DB_PREFIX_.'smart_blog_post p 
                WHERE pl.id_lang='.$id_lang.'  AND p.active = 1 
                AND pl.id_smart_blog_post=p.id_smart_blog_post AND
                (pl.meta_title LIKE \'%'.$keyword.'%\' OR
                 pl.meta_keyword LIKE \'%'.$keyword.'%\' OR
                 pl.meta_description LIKE \'%'.$keyword.'%\' OR
                 pl.content LIKE \'%'.$keyword.'%\') ORDER BY p.id_smart_blog_post DESC';
       if (!$posts = Db::getInstance()->executeS($sql))
			return false;
        
                $BlogCategory = new BlogCategory();
            $i = 0;
            foreach($posts as $post){
                $result[$i]['id_post'] = $post['id_smart_blog_post'];
                $result[$i]['viewed'] = $post['viewed'];
                $result[$i]['is_featured'] = $post['is_featured'];
                $result[$i]['meta_title'] = $post['meta_title'];
                $result[$i]['short_description'] = $post['short_description'];
                $result[$i]['meta_description'] = $post['meta_description'];
                $result[$i]['content'] = $post['content'];
                $result[$i]['meta_keyword'] = $post['meta_keyword'];
                $result[$i]['id_category'] = $post['id_category']; 
                $result[$i]['link_rewrite'] = $post['link_rewrite'];
                $result[$i]['cat_name'] = $BlogCategory->getCatName($post['id_category']);
                $result[$i]['cat_link_rewrite'] = $BlogCategory->getCatLinkRewrite($post['id_category']);
                $employee = new  Employee( $post['id_author']);
                
                $result[$i]['lastname'] = $employee->lastname;
                $result[$i]['firstname'] = $employee->firstname;
                 if (file_exists(_PS_MODULE_DIR_.'smartblog/images/' . $post['id_smart_blog_post'] . '.jpg') )
                {
                   $image =   $post['id_smart_blog_post'];
                   $result[$i]['post_img'] = $image;
		}
                else
                {
                   $result[$i]['post_img'] ='no';
                }
                $result[$i]['created'] = $post['created'];
                $i++;
            }
        return $result;
    }
    
    public static function SmartBlogSearchPostCount($keyword = NULL, $id_lang = NULL){
          if($keyword == NULL)
              return false;
          if($id_lang == NULL)
              $id_lang = (int)Context::getContext()->language->id;
          
        $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post_lang pl, '._DB_PREFIX_.'smart_blog_post p 
                WHERE pl.id_lang='.$id_lang.'
                AND pl.id_smart_blog_post=p.id_smart_blog_post AND p.active = 1 AND 
                (pl.meta_title LIKE \'%'.$keyword.'%\' OR
                 pl.meta_keyword LIKE \'%'.$keyword.'%\' OR
                 pl.meta_description LIKE \'%'.$keyword.'%\' OR
                 pl.content LIKE \'%'.$keyword.'%\') ORDER BY p.id_smart_blog_post DESC';
       if (!$posts = Db::getInstance()->executeS($sql))
			return false;
        return count($posts);
    }
    
    public static function getBlogImage(){
         
         $id_lang = (int)Context::getContext()->language->id;
            
                $sql = 'SELECT id_smart_blog_post FROM '._DB_PREFIX_.'smart_blog_post';
                
               if (!$result = Db::getInstance()->executeS($sql))
                               return false;
               return $result;
           }
           
    public static function GetPostSlugById($id_post,$id_lang = null){
          if($id_lang == null)
              $id_lang = (int)Context::getContext()->language->id;
          
        $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post 
                WHERE pl.id_lang='.$id_lang.'
                AND p.active= 1 AND p.id_smart_blog_post = '.$id_post;

        if (!$post = Db::getInstance()->executeS($sql))
			return false;
        
        return $post[0]['link_rewrite'];
    }
    
    public static function GetPostMetaByPost($id_post,$id_lang = null){
          if($id_lang == null)
              $id_lang = (int)Context::getContext()->language->id;
          
        $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post 
                WHERE pl.id_lang='.$id_lang.'
                AND p.active= 1 AND p.id_smart_blog_post = '.$id_post;

        if (!$post = Db::getInstance()->executeS($sql))
			return false;
        
                            if($post[0]['meta_title'] == '' && $post[0]['meta_title'] == NULL){
                                $meta['meta_title'] = Configuration::get('smartblogmetatitle');
                            }else{
                                $meta['meta_title'] = $post[0]['meta_title'];
                            }
                            
                            if($post[0]['meta_description'] == '' && $post[0]['meta_description'] == NULL){
                               $meta['meta_description'] = Configuration::get('smartblogmetadescrip');
                            }else{
                                $meta['meta_description'] = $post[0]['meta_description'];
                            }
                            
                            if($post[0]['meta_keyword'] == '' && $post[0]['meta_keyword'] == NULL){
                               $meta['meta_keywords'] = Configuration::get('smartblogmetakeyword');
                            }else{
                                $meta['meta_keywords'] = $post[0]['meta_keyword'];
                            }
        return $meta;
    }
    
        public static function GetPostLatestHome($limit)
            {
                if($limit == '' && $limit == null)
                    $limit = 3;
            $id_lang = (int)Context::getContext()->language->id;
            $id_lang_defaut = Configuration::get('PS_LANG_DEFAULT');
            $result = array();
            $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                WHERE pl.id_lang='.$id_lang.' 		
                AND p.active= 1 ORDER BY p.id_smart_blog_post DESC 
                LIMIT '.$limit;
            $posts = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
            if(empty($posts)){
                $sql2 = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post  AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                WHERE pl.id_lang='.$id_lang_defaut.' 		
                AND p.active= 1 ORDER BY p.id_smart_blog_post DESC 
                LIMIT '.$limit;
                $posts = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql2);      
            }
             $i = 0; 
            foreach($posts as $post){
                $result[$i]['id'] = $post['id_smart_blog_post'];
                $result[$i]['title'] = $post['meta_title'];
                $result[$i]['meta_description'] = strip_tags($post['meta_description']);
                $result[$i]['short_description'] = strip_tags(html_entity_decode($post['short_description']));
                $result[$i]['content'] = strip_tags($post['content']);
                $result[$i]['category'] = $post['id_category'];
                $result[$i]['date_added'] = $post['created'];
                $result[$i]['viewed'] = $post['viewed'];
                $result[$i]['is_featured'] = $post['is_featured'];
                $result[$i]['link_rewrite'] = $post['link_rewrite'];
                $result[$i]['id_author'] = $post['id_author'];
                if (file_exists(_PS_MODULE_DIR_.'smartblog/images/' . $post['id_author'] . '/' . $post['id_smart_blog_post'] . '.jpg'))
                    {
                       $image =   $post['id_smart_blog_post'];
                       $result[$i]['post_img'] = $image;
                    }
                    else
                    {
                       $result[$i]['post_img'] = 'no';
                    }
                $i++;
            }
            return $result;
            }

  public static function GetSellerBlogs($limit) {

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $url = parse_url($actual_link);

    $store_alias = explode('/',$url['path']);

    $seller_alias = $store_alias[1] . "/";

    $sellerinfo = self::getSellerInfo($seller_alias);

    $id_seller = $sellerinfo['id_seller'];

    if($limit == '' && $limit == null)
                    $limit = 3;
            $id_lang = (int)Context::getContext()->language->id;
            $id_lang_defaut = Configuration::get('PS_LANG_DEFAULT');
            $result = array();
            $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                WHERE pl.id_lang='.$id_lang.'  
                AND p.id_author='.$id_seller.'   
                AND p.active= 1 ORDER BY p.id_smart_blog_post DESC 
                LIMIT '.$limit;
            $posts = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
            if(empty($posts)){
                $sql2 = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post  AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                WHERE pl.id_lang='.$id_lang_defaut.'    
                AND p.id_author='.$id_seller.'  
                AND p.active= 1 ORDER BY p.id_smart_blog_post DESC 
                LIMIT '.$limit;
                $posts = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql2);      
            }
             $i = 0;
            foreach($posts as $post){
                $result[$i]['id'] = $post['id_smart_blog_post'];
                $result[$i]['title'] = $post['meta_title'];
                $result[$i]['meta_description'] = strip_tags($post['meta_description']);
                $result[$i]['short_description'] = strip_tags(htmlspecialchars_decode($post['short_description']));
                $result[$i]['content'] = htmlspecialchars_decode($post['content']);
                $result[$i]['category'] = $post['id_category'];
                $result[$i]['date_added'] = $post['created'];
                $result[$i]['viewed'] = $post['viewed'];
                $result[$i]['is_featured'] = $post['is_featured'];
                $result[$i]['link_rewrite'] = $post['link_rewrite'];
                $result[$i]['id_author'] = $post['id_author'];
                $result[$i]['seller_alias'] = $store_alias[1];
                // die(_PS_MODULE_DIR_.'smartblog/images/' . $post['id_author'] . '/' . $post['id_smart_blog_post'] . '.jpg');
                if (file_exists(_PS_MODULE_DIR_.'smartblog/images/' . $post['id_author'] . '/' . $post['id_smart_blog_post'] . '.jpg'))
                    {
                       $image =   $post['id_smart_blog_post'];
                       $result[$i]['post_img'] = $image;
                    }
                    else
                    {
                       $result[$i]['post_img'] = 'no';
                    }
                $i++;
            }
            return $result;
  }

  public static function getSellerInfo($store_alias) {
    $sql = "SELECT * FROM "._DB_PREFIX_."shop_url s
            LEFT JOIN "._DB_PREFIX_."sellerinfo si ON s.id_shop = si.id_shop
            WHERE virtual_uri = '".pSQL($store_alias)."' AND active = 1";

    $data = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql);

    return $data;
  }

}