<?php

class SmartSellerBlogSmartListModuleFrontController extends AgileModuleFrontController {

	public function setMedia() {
		parent::setMedia();
						$deflang = new Language(self::$cookie->id_lang);
		$isocode = (file_exists(_PS_JS_DIR_.'jquery/ui/jquery.ui.datepicker-'.$deflang->iso_code.'.js') ? $deflang->iso_code : 'en');

		$this->addJqueryUI(array(
			'ui.core',
			'ui.widget'
		));

		$this->addJS(array(
			_PS_JS_DIR_.'admin.js',
			_PS_JS_DIR_.'tools.js',
			_PS_JS_DIR_.'jquery/ui/jquery.ui.mouse.min.js',
			_PS_JS_DIR_.'jquery/ui/jquery.ui.slider.min.js',
			_PS_JS_DIR_.'jquery/ui/jquery.ui.datepicker.min.js',
			_PS_JS_DIR_.'jquery/ui/jquery.ui.datepicker-' .$isocode . '.js',
			_PS_JS_DIR_.'jquery/ui/jquery.ui.core.min.js',
			_PS_JS_DIR_.'jquery/ui/jquery.ui.widget.min.js',
			_PS_JS_DIR_.'jquery/plugins/jquery.typewatch.js',
			_PS_JS_DIR_.'jquery/plugins/timepicker/jquery-ui-timepicker-addon.js',
			_PS_JS_DIR_.'jquery/plugins/jquery.tablednd.js',
			
			_PS_ROOT_DIR_.'/modules/agilemultipleseller/js/AgileStatesManagement.js',
			_PS_ROOT_DIR_.'/modules/agilemultipleseller/js/treeview-categories/jquery.treeview-categories.js',
			_PS_ROOT_DIR_.'/modules/agilemultipleseller/js/treeview-categories/jquery.treeview-categories.async.js',
			_PS_ROOT_DIR_.'/modules/agilemultipleseller/js/treeview-categories/jquery.treeview-categories.edit.js',
			_PS_ROOT_DIR_.'/modules/agilemultipleseller/js/agile_tiny_mce.js',
			_PS_ROOT_DIR_.'/modules/agilemultipleseller/replica/filemanager/plugin.js',
			_PS_ROOT_DIR_.'/modules/agilemultipleseller/replica/themes/default/js/dropdown.js',
			));


		if(version_compare(_PS_VERSION_,'1.6.0.12','>='))
		{
			$this->addJS(array(
				_PS_JS_DIR_.'admin/price.js',
				_PS_JS_DIR_.'admin/attributes.js',
				_PS_JS_DIR_.'admin/tinymce.inc.js',
			));
		}
		else
		{
			$this->addJS(array(
				_PS_JS_DIR_.'price.js',
				_PS_JS_DIR_.'attributesBack.js',
				_PS_JS_DIR_.'tinymce.inc.js',
			));
		}
		
		$this->addjQueryPlugin(array(
			'tagify',
			'fancybox',
			'alerts',
			'ajaxfileupload'
		));

		if(Module::isInstalled('agilesellerlistoptions'))
		{
			$this->addJS(array(
				_PS_ROOT_DIR_.'/modules/agilesellerlistoptions/js/listoptions.js'
				));
		}

		$this->addCSS(_PS_JS_DIR_ . 'jquery/ui/themes/base/jquery.ui.theme.css','all');
		$this->addCSS(_PS_JS_DIR_ . 'jquery/ui/themes/base/jquery.ui.slider.css','all');
		$this->addCSS(_PS_JS_DIR_ . 'jquery/ui/themes/base/jquery.ui.datepicker.css','all');
		$this->addCSS(_PS_JS_DIR_ . 'jquery/plugins/timepicker/jquery-ui-timepicker-addon.css','all');
		$this->addCSS(__PS_BASE_URI__.'modules/agilemultipleseller/js/treeview-categories/jquery.treeview-categories.css','all');

	}

