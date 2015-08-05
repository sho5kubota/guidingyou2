<?php


class BlogPostCategory extends ObjectModel
{
      public $id_smart_blog_post_category;
      public $id_author;
      public static $definition = array(
		'table' => 'smart_blog_post_category',
		'primary' => 'id_smart_blog_post_category',
                'multilang'=>false,
		'fields' => array(
                     'id_smart_blog_post_category' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
                     'id_smart_blog_category' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt')
                     ),
	);

       public static function getToltalByCategory($id_lang,$id_category,$limit_start, $limit){
        $result = array();
        $sql = 'SELECT * FROM '._DB_PREFIX_.'smart_blog_post_lang pl, '._DB_PREFIX_.'smart_blog_post p 
                WHERE pl.id_lang='.$id_lang.' and p.active = 1 AND pl.id_smart_blog_post=p.id_smart_blog_post AND p.id_category = '.$id_category.'
                ORDER BY p.id_smart_blog_post DESC LIMIT '.$limit_start.','.$limit;
      
        if (!$posts = Db::getInstance()->executeS($sql))
			return false;

        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $url = parse_url($actual_link);

        $store_alias = explode('/',$url['path']);

        $seller_alias = $store_alias[1];

        $i = 0;
                $BlogCategory = new BlogCategory();
            foreach($posts as $post){
                $result[$i]['id_post'] = $post['id_smart_blog_post'];
                $result[$i]['viewed'] = $post['viewed'];
                $result[$i]['meta_title'] = $post['meta_title'];
                $result[$i]['meta_description'] = $post['meta_description'];
                $result[$i]['short_description'] = $post['short_description'];
                $result[$i]['content'] = $post['content'];
                $result[$i]['meta_keyword'] = $post['meta_keyword'];
                $result[$i]['id_category'] = $post['id_category'];
                $result[$i]['link_rewrite'] = $post['link_rewrite'];
                $result[$i]['seller_alias'] = $seller_alias;
                $result[$i]['cat_link_rewrite'] = $BlogCategory->getCatLinkRewrite($post['id_category']);
                $employee = new  Employee( $post['id_author']);
             
                $result[$i]['id_author'] = $post['id_author'];
                $result[$i]['lastname'] = $employee->lastname;
                $result[$i]['firstname'] = $employee->firstname;
                 if (file_exists(_PS_MODULE_DIR_.'smartblog/images/' . $post['id_author'] . '/' . $post['id_smart_blog_post'] . '.jpg') )
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


    public static function getToltalBySeller($id_lang,$id_author,$limit_start, $limit){
        $result = array();

        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $url = parse_url($actual_link);

        $store_alias = explode('/',$url['path']);

        $seller_alias = $store_alias[1];

        /*$sql = 'SELECT *, `pl`.`meta_title` AS cat_title FROM '._DB_PREFIX_.'smart_blog_post_lang pl, '._DB_PREFIX_.'smart_blog_post p 
                WHERE pl.id_lang='.$id_lang.' and p.active = 1 AND pl.id_smart_blog_post=p.id_smart_blog_post AND p.id_author = '.$id_author.'
                ORDER BY p.id_smart_blog_post DESC LIMIT '.$limit_start.','.$limit;*/

        $sql = 'SELECT p.id_smart_blog_post, pl.meta_title AS meta_title, pl.meta_keyword, pl.meta_description, pl.short_description, pl.content,
                pl.link_rewrite, p.id_author, p.id_category, p.position, p.active, p.available, p.created, p.modified, p.viewed, p.is_featured,
                p.comment_status, p.post_type, p.image, p.youtube
                FROM '._DB_PREFIX_.'smart_blog_post_lang pl
                LEFT JOIN '._DB_PREFIX_.'smart_blog_post p ON pl.id_smart_blog_post=p.id_smart_blog_post 
                WHERE pl.id_lang='.$id_lang.' and p.active = 1 AND p.id_author = '.$id_author.' 
                ORDER BY p.id_smart_blog_post DESC LIMIT '.$limit_start.','.$limit;

        $cat_sql = 'SELECT id_smart_blog_category AS id_category, meta_title AS cat_title 
                    FROM '._DB_PREFIX_.'smart_blog_category_lang pl
                    WHERE pl.id_lang='.$id_lang;

        $category_post = Db::getInstance()->executeS($cat_sql);
        $categories_post = array();
        foreach ($category_post as $key => $value) {
          $id_category = $value['id_category'];
          $cat_title = $value['cat_title'];

          $categories_post[$id_category] = $cat_title;
        }

      
        if (!$posts = Db::getInstance()->executeS($sql))
      return false;
        $i = 0;
                $BlogCategory = new BlogCategory();
            foreach($posts as $post){
                $result[$i]['id_post'] = $post['id_smart_blog_post'];
                $result[$i]['viewed'] = $post['viewed'];
                $result[$i]['meta_title'] = $post['meta_title'];
                $result[$i]['meta_description'] = $post['meta_description'];
                $result[$i]['short_description'] = $post['short_description'];
                $result[$i]['content'] = $post['content'];
                $result[$i]['meta_keyword'] = $post['meta_keyword'];
                $result[$i]['id_category'] = $post['id_category'];
                $result[$i]['cat_name'] = $categories_post[$post['id_category']];
                $result[$i]['link_rewrite'] = $post['link_rewrite'];
                $result[$i]['seller_alias'] = $seller_alias;
                $result[$i]['cat_link_rewrite'] = $BlogCategory->getCatLinkRewrite($post['id_category']);
                $employee = new  Employee( $post['id_author']);
             
                $result[$i]['id_author'] = $post['id_author'];
                $result[$i]['lastname'] = $employee->lastname;
                $result[$i]['firstname'] = $employee->firstname;
                 if (file_exists(_PS_MODULE_DIR_.'smartblog/images/' . $post['id_author'] . '/' . $post['id_smart_blog_post'] . '.jpg') )
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
      
}