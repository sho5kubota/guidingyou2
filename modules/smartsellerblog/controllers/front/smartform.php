<?php

class SmartSellerBlogSmartFormModuleFrontController extends AgileModuleFrontController {


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
			_PS_ROOT_DIR_.'/modules/agilemultipleseller/js/agile_tiny_mce.js',
			_PS_ROOT_DIR_.'/modules/agilemultipleseller/replica/filemanager/plugin.js',
			_PS_ROOT_DIR_.'/modules/agilemultipleseller/replica/themes/default/js/dropdown.js',
			));


		if(version_compare(_PS_VERSION_,'1.6.0.12','>='))
		{
			$this->addJS(array(
				_PS_JS_DIR_.'admin/tinymce.inc.js',
			));
		}
		else
		{
			$this->addJS(array(
				_PS_JS_DIR_.'tinymce.inc.js',
			));
		}
		
		$this->addjQueryPlugin(array(
			'tagify',
			'fancybox',
			'alerts',
			'ajaxfileupload'
		));


		$this->addCSS(_PS_JS_DIR_ . 'jquery/ui/themes/base/jquery.ui.theme.css','all');
		$this->addCSS(_PS_JS_DIR_ . 'jquery/ui/themes/base/jquery.ui.slider.css','all');
		$this->addCSS(_PS_JS_DIR_ . 'jquery/ui/themes/base/jquery.ui.datepicker.css','all');
		$this->addCSS(_PS_JS_DIR_ . 'jquery/plugins/timepicker/jquery-ui-timepicker-addon.css','all');
		$this->addCSS(__PS_BASE_URI__.'modules/agilemultipleseller/js/treeview-categories/jquery.treeview-categories.css','all');

	}

	public function initContent() {
		parent::initContent();

		
		$blogId = $_GET['id_smart_blog_post'];
        $sellerId = $this->context->controller->seller->id;
	
		$data = self::getPost($blogId);
		if(count($data) > 0)
		$youtube_preview = $this->convertYoutube($data['youtube']);
		

		$data = empty($data)? array('id_author' => $sellerId) : $data;
		// die(var_dump($this->inBlogUser($blogId, $sellerId)));

		if($this->inBlogUser($blogId, $this->context->controller->seller->id) == false && $blogId != 0) {
			$this->errors[] = Tools::displayError('You do not have permission to access/modify this data.');
            	$hasOwnership = 0;
 
		} else {
			$hasOwnership = 1;
		}

		$img_dir = _PS_MODULE_DIR_ .'smartblog/images/'. $sellerId;

		self::$smarty->assign(array(
			'hasOwnerShip' => $hasOwnership,
            'blog' => $data,
            'youtube_preview' => $youtube_preview,
            'img_dir' => $img_dir,
            'post' => $_POST,
            'seller_tab_id' => 7
        ));

		$this->setTemplate('smartblogform.tpl');
	}


	public function postProcess() {

		if(Tools::isSubmit('saveBlog')) {
			
			if($_GET['id_smart_blog_post'] == 0 || !isset($_GET['id_smart_blog_post'])) {
			
				$this->validateBlog();
				if(empty($this->errors)) {
					$s = $this->saveBlog();
				 	self::$smarty->assign('cfmmsg_flag',1);
				 	Tools::redirect('http://testguidingyou.local/en/module/smartsellerblog/smartform?id_smart_blog_post='.$s);
				 }
			}
			else {
				if(empty($this->errors)) {
					$this->validateBlog();
					$this->updateBlog();
					self::$smarty->assign('cfmmsg_flag',1);
				}
			}
		}
	}

	public function updateBlog() {
		$blogId 	= $_GET['id_smart_blog_post'];
		$sellerId = $this->context->controller->seller->id;
		$title 		= htmlentities(Tools::getValue('title'));
		$short_desc = htmlentities(Tools::getValue('short_description'));
		$content 	= htmlentities(Tools::getValue('content'));
		$status 	= Tools::getValue('active');
		$youtube 	= Tools::getValue('youtube');

		$query = "UPDATE "._DB_PREFIX_."smart_blog_post_lang SET meta_title = '". pSQL($title) . "', meta_description = '".pSQL($short_desc)."' 
		, short_description ='".pSQL($short_desc)."', content ='".pSQL($content)."' 
		WHERE id_smart_blog_post =".$blogId;
		Db::getInstance()->execute($query);

		$query2 = "UPDATE "._DB_PREFIX_."smart_blog_post SET active =".$status.", youtube ='".pSQL($youtube)  ."' WHERE id_smart_blog_post =". $blogId;
		Db::getInstance()->execute($query2);

		$images = $this->getImages($sellerId,$blogId);

		$activeImgId = $images[0]['id_img'];

		$this->uploadImages($blogId,$activeImgId);

	}

	public function saveBlog() {

		// Validate
		$this->validateBlog();

		$languages  = Language::getLanguages(0);

		// insert new data
		$title = Tools::getValue('title');
		$link_rewrite = Tools::str2url($title);
		$short_description = Tools::getValue('short_description');
		$content = Tools::getValue('content');

		// Insert into smart_blog_post table
		$query_blog = "INSERT INTO "._DB_PREFIX_ . "smart_blog_post (`id_author`, `id_category`, `position`, `active`, `available`, `created`, `post_type`, `comment_status`,`viewed`, `is_featured`)
				  VALUES ('".$this->context->controller->seller->id."', 1, 0, 1, 1, '".date('Y-m-d H:i:s')."', 0, 1,0,0)";

		Db::getInstance()->execute($query_blog);
		$last_id = Db::getInstance()->Insert_ID(); 

		// insert into smart_blog_post_lang table
		$insert_data = array();

		foreach ($languages as $key => $value) {
			$id_lang = $value['id_lang'];

			$insert_data[] = '('.$last_id.', '.$id_lang.', "'.pSQL($title).'", "'.pSQL($short_description).'", "'.pSQL($short_description).'", "'.pSQL($content).'", "'.pSQL($link_rewrite).'")';
		}

		$flat_data = implode(",", $insert_data);

		$query_blog_lang = "INSERT INTO "._DB_PREFIX_ . "smart_blog_post_lang (`id_smart_blog_post`, `id_lang`, `meta_title`, `meta_description`, `short_description`, `content`, `link_rewrite`) VALUES 
		".$flat_data;		
		Db::getInstance()->execute($query_blog_lang);

		// insert into smart_blog_post_shop
		$blog_shop = "INSERT INTO "._DB_PREFIX_ . "smart_blog_post_shop (`id_smart_blog_post`,`id_shop`) VALUES(".$last_id.",1)";
		Db::getInstance()->execute($blog_shop);

		return $last_id;
		// die('<pre>'.print_r($query, true));
	}

	public function validateBlog() {

		if(empty($_POST['title']))
			$this->errors[] = Tools::displayError('Title is required!');
			
		if(mb_strlen($_POST['short_description']) < 10)
			$this->errors[] = Tools::displayError('Short description should be atleast 10 characters!');

		if(!Validate::isAbsoluteUrl($_POST['youtube']))
			$this->errors[] = Tools::displayError('Invalid URL!');

	}

	/**
	 * checking if author owns the blog
	 */
	public function  inBlogUser($id_blog, $id_user) {
		$sql  = "SELECT s.id_smart_blog_post, s.id_author 
				FROM "._DB_PREFIX_."smart_blog_post s
				WHERE s.id_smart_blog_post = ".$id_blog." 
				AND s.id_author = ".$id_user."
				";

		$data = Db::getInstance()->getRow($sql);

		return $data;
	}

	public static function getPost($id_blog = null, $id_lang = 1) {

		$sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post p INNER JOIN 
				'._DB_PREFIX_.'smart_blog_post_lang pl ON p.id_smart_blog_post=pl.id_smart_blog_post INNER JOIN 
                '._DB_PREFIX_.'smart_blog_post_shop ps ON pl.id_smart_blog_post = ps.id_smart_blog_post AND ps.id_shop = '.(int) Context::getContext()->shop->id.'
				WHERE pl.id_lang='.$id_lang.' 
				AND pl.id_smart_blog_post ='.$id_blog .'
				ORDER BY p.id_smart_blog_post';

		$data = Db::getInstance()->getRow($sql);

		return $data;

	}

	public function uploadImages($id_smart_blog_post, $active_img_id) {
		$id_seller = $this->context->controller->seller->id;
		$seller_dir = _PS_MODULE_DIR_ .'smartblog/images/'. $id_seller;
		if(!file_exists($seller_dir))
			mkdir($seller_dir, 0755);

		$this->processImageUpload($_FILES, $id_seller, $id_smart_blog_post, $active_img_id);

	}

	public function processImageUpload($FILES, $id_seller, $id_smart_blog_post, $active_img_id) {
		if (isset($FILES['img']) && isset($FILES['img']['tmp_name']) && !empty($FILES['img']['tmp_name'])) {
			if ($error = ImageManager::validateUpload($FILES['img'], 4000000))
				return $this->displayError($this->l('Invalid image'));
			else {
				$ext = substr($FILES['img']['name'], strrpos($FILES['img']['name'], '.') + 1);
                $file_name = $id_smart_blog_post . '.' . $ext;
                $path = _PS_MODULE_DIR_ .'smartblog/images/'.$id_seller.'/' . $file_name;
                if (!move_uploaded_file($FILES['img']['tmp_name'], $path))
					return $this->displayError($this->l('An error occurred while attempting to upload the file.'));
				else {
					$author_types = BlogImageType::GetImageAllType('post');
					foreach ($author_types as  $image_type) {
						$dir = _PS_MODULE_DIR_ .'smartblog/images/'.$id_seller.'/'.$id_smart_blog_post.'-'.stripslashes($image_type['type_name']).'.jpg';
						if (file_exists($dir))	
						unlink($dir);
					}
                        
					$images_types = BlogImageType::GetImageAllType('post');
					foreach ($images_types as $image_type) {
						ImageManager::resize($path,_PS_MODULE_DIR_ .'smartblog/images/'.$id_seller.'/'.$id_smart_blog_post.'-'.stripslashes($image_type['type_name']).'.jpg',
						(int)$image_type['width'], (int)$image_type['height']);
					}

					//  insert data into the database
					$this->insertImgData($id_seller, $id_smart_blog_post);
                }
            }
		}
	}

	public function insertImgData($id_seller, $id_smart_blog_post) {

		$query_check = "SELECT `si`.`id_img`
						FROM "._DB_PREFIX_."smart_blog_images si
						WHERE `si`.`id_author` =".$id_seller." AND `si`.`id_smart_blog_post` =". $id_smart_blog_post;
		$check = Db::getInstance()->getRow($query_check);

		$file_name = $id_smart_blog_post . ".jpg";

		if($check === false) {
			$query = "INSERT INTO "._DB_PREFIX_."smart_blog_images (`id_smart_blog_post`, `id_author`, `img_name`)VALUES
			(".$id_smart_blog_post.",".$id_seller.",'".$file_name."')";
		Db::getInstance()->execute($query);
		} 

		
	}

	public function getImages($id_seller,$id_smart_blog_post) {

		$query = 	"SELECT `si`.`id_img`
					FROM "._DB_PREFIX_."smart_blog_images si
					WHERE `si`.`id_author` =".$id_seller." AND `si`.`id_smart_blog_post` =". $id_smart_blog_post;

		$data = Db::getInstance()->ExecuteS($query);

		return $data;
	}

	public function convertYoutube($string) {
	    return preg_replace(
	        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
	        "<iframe src=\"//www.youtube.com/embed/$2\" width=\"560\" height=\"315\"></iframe>",
	        $string
	    );
	}



}