	public function initContent() {

    	parent::initContent();

    	$lang_id = $this->context->language->id;

    	$id_seller = $this->context->controller->seller;

    	$action = Tools::getValue('process');
		$id_blog = Tools::getValue('id_smart_blog_post');
	    if(isset($action) && isset($id_blog))
        {
        	$blog = self::getPost($id_blog, $id_seller->id);
			$targetid_owner_id = $blog['id_author'];

			if($action == 'delete') 
			{ 

				if($id_seller->id > 0 AND $action == 'delete' AND $this->sellerinfo->id_seller == $targetid_owner_id) {
					$this->processDelete($id_blog, $id_seller->id);
				}
				else {
					$this->errors[] = Tools::displayError('You do not have permission to delete this blog or the blog is not found.');
				}
			} 
			else if($action == 'inactive' || $action=='active') {

				if($this->sellerinfo->id_seller == $targetid_owner_id) {
					$this->activeBlog($action, $id_blog, $id_seller->id);
				}
				else {
					$this->errors[] = Tools::displayError('You do not have permission to touch this blog or the blog is not found.');
				}
			}
        }

        $page_number = Tools::getValue('p');

        $page_number = !isset($_GET['p'])? 1 : $page_number; 

        $blog_nb = 3; // how many blogs in a page

        // Get Total number of blogs of author
        $total_rows = $this->getTotalAuthorBlogs($id_seller->id);

        $total_pages = ceil($total_rows/$blog_nb); // number of pages

        $page_position = (($page_number-1) * $blog_nb); //get starting position to fetch the records

    	$blogs = self::getUserBlogs($lang_id, $id_seller, $page_position, $blog_nb);

    	$smartData = array(
    		'blogs' => $blogs,
    		'seller_tab_id' => 7,
    		'p' => $page_number,
    		'blogs_per_page' => $blog_nb,
    		'start' => 1,
    		'stop' => $total_pages,
    		'pages_nb' => $total_pages,
    	);

    	self::$smarty->assign($smartData);

    	$this->setTemplate('smartbloglist.tpl');
  	}

  	public static function getUserBlogs($lang_id, $id_seller, $page_position,$limit) {

  		$sql = "
		SELECT DISTINCT sb.id_smart_blog_post, sb.id_category, sb.created, sbl.meta_title, sbl.short_description, sbcl.meta_title AS cat_title, sb.active, sb.id_author
		FROM " . _DB_PREFIX_ . "smart_blog_post sb 
		INNER JOIN ". _DB_PREFIX_ ."smart_blog_post_lang sbl ON sb.id_smart_blog_post = sbl.id_smart_blog_post 
		INNER JOIN ". _DB_PREFIX_ ."smart_blog_category_lang sbcl ON sbcl.id_smart_blog_category = sb.id_category
		WHERE sbl.id_lang = " . $lang_id . " AND sb.id_author = ".$id_seller->id . " AND sb.active=1 "
		."LIMIT ".$page_position.",".$limit;

		$blogs = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

		return $blogs;
  	}

  	public function getTotalAuthorBlogs($id_seller) {
  		$sql = "
  		SELECT COUNT(*) AS total
  		FROM "._DB_PREFIX_."smart_blog_post s 
  		WHERE s.active = 1 AND s.id_author =".$id_seller."
  		";

  		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);

  		return $row[0]['total'];
  	}

  	public function deleteImage($id_blog,$id_seller) {	
  		$posts_types = BlogImageType::GetImageAllType('post');

  		foreach ($posts_types as  $image_type) {

			$dir = _PS_MODULE_DIR_ .'smartblog/images/'. $id_seller . '/' .$id_blog.'-'.stripslashes($image_type['type_name']).'.jpg';
			$main = _PS_MODULE_DIR_ .'smartblog/images/'. $id_seller . '/' .$id_blog.'.jpg';
			if (file_exists($dir)) {
				unlink($dir);
				unlink($main);
			}
		}

  	}

  	public static function getPost($id_blog = null, $id_seller = null, $id_lang = 1) {

        $seller_query 	= ($id_seller != null)? ' AND p.id_author ='.$id_seller : '';
        $id_blog 		= ($id_blog != null)? ' AND pl.id_smart_blog_post ='.$id_blog : '';

        $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
                WHERE pl.id_lang='.$id_lang . $id_blog . $seller_query . '
                ORDER BY p.id_smart_blog_post';

        $data = Db::getInstance()->getRow($sql);

        return $data;

    }

    public function processDelete($id_blog, $id_seller) {
    	$query = 	"DELETE s, sl, ss, si
    				FROM "._DB_PREFIX_."smart_blog_post s 
					LEFT JOIN "._DB_PREFIX_."smart_blog_post_lang sl 	
						ON s.id_smart_blog_post = sl.id_smart_blog_post
					LEFT JOIN "._DB_PREFIX_."smart_blog_post_shop ss 	
						ON s.id_smart_blog_post = ss.id_smart_blog_post
					LEFT JOIN "._DB_PREFIX_."smart_blog_images si 		
						ON s.id_smart_blog_post = si.id_smart_blog_post
					WHERE s.id_smart_blog_post =".$id_blog."
    				";

    	Db::getInstance()->execute($query);
    	$this->deleteImage($id_blog, $id_seller);
    }

    public function activeBlog($active, $id_blog, $id_seller) {
    	$status = ($active == 'active')? 1 : 0;

    	$query = 	"UPDATE "._DB_PREFIX_."smart_blog_post s 
    				SET s.active =".$status."
    				WHERE s.id_smart_blog_post =".$id_blog ." AND s.id_author =". $id_seller;
    	Db::getInstance()->execute($query);
    }

  	public static function checkImgExists($id_seller, $id_blog) {


  	}

}